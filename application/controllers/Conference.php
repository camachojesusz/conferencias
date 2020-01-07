<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Conference extends CI_Controller
   {
      function __construct()
      {
         parent:: __construct();
         $this->load->model(['conference/conference_model',  'users/sessions_model']);
         if (!isset($_SESSION['status_session']) && $_SESSION['profile'] != 1)
         {
            redirect("login", "refresh");
         }
      }

      function index()
      {
         $data['allconference'] = $this->conference_model->get_conferences();
         $data['num_assistance'] = $this->conference_model->get_attendences();
         $this->load->view('conference/index', $data);
      }

      function open_conference($conference, $status)
      {

         if (!strcmp('0', $status))
         {
            $new_status = [
               'open_conference' => '1'
            ];
         }
         else
         {
            $new_status = [
               'open_conference' => '0'
            ];
				$this->sessions_model->trash_all_users();
         }

         $this->conference_model->open_conference($conference, $new_status);

         $data['allconference'] = $this->conference_model->get_conferences();
         $data['num_assistance'] = $this->conference_model->get_attendences();
         $this->load->view('conference/index', $data);
      }

      function expectant($conference_id  = NULL)
      {
         $data['info_conference'] = $this->conference_model->get_conferences($conference_id, NULL, NULL, NULL);
         $data['all_conf_expectant'] = $this->conference_model->get_attendences($conference_id, NULL, NULL)->result();

         $this->load->view('conference/expectant', $data);
      }

      function send_recognition($conference = NULL, $expectant_id = NULL)
      {
         if (is_null($conference))
         {
            $conference = $this->input->post('conferences');
         }
         else
         {
            $conference = str_split($conference);
         }

         $this->config->load('email');
         $this->load->library('email');


         $config['wordwrap'] = TRUE;
         $config['mailtype'] = 'html';

         $this->email->initialize($config);

         foreach ($conference as $conferences)
         {
            $conference_attendance = $this->conference_model->get_attendences($conferences, NULL, NULL);

            foreach ($conference_attendance->result() as $attendance)
            {
               if ( ! is_null($expectant_id))
               {
                  if ($expectant_id === $attendance->key_e_expectant)
                  {
                     $data['info_atendance'] = $attendance;

                     $email_content = $this->load->view('content_email/recognition', $data, TRUE);

                     $this->email->clear();
                     $this->email->from($this->config->item('sender_email'), $this->config->item('sender_name'));
                     $this->email->to($attendance->email_expectant);
                     $this->email->subject('Semana del Administrador 2019');
                     $this->email->message($email_content);
                     if ($this->email->send())
                     {
                        $this->load->model('expectant/expectant_model');
                        $expectant = $this->expectant_model->get_id($expectant_id);

                        $info_attendance = [
                           'conference_attendance' => $conferences,
                           'expectant_attendance'  => $expectant->row()->id_expectant
                        ];
                        $new_status_email = ['email_attendance' => '1'];

                        $this->conference_model->status_email_atendance($info_attendance, $new_status_email);

                        $recognition_send = $this->conference_model->get_recognition_send($conferences);

                        if ($conference_attendance->num_rows() -1 <= $recognition_send->num_rows())
                        {
                           $new_status_email = ['email_conference' => '2'];
                           $this->conference_model->status_email_conference($conferences, $new_status_email);
                        }
                        redirect('conference/expectant/'.$conferences, 'refresh');
                     }
                  }
               }
               else
               {
                  $new_status_email = ['email_conference' => '1'];
                  $this->conference_model->status_email_conference($conferences, $new_status_email);
               }
            }
         }
         redirect('conference', 'refresh');
      }


      function get_info()
      {
         $txt_sender = $this->input->post('txtsender');

         $auto_complete = [
            'id_conference'         => $this->input->post('txtconference'),
            'tittle_conference'     => mb_strtoupper($this->input->post('txttittle')),
            'speaker_conference'    => mb_strtoupper($this->input->post('txtspeaker')),
            'auditorium_conference' => $this->input->post('txtauditorium'),
            'hour_conference'       => $this->input->post('txthour'),
            'day_conference'        => $this->input->post('txtday'),
            'month_conference'      => $this->input->post('txtmonth'),
            'year_conference'       => $this->input->post('txtyear'),
            'status_conference'     => $this->input->post('txtstatus'),
            'iduser_conference'     => $this->session->iduser
         ];

         switch ($txt_sender)
         {
            case '0':

            $check_conference = $this->conference_model->get_conferences(NULL, NULL, $auto_complete, NULL, NULL);

            if ($check_conference->num_rows() > 0)
            {
               $data['fail_time'] = TRUE;
               $data['allconference'] = $this->conference_model->get_conferences();
               $this->load->view('conference/index', $data);
            }
            else
            {
               $last_conference = $this->conference_model->get_last_conference();

               foreach ($last_conference as $id)
               {
                  if ($id === NULL)
                  {
                     $next_conference = 1;
                  }
                  else
                  {
                     $next_conference = $id->id_conference + 1;
                  }
               }

               $auto_complete['key_e_conference'] = md5($next_conference);

               $this->conference_model->insert_conference($auto_complete);

               $data['succes_conference'] = TRUE;
               $data['allconference']     = $this->conference_model->get_conferences();

               $this->load->view('conference/index', $data);

               $auto_complete = FALSE;
            }


            break;

            case '1':

            $this->conference_model->update_conference($auto_complete);

            $data['update_conference'] = TRUE;
            $data['allconference']     = $this->conference_model->get_conferences();

            $this->load->view('conference/index', $data);

            $auto_complete = FALSE;

            break;

            default:

            echo "Error de direccionamiento";

            break;
         }
      }
   }

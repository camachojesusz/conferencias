<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Send_recognition extends CI_Controller
   {

      function __construct()
      {
         parent:: __construct();
         $this->load->model('conference/conference_model');
      }

      function index()
      {
         $get_conference = $this->conference_model->get_conferences(NULL, NULL, NULL, NULL, '1');

         $this->config->load('email');
         $this->load->library('email');


         $config['wordwrap'] = TRUE;
         $config['mailtype'] = 'html';

         $this->email->initialize($config);

         foreach ($get_conference->result() as $conferences)
         {
            $info_attendance = $this->conference_model->get_attendences($conferences->id_conference, NULL, '0');

            foreach ($info_attendance->result() as $info_attendances)
            {
               $data['info_atendance'] = $info_attendances;

               $email_content = $this->load->view('content_email/recognition', $data, TRUE);

               $this->email->clear();
               $this->email->from($this->config->item('sender_email'), $this->config->item('sender_name'));
               $this->email->to($info_attendances->email_expectant);
               $this->email->subject('Semana del Administrador 2019');
               $this->email->message($email_content);
               if ($this->email->send())
               {
                  $this->load->model('expectant/expectant_model');
                  $expectant = $this->expectant_model->get_id($info_attendances->key_e_expectant);

                  $info_attendance = [
                     'conference_attendance' => $conferences->id_conference,
                     'expectant_attendance'  => $expectant->row()->id_expectant
                  ];
                  $new_status_email = ['email_attendance' => '1'];

                  $this->conference_model->status_email_atendance($info_attendance, $new_status_email);

                  $num_attendance = $this->conference_model->get_attendences($conferences->id_conference, NULL);
                  $recognition_send = $this->conference_model->get_recognition_send($conferences->id_conference);

                  if ($num_attendance->num_rows() - 1 <= $recognition_send->num_rows())
                  {
                     $new_status_email = ['email_conference' => '2'];
                     $this->conference_model->status_email_conference($conferences->id_conference, $new_status_email);
                  }
               }
               echo "<hr>";
echo "Num asistencias a conferencias = ".$num_attendance->num_rows();
echo "<br>";
echo "Num Reconocimientos enviados = ".$recognition_send->num_rows();
echo "<br>.- Enviado";
echo "<hr>";

            }
         }
      }

      public function mi_prueba()
      {
         $email_content = 'MI Prueba';
         $this->email->clear();
         $this->email->from($this->config->item('sender_email'), $this->config->item('sender_name'));
         $this->email->to('jesus@gmail.com');
         $this->email->subject('Semana del Administrador 2019');
         $this->email->message($email_content);
         if ($this->email->send()
         {
            echo 'ok';
            return;
         }
         else
         {
            echo 'no enviado';
            return;
         }
      }
   }

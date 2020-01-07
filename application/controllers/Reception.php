<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Reception extends CI_Controller
   {

      function __construct()
      {
         parent:: __construct();
         $this->load->model('conference/conference_model');
			if(!isset($_SESSION['status_session']))
			{
				redirect("login", "refresh");
			}
      }

      function index()
      {
         $data['allconference'] = $this->conference_model->get_conferences(NULL, NULL, NULL, '1', NULL);
         $this->load->view('reception/index', $data);
      }

      function scan($conference)
      {
         $data['conference_id']   = $conference;
         $data['info_conference'] = $this->conference_model->get_conferences($data['conference_id'], NULL, NULL, '1', NULL);
         if ($data['info_conference']->num_rows() > 0)
         {
            $this->load->view('reception/scan', $data);
         }
         else
         {
            redirect('login/logout', 'refresh');
         }
      }

      function registry()
      {
         $this->load->model('reception/reception_model');
         $expectant  = $this->input->post('expectant');
         $conference = $this->input->post('conference');
         $last_attendance = $this->reception_model->get_last_attendance();
         $next_attendance = $last_attendance->row('id_attendance') + 1;
         $expectant = $this->reception_model->get_expectant($expectant);

         if ($expectant->num_rows() > 0)
         {
            $info_atendance = [
               'key_attendance'        => md5($next_attendance),
               'conference_attendance' => $conference,
               'expectant_attendance'  => $expectant->row()->id_expectant,
               'status_attendance'     => '1',
               'iduser_attendance'     => $_SESSION['iduser']
            ];
            $check_attendance = $this->reception_model->get_attendance($info_atendance['expectant_attendance'], $conference);
            if ($check_attendance->num_rows() > 0)
            {
               echo 'ERROR: Asistente ya registrado';
               return;
            }
            else
            {
               $this->reception_model->insert_attendance($info_atendance);
               $info_atendance = FALSE;
               echo 'CORRECTO: Registro exitoso';
               return;
            }
         }
         echo 'ERROR: Asistente no encontrado';
         return;
      }

		function registry_by_account()
		{
			$this->load->model('reception/reception_model');
         $expectant  = md5($this->input->post('expectant'));
         $conference = $this->input->post('conference');
         $last_attendance = $this->reception_model->get_last_attendance();
         $next_attendance = $last_attendance->row('id_attendance') + 1;
         $expectant = $this->reception_model->get_expectant($expectant);
         if ($expectant->num_rows() > 0)
         {
            $info_atendance = [
               'key_attendance'        => md5($next_attendance),
               'conference_attendance' => $conference,
               'expectant_attendance'  => $expectant->row()->id_expectant,
               'status_attendance'     => TRUE,
               'iduser_attendance'     => $_SESSION['iduser']
            ];
            $check_attendance = $this->reception_model->get_attendance($info_atendance['expectant_attendance'], $conference);
            if ($check_attendance->num_rows() > 0)
            {
               echo 'ERROR: Asistente ya registrado';
               return;
            }
            else
            {
               $this->reception_model->insert_attendance($info_atendance);
               $info_atendance = FALSE;
               echo 'CORRECTO: Registro exitoso';
               return;
            }
         }
         echo 'ERROR: Asistente no encontrado';
         return;
		}
   }

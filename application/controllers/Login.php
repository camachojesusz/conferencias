<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

   class Login extends CI_Controller
   {
      function __construct()
      {
         parent:: __construct();
			$this->load->model(['login/login_model', 'users/sessions_model']);
      }

      function index()
      {
         $this->load->view('login/index');
      }

      function is_post()
      {
         $auto_complete = [
            'username_users' => $this->input->post('txtuser'),
            'pass_users' => $this->input->post('txtpass')
         ];

         $check_user = $this->login_model->get_user($auto_complete['username_users'], NULL);

         if ($check_user->num_rows() > 0)
         {
            foreach ($check_user->result() as $info_user)
            {
               if (password_verify($auto_complete['pass_users'], $info_user->pass_users))
               {
                  $_SESSION['status_session'] = TRUE;
                  $_SESSION['iduser']         = $info_user->id_users;
                  $_SESSION['profile']        = $info_user->profile_users;
                  $_SESSION['name']           = $info_user->name_users;

						$this->sessions_model->update();

                  switch ($_SESSION['profile'])
                  {
                     case '1':
                        redirect('home_ad', 'refresh');
                        break;
                     case '2':
                        redirect('reception', 'refresh');
                        break;

                     default:
                        echo "Error";
                        break;
                  }
               }
               else
               {
                  $data['fail_user'] = TRUE;
                  $this->load->view('login/index', $data);
               }
            }
         }
         else
         {
            $data['fail_user'] = TRUE;
            $this->load->view('login/index', $data);
         }
      }

      function logout()
      {
			$this->session->sess_destroy();
         redirect(base_url().'login', 'refresh');
      }
   }


<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Users extends CI_Controller
   {

      function __construct()
      {
         parent:: __construct();
         $this->load->model('users/users_model');
         if (!isset($_SESSION['status_session']) OR $_SESSION['profile'] != 1)
         {
            redirect(base_url()."login", "refresh");
         }
      }

      function index()
      {
         $data['allprofile'] = $this->users_model->get_profile();
         $data['alluser'] = $this->users_model->get_user_profile();
         $this->load->view('users/index', $data);
      }

      function is_post()
      {
         $txt_sender = $this->input->post('txtsender');

         $txt_pass1 = $this->input->post('txtpass1');
         $txt_pass2 = $this->input->post('txtpass2');

         if (strcmp($txt_pass1, $txt_pass2))
         {
            $data['fail_pass_save']  = TRUE;
            $data['allprofile'] = $this->users_model->get_profile();
            $data['alluser']    = $this->users_model->get_user_profile();
            $this->load->view('users/index', $data);
         }
         else
         {
            $auto_complete = [
               'id_users'         => $this->input->post('txtuser'),
               'name_users'       => mb_strtoupper($this->input->post('txtname')),
               'secondname_users' => mb_strtoupper($this->input->post('txtsecondname')),
               'username_users'   => $this->input->post('txtusername'),
               'pass_users'       => password_hash($txt_pass1, PASSWORD_DEFAULT),
               'profile_users'    => $this->input->post('txtprofile'),
               'status_users'     => $this->input->post('txtstatus'),
               'iduser_users'     => $_SESSION['iduser']
            ];

            switch ($txt_sender)
            {
               case '0':

                  $check_user = $this->users_model->get_users($auto_complete['username_users']);
                  if ($check_user->num_rows() > 0)
                  {
                     $data['fail_user']  = TRUE;
                     $data['allprofile'] = $this->users_model->get_profile();
                     $data['alluser']    = $this->users_model->get_user_profile();
                     $this->load->view('users/index', $data);
                  }
                  else
                  {
                     $this->users_model->insert_user($auto_complete);
                     $data['success_user']  = TRUE;
                     $data['allprofile'] = $this->users_model->get_profile();
                     $data['alluser']    = $this->users_model->get_user_profile();
                     $this->load->view('users/index', $data);
                     $auto_complete = FALSE;
                  }

                  break;

               case '1':

                  $this->users_model->update_user($auto_complete);
                  $data['success_update_user']  = TRUE;
                  $data['allprofile'] = $this->users_model->get_profile();
                  $data['alluser']    = $this->users_model->get_user_profile();
                  $this->load->view('users/index', $data);
                  $auto_complete = FALSE;
                  break;

               default:
                  echo "Error de direccionamiento";
                  break;
            }
         }
      }
   }

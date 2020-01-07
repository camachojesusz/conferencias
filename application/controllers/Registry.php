<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registry extends CI_Controller
{
   function __construct()
   {
      parent:: __construct();
      $this->load->model('registry/registry_model');
      $this->load->library('encryption');
   }

   function index()
   {
      $this->load->view('registry/index');
   }

   function edit($key)
   {
      $data['auto_complete'] = $this->registry_model->get_expectant(NULL, NULL, $key);
      $this->load->view('registry/edit', $data);
   }

   function confirm()
   {
      $this->load->view('registry/confirm');
   }

   function privacy()
   {
      $this->load->view('registry/rules');
   }

   function is_post()
   {

      $this->load->library('form_validation');

      $this->form_validation->set_rules('txtregisterkey1', 'Número de Control / Clave', 'required|min_length[8]|max_length[10]|is_unique[expectant.registerkey_expectant]', ['is_unique' => '<li>El %s ingresado ya existe en los registros</li>', 'required' => '<li>Campo requerido (%s)</li>', 'min_length' => '<li>Longitud mínima no valida en %s</li>', 'max_length' => '<li>Longitud máxima no valida en %s</li>']);
      $this->form_validation->set_rules('txtregisterkey2', 'Número de Control / Clave', 'required|matches[txtregisterkey1]', ['required' => '<li>Campo requerido (%s)</li>', 'min_length' => '<li>Longitud mínima no valida en %s</li>', 'max_length' => '<li>Longitud máxima no valida en %s</li>', 'matches' => '<li>Los campos de %s no coinciden</li>']);
      $this->form_validation->set_rules('txtname', 'Nombre(s)', 'required', ['required' => '<li>Campo requerido (%s)</li>']);
      $this->form_validation->set_rules('txtsecondname', 'Apellidos', 'required', ['required' => '<li>Campo requerido (%s)</li>']);
      $this->form_validation->set_rules('txtcarrier', 'Carrera', 'required', ['required' => '<li>Campo requerido (%s)</li>']);
      $this->form_validation->set_rules('txtgroup', 'Grupo', 'required', ['required' => '<li>Campo requerido (%s)</li>']);
      $this->form_validation->set_rules('txtemail', 'Correo Electrónico', 'required|valid_email|is_unique[expectant.email_expectant]', ['is_unique' => '<li>El %s ingresado ya existe en los registros</li>', 'required' => '<li>Campo requerido (%s)</li>']);
      $this->form_validation->set_rules('txtemail2', 'Correo Electrónico', 'required|valid_email|matches[txtemail]', ['required' => '<li>Campo requerido (%s)</li>', 'matches' => '<li>El %s no coincide</li>']);

      $txt_sender       = $this->input->post('txtsender');
      $txt_registerkey1 = $this->input->post('txtregisterkey1');
      $txt_email1       = $this->input->post('txtemail');
      $qr_content       = md5($txt_registerkey1);

      $auto_complete = [
         'registerkey_expectant' => $txt_registerkey1,
         'key_e_expectant'       => $qr_content,
         'name_expectant'        => mb_strtoupper($this->input->post('txtname')),
         'secondname_expectant'  => mb_strtoupper($this->input->post('txtsecondname')),
         'email_expectant'       => $txt_email1,
         'group_expectant'       => $this->input->post('txtgroup'),
         'carrier_expectant'     => $this->input->post('txtcarrier')
      ];

      if ($this->form_validation->run() === FALSE)
      {
         $this->load->view('registry/index', $auto_complete);
      }
      else
      {
         switch ($txt_sender)
         {
            case '0':
            $this->load->library('QR_BarCode');

            $ctrl_insert = $this->registry_model->insert_expectant($auto_complete);

            $this->qr_barcode->text($auto_complete['key_e_expectant']);
            $this->qr_barcode->qrcode(350, 'assets/img/qr_expectant/'.$auto_complete['key_e_expectant'].'.png');

            $this->config->load('email');
            $this->load->library('email');

            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $data['registerkey'] = $auto_complete['registerkey_expectant'];
            $data['key_e']       = $auto_complete['key_e_expectant'];
            $data['name']        = $auto_complete['name_expectant'];
            $data['secondname']  = $auto_complete['secondname_expectant'];
            $data['email']       = $auto_complete['email_expectant'];
            $data['group']       = $auto_complete['group_expectant'];
            $data['carrier']     = $auto_complete['carrier_expectant'];

            $email_content = $this->load->view('content_email/confirm_qr', $data, TRUE);

            $this->email->initialize($config);
            $this->email->from($this->config->item('sender_email'), $this->config->item('sender_name'));
            $this->email->to($auto_complete['email_expectant']);
            $this->email->subject('Semana del Administrador 2019');
            $this->email->message($email_content);
            $this->email->attach(base_url().'assets/img/qr_expectant/'.$auto_complete['key_e_expectant'].'.png');
            $this->email->send();

            redirect('registry/confirm', 'refresh');


            break;

            case '1':

            $key = $this->uri->segment(3, 0);

            $get_expetant = $this->registry_model->get_expectant(NULL, NULL, $key);

            if ($get_expetant->num_rows() > 0)
            {
               $this->load->library('QR_BarCode');

               $ctrl_update = $this->registry_model->update_expectant($auto_complete, $key);

               $this->qr_barcode->text($auto_complete['key_e_expectant']);
               $this->qr_barcode->qrcode(350, 'assets/img/qr_expectant/'.$auto_complete['key_e_expectant'].'.png');

               $this->config->load('email');
               $this->load->library('email');

               $config['wordwrap'] = TRUE;
               $config['mailtype'] = 'html';

               $data['registerkey'] = $auto_complete['registerkey_expectant'];
               $data['key_e']       = $auto_complete['key_e_expectant'];
               $data['name']        = $auto_complete['name_expectant'];
               $data['secondname']  = $auto_complete['secondname_expectant'];
               $data['email']       = $auto_complete['email_expectant'];
               $data['group']       = $auto_complete['group_expectant'];
               $data['carrier']     = $auto_complete['carrier_expectant'];

               $email_content = $this->load->view('content_email/confirm_qr', $data, TRUE);

               $this->email->initialize($config);
               $this->email->from($this->config->item('sender_email'), $this->config->item('sender_name'));
               $this->email->to($auto_complete['email_expectant']);
               $this->email->subject('Semana del Administrador 2019');
               $this->email->message($email_content);
               $this->email->attach(base_url().'assets/img/qr_expectant/'.$auto_complete['key_e_expectant'].'.png');
               $this->email->send();

               redirect('registry/confirm', 'refresh');

            }
            break;

            default:
            echo "Error";
            break;
         }
      }
   }
}

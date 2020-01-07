<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Expectant extends CI_Controller
   {

      function __construct()
      {
         parent:: __construct();
         $this->load->model('expectant/expectant_model');
         if (!isset($_SESSION['status_session']) OR $_SESSION['profile'] != 1)
         {
            redirect(base_url()."login", "refresh");
         }
      }

      function index()
      {
         $data['allexpetant'] = $this->expectant_model->get_expectant();
         $this->load->view('expectant/index', $data);
      }

      function edit($expectant_id = NULL)
      {
         $data['allexpetant'] = $this->expectant_model->get_expectant($expectant_id);
         $this->load->view('expectant/edit', $data);
      }

      function set_info()
      {
         $this->load->library('form_validation');

         $this->form_validation->set_rules('txtname', 'Nombre(s)', 'required', ['required' => 'Campo requerido (%s)']);
         $this->form_validation->set_rules('txtsecondname', 'Apellidos', 'required',  ['required' => 'Campo requerido (%s)']);
         $this->form_validation->set_rules('txtcarrier', 'Carrera', 'required',  ['required' => 'Campo requerido (%s)']);
         $this->form_validation->set_rules('txtgroup', 'Grupo', 'required',  ['required' => 'Campo requerido (%s)']);
         $this->form_validation->set_rules('txtemail', 'Correo Electrónico', 'required|valid_email',  ['required' => 'Campo requerido (%s)', 'valid_email' => 'Correo inválido']);


         if ($this->form_validation->run() === FALSE)
         {
            $key = $this->input->post('key');
            redirect('expectant/edit/'.$key, 'refresh');
         }
         else
         {
            $info_expetant = [
               'name_expectant'       => mb_strtoupper($this->input->post('txtname')),
               'secondname_expectant' => mb_strtoupper($this->input->post('txtsecondname')),
               'email_expectant'      => $this->input->post('txtemail'),
               'group_expectant'      => $this->input->post('txtgroup'),
               'carrier_expectant'    => $this->input->post('txtcarrier'),
               'iduser_expectant'     => $this->session->iduser
            ];

            $expectant_id = $this->input->post('txtregisterkey');

            $this->expectant_model->edit($info_expetant, $expectant_id);
            redirect('expectant/index', 'refresh');
         }
      }
   }

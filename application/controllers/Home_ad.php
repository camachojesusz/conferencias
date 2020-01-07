<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Home_ad extends CI_Controller
   {
      function __construct()
      {
         parent:: __construct();
         $this->load->model('homadmon_model');
         if (!isset($_SESSION['status_session']) OR $_SESSION['profile'] != 1)
         {
            redirect(base_url()."login", "refresh");
         }
      }

      function index()
      {
         $data['count_conference'] = $this->homadmon_model->count_conference();
         $data['count_expectant']  = $this->homadmon_model->count_expectant();
         $data['count_users']      = $this->homadmon_model->count_users();

         $this->load->view('home/index2', $data);
      }
   }

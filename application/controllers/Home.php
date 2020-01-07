<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
   function __construct()
   {
      parent:: __construct();
      $this->load->model('conference/conference_model');
   }

   function index()
   {
      $this->load->view('home/index');
   }

   function recognition($conference = NULL, $expectant_id = NULL)
   {
      $conference = str_split($conference);
      foreach ($conference as $conferences)
      {
         $conference_attendance = $this->conference_model->get_attendences($conferences, NULL);

         foreach ($conference_attendance->result() as $attendance)
         {
            if ($expectant_id === $attendance->key_e_expectant)
            {
               $cont_message1 = utf8_decode($attendance->name_expectant." ".$attendance->secondname_expectant);
               $cont_message2 = utf8_decode('Por su asistencia a la conferencia: '.$attendance->tittle_conference.', realizada el '.$attendance->day_conference.' de '.$attendance->month_conference.' durante la Semana del Administrador 2019.');
               $cont_message3 = utf8_decode('L.A. EVARISTO JIMÉNEZ LÓPEZ JEFE DE DIVISIÓN DE LA LICENCIATURA EN ADMINISTRACIÓN');
               $cont_message4 = 'La Finca, Villa Guerrero a '.$attendance->day_conference.' de '.$attendance->month_conference.' de '.$attendance->year_conference.'.';
            }
         }
      }


      $img  = base_url().'assets/img/plantilla.jpg';
      $img1 = base_url().'assets/img/firma.png';

      $this->load->library('fpdf');

      $this->fpdf->AddPage();
      $this->fpdf->SetFont('arial', '', 16);

      $this->fpdf->image($img ,0 ,0 ,216);

      $this->fpdf->SetXY(86, 120);
      $this->fpdf->Cell(50, 10, $cont_message1, 0, 1, 'C');

      $this->fpdf->SetXY(15, 145);
      $this->fpdf->MultiCell(185, 6, $cont_message2, 0, 'C',0);

      $this->fpdf->image($img1 ,65 ,175 ,100);

      $this->fpdf->SetXY(15, 230);
      $this->fpdf->MultiCell(185, 6, $cont_message3, 0, 'C',0);

      $this->fpdf->SetXY(95, 250);
      $this->fpdf->Cell(85, 6, $cont_message4, 0, 1, 'C');

      $this->fpdf->Output();
   }
}

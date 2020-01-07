<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Infopdf_model extends CI_Model
{

   private $table_attendance;
   private $table_expectant;
   private $table_conference;

   function __construct()
   {
      parent:: __construct();

      $this->table_attendance = 'attendance';
      $this->table_expectant = 'expectant';
      $this->table_conference = 'conference';
   }

   function get_attendance($id = NULL)
   {

      $this->db->from($this->table_attendance);

      $this->db->join($this->table_expectant, $this->table_attendance.'.expectant_attendance = '.$this->table_expectant.'.id_expectant');
      $this->db->join($this->table_conference, $this->table_attendance.'.conference_attendance = '.$this->table_conference.'.id_conference');

      if ($id != NULL)
      {
         $this->db->where($this->table_attendance.'.key_attendance', $id);
      }

      return $this->db->get()->result();

   }
}

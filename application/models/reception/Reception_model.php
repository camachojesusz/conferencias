<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   class Reception_model extends CI_MODEL
   {
      private $table_expectant;
      private $table_conference;
      private $table_attendance;

      function __construct()
      {
         parent:: __construct();
         $this->table_expectant = 'expectant';
         $this->table_conference = 'conference';
         $this->table_attendance = 'attendance';
      }

      function get_attendance($expectant=NULL, $conference=NULL)
      {
         if ($expectant != NULL)
         {
            $this->db->where('expectant_attendance', $expectant);
         }
         if ($conference != NULL)
         {
            $this->db->where('conference_attendance', $conference);
         }
         return $this->db->get($this->table_attendance);
      }

      function get_last_attendance()
      {
         $this->db->select_max('id_attendance');
         return $this->db->get($this->table_attendance);
      }

      function get_expectant($key = NULL)
      {
         $this->db->select('id_expectant');
         if ($key != NULL)
         {
            $this->db->where('key_e_expectant', $key);
         }
         return $this->db->get($this->table_expectant);
      }

      function insert_attendance($info_attendance)
      {
         $this->db->insert($this->table_attendance ,$info_attendance);
         return $this->db->insert_id();
      }
   }

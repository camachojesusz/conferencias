<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   class Conference_model extends CI_Model
   {
      private $table_conference;
      private $table_attendance;
      private $table_expectant;

      function __construct()
      {
         parent:: __construct();
         $this->table_conference = 'conference';
         $this->table_attendance = 'attendance';
         $this->table_expectant  = 'expectant';
      }

      function open_conference($conference_id, $new_status)
      {
         $this->db->where('key_e_conference', $conference_id);
         return $this->db->update($this->table_conference, $new_status);
      }

      function status_email_atendance($info_attendance, $new_status_email)
      {
         $this->db->where('conference_attendance', $info_attendance['conference_attendance']);
         $this->db->where('expectant_attendance', $info_attendance['expectant_attendance']);

         return $this->db->update($this->table_attendance, $new_status_email);
      }

      function status_email_conference($conference_id, $new_status_email)
      {
         $this->db->where('id_conference', $conference_id);

         return $this->db->update($this->table_conference, $new_status_email);
      }

      function get_recognition_send($conference_id = NULL)
      {
         $this->db->distinct();

         $this->db->select('conference_attendance, expectant_attendance');

         if ($conference_id != NULL)
         {
            $this->db->where('conference_attendance', $conference_id);
         }
         $this->db->where('email_attendance', '1');

         return $this->db->get($this->table_attendance);
      }

      function get_attendences($conference_id = NULL, $expectant_id = NULL, $status_email = NULL)
      {
         $this->db->distinct();

         $this->db->select($this->table_expectant.".registerkey_expectant, ".$this->table_expectant.".key_e_expectant, ".$this->table_expectant.".name_expectant, ".$this->table_expectant.".secondname_expectant, ".$this->table_expectant.".email_expectant, ".$this->table_expectant.".group_expectant, ".$this->table_expectant.".carrier_expectant, ".$this->table_conference.".id_conference, ".$this->table_conference.".key_e_conference, ".$this->table_conference.".tittle_conference,".$this->table_conference.".day_conference, ".$this->table_conference.".month_conference, ".$this->table_conference.".year_conference, ".$this->table_conference.".email_conference, ".$this->table_attendance.".email_attendance");

         $this->db->join($this->table_attendance, $this->table_attendance.".expectant_attendance = ".$this->table_expectant.".id_expectant");
         $this->db->join($this->table_conference, $this->table_attendance.".conference_attendance = ".$this->table_conference.".id_conference");


         if ($conference_id != NULL)
         {
            $this->db->where($this->table_conference.'.id_conference', $conference_id);
         }

         if ($expectant_id != NULL)
         {
            $this->db->where($this->table_expectant.'.id_expectant', $expectant_id);
         }

         if ($status_email != NULL)
         {
            $this->db->limit(30);
            $this->db->where($this->table_attendance.'.email_attendance', $status_email);
         }
         return $this->db->get($this->table_expectant);
      }

      function get_attendance($id = NULL, $key_e_conference = NULL, $attendance = NULL)
      {

         $this->db->from($this->table_attendance);

         $this->db->join($this->table_expectant, $this->table_attendance.'.expectant_attendance = '.$this->table_expectant.'.id_expectant');
         $this->db->join($this->table_conference, $this->table_attendance.'.conference_attendance = '.$this->table_conference.'.id_conference');

         if ($id != NULL)
         {
            $this->db->where($this->table_attendance.'.conference_attendance', $id);
         }

         if ($key_e_conference != NULL)
         {
            $this->db->where($this->table_conference.'.key_e_conference', $key_e_conference);
         }

         if ($attendance != NULL)
         {
            $this->db->where($this->table_attendance.'.key_attendance', $attendance);
         }

         return $this->db->get();

      }

      function get_last_conference()
      {
         $this->db->select_max('id_conference');

         $query = $this->db->get($this->table_conference);

         return $query->result();
      }

      function get_conferences($id = NULL, $key_e_conference = NULL, $info_conference = NULL, $open_conference = NULL, $status_email = NULL)
      {
         $this->db->select('*');

         if ($id != null)
         {
            $this->db->where('id_conference', $id);
         }

         if ($key_e_conference != NULL)
         {
            $this->db->where('key_e_conference', $key_e_conference);
         }

         if ($info_conference != NULL)
         {
            $this->db->where('auditorium_conference', $info_conference['auditorium_conference']);
            $this->db->where('hour_conference', $info_conference['hour_conference']);
            $this->db->where('day_conference', $info_conference['day_conference']);
            $this->db->where('month_conference', $info_conference['month_conference']);
            $this->db->where('year_conference', $info_conference['year_conference']);
         }

         if ($open_conference != NULL)
         {
            $this->db->where('open_conference', $open_conference);
         }

         if ($status_email)
         {
            $this->db->limit(1);
            $this->db->where('email_conference', $status_email);
         }

         $this->db->where('status_conference', '1');

         return $this->db->get($this->table_conference);

      }

      function insert_conference($info_conference)
      {

         $ctrl_insert = $this->db->insert($this->table_conference, $info_conference);

         return $ctrl_insert;

      }

      function update_conference($info_conference)
      {
         $this->db->where('id_conference', $info_conference['id_conference']);
         $str = $this->db->update($this->table_conference, $info_conference);

         return $str;
      }
   }

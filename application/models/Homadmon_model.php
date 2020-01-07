<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   class Homadmon_model extends CI_MODEL
   {
      private $table_conference;
      private $tale_expectant;
      private $table_users;

      function __construct()
      {
         parent:: __construct();
         $this->table_conference = 'conference';
         $this->table_expectant  = 'expectant';
         $this->table_users     = 'users';
      }

      function count_conference()
      {
         $this->db->distinct();
         $this->db->select('key_e_conference');
         return $this->db->get($this->table_conference);
      }

      function count_expectant()
      {
         $this->db->distinct();
         $this->db->select('registerkey_expectant');
         return $this->db->get($this->table_expectant);
      }

      function count_users()
      {
         $this->db->distinct();
         $this->db->select('username_users');
         return $this->db->get($this->table_users);
      }
   }

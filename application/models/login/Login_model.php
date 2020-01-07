<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   class Login_model extends CI_Model
   {
      private $table_users;

      function __construct()
      {
         parent:: __construct();
         $this->table_users = 'users';
      }

      function get_user($username = NULL, $pass = NULL)
      {

         $this->db->from($this->table_users);

         if ($username != NULL)
         {
            $this->db->where('username_users', $username);
         }

         if ($pass != NULL)
         {
            $this->db->where('pass_users', $pass);
         }

         $this->db->where('status_users', '1');

         return $this->db->get();
      }
   }

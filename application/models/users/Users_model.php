<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   class Users_model extends CI_Model
   {

      private $table_users;
      private $table_profile;
      function __construct()
      {
         parent:: __construct();
         $this->table_users = 'users';
         $this->table_profile = 'profile';
      }

      function get_profile($id = NULL)
      {
         $this->db->select('*');

         if ($id != NULL)
         {
            $this->db->where('id_profile', $id);
         }

         $query = $this->db->get($this->table_profile);

         return $query->result();

      }

      function get_user_profile($id = NULL)
      {

         $this->db->join($this->table_profile, $this->table_profile.'.id_profile = '.$this->table_users.'.profile_users');

         $this->db->where($this->table_users.'.status_users', '1');

         return $this->db->get($this->table_users)->result();
      }

      function get_users($user = NULL)
      {
         $this->db->select('*');

         if ($user != NULL)
         {
            $this->db->where('username_users', $user);
         }

         $query = $this->db->get($this->table_users);

         return $query;
         //return $query->row();
      }

      function insert_user($info_user)
      {
         $this->db->insert($this->table_users, $info_user);
         return TRUE;
      }

      function update_user($info_user)
      {
         $this->db->where('id_users', $info_user['id_users']);
         $str = $this->db->update($this->table_users, $info_user);

         return $str;
      }
   }

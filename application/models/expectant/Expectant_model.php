<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   class Expectant_model extends CI_Model
   {

      private $table_expectant;
      function __construct()
      {
         parent:: __construct();
         $this->table_expectant = 'ia_expectant';
      }

      function get_id($expectant_id = NULL)
      {
         $this->db->limit(1);
         $this->db->select('id_expectant');
         if ($expectant_id != NULL)
         {
            $this->db->where('key_e_expectant', $expectant_id);
         }

         return $this->db->get($this->table_expectant);
      }

      function get_expectant($expectant_id = NULL)
      {
         $this->db->distinct();
         $this->db->select('registerkey_expectant, key_e_expectant, name_expectant, secondname_expectant, group_expectant, carrier_expectant, email_expectant');
         if ($expectant_id != NULL)
         {
            $this->db->where('key_e_expectant', $expectant_id);
         }
         return $this->db->get($this->table_expectant)->result();
      }

      function edit($info_expetant, $expectant_id)
      {
         $this->db->where('registerkey_expectant', $expectant_id);
         return $this->db->update($this->table_expectant, $info_expetant);
      }
   }

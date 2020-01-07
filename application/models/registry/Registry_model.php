<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registry_model extends CI_Model
{

  private $table_expectant;

  function __construct()
  {
    parent:: __construct();
    $this->table_expectant = 'expectant';
  }

  function get_expectant($registerkey = NULL, $email = NULL, $key_e = NULL)
  {

    $this->db->select('*');

    if ($registerkey != NULL)
    {
      $this->db->where('registerkey_expectant', $registerkey);
    }

    if ($email != NULL)
    {
      $this->db->where('email_expectant', $email);
    }

    if ($key_e != NULL)
    {
      $this->db->where('key_e_expectant', $key_e);
    }

    return $this->db->get($this->table_expectant);

  }

  function insert_expectant($info_expectant)
  {
    $ctrl_insert = $this->db->insert($this->table_expectant, $info_expectant);

    $this->db->select('registerkey_expectant');
    $this->db->select_max('id_expectant');
    $this->db->from($this->table_expectant);

    $query = $this->db->get();

    return $query->result();
  }

  function update_expectant($info_expectant, $key)
  {

      $this->db->where('key_e_expectant', $key);

      $str = $this->db->update($this->table_expectant, $info_expectant);

      return $str;

  }

}

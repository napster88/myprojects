<?php
 class Model extends CI_Model{
   
   public function __construct() {
     parent::__construct();
     $this->load->database('database');
   }
   
   public function insert($table,$data)
   {
     return $this->db->insert($table, $data);
     
   }
   
   public function get_data($table)
   {
     $query = $this->db->get($table);
     return $query->result_array();
     
   }
   
   public function get_gmail_account()
   {
     $query = $this->db->query("SELECT * FROM gmail_accounts WHERE email != '0';");
     return $query->result_array();
   }
   
   
 }
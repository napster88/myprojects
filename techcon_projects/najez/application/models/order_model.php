<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	function addtransaction($title,$slug,$description,$menu_order,$parent,$layout,$status){
		$data = array(
		   'title' => $title ,
		   'slug' => $slug ,
		   'description' => $description,
		   'menu_order' => $menu_order,
		   'parentid' => $parent,
		   'layout' => $layout,
		   'status' => $status
		  // 'created' => time()
		);

		$query = $this->db->insert('transactions', $data);
		return $query;
	}
	
	function viewtransactions(){
		$this->db->select('*');
		$this->db->from('transactions');
		//$this->db->where('user_type', '2');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	
	function hidetransaction($id){
		$data = array(
		   'status' => 2
		);
		$this->db->where('id', $id);
		$this->db->update('transactions', $data); 
		return $this->db->affected_rows();
	}
	function viewtransaction($id){
		$this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function checkslug($slug){
		$this->db->select('slug');
		$this->db->from('transactions');
		$this->db->where('slug', $slug); 
		return $this->db->count_all_results();
	}
	function update_transaction($title,$description,$menu_order,$parent,$layout,$status,$id){
		$data = array(
		   'title' => $title ,
		  // 'slug' => $slug ,
		   'description' => $description,
		   'menu_order' => $menu_order,
		   'parentid' => $parent,
		   'layout' => $layout,
		   'status' => $status
		  // 'created' => time()
		);
		$this->db->where('id', $id);
		$this->db->update('transactions', $data); 
		return $this->db->affected_rows();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CI_Model {

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
	
	function viewtransactions($id){
				
		$this->db->select('subscription_transaction.*,users.*,subscription_detail.*');
            $this->db->from('subscription_transaction'); 
            $this->db->join('users', 'users.id=subscription_transaction.user_id', 'left');
            $this->db->join('subscription_detail', 'subscription_detail.subscription_id=subscription_transaction.subscription_id', 'left');
			
			if($id!=1)
		$this->db->where('subscription_transaction.user_id',$id);  
          
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
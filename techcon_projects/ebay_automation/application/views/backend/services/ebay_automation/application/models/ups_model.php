<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ups_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	function adduser($emailid,$pass,$cpass,$username,$first_name,$last_name,$role,$status,$path){
		$data = array(
		   'username' => $username ,
		   'emailid' => $emailid ,
		   'fname' => $first_name,
		   'lname' => $last_name,
		   'password' => $pass,
		   'user_type' => $role,
		   'status' => $status,
		   'photo' => $path,
		  // 'created' => time()
		);

		$query = $this->db->insert('users', $data);
		return $query;
	}
	
	function viewups($id){
		
	$this->db->select('account_mapping.*,fake_tracking_number.*');
    $this->db->from('account_mapping');
    $this->db->join('fake_tracking_number', 'account_mapping.account_id = fake_tracking_number.account_id', 'right outer'); 
	$this->db->where('account_mapping.user_id', $id);
    $query = $this->db->get();
    return $query->result();
		
		
		
	}
	function viewupsorder($id,$mode){
		
	$this->db->select('account_mapping.*,order_fulfill.*');
    $this->db->from('account_mapping');
    $this->db->join('order_fulfill', 'account_mapping.account_id = order_fulfill.account_id', 'right outer'); 
	$this->db->where('account_mapping.user_id', $id);
	if($mode!='all')
	$this->db->where('order_fulfill.order_mode',$mode);
    $query = $this->db->get();
    return $query->result();
		
		
		
	}
	
	function hideuser($id){
		$data = array(
		   'status' => 0
		);
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		return $this->db->affected_rows();
	}
	function viewuser($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function update_user($first_name,$last_name,$role,$id){
		$data = array(
		   'fname' => $first_name,
		   'lname' => $last_name,
		   'user_type' => $role
		);
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		return $this->db->affected_rows();
	}
	function update_profile($first_name,$last_name,$path,$username,$user_pass,$role,$id){
		$data = array(
		   'fname' => $first_name,
		   'lname' => $last_name,
		   'username' => $username,
		   'password' => $user_pass,
		   'photo' => $path
		);
		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		return $this->db->affected_rows();
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
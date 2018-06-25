<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backlogin_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	
	function checkuser($emailid,$pass){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('emailid', $emailid); 
		$this->db->where('password', $pass); 
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function check_user_by_id($userid){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $userid); 
		
		
		$query = $this->db->get();
		return $query->result();
	}
	function checkemail($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('emailid', $email);
		$this->db->where('status', '1');
		$query = $this->db->count_all_results();
		return $query;
	}
	function gen_resetcode($email,$code){
		$data = array(
		   'resetcode' => $code
		);
		$this->db->where('emailid', $email);
		$this->db->update('users', $data); 
		return $this->db->affected_rows();
	}
	function checkcode($de_code){
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('resetcode', $de_code);
		$this->db->where('status', '1');
		$query = $this->db->get();
		$data = $query->result();
		$id = $data[0]->id;
		if(!empty($id)){
			$data = array(
			   'resetcode' => ''
			);
			$this->db->where('resetcode', $de_code);
			$this->db->where('id', $id);
			$this->db->update('users', $data); 
			$row = $this->db->affected_rows();
			if($row > 0){
				return $id;
			}else{
				return '0';
			}
		}else{
			return '0';
		}
	}
	function reset_password($password, $cpassword, $userid){
		$data = array(
			   'password' => $password
			);
		$this->db->where('id', $userid);
		$this->db->update('users', $data); 
		return $this->db->affected_rows();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
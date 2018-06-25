<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	function adduser($emailid,$pass,$cpass,$username,$first_name,$last_name,$type,$status,$path,$mobile,$gender){
		$data = array(
		   'username' => $username ,
		   'emailid' => $emailid ,
		   'fname' => $first_name,
		   'lname' => $last_name,
		   'password' => $pass,
		   'user_type' => $type,
		   'status' => $status,
		   'photo' => $path,
		   'mobile' => $mobile,
		   'gender' => $gender,
		  // 'created' => time()
		);

		$query = $this->db->insert('users', $data);
		return $query;
	}
	
	function viewusers(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_type', '2');  
		//$this->db->where('status', '1');
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
	function show_func($id){
		$data = array(
		   'status' => 1
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
	function update_user($first_name,$last_name,$mobile,$gender,$id){
		$data = array(
		   'fname' => $first_name,
		   'lname' => $last_name,
		   'gender' => $gender,
		   'mobile' => $mobile
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
	function checkemail_driver($email){
		$this->db->select('*');
		$this->db->from('drivers');
		$this->db->where('emailid', $email);
		$query = $this->db->count_all_results();
		return $query;
	}
	function checkemail_user($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('emailid', $email);
		$query = $this->db->count_all_results();
		return $query;
	}
	function reg_user($fname,$lname,$email,$pass,$mobile,$gender){
		$data = array(
		   'username' => $email ,
		   'emailid' => $email ,
		   'fname' => $fname,
		   'lname' => $lname,
		   'password' => $pass,
		   'user_type' => 2,
		   'status' => 0,
		   'mobile' => $mobile,
		   'gender' => $gender
		  // 'created' => time()
		);

		$query = $this->db->insert('users', $data);
		return $query;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
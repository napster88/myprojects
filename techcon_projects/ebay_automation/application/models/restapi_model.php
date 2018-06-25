<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restapi_model extends CI_Model {

	function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	
	function checkuser($email,$pass){
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('emailid', $email);
		$this->db->where('password', $pass);
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function get_user($userid){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $userid); 
		$query = $this->db->get();
		$user_info = $query->result();
		//$data = array();
		if(!empty($user_info)){
			$user_info[0]->photo = base_url().$user_info[0]->photo;
			//$data['user_info'] = $user_info[0];
		}
		return $user_info;
	}
	function get_user2($userid){
		$this->db->select('sno as id, username, emailid, first_name, last_name, gender, photo, user_type');
		$this->db->from('users');
		$this->db->where('sno', $userid);
		$query = $this->db->get();
		$userdata = $query->result();
		$userdata[0]->photo = base_url().$userdata[0]->photo;
		return $userdata;
	}
	function add_feedback($feedback,$userID,$caseID){
		$data = array(
		   'feedback' => $feedback
		);
		$this->db->where('id', $userID);
		$this->db->where('case_id', $caseID);
		$this->db->update('party_info', $data); 
		$affect =  $this->db->affected_rows();
		
		$data = array(
		   'userid' => $userID ,
		   'caseid' => $caseID ,
		   'feedback' => $feedback
		  // 'created' => time()
		);
		$query = $this->db->insert('feedback', $data);
		$insert_id = $this->db->insert_id();
		return $affect;
	}
	function user_login( $emailid, $password ){
		$this->db->select('sno');
		$this->db->from('users');
		$this->db->where('emailid', $emailid);
		$this->db->where('password', $password);
		//$this->db->where('status', '1');
		$data = $this->db->count_all_results();
		if($data > 0){
			$this->db->select('sno as id,user_type,gender,party_id');
			$this->db->from('users');
			$this->db->where('emailid', $emailid);
			$this->db->where('password', $password);
			$query = $this->db->get();
			return $query->result();

		}else{
			return '';
		}
	}
	function add_user( $username, $emailid, $first_name, $last_name, $password, $photo, $mobile, $user_type, $gender, $status, $latlng, $total_amount, $user_referral ){
		$data = array(
		   'username' => $username ,
		   'emailid' => $emailid ,
		   'fname' => $first_name,
		   'lname' => $last_name,
		   'password' => $password,
		   'photo' => $photo,
		   'mobile' => $mobile,
		   'gender' => $gender,
		   'latlng' => $latlng,
		   'total_amount' => $total_amount,
		   'referralcode' => $user_referral,
		   'status' => $status,
		   'user_type' => $user_type
		  // 'created' => time()
		);

		$query = $this->db->insert('users', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	function checkemailid($emailid){
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('emailid', $emailid);
		//$this->db->where('status', '1');
		return $this->db->count_all_results();
	}
	function checkmobile($mobile){
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('mobile', $mobile);
		//$this->db->where('status', '1');
		return $this->db->count_all_results();
	}
	function checkreferralcode($referralcode){
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('referralcode', $referralcode);
		//$this->db->where('status', '1');
		return $this->db->count_all_results();
	}
	
	function checkuser_review($videoid, $userid, $video_action){
		$this->db->select('id');
		$this->db->from('video_user_review');
		$this->db->where('videoid', $videoid);
		$this->db->where('video_action', $video_action);
		$this->db->where('userid', $userid);
		return $this->db->count_all_results();
	}
	function adduser_review($videoid, $userid, $video_action, $action_val){
		$data = array(
		   'videoid' => $videoid ,
		   'userid' => $userid ,
		   'video_action' => $video_action,
		   'action_val' => $action_val
		);

		$query = $this->db->insert('video_user_review', $data);
		$insert_id = $this->db->insert_id();
		if($video_action == 'video_star'){
			$this->db->select_avg('action_val');
			$this->db->from('video_user_review');
			$this->db->where('videoid', $videoid);
			$this->db->where('video_action', $video_action);
			//$this->db->where('userid', $userid);
			$query = $this->db->get();
			$rate_data = $query->result();
			$avgrate = $rate_data[0]->action_val;
			$data = array(
               'video_star' => $avgrate
            );
			$this->db->where('id', $videoid);
			$this->db->update('videos', $data); 
		}
		if($video_action == 'video_like'){
			$this->db->select_sum('action_val');
			$this->db->from('video_user_review');
			$this->db->where('videoid', $videoid);
			$this->db->where('video_action', $video_action);
			//$this->db->where('userid', $userid);
			$query = $this->db->get();
			$rate_data = $query->result();
			$avgrate = $rate_data[0]->action_val;
			$data = array(
               'video_like' => $avgrate
            );
			$this->db->where('id', $videoid);
			$this->db->update('videos', $data); 
		}
		if($video_action == 'video_view'){
			$this->db->select_sum('action_val');
			$this->db->from('video_user_review');
			$this->db->where('videoid', $videoid);
			$this->db->where('video_action', $video_action);
			//$this->db->where('userid', $userid);
			$query = $this->db->get();
			$rate_data = $query->result();
			$avgrate = $rate_data[0]->action_val;
			$data = array(
               'video_view' => $avgrate
            );
			$this->db->where('id', $videoid);
			$this->db->update('videos', $data); 
		}
		return  $insert_id;
	}
	function notify_count($userid){
		$this->db->select('id');
		$this->db->from('notifications');
		$this->db->where('userid', $userid);
		$this->db->where('notify_status', '1');
		return $this->db->count_all_results();
	}
	function getnotify($userid){
		$this->db->select('id, userid, notify_action, notify_val, notify_status, created');
		$this->db->from('notifications');
		$this->db->where('userid', $userid);
		//$this->db->where('notify_status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function updatenotify($userid, $notify_id){
		$data = array(
		   'notify_status' => 0
		);
		$this->db->where('userid', $userid);
		$this->db->where('id', $notify_id);
		$this->db->update('notifications', $data); 
		return $this->db->affected_rows();
	}
	
	function token($userID,$token,$device){
		$this->db->select('id');
		$this->db->from('push_notification'); 
		$this->db->where('userid', $userID);  
		$this->db->where('device', $device);  
		$count = $this->db->count_all_results();
		if($count==0){
			$data = array(
			   'userid' => $userID ,
			   'device' => $device ,
			   'device_token' => $token
			  // 'created' => time()
			);
			$query = $this->db->insert('push_notification', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}else{
			$data = array(
			   'device_token' => $token
			);
			$this->db->where('userid', $userID);
			$this->db->where('device', $device);
			$this->db->update('push_notification', $data); 
			return $this->db->affected_rows();
		}
	}
	function set_islogin($id){
		$data = array(
		   'islogin' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('party_info', $data); 
		return $this->db->affected_rows();
	}
	function set_isview($id){
		$data = array(
		   'isview' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('party_info', $data); 
		return $this->db->affected_rows();
	}
	function set_isfeedback($id){
		$data = array(
		   'isfeedback' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('party_info', $data); 
		return $this->db->affected_rows();
	}
	function get_userdata($id){
		$this->db->select('gender,user_type,party_id');
		$this->db->from('users');
		$this->db->where('sno', $id);
		$query = $this->db->get();
		return $query->result();
	}
	function get_userdata2($emailid){
		$this->db->select('gender,user_type');
		$this->db->from('users');
		$this->db->where('emailid', $emailid);
		$query = $this->db->get();
		return $query->result();
	}
	function get_loginuser($id,$userid){
		$this->db->select('id, case_id, photo, fname, mname, lname, gender, marital_status, nationality, emirated_id, emailid, phone, lawyer_name, lawyer_email, lawyer_phone');
		$this->db->from('party_info');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$party_info = $query->result();
		$data = array();
		if(!empty($party_info)){
			$party_info[0]->photo = base_url().$party_info[0]->photo;
			$party_info[0]->party_id = $party_info[0]->id;
			$party_info[0]->id = $userid;
			$data['party_info'] = $party_info[0];
		}
		
		$caseid = $party_info[0]->case_id;
		$this->db->select('case_id as case_number, case_date, location, description, case_category');
		$this->db->from('cases');
		$this->db->where('sno', $caseid); 
		$this->db->where('status', '1'); 
		$query = $this->db->get();
		$case_info = $query->result();
		if(!empty($case_info)){
			$data['case_info'] = $case_info[0];
		}
		return $data;
	}
	function get_loginuser2($userid){
		$this->db->select('sno as id, username, emailid, first_name, last_name, gender, photo, user_type');
		$this->db->from('users');
		$this->db->where('sno', $userid);
		$query = $this->db->get();
		$userdata = $query->result();
		$userdata[0]->photo = base_url().$userdata[0]->photo;
		return $userdata;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
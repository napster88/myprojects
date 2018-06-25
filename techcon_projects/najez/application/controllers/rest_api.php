<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest_api extends CI_Controller {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->model('restapi_model');
		//$this->load->model('login_model');
		//$this->load->model('category_model');
		//$this->load->model('case_model');
    }
	public function token(){
		$postdata = file_get_contents("php://input");
	   $data = json_decode($postdata);
	   $userid = $data->userid;
	   $token = $data->token;
	   $device = $data->device;
	   $result = $this->restapi_model->token($userid,$token,$device);
	   $response_data = array();
	   if($result > 0){
		   $response_data['status_code'] = 200;
			$response_data['status_message'] = 'Success';
	   }else{
			$response_data['status_code'] = -200;
			$response_data['status_message'] = 'Error';
		}
		echo json_encode($response_data);
	}
	public function user($userid){
		//$data = $this->restapi_model->get_userdata($userid);
		$user_data = $this->restapi_model->get_user($userid);
		if(!empty($user_data)){
			$userdata['userdata'] = $user_data[0];
			$userdata['status_code'] = 200;
			$userdata['status_message'] = 'Success';
		}else{
			$userdata['status_code'] = -200;
			$userdata['status_message'] = 'Error';
		}
		echo json_encode($userdata);
	}
	public function userlogin()
    {
       $postdata = file_get_contents("php://input");
	   $data1 = json_decode($postdata);
	   //print_r($data);die();
	   $emailid = $data1->emailid;
	   $password = $data1->password;
	   $data = $this->restapi_model->checkuser( $emailid, $password );
	   if(!empty($data)){
		    $user_data = $this->restapi_model->get_user($data[0]->id);
			if(!empty($user_data)){
				$userdata['userdata'] = $user_data[0];
				$userdata['status_code'] = 200;
				$userdata['status_message'] = 'Success';
			}else{
				$userdata['status_code'] = -200;
				$userdata['status_message'] = 'Error';
			}
			echo json_encode($userdata);
		  
		}else{
			$userdata['status_code'] = -200;
			$userdata['status_message'] = 'Error';
			echo json_encode($userdata);
		}
		
	}
	
	public function userregister(){
		//echo 'post';die();
		$postdata = file_get_contents("php://input");
		 //print_r($postdata);die();
	   $data = json_decode($postdata);
		//print_r($_POST);die();
	   $username = $data->username;
	   $emailid = $data->emailid;
	   $first_name = $data->first_name;
	   $last_name = $data->last_name;
	   $password = $data->password;
	   $photo = $data->photo;
	   $gender = $data->gender;
	   $mobile = $data->mobile;
	   $latlng = $data->latlng;
	   $referralcode = $data->referralcode;
	   	$user_type = 2;
	   $status = 1;
	   $email_count = $this->restapi_model->checkemailid($emailid);
	   if($email_count > 0){
			$userdata['status_code'] = -200;
			$userdata['status_message'] = 'Email already registered.';
			echo json_encode($userdata);
			die();
	   }
	   $mobile_count = $this->restapi_model->checkmobile($mobile);
	   if($mobile_count > 0){
			$userdata['status_code'] = -200;
			$userdata['status_message'] = 'Mobile no. already registered.';
			echo json_encode($userdata);
			die();
	   }
	   if($email_count == 0 && $username_count == 0){
		   if(!empty($photo)){
				$data = str_replace('data:image/png;base64,', '', $photo);
				$encodedData = str_replace(' ', '+', $data);
				$decodedData = base64_decode($encodedData);
				$filename = uniqid().'.jpg'; 
				file_put_contents('././assets/documents/'.$filename,$decodedData);
				if(file_exists("././assets/documents/".$filename)){
					$photo = "assets/documents/".$filename;
				}else{
					$photo = "assets/documents/user-icon.png";
				}
		   }else{
			   $photo = "assets/documents/user-icon.png";
		   }
		   if($referralcode != ''){
				$reffer_count = $this->restapi_model->checkreferralcode($referralcode);
				if($reffer_count > 0){
					$total_amount = 20;
				}else{
					$total_amount = 0;
				}
		   }else{
			   $total_amount = 0;
		   }
		   $user_referral = $username.rand();
		    $data = $this->restapi_model->add_user( $username, $emailid, $first_name, $last_name, $password, $photo, $mobile, $user_type, $gender, $status, $latlng, $total_amount, $user_referral );
		   //print_r($data);die();
			if(!empty($data) && $data>0){
				$user_data = $this->restapi_model->get_user($data);
				if(!empty($user_data)){
					$userdata['userdata'] = $user_data[0];
					$userdata['status_code'] = 200;
					$userdata['status_message'] = 'Success';
				}else{
					$userdata['status_code'] = -200;
					$userdata['status_message'] = 'Error';
				}
				echo json_encode($userdata);
				die();
			}else{
				$userdata['status_code'] = -200;
				$userdata['status_message'] = 'Error';
				echo json_encode($userdata);
			}
	   }else{
				$userdata['status_code'] = -200;
				$userdata['status_message'] = 'Already Registered.';
				echo json_encode($userdata);
		}
	}
	public function feedback()
    {
       $postdata = file_get_contents("php://input");
	   $data = json_decode($postdata);

	   $feedback = $data->response;
	   $userID = $data->userID;
	   $caseID = $data->caseID;
	   $result = $this->restapi_model->add_feedback($feedback,$userID,$caseID);
	   $response_data = array();
	   if($result > 0){
		   $this->restapi_model->set_isfeedback($userID);
		   $response_data['status_code'] = 200;
			$response_data['status_message'] = 'Success';
	   }else{
			$response_data['status_code'] = -200;
			$response_data['status_message'] = 'Error';
		}
		echo json_encode($response_data);
    }
	
	public function user_review(){
		$postdata = file_get_contents("php://input");
		 //print_r($postdata);die();
	    $data = json_decode($postdata);
		//print_r($_POST);die();
	    $videoid = $data->videoid;
	    $video_action = $data->video_action;
	    $action_val = $data->action_val;
	    $userid = $data->userid;
		$count = $this->restapi_model->checkuser_review($videoid, $userid, $video_action);
		if($count == 0){
			$data = $this->restapi_model->adduser_review($videoid, $userid, $video_action, $action_val);
			if($video_action == 'video_view'){
				$this->restapi_model->set_isview($userid);
			}
			if(!empty($data) && $data > 0){
				$userdata['status_code'] = 200;
				$userdata['status_message'] = 'Success';
				echo json_encode($userdata);
			}else{
				$userdata['status_code'] = -200;
				$userdata['status_message'] = 'Error';
				echo json_encode($userdata);
			}
		}else{
			$userdata['status_code'] = -200;
			$userdata['status_message'] = 'Already reviewd this video';
			echo json_encode($userdata);
		}
	}
	private function set_photoupload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = '././assets/documents/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']      = '0';
		$config['overwrite']     = FALSE;

		return $config;
	}
	public function get_notify($userid){
		$notify_data = $this->restapi_model->getnotify($userid);
		$notify_count = $this->restapi_model->notify_count($userid);
		if(!empty($notify_data)){
			$userdata['notify_count'] = $notify_count;
			$userdata['notify_data'] = $notify_data;
			$userdata['status_code'] = 200;
			$userdata['status_message'] = 'Success';
		}else{
			$userdata['status_code'] = -200;
			$userdata['status_message'] = 'Error';
		}
		echo json_encode($userdata);
	}
	public function up_notify(){
		$postdata = file_get_contents("php://input");
	    $data = json_decode($postdata);
	    $userid = $data->userid;
	    $notify_id = $data->notify_id;
		$result = $this->restapi_model->updatenotify($userid, $notify_id);
		if($result >0){
			$notify_data = $this->restapi_model->getnotify($userid);
			$notify_count = $this->restapi_model->notify_count($userid);
			if(!empty($notify_data)){
				$userdata['notify_count'] = $notify_count;
				$userdata['notify_data'] = $notify_data;
				$userdata['status_code'] = 200;
				$userdata['status_message'] = 'Success';
			}else{
				$userdata['status_code'] = -200;
				$userdata['status_message'] = 'Error';
			}
		}else{
			$userdata['status_code'] = -200;
			$userdata['status_message'] = 'Error';
		}
		echo json_encode($userdata);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
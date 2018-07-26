<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backlogin extends CI_Controller {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->model('backlogin_model');
		$this->load->model('user_model');
    }
	public function index()
	{
		if($this->input->cookie('rememberme', TRUE)){
			$userid = $this->input->cookie('rememberme', TRUE);
			if($userid != ''){
				$data = $this->user_model->viewagent($userid);
				$this->session->set_userdata('loggedin',$data);
			}else{
				delete_cookie('rememberme');
				redirect('backlogin', 'refresh');
			}
			
			//die();
			//redirect('dashboard', 'refresh');
		}
		if($this->session->userdata('loggedin')){
			redirect('dashboard', 'refresh');
		}
		
		$data['head_title'] = 'Login';
		$data['active'] = 'login';
		$data['body_class'] = 'hold-transition login-page';
		$this->load->view('template/head',$data);
		$this->load->view('backend/backlogin/login-view',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function dologin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Login';
			$data['active'] = 'login';
			$data['body_class'] = 'hold-transition login-page';
			$this->load->view('template/head',$data);
			$this->load->view('backend/backlogin/login-view',$data);
			$this->load->view('template/foot',$data);
		}
		else
		{
			$username = $this->input->post('username'); 
			$pass = $this->input->post('password');
			$rememberme = $this->input->post('rememberme');
			$result = $this->backlogin_model->checkuser($username,$pass);
			if(empty($result)){
				$this->session->set_flashdata('flashdata', 'Invalid details.');
				redirect('backlogin');
			}else{
				foreach($result as $data){
					if($rememberme == "rememberme"){
						
						$cookie = array(
							'name'   => 'rememberme',
							'value'  => $data->id,
							'expire' => '86500',
							'path'   => '/',
							'secure' => TRUE
						);

						set_cookie($cookie);
						$this->session->sess_expiration = 10800;
					}
					$this->session->set_userdata('loggedin',$data);
					redirect('dashboard', 'refresh');
				}
			}
		}
	}
	public function dologout()
	{
		$this->session->unset_userdata('loggedin');
		// Destroy session data
		delete_cookie('rememberme');
		$this->session->sess_expiration = 3600;
		$this->session->sess_destroy();
		redirect('dashboard', 'refresh');
	}
	public function forgot(){
		if($this->session->userdata('loggedin')){
			redirect('dashboard', 'refresh');
		}
		$data['head_title'] = 'Forgot Password';
		$data['active'] = 'login';
		$data['body_class'] = 'hold-transition login-page';
		$this->load->view('template/head',$data);
		$this->load->view('backend/backlogin/forgotpass-view',$data);
		$this->load->view('template/foot',$data);
	}
	public function doreset(){
		if($this->session->userdata('loggedin')){
			redirect('dashboard', 'refresh');
		}
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('flashdata', 'Please provide an acceptable email address');
			redirect('backlogin/forgot');
		}
		else
		{
			$email = $this->input->post('email'); 
			$result = $this->backlogin_model->checkemail($email);
			if(empty($result) && $result <= 0){
				$this->session->set_flashdata('flashdata', 'Please provide an acceptable email address');
				redirect('backlogin/forgot');
			}else{
				$code = rand();
				$result = $this->backlogin_model->gen_resetcode($email,$code);
				if(!empty($result) && $result > 0){
					//$resetcode = $this->encrypt->encode($code);
					$resetcode = base64_encode($code);
					$this->sendresetlink($email,$resetcode);
					//$this->session->set_flashdata('flashdata', base_url('login/reset/'.$resetcode));
					$this->session->set_flashdata('flashdata','Please check your mail for password reset link.');
					redirect('backlogin/forgot');
				}else{
					$this->session->set_flashdata('flashdata', 'Something went wrong. Please try again');
					redirect('backlogin/forgot');
				}
			}
		}
	}
	public function sendresetlink($email,$resetcode){

		$body = '';
		$body .= '<p>Hello,</p>';
		$body .= '<p>You can reset your password using below link: </p>';
		$body .= '<p>Click on link or paste it on browser <a href="'.base_url('backlogin/reset/'.$resetcode).'">Reset link</a> ( '.base_url('backlogin/reset/'.$resetcode).' )</p>';
		$this->email->from('varun.yadav@techconlabs.com', 'JOY');
		$this->email->to($email); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 
		$this->email->subject('Reset Password');
		$this->email->message($body);
		$this->email->send();
	}
	public function reset($code){
		if($this->session->userdata('loggedin')){
			redirect('dashboard', 'refresh');
		}
		$de_code = base64_decode($code);
		$result = $this->backlogin_model->checkcode($de_code);
		if($result > 0){
			$data['userid'] = $result;
			$data['head_title'] = 'Reset Password';
			$data['active'] = 'login';
			$data['body_class'] = 'hold-transition login-page';
			$this->load->view('template/head',$data);
			$this->load->view('backend/backlogin/resetpass-view',$data);
			$this->load->view('template/foot',$data);
		}else{
			$this->session->set_flashdata('flashdata', 'Your reset password link has been expired. Please try again');
			redirect('backlogin/forgot');
		}
	}
	public function resetpass(){
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$userid = $this->input->post('userid');
		if(!$userid){
			$this->session->set_flashdata('flashdata', 'Something went wrong. Please try again');
			redirect('backlogin/forgot');
		}
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Reset Password';
			$data['active'] = 'login';
			$data['userid'] = $userid;
			$data['body_class'] = 'hold-transition login-page';
			$this->load->view('template/head',$data);
			$this->load->view('backend/backlogin/resetpass-view',$data);
			$this->load->view('template/foot',$data);
		}
		else
		{
			
			$result = $this->backlogin_model->reset_password($password, $cpassword, $userid);
			if($result < 0){
				$this->session->set_flashdata('flashdata', 'Something went wrong. Please try again');
				redirect('backlogin/forgot');
			}else{
				$this->session->set_flashdata('flashdata', 'Your password successfully changed.');
				redirect('backlogin');
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
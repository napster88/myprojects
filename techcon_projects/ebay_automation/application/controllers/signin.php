<?php defined('BASEPATH') or exit('.');

class Signin extends CI_Controller{
  
  public function index()
  {
	  echo $_SESSION['loggedin'];
    $this->load->view('frontend/login_view'); 
  }
  
  public function check()
  {
	  
	  $email = $this->input->post('email');
	  $pass = $this->input->post('pass');
	  
	  
	  
	  if($email == "admin" && $pass == "123456")
	  {
		  $this->session->set_userdata("loggedin",$email);  
		  redirect('https://techconlabs.net/ebay_site');
		  
	  }
	  else{
		  $this->session->set_flashdata("error","wrong username password");
		  redirect('signin');
	  }
	  
  }
  
  
}
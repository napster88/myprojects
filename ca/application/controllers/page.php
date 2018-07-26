<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('backlogin', 'refresh');
		}
		$this->load->model('user_model');
		$this->load->model('page_model');
    }
	public function index()
	{
		
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('backlogin', 'refresh');
		}
		$this->load->model('dashboard_model');
		$this->load->model('user_model');
    }
	public function index()
	{
		$data['head_title'] = 'Home';
		$data['active'] = 'home';
		$data['active_sub'] = 'home';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		$this->load->view('template/head',$data);
		//$this->load->view('template/header',$data);
		//$this->load->view('template/sidenav',$data);
		//$this->load->view('backend/dashboard/dashboard-view',$data);
		//$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
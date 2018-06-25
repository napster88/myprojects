<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Driver extends CI_Controller {

	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('backlogin', 'refresh');
		}
		$this->load->model('driver_model');
    }
	public function index()
	{
		$data['head_title'] = 'Driver';
		$data['active'] = 'driver';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/driver/driver-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	public function add_driver()
	{
		$data['head_title'] = 'Add Driver';
		$data['active'] = 'driver';
		$data['active_sub'] = 'add_driver';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/driver/add-driver-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function adddriver()
	{
		$this->form_validation->set_rules('emailid', 'Email', 'trim|required|valid_email|max_length[100]|is_unique[drivers.emailid]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]|is_unique[drivers.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Add Driver';
			$data['active'] = 'driver';
			$data['active_sub'] = 'add_driver';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/driver/add-driver-view',$data);
			$this->load->view('template/footer',$data);
			$this->load->view('template/foot',$data);
		}
		else
		{
			$photo = $_FILES['photo']['name'];
			if(!empty($photo)){
				$this->upload->initialize($this->set_photoupload_options());
				//$this->upload->do_upload();
				if ( ! $this->upload->do_upload('photo')){
					$data['error'] = $this->upload->display_errors();
					$data['head_title'] = 'Add driver';
					$data['active'] = 'driver';
					$data['active_sub'] = 'add_driver';
					$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
					$data['userdata'] = $this->session->userdata('loggedin');
					$userdata = $this->session->userdata('loggedin');
					$id = $userdata->id;
					$this->load->view('template/head',$data);
					$this->load->view('template/header',$data);
					$this->load->view('template/sidenav',$data);
					$this->load->view('backend/driver/add-driver-view',$data);
					$this->load->view('template/footer',$data);
					$this->load->view('template/foot',$data);
					//die();
				}
				else{
					$filedata = $this->upload->data();
					$path = 'assets/documents/'.$filedata['file_name'];
				}
			}else{
				$path = 'assets/images/user-icon.png';
			}
			$emailid = $this->input->post('emailid'); 
			$pass = $this->input->post('password');
			$cpass = $this->input->post('cpassword');
			$username = $this->input->post('username');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$mobile = $this->input->post('mobile');
			$gender = $this->input->post('gender');
			$type = 2;
			$status = 1;
			$result = $this->driver_model->adddriver($emailid,$pass,$cpass,$username,$first_name,$last_name,$type,$status,$path,$mobile,$gender);
			//print_r($result);die();
			if($result != 1){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('driver/add_driver', 'refresh');
			}else{
				$this->session->set_flashdata('flashdata', 'Driver successfully added.');
				redirect('driver/add_driver', 'refresh');
			}
		}
	}
	
	public function view_drivers()
	{
		$data['head_title'] = 'View drivers';
		$data['active'] = 'driver';
		$data['active_sub'] = 'view_driver';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['driverlist'] = $this->driver_model->viewdrivers();
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/driver/driver-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
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
	public function hide($id){
		if($id != ''){
			$result = $this->driver_model->hidedriver($id);
			echo $result;
		}else{
			echo '0';
		}
	}
	
	public function viewdriver($id)
	{
		$data['head_title'] = 'View driver';
		$data['active'] = 'driver';
		$data['active_sub'] = 'view_driver';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['agentdata'] = $this->driver_model->viewdriver($id);
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/driver/single-driver-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	public function edit_driver($id)
	{
		$data['head_title'] = 'Edit driver';
		$data['active'] = 'driver';
		$data['active_sub'] = 'view_driver';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['agentdata'] = $this->driver_model->viewdriver($id);
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/driver/edit-driver-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function updatedriver($id){
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$mobile = $this->input->post('mobile');
		$gender = $this->input->post('gender');
		$result = $this->driver_model->update_driver($first_name,$last_name,$mobile,$gender,$id);
		//print_r($result);die();
		if($result <= 0){
			$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
			redirect('driver/edit_driver/'.$id, 'refresh');
			
		}else{
			$this->session->set_flashdata('flashdata', 'Driver successfully added.');
			redirect('driver/view_drivers/', 'refresh');
		}
	}
}
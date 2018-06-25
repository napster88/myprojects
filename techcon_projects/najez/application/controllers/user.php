<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('backlogin', 'refresh');
		}
		$this->load->model('user_model');
    }
	public function index()
	{
		$data['head_title'] = 'User';
		$data['active'] = 'user';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/user/user-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	public function add_user()
	{
		$data['head_title'] = 'Add User';
		$data['active'] = 'user';
		$data['active_sub'] = 'add_user';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/user/add-user-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function adduser()
	{
		$this->form_validation->set_rules('emailid', 'Email', 'trim|required|valid_email|max_length[100]|is_unique[users.emailid]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|max_length[15]|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Add User';
			$data['active'] = 'user';
			$data['active_sub'] = 'add_user';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/user/add-user-view',$data);
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
					$data['head_title'] = 'Add User';
					$data['active'] = 'user';
					$data['active_sub'] = 'add_user';
					$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
					$data['userdata'] = $this->session->userdata('loggedin');
					$userdata = $this->session->userdata('loggedin');
					$id = $userdata->id;
					$this->load->view('template/head',$data);
					$this->load->view('template/header',$data);
					$this->load->view('template/sidenav',$data);
					$this->load->view('backend/user/add-user-view',$data);
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
			$result = $this->user_model->adduser($emailid,$pass,$cpass,$username,$first_name,$last_name,$type,$status,$path,$mobile,$gender);
			//print_r($result);die();
			if($result != 1){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('user/add_user', 'refresh');
			}else{
				$this->session->set_flashdata('flashdata', 'User successfully added.');
				redirect('user/add_user', 'refresh');
			}
		}
	}
	
	public function view_users()
	{
		$data['head_title'] = 'View Users';
		$data['active'] = 'user';
		$data['active_sub'] = 'view_user';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['userlist'] = $this->user_model->viewusers();
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/user/user-view',$data);
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
			$result = $this->user_model->hideuser($id);
			echo $result;
		}else{
			echo '0';
		}
	}
	
	public function viewuser($id)
	{
		$data['head_title'] = 'View User';
		$data['active'] = 'user';
		$data['active_sub'] = 'view_user';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['agentdata'] = $this->user_model->viewuser($id);
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/user/single-user-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	public function edit_user($id)
	{
		$data['head_title'] = 'Edit User';
		$data['active'] = 'user';
		$data['active_sub'] = 'view_user';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['agentdata'] = $this->user_model->viewuser($id);
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/user/edit-user-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function updateuser($id){
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$mobile = $this->input->post('mobile');
		$gender = $this->input->post('gender');
		$result = $this->user_model->update_user($first_name,$last_name,$mobile,$gender,$id);
		//print_r($result);die();
		if($result <= 0){
			$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
			redirect('user/edit_user/'.$id, 'refresh');
			
		}else{
			$this->session->set_flashdata('flashdata', 'User successfully added.');
			redirect('user/view_users/', 'refresh');
		}
	}
}
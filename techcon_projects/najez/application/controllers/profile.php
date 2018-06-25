<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$data['head_title'] = 'Profile';
		$data['active'] = 'profile';
		$data['active_sub'] = '';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/profile/profile-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	public function edit()
	{
		$data['head_title'] = 'Edit Profile';
		$data['active'] = 'profile';
		$data['active_sub'] = '';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/profile/edit-profile-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	public function update(){
		$photo = $_FILES['photo']['name'];
		if(!empty($photo)){
			$this->upload->initialize($this->set_photoupload_options());
			//$this->upload->do_upload();
			if ( ! $this->upload->do_upload('photo')){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('profile/edit', 'refresh');
				//die();
			}
			else{
				$filedata = $this->upload->data();
				$path = 'assets/documents/'.$filedata['file_name'];
			}
		}else{
			$path = $this->input->post('old_photo');
		}
		$username = $this->input->post('username');
		$user_pass = $this->input->post('user_pass');
		$old_pass = $this->input->post('old_pass');
		if($old_pass != ''){
			if($old_pass != $user_pass){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('profile/edit', 'refresh');
			}else{
				$user_pass = $this->input->post('new_pass');
			}
		}
		
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$role = $this->input->post('user_role');
		$userdata = $this->session->userdata('loggedin');
		$id = $userdata->id;
		$result = $this->user_model->update_profile($first_name,$last_name,$path,$username,$user_pass,$role,$id);
		if($result <= 0){
			$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
			redirect('profile/edit', 'refresh');
		}else{
			$this->session->unset_userdata('loggedin');
			$newresult = $this->user_model->viewuser($id);
			foreach($newresult as $data){
					$this->session->set_userdata('loggedin',$data);
			}
			$this->session->set_flashdata('flashdata', 'Details successfully updated.');
			redirect('profile', 'refresh');
			
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
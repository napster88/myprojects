<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plans extends CI_Controller {

	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('backlogin', 'refresh');
		}
		$this->load->model('user_model');
		$this->load->model('plan_model');
    }
	
	public function add_plan()
	{
		$data['head_title'] = 'Add Plan';
		$data['active'] = 'plan';
		$data['active_sub'] = 'add_plan';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/plans/add-plan-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function addplan()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('slug', 'Menu Slug', 'trim|required|max_length[200]|is_unique[pages.slug]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Add Plan';
			$data['active'] = 'plan';
			$data['active_sub'] = 'add_plan';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$userdata = $this->session->userdata('loggedin');
			$id = $userdata->id;
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/plans/add-plan-view',$data);
			$this->load->view('template/footer',$data);
			$this->load->view('template/foot',$data);
		}
		else
		{
			
			$title = $this->input->post('title'); 
			$slug = $this->input->post('slug');
			$slug = $this->create_slug($slug);
			$slug = $this->check_slug($slug);
			$description = $this->input->post('description');
			$menu_order = $this->input->post('menu_order');
			$parent = $this->input->post('parent');
			$layout = $this->input->post('layout');
			$status = $this->input->post('status');

			$result = $this->plan_model->addplan($title,$slug,$description,$menu_order,$parent,$layout,$status);
			//print_r($result);die();
			if($result != 1){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('plans/add_plan', 'refresh');
			}else{
				$this->session->set_flashdata('flashdata', 'plan successfully added.');
				redirect('plans/add_plan', 'refresh');
			}
		}
	}
	public function create_slug($slug){
		$slug = strtolower($slug);
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);
		$slug = preg_replace('/-+/', "-", $slug);
		return $slug;
	}
	public function check_slug($slug){
		$result = $this->plan_model->checkslug($slug);
		if($result > 0){
			return $slug.rand();
		}else{
			return $slug;
		}
		
	}
	public function view_plans()
	{
		$data['head_title'] = 'View Plans';
		$data['active'] = 'plan';
		$data['active_sub'] = 'view_plan';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['planlist'] = $this->plan_model->viewplans();
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/plans/plan-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function hide($id){
		if($id != ''){
			$result = $this->plan_model->hideplan($id);
			echo $result;
		}else{
			echo '0';
		}
	}
	
	
	public function edit_plan($id)
	{
		$data['head_title'] = 'Edit Plan';
		$data['active'] = 'plan';
		$data['active_sub'] = 'view_plan';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['plandata'] = $this->plan_model->viewplan($id);
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/plans/edit-plan-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function updateplan($id){
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		//$this->form_validation->set_rules('slug', 'Menu Slug', 'trim|required|max_length[200]|is_unique[pages.slug]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Edit Plan';
			$data['active'] = 'plan';
			$data['active_sub'] = 'view_plan';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$data['plandata'] = $this->plan_model->viewplan($id);
			$userdata = $this->session->userdata('loggedin');
			//$id = $userdata->id;
			
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/plans/edit-plan-view',$data);
			$this->load->view('template/footer',$data);
			$this->load->view('template/foot',$data);
		}
		else
		{
			
			$title = $this->input->post('title'); 
			//$slug = $this->input->post('slug');
			//$slug = $this->create_slug($slug);
			//$slug = $this->check_slug($slug);
			$description = $this->input->post('description');
			$menu_order = $this->input->post('menu_order');
			$parent = $this->input->post('parent');
			$layout = $this->input->post('layout');
			$status = $this->input->post('status');
			$result = $this->plan_model->update_plan($title,$description,$menu_order,$parent,$layout,$status,$id);
			//print_r($result);die();
			if($result <= 0){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('plans/edit_plan/'.$id, 'refresh');
				
			}else{
				$this->session->set_flashdata('flashdata', 'plan successfully Updated.');
				redirect('plans/view_plans/', 'refresh');
			}
		}
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
		$this->load->model('service_model');
    }
	public function index()
	{
          redirect('https://techconlabs.net/ebay_site/');
	}
	public function purchase($subs_pack)
	{
          $this->session->set_userdata("pack",$subs_pack);
          if(!$this->session->userdata('loggedUser')){
			redirect('account/register', 'refresh');
		}
		
	}
	
	public function add_service()
	{
		$data['head_title'] = 'Add Service';
		$data['active'] = 'service';
		$data['active_sub'] = 'add_service';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/services/add-service-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function addservice()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('slug', 'Menu Slug', 'trim|required|max_length[200]|is_unique[pages.slug]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Add Service';
			$data['active'] = 'service';
			$data['active_sub'] = 'add_service';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$userdata = $this->session->userdata('loggedin');
			$id = $userdata->id;
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/services/add-service-view',$data);
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

			$result = $this->service_model->addservice($title,$slug,$description,$menu_order,$parent,$layout,$status);
			//print_r($result);die();
			if($result != 1){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('services/add_service', 'refresh');
			}else{
				$this->session->set_flashdata('flashdata', 'Page successfully added.');
				redirect('services/add_service', 'refresh');
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
		$result = $this->service_model->checkslug($slug);
		if($result > 0){
			return $slug.rand();
		}else{
			return $slug;
		}
		
	}
	public function view_services()
	{
		$data['head_title'] = 'View Services';
		$data['active'] = 'service';
		$data['active_sub'] = 'view_service';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['servicelist'] = $this->service_model->viewservices();
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/services/service-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function hide($id){
		if($id != ''){
			$result = $this->service_model->hideservice($id);
			echo $result;
		}else{
			echo '0';
		}
	}
	
	
	public function edit_service($id)
	{
		$data['head_title'] = 'Edit Service';
		$data['active'] = 'service';
		$data['active_sub'] = 'view_service';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['pagedata'] = $this->service_model->viewservice($id);
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/services/edit-service-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function updateservice($id){
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		//$this->form_validation->set_rules('slug', 'Menu Slug', 'trim|required|max_length[200]|is_unique[pages.slug]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Edit Page';
			$data['active'] = 'page';
			$data['active_sub'] = 'view_page';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$data['pagedata'] = $this->service_model->viewservice($id);
			$userdata = $this->session->userdata('loggedin');
			//$id = $userdata->id;
			
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/services/edit-service-view',$data);
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
			$result = $this->service_model->update_service($title,$description,$menu_order,$parent,$layout,$status,$id);
			//print_r($result);die();
			if($result <= 0){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('services/edit_service/'.$id, 'refresh');
				
			}else{
				$this->session->set_flashdata('flashdata', 'Page successfully Updated.');
				redirect('services/view_services/', 'refresh');
			}
		}
	}
}
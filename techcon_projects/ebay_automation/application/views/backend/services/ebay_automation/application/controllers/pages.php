<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	
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
	public function add_page()
	{
		$data['head_title'] = 'Add Page';
		$data['active'] = 'page';
		$data['active_sub'] = 'add_page';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/pages/add-page-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function addpage()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('slug', 'Menu Slug', 'trim|required|max_length[200]|is_unique[pages.slug]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Add Page';
			$data['active'] = 'page';
			$data['active_sub'] = 'add_page';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$userdata = $this->session->userdata('loggedin');
			$id = $userdata->id;
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/pages/add-page-view',$data);
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

			$result = $this->page_model->addpage($title,$slug,$description,$menu_order,$parent,$layout,$status);
			//print_r($result);die();
			if($result != 1){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('pages/add_page', 'refresh');
			}else{
				$this->session->set_flashdata('flashdata', 'Page successfully added.');
				redirect('pages/add_page', 'refresh');
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
		$result = $this->page_model->checkslug($slug);
		if($result > 0){
			return $slug.rand();
		}else{
			return $slug;
		}
		
	}
	public function view_pages()
	{
		$data['head_title'] = 'View Pages';
		$data['active'] = 'page';
		$data['active_sub'] = 'view_page';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['pagelist'] = $this->page_model->viewpages();
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/pages/page-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function hide($id){
		if($id != ''){
			$result = $this->page_model->hidepage($id);
			echo $result;
		}else{
			echo '0';
		}
	}
	
	
	public function edit_page($id)
	{
		$data['head_title'] = 'Edit Page';
		$data['active'] = 'page';
		$data['active_sub'] = 'view_page';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['pagedata'] = $this->page_model->viewpage($id);
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/pages/edit-page-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function updatepage($id){
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
			$data['pagedata'] = $this->page_model->viewpage($id);
			$userdata = $this->session->userdata('loggedin');
			//$id = $userdata->id;
			
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/pages/edit-page-view',$data);
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
			$result = $this->page_model->update_page($title,$description,$menu_order,$parent,$layout,$status,$id);
			//print_r($result);die();
			if($result <= 0){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('pages/edit_page/'.$id, 'refresh');
				
			}else{
				$this->session->set_flashdata('flashdata', 'Page successfully Updated.');
				redirect('pages/view_pages/', 'refresh');
			}
		}
	}
}
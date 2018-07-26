<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Controller {

	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('backlogin', 'refresh');
		}
		$this->load->model('user_model');
		$this->load->model('transaction_model');
    }
	public function index()
	{
		
	}
	public function add_transaction()
	{
		$data['head_title'] = 'Add transaction';
		$data['active'] = 'transaction';
		$data['active_sub'] = 'add_transaction';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/transaction/add-transaction-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function addtransaction()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('slug', 'Menu Slug', 'trim|required|max_length[200]|is_unique[pages.slug]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Add transaction';
			$data['active'] = 'transaction';
			$data['active_sub'] = 'add_transaction';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$userdata = $this->session->userdata('loggedin');
			$id = $userdata->id;
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/transaction/add-transaction-view',$data);
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

			$result = $this->transaction_model->addtransaction($title,$slug,$description,$menu_order,$parent,$layout,$status);
			//print_r($result);die();
			if($result != 1){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('transactions/add_transaction', 'refresh');
			}else{
				$this->session->set_flashdata('flashdata', 'transaction successfully added.');
				redirect('transactions/add_transaction', 'refresh');
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
		$result = $this->transaction_model->checkslug($slug);
		if($result > 0){
			return $slug.rand();
		}else{
			return $slug;
		}
		
	}
	public function view_transactions()
	{
		$data['head_title'] = 'View transaction';
		$data['active'] = 'transaction';
		$data['active_sub'] = 'view_transaction';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['transactionlist'] = $this->transaction_model->viewtransactions();
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/transaction/transaction-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function hide($id){
		if($id != ''){
			$result = $this->transaction_model->hidetransaction($id);
			echo $result;
		}else{
			echo '0';
		}
	}
	
	
	public function edit_transaction($id)
	{
		$data['head_title'] = 'Edit transaction';
		$data['active'] = 'transaction';
		$data['active_sub'] = 'view_transaction';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$data['transactiondata'] = $this->transaction_model->viewtransaction($id);
		$userdata = $this->session->userdata('loggedin');
		//$id = $userdata->id;
		
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
		$this->load->view('backend/transaction/edit-transaction-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);
	}
	
	public function updatetransaction($id){
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		//$this->form_validation->set_rules('slug', 'Menu Slug', 'trim|required|max_length[200]|is_unique[pages.slug]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['head_title'] = 'Edit transaction';
			$data['active'] = 'transaction';
			$data['active_sub'] = 'view_transaction';
			$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
			$data['userdata'] = $this->session->userdata('loggedin');
			$data['pagedata'] = $this->transaction_model->viewtransaction($id);
			$userdata = $this->session->userdata('loggedin');
			//$id = $userdata->id;
			
			$this->load->view('template/head',$data);
			$this->load->view('template/header',$data);
			$this->load->view('template/sidenav',$data);
			$this->load->view('backend/transaction/edit-transaction-view',$data);
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
			$result = $this->transaction_model->update_transaction($title,$description,$menu_order,$parent,$layout,$status,$id);
			//print_r($result);die();
			if($result <= 0){
				$this->session->set_flashdata('flashdata', 'Something went wrong, please try again .');
				redirect('transactions/edit_transaction/'.$id, 'refresh');
				
			}else{
				$this->session->set_flashdata('flashdata', 'transaction successfully Updated.');
				redirect('transactions/view_transactions/', 'refresh');
			}
		}
	}
}
<?php if (!defined('BASEPATH')) exit('.');

class Coupon extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->setting->changeAdminLang();
    $setting = $this->setting->get();
    $this->load->model('administrator/data');
    $this->load->helper('administrator/lang');
    $this->load->helper('administrator/get');
    $this->load->library("pagination");
    if ($this->session->userdata('admin_lang') == FALSE) {
      $data['admin_lang'] = $setting['admin_lang'];
      $this->session->set_userdata($data);
    }
      $this->lang->load("admin", $this->setting->getLang($this->session->userdata('admin_lang')));
      $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
      $sessiondata = $this->session->userdata('logged_in_customer');
      if (!$sessiondata) {
          redirect(site_url("customers"));
      }
  }

  
  public function add() {
    $data['langId']        = FALSE ;
    $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"dashboard")) ;
    $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
    $data['method']        = "Vouchers" ;
    $data['Title']         = "عن التطبيق" ;
    $this->load->library('form_validation');
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/vouchers_add_view',$data);
    $this->load->view('customer/global/footer');
  }
  public function add_voucher()
  {
	  
	 $data = $this->input->post('Cform');
	$vendor_id=$this->session->userdata('logged_in_customer');
	
	  $vendor=$vendor_id['id'];
	
	 $data['vendor_id']=$vendor;
	//// print_r($data);
	 
	 //die();

	 $this->data->save_voucher($data);
	 
    redirect('coupon/add');
	  
	  
  }
  function edit_coupon($id)
  {
	  
	  $data['coupon_data']=$this->data->get_single_coupon($id);
		$this->load->view('customer/global/header');
       $this->load->view('customer/global/topbar');
       $this->load->view('customer/global/menu');
       $this->load->view('customer/pages/edit_coupon',$data);
       $this->load->view('customer/global/footer'); 
	  
  }
  
  
  function edit_coupon_confirm($id)
  
  {
	  $data=$this->input->post('Cform');
	  $this->data->update_coupon($id,$data);
	  redirect('coupon/view_coupon','refresh');
  }
  
  function delete_coupon($id)
  {
	$this->data->delete_coupon($id);
	  redirect('coupon/view_coupon','refresh');  
	  
  }
  
  function view_coupon()
  {
	  
	  
	   $vendor_id=$this->session->userdata('logged_in_customer');
	
		$vendor=$vendor_id['id'];
	  $data['coupon']=$this->data->get_coupon($vendor);
		
	  
	  
	  $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/view_coupon',$data);
    $this->load->view('customer/global/footer'); 
  }
  
}
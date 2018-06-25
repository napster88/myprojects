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
}
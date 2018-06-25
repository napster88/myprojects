<?php defined('BASEPATH') or exit('.');

class Driver extends CI_Controller{
  
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
  
  public function add()
  {
    $data['langId']        = FALSE ;
      if($this->uri->segment(3))
      {
        $data['data']          = $this->data->get("products",$data['langId'],array("id"=>$this->uri->segment(3))) ;
        $data['id']            = $this->uri->segment(3) ;
      }
      else
      {
        $data['id'] = 0 ;
      }
      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'prod_num'=>"رقم المنتج",
    	'name'=>"الاسم بالعربي",
    	'name_en'=>"الاسم بالأنجليزي",
    	'price'=>"السعر",
    	'cat_id'=>"القسم",
      'min_charge'=>"الحد الأدنى للتوصيل"
    	// 'text2'=>"الوصف بالعربي",
    	// 'text2_en'=>"الوصف بالانجليزي"
    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
    	}
        $this->form_validation->set_rules("Cform[discount]", "نسبة الخصم", 'numeric');
        if((isset($_FILES['photo_to_up']['name']) && empty($_FILES['photo_to_up']['name'])) &&  empty($data['data']['photo']))
        {
           $this->form_validation->set_rules("photo", "الصوره", 'required');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{
    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("products",$data['langId'],array("id"=>$this->uri->segment(3))) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.lang("UploadError").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }
    	}
      }
       $data['cats']        = $this->data->get("cats",FALSE,array("parent"=>0),FALSE,TRUE) ;
       $data['branchs']     = $this->data->get("branchs",FALSE,array("id >"=>0),FALSE,TRUE) ;
       $this->load->view('customer/global/header');
       $this->load->view('customer/global/topbar');
       $this->load->view('customer/global/menu');
       $this->load->view('customer/pages/add_driver',$data);
       $this->load->view('customer/global/footer');
    
  }
  
  
  public function view_all()
  {
    
    
    
  }
  
  public function add_driver()
  {
    $data = $this->input->post();
    $this->db->insert('drivers',$data);
    redirect('driver/add');
  }
  
}
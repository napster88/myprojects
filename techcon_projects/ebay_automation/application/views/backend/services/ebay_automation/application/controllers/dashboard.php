<?php if (!defined('BASEPATH')) exit('.');

class Dashboard extends CI_Controller {

  function __construct() {
    // Call the Model constructor
    parent::__construct();
    if (!$this->session->userdata('loggedin')) {
      redirect('backlogin', 'refresh');
    }
    $this->load->model('dashboard_model');
    $this->load->model('user_model');
  }

  public function index() {
    
      $data['head_title'] = 'Dashboard';
    $data['active'] = 'dashboard';
    $data['active_sub'] = '';
    $data['body_class'] = 'hold-transition skin-blue sidebar-mini';
    $data['userdata'] = $this->session->userdata('loggedin');
    $userdata = $this->session->userdata('loggedin');
    $data['totalusers'] = $this->dashboard_model->totaluser($userdata->id);
    $data['totalaccount'] = $this->dashboard_model->totalaccount($userdata->id);
    $data['gmailaccount'] = $this->dashboard_model->gmailaccount($userdata->id);
    $data['gmailactivatedaccount'] = $this->dashboard_model->gmailactivatedaccount($userdata->id);
    $data['ebayaccount'] = $this->dashboard_model->ebayaccount($userdata->id);
    $data['ebayactivatedaccount'] = $this->dashboard_model->ebayactivatedaccount($userdata->id);
    $data['suppliers'] = $this->dashboard_model->suppliers($userdata->id);
    $data['totaltransaction'] = $this->dashboard_model->totaltransaction($userdata->id);
    $data['totalsubscriptions'] = $this->dashboard_model->totalsubscriptions($userdata->id);
    $data['subscriptiondetail'] = $this->dashboard_model->subscriptiondetail($userdata->id);
    foreach ($data['subscriptiondetail'] as $val) {
      $data['plan'][$val->subscription_title] = $this->dashboard_model->view_subscriptions_count($userdata->id, $val->subscription_id);
    }
    $data['totalorderfullfill'] = $this->dashboard_model->totalorderfullfill($userdata->id);
    $data['orderfulfilauto'] = $this->dashboard_model->orderfulfilauto($userdata->id);
    $data['orderfulfilmanual'] = $this->dashboard_model->orderfulfilmanual($userdata->id);
    $data['ordernotfulfill'] = $this->dashboard_model->ordernotfulfill($userdata->id);
    $data['faketrackingnumber'] = $this->dashboard_model->faketrackingnumber($userdata->id);
    $data['orderimport'] = $this->dashboard_model->orderimport($userdata->id);

    $id = $userdata->id;
    $this->load->view('template/head', $data);
    $this->load->view('template/header', $data);
    $this->load->view('template/sidenav', $data);
    $this->load->view('backend/dashboard/dashboard-view', $data);
    $this->load->view('template/footer', $data);
    $this->load->view('template/foot', $data);
  }
}
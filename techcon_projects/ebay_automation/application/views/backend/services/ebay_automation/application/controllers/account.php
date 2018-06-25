<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('account_model');
        $this->load->model('backlogin_model');
        $this->load->library('google_client');
    }

    public function index() {
        
    }

    public function add_gmail() {
        $this->load->model('model');
        $data['head_title'] = 'View Account';
        $data['active'] = 'Account';
        $data['active_sub'] = 'view_' . "all";
        $data['body_class'] = 'hold-transition skin-blue sidebar-mini';
        $data['userdata'] = $this->session->userdata('loggedin');
        $userdata1 = $this->session->userdata('loggedin');
        $data['acc_type'] = "all";
        //$userdata1->id
        $data['total_account'] = $this->model->get_data("gmail_accounts");

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidenav', $data);
        $this->load->view('backend/account/add_gmail_view', $data);

        $this->load->view('template/footer', $data);
        $this->load->view('template/foot', $data);
    }

    public function register() {

        $this->session->unset_userdata('loggedin');
        $data['head_title'] = 'Register';
        $data['active'] = 'login';
        $data['body_class'] = 'hold-transition login-page';
        $data['status'] = '1';
        $data['user_type'] = '2';
        $this->load->view('template/head', $data);
        $this->load->view('backend/backlogin/register-view', $data);
        $this->load->view('template/foot', $data);
    }

    public function do_register() {
        foreach ($this->input->post()as $key => $value) {
            $data[$key] = $this->input->post($key);
        }
        $data['status'] = "1";
        $data['photo'] = "assets/documents/mid-iamge.png";
        $data['user_type'] = "2";
        $this->load->model('model');
        $this->model->insert("users", $data);
        //$userid = $this->db->insert_id();
        //$result = $this->backlogin_model->check_user_by_id($userid);
redirect('dashboard');
die();

        foreach ($result as $data) {


            $this->session->set_userdata('loggedin', $data);
            if ($this->session->userdata('pack')) {
                redirect('Services/view_service');
            } else {
                
            }
        }
    }

    function account_disable($account_id, $account_type) {
        $userdata1 = $this->session->userdata('loggedin');
        $val = $this->account_model->account_disable($userdata1->id, $account_id, $account_type);
        $this->account_model->account_disable_confirm($userdata1->id, $account_id, $val[0]->account_status);

        redirect('account/view_user_account/' . $account_type);
    }

    function account_edit($account_id, $account_type) {
        $data['head_title'] = 'Edit Account';
        $data['active'] = 'Account';
        $data['active_sub'] = 'view_' . $account_type;
        $data['body_class'] = 'hold-transition skin-blue sidebar-mini';
        $data['userdata'] = $this->session->userdata('loggedin');
        $userdata1 = $this->session->userdata('loggedin');
        $data['acc_type'] = $account_type;
        $data['account_id'] = $account_id;
        $data['account_detail'] = $this->account_model->account_detail($account_id);
        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidenav', $data);
        $this->load->view('backend/account/edit-account-view', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/foot', $data);
    }

    function updateaccount($acc_id, $account_type) {
        $user_account_name = $this->input->post('user_account_name');
        $account_token = $this->input->post('account_token');
        $this->account_model->account_edit_confirm($acc_id, $user_account_name, $account_token);
        redirect('account/view_user_account/' . $account_type);
    }

    public function view_user_account_email() {
        $data['head_title'] = 'View Account';
        $data['active'] = 'Account';
        $data['active_sub'] = 'view_email';
        $data['body_class'] = 'hold-transition skin-blue sidebar-mini';
        $data['userdata'] = $this->session->userdata('loggedin');
        $userdata1 = $this->session->userdata('loggedin');
        $this->load->model('model');
        $data['userlists'] = $this->model->get_gmail_account();
        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidenav', $data);
        $this->load->view('backend/account/account-view-email', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/foot', $data);
    }

    public function view_user_account($acc_type) {

        $data['head_title'] = 'View Account';
        $data['active'] = 'Account';
        $data['active_sub'] = 'view_' . $acc_type;
        $data['body_class'] = 'hold-transition skin-blue sidebar-mini';
        $data['userdata'] = $this->session->userdata('loggedin');
        $userdata1 = $this->session->userdata('loggedin');
        $data['acc_type'] = $acc_type;
        //$userdata1->id
        $data['total_account'] = $this->account_model->viewaccount($userdata1->id, $acc_type);
        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidenav', $data);
        $this->load->view('backend/account/account-view', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/foot', $data);
    }

    public function view_users_gmail() {
        $data['head_title'] = 'View Account';
        $data['active'] = 'Account';
        $data['active_sub'] = 'view_user';
        $data['body_class'] = 'hold-transition skin-blue sidebar-mini';
        $data['userdata'] = $this->session->userdata('loggedin');
        $data['gmaillist'] = $this->account_model->viewusers_gmail();
        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidenav', $data);
        $this->load->view('backend/account/account-view-gmail', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/foot', $data);
    }

    public function view_users_ebay() {
        echo $_GET['code'];




//$m=urlencode('https://signin.ebay.com/ws/eBayISAPI.dll?oAuthRequestAccessToken&client_id kapiltha-EbayAuto-PRD-48e2d25a0-68db18a4&redirect_uri= kapil_thakur-kapiltha-EbayAu-jdomd&client_secret=PRD-8e2d25a09c55-fba7-449f-af60-a4c4 &code=v^1.1#i^1#f^0#I^3#r^1#p^3#t^Ul41XzI6RURCNEEzRTVEOUEwM0EwMjFEQUI2Nzg4RDQ5RkE4RTZfMF8xI0VeMjYw');
//print_r($m);		 
        $data['head_title'] = 'View Account';
        $data['active'] = 'Account';
        $data['active_sub'] = 'view_ebay';
        $data['body_class'] = 'hold-transition skin-blue sidebar-mini';
        $data['userdata'] = $this->session->userdata('loggedin');
        $data['ebaylist'] = $this->account_model->viewusers_ebay();
        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidenav', $data);
        $this->load->view('backend/account/account-view-ebay', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/foot', $data);
    }

    public function view_user_token() {

        //echo "@dafAFA@";
        //$this->google_client->authenticate($_GET['code']);
        //echo json_decode($_GET['code']);
        //PRD-8e2d25a09c55-fba7-449f-af60-a4c4
    }

    public function check_email_authrozition() {
        $this->load->model('model');

        $data['total_account'] = $this->model->insert('gmail_accounts', ['email' => $this->input->post('email')]);
    }

    //https://accounts.google.com/o/oauth2/v2/auth?redirect_uri=https%3A%2F%2Fdevelopers.google.com%2Foauthplayground&prompt=consent&response_type=code&client_id=407408718192.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fgmail.readonly&access_type=offline

}
<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Orders extends CI_Controller {

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

  public function index() {
    $data['langId'] = $this->session->userdata('admin_lang');
    if (isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit'])) {
      $checks = $this->input->post('check');

      if ($checks !== FALSE) {
        foreach ($checks AS $check) {
          if ($check > 0) {
            if (!($this->data->delete("orders", $check))) {
              echo "<script>alert('" . lang("NonDelete") . "');</script>";
            }
          }
        }
      } else {
        echo "<script>alert('" . lang("NonSelect") . "');</script>";
      }
    }
    //********************* Search *********************************
    $cat = $this->session->userdata('logged_in_customer')['id'];
    $quy1 = $this->db->select('*')->join('cart', 'products.id = cart.prod_id', 'left')
                    ->where('products.cat_id', $cat)->get('products')->result_array();
    $orders_id = [];
    foreach ($quy1 as $vals) {
      $orders_id[] = $vals['order_id'];
    }
    $where = [];
    if ($this->input->get('from'))
      $where['odate >='] = $this->input->get('from');
    if ($this->input->get('to'))
      $where['odate <='] = $this->input->get('to');
    if ($this->input->get('status') && $this->input->get('status') != 'all')
      $where['status'] = $this->input->get('status');
    if ($this->input->get('pay'))
      $where['pay'] = $this->input->get('pay');

    if ($orders_id)
      $total = $this->db->order_by('id', 'desc')->where_in('id', $orders_id)->get_where('orders', $where)->num_rows();
    else
      $total = 0;

    $page = (int) trim($this->input->get('p', TRUE));
    $index_Page = $this->config->item('index_page');
    if ($index_Page == "index.php") {
      $index_Page = $index_Page . "/";
    }
    $customer = $this->session->userdata('logged_in_customer');
    if (!$customer) {
      $paging["base_url"] = base_url() . $index_Page . "orders";
    } else {
      $paging["base_url"] = base_url() . $index_Page . "orders";
    }

    $paging["suffix"] = $this->config->item('url_suffix');

    if ($total > 0)
      $paging["total_rows"] = $total;
    else
      $paging["total_rows"] = 0;
    $paging["per_page"] = 50;
    $paging['page_query_string'] = TRUE;
    $paging['query_string_segment'] = 'p';
    $paging["uri_segment"] = 4;
    $paging['num_links'] = 7;
    $paging['full_tag_open'] = '<div class="dataTables_paginate paging_bootstrap pagination"><ul>';
    $paging['full_tag_close'] = '</ul></div>';
    $paging['first_link'] = '[«]';
    $paging['first_tag_open'] = '<li class="first">';
    $paging['next_tag_open'] = '<li class="next">';
    $paging['prev_tag_open'] = '<li class="prev">';
    $paging['first_tag_close'] = '</li>';
    $paging['next_tag_close'] = '</li>';
    $paging['prev_tag_close'] = '</li>';
    $paging['last_link'] = '[»]';
    $paging['last_tag_open'] = '<li class="last">';
    $paging['last_tag_close'] = '</li>';
    $paging['next_link'] = '>';
    $paging['prev_link'] = '<';
    $paging['num_tag_open'] = '<li class="pager-item">';
    $paging['num_tag_close'] = '</li>';
    $paging['cur_tag_open'] = '<li class="active"><a href="javascript:">';
    $paging['cur_tag_close'] = '</a></li>';
    $this->pagination->initialize($paging);

    if (!empty($orders_id)) {
      $data['data'] = $this->db->order_by('id', 'desc')->where_in('id', $orders_id)->get_where('orders', $where, $paging["per_page"], $page)->result_array();
    } else {
      $data['data'] = [];
    }

    $data["links"] = $this->pagination->create_links();
    $data["companies"] = $this->db->get('cats')->result_array();


    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/order_table', $data);
    $this->load->view('customer/global/footer');
    // var_dump($arraySearch['branch_id']);
  }

  public function printD() {

    $data['title'] = " - " . " تقرير مبيعات ";
    $data['langId'] = $this->session->userdata('admin_lang');
    $data['setting'] = $this->data->get("setting", FALSE, FALSE, 1);
    //********************* Search *********************************
    $arraySearch = array("id >" => 0);

    $from = $this->input->get('from');
    $to = $this->input->get('to');
    $branch = $this->input->get('branch');

    if ($from != FALSE && !empty($from)) {
      $arraySearch['odate >='] = $from;
    }
    if ($to != FALSE && !empty($to)) {
      $arraySearch['odate <='] = $to;
    }
    if ($branch != FALSE && !empty($branch)) {
      $arraySearch['branch_id'] = $branch;
    }
    //****************************************
    $Data2 = $this->data->get("orders", FALSE, $arraySearch, FALSE, TRUE, false, false, array("id" => "id"));
    $data['CountSearch'] = array(-1);
    foreach ($Data2 AS $t) {
      $data['CountSearch'][] = $t['id'];
    }
    $data['data'] = $this->data->get("orders", FALSE, $arraySearch, FALSE, TRUE, array("id" => "asc"));

    $this->load->view('customer/pages/order2_table', $data);
  }

//*****************************************************************
  public function delete($slug) {
    if ($slug > 0) {
      $this->data->delete("orders", $slug);
      $this->data->delete("cart", FALSE, array("order_id" => $slug));
    }
    redirect('orders/index/', 'refresh');
  }

}

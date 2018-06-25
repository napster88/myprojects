<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
 function __construct() {
   parent::__construct();
    if (!$this->session->userdata('loggedin')) {
      redirect('backlogin', 'refresh'); }
    
  }
  
  public function index()
  {
    $this->all();
  }
  
  public function all()
  {
    
    
  }

}
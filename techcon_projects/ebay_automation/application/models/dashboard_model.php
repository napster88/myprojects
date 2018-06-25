<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	
	
	
	
	public function totaluser($id)
	{
		
		$this->db->select('*');
		$this->db->from('users');
		//$this->db->where('user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	public function totalaccount($id)
	{
		
		$this->db->select('*');
		$this->db->from('account_mapping');
		if($id!='1')
		$this->db->where('user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	
	public function gmailaccount($id)
	{
		
		$this->db->select('*');
		$this->db->from('account_mapping');
			if($id!='1')
		$this->db->where('user_id', $id);  
		$this->db->where('account_type', 'gmail');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	public function gmailactivatedaccount($id)
	{
		
		$this->db->select('*');
		$this->db->from('account_mapping');
			if($id!='1')
		$this->db->where('user_id', $id);  
		$this->db->where('account_type', 'gmail');
		$this->db->where('account_status', 'active');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	
	public function ebayactivatedaccount($id)
	{
		
		$this->db->select('*');
		$this->db->from('account_mapping');
			if($id!='1')
		$this->db->where('user_id', $id);  
		$this->db->where('account_type', 'ebay');
		$this->db->where('account_status', 'active');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	
	
	
	public function ebayaccount($id)
	{
		
		$this->db->select('*');
		$this->db->from('account_mapping');
			if($id!='1')
		$this->db->where('user_id', $id);  
		$this->db->where('account_type', 'ebay');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	
	
	public function suppliers($id)
	{
		
		$this->db->select('*');
		$this->db->from('supplier_mapping');
			//if($id!='1')
		//$this->db->where('user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	public function totaltransaction($id)
	{
		
		$this->db->select('*');
		$this->db->from('subscription_transaction');
			if($id!='1')
		$this->db->where('user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	
	
	public function totalsubscriptions($id)
	{
		
		$this->db->select('*');
		$this->db->from('subscription_transaction');
			if($id!='1')
		$this->db->where('user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		
		return $query->num_rows(); 
	}
	public function subscriptiondetail()
	{ 
		$this->db->select('*');
		$this->db->from('subscription_detail');
		
		$query = $this->db->get();
		//return $query->num_rows(); 
		return $query->result();
	}
	
	public function view_subscriptions_count($id,$subid)
	{
		
		$this->db->select('*');
		$this->db->from('subscription_transaction');
			if($id!='1')
		$this->db->where('user_id', $id);  
		$this->db->where('subscription_id',$subid);
		$query = $this->db->get();
		return $query->num_rows(); 
	}
	
	
	public function totalorderfullfill($id)
	{
		if($id=='1')
		{
		 $this->db->select('*');
		$this->db->from('order_fulfill');
			//if($id!='1')
		//$this->db->where('user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
		}
		else
		{

	$this->db->select('order_fulfill.*,account_mapping.*');
		  $this->db->from('order_fulfill');
		   $this->db->join('account_mapping', 'order_fulfill.account_id = account_mapping.account_id', 'left outer'); 
		$this->db->where('account_mapping.user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 	
		}
	}
	
	
	
	public function orderfulfilauto($id)
	{
		
		if($id=='1')
		{
		 $this->db->select('*');
		$this->db->from('order_fulfill');
			//if($id!='1')
		$this->db->where('order_mode','auto');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
		}
		else
		{

	$this->db->select('order_fulfill.*,account_mapping.*');
		  $this->db->from('order_fulfill');
		   $this->db->join('account_mapping', 'order_fulfill.account_id = account_mapping.account_id', 'left outer'); 
		$this->db->where('account_mapping.user_id', $id);  
		$this->db->where('order_fulfill.order_mode', 'auto');
		$query = $this->db->get();
		return $query->num_rows(); 	
		}
	}
	
	
	public function orderimport($id)
	{
		
	if($id=='1')
		{
		 $this->db->select('*');
		$this->db->from('order_import');
			//if($id!='1')
		//$this->db->where('order_mode','auto');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
		}
		else
		{

	$this->db->select('order_import.*,account_mapping.*');
		  $this->db->from('order_import');
		   $this->db->join('account_mapping', 'order_import.account_id = account_mapping.account_id', 'left outer'); 
		$this->db->where('account_mapping.user_id', $id);  
		//$this->db->where('order_import.order_mode', 'auto');
		$query = $this->db->get();
		return $query->num_rows(); 	
		}
		
	}
	public function orderfulfilmanual($id)
	{
		
		
	}
	public function ordernotfulfill($id)
	{
		
		if($id=='1')
		{
		 $this->db->select('*');
		$this->db->from('order_not_fulfill');
		$query = $this->db->get();
		return $query->num_rows(); 
		}
		else
		{

	$this->db->select('order_not_fulfill.*,account_mapping.*');
		  $this->db->from('order_not_fulfill');
		   $this->db->join('account_mapping', 'order_not_fulfill.account_id = account_mapping.account_id', 'left outer'); 
		$this->db->where('account_mapping.user_id', $id);  
		//$this->db->where('order_import.order_mode', 'auto');
		$query = $this->db->get();
		return $query->num_rows(); 	
		}
	}
	
	public function faketrackingnumber($id)
	{
		
		if($id=='1')
		{
		 $this->db->select('*');
		$this->db->from('fake_tracking_number');
			//if($id!='1')
		//$this->db->where('order_mode','auto');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->num_rows(); 
		}
		else
		{

	$this->db->select('fake_tracking_number.*,account_mapping.*');
		  $this->db->from('fake_tracking_number');
		   $this->db->join('account_mapping', 'fake_tracking_number.account_id = account_mapping.account_id', 'left outer'); 
		$this->db->where('account_mapping.user_id', $id);  
		//$this->db->where('order_import.order_mode', 'auto');
		$query = $this->db->get();
		return $query->num_rows(); 	
		}
	}
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
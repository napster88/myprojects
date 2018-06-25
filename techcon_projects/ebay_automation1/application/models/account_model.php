<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	
	
	public function viewaccount($id,$acc_type){
		
		if($acc_type=='all')
			{			
		$this->db->select('account_mapping.*,users.*');
		  $this->db->from('account_mapping');
		   $this->db->join('users', 'account_mapping.user_id = users.id', 'left outer'); 
		$this->db->where('account_mapping.user_id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
		
		}
			else
			{
		
					
		$this->db->select('account_mapping.*,users.*');
		  $this->db->from('account_mapping');
		   $this->db->join('users', 'account_mapping.user_id = users.id', 'left outer'); 
		//$this->db->where('account_mapping.user_id', $id);  
		
			$this->db->where('account_mapping.account_type', $acc_type); 
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
			
				
				
			}
		
		
		
		
	}
	function account_disable($user_id,$account_id,$account_type)
	{
		
		$this->db->select('*');
		$this->db->from('account_mapping');
		$this->db->where('account_id',$account_id);
		if($account_type=='all')
		{
		$this->db->where('user_id',$user_id);
		
		
		}
		
		$query = $this->db->get();
		return $query->result();
		
	}
	
	function account_detail($acc_id)
	{
			$this->db->select('*');
		$this->db->from('account_mapping');
		$this->db->where('account_id',$acc_id);
		$query = $this->db->get();
		return $query->result();
	}
	function account_edit_confirm($acc_id,$user_account_name,$account_token)
	{
	$data = array(
			'user_account_name'=> $user_account_name,
			'account_token'=> $account_token,
			
			);	
		
		$this->db->where('account_id',$acc_id);
		
		$this->db->update('account_mapping', $data);
	}
	
	
	
	function account_disable_confirm($user_id,$account_id,$account_status)
	{
		 if($account_status=='active')
		{
			$data = array(
			'account_status'=> 'inactive'
			);
		 $this->db->where('account_id',$account_id);
		 
		//$this->db->where('user_id',$user_id);
		$this->db->update('account_mapping', $data);
			}
			else
			{
				$data = array(
			'account_status'=> 'active'
			);
			$this->db->where('account_id',$account_id);
			
			//$this->db->where('user_id',$user_id);
		$this->db->update('account_mapping', $data);
		}
		

		
		
	}

	function viewusers_ebay(){
		
		$this->db->select('account_mapping.*,users.*');
		  $this->db->from('account_mapping');
		   $this->db->join('users', 'account_mapping.user_id = users.id', 'left outer'); 
		$this->db->where('account_mapping.account_type', 'ebay');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function viewusers_gmail(){
		$this->db->select('account_mapping.*,users.*');
		  $this->db->from('account_mapping');
		   $this->db->join('users', 'account_mapping.user_id = users.id', 'left outer'); 
		$this->db->where('account_mapping.account_type', 'gmail');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	
	/* public function insertgmailauthorized($id){
	$email=	$_POST['email'];
		$data=array(
		'user_id'=>$id,
		'account_type'=>'gmail',
		'user_account_name'=>$email,
		'account_status'=>'active'
		);
		
		$query = $this->db->insert('account_mapping', $data);
		return $query;
	} */
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
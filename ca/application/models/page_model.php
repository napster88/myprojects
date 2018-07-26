<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	function addpage($title,$slug,$description,$menu_order,$parent,$layout,$status){
		$data = array(
		   'title' => $title ,
		   'slug' => $slug ,
		   'description' => $description,
		   'menu_order' => $menu_order,
		   'parentid' => $parent,
		   'layout' => $layout,
		   'status' => $status
		  // 'created' => time()
		);

		$query = $this->db->insert('pages', $data);
		return $query;
	}
	
	function viewpages(){
		$this->db->select('*');
		$this->db->from('pages');
		//$this->db->where('user_type', '2');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	
	function hidepage($id){
		$data = array(
		   'status' => 2
		);
		$this->db->where('id', $id);
		$this->db->update('pages', $data); 
		return $this->db->affected_rows();
	}
	function viewpage($id){
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function checkslug($slug){
		$this->db->select('slug');
		$this->db->from('pages');
		$this->db->where('slug', $slug); 
		return $this->db->count_all_results();
	}
	function update_page($title,$description,$menu_order,$parent,$layout,$status,$id){
		$data = array(
		   'title' => $title ,
		  // 'slug' => $slug ,
		   'description' => $description,
		   'menu_order' => $menu_order,
		   'parentid' => $parent,
		   'layout' => $layout,
		   'status' => $status
		  // 'created' => time()
		);
		$this->db->where('id', $id);
		$this->db->update('pages', $data); 
		return $this->db->affected_rows();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
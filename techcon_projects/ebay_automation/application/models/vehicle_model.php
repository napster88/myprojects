<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	function add_vehicle($driver_id, $vehicle_sno, $vehicle_no_plate, $vehicle_type, $car_model, $vehicle_year, $vehicle_color, $photofile, $residfile, $drivrlicfile, $vregfile, $vinsurfile, $authfile, $ibanfile){
		$data = array(
		   'vehicle_sno' => $vehicle_sno ,
		   'vehicle_number' => $vehicle_no_plate ,
		   'vehicle_year' => $vehicle_year ,
		   'vehicle_type' => $vehicle_type ,
		   'vehicle_model' => $car_model ,
		   'vehicle_color' => $vehicle_color ,
		   'photograph' => $photofile ,
		   'identity' => $residfile ,
		   'driver_license' => $drivrlicfile ,
		   'vehicle_regisration' => $vregfile ,
		   'vehicle_insurance' => $vinsurfile ,
		   'authorization_image' => $authfile ,
		   'bank_card' => $ibanfile ,
		   'driver_id' => $driver_id
		  // 'created' => time()
		);

		$query = $this->db->insert('vehicles', $data);
		return $query;
	}
	
	function viewservices(){
		$this->db->select('*');
		$this->db->from('services');
		//$this->db->where('user_type', '2');  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	
	function hideservice($id){
		$data = array(
		   'status' => 2
		);
		$this->db->where('id', $id);
		$this->db->update('services', $data); 
		return $this->db->affected_rows();
	}
	function viewservice($id){
		$this->db->select('*');
		$this->db->from('services');
		$this->db->where('id', $id);  
		//$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	function checkslug($slug){
		$this->db->select('slug');
		$this->db->from('services');
		$this->db->where('slug', $slug); 
		return $this->db->count_all_results();
	}
	function update_service($title,$description,$menu_order,$parent,$layout,$status,$id){
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
		$this->db->update('services', $data); 
		return $this->db->affected_rows();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
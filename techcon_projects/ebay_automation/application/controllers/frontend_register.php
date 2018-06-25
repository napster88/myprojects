<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_register extends CI_Controller {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('user_model');
		$this->load->model('driver_model');
		$this->load->model('vehicle_model');
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function check_emailid_driver(){
		$emailid = $_POST['emailid'];
		$count = $this->user_model->checkemail_driver($emailid);
		echo $count;
	}
	public function check_emailid_user(){
		$emailid = $_POST['emailid'];
		$count = $this->user_model->checkemail_user($emailid);
		echo $count;
	}
	public function partner_reg(){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$emailid = $_POST['emailid'];
		$mobileno = $_POST['mobileno'];
		$identy = $_POST['identy'];
		$date = $_POST['date'];
		$current_city = $_POST['current_city'];
		$city = $_POST['city'];
		$code = $_POST['code'];
		//$tnc = $_POST['tnc'];
		$vehicle_sno = $_POST['vehicle_sno'];
		$vehicle_no_plate = $_POST['vehicle_no_plate'];
		$vehicle_type = $_POST['vehicle_type'];
		$car_model = $_POST['car_model'];
		$vehicle_year = $_POST['vehicle_year'];
		$vehicle_color = $_POST['vehicle_color'];
		/* doc */
		//print_r( $_FILES);die();
		$photograph = $_FILES['photograph'];
		$residence = $_FILES['residence'];
		$driver_license = $_FILES['driver_license'];
		$vehicle_reg = $_FILES['vehicle_reg'];
		$vehicle_insur = $_FILES['vehicle_insur'];
		$auth_img = $_FILES['auth_img'];
		$iban = $_FILES['iban'];
		
		$target_dir = "../../assets/document_uploaded/";
		$photofile ='';
		$path ='';
		if($photograph["name"] != ''){
			$this->upload->initialize($this->set_photoupload_options());

				if ( $this->upload->do_upload('photograph')){
					$filedata = $this->upload->data();
					$path = 'assets/document_uploaded/'.$filedata['file_name'];
				}
			$photofile = $path;
		}
		$residfile ='';
		if($residence["name"] != ''){
			$this->upload->initialize($this->set_photoupload_options());

				if ( $this->upload->do_upload('residence')){
					$filedata = $this->upload->data();
					$path = 'assets/document_uploaded/'.$filedata['file_name'];
				}
			$residfile = $path;
		}
		$drivrlicfile ='';
		if($driver_license["name"] != ''){
			$this->upload->initialize($this->set_photoupload_options());

				if ( $this->upload->do_upload('driver_license')){
					$filedata = $this->upload->data();
					$path = 'assets/document_uploaded/'.$filedata['file_name'];
				}
			$drivrlicfile = $path;
		}
		$vregfile ='';
		if($vehicle_reg["name"] != ''){
			$this->upload->initialize($this->set_photoupload_options());

				if ( $this->upload->do_upload('vehicle_reg')){
					$filedata = $this->upload->data();
					$path = 'assets/document_uploaded/'.$filedata['file_name'];
				}
			$vregfile = $path;
		}
		$vinsurfile ='';
		if($vehicle_insur["name"] != ''){
			$this->upload->initialize($this->set_photoupload_options());

				if ( $this->upload->do_upload('vehicle_insur')){
					$filedata = $this->upload->data();
					$path = 'assets/document_uploaded/'.$filedata['file_name'];
				}
			$vinsurfile = $path;
		}
		$authfile ='';
		if($auth_img["name"] != ''){
			$this->upload->initialize($this->set_photoupload_options());

				if ( $this->upload->do_upload('auth_img')){
					$filedata = $this->upload->data();
					$path = 'assets/document_uploaded/'.$filedata['file_name'];
				}
			$authfile = $path;
		}
		$ibanfile ='';
		if($iban["name"] != ''){
			$this->upload->initialize($this->set_photoupload_options());

				if ( $this->upload->do_upload('iban')){
					$filedata = $this->upload->data();
					$path = 'assets/document_uploaded/'.$filedata['file_name'];
				}
			$ibanfile = $path;
		}
		
		$driver_id = $this->driver_model->reg_driver($fname, $lname, $emailid, $mobileno, $identy, $date, $current_city, $city, $code);
		//echo $driver_id;die();
		$result = $this->vehicle_model->add_vehicle($driver_id, $vehicle_sno, $vehicle_no_plate, $vehicle_type, $car_model, $vehicle_year, $vehicle_color, $photofile, $residfile, $drivrlicfile, $vregfile, $vinsurfile, $authfile, $ibanfile);
		if($result){
			
			$message = '<html><body>';
			$message .= '<h1>Hello,</h1>';
			$message .= '<p>User Registration Details :</p>';
			$message .= '<p>First Name : '.$fname.'</p>';
			$message .= '<p>Last Name : '.$lname.'</p>';
			$message .= '<p>Email ID : '.$emailid.'</p>';
			$message .= '<p>Mobile Number : '.$mobileno.'</p>';
			$message .= '<p>Identification/Location : '.$identy.'</p>';
			$message .= '<p>DOB : '.$date.'</p>';
			$message .= '<p>Current City : '.$current_city.'</p>';
			$message .= '<p>City that you want to work out : '.$city.'</p>';
			$message .= '<p>Caption who Rhg Code : '.$code.'</p>';
			$message .= '<p>Serial number of the vehicle : '.$vehicle_sno.'</p>';
			$message .= '<p>Number plate letters and numbers : '.$vehicle_no_plate.'</p>';
			$message .= '<p>Type of the vehicle : '.$vehicle_type.'</p>';
			$message .= '<p>Vehicle Model : '.$car_model.'</p>';
			$message .= '<p>Year of manufacture : '.$vehicle_year.'</p>';
			$message .= '<p>Color : '.$vehicle_color.'</p>';
			/*$message .= '<p>Photograph: '.base_url('assets/document_uploaded').'/'.$photofile.'</p>';
			$message .= '<p>Residence / Identity: '.base_url('assets/document_uploaded').'/'.$residfile.'</p>';
			$message .= '<p>Driving License : '.base_url('assets/document_uploaded').'/'.$drivrlicfile.'</p>';
			$message .= '<p>Vehicle registration : '.base_url('assets/document_uploaded').'/'.$vregfile.'</p>';
			$message .= '<p>Insurance of vehicles : '.base_url('assets/document_uploaded').'/'.$vinsurfile.'</p>';
			$message .= '<p>Authorization image : '.base_url('assets/document_uploaded').'/'.$authfile.'</p>';
			$message .= '<p>Bank card showing the IBAN : '.base_url('assets/document_uploaded').'/'.$ibanfile.'</p>';*/
			$message .= '</body></html>';
			$this->email->from($emailid, $fname.' '.$lname);
			$this->email->to('noreply@najez-online.com'); 
			//$this->email->cc('another@another-example.com'); 
			//$this->email->bcc('them@their-example.com'); 
			$this->email->subject('Partner Registration');
			$this->email->message($message);
			$this->email->send();

			
			$message = '<html><body>';
			$message .= '<h1>Dear '.$fname.' '.$lname.',</h1>';
			$message .= '<p>Thankyou for submitting the details. We will keep you posted.</p>';
			$this->email->from('info@najez-online.com', 'Najez');
			$this->email->to($emailid); 
			//$this->email->cc('another@another-example.com'); 
			//$this->email->bcc('them@their-example.com'); 
			$this->email->subject('Thankyou');
			$this->email->message($message);
			$this->email->send();
			$this->session->set_flashdata('flashdata', 'Success');
			redirect('home','refresh');
		}
	}
	public function user_reg(){
		
		$fname = $_POST['user_fname'];
		$lname = $_POST['user_lname'];
		$email = $_POST['user_email'];
		$pass = rand();
		$mobile = $_POST['user_mobile'];
		$gender = $_POST['user_gender'];
	
		$this->user_model->reg_user($fname,$lname,$email,$pass,$mobile,$gender);
		
		$message = '<html><body>';
		$message .= '<h3>Hello,</h3>';
		$message .= '<p>User Registration Details :</p>';
		$message .= '<p>First Name : '.$fname.'</p>';
		$message .= '<p>Last Name : '.$lname.'</p>';
		$message .= '<p>Email ID : '.$email.'</p>';
		$message .= '<p>Mobile Number : '.$mobile.'</p>';
		$message .= '<p>Gender : '.$gender.'</p>';
		$message .= '</body></html>';
		
		$this->email->from('noreply@najez-online.com', $fname.' '.$lname);
		$this->email->to($email); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 
		$this->email->subject('User Registration');
		$this->email->message($message);
		$this->email->send();
		
		//die();
		$message = '<html><body>';
		$message .= '<h3>Dear '.$fname.' '.$lname.',</h3>';
		$message .= '<p>Thankyou for submitting the details. We will keep you posted</p>';
		$this->email->from('noreply@najez-online.com', 'Najez');
		$this->email->to($email); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 
		$this->email->subject('Thankyou');
		$this->email->message($message);
		$this->email->send();
		$this->session->set_flashdata('flashdata', 'Success');
		//redirect('home','refresh');
			
			
	}
	private function set_photoupload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = '././assets/document_uploaded/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']      = '0';
		$config['overwrite']     = FALSE;

		return $config;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
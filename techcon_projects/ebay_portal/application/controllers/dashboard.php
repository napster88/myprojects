<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		//$this->load->view('welcome_message');
	}
	public function test(){
		
	}
	public function getMessage()
	{
		
		$this->load->view('dashboard');
	}
	
	public function Ebay_success()
	{
	
	echo urldecode($_GET['code']);
		
		
		$auth_code = $_GET['code'];
		
/* $client_id = "kapiltha-EBAYTEST-PRD-108faa0a3-8783ecde";
$client_secret = "PRD-08faa0a3a85f-bc46-42ff-88d0-6908";
$redirect_uri = "localhost/ebay_portal/dashboard/Ebay_success";
$headers = array (
    'Content-Type'  => 'application/x-www-form-urlencoded',
    'Authorization' => sprintf('Basic %s',base64_encode(sprintf('%s:%s', $client_id, $client_secret)))
);
$apiURL = "https://api.ebay.com/identity/v1/oauth2/token";
$urlParams = array (
        "grant_type" => "authorization_code",
        "code" => urlencode($auth_code),
        "redirect_uri" => $redirect_uri
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Should be removed on production
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_HEADER, true );

curl_setopt($ch, CURLOPT_URL, $apiURL);
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers = array ('Authorization' => sprintf('Basic %s',base64_encode(sprintf('%s:%s', $client_id, $client_secret))),'Content-Type'  => 'application/x-www-form-urlencoded') );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $urlParams );

$resp = curl_exec ( $ch );
curl_close ( $ch );

print_r ( $resp );
		 */
		
		?>
		    
		
		<?php
		//$this->load->view('dashboard');
	}
}

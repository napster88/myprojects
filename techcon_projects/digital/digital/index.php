<form action ="" method="post">

Enter Account Holder name<input type="text" name="name">
Enter address<input type="text" name="address">
Enter Phone<input type="text" name="phone">
Enter email<input type="text" name="email">
Enter amount<input type="text" name="amount">
Enter Routing num<input type="text" name="Routing">
Enter account number<input type="text" name="account">
Enter check number<input type="text" name="check">
<input type="submit" name="Save">
</form>
<?php ob_start();
if(isset($_POST['Save']))
{
	$font = 'Calibri.ttf';
	//echo '<div style="font-family:Verdana, sans-serif;">kapil</div>kapil';
	//die();
	include("cheque.php");
	include("invoice.php");
	extract($_POST);
include("MPDF57/mpdf.php");
include("imagetext.php");


	/*get texts first letter and convert to uppercase*/
	$text=strtoupper($_POST['name']{0});
	
	/*create class object*/
	$phptextObj = new phptextClass();
	
	/*phptext function to genrate image with text*/
	$image= $phptextObj->phptext($text,'#FFF','',100,260,260,'img/',time().'.jpg');
 
	
	//echo $image;
	//die();
	
		
 
$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
 
$mpdf->SetDisplayMode('fullpage');
 
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
 


$mpdf->AddPage();

//$mpdf->WriteHTML($stylesheet,1);  

$mpdf->WriteHTML($invoice);
$mpdf->AddPage();

$mpdf->WriteHTML($cheque);

//$mpdf->Output();

// FOR EMAIL
$content = $mpdf->Output('', 'S'); // Saving pdf to attach to email 
$content = chunk_split(base64_encode($content));
// Email settings
$mailto = 'thakur.1988ideas@gmail.com';
$from_name = $name;
$from_mail = $email;
$replyto = 'email@domain.com';
$uid = md5(uniqid(time())); 
$subject = 'mdpf email with PDF';
$message = 'Download the attached pdf';
$filename = 'lubus_mpdf_demo.pdf';
$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$header .= $content."\r\n\r\n";
$header .= "--".$uid."--";
$is_sent = mail($mailto, $subject, "", $header);
if($is_sent)
echo "@sent";
else
	echo "error";
//$mpdf->Output(); // For sending Output to browser
$mpdf->Output('lubus_mdpf_demo.pdf','D'); // For Download
exit;




}
?>
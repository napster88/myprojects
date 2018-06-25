<html>
<head>
<title>check1</title>
<link href="https://fonts.googleapis.com/css?family=Roboto1" rel="stylesheet"><style>
*{margin:0px; padding:0px;}
.clr:before, .clr:after{content:''; display:block; clear:both;}
body{font-family: 'Roboto', sans-serif; padding-top:40px;}
.check{background:#e9f1f8; width: 80%; margin: 0 auto; padding: 10px 10px;}
.check_border{border:5px solid #c6cdd3;     padding: 20px 20px 30px;}
.form_top{width: 50%; float: left;}
.form_num{float: right; width: 20%; text-align: right; margin-right: 40px;}
.form_cantrol{margin-bottom:15px}
.form_cantrol1{margin-bottom:15px}
.form_cantrol input{background: #e9f1f8;     border: none;
    border-bottom: 1px solid #000;
    width: 78%;
    outline: none;}
.form_cantrol1 input{background: #e9f1f8;     border: none;
    border-bottom: 1px solid #000;
    width: 68%;
    outline: none;}
.form_right{float:right}
.form_right input{background: #e9f1f8;     border: none;
    border-bottom: 1px solid #000;
    width: 82%;
    outline: none;}	
.form_left{float: left;
    border-bottom: 1px solid #000;
    width: 79%;
    border-right: 1px solid #000;}
.form_left label{font-size: 11px;
    width: 74px;
    display: inline-block;}
.form_left input{border:none; outline:none; background: #e9f1f8; width: 88%;}
.form_amout{float:left; width:20%}	
.form_amout input{    border: 1px solid #000;
    padding: 5px 0px;
    margin-left: 7px;
    width: 100%;}
.margin{margin-top:20px;}
.dollars{width: 100%;
    border-bottom: 1px solid #000;
    margin-top: 30px;}
.dollars input{width: 92%;  border: none; background: #e9f1f8; outline:none;}	
.logo{margin: 33px 0px 10px;}
.from{float: left; width: 45%; border-bottom: 1px solid #000;}
.from input{width:90%; border: none; background: #e9f1f8; outline:none;}
.to{float: left;
    width: 45%;
    border-bottom: 1px solid #000;
    margin: 4px 0px 0px 10%;}
.to input{width:90%; border: none; background: #e9f1f8; outline:none;}
.aba{margin:45px 0px 0px;}
.aba input{width: 30%;
    margin: 0px 0px;
    border: none;
    border-bottom: 1px solid #000;
    background: #e9f1f8; outline:none;}
.aba input:nth-child(2){margin-left: 6%;}
.aba input:nth-child(3){margin-left: 3%;}
::-webkit-input-placeholder{color:#000;}
	</style>
<body>
<?php 
//if(date('d-m-y')=='23-06-17') 
{ ?>
<form action="" method="POST">


<div class="check">
<div class="check_border">

<div class="form_top">
<div class="form_cantrol">
 <input type="text" placeholder="NAME" name="name">
</div>
<div class="form_cantrol">
<input type="text" placeholder="ADDRESS" name="address"></div>
<div class="form_cantrol">
<input type="text" placeholder="CITY" name="city"></div>
<div class="form_cantrol">
<input type="text" placeholder="STATE" name="state"></div>
<div class="form_cantrol">
<input type="text" placeholder="ZIP" name="zip">
</div>

</div>

<div class="form_num"><input type="text" placeholder="CHEQUE NUMBER" name="cheque_name"></div>
<div class="clr"></div>

<div class="form_right">
<input type="text" name="date">Date
</div>
<div class="clr"></div>
<div class="margin clr">
<div class="form_left">
<label> PAY IN ORDER FOR</label> <input type="text" placeholder="" name="credit_to">
</div>
<div class="form_amout"><input type="text" name="amount" placeholder="AMOUNT">
</div>
</div>

<div class="dollars">
<div class="form_cantrol1">
<input type="text" placeholder="ACCOUNT NO" name="account_no">
</div>
</div>
<div class="logo">
<img src="" />
</div>
<div class="from">
BANK <select name="bank_name">
<option value="BANK 1">BANK</option>
<option value="BANK 2">BANK</option>
</select>
</div>
<div class="to">
MEMO<input type="text" name="memo">
</div>
<div class="clr"></div>
<div class="aba">
<input type="text" placeholder="ABA/Transit Routing Number" name="routing_no">
<input type="text" placeholder="Bank Account Number" name="cnfrm_ac_no">
<input type="text" placeholder="Check Number" name="cnfrm_cheque_no">
</div>
</div>
</div>
<div style="padding-left:300px; padding-top:10px;">Enter Email Id: <input type="text" name="email_id">
<input style="padding:10px;" type="submit" name="Save"></div>
</form>

<?php ob_start();
if(isset($_POST['Save']))
{
  //  $con = mysqli_connect("localhost","indiaweb_kapil","30oct1988","indiaweb_bryantpc");
    
  //  $query_track="SELECT * FROM `uploads` ";
 //$result_track = mysqli_query($con,$query_track);
// print_r($result_track);
 
	$font = 'Calibri.ttf';
	//echo '<div style="font-family:Verdana, sans-serif;">kapil</div>kapil';
	//die();
	include("cheque.php");
include("invoice.php");
	extract($_POST);
include("MPDF57/mpdf.php");
//include("imagetext.php");


	/*get texts first letter and convert to uppercase*/
//	$text=strtoupper($_POST['name']{0});
	
	/*create class object*/
//	$phptextObj = new phptextClass();
	
	/*phptext function to genrate image with text*/
//	$image= $phptextObj->phptext($text,'#FFF','',100,260,260,'img/',time().'.jpg');
 
	
	//echo $image;
	//die();
	
		
 
$mpdf=new mPDF('c','A4','','' ,0 ,0, 0 ,0 , 0, 0); 
 
$mpdf->SetDisplayMode('fullpage');
 
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
 


$mpdf->AddPage();



$mpdf->WriteHTML($invoice);

$mpdf->AddPage('c','A4','','' , 5 , 5, 5 , 5 , 5 , 5);

$mpdf->WriteHTML($cheque);
$mailto = $_POST['email_id'];

//$from_name ='';
//$from_mail = 'billing@bryantpccare.us';

$filename="uploads/".$_POST['cheque_name'].".pdf";
$content = $mpdf->Output($filename, 'F'); // Saving pdf to attach to email 



$headers = "From: " . $from_mail . "\r\n";
$headers .= "Reply-To: ". $mailto . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";




$msg= '<a href="http://bryantpccare.us/payment/'.$filename.'">Click here</a>';

$is_sent = @mail($mailto, $subject, $msg,$headers);

exit;


}
}
?></body></html>
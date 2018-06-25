<?php include("numwords.php");
$font = 'Calibri.ttf'; 
 $cheque='<html>
<head>
<title>check1</title>
<link href="https://fonts.googleapis.com/css?family=Roboto1" rel="stylesheet">
<style>
*{margin1:0px; padding:0px;}
.clr1:before, .clr1:after{content:""; display:block; clear:both;}
body{font-family: "Roboto1", sans-serif;}
.check1{background:#e9f1f8; width: 80%; margin1: 0 auto1; padding: 30px 10px;}
.check1_border{border:5px solid #c6cdd3;     padding: 20px 20px 30px;}
.form_to1p1{width: 50%; float: left;}
.form_num1{float: right; width: 20%; text-align: right; margin1-right: 40px;}
.form_cantrol1{margin1-botto1m:15px}
.form_cantrol11{margin1-botto1m:15px}
.form_cantrol1 input{background: #e9f1f8;     border: none;
    border-botto1m: 1px solid #000;
    width: 78%;
    outline: none;}
.form_cantrol11 input{background: #e9f1f8;     border: none;
    border-botto1m: 1px solid #000;
    width: 68%;
    outline: none;}
.form_right1{float:right}
.form_right1 input{background: #e9f1f8;     border: none;
    border-botto1m: 1px solid #000;
    width: 82%;
    outline: none;}	
.form_left1{float: left;
    border-botto1m: 1px solid #000;
    width: 79%;
    border-right: 1px solid #000;}
.form_left1 label{font-size: 11px;
    width: 74px;
    display: inline-block;}
.form_left1 input{border:none; outline:none; background: #e9f1f8; width: 88%;}
.form_amout1{float:left; width:20%}	
.form_amout1 input{    border: 1px solid #000;
    padding: 5px 0px;
    margin1-left: 7px;
    width: 100%;}
.margin1{margin1-to1p:20px;}
.dollars1{width: 100%;
    border-botto1m: 1px solid #000;
    margin1-to1p: 30px;}
.dollars1 input{width: 92%;  border: none; background: #e9f1f8; outline:none;}	
.logo1{margin1: 33px 0px 10px;}
.from1{float: left; width: 45%; border-botto1m: 1px solid #000;}
.from1 input{width:90%; border: none; background: #e9f1f8; outline:none;}
.to1{float: left;
    width: 45%;
    border-botto1m: 1px solid #000;
    margin1: 4px 0px 0px 10%;}
.to1 input{width:90%; border: none; background: #e9f1f8; outline:none;}
.aba1{margin1:45px 0px 0px;}
.aba1 input{width: 30%;
    margin1: 0px 0px;
    border: none;
    border-botto1m: 1px solid #000;
    background: #e9f1f8; outline:none;}
.aba1 input:nth-child(2){margin1-left: 6%;}
.aba1 input:nth-child(3){margin1-left: 3%;}
::-webkit-input-placeholder{color:#000;}
	</style>
</head>
<body>
<div class="check1">
	<div class="check1_border">
		<div class="form_to1p1">
			<div class="form_cantrol1">'.$_POST["name"].'</div>
			<div class="form_cantrol1">'.$_POST["address"].'</div>
			<div class="form_cantrol1">'.$_POST["city"].'</div>
			<div class="form_cantrol1">'.$_POST["state"].'</div>
			<div class="form_cantrol1">'.$_POST["zip"].'</div>
		</div>

<div class="form_num1">'.$_POST["cheque_no"].'</div>
<div class="clr1"></div>
<div class="form_right1">'.$_POST["date"].'Date
</div>
<div class="clr1"></div>
<div class="margin1 clr1">
<div class="form_left1">
<label>PAY TO THE ORDER OF</label>'.$_POST["credit_to"].'</div>
<div class="form_amout1">$'.$_POST["amount"].'

</div>
</div>
<div class="dollars1">
<div class="form_cantrol11">
ACCOUNT NO'.$_POST["account_no"].'
</div>
</div>
<div class="logo1">
<img src="logo1.png" />
</div>
<div class="from1">'.$_POST["bank_name"].'

</div>
<div class="to1">
MEMO'.$_POST["memo"].'
</div>
<div class="clr1"></div>
<div class="aba1">'.$_POST["routing_no"].' ! '.$_POST["account_no"].' ! '.$_POST["cheque_no"].'

</div>

</div>
</div>
</body>
</html>';





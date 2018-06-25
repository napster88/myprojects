<?php include("numwords.php");
$font = 'Calibri.ttf'; 
 $cheque='
<html>
<head>
   <style>
    body
        {
            width:100%;
            font-family:Arial;
            font-size:10pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
        }
         
        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: 149mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
		
   .cheque_div
		{
			background-color: #8080801a;  max-width: 1060px;  padding: 30px;    margin: 30px;
			
		}
		.first_td
		{
			width:475px;
		}
		.amount
		{
			padding-left: 401px; align:right;padding-top: 19px;
		}
		.center_text
		{
			text-align:center;
		}
		.second
		{
			padding-top:25px;
		}
		.cheque_div{
			style="background-color: #8080801a; 
    max-width: 1060px;
    padding: 30px;
    margin: 30px;
		}
		.date
		{
			font-weight: 800;
		}
		  *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:10pt;
            color:#000;
        }
   </style>
</head>
<body>
     

<div class="cheque_div" >
<table><tr><td class="first_td">
<h4>DEPOSIT TO THE ACCOUNT OF</h4>
BRYANT PC CARE<br/>
4302 W ECHO LANE<br/>
GLENDALE, AZ, 85302<br/>
602, 842-7017 Ext:101<br/>
</td><td rowspan=3>
<div class="amount">
<table>
<tr><td>Cash</td><td>00.00</td></tr>
<tr><td>Cheque No.('.$_POST["check"].')</td><td>'.$_POST["amount"].'</td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td>SUB TOTAL</td><td>'.$_POST["amount"].'</td></tr>
<tr><td>Less Cash Received</td><td></td></tr>
<tr><td>USD</td><td>'.$_POST["amount"].'</td></tr>
</table>
</div></td></tr>
<tr><td class="center_text">
 DATE '.date("d-m-y").'
</td></tr>
<tr><td class="second">
Desert School FCU<br/>
5690 W Thunderbird Rd<br/>
Glendale, AZ 85306<br/>
</td></tr>
</table>
</div>
<div class="cheque_div">
<span class="date" >Date: '.date("d-m-y").'</span>
<span style="font-weight: 800; padding-left: 782px;">'.$_POST["check"].'</span>
<table><tr><td style="width:475px;">
'.strtoupper($name).'<br/>'.$_POST["address"].'<br/>
'.$_POST['phone'].'<br/>
</td><td rowspan=8>
<div class="amount" style="padding-left: 347px; align:center;">
<table>
<tr><td style="font-size: 24px; font-weight: 600; ">USD $'.$_POST["amount"].'</td></tr>
<tr><td></td></tr>
<tr><td colspan=2 style="font-size:30px; font-family:Verdana, sans-serif;">'.$_POST["name"].'</td></tr>
</table>
</div></td></tr>
<tr><td>
 PAY TO THE 
</td></tr>
<tr><td style="padding-top:25px;">
order of:BRYANT PC CARE</td></tr>
<tr><td style="padding-top:25px;">
Pay exacty:
'.strtoupper(convert_number_to_words($_POST["amount"])).' ONLY/</td></tr>
</table>
</div>
</body>
</html>';
?>
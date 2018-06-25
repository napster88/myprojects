

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

<?php
//mail('thakur.1988ideas@gmail.com','heee','hdgdgdg');
/* if(isset($_POST['Save']))
{
define("DB_NAME", "test");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_HOST", "localhost");
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);

$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];
$query = "INSERT INTO `test`(`name`,`address`,`email`) VALUES ('$name','$address','$email')";
	$result = mysqli_query($dbc,$query);
$m;
$q="SELECT * FROM `test`";
	$resultm = mysqli_query($dbc,$q);
	print_r($resultm);
	
	if($resultm->num_rows==0)
	  {
		$m=1;
	}
	else
	{
	while($rom=mysqli_fetch_array($resultm))
	{
		$m=$rom['id'];
	}
	} 
	 
include_once('MPDF57/mpdf.php');

//ob_start();
//$mpdf=new mPDF();
$mpdf=new mPDF('c','','','Serif' ,2, 2 , 2 , 2 , 2 , 2 , 'L'); 






$mpdf->list_indent_first_level =1;  // 1 or 0 - whether to indent the first level of a list

$mpdf->SetDisplayMode('fullpage');
$headers = 'From:demo'.'<kapil.thakur@techconlabs.com>'."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$subject = 'Your file.';
$msg ='<h2>We cannot wait to look after you!</h2>
Your Name:'.$name.'<br/>Your address:'.$address.'<br/>
We look forward to looking after you soon!<br/>
You can download your file <a href="'.$m.'.pdf">CLICK HERE</a>';
$mpdf->WriteHTML($msg);
		$name=$m.'.pdf';
$content = $mpdf->Output($name,'F');

  
//mail($email,$subject,$msg,$headers);

 
Jubail, Dammam, Khobar, Dhahran or Hofuf
} */



if(isset($_POST['Save']))
{ ?>

<div class="cheque_div" style="background-color: #8080801a;  max-width: 1060px;  padding: 30px;    margin: 30px;">
<table><tr><td style="width:475px;">
<h4>DEPOSIT TO THE ACCOUNT OF</h4>
BRYANT PC CARE<br/>
4302 W ECHO LANE<br/>
GLENDALE, AZ, 85302<br/>
602, 842-7017 Ext:101<br/>
</td><td rowspan=3>
<div class="amount" style="padding-left: 401px; align:right;padding-top: 19px;">
<table>
<tr><td>Cash</td><td>00.00</td></tr>
<tr><td>Cheque No.</td><td><?php echo $_POST['amount']; ?></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td>SUB TOTAL</td><td><?php echo $_POST['amount']; ?></td></tr>
<tr><td>Less Cash Received</td><td></td></tr>
<tr><td>USD</td><td><?php echo $_POST['amount']; ?></td></tr>
</table>
</div></td></tr>
<tr><td style="text-align:center;">
 DATE <?php echo date('d-m-y'); ?>
</td></tr>
<tr><td style="padding-top:25px;">
Desert School FCU<br/>
5690 W Thunderbird Rd<br/>
Glendale, AZ 85306<br/>
</td></tr>
</table>
</div>
<div class="cheque_div" style="background-color: #8080801a; 
    max-width: 1060px;
    padding: 30px;
    margin: 30px;
">
<span style="font-weight: 800; ">Date: <?php echo date('d-m-y'); ?></span>
<span style="font-weight: 800; padding-left: 782px;"><?php echo $_POST['check']; ?></span>
<table><tr><td style="width:475px;">
<?php echo $_POST['name'];?><br/>
<?php echo $_POST['address'];?><br/>
<?php echo $_POST['phone'];?><br/>
</td><td rowspan=8>
<div class="amount" style="padding-left: 347px; align:center;">
<table>
<tr><td style="font-size: 24px; font-weight: 600; ">USD $<?php echo $_POST['amount']; ?></td></tr>
<tr><td></td></tr>
<tr><td colspan=2 style="font-size:30px; font-style: oblique;"><?php echo $_POST['name'];?></td></tr>
</table>
</div></td></tr>
<tr><td>
 PAY TO THE 
</td></tr>
<tr><td style="padding-top:25px;">
order of:BRYANT PC CARE</td></tr>
<tr><td style="padding-top:25px;">
Pay exacty:
<?php echo strtoupper(convert_number_to_words($_POST['amount']))." ONLY/"; ?></td></tr>
</table>
</div>
<?php 
}




function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}
?>

<?php
//print_r($this->order);die;
$stateArray= unserialize( WP_STATES);
$id=$this->order;//:$current_order;
$invType=1;//($this->order->post_status=='wc-completed')?0:1;
$orderID=$id->id;

$_customer_user=get_post_meta($orderID,'_customer_user',true);
$_invno=get_post_meta($orderID,'_bewpi_formatted_invoice_number',true);
if($_invno)
$_SESSION['session_invoice_number']=$_invno;
add_post_meta($orderID, 'formatted_invoice_number',$_SESSION['session_invoice_number']);

//$fp = fopen('payment_log_.txt', 'a'); fwrite($fp, "$_invno testing body.php"); fclose($fp);
$items = $id->get_items();
foreach ( $items as $item ) {
	 $product_id = $item['product_id'];
}

$batchCode=get_post_meta( $product_id,'batch_name',true);

$date=$id->order_date;
$name= get_post_meta($orderID,'_billing_first_name',true) . ' ' . get_post_meta($orderID,'_billing_last_name',true);
$billingCountry=get_post_meta($orderID,'_billing_country',true);

$state=get_post_meta($orderID,'_billing_state',true);
$_billing_email=get_post_meta($orderID,'_billing_email',true);
$_billing_phone=get_post_meta($orderID,'_billing_phone',true);
$paymmode=get_post_meta($orderID,'_payment_method_title',true);
$tid=get_post_meta($orderID,'_order_txnid',true);
$userAddress=get_user_meta($_customer_user,'billing_address_1',true);

$address= $userAddress . ' ' . $stateArray[$state]['name'] .' ' . $billingCountry;
$code=$stateArray[$state]['code'];



$type=get_post_meta($orderID,'payment_type',true);
$_order_currency	=get_post_meta($orderID,'_order_currency',true);

if($_order_currency=='INR') $_order_currency='Rs. ';
$product_id='';
foreach ( $items as $item ) {
    $product_name = $item['name'];
    $product_id = $item['product_id'];
    $product_variation_id = $item['variation_id'];
    $total=$item['line_total'];
    $tax=$item['line_tax'];
    $net=$item['line_total'] + $item['line_tax'];
}
echo $product_id;
$_product = wc_get_product( $product_id );
$coursetype	=get_post_meta($orderID,'coursetype',true);


if($invType==1){

          if (get_post_meta($orderID,'_order_currency',true) == 'INR')
            {

                if ($coursetype == 'Certificate of Participation')
                {
                    $total = get_post_meta($product_id, 'cop_inr_price',true);
                }
                else
                {
                    $total = get_post_meta($product_id, '_regular_price',true);
                }
            }
            else
            {
                if ($coursetype == 'Certificate of Participation')
                {
                    $total = get_post_meta($product_id, 'cop_usd_price',true);
                }
                else
                {
                    $total = get_post_meta($product_id, '_outside-india_regular_price',true);
                }
            }

    //$total=$_product->get_price();
	 $tax=0;
	 $net=$total;
}


if($billingCountry=='IN'){
	$taxlbl=getTaxStatus($product_id,$_customer_user);
	 $tax_free         = get_field('tax_free', $product_id);
    /*if($tax_free=='Yes'){
        $Notax='';
    }*/
	if($taxlbl=='stax' && $tax_free!='Yes'){
			$cgdiv=$igdiv=$sgdiv=$ugdiv='display:none!important;visiblity:hidden!important;';
			$tax= ($invType==1) ? $total * 15 / 100 :$tax  ;
			$cgst='';
			$sgst='';
			$igst='';
			if($invType==1) $net=$total+$tax;

	}elseif($taxlbl=='cgst' && $tax_free!='Yes'){
			$sdiv='display:none!important;visiblity:hidden!important;';
			$cgst=($invType==1) ? $total * CGST / 100 : $tax/2;
			$sgst=($invType==1)? $total * SGST / 100: $tax/2;
			$igst='';
			$tax='';
			if($invType==1) $net=$total+$cgst + $sgst;

	}else if($tax_free!='Yes'){
		$sdiv='display:none!important;visiblity:hidden!important;';
			$cgst='';
			$sgst='';
			$igst=($invType==1)? $total * GST / 100 : $tax;
			$tax='';
			if($invType==1) $net=$total+$igst;

	}


}else{
	$cgdiv=$igdiv=$sgdiv=$ugdiv='display:none!important;visiblity:hidden!important;';

}

?>
<body>
    <div   class="container default-bg" style="overflow: hidden!important;    display: block!important;" dir="<?php echo is_rtl() ? 'rtl' : 'ltr' ?>">
        <div class="row invoice top-bg ">

            <div class="col-lg-12">
                <div class="col-md-4 nopad" style="padding-top:8px">
                      <a href="http://talentedge.in" target="_blank" title="TALENTEDGE">
                                    <img style="width:215px" src="<?php echo image_to_base64(get_option( 'woocommerce_email_header_image' )) ?>" class="img-responsive pull-left" alt="">
                      </a>
                </div>
                <div class="col-md-6 nopad" style="padding-top:8px">
                    <div class="arrina mart25" style="float:left;font-family: 'GothamLight';">
                        <p style="font-weight:700;color:#000;" class="">Arrina Education Services Pvt Ltd </p>
                        <p style="font-weight:500;color:#000;" class="">5th Floor, Central Board of Irrigation & Power (CBIP) Building, Plot No. 21, Sector -32, Gurugram -122001, Haryana</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden!important;    display: block!important;" class="container invoice default-bg pad20">


            <div class=" row">
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 ">
                    <div class=""><p align="left" style="font-family: Oswald, sans-serif; padding:5px;font-size:25px;"><?php echo ($invType == 1) ? 'Tax Invoice' : 'Receipt' ?></p></div>

                    <p align="left" style="font-family: Oswald, sans-serif; padding:5px;font-size:15px;"><?php echo ($invType == 1) ? 'ORIGINAL FOR RECIPIENT' : '' ?></p>
                </div>
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 invoice2">
                    <div> <p>  <?php echo ($invType == 1) ? 'Serial No. of Invoice' : 'Receipt No.' ?> <?php echo ($invType == 1)? $_invno : $orderID ?> </p>
                        <p>Date  : <?php echo  $date ?></p></div>
                </div></div>
            <div class=" row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mar30">


                </div>
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 ">
                    <div class="customer"><p align="left" style="font-family: Oswald, sans-serif;padding-left:16px!important;">Details of Receiver (Billed to)</p></div>
                    <table style=" font-family: Oswald, sans-serif;" width="100%">
                        <tbody>
							<tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Name of student : </td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"> <?php echo $name ?></td>
                            </tr>
							<tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Email of student : </td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"> <?php echo $_billing_email ?></td>
                            </tr>
							<tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Mobile of student : </td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"> <?php echo $_billing_phone ?></td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Address  of Student : </td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"><?php echo $address; ?> </td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase; <?php  echo ($billingCountry!='IN') ? 'display:none!important;visiblity:hidden!important;' : ''?> ">State Code : </td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;text-transform:uppercase;"> <?php echo $code ?> </td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;<?php  echo ($billingCountry!='IN') ? 'display:none!important;visiblity:hidden!important;' : ''?> ">Place of Supply : </td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"> <?php echo $state ?></td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">GSTIN :</td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;">  Unregistered</td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Order No. : </td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;text-transform:uppercase;font-size:13px;"> <?php echo $orderID ?> </td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Batch No. :</td>
                                <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;font-size:13px;"> <?php echo $batchCode ?> </td>
                            </tr>
                            <?php if($invType!=1){ ?>
								<tr>
									<td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Mode of Payment : </td>
									<td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;font-size:13px;"> <?php echo $paymmode ?></td>
								</tr>

                            <?php } ?>





                        </tbody></table>



                </div>







            </div>



        </div>


        <div style="overflow: hidden!important;    display: block!important;" class="container default-bg">

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mart25">


                    <div class="table-responsive">


                        <table class=" table-bordered table-hover table-striped tablex" width="100%" border="0" style=" font-family: Oswald, sans-serif;border:none !important;width: 97%;!important">
                            <tbody>

                                <tr>

                                    <td class=" custom_td" style="border:1px solid #234795; padding-left:15px;  font-family: Oswald, sans-serif;"> Sr no.</td>
                                    <td class=" custom_td" style="border:1px solid #234795; padding-left:22px; font-family: Oswald, sans-serif;"> Description of Course </td>

                                    <td class=" custom_td" style="border:1px solid #234795; padding-left:15px; min-width:100px; font-family: Oswald, sans-serif;">
                                        Course Amount</td>
                                    <td class=" custom_td" style="border:1px solid #234795; padding-left:15px;min-width:140px; font-family: Oswald, sans-serif;">
                                        Discount</td>
                                    <td class=" custom_td" style="border:1px solid #234795; padding-left:15px;min-width: 185px; font-family: Oswald, sans-serif;"><?php echo $tax_free=='Yes'?'Total Amount':'Taxable Value'; ?></td>

                                </tr>

                                <tr class="paddl" style="background:#ebebeb!important;">
                                    <td valign="top" style="text-align:left;min-width: 65px;padding:13px 15px;border: 1px solid #ddd;!important;">01</td>
                                    <td style="padding:13px 18px;border: 1px solid #ddd;!important;"><?php echo $product_name ?></td>

                                    <td valign="top" style="text-align:left;min-width: 100px;padding:13px 15px;border: 1px solid #ddd;!important;"> <?php echo $_order_currency ?> <?php echo $total ?></td>
                                    <td valign="top" style="text-align:left;min-width: 110px;padding:13px 15px;border: 1px solid #ddd;!important;">-</td>
                                    <td valign="top" style="text-align:left;min-width: 114px;padding:13px 15px;border: 1px solid #ddd;!important;"> <?php echo $_order_currency ?> <?php echo $total ?></td>
                                </tr>
                                <?php if($taxlbl=='cgst' && $tax_free!='Yes') { ?>
									<tr class="paddl" style="background:#ebebeb!important;  ">
										<td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
										<td style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>

										<td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">CGST</td>
										<td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;">9%</td>
										<td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"> <?php echo ( $cgst) ?  $_order_currency .  $cgst : '' ?>  </td>
									</tr>
									<tr class="paddl" style="background:#ebebeb!important;  ">
										<td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
										<td style="padding:6px 18px;"></td>

										<td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">SGST</td>
										<td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;">9%</td>
										<td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"> <?php echo ( $sgst) ? $_order_currency .  $sgst : '' ?></td>
									</tr>

								<?php	} ?>
								<?php if($taxlbl=='igst' && $tax_free!='Yes'){ ?>
									<tr class="paddl" style="background:#ebebeb!important;    ">
										<td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
										<td style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>

										<td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">IGST</td>
										<td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;">18%</td>
										<td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"> <?php echo ( $igst)? $_order_currency .  $igst : ''?></td>
									</tr>
                                <?php } ?>
                                <?php if($taxlbl=='stax' && $tax_free!='Yes') { ?>
                                   <tr class="paddl" style="background:#ebebeb!important;     ">
                                       <td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>

                                      <td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">Service Tax</td>
                                       <td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;"> 15% </td>
                                        <td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"> <?php echo ( $tax)? $_order_currency .  $tax : ''?> </td>
                                    </tr>
                                <?php } ?>

                                <tr class="paddl" style="background:#ebebeb!important;">
                                    <td class="custom_td1" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                    <td class="custom_td1" style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>

                                    <td class="custom_td1" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;"><strong>Total</strong></td>
                                    <td class="custom_td1" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                    <td class="custom_td2" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;">
             <strong>
                 <?php  //echo ($billingCountry!='IN') ? ' display:none!important;visiblity:hidden!important;' : ''?> <?php echo $net ?>
             </strong>
                                    </td>
                                </tr>
                                <tr class="paddl" style="background:#ebebeb;border:none !important;">
                                    <td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border:none !important;"></td>
                                    <td style="padding:6px 18px;border:none !important;"></td>

                                    <td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border:none !important;"></td>
                                    <td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border:none !important;"></td>
                                    <td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border:none !important;">E. &amp; O. E.</td>
                                </tr>

                            </tbody>
                        </table>
                        <table>
                            <tbody>
                            </tbody></table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container default-bg  table_padding mart30">
            <div class="row">
                <div class="col-lg-12 padp">
                    <p><strong style="font-size:15px;line-height:16px;">Total Invoice Value (In Words) - </strong><?php echo  ucwords(numberTowords($net)) ?> Only</p>
                    <p><strong style="font-size:15px;line-height:16px;">Amount of Tax subject to Reverse Charge :</strong> No</p>

                </div></div>
        </div>




        <div style="overflow: hidden!important;    display: block!important;" class="container default-bg  table_padding mart30">
            <div class="row">
                <div class="col-sm-12 padp">
					<?php if($taxlbl=='stax'){ ?>
					 <p><strong style="font-size:13px;font-weight:700;">Service tax  No.  : </strong>  AAKCA1408MSD002 </p>
					 <?php } else { ?>
            		 <p><strong style="font-size:13px;font-weight:700;">Companies GSTIN No.  : </strong>  06AAKCA1408M1ZP </p>
                     <p><strong style="font-size:13px;font-weight:700;">Companies SAC No. : </strong> 999242</p>
                     <p><strong style="font-size:13px;font-weight:700;">CIN. : </strong> U80301MH2012PTC225975</p>
                    <?php } ?>
					 <p><strong style="font-size:13px;font-weight:700;">Note :</strong> This is Computer Generated  <?php echo ($invType==1)? 'Invoice' : 'Receipt' ?></p>
                </div>
            <div class="col-sm-12 padp text-right ">
				<p>For Arrina Education Services Private Limited</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p >Authorised Signatory</p>

			</div>


            </div>
        </div>


        <div class="clearfix"></div>
        <div style="overflow: hidden!important;    display: block!important;" class="container default-bg  table_padding">

            <div class="row table-responsive table-none">

                <div class="col-lg-12 condition ">
                    <h4 style="font-family: Oswald, sans-serif;text-transform:uppercase">Terms &amp; Condition</h4>
                </div>
                <div class="col-lg-12 ">


                    <p class="bg3" style="padding: 8px 21px;font-family: 'GothamLight';font-size:12px;">By using or accessing the information on this website, including, but not limited to downloading or accessing courses through this Website or through designated Software of the Company; You agree to abide by the terms and conditions set forth in these “Terms and Conditions”.
                    </p>

                </div>






            </div>

        </div>

        <div style="overflow: hidden!important;    display: block!important;" class="container default-bg">

            <div class="row footer" style="min-height:30px;">
                <div class="col-lg-12">
                    <p style="padding:11px;background:#555555;font-family: 'GothamLight';"> Copyright © <?php echo date('Y') ?> TALENTEDGE All rights reserved.   |    *Conditions apply</p>
                </div>
            </div>

        </div>







    </div>
</body>

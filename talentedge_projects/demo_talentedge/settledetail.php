<?php
// Load the WordPress library.
require_once( dirname(__FILE__) . '/wp-load.php' );

// Merchant key here as provided by Payu
$key = "355yxa"; //WhmK3z
$salt = "2b5lchnL";
$command = "get_settlement_details";
//$var1 = "2017-12-06"; // txn date (YYYY-MM-DD)
$date = date('Y-m-d');
$var1 = date('Y-m-d', strtotime($date .' -1 day'));
$var1 = $_GET['sdate'];
echo $var1;

$hash_str = $key  . '|' . $command . '|' . $var1 . '|' . $salt ;
$hash = strtolower(hash('sha512', $hash_str));

    $r = array('key' => $key , 'hash' =>$hash , 'var1' => $var1, 'command' => $command);

    $qs= http_build_query($r);
  //  $wsUrl = "https://test.payu.in/merchant/postservice.php?form=1";
    $wsUrl = "https://info.payu.in/merchant/postservice?form=2";
   	$c = curl_init();
    curl_setopt($c, CURLOPT_URL, $wsUrl);
    curl_setopt($c, CURLOPT_POST, 1);
    curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
    curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
    $o = curl_exec($c);
    if (curl_errno($c)) {
      $sad = curl_error($c);
      throw new Exception($sad);
    }
    curl_close($c);

    global $wpdb;

    $decoded_data = json_decode($o);
   echo "<pre>";print_r($decoded_data);die();
    $orderslist = $decoded_data->Txn_details;
    foreach($orderslist as $orderdata){
        $insertdata = json_decode(json_encode($orderdata), True);
        $insertdata = array("payment_method" => "payu") + $insertdata;
      //  print_r(  $insertdata);
      //echo $insertdata['txnid'];
      $orderid = $wpdb->get_var( "SELECT post_id FROM `te_postmeta` WHERE meta_key LIKE '%order_txnid%' AND meta_value = '".$insertdata['txnid']."'");

      if($orderid != null || $orderid != ''){
        $insertdata = array("orderid" => $orderid) + $insertdata;

        $wpdb->insert(
        	'te_settled_orders',
        	$insertdata
        );
      //  die();
        //echo '<pre>'; print_r($insertdata);
      //  die();
      }
    }

      $settledata = $wpdb->get_results( "SELECT * FROM te_settled_orders WHERE requestdate LIKE '%".$var1."%'" );
    echo $wpdb->last_query;
      print_r($settledata);
/*
    $table = array();
      foreach ($settledata as $key => $value) {
           $set_data = json_decode(json_encode($value), True);
          $row = array();
          $orderid = $set_data['orderid'];
          $order = wc_get_order($orderid);
          $row['Order id'] = $orderid;
          $row['Invoice No'] = get_post_meta($orderid, '_bewpi_formatted_invoice_number',true);
          $row['Orderdate'] = get_post_meta($orderid, '_paid_date',true);
          $row['Email'] = get_post_meta($orderid, '_billing_email',true);
          $row['FirstName'] = get_post_meta($orderid, '_billing_first_name',true);
          $row['lastName'] = get_post_meta($orderid, '_billing_last_name',true);
          $row['Phone'] = get_post_meta($orderid, '_billing_phone',true);
          $row['PaymentMethod'] = get_post_meta($orderid, '_payment_method_title',true);

          foreach ($order->get_items() as $item_id => $item) {
            $productid = $item['item_meta']['_product_id'][0];
            $productname = $item['name'];

          }
          $row['Order Amount'] = $order->get_subtotal();

          if(!get_post_meta( $orderid,'_taxtype',true)){
            $order_tax = get_post_meta( $orderid,'_order_tax',true);
            $row['CGST'] = $order_tax / 2;
            $row['SGST'] = $order_tax / 2;
            $row['IGST'] = '';
          }else{
            $row['CGST'] = '';
            $row['SGST'] = '';
            $row['IGST'] = get_post_meta( $orderid,'_order_tax',true);
          }


          $row['OrderTotal'] = get_post_meta($orderid, '_order_total',true);
          $row['Order Currency'] = get_post_meta($orderid, '_order_currency',true);
          $row['Order status'] = $order->get_status();

          $row['Course Total'] = get_post_meta($productid, '_price',true);
          //$row['Course Total'] = $productid;
          $row['Coursename'] = $productname;
          $row['InstituteName'] = get_post_meta($productid, 'institute_headline',true);
          $row['BatchId'] = get_post_meta($productid, 'batch_course_name',true);
          $row['Payment Type'] = get_post_meta($orderid, 'payment_type',true);
          $row['Lead Date'] = '';
          $row['Is Settled'] = 'Yes';
          $row['Settlement Date'] = $set_data['requestdate'];
          $row['Merchant UTR'] = $set_data['mer_utr'];
          $row['Txn ID'] = $set_data['txnid'];
          $row['Net Amount'] = $set_data['mer_net_amount'];
          $row['Service Fee'] = $set_data['mer_service_fee'];
          array_push($table,$row);
          unset($row);
      }
    //  print_r($table);
      $fp = fopen(ABSPATH.'settle_test.csv', 'w');
      fputcsv($fp, array(
                'Order id',
                'Invoice No',
                'Orderdate',
                'Email',
                'FirstName',
                'lastName',
                'Phone',
                'PaymentMethod',
                'Order Amount',
                'CGST',
                'SGST',
                'IGST',
                'OrderTotal',
                'Order Currency',
                'Order status',
                'Course Total',
                'Coursename',
                'InstituteName',
                'BatchId',
                'Payment Type',
                'Lead Date',
                'Is Settled',
                'Settlement Date',
                'Merchant UTR',
                'Txn ID',
                'Net Amount',
                'Service Fee'
            ));
    foreach ($table as $rows) {
        $csvdata = $rows;
        fputcsv($fp, $csvdata);
    }

    fclose($fp);
*/
?>

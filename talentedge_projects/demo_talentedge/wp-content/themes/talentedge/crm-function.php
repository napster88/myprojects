<?php

/**
 * Initialize all the things.
 */
//To be LIVE
add_action('userpro_after_new_registration', "crm_lead_entry", 15, 1);

function crm_lead_entry($userId)
{

    $user_data = get_userdata($userId);
    $fname     = get_user_meta($userId, 'first_name', true);
    $lname     = get_user_meta($userId, 'last_name', true);
    $phone     = get_user_meta($userId, 'billing_phone', true);
    $email     = $user_data->user_email;

    $curl_post_data = array(
        'first_name' => $fname,
        'last_name'  => $lname,
        'email'      => $email,
        'mobile'     => $phone,
        'web_id'     => $userId
    );

    $cResponse = callRestApiPost(CRM_URL . '/apite/v1/lead', $curl_post_data);

    if ($cResponse->status == 1 && $cResponse->lead_id != "")
    {
			update_user_meta($userId, 'crm_lead_id', $cResponse->lead_id);
    }
}

/* * *************** Order (Payments) API ****************** */

//add_action( 'woocommerce_order_status_completed', 'crm_create_payments', 10, 1 );
//To be LIVE
//add_action('woocommerce_payment_complete', 'crm_create_payments', 15, 1);

function crm_create_payments($orderId)
{

    global $wpdb;
    $order      = new WC_Order($orderId);
    $myuser_id  = $order->user_id;
    $crmOrderId = get_post_meta($orderId, 'crm_orderid', true);

    $meta = get_post_meta($orderId);



    if ($order->post_status == "wc-completed" && empty($crmOrderId))
        {
        $items    = $order->get_items();
        $itemId   = '';
        $courseId = '';
        $taxAmount ='';
        $_invno='N/A';
        $invoice_url='N/A';
        foreach ($items as $key => $value)
        {
            $courseId = $value['product_id'];
            $itemId   = $key;
            $taxAmount =  $value['line_tax'];
        }
        //$fp = fopen('payment_log_.txt', 'a'); fwrite($fp, print_r($items, TRUE)); fclose($fp);

        $transactionId = get_post_meta($orderId, '_order_txnid', true);
        $orderCurrency = get_post_meta($orderId, '_order_currency', true);
        $orderTotal    = get_post_meta($orderId, '_order_total', true);
        $orderTax      = get_post_meta($orderId, ' _order_tax', true);
        $crmLeadId     = get_user_meta($myuser_id, 'crm_lead_id', true);
        $batchCrmId    = get_post_meta($courseId, 'crm_id_programme', true);
        $orderDate     = date("Y-m-d", strtotime($order->order_date));
        $PaymentMethod = get_post_meta($orderId, '_payment_method', true);

        $discountFor    = get_user_meta($myuser_id,'discount_for_'.$courseId, true);
        //$discountFor = get_user_meta($myuser_id,'discount_for_orderid_'.$orderId, true);
        $discountStatus = get_user_meta($myuser_id,'discount_update_'.$courseId, true);
        $discountAmount = get_user_meta($myuser_id,'order_discount_'.$courseId, true);

        $user_email     = get_user_meta($myuser_id,'billing_email', true);

        $user_mobile    = get_user_meta($myuser_id,'billing_phone', true);


        $_invno_1         = get_post_meta($orderId,'_bewpi_formatted_invoice_number', true);
        //$_invno_2         = get_post_meta($orderId,'formatted_invoice_number', true);
        //$_invno_3         = $_SESSION['session_invoice_number'];
        $_invno =$_invno_1;
//       $invoice_url = get_bloginfo('url')."/wp-content/uploads/bewpi-invoices/".date("Y")."/".$_invno.".pdf";
//
//        if (!$_invno_1)
//           {
//               $invoice = new BEWPI_Invoice($orderId);
//               $path    = $invoice->save("F");
//
//               // "nas/content/live/talentedge/wp-content/uploads/bewpi-invoices/2018/17-18-01-139.pdf";
//               $invoice_url = get_bloginfo('url')."/wp-content".substr($path, strpos($path, "wp-content") + 10);
//               $_invno = get_post_meta($orderId,'_bewpi_formatted_invoice_number', true);
//           }



        $_taxtype       = get_post_meta($orderId,'_taxtype', true);
        $_tax1          = get_post_meta($orderId,'_tax1', true);
        $payment_type   = get_post_meta($orderId,'payment_type', true);

        $receipt_url = admin_url('admin-ajax.php?action=downloadrec&post='.$orderId.'&nonce='.wp_create_nonce('view'));
        $invoice_url = admin_url('post.php?post='.$orderId.'&action=edit&bewpi_action=view&nonce=ee1c319f5e');

        //echo "tax". $orderTax;

        if($discountStatus != "yes"){
            if($discountFor == "Email"){
                $discountValue = $discountAmount;
                add_user_meta($myuser_id, 'discount_update_'.$courseId, 'yes');
            }
        }

        if ($PaymentMethod == 'atom')
        {
            $query             = "select comment_content from te_comments where comment_post_ID = '" . $orderId . "' and comment_content LIKE '%Transaction%'";
            $atomTransaction   = $wpdb->get_col($query);
            $atomTransactionId = preg_replace("/[^0-9]/", "", $atomTransaction[0]);
            if ($atomTransactionId)
            {
                $transactionId = $atomTransactionId;
            }
            else
            {
                $transactionId = "null";
            }
        }

        if ($PaymentMethod == 'payu_in')
        {
            $transactionId = $transactionId;
        }
        if ($PaymentMethod == 'paytm')
        {
            $transactionId = "null";
        }


        $curl_post_data = array(
            'action'               => 'add',
            'currency'             => $orderCurrency,
            //'crm_lead_id'          => $crmLeadId,
            'email'                => $user_email,
            'mobile'               => $user_mobile,
            'batch_crm_id'         => $batchCrmId,
            'amount'               => $orderTotal,
            'tax'                  => $taxAmount,
            'payment_date'         => $orderDate,
            'payment_realized'     => 'yes',
            'payment_source'       => $PaymentMethod,
            'payment_referencenum' => $transactionId,
            'payment_id'           => "$orderId",
            'discount'             => $discountValue,
            'invoice_number'       => "$_invno",
            'taxtype'              => $_taxtype,
            'tax1'                 => $_tax1,
            'payment_type'        => $payment_type,
            'receipt_url'        => $receipt_url,
            'invoice_url'        => $invoice_url
        );



        $fp = fopen('payment_log_.txt', 'a'); fwrite($fp, print_r($curl_post_data, TRUE)); fclose($fp);





        //print_r($curl_post_data);

        //die();

        $cResponse = callRestApiPost(CRM_URL_BASE . '/index.php?entryPoint=web_lead_payment', $curl_post_data);


        //print_r($cResponse);
         //die();

        if ($cResponse->status == 1 && $cResponse->payment_id != "")
        {
            update_post_meta($orderId, 'crm_orderid', $cResponse->payment_id);
            update_user_meta($myuser_id, 'crm_lead_id', $cResponse->lead_id);
            //get_user_meta()

            $fp = fopen('crm_paymentRespons_log_.txt', 'a');
            fwrite($fp, print_r($cResponse, TRUE));
            fclose($fp);
        }
        else
        {
            $fp = fopen('crm_paymentRespons_log_.txt', 'a');
            fwrite($fp, print_r($cResponse, TRUE));
            fclose($fp);
        }
    }
    else
     {
        $fp = fopen('not_completed_payment_log_.txt', 'a');
        fwrite($fp, "Payment not completed Order: $orderId with status:$order->post_status");
        fclose($fp);
     }
}

//To be LIVE
add_action('save_post', 'crm_update_payments', 18, 1);

function crm_update_payments($orderId)
    {
    $order      = new WC_Order($orderId);
    $myuser_id  = $order->user_id;
    $post_type  = get_post_type($orderId);
    $crmOrderId = get_post_meta($orderId, 'crm_orderid', true);

    if ("shop_order" == $post_type && !empty($crmOrderId))
    {

        $items    = $order->get_items();
        $itemId   = '';
        $courseId = '';

        foreach ($items as $key => $value)
        {
            $courseId = $value['product_id'];
            $itemId   = $key;
        }

        $orderCurrency = get_post_meta($orderId, '_order_currency', true);
        $orderTotal    = get_post_meta($orderId, '_order_total', true);
        $orderTax      = get_post_meta($orderId, ' _order_tax', true);
        $crmLeadId     = get_user_meta($myuser_id, 'crm_lead_id', true);
        $batchCrmId    = get_post_meta($courseId, 'crm_id_programme', true);
        $orderDate     = date("Y-m-d", strtotime($order->order_date));
        $PaymentMethod = get_post_meta($orderId, '_payment_method_title', true);
        if ($PaymentMethod == 'paytm' || $PaymentMethod == 'atom')
        {
            $transactionId = 'null';
        }
        else
        {
            $transactionId = get_post_meta($orderId, '_order_txnid', true);
        }


        if ($order->post_status == "wc-completed")
        {
            $paymentRealized = 'yes';
        }
        else
        {
            $paymentRealized = 'no';
        }

        $curl_post_data = array(
            'action'               => 'update',
            'currency'             => $orderCurrency,
            'crm_lead_id'          => $crmLeadId,
            'batch_crm_id'         => $batchCrmId,
            'amount'               => $orderTotal,
            'tax'                  => $orderTax,
            'payment_date'         => $orderDate,
            'payment_realized'     => $paymentRealized,
            'payment_source'       => $PaymentMethod,
            'payment_referencenum' => $transactionId,
            'payment_id'           => $orderId,
            'crm_payment_id'       => $crmOrderId
        );

        /* Pushing the updated order data to CRM */
        $cResponse = callRestApiPut(CRM_URL_BASE . '/index.php?entryPoint=web_lead_payment', $curl_post_data);
    }
    else if(empty($crmOrderId)){
        crm_create_payments($orderId);
    }
}

/* * *************** Course (batch) Api ************** */

//To be LIVE
add_action('save_post', 'crm_create_batch', 15, 1);

function crm_create_batch($post_id)
{
    $post_type = get_post_type($post_id);
     global $wpdb;

    if ("product" == $post_type)
    {
        $postStatus   = get_post_status($post_id);
        $batchCrmId   = get_field('crm_id_programme', $post_id);
        $courseTitle  = get_the_title($post_id);
        $courseType   = get_field('course_type', $post_id);
        $batchName    = get_field('batch_name', $post_id);
        $programme_id = get_field('crm_programme_id', $post_id);




        $inst_crm_id  = get_field('c_institute', $post_id);
        $insid        = get_post_meta($inst_crm_id, 'field_59075aff790ec', true); //   $c[0]->ID;
        $parent       = get_post_meta($post_id, 'product_parent', true);

		//$action = empty( $_REQUEST['action'] ) ? '' : $_REQUEST['action'];
		if($postStatus == "draft"){
			$wpdb->update('te_postmeta', array('meta_value' => NULL), array('post_id' => $post_id,'meta_key'=>'crm_id_programme'));
		}
        if(!empty($parent) && $postStatus == "publish")
        {
         $parent_programcrm_id = get_field('crm_programme_id', $parent);
         if($parent_programcrm_id){
          $programme_id = $parent_programcrm_id;
          $wpdb->update('te_postmeta', array('crm_programme_id' => $parent_programcrm_id), array('post_id' => $post_id));
         }

        }
        else if (empty($parent) && $postStatus == "publish")
        //if ($postStatus == "publish")
        {
         //echo '$programme_id='.$programme_id. 'crn_url'.CRM_URL;    die;

            //$insid = get_post_meta($inst_crm_id, 'field_59075aff790ec', true); //   $c[0]->ID;

            if (!empty($programme_id))
            {
                //echo "i m inprogra"; die;
                $curl_post_data                   = [];
                $curl_post_data['programe_webid'] = $post_id;
                $curl_post_data['programe_name']  = $courseTitle;
                $curl_post_data['inst_crm_id']    = $insid;
                $cResponse                        = callRestApiPut(CRM_URL . '/apite/v1/programe/' . $programme_id, $curl_post_data);
                //print_r($cResponse);
            }else //if(empty($programme_id) && !$parent )
            {
                //echo "i m in esle"; die;

                $curl_post_data                   = [];
                $curl_post_data['programe_webid'] = $post_id;
                $curl_post_data['programe_name']  = $courseTitle;
                $curl_post_data['inst_crm_id']    = $insid;

                $cResponse = callRestApiPost(CRM_URL . '/apite/v1/programe', $curl_post_data);
                //print_r($cResponse);die;
                if ($cResponse->status == 1 && $cResponse->program_id!= "")
                {
                   $programme_id= $cResponse->program_id;
                   update_field('field_594250a99d54c', $cResponse->program_id, $post_id);
                }else{

                       $error="Programme Not Creted in CRM <br>";
                       foreach($cResponse->result as $rs){
	                   $error .=$rs[0] . '<br>';
                           set_transient("course_crm_error", $error, 45);
                      }                     //set_transient("course_post_errors", $error, 45);
                 }

            }
        }

        //echo '$batchname= '.$batchname;
        //echo '$programme_id= '.$programme_id; die;
        //if (!$batchName || !$programme_id )
        //return false;


        //$courseExcerpt =  strip_tags();

        $courseExcerpt = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags(get_field('course_description', $post_id)))))));

        $courseStartDate = get_field('course_start_date', $post_id, false, false);
        $formatedSDate   = date("Y-m-d", strtotime($courseStartDate));

        $courseDuration = get_field('duration', $post_id);

        $courseDuration = intval(preg_replace('/[^0-9]+/', '', $courseDuration), 10);


        $inrPrice          = get_post_meta($post_id, '_regular_price', true);
        $usdPrice          = get_post_meta($post_id, '_outside-india_regular_price', true);
        $courseStatus      = get_field('course_status', $post_id);
        $lastDate          = get_field('front-end_batch_name', $post_id, false, false);
        $formatedLastDate  = date("Y-m-d", strtotime($lastDate));
        $courseInstituteId = get_field('c_institute', $post_id);
        $instituteCrmid    = get_field('crm_id', $courseInstituteId);
        $installments      = convert_installments_tostring($post_id);
        $installmentsNum   = $installments['instalments_num'];
        $installmentDetail = $installments['string'];

        if ($courseStatus == 1)
        {
            $courseStatus = "enrollment_in_progress";
        }
        if ($courseStatus == 2 || $courseStatus == 6)
        {
            $courseStatus = "closed";
        }
        if ($courseStatus == 3)
        {
            $courseStatus = "classes_in_progress";
        }
        if ($courseStatus == 4)
        {
            $courseStatus = "completed";
        }
        if ($courseStatus == 5)
        {
            $courseStatus = "certification_in_progress";
        }



        if (empty($installmentsNum))
        {
            $installmentsNum   = '1';
            $installmentDetail = $inrPrice . ',' . $usdPrice . ',' . $formatedLastDate;
        }

        $curl_post_data = array(
            'batch_webid'           => strval($post_id),
            'pname'                 => $courseTitle,
            'course_type'           => $courseType,
            'batch_code'            => $batchName,
            'pexcerpt'              => $courseExcerpt,
            'inst_crm_id'           => $insid,
            'batch_start_date'      => $formatedSDate,
            'duration_in_month'     => strval($courseDuration),
            'fees_inr'              => $inrPrice,
            'fees_usd'              => $usdPrice,
            'batch_status'          => $courseStatus,
            'last_date_to_register' => $formatedLastDate,
            'installments'          => $installmentsNum,
            'installment_detail'    => $installmentDetail,
            'programme_crmid'       => $programme_id
        );

        //print_r($curl_post_data);die;

        if ($postStatus == "publish" && empty($batchCrmId))
        {
            $cResponse = callRestApiPost(CRM_URL . '/apite/v1/batch', $curl_post_data);
            //print_r($cResponse);die;
            if ($cResponse->status == 1 && $cResponse->batch_id != "")
            {
                update_field('field_594251219d54d', $cResponse->batch_id, $post_id);
            }else{

                       $error="Batch Not Creted in CRM <br>";
                       foreach($cResponse->result as $rs){
                           //print_r($rs);
                           $error .=$rs[0] . '<br>';
                           set_transient("course_crm_error", $error, 60*60);
                      }  //die;
            }
        }

        if ($postStatus == "publish" && !empty($batchCrmId))
        {
            // $_SESSION['cpdata'] = $curl_post_data;
            $cResponse = callRestApiPut(CRM_URL . '/apite/v1/batch/' . $batchCrmId, $curl_post_data);

           if ($cResponse->status == 1 && $cResponse->batch_id != "")
            {
               // update_field('field_594251219d54d', $cResponse->batch_id, $post_id);
            }else{

                       $error="Batch Not Creted in CRM <br>";
                       foreach($cResponse->result as $rs){
                           $error .=$rs[0] . '<br>';
                           set_transient("course_crm_error", $error, 45);
                      }
            }


            //print_r($cResponse);
            //die();
        }



    }
}

/* Update Lead */
add_filter('acf/save_post', 'crm_lead_update', 8, 1);

//To be LIVE add_filter('acf/save_post', 'crm_lead_update', 8, 1);

function crm_lead_update($userId) {
    $stringArray = explode(_, $userId);
    $user_id     = $stringArray[1];

    if ($user_id)
    {



        //session_start();
        $firstName = $_POST['acf']['field_57bc127b6da72'];
        $lastName  = $_POST['acf']['field_57bc1491f161e'];
        $gender    = $_POST['acf']['field_57bc15a3e2f07'];
        $dob       = date('d/m/Y', strtotime($_POST['acf']['field_57bc15e8e1bc7']));
        $email     = $_POST['acf']['field_57bc166487d17'];
        $phone     = $_POST['acf']['field_57bc16b8819af'];
        $country   = $_POST['acf']['field_57bc1852564b3'];
        $state     = $_POST['acf']['field_57bc189a44c36'];
        $city      = $_POST['acf']['field_57bc18d10acdb'];
        $zipCode   = $_POST['acf']['field_57bc18dd0acdc'];
        $address   = $_POST['acf']['field_57bc19117ec62'];
        $education = $_POST['acf']['field_57bc1ec09cf0f'];
//$formatedSDate = date("Y-m-d", strtotime($courseStartDate));



        $editProfile = array(
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'mobile'     => $phone,
            'gender'     => $gender,
            'dob'        => $dob,
            'email'      => $email,
            'phone'      => $phone,
            'country'    => $country,
            'state'      => $state,
            'city'       => $city,
            'zipCode'    => $zipCode,
            'address'    => $address,
            'education'  => $education
        );

        // print_r($editProfile);
        //die();
        $cResponse = callRestApiPut(CRM_URL . '/apite/v1/lead/' . $user_id, $editProfile);
        //print_r($cResponse);
        //die();
        if ($cResponse->status == 1)
        {
            //$_SESSION['aaa'] = $cResponse->result;
        }
    }
}

add_filter('gform_confirmation_1', 'set_post_content', 10, 4);  //Multi step Lets talk
add_filter('gform_confirmation_2', 'set_post_content', 10, 4);  //Institute Detail
add_filter('gform_confirmation_4', 'set_post_content', 10, 4);    //Call Back Enquiry
add_filter('gform_confirmation_5', 'set_post_content', 10, 4);    //Course Detail
add_filter('gform_confirmation_6', 'set_post_content', 10, 4);    //Category Landing Mobile
add_filter('gform_confirmation_7', 'set_post_content', 10, 4);    //Landing Template
add_filter('gform_confirmation_9', 'set_post_content', 10, 4);    //Brouchure Download
add_filter('gform_confirmation_10', 'set_post_content', 10, 4);   //Course Detail mobile
add_filter('gform_confirmation_11', 'set_post_content', 10, 4);   //Category Landing Mobile
add_filter('gform_confirmation_12', 'set_post_content', 10, 4);   //Landing Template mobile
add_filter('gform_confirmation_15', 'set_post_content', 10, 4);   //Contact Form Learners
add_filter('gform_confirmation_16', 'set_post_content', 10, 4);   //Contact Form Corporate
add_filter('gform_confirmation_18', 'set_post_content', 10, 4);   //Request For a Demo
add_filter('gform_confirmation_19', 'set_post_content', 10, 4);   //About Us Form
add_filter('gform_confirmation_20', 'set_post_content', 10, 4);   //Degree Courses Form
add_filter('gform_confirmation_22', 'set_post_content', 10, 4);   //Article Detail
add_filter('gform_confirmation_23', 'set_post_content', 10, 4);   //Article & Marketing Detail Bottom
add_filter('gform_confirmation_24', 'set_post_content', 10, 4);   //Article Detail Mobile
add_filter('gform_confirmation_25', 'set_post_content', 10, 4);   //Media
add_filter('gform_confirmation_26', 'set_post_content', 10, 4);   //Franchise
add_filter('gform_confirmation_30', 'set_post_content', 10, 4);   //landing page campaign bussiness analyst
add_filter('gform_confirmation_34', 'set_post_content', 10, 4);   //landing page Course Page
add_filter('gform_confirmation_36', 'set_post_content', 10, 4);   //landing page Course Page

function set_post_content($confirmation, $form, $entry, $ajax) {//echo "=======<pre>";print_r($confirmation);exit;
//return $confirmation;
//return "test test";

global $wp_query;
$pageid= $wp_query->post->ID;
//return get_the_ID();
    global $wpdb;

   // $Stringvalue = isset($_COOKIE['queryString'])?$_COOKIE['queryString']:'';
   $cookie_source=($_COOKIE['utm_source'])?$_COOKIE['utm_source']:'';
   $cookie_term=($_COOKIE['utm_term'])?$_COOKIE['utm_term']:'';
   $cookie_medium=($_COOKIE['utm_medium'])?$_COOKIE['utm_medium']:'';
   $cookie_campaign=($_COOKIE['utm_campaign'])?$_COOKIE['utm_campaign']:'';

	$Stringvalue =array(
    'utm_source' => $cookie_source,
    'utm_term' => $cookie_term,
    'utm_medium' => $cookie_medium,
    'utm_campaign' => $cookie_campaign,

	);
    $leaddata = RGFormsModel::get_lead($entry['id']);
    $formdata = GFFormsModel::get_form_meta($entry['form_id']);
    $values = array();
    $newData = array();
    $siteUrl    = get_bloginfo('url');
    foreach ($formdata['fields'] as $key => $field) {
        $newData[str_replace(" ", "_", strtolower($field['label']))] = array('value' => $leaddata[$field['id']], 'id' => $field['id']);
    }


        $email_encoded = rtrim(strtr(base64_encode($newData['email']['value']), '+/', '-_'), '=');
        setcookie('nab_email', $email_encoded, time() + (86400 * 365), "/");
      
        $datasource=($Stringvalue['utm_source'])?$Stringvalue['utm_source']:'Website';
        $datamedium=($Stringvalue['utm_medium'])?$Stringvalue['utm_medium']:'Course Detail';
         $utm_source   = ($newData['utm_source']['value']) ? $newData['utm_source']['value'] : $datasource;
         $utm_medium   = ($newData['utm_medium']['value']) ? $newData['utm_medium']['value'] : $datamedium;
         $utm_term     = ($newData['utm_term']['value']) ? $newData['utm_term']['value'] : $Stringvalue['utm_term'];
         $utm_campaign = ($newData['utm_campaign']['value']) ? $newData['utm_campaign']['value'] : $Stringval['utm_campaign'];

         //echo '$utm_source=='.$utm_source.'$utm_medium='.$utm_medium.'$utm_term='.$utm_term.'$utm_campaign='.$utm_campaign;
         //die;

         // When we select the batch via dropdown on landing page ex. institute/mica-ahmedabad/
        if(isset($newData['utm_term_dropdown']) && $newData['utm_term_dropdown']['value']!=''){
            $utm_term_dropdown = explode("_",$newData['utm_term_dropdown']['value']);
            if(is_array($utm_term_dropdown) && !empty($utm_term_dropdown)){

                $batch_id = $utm_term_dropdown[0];
                if($batch_id!='')
                $utm_term = get_post_meta($batch_id, 'batch_name', true);
            }

        }

       //echo 'dropdown batch value='.$utm_term; die;
        if($utm_source && isset($newData['utm_source']['id']))
        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_source']['id'], 'value' => $utm_source));
        if($utm_campaign && isset($newData['utm_campaign']['id']))
        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_campaign']['id'], 'value' => $utm_campaign));
        if($utm_term && isset($newData['utm_term']['id']))
        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_term']['id'], 'value' => $utm_term));
        if($utm_medium && isset($newData['utm_medium']['id']))
        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_medium']['id'], 'value' => $utm_medium));

        /////////////////////////////////////////////////////////////

    //print_r($newData); die;
    if ($pageid == 33767) {
        $name = $newData['name']['value'];
        $namediv = explode(' ', $name);
        $user = get_user_by('email', $newData['email']['value']);
        $headers = array('Content-Type: text/html; charset=UTF-8',
            'From:  Talentedge <admission@talentedge.in>');

        if ($user) {
            $user_id = $user->ID;
            $subject = "Your Slot for the Happiness Project is Confirmed";
            $body = '<p> Dear ' . $namediv[0] . ',<br><br>Thank you for signing up for Live Talk Series on Happiness. We are thrilled to have you as part of our
Happiness Project: an initiative by Talentedge.in and XLRI Centre of HRD. <br><br>Click the link below and login to the Talentedge portal with your existing username and password and
watch Aashu Calapa - Director, Million Jobs Mission speak about "Finding your Personal Happiness Index" on 29th Nov, (Wednesday), 2017 6 PM.<br><br><a href="' . $siteUrl . '/#loginpopup">'.$siteUrl.'/#loginpopup</a><br><br>Get a chance to watch and interact live with world renowned practitioners and experts from diverse walks of life. <br><br>Looking forward to your participation!<br><br>Please feel free to reach us at rishita.samal@talentedge.in for any queries.<br><br>Thanks<br>
Team Talentedge<br>www.talentedge.in';
        } else {
            $user_id = wp_insert_user(
                    array(
                        'user_login' => $newData['email']['value'],
                        'user_pass' => '0Fq5w@T580te',
                        'first_name' => $namediv[0],
                        'last_name' => $namediv[1],
                        'user_email' => $newData['email']['value'],
                        'display_name' => $newData['name']['value'],
                        'nickname' => $newData['name']['value'],
                        'role' => 'None'
                    )
            );
            $subject = "Your Slot for the Happiness Project is Confirmed";
            $body = '<p> Dear ' . $namediv[0] . ',<br><br>Thank you for signing up for Live Talk Series on Happiness. We are thrilled to have you as part of our Happiness Project: an initiative by Talentedge.in and XLRI Centre of HRD. <br><br>'
                    . 'Click the link below and login to Talentedge portal with the given credentials to watch Aashu Calapa - Director, Million Jobs Mission speak about "Finding your Personal Happiness Index" on 29th Nov, (Wednesday), 2017 6 PM.<br><br>'
                    . '<a href="' . $siteUrl . '/#loginpopup">'.$siteUrl.'/#loginpopup</a><br><br>Login Id: '.$newData['email']['value'].'<br><br>Password: 0Fq5w@T580te <br><br>Get a chance to watch and interact live with world renowned practitioners and experts from diverse walks of life. <br><br>Looking forward to your participation!<br><br>Please feel free to reach us at rishita.samal@talentedge.in for any queries.<br><br>Thanks<br>
Team Talentedge<br>www.talentedge.in';
        }
       // $notify_email = get_user_meta($user_id, 'notify_email', true);
   // if ($notify_email != 1){
        $result = wp_mail($newData['email']['value'], $subject, $body, $headers);
        update_user_meta($user_id, 'notify_email', 1);
    //}
        if ($user_id > 0) {
            //entry into sliq
	   if($newData['mobile_number']['value'].length>10){
		$newData['mobile_number']['value'] = substr($newData['mobile_number']['value'], -10);
            }
            $sliqData = array();
            $name = $newData['name']['value'];
            $namediv = explode(' ', $name);
            $sliqData['username'] = $newData['email']['value'];
            $sliqData['password'] = '0Fq5w@T580te';
            $sliqData['email'] = $newData['email']['value'];
            $sliqData['mobile_no'] = $newData['mobile_number']['value'];
            $sliqData['fname'] = $namediv[0];
            $sliqData['lname'] = $namediv[1];
            $sliqData['gender'] = 'M';
            $sliqData['dob'] = '1970-01-01';
 	    if($user->sliq_id>0){
            	$sliqData['lms_id'] = $user->sliq_id;
            }
            $sliqData['status'] = '1';
            $sliqData['batch_id'] = '40'; //for live 40
            $fields_string = http_build_query($sliqData);
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "/Api/openRegistration");
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
            $decode = json_decode($result, true);
            //$decode=json_encode($decode);
//if($user_id=='22603'){
//return $result;
//}
            $leadres = $wpdb->update('te_rg_lead', array('sliq_id' => $decode['resultData']['id']), array('id' => $entry['id']));
            if($decode['resultData']['id']>0)
                 $user = $wpdb->update('te_users', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
            //return $leadres."=====".$decode['resultData']['id']."####".$decode->resultData->id;
            //close connection
            curl_close($ch);
        }
    }

    //return $confirmation;
    // Commented For Now, Due to Grabing sprint not aligned for testing // Date: 07 NOV 2017
        $utm_source   = ($Stringvalue['utm_source']) ? $Stringvalue['utm_source'] : 'Website';
        $utm_source   = ($newData['utm_source']['value']) ? $newData['utm_source']['value'] : $utm_source;
        $utm_medium   = ($Stringvalue['utm_medium']) ? $Stringvalue['utm_medium'] : 'Course Detail';
        $utm_medium   = ($newData['utm_medium']['value']) ? $newData['utm_medium']['value'] : $utm_medium;

        $utm_term     = ($newData['utm_term']['value']) ? $newData['utm_term']['value'] : $Stringvalue['utm_term'];
        $utm_campaign = ($newData['utm_campaign']['value']) ? $newData['utm_campaign']['value'] : $Stringvalue['utm_campaign'];

    if ($newData['utm_term']['value'] == $Stringvalue['utm_term'] || $newData['utm_term']['value'] == '') {
        global $wpdb;

        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_source']['id'], 'value' => $utm_source));
        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_campaign']['id'], 'value' => $utm_campaign));
        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_term']['id'], 'value' => $utm_term));
        $wpdb->insert('te_rg_lead_detail', array('lead_id' => $entry['id'], 'form_id' => $entry['form_id'], 'field_number' => $newData['utm_medium']['id'], 'value' => $utm_medium));
    }
  //elq entry

    if($entry['form_id']==9){?>
           <form id="idForm" name="elqform" action="https://s1827061339.t.eloqua.com/e/f2" onsubmit="try {return window.confirm(&quot;You are submitting information to an external page.\nAre you sure?&quot;);} catch (e) {return false;}" >
                <input type="hidden" name="elqFormName" value="XLRI_TestForm">
                <input type="hidden" name="elqSiteID" value="1827061339">
               <input type="hidden" name="input_1" value="<?php echo $newData['name']['value'];?>">
               <input type="hidden" name="input_11" value="<?php echo $newData['email']['value'];?>">
               <input type="hidden" name="input_3" value="<?php echo ($newData['mobile_number']['value']) ? $newData['mobile_number']['value'] : $newData['phone']['value'];?>">
           <!-- <input type="submit" value="Submit">-->
          </form>
          <script type="text/javascript">
          //document.forms["elqform"].submit();alert('22222222222');
          var url = "https://s1827061339.t.eloqua.com/e/f2"; // the script where you handle the form input.
//alert(jQuery("#idForm").serialize());
    jQuery.ajax({
           type: "POST",
           url: url,
           data: $("#idForm").serialize(), // serializes the form's elements.
           async:false,
           success: function(data)
           {
               //alert(data); // show response from the php script.
           }
         });

    //e.preventDefault();
          </script>

       <?php }

    $postData = array();

    $postData['name']            = $newData['name']['value'];
    $postData['email']           = $newData['email']['value'];
    $postData['phone']           = ($newData['mobile_number']['value']) ? $newData['mobile_number']['value'] : $newData['phone']['value'];

    /*
    $postData['utm_source']      = ($newData['utm_source']['value']) ? $newData['utm_source']['value'] : $utm_source;
    $postData['utm_medium']      = ($newData['utm_medium']['value']) ? $newData['utm_medium']['value'] : $utm_medium;
    $postData['utm_term']        = ($utm_term!='')? $utm_term : 'Generic_2017-18';
    $postData['utm_campaign']    = $utm_campaign;

     */

    // will be activated the above one and below will be commented
    $postData['utm_source']      = $utm_source;
    $postData['utm_medium']      = $utm_medium;
	//if($entry['form_id']==30)
	//	$postData['utm_term']        = ($utm_term!='')? $utm_term : 'BA-01-0517-01';
	//else
    $postData['utm_term']        = ($utm_term!='')? $utm_term : 'Generic_2017-18';

   $postData['utm_campaign']    = $utm_campaign;

    $postData['work_experience'] = '';
    $postData['education']       = '';
    $postData['city']            = $newData['city']['value'];
    $postData['functional_area'] = $newData['functional_area']['value'];


    $fields_string = http_build_query($postData);
    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, CRM_URL_BASE . "/index.php?entryPoint=lead-genration&");
    //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    //execute post
    $result = curl_exec($ch);
    //close connection
    //print_r($result); die;
    curl_close($ch);

    //return $result;
    return $confirmation;
}

function callRestApiPost($service_url, $curl_post_data) {
    $username = "api@talentedge.in";
    $password = "api_user@123";
    $data_string = json_encode($curl_post_data);
    //$data_string = fix_json($data_string);
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );

    //echo $data_string;


    $curl_response = curl_exec($curl);

    // echo $curl_response;

    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        //die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);

    //echo $curl_response;
    //die();

    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
        ///die('error occured: ' . $decoded->response->errormessage);
    }

    return $decoded;
}

function callRestApiPut($service_url, $curl_post_data) {
    $username = "api@talentedge.in";
    $password = "api_user@123";
    $data_string = json_encode($curl_post_data);
    $curl = curl_init($service_url);
    $data = fix_json($data_string);
    // print_r($curl_post_data);
    //$curl_post_data = (is_array($curl_post_data)) ? http_build_query($curl_post_data) : $curl_post_data;
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Length: ' . strlen($data_string), 'Authorization:Basic YXBpQHRhbGVudGVkZ2UuaW46YXBpX3VzZXJAMTIz', 'Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        //die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);

    $decoded = json_decode($curl_response);
    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
        //die('error occured: ' . $decoded->response->errormessage);
    }

    //print_r($decoded);
    return $decoded;
}

add_action('admin_notices', 'sample_admin_notice__success');

function sample_admin_notice__success() {
    //echo 'in no';
    ?>
    <div style="color: #ffffff;background: red;" class="notice notice-success is-dismissible">
    <?php echo get_transient('course_crm_error') ?>
    </div>
    <?php
    delete_transient('course_crm_error');
}



add_action( 'save_post', 'crm_discount_update_batch',22,1);
function crm_discount_update_batch($post_id){
    $post_type = get_post_type($post_id);
      if( "discounts" == $post_type ){
          $discountTitle = get_the_title($post_id);
          $discountArray = get_fields($post_id);
          $discountStatus = $discountArray['status'];
          $discountType = $discountArray['discount_type'];
          $discountFor = $discountArray['discount_for'];
          $discountCourseId = $discountArray['select_courses'][0];
          $inrPrice = get_post_meta( $discountCourseId, '_regular_price', true);
          $usdPrice =  get_post_meta( $discountCourseId, '_outside-india_regular_price',true);

          //echo ">>>>>>>>>". $discountType

         if($discountStatus == "1"){

              if($discountType == "1"){
                $discountInr = $discountArray['discount_inr'];
                $discountUsd = $discountArray['discount_usd'];
              }
              else{
                $discountInrPerc = $discountArray['discount_percentage_inr'];
                $discountUsdPerc = $discountArray['discount_percentage_usd'];

                $discountInr =  ($discountInrPerc / 100) * $inrPrice;
                $discountUsd =  ($discountUsdPerc / 100) * $usdPrice;

              }
         }

         else{

            $discountInr = "0";
            $discountUsd = "0";
         }

        if($discountFor == "Course"){

          $postStatus = get_post_status($discountCourseId);
          $batchCrmId =  get_field( 'crm_id_programme', $discountCourseId);
          $crmProgramId =  get_field( 'crm_programme_id', $discountCourseId);
          $courseTitle = get_the_title($discountCourseId);
          $courseType =  get_field( 'course_type',$discountCourseId );
          $batchName = get_field( 'batch_name', $discountCourseId);
          //$courseExcerpt =  strip_tags();

          $courseExcerpt = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags(get_field( 'course_description', $discountCourseId )))))));

          $courseStartDate =  get_field( 'course_start_date', $discountCourseId,false, false);
          $formatedSDate = date("Y-m-d", strtotime($courseStartDate));

          $courseDuration =  get_field( 'duration', $discountCourseId );

          $courseDuration = intval(preg_replace('/[^0-9]+/', '', $courseDuration), 10);
          $courseStatus =  get_field( 'course_status', $discountCourseId);
          $lastDate = get_field( 'front-end_batch_name', $discountCourseId,false, false);
          $formatedLastDate = date("Y-m-d", strtotime($lastDate));
          $courseInstituteId =  get_field( 'c_institute', $discountCourseId );
          $instituteCrmid = get_field('field_59075aff790ec', $courseInstituteId);
          //$instituteCrmid = get_post_meta($courseInstituteId,'field_59075aff790ec');


          $installments = convert_installments_tostring($discountCourseId);
          $installmentsNum =  $installments['instalments_num'];
          $installmentDetail =  $installments['string'];

          if($courseStatus == 1 ){
            $courseStatus = "enrollment_in_progress";
          }
          if($courseStatus == 2 || $courseStatus == 6){
              $courseStatus = "closed";
          }
           if($courseStatus == 3){
              $courseStatus = "classes_in_progress";
          }
           if($courseStatus == 4){
              $courseStatus = "completed";
          }
          if($courseStatus == 5){
              $courseStatus = "certification_in_progress";
          }



          if(empty($installmentsNum)){
            $installmentsNum = '1';
            $installmentDetail = $inrPrice.','.$usdPrice.','.$formatedLastDate;
          }

          $curl_post_data =array(
            'batch_webid' => strval($discountCourseId),
            'pname' => $courseTitle,
            'course_type' => $courseType,
            'batch_code' => $batchName,
            'pexcerpt' => $courseExcerpt,
            'inst_crm_id' => $instituteCrmid,
            'batch_start_date' => $formatedSDate,
            'duration_in_month' => strval($courseDuration),
            'fees_inr' => $inrPrice,
            'fees_usd' => $usdPrice,
            'discount_in_inr' => floatval($discountInr),
            'discount_in_usd' => floatval($discountUsd),
            'batch_status' => $courseStatus,
            'last_date_to_register' => $formatedLastDate,
            'installments' =>$installmentsNum,
            'installment_detail' => $installmentDetail,
            'programme_crmid' => $crmProgramId
          );

          //var_dump($instituteCrmid);
          //var_dump($courseInstituteId);

          // echo "<pre>";
          //print_r($curl_post_data);
          // die();


          if($postStatus == "publish" && !empty($batchCrmId)){
            // $_SESSION['cpdata'] = $curl_post_data;
            $cResponse = callRestApiPut(CRM_URL_BASE.'/apite/v1/batch/'.$batchCrmId, $curl_post_data);

            //echo "<pre>";
            //print_r($curl_post_data);
            //print_r($cResponse);
            //die();

          }

      }
  }
}

//add_action( 'gform_after_submission_14', 'after_gform_submit', 10, 2 );
function after_gform_submit( $entry, $form ) {?>
<script>
	var dataLayer = dataLayer | [];
	dataLayer.push({
         event: "leadFormSubmit2"
  });
</script><?php
//add_filter('body_class', 'recommended', PHP_INT_MAX);
 ?>
<?php
    //echo "test test test test";exit;
}
function recommended() {?>
<script>
	//var dataLayer = dataLayer | [];;
	dataLayer.push({
         event: "leadFormSubmit2"
  });
</script>

<?php }

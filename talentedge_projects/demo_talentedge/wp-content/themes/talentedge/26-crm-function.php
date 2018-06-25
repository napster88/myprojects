<?php
/**
 * Initialize all the things. 
 */




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


//To be LIVE add_action('woocommerce_payment_complete', 'crm_create_payments', 15, 1);

function crm_create_payments($orderId)
{
    global $wpdb;
    $order      = new WC_Order($orderId);
    $myuser_id  = $order->user_id;
    $crmOrderId = get_post_meta($orderId, 'crm_orderid', true);

    if ($order->post_status == "wc-completed")
    {
        $items    = $order->get_items();
        $itemId   = '';
        $courseId = '';

        foreach ($items as $key => $value)
        {
            $courseId = $value['product_id'];
            $itemId   = $key;
        }
        $transactionId = get_post_meta($orderId, '_order_txnid', true);
        $orderCurrency = get_post_meta($orderId, '_order_currency', true);
        $orderTotal    = get_post_meta($orderId, '_order_total', true);
        $orderTax      = get_post_meta($orderId, ' _order_tax', true);
        $crmLeadId     = get_user_meta($myuser_id, 'crm_lead_id', true);
        $batchCrmId    = get_post_meta($courseId, 'crm_id', true);
        $orderDate     = date("Y-m-d", strtotime($order->order_date));
        $PaymentMethod = get_post_meta($orderId, '_payment_method', true);

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
            'crm_lead_id'          => $crmLeadId,
            'batch_crm_id'         => $batchCrmId,
            'amount'               => $orderTotal,
            'tax'                  => $orderTax,
            'payment_date'         => $orderDate,
            'payment_realized'     => 'yes',
            'payment_source'       => $PaymentMethod,
            'payment_referencenum' => $transactionId,
            'payment_id'           => "$orderId"
        );

        $cResponse = callRestApiPost(CRM_URL_BASE . '/index.php?entryPoint=web_lead_payment', $curl_post_data);

        //print_r($cResponse);
        // die('madhav');
        if ($cResponse->status == 1 && $cResponse->payment_id != "")
        {
            update_post_meta($orderId, 'crm_orderid', $cResponse->payment_id);
            update_user_meta($myuser_id, 'crm_lead_id', $cResponse->lead_id);
            //get_user_meta()
        }
    }
}

//To be LIVE add_action('save_post', 'crm_update_payments', 18, 1);

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
        $batchCrmId    = get_post_meta($courseId, 'crm_id', true);
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
}

/* * *************** Course (batch) Api ************** */


add_action('save_post', 'crm_create_batch', 15, 1);

function crm_create_batch($post_id)
{
    $post_type = get_post_type($post_id);
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
        if (empty($parent) && $postStatus == "publish")
        {


            //$insid = get_post_meta($inst_crm_id, 'field_59075aff790ec', true); //   $c[0]->ID;

            if (!empty($programme_id))
            {
                $curl_post_data                   = [];
                $curl_post_data['programe_webid'] = $post_id;
                $curl_post_data['programe_name']  = $courseTitle;
                $curl_post_data['inst_crm_id']    = $insid;
                $cResponse                        = callRestApiPut(CRM_URL . '/apite/v1/programe/' . $programme_id, $curl_post_data);
            }else //if(empty($programme_id) && !$parent )
            {

                $curl_post_data                   = [];
                $curl_post_data['programe_webid'] = $post_id;
                $curl_post_data['programe_name']  = $courseTitle;
                $curl_post_data['inst_crm_id']    = $insid;

                $cResponse = callRestApiPost(CRM_URL . '/apite/v1/programe', $curl_post_data);
               // print_r($cResponse);die;
                if ($cResponse->status == 1 && $cResponse->programe_id!= "")
                {
                   $programme_id= $cResponse->programe_id;
                   update_field('field_594250a99d54c', $cResponse->programe_id, $post_id);
                }

            }
        }

       //   echo $batchname;die;
       //  echo $programme_id;die;
        if (!$batchName || !$programme_id )
            return false;


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
            'Last_date_to_register' => $formatedLastDate,
            'installments'          => $installmentsNum,
            'installment_detail'    => $installmentDetail,
            'programme_crmid'       => $programme_id
        );

        //print_r($curl_post_data);

        if ($postStatus == "publish" && empty($batchCrmId))
        {
            $cResponse = callRestApiPost(CRM_URL . '/apite/v1/batch', $curl_post_data);
           // print_r($cResponse);die;
            if ($cResponse->status == 1 && $cResponse->batch_id != "")
            {
                update_field('field_594251219d54d', $cResponse->batch_id, $post_id);
            }
        }

        if ($postStatus == "publish" && !empty($batchCrmId))
        {
            // $_SESSION['cpdata'] = $curl_post_data;
            $cResponse = callRestApiPut(CRM_URL . '/apite/v1/batch/' . $batchCrmId, $curl_post_data);
             //print_r($cResponse);
            //die();
        }
    }
}

/* Update Lead */
add_filter('acf/save_post', 'crm_lead_update', 8, 1);

function crm_lead_update($userId)
{
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

/*
add_filter( 'gform_confirmation_23', 'set_post_content', 10, 4 );

add_filter( 'gform_confirmation_22', 'set_post_content', 10, 4 );
add_filter( 'gform_confirmation_5', 'set_post_content', 10, 4 );
add_filter( 'gform_confirmation_7', 'set_post_content', 10, 4 );*/

function set_post_content($entry, $form)
{
 // print_r($entry);die;
    $leaddata = RGFormsModel::get_lead($entry['id']);
    $formdata = GFFormsModel::get_form_meta($entry['form_id']);

    $values   = array();
    $newData  = array();
    foreach ($formdata['fields'] as $key => $field)
    {

        $newData[str_replace(" ", "_",strtolower($field['label']))] = $leaddata[$field['id']];
    }
    
    //ob_start();
    //print_r($newData);
  

    //echo ob_get_clean();

    //die;

   
    $postData = array();

    $postData['name']            = $newData['name'];
    $postData['email']           = $newData['email'];
    $postData['phone']           = $newData['mobile_number'];
    $postData['utm_source']      = ($newData['utm_source'])?$newData['utm_source']  : 'Website';
    $postData['utm_medium']      = ($newData['utm_medium']) ? $newData['utm_medium']  : 'Course Detail' ;
    $postData['utm_term']        = $newData['utm_term'];
    $postData['utm_campaign']    = ($newData['utm_campaign']) ? $newData['utm_campaign']  : '' ;
    $postData['work_experience'] = '';
    $postData['education']       = '';
    $postData['city']            = $newData['city'];
    $postData['functional_area'] = $newData['functional_area'];


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
    curl_close($ch);


}




function callRestApiPost($service_url, $curl_post_data)
{
    $username    = "api@talentedge.in";
    $password    = "api_user@123";
    $data_string = json_encode($curl_post_data);
    //$data_string = fix_json($data_string);
    $curl        = curl_init($service_url);
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

    if ($curl_response === false)
    {
        $info = curl_getinfo($curl);
        curl_close($curl);
        //die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);

    //echo $curl_response;
    //die();

    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR')
    {
        //die('error occured: ' . $decoded->response->errormessage);
    }

    return $decoded;
}

function callRestApiPut($service_url, $curl_post_data)
{
    $username    = "api@talentedge.in";
    $password    = "api_user@123";
    $data_string = json_encode($curl_post_data);
    $curl        = curl_init($service_url);
    $data        = fix_json($data_string);
    // print_r($curl_post_data);
    //$curl_post_data = (is_array($curl_post_data)) ? http_build_query($curl_post_data) : $curl_post_data; 
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Length: ' . strlen($data_string), 'Authorization:Basic YXBpQHRhbGVudGVkZ2UuaW46YXBpX3VzZXJAMTIz', 'Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $curl_response = curl_exec($curl);
    if ($curl_response === false)
    {
        $info = curl_getinfo($curl);
        curl_close($curl);
        //die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);

    $decoded = json_decode($curl_response);
    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR')
    {
       //die('error occured: ' . $decoded->response->errormessage);
    }

    //print_r($decoded);
    return $decoded;
}

<?php
/**
 * Initialize all the things.
 */
 require get_template_directory() . '/functions-babd.php';
 require get_template_directory() . '/functions-checkoutjs.php';
require get_template_directory() . '/inc/init.php';
require get_template_directory() . '/custom-function.php';
require get_template_directory() . '/global-functions.php';
//echo "ddd"; die
require get_template_directory() . '/crm-function.php';
require get_template_directory() . '/plugin-functions.php';
// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
function get_featured_image($pid, $page)
{
    $alumni_query_image = wp_get_attachment_image_src(get_post_thumbnail_id($pid), 'full', false, '');
    if ($page == 'faculty')
    {
        $dimg = get_field('default_faculty_image', 'option');
    }
    else if ($page == 'video')
    {
        $dimg = get_field('default_video_image', 'option');

    }

    if ($alumni_query_image[0])
    {
        $alumni_query_image_value = $alumni_query_image[0];
    }
    else
    {
        $alumni_query_image_value = get_field('default_faculty_image', 'option');
    }
    return $alumni_query_image_value;
}
/* Add to the functions.php file of your theme */
add_filter('woocommerce_order_button_text', 'woo_custom_order_button_text');
function woo_custom_order_button_text()
{
    return __('PAY NOW', 'woocommerce');
}
add_action('wp_ajax_create_selfi_user', 'create_selfi_user', 10);
/* Mark complete by default */
//add_filter( 'woocommerce_payment_complete_order_status', 'rfvc_update_order_status', 10, 2 );
function rfvc_update_order_status($order_status, $order_id)
{

    $order = new WC_Order($order_id);

    if ('wc-processing' == $order_status)
    {
        $order = wc_get_order($order_id);
        foreach ($order->get_items() as $item)
        {
            $product_name = $item['name'];
            $sku          = $item['product_id'];
        }
        $current_user     = wp_get_current_user();
        $order_new_status = $order->post->post_status;
        update_user_meta($current_user->ID, 'order_' . $sku . '_status', $order_new_status);

        return 'completed';
    }

    return $order_status;
}

add_action('woocommerce_thankyou', 'custom_woocommerce_auto_complete_paid_order', 10, 1);

function custom_woocommerce_auto_complete_paid_order($order_id)
{
    if (!$order_id)
    {
        return;
    }


    // (need those two for "get_post_meta()" function).
    global $woocommerce;
    $order = new WC_Order($order_id);
    $items = $order->get_items();
    foreach ( $items as $item ) {
        // $product_name = $item['name'];
        $course_id = $item['product_id'];
        // $product_variation_id = $item['variation_id'];
    }
    if (get_post_status($order_id) == 'wc-processing' || get_post_status($order_id) == 'wc-completed')
    {
		/* echo '<div class="main_thankyou_div" style="text-align:center;"><a class="btn primary-button" style=" text-align: center;
    align-items: center;
    color: white;
    background-color: gray;"  href="'.get_site_url().'/forms?course_id='.$course_id.'&&course_name='.$course_name.'&&current_user='.$current_user.'&&order_id='.$order_id.'">Please fill Application form</a></div>'; */
    echo get_field('select_form_position',$course_id);
     if(get_field('select_form_position',$course_id) == 'thankyou' && get_field('select_course_form',$course_id) != null){
       $formid = base64_encode(get_field('select_course_form',$course_id));
       echo '<div class="main_thankyou_div" style="text-align:center;"><a class="btn primary-button" style=" text-align: center;
      align-items: center;
      color: white;
      background-color: gray;"  href="'.get_site_url().'/application-form?gform='.$formid.'">Please fill Course Application form</a></div>';
     }
        $order->update_status('completed');

        foreach ($order->get_items() as $item)
        {
            $product_name = $item['name'];
            $sku          = $item['product_id'];
        }
        $current_user     = wp_get_current_user();
        $order_new_status = get_post_status($sku);

        update_user_meta($current_user->ID, 'order_' . $sku . '_status', $order_new_status);
        crm_create_payments($order_id);

    }
}

// Hook in
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields($fields)
{
    $fields['billing']['billing_email']['placeholder']      = 'Email ID *';
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name *';
    $fields['billing']['billing_last_name']['placeholder']  = 'Last Name *';
    $fields['billing']['billing_phone']['placeholder']      = 'Phone Number *';

    return $fields;
}

/* * Email ID will be used as your User ID
 * Add the field to the checkout
 */

//add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_referral_field' );

function my_custom_checkout_referral_field($checkout)
{
    echo '<div id="referraldiv" class="referraldiv">';

    woocommerce_form_field('referral_code', array(
        'type'        => 'text',
        'class'       => array('my-field-class form-row-wide'),
        'label'       => __('Referral Code'),
        'placeholder' => __('Enter Referral code if any'),
            ), $checkout->get_value('referral_code'));

    echo '</div>';
}

/* add_filter( 'woocommerce_billing_fields', 'custom_woocommerce_billing_fields' );

  function custom_woocommerce_billing_fields( $fields ) {

  $fields['billing']['billing_options'] = array(
  'label' => __('Custom Field', 'woocommerce'),
  'placeholder' => _x('Custom Field', 'placeholder', 'woocommerce'),
  'required' => false, // if field is required or not
  'clear' => false, // add clear or not
  'type' => 'text', // add field type
  'class' => array('own-css-name') // add class name
  );
  return $fields;
  }
 */


// Hook in
add_filter('woocommerce_billing_fields', 'rs_custom_billing_fields');

// Function Hook
Function rs_custom_billing_fields($fields)
{
    $fields['referralID'] = array(
        'label'       => __('Referral Code', 'woocommerce'),
        'placeholder' => _x('Referral Code', 'Referral Code', 'woocommerce'),
        'required'    => false,
        'class'       => array('form-row-first'),
        'clear'       => false
    );

    // just copy same format if you’d like to add more fields

    return $fields;
}

/* Get Previous Bacth IDS */

// Disable gateway based on country
function payment_gateway_disable_country($available_gateways)
{
    global $woocommerce;

    if ($woocommerce->customer->get_country() == 'IN')
    {
        unset($available_gateways['payu_in']);
    }
    if ($woocommerce->customer->get_country() <> 'IN')
    {
        unset($available_gateways['paytm']);
        unset($available_gateways['atom']);
        unset($available_gateways['paypal']);
    }
    return $available_gateways;
}

//add_filter( 'woocommerce_available_payment_gateways', 'payment_gateway_disable_country' );


add_action('wp_ajax_coupon_code_check', 'coupon_code_check', 10);
add_action('wp_ajax_nopriv_coupon_code_check', 'coupon_code_check', 10);

function coupon_code_check3()
{
    ob_start();
    $data     = array();
    $price    = $_POST['totalamount'];
    $newprice = '';
    if (isset($_POST['coupon']))
    {
        $coupons = get_posts('numberposts=-1&post_status=publish&post_type=coupons');

        foreach ($coupons as $coupon)
        {
            $coupon_name   = $coupon->post_title;
            $coupon_id     = $coupon->ID;
            $coupon_type   = get_post_meta($coupon_id, 'discount_type', true);
            $coupon_amount = get_post_meta($coupon_id, 'coupon_amount', true);

            if ($coupon_name == $couponname)
            {
                if ($coupon_type == 'percent_product')
                {
                    $newprice      = ($price * ((100 - $coupon_amount) / 100));
                    $discountvalue = ($price * $coupon_amount / 100);
                }
                else
                {
                    $newprice      = $price - $coupon_amount;
                    $discountvalue = $coupon_amount;
                }
                $data = array('type' => $coupons, 'value' => $coupon_type, 'discount_price' => $coupon_amount, 'price' => $newprice);
            }
        }

        $data = array('type' => $coupons);
    }

    wp_send_json($data);
    die();
}

function coupon_code_check()
{
    ob_start();
    if (isset($_POST['coupon']))
    {
        $data       = array();
        $price      = $_POST['totalamount'];
        $couponname = $_POST['coupon'];
        $currency   = $_POST['currency'];
        $pid        = $_POST['courseid'];
        $newprice   = '';

        $d_pid = 0;
        $args = array(
        	'name'           => $couponname,
        	'post_type'      => 'coupons',
        	'post_status'    => 'publish',
        	'posts_per_page' => 1
        );
        $coupons = get_posts( $args );
        //$coupons = get_posts('numberposts=-1&post_status=publish&post_type=coupons');

        foreach ($coupons as $coupon)
        {

            $coupon_id = $coupon->ID;

            $coupon_name = $coupon->post_title;
            $ctitle      = strtoupper($couponname);

            $d_course = get_field('select_courses', $coupon_id);
            $status   = get_field('status', $coupon_id);

            if ($coupon_name == $ctitle && $status == 1)
            {
                $d_pid = $coupon->ID;
            }
            else
            {
                $msg = 'Invalid Coupon Code. Enter a valid ID or talk to our counsellors';
            }
        }
        if ($d_pid != '')
        {

            if (in_array($pid, $d_course))
            {
                $discount_type = get_field('coupon_type', $d_pid);
                $inr_p         = get_field('coupon_percentage_inr', $d_pid);
                $usd_p         = get_field('coupon_percentage_usd', $d_pid);
                $discount_inr  = get_field('coupon_inr', $d_pid);
                $discount_usd  = get_field('coupon_usd', $d_pid);

                if ($discount_type == 2)
                {
                    if ($currency == 'IN')
                    {
                        $ch            = 1;
                        $newprice      = ($price * ((100 - $inr_p) / 100));
                        $discountvalue = ($price * $inr_p / 100);
                    }
                    else
                    {
                        $ch            = 2;
                        $newprice      = ($price * ((100 - $usd_p) / 100));
                        $discountvalue = ($price * $usd_p / 100);
                    }
                }
                else
                {
                    if ($currency == 'IN')
                    {
                        $ch            = 3;
                        $newprice      = $price - $discount_inr;
                        $discountvalue = $discount_inr;
                    }
                    else
                    {
                        $ch            = 4;
                        $newprice      = $price - $discount_usd;
                        $discountvalue = $discount_usd;
                    }
                }
            }
            else
            {
                $msg = 'Coupon is not applicable for this course';
            }
        }

        $data = array('discount_for' => $ch, 'discount' => $discount_type, 'discount_price' => $discountvalue, 'price' => $newprice, 'msg' => $msg);
    }
    wp_send_json($data);
    die();
}

add_action('wp_ajax_saveUserState', 'saveUserState', 10);

function saveUserState()
{
    //echo $_REQUEST['state'];die;
    update_user_meta(get_current_user_id(), 'billing_state', $_REQUEST['state']);
}

add_action('wp_ajax_discount_code_check', 'discount_code_check', 10);
add_action('wp_ajax_nopriv_discount_code_check', 'discount_code_check', 10);

function coupon_code_check2()
{
    ob_start();
    if (isset($_POST['coupon']))
    {

        $data       = array();
        $price      = $_POST['totalamount'];
        $couponname = $_POST['coupon'];
        $newprice   = '';

        $d_pid = '';

        $coupons = get_posts('numberposts=-1&post_status=publish&post_type=coupons');
        /*
          foreach ( $coupons as $coupon ) {

          $coupon_id = $coupon->ID;
          $coupon_name = $coupon->post_title;

          $d_course = get_field('select_courses', $coupon_id );

          if ($coupon_name == $couponname){
          $d_pid = $coupon_id;
          }

          }
          if ($d_pid!=''){
          $discount_type = get_field('coupon_type', $d_pid );
          $inr_p = get_field('coupon_percentage_inr', $d_pid );
          $usd_p = get_field('coupon_percentage_usd', $d_pid );
          $discount_inr = get_field('coupon_inr', $d_pid );
          $discount_usd = get_field('coupon_usd', $d_pid );

          if ($discount_type == 2){
          if ($currency=='IN'){
          $ch = 1;
          $newprice = ($totalamount * ((100-$inr_p) / 100));
          $discountvalue = ($totalamount * $inr_p/100);
          }
          else{
          $ch = 2;
          $newprice = ($totalamount * ((100-$usd_p) / 100));
          $discountvalue = ($totalamount * $usd_p/100);
          }
          }
          else{
          if ($currency=='IN'){
          $ch = 3;
          $newprice = $totalamount - $discount_inr;
          $discountvalue = $discount_inr;
          }
          else{
          $ch = 4;
          $newprice = $totalamount - $discount_usd;
          $discountvalue = $discount_usd;
          }
          }
          }
         */


        $data = array('discount_for' => $coupons);
    }
    wp_send_json($data);
    die();
}

function discount_code_check()
{
    ob_start();
    if (isset($_POST['pid']))
    {
        $data        = array();
        $pid         = $_POST['pid'];
        $totalamount = $_POST['totalamount'];
        $currency    = $_POST['currency'];

        $d_pid = '';

        $args   = array(
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'asc',
            'post_type'      => 'discounts',
            'post_status'    => 'publish',
        );
        $domain = '';

        $current_user = wp_get_current_user();

        if ($current_user)
        {

            $uemail = $current_user->user_email;
            $domain = getDomainFromEmail($uemail);
        }
        $institute = get_field('c_institute', $pid);

        $coupons = get_posts($args);

        foreach ($coupons as $coupon)
        {
            $coupon_id = $coupon->ID;


            $d_inst   = get_field('select_institute', $coupon_id);
            $d_course = get_field('select_courses', $coupon_id);
            $d_email  = get_field('email_domain', $coupon_id);
            $status   = get_field('status', $coupon_id);
            if (in_array($institute, $d_inst))
            {
                $ab           = 1;
                $discount_for = 'institute';
                $d_pid        = $coupon_id;
            }
            if (in_array($pid, $d_course))
            {
                $ab           = 2;
                $discount_for = 'course';
                $d_pid        = $coupon_id;
            }
            if ($domain != '')
            {
                if ($domain == $d_email)
                {
                    $d_email      = get_field('email_domain', $coupon_id);
                    $ab           = 3;
                    $discount_for = 'email';
                    $d_pid        = $coupon_id;
                }
            }

            /* if ($status==2){
              $d_pid='';
              }
             */
        }
        if ($d_pid != '')
        {
            $discount_for  = get_field('discount_for', $d_pid);
            $discount_type = get_field('discount_type', $d_pid);
            $inr_p         = get_field('discount_percentage_inr', $d_pid);
            $usd_p         = get_field('discount_percentage_usd', $d_pid);
            $discount_inr  = get_field('discount_inr', $d_pid);
            $discount_usd  = get_field('discount_usd', $d_pid);

            if ($discount_type == 2)
            {
                if ($currency == 'IN')
                {
                    $ch            = 1;
                    $newprice      = ($totalamount * ((100 - $inr_p) / 100));
                    $discountvalue = ($totalamount * $inr_p / 100);
                }
                else
                {
                    $ch            = 2;
                    $newprice      = ($totalamount * ((100 - $usd_p) / 100));
                    $discountvalue = ($totalamount * $usd_p / 100);
                }
            }
            else
            {
                if ($currency == 'IN')
                {
                    $ch            = 3;
                    $newprice      = $totalamount - $discount_inr;
                    $discountvalue = $discount_inr;
                }
                else
                {
                    $ch            = 4;
                    $newprice      = $totalamount - $discount_usd;
                    $discountvalue = $discount_usd;
                }
            }
        }

        $data = array('discount_for' => $discount_for, 'discount' => $discount_type, 'discount_price' => $discountvalue, 'price' => $newprice, 'email' => $d_email, 'domain' => $domain, 'course' => $d_course, 'courseid' => $_POST['pid']);
    }
    wp_send_json($data);
    die();
}

function get_discountvalue($cid)
{
    $courseid = $cid;
    $args     = array(
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'asc',
        'post_type'      => 'discounts',
        'post_status'    => 'publish',
    );

    /*
      $domain='';
      $current_user = wp_get_current_user();

      if($current_user){

      $uemail = $current_user->user_email;
      $domain = getDomainFromEmail($uemail);
      }
     */
    $institute       = get_field('c_institute', $courseid);
    $totalamount_inr = get_post_meta($courseid, '_regular_price');
    $totalamount_usd = get_post_meta($courseid, '_outside-india_regular_price');

    $inr_amt = $totalamount_inr[0];
    $usd_amt = $totalamount_usd[0];
    $coupons = get_posts($args);

    foreach ($coupons as $coupon)
    {
        $coupon_id = $coupon->ID;


        $d_inst   = get_field('select_institute', $coupon_id);
        $d_course = get_field('select_courses', $coupon_id);

        $d_email = get_field('email_domain', $coupon_id);
        $status  = get_field('status', $coupon_id);
        if (in_array($institute, $d_inst) && $status == 1)
        {
            $ab           = 1;
            $discount_for = 'institute';
            $d_pid        = $coupon_id;
        }
        if (in_array($courseid, $d_course) && $status == 1)
        {
            $ab           = 2;
            $discount_for = 'course';
            $d_pid        = $coupon_id;
        }

        /*
          if ($domain!=''){
          if ($domain == $d_email && $status == 1 ){
          $d_email = get_field('email_domain', $coupon_id );
          $ab = 3;
          $discount_for = 'email';
          $d_pid = $coupon_id;
          }
          }
         */

        /* if ($status==2){
          $d_pid='';
          }
         */
    }
    if ($d_pid != '')
    {
        $discount_title = get_the_title($d_pid);
        $discount_for   = get_field('discount_for', $d_pid);
        $discount_type  = get_field('discount_type', $d_pid);
        $inr_p          = get_field('discount_percentage_inr', $d_pid);
        $usd_p          = get_field('discount_percentage_usd', $d_pid);
        $discount_inr   = get_field('discount_inr', $d_pid);
        $discount_usd   = get_field('discount_usd', $d_pid);

        if ($discount_type == 2)
        {
            $newprice_inr      = ($inr_amt * ((100 - $inr_p) / 100));
            $discountvalue_inr = ($inr_amt * $inr_p / 100);
            $newprice_usd      = ($usd_amt * ((100 - $usd_p) / 100));
            $discountvalue_usd = ($usd_amt * $usd_p / 100);
        }
        else
        {
            $newprice_inr      = $inr_amt - $discount_inr;
            $discountvalue_inr = $discount_inr;
            $newprice_usd      = $usd_amt - $discount_usd;
            $discountvalue_usd = $discount_usd;
        }
    }

    $data = array('newprice_inr' => $newprice_inr, 'newprice_usd' => $newprice_usd, 'discount_price_inr' => $discountvalue_inr, 'discount_price_usd' => $discountvalue_usd, 'email' => $d_email, 'domain' => $domain, 'course' => $d_course, 'discount_for' => $discount_for, 'discount_title' => $discount_title);

    return $data;
}

add_action('wp_ajax_get_installmentprice_ajax', 'get_installmentprice_ajax', 10);
add_action('wp_ajax_nopriv_get_installmentprice_ajax', 'get_installmentprice_ajax', 10);

function get_installmentprice_ajax()
{
    if (isset($_POST['installments']))
    {
        global $woocommerce;
        $installments            = $_POST['installments'];
        session_start();
        $_SESSION['customprice'] = $installments;
    }
}

add_action('woocommerce_before_calculate_totals', 'calculate_price');

//add_action( 'woocommerce_after_calculate_totals', 'get_cart_content' );
function get_cart_content()
{
    $cart = WC()->session->get('cart');
    //print_r($cart);
}

function calculate_price($cart_object)
{
    global $woocommerce;
    @session_start();
    $price = $_SESSION['customprice'];
    if ($price)
    {
        foreach ($cart_object->cart_contents as $key => $value)
        {
            $value['data']->set_price($price);
        }
    }
    $cart = WC()->session->get('cart');
    // changes here to $cart
    WC()->session->set('cart', $cart);
}

/**
 * Returns all the orders made by the user
 * @param int $user_id
 * @param string $status (completed|processing|canceled|on-hold etc)
 * @return array of order ids
 */
function get_all_user_orders($user_id)
{
    if (!$user_id)
    {
        return false;
    }
    $args = array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $user_id,
        'post_type'   => 'shop_order',
    );

    $posts = get_posts($args);
    return wp_list_pluck($posts, 'ID');
}

/**
 * Get all Products Successfully Ordered by the user
 * @return bool|array false if no products otherwise array of product ids
 */
function get_all_products_ordered_by_user()
{
    global $wpdb;
    $orders = get_all_user_orders(get_current_user_id());
    if (empty($orders))
    {
        echo "<p class='text-center'>Currently not enrolled in any course. Start Learning</P>
                             <div class='text-center margin-tp-20'><a class='btn-normal text-uppercase' href='" . get_home_url() . "/browse-courses/'>Browse Courses</a></div>";
    }
    $order_list               = '(' . join(',', $orders) . ')'; //let us make a list for query
    //so, we have all the orders made by this user that were completed.
    $query_select_order_items = "SELECT order_item_id as id FROM {$wpdb->prefix}woocommerce_order_items WHERE order_id IN {$order_list}";
    $query_select_product_ids = "SELECT DISTINCT meta_value as product_id FROM {$wpdb->prefix}woocommerce_order_itemmeta WHERE meta_key=%s AND order_item_id IN ($query_select_order_items)";
    $products                 = $wpdb->get_col($wpdb->prepare($query_select_product_ids, '_product_id'));
    return $products;
}

function get_all_products_ordered_by_user_()
{
    if (is_user_logged_in())
    {
        global $wpdb;
        $orders                   = get_all_user_orders(get_current_user_id());
        $order_list               = '(' . join(',', $orders) . ')'; //let us make a list for query
        //so, we have all the orders made by this user that were completed.
        $query_select_order_items = "SELECT order_item_id as id FROM {$wpdb->prefix}woocommerce_order_items WHERE order_id IN {$order_list}";
        $query_select_product_ids = "SELECT DISTINCT meta_value as product_id FROM {$wpdb->prefix}woocommerce_order_itemmeta WHERE meta_key=%s AND order_item_id IN ($query_select_order_items)";
        $products                 = $wpdb->get_col($wpdb->prepare($query_select_product_ids, '_product_id'));
        return $products;
    }
    else
    {
        return false;
    }
}

/**
 * Get all the orders by Order id
 * @return
 */
function get_order_by_orderid($orderId, $currencySymbol)
{
    global $wpdb;
    if (!$orderId)
    {
        return false;
    }

    $orderdata  = $wpdb->get_row('SELECT te_posts.`ID`, te_posts.`post_date`, te_posts.`post_status`, te_postmeta.`meta_value`
    FROM te_posts INNER JOIN te_postmeta ON te_posts.`ID` = te_postmeta.`post_id`  where te_postmeta.`meta_key` = "_order_total" AND te_posts.`ID` = "' . $orderId . '"');
    $orderTax   = get_post_meta($orderId, '_order_tax', true);
    $orderTotal = $orderdata->meta_value;
    $postDate   = $orderdata->post_date;

    $total = $orderTotal - $orderTax;

    $url = admin_url('admin-ajax.php?bewpi_action=view&post=' . $orderId . '&nonce=' . wp_create_nonce('view'));
    ?>
    <tr class="<?php echo $orderdata->post_status; ?>">
        <td><?php echo $orderID = $orderdata->ID . "<br>"; ?> </td>
        <td class="total_<?php echo $orderdata->post_status; ?>"><?php echo $currencySymbol . $total; ?></td>
        <td><?php
    $date    = new DateTime($postDate);
    echo $date->format('jS-M-Y');
    ?> </td>
        <td><a class="downloadFile" href="<?php echo $url; ?>"><i class="fa icon-download2"></i>Download</a></td>
    </tr>    <?php
}
function get_product_price($product_id, $currency,$coursetype='')
{
    if ($currency == 'INR')
    {
        //cop_inr_price //cop_usd_price
        //echo "$coursetype.xxxxxxxxxxxxxxxxxxxxxx".$product_id;
        if($coursetype=='Certificate of Participation'){
             $price = get_post_meta($product_id, 'cop_inr_price');
        }else{
        $price = get_post_meta($product_id, '_regular_price');
        }
    }
    else
    {   if($coursetype=='Certificate of Participation'){
             $price = get_post_meta($product_id, 'cop_usd_price');
        }else{
        $price = get_post_meta($product_id, '_outside-india_regular_price');
        }
    }
    return $price[0];
}

/* triming whitespaces from the post fields */

function inputData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//add_action('woocommerce_checkout_update_order_meta','te_custom_checkout_field_update_order_meta');

function te_custom_checkout_field_update_order_meta($order_id)
{

    if (!empty($_POST['billing']['billing_gls_name']))
    {
        update_post_meta($order_id, 'Billing Gls Name', esc_attr($_POST['billing']['billing_gls_name_type']));
    }
}

function get_customer_orders($productid)
{

    $contents   = WC()->cart->cart_contents;
    // if( $contents ) foreach ( $contents as $cart_item ){
    //    $productId = $cart_item['product_id'];
    // }
    global $wpdb;
    $postsquery = "select p.order_id, p.order_item_id, p.order_item_name, p.order_item_type, max( CASE WHEN pm.meta_key = '_product_id' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as productID, max( CASE WHEN pm.meta_key = '_qty' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as Qty, max( CASE WHEN pm.meta_key = '_variation_id' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as variationID, max( CASE WHEN pm.meta_key = '_line_total' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as lineTotal, max( CASE WHEN pm.meta_key = '_line_subtotal_tax' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as subTotalTax, max( CASE WHEN pm.meta_key = '_line_tax' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as Tax, max( CASE WHEN pm.meta_key = '_tax_class' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as taxClass, max( CASE WHEN pm.meta_key = '_line_subtotal' and p.order_item_id = pm.order_item_id THEN pm.meta_value END ) as subtotal from te_woocommerce_order_items as p, te_woocommerce_order_itemmeta as pm where order_item_type = 'line_item' and p.order_item_id = pm.order_item_id group by p.order_item_id";

    $pageposts = $wpdb->get_results($postsquery);
    $user_id   = get_current_user_id();
    $newarray  = array();
    if ($pageposts):
        global $post;
        foreach ($pageposts as $post):
            setup_postdata($post);
            $orderid = $post->order_id;

            $puser_id    = get_post_meta($orderid, '_customer_user', true);
            $orderStatus = new WC_Order($orderid);
            if ($productid == $post->productID and $puser_id == $user_id and $orderStatus->post_status == 'wc-completed')
            {
                $order_currency = get_post_meta($orderid, '_order_currency');
                $newarray[]     = $post->lineTotal;
            }

        endforeach;
    endif;

    if ($wpdb->num_rows != '')
    {
        $order_total       = array_sum($newarray);
        $order_total_array = array('total_amount' => $order_total, 'currency' => $order_currency, 'payment_type' => 'full');
    }
    else
    {
        $order_total_array = array();
    }
    return $order_total_array;
}

/* Get User Orders Meta */

function get_customer_order3($productid)
{
    $title   = get_the_title($productid);
    $user_id = get_current_user_id();

    $order_ids = $wpdb->get_results("select
    p.ID as order_id,
    p.post_date,
    max( CASE WHEN pm.meta_key = '_order_currency' and p.ID = pm.post_id THEN pm.meta_value END ) as order_currency,
    max( CASE WHEN pm.meta_key = 'payment_type' and p.ID = pm.post_id THEN pm.meta_value END ) as payment_type,
    max( CASE WHEN pm.meta_key = '_customer_user' and p.ID = pm.post_id THEN pm.meta_value END ) as customer_user,
    max( CASE WHEN pm.meta_key = '_order_total' and p.ID = pm.post_id THEN pm.meta_value END ) as order_total,
    max( CASE WHEN pm.meta_key = '_order_tax' and p.ID = pm.post_id THEN pm.meta_value END ) as order_tax,
    max( CASE WHEN pm.meta_key = '_paid_date' and p.ID = pm.post_id THEN pm.meta_value END ) as paid_date,
    ( select group_concat( order_item_name separator '|' ) from te_woocommerce_order_items where order_id = p.ID ) as order_items
from
    te_posts p
    join te_postmeta pm on p.ID = pm.post_id
    join te_woocommerce_order_items oi on p.ID = oi.order_id
where
    post_type = 'shop_order' and
    post_status = 'wc-completed' and
    oi.order_item_name = '" . $title . "'
group by
    p.ID");


    $rowcount          = $order_ids->num_rows;
    $sum               = '';
    $order_total_array = array();
    foreach ($order_ids as $post)
    {
        //$post->order_id;
        $userid         = $post->customer_user;
        $order_total    = $post->order_total;
        $order_currency = $post->order_currency;
        $payment_type   = $post->payment_type;
        if ($payment_type == '')
        {
            $ptype = 'Full';
        }
        else
        {
            $ptype = $payment_type;
        }
        if ($userid == $user_id)
        {
            $sum += round($order_total);
        }
    }
    if ($rowcount != '')
    {
        $order_total_array = array('total_amount' => $sum, 'currency' => $order_currency, 'payment_type' => $payment_type);
    }
    return $order_total_array;
}

/* Get User Orders Meta */

function get_customer_orders_($productid)
{

    //$contents = WC()->cart->cart_contents;
    // if( $contents ) foreach ( $contents as $cart_item ){
    //    $productId = $cart_item['product_id'];
    // }
    global $wpdb;
    $order_ids         = $wpdb->get_results('SELECT ID FROM `te_posts` WHERE `post_status` = "wc-completed"
                                                            AND te_posts.`ID` IN (SELECT te_woocommerce_order_items.`order_id` FROM te_woocommerce_order_items
                                                            JOIN te_woocommerce_order_itemmeta ON te_woocommerce_order_items. `order_item_id` = te_woocommerce_order_itemmeta.`order_item_id`
                                                            WHERE te_woocommerce_order_itemmeta.`meta_key` = "_product_id" AND te_woocommerce_order_itemmeta.`meta_value` = "' . $productid . '")');
    //$pageposts = $wpdb->get_results($order_ids);
    $user_id           = get_current_user_id();
    $order_total_array = array();
    $sum               = '';
    if ($order_ids):
        global $post;
        setup_postdata($post);
        foreach ($order_ids as $order_id)
        {
            $puser_id = get_post_meta($order_id->ID, '_customer_user', true);
            if ($puser_id == $userId)
            {
                $ordertotal   = get_post_meta($order_id->ID, '_order_total', true);
                $orderamt     = round($ordertotal);
                $currency     = get_post_meta($order_id->ID, '_order_currency', true);
                $payment_type = get_post_meta($order_id->ID, 'payment_type', true);

                if ($payment_type != '')
                {
                    $paymenttype = $payment_type;
                }
                else
                {
                    $paymenttype = 'Full';
                }
                if ($currency != '')
                {
                    $c = $currency;
                }
                else
                {
                    $c = 'INR';
                }
                $sum += $orderamt;
            }
        }
    endif;
    if ($rowcount != '')
    {
        $order_total_array = array('total_amount' => $sum, 'currency' => $currency, 'payment_type' => $paymenttype);
    }
    return $order_total_array;
}

/* course suggestor fields for linkedin */

function linkein_course_suggestor($userId)
{
    $loginLinkedinCheck = get_user_meta($userId, "user_li_linkedincheck");
    if ($loginLinkedinCheck[0] == 'yes')
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitCoursevalue']))
        {
            if (!empty($_POST["experience"]))
            {
                $userExp = ($_POST["experience"]);
            }
            if (!empty($_POST["position"]))
            {
                $userPosition = ($_POST["position"]);
            }
            if (!empty($_POST["industry"]))
            {
                $userIndustry = ($_POST["industry"]);
            }
            $metakeys = array(
                'user_li_position'   => $userPosition,
                'user_li_industry'   => $userIndustry,
                'user_li_experience' => $userExp
            );
            foreach ($metakeys as $key => $value)
            {
                update_user_meta($userId, $key, $value);
            }
        }
        /* Fetching the data based on user selection */
        $suggDesignation = get_user_meta($userId, 'user_li_position');
        $suggIndustry    = get_user_meta($userId, 'user_li_industry');
        $suggExperience  = get_user_meta($userId, 'user_li_experience');
        ?>

        <p class="text-left textDesc">Fill in all the fields below now to get the best suggestion of courses that suit your profile<p>
        <form method="post" id="courseSuggestor" name="courseSuggestor" action="<?php echo get_site_url(); ?>/edit-profile/#suggestcourse">
            <select id="designation" name="position">
        <?php
        if (have_rows('linkedin_designation', 'option')):
            while (have_rows('linkedin_designation', 'option')) : the_row();
                $c_designation = get_sub_field('designation');

                $c_designation = preg_replace('/\s+/', '', $c_designation);
                ?>
                        <option value='<?php echo $c_designation; ?>' <?php if ($suggDesignation[0] == $c_designation) echo "selected"; ?>>
<?php echo get_sub_field('designation'); ?></option>
                <?php
            endwhile;
        endif;
        ?>
            </select>
            <select id="experience" name="experience">
                    <?php
                    if (have_rows('linkedin_experience', 'option')):
                        while (have_rows('linkedin_experience', 'option')) : the_row();
                            $c_experience = get_sub_field('experience');
                            $c_experience = preg_replace('/\s+/', '', $c_experience);
                            ?>
                        <option value='<?php echo $c_experience; ?>' <?php if ($suggExperience[0] == $c_experience) echo "selected"; ?>><?php echo get_sub_field('experience'); ?></option>
                            <?php
                        endwhile;
                    endif;
                    ?>
            </select>
            <select id="industry" name="industry">
        <?php
        if (have_rows('linkedin_industry', 'option')):
            while (have_rows('linkedin_industry', 'option')) : the_row();
                $c_industry = get_sub_field('industry');
                $c_industry = preg_replace('/\s+/', '', $c_industry);
                ?>
                        <option value='<?php echo $c_industry; ?>' <?php if ($suggIndustry[0] == $c_industry) echo "selected"; ?>><?php echo get_sub_field('industry'); ?></option>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
            </select>
            <input class="submit_sugg" type="submit" name="submitCoursevalue" value="Submit">
        </form>                               <?php get_popularcourses_by_userinput($userId); ?>
                            <?php }
                            else
                            {
                                ?>
        <div class='linkedin_btn'><a href= '<?php echo get_site_url(); ?>/process'><img src='http://wordpress.stunnerweb.in/talentedgedev/wp-content/themes/twentysixteen/images/sign-in-with-linkedin.png'/></a></div>
        <!--  <div class="popular_courses">
                                    <?php get_template_part('suggest-course'); ?>

         </div>    -->
        <p class="text-center">“Sign in with Linkedin to see courses mapped to your profile<p>
                                <?php
                                }
                            }

/* get course data */
function get_popularcourses_by_userinput($userId)
{
    $postIdArray     = array();
    $userDesignation = get_user_meta($userId, 'user_li_position');
    $userIndustry    = get_user_meta($userId, 'user_li_industry');
    $userExperience  = get_user_meta($userId, 'user_li_experience');
    global $wpdb;
    $qry_args        = array(
        'post_status'    => 'publish', // optional
        'post_type'      => 'product', // Change to match your post_type
        'posts_per_page' => -1, // ALL posts
    );
    $the_query       = new WP_Query($qry_args);

    // The Loop
    if ($the_query->have_posts())
    {
        // The Loop
        while ($the_query->have_posts()) : $the_query->the_post();
            $post_id           = get_the_ID();
            $CourseDesignation = get_field('suggestion_designation', $post_id);
            $CourseIndustry    = get_field('suggestion_industry', $post_id);
            $CourseExperience  = get_field('suggestion_experience', $post_id);
            $select_course     = get_field('select_course', $post_id);
            if ($select_course == 0)
            {

                if (in_array($userDesignation[0], $CourseDesignation) && in_array($userIndustry[0], $CourseIndustry) && in_array($userExperience[0], $CourseExperience))
                {
                    array_push($postIdArray, $post_id);
                }
            }
        endwhile;
        ?>
<?php if ($postIdArray): ?>
<div class="text-center">
<h2 class="title">
Suggested Courses
</h2>
</div>
<?php //print_r($postIdArray); ?>
<ul class="clearfix row">
<?php foreach ($postIdArray as $p): // variable must NOT be called $post (IMPORTANT) ?>
<li class="suggest_course col-courses-card col-md-4">

<div class="wrap_card">
<?php
$course_id         = $p;
$course_short_name = get_field('course_short_name', $course_id);
$course_batch_name = get_field('batch_name', $course_id);
//$course_start_date = get_field('course_start_date', $course_id);
$course_link       = get_permalink($course_id);
$course_duration   = get_field('duration', $course_id);

if (get_field('course_image', $course_id))
{
$courseimage = get_field('course_image', $course_id);
}
else
{
$courseimage = get_field('default_course_image', 'option');
}
?>
<div class="courseCover" style="background-image: url(<?php echo $courseimage ?>);"></div>
<div class="wrapCard">
    <div class="courseCard-detail">
        <div class="card">
            <h3><a href="<?php echo $course_link; ?>"><?php echo $course_short_name; ?></a></h3>
            <!--  <h3><?php echo "Batch" . $course_batch_name; ?></h3> -->
        </div>
        <ul>
<?php
// check if the repeater field has rows of data
if (have_rows('key_points', $course_id)):

// loop through the rows of data
while (have_rows('key_points', $course_id)) : the_row();
?>
                    <li><?php echo get_sub_field('key_point', $course_id); ?></li>
<?php
endwhile;
endif;
?>
        </ul>
    </div>
    <div class="viewDetailcard">
        <div class="course_period"><i class="fa icon-calendar"></i><span>
<?php
// make date object
$date = new DateTime($course_start_date);
echo $date->format('M j');
?></span></div>
        <div  class="course_period"><i class="fa icon-clock"></i><span><?php echo $course_duration; ?></span></div>
        <div class="btn-te"><a class="redir_btn-a" href="<?php echo $course_link; ?>" title="<?php echo $course_shortname; ?>">View Detail</a></div>
    </div>
</div>
</div>
</li>
<?php endforeach; ?>
</ul>
<?php else : ?>
<?php get_template_part('suggest-course'); ?>

<?php endif; ?>
<?php
}
else
{
echo "<p class='text-center'>No courses found please try with different filters.<p>";
}
}

/* Removing fields form checkout page */

function override_checkout_fields($fields)
{
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    //   unset($fields['billing']['billing_state']);
    unset($fields['order']['order_comments']);
    return $fields;
}

add_filter('woocommerce_checkout_fields', 'override_checkout_fields');



/* * *******Getting the installment data by product id Starts******** */

function get_product_id()
{
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();
    $ids   = array();
    foreach ($items as $item => $values)
    {
        $_product = $values['data']->post;
        $ids[]    = $_product->ID;
    }
    return $ids;
}

add_action('after_billing_code', 'get_Installment_price3', 10, 1);

function get_country_fees2($currency, $product_id, $index)
{
    $currency = $currency;

//$course_price_inr = get_post_meta( $product_id, '_regular_price', true);
//$course_price_usd = get_post_meta( $product_id, '_outside-india_regular_price', true);
//$course_price_inr = get_product_price($product_id, 'INR');
//$course_price_usd = get_product_price($product_id, 'USD');

    $course_price_inr2 = get_post_meta($product_id, '_regular_price');
    $course_price_usd2 = get_post_meta($product_id, '_outside-india_regular_price');

    $course_price_inr = $course_price_inr2[0];
    $course_price_usd = $course_price_usd2[0];

    $full_numberformat_inr = number_format($course_price_inr);
    $full_numberformat_usd = number_format($course_price_usd);

    $courselastdate = get_course_lastdate($product_id);
    $disscount      = get_discountvalue($product_id);

//print_r($disscount);
// if (get_field('global_last_date','option')) {
//     $courselastdate = get_field('global_last_date','option');
// } else {
//      $courselastdate = get_field('front-end_batch_name',$product_id);
// }

    $currencySymbol = get_woocommerce_currency_symbol($selectedCurrency);
    $content        = '';

    if ($index == 1)
    {
        $content .= '<table class="table c_inr"><thead><tr><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody><tr><td><span class="c_currency">' . $currencySymbol . '</span><input type="hidden" class="fdamt" value="' . $course_price_inr . '"/><span class="famt"> ' . $full_numberformat_inr . '</span></td><input type="hidden" class="full_amt_price" value="' . $course_price_inr . '"/><td>' . $courselastdate . '</td></tr></tbody></table>';
    }
    if ($index == 2)
    {
        $content .= '<table class="table c_usd"><thead><tr><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody><tr><td><span class="c_currency">' . $currencySymbol . '</span><input type="hidden" class="fdamt" value="' . $course_price_usd . '"/><span class="famt"> ' . $full_numberformat_usd . '</span></td><input type="hidden" class="full_amt_price" value="' . $course_price_usd . '"/><td>' . $courselastdate . '</td></tr></tbody></table>';
    }

    if ($index == 3)
    {
        $content .= '<table class="table c_inr"><thead><tr><th>Instalment</th><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody>';

        $i         = 1;
        $pay_class = '';
        $rowCount  = $rowCount  = count(get_field('installments', $product_id));

        while (have_rows('installments', $product_id)): the_row();

            $content .= '<tr><th scope="row">' . $i . '</th>';
            $duedate = get_sub_field('installment_due_date', $product_id);

            if ($i == $rowCount)
            {
                //$price = get_sub_field('inr_price', $product_id);
		$price = (get_sub_field('inr_price', $product_id) - $disscount['discount_price_inr']);
            }
            else
            {
                $price = get_sub_field('inr_price', $product_id);
            }
            $numberformat = number_format($price);
            if ($i == 1)
            {
                $content .= '<input type="hidden" class="inst_amt_price" value="' . $price . '"/>';
                $content .= ' <td class="c_inr inst_inr"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat . '</span></td><td class="installment_date">' . $courselastdate . '</td> ';
            }
            else
            {
                $content .= ' <td class="c_inr inst_inr"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat . '</span></td><td class="installment_date">' . $duedate . '</td> ';
            }
            $content .= '</tr>';
            $i++;
        endwhile;
        $content .= '</tbody></tbody></table>';
    }
    if ($index == 4)
    {
        $content .= '<table class="table c_usd"><thead><tr><th>Instalment</th><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody>';

        $u         = 1;
        $pay_class = '';
        $rowCount  = $rowCount  = count(get_field('installments', $product_id));
//echo have_rows('installments', $product_id);
        while (have_rows('installments', $product_id)): the_row();
            $content   .= '<tr><th scope="row">' . $u . '</th>';
            $duedate_u = get_sub_field('installment_due_date', $product_id);
            if ($u == $rowCount)
            {

                $price_u = floatval(get_sub_field('usd_price', $product_id)) - floatval($disscount['discount_price_usd']);
            }
            else
            {
                $price_u = get_sub_field('usd_price', $product_id);
            }


            $numberformat_u = number_format($price_u);
            if ($u == 1)
            {
                $content .= '<input type="hidden" class="inst_amt_price" value="' . $price_u . '"/>';
                $content .= ' <td class="c_usd inst_usd"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat_u . '</span></td><td class="installment_date">' . $courselastdate . '</td> ';
            }
            else
            {
                $content .= ' <td class="c_usd inst_usd"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camth">' . $numberformat_u . '</span></td><td class="installment_date">' . $duedate_u . '</td> ';
            }
            $content .= '</tr>';
            $u++;
        endwhile;
        $content .= '</tbody></tbody></table>';
    }

    $cop = get_field('certification_of_participation', $product_id);
//print_r($disscount);
    if ($cop)
    {

        $course_price_cop_inr = get_field('cop_inr_price', $product_id);
        $course_price_cop_usd = get_field('cop_usd_price', $product_id);

        $full_numberformat_cop_inr = number_format($course_price_cop_inr);
        $full_numberformat_cop_usd = number_format($course_price_cop_usd);

        if ($index == 5)
        {
            //echo 'fifthIndex='.$index;

            $content .= '<table class="table cp_inr"><thead><tr><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody><tr><td><span class="c_currency">' . $currencySymbol . '</span><input type="hidden" class="fdamt" value="' . $course_price_cop_inr . '"/><span class="famt"> ' . $full_numberformat_cop_inr . '</span></td><input type="hidden" class="full_amt_price" value="' . $course_price_cop_inr . '"/><td>' . $courselastdate . '</td></tr></tbody></table>';
        }
        if ($index == 6)
        {
            //echo 'sixthIndex='.$index;
            $content .= '<table class="table cp_usd"><thead><tr><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody><tr><td><span class="c_currency">' . $currencySymbol . '</span><input type="hidden" class="fdamt" value="' . $course_price_cop_usd . '"/><span class="famt"> ' . $full_numberformat_cop_usd . '</span></td><input type="hidden" class="full_amt_price" value="' . $course_price_cop_usd . '"/><td>' . $courselastdate . '</td></tr></tbody></table>';
        }

         if ($index == 7)
        {
            //echo 'seventhIndex='.$index;
            $content .= '<table class="table cp_inr"><thead><tr><th>Instalment</th><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody>';

            $i         = 1;
            $pay_class = '';
            while (have_rows('installments', $product_id)): the_row();

                $duedate = get_sub_field('installment_due_date', $product_id);

                $price        = get_sub_field('cop_inr_price', $product_id);
                $numberformat = number_format($price);
                $content .= (($price!='')? '<tr><th scope="row">' . $i . '</th>' : '');

                /* if ($i == 1 && $price!='')
                {
                    $content .= '<input type="hidden" class="inst_amt_price" value="' . $price . '"/>';
                    $content .= ' <td class="cp_inr inst_inr"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat . '</span></td><td class="installment_date">' . $courselastdate . '</td> ';
                }
                else if($price!='')
                {
                     $content .= '<input type="hidden" class="inst_amt_price" value="' . $price . '"/>';
                    $content .= ' <td class="cp_inr inst_inr"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat . '</span></td><td class="installment_date">' . $duedate . '</td> ';
                }
               */

                if($price!='')
                {
                    $content .= '<input type="hidden" class="inst_amt_price" value="' . $price . '"/>';
                    $content .= ' <td class="cp_inr inst_inr"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat . '</span></td><td class="installment_date">' . $duedate . '</td> ';
                }

                $content .= (($price!='')? '</tr>' : '');
                $i++;
            endwhile;
            $content .= '</tbody></tbody></table>';
        }
        if ($index == 8)
        {
            //echo 'eighthIndex='.$index;
            $content .= '<table class="table cp_usd"><thead><tr><th>Instalment</th><th>Course Fee</th><th>Due Date for Payment</th></tr></thead><tbody>';

            $u         = 1;
            $pay_class = '';
            while (have_rows('installments', $product_id)): the_row();

                $content   .= '<tr><th scope="row">' . $u . '</th>';
                $duedate_u = get_sub_field('installment_due_date', $product_id);

                $price_u        = get_sub_field('cop_usd_price', $product_id);
                $numberformat_u = number_format($price_u);
                if ($u == 1)
                {
                    $content .= '<input type="hidden" class="inst_amt_price" value="' . $price_u . '"/>';
                    $content .= ' <td class="cp_usd inst_usd"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat_u . '</span></td><td class="installment_date">' . $courselastdate . '</td> ';
                }
                else
                {
                    $content .= ' <td class="cp_usd inst_usd"><span class="c_currency">' . $currencySymbol . '</span><span class="c_camt">' . $numberformat_u . '</span></td><td class="installment_date">' . $duedate_u . '</td> ';
                }
                $content .= '</tr>';
                $u++;
            endwhile;
            $content .= '</tbody></tbody></table>';
        }
    }

//echo 'xxx'.$content.'-----'.$index;
    echo $content;
//echo $content="<strong>here i am</strong>";
}
function woocommerce_add_my_user_meta($user_id)
{
    global $woocommerce;
    $courseid = $_POST['course_id'];
    $batchCrmId =  get_field( 'crm_id_programme', $courseid);

    //update_user_meta( $user_id, 'purchased', ''.$order->ID.'' );
    //update_user_meta( $user_id, 'user_courses', ''.$courseid.'');
    //$courseid = $_POST['myfield1'];
    //$user_courses_list = array($courseid;);
    /*
      $user_courses = array();
      $user_courses[$courseid]['total_fees'] = $_POST['myfield2'];
      $user_courses[$courseid]['payment_type'] = $_POST['myfield3'];
      $user_courses[$courseid]['payment_cop'] = $_POST['myfield4'];

      $coupon_arr['code'] = $_POST['myfield5'];
      $coupon_arr['amount'] = $_POST['myfield6'];
      $coupon_arr['totalamount'] = $_POST['myfield7'];


      $user_courses[$courseid]['coupon'] = $coupon_arr;
      $user_courses[$courseid]['paid_amount'] = $_POST['myfield8'];
      $user_courses[$courseid]['balance_amount'] = $_POST['myfield9'];
      $user_courses[$courseid]['next_due_date'] = $_POST['myfield10'];
      $user_courses[$courseid]['inst_index'] = $_POST['myfield11'];

      $user_courses[$courseid]['currency'] = $_POST['myfield13'];
      $user_courses[$courseid]['payment_option'] = $_POST['myfield13'];

      $orders_arr['id'] = $order->ID;
      $orders_arr['amount'] = $_POST['myfield8'];
      $orders_arr['payment'] = $_POST['myfield12'];
      $orders_arr['date'] = '26 Sep 2016';

      $user_courses[$courseid]['orders'] = $orders_arr;
     */
    update_user_meta($user_id, 'referred_by', $_POST['referralID']);
    $ulogin     = get_user_meta($user_id, 'billing_email', true);
    wp_update_user(array('ID' => $user_id, 'user_login' => $ulogin));
    //wp_update_user( array ( 'ID' => $user_id, 'user_pass' => '0Fq5w@T580te' ) ) ;
    update_user_meta($user_id, 'usereditprofile_email', $ulogin);
    //update_user_meta( $user_id, 'user_course_'.$courseid.'', $user_courses);
    $siteUrl    = get_bloginfo('url');
    $adminEmail = get_option('admin_email');

    $headers = array('Content-Type: text/html; charset=UTF-8',
        'From:  Talentedge <admission@talentedge.in>', 'Disposition-Notification-To: ' . $user_email . '\n');
    $subject = "Welcome to Talentedge!";
    $body    = '<p> Hi there,<br><br>Thank you for registering with <a href="' . $siteUrl . '">Talentedge</a>
                Take your career to the next level with our range of courses across categories.<br><br>
                 Username: ' . $ulogin . '<br>Password: 0Fq5w@T580te <br><br>If you have any problems, please contact us at
                ' . $adminEmail .
            '<br><br>Thanks,<br>Team TalentEdge';

    $notify_email = get_user_meta($user_id, 'notify_email', true);

    if ($notify_email != 1)
    {
        $result = wp_mail($ulogin, $subject, $body, $headers);

        update_user_meta($user_id, 'notify_email', 1);
        /*         * *************************** creating referral at checkout start *********************** */

        $user_data         = get_userdata($user_id);
        $fname             = get_user_meta($user_id, 'first_name');
        $lname             = get_user_meta($user_id, 'last_name');
        $userPhone         = get_user_meta($user_id, 'billing_phone',TRUE);
        $refcode           = get_user_meta($user_id, 'referred_by');
        $referredby_id     = '';
        $referredby_email  = '';
        /* setting email headers */
        $headers_referrral = array('Content-Type: text/html; charset=UTF-8',
            'From:  Talentedge<admission@talentedge.in>');
        $subject_referral  = "The referred user has signed up with talentedge";

        if (!empty($refcode[0]))
        {
            $referredby_user = get_users(array('meta_key' => 'user_reference_code', 'meta_value' => $refcode[0]));
            if (!empty($referredby_user))
            {
                foreach ($referredby_user as $r_userinfo)
                {
                    $userinfo_array   = $r_userinfo->data;
                    $referredby_id    = $userinfo_array->ID;
                    $referredby_fname = get_user_meta($referredby_id, 'first_name');
                    $referredby_email = get_user_meta($referredby_id, 'user_email');
                }
                /* Checking if referral code exist or not */

                $my_post = array(
                    'post_title'  => $ulogin,
                    'post_status' => 'publish',
                    'post_type'   => 'referrals',
                    'post_author' => 1,
                    'meta_input'  => array(
                        'user_id'          => $user_id,
                        'user_name'        => $fname[0],
                        'user_email'       => $ulogin,
                        'referred_by'      => $referredby_email[0],
                        'referred_by_code' => $refcode[0],
                        'referred_by_id'   => $referredby_id,
                        'status'           => 'Registered'
                    ),
                );

                $body_referral = '<p> Hi ' . $referredby_fname[0] . ',<br><br>You had referred ' . $fname[0] . ' to <a href="' . $siteUrl . '">talentedge<a>
                    The moment he enrolls you will be eligible for a complimentary Flipkart voucher.
                    You will be able to see the same on your profile as well. <br><br> Thanks for the reference.';
                // Insert the post into the database
                $result        = wp_insert_post($my_post);

                if ($result)
                {
                    wp_mail($referredby_email, $subject_referral, $body_referral, $headers_referrral);
                }
            }
        }

        /*         * **** Pushing the User data to CRM  on checkout registration***** */

        $curl_post_data = array(
            'first_name' => $fname[0],
            'last_name'  => $lname[0],
            'email'      => $ulogin,
            'mobile'     => $userPhone,
            'web_id'     => $user_id,
            'batch_crm_id'     => $batchCrmId
        );
        //print_r($curl_post_data);
        session_start();
        $_SESSION['curlaa'] = $curl_post_data;

        $cResponse = callRestApiPost(CRM_URL . '/apite/v1/lead', $curl_post_data);
        //echo 'HH<pre>';
        //print_r($cResponse); die;
        $_SESSION['res'] = $cResponse;
        if ($cResponse->status == 1 && $cResponse->lead_id != "")
        {
            update_user_meta($user_id, 'crm_lead_id', $cResponse->lead_id);
        }

        /*         * **** Pushing the User data to CRM  on checkout registration ends***** */
    }
    /*     * *************************** creating referral at checkout ends *********************** */
}

add_action('woocommerce_checkout_update_user_meta', 'woocommerce_add_my_user_meta');

add_action( 'init', 'hook_cookieinHeader' );
function hook_cookieinHeader() {
   if($_GET['utm_campaign'] == 'jpmiles') {
	$cookie_name = "jetcoupon";
	$cookie_value = "jetfacebook";
	if (isset($_COOKIE[$cookie_name])) {
    // get data from cookie for local use
    $uname = $_COOKIE[$cookie_name];
	  }else {
    // set cookie, local $uname already set
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	}
  }
}


function getDomainFromEmail($email)
{
    // Get the data after the @ sign
    $domain = substr(strrchr($email, "@"), 1);

    return $domain;
}
function get_Installment_price3($product_id, $stax = 0)
{

    global $woocommerce, $post;

    global $wpdb;
    $content        = '';
    $posts          = $wpdb->wp_posts;

    //echo 'pro id ='.$product_id;

    $user_id        = get_current_user_id();
    $userData       = get_userdata($user_id);
    $customer_email = $userData->user_email;
    $Notax='';
    //$total_order_array = get_customer_orders_($product_id);
    //$paid_amount = $total_order_array['total_amount'];

    $produc_status = get_user_meta($user_id, 'payment_type_' . $product_id . '', true);

    $course_title     = get_field('course_short_name', $product_id);
    $course_image     = get_field('course_image', $product_id);
    $duration         = get_field('duration', $product_id);
    $currencySymbol   = get_woocommerce_currency_symbol($selectedCurrency);
    $cop              = get_field('certification_of_participation', $product_id);
    $coc              = get_field('certification_of_completion', $product_id);
    $tax_free         = get_field('tax_free', $product_id);
    if($tax_free=='Yes'){
        $Notax='';
    }
    $coursetype='';
    //print_r($cop); die;
    if(!empty($cop) && $cop[0]=='yes'){
        $coursetype="Certificate of Participation";
    }
    $installmentPrice = "";

    // $course_price_inr = get_post_meta( $product_id, '_regular_price', true);

       $course_price_inr2   = get_product_price($product_id, 'INR',$coursetype);
    $course_price_inr    = $course_price_inr2[0];
    $course_price_format = number_format($course_price_inr);
//print_r( $course_price_format );
    //$course_price_usd = get_post_meta( $product_id, '_outside-india_regular_price', true);

    $course_price_usd2       = get_product_price($product_id, 'USD',$coursetype);
    $course_price_usd        = $course_price_usd2[0];
    $course_price_usd_format = number_format($course_price_usd);

    $amount_to_pay = $course_price;

    //print_r($cop);
    $product_p = customer_bought_product($customer_email);


    //$product_p = array();
    //print_r($product_p);

    if (!in_array($product_id, $product_p))
    {

        echo '<input type="hidden" id="repayment" value="0" />'
        . '<input type="hidden" id="amount_to_pay" value="'.$amount_to_pay.'" />';
        ?>
        <style>
            #course_coupon{height: 35px;margin: 0px 10px 0px 0px;padding:5px 15px 5px 5px;text-transform: uppercase; border:0; border-bottom: 1px solid #f2f2f2;
                           }
			.coupon_emptyerror{border-bottom:1px solid red !important;}
            .tab-content tr{    border-bottom: 1px solid #f2f2f2;}
            .tab-content td{border:none !important;}
            .coupondiv{    margin: 10px 0px 0px 0px;text-align: left;}
            .leftcntdiv{padding-right:20px;}
        </style>
        <input type="hidden" name="course_id" class="course_id" id="course_id" value="<?php echo $product_id; ?>"/>
        <input type="hidden" name="returntype" class="returntype" id="returntype" value="1"/>

        <input type="hidden" name="course_actual_price_inr" class="course_id" id="course_actual_price_inr" value="<?php echo $course_price_inr2; ?>"/>
        <input type="hidden" name="course_actual_price_usd" class="course_id" id="course_actual_price_usd" value="<?php echo $course_price_usd2; ?>"/>

        <input type="hidden" name="order_discount" id="order_discount" value=""/>
        <input type="hidden" name="order_coupon" id="order_coupon" value=""/>
        <input type="hidden" name="discount_for" id="discount_for" value=""/>
        <input type="hidden" name="payment_type" id="payment_type" value="Full"/>
        <input type="hidden" name="order_paid_amount" id="order_paid_amount" value=""/>
        <input type="hidden" name="order_total_amount" id="order_total_amount" value=""/>
        <input type="hidden" name="order_final_amount" id="order_final_amount" value=""/>
        <input type="hidden" name="order_currency" id="order_currency" value="INR"/>
        <input type="hidden" name="tax_free" id="tax_free" value="<?=$tax_free;?>"/>

        <div id="<?php echo $product_id; ?>" class="course_details leftcntdiv col-md-5"><h3><?php echo $course_title; ?></h3>
            <div class="startDate pad-bottom-10 batch-Card">
                <i class="fa icon-calendar"></i>
        <?php $cl_startdate = get_field('course_start_date', $product_id, false, false); ?>
        <?php $date         = new DateTime($cl_startdate); ?>
                <!-- <p style="display:none"><?php echo $cl_startdate; ?></p> -->
                <span>Start - <?=($product_id==35006)? '9 -10 Dec, 2017' : $date->format('jS M y');?></span>
            </div>
        <?php if ($cop)
        { ?>
                <div class="cop">
                    <input type="hidden" id="order_cop" value=""/>
                    <div class="radio">
                        <input type="radio" name="radio1" id="radio1" value="1">
                        <label for="radio1"><?php echo get_field('label_2', $product_id) ?></label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="radio1" id="radio2" value="2" checked="">
                        <label for="radio2"><?php echo get_field('label_1', $product_id) ?></label>
                    </div>
                </div>
        <?php } ?>

            <input type="hidden" name="coursetype" id="coursetype" value="<?php echo (!empty($coc) && $coc[0]=='yes')? 2 : ''?>"/>
            <div class="disocuntdiv">
                <h5>Discount Applied on : <span>Course</span></h5>
            </div>

            <div id="tab" class="btn-group paydiv" data-toggle="buttons">
                <a href="#full_table" class="btn btn-default active fulloption" data-toggle="tab">
                    <input type="radio" value="full" name="payradio" class="paymenttype" checked=""/>Full Payment</a>
                <a href="#inst_table" class="btn btn-default instoption" data-toggle="tab">
                    <input type="radio" value="installment" name="payradio" class="paymenttype"/>Instalment </a>
            </div>

            <div class="tab-content">

                <div class="tab-pane active" id="full_table">
        <?php
        $cop = get_field('certification_of_participation', $product_id);

        get_country_fees2($selectedCurrency, $product_id, 1);

        get_country_fees2($selectedCurrency, $product_id, 2);

        if ($cop)
        {
            get_country_fees2($selectedCurrency, $product_id, 5);
        }

        if ($cop)
        {
            get_country_fees2($selectedCurrency, $product_id, 6);
        }
        ?>
                </div>

                <div class="tab-pane" id="inst_table">
        <?php
        get_country_fees2($selectedCurrency, $product_id, 3);

        get_country_fees2($selectedCurrency, $product_id, 4);

        if ($cop)
        {
            get_country_fees2($selectedCurrency, $product_id, 7);
        }

        if ($cop)
        {
            get_country_fees2($selectedCurrency, $product_id, 8);
        }
        ?>
                </div>
            </div>
        </div>
        <div class="course_details col-md-4">
            <div class="paymentdiv">
                <div class="totalprice first">
                    <div class="fleft">
                        <span class="c_headline">Total Course Fee </span>
                    </div>
                    <div class="fright">
                        <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                        <span class="full_actualprice pricelabel"><?php echo $course_price_format; ?></span>
                    </div>
                </div>
                <div class="coupondiv totalprice">

                    <?php if(isset($_COOKIE['jetcoupon']) === true) { ?>
						<h4> <?php  echo "JetPrivilege Membership Number";?></h4>
						<input type="text" name="coupon" placeholder=" " id="course_coupon"/>
						<span class="button" id="applyjetcoupon">Apply</span>

                   <?php } else { ?>

                        <h4><?php echo "Scholarship ID";?></h4>
						  <input type="text" name="coupon" placeholder=" " id="course_coupon"/>
				    <span class="button" id="applycoupon">Apply</span>
				   <?php } ?>


                    <div class="c_error coupon_error  none">Coupon Invalid</div>
                    <div class="c_error remove_coupon none">Remove Coupon</div>
                    <div class="cp_success">Congrats! You are eligible for a scholarship</div>
                </div>

                <div id="coupondiv" class="totalprice none">
                    <div class="coupon_amt">Scholarship <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                        <span id="coupon_amt" class="pricelabel"></span>
                    </div>
                    <div class="discount_amt">Discount <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                        <span id="discount_amt" class="pricelabel"></span>
                    </div>
                    <span class="c_headline">Total Course Fee </span>
                    <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                    <span id="coupon_value" class="pricelabel"></span>
                </div>

                <div class="amount_pay">
                   <!--<span class="c_headline">You can decide the amount you want to pay and the rest later.</span>
                    -->
                    <span class="youpay">Amount Payable</span>
                    <div class="input-icon">

                        <i class="c_currency"><?php echo $currencySymbol; ?></i>
                        <input type="text" name="amount_to_pay" class="amount_to_pay indiacur" value="<?php echo $course_price_format; ?>" class="form-control" placeholder="0">
                    </div>
                </div>
                <div class="amountpay_msg"></div>
                <div class="totalamount totalprice">
                    <?php if($tax_free!='Yes'){ ?>
                    <div class="tax nonhryana">
                        <div class="fleft">
                            <span class="c_headline">IGST (18%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel igst"><?php echo $course_price_format; ?></span>
                        </div>
                    </div>
                    <div class="tax hryana" style="display:none">
                        <div class="fleft">
                            <span class="c_headline">CGST (9%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel cgst"><?php echo $course_price_format / 2; ?></span>
                        </div>
                    </div>
                    <div class="tax hryana" style="display:none">
                        <div class="fleft">
                            <span class="c_headline">SGST (9%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel sgst"><?php echo $course_price_format / 2; ?></span>
                        </div>
                    </div>
                    <div class="tax hryanaold" style="display:none">
                        <div class="fleft">
                            <span class="c_headline">Service Tax (15%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel stax"><?php echo $course_price_format; ?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="finalamt">
                        <div class="fleft">
                            <span class="c_headline">Total Amount Payable </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="final_amt pricelabel"><?php echo $course_price_format; ?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php
    }
    else
    {
      //echo "i am in else...";
        $coursetype='';
        //if(!empty($cop) && $cop[0]=='yes'){
          //  $coursetype="Certificate of Participation";
        //}

        //echo $coursetype."i am here...."; d
        $tax_free         = get_field('tax_free', $product_id);
            if($tax_free=='Yes'){
                $Notax='';
            }
        //echo '$tax_free='.$tax_free;
        echo '<input type="hidden" id="repayment" value="1" />';
        $order_ids = get_all_ordersby_pname2($product_id,$user_id);

        $orderarray2   = array();
        $orderarray    = array();
        $paid_amount_  = '';
        $paid_tax_     = '';
        $amount_extax  = '';
        $orderDiscount = '';
        $idfc_discount= '';
        $oarray        = json_decode(json_encode($order_ids), True);
        foreach ($oarray as $order)
        {
            //echo "<pre>";
            //print_r($order);

            if ($order['customer_user'] == $user_id)
            {
                $order_total                    = $order['order_total'];
                $order_tax                      = $order['order_tax'];
                $order_currency                 = $order['order_currency'];
                $orderarray2['id']              = $order['order_id'];
                $idfc_discount    += get_post_meta( $order['order_id'], 'idfc_discount',true);
                $orderarray2['order_total']     = $order_total;
                $coursetype                     = $order['coursetype'];
                $orderarray2['order_tax']       = $order_tax;
                $orderarray2['date']            = $order['post_date'];
                $orderarray2['status']          = $order['post_status'];
                $orderarray[$order['order_id']] = $orderarray2;

                if ($orderarray2['status'] == 'wc-completed')
                {
                    $paid_tax_    += $order_tax;
                    $paid_amount_ += $order_total;
                    $amount_extax = $paid_amount_ - $paid_tax_;
                }
            }
        }
       // echo 'xxxxxxxxx'.$coursetype;
        $orderinfo_user = get_orderdetails_user($user_id, $product_id);
        //$order_currency = $orderinfo_user['currency'];
        $disscount      = get_discountvalue($product_id);
        if ($order_currency == "INR")
        {
            $orderDiscount = $disscount['discount_price_inr']+$idfc_discount;
            $orderDiscount = $disscount['discount_price_inr'];
        }
        else
        {
            $orderDiscount = $disscount['discount_price_usd']+$idfc_discount;
            $orderDiscount = $disscount['discount_price_usd'];
        }
        $currencySymbol     = get_woocommerce_currency_symbol($order_currency);
        $order_final_amount = $orderinfo_user['final_amount'];
        $order_discount     = $orderDiscount;
        $order_coupon       = $orderinfo_user['order_coupon'];
        $order_payment_type = $orderinfo_user['payment_type'];

        if (empty($order_payment_type))
        {

            $order_payment_type = 'Full';
        }
        //echo 'HHHH='.$coursetype;

        $regularPrice = get_product_price($product_id, $order_currency,$coursetype);

        if (empty($amount_extax))
        {
            $amount_extax = '0';
        }

        if ($order_discount)
        {
            $camt = $order_discount;
        }

        if ($order_coupon)
        {
            $camt = $order_coupon;
        }

        if ($camt)
        {
            $afterdiscount = $regularPrice - $camt;
        }
        else
        {
            $afterdiscount = $regularPrice;
        }

        $pending_amount = $afterdiscount - $amount_extax;

        // $currency = get_user_meta( $user_id, 'order_'.$product_id.'_c', true );
        // $order_total_amount = get_user_meta( $user_id, 'order_final_amount_'.$product_id.'', true );
        // $order_paid_amount = get_user_meta( $user_id, 'order_paid_amount_'.$product_id.'', true );
        // $order_pending_amt = get_user_meta( $user_id, 'order_pending_amt_'.$product_id.'', true );
        // $payment_type = $produc_status;
        // $currencySymbol = get_woocommerce_currency_symbol($currency);
        if ($order_payment_type == 'Full')
        {
            $ptext = 'Full Payment';
        }
        else
        {
            $ptext = 'Installments';
        }
        /*
          if ($currency=='INR'){
          $course_price = get_post_meta( $product_id, '_regular_price', true);
          }
          else{
          $course_price = get_post_meta( $product_id, '_outside-india_regular_price', true);
          }
          $course_price_format =number_format($course_price);
          $bal = $course_price - $paid_amount;
          $balance_amt = number_format($bal);
         */
        ?>
        <style>
            .course_details_div{margin: 30px 0px 0px 0px;
                                font-size: 14px;}
            .course_details_div h5{margin:8px 0px 10px 9px;}
            .course_details_div h5 span{
                color: green;
                font-weight: bold;
            }
            .course_details_div .pamt{
                font-size: 18px;
                font-weight: bold;
            }
            .course_details_div .c_currency{    padding: 0px 5px 0px 0px;}
            .course_details_div table{width:60%;}
        </style>
        <input type="hidden" name="course_id" class="course_id" id="course_id" value="<?php echo $product_id; ?>"/>
        <input type="hidden" name="returntype" class="returntype" id="returntype" value="2"/>
        <input type="hidden" name="order_paid_amount" id="order_paid_amount" value=""/>
        <input type="hidden" name="coursetype" id="course_type" value="<?php echo ($coursetype=="Certificate of Participation")? 1 : 2 ?>"/>
        <input type="hidden" name="order_currency" id="order_currency" value=""/>
        <input type="hidden" name="tax_free" id="tax_free" value="<?=$tax_free;?>"/>
        <div class="course_details col-md-5" id="<?php echo $bal; ?>">
            <h3><?php echo $course_title; ?></h3>
            <div class="startDate pad-bottom-10 batch-Card">
                <i class="fa icon-calendar"></i>
        <?php $cl_startdate = get_field('course_start_date', $product_id, false, false); ?>
        <?php $date         = new DateTime($cl_startdate); ?>

                   <span>Start - <?=($product_id==35006)? '9 -10 Dec, 2017' : $date->format('jS M y');?></span>
            </div>
            <?php
             $cop = get_field('certification_of_participation', $product_id);
            if($ptext=="Installments"){?>
            <div class="course_details_div">
                <h5>Payment Type: <span><?php echo $ptext; ?></span></h5>
                <table class="table">
                    <thead>
                        <tr><th>Amount Paid</th><th class="pamt"><span class="c_currency"><?php echo $currencySymbol; ?></span><?php echo number_format($amount_extax); ?></th></tr>
                        <tr><th>Balance Amount</th><th class="pamt"><span class="c_currency balanceamount"><?php echo $currencySymbol; ?></span><?php echo number_format($pending_amount); ?></th></tr>
                    </thead>
                    </tbody>
                </table>

            </div>
            <div class="tab-content">

                       <div class="tab-pane active" id="inst_table">
                                    <?php
                                    $inrCode = 3;
                                    $copCode = 7;
                                    if ($order_currency != "INR")
                                    {
                                        $inrCode = 4;
                                    }
                                    if ($order_currency != "INR" && $cop != '')
                                    {
                                        $copCode = 8;
                                    }
                                     if (!$cop)
                                    {
                                    get_country_fees2($selectedCurrency, $product_id, $inrCode);
                                    }

                                    if ($cop)
                                    {
                                        get_country_fees2($selectedCurrency, $product_id, $copCode);
                                    }
                                    ?>

                       </div>
               </div>
            <?php }else{?>
                 <div class="course_details_div">
                <h5>Payment Type: <span><?php echo $ptext; ?></span></h5>
                <table class="table">
                    <thead>
                        <tr><th>Amount Paid</th><th class="pamt"><span class="c_currency"><?php echo $currencySymbol; ?></span><?php echo number_format($amount_extax); ?></th></tr>
                        <tr><th>Balance Amount</th><th class="pamt"><span class="c_currency balanceamount"><?php echo $currencySymbol; ?></span><?php echo number_format($pending_amount); ?></th></tr>
                    </thead>
                    </tbody>
                </table>

            </div>
            <?php } ?>
        </div>

        <div class="course_details col-md-4">
            <div class="paymentdiv">

                <div class="totalprice first">
                    <div class="fleft">
                        <span class="c_headline">Total Course Fee</span>
                    </div>
                    <div class="fright">
                        <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="full_actualprice pricelabel"><?php echo number_format($regularPrice); ?></span>
                    </div>
                </div>
        <?php if ($camt)
        {
            ?>                    <div class="totalprice first">
                        <span class="c_headline">Discount</span>
                        <div class="fright">
                            <span class="product_price">
                                <?php
                                echo $currencySymbol . $camt;
                                ?>
                             <!-- <i class="fa">i</i> -->
                            </span>
                        </div>
                    </div>

        <?php } ?>
				<!-- Custom discount code -->
        <style>
            #course_coupon{height: 35px;margin: 0px 10px 0px 0px;padding:5px 15px 5px 5px;text-transform: uppercase; border: 0;border-bottom: 1px solid #f2f2f2;
                          }
			.coupon_emptyerror{border-bottom:1px solid red !important;}
            .tab-content tr{    border-bottom: 1px solid #f2f2f2;}
            .tab-content td{border:none !important;}
            .coupondiv{    margin: 10px 0px 0px 0px;text-align: left;}
            .leftcntdiv{padding-right:20px;}
        </style>
				 <div class="coupondiv totalprice">
                    <h4>Scholarship ID </h4>
                    <input type="text" name="coupon" placeholder="Ex. TE8970" id="course_coupon"/>
                    <span class="button" id="applycoupon">Apply</span>
                    <div class="c_error coupon_error  none">Coupon Invalid</div>
                    <div class="c_error remove_coupon none">Remove Coupon</div>
                    <div class="cp_success">Congrats! You are eligible for a scholarship</div>
                </div>

                <div id="coupondiv" class="totalprice none">
                    <div class="coupon_amt">Scholarship <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                        <span id="coupon_amt" class="pricelabel"></span>
                    </div>
                    <div class="discount_amt">Discount <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                        <span id="discount_amt" class="pricelabel"></span>
                    </div>
                    <span class="c_headline">Total Course Fee </span>
                    <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                    <span id="coupon_value" class="pricelabel"></span>
                </div>
				<!-- Custom discount code -->

                <div class="totalprice">
                    <div class="fleft">
                        <span class="c_headline">Balance Amount </span>
                    </div>
                    <div class="fright">
                        <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="balanceamount pricelabel"><?php echo number_format($pending_amount); ?></span>
                    </div>
                </div>
                <?php
                if ($order_payment_type == 'Full')
                {
                    $lastdate = get_course_lastdate($product_id);
                }
                else
                {
                    if ($order_currency == 'INR')
                    {
                        $order_currency1 = 'IN';
                    }
                    $installmentArray = get_inst_end_date($product_id, $amount_extax, $order_currency1);
                    $lastdate         = $installmentArray['date'];
                }

                $installmentsAmt  = get_field('installments', $product_id);
                  if ($order_currency == "INR"){
                 $FirstAmt = $installmentsAmt[0]['inr_price'];
                  }else{
                 $FirstAmt = $installmentsAmt[0]['usd_price'];
                  }

                  if($amount_extax==0){
                      $pending_amount =$FirstAmt;
                  }
                ?>
                <div class="duedate">Due Date: <span><?php echo $lastdate; ?></span></div>

                <div class="amount_pay totalprice">
                    <!--<span class="c_headline">You can decide the amount you want to pay and the rest later.</span>-->
                    <span class="youpay">Amount Payable</span>
                    <div class="input-icon"><i class="c_currency"><?php echo $currencySymbol; ?></i>
                        <input type="text" name="amount_to_pay" class="amount_to_pay indiacur" value="<?php echo number_format($pending_amount); ?>" class="form-control" placeholder="0">
                    </div>
                </div>
                <div class="amountpay_msg <?php echo $order_currency; ?>"></div>
                        <?php
                        $percentage = 15;
                        $cgdiv      = $sgdiv      = $igdiv      = $sdiv       = 'display:none;';
                        $state      = get_user_meta($user_id, 'billing_state', true);
                        if ($order_currency == 'INR')
                        {
                            if ($stax == 'stax')
                            {
                                $sdiv                = "display:block;";
                                $new_amount_with_pay = ($percentage / 100) * $pending_amount;
                            }
                            else
                            {
                                if ($stax == 'cgst')
                                {
                                    $cgdiv               = $sgdiv               = 'disply:block;';
                                    $new_amount_with_pay = ($pending_amount * CGST / 100 ) + ($pending_amount * SGST / 100 );
                                }
                                else
                                {
                                    $igdiv               = 'display:block';
                                    $new_amount_with_pay = ($pending_amount * GST / 100 );
                                }
                            }
                        }
                        else
                        {
                            $new_amount_with_pay = 0;
                        }

                        if($tax_free=='Yes'){  $new_amount_with_pay = 0; } else{
                        ?>
                <div class="totalamount totalprice first">
                    <!-- <div class="fleft">
                         <span class="c_headline">Service tax (15%) </span>
                     </div>
                     <div class="fright">
                         <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel"><?php // echo number_format($new_amount_with_pay);?></span>
                     </div> -->

                    <div class="tax nonhryana" style="<?php echo $igdiv ?>">
                        <div class="fleft">
                            <span class="c_headline">IGST (18%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel igst"><?php echo number_format($new_amount_with_pay); ?></span>
                        </div>
                    </div>
                    <div class="tax hryana"  style="<?php echo $cgdiv ?>">
                        <div class="fleft">
                            <span class="c_headline">CGST (9%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel cgst"><?php echo number_format($new_amount_with_pay / 2); ?></span>
                        </div>
                    </div>
                    <div class="tax hryana"  style="<?php echo $sgdiv ?>">
                        <div class="fleft">
                            <span class="c_headline">SGST (9%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel sgst"><?php echo number_format($new_amount_with_pay / 2); ?></span>
                        </div>
                    </div>
                    <div class="tax hryanaold"  style="<?php echo $sdiv ?>">
                        <div class="fleft">
                            <span class="c_headline">Service Tax (15%) </span>
                        </div>
                        <div class="fright">
                            <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span><span class="tax_price pricelabel stax"><?php echo number_format($new_amount_with_pay); ?></span>
                        </div>
                    </div>

                </div>
                        <?php  } ?>
        <?php
        $new_amount = $pending_amount + $new_amount_with_pay;
        ?>
                <div class="finalamt totalprice">
                    <div class="fleft">
                        <span class="c_headline">Total Course Fee </span>
                    </div>
                    <div class="fright">
                        <span class="c_currency pricelabel"><?php echo $currencySymbol; ?></span>
                        <span class="final_amt pricelabel"><?php echo number_format($new_amount); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

/* showing installment data for edit-profile */

function get_installment_data($product_id, $selectedCurrency, $coursetype = '')
{
    //echo $product_id;
    $currencySymbol = get_woocommerce_currency_symbol($selectedCurrency);
    ?>

        <div class="installment_data">
            <table class="installment_info table table-responsive">
                <caption>EMI Payment Method</caption>
                <thead>
                    <tr>
                        <th>EMI</th>
                        <th>Instalment Amount</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
    <?php
    $i              = 1;
    while (have_rows('installments', $product_id)): the_row();

        if ($selectedCurrency == "INR")
        {
            //echo $coursetype;
            if ($coursetype == 'Certificate of Participation')
            {

                if (get_sub_field('cop_inr_price', $product_id) != "")
                {
                    ?>  <tr>

                            <td class="installment_no">
                    <?php echo "IN" . $i; ?>
                            </td>
                                                        <td class="woocommerce-installment-amount-inr">
                    <?php
                    $installmentPrice = get_sub_field('cop_inr_price', $product_id);
                    echo $currencySymbol . $installmentPrice;
                    ?>
                                                        </td>
                    <?php
                }
            }
            else
            {

                if (get_sub_field('inr_price', $product_id) != "")
                {
                    ?>  <tr>

                            <td class="installment_no">
                    <?php echo "IN" . $i; ?>
                            </td>
                                                <td class="woocommerce-installment-amount-inr">
                    <?php
                    $installmentPrice = get_sub_field('inr_price', $product_id);
                    echo $currencySymbol . $installmentPrice;
                    ?>
                                                </td>
                    <?php
                }
            }
        }
        else
        {
            if ($coursetype == 'Certificate of Participation')
            {
                if (get_sub_field('cop_usd_price', $product_id) != "")
                {
                    ?>
                                                <td class="woocommerce-installment-amount-usd">
                    <?php
                    $installmentPrice = get_sub_field('cop_usd_price', $product_id);
                    echo $currencySymbol . $installmentPrice;
                    ?>
                                                </td>
                    <?php
                }
            }
            else
            {
                if (get_sub_field('usd_price', $product_id) != "")
                {
                    ?>  <tr>

                            <td class="installment_no">
                    <?php echo "IN" . $i; ?>
                            </td>
                                                <td class="woocommerce-installment-amount-usd">
                    <?php
                    $installmentPrice = get_sub_field('usd_price', $product_id);
                    echo $currencySymbol . $installmentPrice;
                    ?>
                                                </td>
                    <?php
                }
            }
        }

           if ($coursetype == 'Certificate of Participation')
            {

                if (get_sub_field('cop_inr_price', $product_id) != "")
                {
                    ?>  <td class="installment_date">
                                <?php
                                if ($i == 1)
                                {
                                    echo get_course_lastdate($product_id);
                                }
                                else
                                {
                                    echo get_sub_field('installment_due_date', $product_id);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                }
            }
            else
            {

                if (get_sub_field('inr_price', $product_id) != "")
                {
                    ?>   <td class="installment_date">
                                <?php
                                if ($i == 1)
                                {
                                    echo get_course_lastdate($product_id);
                                }
                                else
                                {
                                    echo get_sub_field('installment_due_date', $product_id);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                }
            }

        $i++;
    endwhile;
    ?>
            </table>
        </div>
<?php }
function cmk_product_ordered($id)
{
    // Get All order of current user
    $orders = get_posts(array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => wc_get_order_types('view-orders'),
        'post_status' => array_keys(wc_get_order_statuses())
            ));

    if (!$orders)
        return false; // return if no order found

    $all_ordered_product = array(); // store all products ordered by ID in an array

    foreach ($orders as $order => $data)
    { // Loop through each order
        $order_data = new WC_Order($data->ID); // create new object for each order
        foreach ($order_data->get_items() as $key => $item)
        {  // loop through each order item
            // store in array with product ID as key and order date a value
            $all_ordered_product[$item['product_id']] = $data->post_date;
        }
    }
    // check if defined ID is found in array
    if (isset($all_ordered_product[$id]))
        return true;
    else
        return false;
}

/* Update Custom order meta */
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta($order_id)
{
//session_start();
    //print_r($_POST);
    //echo 'coursetype='.$_POST['coursetype'];
    //echo 'order id='.$order_id ;die;
    $courseid   = $_POST['course_id'];
    $returntype = $_POST['returntype'];

    $order_new        = new WC_Order($order_id);
    $order_new_status = $order_new->post->post_status;

//$_SESSION['aaa'] = $order_new_status;
//$_SESSION['comple'] = $order_new ;
    $current_user = wp_get_current_user();
    if ($_POST['coursetype'] == 1)
     {
         $courseType = "Certificate of Participation";
     }
     elseif ($_POST['coursetype'] == 2)
     {
         $courseType = "Certificate of Completion";
     }
     else
     {
         $courseType = "";
     }

    if ($returntype == 1)
    {


        $order_array = array(
            'enrollment_id'       => $order_id,
            'product_id'          => $courseid,
            'payment_type'        => $_POST['payment_type'],
            'coursetype'          => $_POST['coursetype'],
            'total_course_amount' => $_POST['order_total_amount'],
            'order_discount'      => $_POST['order_discount'],
            'order_coupon'        => $_POST['order_coupon'],
            'discount_for'        => $_POST['discount_for'],
            'final_amount'        => $_POST['order_final_amount'],
            'amount_paid'         => $_POST['order_paid_amount'],
            'currency'            => $_POST['order_currency'],
            'service_tax'         => true,
            'order_date'          => date("Y/m/d"),
            'status'              => $order_new_status
        );

        update_user_meta($current_user->ID, 'order_' . $courseid . '', $order_array);

        update_user_meta($current_user->ID, 'order_' . $courseid . '_status', $order_new_status);

        update_post_meta($order_id, 'payment_type', esc_attr($_POST['payment_type']));
        update_post_meta($order_id, 'coursetype', esc_attr($courseType));
        update_post_meta($order_id, 'discount_for', esc_attr($_POST['discount_for']));
        update_post_meta($order_id, 'discountamount', esc_attr($_POST['discount_for']));

        update_user_meta($current_user->ID, 'order_discount_' . $courseid . '', esc_attr($_POST['order_discount']));
        update_user_meta($current_user->ID, 'discount_for_' . $courseid . '', esc_attr($_POST['discount_for']));
        update_user_meta($current_user->ID, 'order_coupon_' . $courseid . '', esc_attr($_POST['order_coupon']));
        update_user_meta($current_user->ID, 'payment_type_' . $courseid . '', esc_attr($_POST['payment_type']));
        update_user_meta($current_user->ID, 'order_paid_amount_' . $courseid . '', esc_attr($_POST['order_paid_amount']));
        update_user_meta($current_user->ID, 'order_final_amount_' . $courseid . '', esc_attr($_POST['order_final_amount']));
        update_user_meta($current_user->ID, 'order_toal_amount_' . $courseid . '', esc_attr($_POST['order_toal_amount']));
        update_user_meta($current_user->ID, 'order_cop_' . $courseid . '', esc_attr($_POST['order_cop']));
        update_user_meta($current_user->ID, 'order_' . $courseid . '_c', $order_currency);
        update_user_meta($current_user->ID, 'user_type', 'NEW');
        update_user_meta($current_user->ID, 'discount_for_order_' . $order_id . '', esc_attr($_POST['discount_for']));

        //$_SESSION['newamount1']= $_POST['order_paid_amount'];
        //$_SESSION['key1'] = $_POST['course_id'];
    }
    else
    {
        $lastamount = get_user_meta($current_user->ID, 'order_paid_amount_' . $courseid . '', true);
        $newamount  = $lastamount + $_POST['order_paid_amount'];

        // $_SESSION['newamount2']= $newamount;
        // $_SESSION['key2'] = $_POST['course_id'];
        update_user_meta($current_user->ID, 'order_paid_amount_' . $courseid . '', $newamount);
        update_post_meta($order_id, 'coursetype', esc_attr($courseType));
        //echo $current_user->ID;
        //die;
    }
}

/* Ajax url */
add_action('wp_head', 'pluginname_ajaxurl');
function pluginname_ajaxurl()
{
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
<?php }
/* gravity form populating the course dropdown */
add_filter('gform_pre_render', 'populate_posts');
add_filter('gform_pre_validation', 'populate_posts');
add_filter('gform_pre_submission_filter', 'populate_posts');
add_filter('gform_admin_pre_render', 'populate_posts');

function populate_posts($form)
{
    foreach ($form['fields'] as &$field)
    {
        if ($field->type != 'select' || strpos($field->cssClass, 'course_title') === false)
        {
            continue;
        }
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts('numberposts=-1&post_status=publish&post_type=product');
        $choices = array();
        foreach ($posts as $post)
        {
            $selectcourse = get_field('select_course', $post->ID);
            $instid       = get_field('c_institute', $post->ID);
            if ($selectcourse == 0)
            {
                $choices[] = array('text' => $post->post_title, 'value' => $post->ID . '_' . $instid, 'label' => 'inst');
            }
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a course';
        $field->choices     = $choices;
    }

    return $form;
}

/**
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.wordpress.org/Child_Themes
 */
/* Disable the Admin Bar. */
add_filter('show_admin_bar', '__return_false');

/*
  add_action( 'init', 'blockusers_init' );
  function blockusers_init() {
  if ( is_admin() && ! current_user_can( 'administrator' ) &&
  ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
  wp_redirect( home_url() );
  exit;
  }
  }
 */

/* rename the Woocommerce admin menu on the WordPress dashboard. */


/* Single Tenplate */

function get_custom_post_type_template($single_template)
{
    global $post;

    if ($post->post_type == 'product')
    {
        $single_template = dirname(__FILE__) . '/single-template.php';
    }
    return $single_template;
}

//add_filter( 'single_template', 'get_custom_post_type_template' );
add_action('admin_menu', 'dailycodex_rename_woo_menu', 999);
function dailycodex_rename_woo_menu()
{
    global $menu;

    // Locate the menu items you want to change
    $woo      = the_array_search('WooCommerce', $menu);
    $products = the_array_search('Products', $menu);
    if (!$woo)
        return;

    // Replace with new values

    $menu[$woo][0]      = 'Talentedge';
    $menu[$products][0] = 'Courses';
}
/* Admin CSS */

function replace_admin_menu_icons_css()
{
    ?>
    <style>
        #adminmenu #toplevel_page_woocommerce .menu-icon-generic div.wp-menu-image:before{
            content: "\f184" !important;
            font-family: dashicons !important;
        }
        #menu-posts-institute .wp-menu-image:before{
            content: "\f118" !important;
        }
        #woocommerce-product-data{margin-top:20px;}

        .acf-field acf-field-message{
            background: #757272;
            color: #fff;
        }
        .acf-field.acf-field-message{background:#f7f7f7;}
        .acf-postbox > .hndle .acf-hndle-cog{display:none !important;}
        #woocommerce-product-data h2{background:#8965f7;color:#fff;}
        #acf-group_578f629692618 h2{    background: #ecb824;color:#fff;}
        #acf-group_578e1d7457d40 h2{    background: #1292C0;color:#fff;}
        .inventory_tab, .shipping_tab, .variations_tab, .advanced_tab, .attribute_tab, .show_if_variable, .wcpbc_sale_price{display:none !important;}
    </style>
    <?php
}
add_action('admin_head', 'replace_admin_menu_icons_css');

function my_enqueue($hook)
{
    $url = get_bloginfo('template_directory') . '/js/wp-admin.js';
    echo '"<script type="text/javascript" src="' . $url . '"></script>"';
}

add_action('admin_footer', 'my_enqueue');

/* Change the Woocommerce Name */

add_action('registered_post_type', 'wpse54367_alter_post_type', 10, 2);

function wpse54367_alter_post_type($post_type, $args)
{
    if ($post_type != 'product')
        return;

    //Get labels and update them
    $labels                = get_post_type_labels(get_post_type_object($post_type));
    $labels->name          = 'Courses';
    $labels->singular_name = 'Courses';

    //update args
    $args->labels = $labels;
    $args->label  = $labels->name;

    //update post type
    global $wp_post_types;
    $wp_post_types[$post_type] = $args;
}

/* Update Custom Slug to Courses */

function slug_save_post_callback($post_ID, $post, $update)
{
    // allow 'publish', 'draft', 'future'
    if ($post->post_type != 'product' || $post->post_status == 'auto-draft')
        return;

    $postParent = get_post_meta($post_ID, 'product_parent', true);
    if (!$postParent)
        return;


    // oneturn;ly change slug when the post is created (both dates are equal)
    /* if ($post->post_date_gmt != $post->post_modified_gmt)
      return;
      exit();
     */
    // use title, since $post->post_name might have unique numbers added
    $new_slug = sanitize_title($post->post_title, $post_ID);
    $subtitle = sanitize_title(get_field('batch_name', $post_ID), '');
    if (empty($subtitle) || strpos($new_slug, $subtitle) !== false)
        return; // No subtitle or already in slug

    $new_slug .= '-' . $subtitle;
    if ($new_slug == $post->post_name)
        return; // already set


// unhook this function to prevent infinite looping
    remove_action('save_post', 'slug_save_post_callback', 10, 3);
    // update the post slug (WP handles unique post slug)
    wp_update_post(array(
        'ID'        => $post_ID,
        'post_name' => $new_slug
    ));
    // re-hook this function
    add_action('save_post', 'slug_save_post_callback', 10, 3);
}
add_action('save_post', 'slug_save_post_callback', 10, 3);
add_action('init', 'init_remove_support', 100);
function init_remove_support()
{
    $post_type = 'product';
    remove_post_type_support($post_type, 'editor');
}

/* ACF Options */

if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title' => 'Global Settings',
        'menu_title' => 'Global Settings',
        'menu_slug'  => 'global-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
    /* acf_add_options_page(array(
      'page_title'    => 'Partners',
      'menu_title'    => 'Partners',
      'menu_slug'     => 'partners',
      'capability'    => 'edit_posts',
      'redirect'      => false
      ));
     */
    /*
      acf_add_options_page(array(
      'page_title'    => 'Learners Speak',
      'menu_title'    => 'Learners Speak',
      'menu_slug'     => 'learners-speak',
      'capability'    => 'edit_posts',
      'redirect'      => false
      ));
     */
}

/* Populate Faculty in Homepage */

function acf_load_color_field_choices($field)
{
    // reset choices
    $field['choices'] = array();

    // if has rows
    if (have_rows('faculty', 'option'))
    {
        // while has rows
        while (have_rows('faculty', 'option'))
        {
            // instantiate row
            the_row();
            // vars
            $value = get_sub_field('name');
            $label = get_sub_field('name');
            // append to choices
            $field['choices'][$value] = $label;
        }
    }

    // return the field
    return $field;
}
add_filter('acf/load_field/key=field_5790849ee4289', 'acf_load_color_field_choices');

/* Populate Leaners Speak in Homepage */
function acf_load_learners_speak($field)
{
    // reset choices
    $field['choices'] = array();
    // if has rows
    if (have_rows('learners_speak', 'option'))
    {
        $l = 0;
        // while has rows
        while (have_rows('learners_speak', 'option'))
        {
            // instantiate row
            the_row();
            // vars
            $value = get_sub_field('name');
            $label = $l;
            // append to choices
            $field['choices'][$label] = $value;
            $l++;
        }
    }
    // return the field
    return $field;
}

add_filter('acf/load_field/key=field_57a460b67c6bc', 'acf_load_learners_speak');

/* Populate Designation Homepage */

function acf_load_designation_speak($field)
{
    // reset choices
    $field['choices'] = array();

    // if has rows
    if (have_rows('linkedin_designation', 'option'))
    {

        // while has rows
        while (have_rows('linkedin_designation', 'option'))
        {
            // instantiate row
            the_row();
            // vars
            $value = get_sub_field('designation');
            $label = get_sub_field('designation');
            // append to choices
            $field['choices'][$value] = $label;
        }
    }
    // return the field
    return $field;
}

add_filter('acf/load_field/key=field_57ed21ea6280e', 'acf_load_designation_speak');
/* Populate Industry Homepage */

function acf_load_industry_speak($field)
{
    // reset choices
    $field['choices'] = array();
    // if has rows
    if (have_rows('linkedin_industry', 'option'))
    {
        // while has rows
        while (have_rows('linkedin_industry', 'option'))
        {
            // instantiate row
            the_row();
            // vars
            $value = get_sub_field('industry');
            $label = get_sub_field('industry');
            // append to choices
            $field['choices'][$value] = $label;
        }
    }
    // return the field
    return $field;
}
add_filter('acf/load_field/key=field_57ed220c6280f', 'acf_load_industry_speak');

/* Populate Experience Homepage */

function acf_load_exp_speak($field)
{

    // reset choices
    $field['choices'] = array();


    // if has rows
    if (have_rows('linkedin_experience', 'option'))
    {
        // while has rows
        while (have_rows('linkedin_experience', 'option'))
        {

            // instantiate row
            the_row();


            // vars
            $value = get_sub_field('experience');
            $label = get_sub_field('experience');


            // append to choices
            $field['choices'][$value] = $label;
        }
    }

    // return the field
    return $field;
}

add_filter('acf/load_field/key=field_57ed244962810', 'acf_load_exp_speak');

/* Populate Protalk videos in Homepage */

function acf_load_protalk_videos($field)
{

    // reset choices
    $field['choices'] = array();

    // if has rows
    if (have_rows('protalk_videos', 288))
    {
        $i = 0;
        // while has rows
        while (have_rows('protalk_videos', 288))
        {

            // instantiate row
            the_row();

            // vars
            $value = get_sub_field('name');
            $label = $i;

            // append to choices
            $field['choices'][$label] = $value;
            $i++;
        }
    }

    // return the field
    return $field;
}

add_filter('acf/load_field/key=field_57908284e4278', 'acf_load_protalk_videos');
/* Populate Batch IDS */

function field_57d64dfaa45ef($field)
{
    global $post;
    //var_dump( $post );
    $field['choices'] = array();

    $apollo_home_args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'title'
    );
    $apollo_home_teams = get_posts($apollo_home_args);

    if (count($apollo_home_teams) > 0) :
        foreach ($apollo_home_teams as $team)
        {
            $batchid                       = get_field('batch_name', $team->ID);
            $coursename                    = get_the_title($team->ID);
            $field['choices'][$team->ID] = $coursename . ' - ' . $batchid;
        }
    endif;

    // return the field
    return $field;
}
/* Populate Batch IDS discount */

function field_57d64dfaa45ef_discount($field)
{

    global $post;
    //var_dump( $post );
    $field['choices'] = array();

    $apollo_home_args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'title',
        'post_status' => array('publish', 'pending', 'draft')
    );

    $apollo_home_teams = get_posts($apollo_home_args);

    if (count($apollo_home_teams) > 0) :
        foreach ($apollo_home_teams as $team)
        {
            $batchid                       = get_field('batch_name', $team->ID);
            $coursename                    = get_the_title($team->ID);
            $field['choices'][$team->ID] = $coursename . ' - ' . $batchid;
        }
    endif;

    // return the field
    return $field;
}
function my_post_object_results_for_specific_user($args, $field, $post)
{
    global $post;
    //var_dump( $post );
    $field['choices'] = array();

    $apollo_home_args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'order'          => 'ASC', 'orderby'        => 'title'
    );

    $apollo_home_teams = get_posts($apollo_home_args);

    if (count($apollo_home_teams) > 0) :
        foreach ($apollo_home_teams as $team)
        {
            $batchid        = get_field('batch_name', $team->ID);
            $coursename     = get_the_title($team->ID);
            $admission_open = get_field('admission_open', $team->ID);
            if ($admission_open == 'Yes')
            {
                $field['choices'] = $coursename . ' - ' . $batchid;
            }
        }
    endif;

    return $field;
}

// filter for every field
add_filter('acf/fields/relationship/result/key=field_58a4327305edf', 'my_relationship_result', 10, 4);

function my_relationship_result($title, $post, $field, $post_id)
{
    $batchid        = get_field('batch_name', $post->ID);
    $admission_open = get_field('admission_open', $post->ID);
    $coursename     = get_the_title($post->ID);
    $scourse        = get_field('select_course', $post->ID);
    if ($scourse == 0)
    {
        $title = $coursename . ' - ' . $batchid;
    }

    return $title;
//print_r($field);
}

add_filter('acf/fields/relationship/query/key=field_58a4327305edf', 'relationship_options_filter', 10, 3);

function relationship_options_filter($options, $field, $the_post)
{
    $options['meta_query']  = array(
                array(
                    'key'     => 'admission_open',
                    'value'   => 'yes',
                    'compare' => '=',
                )
    );
    $options['post_status'] = array('publish');

    return $options;
}

// filter for every field
//add_filter('acf/fields/relationship/query/key=field_58a175d84fdb6', 'my_post_object_results_for_specific_user', 10, 3);

/* Populate Batch IDS  with open */
function field_57d64dfaa45ef_open($field)
{
    global $post;
    //var_dump( $post );
    $field['choices'] = array();

    $apollo_home_args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'order'          => 'ASC', 'orderby'        => 'title'
    );

    $apollo_home_teams = get_posts($apollo_home_args);

    if (count($apollo_home_teams) > 0) :
        $field['choices'][0] = 'Select the Course';
        foreach ($apollo_home_teams as $team)
        {
            $batchid                       = get_field('batch_name', $team->ID);
            $admission_open                = get_field('admission_open', $team->ID);
            $coursename                    = get_the_title($team->ID);
            //if ($admission_open=='Yes'){
            $field['choices'][$team->ID] = $coursename . ' - ' . $batchid;
            //}
        }
    endif;

    // return the field
    return $field;
}

/* Populate Batch IDS  with open */

function field_58c9053992fad_open($field)
{

    global $post;
    //var_dump( $post );
    $field['choices'] = array();

    $apollo_home_args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'order'          => 'ASC', 'orderby'        => 'title'
    );

    $apollo_home_teams = get_posts($apollo_home_args);

    if (count($apollo_home_teams) > 0) :
        $field['choices'][0] = 'Select the Course';
        foreach ($apollo_home_teams as $team)
        {
            $batchid        = get_field('batch_name', $team->ID);
            $admission_open = get_field('admission_open', $team->ID);
            $coursename     = get_the_title($team->ID);
            if ($admission_open == 'Yes' || $admission_open == 'Payments')
            {
                $field['choices'][$team->ID] = $coursename . ' - ' . $batchid;
            }
        }
    endif;

    // return the field
    return $field;
}

/* Populate Batch IDS  with open */

function field_57d64dfaa45ef_marketing($field)
{

    global $post;
    //var_dump( $post );
    $field['choices'] = array();

    $apollo_home_args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'order'          => 'ASC', 'orderby'        => 'title'
    );

    $apollo_home_teams = get_posts($apollo_home_args);

    if (count($apollo_home_teams) > 0) :
        $field['choices'][0] = 'Select the Course';
        foreach ($apollo_home_teams as $team)
        {
            $batchid    = get_field('batch_name', $team->ID);
            //$admission_open = get_field('admission_open', $team->ID);
            $scourse    = get_field('select_course', $team->ID);
            $coursename = get_the_title($team->ID);
            if ($scourse == 0)
            {
                $field['choices'][$team->ID] = $coursename . ' - ' . $batchid;
            }
        }
    endif;

    // return the field
    return $field;
}

add_filter('acf/load_field/name=course_assoociated', 'field_57d64dfaa45ef');
add_filter('acf/load_field/name=select_batch', 'field_57d64dfaa45ef');
add_filter('acf/load_field/key=field_58c9053992fad', 'field_58c9053992fad_open');

add_filter('acf/load_field/key=field_57d9243a7982f', 'field_57d64dfaa45ef_open');
//add_filter('acf/load_field/key=field_57d9243a7982f', 'field_57d64dfaa45ef_marketing');

add_filter('acf/load_field/key=field_57d64dfaa45ef', 'field_57d64dfaa45ef');
add_filter('acf/load_field/key=field_57fde4d1e37f7', 'field_57d64dfaa45ef');
add_filter('acf/load_field/key=field_57fdd63a68f06', 'field_57d64dfaa45ef');
add_filter('acf/load_field/key=field_57ff4d639d421', 'field_57d64dfaa45ef');
add_filter('acf/load_field/key=field_57ff5da03b1f6', 'field_57d64dfaa45ef_discount');
add_filter('acf/load_field/key=field_58410e84df4d7', 'field_57d64dfaa45ef_marketing');
add_filter('acf/load_field/key=field_58480111fdd9e', 'field_57d64dfaa45ef_marketing');

/* Populate Batch IDS  with open */

function field_57d64dfaa45ef_inst($field)
{

    global $post;
    //var_dump( $post );
    $field['choices'] = array();

    $apollo_home_args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'order'          => 'ASC', 'orderby'        => 'title'
    );

    $apollo_home_teams = get_posts($apollo_home_args);

    if (count($apollo_home_teams) > 0) :
        $field['choices'][0] = 'Select the Course';
        foreach ($apollo_home_teams as $team)
        {
            $batchid        = get_field('batch_name', $team->ID);
            $inst           = get_field('c_institute', $team->ID);
            $part           = get_field('select_partner', $team->ID);
            $scourse        = get_field('select_course', $team->ID);
            $admission_open = get_field('admission_open', $team->ID);
            $coursename     = get_the_title($team->ID);
            //if ($admission_open=='Yes'){
            if (($inst == $post->ID || $part == $post->ID)&& $scourse == 0)
            {
                $field['choices'][$team->ID] = $coursename . ' - ' . $batchid;
            }
            //}
        }
    endif;

    // return the field
    return $field;
}

/* IINstittue Page */
add_filter('acf/load_field/key=field_5825ac13c6072', 'field_57d64dfaa45ef_inst');

//require 'vendor/themeisle/theme_update_free.php';

function get_top_parent($cat)
{
    $curr_cat = get_category_parents($cat, false, '/', true);
    $curr_cat = explode('/', $curr_cat);
    $idObj    = get_category_by_slug($curr_cat[0]);
    echo $id       = $idObj->term_id;
}

function save_category_info($post_id, $post, $update)
{
    global $post;
    if ($post->post_type == 'product')
    {
        $course_type = get_field('course_type', $post_id);
        if ($course_type == 1)
        {
            $type    = 'executive-courses';
            $term_id = 17;
        }
        else
        {
            $type    = 'certificate-courses';
            $term_id = 18;
        }
        $c_institute     = get_field('c_institute', $post_id);
        $instittue_title = get_the_title($c_institute);
        $term_exists     = term_exists($instittue_title, 'product_cat', $term_id);
        if ($term_exists)
        {
            $category          = get_term_by('name', $instittue_title, 'product_cat');
            $p_id              = $category->term_id;
            $term_taxonomy_ids = wp_set_object_terms($post_id, $p_id, 'product_cat');
        }
        else
        {
            $cat_id            = wp_insert_term(
                    $instittue_title, // the term
                    'product_cat', // the taxonomy
                    array(
                'description' => '',
                'slug'        => '',
                'parent'      => $term_id
                    )
            );
            $newterm_id        = $cat_id['term_id'];
            $term_taxonomy_ids = wp_set_object_terms($post_id, $newterm_id, 'product_cat');
        }
    }
}

add_action('save_post', 'save_category_info', 10, 3);

/* Woocommerce  */

function wc_customer_bought_product2($customer_email, $user_id, $product_id)
{
    global $wpdb;

    $transient_name = 'wc_cbp_' . md5($customer_email . $user_id . WC_Cache_Helper::get_transient_version('orders'));

    if (false === ( $result = get_transient($transient_name) ))
    {
        $customer_data = array($user_id);

        if ($user_id)
        {
            $user = get_user_by('id', $user_id);

            if (isset($user->user_email))
            {
                $customer_data[] = $user->user_email;
            }
        }

        if (is_email($customer_email))
        {
            $customer_data[] = $customer_email;
        }

        $customer_data = array_map('esc_sql', array_filter(array_unique($customer_data)));

        if (sizeof($customer_data) == 0)
        {
            return false;
        }

        $result = $wpdb->get_col("
      SELECT im.meta_value FROM {$wpdb->posts} AS p
      INNER JOIN {$wpdb->postmeta} AS pm ON p.ID = pm.post_id
      INNER JOIN {$wpdb->prefix}woocommerce_order_items AS i ON p.ID = i.order_id
      INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS im ON i.order_item_id = im.order_item_id
      WHERE p.post_status IN ( 'wc-completed', 'wc-processing', 'wc-failed', 'wc-cancelled','wc-pending','wc-refunded','wc-on-hold')
      AND pm.meta_key IN ( '_billing_email', '_customer_user' )
      AND im.meta_key IN ( '_product_id', '_variation_id' )
      AND im.meta_value != 0
      AND pm.meta_value IN ( '" . implode("','", $customer_data) . "' )
    ");
        $result = array_map('absint', $result);

        set_transient($transient_name, $result, DAY_IN_SECONDS * 30);
    }
    return in_array(absint($product_id), $result);
}

/* Make Product Virtual by default */

function cs_wc_product_type_options($product_type_options)
{
    $product_type_options['virtual']['default'] = 'yes';
    //$product_type_options['downloadable']['default'] = 'yes';
    return $product_type_options;
}

add_filter('product_type_options', 'cs_wc_product_type_options');

function rename_add_to_cart_text()
{
    return __('Enrol now', 'woocommerce');
}
add_filter('woocommerce_product_single_add_to_cart_text', 'rename_add_to_cart_text');

function only_one_product_in_cart($cart_item_data)
{
    global $woocommerce;
    $woocommerce->cart->empty_cart();
    return $cart_item_data;
}
add_filter('woocommerce_add_to_cart_validation', 'only_one_product_in_cart');
// add_action('wp_logout','go_home');
// function go_home(){
//   wp_redirect( home_url() );
//   exit();
// }

/**
 * WooCommerce product data tab definition
 *
 * @return array
 */
//add_action('wc_cpdf_init', 'prefix_custom_product_data_tab_init', 10, 0);
if (!function_exists('prefix_custom_product_data_tab_init')) :

    function prefix_custom_product_data_tab_init()
    {
        $custom_product_data_fields = array();

        /** First product data tab starts * */
        /** ===================================== */
        $custom_product_data_fields['custom_data_1'] = array(
            array(
                'tab_name' => __('Custom Data', 'wc_cpdf'),
            ),
            array(
                'id'          => '_mytext',
                'type'        => 'text',
                'label'       => __('Text', 'wc_cpdf'),
                'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
                'class'       => 'large',
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'id'          => '_mynumber',
                'type'        => 'number',
                'label'       => __('Number', 'wc_cpdf'),
                'placeholder' => __('Number.', 'wc_cpdf'),
                'class'       => 'short',
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'id'          => '_mytextarea',
                'type'        => 'textarea',
                'label'       => __('Textarea', 'wc_cpdf'),
                'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
                'style'       => 'width:70%;height:140px;',
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'id'          => '_mycheckbox',
                'type'        => 'checkbox',
                'label'       => __('Checkbox', 'wc_cpdf'),
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'id'          => '_myselect',
                'type'        => 'select',
                'label'       => __('Select', 'wc_cpdf'),
                'options'     => array(
                    'option_1' => 'Option 1',
                    'option_2' => 'Option 2',
                    'option_3' => 'Option 3'
                ),
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'id'          => '_myradio',
                'type'        => 'radio',
                'label'       => __('Radio', 'wc_cpdf'),
                'options'     => array(
                    'radio_1' => 'Radio 1',
                    'radio_2' => 'Radio 2',
                    'radio_3' => 'Radio 3'
                ),
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'id'    => '_myhidden',
                'type'  => 'hidden',
                'value' => 'Hidden Value',
            ),
            array(
                'id'          => '_mymultiselect',
                'type'        => 'multiselect',
                'label'       => __('Multiselect', 'wc_cpdf'),
                'placeholder' => __('Multiselect maan!', 'wc_cpdf'),
                'options'     => array(
                    'option_1' => 'Option 1',
                    'option_2' => 'Option 2',
                    'option_3' => 'Option 3',
                    'option_4' => 'Option 4',
                    'option_5' => 'Option 5'
                ),
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
                'class'       => 'medium'
            ),
            // image
            array(
                'id'          => '_myimage',
                'type'        => 'image',
                'label'       => __('Image 1', 'wc_cpdf'),
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'id'          => '_mygallery',
                'type'        => 'gallery',
                'label'       => __('Gallery', 'wc_cpdf'),
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            // Color
            array(
                'id'          => '_mycolor',
                'type'        => 'color',
                'label'       => __('Select color', 'wc_cpdf'),
                'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
                'class'       => 'large',
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            // Datepicker
            array(
                'id'          => '_mydatepicker',
                'type'        => 'datepicker',
                'label'       => __('Select date', 'wc_cpdf'),
                'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
                'class'       => 'large',
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            ),
            array(
                'type' => 'divider'
            )
        );

        /** First product data tab ends * */
        /** ===================================== */
        /** Second product data tab starts * */
        /** ===================================== */
        $custom_product_data_fields['custom_data_2'] = array(
            array(
                'tab_name' => __('Custom Data 2', 'wc_cpdf'),
            ),
            array(
                'id'          => '_mytext_2',
                'type'        => 'text',
                'label'       => __('Text ABCD', 'wc_cpdf'),
                'placeholder' => __('A placeholder text goes here.', 'wc_cpdf'),
                'class'       => 'large',
                'description' => __('Field description.', 'wc_cpdf'),
                'desc_tip'    => true,
            )
        );

        $custom_product_data_fields['general_product_data'] = array(
            array(
                'id'          => '_mytext_2',
                'type'        => 'text',
                'label'       => __('Text ABCD', 'general_tab'),
                'placeholder' => __('A placeholder text goes here.', 'general_tab'),
                'class'       => 'large',
                'description' => __('Field description.', 'general_tab'),
                'desc_tip'    => true,
            )
        );

        return $custom_product_data_fields;
    }

endif;
add_action('userpro_after_new_registration', "user_refer_and_earn");

function user_refer_and_earn($user_id)
{
    $user_data        = get_userdata($user_id);
    $fname            = get_user_meta($user_id, 'first_name');
    $refcode          = get_user_meta($user_id, 'referred_by');
    $email            = $user_data->user_email;
    $referredby_id    = '';
    $referredby_email = '';
    if(!get_user_meta($user_id, 'billing_first_name')){
		add_user_meta($user_id,'billing_first_name',get_user_meta($user_id, 'first_name',true));
	}
    if(!get_user_meta($user_id, 'billing_last_name')){
		add_user_meta($user_id,'billing_last_name',get_user_meta($user_id, 'last_name',true));
	}
    if(!get_user_meta($user_id, 'billing_phone')){
		add_user_meta($user_id,'billing_phone',get_user_meta($user_id, 'phone_number',true));
	}
    /* setting email headers */
    $headers          = array('Content-Type: text/html; charset=UTF-8',
        'From:  Talentedge<admission@talentedge.in>');
    $subject          = "The referred user has signed up with talentedge";

    /* getting reffered by user data by referral code */

    if (!empty($refcode[0]))
    {
        $referredby_user = get_users(array('meta_key' => 'user_reference_code', 'meta_value' => $refcode[0]));
        if (!empty($referredby_user))
        {
            foreach ($referredby_user as $r_userinfo)
            {
                $userinfo_array   = $r_userinfo->data;
                $referredby_id    = $userinfo_array->ID;
                $referredby_fname = get_user_meta($referredby_id, 'first_name');
                $referredby_email = get_user_meta($referredby_id, 'user_email');
            }
            $qry_args  = array(
                'post_status'    => 'publish', // optional
                'post_type'      => 'referrals', // Change to match your post_type
                'posts_per_page' => -1, // ALL posts
                'meta_query'     => array(
                    array(
                        'key'   => 'referred_by_code',
                        'value' => $refcode,
                    ),
                ),
            );
            $the_query = new WP_Query($qry_args);
            if ($the_query->have_posts())
            {
                while ($the_query->have_posts()) : $the_query->the_post();
                    /* updating the status */
                    $post_id = get_the_ID();
                    update_post_meta($post_id, 'user_id', $user_id);
                    $result  = update_post_meta($post_id, 'status', 'Registered');

                endwhile;
            }
            else
            {
                /* Checking if referral code exist or not */

                $my_post = array(
                    'post_title'  => $email,
                    'post_status' => 'publish',
                    'post_type'   => 'referrals',
                    'post_author' => 1,
                    'meta_input'  => array(
                        'user_id'          => $user_id,
                        'user_name'        => $fname[0],
                        'user_email'       => $email,
                        'referred_by'      => $referredby_email[0],
                        'referred_by_code' => $refcode[0],
                        'referred_by_id'   => $referredby_id,
                        'status'           => 'Registered'
                    ),
                );

                $body   = '<p> Hi ' . $referredby_fname[0] . ',<br><br>You had referred ' . $fname[0] . ' to <a href="' . $siteUrl . '">talentedge<a>
                    The moment he enrolls you will be eligible for a complimentary Flipkart voucher.
                    You will be able to see the same on your profile as well. <br><br> Thanks for the reference.';
                // Insert the post into the database
                $result = wp_insert_post($my_post);

                if ($result)
                {
                    //wp_mail( $referredby_email, $subject, $body, $headers );
                }
            }
        }
    }
}

add_action('gform_after_submission_8', 'referred_userdata_entry', 10, 2);

function referred_userdata_entry($entry, $form)
{
    $fname            = rgar($entry, '1');
    $email            = rgar($entry, '2');
    $refcode          = rgar($entry, '4');
    $referredby_email = rgar($entry, '7');
    $referredby_id    = rgar($entry, '8');
    $existemailArray  = array();

    $qry_args  = array(
        'post_status'    => 'publish', // optional
        'post_type'      => 'referrals', // Change to match your post_type
        'posts_per_page' => -1, // ALL posts
    );
    $the_query = new WP_Query($qry_args);
    if ($the_query->have_posts())
    {
        while ($the_query->have_posts()) : $the_query->the_post();
            /* updating the status */
            $post_id           = get_the_ID();
            $existemail        = get_field('user_email', $post_id);
            $existemailArray[] = $existemail;
        endwhile;
    }
    $my_post = array(
        'post_title'  => $email,
        'post_status' => 'publish',
        'post_type'   => 'referrals',
        'post_author' => 1,
        'meta_input'  => array(
            'user_name'        => $fname,
            'user_email'       => $email,
            'referred_by'      => $referredby_email,
            'referred_by_code' => $refcode,
            'referred_by_id'   => $referredby_id,
            'status'           => 'Pending'
        ),
    );
    if (!in_array($email, $existemailArray))
    {
        wp_insert_post($my_post);
        $curl_post_data = array(
            'name'        => $fname,
            'email'       => $email,
            'mobile'      => $phone,
            'webid'       => $insert_id,
            'referred_by' => $referredby_id
        );

        $cResponse = callRestApiPost(CRM_URL . '/apite/v1/referal_lead', $curl_post_data);


        if ($cResponse->status == 1 && $cResponse->lead_id != "")
        {
            add_post_meta($insert_id, 'crm_referral_id', $cResponse->lead_id);
        }
    }
}
/* getting the list of reffered user by user id */

function get_listof_referred_userdata($userId)
{
    $qry_args  = array(
        'post_status'    => 'publish', // optional
        'post_type'      => 'referrals', // Change to match your post_type
        'posts_per_page' => -1, // ALL posts
        'meta_query'     => array(
            array(
                'key'   => 'referred_by_id',
                'value' => $userId,
            ),
        ),
    );
    $the_query = new WP_Query($qry_args);
    if ($the_query->have_posts())
    {?>
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Coupons</th>
                </tr>
            </thead>
        <?php
        // The Loop
        $i = 1;
        while ($the_query->have_posts()) : $the_query->the_post();
            $post_id     = get_the_ID();
            $user_fname  = get_field('user_name', $post_id);
            $user_status = get_field('status', $post_id);
            $user_coupon = get_field('coupon', $post_id);
            $user_email  = get_field('user_email', $post_id);
            if ($user_fname)
            {
                $user_fname = $user_fname;
            }
            else
            {
                $user_fname = $user_email;
            }
            ?>
                <tr>
                    <td data-th="S.No"><?php echo $i; ?></td>
                    <td data-th="Name"><?php echo $user_fname ?></td>
                    <td data-th="Status">
                        <p class="<?php echo $user_status; ?>"><?php echo $user_status;
            if ($user_status == "Registered" || $user_status == "Pending")
            {
                ?>
                                <input type="hidden" class="refer_value" value="<?php echo $post_id ?>">
                                <button class="remind_use button" value="<?php echo $post_id ?>">Remind</button>
            <?php } ?>
                        </p>

                    </td>
                    <td data-th="Coupons"><?php echo $user_coupon; ?></td>
                </tr>

            <?php
            $i++;
        endwhile;
        ?>
        </table>
        <?php
    }
    else
    {
        echo "<p class='text-center'> No user Referred</p>";
    }
}

/* Sending reminder email */
add_action('wp_ajax_send_remindemail_ajax', 'send_remindemail_ajax', 15);
add_action('wp_ajax_nopriv_send_remindemail_ajax', 'send_remindemail_ajax', 15);

function send_remindemail_ajax()
{
    if (isset($_POST['postId']))
    {
        $post_id           = $_POST['postId'];
        $user_fname        = get_field('user_name', $post_id);
        $siteUrl           = get_bloginfo("url");
        $user_email        = get_field('user_email', $post_id);
        $referredby_email  = get_field('referred_by', $post_id);
        $referredby_id     = get_field('referred_by_id', $post_id);
        $referredby_code   = get_field('referred_by_code', $post_id);
        $referred_userdata = get_userdata($referredby_id);
        $referredby_fname  = $referred_userdata->first_name;

        $headers = array('Content-Type: text/html; charset=UTF-8',
            'From:  Talentedge<admission@talentedge.in>', 'Disposition-Notification-To: ' . $user_email . '\n');
        $subject = "Reminder to register on talentedge";
        $body    = '<p> Hi ' . $user_fname . ',<br><br>Your friend ' . $referredby_fname . 'has referred you to enhance your career
                through the courses available at  to <a href="' . $siteUrl . '">Talentedge</a>
                ' . $referredby_fname . ' would like to remind you of the same.<br><br>Thanks';

        $result = wp_mail($user_email, $subject, $body, $headers);

        return $result;
    }
}
/* function to update the referred user data who purchase the course */
add_action('woocommerce_payment_complete', 'custom_process_order', 10, 1);

function custom_process_order($order_id)
{
    $order     = new WC_Order($order_id);
    $myuser_id = $order->user_id;

    // check if user purchased any course if not than proceed
    //if(checkif_orderplacedby_user($myuser_id) != 1 ) {

    $user_info       = get_userdata($myuser_id);
    $user_emailid    = $user_info->user_email;
    $user_first_name = $user_info->first_name;
    $siteUrl         = get_bloginfo("url");
    $adminEmail      = get_option('admin_email');
    /* setting email headers */
    $headers         = array('Content-Type: text/html; charset=UTF-8',
        'From:  Talentedge<admission@talentedge.in>');
    $userSubject     = "Your Referred friend has helped you earn a Reward at Talentedge";
    $adminSubject    = "Update Reward coupon for the user";

    $qry_args  = array(
        'post_status'    => 'publish', // optional
        'post_type'      => 'referrals', // Change to match your post_type
        'posts_per_page' => -1, // ALL posts
        'meta_query'     => array(
            array(
                'key'   => 'user_id',
                'value' => $myuser_id,
            ),
        ),
    );
    $the_query = new WP_Query($qry_args);
    if ($the_query->have_posts())
    {
        while ($the_query->have_posts()) : $the_query->the_post();
            $post_id           = get_the_ID();
            $user_fname        = get_field('user_name', $post_id);
            $user_email        = get_field('user_email', $post_id);
            $referredby_email  = get_field('referred_by', $post_id);
            $referredby_id     = get_field('referred_by_id', $post_id);
            $referred_userdata = get_userdata($referredby_id);
            $referredby_fname  = $referred_userdata->first_name;
            $user_status       = get_field('status', $post_id);

            $userEmailBody = '<p> Dear ' . $referredby_fname . ',<br><br>Congratulations for a successful Referral at
                <a href="' . $siteUrl . '/?utm_source=AutoEmailer&utm_campaign=ReferreEnrolled&utm_medium=Email">Talentedge</a>.
                Your friend ' . $user_fname . ' has enrolled for a course.This makes you eligible for the referral reward.
                <a href="' . $siteUrl . '/#loginpopup">Login</a> to your profile for more details on how to claim it.
                <br><br> Thanks for the reference.';

            $adminEmailBody = '<p> Hi,<br><br>User ' . $referredby_fname . ' has referred ' . $user_fname . '(' . $user_email . ') to
                TalentEdge ' . $user_fname . ' has now successfully enrolled for a course ' . $referredby_fname . ' is now eligible for a
                Flipkart Voucher. Kindly update the same from the backend. Please find the url below to update.
                <br><br> ' . $siteUrl . '/wp-admin/post.php?post=' . $post_id . '&action=edit <br><br> Thanks.';

            /* updating the status */
            $result = update_post_meta($post_id, 'status', 'Enrolled');
            if ($result)
            {
                /* sending email to user */
                wp_mail($referredby_email, $userSubject, $userEmailBody, $headers);

                /* sending email to admin to update the voucher for the user */
                wp_mail($adminEmail, $adminSubject, $adminEmailBody, $headers);
            }
        endwhile;
    }
}
/* Sending email on coupon update */
add_action('save_post', 'refer_coupon_updateemail', 10, 3);

function refer_coupon_updateemail($post_id)
{
    $headers           = array('Content-Type: text/html; charset=UTF-8',
        'From:  Talentedge<admission@talentedge.in>');
    $userSubject       = "Flipkart coupon added";
    $post_type         = get_post_type($post_id);
    $coupon_value      = get_field('coupon', $post_id);
    $user_fname        = get_field('user_name', $post_id);
    $user_email        = get_field('user_email', $post_id);
    $email_flag        = get_field('email_flag', $post_id);
    $referredby_email  = get_field('referred_by', $post_id);
    $referredby_id     = get_field('referred_by_id', $post_id);
    $referred_userdata = get_userdata($referredby_id);
    $referredby_fname  = $referred_userdata->first_name;
    $userEmailBody     = '<p> Hi ' . $referredby_fname . ',<br><br>Your referral has enrolled for a course and so as a token of gratitude, you have received a Flipkart voucher worth Rs. 5,000. You can see the same in your profile<br><br> Thanks for the reference.';

    if (!empty($coupon_value) && $email_flag != '1' && $post_type == 'referrals')
    {
        update_post_meta($post_id, 'email_flag', '1');
        // wp_mail( $referredby_email, $userSubject, $userEmailBody, $headers);
    }
}
/* reading encoded parameters from url */

function read_query_data($urlData)
{
    $queryData = array();
    $data1     = base64_decode($urlData);
    $data2     = explode('&', $data1);
    foreach ($data2 as $key => $value)
    {
        $data3 = explode('=', $value);

        $queryData[$data3[0]] = $data3[1];
    }
    return $queryData;
}
/* check if user placed any order */

function checkif_orderplacedby_user($userId)
{

    $customer_orders = get_posts(apply_filters('woocommerce_my_account_my_orders_query', array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $userId,
        'post_type'   => wc_get_order_types('view-orders'),
        'post_status' => 'wc-completed'
            )));

    if ($customer_orders):
        return true;

    else:
        return false;

    endif;
}
/**
 * Upon user registration, generate a random number and add this to the usermeta table
 *
 * @param required integer $user_id The ID of the newly registerd user
 */
add_action('user_register', 'create_referenceno_user_register', 15, 1);

function create_referenceno_user_register($user_id)
{
    $random_number = generateRandomString();
    update_user_meta($user_id, 'user_reference_code', $random_number);
}

/* getting the user certificate in the admin */

function get_user_certificate($userId)
{
    if (have_rows('user_certificates', 'user_' . $userId)):
        ?>
        <div class="myCertificateSlider owl-carousel owl-theme">
        <?php while (have_rows('user_certificates', 'user_' . $userId)) : the_row(); ?>
                <div class="certificate_wrapper">
            <?php if (!empty(get_sub_field('course_certificate_image')))
            { ?>
                        <img class="owl-lazy" data-src="<?php echo get_sub_field('course_certificate_image'); ?>" />
            <?php } ?>
                    <div class="course_certificate_name">
                        <h3>
            <?php
            $course_id = (get_sub_field('batch_name') );
            $c_name    = get_field('course_short_name', $course_id);
            echo $c_name;
            ?>
                        </h3>
            <?php if (!empty(get_sub_field('certificate_pdf')))
            { ?>
                            <div class="text-right download_certificate">
                                <a href="<?php echo get_sub_field('certificate_pdf'); ?>" target="_blank">
                                    <i class="fa icon-download2"></i>
                                    View Certificate</a>
                            </div>
            <?php } ?>
                    </div>
                </div>
        <?php endwhile; ?>
        </div>
        <?php
    else : echo "<p class='text-center'>No Certificates Earned. Find a course to earn and earn certifications from premium institutes.</P>
                             <div class='text-center margin-tp-20'><a class='btn-normal text-uppercase' href='" . get_home_url() . "/browse-courses/'>Browse Courses</a></div>";

    endif;
}

add_action('admin_menu', 'my_menu');

function my_menu()
{
    //    add_menu_page('My Page Title', 'My Menu Title', 'manage_options', 'my-page-slug', 'my_function');
    add_menu_page('Utmleads', 'Utm Leads', 'manage_options', 'gf_entries&id=7', 'Utmleads', '', '6');
}

add_filter("gform_confirmation", "confirm_change", 10, 4);

function confirm_change($confirmation, $form, $lead, $ajax)
{



    if ($form['id'] == '8')
    {
        $confirmation = "<p class='thanku-text'>Thanks for referring your friend.</p>";
    }
    elseif ($form['id'] == '9')
    {
        $confirmation = "<p class='thanku-text'>Please check your email to download the brochure.</p>";
    }
    elseif ($form['id'] == '14' || $form['id'] == '15' || $form['id'] == '16')
    {
        $confirmation = "<p class='thanku-text'>Thanks for the information.</p>";
    }
    elseif ($form['id'] == '17')
    {
        $confirmation = "<p class='thanku-text'>Thank you for the Submission.</p>";
    }
    elseif ($form['id'] == '1')
    {
        $name         = rgar($lead, '3');
        $courseId     = rgar($lead, '7');
        $url          = get_bloginfo('url') . "/thankyou/?formid=" . $form['id'] . "&uname=" . $name . "&cid=" . $courseId . "&leadid=" . ($lead['id']);
        $confirmation = array('redirect' => $url);
    }elseif ($form['id'] == '34')
    {
        $name         = rgar($lead, '1');
        $courseId     = rgar($lead, '4');
        $url          = get_bloginfo('url') . "/thankyou/?formid=" . $form['id'] . "&uname=" . $name . "&cid=" . $courseId . "&leadid=" . ($lead['id']);
        $confirmation = array('redirect' => $url);
    }
    elseif ($form['id'] == '7' || $form['id'] == '12' || $form['id'] == '22' || $form['id'] == '23' || $form['id'] == '24')
    {
        $name         = rgar($lead, '1');
        $courseId     = rgar($lead, '17');
        $pageId       = rgar($lead, '18');
        $phoneno      = rgar($lead, '3');
        $url          = get_bloginfo('url') . "/thankyou/?formid=" . $form['id'] . "&uname=" . $name . "&cid=" . $courseId . "&pid=" . $pageId . "&pno=" . $phoneno . "&leadid=" . ($lead['id']);
        $confirmation = array('redirect' => $url);
    }
    elseif ($form['id'] == '5' || $form['id'] == '10')
    {
        $name         = rgar($lead, '1');
        $courseId     = rgar($lead, '7');
        $url          = get_bloginfo('url') . "/thankyou/?formid=" . $form['id'] . "&uname=" . $name . "&cid=" . $courseId . "&leadid=" . ($lead['id']);
        $confirmation = array('redirect' => $url);
    }
    elseif($form['id']==27)
    {
        $url = get_bloginfo('url')."/edit-profile";
        $confirmation = array('redirect' => $url);
    }
   else if($form['id']==29)
    {
     $url = get_bloginfo('url')."/cyber-security-thank-you";
     $confirmation = array('redirect' => $url);
    }
    else if(($form['id']==30)||($form['id']==36))
    {
        $name         = rgar($lead, '1');
        $courseId     = rgar($lead, '4');
        $url          = get_bloginfo('url') . "/thankyou/?formid=" . $form['id'] . "&uname=" . $name . "&cid=" . $courseId . "&leadid=" . ($lead['id']);
        $confirmation = array('redirect' => $url);
    }
	else if($form['id']==18)
    {
        $name         = rgar($lead, '1');
        $courseId     = rgar($lead, '8');
       $url          = get_bloginfo('url') . "/thankyou/?formid=" . $form['id'] ."form=" . $form . "&uname=" . $name . "&cid=" . $courseId . "&leadid=" . ($lead['id']);
        $confirmation = array('redirect' => $url);
    }

    return $confirmation;
}

add_action('gform_after_submission', 'update_form_entry', 10, 2);

function update_form_entry($entry, $form)
{

    $city            = rgar($entry, '1');
    $company         = rgar($entry, '3');
    $functional_area = rgar($entry, '2');
    $leadId          = $_SESSION['leadId'];
    $formId          = $_SESSION['formId'];

    if ($formId == '5' || $formId == '10')
    {

        GFAPI::update_entry_field($leadId, 8, $city);
        GFAPI::update_entry_field($leadId, 9, $company);
        GFAPI::update_entry_field($leadId, 10, $functional_area);
    }
    if ($formId == '1')
    {

        GFAPI::update_entry_field($leadId, 6, $city);
        GFAPI::update_entry_field($leadId, 7, $company);
        GFAPI::update_entry_field($leadId, 8, $functional_area);
    }
    if ($formId == '7' || $formId == '12' || $formId == '22' || $formId == '23' || $formId == '24')
    {

        GFAPI::update_entry_field($leadId, 10, $city);
        GFAPI::update_entry_field($leadId, 11, $company);
        GFAPI::update_entry_field($leadId, 12, $functional_area);
    }
    if ($formId == '4' || $formId == '6' || $formId == '11' || $formId == '2')
    {

        GFAPI::update_entry_field($leadId, 5, $city);
        GFAPI::update_entry_field($leadId, 6, $company);
        GFAPI::update_entry_field($leadId, 7, $functional_area);
    }
}

/* getting installment due date */

function get_inst_end_date($product_id, $paidamount, $currency)
{

    $index      = 1;
    ob_start();
    $data       = array();
    $totalprice = '';
    if (have_rows('installments', $product_id)):
        while (have_rows('installments', $product_id)): the_row();
            //$duedate = get_sub_field('installment_due_date', $product_id);

            if ($index == 1)
            {
                $duedate = get_course_lastdate($product_id);
            }
            else
            {
                $duedate = get_sub_field('installment_due_date', $product_id);
            }

            if ($currency != 'IN')
            {
                $price = get_sub_field('usd_price', $product_id);
            }
            else
            {
                $price = get_sub_field('inr_price', $product_id);
            }

            $totalprice = $totalprice + $price;
            if ($paidamount < $totalprice)
            {
                $inst_item = $index;
                $date      = $duedate;
                break;
            }
            $index++;
        endwhile;
    endif;

    $data = array('type' => $inst_item, 'date' => $duedate);

    return $data;
}

function get_product_orders($prodid, $userid)
{
    $user_id      = get_current_user_id();
    $prodid       = 985;
    $ptitle       = get_the_title($prodid);
    $order_ids    = $wpdb->get_results("select p.ID as order_id,p.post_date, p.post_status, max( CASE WHEN pm.meta_key = '_billing_email' and p.ID = pm.post_id THEN pm.meta_value END ) as billing_email, max( CASE WHEN pm.meta_key = 'payment_type' and p.ID = pm.post_id THEN pm.meta_value END ) as payment_type, max( CASE WHEN pm.meta_key = '_customer_user' and p.ID = pm.post_id THEN pm.meta_value END ) as customer_user, max( CASE WHEN pm.meta_key = '_order_total' and p.ID = pm.post_id THEN pm.meta_value END ) as order_total, ( select group_concat( order_item_name separator '|' ) from te_woocommerce_order_items where order_id = p.ID ) as order_items from te_posts p join te_postmeta pm on p.ID = pm.post_id join te_woocommerce_order_items oi on p.ID = oi.order_id where post_type = 'shop_order' and oi.order_item_name = '" . $ptitle . "' group by p.ID");
    $orderarray   = array();
    $paid_amount_ = '';
    $oarray       = json_decode(json_encode($order_ids), True);
    foreach ($oarray as $order)
    {
        if ($order['customer_user'] == $user_id)
        {
            $order_total               = round($order['order_total']);
            $paid_amount_              += $order_total;
            $orderarray['id']          = $orderid;
            $orderarray['order_total'] = $order_total;
            $orderarray['date']        = $order['post_date'];
            $orderarray['status']      = $order['post_status'];
        }
    }
    $orderamt          = $paid_amount_;
    $order_total_array = array('orders' => $orderarray, 'amount' => $orderamt);
    return $order_total_array;
}
function wc_customer_bought_product_status($customer_email, $user_id, $product_id)
{
    global $wpdb;

    $transient_name = 'wc_cbp_' . md5($customer_email . $user_id . WC_Cache_Helper::get_transient_version('orders'));

    if (false === ( $result = get_transient($transient_name) ))
    {
        $customer_data = array($user_id);

        if ($user_id)
        {
            $user = get_user_by('id', $user_id);

            if (isset($user->user_email))
            {
                $customer_data[] = $user->user_email;
            }
        }

        if (is_email($customer_email))
        {
            $customer_data[] = $customer_email;
        }

        $customer_data = array_map('esc_sql', array_filter(array_unique($customer_data)));

        if (sizeof($customer_data) == 0)
        {
            return false;
        }

        $result = $wpdb->get_col("
            SELECT im.meta_value FROM {$wpdb->posts} AS p
            INNER JOIN {$wpdb->postmeta} AS pm ON p.ID = pm.post_id
            INNER JOIN {$wpdb->prefix}woocommerce_order_items AS i ON p.ID = i.order_id
            INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS im ON i.order_item_id = im.order_item_id
            WHERE p.post_status IN ( 'wc-completed', 'wc-processing', 'wc-failed', 'wc-cancelled','wc-pending','wc-refunded','wc-on-hold')
            AND pm.meta_key IN ( '_billing_email', '_customer_user' )
            AND im.meta_key IN ( '_product_id', '_variation_id' )
            AND im.meta_value != 0
            AND pm.meta_value IN ( '" . implode("', '", $customer_data) . "' )
        ");
        $result = array_map('absint', $result);

        set_transient($transient_name, $result, DAY_IN_SECONDS * 30);
    }
    return in_array(absint($product_id), $result);
}

/* * **************************** My Courses Section Starts************************************* */

function customer_bought_product($customer_email)
{
    global $wpdb;
    $product_result = $wpdb->get_results('SELECT im.meta_value FROM te_posts AS p
                       INNER JOIN te_postmeta AS pm ON p.ID = pm.post_id
                       INNER JOIN te_woocommerce_order_items AS i ON p.ID = i.order_id
                       INNER JOIN te_woocommerce_order_itemmeta AS im ON i.order_item_id = im.order_item_id
                       WHERE p.post_status IN ( "wc-completed", "wc-processing", "wc-failed", "wc-cancelled","wc-pending","wc-refunded","wc-on-hold")
                       AND pm.meta_key IN ( "_billing_email", "_customer_user" )
                       AND im.meta_key IN ( "_product_id", "_variation_id" )
                       AND im.meta_value != 0
                       AND pm.meta_value IN ( "' . $customer_email . '" )');

    /* converting object arra to single dimensional array */
    $product_obj  = stdToArray($product_result);
    $productarray = array_column($product_obj, 'meta_value');
    //return $productarray;
    if($customer_email!=''){  return $productarray;} else { return $productarray = array();}
}

/* Getting all the orders by product name */

function get_all_ordersby_pname($prod_id)
{
    global $wpdb;
    $p_title   = get_the_title($prod_id);
    $postitle  = htmlspecialchars_decode($p_title);
    //$p_title = str_replace("&", "&amp;", $p_title);
    //echo ">>>>>". $p_title;
    $order_ids = $wpdb->get_results("
SELECT p.ID AS order_id,
       p.post_date,
       p.post_status,
       MAX(CASE
               WHEN pm.meta_key = '_billing_email'
                    AND p.ID = pm.post_id THEN pm.meta_value
           END) AS billing_email,
       MAX(CASE
               WHEN pm.meta_key = 'payment_type'
                    AND p.ID = pm.post_id THEN pm.meta_value
           END) AS payment_type,
       MAX(CASE
               WHEN pm.meta_key = '_customer_user'
                    AND p.ID = pm.post_id THEN pm.meta_value
           END) AS customer_user,
       MAX(CASE
               WHEN pm.meta_key = '_order_total'
                    AND p.ID = pm.post_id THEN pm.meta_value
           END) AS order_total,
       MAX(CASE
               WHEN pm.meta_key = '_order_tax'
                    AND p.ID = pm.post_id THEN pm.meta_value
           END) AS order_tax,
       MAX(CASE
               WHEN pm.meta_key = '_order_currency'
                    AND p.ID = pm.post_id THEN pm.meta_value
           END) AS order_currency,
	MAX(CASE
               WHEN pm.meta_key = 'coursetype'
                    AND p.ID = pm.post_id THEN pm.meta_value
           END) AS coursetype,

  (SELECT GROUP_CONCAT(order_item_name SEPARATOR '|')

   FROM te_woocommerce_order_items
   WHERE order_id = p.ID ) AS order_items
FROM te_posts p
LEFT JOIN te_postmeta pm ON p.ID = pm.post_id
LEFT JOIN te_woocommerce_order_items oi ON p.ID = oi.order_id
WHERE post_type = 'shop_order'
  AND oi.order_item_name = '".$postitle."'
GROUP BY p.ID");
//if($postitle=='Executive Program in Strategic Performance Management')
//echo "=====<pre>";print_r($order_ids);echo "</pre>";
    return $order_ids;
}

/* getting order details from User meta */

function get_orderdetails_user($userId, $prod_id)
{
     $orderinfo = get_user_meta($userId, 'order_' . $prod_id, true);
    return $orderinfo;
}

function customer_bought_completed_product($customer_email)
{
    global $wpdb;
    $product_result = $wpdb->get_results('SELECT im.meta_value FROM te_posts AS p
                       INNER JOIN te_postmeta AS pm ON p.ID = pm.post_id
                       INNER JOIN te_woocommerce_order_items AS i ON p.ID = i.order_id
                       INNER JOIN te_woocommerce_order_itemmeta AS im ON i.order_item_id = im.order_item_id
                       WHERE p.post_status IN ( "wc-completed")
                       AND pm.meta_key IN ( "_billing_email", "_customer_user" )
                       AND im.meta_key IN ( "_product_id", "_variation_id" )
                       AND im.meta_value != 0
                       AND pm.meta_value IN ( "' . $customer_email . '" )');

    /* converting object arra to single dimensional array */
    $product_obj  = stdToArray($product_result);
    $productarray = array_column($product_obj, 'meta_value');

    return $productarray;
}

/* * **************************** My Courses Section Ends************************************* */

/**
 * Add all Gravity Forms capabilities to Editor role.
 * Runs when this theme is activated.
 *
 * @access public
 * @return void
 */
function grant_gforms_editor_access()
{

    $role = get_role('editor');
    $role->add_cap('gform_full_access');
}

// Tie into the 'after_switch_theme' hook
add_action('after_switch_theme', 'grant_gforms_editor_access');

/**
 * Remove Gravity Forms capabilities from Editor role.
 * Runs when this theme is deactivated (in favor of another).
 *
 * @access public
 * @return void
 */
function revoke_gforms_editor_access()
{

    $role = get_role('editor');
    $role->remove_cap('gform_full_access');
}
// Tie into the 'switch_theme' hook
add_action('switch_theme', 'revoke_gforms_editor_access');

add_filter('admin_body_class', 'class_to_body_admin');

function class_to_body_admin($classes)
{
    global $current_user;
    $user_role = array_shift($current_user->roles);
    /* Adds the user id to the admin body class array */
    $user_ID   = $current_user->ID;
    $classes   .= $user_role . ' ' . 'user-id-' . $user_ID;
    return $classes;
    return 'user-id-' . $user_ID;
}

function filter_media_comment_status($open, $post_id)
{
    $post = get_post($post_id);
    if ($post->post_type == 'attachment')
    {
        return false;
    }
    return $open;
}

add_filter('comments_open', 'filter_media_comment_status', 10, 2);

function sv_unrequire_wc_phone_field($fields)
{
    $fields['billing_phone']['required']     = false;
    $fields['billing_last_name']['required'] = false;
    return $fields;
}

add_filter('woocommerce_billing_fields', 'sv_unrequire_wc_phone_field');

// function wpse_187763_wpseo_opengraph_title( $title ) {
//     if ( is_home() ) {
//       $title = "Talentedge – Premium Executive Courses from IIM, XLRI, MICA"; // Override title with custom meta title
//     }
//     return $title;
// }
// add_filter( 'wpseo_opengraph_title', 'wpse_187763_wpseo_opengraph_title' );

add_action('admin_menu', 'order_report');

function order_report()
{
    //    add_menu_page('My Page Title', 'My Menu Title', 'manage_options', 'my-page-slug', 'my_function');
    add_menu_page('Reports download', 'Reports download', 'read', 'order-report-download', 'download_order_report_new', '', '4');
}

// add_action('wp_ajax_download_order_report', 'download_order_report', 19);
// add_action('wp_ajax_nopriv_download_order_report', 'download_order_report', 19);


function download_order_report_new()
{
    ?>
    <style type="text/css">
        .or-export{
            padding-top: 20px;
        }
    </style>
    <div class="or-export">
        <h2>WooCommerce Order Export</h2>
        <form method="POST" action="#">
            <p>
            <labe>Start Date</labe>
            <input type="date" class="start_date" name="start_date" value="<?php echo $_POST['start_date']; ?>" required>
            </p>
            <p>
            <labe>End Date</labe>
            <input type="date" class="end_date" name="end_date" value="<?php echo $_POST['end_date']; ?>" required>
            </p>
            <input type="submit" id="export-order" class="button" value="Export Orders" name="export">
        </form>
    </div><?php
    $startDate = $_POST['start_date'];
    $endDate   = $_POST['end_date'];
   if (isset($startDate))
    {
        global $wpdb;
		$post_status = 'wc-completed';
		$result = $wpdb->get_results( "SELECT * FROM $wpdb->posts
            WHERE post_type = 'shop_order'
          AND post_status IN ('{$post_status}')
            AND post_date BETWEEN '{$startDate}  00:00:00' AND '{$endDate} 23:59:59'
        ");
		$table = array();
		$row = array();
		$rowcount = 0;
	foreach($result as $orderdata){
		$checkorderids = array();
		$order_id = $orderdata->ID;
		$order = wc_get_order( $order_id );
		$pid ='';
		foreach ( $order->get_items() as $item ) {
			$pid = $item['product_id'];
		}
		$course_name           = $item['name'];
		$instid          = get_field('c_institute', $pid);
		$instname        = get_field('short_name', $instid);
		$batchid         = get_field('batch_name', $pid);
		$courseTotal     = get_product_price($pid, $value->order_currency);
		$email = get_post_meta($order_id,'_billing_email',true);
		$first_name = get_post_meta($order_id,'_billing_first_name',true);
		$last_name=get_post_meta($order_id,'_billing_last_name',true);
		$phone=get_post_meta($order_id,'_billing_phone',true);
		$address=get_post_meta($order_id,'_billing_address_1',true);
		$address.=", ".get_post_meta($order_id,'_billing_address_2',true);
		$address.=", ".get_post_meta($order_id,'_billing_state',true);
		$address.=", ".get_post_meta($order_id,'_billing_postcode',true);
		$address.=", ".get_post_meta($order_id,'_billing_country',true);
		$payment_method=get_post_meta($order_id,'_payment_method_title',true);
		$custmorId = get_post_meta($order_id,'_customer_user',true);
		$batch_name = get_post_meta($productId,'batch_name',true);
		$order_total = get_post_meta($order_id,'_order_total',true);
		$order_currency = get_post_meta($order_id,'_order_currency',true);
		$order_tax= get_post_meta($order_id,'_order_tax',true);
		$order_amt         = $order_total - $order_tax;
		$paid_date = get_post_meta($order_id,'_paid_date',true);
		$order_date=$orderdata->post_date;
		$taxtype=get_post_meta($order_id,'_taxtype',true);
		$invono= get_post_meta($order_id,'_bewpi_formatted_invoice_number',true);
		$orderPaymentType = get_post_meta($order_id, 'payment_type', true);
		$orderType='';
		if ($orderPaymentType)
		{
			$orderType = "Fresh Enrollment";
		}
		else
		{
			$orderType = "Followup Payment";
		}
		$customer_orders = get_posts( array(
			'meta_key'    => '_customer_user',
			'meta_value'  => $custmorId,
			'post_type'   => 'shop_order',
			'post_status' => 'wc-completed',
			'numberposts' => -1,
			'orderby' => 'id',
			'order'  => 'ASC',
		));
				$payment_order = 0;
		//this retrieves product id from that customer order
		//a dn match
		foreach($customer_orders as $otherorder){
			$orderid = $otherorder->ID;
			//if(!in_array($orderid,$checkorderids)){
			$order_check = wc_get_order( $orderid );


			foreach ( $order_check->get_items() as $checkItem ) {
				$otherProductId = $checkItem['product_id'];

			}
			if($otherProductId === $pid){
				array_push($checkorderids, $orderid);
				$payment_order++;
			}
		}

					$row[$rowcount]['orderid'] = $order_id;
					$row[$rowcount]['invoiceno']=$invono;
					//$row[$rowcount]['productid'] = $productId;
					$row[$rowcount]['orderdate'] = $order_date;
					//$row[$rowcount]['date'] = $paid_date;
					$row[$rowcount]['email'] = $email;
					$row[$rowcount]['first_name'] = $first_name;
					$row[$rowcount]['last_name'] = $last_name;
					$row[$rowcount]['last_name'] = $last_name;
					$row[$rowcount]['phone'] = $phone;
					$row[$rowcount]['address'] = $address;
					$row[$rowcount]['payment_method'] = $payment_method;
					$row[$rowcount]['order_amt'] = $order_amt;
					$row[$rowcount]['servicetax']='';
					$row[$rowcount]['cgst']='';
					$row[$rowcount]['sgst']='';
					$row[$rowcount]['igst']='';
						if($taxtype=='cgst'){
							$row[$rowcount]['cgst']=$order_tax/2;
							$row[$rowcount]['sgst']=$order_tax/2;
						}else if($taxtype=='igst'){
							$row[$rowcount]['igst']=$order_tax;
						}else{
							$row[$rowcount]['servicetax']=$order_tax;
						}
					$row[$rowcount]['order_total']         = $order_total;
					$row[$rowcount]['order_currency']      = $order_currency;
					$row[$rowcount]['order_status']      = $orderdata->post_status;
					$row[$rowcount]['course_id']      = $pid;
					$courseTotal     =get_product_price($pid, $order_currency);
					$row[$rowcount]['courseTotal']     = $courseTotal;
					$row[$rowcount]['course_name'] = $item['name'];
					$instid          = get_field('c_institute', $pid);
					$row[$rowcount]['instname']        = get_field('short_name', $instid);
					$row[$rowcount]['batchid']        = get_field('batch_name', $pid);
					$row[$rowcount]['orderPaymentType']        = $orderType;
					$utmData               = get_gforminfo_byemail($email);
					$row[$rowcount]['utm_source']  = $utmData['utm_source'];
					$row[$rowcount]['utm_medium']  = $utmData['utm_medium'];
					$row[$rowcount]['utm_campign'] = $utmData['utm_campign'];
					$row[$rowcount]['utm_term']    = $utmData['utm_term'];
					$row[$rowcount]['lead_date']   = $utmData['date'];
					$row[$rowcount]['payment_order']   = count($checkorderids);					//array_push($checkorderids, $orderid);
				$rowcount++;

		}
	header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=order-report.csv');
        ob_end_clean();
        $output = fopen('php://output', 'w');
         fputcsv($output, array('Orderid', 'Invoice No', 'Orderdate', 'Email', 'FirstName',
            'lastName', 'Phone','Address', 'PaymentMethod','Order Amount','STax','CGST','SGST','IGST', 'OrderTotal', 'Order Currency', 'Order status', 'Courseid', 'Course Total',
            'Coursename', 'InstituteName', 'BatchId', 'Payment Type', 'Utm Source', 'Utm Medium', 'Utm Campign', 'Utm Term', 'Lead Date', 'Payment Order'));
        foreach ($row as $ordervalue)
        {
            fputcsv($output, $ordervalue);
        }
        fclose($output);
        exit(0);
    }
}

function download_order_report()
{
    ?>
    <style type="text/css">
        .or-export{
            padding-top: 20px;
        }
    </style>
    <div class="or-export">
        <h2>WooCommerce Order Export</h2>
        <form method="POST" action="#">
            <p>
            <labe>Start Date</labe>
            <input type="date" class="start_date" name="start_date" value="<?php echo $_POST['start_date']; ?>" required>
            </p>
            <p>
            <labe>End Date</labe>
            <input type="date" class="end_date" name="end_date" value="<?php echo $_POST['end_date']; ?>" required>
            </p>
            <input type="submit" id="export-order" class="button" value="Export Orders" name="export">
        </form>
    </div><?php
    $startDate = $_POST['start_date'];
    $endDate   = $_POST['end_date'];
   if (isset($startDate))
    {
        global $wpdb;
        $newarray  = array();
        $newarray1 = array();
        $results   = $wpdb->get_results("select
            p.ID as order_id,
            p.post_date,
            max( CASE WHEN pm.meta_key = '_billing_email' and p.ID = pm.post_id THEN pm.meta_value END ) as billing_email,
            max( CASE WHEN pm.meta_key = '_customer_user' and p.ID = pm.post_id THEN pm.meta_value END ) as customer_user,
            max( CASE WHEN pm.meta_key = '_billing_first_name' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_first_name,
            max( CASE WHEN pm.meta_key = '_billing_last_name' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_last_name,
             max( CASE WHEN pm.meta_key = '_billing_country' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_country,
            max( CASE WHEN pm.meta_key = '_billing_state' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_state,
          max( CASE WHEN pm.meta_key = '_order_tax' and p.ID = pm.post_id THEN pm.meta_value END ) as order_tax,
          max( CASE WHEN pm.meta_key = '_order_total' and p.ID = pm.post_id THEN pm.meta_value END ) as order_total,
        max( CASE WHEN pm.meta_key = '_billing_phone' and p.ID = pm.post_id THEN pm.meta_value END ) Phone,
         max( CASE WHEN pm.meta_key = '_order_currency' and p.ID = pm.post_id THEN pm.meta_value END ) order_currency,
        max( CASE WHEN pm.meta_key = '_payment_method' and p.ID = pm.post_id THEN pm.meta_value END ) as payment_method,
            ( select group_concat( order_item_name separator '|' ) from te_woocommerce_order_items where order_id = p.ID ) as order_items
        from
            te_posts p
            join te_postmeta pm on p.ID = pm.post_id
            join te_woocommerce_order_items oi on p.ID = oi.order_id
        where
            post_type = 'shop_order' and
            post_date BETWEEN '" . $startDate . "' AND '" . $endDate . " 23:59:59'
        group by
            p.ID
        order BY
        post_date ASC");
        //echo $wpdb->last_query;
        //print_r($results);
        $i         = 0;
        $staearr=unserialize(WP_STATES);
        foreach ($results as $value)
        {
            $address=get_user_meta($value->customer_user,'billing_address_1',true);
            $city=get_user_meta($value->customer_user,'billing_city',true);
            $address .=($city)? (($address)? ' ,'.$city : $city) :'';
            $address .=($value->_billing_state)? (($address)? ' ,'.$staearr[$value->_billing_state]['name']: $staearr[$value->_billing_state]['name']  ) :'';
            $address .=($value->_billing_country)? (($address)?  ' ,'. $value->_billing_country : $value->_billing_country ) :'';
            $newarray['order_id']            = $value->order_id;
            $newarray['invno']           = get_post_meta($value->order_id,'_bewpi_formatted_invoice_number',true);
            $newarray['post_date']           = $value->post_date;
            $newarray['billing_email']       = $value->billing_email;
            $newarray['_billing_first_name'] = $value->_billing_first_name;
            $newarray['_billing_last_name']  = $value->_billing_last_name;
            $newarray['Phone']               = $value->Phone;
            $newarray['address']      = $address;
            $newarray['payment_method']      = $value->payment_method;
            $newarray['order_amt']         = $value->order_total - $value->order_tax;
            $taxtype=get_post_meta($value->order_id,'_taxtype',true);
            $newarray['servicetax']='';
            $newarray['cgst']='';
            $newarray['sgst']='';
            $newarray['igst']='';
            if($taxtype=='cgst'){
			    $newarray['cgst']=$value->order_tax/2;
			    $newarray['sgst']=$value->order_tax/2;
			}else if($taxtype=='igst'){
				$newarray['igst']=$value->order_tax;
			}else{
				$newarray['servicetax']=$value->order_tax;
			}
            $newarray['order_total']         = $value->order_total;
            $newarray['order_currency']      = $value->order_currency;

            $orderPaymentType = get_post_meta($value->order_id, 'payment_type', true);

            if ($orderPaymentType)
            {
                $orderType = "Fresh Enrollment";
            }
            else
            {
                $orderType = "Followup Payment";
            }

            $order       = new WC_Order($value->order_id);
            $orderStatus = $order->post_status;
            $items       = $order->get_items();

            $newarray['orderstatus'] = $orderStatus;

            foreach ($items as $item)
            {
                $pid             = $item['product_id'];
                $pname           = $item['name'];
                $instid          = get_field('c_institute', $pid);
                $instname        = get_field('short_name', $instid);
                $batchid         = get_field('batch_name', $pid);
                $newarray['pid'] = $pid;
                $courseTotal     = get_product_price($pid, $value->order_currency);

                $newarray['courseTotal'] = $courseTotal;
                $newarray['pname']       = $pname;
                $newarray['instname']    = $instname;
                $newarray['batchid']     = $batchid;
            }
            $newarray['orderType'] = $orderType;
            $utmData               = get_gforminfo_byemail($value->billing_email);

            $newarray['utm_source']  = $utmData['utm_source'];
            $newarray['utm_medium']  = $utmData['utm_medium'];
            $newarray['utm_campign'] = $utmData['utm_campign'];
            $newarray['utm_term']    = $utmData['utm_term'];
            $newarray['lead_date']   = $utmData['date'];
            $newarray1[$i] = $newarray;
            $i++;
        }
        // echo "<pre>";
        // print_r($newarray1);

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=order-report.csv');
        ob_end_clean();
        $output = fopen('php://output', 'w');
         fputcsv($output, array('Orderid', 'Invoice No', 'Orderdate', 'Email', 'FirstName',
            'lastName', 'Phone','Address', 'PaymentMethod','Order Amount','STax','CGST','SGST','IGST', 'OrderTotal', 'Order Currency', 'Order status', 'Courseid', 'Course Total',
            'Coursename', 'InstituteName', 'BatchId', 'Payment Type', 'Utm Source', 'Utm Medium', 'Utm Campign', 'Utm Term', 'Lead Date'));

        foreach ($newarray1 as $ordervalue)
        {
            fputcsv($output, $ordervalue);
        }

        fclose($output);
        exit(0);
    }
}

function get_gforminfo_byemail($email)
{
    //$email = 'sauravchowdhary15@gmail.com';
    $utmArray       = array();
    global $wpdb;
    $resultFormData = $wpdb->get_results("SELECT lead_id, form_id FROM te_rg_lead_detail WHERE value LIKE '$email'"
    );
    foreach ($resultFormData as $resultData)
    {
        if ($resultData->form_id == '7' || $resultData->form_id == '12')
            $entry = GFAPI::get_entry($resultData->lead_id);

        $utmArray['utm_source']  = $entry['4'];
        $utmArray['utm_medium']  = $entry['5'];
        $utmArray['utm_campign'] = $entry['6'];
        $utmArray['utm_term']    = $entry['7'];
        $utmArray['date']        = $entry['date_created'];
    }

    return $utmArray;
}

add_filter('bewpi_allowed_roles_to_download_invoice', 'bewpi_allowed_roles_to_download_invoice', 10, 2);

function bewpi_allowed_roles_to_download_invoice($allowed_roles)
{
    // available roles: shop_manager, customer, contributor, author, editor, administrator
    $allowed_roles[] = "ccteam";
    // end so on..
    return $allowed_roles;
}
/* get admission open courses for browse course page */

function get_admissionopen_browsec($myposts)
{
    $courseIds = get_field('course_admission_open', '467');
    // print_r($courseIds);
    $courseArray = array();
    $adm_arry = array();
    foreach ($courseIds as $courseId)
    {
      if(get_field('admission_open', $courseId) == "Yes"){
        array_push($adm_arry, $courseId);
      }
    }
    foreach ($courseIds as $courseId)
    {
      if(!in_array($courseId, $adm_arry)){
        array_push($adm_arry, $courseId);
      }
    }
    // print_r($adm_arry);
    unset($courseIds);
    $courseIds = $adm_arry;
    foreach ($courseIds as $courseId)
    {
        $course_categories  = get_field('course_categories', $courseId);
        $course_name        = get_the_title($courseId);
        $course_short_name  = get_field('course_short_name', $courseId);
        $course_admission   = get_field('admission_open', $courseId);
        $course_institution = get_field('c_institute', $courseId);
        $course_duration    = get_field('duration', $courseId);
        $course_startdate   = get_field('course_start_date', $courseId);
        $course_batch       = get_field('batch_name', $courseId);

        $cat_type        = get_field('course_type', $courseId);
        $course_lastdate = get_field('front-end_batch_name', $courseId);
        $select_course   = get_field('select_course', $courseId);
        $courseParent    = get_field('product_parent', $courseId);
        $course_link     = ($courseParent) ? get_permalink($courseParent) : get_permalink($courseId);
       // $course_link     = get_permalink($courseId);
        if (get_field('course_image', $courseId))
        {
            $course_image = get_field('course_image', $courseId);
        }
        else
        {
            $course_image = get_field('course_default_image', 'option');
        }

        if ($course_categories)
        {
            $ai_categories = '';
            foreach ($course_categories as $post_category)
            {
                $ai_categories .= 'te_' . $post_category . ' ';
            }
            //echo $ai_categories;
        }
        if ($course_admission == 'Yes')
        {
            $mxclass = 'admclass';
        }
        else
        {
            $mxclass = '';
        }
        if (in_array($courseId, $myposts))
        {
            $search = 'search';
        }
        else
        {
            $search = '';
        }
// make date object
$date         = new DateTime($course_start_date);
$cl_startdate = get_field('course_start_date', $courseId, false, false);
//$date = new DateTime($cl_startdate);
$timevalue    = strtotime($cl_startdate);
$new_date     = date('M Y', $timevalue);
$termdata = get_term( $course_categories[0], 'course-categories' );;
        ?>
<li id="<?php echo $courseId; ?>" class="mix <?php echo $ai_categories; ?> ct_<?php echo $cat_type; ?> te_<?php echo $course_institution; ?> te_<?php echo $course_admission; ?> <?php echo $search; ?> col-courses-card">
<div class="courseCover <?php echo $mxclass; ?>" style="background-image: url(<?php echo $course_image ?>);"></div>
<div class="wrapCard">
<div class="courseCard-detail">
<div class="card">
    <h4 class="b_inst_name"><?php echo get_field('short_name', $course_institution); ?></h4>
    <h2><a href="<?php echo $course_link;?>"  onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $course_short_name;?>',<?php echo $courseId;?>,'<?php echo get_field('short_name', $course_institution);?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" style="cursor: pointer;" title="<?php echo $course_shortname; ?>"><?php echo $course_short_name; ?></a></h2>
</div>
<ul>
<?php
$k = 1;
// check if the repeater field has rows of data
if (have_rows('key_points', $courseId)):

// loop through the rows of data
while (have_rows('key_points', $courseId)) : the_row();
if ($k <= 2)
{
?>		 <li><?php echo get_field('key_points_0_key_point',$courseId); ?></li>
                <li><?php echo get_sub_field('key_point'); ?></li>
<?php
}
$k++;
endwhile;

endif;
?>
</ul>
</div>
<div class="viewDetailcard">
<div class="course_period"><span>
<?php
// make date object
$date         = new DateTime($course_start_date);
$cl_startdate = get_field('course_start_date', $courseId, false, false);
//$date = new DateTime($cl_startdate);
$timevalue    = strtotime($cl_startdate);
$new_date     = date('M Y', $timevalue);
$termdata = get_term( $course_categories[0], 'course-categories' );
echo $new_date;
?></span> Batch</div>
<div  class="course_period"><span><?php echo $course_duration; ?></span></div>
<div class="btn-te"><a class="redir_btn-a" href="<?php echo $course_link;?>"  onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $course_short_name;?>',<?php echo $courseId;?>,'<?php echo get_field('short_name', $course_institution);?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" style="cursor: pointer;" title="<?php echo $course_shortname; ?>">View Details..</a></div>
</div>
</div>
</li>

<?php //only for course category
$excourse=explode(" ",$ai_categories);


      if(($_GET['search']=='' || $search == 'search') && $new_date!='' && ($_GET['id']=='' || $_GET['id']=='te_'.$course_institution || in_array($_GET['id'],$excourse))){
//echo "###".$_GET['id']."====".$ai_categories;
   if($keynab<10){
	$nablerdetail[$courseId]['name']=$course_short_name;
        $nablerdetail[$courseId]['id']=$courseId;
        $nablerdetail[$courseId]['brand']=get_field('short_name', $course_institution);
        $nablerdetail[$courseId]['category']=$termdata->name;
 	$nablerdetail[$courseId]['variant']=$new_date.' Batch';
        $nablerdetail[$courseId]['list']=$_GET['search']!=''?'Search Results':'Course Category';
        $nablerdetail[$courseId]['position']=$keynab+1;
}
       $keynab=$keynab+1;
     }
}
return $nablerdetail;
//echo "<pre>";print_r($nablerdetail);echo "</pre>";exit;
}

/* getting course last date */

function get_course_lastdate($courseID)
{
    $lastDateArray  = get_field('last_date_mattrix', 'option');
    $courselastdate = "";

    foreach ($lastDateArray as $lastDate)
    {
        if ($lastDate['course_name'] == $courseID)
        {
            $courselastdate = $lastDate['g_last_date'];
        }
    }
    if ($courselastdate)
    {
        return $courselastdate;
    }
    else
    {
        return get_field('front-end_batch_name', $courseID);
    }
}

/* User Edit profile Code starts */

function get_orderid_by_userid($userId)
{

    $customer_orders = get_posts(array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $userId,
        'post_type'   => wc_get_order_types(),
        'post_status' => array_keys(wc_get_order_statuses()),
            ));
    $orderId         = array();
    foreach ($customer_orders as $cOrders)
    {

        $orderId[] = $cOrders->ID;
    }
    return $orderId;
}

add_filter('send_email_change_email', '__return_false');

function my_pre_save_post($userId)
{
    $stringArray       = explode(_, $userId);
    $user_id           = $stringArray[1];
    $editprofile_email = get_field('usereditprofile_email', 'user_' . $user_id);
    $userInfo          = get_userdata($user_id);
    //  // specific new field value
    $new_value         = $_POST['acf']['field_57bc166487d17'];

    $exists = email_exists($new_value);

    if ($new_value)
    {

        if ($exists)
        {
            $new_value = $editprofile_email;
        }
        else
        {

            if ($new_value != $editprofile_email)
            {

                $headers = array('Content-Type: text/html; charset=UTF-8',
                    'From:  Talentedge <admission@talentedge.in>', 'Disposition-Notification-To: ' . $user_email . '\n');
                $subject = "Your email id has been modified at Talentedge";
                $body    = '<p>Dear ' . $userInfo->first_name . '<br><br>As requested, your email id at Talentedge has been changed to
            ' . $new_value . ' from ' . $editprofile_email . '. Please reach out to student relationship team if you think this wasn’t requested by you.
                       <br><br>Thanks,<br>Team TalentEdge</p>';

                $orderID = get_orderid_by_userid($user_id);
                // $_SESSION['ordenew'] = $orderID;


                $args = array(
                    'ID'         => $user_id,
                    'user_email' => $new_value
                );

                $resultId = wp_update_user($args);
                wp_mail($new_value, $subject, $body, $headers);
                if ($resultId)
                {

                    /* updating billing email */
                    update_user_meta($user_id, 'emailchange', 'yes');
                    update_user_meta($user_id, 'old_email', $editprofile_email);
                    update_user_meta($user_id, 'billing_email', $new_value);
                    foreach ($orderID as $value)
                    {
                        update_post_meta($value, '_billing_email', $new_value);
                    }
                }
            }
        }
    }
}

add_filter('acf/save_post', 'my_pre_save_post', 1, 1);

/* User Edit profile Code ends */

function atom_getfailed_orderstatus()
{

    $my_post = array(
        'post_status'    => 'wc-failed',
        'post_type'      => 'shop_order',
        'posts_per_page' => -1,
        'date_query'     => array(
            'after' => date('Y-m-d', strtotime('-3 days'))
        ),
        'meta_query'     => array(
            array(
                'key'   => '_payment_method',
                'value' => 'atom',
            )
        ),
    );

    $query = new WP_Query($my_post);
    if ($query->have_posts())
    {
        while ($query->have_posts()) : $query->the_post();
            $post_id = get_the_ID();

            $post_date   = get_the_date();
            $date        = new DateTime($post_date);
            $order_total = get_post_meta($post_id, $key         = '_order_total', true);

            $curl   = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://payment.atomtech.in/paynetz/vfts?merchantid=1195&merchanttxnid=" . $post_id . "&amt=" . $order_total . "&tdate=" . $date->format('Y-m-d') . "");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);

            $xml    = simplexml_load_string($result);
            $array  = json_encode($xml);
            $array1 = json_decode($array, true);
            foreach ($array1 as $atomdata)
            {
                if ($atomdata['VERIFIED'] == 'SUCCESS')
                {
                    $order          = new WC_Order($post_id);
                    $order->update_status('completed', 'Updated with API');
                    $updatedOrder[] = $post_id;

                    $fp = fopen('API_completed_payment_log_.txt', 'a');
                    fwrite($fp, "Payment completed Order: $post_id with status: completed, function.php(atom_getfailed_orderstatus).");
                    fclose($fp);
                }
                // if ($atomdata['VERIFIED'] == 'FAILED'){
                //   $order = new WC_Order($post_id);
                //     //echo "failed";
                //     $order->update_status('failed', 'Updated with API');
                //   $updatedOrder[] = $post_id;
                // }
            }


        endwhile;
    }
}

add_action('add_meta_boxes', 'add_product_metaboxes');

function add_product_metaboxes()
{
    add_meta_box('wpt_product_parent', 'Product Parent', 'wpt_product_parent', 'product', 'side', 'default');
}

function wpt_product_parent()
{
    global $post;

    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="prod_noncename" id="prod_noncename" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    // Get the location data if its already been entered
    $parent = get_post_meta($post->ID, 'product_parent', true);

    // Echo out the field
    echo '<label>Please select Parent Product</label><br>';

    $query_args  = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'post_status'    => 'publish',
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'   => 'product_parent',
                'value' => '',
                'type'  => '='
            ),
            array(
                'key'     => 'product_parent',
                'compare' => 'NOT EXISTS'
            )
        )
    );
    $posts_array = get_posts($query_args);
    echo '<select id="product_parent" name="product_parent">
	<option value="">--No Parent--</option>';
    foreach ($posts_array as $posts)
    {

        $batchCode = get_post_meta($posts->ID, 'batch_name', true);
        echo '<option value="' . $posts->ID . '"';
        echo ($parent == $posts->ID) ? ' selected ' : '';
        echo ' >' . $posts->post_title . '-' . $batchCode . '</option></li>';
    }
    echo '<select>';
    wp_reset_postdata();
}

// Save the Metabox Data

function wpt_save_product_meta($post_id, $post)
{
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (!wp_verify_nonce($_POST['prod_noncename'], plugin_basename(__FILE__)))
    {
        return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;

    if ($post->post_type != 'product' || $post->post_status == 'auto-draft' || $post->post_type == 'revision')
        return;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $key = 'product_parent';

    $value = $_POST['product_parent'];

    if (get_post_meta($post->ID, $key, true))
    { // If the custom field already has a value
        update_post_meta($post->ID, $key, $value);
    }
    else
    {
        add_post_meta($post->ID, $key, $value);
    }
    if (!$value)
        delete_post_meta($post->ID, $key); // Delete if blank
}

add_action('save_post', 'wpt_save_product_meta', 10, 2); // save the custom fields
function convert_installments_tostring($postId)
{
    $row              = '';
    $installmentArray = array();
    if (have_rows('installments', $postId)):
        while (have_rows('installments', $postId)): the_row();
            //$row = ;
            $inrPrice           = get_sub_field('inr_price');
            $usdPrice           = get_sub_field('usd_price');
            $instalDueDate      = get_sub_field('installment_due_date', false, false);
            $formatedDueDate    = date("Y-m-d", strtotime($instalDueDate));
            $installmentArray[] = array('inr_price' => $inrPrice, 'usd_price' => $usdPrice, 'due_date' => $formatedDueDate);
            $row++;
        endwhile;
    endif;

    $delimiter = array('|', ',');
    $finalStr  = multi_implode($delimiter, $installmentArray);


    return array('instalments_num' => $row, 'string' => $finalStr);
}

function showcourses_func($atts)
{
    $atts    = shortcode_atts(array(
        'ids' => '',
            ), $atts, 'showcourses');
    $proids  = explode(',', $atts['ids']);
    $content = '<div class="row text-center features-block c3">';
    foreach ($proids as $pro)
    {
        $product = get_post($pro);

        $image = get_post_meta($product->ID, 'course_image', true);

        $institute    = get_post_meta($product->ID, 'c_institute', true);
        $instituteObj = get_post($institute);

        $content .= '
		    <div class="col-sm-3">
                    <div class="Serbodcor text-white">
						<img src="' . wp_get_attachment_url($image) . '" alt="' . get_post_meta($product->ID, 'course_short_name', true) . '" class="img-responsive">
						<h4>' . get_post_meta($product->ID, 'course_short_name', true) . '</h4>
						<p>' . $instituteObj->post_title . '</p>
                    </div>

			</div>';
    }
    return $content .= ' </div>';
}

add_shortcode('showcourses', 'showcourses_func');
//remove_action( 'woocommerce_cart_calculate_fees');

add_action('woocommerce_calc_tax', 'overrideTax', 10, 2);

function overrideTax($taxes, $price, $rates='', $price_includes_tax='', $suppress_rounding='')
{
    // make filter magic happen here...
    //print_r($_REQUEST); exit;
    if($_REQUEST['add-to-cart']>0){
       $_SESSION['taxfreeid']=$_REQUEST['add-to-cart'];
   }
   if($_SESSION['taxfreeid']>0){
       //$_SESSION['taxfreeid']=$_REQUEST['add-to-cart'];
       $proId = $_SESSION['taxfreeid'];
       $tax_free         = get_post_meta($proId, 'tax_free', true);
   }else{
	$tax_free='No';
   }
//$proId='33775';

    //$tax_free=1;
    ($tax_free=='Yes')?  $taxes=array(): '';


    $country = '';
    $state   = '';
    global $wpdb, $woocommerce;

    $sql = "";

    if (($_REQUEST['wc-ajax'] == 'update_order_review' && $_REQUEST['post_data']) || is_user_logged_in())
    {

        $postdata = explode('&', $_REQUEST['post_data']);

        //echo $tax_free; die;
        //print_r($_REQUEST['post_data']);die;
        if (is_user_logged_in())
        {

            if ($_REQUEST['action'] == 'woocommerce_calc_line_taxes' && $_REQUEST['order_id'])
            {

                $base = WC_Tax::get_tax_location();

                $country = (isset($_REQUEST['country']) && $_REQUEST['country']) ? $_REQUEST['country'] : $base[0];
                $state   = (isset($_REQUEST['state']) && $_REQUEST['state']) ? $_REQUEST['state'] : $base[1];
                if ($country == 'IN')
                {

                    $orderId = $_REQUEST['order_id'];
                    $order   = new WC_Order($orderId);
                    $items   = $order->get_items();
                    //print_r($items);die;
                    foreach ($items as $item)
                    {
                        $ids = $item['product_id'];
                    }

                    if ($ids)
                    {
                        $user      = get_post_meta($orderId, '_customer_user', true);
                        if (!$user)
                            get_current_user_id();
                        //echo $user ;die;
                        $taxStatus = getTaxStatus($ids, $user, $order);

                        if ($taxStatus == 'stax')
                        {
                            $taxesr = $price * 15 / 100;
                        }
                        elseif ($taxStatus == 'cgst')
                        {
                            $taxesr = ($price * CGST / 100 ) + ($price * SGST / 100 );

							if(get_post_meta($_REQUEST,'_taxtype',true)){
									update_post_meta($_REQUEST['order_id'],'_taxtype',$taxStatus);
							}else{
									add_post_meta($_REQUEST['order_id'],'_taxtype',$taxStatus);
							}

							if(get_post_meta($_REQUEST['order_id'],'_tax1',true)){
								update_post_meta($_REQUEST['order_id'],'_tax1',CGST);
								update_post_meta($_REQUEST['order_id'],'_tax2',SGST);
							}else{
								add_post_meta($_REQUEST['order_id'],'_tax1',CGST);
								add_post_meta($_REQUEST['order_id'],'_tax2',SGST);
							}

                        }
                        else
                        {
                            $taxesr = $price * GST / 100;
							if(get_post_meta($_REQUEST,'_taxtype',true)){
									update_post_meta($_REQUEST['order_id'],'_taxtype',$taxStatus);
							}else{
									add_post_meta($_REQUEST['order_id'],'_taxtype',$taxStatus);
							}

							if(get_post_meta($_REQUEST['order_id'],'_tax1',true)){
								update_post_meta($_REQUEST['order_id'],'_tax1',GST);
								update_post_meta($_REQUEST['order_id'],'_tax2',0);
							}else{
								add_post_meta($_REQUEST['order_id'],'_tax1',GST);
								add_post_meta($_REQUEST['order_id'],'_tax2',0);
							}
                        }
                        foreach ($taxes as $key => $tx)
                        {
                            $taxes[$key] = $taxesr;
                        }
                        // Round to precision
                        if (!WC_Tax::$round_at_subtotal && !$suppress_rounding)
                        {
                            $taxes = array_map('round', $taxes); // Round to precision
                        }
                        return $taxes;
                    }
                }
            }
            else
            {
                $country = get_user_meta(get_current_user_id(), 'billing_country', true);
                if ($country == 'IN')
                {
                    $state = get_user_meta(get_current_user_id(), 'billing_state', true);
                    global $woocommerce;
                    $items = $woocommerce->cart->get_cart();

                    $ids = array();
                    foreach ($items as $item => $values)
                    {
                        $_product = $values['data']->post;
                        $ids      = $_product->ID;
                    }

                    if ($ids)
                    {
                        $taxStatus = getTaxStatus($ids, get_current_user_id());

                        if ($taxStatus == 'stax')
                        {
                            $taxesr = $price * 15 / 100;
                        }
                        elseif ($taxStatus == 'cgst')
                        {
                            $taxesr = ($price * CGST / 100 ) + ($price * SGST / 100 );
                        }
                        else
                        {
                            $taxesr = $price * GST / 100;
                        }
                        foreach ($taxes as $key => $tx)
                        {
                            $taxes[$key] = $taxesr;
                        }
                        // Round to precision
                        if (!WC_Tax::$round_at_subtotal && !$suppress_rounding)
                        {
                            $taxes = array_map('round', $taxes); // Round to precision
                        }
                        return $taxes;
                    }
                }
            }
        }
        else
        {
            //print_r($postdata);
            foreach ($postdata as $postd)
            {
                $keyval  = explode('=', $postd);
                if ($keyval[0] == 'billing_country')
                    $country = $keyval[1];
                if ($keyval[0] == 'billing_state')
                    $state   = $keyval[1];
            }
            //echo $state;die;

            if ($country == 'IN')
            {
                if ($state == BASECITY)
                {
                    $taxesr = ($price * CGST / 100 ) + ($price * SGST / 100 );
                }
                else
                {
                    $taxesr = $price * GST / 100;
                }
                foreach ($taxes as $key => $tx)
                {
                    $taxes[$key] = $taxesr;
                }
                // Round to precision
                if (!WC_Tax::$round_at_subtotal && !$suppress_rounding)
                {
                    $taxes = array_map('round', $taxes); // Round to precision
                }
                return $taxes;
            }
        }
    }
    return $taxes;
}

/*
  add_action('woocommerce_payment_complete', 'my_custom_checkout_field_looking');
  function my_custom_checkout_field_looking( $order_id ) {

  add_filter('woocommerce_email_enabled_WC_Email_Customer_Invoice' , 'wept_change_email_enabled', 1, 2);
  function wept_change_email_enabled( $enabled, $order ) {
  global $woocommerce;
  $enabled = true;
  return $enabled;
  }
  add_filter( 'woocommerce_email_recipient_customer_invoice', 'sv_conditional_email_recipient', 10, 2 );
  function sv_conditional_email_recipient( $recipient, $order ) {
  $usr=get_post_meta($order->id,'_customer_user',true);
  $user_info = get_userdata($usr);
  return $recipient = 'pankaj.jha@talentedge.in,karan@talentedge.in,'.$user_info->user_email;

  }

  $wc_emails = new WC_Emails( );
  $emails = $wc_emails->get_emails();
  $new_email = $emails[ 'WC_Email_Customer_Invoice' ];

  $new_email->trigger(  $order_id );

  }
 */

function getTaxStatus($product_id, $user_id, $ispastOrder = false)
{
    global $wpdb;
    $sql    = "SELECT wpsot.ID, wpsot.post_date,wpsot.post_status FROM te_woocommerce_order_items as wpp
							INNER JOIN te_woocommerce_order_itemmeta as wpm ON wpp.order_item_id=wpm.order_item_id
							INNER JOIN te_posts wpsot ON wpp.order_id=wpsot.ID
							INNER JOIN te_postmeta wppostmeta ON wpp.order_id=wppostmeta.post_id
							INNER JOIN te_users wpu ON wppostmeta.meta_value=wpu.ID
							WHERE wpm.meta_key='_product_id' AND wppostmeta.meta_key='_customer_user'
							and  wpu.ID='" . $user_id . "' and wpm.meta_value='" . $product_id . "'
							 and (wpsot.post_status='wc-completed' or wpsot.post_status='wc-processing')  order by post_date asc  ";
    // if($user_id==3){ echo $sql;}
    $orders = $wpdb->get_results($sql);
    if ($orders && count($orders) > 0)
    {
        $comp = 0;
        foreach ($orders as $order)
        {

            //if($order->post_status=='wc' ||  $order->post_status=='wc-cancelled'  ||  $order->post_status=='wc-cancelled'  ||  $order->post_status=='wc-cancelled') continue;
            if ($order->post_status == 'wc-completed' || $order->post_status == 'wc-processing')
            {

                //echo strtotime($orders->post_date) . '==' .  strtotime(GSTDATE);die;
                if (strtotime($order->post_date) <= strtotime(GSTDATE))
                {
                    return 'stax';
                }
                else
                {
                    $state = get_post_meta($order->ID, '_billing_state', true);
                    if ($state == BASECITY)
                    {
                        return 'cgst';
                    }
                    else
                    {
                        return 'igst';
                    }
                }
            }
            else
            {
                if ($comp == 1)
                    continue;
                $comp = 1;
                if (strtotime($order->post_date) <= strtotime(GSTDATE))
                {
                    $ret = 'stax';
                }
                else
                {
                    $state = get_post_meta($order->ID, '_billing_state', true);
                    if ($state == BASECITY)
                    {
                        $ret = 'cgst';
                    }
                    else
                    {
                        $ret = 'igst';
                    }
                }
            }
        }
        return $ret;
    }
    else
    {
        // if($user_id==3){


        if ($ispastOrder)
        {

            if (strtotime($ispastOrder->order_date) <= strtotime(GSTDATE))
            {
                return 'stax';
            }

            $state = get_post_meta($ispastOrder->id, '_billing_state', true);
            if (!$state)
                $state = get_user_meta($user_id, 'billing_state', true);
        }else
        {
            $state = get_user_meta($user_id, 'billing_state', true);
        }

        if ($state == BASECITY)
        {
            return 'cgst';
        }
        else
        {
            return 'igst';
        }
    }
}

/*
  add_filter( 'woocommerce_email_recipient_new_order', 'sv_conditional_email_recipient', 1000, 2 );

  function sv_conditional_email_recipient( $recipient, $order ) {
  $email=get_post_meta($order->id,'_billing_email',true);
  //$recipient .= ','.$email;
  $recipient .=($recipient)? ','.$email : $email;

  return $recipient;
  }
 */
add_filter('woocommerce_email_attachments', 'attach_terms_conditions_pdf_to_email', 10, 3);

function attach_terms_conditions_pdf_to_email($attachments, $id, $object)
{
    $uploads = wp_upload_dir();
//print_r($object);
    /* if(get_current_user_id()==3){
      print_r($object);
      echo $id;die;
      } */

    if ($id == 'customer_completed_order')
    {

        //if($object->has_status='pending') return $attachments;

        if (!get_post_meta($object->id, '_bewpi_invoice_number', true))
        {

            global $wpdb;
            $user_id = get_post_meta($object->id, '_customer_user', true);
            $items   = $object->get_items();
            foreach ($items as $item)
            {
                $product_id   = $item['product_id'];
                $product_name = $item['name'];
            }
            $institute = get_post_meta($product_id, 'c_institute', true);
            global $wpdb;
            $sql       = "SELECT  wpsot.ID FROM te_woocommerce_order_items as wpp
							INNER JOIN te_woocommerce_order_itemmeta as wpm ON wpp.order_item_id=wpm.order_item_id
							INNER JOIN te_posts wpsot ON wpp.order_id=wpsot.ID
							INNER JOIN te_postmeta wppostmeta ON wpp.order_id=wppostmeta.post_id
							INNER JOIN te_users wpu ON wppostmeta.meta_value=wpu.ID
							WHERE wpm.meta_key='_product_id' AND wppostmeta.meta_key='_customer_user'
							and  wpu.ID='" . $user_id . "' and wpm.meta_value='" . $product_id . "' and wpsot.post_status='wc-completed'
							 and wpsot.ID !='" . $object->id . "'  order by post_date asc limit 0,1 ";
            $row       = $wpdb->get_row($sql);
            if ($row && count($row) > 0)
            {
                $invoiceNO = get_post_meta($row->id, '_bewpi_invoice_number', true);
            }
            else
            {

                $invoice = new BEWPI_Invoice($object->id);
                $path    = $invoice->save("F");
                $to      = get_post_meta($object->id, '_billing_email', true);
                $nameUsr = get_post_meta($object->id, '_billing_first_name', true);

                $from = get_option('mail_from');
                $name = get_option('mail_from_name');

                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                // Additional headers
                $headers[] = 'To: ' . $nameUsr . '<' . $to . '>';
                $headers[] = 'From: Talentedge <admission@talentedge.in>';
               // $headers[] = 'Bcc: deepak.sharma@talentedge.in,pramod.singh@talentedge.in,eleazer.rohit@talentedge.in, tuli.sengupta@talentedge.in, deepak.yadav@talentedge.in, swapna.madiwala@talentedge.in, cbo.consumer@talentedge.in,swati.belekar@talentedge.in,website.payments@talentedge.in,karan.bhatia@talentedge.in,shilpi.sharma@talentedge.in,abha.saxena@talentedge.in,amit.arora@talentedge.in,payments.te@talentedge.in,sangeeta.tanwar@talentedge.in,duke.banerjee@talentedge.in';

                $instObj = get_post($institute);

                $subject = 'Successful Enrolment - Invoice for Order Number ' . $object->id;

                /* ob_start();
                  echo '<style>';
                  include('wp-content/plugins/woocommerce-pdf-invoices/includes/templates/invoices/simple/micro/style.css');
                  echo '</style>';
                  $current_order=$object;
                  $invneworder='yes';
                  include('wp-content/plugins/woocommerce-pdf-invoices/includes/templates/invoices/simple/micro/invoice.php');
                  $msg = ob_get_clean();
                 */

                $msg = '<img style="width:150px" src="' . get_option('woocommerce_email_header_image') . '" class="img-responsive pull-left" alt="">
<div class="clear:both"></div>
<br><br>
Hi ' . $nameUsr . ',<br>
Congratulations for enrolling in ' . $product_name . ' from ' . $instObj->post_title . '. We acknowledge your payment for the course.<br>
						Please find attached invoice for the course fees.  Reach back to us if you find any discrepancy in the invoice.<br><br>

						Each student at Talentedge is assigned a student relationship manager. One of our SRMs would reach out to you for more details about the classes, fees instalments at an appropriate time.

						<br><br>
				Thanks, <br>
				Team Talentedge <br>
				91- 8376000600 <br><br><br>
						';

                $mail_attachment = array($path);

                wp_mail($to, $subject, $msg, implode("\r\n", $headers), $mail_attachment);
            }
        }

        $attachments = [];
        if (!file_exists($uploads['basedir'] . '/receipts/' . $object->id . '.pdf'))
        {

            genrateReceipts($object, $uploads['basedir'] . '/receipts/' . $object->id . '.pdf');
        }
        $your_pdf_path = $uploads['basedir'] . '/receipts/' . $object->id . '.pdf';
        $attachments[] = $your_pdf_path;
    }

    if ($id == 'new_order')
    {

        $attachments = [];
        if (!file_exists($uploads['basedir'] . '/receipts/' . $object->id . '.pdf'))
        {

            genrateReceipts($object, $uploads['basedir'] . '/receipts/' . $object->id . '.pdf');
        }
        $your_pdf_path = $uploads['basedir'] . '/receipts/' . $object->id . '.pdf';
        $attachments[] = $your_pdf_path;
    }

    //crm_create_payments($object->id);
    //$fp = fopen('payment_log_.txt', 'a'); fwrite($fp, "crm_create_payments called"); fclose($fp);
    // print_r($attachments);die;
    return $attachments;
}

function genrateReceipts($order, $dest)
{
    set_time_limit(0);
    require_once BEWPI_LIB_DIR . 'mpdf/mpdf.php';

    $mpdf = new mPDF(
            '', // mode
            '', // format
            0, // default_font_size
            14, // default_font
            14, // margin_left
            14, // margin_right
            14, // margin_top
            0, // margin_bottom
            14, // margin_header
            6, // margin_footer
            'p'         // orientation
    );

    $mpdf->debug           = true;
    $mpdf->showImageErrors = true;

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->autoScriptToLang    = true;
    $mpdf->autoLangToFont      = true;
    $mpdf->setAutoTopMargin    = 'stretch';
    $mpdf->setAutoBottomMargin = 'stretch';
    $mpdf->autoMarginPadding   = 10;
    $mpdf->useOnlyCoreFonts    = false;
    $mpdf->useSubstitutions    = true;
    //pdf->SetWatermarkImage('http://www.yourdomain.com/images/logo.jpg', 1, '', array(160,10));
    //$mpdf->showWatermarkImage = true;
    ob_start();
    echo '<style>';
    include(str_replace('/themes/talentedge/', '', plugin_dir_path(__FILE__)) . '/plugins/woocommerce-pdf-invoices/includes/templates/invoices/simple/micro/repstyle.css');
    echo '</style>';
    $current_order = $order;
    ;
    $invneworder   = 'yes';
    include(str_replace('/themes/talentedge/', '', plugin_dir_path(__FILE__)) . '/plugins/woocommerce-pdf-invoices/includes/templates/invoices/simple/micro/receipt.php');
    $xml           = ob_get_clean();
    $mpdf->WriteHTML($xml);
    $mpdf->Output($dest, 'F');
}

add_action('wp_ajax_downloadrec', 'downloadRec');

function downloadRec()
{
    $id      = $_REQUEST['post'];
    $uploads = wp_upload_dir();
    header('Content-type: application / pdf');
    header('Content-Disposition: inline; filename="' . $id . '.pdf"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($id . '.pdf'));
    header('Accept-Ranges: bytes');
    @readfile($uploads['basedir'] . '/receipts/' . $id . '.pdf');
}

add_filter('manage_edit-shop_order_columns', 'custom_shop_order_column', 999, 1);

function custom_shop_order_column($columns)
{
    //add columns
    $columns['download-receipt'] = 'Download Receipt';

    return $columns;
}

add_action('manage_shop_order_posts_custom_column', 'custom_orders_list_column_content', 1000, 2);

function custom_orders_list_column_content($column, $order_id)
{
    $uploads = wp_upload_dir();
    if (file_exists($uploads['basedir'] . '/receipts/' . $order_id . '.pdf'))
    {
        $url = admin_url('admin-ajax.php?action=downloadrec&post=' . $order_id . '&nonce=' . wp_create_nonce('view'));
        switch ($column)
        {

            case 'download-receipt' :
                echo '<a href="' . $url . '">Download</a>';
                break;
        }
    }
}

function url_shortcode()
{
    return get_bloginfo('url');
}

add_shortcode('SITE_URL', 'url_shortcode');

add_action('woocommerce_checkout_order_processed', 'tax_save_post_callback', 9999, 1);
function tax_save_post_callback($post_ID)
{
     global $wpdb;
     $order = new WC_Order( $post_ID );

	 $_customer_user=get_post_meta($post_ID,'_customer_user',true);
	 $items = $order->get_items();
	 foreach ( $items as $item ) {
		 $product_id = $item['product_id'];
	 }


	 $billingCountry=get_post_meta($post_ID,'_billing_country',true);
	 if($billingCountry=='IN'){
		 $tax=  getTaxStatus($product_id ,$_customer_user );
		 if($tax!='stax'){

			if(get_post_meta($post_ID,'_tax1',true)){
					update_post_meta($post_ID,'_taxtype',$tax);
			}else{
					add_post_meta($post_ID,'_taxtype',$tax);
			}
			if($tax=='cgst'){
				if(get_post_meta($post_ID,'_tax1',true)){
					update_post_meta($post_ID,'_tax1',CGST);
					update_post_meta($post_ID,'_tax2',SGST);
				}else{
					add_post_meta($post_ID,'_tax1',CGST);
					add_post_meta($post_ID,'_tax2',SGST);
				}

			}else{

				if(get_post_meta($post_ID,'_tax1',true)){
					update_post_meta($post_ID,'_tax1',GST);
					update_post_meta($post_ID,'_tax2',0);
				}else{
					add_post_meta($post_ID,'_tax1',GST);
					add_post_meta($post_ID,'_tax2',0);
				}
			}
		 }
	 }
	$old=get_user_meta($_customer_user, 'first_name',true);
	$current=get_user_meta($_customer_user, 'billing_first_name',true);
	if($old!=$current){
		update_user_meta($_customer_user,'last_name',$current);
	}
	$old=get_user_meta($_customer_user, 'last_name',true);
	$current=get_user_meta($_customer_user, 'billing_last_name',true);
	if($old!=$current){
		update_user_meta($_customer_user,'last_name',$current);
	}
	$old=get_user_meta($_customer_user, 'phone_number',true);
	$current=get_user_meta($_customer_user, 'billing_phone',true);
	if($old!=$current){
		update_user_meta($_customer_user,'phone_number',$current);
	}

}

add_action( 'save_post_shop_order', 'action_save_post_shop_order', 10, 3 );

function action_save_post_shop_order(){

//    echo $order_id.'/'.$param2.'/'.$param3;
//     $order   = new WC_Order($order_id);
//     add_user_meta( $user_id, 'idfc_log',$product_id,true);
}


/*OTP Functionality For Forms*/
/*add_filter('gform_confirmation_1', 'custom_confirmation_message', 10, 4);   //Multi step Lets talk
add_filter('gform_confirmation_2', 'custom_confirmation_message', 10, 4);   //Institute Detail
add_filter('gform_confirmation_4', 'custom_confirmation_message', 10, 4);   //Call Back Enquiry
add_filter('gform_confirmation_5', 'custom_confirmation_message', 10, 4);   //Course Detail
add_filter('gform_confirmation_7', 'custom_confirmation_message', 10, 4);   //Landing Template
add_filter('gform_confirmation_9', 'custom_confirmation_message', 10, 4);   //Brouchure Download
add_filter('gform_confirmation_10', 'custom_confirmation_message', 10, 4);  //Course Detail mobile
add_filter('gform_confirmation_11', 'custom_confirmation_message', 10, 4);  //Category Landing Mobile
add_filter('gform_confirmation_15', 'custom_confirmation_message', 10, 4);  //Contact Form Learners
add_filter('gform_confirmation_16', 'custom_confirmation_message', 10, 4);  //Contact Form Corporate
add_filter('gform_confirmation_12', 'custom_confirmation_message', 10, 4);  //Landing Template mobile
add_filter('gform_confirmation_19', 'custom_confirmation_message', 10, 4);  //About Us Form
add_filter('gform_confirmation_20', 'custom_confirmation_message', 10, 4);  //Degree Courses Form
add_filter('gform_confirmation_22', 'custom_confirmation_message', 10, 4);  //Article Detail
add_filter('gform_confirmation_23', 'custom_confirmation_message', 10, 4);  //Article & Marketing Detail Bottom
add_filter('gform_confirmation_24', 'custom_confirmation_message', 10, 4);  //Article Detail Mobile
add_filter('gform_confirmation_25', 'custom_confirmation_message', 10, 4);  //Media
add_filter('gform_confirmation_26', 'custom_confirmation_message', 10, 4);  //Franchise
function custom_confirmation_message( $confirmation, $form, $entry, $ajax ) {
    $form_id = $form['id'];
    $entryID = $entry['id'];
    $otp = substr(str_shuffle("0123456789"), 0, 4);


    if($form_id == 1){
        $otp_username = $_POST["input_3"];
        $otp_mobile = $_POST["input_1"];
        $otp_field = 17;
        $field_number = 16;
    }

    if($form_id == 2){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 14;
        $field_number = 13;
    }

    if($form_id == 4){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 14;
        $field_number = 13;
    }

    if($form_id == 5){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 18;
        $field_number = 17;
    }

    if($form_id == 7){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 20;
        $field_number = 19;
    }

    if($form_id == 9){
        $otp_username = $_POST["input_2"];
        $otp_mobile = $_POST["input_4"];
        $otp_field = 11;
        $field_number = 10;
    }

    if($form_id == 10){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 17;
        $field_number = 16;
    }
    if($form_id == 11){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 14;
        $field_number = 13;
    }

    if($form_id == 12){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 20;
        $field_number = 19;
    }

    if($form_id == 15){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_6"];
        $otp_field = 14;
        $field_number = 13;
    }

    if($form_id == 16){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_6"];
        $otp_field = 14;
        $field_number = 13;
    }

    if($form_id == 19){
        $otp_username = $_POST["input_1"];
       $otp_mobile = $_POST["input_4"];
        $otp_field = 12;
         $field_number = 11;
    }
     if($form_id == 20){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_4"];
        $otp_field = 11;
        $field_number = 10;
    }
     if($form_id == 23){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 20;
        $field_number = 19;
    }

    if($form_id == 22){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 21;
        $field_number = 20;
    }

     if($form_id == 24){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 20;
        $field_number = 19;
    }

    if($form_id == 25){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_4"];
        $otp_field = 12;
        $field_number = 11;
    }
    if($form_id == 26){
        $otp_username = $_POST["input_1"];
        $otp_mobile = $_POST["input_3"];
        $otp_field = 11;
        $field_number = 10;
    }



    $redirect_url = home_url()."/thankyou/?formid=$form_id&uname=".urlencode($otp_username)."&cid=$otp_mobile&leadid=$entryID";
    $close_url =  get_permalink();
    send_otp_curl($otp,$otp_mobile,$otp_username);

    /*Update Lead otp*/
     /*global $wpdb;
    $result = $wpdb->query("UPDATE  te_rg_lead_detail SET value='".$otp."' WHERE form_id=$form_id AND field_number=$otp_field AND lead_id='".$entryID."'");
    /*Update lead otp ends here //jQuery.magnificPopup.close();*/
    /*$form_about = "echo do_shortcode('[gravityform id=6 title=false ajax=true ]')";
    $popuphtml = '<div id="test-modal" class="white-popup" style="postion:relative;"><!--<i style="cursor: pointer;position: absolute;right: -10px;top: -13px;border-radius: 50%;height: 25px;width: 25px;background: #ff0000;color: #fff;text-align: center;line-height: 24px;font-weight: normal;font-size: 16px;" class="fa fa-close userpro-button" id="close" onclick="return myFunction();"></i>--><h3 class="modal-title">Verify Mobile Number</h3><p><h5> '.ucfirst($otp_username).', Please enter the 4 Digit code sent to your mobile to verify your details.</h5><input type="text" class="form-control" id="otp_val"><p class="text-danger" style="display:none;">Please Enter Correct OTP</p><br><input type="submit" name="submit" value="Cancel" class="userpro-button" id="close" onclick="return myFunction();"><input type="submit" name="submit" value="Submit" class="userpro-button" id="ajax-otp-form"></p></div>';
    $confirmation = "<script>jQuery.magnificPopup.open({
    items: {
        src: '".$popuphtml."',
        type:'inline'
    },
    modal: true
});function myFunction(){window.location.replace('".$redirect_url."');}$('#ajax-otp-form').click(function(e){
    if(jQuery('#otp_val').val()=='".$otp."'){
        jQuery('.text-danger').hide();
        jQuery.ajax({
             data: {action: 'otp_form','id': '".$entryID."','form_id':'".$form_id."','field_number':'".$field_number."'},
             type: 'post',
             url: ajaxurl,
             //dataType:'json',
             success: function(data) {
                  window.location.replace('".$redirect_url."');
                //alert('".$form['id']."');
            }
        });
    }
    else{
        jQuery('.text-danger').show();
    }


})</script>";

    return $confirmation;
}


add_action('wp_ajax_otp_form','otp_form');
add_action('wp_ajax_nopriv_otp_form','otp_form');
function otp_form(){
  //echo "<pre>";print_r($_REQUEST);wp_die();
  $form_id = $_REQUEST['form_id'];
  $field_number = $_REQUEST['field_number'];
  $lead_id = $_REQUEST['id'];
  global $wpdb;
  $result = $wpdb->query("UPDATE te_rg_lead_detail SET value='Verified' WHERE form_id=$form_id AND field_number=$field_number AND lead_id='".$lead_id."'");
  echo "1";
}

function send_otp_curl($otp,$mobileno,$otp_username){
    $smsMessage = "$otp_username, your 4 digit code to enter on Talentedge Enquiry Form is $otp";
    $url="http://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=358078&username=9699921992&password=dgwtg&To=".$mobileno."&Text=".urlencode($smsMessage)."&time=&senderid=testSenderID" ;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
    $output = curl_exec($ch);
    curl_close($ch);
}*/

add_action('wp_ajax_genrate_receipt', 'GenrateReceipt');

function GenrateReceipt()
{
    //global $object;
    //echo 'abcd';print_r($object); die;

    $id      = $_REQUEST['post'];
    $object = wc_get_order( $id );
    $uploads = wp_upload_dir();
    //print_r($order);  die;
    $attachments = [];
    genrateReceipts($object, $uploads['basedir'] . '/receipts/' . $object->id . '.pdf');

    $your_pdf_path = $uploads['basedir'] . '/receipts/' . $object->id . '.pdf';
    $attachments[] = $your_pdf_path;


    header('Content-type: application / pdf');
    header('Content-Disposition: inline; filename="' . $object->id . '.pdf"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($object->id . '.pdf'));
    header('Accept-Ranges: bytes');
    @readfile($uploads['basedir'] . '/receipts/' . $object->id . '.pdf');

    return $$attachments;
}

function wpb_adding_scripts() {
wp_register_script('my_amazing_script', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'),'1.1', true);
wp_enqueue_script('my_amazing_script');
}

//add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );

function namespace_theme_stylesheets() {
    wp_enqueue_style( 'admission-pop-up',  get_template_directory_uri() .'/css/popup.css?date=14122017', array(), null, 'all' );

}
//if ( is_account_page() ) {
add_action( 'wp_enqueue_scripts', 'namespace_theme_stylesheets' );
//}
add_filter('gform_confirmation_14', 'on_submit_click', 10, 4);
function on_submit_click($confirmation, $form, $entry, $ajax){
 $confirmation= '<script>dataLayer.push({
         event: "leadFormSubmit2"
  });</script>';
return $confirmation;
}
function gp_remove_cpt_slug( $post_link, $post, $leavename ) {
if ( 'institute' != $post->post_type || 'publish' != $post->post_status ) {
return $post_link;
}
$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
return $post_link;
}
add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 3 );
function gp_add_cpt_post_names_to_main_query( $query ) {
// if this is not the main query.
if ( ! $query->is_main_query() ) {
return;
} // if this query doesn't match our very specific rewrite rule.
if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
return;
} // if we're not querying based on the post name.
if ( empty( $query->query['name'] ) ) {
return;
} // Add CPT to the list of post types WP will include when it queries based on the post name.
$query->set( 'post_type', array( 'post', 'page', 'institute' ) );
}
add_action( 'pre_get_posts', 'gp_add_cpt_post_names_to_main_query' );
function wpb_elsa_scripts() {
wp_register_script('elsa_countdown', get_template_directory_uri() . '/js/countdown.js?date=03012018', array('jquery'),'1.1', true);
wp_enqueue_script('elsa_countdown');
}
add_action( 'wp_enqueue_scripts', 'wpb_elsa_scripts' );
function elsa_lp_stylesheets() {
	if ( is_page( 'elsa-registration' ) || is_page( 'thank-you-elsa' )) {
    wp_enqueue_style( 'elsa_lp_page',  get_template_directory_uri() .'/css/elsa-lp-style.css?date=09012018', array(), null, 'all' );
   }
}

add_action( 'wp_enqueue_scripts', 'elsa_lp_stylesheets' );
//exit();
function elsa_font_stylesheets() {
	if ( is_page( 'elsa-registration' )) {
    wp_enqueue_style( 'elsa_font_awesome',  get_template_directory_uri() .'/css/font-awesome.min.css', array(), null, 'all' );
   }
}

add_action( 'wp_enqueue_scripts', 'elsa_font_stylesheets' );
// Delete Function

function wpb_remove_schedule_delete() {
    remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}
add_action( 'init', 'wpb_remove_schedule_delete' );


  add_action( 'admin_head-edit.php', 'hide_delete_css_wpse_92155' );
  add_filter( 'post_row_actions', 'hide_row_action_wpse_92155', 10, 2 );
  add_filter( 'page_row_actions', 'hide_row_action_wpse_92155', 10, 2 );

  function hide_delete_css_wpse_92155()
  {
      if( isset( $_REQUEST['post_status'] ) && 'trash' == $_REQUEST['post_status'] )
      {
          echo "<style>
              .alignleft.actions:first-child, #delete_all {
                  display: none;
              }
              </style>";
      }
  }

  function hide_row_action_wpse_92155( $actions, $post )
  {
      if( isset( $_REQUEST['post_status'] ) && 'trash' == $_REQUEST['post_status'] )
          unset( $actions['delete'] );
      return $actions;
  }
  add_action('admin_head', 'hide_category_buttons');

  function hide_category_buttons() {

      echo '<style>
        .edit-tags-php tr:hover .row-actions .delete, .edit-tag-actions #delete-link, .row-actions .permanent_delete {
            display: none;
        }

      </style>';
  }

// Settlement Cron
function isa_add_cron_recurrence_interval( $schedules ) {

    $schedules['oneday'] = array(
            'interval'  => 86400,
            //'interval'  => 1000,
            'display'   => __( 'Every day', 'textdomain' )
    );
    $schedules['once_week'] = array(
            'interval'  => 86400*7,
            'display'   => __( 'Every Week', 'textdomain' )
    );
    $schedules['once_month'] = array(
            'interval'  => 86400*30,
            'display'   => __( 'Every Month', 'textdomain' )
    );

    return $schedules;
}
add_filter( 'cron_schedules', 'isa_add_cron_recurrence_interval' );


if (! wp_next_scheduled ( 'settledetail_event' )) {
	wp_schedule_event(time()+1000, 'oneday', 'settledetail_event');
}
add_action('settledetail_event', 'settledetail_everyday');

function settledetail_everyday() {
  // Merchant key here as provided by Payu
  $key = "355yxa"; //WhmK3z
  $salt = "2b5lchnL";
  $command = "get_settlement_details";
  //$var1 = "2017-12-06"; // txn date (YYYY-MM-DD)
  $date = date('Y-m-d');
  $var1 = date('Y-m-d', strtotime($date .' -1 day'));

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
  $orderslist = $decoded_data->Txn_details;
  foreach($orderslist as $orderdata){
      $insertdata = json_decode(json_encode($orderdata), True);
      $insertdata = array("payment_method" => "payu") + $insertdata;
      $orderid = $wpdb->get_var( "SELECT post_id FROM `te_postmeta` WHERE meta_key LIKE '%order_txnid%' AND meta_value = '".$insertdata['txnid']."'");

      if($orderid != null || $orderid != ''){
        $insertdata = array("orderid" => $orderid) + $insertdata;

        $wpdb->insert(
        	'te_settled_orders',
        	$insertdata
        );
      }
  }
}

if (! wp_next_scheduled ( 'rr_txn_wise_event' )) {
	wp_schedule_event(time()+1000, 'oneday', 'rr_txn_wise_event');
}
add_action('rr_txn_wise_event', 'do_rr_txn_wise_event');

function do_rr_txn_wise_event() {
	// do something every hour
  global $wpdb;
  $date = date('Y-m-d');
  $var1 = date('Y-m-d', strtotime($date .' -1 day'));
  $settledata = $wpdb->get_results( "SELECT * FROM te_settled_orders WHERE created LIKE '%".$date."%'" );
  if(empty($settledata)){
    return '';
  }
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
      $inst_id = get_post_meta($productid, 'c_institute',true);
      $row['InstituteName'] = get_the_title($inst_id);
      $row['BatchId'] = get_post_meta($productid, 'batch_name',true);
      $row['Payment Type'] = get_post_meta($orderid, 'payment_type',true);
      $lead_data = get_gforminfo_byemail(get_post_meta($orderid, '_billing_email',true));
      $row['Lead Date'] = $lead_data['date'];
      $row['Is Settled'] = 'Yes';
      $row['Request Date'] = $set_data['requestdate'];
      $row['Merchant UTR'] = $set_data['mer_utr'];
      $row['Txn ID'] = $set_data['txnid'];
      $row['Net Amount'] = $set_data['mer_net_amount'];
      $row['Service Fee'] = $set_data['mer_service_fee'];
      $row['Settlement Date'] =$var1;
      array_push($table,$row);
      unset($row);
  }
//  print_r($table);
  $fp = fopen(ABSPATH.'Settled_Order_'.$var1.'.csv', 'w');
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
            'Request Date',
            'Merchant UTR',
            'Txn ID',
            'Net Amount',
            'Service Fee',
            'Settlement Date'
        ));
    foreach ($table as $rows) {
        $csvdata = $rows;
        fputcsv($fp, $csvdata);
    }

    fclose($fp);
  $attachments = array( ABSPATH.'Settled_Order_'.$var1.'.csv' );
  $headers = 'From: Talentedge <admission@talentedge.in>' . "\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message = '<p>Hi All,</p><p>Please find in here attached, the website orders which were settled on '.$var1.'</p>';
  //wp_mail( 'pritam.dutta@talentedge.in, sumit.bhalla@talentedge.in, swati.belekar@talentedge.in, swapna.madiwala@talentedge.in, balaji.thotadri@talentedge.in, ajay.kumar@talentedge.in, ashwani.sharma@talentedge.in, ashis.mohanty@talentedge.in', 'Settled Order', $message, $headers, $attachments );
  //wp_mail( 'varunyadav04@gmail.com', 'RR_txn_wise', 'message', $headers, $attachments );
}


if (! wp_next_scheduled ( 'settlement_report_event' )) {
	wp_schedule_event(time(), 'oneday', 'settlement_report_event');
}
add_action('settlement_report_event', 'do_settlement_report_event');

function do_settlement_report_event() {
	// do something every hour
  global $wpdb;
  $date = date('Y-m-d');
  $var1 = date('Y-m-d', strtotime($date .' -1 day'));
  $settledata = $wpdb->get_results( "SELECT * FROM te_settled_orders WHERE created LIKE '%".$date."%'" );
  if(empty($settledata)){
    return '';
  }
$table = array();
  foreach ($settledata as $key => $value) {
       $set_data = json_decode(json_encode($value), True);
      $row = array();
      $orderid = $set_data['orderid'];
      $order = wc_get_order($orderid);
      $row['Order id'] = $orderid;
      $row['Invoice No'] = get_post_meta($orderid, '_bewpi_formatted_invoice_number',true);
      $row['Txn ID'] = $set_data['txnid'];
      $row['Txn Date'] = $set_data['txndate'];
      $row['Amount'] = $set_data['amount'];
      $row['Request ID'] = $set_data['requestid'];
      $row['Request Date'] = $set_data['requestdate'];
      $row['UTR'] = $set_data['mer_utr'];
      $row['Service Fee'] = $set_data['mer_service_fee'];
      $row['Total tax'] = $set_data['mer_service_tax'];
      $row['Net Amount'] = $set_data['mer_net_amount'];
      $row['Bank Name'] = $set_data['bank_name'];
      $row['Issuing Bank'] = $set_data['issuing_bank'];
      $row['CGST'] = $set_data['cgst'];
      $row['IGST'] = $set_data['igst'];
      $row['SGST'] = $set_data['sgst'];
      array_push($table,$row);
      unset($row);
  }
//  print_r($table);
  $fp = fopen(ABSPATH.'PayU_Settlement_'.$var1.'.csv', 'w');
  fputcsv($fp, array(
            'Order id',
            'Invoice No',
            'Txn ID',
            'Txn Date',
            'Amount',
            'Request ID',
            'Request Date',
            'UTR',
            'Service Fee',
            'Total tax',
            'Net Amount',
            'Bank Name',
            'Issuing Bank',
            'CGST',
            'IGST',
            'SGST'
        ));
    foreach ($table as $rows) {
        $csvdata = $rows;
        fputcsv($fp, $csvdata);
    }

    fclose($fp);
  $attachments = array( ABSPATH.'PayU_Settlement_'.$var1.'.csv' );
  $headers = 'From: Talentedge <admission@talentedge.in>' . "\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message = '<p>Hi All,</p><p>Please find in here attached, settlement report generated by PayU for '.$var1.'</p>';
  //wp_mail( 'pritam.dutta@talentedge.in, ashwani.sharma@talentedge.in, ashis.mohanty@talentedge.in', 'PayU Settlement', $message, $headers, $attachments );
  //wp_mail( 'varunyadav04@gmail.com', 'settlement_report', 'message', $headers, $attachments );
}

if ( !wp_next_scheduled ( 'rr_txn_weekly_event' )) {
	wp_schedule_event(time(), 'once_week', 'rr_txn_weekly_event');
}
add_action('rr_txn_weekly_event', 'do_rr_txn_weekly_event');

function do_rr_txn_weekly_event() {
	// do something every hour
  global $wpdb;

  $args = array(
        // WC orders post type
        'post_type'   => 'shop_order',
        'post_status' => 'wc-completed',
        'numberposts' => -1,
        'date_query' => array(
            array(
                'after' => date("d-m-Y", strtotime("last week monday")),
                'before' => date("d-m-Y", strtotime("last week sunday"))
            )
        )
    );
    // Get all customer orders
    $customer_orders = get_posts( $args );
//  $var1 = date('Y-m-d', strtotime($date .' -1 day'));
  //$settledata = $wpdb->get_results( "SELECT * FROM te_settled_orders WHERE (date(created) >= '".$start_date."' AND date(created) <= '".$end_date."' )" );

  if(empty($customer_orders)){
    return '';
  }
$table = array();
  foreach ($customer_orders as $customer_order) {
       //$set_data = json_decode(json_encode($value), True);
      $row = array();
      $orderid = $customer_order->ID;
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
      $inst_id = get_post_meta($productid, 'c_institute',true);
      $row['InstituteName'] = get_the_title($inst_id);
      $row['BatchId'] = get_post_meta($productid, 'batch_name',true);
      $row['Payment Type'] = get_post_meta($orderid, 'payment_type',true);
      $lead_data = get_gforminfo_byemail(get_post_meta($orderid, '_billing_email',true));
      $row['Lead Date'] = $lead_data['date'];
      $settledata = $wpdb->get_row( "SELECT requestdate, mer_utr, txnid, mer_net_amount, mer_service_fee FROM te_settled_orders WHERE orderid = '".$orderid."'", ARRAY_A  );
      if(!empty($settledata)){
        $row['Is Settled'] = 'Yes';
        $row['Settlement Date'] = $settledata['requestdate'];
        $row['Merchant UTR'] = $settledata['mer_utr'];
        $row['Txn ID'] = $settledata['txnid'];
        $row['Net Amount'] = $settledata['mer_net_amount'];
        $row['Service Fee'] = $settledata['mer_service_fee'];
      }else{
        $row['Is Settled'] = 'No';
        $row['Settlement Date'] = '';
        $row['Merchant UTR'] = '';
        $row['Txn ID'] = '';
        $row['Net Amount'] = '';
        $row['Service Fee'] = '';

      }

      array_push($table,$row);
      unset($row);
  }
//  print_r($table);
  $fp = fopen(ABSPATH.'RR_txn_wise_weekly.csv', 'w');
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
  $attachments = array( ABSPATH.'RR_txn_wise_weekly.csv' );
  $headers = 'From: Ashis <ashis.mohanty@talentedge.in>' . "\r\n";
  //wp_mail( 'varunyadav04@gmail.com, ashwani.sharma@talentedge.in, ashis.mohanty@talentedge.in', 'RR_txn_wise', 'message', $headers, $attachments );
  //wp_mail( 'varunyadav04@gmail.com', 'RR_txn_wise', 'message', $headers, $attachments );
}


if ( !wp_next_scheduled ( 'rr_txn_monthly_event' )) {
	wp_schedule_event(time(), 'once_month', 'rr_txn_monthly_event');
}
add_action('rr_txn_monthly_event', 'do_rr_txn_monthly_event');

function do_rr_txn_monthly_event() {
	// do something every hour
  global $wpdb;

  $args = array(
        // WC orders post type
        'post_type'   => 'shop_order',
        'post_status' => 'wc-completed',
        'numberposts' => -1,
        'date_query' => array(
            array(
                'after' => date("d-m-Y", strtotime("first day of last month")),
                'before' => date("d-m-Y", strtotime("last day of last month"))
            )
        )
    );

    // Get all customer orders
    $customer_orders = get_posts( $args );
//  $var1 = date('Y-m-d', strtotime($date .' -1 day'));
  //$settledata = $wpdb->get_results( "SELECT * FROM te_settled_orders WHERE (date(created) >= '".$start_date."' AND date(created) <= '".$end_date."' )" );

  if(empty($customer_orders)){
    return '';
  }
$table = array();
  foreach ($customer_orders as $customer_order) {
       //$set_data = json_decode(json_encode($value), True);
      $row = array();
      $orderid = $customer_order->ID;
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
      $inst_id = get_post_meta($productid, 'c_institute',true);
      $row['InstituteName'] = get_the_title($inst_id);
      $row['BatchId'] = get_post_meta($productid, 'batch_name',true);
      $row['Payment Type'] = get_post_meta($orderid, 'payment_type',true);
      $lead_data = get_gforminfo_byemail(get_post_meta($orderid, '_billing_email',true));
      $row['Lead Date'] = $lead_data['date'];
      $settledata = $wpdb->get_row( "SELECT requestdate, mer_utr, txnid, mer_net_amount, mer_service_fee FROM te_settled_orders WHERE orderid = '".$orderid."'", ARRAY_A  );
      if(!empty($settledata)){
        $row['Is Settled'] = 'Yes';
        $row['Settlement Date'] = $settledata['requestdate'];
        $row['Merchant UTR'] = $settledata['mer_utr'];
        $row['Txn ID'] = $settledata['txnid'];
        $row['Net Amount'] = $settledata['mer_net_amount'];
        $row['Service Fee'] = $settledata['mer_service_fee'];
      }else{
        $row['Is Settled'] = 'No';
        $row['Settlement Date'] = '';
        $row['Merchant UTR'] = '';
        $row['Txn ID'] = '';
        $row['Net Amount'] = '';
        $row['Service Fee'] = '';

      }

      array_push($table,$row);
      unset($row);
  }
//  print_r($table);
  $fp = fopen(ABSPATH.'RR_txn_wise_monthly.csv', 'w');
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
  $attachments = array( ABSPATH.'RR_txn_wise_monthly.csv' );
  $headers = 'From: Ashis <ashis.mohanty@talentedge.in>' . "\r\n";
  wp_mail( 'varunyadav04@gmail.com, ashwani.sharma@talentedge.in, ashis.mohanty@talentedge.in', 'RR_txn_wise_monthly', 'message', $headers, $attachments );
  //wp_mail( 'varunyadav04@gmail.com', 'RR_txn_wise', 'message', $headers, $attachments );
}
function enter_jet_code(){
	$jet_code = $_POST['jet_code'];
	$user_emailid = $_POST['user_emailid'];
	global $wpdb;
	$jet_code_exist = $wpdb->get_results( "SELECT * FROM te_jetprev_users WHERE user_emailid ='".$user_emailid."' AND jet_code = '".$jet_code."'" );

	$totalresult  = sizeof($jet_code_exist);
	if($totalresult>=1){
		echo 0;die;
	}else{
		$wpdb->insert(
			'te_jetprev_users',
			array(
				'jet_code' => $jet_code,
				'user_emailid' => $user_emailid
			),
			array(
				'%s',
				'%s'
			)
		);
		echo 1;die;
	}
	//$mydata = $wpdb->get_row( "SELECT * FROM te_jetprev_users WHERE user_emailid = $user_emailid" );
	//print_r($mydata);die();
}
add_action('wp_ajax_enter_jet_code', 'enter_jet_code', 10);
add_action('wp_ajax_nopriv_enter_jet_code', 'enter_jet_code', 10);

function get_all_ordersby_pname2($prod_id, $userId='')
{
    global $wpdb;
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => wc_get_order_types(),
        'post_status' => array_keys( wc_get_order_statuses() ),
    ) );
    $allorders = array();
    foreach($customer_orders as $orderdata){
      $tempdata = array();
      $orderid = $orderdata->ID;
      $order = wc_get_order( $orderid );
      $items = $order->get_items();
      foreach($items as $item){
        //return $item['product_id'].'-'.$prod_id;die();
        if($item['product_id'] == $prod_id){
          $tempdata['order_id'] = $orderdata->ID;
           $tempdata['post_date'] = $orderdata->post_date;
           $tempdata['post_status'] = $orderdata->post_status;
           $tempdata['billing_email'] = get_post_meta($orderid, '_billing_email', true);
           $tempdata['payment_type'] = get_post_meta($orderid, 'payment_type', true);
           $tempdata['customer_user'] = $userId;
           $tempdata['order_total'] = get_post_meta($orderid, '_order_total', true);
           $tempdata['order_tax'] = get_post_meta($orderid, '_order_tax', true);
           $tempdata['order_currency'] = get_post_meta($orderid, '_order_currency', true);
           $tempdata['coursetype'] = get_post_meta($orderid, 'coursetype', true);
        }
      }
      if(!empty($tempdata)){
        array_push( $allorders, $tempdata );
      }
      unset($tempdata);
    }

    return $allorders;
}
function orderDetail_file(){


	$start_date = '2018-01-16';
	$end_date = '2018-01-31';
	global $wpdb;

//$post_status = implode("','", array('wc-processing', 'wc-completed') );
$post_status = 'wc-completed';

$result = $wpdb->get_results( "SELECT * FROM $wpdb->posts
            WHERE post_type = 'shop_order'
            AND post_status IN ('{$post_status}')
            AND post_date BETWEEN '{$start_date}  00:00:00' AND '{$end_date} 23:59:59'
        ");

	$table = array();
	$row = array();
	$rowcount = 0;
	$checkorderids = array();
	foreach($result as $orderdata){
		$order_id = $orderdata->ID;
		$order = wc_get_order( $order_id );



		foreach ( $order->get_items() as $item ) {
			$productId = $item['product_id'];
		}
		$email = get_post_meta($order_id,'_billing_email',true);
		$custmorId = get_post_meta($order_id,'_customer_user',true);
		$batch_name = get_post_meta($productId,'batch_name',true);
		$order_total = get_post_meta($order_id,'_order_total',true);
		$paid_date = get_post_meta($order_id,'_completed_date',true);


		/*$row[$rowcount]['date'] = $paid_date;
		$row[$rowcount]['total'] = $order_total;
		$row[$rowcount]['email'] = $email;
		$row[$rowcount]['batch'] = $batch_name;*/


		$customer_orders = get_posts( array(
			'meta_key'    => '_customer_user',
			'meta_value'  => $custmorId,
			'post_type'   => 'shop_order',
			'post_status' => 'wc-completed',
			'numberposts' => -1,
			'orderby' => 'id',
			'order'  => 'ASC',
		));
		$customerOrderIds = array($order_id);
		$payment_order = 1;
		foreach($customer_orders as $otherorder){
			$orderid = $otherorder->ID;
			if(!in_array($orderid,$checkorderids)){
				$order_check = wc_get_order( $orderid );
				foreach ( $order_check->get_items() as $checkItem ) {
					$otherProductId = $checkItem['product_id'];
				}
				if($otherProductId === $productId){
					$email = get_post_meta($orderid,'_billing_email',true);
					$custmorId = get_post_meta($orderid,'_customer_user',true);
					$batch_name = get_post_meta($productId,'batch_name',true);
					$order_total = get_post_meta($orderid,'_order_total',true);
					$paid_date = get_post_meta($orderid,'_completed_date',true);
					array_push($checkorderids, $orderid);
					$row[$rowcount]['orderid'] = $orderid;
					$row[$rowcount]['productid'] = $productId;
					$row[$rowcount]['date'] = $paid_date;
					$row[$rowcount]['total'] = $order_total;
					$row[$rowcount]['email'] = $email;
					$row[$rowcount]['batch'] = $batch_name;
					$row[$rowcount]['payment_order'] = $payment_order;
					/*echo '---------------------<br>';
					echo " product id : $productId";
					echo " date : $paid_date";
					echo " total : $order_total";
					echo " email : $email";
					echo " Batch : $batch_name";
					echo " Order : $payment_order";
					echo " row : $rowcount";*/
					$payment_order++;
					$rowcount++;
				}
			}
		}
		//echo '<br>***********************************<br>';

	}
	/*echo '<pre>';
	print_r($row);
	echo '</pre>'; */
	 header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=order-report.csv');
        ob_end_clean();

  $fh = @fopen('php://output', 'w' );
  fputcsv($fh, array(
            'Order id',
            'product id',
            'date',
            'total',
            'Email',
            'batch',
            'payment_order'
        ));
//$headerDisplayed = true;
foreach ( $row as $data ) {
    fputcsv($fh, $data);
}
// Close the file
fclose($fh);
// Make sure nothing else is sent, our file is done
exit(0);
}
add_shortcode('order_detail_file','orderDetail_file');
// Register Custom Post Type
function custom_posttype_news() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'News', 'text_domain' ),
		'name_admin_bar'        => __( 'News', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'news',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'News', 'text_domain' ),
		'description'           => __( 'Media News', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		//'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
	//	'capability_type'       => 'post',
		'capability_type' => array('news','news'),
        	'capabilities' => array(
        'edit_post' => 'edit_news',
        'edit_posts' => 'edit_news',
        'edit_others_posts' => 'edit_other_news',
        'publish_posts' => 'publish_news',
        'read_post' => 'read_news',
        'read_private_posts' => 'read_private_news',
        'delete_post' => 'delete_news'
    )
    // as pointed out by iEmanuele, adding map_meta_cap will map the meta correctly
//    'map_meta_cap' => true
	);
	register_post_type( 'news', $args );

}
//add_action( 'init', 'custom_posttype_news', 0 );


add_action('wp_ajax_nopriv_enter_jet_code', 'enter_jet_code', 10);
function course_dynamic_gfrom_func(){
//echo base64_encode($_GET['gform']); die();
  if(isset($_GET['gform']) && $_GET['gform'] != ''){
    $formId = base64_decode($_GET['gform']);
    ob_start();
    ?>
    <div id="thankapplicationform">
      <?php gravity_form($formId, false, false, false, '', false, ''); ?>
    </div>
    <div class="gform-popup" style="display:none;">
      <h2>Do you want to continue your form progress ?</h2>
      <button class="continue btn" onclick="fillGformData()">Yes, Continue</button>
      <button class="reset btn" onclick="resetGformData()">No, Reset</button>
    </div>
    <script>
      if(localStorage.gformId){
        setTimeout(function(){
          jQuery('.gform-popup').show();
        },5000);
      }
    </script>
    <?php
    return ob_get_clean();
  }else{
    return 'Not a valid link';
  }
}
add_shortcode('course_dynamic_gfrom','course_dynamic_gfrom_func');

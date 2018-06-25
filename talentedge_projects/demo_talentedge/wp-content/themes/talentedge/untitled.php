<?php
/**
 * Main file
 */

/**
 * Initialize all the things. 
 */
require get_template_directory() . '/inc/init.php';

wp_enqueue_script('customprice', get_template_directory_uri() . '/js/customprice.js', array('jquery'));
wp_localize_script('customprice', 'wc_checkout_params', array('ajaxurl' => admin_url('admin-ajax.php')));


add_action('wp_ajax_get_installmentprice_ajax', 'get_installmentprice_ajax', 10);
add_action('wp_ajax_nopriv_get_installmentprice_ajax', 'get_installmentprice_ajax', 10);
 
function get_installmentprice_ajax() {
     if (isset($_POST['installments'])) {
          global $woocommerce;
          $installments = $_POST['installments'];
          session_start();
          $_SESSION['customprice'] = $installments;
        }
 }

add_action( 'woocommerce_before_calculate_totals', 'calculate_price' );

function calculate_price($cart_object) {
    global $woocommerce;
    @session_start();
    $price = $_SESSION['customprice'];
    if($price){
        foreach ( $cart_object->cart_contents as $key => $value ) {
            $value['data']->set_price($price);
        }
    }
   $cart = WC()->session->get('cart');
    // changes here to $cart
    WC()->session->set('cart',$cart);
}

/**
 * Returns all the orders made by the user
 * @param int $user_id
 * @param string $status (completed|processing|canceled|on-hold etc)
 * @return array of order ids
 */
function get_all_user_orders($user_id) {
    if(!$user_id) {
        return false;
    }
    $args = array(
        'numberposts' => -1,
        'meta_key' => '_customer_user',
        'meta_value' => $user_id,
        'post_type' => 'shop_order',
       );
    
    $posts = get_posts($args);
    return wp_list_pluck( $posts, 'ID' ); 
}


/**
 * Get all Products Successfully Ordered by the user
 * @return bool|array false if no products otherwise array of product ids
 */

function get_all_products_ordered_by_user() {
    global $wpdb;
    $orders = get_all_user_orders(get_current_user_id());
    if(empty($orders)) {
        echo "No courses enrolled";
    }
    $order_list = '(' . join(',', $orders) . ')';//let us make a list for query
    //so, we have all the orders made by this user that were completed.
    $query_select_order_items = "SELECT order_item_id as id FROM {$wpdb->prefix}woocommerce_order_items WHERE order_id IN {$order_list}";
    $query_select_product_ids = "SELECT DISTINCT meta_value as product_id FROM {$wpdb->prefix}woocommerce_order_itemmeta WHERE meta_key=%s AND order_item_id IN ($query_select_order_items)";
    $products = $wpdb->get_col($wpdb->prepare($query_select_product_ids, '_product_id'));
    return $products;
}


/**
 * Get all the orders by Order id
 * @return 
 */

function get_order_by_orderid($orderId){
    global $wpdb;
    if(!$orderId) {
        return false;
    }
    $orderdata = $wpdb->get_row('SELECT te_posts.`ID`, te_posts.`post_date`, te_posts.`post_status`, te_postmeta.`meta_value`
    FROM te_posts INNER JOIN te_postmeta ON te_posts.`ID` = te_postmeta.`post_id`  where te_postmeta.`meta_key` = "_order_total" AND te_posts.`ID` = "'.$orderId.'"');
    $orderCurrencyArray = get_post_meta($orderId, "_order_currency");
    $currencySymbol = get_woocommerce_currency_symbol($orderCurrencyArray[0]);
    ?>
    <tr class="<?php echo  $orderdata->post_status; ?>">    
        <td><?php echo   $orderID =  $orderdata->ID."<br>" ; ?> </td>
        <td class="total_<?php echo  $orderdata->post_status; ?>"><?php echo  $total = $orderdata->meta_value."<br>"; ?></td>
        <td><?php echo  $postDate = $orderdata->post_date."<br>"; ?> </td>
        <!-- <td><?php echo  $postStatus = $orderdata->post_status ."<br>"; ?></td> -->
    </tr>

<?php } ?>

<?php 

/*triming whitespaces from the post fields*/
function inputData($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
}

/*course suggestor fields for linkedin*/
function linkein_course_suggestor($userId) {
    $loginLinkedinCheck = get_user_meta($userId, "user_li_linkedincheck");
    if($loginLinkedinCheck[0] == 'yes'){ 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitCoursevalue'])) {
               if (!empty($_POST["experience"])) {
                        $userExp  = ($_POST["experience"]);
                  } 
                if (!empty($_POST["position"])) {
                        $userPosition  = ($_POST["position"]);
                  }  
                if (!empty($_POST["industry"])) {
                        $userIndustry  = ($_POST["industry"]);
                  }   
                    $metakeys = array( 
                        'user_li_position' => $userPosition,
                        'user_li_industry' => $userIndustry,
                        'user_li_experience' => $userExp
                    );
                    foreach($metakeys as $key => $value) {
                        update_user_meta( $userId, $key, $value );
                    }
        }
        /*Fetching the data based on user selection*/
                global $wpdb;   
                $userMetaData= $wpdb->get_results( "SELECT `meta_key`, `meta_value` FROM te_usermeta WHERE `user_id` = ".$userId." AND `meta_key` = 'user_li_experience 'OR `meta_key` = 'user_li_position' OR `meta_key` = 'user_li_industry'" );
                $suggExperience = $userMetaData[0]->meta_value;
                $suggIndustry = $userMetaData[1]->meta_value;
                $suggDesignation = $userMetaData[2]->meta_value;

        ?>
        <form method="post" id="courseSuggestor" name="courseSuggestor" action="">
            <select id="designation" name="position">
                <option value="WebDesigner" <?php if($suggDesignation =='WebDesigner') echo "selected" ;?>>WebDesigner</option>
                <option value="QA" <?php if($suggDesignation =='QA') echo "selected" ;?>>QA</option>
                <option value="WebDeveloper" <?php if($suggDesignation =='WebDeveloper') echo "selected" ;?>>WebDeveloper</option>
            </select>
            <select id="experience" name="experience">
                <option value="1yr" <?php if($suggExperience =='1yr') echo "selected" ;?> >1yr</option>
                <option value="2yr" <?php if($suggExperience =='2yr') echo "selected" ;?> >2yr</option>
                <option value="3yr"<?php if($suggExperience =='3yr') echo "selected" ;?> >3yr</option>
            </select>
            <select id="industry" name="industry">
                <option value="finance" <?php if($suggIndustry =='finance') echo "selected" ;?>>finance</option>
                <option value="marketing" <?php if($suggIndustry =='marketing') echo "selected" ;?>>marketing</option>
                <option value="InformationTechnologyandServices" <?php if($suggIndustry =='InformationTechnologyandServices') echo "selected" ;?>>InformationTechnology</option>
            </select>
            <input class="submit_sugg" type="submit" name="submitCoursevalue" value="Submit">   
        </form>
    <?php  } 
    else{  ?>
    <div class='linkedin_btn'><a href= '<?php echo get_site_url();?>/process'><img src='http://wordpress.stunnerweb.in/talentedgedev/wp-content/themes/twentysixteen/images/sign-in-with-linkedin.png'/></a></div>
    <?php  }
} ?>
<?php 
/*Removing fields form checkout page*/
function override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['order']['order_comments']);
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'override_checkout_fields' );


/*********Getting the installment data by product id Starts*********/

function get_Installment_price($product_id){ ?>
<?php 
    $selectedCurrency = get_woocommerce_currency();
    $currencySymbol = get_woocommerce_currency_symbol($selectedCurrency);
    $installmentPrice = "";
    if( have_rows('installments', $product_id ) ):?>
    <div class="payment-selector" >
        <p>
              <label>Full Payment</label>
              <input type="radio" name="paymentType" value="fullpayment" checked ><br>
              
              <label>Installment</label> 
               <input type="radio" name="paymentType" value="installment">
        </p>
    </div>  
    <div class="installment_price">
    <?php 
            $i =1;
            while( have_rows('installments', $product_id) ): the_row(); ?>

            <label><?php echo "Installment&nbsp".$i; ?> </label>
            <?php     
                if ($selectedCurrency == "INR"){
                    if(get_sub_field('inr_price', $product_id) != "") { ?>
                         <span class="woocommerce-installment-amount-inr">
                            <?php
                                $installmentPrice =  get_sub_field('inr_price', $product_id );
                                echo $currencySymbol .  $installmentPrice;
                            ?>
                         </span>
           <?php    }
                }  
                else{
                    if(get_sub_field('usd_price', $product_id) != "") { ?>
                    <span class="woocommerce-installment-amount-usd">
                        <?php 
                            $installmentPrice   = get_sub_field('usd_price', $product_id );
                            echo  $currencySymbol .$installmentPrice;
                        ?>
                    </span>
           <?php    }

                }
            ?>
                <?php if(get_sub_field('installment_due_date', $product_id) != ""){ ?>
                    <div class="installment_date">
                        <?php //echo get_sub_field('installment_due_date', $product_id); ?>
                    </div>                                  
                <?php } ?>
            <?php
            $i++;
             endwhile; ?>
                <br><span>Custom Amount to Pay</span><input type="text" id="installmentPrice" name="installmentPrice" class= "installmentPrice cupdateprice" value="<?php echo $installmentPrice ; ?>">
            </div>
            <div class="fullpayment">
                <?php  
                     if ($selectedCurrency == "INR"){
                    $price = get_post_meta( $product_id, '_regular_price', true); 
                    }
                    else{
                     $price = get_post_meta( $product_id, '_outside-india_regular_price', true);   
                    }
                    echo "Course Total Fee: ". $currencySymbol. $price."<br>";
                ?>
                <br><span>Custom Amount to Pay</span><input type="text" id="fullpayment" name="fullpayment" class= "fullpayment cupdateprice" value="<?php echo $price ; ?>">   
            </div>
        </td>
    <?php endif; 

}

/*********Getting the installment data by product id Ends*********/

/*Ajax url*/
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() { ?>
    <script type="text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
<?php } ?>

<?php

/*gravity form populating the course dropdown */
add_filter( 'gform_pre_render_2', 'populate_posts' );
add_filter( 'gform_pre_validation_2', 'populate_posts' );
add_filter( 'gform_pre_submission_filter_2', 'populate_posts' );
add_filter( 'gform_admin_pre_render_2', 'populate_posts' );
function populate_posts( $form ) {

    foreach ( $form['fields'] as &$field ) {

        if ( $field->type != 'select' || strpos( $field->cssClass, 'course_title' ) === false ) {
            continue;
        }

        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'numberposts=-1&post_status=publish&post_type=product' );

        $choices = array();

        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a course';
        $field->choices = $choices;

    }

    return $form;
}
?>


<?php
/**
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.wordpress.org/Child_Themes
 */

/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );

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

//Making jQuery Google API
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js', false, '2.2.1');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');

/* Single Tenplate */

function get_custom_post_type_template($single_template) {
 global $post;

 if ($post->post_type == 'product') {
      $single_template = dirname( __FILE__ ) . '/single-template.php';
 }
 return $single_template;
}
//add_filter( 'single_template', 'get_custom_post_type_template' );

/* Extract Integer from String */
function extract_numbers($string)
{
   preg_match_all('/([\d]+)/', $string, $match);

   return $match[0];
}


add_action( 'admin_menu', 'dailycodex_rename_woo_menu', 999 );
 
function dailycodex_rename_woo_menu() 
{
    global $menu;
 
    // Locate the menu items you want to change
    
    $woo = the_array_search( 'WooCommerce', $menu );
    $products = the_array_search( 'Products', $menu );
 
    
    
    if( !$woo )
        return;
 
    // Replace with new values
 
    $menu[$woo][0] = 'Talentedge';
    $menu[$products][0] = 'Courses';
}
 
 
function the_array_search( $find, $items ) 
{
    foreach( $items as $key => $value ) 
    {
        $current_key = $key;
        if( 
            $find === $value 
            OR ( 
                is_array( $value )
               && the_array_search( $find, $value ) !== false 
            )
        ) 
        {
            return $current_key;
        }
    }
    return false;
}

/* Admin CSS */
function replace_admin_menu_icons_css() {
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
        .inventory_tab, .shipping_tab, .variations_tab, .advanced_tab, .attribute_tab{display:none !important;}
    </style>
    <?php
}
//add_action('admin_head', 'replace_admin_menu_icons_css');



function my_enqueue( $hook ) {
     $url = get_bloginfo('template_directory') . '/js/wp-admin.js';
    echo '"<script type="text/javascript" src="'. $url . '"></script>"';
}

add_action('admin_footer', 'my_enqueue');

/* Change the Woocommerce Name */

add_action('registered_post_type','wpse54367_alter_post_type',10,2);

function wpse54367_alter_post_type($post_type, $args){
     if( $post_type != 'product' )
         return;

     //Get labels and update them 
     $labels = get_post_type_labels( get_post_type_object( $post_type ) );
     $labels->name = 'Courses';
     $labels->singular_name= 'Courses';

     //update args
     $args->labels = $labels;
     $args->label = $labels->name;

     //update post type
     global $wp_post_types;
     $wp_post_types[$post_type] = $args;
}

/* Update Custom Slug to Courses */

function slug_save_post_callback( $post_ID, $post, $update ) {
    // allow 'publish', 'draft', 'future'
    if ($post->post_type != 'product' || $post->post_status == 'auto-draft')
        return;

    // only change slug when the post is created (both dates are equal)
   /* if ($post->post_date_gmt != $post->post_modified_gmt)
        return;
    exit();
    */
    // use title, since $post->post_name might have unique numbers added
    $new_slug = sanitize_title( $post->post_title, $post_ID );
    $subtitle = sanitize_title( get_field( 'batch_name', $post_ID ), '' );
    if (empty( $subtitle ) || strpos( $new_slug, $subtitle ) !== false)
        return; // No subtitle or already in slug

    $new_slug .= '-' . $subtitle;
    if ($new_slug == $post->post_name)
        return; // already set

    // unhook this function to prevent infinite looping
    remove_action( 'save_post', 'slug_save_post_callback', 10, 3 );
    // update the post slug (WP handles unique post slug)
    wp_update_post( array(
        'ID' => $post_ID,
        'post_name' => $new_slug
    ));
    // re-hook this function
    add_action( 'save_post', 'slug_save_post_callback', 10, 3 );
}
add_action( 'save_post', 'slug_save_post_callback', 10, 3 );


add_action('init', 'init_remove_support',100);

function init_remove_support(){
    $post_type = 'product';
    remove_post_type_support( $post_type, 'editor');
}

/* ACF Options */

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Global Settings',
        'menu_title'    => 'Global Settings',
        'menu_slug'     => 'global-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
   /* acf_add_options_page(array(
        'page_title'    => 'Partners',
        'menu_title'    => 'Partners',
        'menu_slug'     => 'partners',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    */
    acf_add_options_page(array(
        'page_title'    => 'Learners Speak',
        'menu_title'    => 'Learners Speak',
        'menu_slug'     => 'learners-speak',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


/* Populate Faculty in Homepage */
function acf_load_color_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('faculty', 'option') ) {
        
        // while has rows
        while( have_rows('faculty', 'option') ) {
            
            // instantiate row
            the_row();
            
            
            // vars
            $value = get_sub_field('name');
            $label = get_sub_field('name');

            
            // append to choices
            $field['choices'][ $value ] = $label;
            
        }
        
    }


    // return the field
    return $field;
    
}

add_filter('acf/load_field/key=field_5790849ee4289', 'acf_load_color_field_choices');

/* Populate Leaners Speak in Homepage */
function acf_load_learners_speak( $field ) {
    
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('learners_speak', 'option') ) {
             $l = 0;
        // while has rows
        while( have_rows('learners_speak', 'option') ) {
            
            // instantiate row
            the_row();
            
            
            // vars
            $value = get_sub_field('name');
           $label = $l;

            
            // append to choices
            $field['choices'][ $label ] = $value;
            $l++;
        }
        
    }


    // return the field
    return $field;
    
}

add_filter('acf/load_field/key=field_57a460b67c6bc', 'acf_load_learners_speak');




/* Populate Protalk videos in Homepage */
function acf_load_protalk_videos( $field ) {
    
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('protalk_videos', 288) ) {
        $i = 0;
        // while has rows
        while( have_rows('protalk_videos', 288) ) {

            
            // instantiate row
            the_row();
            
            
            // vars
            $value = get_sub_field('name');
            $label = $i;

            
            // append to choices
            $field['choices'][ $label ] = $value;
            $i++;
            
        }
        
    }


    // return the field
    return $field;
    
}

add_filter('acf/load_field/key=field_57908284e4278', 'acf_load_protalk_videos');


//require 'vendor/themeisle/theme_update_free.php'; 

function get_top_parent($cat){
$curr_cat = get_category_parents($cat, false, '/' ,true);
$curr_cat = explode('/',$curr_cat);
$idObj = get_category_by_slug($curr_cat[0]);
echo  $id = $idObj->term_id;
}

function save_category_info($post_id, $post, $update){
    global $post; 
    if ($post->post_type == 'product'){
        $course_type =  get_field('course_type', $post_id);
        if ($course_type == 1){
            $type = 'executive-courses';
            $term_id = 17;
        }
        else{
            $type = 'certificate-courses';
            $term_id = 18;
        }
        $c_institute =  get_field('c_institute', $post_id);
        $instittue_title = get_the_title($c_institute);
        $term_exists = term_exists($instittue_title, 'product_cat' ,$term_id);
        if ($term_exists){
            $category = get_term_by('name', $instittue_title, 'product_cat');
            $p_id = $category->term_id;
            $term_taxonomy_ids = wp_set_object_terms( $post_id, $p_id, 'product_cat' );
        }
        else{
            $cat_id = wp_insert_term(
                  $instittue_title, // the term 
                  'product_cat', // the taxonomy
                  array(
                    'description'=> '',
                    'slug' => '',
                    'parent'=> $term_id
                  )
                );
            $newterm_id =  $cat_id['term_id'];
            $term_taxonomy_ids = wp_set_object_terms( $post_id, $newterm_id, 'product_cat' );

        } 
    }
}
add_action( 'save_post', 'save_category_info', 10, 3 );

/* Woocommerce  */

/* Make Product Virtual by default */

function cs_wc_product_type_options( $product_type_options ) {
    $product_type_options['virtual']['default'] = 'yes';
    //$product_type_options['downloadable']['default'] = 'yes';
    return $product_type_options;
}
add_filter( 'product_type_options', 'cs_wc_product_type_options' );


function rename_add_to_cart_text() {
       return __( 'Apply now', 'woocommerce' );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'rename_add_to_cart_text' );

 
function only_one_product_in_cart( $cart_item_data ) {
global $woocommerce;
$woocommerce->cart->empty_cart();
return $cart_item_data;
}

add_filter( 'woocommerce_add_to_cart_validation', 'only_one_product_in_cart' );
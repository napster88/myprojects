<?php
/**
 * The template for displaying about us page.
 *
  * @package talentedge
 *
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php talentedge_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- googleapi client key for autofill -->
<meta name="google-signin-client_id" content="716526974564-4f09o8dcogcrsdu09qtt1sipunnde4hj.apps.googleusercontent.com">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="theme-color" content="#73a3c2" id="themeColor">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
<meta name="theme-color" content="#14378b">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#14378b">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#14378b">
<script>
var dataLayer = dataLayer || [];
</script>
<?php wp_head(); ?>
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<!-- <script src="https://use.typekit.net/ayr8pep.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script> -->
<?php
if(isset($_GET['utm_source']))
{
  setcookie('utm_source', $_GET['utm_source'], time() + (86400 * 30), "/");


}
if(isset($_GET['utm_term']))
{
  setcookie('utm_term', $_GET['utm_term'], time() + (86400 * 30), "/");


}
if(isset($_GET['utm_campaign']))
{
  setcookie('utm_campaign', $_GET['utm_campaign'], time() + (86400 * 30), "/");


}
if(isset($_GET['utm_term']))
{
  setcookie('utm_term', $_GET['utm_term'], time() + (86400 * 30), "/");


}


if(!isset($_COOKIE['talenedgeuser'])) {
    setcookie('talenedgeuser', 'talentedgevalue', time() + (86400 * 30), "/");
    $cookiesval='New';
}else {
	$cookiesval='Old';
}
?>

<?php  $current_user = wp_get_current_user();
$loginval=$current_user->data->user_login==''?'Not Logged In':'Logged In';
//echo "=======".$current_user->data->user_login;
/*$email_encoded='';
if($current_user->data->user_login!=''){
    $email_encoded = rtrim(strtr(base64_encode($current_user->data->user_login), '+/', '-_'), '=');
    setcookie('nab_email', $email_encoded, time() + (86400 * 365), "/");
//echo "<pre>";print_r($_COOKIE);echo "</pre>";
}*/
?>

<script>
dataLayer.push({
         	Country: "IN",
Visitor_Type: "<?php echo $cookiesval;?>",
Login_Status:'<?php echo $loginval;?>',
Currency_Code: "INR"
  });
</script>
<!--<script>
  dataLayer = [{
    'userId': "<?php //echo $_COOKIE['nab_email']==''?$email_encoded:$_COOKIE['nab_email'];?>"
  }];
</script>-->
<?php
global $post;

if($post->ID==25332){ ?>
<!-- Page-hiding snippet (recommended)  -->
<style>.async-hide { opacity: 0 !important} </style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-N35TX7':true});</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-33956145-1', 'auto');
  ga('require', 'GTM-N35TX7');

</script>

<?php } ?>


<!-- Google Tag Manager -->
<noscript>
<iframe src="//www.googletagmanager.com/ns.html?id=GTM-N35TX7"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
(function (w, d, s, l, i) {
w[l] = w[l] || []; w[l].push({
'gtm.start':
new Date().getTime(), event: 'gtm.js'
}); var f = d.getElementsByTagName(s)[0],
j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
'//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-N35TX7');</script>
<!-- End Google Tag Manager -->


<script type="text/javascript">
    if(window.location.href.indexOf("referralcode") > -1) {
        if (window.location.href.indexOf("loginpopup") > -1) {
            console.log('url ready');
        }else{
            var url = window.location.href;
            window.location.replace(" "+url+"#loginpopup");
        }
    }
     if(window.location.href.indexOf("wplEmail") > -1) {
        if (window.location.href.indexOf("loginpopup") > -1) {
            console.log('url ready');
        }else{
            var url = window.location.href;
            window.location.replace(" "+url+"#loginpopup");
        }
    }


</script>
<?php if(is_page_template('template-media.php')) { ?>
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css" rel="stylesheet">
<?php } ?>
<!--
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bundle.css" rel="stylesheet">

<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/theme_custom.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/global.css" rel="stylesheet" />
-->

<script>

BASECITY='<?php echo BASECITY ?>';
IGST='<?php echo GST ?>';
CGST='<?php echo CGST ?>';
SGST='<?php echo SGST ?>';

</script>

<style>

.aws-search-result ul li{list-style:none;border-bottom:1px dotted #f2f2f2;overflow:hidden;margin:0!important;position:relative}
.aws-search-result{position:absolute;z-index:999;z-index:9999;background:#fff;margin-top:-9px;border:1px solid #f2f2f2;font-size:12px;line-height:16px;margin-left:-37px;width:261px!important}
.aws-container .aws-search-field{padding:0}
.aws-search-result .aws_result_link{padding:5px 8px}
.list-courses .rotate_image+a{margin-top:26px}
li.no-results ul {
    display: block !important;
}
.cd-dropdown .no-results{
    color: #000;
    padding: 10px 20px;
    font-size: 14px;
    border-top: 1px solid #e2e2e2;
}
.clearSearch{
    color: #ababab;
    position: absolute;
    top: 20px;
    right: 10px;
    font-size: 12px;
}


.zopim.hideMore{
    display: none;
}
.zopim.hideMore + .zopim{
    bottom: 0 !important;
    top: auto !important;
    left: auto !important;
    right: 10px;
}
#subMenu .tab-active{background:#f2f2f2;color:#333}#subMenu .tab-active .rightArrow:after,#subMenu .tab-active .rightArrow:before{background-color:#333}
.checkout_header{box-shadow:0 3px 6px #d0d0d0}.checkout_header .navbar-right{margin-top:20px}


</style>


<!-- Start Visual Website Optimizer Asynchronous Code -->

<script type='text/javascript'>

var _vwo_code=(function(){

var account_id=335215,

settings_tolerance=2000,

library_tolerance=2500,

use_existing_jquery=false,

/* DO NOT EDIT BELOW THIS LINE */

f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();

</script>

<!-- End Visual Website Optimizer Asynchronous Code -->

</head>
<?php
 if (isset($_REQUEST['data'])){
    //session_start();
    $queryData = read_query_data($_REQUEST['data']);
    $referralcode =  $queryData['referralcode'];
}
 if (isset($_REQUEST['verified_user'])){
   $user_idv = get_current_user_id();
   update_user_meta( $user_idv, 'verified_user', 1 );
}
$mobileDetect =  preg_match('/iPhone|iPod|iPad/', $_SERVER['HTTP_USER_AGENT']);
?>
<input type="hidden" class="referral_value" value="<?php echo $referralcode ; ?>">
<body <?php body_class();?>>

<?php
    global $categories_arr_list;
    global $inst_arr_list;
    global $courses_arr2;
     $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'meta_key' => 'admission_open',
        'orderby' => 'meta_value',
        'post_status'=>'publish',
    );
    $loop = new WP_Query(  $args );

    $count = $loop->post_count;
  //  print_r($loop); die;
    $cert_cat_arr = array();
    $exe_cat_arr = array();

    $courses_arr = array();
    $courses_arr2 = array();

    $inst_arr = array();

    $categories_arr = array();

    $adm_cat_arr=array();

    if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();
    $post_id = get_the_ID();

    $course_categories = get_field('course_categories');
    $course_name = get_the_title($post_id);
    $course_short_name = get_field('course_short_name');
    $course_admission = get_field('admission_open');
    $course_institution = get_field('c_institute');
    $course_excerpt = get_field('course_excerpt');
    $course_duration = get_field('duration');
    $course_startdate = get_field('course_start_date');
    $course_image = get_field('course_image');
    $course_batch = get_field('batch_name');
    $course_exclusive = get_field('exclusive');
    $course_partner = get_field('select_partner');
    $course_tagline = get_field('tagline');
    $course_lastdate = get_field('front-end_batch_name');
    $course_brouchure = get_field('brouchure');
    $select_course = get_field('select_course');

    $course_id = $post_id;

    $productParent = get_post_meta($post_id, 'product_parent',true);
    if ($productParent != '')
        {
           $course_link = get_permalink($productParent);
        }
        else
        {
            $course_link = get_permalink($post_id);
        }

        $cat_type = get_field('course_type');

    if (get_field('course_image')){
         $course_image = get_field('course_image');
    }
    else{
         $course_image = get_field('course_default_image','option');
    }


    $courses_arr2[$post_id]['id'] = $course_id;
    $courses_arr2[$post_id]['name'] = $course_name;
    $courses_arr2[$post_id]['cat'] = $course_categories;
    $courses_arr2[$post_id]['shortname'] = $course_short_name;
    $courses_arr2[$post_id]['admission'] = $course_admission;
    $courses_arr2[$post_id]['link'] = $course_link;
    $courses_arr2[$post_id]['type'] = $cat_type;
    $courses_arr2[$post_id]['excerpt'] = $course_excerpt;
    $courses_arr2[$post_id]['start_date'] = $course_startdate;
    $courses_arr2[$post_id]['image'] = $course_image;
    $courses_arr2[$post_id]['duration'] = $course_duration;
    $courses_arr2[$post_id]['batch_name'] = $course_batch;
    $courses_arr2[$post_id]['exclusive'] = $course_exclusive;
    $courses_arr2[$post_id]['partner'] = $course_partner;
    $courses_arr2[$post_id]['tagline'] = $course_tagline;
    $courses_arr2[$post_id]['lastdate'] = $course_lastdate;
    $courses_arr2[$post_id]['brouchure'] = $course_brouchure;
    $courses_arr2[$post_id]['select_course'] = $select_course;


    $inst_arr2['id'] = $course_institution;
    $inst_arr2['name'] = get_the_title($course_institution);
    $inst_arr2['logo'] = get_field('logo',$course_institution);
    $inst_arr2['link'] = get_permalink($course_institution);
    $inst_arr2['short_name'] = get_field('short_name',$course_institution);
    if (get_field('background_image',$course_institution)){
        $inst_bg = get_field('background_image',$course_institution);
    }
    else{
         $inst_bg = get_field('institute_background_image','option');
    }
    $inst_arr2['bg'] = $inst_bg;
    $courses_arr2[$post_id]['inst'] = $inst_arr2;


    /* Exe Categories */
    if ($cat_type==1){

        foreach ($course_categories as &$course_category) {

            $term = get_term( $course_category, 'course-categories' );
            $exe_cat_arr2['id'] = $course_category;
            $exe_cat_arr2['name'] = $term->name;
            $exe_cat_arr2['slug'] = $term->slug;
            $exe_cat_arr2['link'] = get_term_link( $course_category );
            $exe_cat_arr2['cid'] = $post_id;
            $exe_cat_arr2['csno'] = get_field('category_serial','course-categories_'.$course_category);
            array_push($categories_arr, $exe_cat_arr2);
        }
         array_push($exe_cat_arr, $exe_cat_arr2);
         array_push($adm_cat_arr, $exe_cat_arr2);
    }

    /* Cert Categories */
    if ($cat_type==2){
        foreach ($course_categories as &$course_category) {
            $term = get_term( $course_category, 'course-categories' );
            $cert_cat_arr2['id'] = $course_category;
            $cert_cat_arr2['name'] = $term->name;
            $cert_cat_arr2['slug'] = $term->slug;
             $cert_cat_arr2['link'] = get_term_link( $course_category );
            $cert_cat_arr2['cid'] = $post_id;
            array_push($categories_arr, $cert_cat_arr2);
        }
          array_push($cert_cat_arr, $cert_cat_arr2);
          array_push($adm_cat_arr, $cert_cat_arr2);
    }

    //array_push($courses_arr, $courses_arr2);
    array_push($inst_arr, $inst_arr2);


    endwhile;
    wp_reset_postdata();
    endif;

    $courses_arr2['09890']['id'] = '09890';
    //print_r($courses_arr2);
    $csno = array();
     foreach ($exe_cat_arr as $key => $row)
     {
         $csno[$key] = $row['csno'];
     }
     array_multisort($csno, SORT_ASC, $exe_cat_arr);
     // echo get_field('category_serial','course-categories_35');die();
    // print_r($exe_cat_arr);die();

    $exe_result = array_unique($exe_cat_arr);
    $cert_result = array_unique($cert_cat_arr);
    $categories_arr_list = unique_multidim_array($categories_arr,'id');
    $inst_arr_list = unique_multidim_array($inst_arr,'id');
    $exe_cat_list = unique_multidim_array($exe_cat_arr,'id');
    $cert_cat_list = unique_multidim_array($cert_cat_arr,'id');
    $adm_cat_list = unique_multidim_array($adm_cat_arr,'id');



?>
   <?php if (is_checkout()) {
    wp_enqueue_script('customprice', get_template_directory_uri() . '/js/customprice.js', array('jquery'),'9.1');
	//wp_enqueue_script('checkout', get_template_directory_uri() . '/js/checkout.js', array('jquery'),'8.6');
    ?>
    <div class="checkout_header">
       <div class="container">
       <div class="clogo col-md-4"><a href="<?php echo home_url();?>" class=""><img src="<?php echo get_field('logo','option')?>"></a>
       </div>
       <?php if (is_user_logged_in()) { ?>
       <?php
                        $user_id = get_current_user_id();
                        $user_profile = get_field('profile_image', 'user_'.$user_id.'');
                        if ( empty( $user_profile ) ) {
                            $avatar = esc_url( get_template_directory_uri() ).'/images/profile_placeholder.svg';
                        }
                        else{
                            $avatar = $user_profile;
                        }
                        ?>

                <ul class="nav navbar-nav navbar-right auth_service-btn">
            <li class="dropdown usernav logged">
                    <a href="javascript: void();" style="background-image: url(<?php echo $avatar;?>) !important" class="user_profile_head dropdown-toggle" data-toggle="dropdown"></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo home_url();?>/edit-profile">Profile</a></li>

                            <li><a href="<?php echo wp_logout_url(get_home_url()); ?>">Logout</a></li>
                                                </ul>
                    </li>
                     </ul>
        <?php } ?>
       </div>
   </div>
   <?php } else {?>
<!-- ~~~~~~~~~~ header ~~~~~~~~~~ -->
    <header id="header">
        <!-- desktop navigation -->
        <nav class="navbar yamm navbar-talent" role="navigation">
            <div class="navbar-header">
                <div class="cd-dropdown-trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <?php if (is_user_logged_in()) { ?>
                    <?php
                        $user_id = get_current_user_id();
                        $user_profile = get_field('profile_image', 'user_'.$user_id.'');
                        if ( empty( $user_profile ) ) {
                            $avatar = esc_url( get_template_directory_uri() ).'/assets/images/profile.png';
                        }
                        else{
                            $avatar = $user_profile;
                        }
                        ?>
                        <div class="dropdown_profile">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <img src="<?php echo $avatar;?>" />
                            </button>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <li><a href="<?php echo home_url();?>/edit-profile">Profile</a></li>

                                <?php if (is_page_template('userprofile-template.php') ) { ?>
                                    <li><a href="<?php echo wp_logout_url(get_home_url()); ?>"><i class="icon-off"></i> Logout</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo wp_logout_url(get_permalink()); ?>"><i class="icon-off"></i> Logout</a></li>
                                <?php } ?>
                        </ul>
                    <?php } ?>

                </div>

                <a href="<?php echo home_url();?>" class="navbar-brand">
                    <!-- <img src="<?php //echo get_field('logo','option')?>" /> -->
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/te_logo.svg" />
                </a>
            </div>
            <div id="navbar-collapse-2" class="navbar-collapse collapse" aria-expanded="false">
                <ul class="nav navbar-nav search_wrapper">
                    <li class="dropdown course-widget">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">Browse Courses <span class="downArrow"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="clearfix">
                                    <div class="col-md-3 nav-left">
                                    <ul class="nav" role="tablist">
                                        <li role="presentation" class="active"><a href="#ExecutiveCourses" aria-controls="ExecutiveCourses" role="tab" data-toggle="tab">Executive courses <span class="rightArrow"></span></a>
                                        <div class="subCourses">
                                        <ul id="subMenu">

                                          <?php
                                          $menucount = 1;
                                            foreach ($exe_cat_list as &$value) {
                                              if($menucount <=10 && $value['csno']<=10){
                                                ?>
                                                 <li><a href="#nav-<?php echo $value['slug']?>" title="<?php echo $value['name'];?>"><?php echo $value['name'];?> <span class="rightArrow"></span></a></li>
                                                <?php
                                                }
                                                $menucount++;
                                              }
                                            ?>
                                        </ul>
                                        </div>
                                        </li>
                                        <li role="presentation"><a href="#CertificateCourses" aria-controls="CertificateCourses" role="tab" data-toggle="tab">Certificate courses <span class="rightArrow"></span></a>
                                        <div class="subCourses">
                                        <ul id="subMenu">
                                              <?php
                                                 foreach ($cert_cat_list as &$value) {
                                                    ?>
                                                    <li><a href="#nav-cert-<?php echo $value['slug']?>" title="<?php echo $value['name'];?>"><?php echo $value['name'];?> <span class="rightArrow"></span></a></li>
                                                    <?php
                                                    }
                                                ?>
                                                </ul>
                                        </div>
                                        </li>
                                        <li role="presentation"><a href="#Institutions" aria-controls="Institutions" role="tab" data-toggle="tab">Academic Partners <span class="rightArrow"></span></a></li>
                                        <li role="presentation"><a href="#AdmissionOpen" aria-controls="AdmissionOpen" role="tab" data-toggle="tab">Admissions open <span class="rightArrow"></span></a></li>
                                    </ul>

                                    </div>
                                    <div class="col-md-9 nav-right">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="ExecutiveCourses">
                                                <a href="<?php echo home_url();?>/browse-course/?id=ct_1" class="admission_open">View All <i class="fa icon-left-arrow"></i></a>
                                                <div class="row clearfix">
                                                <?php
                                                    $tid=1;
                                                     foreach ($exe_cat_list as &$value) {

                                                    ?>
                                                    <div class="col-md-4 courses">

                                                    <h4><a href="<?php echo $value['link'];?>" >
                                                    <?php echo $value['name'];?></a></h4>
                                                    <ul class="list-courses">
                                                    <?php
                                                    $ad_cnt='';
                                                    $eindex=1;
                                                    $key=0;
                                                   foreach ($courses_arr2 as &$ex_a) {

                                                       //echo '<pre>';
                                                       //print_r($courses_arr2);
                                 if ($eindex<=3 && $ex_a['select_course']==0) {
                                if (in_array($value['id'],$ex_a['cat']) && $ex_a['type'] ==1){
                                                    ?>
                                                        <?php
                                                        if ($ex_a['admission']=='Yes'){
                                                $ad_cnt = '<span class="adopen">Admission open</span>';
                                                        }
                                                        else{
                                                              $ad_cnt='';
                                                        }
$cl_startdate = get_field('course_start_date', $ex_a['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
$termdata = get_term( $ex_a['cat'][0], 'course-categories' );
//echo "<pre>";print_r($termdata);echo "</pre>";
                                                        ?>
                                                         <li class="<?php echo $ex_a['select_course'];?>"><a href="<?php echo $ex_a['link'];?>" onclick="return redirectsinglepage('<?php echo $ex_a['link'];?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $ex_a['shortname'];?>',<?php echo $ex_a['id'];?>,'<?php echo $ex_a['inst']['name'];?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>')" style="cursor: pointer;" ><?php echo $ex_a['shortname'];?>
                                                             <?php echo $ad_cnt;?>
                                                         </a></li>
                                                    <?php
                                                    $eindex++;
                                                    $key++;
                                                            }
                                                        }
                                                        }
                                                    ?>
                                                    </ul>
                                                    </div>
                                                    <?php
                                                   }
                                                ?>
                                                </div>
                                                <!-- <div class="aopen"><img class="newTag" src="<?php //echo esc_url( get_template_directory_uri() ); ?>/images/arrow_menu.svg"> Admission Open</div> -->
                                            </div>
                                            <div class="subMenu-wrapper">
                                                <?php
                                                     foreach ($exe_cat_list as &$value) {
                                                    ?>
                                                 <div role="tabpanel" class="tab-section" id="nav-<?php echo $value['slug'];?>">

                                                <h4><a href="<?php echo $value['link'];?>"><?php echo $value['name'];?></a></h4>

                                                    <ul class="list-courses">
                                                    <?php
                                                    $key=0;
                                                foreach ($courses_arr2 as &$edn2) {
                                   if ( $edn2['select_course']==0 && $edn2['cat']) {
                                if (in_array($value['id'],$edn2['cat']) && $edn2['type'] ==1){
                                                    //$edn2 = $courses_arr2[$edn['cid']];

                                                     //if ($edn2['select_course'] == 0){

                                                     if ($edn2['admission']=='Yes'){
                                            $ad_cnt = '<span class="adopen">Admission open</span>';
                                                    }
                                                    else{
                                                        $ad_cnt='';
                                                    }
							$cl_startdate = get_field('course_start_date', $edn2['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
				$termdata = get_term( $edn2['cat'][0], 'course-categories' );
                                                    ?>
                                                    <li id="mmm" class="col-md-6 col-sm-6">
                                                        <div class="noRotate">
                                                            <a href="<?php echo $edn2['link']; ?>"><div class="anti_rotateImg" style="background-image:url(<?php echo $edn2['inst']['logo'];?>);">
                                                            </div>
                                                            </a>
                                                        </div>
                                                        <a href="<?php echo $edn2['link'];?>" onClick="return redirectsinglepage('<?php echo $edn2['link'];?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $edn2['shortname'];?>',<?php echo $edn2['id'];?>,'<?php echo $edn2['inst']['name'];?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>',  event)" style="cursor: pointer;"><?php echo $edn2['shortname'];?><?php echo $ad_cnt;?></a>
                                                    </li>
                                                <?php $key++;} } } ?>
                                                    </ul>

                                                </div>
                                                    <?php
                                                   }
                                                ?>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="CertificateCourses">
                                                <a href="<?php echo home_url();?>/browse-course/?id=ct_2" class="admission_open">View All <i class="fa icon-left-arrow"></i></a>
                                                <div class="clearfix row">
                                            <?php
                                                    $tid=1;
                                                     foreach ($cert_cat_list as &$value) {

                                                    ?>
                                                    <div class="col-md-4 courses">

                                                    <h4><a href="<?php echo $value['link']?>">
                                                    <?php echo $value['name'];?></a></h4>
                                                    <ul class="list-courses">
                                                    <?php
                                                    $cindex=1;
						    $key=0;
                                                   foreach ($courses_arr2 as &$ex_b) {
                                                 if ($cindex<=3 && $ex_b['select_course']==0) {
                                if (in_array($value['id'],$ex_b['cat']) && $ex_b['type'] ==2){
                                                    ?>
                                                        <?php
                                                        if ($ex_b['admission']=='Yes'){
                                                             $ad_cnt = '<span class="adopen">Admission open</span>';

                                                        }
                                                        else{
                                                              $ad_cnt='';
                                                        }
				$cl_startdate = get_field('course_start_date', $ex_b['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
				$termdata = get_term( $ex_b['cat'][0], 'course-categories' );
                                                        ?>
                                                         <li><a href="<?php echo $ex_b['link'];?>" onclick="return redirectsinglepage('<?php echo $ex_b['link'];?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $ex_b['shortname'];?>',<?php echo $ex_b['id'];?>,'<?php echo $ex_b['inst']['name'];?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>')" style="cursor: pointer;" ><?php echo $ex_b['shortname'];?><?php echo $ad_cnt;?></a></li>
                                                    <?php
                                                    $cindex++;
                                                    $key++;
                                                            }
                                                        }
                                                        }
                                                    ?>
                                                    </ul>
                                                    </div>
                                                    <?php
                                                   }
                                                ?>





                                                </div>
                                                <!-- <div class="aopen"><img class="newTag" src="<?php //echo esc_url( get_template_directory_uri() ); ?>/images/arrow_menu.svg"> Admission Open</div> -->
                                            </div>
                                            <div class="subMenu-wrapper">

                                                <?php
                                                     foreach ($cert_cat_list as &$value) {
                                                    ?>
                                                 <div role="tabpanel" class="tab-section" id="nav-cert-<?php echo $value['slug'];?>">

                                                <h4><a href="<?php echo $value['link'];?>"><?php echo $value['name'];?></a></h4>

                                                    <ul class="list-courses" id="certinside">
                                                    <?php
                                                foreach ($cert_cat_arr as &$edn) {
                                                if ($edn['id'] == $value['id']){
                                                    $edn2 = $courses_arr2[$edn['cid']];
                                                     if ($edn2['select_course']==0){
                                                     if ($edn2['admission']=='Yes'){
                                                         $ad_cnt = '<span class="adopen">Admission open</span>';
                                                        }
                                                        else{
                                                              $ad_cnt='';
                                                        }
                                                    ?>
                                                    <li id="<?php echo $edn['select_course'];?>" class="col-md-6 col-sm-6">
                                                        <div class="noRotate">
                                                            <a href="<?php echo $edn2['link']; ?>"><div class="anti_rotateImg" style="background-image:url(<?php echo $edn2['inst']['logo'];?>);">
                                                            </div>
                                                            </a>
                                                        </div>
                                                        <a href="<?php echo $edn2['link']; ?>"><?php echo $edn2['shortname'];?><?php echo $ad_cnt;?></a>
                                                    </li>
                                                <?php } }  }?>
                                                    </ul>

                                                </div>
                                                    <?php
                                                   }
                                                ?>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="Institutions">
                                                <ul class="clearfix row institutes_tab">
                                                    <?php
                                                    $iindex=1;
                                                    foreach ($inst_arr_list as &$invalue) {
                                                    if ($invalue['logo']){
                                                        $i_logo = $invalue['logo'];
                                                    }
                                                    else{
                                                         $i_logo = get_field('default_course_image', 'option');
                                                    }
                                                    if ($iindex<=16){
                                                    ?>
                                                      <li class="col-md-3">
                                                        <a href="<?php echo $invalue['link']; ?>">
                                                            <div class="institute-wrp">
                                                            <!-- <img class="img-responsive" src="<?php echo $i_logo?>" /> -->
                                                            <div class="cover_institute" style="background-image: url(<?php echo $i_logo?>);"></div>
                                                            </div>
                                                            <!-- <div>
                                                                <span class="name_instute"><?php //echo $invalue['short_name']; ?></span>
                                                            </div> -->
                                                        </a>
                                                    </li>
                                                    <?php } $iindex++; } ?>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="AdmissionOpen">
                                                <a href="<?php echo home_url();?>/browse-course/?id=te_Yes" class="admission_open">View All <i class="fa icon-left-arrow"></i></a>
                                                <div class="clearfix row">
                                                <div class="">
                                                    <?php
                                                    $tid=0;
                                                     //foreach ($adm_cat_list as &$value) {

                                                    ?>
                                                   <!-- <div class="col-md-4 courses">

                                                    <h4><a href="<?php echo $value['link']?>">
                                                    <?php echo $value['name'];?></a></h4>-->
                                                    <ul class="list-courses">
                                                    <?php
                                                    $aindex=1;$key=0;
                                                   foreach ($courses_arr2 as &$ex_b) {
                                                       // if ($aindex<3){
                        if ($ex_b['admission'] =='Yes'){
				$cl_startdate = get_field('course_start_date', $ex_b['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
				$termdata = get_term( $ex_b['cat'][0], 'course-categories' );
                                                    ?>
                                                     <li id="mmm" class="col-md-6 col-sm-6">
                                                        <div class="noRotate">
                                                            <a href="<?php echo $ex_b['link']; ?>"><div class="anti_rotateImg" style="background-image:url(<?php echo $ex_b['inst']['logo'];?>);">
                                                            </div>
                                                            </a>
                                                        </div>
                                                        <a href="<?php echo $ex_b['link'];?>" onclick="return redirectsinglepage('<?php echo $ex_b['link'];?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $ex_b['shortname'];?>',<?php echo $ex_b['id'];?>,'<?php echo $ex_b['inst']['name'];?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>')" style="cursor: pointer;" ><?php echo $ex_b['shortname'];?></a>
                                                    </li>


                                                    <?php
                                                    $aindex++;$key++;
                                                           // }
                                                        }

                                                        }
                                                    ?>
                                                    </ul>
                                                   <!-- </div>-->
                                                    <?php
                                                  // }
                                                ?>

                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="search">
                            <!--<input type="text" name="search" placeholder="Search by Course Name">-->
                            <!--<?php echo do_shortcode( '[aws_search_form]' ); ?>-->
                           <?php if ( is_404() ) { } else { ?>
                            <div class="searchdiv">
                                <input id="search-hidden-mode" name="search" placeholder="Search Courses" type="text" data-list=".hidden_mode_list" data-nodata="No results found" autocomplete="off">
                                <ul class="vertical hidden_mode_list">
                                  <?php foreach ($courses_arr2 as &$ex_b) {
                                    if ($ex_b['select_course']==0){
                                        if ($ex_b['admission'] =='Yes'){
                                        $adm = '<span class="adopen">Admission Open</span>';
                                        }
                                        else{
                                           $adm='';
                                        }
                                        $inid = $ex_b['inst']['id'];
                                        $inst_id = get_field('short_name', $inid);
                                    ?>
                                   <li>
                                   <a href="<?php echo $ex_b['link']; ?>">
                                       <span class="sname"><?php echo $ex_b['shortname'];?></span>
                                       <span class="type"><?php echo $inst_id;?></span>
                                       <?php echo $adm;?>
                                   </a>
                                   </li>
                                  <?php }  } ?>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right auth_service-btn">
                    <?php if (is_user_logged_in()) { ?>
                    <li class="dropdown usernav logged">
                        <?php
                        $user_id = get_current_user_id();
                        $user_profile = get_field('profile_image', 'user_'.$user_id.'');
                        if ( empty( $user_profile ) ) {
                            $avatar = esc_url( get_template_directory_uri() ).'/images/profile_placeholder.svg';
                        }
                        else{
                            $avatar = $user_profile;
                        }
                        ?>
                        <a href="javascript: void();" style="background-image: url(<?php echo $avatar;?>) !important" class="user_profile_head dropdown-toggle" data-toggle="dropdown"></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo home_url();?>/edit-profile">Profile</a></li>
                        <?php if (is_page_template('userprofile-template.php') ) { ?>
                            <li><a href="<?php echo wp_logout_url(get_home_url()); ?>">Logout</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a></li>
                        <?php } ?>
                        </ul>
                    </li>
                    <!-- <li class="signUp dropdown hidden-medium">
                        <a href="<?php //echo wp_logout_url(get_permalink()); ?>"><i class="icon-off"></i> Logout</a>
                    </li> -->
                    <?php } else { ?>

                        <!--<li class="last usernav"><div id="loginpopup" class="">Login</div></li>-->
                        <li class="last usernav"><a href="#loginpopup">Login</a></li>
                        <li class="register"><a href="#loginpopup">Sign up</a></li>
                    <?php }?>
                </ul>
                <ul class="nav navbar-nav pull-right auth_right">
                    <li class="dropdown">
                        <a href="<?php echo home_url();?>/degree-courses">Degree Courses</a>
                    </li>
                     <li class="dropdown">
                        <a href="<?php echo home_url()?>/enterprise" >Enterprise <span class="downArrow"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo home_url();?>/services">Services</a></li>
                            <li><a tabindex="-1" href="<?php echo home_url();?>/products">Products</a></li>
                            <li><a tabindex="-1" href="<?php echo home_url();?>/resources">Resources</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo home_url();?>/skilling">skilling</a>
                        <!--<ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#"> Skilling </a></li>
                            <li><a tabindex="-1" href="#"> Another Skilling </a></li>
                        </ul>
                        -->
                    </li>
                    <!-- <li class="dropdown">
                        <a href="http://www.talentedge.in/blog/" target="_blank">Blog</a>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- mobile navigation -->
        <div class="cd-dropdown-wrapper">
            <!-- <a class="cd-dropdown-trigger" href="#0">Dropdown</a> -->
            <nav class="cd-dropdown">
                <h2>Talentedge</h2>
                <a href="#0" class="cd-close">Close</a>
                <ul class="cd-dropdown-content">
                    <li>
                         <div class="searchdiv">
                                <span class="clearSearch">Clear</span>
                                <input id="search-hidden-mode2" name="search" placeholder="Search Courses" type="text" data-list=".hidden_mode_list" data-nodata="No results found" autocomplete="off">
                                <ul class="vertical hidden_mode_list">
                                  <?php foreach ($courses_arr2 as &$ex_b) {
                                    if ($ex_b['select_course']==0){
                                        if ($ex_b['admission'] =='Yes'){
                                        $adm = '<span class="adopen">Admission Open</span>';
                                        }
                                        else{
                                           $adm='';
                                        }
                                        $inid = $ex_b['inst']['id'];
                                        $inst_id = get_field('short_name', $inid);
                                    ?>
                                   <li>
                                   <a href="<?php echo $ex_b['link']; ?>">
                                       <span class="sname"><?php echo $ex_b['shortname'];?></span>
                                       <span class="type"><?php echo $inst_id;?></span>
                                       <?php echo $adm;?>
                                   </a>
                                   </li>
                                  <?php }  } ?>
                                </ul>
                            </div>
                    </li>
                    <li class="has-children">
                        <a href="#!">Browse Courses</a>

                        <ul class="cd-secondary-dropdown is-hidden">
                            <li class="go-back"><a href="#0">Menu</a></li>
                            <li class="has-children">
                                <a href="#0">Executive courses</a>

                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Executive courses</a></li>

                                    <?php
                                    $tid=1;
                                    foreach ($exe_cat_list as &$mevalue) {

                                    ?>
                               <li class="has-children"><a href="#0"><?php echo $mevalue['name'];?></a>
                                 <ul class="is-hidden">

                                 <li class="go-back">
                                    <a href="#0"><?php echo $mevalue['name'];?></a>
                                 </li>
                                <?php
                                $ad_cnt='';
                               foreach ($courses_arr2 as &$mex_a) {
                                  if ( $mex_a['select_course']==0) {

                    if (in_array($mevalue['id'],$mex_a['cat']) && $mex_a['type'] ==1){


                                ?>
                                    <?php
                                    if ($mex_a['admission']=='Yes'){
                                        $ad_cnt = '<span class="adopen">Admission open</span>';
                                    }
                                    else{
                                        $ad_cnt='';
                                    }

                                    ?>
                                     <li><a href="<?php echo $mex_a['link']; ?>"><?php echo $mex_a['shortname'];?><?php echo $ad_cnt;?></a></li>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                </ul>
                            </li>
                                <?php
                               }
                            ?>
                            </ul>
                            </li>


                            <li class="has-children">
                                <a href="#0">Certificate courses</a>

                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Certificate courses</a></li>

                                    <?php
                                $tid=1;
                                foreach ($cert_cat_list as &$mcvalue) {

                                ?>
                               <li class="has-children"><a href="#0"><?php echo $mcvalue['name'];?></a>
                                 <ul class="is-hidden">

                                 <li class="go-back">
                                    <a href="#0"><?php echo $mcvalue['name'];?></a>
                                 </li>
                                <?php
                                $ad_cnt='';
                              foreach ($courses_arr2 as &$mcx_a) {
                                 if ($mcx_a['select_course']==0) {
                    if (in_array($mcvalue['id'],$mcx_a['cat']) && $mcx_a['type'] ==2){
                                ?>
                                    <?php
                                    if ($mcx_a['admission']=='Yes'){
                                         $ad_cnt = '<span class="adopen">Admission open</span>';
                                    }
                                    else{
                                        $ad_cnt='';
                                    }

                                    ?>
                                     <li><a href="<?php echo $mcx_a['link']; ?>"><?php echo $mcx_a['shortname'];?><?php echo $ad_cnt;?></a></li>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                </ul>
                            </li>
                                <?php
                               }
                            ?>
                            </ul>
                            </li>

                            <li class="has-children">
                                <a href="#0">Academic Partners</a>

                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Academic Partners</a></li>

                                    <?php
                                    foreach ($inst_arr_list as &$invalue) {

                                    ?>

                                         <li><a href="<?php echo $invalue['link']; ?>"><?php echo $invalue['short_name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="has-children">
                                <a href="#0">Admissions open</a>

                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Admissions open</a></li>



                                        <?php
                                        foreach ($courses_arr2 as &$ainvalue) {;
                                        if ($ainvalue['admission'] == 'Yes'){
                                        ?>
                                         <li> <a href="<?php echo $ainvalue['link']; ?>"><?php echo $ainvalue['shortname'];?></a></li>
                                        <?php } } ?>

                                </ul>
                            </li>
                        </ul> <!-- .cd-secondary-dropdown -->
                    </li> <!-- .has-children -->

                    <li>
                        <a href="<?php echo home_url()?>/degree-courses">Degree Courses</a>
                    </li>
                    <li class="has-children">
                        <a href="<?php echo home_url()?>/skilling">Enterprise</a>
                        <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Enterprise</a></li>
                            <li><a href="<?php echo home_url()?>/services">Services</a></li>
                            <li><a href="<?php echo home_url()?>/products">Products</a></li>
                            <li><a href="<?php echo home_url()?>/resources">Resources</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo home_url()?>/skilling">Skilling</a>
                    </li>
                    <li><a href="<?php echo home_url()?>/blog">Blog</a></li>
                     <?php if (is_user_logged_in()) { ?>
                   <!--  <li class="dropdown usernav">
                      <?php
                        $user_id = get_current_user_id();
                        $user_profile = get_field('profile_image', 'user_'.$user_id.'');
                        if ( empty( $user_profile ) ) {
                            $avatar = esc_url( get_template_directory_uri() ).'/assets/images/profile.png';
                        }
                        else{
                            $avatar = $user_profile;
                        }
                        ?>
                        <a href="<?php echo home_url();?>/edit-profile" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                        <img width="30px" height="30px" src="<?php echo $avatar;?>"/>
                        </a>
                        <a href="<?php echo wp_logout_url(get_permalink()); ?>"><i class="icon-off"></i> Logout</a>
                    </li> -->

                    <?php } else { ?>

                        <!--<li class="last usernav"><div id="loginpopup" class="">Login</div></li>-->
                        <li class="last usernav"><a href="#loginpopup">Login</a></li>
                    <?php }?>
                </ul> <!-- .cd-dropdown-content -->
            </nav> <!-- .cd-dropdown -->
        </div> <!-- .cd-dropdown-wrapper -->
    </header>
    <?php } ?>
<?php
$currentUrl = strtok($_SERVER["REQUEST_URI"],'?');
$profileUrl = get_bloginfo('url').'/edit-profile/';
?>
<!-- Login Popup -->
<div data-remodal-id="loginpopup" role="dialog" aria-labelledby="modal2Title" aria-describedby="modal2Desc">
   <button data-remodal-action="close" class="remodal-close">Close</button>
     <div class="logindiv right">
        <!--  <p class="title-popup title_login">Log in</p> -->
         <p style="display:none" class="linkedin_error error">Looks like you already have an account with this ID. You can try logging in</p>
         <?php echo do_shortcode('[userpro template=login login_button_primary=LOG IN login_redirect= '.$profileUrl.' option=value login_heading="LOG IN"]'); ?>
         <div class="login_signup">Don't have an account? <p id="register">Signup</p></div>

     </div>
      <div class="resetdiv right">
         <?php echo do_shortcode('[userpro template=reset]'); ?>
        <div class="login_actions">
           <div class="reset_signup">Don't have an account? <p id="register">Signup</p></div>
             <p class="login">Back to login</p>
        </div>
     </div>
     <div class="registerdiv right">
        <p class="title-popup title_register">Register Now</p>
        <?php
            if($mobileDetect == 1){?>
            <div id="my-signin2">Autofill </div>
            <?php echo do_shortcode('[userpro_social_connect width="400px"]');
           }else{ ?>
          <div id="my-signin2">Autofill </div>
          <div class="social_autofill"><a class="linkedin-autofill" onclick="liAuth()">Auto fill with linkedin <i class="icon-linked-in fa"></i></a></div>
        <?php } echo do_shortcode('[userpro template=register register_redirect= '.$currentUrl.' option=value register_heading=""]'); ?>
        <div class="">Already have an account? <p class="login">Login</p></div>
     </div>
</div>


<!-- suggest popup -->
<?php $redirectUrl_suggest = get_bloginfo('url').'/edit-profile/#suggestcourse'; ?>
<div data-remodal-id="suggest_popup" role="dialog" aria-labelledby="modal2Title" aria-describedby="modal2Desc">
   <button data-remodal-action="close" class="remodal-close">Close</button>
     <div class="logindiv right">
         <p class="title-popup">Log in</p>
         <!-- <p style="display:none" class="linkedin_error error">This Email id already exist please try loging in</p> -->
         <?php echo do_shortcode('[userpro template=login login_button_primary=LOG IN login_redirect= '.$redirectUrl_suggest.' option=value login_heading=""]'); ?>
         <div class="login_signup">Don't have an account? <p id="register">Signup</p></div>

     </div>
      <div class="resetdiv right">
         <?php echo do_shortcode('[userpro template=reset]'); ?>
        <div class="login_actions">
           <div class="reset_signup">Don't have an account? <p id="register">Signup</p></div>
             <p class="login">Back to login</p>
        </div>
     </div>
     <div class="registerdiv right">
        <p class="title-popup">Create an account to find courses best suited to your profile</p>
          <?php
            if($mobileDetect == 1){?>
            <div id="autofill-suggest"></div>
            <?php echo do_shortcode('[userpro_social_connect width="400px"]');
           }else{ ?>
            <div id="autofill-suggest">Autofill </div>
          <div class="social_autofill"><a class="linkedin-autofill" onclick="liAuth()">Auto fill with linkedin <i class="icon-linked-in fa"></i></a></div>
        <?php } echo do_shortcode('[userpro template=register register_redirect= '.$redirectUrl_suggest.' option=value register_heading=""]'); ?>
        <div class="">Already have an account? <p class="login">Login</p></div>
     </div>
</div>

<!-- checkout popup -->

<div data-remodal-id="checkout_popup" role="dialog" aria-labelledby="modal2Title" aria-describedby="modal2Desc">
   <button data-remodal-action="close" class="remodal-close">Close</button>
     <div class="logindiv right">
         <p class="title-popup">Log in</p>
         <!-- <p style="display:none" class="linkedin_error error">This Email id already exist please try loging in</p> -->
         <?php echo do_shortcode('[userpro template=login login_button_primary=LOG IN login_redirect= '.$currentUrl."/#step2".' option=value login_heading=""]'); ?>
        <!--  <div class="login_signup">Don't have an account? <p id="register">Signup</p></div> -->

     </div>
      <div class="resetdiv right">
         <?php echo do_shortcode('[userpro template=reset]'); ?>
        <div class="login_actions">
           <div class="reset_signup">Don't have an account? <p id="register">Signup</p></div>
             <p class="login">Back to login</p>
        </div>
     </div>
     <div class="registerdiv right">
        <p class="title-popup">Create an account to find courses best suited to your profile</p>
         <?php echo do_shortcode('[userpro_social_connect width="400px"]'); ?>
         <?php echo do_shortcode('[userpro template=register register_redirect= '.$currentUrl.' option=value register_heading=""]'); ?>
        <div class="">Already have an account? <p class="login">Login</p></div>
     </div>
</div>
<script>
//$(document).ready(function() {
function redirectsinglepage(url,list,productname,id,brand,category,variant,position)
{
   //alert(url);//return false;
   if (window.ga && ga.loaded) {
   dataLayer.push({
    'event': 'redirectsinglepage',
    'ecommerce': {
      'click': {
        'actionField': {'list': list},//Optional list property
        'products': [{
          'name': productname, // Name or ID is required.
          'id': id,
          'brand': brand,
      	  'category': category,
         'variant': variant,
         'position': position
         }]
       }
     },
     'eventCallback': function() { //alert('testttttttttttttttttttt');
       document.location = url;    // Next page URL
     }
  });
}else{
	document.location = url;
}

}

//});
</script>

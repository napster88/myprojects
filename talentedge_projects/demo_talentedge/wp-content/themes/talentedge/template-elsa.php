<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Elsa Registration
 *
 */
get_header();
if($_GET['utm_source']){
	$utm=$_GET['utm_source'];
    }else{
	$utm='website';
    }

?>
<?php
//$website = "http://example.com";
if (isset($_POST['user_email'])) {
    $utmsource=$_POST['utmsource'];
    $userdata = array();
    $userdata['user_login'] = $_POST['user_email'];
    $userdata['user_email'] = $_POST['user_email'];
    $userdata['phone_number'] = $_POST['phone_number'];
    $userdata['user_pass'] = '0Fq5w@T580te';
    $userdata['first_last'] = explode(" ", $_POST['user_login']);
    $userdata['first_name'] = $userdata['first_last']['0'];
    $userdata['last_name'] = $userdata['first_last']['1'];
    $userdata['role'] = 'None';
    $detail = get_user_by('email',$_POST['user_email']);
	if($detail->data->ID>0){
      $exists = $detail->data->ID;
     }
    global $wpdb;
    $tablename = $wpdb->prefix . 'xlri_registration';
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $tablename  WHERE from_register = 'Elsa' AND user_id = $exists"));
    
    if ($exists == '' && $count != 1){
        $user_id = wp_insert_user($userdata);
		//echo"<pre>";print_r($user_id);
        if ( ! is_wp_error( $user_id )  ) {			
            $tablename = $wpdb->prefix . 'xlri_registration';
            $data = array(
                'user_email' => $_POST['user_email'],
                'user_id' => $user_id,
                'user_phone' => $_POST['phone_number'],
                'from_register' => 'Elsa',
                'created_at' => current_time('mysql'),
		'utm_source' =>$utmsource);
            $siteUrl = get_bloginfo('url');
            $user_insert = $wpdb->insert($tablename, $data);
           // echo '<div class="alert alert-success" style="margin-bottom: 0px;">Thank you for registering to the Talentedge Live Talks with ELSA</div>';
            
            $headers = array('Content-Type: text/html; charset=UTF-8',
            'From:  Talentedge <admission@talentedge.in>');
            $to = $_POST['user_email'];
            $subject = "Thank you for registering to the Leadership Talk Series by ELSA and Talentedge";
            $body = '<p> Dear ' . $userdata['first_name'] . ',<br><br>Your seat is confirmed for the <strong>Leadership Live Talk Series</strong> scheduled for January, 2018 by ELSA and Talentedge.<br><br>Find below the details of Sessions:<br><br>
             1. "Challenges and learning of a Young Female Leader: Break through the clutter to make your mark as a leader" by <strong>Ishita Anand</strong>(Founder and CEO of  Bitgiving.com) on 20th Jan, 2018 (11AM - 12PM)
 <br><br>We will also be sharing with you the links to join the sessions shortly. Stay tuned for more updates
<br><br>Watch the leaders share their experience and learn key skills required to become a Leader of the Future!
<br><br>Write to us @rishita.samal@talentedge.in for any queries. See you at the talk!<br><br>Thanks<br>
Team Talentedge<br>www.talentedge.in';
            $result = wp_mail($to, $subject, $body, $headers);
	$sliqData = array();
            $name = $userdata['user_login'];
            $namediv = explode(' ', $name);
            $sliqData['username'] = $userdata['user_email'];
            $sliqData['password'] = '0Fq5w@T580te';
            $sliqData['email'] = $userdata['user_email'];
            $sliqData['mobile_no'] = $userdata['phone_number'];
            $sliqData['fname'] = $namediv[0];
            $sliqData['lname'] = $namediv[1];
            $sliqData['gender'] = 'M';
            $sliqData['dob'] = '1970-01-01';
 	   /* if($detail->data->sliq_id>0){
            	$sliqData['lms_id'] = $detail->data->sliq_id;
            }*/
            $sliqData['status'] = '1';
            $sliqData['batch_id'] = '66'; //for live 40
		//print_r($sliqData);
            $fields_string = http_build_query($sliqData);
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "Api/openRegistration");
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
		//echo SLIQ_URL."==========<pre>";print_r($result);exit;
            $decode = json_decode($result, true);
		//	echo "===" . $decode['resultData']['id'];exit();
	    if($decode['resultData']['id']>0){
                 $user = $wpdb->update('te_users', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
		       $user = $wpdb->update('te_xlri_registration', array('sliq_id' => $decode['resultData']['id']), array('user_id' => $user_id));			   
            }
		$user = $wpdb->update('te_xlri_registration', array('log_value' => $result), array('user_id' => $user_id));
		//$detail=get_user_by('email',$_POST['user_email']);
		header('Location: /thank-you-elsa');
        }
    } elseif ($exists > 0 && $count == 1) {
		?>
        <div class="alert alert-warning" style="margin-bottom: 0px;">
            This e-mail is already registered to this course.
        </div>
        <?php
      
    } elseif ($exists && $count == 0) {
        $tablename = $wpdb->prefix . 'xlri_registration';
        $data = array(
            'user_email' => $_POST['user_email'],
            'user_id' => $exists,
            'from_register' => 'Elsa',
            'user_phone' => $_POST['phone_number'],
            'created_at' => current_time('mysql'),
	    'utm_source' =>$utmsource);
        $siteUrl = get_bloginfo('url');
        $wpdb->insert($tablename, $data);
        $user_id=$exists;
       // echo '<div class="alert alert-success" style="margin-bottom: 0px;">Thank you for registering to the Talentedge Live Talks with ELSA</div>';
        $headers = array('Content-Type: text/html; charset=UTF-8',
            'From:  Talentedge <admission@talentedge.in>');
        $to = $_POST['user_email'];
        $subject = "Thank you for registering to the Leadership Talk Series by ELSA and Talentedge";
        $body = '<p> Dear ' . $userdata['first_name'] . ',<br><br>Your seat is confirmed for the <strong>Leadership Live Talk Series</strong> scheduled for January, 2018 by ELSA and Talentedge.<br><br>Find below the details of Sessions:<br><br>
         1. "Challenges and learning of a Young Female Leader: Break through the clutter to make your mark as a leader" by <strong>Ishita Anand</strong>(Founder and CEO of  Bitgiving.com) on 20th Jan, 2018 (11AM - 12PM)
 <br><br>We will also be sharing with you the links to join the sessions shortly. Stay tuned for more updates
<br><br>Watch the leaders share their experience and learn key skills required to become a Leader of the Future!
<br><br>Write to us @rishita.samal@talentedge.in for any queries. See you at the talk!<br><br>Thanks<br>
Team Talentedge<br>www.talentedge.in';
        $result = wp_mail($to, $subject, $body, $headers);
//echo"<pre>";print_r($result);exit();
	$sliqData = array();
            $name = $userdata['user_login'];
            $namediv = explode(' ', $name);
            $sliqData['username'] = $userdata['user_email'];
            $sliqData['password'] = '0Fq5w@T580te';
            $sliqData['email'] = $userdata['user_email'];
            $sliqData['mobile_no'] = $userdata['phone_number'];
            $sliqData['fname'] = $namediv[0];
            $sliqData['lname'] = $namediv[1];
            $sliqData['gender'] = 'M';
            $sliqData['dob'] = '1970-01-01';
 	    //if($detail->data->sliq_id>0){
            	//$sliqData['lms_id'] = $detail->data->sliq_id;
            //}
            $sliqData['status'] = '1';
            $sliqData['batch_id'] = '66'; //for live 40
            $fields_string = http_build_query($sliqData);
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "Api/openRegistration");
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
            $decode = json_decode($result, true);
	    if($decode['resultData']['id']>0){
                 $user = $wpdb->update('te_users', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
		 $user = $wpdb->update('te_xlri_registration', array('sliq_id' => $decode['resultData']['id']), array('user_id' => $user_id));
            }
			$user = $wpdb->update('te_xlri_registration', array('log_value' => $result), array('user_id' => $user_id));
			header('Location: /thank-you-elsa');
    }
//echo $alr_exist;exit();
//echo"<pre>";print_r($userdata);
//echo"<pre>";print_r($user_id);exit();
//On success
}
//echo "========".$user_id;
?>

<?php if ($user_id >0) { ?>
<?php //echo get_home_url(); ?>
    <script>
        $(window).load(function () {//alert("111111");
            //$("#thanks_msg").modal('show');
            //window.setTimeout(window.location.href = "/thank-you-elsa",50000);
        });
        $('#myform').each(function () {
            this.reset();
        });
    </script>
	
<?php }
$user_id=0;
?>
<script>
	$("#phone_number").keydown(function(event) {
  k = event.which;
  if ((k >= 96 && k <= 105) || k == 8) {
    if ($(this).val().length == 10) {
      if (k == 8) {
        return true;
      } else {
        event.preventDefault();
        return false;

      }
    }
  } else {
    event.preventDefault();
    return false;
  }

});
	</script>
<!-- Modal -->
<div id="thanks_msg" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="thanks_msg_inner-container">
        <div class="thanks-orange">
          <div class="thanks_round_img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/thanks-check.png" alt="">
          </div>
          <h1>Thank You!</h1>
          <h2>Your Seat is confirmed.</h2>
          <p>Please check your email shortly for details.</p>
        </div>
        <div class="thanks-white">
          <h3>Take your career to the Next Level</h3>
          <div class="logo_center"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/talent-blue.png"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="headermy">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 hdr_left">
                <div class="makes">
                    <span>What</span>
                    <strike>Who</strike> makes a 
                </div>
                <div class="great_ldr">
                    Great Leader: 
                </div>
                <div class="men_women">
                    Men or Women?
                </div>
                <div class="shifting_gender">
                    Shifting the Focus from
                </div>
                <div class="shifting_gender"> 
                    Gender Bias to Competence
                </div>
                <div class="register_watch">
                    Register to Watch the <span>Leadership Talk Series</span> Online!
                </div>
                <div class="association">
                    <ul>
                        <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/elsa.png" alt="Elsa"></li>
                        <li><span>with</span></li>
                        <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/t-edge-live-talk.png" alt="Talentedge"></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 hdr_right">
                <div class="registration_blue">
                   <div class="count-timer"> 
                  <span id="future_date"></span> 
                  <span class="fl date-time">Days</span> 
                  <span class="fl date-time">Hours</span> 
                  <span class="fl date-time">Minutes</span> 
                  <span class="fl date-time">Seconds</span> 
                </div>
                    <form action="<?php echo get_option('siteurl') ?>/elsa-registration/" id="myform"  method="post" >
                        <input type="hidden" id="utmsource" name="utmsource" value="<?php echo $utm;?>" />
                        <div class="registration_form_main">
                            <div class="registration_form">
                                <input type="text" name="user_login" id="user_login"  placeholder="Name" required>
                            </div>
                            <div class="registration_form">
                                <input type="email" name="user_email" id="user_email" placeholder="Email id" required>
                            </div>
                            <div class="registration_form">
                                <input type="text" minlength="10" pattern="[789][0-9]{9}" maxlength="10" name="phone_number" id="phone_number" required onkeyup="check(); return false;" placeholder="Mobile No." required><span id="message"></span>
                            </div>
                            <button id="signup" name="signup" class="btn btn-success book_seat" style="display:none;">Book your seat</button>
                           <!--<input type="submit" name="submit" value="Book your seat" class="book_seat">-->
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header end here -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 padd-55">
            <ul class="spkr_list">
                <li>
                    <div class="spkr_round">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/pramath-sinha.jpg" alt="Pramath Sinha">
                    </div>
                    <div class="spk_name">
                        Pramath Sinha
                    </div>
                    <div class="spkr_designation">
                        Visionary Educationist, Ex-McKinsey Alumnus
                    </div>
                    <div class="spkr_timing">
                        Date: 6th January, 2018
                    </div>
					<div class="spkr_hrs">
                11 AM - 12 PM
              </div>
                </li>
                <li>
                    <div class="spkr_round">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/vinita-bali.jpg" alt="Vinita Bali">
                    </div>
                    <div class="spk_name">
                        Vinita Bali
                    </div>
                    <div class="spkr_designation">
                        Business Leader, Independent Director & Former MD of Britannia Industries
                    </div>
                    <div class="spkr_timing">
                        Date: 13th January, 2018
                    </div>
					<div class="spkr_hrs">
                12 PM - 1 PM
              </div>
                </li>
				<li>
              <div class="spkr_round">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/ishita-anand.jpg" alt="Ishita Anand">
              </div>
              <div class="spk_name">
                Ishita Anand
              </div>
              <div class="spkr_designation">
                Founder and CEO of BitGiving
              </div>
              <div class="spkr_timing">
                Date: 20th January, 2018
              </div>
              <div class="spkr_hrs">
                11 AM - 12 PM
              </div>
            </li>
            </ul>
        </div>
    </div>    
</div>
<!-- speaker section end here -->
<div class="mid_blue padd-55">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <h2 class="mid_head white">
                    Become a leader of the future!
                </h2>
                <p>
                    ELSA and Talentedge Live Talks aim to talk about breaking the stereotype against gender biased leadership and shifting the focus to competency, learning and right attitude.
                </p>
                <p>
                    Understand new learning and competency methods to bridge the gap between the demand and supply of emerging skills required to become a leader in today's day and age. Through the talks we aim to challenge the traditional thought process of leadership and educate ourselves with relevant skills and practices to suceed and become a leader of the future.
                </p>
                <p>
                    If you dream of becoming a Leader of the future, the time is now. Adopt the new way of learning and equip yourself with the right competency and skills.
                </p>
                <p class="register_txt">
                    Register to watch the sessions online! What are you waiting for?
                </p>
            </div>
        </div>
    </div>
</div>
<!-- mid blue section end here -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 padd-55">
            <h2 class="spkr_head">About the Speakers</h2>
            <div class="spkr_btm">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="spkr_rct_img">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/pramath-sinha.jpg" alt="Pramath Sinha">
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <p class="spkr_mar-btm spkr_intro">
                        <strong>Pramath Sinha</strong> has worked in diverse fields spanning business and strategy, consulting, leadership and academia. He spent 12 years with McKinsey & Company in North America and India, heading leadership and media practices. He was the Group MD and CEO of ABP Pvt Ltd., a $200 million Indian media conglomerate with interests in newspapers, magazines, television and online. 
                    </p>
                    <p class="spkr_intro">
                        He was also the Founder and Trustee of Ashoka University (ashoka.edu.in), India’s first liberal arts university. His most recent venture is the Vedica Scholars Programme for Women in Delhi, an alternative master’s in business administration (MBA) programme.
                    </p>
                </div>
            </div>
			<div class="spkr_btm">
<div class="hidden-md col-sm-4 col-xs-12 visible-sm visible-xs">
                <div class="spkr_rct_img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/vinita-bali.jpg" alt="Vinita Bali">
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <p class="spkr_mar-btm spkr_intro">
                    <strong>Vinita Bali</strong> is a global business leader with extensive experience in leading large Companies both in India and overseas. She has worked with eminent multinationals like The Coca-Cola Company and Cadbury Schweppes PLC in a variety of Marketing, General Management and Chief Executive roles in the UK, Nigeria, South Africa, Latin America and the USA, in addition to Britannia Industries Ltd., in India. 
                </p>
                <p class="spkr_intro">
                    Effective April 2014, Vinita moved from a full time operational role as MD & CEO in Britannia to pursue her wide-ranging interests in the corporate and development sectors, through a portfolio of roles and responsibilities.
                </p>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs">
                <div class="spkr_rct_img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/vinita-bali.jpg" alt="Vinita Bali">
                </div>
            </div>
			</div>
			 <div class="col-md-3 col-sm-4 col-xs-12">
              <div class="spkr_rct_img">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/ishita-anand.jpg" alt="Ishita Anand">
              </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
              <p class="spkr_mar-btm spkr_intro">
                <strong>Ishita Anand</strong> is the Founder and CEO of BitGiving, India’s leading online crowdfunding platform which helps raise funds online and gives wings to entrepreneurial ideas, creative minds and social issues. Anand’s infectious energy, perseverance and foresightedness has helped BitGiving grow from a two member company to a leader in the crowdfunding niche.  Named in the Forbes Under 30 List for Asia in 2017, Ishita is passionate about building products and is a self confessed geek . 
              </p>
              <p class="spkr_intro">
                An erstwhile film-maker, Anand is an alumnus of Lady Shri Ram College. She is also affiliated with the Lean In Foundation and is heading the circles for Women Entrepreneurs in India.
              </p>
            </div>
        </div>
    </div>
</div>
<!-- speaker info section end here -->
<div class="footermy">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 padd-55">
                <h3 class="ftr_head">Share the Event and Spread the Word</h3>
                <ul class="icon-effect icon-effect-1a social_list">
                    <li>
					
                        <div class="fb-share-button" data-href="https://talentedge.in/elsa-registration/" data-layout="button" data-size="large" data-mobile-iframe="true">
                            <a class="icon" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftalentedge.in%2Felsa-registration%2F&amp;src=sdkpreparse','popup','width=600,height=600'); return false;"  href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftalentedge.in%2Felsa-registration%2F&amp;src=sdkpreparse"><i class="fa fa-facebook"></i></a>

                        </div>
                        <span class="social_txt">Interested, I'm attending</span>
                          <!--<a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                          <span class="social_txt">Interested, I'm attending</span>-->
                    </li>
                    <li>
                        <a target="popup" data-text="Attend the Leadership Talk Series live and listen to iconic business leaders and successful entrepreneur share their leadership mantra " data-url="https://talentedge.in/elsa-registration/"  href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Flocalhost%2Fprateek%2Finterview-program%2Fwap4.php&ref_src=twsrc%5Etfw&text=%40TalentedgeEdu%20I%E2%80%99am%20attending%20the%20ELSA%20and%20Talentedge%20Live%20Talk%20Series%20on%20Leadership.%20Click%20below%20to%20register%20and%20listen%20to%20iconic%20business%20leaders%20%26%20successful%20entrepreneur%20share%20their%20leadership%20mantra!&tw_p=tweetbutton&url=https%3A%2F%2Ftalentedge.in%2Felsa-registration%2F"  class="icon"><i class="fa fa-twitter"></i></a>
                        <span class="social_txt">Tweet to @TalentedgeEdu</span>
                    </li>
                    <li>

                        <a target="popup" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Ftalentedge.in%2Felsa-registration%2F&title=Register%20to%20attend%20the%20Leadership%20Talk%20Series%20Online%20%7CELSA%20with%20Talentedge%20Live%20Talks&summary=Listen%20to%20iconic%20business%20leaders%20and%20successful%20entrepreneur%20share%20their%20leadership%20mantra%20%E2%80%93%20learn%20what%20it%20takes%20to%20become%20a%20leader%20of%20the%20future&source=LinkedIn','popup','width=600,height=600'); return false;" href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Ftalentedge.in%2Felsa-registration%2F&title=Register%20to%20attend%20the%20Leadership%20Talk%20Series%20Online%20%7CELSA%20with%20Talentedge%20Live%20Talks&summary=Listen%20to%20iconic%20business%20leaders%20and%20successful%20entrepreneur%20share%20their%20leadership%20mantra%20%E2%80%93%20learn%20what%20it%20takes%20to%20become%20a%20leader%20of%20the%20future&source=LinkedIn"  class="icon"><i class="fa fa-linkedin"></i></a>
                        <span class="social_txt">Share with my network</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="fb-root"></div>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
	<script type="text/javascript">
    $(document).ready(function(){
      $('#future_date').countdowntimer({
    dateAndTime : "2018/01/20 11:00:00",
    });
    });
  </script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>  
<?php get_footer(); ?>

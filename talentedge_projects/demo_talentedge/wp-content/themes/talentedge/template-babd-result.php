<?php
/* *
 * The template for displaying about us page.
 *
 * Template Name: business analytics  result
 *
 */
 wp_head(); 
 
  //$current_user = wp_get_current_user();
  //if user is already login 
	//check  he gave test 
	 //yes: redirect to edit-profile ($current_user->ID!=0)($already_score!=0)
	 //no: 	redirect to login		($current_user->ID!=0)($already_score==0)
	 
	 
  /*  if($current_user->ID==0)
  { */
	 
$str=($_REQUEST['token']);
$sliq_id= base64_decode($str);
//echo "sliq_id is".$sliq_id;
//$sliq_id=1;
if(empty($sliq_id))
{
	echo "something went wrong"; 
}
else
{

$batch_id='88';


 $sliqData = array();
          
		  
           
            $sliqData['user_id'] = $sliq_id;
            $sliqData['batch_id'] = $batch_id;
           

		$fields_string = http_build_query($sliqData);
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "Api/getAssesmentResult");
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
		//print_r($result);
		
			$decode = json_decode($result, true);
			
		$user_sliq=$decode['resultData'][0]['StudentTestAttempt']['student_id'];
		$duration=$decode['resultData'][0]['StudentTestAttempt']['duration'];
		$attempt=$decode['resultData'][0]['StudentTestAttempt']['attempt_questions'];
		$correct=$decode['resultData'][0]['StudentTestAttempt']['correct_questions'];
		$score=$decode['resultData'][0]['StudentTestAttempt']['marks_obtained'];
		
		$score_array=array(
			'duration' => $duration ,
			'attempt' => $attempt ,
			'correct'=> $correct,
			'score' => $score,
		);
		
		$scoredata=serialize($score_array);
		
		
		
		 
		 
		global $wpdb;
		$tablename=$wpdb->prefix . 'users';
		
		$sql = "SELECT * FROM  ".$tablename."  WHERE sliq_id = ".$user_sliq;
		$user_detail= $wpdb->get_results($sql);
		$user_id=$user_detail[0]->ID;
		$name=$user_detail[0]->display_name;
		$email=$user_detail[0]->user_email;
		$tablename1=$wpdb->prefix . 'usermeta';
		$sqlm = "SELECT COUNT(*) FROM  ".$tablename1."  WHERE user_id = '".$user_id."' && meta_key='babd_assesment_score'";
		$already_score=$wpdb->get_var($sqlm);

		 if ($already_score==0)
		 {  
			add_user_meta( $user_id, 'babd_assesment_score',$score);
			add_user_meta( $user_id, 'babd_assesment_score_detail',$scoredata);
			add_user_meta( $user_id, 'babd_assesment_date',date('Y-m-d'));
			
			 $subject="  Your Score for BABD Assessment";
			  $headers = array('Content-Type: text/html; charset=UTF-8',
			   'From:  Talentedge <admission@talentedge.in>');
			  $html="Dear ".$name.",<br/><br/>";
			 if($score>=6)
			 {
           
				$html.="Congratulations! You have successfully completed the assessment. <br/>
				Your score was <strong>".$score."</strong>. <br/>
				 Our counsellors will get in touch with you soon with more information on the next steps for enrolling into the Executive Certificate Program in Business Analytics and Big Data. <br/><br/><br/>";
			
			
			 }
			 else
			 {
				 
				$html.="Your score was <strong>".$score."</strong>.  <br/> Unfortunately, that does not meet the minimum requirement to clear the eligibility criteria for the Executive Certificate Program in Business Analytics and Big Data.<br/>However, our counsellors will get in touch with you soon with more information on alternative course options for you.<br/><br/><br/>";
				 
			 }
			 $html.="Thanks,<br/>Team Talentedge";
			 wp_mail($email,$subject,$html,$headers);
		 }
		 
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Analytics & Big Data</title>
    <link href="<?php echo  get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo  get_template_directory_uri();?>/css/babd-style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="main_wrappr">
      <div class="container top_logo_cont">
        <div class="row">
         <div class="col-md-1 col-xs-3"> 
         <a href="<?php echo site_url();?>/iim-kashipur"> <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/iim-kashipur.png"></a>
         </div>
         <div class="col-md-3 col-xs-9 pull-right text-right"> 
          <a href="<?php echo site_url();?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/t-edge-white.png"></a>
         </div>
        </div>
      </div>
      <div class="container mid_hdr_cont">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div class="thanks-left">
              <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/thanks-left.png" alt="" class="img-responsive">
            </div>
          </div>
          <div class="col-md-8 col-xs-12">
            <div class="col-md-10 col-sm-12 col-xs-12 no-padding">
              <div class="thnks_top_head">
               
				
				<?php 
				$name=$decode['resultData'][0]['User']['fname']. " ".$decode['resultData'][0]['User']['lname'];
				if($decode['resultData'][0]['StudentTestAttempt']['marks_obtained']>=6)
				
				{  
					echo "Congratulations ".$name.", You have cleared the assessment";
				}
				else { echo  "<span>".$name.",</span> Your Assessment is Complete.";
				} ?>
              </div>
              <div class="thnks_top_head">
                Your Score: 
              </div>
              <div class="clearfix"></div>
              <div class="col-xs-12 mid-attempt-cont">
                <ul class="attemt-list">
                  <li>
                    <div class="attempt-white-round">
                      <?php 
					  
					  $time_test= $decode['resultData'][0]['StudentTestAttempt']['duration']; 
					  //$time_test=67;
					   if($time_test<60)
					   { echo "00 : ".sprintf("%02s", $time_test);
					   }
					   else
					   {
						$tt=$time_test%60;
						$tmt=$time_test/60;
					    echo sprintf("%02s",(int)$tmt)." : ".sprintf("%02s", $tt);
					  }
					  ?>
                      <span>
					 
					  min : sec</span>
                    </div>
                    <div class="attempt-txt">
                      Time Taken
                    </div>
                  </li>
                  <li>
                    <div class="attempt-white-round">
                      <?php echo $decode['resultData'][0]['StudentTestAttempt']['attempt_questions']; ?>
                    </div>
                    <div class="attempt-txt">
                      Questions Attempted
                    </div>
                  </li>
                  <li>
                    <div class="attempt-white-round">
                       <?php echo $decode['resultData'][0]['StudentTestAttempt']['correct_questions']; ?>
                    </div>
                    <div class="attempt-txt">
                      Questions Correct
                    </div>
                  </li>
                  <li>
                    <div class="attempt-white-round">
                      <?php echo $decode['resultData'][0]['StudentTestAttempt']['marks_obtained']; ?>
                    </div>
                    <div class="attempt-txt">
                      Total Score
                    </div>
                  </li> 
                </ul>
              </div>
            </div>
            <div class="clearfix"></div>
            <p class="info-txt-inst">
			<?php if($decode['resultData'][0]['StudentTestAttempt']['marks_obtained']>=6)
				
				{
					
					
					echo "Our counsellors with connect with you shortly to assist you with the enrolment process. Alternately <a href='".site_url()."/iim-kashipur/executive-certificate-program-business-analytics-big-data/'><strong>Click Here</strong></a> to complete the enrolment process yourself.";
				}
				else
				{
				echo "Our counsellors will connect with you for next step. You may also get in touch with us at <span>8376000600</span> or  write to us at <a href='mailto:enquiry.dtd@talentedge.in'><span>enquiry.dtd@talentedge.in</span></a> "	;
				}
			
			
			?>
			
            </p>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
    </div>
    <script src="<?php echo  get_template_directory_uri();?>/js/jquery.min.js"></script>
    <script src="<?php echo  get_template_directory_uri();?>/js/bootstrap.min.js"></script>
  </body>
</html> 
<?php 
}
/* }
  else{
	   $url=site_url().'/edit-profile';
			header("Location: $url");
  } */
wp_foot();
?>
<?php
if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
require_once 'include/entryPoint.php';
require_once('modules/ACL/ACLController.php');
?>
<!DOCTYPE html>
<html>
		<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<title>Exam Booking Manager</title>
				<!--<script type="text/javascript" src="cache/include/javascript/sugar_grp1_jquery.js?v=wUfeT5IQUbwii78MflriMw"></script>
				<script type="text/javascript" src="cache/include/javascript/sugar_grp1_yui.js?v=wUfeT5IQUbwii78MflriMw"></script>
				<script type="text/javascript" src="cache/include/javascript/sugar_grp1.js?v=wUfeT5IQUbwii78MflriMw"></script>
				<script type="text/javascript" src="include/javascript/calendar.js?v=wUfeT5IQUbwii78MflriMw"></script>
				<script type="text/javascript" src="custom/modules/Leads/include/js/popup.js"></script>
				<link href="themes/SuiteR/css/bootstrap.min.css" rel="stylesheet">
					<link href="themes/SuiteR/css/footable.core.css" rel="stylesheet" type="text/css" />
					 <link rel="stylesheet" type="text/css" href="include/javascript/qtip/jquery.qtip.min.css" />
					 <link rel="stylesheet" type="text/css" href="cache/themes/SuiteR/css/yui.css?v=wUfeT5IQUbwii78MflriMw" />
					 <link rel="stylesheet" type="text/css" href="include/javascript/jquery/themes/base/jquery.ui.all.css" />
					 <link rel="stylesheet" type="text/css" href="cache/themes/SuiteR/css/deprecated.css?v=wUfeT5IQUbwii78MflriMw" />
					 <link rel="stylesheet" type="text/css" href="cache/themes/SuiteR/css/style.css?v=wUfeT5IQUbwii78MflriMw" />
					<link rel="stylesheet" type="text/css" href="themes/SuiteR/css/colourSelector.php"> -->
				<style type="text/css">
				.modalContentpop th, .modalContentpop td {
					border: none;
					padding: 0;
					width: 240px;
				}
				.modalContentpop {
					background-color: #F6F6F6 !important;;
					border-bottom-right-radius: 0px !important;
					border-bottom-left-radius: 0px !important;
					padding: 10px 30px !important;
					overflow: auto;
					min-height:none !important;
				}
				.modalContentpop input[type=text]{
					WIDTH: 190PX !important;
				}
				.modalContentpop select {
					WIDTH: 190PX !important;
				}
				.modalContentpop textarea {
					WIDTH: 190PX !important;
				}
				.dumbBoxpop {
					width: 80% !important;
					position: relative;
					margin: 0 auto;
					background-color: white !important;
					padding: -1px;
					border: 2px solid #009688;
					border-radius: 0px !important;
				}
				.modalHeaderpop h4 {
					margin: 6px 0 5px 0 !important;
					color: #fff;
				}
				.closeModalpop {
					top: 7px !important;
				}
				.head_textpop {
					display: inline-block;
					max-width: 100%;
					margin-top: 8px;
					font-weight: 700;
					font-size:14px;
				}
				.modalHeaderpop {
					min-height: 41px !important;
					background: #333 none repeat scroll 0 0 !important;
					border-top-left-radius: 0px !important;
					border-top-right-radius: 0px !important;
					border-bottom: 2px solid #CCC!important;
					text-align: -webkit-center;
					text-align: center;
					padding-top: 6px !important;
				}
				.vertical-offsetpop {
					width: 85% !important;
				}
				.buttonpop {
					background-color: #ef5350 !important;
					margin: 10px 0px !important;
					padding: 10px 115px !important;
					font-size: 16px !important;
				}
				.button {
					background-color: #ef5350 !important;
					margin: 10px 0px !important;
					padding: 9px 115px !important;
					font-size: 16px !important;
				}
				.text {
					margin:  7px 0px !important;
					padding: 6px 21px !important;
					font-size: 20px  !important;
				}


				</style>
				<script type="text/javascript">
				Calendar.setup ({
				   inputField : "date_of_prospect_date_d",
				   daFormat : "%Y-%m-%d %I:%M%P",
				   button : "date_of_prospect_trigger_d",
				   singleClick : true,
				   dateStr : "",
				   step : 1,
				   weekNumbers:false,
				});

				Calendar.setup ({
				   inputField : "date_of_callback_date_d",
				   daFormat : "%Y-%m-%d %I:%M%P",
				   button : "date_of_callback_trigger_d",
				   singleClick : true,
				   dateStr : "",
				   step : 1,
				   weekNumbers:false,
				});


				Calendar.setup ({
				   inputField : "date_of_followup_date_d",
				   daFormat : "%Y-%m-%d %I:%M%P",
				   button : "date_of_followup_trigger_d",
				   singleClick : true,
				   dateStr : "",
				   step : 1,
				   weekNumbers:false,
				});
				
				</script></head>
		<body>
				<div class="dumbBoxWrap" id="atomBox"> 
							<div class="dumbBoxOverlay"></div>
								<div class="dumbBox dumbBoxpop">
									<div class="modalHeader modalHeaderpop">
										<h4>Exam Booking Manager</h4>
											</div>
												<div class="modalContent modalContentpop">
														<span id="call_status" style="color:red">&nbsp;</span>
														<form name="search_form" id="search_form" class="search_form" method="post" action="">
																		<table width="100%" cellspacing="0" cellpadding="0" border="0">
																			 <tbody>
																					<tr>      
																						<td scope="row" nowrap="nowrap" width="1%">		
																							<label for="batch_basic">Enter Student Enrollment ID :</label>
																						</td>
																						<td nowrap="nowrap" width="10%">			
																							<input name="enroll_id" type="text" class="text"  value="" id='enroll_id' required>
																						</td>
																					
																						<td  colspan="8">
																							<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="search_form" value="Submit" id="search_enrollid">&nbsp;
																							<input tabindex="2" title="Clear" onclick="SUGAR.searchForm.clear_form(this.form); return false;" class="button" type="button" name="clear" id="search_form_clear" value="Clear Enroll ID">
																					</tr>
																			</tbody>
																		</table>
															</form>
																																
<?php
			if(isset($_POST['search_form']) && !empty($_POST['search_form']) && !empty($_POST['enroll_id'])){
					global $db;		
					if($_POST['enroll_id']!=""){
						$enrollID=$_POST['enroll_id'];
						$_SESSION['registration_no']=$_POST['enroll_id'];
								
						$sqls="SELECT s.`name`,s.email,s.id AS studentid,s.mobile,sb.added_specialization,b.id as batch_id,b.name as course,sb.id,sb.current_sems AS currentsemid,csem.name AS currentsemname FROM `te_student` AS s INNER JOIN te_student_te_student_batch_1_c as ssbr ON ssbr.te_student_te_student_batch_1te_student_ida=s.id INNER JOIN te_student_batch as sb ON sb.id=ssbr.te_student_te_student_batch_1te_student_batch_idb INNER JOIN te_ba_batch AS b ON b.id=sb.te_ba_batch_id_c INNER JOIN te_te_semester AS csem ON sb.current_sems = csem.id WHERE s.deleted=0 AND s.`registration_no`='".$enrollID."'";
								
								$studentObj =$db->query($sqls);
								$studentifo=array();
								while($Srow =$db->fetchByAssoc($studentObj)){ 
									  $studentifo[]=$Srow;
									  $studentID =$Srow['studentid'];
									  $currenrsemID =$Srow['currentsemid'];
									  $_SESSION['student']=$Srow['studentid'];
								
								}
					//print_r($studentifo);die;
								/* fetch Booked Subject */
									if(!empty($studentifo)){
										
													$DupSql="SELECT exm.id,exm.exam_status,exm.subject,sem.name AS semname FROM `te_exammanager` AS exm INNER JOIN te_te_subject_te_te_semester_c AS semsubrel ON exm.subject=semsubrel.te_te_subject_te_te_semesterte_te_subject_idb INNER JOIN te_te_semester AS sem ON semsubrel.te_te_subject_te_te_semesterte_te_semester_ida=sem.id WHERE (exm.deleted=0) AND (exm.te_student_id_c='".$studentID."') AND (exm.exam_status IN ('Active','Pass'))";
														$DupObj =$db->query($DupSql);
															$BookedSubject = [];
															while($Duprow =$db->fetchByAssoc($DupObj)){
																  $BookedSubject[]=$Duprow['subject'];
															}
															
													/* Query 3 for */
													#$examsql="SELECT essr.`te_examschedules_te_te_semesterte_examschedules_idb` AS scheduleid ,examdate_rel.te_examschb597hedules_idb AS dateid,exam_dates.name AS subject,exam_dates.te_te_subject_id_c,exam_dates.exam_date,exam_dates.exam_time FROM `te_examschedules_te_te_semester_c` AS essr INNER JOIN te_examschedules AS es ON es.id=essr.`te_examschedules_te_te_semesterte_examschedules_idb` INNER JOIN te_examschedules_te_exam_date_schedules_1_c AS examdate_rel ON examdate_rel.te_examschedules_te_exam_date_schedules_1te_examschedules_ida=essr.`te_examschedules_te_te_semesterte_examschedules_idb` INNER JOIN te_exam_date_schedules AS exam_dates ON exam_dates.id=examdate_rel.te_examschb597hedules_idb WHERE essr.`te_examschedules_te_te_semesterte_te_semester_ida` IN('".$currentsemID."') AND es.deleted=0 AND es.status='Active' ORDER BY exam_dates.exam_date ASC ";	
													#$examsql="SELECT s1.name AS subjectname,t1.te_in_institutes_id_c,t1.start_date AS startdate,t1.end_date AS enddate,tedel.subjects AS subjectID,tedel.course,tedel.start_date AS datelist,tedel.exam_slots,tedel.batch FROM `te_exam` AS t1 INNER JOIN te_exams_details_te_exam_c AS trel ON t1.id=trel.te_exams_details_te_examte_exam_ida INNER JOIN te_exams_details AS tedel ON trel.te_exams_details_te_examte_exams_details_idb =tedel.id INNER JOIN te_te_subject As s1 ON s1.id=tedel.subjects WHERE tedel.semeters In('".$currenrsemID."') AND t1.status=1";
														$examsql="SELECT s1.name AS subjectname,t1.te_in_institutes_id_c,t1.start_date AS startdate,t1.end_date AS enddate,tedel.subjects AS subjectID,tedel.course,tedel.start_date AS datelist,tedel.exam_slots,tedel.batch FROM `te_exam` AS t1 INNER JOIN te_exams_details_te_exam_c AS trel ON t1.id=trel.te_exams_details_te_examte_exam_ida INNER JOIN te_exams_details AS tedel ON trel.te_exams_details_te_examte_exams_details_idb =tedel.id INNER JOIN te_subjects_master As s1 ON s1.id=tedel.subjects WHERE tedel.semeters In('".$currenrsemID."') AND t1.status=1 AND tedel.deleted=0 GROUP BY s1.id";
														$examObj =$db->query($examsql);
															$examdetals=array();
															$subjectdetals=array();  
															while($examrow =$db->fetchByAssoc($examObj)){ 
																  $examdetals[]=$examrow;
																  $subjectdetals[]=$examrow['subjectID'];
																  $datelist=$examrow['datelist'];
																 # $end_date=$examrow['enddate'];
																  $slotslist=$examrow['exam_slots'];
																  
																}
																  if($datelist!=''){
																  $dropdowndatelist=(explode(",",$datelist));	
																  }
																  if($slotslist!=''){
																  $dropdownslotlist=(explode(",",$slotslist));	
																  }
																   
													
									}
									if(empty($studentifo)){
										
														echo '<script> alert("Wrong Id Or Record Not Found In dataBase Please Check")</script>';
										}
								
						}
											?>
											<table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">
													<thead></br></br><hr>
																			<!-- Student Personal information Display -->
															<?php foreach($studentifo as $info){?>
																			<tr height="20">
																						<td width="30%">
																							<strong>Name-</strong><?php echo $info['name']?><br>
																							<strong>Email-</strong><?php echo $info['email']?><br>
																							<strong>Course-</strong><?php echo $info['course']?>
																						</td>
																						<td>
																							<strong>Mobile-</strong><?php echo $info['mobile']?><br>
																							<strong>Specialization-</strong><?php echo $info['added_specialization']?><br>
																							<strong>Current Semsester-</strong><?php echo $info['currentsemname']?>
																						</td>
																					</tr>
																					<br>
																				</hr>
																	</table><?php  }																													
					} /* isset form*/
					/* Booking Form Start */
					if(isset($_POST['Book-Exam']) && $_POST['Book-Exam']=="Book-Exam"){
						global $db;	
						$sql = "INSERT INTO te_exammanager (id,subject,city,state,exam_date,date_entered,te_student_id_c,exam_status,name,exam_time) VALUES";
							$postvalus=array();
							/*for($i=0; $i < count($_POST['subjectid']);$i++){
							$postvalus[] = "('".create_guid()."','".$_POST['subjectid'][$i]."','".$_POST['city'][$i]."','".$_POST['state'][$i]."','".$_POST['date'][$i]."','".date('Y-m-d H:i:s')."','".$_SESSION['studentsessionid']."')";
							}*/
							for($i=0; $i < count($_POST['subjectid']);$i++){
								
								$update_data="select subject from te_exammanager where subject='".$_POST['subjectid'][$i]."' AND te_student_id_c='".$_SESSION['student']."' And exam_status='fail'";
								$data=$db->query($update_data);
								
								if($data->num_rows){
									$update_query_manager="Update te_exammanager set exam_status='booked' where subject='".$_POST['subjectid'][$i]."' AND te_student_id_c='".$_SESSION['student']."' And exam_status='fail'";
									$update=$db->query($update_query_manager);
								}
								
								$postvalus[] = "('".create_guid()."','".$_POST['subjectid'][$i]."','".$_POST['city'][$i]."','".$_POST['state'][$i]."','".$_POST['date'][$i]."','".date('Y-m-d H:i:s')."','".$_SESSION['student']."','Active','".$_SESSION['registration_no']."','".$_POST['slots'][$i]."')";		
							}
							$sql .= join(',', $postvalus);
							$QueryInS=$GLOBALS['db']->Query($sql);
							if($QueryInS){
								unset($_SESSION['studentsessionid']);
								unset($_SESSION['student']);
								echo '<script> alert("You have Sucessfully Booked your Exam Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_ExamManager&action=index"} </script>';
								exit();
								}
						}
						if(!empty($examdetals)){
						?>
						<hr>
						<form name="search_form2" id="search_form2" class="search_form2" method="post" action="">
												<table id="tableID" cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">	
														
														
														<tr height="23">
															<th scope="col" data-hide="phone" class="footable-visible footable-first-column">	
																<strong>Subjects</strong>
															</th>
															
															<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
																<strong>Exam Dates</strong>
															</th>
															<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
																<strong>Exam Slots</strong>
															</th>
															<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
																<strong>State</strong>
															</th>		
															<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
																<strong>City</strong>
															</th>				
														</tr>
														<tr height="20" class="oddListRowS1">
														<?php /* Indian Staet Display Here */
														
														$city_list=array();
														$indiastate=$indiastate[]=$GLOBALS['app_list_strings']['indian_states'];
														$cities=$cities[]=$GLOBALS['app_list_strings']['cities_list'];
														
														foreach($cities as $key_city=>$city){
															$statecode=explode('_',$key_city);
															$code=$statecode[0];
															
															$city_list[$code][]=$city;
														}
														foreach($examdetals as $k_val=>$values) { 
													
														$sql="select `exam_status`,`subject` from te_exammanager where te_student_id_c='".$studentID."' && subject='".$values['subjectID']."'";
														$exam_status=$db->query($sql);
														
														if($exam_status->num_rows>0){
															
														while($Srow =$db->fetchByAssoc($exam_status)){ 
												
															if($Srow['exam_status']!='Active' && $Srow['exam_status']!='Pass' && $Srow['exam_status']!='booked'){?>
																
																<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
																	<input type="checkbox" id="<?php echo $values['subjectID']?>_check" name="subjectid[]" value="<?php echo $values['subjectID']; ?>" checked class="text" required><?php echo $values['subjectname']; ?>
																</td>
													<!-- <td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$subject_info.$key}</td>
													<input type="hidden" value="{$key}" name="subjectid[]"/> -->	
													<td align="left" valign="top" type="relate" field="batch" class="inlineEdit footable-visible footable-last-column">
														<select name="date[]" id="<?php echo $values['subjectID']; ?>_date" class="text" required>
																<option  value="" >Select Date</option>
																<?php foreach($dropdowndatelist as $key){?>
																<option  value="<?php echo $key ?>" ><?php echo $key ?></option>
																<?php } ?>
														</select>
													</td>
													<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
														<select name="slots[]"  id="<?php echo $values['subjectID']; ?>_slot" class="text" data="slots" required>
															<option  value="" >Select Slots</option>
															<?php foreach($dropdownslotlist as $key){ ?>
															<option  value="<?php echo $key ?>" ><?php echo $key ?></option>
															
															<?php }?>
														</select>
														<script> 
															
															$('#<?php echo $values['subjectID']; ?>_slot').change(function () {
																
																var date=$('#<?php echo $values['subjectID']; ?>_date').val();
																
																var time = $(this).find(':selected')[0].value;
																 var c=0;
																<?php foreach($examdetals as $k=>$val) { ?>
																
																	var data_time=$('#<?php echo $val['subjectID']; ?>_slot').val();
																	var data_date=$('#<?php echo $val['subjectID']; ?>_date').val();
																	
																	if(time==data_time && date==data_date){
																		c++;
																	}
																<?php } ?>
																
																
																if(c>1){
																	alert("Same time and date not allowed!!");
																	$(this).val('');
																}
																
																});
															</script>
													</td>				 
													<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
														<select name="state[]" id="<?php echo $values['subjectID']; ?>_state" class="text state" required>
															<option  value="" >Select State</option>
														<?php foreach($indiastate as $key=>$statedata){ ?>
															<option value="<?php echo $key ?>"><?php echo $statedata?></option>
														<?php } ?>
														</select>
													</td>

													<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
														<select name="city[]" id="<?php echo $values['subjectID']; ?>_city" class="text city" required>
															<option  value="" >Select City</option>
															
															<script>
															$('#<?php echo $values['subjectID']; ?>_state').change(function () {
																var key = $(this).find(':selected')[0].value;
																var $newdiv1 = "<div id='object1'></div>" ;
																<?php foreach($city_list as $key=>$val){?>
																	
																     if(key=='<?= $key?>'){
																		 <?php foreach($val as $k=>$v){?>
																		 
																		   $newdiv1 +='<option value="<?php echo $v ?>"><?php echo $v?></option>';
																		 
																		 <?php }?>
																			$("#<?php echo $values['subjectID']; ?>_city").html(" ");
																			$("#<?php echo $values['subjectID']; ?>_city").html($newdiv1);
																		 
																	 }
																	<?php }?>
												
																});
															</script>
															
														</select>
													</td>	
															<?php }
															else if($Srow['exam_status']=='Active'){
																$sub[]= $values['subjectname'];
																$sub_id[]=$values['subjectID'];
															}
														}
														}
														else{?>
														<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
														<input type="checkbox" id="<?php echo $values['subjectID']?>_check" name="subjectid[]" value="<?php echo $values['subjectID']; ?>" checked class="text" required><?php echo $values['subjectname']; ?>
													</td>
													<!-- <td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$subject_info.$key}</td>
													<input type="hidden" value="{$key}" name="subjectid[]"/> -->	
													<td align="left" valign="top" type="relate" field="batch" class="inlineEdit footable-visible footable-last-column">
														<select name="date[]" id="<?php echo $values['subjectID']; ?>_date" class="text" required>
																<option  value="" >Select Date</option>
																<?php foreach($dropdowndatelist as $key){?>
																<option  value="<?php echo $key ?>" ><?php echo $key ?></option>
																<?php } ?>
														</select>
													</td>
													<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
														<select name="slots[]" id="<?php echo $values['subjectID']; ?>_slot" class="text" required>
															<option  value="" >Select Slots</option>
															<?php foreach($dropdownslotlist as $key){ ?>
															<option  value="<?php echo $key ?>" ><?php echo $key ?></option>
															<?php }?>
														</select>
														<script>
															$('#<?php echo $values['subjectID']; ?>_slot').change(function () {
																
																var date=$('#<?php echo $values['subjectID']; ?>_date').val();
																
																var time = $(this).find(':selected')[0].value;
																 var c=0;
																<?php foreach($examdetals as $k=>$val) { ?>
																
																	var data_time=$('#<?php echo $val['subjectID']; ?>_slot').val();
																	var data_date=$('#<?php echo $val['subjectID']; ?>_date').val();
																	
																	if(time==data_time && date==data_date){
																		c++;
																	}
																<?php } ?>
																
																
																if(c>1){
																	alert("Same time and date not allowed!!");
																	$(this).val('');
																}
																
																});
														</script>
													</td>				 
													<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
														<select name="state[]" id="<?php echo $values['subjectID']; ?>_state"  class="text state" required>
															<option  value="" >Select State</option>
														<?php foreach($indiastate as $key=>$statedata){ ?>
															<option value="<?php echo $key ?>"><?php echo $statedata?></option>
														<?php } ?>
														</select>
													</td>

													<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
														<select name="city[]" id="<?php echo $values['subjectID']; ?>_city" class="text city" required>
															<option  value="" >Select City</option>
															
															<script>
															$('#<?php echo $values['subjectID']; ?>_state').change(function () {
																var key = $(this).find(':selected')[0].value;
																var $newdiv1 = "<div id='object1'></div>" ;
																<?php foreach($city_list as $key=>$val){?>
																	
																     if(key=='<?= $key?>'){
																		 <?php foreach($val as $k=>$v){?>
																		 
																		   $newdiv1 +='<option value="<?php echo $v ?>"><?php echo $v?></option>';
																		 
																		 <?php }?>
																			$("#<?php echo $values['subjectID']; ?>_city").html(" ");
																			$("#<?php echo $values['subjectID']; ?>_city").html($newdiv1);
																		 
																	 }
																	<?php }?>
												
																});
															</script>
														</select>
													</td>	
													<?php 
														}
													?>
													</tr>
													<script>
													$('#<?php echo $values['subjectID']?>_check').click(function(){ 
														  
														if($(this).is(":not(:checked)")){
															$('#<?php echo $values['subjectID']?>_date').attr('disabled','true');
															$('#<?php echo $values['subjectID']?>_slot').attr('disabled','true');
															$('#<?php echo $values['subjectID']?>_state').attr('disabled','true');
															$('#<?php echo $values['subjectID']?>_city').attr('disabled','true');
															$('#<?php echo $values['subjectID']?>_date').removeAttr('required');
															$('#<?php echo $values['subjectID']?>_slot').removeAttr('required');
															$('#<?php echo $values['subjectID']?>_state').removeAttr('required');
															$('#<?php echo $values['subjectID']?>_city').removeAttr('required');
															$(this).removeAttr('required');
														}
														else{
															
															$('#<?php echo $values['subjectID']?>_date').removeAttr('disabled');
															$('#<?php echo $values['subjectID']?>_slot').removeAttr('disabled');
															$('#<?php echo $values['subjectID']?>_state').removeAttr('disabled');
															$('#<?php echo $values['subjectID']?>_city').removeAttr('disabled');
														}
															
													}); 
													</script>
													<?php	}
													foreach($studentifo as $info){
														$enroll_id=$_POST['enroll_id'];
														$student_name=$info['name'];
														$course_name=$info['course'];
														$batch_id=$info['batch_id'];
														$current_sem=$info['currentsemname'];
													}
													if(count($sub)>0){?>
														<h3>this subject <?php echo implode(',',$sub)?> has been booked Now...Proceed to Generate <a href="index.php?entryPoint=admitcardEntryPoint&studentID=<?php echo $studentID ?>&enrollno=<?php echo $enroll_id?>&s_name=<?php echo $student_name?>&c_name=<?php echo $course_name?>&sem=<?php echo $current_sem?>&batch=<?php echo $batch_id?>" class="admit_card" id="admit_card" value="<?php  echo implode(',',$sub_id)?>" data="<?php echo $studentID ?>" target="_blank">Admit card</a></h3>
													 
													<?php }?>
																
													<script>
													$("#a").click(function(){
														
														var subjectID=$(this).attr("value");
														var studentID=$(this).attr("data");
														
														$.ajax({
														  url: "index.php?entryPoint=admitcardEntryPoint",
														  type: "POST",
														  data: {
															"source":"admit_card",
															"subjectID":subjectID,
															"studentID":studentID
														  },
														  success: function(msg){
															  
																 $("#admit_card").attr('href','http://localhost/srmpune/index.php?entryPoint=admitcardEntryPoint&msg='+msg+'&enrollno=<?php echo $enroll_id?>&s_name=<?php echo $student_name?>&c_name=<?php echo $course_name?>&sem=<?php echo $current_sem?>')
																	.attr('download', '')
																		.attr('target', '_blank'); 
														  }
													   });
													});

													</script>
												
													</table></br></br>
													<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="Book-Exam" value="Book-Exam" id="search_form2" style="text-align:center;">&nbsp;
		
													
							</form>
						<?php } ?>
		

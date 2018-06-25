<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class update_lead_status
    {
        function after_save_updateleads($bean, $event, $arguments)
        {
			global $current_user,$db;

			$RegistSql="SELECT registration_no FROM  te_student where id='".$bean->te_student_te_student_batch_1te_student_ida."' and deleted=0";
			$RegistObj =$db->query($RegistSql);
			$Regist_id =$db->fetchByAssoc($RegistObj);

			/* For Dispatch Save*/
			// if(empty($bean->fetched_row['id'])){
      if(!empty($bean->current_sems)){

				$item                       = new te_DispatchRequest();
				$item->name                 = $Regist_id['registration_no'];
				$item->te_student_id_c      = $bean->te_student_te_student_batch_1te_student_ida;
				$item->te_ba_batch_id_c     = $bean->te_ba_batch_id_c;
				$item->semester_c          	= $bean->current_sems;
				$item->status          		="waiting_for_approval";
        $item->program_c           =$bean->program;
				$item->save();
			}

			if($bean->te_ba_batch_id_c !='' && empty($bean->name)){
					$Upsql="UPDATE te_student_batch SET name = '".$bean->batch."' WHERE id='" .$bean->id ."'";
					$db->query($Upsql);}

					if(!empty($bean->current_sems)){

						$CurentSemSql="SELECT name FROM  te_te_semester where id='".$bean->current_sems."' and deleted=0";
						$CurentsemObj =$db->query($CurentSemSql);
						$CurrentsemName =$db->fetchByAssoc($CurentsemObj);
						/*
						$id=create_guid();

						$tebatchSqldata="INSERT into te_dispostion_student_batch(id,current_sems,current_sem,sem_status,name,description) Values ('".$id."','".$bean->current_sems."','".$CurrentsemName['name']."','".$bean->sem_status."','".$CurrentsemName['name']."','".$bean->description."')";

						$tebatchSqlObjdata =$db->query($tebatchSqldata);

						$tebatchSqlrelation="INSERT into te_dispostion_student_batch_te_student_batch_c(id,te_dispostion_student_batch_te_student_batchte_student_batch_ida,te_dispostbc52t_batch_idb) Values ('".$id."0034','".$bean->id."','".$id."')";

						$tebatchSqlObjrelation =$db->query($tebatchSqlrelation);*/

						//echo $bean->id;

						$dispositionCall = new te_Dispostion_student_batch();
						//print_r($dispositionCall);die;
						$dispositionCall->current_sems        = $bean->current_sems;
						$dispositionCall->current_sem        = $CurrentsemName['name'];
						$dispositionCall->sem_status 		  = $bean->sem_status;
						//$dispositionCall->date_time   = $bean->date_time;
						$dispositionCall->name        = $CurrentsemName['name'];
						$dispositionCall->description        = $bean->description;
						$dispositionCall->te_dispostion_student_batch_te_student_batchte_student_batch_ida = $bean->id;
						//print_r($dispositionCall);die;
						$dispositionCall->save();


					}
					if(!empty($bean->batch)){

						$bean->name =$bean->batch;

						}

					if($bean->status=='Dropout'){

					  $user_id=$current_user->id;
					  $dispo_id=$this->__create_guid();
					  $current_date=date('Y-m-d H:i:s');
					  $leadid = $bean->leads_id;
					  $te_disposition_leads_c=$this->__create_guid();

					  $tebatchSql="UPDATE te_student_batch set is_new=0,is_new_dropout=1 WHERE id='". $bean->id."'";
					  $tebatchSqlObj =$db->query($tebatchSql);

					  $leadSql="UPDATE leads set status='Dropout',status_description='Dropout' WHERE id='".$leadid."'";
					  $leadObj =$db->query($leadSql);

					  $leadDispoSql="INSERT INTO `te_disposition`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `assigned_user_id`, `status`, `status_detail`) VALUES ('".$dispo_id."','Dropout','".$current_date."','".$current_date."','".$user_id."','".$user_id."','".$user_id."','Dropout','Dropout')";
					  $leadDispoObj =$db->query($leadDispoSql);

					  $leadDispoRelSql="INSERT INTO `te_disposition_leads_c`(`id`, `date_modified`, `te_disposition_leadsleads_ida`, `te_disposition_leadste_disposition_idb`) VALUES ('".$te_disposition_leads_c."','".$current_date."','".$leadid."','".$dispo_id."')";
					  $leadDispoRelObj =$db->query($leadDispoRelSql);
					}
            /*  Istitute And Program and batch code save NEW SRM*/

				if($bean->te_ba_batch_id_c !=''){
					 global $db;
					 $PrSQl="SELECT pgm.id AS programid,pgm.name AS proname,i.id AS insid,i.name AS insname,b.* from te_pr_programs AS pgm INNER JOIN te_pr_programs_te_ba_batch_1_c AS pr ON pgm.id=pr.te_pr_programs_te_ba_batch_1te_pr_programs_ida INNER JOIN te_in_institutes_te_pr_programs_1_c AS ipr ON ipr.te_in_institutes_te_pr_programs_1te_pr_programs_idb=pgm.id INNER JOIN te_in_institutes AS i ON i.id=ipr.te_in_institutes_te_pr_programs_1te_in_institutes_ida INNER JOIN te_ba_batch AS b ON b.id=pr.te_pr_programs_te_ba_batch_1te_ba_batch_idb WHERE pr.te_pr_programs_te_ba_batch_1te_ba_batch_idb	='".$bean->te_ba_batch_id_c."'";
					 $programObj = $GLOBALS['db']->query($PrSQl);
					 $Programobjs = $GLOBALS['db']->fetchByAssoc($programObj);

					 $tebatchSqle="UPDATE te_student_batch set te_pr_programs_id_c='".$Programobjs['programid']."',te_in_institutes_id_c='".$Programobjs['insid']."',batch_code='".$Programobjs['batch_code']."',fee_usd='".$Programobjs['fees_in_usd']."',fee_inr='".$Programobjs['fees_inr']."' WHERE id='". $bean->id."'";
					 $tebatchSqlObje =$db->query($tebatchSqle);
				/* add payment paln subpannel value */
					if($bean->fetched_row == false){
					$paymentID=$bean->payment_plan;
					$PmytSql="SELECT ins.payment_inr,ins.payment_usd,ins.due_date,ins.date_modified,ins.id FROM te_installments AS ins INNER JOIN `te_te_paymentplan_te_installments_1_c` pir ON ins.id=pir.`te_te_paymentplan_te_installments_1te_installments_idb` WHERE pir.`te_te_paymentplan_te_installments_1te_te_paymentplan_ida`='".$paymentID."' AND ins.deleted=0 order by ins.due_date ASC";
					$installments          = array('1' => '1st', '2' => '2nd', '3' => '3rd', '4' => '4th', '5' => '5th', '6' => '6th', '7' => '7th');
					$paymentInstallmentObj = $GLOBALS['db']->query($PmytSql);

					$service_tax =  18;//getTaxStatus($student_id,$bean->date_entered);
					$country = 'india';
					$discount= 0;
					$index = 1;
					while ($paymentInstallments = $GLOBALS['db']->fetchByAssoc($paymentInstallmentObj))
					{

						$studentPaymentObj              = new te_student_payment_plan();
						$studentPaymentObj->name        = $installments[$index] . ' Installment';
						$studentPaymentObj->paid        = 'No';
						$studentPaymentObj->due_date    = $paymentInstallments['due_date'];
						$studentPaymentObj->description = 'Installment';

						$payment_inr                       = $paymentInstallments['payment_inr'];
						$tax                               = (($payment_inr * $service_tax) / 100);
						$total_amount                      = ($payment_inr + $tax);
						$studentPaymentObj->fees           = $payment_inr;
						$studentPaymentObj->tax            = $service_tax;
						$studentPaymentObj->total_amount   = $total_amount;

						$studentPaymentObj->paid_amount_inr = 0;
						$studentPaymentObj->paid_amount_usd = 0;
						$studentPaymentObj->te_student_id_c = $bean->te_student_te_student_batch_1te_student_ida;
						$studentPaymentObj->te_student_batch_te_student_payment_plan_1te_student_batch_ida = $bean->id;
						if($totalInstallments==$index){
							  $studentPaymentObj->discount=$discount;
							  //$country = $LeadDetails['country_log'];
								  if((empty($country) || strtolower($country)=='india')){
									$studentPaymentObj->due_amount_inr = $total_amount-$discount;
									$studentPaymentObj->due_amount_usd  = $paymentInstallments['payment_usd'];
									$studentPaymentObj->balance_inr = $studentPaymentObj->due_amount_inr;
									$studentPaymentObj->balance_usd = $studentPaymentObj->due_amount_usd;
								  }
									  else{
										$studentPaymentObj->due_amount_inr = $total_amount;
										$studentPaymentObj->due_amount_usd  = $paymentInstallments['payment_usd']-$discount;
										$studentPaymentObj->balance_inr = $studentPaymentObj->due_amount_inr;
										$studentPaymentObj->balance_usd = $studentPaymentObj->due_amount_usd;
										}
									}
								else{
								  $studentPaymentObj->discount=0;
								  $studentPaymentObj->due_amount_inr = $total_amount;
								  $studentPaymentObj->due_amount_usd  = $paymentInstallments['payment_usd'];
								  $studentPaymentObj->balance_inr = $studentPaymentObj->due_amount_inr;
								  $studentPaymentObj->balance_usd = $studentPaymentObj->due_amount_usd;
								}
									$studentPaymentObj->save();
									unset($studentBatchObj);
									$index++;
					}


				}
			}

        }

					function __create_guid() {
					$microTime = microtime();
					list($a_dec, $a_sec) = explode(" ", $microTime);
					$dec_hex = dechex($a_dec * 1000000);
					$sec_hex = dechex($a_sec);
					$this->__ensure_length($dec_hex, 5);
					$this->__ensure_length($sec_hex, 6);
					$guid = "";
					$guid .= $dec_hex;
					$guid .= $this->__create_guid_section(3);
					$guid .= '-';
					$guid .= $this->__create_guid_section(4);
					$guid .= '-';
					$guid .= $this->__create_guid_section(4);
					$guid .= '-';
					$guid .= $this->__create_guid_section(4);
					$guid .= '-';
					$guid .= $sec_hex;
					$guid .= $this->__create_guid_section(6);

					return $guid;
				}
					function __create_guid_section($characters) {
						$return = "";
						for ($i = 0; $i < $characters; $i++) {
							$return .= dechex(mt_rand(0, 15));
						}
						return $return;
					}
				  function __ensure_length(&$string, $length) {
					  $strlen = strlen($string);
					  if ($strlen < $length) {
						  $string = str_pad($string, $length, "0");
					  } else if ($strlen > $length) {
						  $string = substr($string, 0, $length);
					  }
				  }
    }
// Code Creted By manish At 2 dec-2018
?>

<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php');

	class addStudentPaymentClass
	{

		function makePayment($bean, $event, $argument)
		{
					if (!isset($_REQUEST['import_module']) && (($_REQUEST['module'] == "Leads") || (isset($_REQUEST['entryPoint']) && $_REQUEST['entryPoint'] == 'transferbatch') || (isset($_REQUEST['entryPoint']) && $_REQUEST['entryPoint'] == 'migrate_student') || (isset($_REQUEST['entryPoint']) && $_REQUEST['entryPoint'] == 'web_lead_payment')))
					{
						global $sugar_config;
						$service_tax =  getTaxStatus($student_id,$bean->date_entered);

						/*Get Batch Discount*/
						$discount = 0;
						$BatchDetailsSql = "SELECT * FROM te_ba_batch WHERE id= '" . $bean->te_ba_batch_id_c . "'";
						$BatchDetailsObj = $GLOBALS['db']->query($BatchDetailsSql);
						$BatchDetails = $GLOBALS['db']->fetchByAssoc($BatchDetailsObj);

						$LeadDetailsSql = "SELECT * FROM leads WHERE id= '" . $bean->leads_id . "'";
						$LeadDetailsObj = $GLOBALS['db']->query($LeadDetailsSql);
						$LeadDetails = $GLOBALS['db']->fetchByAssoc($LeadDetailsObj);
						if(isset($LeadDetails['country_log'])){
						  $country = $LeadDetails['country_log'];
						  if(empty($country) || strtolower($country)=='india'){
							$discount = $discount+$BatchDetails['discount_in_inr'];
						  }
						  else{
							$discount = $discount+$BatchDetails['discount_in_usd'];
						  }
						  
						  if(!empty($LeadDetails['discount']) && $LeadDetails['discount']>0){
							//$discount = $discount+$LeadDetails['discount'];
							$discount = $LeadDetails['discount'];
						  }

						}
						/*Batch Discount Ends HERE*/

						#If student's batch first time is being created
						 $paymentInstallmentSql = "SELECT te_installments.* FROM te_installments INNER JOIN te_ba_batch_te_installments_1_c rel ON te_installments.id=rel.te_ba_batch_te_installments_1te_installments_idb WHERE rel.te_ba_batch_te_installments_1te_ba_batch_ida= '" . $bean->te_ba_batch_id_c . "' AND te_installments.deleted=0 ORDER BY te_installments.due_date";
						$installments          = array('1' => '1st', '2' => '2nd', '3' => '3rd', '4' => '4th', '5' => '5th', '6' => '6th', '7' => '7th');
						$paymentInstallmentObj = $GLOBALS['db']->query($paymentInstallmentSql);

						$studentPaymentObj              = new te_student_payment_plan();
						$studentPaymentObj->name        = 'Initial Payment';
						$studentPaymentObj->description = 'Initial Payment';
						$studentPaymentObj->paid        = 'No';

						$studentPaymentObj->due_date = $bean->initial_payment_date;

						$initial_payment_inr               = $bean->initial_payment_inr;
						$tax                               = (($initial_payment_inr * $service_tax) / 100);
						$total_amount                      = ($initial_payment_inr + $tax);
						$studentPaymentObj->fees           = $initial_payment_inr;
						$studentPaymentObj->tax            = $service_tax;
						$studentPaymentObj->total_amount   = $total_amount;
						$studentPaymentObj->due_amount_inr = $total_amount;

						$studentPaymentObj->paid_amount_inr = 0;

						$studentPaymentObj->due_amount_usd  = $bean->initial_payment_usd;
						$studentPaymentObj->paid_amount_usd = 0;

						$studentPaymentObj->balance_inr = $studentPaymentObj->due_amount_inr;
						$studentPaymentObj->balance_usd = $studentPaymentObj->due_amount_usd;

						$studentPaymentObj->te_student_id_c                                                = $bean->te_student_te_student_batch_1te_student_ida;
						$studentPaymentObj->te_student_batch_te_student_payment_plan_1te_student_batch_ida = $bean->id;

						$studentPaymentObj->save();
						$index               = 1;
						$totalInstallments = $paymentInstallmentObj->num_rows;
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
							//$studentPaymentObj->due_amount_inr = $total_amount;

							$studentPaymentObj->paid_amount_inr = 0;

							//$studentPaymentObj->due_amount_usd  = $paymentInstallments['payment_usd'];
							$studentPaymentObj->paid_amount_usd = 0;

							//$studentPaymentObj->balance_inr = $studentPaymentObj->due_amount_inr;
							//$studentPaymentObj->balance_usd = $studentPaymentObj->due_amount_usd;

							$studentPaymentObj->te_student_id_c                                                = $bean->te_student_te_student_batch_1te_student_ida;
							$studentPaymentObj->te_student_batch_te_student_payment_plan_1te_student_batch_ida = $bean->id;
							if($totalInstallments==$index){
							  $studentPaymentObj->discount=$discount;
							  $country = $LeadDetails['country_log'];
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
        /* Statr Code Manish 20 jan
        elseif ($_REQUEST['module'] == "te_student_batch" && $bean->status == "Dropout" && $bean->dropout_status == "Pending")
        {
            global $db;
            $userSql    = "SELECT user_name as email, CONCAT(first_name,' ',last_name) as name FROM users WHERE deleted=0 AND status='Active' AND designation='BUH'";
            $userObj    = $db->query($userSql);
            $user       = $db->fetchByAssoc($userObj);
            $recipients = $user['email'];
            $template   = "<p>Hello " . $user['name'] . "</p>
						<p>You have assigned one batch for dropout approval request</p>
						<p> Please feel free to reach out to your counsellor for any other information.</p>

							<p>Regards,</p>
							<p>Student Relations Manager</p>
							<p>Enquiries and Customer Support, Contact No: +91-8376000600 </p>";
            $mail       = new NetCoreEmail();
            $mail->sendEmail($recipients, "Batch Dropout Request", $template);
        }
   End Code     */  
        # certifecate Sent mail
        /* Start certifecate
        if ($_REQUEST['module'] == "te_student_batch" && $bean->certificate_sent == "1")
        {
            global $db;

            $studentSql   = "SELECT email,name FROM `te_student` WHERE id = '" . $bean->te_student_te_student_batch_1te_student_ida . "'";
            $studentObj   = $db->query($studentSql);
            $student      = $db->fetchByAssoc($studentObj);
            $studentemail = $student['email'];

            $template = "<p>Dear " . $student['name'] . "</p>
						<p>Greetings from Talentedge!</p>
						<p>You have to sent Certificate  </p>
						<p>Please have a look and take action accordingly</p>
						<p> Please feel free to reach out to your counsellor for any other information.</p>

							<p>Regards,</p>
							<p>Student Relations Manager</p>
							<p>Enquiries and Customer Support, Contact No: +91-8376000600 </p>";

            $mail = new NetCoreEmail();
            $mail->sendEmail($studentemail, "Certificate Sent", $template);
        }
End certifecate Send  */
        # kit sent mail
        /* Start
        if ($_REQUEST['module'] == "te_student_batch" && $bean->kit_status == "Sent")
        {
            global $db;

            #$Sql="SELECT name,subject,body,body_htmlFROM `email_templates` WHERE id ='34f00439-5df8-1da6-f3be-57c4365eadb6' AND deleted=0";
            #	$Obj= $GLOBALS['db']->query($Sql);
            #	$stu = $GLOBALS['db']->fetchByAssoc($Obj);


            $studentSql   = "SELECT email,name FROM `te_student` WHERE id = '" . $bean->te_student_te_student_batch_1te_student_ida . "'";
            $studentObj   = $db->query($studentSql);
            $student      = $db->fetchByAssoc($studentObj);
            $studentemail = $student['email'];

            $template = "<p>Dear " . $student['name'] . "</p>
						<p>Greetings from Talentedge!</p>
						<p>You have to sent Program Kit  </p>
						<p>Please have a look and take action accordingly</p>
						<p> Please feel free to reach out to your counsellor for any other information.</p>

							<p>Regards,</p>
							<p>Student Relations Manager</p>
							<p>Enquiries and Customer Support, Contact No: +91-8376000600 </p>";

            $mail = new NetCoreEmail();
            $mail->sendEmail($studentemail, "Program Kit", $template);
        }
        End */ 

        # DropOut Request Send ---3------
        /* Statt Comment Manish20 Jan
        if ($_REQUEST['module'] == "te_student_batch" && $bean->status == "Dropout")
        {
            global $db;

            $studentSql = "SELECT email,name FROM `te_student` WHERE id = '" . $bean->te_student_te_student_batch_1te_student_ida . "'";

            $studentObj   = $db->query($studentSql);
            $student      = $db->fetchByAssoc($studentObj);
            $studentemail = $student['email'];

            $template = "<p>Dear " . $student['name'] . "</p>
						<p>Greetings from Talentedge!</p>
						<p>Your Dropout Request has been registered for with Talentedge.</p>
						<p>Please have a look and take action accordingly</p>
						<p> Please feel free to reach out to your counsellor for any other information.</p>

							<p>Regards,</p>
							<p>Student Relations Manager</p>
							<p>Enquiries and Customer Support, Contact No: +91-8376000600 </p>";

            $mail = new NetCoreEmail();
            $mail->sendEmail($studentemail, "Dropout Request", $template);
        }
        End Code*/
    }

}

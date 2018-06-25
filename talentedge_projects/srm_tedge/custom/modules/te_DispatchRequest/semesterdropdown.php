<?php 

if(isset($_REQUEST['batchIdsem']) && $_REQUEST['batchIdsem']!=""){
	
	global $db;
	
	$status=$_REQUEST['batchIdsem'];
	
	$batchSqlS="SELECT sem.name,sem.id from te_te_semester sem INNER JOIN te_pr_programs_te_te_semester_1_c prsem ON prsem.te_pr_programs_te_te_semester_1te_te_semester_idb =sem.id INNER JOIN te_pr_programs_te_ba_batch_1_c AS pbt ON pbt.te_pr_programs_te_ba_batch_1te_pr_programs_ida=prsem.te_pr_programs_te_te_semester_1te_pr_programs_ida WHERE sem.deleted=0 AND prsem.deleted=0 AND pbt.te_pr_programs_te_ba_batch_1te_ba_batch_idb='".$status."'";
	$batchObje =$db->query($batchSqlS);
	$SEmOptions=array('status'=>'error','id'=>'');
	while($rows =$db->fetchByAssoc($batchObje)){ 
		$SEmOptions['res'][]=$rows;
	}	
	if(!empty($SEmOptions['res'])){
		$SEmOptions['status']='ok';
	}
	echo json_encode($SEmOptions);	
}

if(isset($_REQUEST['batchIdcourse']) && $_REQUEST['batchIdcourse']!=""){
	global $db;
	$status=$_REQUEST['batchIdcourse'];
	
	$batchSqlS="select p.name,p.id from (SELECT te_pr_programs_te_ba_batch_1te_pr_programs_ida as course_id FROM `te_pr_programs_te_ba_batch_1_c` t_course INNER JOIN  te_ba_batch batch ON t_course.te_pr_programs_te_ba_batch_1te_ba_batch_idb=batch.id WHERE batch.id='".$status."')  batch_c INNER JOIN te_pr_programs p ON batch_c.course_id= p.id";
	$batchObje =$db->query($batchSqlS);
	$SEmOptions=array('status'=>'error','id'=>'');
	while($rows =$db->fetchByAssoc($batchObje)){ 
		$SEmOptions['res'][]=$rows;
	}	
	if(!empty($SEmOptions['res'])){
		$SEmOptions['status']='ok';
	}
	echo json_encode($SEmOptions);	
}

if($_POST['source']=='approve'){
	global $db;
	
	$query ="UPDATE te_dispatchrequest SET status='approved' where id='".$_POST['id']."'; ";
	$result = $db->Query($query);
	
	echo "Status Updated!";
}

if($_POST['source']=='complete'){
	global $db;
	
	$query1 ="UPDATE te_dispatchrequest SET status='completed' where id='".$_POST['id']."'; ";
	$result1 = $db->Query($query1);
	
	echo "Status Updated!";
}


if($_POST['source']=='hold'){
	global $db;
	$query1 ="UPDATE te_dispatchrequest SET status='hold',reason='".$_POST['centre']."' where id='".$_POST['id']."'; ";
	$result1 = $db->Query($query1);
	
	echo "Status Updated!";
}

if($_POST['source']=='disapprove'){
	global $db;
	
	$query1 ="UPDATE te_dispatchrequest SET status='disapproved',reason='".$_POST['centre']."' where id='".$_POST['id']."'; ";
	$result1 = $db->Query($query1);
	
	echo "Status Updated!";
}

?>

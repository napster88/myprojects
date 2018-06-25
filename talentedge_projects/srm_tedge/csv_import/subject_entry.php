<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;
$query="SELECT * FROM `batches` ";

$result = $db->Query($query);
$sub_arry=array();
//$batchbean = BeanFactory::newBean('te_pr_Programs');
while ($row =$db->fetchByAssoc($result)){
		$subjectbean = BeanFactory::newBean('te_Subjects_master');
	$subjectbean->sliq_subjects_id=$row['id'];
	$subjectbean->name=$row['name'];
	$subjectbean->subject_code=$row['short_code'];
	$subjectbean->deleted='0';
	$subjectbean->overall_total_marks='100';
	$subjectbean->overall_passing_marks='30';

	$subjectbean->save();
	$semsBean = BeanFactory::newBean('te_te_semester');
	$semsList = $semsBean->get_full_list('name',"te_te_semester.sliq_semester_id = '$row[semester_id]'",1,-1);
	$sembean_id=$semsList[0]->id;
	$sub_arry[$subjectbean->id]=$sembean_id;

}

print_r($sub_arry);

foreach($sub_arry as $subbean => $sembean)
{
$bean_id=create_guid();

$query1="INSERT INTO `te_subjects_master_te_te_semester_1_c`(`id`,`te_subjects_master_te_te_semester_1te_subjects_master_ida`, `te_subjects_master_te_te_semester_1te_te_semester_idb`) VALUES ('$bean_id' , '$subbean', '$sembean')";
$db->Query($query1);

echo $query1;

/*	$subjectbean1 = BeanFactory::getBean('te_Subjects_master',$subbean);
	$subjectbean1->load_relationship('te_subjects_master_te_te_semester_1');
	$subjectbean1->te_subjects_master_te_te_semester_1->add($sembean);
	$subjectbean1->save();
*/

}


?>

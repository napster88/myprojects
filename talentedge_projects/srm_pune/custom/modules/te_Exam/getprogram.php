<?php


$instBean = BeanFactory::getBean('te_in_institutes',$_POST['int_id']);
$instBean->load_relationship('te_in_institutes_te_pr_programs_1');
$data=$instBean->te_in_institutes_te_pr_programs_1->getBeans();

//print_r($data->id);
$proglist=array();
foreach($data as $key=>$val)
{
$proglist[$val->id]=$val->name;
}
echo json_encode($proglist);
//print_r($proglist);
//die();

 ?>

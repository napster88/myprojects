<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class DispatchView{

	function dispatchstatus($bean, $event, $argument){

			global $db;

			$html = '<a id="'.$bean->id.'_a" data-beanId="'.$bean->id.'" data-beanAction="approve" class="btn btn-success btn-block disp_btn">Approved</a>
			<a id="'.$bean->id.'_d" data-beanId="'.$bean->id.'" data-beanAction="disapprove" class="btn btn-danger btn-block disp_btn">Disaproved</a>
			<a id="'.$bean->id.'_h" data-beanId="'.$bean->id.'" data-beanAction="hold" class="btn btn-warning btn-block disp_btn">Hold</a>
			<a id="'.$bean->id.'_c" data-beanId="'.$bean->id.'" data-beanAction="complete" class=" btn btn-info btn-block disp_btn">Complete</a>
			<a id="'.$bean->id.'_r" data-beanId="'.$bean->id.'" data-beanAction="return" class="btn btn-default btn-block disp_btn">Return</a>';

			if($bean->status == "Approved" || $bean->status == "Hold"){

				$html='<a id="'.$bean->id.'_c" data-beanId="'.$bean->id.'" data-beanAction="complete" class=" btn btn-info btn-block disp_btn">Complete</a>
				<a id="'.$bean->id.'_r" data-beanId="'.$bean->id.'" data-beanAction="return" class="btn btn-default btn-block disp_btn">Return</a>';
			}

			if($bean->status == "Disapproved" || $bean->status == "Return"){
				$html = '';
			}

			if($bean->status =="Hold"){
				$html='<a id="'.$bean->id.'_a" data-beanId="'.$bean->id.'" data-beanAction="approve" class="btn btn-success btn-block disp_btn">Approved</a>
				<a id="'.$bean->id.'_d" data-beanId="'.$bean->id.'" data-beanAction="disapprove" class="btn btn-danger btn-block disp_btn">Disaproved</a>
				<a id="'.$bean->id.'_c" data-beanId="'.$bean->id.'" data-beanAction="complete" class=" btn btn-info btn-block disp_btn">Complete</a>
				<a id="'.$bean->id.'_r" data-beanId="'.$bean->id.'" data-beanAction="return" class="btn btn-default btn-block disp_btn">Return</a>';

			}

			if($bean->status =="Completed"){
				$html = '';
			}

		$bean->institute_id=$html;

		$sql="select `name` from te_te_semester where id='".$bean->semester_c."'";
		$semester_name=$db->query($sql);
		$name =$db->fetchByAssoc($semester_name);
		$bean->semester_c=$name['name'];


		$sqlprog="select `name` from te_pr_programs where id='".$bean->program_c."'";
		$semester_nameprog=$db->query($sqlprog);
		$nameprog =$db->fetchByAssoc($semester_nameprog);
		$bean->program_c=$nameprog['name'];

	}
}

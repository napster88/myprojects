<?php /* Code Date 14-Jan-2018 By-Mniash Kumar Code For insert Exam marks */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php');
require_once('include/MVC/View/SugarView.php');
class te_Exam_resultViewExamresultsscreen extends SugarView {

		public function __construct() {
			parent::SugarView();
		}

		public function display() {
global $db;

		$enroll_id= $_POST['search_student_exam'];


		 	$query="SELECT * FROM `te_exam_result` WHERE `name` LIKE '$enroll_id' ";
		$studentObj =$db->query($query);

		while($row =$db->fetchByAssoc($studentObj)){

				$sub_id=$row['te_te_subject_id_c'];
				$subjectbean = BeanFactory::getBean('te_Subjects_master',$sub_id);
			//	echo $subjectbean->name.'-'.$row['total_prsent'].'--'.$row['status'];
			//	echo '<br/>';
		}

							$sugarSmarty = new Sugar_Smarty();
							$sugarSmarty->assign("subject_info",$uniqueSubArr);
							$sugarSmarty->assign("examtypes",$examtypes);
							$sugarSmarty->assign("countexamtype",$countexamtype);
							$sugarSmarty->assign("reportDataList",$reportDataList);
							$sugarSmarty->assign("studentifo",$studentifo);
							$sugarSmarty->assign("studentexaminfo",$studentexaminfo);
							$sugarSmarty->assign("examifo",$examifo);
							$sugarSmarty->assign("search_exam",$search_exam);
							$sugarSmarty->assign("search_filter",$search_examsearch_exam);
							$sugarSmarty->assign("ExamCount",$ExamCount);
							$sugarSmarty->assign("form",$form);
							$sugarSmarty->assign("norecod",$norecod);
							$sugarSmarty->assign("studentifoCount",$studentifoCount);

							$sugarSmarty->display('custom/modules/te_Exam_result/tpls/examresultsscreen.tpl');
	}
		function formate_result($et,$etPassingMarking,$etMaxMarking,$etScoreMarking,$booking_id){
			$formateArr = [];
			foreach($et as $val){
				$formateArr[$val]['passing_marks']=$etPassingMarking[$val];
				$formateArr[$val]['max_marks']=$etMaxMarking[$val];
				$formateArr[$val]['score_marks']=$etScoreMarking[$val];
				$scorepercent = 0;
				$scorepercent = ($formateArr[$val]['score_marks'] / $formateArr[$val]['max_marks']) * 100;
				$formateArr[$val]['score_percent']=$scorepercent;

				if($formateArr[$val]['score_marks']>=$formateArr[$val]['passing_marks']){
					$formateArr[$val]['result_status']='Pass';
				}
				else{
					$formateArr[$val]['result_status']='Fail';
				}

			}
			$failstatus = 0;
			foreach($formateArr as $key=> $val){
				$formateArr['total']+=$val['max_marks'];
				$formateArr['total_passing_marks']+=$val['passing_marks'];
				$formateArr['total_score_marks']+=$val['score_marks'];
				if($val['result_status']=='Fail'){
					$failstatus = 1;
					$formateArr['fail_status']=$failstatus;
				}
				else{
					$formateArr['fail_status']=$failstatus;
				}
			}
			$totalpercent = 0;
			$totalpercent = ($formateArr['total_score_marks'] / $formateArr['total']) * 100;
			$formateArr['total_percent']=$totalpercent;
			$formateArr['booking_id']=$booking_id;

			//print_r($formateArr);
			//echo "hi";
			return $formateArr;

		}
}
?>

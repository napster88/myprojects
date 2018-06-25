<?php if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

if(isset($_REQUEST['type']) && $_REQUEST['type']=='csv_result_template'){
  //set params
  $params = array(
      'module'=> 'te_Exam_result', //the module you want to redirect to
      'action'=>'resultbulk', //the view within that module
  );

	if(isset($_REQUEST['program']) && !empty($_REQUEST['program'])){
    $result  = get_exam_scheme_info($_REQUEST['program']);
    if($result){
      $csv_arr[] = 'institute_code';
      $csv_arr[] = 'Enrollment ID';
      $csv_arr[] = 'batch_code';
      $csv_arr[] = 'Exam Month/Date';
      $csv_arr[] = 'course_code';
      $csv_arr[] = 'semester';
      $csv_arr[] = 'Subject_code';
      foreach ($result as  $value) {
        $csv_arr[] = $value['name'];
      }
      array_to_csv_download(array($csv_arr),"exam_result_upload_template.csv");
    }else{
      SugarApplication::appendErrorMessage('Action Prohibited: No Active Exam Scheme Exists');
      SugarApplication::redirect('index.php?' . http_build_query($params));
    }
  }
  else{
    SugarApplication::appendErrorMessage('Action Prohibited: Program is missing');
    SugarApplication::redirect('index.php?' . http_build_query($params));
  }
}
else{
    SugarApplication::appendErrorMessage('Action Prohibited');
    SugarApplication::redirect('index.php');
}


function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w');
    // loop over the input array
    foreach ($array as $line) {
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter);
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}

function get_exam_scheme_info($pro_id=NULL){
  global $db, $current_user;
  $resArr=[];
  //echo $pro_id;exit();
  $sqlRel = "SELECT et.name FROM `te_exam_scheme` AS es INNER JOIN te_exam_scheme_te_pr_programs_c AS espr ON espr.te_exam_scheme_te_pr_programste_exam_scheme_ida=es.id AND espr.deleted=0 INNER JOIN te_exam_types_te_exam_scheme_c AS etesr ON etesr.te_exam_types_te_exam_schemete_exam_scheme_ida=es.id AND etesr.deleted=0 INNER JOIN te_exam_types AS et ON et.id=etesr.te_exam_types_te_exam_schemete_exam_types_idb AND et.deleted=0 WHERE es.deleted=0 AND es.is_active=1 AND espr.te_exam_scheme_te_pr_programste_pr_programs_idb='".$pro_id."'";
    $rel = $db->query($sqlRel);
		if($db->getRowCount($rel) > 0){
			while($row = $db->fetchByAssoc($rel)){
			$resArr[] = $row;
			}
		}
    return $resArr;
}

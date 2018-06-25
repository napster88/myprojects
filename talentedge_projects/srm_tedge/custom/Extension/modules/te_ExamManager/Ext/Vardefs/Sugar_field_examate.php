<?php
/* Field Created By sugarcrm /suitecrm custom code @manish Gaupta   */ 
$dictionary['te_ExamManager']['fields']['exam_date_c'] =array (			
			'name' => 'exam_date_c',
            'label' => 'Examination Date',
            'type' => 'datetime',
            'default_value' => '',
            'help' => 'Date Field Help Text',
            'comment' => 'Date Field Comment',
            'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'duplicate_merge' => false, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            );
           
            
  $dictionary['te_ExamManager']['fields']['examnation_time'] =array (
			'name' => 'examnation_time',
            'label' => 'Examination Time',
            'type' => 'varchar',
            'help' => 'examnation_time no Details',
            'comment' => 'examnation_time no details',
            'default'=>'',
            'max_size' => 255,
            'required' => true,
            'reportable' => true,
            'audited' => false,
            'importable' => 'true',
            'duplicate_merge' => false,
);      
 ?>

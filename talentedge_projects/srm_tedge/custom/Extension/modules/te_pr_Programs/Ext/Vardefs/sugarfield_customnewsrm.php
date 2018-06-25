<?php
/* Course Short Name */
$dictionary['te_pr_Programs']['fields']['course_Short_name'] =array (
			'name' => 'course_Short_name',
			'vname' => 'Course Short Name',
			'type' => 'varchar',
			'required' => false,
			'comments' => 'course_Short_name',
			'help' => '',
			'importable' => 'false',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'reportable' => false,
			'len' => '50',
			'size' => '50',
		);
?>
	<?php
/* Master Course Qualification Code */
$dictionary['te_pr_Programs']['fields']['master_c_q_Code'] =array (
		   'name' => 'master_c_q_Code',
		   'vname' => 'Master Course Qualification Code',
		   'type' => 'varchar',
		   'required' => true,
		   'comments' => 'Master Course Qualification Code',
		   'help' => '',
		   'default'=> '',
		   'importable' => 'false',
		   'duplicate_merge' => 'disabled',
		   'duplicate_merge_dom_value' => '0',
		   'audited' => false,
		   'reportable' => false,
		   'len' => '50',
		   'size' => '50',
   );
?>
   <?php
/* Master Course Number Of semester Code */
$dictionary['te_pr_Programs']['fields']['no_of_Semester'] =array(
		   'name' => 'no_of_Semester',
		   'vname' => 'No Of Semester',
		   'type' => 'int',
		   'required' => true,
		   'comments' => 'No Of Semester',
		   'help' => '',
		   'default'=> '',
		   'importable' => 'false',
		   'duplicate_merge' => 'disabled',
		   'duplicate_merge_dom_value' => '0',
		   'audited' => false,
		   'reportable' => false,
		   'len' => '50',
		   'size' => '50',
	);
	?>
	<?php
   /* Website link */
$dictionary['te_pr_Programs']['fields']['website_link'] =array(
		   'name' => 'website_link',
		   'vname' => 'Website Link',
		   'type' => 'varchar',
		   'required' => false,
		   'comments' => 'No Of Semester',
		   'help' => '',
		   'default'=> '',
		   'importable' => 'false',
		   'duplicate_merge' => 'disabled',
		   'duplicate_merge_dom_value' => '0',
		   'audited' => false,
		   'reportable' => false,
		   'len' => '255',
		   'size' => '20',
   );
   ?>
   <?php
      /* Running DSK */
$dictionary['te_pr_Programs']['fields']['running_dsk'] =array(
		   'name' => 'running_dsk',
		   'vname' => 'Running Dsk',
		   'type' => 'varchar',
		   'required' => false,
		   'comments' => 'running_dsk',
		   'help' => '',
		   'default'=> '',
		   'importable' => 'false',
		   'duplicate_merge' => 'disabled',
		   'duplicate_merge_dom_value' => '0',
		   'audited' => false,
		   'reportable' => false,
		   'len' => '50',
		   'size' => '50',
	);
	?>
	<?php
  /*  LMS Course ID */
   $dictionary['te_pr_Programs']['fields']['lms_course_id'] =array(
			   'name' => 'lms_course_id',
			   'vname' => 'LMS Course ID',
			   'type' => 'varchar',
			   'required' => false,
			   'comments' => 'LMS Course ID',
			   'help' => '',
			   'default'=> '',
			   'importable' => 'false',
			   'duplicate_merge' => 'disabled',
			   'duplicate_merge_dom_value' => '0',
			   'audited' => false,
			   'reportable' => false,
			   'len' => '50',
			   'size' => '50',
		);
		?>
		<?php
    /* lms_course_url*/
   $dictionary['te_pr_Programs']['fields'][' lms_course_url'] =array(
			   'name' => 'lms_course_url',
			   'vname' => 'LMS Course URL',
			   'type' => 'varchar',
			   'required' => false,
			   'comments' => 'lms_course_url',
			   'help' => '',
			   'default'=> '',
			   'importable' => 'false',
			   'duplicate_merge' => 'disabled',
			   'duplicate_merge_dom_value' => '0',
			   'audited' => false,
			   'reportable' => false,
			   'len' => '255',
			   'size' => '50',
		);
		?>
		<?php
   /*  Sample Certificate Path*/
   $dictionary['te_pr_Programs']['fields']['sample_certificate_path'] =array(
			   'name' => 'sample_certificate_path',
			   'vname' => 'Sample Certificate Path',
			   'type' => 'varchar',
			   'required' => false,
			   'comments' => 'lms_course_url',
			   'help' => '',
			   'default'=> '',
			   'importable' => 'false',
			   'duplicate_merge' => 'disabled',
			   'duplicate_merge_dom_value' => '0',
			   'audited' => false,
			   'reportable' => false,
			   'len' => '255',
			   'size' => '30',
	   );
	   ?>
	   <?php
    /* course_image_path*/
   $dictionary['te_pr_Programs']['fields']['course_image_path'] =array(
			   'name' => 'course_image_path',
			   'vname' => 'Course Image Path',
			   'type' => 'varchar',
			   'required' => false,
			   'comments' => 'lms_course_url',
			   'help' => '',
			   'default'=> '',
			   'importable' => 'false',
			   'duplicate_merge' => 'disabled',
			   'duplicate_merge_dom_value' => '0',
			   'audited' => false,
			   'reportable' => false,
			   'len' => '255',
			   'size' => '30',
	   );
	   ?>
	   <?php
   /* Sample Certificate Path */
   $dictionary['te_pr_Programs']['fields']['sample_certificate_path'] =array(
			   'name' => 'sample_certificate_path',
			   'vname' => 'Sample Certificate Path',
			   'type' => 'varchar',
			   'required' => false,
			   'comments' => 'Sample Certificate Path',
			   'help' => '',
			   'default'=> '',
			   'importable' => 'false',
			   'duplicate_merge' => 'disabled',
			   'duplicate_merge_dom_value' => '0',
			   'audited' => false,
			   'reportable' => false,
			   'len' => '255',
			   'size' => '30',
	   );
	   ?>
	   <?php
   /* Master Batches */
   $dictionary['te_pr_Programs']['fields']['master_batches'] =array(
			   'name' => 'master_batches',
			   'vname' => 'Master Batches',
			   'type' => 'varchar',
			   'required' => false,
			   'comments' => 'master_batches',
			   'help' => '',
			   'default'=> '',
			   'importable' => 'false',
			   'duplicate_merge' => 'disabled',
			   'duplicate_merge_dom_value' => '0',
			   'audited' => false,
			   'reportable' => false,
			   'len' => '100',
			   'size' => '20',
	   );
?>

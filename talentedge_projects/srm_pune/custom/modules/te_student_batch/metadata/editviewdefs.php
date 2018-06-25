<?php
$module_name = 'te_student_batch';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/te_student_batch/student_batch.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'admission_type',
            'studio' => 'visible',
            'label' => 'Admission Type',
          ),
          1 => 
          array (
            'name' => 'te_student_te_student_batch_1_name',
            'displayParams' => 
            array (
              'hide_Buttons' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'batch',
            'studio' => 'visible',
            'label' => 'LBL_BATCH',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'added_specialization',
            'studio' => 'visible',
            'label' => 'Added Specialization',
          ),
          1 => 
          array (
            'name' => 'payment_plan',
            'studio' => 'visible',
            'label' => 'Payment Plan',
          ),
        ),
        3 => 
        array (
          0 => '',
          1 => '',
        ),
        4 => 
        array (
          0 => '',
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'result',
            'studio' => 'visible',
            'label' => 'LBL_RESULT',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'assessment_mode',
            'studio' => 'visible',
            'label' => 'LBL_ASSESSMENT_MODE',
          ),
          1 => 
          array (
            'name' => 'Assessment_center_lcocation_preference',
            'label' => 'LBL_ASSESSMENT_CENTER_LOCATION_PREFERENCE',
          ),
        ),
        7 => 
        array (
          0 => '',
          1 => '',
        ),
        8 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'completion_certificate_address',
            'comment' => 'Full text of the note',
            'label' => 'LBL_COMPLETION_CERTIFICATE_ADDRESS',
          ),
        ),
        9 => 
        array (
          0 => '',
          1 => '',
        ),
        10 => 
        array (
          0 => '',
          1 => '',
        ),
        11 => 
        array (
          0 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'date_of_enrolment',
            'studio' => 'visible',
            'label' => 'Date of Enrolment',
          ),
          1 => 
          array (
            'name' => 'to_be_enrolled_date',
            'studio' => 'visible',
            'label' => 'To Be Enrolled Date',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'course_expiry_date',
            'studio' => 'visible',
            'label' => 'Course Expiry Date',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
        2 => 
        array (
          0 => '',
          1 => '',
        ),
        3 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'current_sems',
            'studio' => 'visible',
            'label' => 'Current Sem',
          ),
          1 => 
          array (
            'name' => 'sem_status',
            'studio' => 'visible',
            'label' => 'Sem Status',
          ),
        ),
        1 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>

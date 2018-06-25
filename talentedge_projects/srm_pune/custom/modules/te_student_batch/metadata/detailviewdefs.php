<?php
$module_name = 'te_student_batch';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
        'LBL_DETAILVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL3' => 
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
            'name' => 'batch',
            'studio' => 'visible',
            'label' => 'LBL_BATCH',
          ),
          1 => 
          array (
            'name' => 'batch_code',
            'label' => 'LBL_BATCH_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'te_student_te_student_batch_1_name',
          ),
          1 => 
          array (
            'name' => 'institute',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'program',
            'studio' => 'visible',
            'label' => 'LBL_PROGRAM',
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
          0 => 'name',
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'fee_inr',
            'label' => 'LBL_FEE_INR',
          ),
          1 => 
          array (
            'name' => 'fee_usd',
            'label' => 'LBL_FEE_USD',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'result',
            'studio' => 'visible',
            'label' => 'LBL_RESULT',
          ),
        ),
        6 => 
        array (
          0 => '',
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'eligible_for_certificate',
            'studio' => 'visible',
            'label' => 'LBL_ELIGIBLE_FOR_CERTIFICATE',
          ),
          1 => 
          array (
            'name' => 'assessment_mode',
            'studio' => 'visible',
            'label' => 'LBL_ASSESSMENT_MODE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'actual_attendance',
            'label' => 'LBL_ACTUAL_ATTENDANCE',
          ),
          1 => 
          array (
            'name' => 'feedback_given',
            'studio' => 'visible',
            'label' => 'LBL_FEEDBACH_GIVEN',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'Assessment_center_lcocation_preference',
            'label' => 'LBL_ASSESSMENT_CENTER_LOCATION_PREFERENCE',
          ),
          1 => 
          array (
            'name' => 'total_session_required',
            'label' => 'LBL_TOTAL_SESSION_REQUIRED',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'channel',
            'label' => 'LBL_CHANNEL',
          ),
          1 => 
          array (
            'name' => 'completion_certificate_address',
            'comment' => 'Full text of the note',
            'label' => 'LBL_COMPLETION_CERTIFICATE_ADDRESS',
          ),
        ),
        11 => 
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
        12 => 
        array (
          0 => 'total_payment',
          1 => 'description',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'refund_request_date',
            'label' => 'LBL_REFUND_REQUEST_DATE',
          ),
          1 => '',
        ),
      ),
      'lbl_detailview_panel2' => 
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
          1 => 'assigned_user_name',
        ),
      ),
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'upload_document',
            'studio' => 'visible',
            'label' => 'Upload Documents',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>

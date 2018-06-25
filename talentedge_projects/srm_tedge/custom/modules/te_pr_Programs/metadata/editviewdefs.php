<?php
$module_name = 'te_pr_Programs';
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
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'te_in_institutes_te_pr_programs_1_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'director_name_c',
            'label' => 'LBL_DIRECTOR_NAME',
          ),
          1 => 
          array (
            'name' => 'email_address_c',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'contact_number_c',
            'label' => 'LBL_CONTACT_NUMBER',
          ),
          1 => 
          array (
            'name' => 'mobile_number_c',
            'label' => 'LBL_MOBILE_NUMBER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'course_Short_name',
            'label' => 'Course Short Name',
          ),
          1 => 
          array (
            'name' => 'master_batches',
            'label' => 'Master Batches',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'filter_stream_name',
            'studio' => 'visible',
            'label' => 'Filter Stream Name',
          ),
          1 => 
          array (
            'name' => 'learning_m_s ',
            'studio' => 'visible',
            'label' => 'Learning Management System',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => ' m_c_qualifecation',
            'studio' => 'visible',
            'label' => 'Master Course Qualification',
          ),
          1 => 
          array (
            'name' => 'payment_gateway',
            'studio' => 'visible',
            'label' => 'Payment Gateway',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'duration',
            'studio' => 'visible',
            'label' => 'Duration',
          ),
          1 => 
          array (
            'name' => 'lms_course_id',
            'label' => 'LMS Course ID',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => ' lms_course_url',
            'label' => 'LMS Course URL',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'master_c_q_Code',
            'label' => 'Master Course Qualification Code',
          ),
          1 => 
          array (
            'name' => 'no_of_Semester',
            'label' => 'No Of Semester',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'running_dsk',
            'label' => 'Running Dsk',
          ),
          1 => 
          array (
            'name' => 'sample_certificate_path',
            'label' => 'Sample Certificate Path',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'course_image_path',
            'label' => 'Course Image Path',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'website_link',
            'label' => 'Website Link',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => '',
          1 => 'description',
        ),
        13 => 
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
            'name' => 'is_active',
            'comment' => 'If check is_active',
            'label' => 'Is Active',
          ),
          1 => 
          array (
            'name' => 'is_add_specialization',
            'comment' => 'If check is_active',
            'label' => 'Is Add Specialization',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'is_free_course ',
            'comment' => 'If check is_active',
            'label' => 'Is Free Course ',
          ),
          1 => 
          array (
            'name' => 'is_service_tax_applicable ',
            'comment' => 'If check is_active',
            'label' => 'Is Service Tax Applicable ',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'is_batch_applicable ',
            'comment' => 'If check is_active',
            'label' => 'Is Batch Applicable',
          ),
          1 => 
          array (
            'name' => 'is_elective',
            'comment' => 'If check Is Elective',
            'label' => 'Is Elective',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'is_specialization',
            'comment' => 'If check is_specialization',
            'label' => 'Is Specialization',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>

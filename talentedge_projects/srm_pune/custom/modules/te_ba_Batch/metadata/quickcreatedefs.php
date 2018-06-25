<?php
$module_name = 'te_ba_Batch';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
            'name' => 'batch_code',
            'label' => 'LBL_BATCH_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'batch_start_date',
            'label' => 'LBL_BATCH_START_DATE',
          ),
          1 => 
          array (
            'name' => 'batch_status',
            'studio' => 'visible',
            'label' => 'LBL_BATCH_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'fees_inr',
            'label' => 'LBL_FEES_INR',
          ),
          1 => 
          array (
            'name' => 'fees_in_usd',
            'label' => 'LBL_FEES_IN_USD',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'minimum_attendance_criteria',
            'label' => 'LBL_MINIMUM_ATTENDANCE_CRITERIA',
          ),
          1 => 
          array (
            'name' => 'duration',
            'label' => 'LBL_DURATION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'registration_closing_date',
            'label' => 'LBL_REGISTRATION_CLOSING_DATE',
          ),
          1 => 
          array (
            'name' => 'total_sessions_planned',
            'label' => 'LBL_TOTAL_SESSIONS_PLANNED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'te_pr_programs_te_ba_batch_1_name',
            'label' => 'LBL_TE_PR_PROGRAMS_TE_BA_BATCH_1_FROM_TE_PR_PROGRAMS_TITLE',
          ),
          1 => 
          array (
            'name' => 'te_in_institutes_te_ba_batch_1_name',
            'label' => 'LBL_TE_IN_INSTITUTES_TE_BA_BATCH_1_FROM_TE_IN_INSTITUTES_TITLE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'class_schedule_c',
            'studio' => 'visible',
            'label' => 'LBL_CLASS_SCHEDULE',
          ),
        ),
      ),
    ),
  ),
);
?>

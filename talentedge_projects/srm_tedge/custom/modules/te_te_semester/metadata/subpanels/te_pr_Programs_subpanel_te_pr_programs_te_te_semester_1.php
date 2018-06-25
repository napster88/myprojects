<?php
// created: 2018-05-02 07:52:50
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'order_name' => 
  array (
    'type' => 'varchar',
    'vname' => 'Order',
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'total_subject' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_TOTAL_SUBJECT',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'semester_institute_id' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SEMESTER_INSTITUTE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'te_pr_programs_te_te_semester_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_TE_PR_PROGRAMS_TE_TE_SEMESTER_1_FROM_TE_PR_PROGRAMS_TITLE',
    'id' => 'TE_PR_PROGRAMS_TE_TE_SEMESTER_1TE_PR_PROGRAMS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'te_pr_Programs',
    'target_record_key' => 'te_pr_programs_te_te_semester_1te_pr_programs_ida',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'te_te_semester',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'te_te_semester',
    'width' => '5%',
    'default' => true,
  ),
);
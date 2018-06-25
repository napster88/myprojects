<?php
// created: 2018-01-10 16:38:49
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'te_in_institutes_te_pr_programs_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_TE_IN_INSTITUTES_TE_PR_PROGRAMS_1_FROM_TE_IN_INSTITUTES_TITLE',
    'id' => 'TE_IN_INSTITUTES_TE_PR_PROGRAMS_1TE_IN_INSTITUTES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'te_in_institutes',
    'target_record_key' => 'te_in_institutes_te_pr_programs_1te_in_institutes_ida',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
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
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'te_pr_Programs',
    'width' => '5%',
    'default' => true,
  ),
);
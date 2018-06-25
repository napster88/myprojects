<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

	// global $db;
if($_REQUEST['reason']=='approve'){
  $reason = 'Approved';
}
if($_REQUEST['reason']=='disapprove'){
  $reason = 'Disapproved';
}
if($_REQUEST['reason']=='hold'){
  $reason = 'Hold';
}
if($_REQUEST['reason']=='complete'){
  $reason = 'Completed';
}
if($_REQUEST['reason']=='return'){
  $reason = 'Return';
}
// echo $reason;die();

  $bean = BeanFactory::getBean('te_ReasonMaster');
  $beanList = $bean->get_full_list(//Order by the accounts name
            'name',
            //Only accounts with industry 'Media'
            "te_reasonmaster.reson_type = '".$reason."'"
            );
        $option = '';
    foreach ($beanList as $bean) {
      $option .= '<option value="'.$bean->name.'">'. $bean->name . '</option>';
    }
    echo $option;die();

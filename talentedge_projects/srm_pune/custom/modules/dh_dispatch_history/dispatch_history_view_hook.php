<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class DispatchHistoryView{

	function itemList($bean, $event, $argument){
    $itemarr = json_decode(stripslashes(html_entity_decode($bean->dispatch_item_list)));
    $comma = 0;
    foreach ( $itemarr as $beanId ) {
      $itembean = BeanFactory::getBean('te_dispatch_request_item',$beanId);
      $itemList .= '<a href="index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3Dte_dispatch_request_item%26action%3DDetailView%26record%3D'.$itembean->id.'">'.$itembean->name.'</a>';
      if($comma == 0 && count($itemarr)>1){
        $itemList .= ', ';
      }
      $comma++;
    }

    $bean->dispatch_item_list = $itemList;
  }
}

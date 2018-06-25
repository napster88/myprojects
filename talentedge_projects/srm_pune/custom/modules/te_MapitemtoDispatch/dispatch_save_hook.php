<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class MapitemIdRequest{

	function mapitemBeanId($bean, $event, $argument){
    $bean->load_relationship('te_mapitemtodispatch_te_managekititem');
    $manageKitBeans = $bean->te_mapitemtodispatch_te_managekititem->getBeans();
    foreach ($manageKitBeans as $kitBean) {
      $kitBeanId = $kitBean->id;
    }
    $bean->managekitbeanid = $kitBeanId;
    $bean->save();
  }
}

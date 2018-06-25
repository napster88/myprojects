<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

if(isset($_REQUEST['beanId']) && $_REQUEST['beanId']!=''){
  if($_REQUEST['entrypt'] == 'itemdropdown'){
    $beanId = $_REQUEST['beanId'];
    $bean = BeanFactory::getBean('te_DispatchRequest', $beanId);
    $bean->load_relationship('te_dispatch_request_item_te_dispatchrequest');
    $dispItemsBeanList = $bean->te_dispatch_request_item_te_dispatchrequest->getBeans();
    $option = '<ul style="list-style: none;">';
    foreach ($dispItemsBeanList as $dispItemBean) {
      $option .= '<li><input type="checkbox" name="dispitembox[]" value="'.$dispItemBean->id.'" />'. $dispItemBean->name.'</li>';
    }
    $option .= '</ul>';
    echo $option;
  }
  if($_REQUEST['entrypt'] == 'stockcheck'){
  //  echo 'test';
    $beanId = $_REQUEST['beanId'];
    $bean = BeanFactory::getBean('te_DispatchRequest', $beanId);
    $bean->load_relationship('te_dispatch_request_item_te_dispatchrequest');
    $dispItemsBeanList = $bean->te_dispatch_request_item_te_dispatchrequest->getBeans();
    $check = array();

    foreach ($dispItemsBeanList as $dispItemBean) {
      $dispBeanItemId = $dispItemBean->subject;
       // echo $dispBeanItemId;die();
      $manageKitBean = BeanFactory::getBean('te_Managekititem');
      $beanList = $manageKitBean->get_full_list(//Order by the accounts name
            'name',
            //where
            "te_managekititem.kitrelateid = '".$dispBeanItemId."'"
            );
          // print_r($beanList);die();
      foreach ($beanList as $kitbean) {
        $kitstock = $kitbean->stock;
        if($kitstock < 1){
            $check[] = $kitbean->kitrelateid;
          }
          //$check[] = $kitbean->id;
      }

    }
    if(!empty($check)){
      echo json_encode($check);
    }else{
      echo '0';
    }
  }

}
die();

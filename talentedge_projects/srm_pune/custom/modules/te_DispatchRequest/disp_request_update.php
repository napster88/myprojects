<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

	// global $db;

$beanId = $_REQUEST['beanId'];
$comment = $_REQUEST['comment'];
$reason = $_REQUEST['reason'];

$dispbean = BeanFactory::getBean('te_DispatchRequest',$beanId);
$disphistbean = BeanFactory::newBean('dh_dispatch_history');
if($_REQUEST['beanAction']=='disapprove'){
  $status = 'Disapproved';
  $dispbean->description = $comment;
  $dispbean->reason = $reason;
  $dispbean->status = $status;

  $disphistbean->reason = $reason;
  $disphistbean->status = $status;
  $disphistbean->description = $comment;


}

elseif($_REQUEST['beanAction']=='partial'){
  $kititems = $_REQUEST['kititems'];
  $next_dispatch_date = $_REQUEST['next_dispatch_date'];
  // echo 'test'.$_REQUEST['next_dispatch_date'];die();
  $dispbean->description = $comment;
  $newDispBean = BeanFactory::newBean('te_DispatchRequest');
  $newDispBean->request_id = 'newrequest';
  $newDispBean->name = 'newrequest';
  $newDispBean->dispatch_date = $next_dispatch_date;
  $newDispBean->status = 'waiting_for_approval';
  $newDispBean->te_ba_batch_id_c = $dispbean->te_ba_batch_id_c;
  $newDispBean->te_student_id_c = $dispbean->te_student_id_c;
  $newDispBean->program_c = $dispbean->program_c;
  $newDispBean->semester_c = $dispbean->semester_c;
  $newDispBean->save();

  $newDispBean->load_relationship('te_dispatch_request_item_te_dispatchrequest');
  // echo stripslashes(html_entity_decode($kititems));die();
  $kitItemArr = json_decode(stripslashes(html_entity_decode($kititems)));
// echo  $kitItemArr[0];die();
  if(!empty($kitItemArr)){
    foreach ($kitItemArr as $kitReqBeanId) {
      $newDispReqItemBean = BeanFactory::newBean('te_dispatch_request_item');
      $newDispReqItemBean->subject = $kitReqBeanId;
      $subjBean = BeanFactory::getBean('te_Subjects_master',$kitReqBeanId);
      $newDispReqItemBean->name = $subjBean->name;
      $newDispReqItemBean->te_te_semester_id = $dispbean->semester_c;
      $newDispReqItemBean->save();
      $newDispBean->te_dispatch_request_item_te_dispatchrequest->add($newDispReqItemBean->id);
    }
  }


}

elseif($_REQUEST['beanAction']=='approve'){
  $status = 'Approved';
  $dispatch_date = $_REQUEST['pickup_date'];
  $c_vendor = $_REQUEST['c_vendor'];
  $kit_weight = $_REQUEST['kit_weight'];
  $doc_weight = $_REQUEST['doc_weight'];
  $consignment_number = $_REQUEST['consignment_number'];
  $tracking_url = $_REQUEST['tracking_url'];
  $dispatch_type = 'Full';
  if($_REQUEST['kititems']!=''){
    $dispatch_type = 'Partial';
  }

  $dispbean->description = $comment;
  $dispbean->reason = $reason;
  $dispbean->status = $status;
  $dispbean->dispatch_date = $dispatch_date;

  $disphistbean->reason = $reason;
  $disphistbean->status = $status;
  $disphistbean->description = $comment;
  $disphistbean->dispatch_date = $dispatch_date;
  $disphistbean->te_courier_id_c = $c_vendor;
  $disphistbean->kit_weight = $kit_weight;
  $disphistbean->document_weight = $doc_weight;
  $disphistbean->consignment_number = $consignment_number;
  $disphistbean->tracking_url = $tracking_url;
  $disphistbean->dispatch_type = $dispatch_type;
  // die();
}
elseif($_REQUEST['beanAction']=='hold'){
  $status = 'Hold';
  $dispatch_date = $_REQUEST['dispatch_date'];
  $c_vendor = $_REQUEST['c_vendor'];
  $kit_weight = $_REQUEST['kit_weight'];
  $doc_weight = $_REQUEST['doc_weight'];
  $consignment_number = $_REQUEST['consignment_number'];
  $tracking_url = $_REQUEST['tracking_url'];

  $dispbean->description = $comment;
  $dispbean->reason = $reason;
  $dispbean->status = $status;

  $disphistbean->reason = $reason;
  $disphistbean->status = $status;
  $disphistbean->description = $comment;
  $disphistbean->dispatch_date = $dispatch_date;
  $disphistbean->te_courier_id_c = $c_vendor;
  $disphistbean->kit_weight = $kit_weight;
  $disphistbean->document_weight = $doc_weight;
  $disphistbean->consignment_number = $consignment_number;
  $disphistbean->tracking_url = $tracking_url;

}
elseif($_REQUEST['beanAction']=='complete'){
  $status = 'Completed';

  $dispatch_date = $_REQUEST['dispatch_date'];

  $dispbean->description = $comment;
  $dispbean->reason = $reason;
  $dispbean->status = $status;

  $disphistbean->reason = $reason;
  $disphistbean->status = $status;
  $disphistbean->description = $comment;
  $disphistbean->dispatch_date = $dispatch_date;

  $dispbean->load_relationship('te_dispatch_request_item_te_dispatchrequest');
  $dispItemsBeanList = $dispbean->te_dispatch_request_item_te_dispatchrequest->getBeans();
  foreach ($dispItemsBeanList as $dispItemBean) {
    $itemBeanId = $dispItemBean->id;
    $manageKitBean = BeanFactory::getBean('te_Managekititem');
    $beanList = $manageKitBean->get_full_list(//Order by the accounts name
          'name',
          //where
          "te_managekititem.kitrelateid = '".$itemBeanId."'"
          );
    if(!empty($beanList)){
      foreach ($beanList as $kitbean) {
        $oldstock = $kitbean->stock;
        $kitbean->stock = $oldstock - 1;
        $kitbean->save();
      }
    }

  }

}
elseif($_REQUEST['beanAction']=='return'){
  $status = 'Return';
  $dispitembox = $_REQUEST['dispitembox'];

  $dispbean->description = $comment;
  $dispbean->reason = $reason;
  $dispbean->status = $status;

  $disphistbean->reason = $reason;
  $disphistbean->status = $status;
  $disphistbean->description = $comment;
  $disphistbean->dispatch_item_list = json_encode($dispitembox);

}

$disphistbean->save();
$dispbean->load_relationship('dh_dispatch_history_te_dispatchrequest');
$dispbean->dh_dispatch_history_te_dispatchrequest->add($disphistbean->id);
$dispbean->save();
die();

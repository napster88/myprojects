<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

 // Entry Point : http://localhost/<crm url>/index.php?entryPoint=managekit_stock_entrypoint

 // global $app_list_strings,$current_user,$sugar_config,$db;

 // Ajax vars

 $beanId = $_REQUEST['beanId'];
 $stock_status = $_REQUEST['stock_status'];

 $quantity = $_REQUEST['quantity'];
 $remark = $_REQUEST['remark'];
 if($stock_status == 'in'){
   $work_order_no = $_REQUEST['work_order_no'];
 }

  if($stock_status == 'out'){
   $disposal_method = $_REQUEST['disposal_method'];
   $cost_for_disposal = $_REQUEST['cost_for_disposal'];
  }


  // New Stock Entry
  $kitbean = BeanFactory::getBean('te_Managekititem',$beanId);
  //Load the relationship
  $stockbean = BeanFactory::newBean('mse_managekit_stock_entry');
  $stockbean->stock_status = 'Stock '.$stock_status;
  $stockbean->name = $kitbean->name;
  $stockbean->remark = $remark;
  $stockbean->quantity = $quantity;

  if($stock_status == 'in'){
    $stockbean->work_order_no = $work_order_no;

    // stock addition
    $oldStock = $kitbean->stock;
    $newStock = $oldStock + $quantity;
  }
  if($stock_status == 'out'){
    $stockbean->disposal_method = $disposal_method;
    $stockbean->cost_for_disposal = $cost_for_disposal;
    // stock addition
    $oldStock = $kitbean->stock;
    $newStock = $oldStock - $quantity;
  }

  $stockbean->save();

  $kitbean->load_relationship('mse_managekit_stock_entry_te_managekititem');
  $kitbean->mse_managekit_stock_entry_te_managekititem->add($stockbean->id);
  // $kitbean->mse_managekit_stock_entry_te_managekititem->add($stockbean->id);


  // Update Kit stock $quantity
  // $kitbean->retrieve($bean_id);
  $kitbean->stock = $newStock;
  $kitbean->save();

  echo $newStock;die();

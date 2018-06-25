<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

 // Entry Point : http://localhost/<crm url>/index.php?entryPoint=managekit_stock_recall_entrypoint

 // global $app_list_strings,$current_user,$sugar_config,$db;

 // Ajax vars
 if($_REQUEST['entrycall'] == 'recall_update'){
   $beanId = $_REQUEST['beanId'];
   $stockbean = BeanFactory::getBean('mse_managekit_stock_reconciliation',$beanId);
   $stockbean->description = $_REQUEST['remark'];

    $stockbean->load_relationship('mse_managekit_stock_reconciliation_te_managekititem');
    $kitbeans = $stockbean->mse_managekit_stock_reconciliation_te_managekititem->getBeans();
    foreach ($kitbeans as $kitbean) {
      // code...
      $kitbean->stock = $stockbean->counted_stock;
      $kitbean->save();
    }


    $stockbean->save();

 }
  if($_REQUEST['entrycall'] == 'taking_entry'){
 $beanId = $_REQUEST['beanId'];
 $stock_counted = $_REQUEST['stock_counted'];


  // New Stock Entry
  $kitbean = BeanFactory::getBean('te_Managekititem',$beanId);
  //Load the relationship
  $stockbean = BeanFactory::getBean('mse_managekit_stock_reconciliation');

  $stockbean->name = $kitbean->name;
  $stockbean->item_type = $kitbean->master_itemtype;
  $stockbean->counted_stock = $stock_counted;
  $stockbean->erp_stock_count = $kitbean->stock;
  $stockbean->save();

  $kitbean->load_relationship('mse_managekit_stock_reconciliation_te_managekititem');
  $kitbean->mse_managekit_stock_reconciliation_te_managekititem->add($stockbean->id);
  // $kitbean->mse_managekit_stock_entry_te_managekititem->add($stockbean->id);


  // Update Kit stock $quantity


  $kitbean->save();
}
  die();

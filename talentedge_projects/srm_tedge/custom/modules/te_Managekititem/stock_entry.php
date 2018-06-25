<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
$kitbean = BeanFactory::getBean('te_Managekititem',$bean_id);
//Load the relationship
  //Populate bean fields
$stockbean->save();
$kitbean->load_relationship('stent_stock_entry_te_managekititem');
$kitbean->stent_stock_entry_te_managekititem->add($stockbean->id);

$kitbean->stock+=20;
$kitbean->save();
?>

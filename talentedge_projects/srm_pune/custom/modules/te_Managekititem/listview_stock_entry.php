<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

class stock_entry {

    function stock_entry_popup(&$bean, $event, $arguments) {
      // global $db;
      //$bean->stock_inentry = '<a href="#">Stock In Entry</a>';
      $stockhtml = '<span class="'.$bean->id.'_stockquantity">'.$bean->stock.'</span>';
      $bean->stock = $stockhtml;

      $inhtml='<a data-entry="in" data-beanId="'.$bean->id.'" data-beanName="'.$bean->name.'" class="stock_entry button">Stock In Entry</a>';
      $bean->stock_inentry = $inhtml;

      $outhtml='<a data-entry="out" data-beanId="'.$bean->id.'" data-beanName="'.$bean->name.'" class="stock_entry button">Stock Out Entry</a>';
      $bean->stock_outentry = $outhtml;

      $takehtml='<a data-entry="taking" data-beanId="'.$bean->id.'" data-beanName="'.$bean->name.'" data-itemType="'.$bean->master_itemtype.'" class="stock_entry taking button">Stock Taking Entry</a>';
      $bean->stock_takingentry = $takehtml;

    }

}

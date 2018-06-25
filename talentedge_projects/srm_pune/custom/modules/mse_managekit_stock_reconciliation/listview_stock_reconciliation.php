<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

class stock_recall {

    function stock_entry_recall(&$bean, $event, $arguments) {
      $variance = $bean->counted_stock - $bean->erp_stock_count;
      if($bean->description == '' && $variance != 0){
        $remark = '<div class="'.$bean->id.'_container">Remark <p><textarea style="color:#000;" class="'.$bean->id.'_remark_area" ></textarea></p><p><span data-beanId="'.$bean->id.'" class="button remark_save">Update</span></p></div>';
        $bean->description = $remark;
      }

    }
}

<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
require_once('modules/te_Managekititem/te_Managekititem.php');
class kitcall
{

    function kititem($bean, $event, $argument)
    {
		if(empty($bean->fetched_row['id'])){

			$item                         = new te_Managekititem();
            $item->description            = $bean->description;
            $item->name                   = $bean->name;
            $item->active             	  = "1";
            $item->master_itemtype 		  ="study_material";
            $item->kit_item_code 		  =$bean->subject_code;
            $item->kitrelateid      	  =$bean->id;
            $item->save();
		}

	}


}

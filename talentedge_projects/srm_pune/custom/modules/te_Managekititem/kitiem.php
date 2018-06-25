<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

class kitcallclass {
    function kitidsavefun(&$bean, $event, $arguments) {
      if($bean->kitrelateid==''){
        $bean->kitrelateid=$bean->id;
        $bean->save();
      }

		}
 }

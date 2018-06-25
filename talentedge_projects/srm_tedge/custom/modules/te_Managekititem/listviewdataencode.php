<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
	class listviwdisplay
	{
	   function listview(&$bean, $event, $arguments){
			  global $db;
				$html_in='<a id="'.$bean->id.'_in" value='.$bean->id.' class="button">stock In entry</a>';
				$html_out='<a id="'.$bean->id.'_out" value='.$bean->id.' class="button">stock Out entry</a>';
				$bean->stockin=$html_in;
			//	$bean->stockin=	$bean->id;
				$bean->stockout=$html_out;
	 	}
	}
	?>

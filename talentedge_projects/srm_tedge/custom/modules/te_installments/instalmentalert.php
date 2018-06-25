<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class alertInstallmentspln {

    function alertinstallment(&$bean, $event, $arguments) {
	

			
		    // $qry ="select name from te_in_institutes where (deleted=0) and (id!='".$bean->id."') and (name='".$bean->name."')";
			$qry="SELECT ins.due_date FROM te_te_paymentplan_te_installments_1_c AS pns  INNER JOIN te_installments AS ins  WHERE te_te_paymentplan_te_installments_1te_te_paymentplan_ida='".$_REQUEST['record']."'";
	      	
	      	echo '<script type="text/javascript"> alert('.$qry.')</script>';
	        exit();
	        $qry2= $db->query($qry);
		     while($row=$db->fetchByAssoc($qry2)){
						if($row['due_date']==$bean->due_date){
							
							
						
				   //  SugarApplication::redirect('index.php?module=te_in_institutes&action=ShowDuplicates_custom&name='.$bean->name.'');
					}
				}
	
	
		
	}
}

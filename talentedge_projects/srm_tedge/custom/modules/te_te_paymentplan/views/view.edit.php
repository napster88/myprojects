<?php
/*
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class te_te_paymentplanViewEdit extends ViewEdit
{
	public function display(){
		$installmentObj=$GLOBALS['db']->query("SELECT inst.payment_inr, inst.payment_usd, inst.due_date FROM te_installments inst INNER JOIN te_te_paymentplan_te_installments_1_c INSTR ON inst.id = INSTR.te_te_paymentplan_te_installments_1te_installments_idb AND INSTR.te_te_paymentplan_te_installments_1te_te_paymentplan_ida = '".$this->bean->id."' AND INSTR.deleted = 0 WHERE inst.deleted = 0");	
		$installments=array();
		while($row = $GLOBALS['db']->fetchByAssoc($installmentObj)){
			$row['due_date']=$GLOBALS['timedate']->to_display_date($row['due_date'],false);
			$installments[]=$row;
		}
		$this->ss->assign('no_of_installments', $this->bean->no_of_installments); 
		$this->ss->assign('initial_payment_inr', $this->bean->initial_payment_inr); 
		$this->ss->assign('initial_payment_usd', $this->bean->initial_payment_usd);
		$this->ss->assign('initial_payment_date', $this->bean->initial_payment_date);
		$this->ss->assign('installments', $installments); 
		parent::display();
		
	}  
	 
}
*/

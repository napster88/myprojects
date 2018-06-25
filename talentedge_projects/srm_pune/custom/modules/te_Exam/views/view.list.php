<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
require_once('include/MVC/View/views/view.list.php');
//require_once('include/MVC/View/SugarView.php');
class te_ExamViewList extends ViewList {
	
		public function __construct() {
			parent::SugarView();
		}
		
                public function preDisplay()
                {
                    parent::preDisplay();

                    # Hide Quick Edit Pencil
                    $this->lv->quickViewLinks = false;
                }

		
		public function display()
		{
			global $db;
			
			?>
			<style>
                table  thead th{ background-color:#ebebeb; color:#333; border-collapse:collapse; border:1px solid #e7e7e7; width:20%;}
				table  thead td{ background-color:#ebebeb; color:#333;}
                table  tbody td{ background-color:#fff; color:#333; width:20%;}
				table  tbody td:first-child{ background-color:#fff; color:#333; width:2%;}
				table  thead td:first-child{width:2%;}
				table  tbody td i{color:#333;}
				table  tbody td a{color:#333; margin-left:15px;}
				table  tbody td a:first-child{margin-left:0px;}
				table  tbody td a:hover{color:#333; text-decoration:underline;}
				table  tbody tr:hover a{color:#333; text-decoration:underline;}
				
				
            </style>

			<?php
			parent::display();
                        $this->lv->quickViewLinks = false;

			//~ require_once('custom/modules/Leads/include/ShowCallPopup.html');
		}

}
?>

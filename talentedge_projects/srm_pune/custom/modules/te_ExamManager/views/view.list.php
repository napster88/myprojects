<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
require_once('include/MVC/View/views/view.list.php');
//require_once('include/MVC/View/SugarView.php');
class te_ExamManagerViewList extends ViewList {
	
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
			
   			 <div class="confirmation-dialog">
                    <div class="confirmation-container">
                        <a href="javascript:void(0)" class="close-link">X</a>
                        <div class="content">Please Enter Center Name</div>
                        <div class="content-area"><textarea></textarea></div>
                        <div class="content-action">
                            <button class="button">Cancel</button>
                            <button class="button">Submit</button>
                        </div>
                    </div>
            </div>
    			<div class="mask"></div>
			<style>
                table  thead th{ background-color:#ebebeb; color:#333; border-collapse:collapse; border:1px solid #e7e7e7;}
				table  thead td{ background-color:#ebebeb; color:#333;}
                table  tbody td{ background-color:#fff; color:#333;}
				table  tbody td i{color:#333;}
				table  tbody td a{color:#333; margin-left:15px;}
				table  tbody td a:first-child{margin-left:0px;}
				table  tbody td a:hover{color:#333; text-decoration:underline;}
				table  tbody tr:hover a{color:#333; text-decoration:underline;}
				table  tbody td[type="text"] .button{background-color:#0c5ac7; color:#fff; font-size: 12px!important; text-decoration:none;}
				table  tbody td[type="text"] .button:hover{background-color:#0c5ac7; color:#fff; font-size: 12px!important; text-decoration:none;}
				
				.confirmation-dialog{ position:fixed; width:300px; height:124px; margin-top:-62px; margin-left:-150px; left:50%; top:50%; border: 1px solid #ddd; border-radius: 5px; box-shadow:0 0 5px #ddd; z-index: 220001; display:none;}
				.confirmation-dialog .confirmation-container{ background-color:#ebebeb; padding:30px 20px 20px; position:relative;}
				.confirmation-dialog  .confirmation-container .close-link{ position:absolute; top:-8px; right:-8px; background-color:#000; color:#fff; width:22px; height:22px; border-radius:100%; font-size: 11px; display: flex;  align-items: center; justify-content: center; text-decoration:none;}
				.confirmation-dialog  .confirmation-container .close-link:hover{ background-color:#fff; color:#000;}
				.confirmation-dialog .confirmation-container .content{ color:#666; font-size: 13px;  margin-bottom:10px;}
				.confirmation-dialog .confirmation-container .content-area{ margin-bottom:10px;}
				.confirmation-dialog .confirmation-container .content-area textarea{min-height:60px; border:1px solid #a4a4a4; width:100%; resize:none; color:#000;}
				.confirmation-dialog .confirmation-container .content-area textarea:focus{border:1px solid #a4a4a4; outline:0px none;}
				.confirmation-dialog .confirmation-container .content-action{ display:flex; width:100%; align-items:center; justify-content: flex-end;}
				.confirmation-dialog .confirmation-container .content-action .button{width:auto; margin:0; margin-left:15px; padding: 5px 10px; font-size: 11px; background-color: #0c5ac7; border:1px solid #0c5ac7;}
				.confirmation-dialog .confirmation-container .content-action .button:hover{ background-color:#fff; color:#0c5ac7;}
				.confirmation-dialog .confirmation-container .content-action .button:first-child{ margin-left:15px;}
				.mask{background-color:rgba(0,0,0,0.5); position:fixed; top:0; right:0; bottom:0; left:0; z-index: 220000; display:none;}
            </style>

			<?php
			parent::display();
                        $this->lv->quickViewLinks = false;

			//~ require_once('custom/modules/Leads/include/ShowCallPopup.html');
		}

}
?>

<script>
	jQuery(document).ready(function(e) {
        //jQuery('.lock-choices').click(function(){

			//jQuery('.confirmation-dialog').show();
			//jQuery('.mask').show();

		//})
		//jQuery('.close-link').click(function(){

			//jQuery('.confirmation-dialog').hide();
			//jQuery('.mask').hide();

		//})
    });
</script>

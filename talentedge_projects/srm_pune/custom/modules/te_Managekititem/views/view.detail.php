<?php

require_once('include/MVC/View/views/view.detail.php');

class te_ManagekititemViewDetail extends ViewDetail {

    function te_ManagekititemViewDetail(){
        parent::ViewDetail();
    }

    function preDisplay() {
        parent:: preDisplay();
    }

    function display() {
      //echo 'test';
       $scripts = '<script type="text/javascript" src="custom/modules/te_Managekititem/js/stock_poup.js"></script>'; //js file
       echo $scripts;
       parent::display();

    }

}

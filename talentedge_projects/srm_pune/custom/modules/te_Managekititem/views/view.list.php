<?php

require_once('include/MVC/View/views/view.list.php');

class te_ManagekititemViewList extends ViewList {

    function te_ManagekititemViewList(){
        parent::ViewList();
    }

    function preDisplay() {
        parent:: preDisplay();
    }

    function display() {
      //echo 'test';
       $scripts = '<script type="text/javascript" src="custom/modules/te_Managekititem/js/stock_poup.js"></script>'; //js file
       $scripts .= '<style>
              .stock_entry{
                font-size: 9px !important;
                padding: 5px 2px;
                text-decoration: none !important;
              }
             .popup_backover{
               background-color:#0009;
               position:fixed;
               top:0;
               left:0;
               width:100%;
               height:100%;
               z-index:9;
               display:none;
             }
             .stck_entry_popup{
               background-color:#fff;
               position:fixed;
               top:20%;
               left:40%;
               width:30%;
               padding:20px;
               z-index:10;
               display:none;
             }
             .entry_close_button{
               position:absolute;
               top:10px;
               right:20px;
               background-color:#000;
               color:#fff;
               padding: 0px 6px 3px 6px;
               font-size: 19px;
               border-radius: 20px;
               cursor: pointer;
               line-height: 17px;
             }
       </style>'; //css file
       echo $scripts;
       parent::display();
        $html = '<div class="popup_backover"></div>
        <div class="in stck_entry_popup">
          <span class="entry_close_button">x</span>
          <form id="in_entry_form" name="in_entry_form" action="">
            <p><b>Item Name</b> : <span class="beanName"></span></p>
            <p><b>Work Order</b> : <input type="text" name="work_order_no" /></p>
            <p><b>Inward Quantity</b> : <input type="text" name="quantity" /></p>
            <p><b>Remark</b> : <textarea name="remark"></textarea></p>
            <input type="hidden" value="" class="beanId" name="beanId" />
            <input type="hidden" value="" class="stock_status" name="stock_status" />
            <div class="entry_save button">Save</div>
          </form>
        </div>
        <div class="out stck_entry_popup">
          <span class="entry_close_button">x</span>
          <form id="out_entry_form" name="out_entry_form" action="">
            <p><b>Item Name</b> : <span class="beanName"></span></p>
            <p><b>Disposal Quantity</b> : <input type="text" name="quantity" /></p>
            <p><b>Disposal Method</b> : <select name="disposal_method">
              <option value=""></option>
              <option value="damage">Damage</option>
              <option value="out_dated_stock">Out Dated Stock</option>
              <option value="shredding">Shreddding</option>
              <option value="stock_transfer">Stock Transfer</option>
            </select></p>
            <p><b>Cost for Disposal</b> : <input type="text" name="cost_for_disposal" /></p>
            <p><b>Remark</b> : <textarea name="remark"></textarea></p>
            <input type="hidden" value="" class="beanId" name="beanId" />
            <input type="hidden" value="" class="stock_status" name="stock_status" />
            <div class="entry_save button">Save</div>
          </form>
        </div>
        <div class="taking stck_entry_popup">
          <span class="entry_close_button">x</span>
          <form id="taking_entry_form" name="taking_entry_form" action="">
            <p><b>Item Name</b> : <span class="beanName"></span></p>
            <p><b>Current Counted Stock</b> : <input type="number" name="stock_counted" min="0" /></p>
            <input type="hidden" value="" class="beanId" name="beanId" />
            <input type="hidden" value="taking_entry" class="entrycall" name="entrycall" />
            <div class="entry_taking_save button">Update</div>
          </form>
        </div>';
        echo $html;
    }

}

<?php
/**
 * Pay for order form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-pay.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see      https://docs.woocommerce.com/document/template-structure/
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<style>

	#payment{border:none !important;}
	#payment ul{display:none !important;}
	.form-row{text-align: center;}
	#place_order{display: inline-block;
    text-align: center;
    width: auto !important;}
    .woocommerce-order-pay #order_review .payment_methods+.form-row{    float: right;
    margin: 0px 100px 10px 0px;}
    .woocommerce-order-pay #order_review{    width: 60%;
    margin: 0px auto;
    text-align: center;}
    p{    text-align: left;
    margin: 20px 0px;
    font-weight: 700;
    font-size: 18px;
}}
/* Fornt-end */
/* YITH WooCommerce Multi Step Checkout */

.row-centered {
    text-align: center;
}
.col-centered {
    display: inline-block;
    vertical-align: top;
    float: none;
    margin-right: -4px;
}
.disocuntdiv{display:none;}

#checkout-wrapper.timeline-horizontal {
    width: 100%;
}
ul.order_details{margin-top:20px;}
#checkout-wrapper.timeline-vertical {
    width: 67%;
    float: left;
    padding: 0 15px;
}
.woocommerce-checkout .woocommerce-message {display:none;}
.woocommerce-error {
    color: #333;
    background-color: #f2f2f2;
    border-color: #0b8fbf;
}
.woocommerce-error a {
    color: #0b8fbf;
    font-weight: bold;
}
.wizard .tab_contentdiv{margin-top:40px;}
#form_actions {
    text-align: right;
}
#course_coupon{width:58%;}

#form_actions.disabled {
    display: none;
}
.amountpay_msg {
    font-size: 13px;
    color: red;
    padding: 5px 20px 0px 0px;
    text-align: right;
}
.cerror{border-bottom:1px solid red !important;}
 .payment_options .card{
    border: 2px solid transparent;
    border-radius: 5px;
    background: #fff;
    padding: 10px;
    cursor: pointer;
    margin-bottom:20px;
}
.payment_options .card.active{
        border: 2px solid #244895;
}
.payment_options .card h5{color:#234796;margin-bottom:10px;}

#form_actions input.button.alt.prev {
    margin-right: 5px;
    display: none;
}
form.checkout.woocommerce-checkout {
    margin-bottom: 15px;
}
.woocommerce-shipping-fields .form-row-wide, .woocommerce-shipping-fields .form-row-first{display:none !important;}
.referraldiv input {
      /* font-family: proxima-nova, sans-serif; */
    /* letter-spacing: 2px; */
    font-size: 14px;
    /* height: 33px; */
    border-bottom: 1px solid #f2f2f2 !important;
    /* -webkit-border-radius: 2px; */
    -moz-border-radius: 2px;
    /* border-radius: 2px; */
    padding: 6px 5px;
    border: none;
    color:#ccc;
}
.referraldiv{margin-top:20px;}

body.woocommerce-checkout #customer_shipping_details,
.woocommerce-checkout-review-order-table, #talentedge-checkout-coupon, .payment_methods,  
body.woocommerce-checkout #customer_billing_details.show-login-reminder.not-logged-in,
body.woocommerce-checkout #checkout_coupon , #order_checkout_payment{
    display: none;
}
.payment_methods{display:none !important;}
.payment_header{    margin: 0px 0px 20px 0px;
    padding: 0;}
.payment_header h4{text-align: left;
    padding: 0px 20px 20px 0px;
    font-size: 20px;
    margin: 0px;}
.payment_header h5{text-align: left;
    color: #234796;
    font-weight: bold;
    text-transform: uppercase;}
#checkout_timeline {
    text-align: center;
    list-style: none;
    padding: 0;
}

#checkout_timeline li {
    transition: all 0.5s ease;
    font-size: 20px;
    text-transform: uppercase;
}

#checkout_timeline.vertical {
    width: 33%;
    float: left;
    padding: 0 15px;
}

#checkout_timeline:after {
    clear: both;
    display: block;
    content: "";
}

.yith-wcms-pro #checkout_timeline li {
    cursor: pointer;
}

#checkout_timeline.vertical li {
    display: block;
}

.yith-wcms-pro.logged-in #checkout_timeline li#timeline-0 {
    cursor: context-menu;
}

#checkout_timeline li:last-child {
    padding-right: 0;
}

/* === STYLE === */

#checkout_timeline {
    display: table;
    width: 100%;
    height: 100%;
    margin-left: 0;
}

#checkout_timeline:not(.text) li {
    font-size: inherit;
}

#checkout_timeline li .timeline-wrapper .timeline-step {
    display: table-cell;
    vertical-align: middle;
    font-weight: bold;
    width: 40px;
    text-align: center;
    padding: 10px;
}

#checkout_timeline.style1 li .timeline-wrapper .timeline-step.with-icon img{
    max-width: none;
}

#checkout_timeline li .timeline-wrapper .timeline-step:not(.with-icon):after {
    content: ".";
    display: inline;
}

#checkout_timeline.style1 li .timeline-wrapper .timeline-step:not(.with-icon):after{
    display: none;
}

#checkout_timeline li .timeline-wrapper .timeline-label {
    text-align: center;
    padding: 5px !important;
    display: table-cell;
    vertical-align: middle;
    width: 100%;
    font-size: 16px;
        text-transform: initial;
}
.clogo{padding:8px 0px 0px 0px;}
.banner-headline{padding:30px 0px 0px 0px !important;}
.woocommerce{padding-bottom:10%;}
.woocommerce-billing-fields h3, .woocommerce-billing-fields label{display:none;}
#referralID_field{margin-bottom:30px;}
#billing_country_field label{    padding: 10px 0px;}
.course_details{text-align: left;}
#checkout_timeline.vertical li .timeline-wrapper .timeline-label {
    font-size: 15px;
}

#checkout_timeline li {
    display: table-cell;
    vertical-align: middle;
    height: 100%;
}

#checkout_timeline.horizontal li:first-child {
    border-left: 1px solid;
}

#checkout_timeline li {
    border-width: 0px;
    padding-right: 10px;
}

#checkout_timeline.vertical li {
    width: auto;
    display: block;
}

#checkout_timeline li .timeline-wrapper {
    position: relative;
    text-align: left;
    line-height: normal;
}

#checkout_timeline li .timeline-wrapper {
      text-align: left;
      display: table;
      height: 100%;
      width: 100%;
}

#checkout_timeline.vertical li .timeline-wrapper {
    margin-bottom: 10px;
}

/* === END STYLE1 === */

/* === TEXT === */

#checkout_timeline.text {
    display: block;
    padding-bottom:50px;
}

#checkout_timeline.text li {
    display: inline-block;
}

#checkout_timeline.text li.active {
    color:#f26522;
}

#checkout_timeline.text li .timeline-wrapper .timeline-step {
    display: none;
}

#checkout_timeline.horizontal.text li:not(:last-child) .timeline-wrapper:after {
    content: "/";
    display: inline-block;
    margin: 0 5px;
    font-weight: normal;
}

#checkout_timeline.text li .timeline-wrapper .timeline-label {
    display: inline;
}

#checkout_timeline.text li .timeline-wrapper {
    display: block;
}

#checkout_timeline.horizontal.text li:first-child {
    border: 0
}

#checkout_timeline.vertical.text{
    padding: 0;
}

#checkout_timeline.text.vertical li{
    display: block;
}


/* === END TEXT === */

/* === STYLE 1 === */

#checkout_timeline.vertical.style1 li{
    padding-right: 0;
}

#checkout_timeline.horizontal.style1 li:first-child {
    border-left: 0;
}

/* === END STYLE 1 === */

/* === STYLE 2 === */

#checkout_timeline.style2 {
    display: table;
}

#checkout_timeline.style2 li {
    font-size: inherit;
}

#checkout_timeline.style2 li .timeline-wrapper .timeline-step {
    display: inline-block;
    vertical-align: middle;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    line-height: normal;
}

#checkout_timeline.style2 li .timeline-wrapper .timeline-step {
    border-width: 1px;
    border-style: solid;
    position: absolute;
    left: 15px;
    top: 50%;
    margin-top: -15px;
    text-align: center;
}

#checkout_timeline.style2 li.active .timeline-wrapper .timeline-step {
    border-width: 1px;
    border-style: solid;
}

.yith-wcms-pro.logged-in #checkout_timeline li#timeline-0 {
    cursor: context-menu;
}

#checkout_timeline.style2 li {
    display: table-cell;
    vertical-align: middle;
}

#checkout_timeline.horizontal.style2 li:first-child {
    border-left: 1px solid;
}

#checkout_timeline.horizontal.style2 li {
    border-style: solid;
    border-width: 1px 1px 1px 0;
}

#checkout_timeline.vertical.style2 li:last-child {
    border-bottom: 1px solid;
}

#checkout_timeline.vertical.style2 li {
    border-style: solid;
    border-width: 1px 1px 0 1px;
}

.show_checkout_login_reminder #checkout_timeline.horizontal.style2 li {
    width: 20%;
}

.logged-in #checkout_timeline.horizontal.style2 li {
    width: 25%;
}

#checkout_timeline.vertical.style2 li {
    width: auto;
    display: block;
}

#checkout_timeline.style2 li .timeline-wrapper {
    position: relative;
    text-align: left;
    line-height: normal;
}

#checkout_timeline.horizontal.style2 li .timeline-wrapper {
    padding: 10px 10px 10px 55px;
}

#checkout_timeline.vertical.style2 li .timeline-wrapper {
    padding: 15px 10px 5px 55px;
}

#checkout_timeline.style2 li.active .timeline-wrapper {
    font-weight: bold;
}

#checkout_timeline.style2 li .timeline-wrapper .timeline-step{
    padding: 5px;
}

#checkout_timeline.style2 li .timeline-wrapper .timeline-step:after{
    display: none;
}

/* === END STYLE2 === */

/* === STYLE3 === */

#checkout_timeline.style3 {
    display: table;
}

#checkout_timeline.style3 li {
    font-size: inherit;
}

#checkout_timeline.style3 li .timeline-wrapper .timeline-step {
    vertical-align: middle;
    font-weight: bold;
    width: 20px;
    text-align: center;
    padding: 0;
}

#checkout_timeline.style3 li .timeline-wrapper .timeline-label{
    text-align: left;
    width: auto;
}

#checkout_timeline.style3 li .timeline-wrapper .timeline-step:after {
    content: ".";
}

#checkout_timeline.style3 li .timeline-wrapper .timeline-step.with-icon:after{
    content: "";
}

#checkout_timeline.style3 li {
    vertical-align: middle;
}

#checkout_timeline.horizontal.style3 li:first-child {
    border-left: 1px solid;
}

#checkout_timeline.style3 li {
    border-style: solid;
    border-width: 0px;
    padding-right: 10px;
    border: none !important;
}

#checkout_timeline.horizontal.style3 li {
    width: 20% !important;
}

.logged-in #checkout_timeline.horizontal.style3 li {
    width: 25% !important;
}

#checkout_timeline.vertical.style3 li {
    width: auto;
    display: block;
}

#checkout_timeline.style3 li .timeline-wrapper {
    position: relative;
    text-align: left;
    line-height: normal;
}

#checkout_timeline.style3 li .timeline-wrapper {
    padding: 10px;
    text-align: center;
    border-width: 1px;
    border-style: solid;
    border-radius: 10px;
}

#checkout_timeline.vertical.style3 li .timeline-wrapper {
    padding: 15px 10px;
    margin-bottom: 10px;
}

/* === END STYLE3 === */

.about_paypal {
    display: block;
}

/* === Twenty13 Hack === */

.yith-wcms-pro-myaccount .entry-header,
.yith-wcms-pro-myaccount .entry-content,
.yith-wcms-pro-myaccount .entry-summary,
.yith-wcms-pro-myaccount .entry-meta {
    max-width: 1170px;
}

/* === Tank You Page Customizzation === */

.yith-wcms-pro-myaccount .woocommerce h1,
.yith-wcms-pro-myaccount .woocommerce h2,
.yith-wcms-pro-myaccount .woocommerce h3 {
    text-transform: uppercase;
    font-weight: bold;
    font-size: 20px;
    margin: 0;
}

.yith-wcms-pro-myaccount .woocommerce h2,
.yith-wcms-pro-myaccount .woocommerce h3 {
    margin-bottom: 15px;
}

.yith-wcms-pro-myaccount .yith-wcms-title {
    width: 40%;
    float: left;
}

.yith-wcms-pro-myaccount .order_details.yith-order-info {
    width: 60%;
    float: left;
    padding: 25px;
}

.yith-wcms-pro-myaccount .woocommerce .order_details li {
    border-right: 0;
    font-size: 12px;
}

.yith-wcms-pro-myaccount .woocommerce table.shop_table.customer_details tbody tr th {
    width: 25%;
}

.yith-wcms-pro-myaccount .woocommerce table.shop_table.customer_details tbody tr th,
.yith-wcms-pro-myaccount .woocommerce table.shop_table.customer_details tbody tr td {
    border: none;
    color: #808080;
    padding: 0;

}

.yith-wcms-pro-myaccount .woocommerce table.shop_table.customer_details tbody tr:nth-child(2n) {
    background: none;
}

.yith-wcms-pro-myaccount .woocommerce table.shop_table.customer_details {
    width: 30%;
    border: none;
}

.yith-wcms-pro-myaccount .woocommerce .col2-set address,
.yith-wcms-pro-myaccount .woocommerce-page .col2-set address {
    font-style: normal;
    color: #808080;
}
.none{display:none;}
.amount_pay input{
        border: none;
    border-bottom: 1px solid #f9f9f9;
    padding: 0px;
    font-size: 24px;
    font-weight: bold;
    background: none;
    border-bottom: 1px solid #ccc;
}
.amount_pay .c_headline{
        margin: 0px 0px 10px 0px;
    display: block;
    font-size: 14px;
}
.amount_pay{
        background: #f2f2f2;
    padding:20px 20px 0px 20px !important;
    margin: 20px 0px 0px 0px !important;
    height: 125px;

}
.amount_pay .input-icon{position: relative;    float: right;
    width: 48%;}
#payment .place-order .button{
    min-width: 110px !important;
    /* text-align: right; */
    float: right;
    position: absolute;
    right: 3px;
    width: 162px;
    bottom: -68px;
    margin: 0px !important;
    height: auto;
    box-shadow: none !important;
}

.totalamount .tax{    margin: 10px 0px 10px 0px;}
.totalamount .finalamt{clear:both;}
.fleft{float:left;}
.fright{}
.totalamount .tax .c_headline{font-size: 14px;}
.totalamount .tax .fright span{font-size: 16px;}
.youpay {
    padding-top: 12px;
    display: inline-block;
}
.paymentdiv{    border: 1px solid #f9f9f9;
	box-shadow: 0 0 10px #d0d0d0;
    border: 1px solid #cfcfcf;
    -moz-border-radius: 5px;
    -o-border-radius: 5px;
    -webkit-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 0px 0px 30px 0px;}
.pricelabel{
    font-size: 24px;
    font-weight: bold;
}
.coupondiv{clear:both;}
.coupondiv h4 {
    font-size: 14px;
    font-weight: normal;
    margin: 0px;
}
.discount_amt, .coupon_amt{text-align: right;}
.discount_amt span{
  font-size: 14px;
}
#applycoupon {
    cursor: pointer;
    border: 1px solid #f2f2f2;
    border-radius: 5px;
    padding: 10px 20px;
}
.cop{border-bottom:1px solid #f2f2f2;}
.cop .radio{
      background: #f2f2f2;
    display: inline-block;
    padding: 10px 10px 10px 35px;
    border-radius: 5px;
        width: 45%;
    font-size: 12px;
    margin-top: 20px;
}
.paydiv .paymenttype{
      margin: 3px 10px 0px 0px !important;
    display: inline-block;
    position: inherit !important;
    clip: inherit !important;
}
#coupondiv b{
    font-weight: bold;
    color: green;
    text-transform: uppercase;
}
#coupondiv .pricelabel{font-size: 14px;}
#coupondiv{    text-align: right;}
#coupondiv .c_headline{padding:0px;}
.c_error{
    font-size: 14px;
    margin: 5px 0px 0px 0px;
    color: red;
}
.remove_coupon{
  color: #333;
    text-decoration: underline;
    cursor: pointer;
}
.totalprice .c_headline{
        padding: 0px 20px 0px 0px;
    display: inline-block;
}
.course_info table{font-size: 14px;}
.course_info table th{border-bottom: 1px solid #f2f2f2 !important;}
.course_info #tab{margin:20px 0px 0px 0px;}
#tab a{
    border: none;
    background: transparent;
    box-shadow: none;
    border-bottom: 2px solid #fff;
    border-radius: 0px;
    margin: 0px 20px 10px 0px;
    padding: 0px 10px 6px 0px;
}

.countrytext {
    font-size: 12px;
    text-align: left;
    color: #ccc;
}


.batch-Card .coursePeriod {
  border-top: 1px solid #e3e3e3;
  color: #262627;
  padding: 0 20px;
}
.batch-Card .coursePeriod .months {
  margin-top: 10px;
}
.batch-Card .coursePeriod .months b {
  font-weight: 600;
  display: block;
  width: 100%;
}
.batch-Card .coursePeriod .months .monthsOfCourse {
  display: block;
  font-size: 40px;
  font-weight: 600;
  line-height: 1;
}
.batch-Card .coursePeriod .months p {
  font-size: 12px;
}
.batch-Card .coursePeriod .startDate {
  color: #262627;
  margin-bottom: 0px;
}
.batch-Card .coursePeriod .startDate .fa {
  vertical-align: middle;
  display: inline-block;
  margin-top: -2px;
}
.batch-Card .coursePeriod .startDate .fa + span {
  padding-left: 3px;
}
.batch-Card .coursePeriod .timePeriod {
  color: #262627;
  font-size: 12px;
  display: inline-block;
  margin: 0 auto;
  max-width: 100%;
  min-width: 181px;
  text-align: center;
}
.batch-Card .coursePeriod .timePeriod i {
  float: left;
  width: 15px;
  vertical-align: middle;
  font-size: 15px;
}
.batch-Card .coursePeriod .timePeriod i + div {
  padding-left: 5px;
  display: table;
  margin-right: auto;
}
.batch-Card .coursePeriod .timePeriod span {
  display: block;
}
.batch-Card .coursePeriod .downloadBrocture {
  padding: 6px 0 10px;
}
.batch-Card .coursePeriod .downloadBrocture a {
  color: #384cb8;
  font-size: 12px;
  cursor: pointer;
}
.batch-Card .coursePeriod .downloadBrocture a .fa {
  font-size: 23px;
  padding-right: 8px;
  vertical-align: middle;
  margin-top: -2px;
  display: inline-block;
}
.batch-Card .imgdiv {
    min-height: 150px;
    line-height: 0px;
    border-bottom: 1px solid #cfcfcf;
    background-size: cover;
}
.divider-or {
    text-align: center;
    text-transform: uppercase;
    color: #333;
    position: relative;
    border-top: 1px solid #919191;
    margin-top: 30px;
    clear:both;
}
#billing_email_field{margin-bottom:10px;}
.col-courses-card {
  box-shadow: 0 0 10px #d0d0d0;
  border: 1px solid #cfcfcf;
  -moz-border-radius: 5px;
  -o-border-radius: 5px;
  -webkit-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
  overflow: hidden;
  padding-bottom:30px;
  text-align: center;
}
#billing_email{margin-bottom: 0px}
.course_title p{font-size: 12px;line-height: 18px;}
.course_title{padding-bottom: 10px;}
.course_title h5{    font-size: 16px;
    font-weight: bold;
    padding: 10px;}

.divider-or span{
    vertical-align: middle;
    position: relative;
    display: inline-block;
    top: -18px;
    width: 35px;
    height: 35px;
    background: #EEEEEE;
    border-radius: 50%;
    line-height: 35px;
}

#payment .place-order{
    padding: 0;
}

@media only screen and (max-width: 1023px) {
  .batch-Card .coursePeriod .startDate {
    margin-bottom: 9px;
  }
}
input-icon {
  position: relative;
}
.course_info h3{margin:0px;}
.input-icon > i {
  position: absolute;
  display: block;
  transform: translate(0, -50%);
  top: 49%;
      font-size: 24px;
  pointer-events: none;
  width: 25px;
  text-align: center;
       font-weight: bold;
       left:11px;
}
#coupondiv{
            margin: 0px;
    line-height: 20px;
    padding: 10px 20px;
}
.totalprice{text-align: right;padding:0px 20px 10px 20px;}
.input-icon > input {
  padding-left: 35px;
    padding-right: 0;
    width:100%;
}
.totalprice.first{padding-top:20px;}
.totalprice .pricelabel{font-size: 18px;}
.finalamt .pricelabel{font-size: 24px !important;}
.input-icon-right > i {
  right: 0;
}
.duedate{
      text-align: right;
    padding: 10px 20px 0px 0px;
    font-size: 14px;
}
.duedate span{font-weight: bold;}

.input-icon-right > input {
  padding-left: 0;
  padding-right: 25px;
  text-align: right;
}
#order_review_heading, .product-quantity, .payment_box, .callToactions, .create-account{display:none !important;}
#order_review {
    float: none !important;
    width: 100% !important;
}
.yith-wcms-button{
    background: transparent;
    border: none;
    border: 2px solid #f2f2f2;
    margin: 0px;
    border-radius: 5px;
    padding: 10px 30px;
}
.yith-wcms-button:hover{border: 2px solid #f26522;background:#f26522;color:#fff;}
.woocommerce .form-row input[type='submit']{font-size: 18px !important;}
.woocommerce-checkout-review-order-table{width:100%;text-align:left;}
#payment{
          display: block;
    width: 60% !important;
    margin: 0px auto !important;
    text-align: center;
    border: none !important;
}
#payment .payment_methods{border:none !important;}
#payment .payment_methods li{
display: inline-block;
    float: left !important;
    border:none !important;
}


/* Checkout Page CSS */
.product-quantity{display:none !important;}
    #customer_details table{
    border: 1px solid #f2f2f2;
    font-size: 14px;
    margin: 20px 0px;
	}
	#customer_details .col-2{background: #f8f8f8;
    padding: 10px;
}
	#customer_details thead{    background: #f2f2f2;}
	.woocommerce-billing-fields, .woocommerce-billing-fields span, .woocommerce-billing-fields a, .select2-container .select2-choice {font-family:"proxima-nova", sans-serif;}
	.woocommerce-billing-fields input, .demo-row .cupdateprice{
    -webkit-appearance: none;
    -ms-appearance: none;
    -moz-appearance: none;
    appearance: none;
    box-shadow: none;
    border: none;
    border-bottom: 1px solid #e3e3e3;
    width: 100%;
    font-size: 14px;
    min-height: 38px;
    -moz-transition: 300ms linear;
    -o-transition: 300ms linear;
    -webkit-transition: 300ms linear;
    -ms-transition: 300ms linear;
    transition: 300ms linear;
    margin-bottom: 20px;
    padding: 0px;
    font-family:"proxima-nova", sans-serif;
    color:#333;
}
.cupdateprice{
	    margin: 10px 0px;
	        padding: 0px 10px;
}
.select2-container .select2-choice{font-size:14px;}
.cupdateprice{    font-size: 32px !important;
    padding-top: 14px !important;
}
#payment{padding:20px 0px 0px 0px;}
#payment .payment_methods{border:none;}
#payment .payment_methods li{float:left;border:none;}
#payment .payment_methods li .payment_box{display:none !important;}
#payment .payment_methods li label{margin-left:10px;}
#order_review, #order_review_heading{    margin: 0px 0px 20px 0px;
    padding: 0px;  border: none;}
    .woocommerce-billing-fields h3{    margin: 0px 0px 20px 0px;}
#talentedge-checkout-coupon .checkout_coupon .form-row-first input[type="text"]{border:none !important;}
.amount_pay{padding-top:20px;}
.choose .cradio{
	    border: 1px solid #f2f2f2;
    padding:10px;
}
.choose .active{
    background: #f2f2f2;
}
.choose .cradio span{    padding-left: 30px;cursor: pointer;}
.choose .cradio input{    margin-left: 5px;}
.choose .emidiv{
	margin-left:0px;
}
.choose .center{padding:0px;}
.woocommerce #talentedge-checkout-coupon .form-row input[type='submit']{
background-color: #f26522;	
}
#payment .place-order .button{
    background-color: #f26522;
    color: #ffffff;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    -webkit-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    display: inline-block;
    margin: 15px 5px 0;
    font-size: 14px !important;
    font-weight: 500;
    border: 2px solid #f26522;
    padding: 11px 20px 10px 20px;
    text-align: center;
    -moz-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    -webkit-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    transition: all 200ms linear;
}
#payment .place-order .button:hover{
	  box-shadow: 0 0px 0px #983100;
    -moz-transition: all 100ms linear;
    -o-transition: all 100ms linear;
    -webkit-transition: all 100ms linear;
    -ms-transition: all 100ms linear;
    transition: all 100ms linear;
    background-color: #f26522;
}

/* WIxard CSS */
/* ~~ Font family declaration ~~ */
.wizard {
  margin: 20px auto;
  background: #fff; }

.wizard .nav-tabs {
  position: relative;
  margin: 0px auto;
  margin-bottom: 0;
  border-bottom: none; }

.wizard > div.wizard-inner {
  position: relative; }

.wizard .nav-tabs > li a:hover,
.wizard .nav-tabs > li a:focus {
  color: #fff;
  border: none; }

.wizard .nav-tabs > li.active > a,
.wizard .nav-tabs > li.active > a:hover,
.wizard .nav-tabs > li.active > a:focus {
  color: #fff;
  cursor: default;
  border: 0;
  border-bottom-color: transparent;
  background: none; }

span.round-tab {
  width: 40px;
  height: 40px;
  line-height: 40px;
  display: inline-block;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  -webkit-border-radius: 50%;
  -ms-border-radius: 50%;
  border-radius: 50%;
  background: #fff;
  border: 2px solid #0B8FBF;
  z-index: 2;
  position: absolute;
  left: -20px;
  top: 50%;
  margin-top: -20px;
  text-align: center;
  font-size: 13px; }

span.round-tab i {
  color: #555555; }

.wizard li.active span.round-tab {
  background: #fff;
  border: 2px solid #234796; }

.wizard li.active span.round-tab i {
  color: #5bc0de; }

.wizard .nav-tabs > li {
  width: 33.33%;
  background-color: #0b8fbf; }
  .wizard .nav-tabs > li.active {
    background: #234796; }

.btn-normal {
  box-shadow: none; }

.wizard .nav-tabs > li a {
  margin: 12px auto;
  border-radius: 100%;
  padding: 0;
  color: #fff;
  background: none;
  border: none; }
  .wizard .nav-tabs > li a:hover {
    background: none; }
  .wizard .nav-tabs > li a span.text-tab-title {
    vertical-align: middle;
    display: inline-block;
    padding-left: 50px; }

.wizard .tab-pane {
  position: relative;
}

.checkout_login{
    margin-bottom: 10px;
}
.list-inline li{
    margin-top: 5px;
    margin-bottom: 5px;
}
#step3 .list-inline .none{
    visibility: hidden;
    max-width: 167px;
}

@media (max-width: 1023px) {
    form.checkout.woocommerce-checkout .col-centered{
        width: 100%;
        padding: 0;
    }
    .payment_options .cards .col-md-3 img{
        margin: 0 auto;
    }
    .payment_options .cards .col-md-3{
        width: 48%;
        float: left;
    }
    .payment_options .cards .col-md-3:nth-child(2n){
        float: right;
    }
    .payment_options .card{
        border-color: #ebebeb;
    }
}
@media (max-width: 991px) {
    .wizard .nav-tabs > li a,
    .wizard .nav-tabs > li.active a{
        margin: 0;
        color: #333;
    }
    .wizard .nav-tabs > li,
    .wizard .nav-tabs > li.active{
        background: none;
    }
    .wizard .nav-tabs > li a span.text-tab-title{
        padding-left: 0;
        vertical-align: top;
        display: block;
        margin-top: 8px;
    }
    .wizard .nav-tabs > li a:hover, .wizard .nav-tabs > li a:focus{
        color:  #333 !important;
    }
    span.round-tab{
        left: 0;
        width: 60px;
        height: 60px;
        font-size: 24px;
        line-height: 63px;
        position: relative;
        top: 0;
        margin-top: 0;
    }
    .checkout_1 .batch-Card{
        margin-bottom: 25px;
        max-width: 280px;
    }
}
@media (min-width: 668px) and (max-width: 736px){
    .col-courses-card{
        float: left;
    }
    .woocommerce-billing-fields{
        float: right;
    }
    .course_image{
        width: 240px;
        float: left;
        margin-bottom: 25px;
    }
    #checkoutdiv{
        float: right;
    }
}
@media (max-width: 667px){
    .col-courses-card{
        margin-right: auto;
        margin-left: auto;
        float: none;
        max-width: 280px;
    }
    .course_image{
        margin-right: auto;
        margin-left: auto;
        float: none;
        margin-bottom: 25px;
        max-width: 250px;
        padding: 0;
    }
    #checkoutdiv{
        width: 100%;
        float: none;
    }
}

@media (max-width: 585px) {
  .wizard {
    height: auto !important; }
    .wizard li.active:after {
      content: " ";
      position: absolute;
      left: 35%; }
      .wizard .nav-tabs > li a span.text-tab-title{
        font-size: 13px;
      }
}
@media (max-width: 567px) {
    .form-row-first,
    .form-row-last{
        width: 100%;
        float: none;
    }
    .payment_options .cards .col-md-3{
        width: 50%;
    }
}
#paymentoptions{
    width: 55%;
    float: left;
    margin: 0px 0px 0px 30px;
    display: none !important;
}
.shop_table{
	    width: 40%;
    float: left;
    text-align: left;
}
#payment {
    padding: 20px 40px 0px 0px;
        width: 100% !important;
}
.woocommerce-order-pay #order_review .payment_methods+.form-row {
    float: right;
    margin: 10px 0px 10px 0px !important;
}
.none{display:none;}
@media (max-width: 600px){
.woocommerce table.shop_table th {
    padding: 5px 5px;
    font-size: 16px;
}
}
@media (max-width: 600px){
.woocommerce table.shop_table td .amount, .woocommerce table.shop_table td, .woocommerce table.shop_table td span, .woocommerce table.shop_table td a, .woocommerce table.shop_table td strong {
    font-size: 15px;
    line-height: 18px;
}
#paymentoptions {
    width: 100%;
    float: left;
    /* margin: 30px; */
    /* clear: both; */
}
}
.none{display:none !important;}
.woocommerce-order-pay #order_review .payment_methods+.form-row{clear:both;}
.shop_table{
        width: 80%;
    float: left;
    text-align: left;
}
</style>
<form id="order_review" method="post">
<p>Complete your Course Order</p>
	<table class="shop_table">
		<thead>
			<tr>
				<th class="product-name"><?php _e( 'Course', 'woocommerce' ); ?></th>
				<!--<th class="product-quantity"><?php _e( 'Qty', 'woocommerce' ); ?></th>-->
				<th class="product-total"><?php _e( 'Totals', 'woocommerce' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if ( sizeof( $order->get_items() ) > 0 ) : ?>
				<?php foreach ( $order->get_items() as $item_id => $item ) : ?>
					<?php
						if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
							continue;
						}
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
						<td class="product-name">
							<?php
								echo apply_filters( 'woocommerce_order_item_name', esc_html( $item['name'] ), $item, false );

								do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order );
								$order->display_item_meta( $item );
								do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order );
							?>
						</td>
						<!--<td class="product-quantity"><?php echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', esc_html( $item['qty'] ) ) . '</strong>', $item ); ?></td>
						-->
						<input type="hidden" id="totalamt" value="<?php echo $item['line_subtotal'];?>">
						<td class="product-subtotal"><?php echo $order->get_formatted_line_subtotal( $item ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
		<tfoot>
			<?php if ( $totals = $order->get_order_item_totals() ) : ?>
				<?php foreach ( $totals as $total ) : ?>
					<tr>
						<th scope="row" colspan="1"><?php echo $total['label']; ?></th>
						<td class="product-total"><?php echo $total['value']; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tfoot>
	</table>

	<div id="paymentoptions" clas="formpay none">
                        <div class="payment_options">
                        <div class="payment_header"><h4>Select Your Payment gateway</h4>
                        <h5>Cards</h5>
                        </div>
                        <div class="row c_inr">
                            <div class="col-md-12 col-centered">
                                <div class="paymentoptions">
                                    <div class="cards">
                                    <?php
                                    $k=1;
                                    // check if the repeater field has rows of data
                                    if( have_rows('cards','option') ):

                                        // loop through the rows of data
                                        while ( have_rows('cards','option') ) : the_row();
                                        ?>
                                        <div class="col-md-3 active_<?php echo $k;?>">
                                            <div class="card formpay">
                                                <h5><?php echo get_sub_field('name');?></h5>
                                                <img src="<?php echo get_sub_field('logo');?>" class="img-responsive"/>
                                                <input type="hidden" value="atom" class="ptype"/>
                                            </div>
                                        </div>
                                        <?php
                                        $k++;
                                        endwhile;
                                    endif;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row c_inr">
                            <div class="col-md-12 col-centered">
                                <div class="paymentoptions">
                                    <div class="cards">
                                    <?php
                                    // check if the repeater field has rows of data
                                    if( have_rows('other_options','option') ):

                                        // loop through the rows of data
                                        while ( have_rows('other_options','option') ) : the_row();

                                        ?>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <h5><?php echo get_sub_field('name');?></h5>
                                                <img src="<?php echo get_sub_field('logo');?>" class="img-responsive"/>
                                                <input type="hidden" value="atom" class="ptype"/>
                                            </div>
                                        </div>
                                        <?php

                                        endwhile;
                                    endif;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-centered c_usd none">
                                <div class="col-md-12 col-centered">
                                    <div class="paymentoptions">
                                        <div class="col-md-5 col-centered">
                                            <div class="card active">
                                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/international.jpg" class="img-responsive">
                                                <input type="hidden" value="payu_in" class="ptype">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        </div>
                    </div>

	<div id="payment">
		<?php if ( $order->needs_payment() ) : ?>
			<ul class="wc_payment_methods payment_methods methods">
				<?php
					if ( ! empty( $available_gateways ) ) {
						foreach ( $available_gateways as $gateway ) {
							wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
						}
					} else {
						echo '<li>' . apply_filters( 'woocommerce_no_available_payment_methods_message', __( 'Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) ) . '</li>';
					}
				?>
			</ul>
		<?php endif; ?>
		<div class="form-row">
			<input type="hidden" name="woocommerce_pay" value="1" />

			<?php wc_get_template( 'checkout/terms.php' ); ?>

			<?php do_action( 'woocommerce_pay_order_before_submit' ); ?>

			<?php echo apply_filters( 'woocommerce_pay_order_button_html', '<input type="submit" class="button alt btn-normal" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' ); ?>

			<?php do_action( 'woocommerce_pay_order_after_submit' ); ?>

			<?php wp_nonce_field( 'woocommerce-pay' ); ?>
		</div>
	</div>
</form>
<script>
jQuery(document).ready(function () {
    //$('.atompayment').html('Atom');
    $("tfoot td").each(function() {
      if ($(this).html()=='PayU' || $(this).html()=='paytm'){
        $(this).html('Atom');
      }
    });
     $('.payment_method_atom input[name="payment_method"]').prop("checked",true); 
});
</script>
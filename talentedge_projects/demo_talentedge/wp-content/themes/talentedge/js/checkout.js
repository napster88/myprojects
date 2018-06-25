$(document).ready(function () {
  /* Checkout page Password popup */
  $('#up_userpass_form_submit').on('click', function(){
    $('.up_userpass').css('border', 'none');
    $('.pass_error').hide();
    var up_useremail = $('.up_useremail').val();
    var up_userpass = $('.up_userpass').val();
  //  alert(up_useremail);
    $.ajax({
     async: false,
     type: "POST",
     data: {
       email:up_useremail,
       pass:up_userpass,
       action: 'up_popup_login_user'
       },
      dataType: "text",
      url: ajaxurl,
      success: function(data) {
         console.log(data);
         if(data == true){
          $('.up_change_passclose').click();
          location.reload();
        }else{
          $('.up_userpass').css('border', '1px solid #ff0000');
          $('.pass_error').show();
        }

      }
    });
  });
/* Checkout page Password popup End */

    $('#referralID').val('');
    $('#account_password').val('0Fq5w@T580te');
    //Initialize tooltips
    // $('.nav-tabs > li a[title]').tooltip();
    function isEmail(email) {
      var regex = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
      return regex.test(email);
    }
    function isPhone(value){
        var country = $('#billing_country').val();
        if (country!='IN'){
        var regex = new RegExp(/^\d{7,13}$/);
        } else{
           var regex = new RegExp(/^\d{10}$/);
        }
        return regex.test(value);
    }

     $('.woocommerce-checkout').on('submit', function(e) {
       if($('#order_currency').val() != 'USD'){
          $('.payment_method_razorpay input[name="payment_method"]').prop("checked",true);
       }else{
          $('.payment_method_payu_in input[name="payment_method"]').prop("checked",true);
       }


        if($(e.target).hasClass('woocommerce-checkout')) {
            e.preventDefault();
            return;
        }
        return true;
    });

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
        var check =1;
        console.log($target.attr('href'));

        /*currency issue fixed everywhere*/
        $('.table.c_inr.active').parents('#checkoutdiv').find('.c_currency').html('&#8377;');

        var email = $('#billing_email').val();
       // var emialval = isEmail(email);
        var phone = $('#billing_phone').val();
        $('.amountpay_msg').html('');
        //var phoneval = isPhone(phone);
        $('.woocommerce-billing-fields input').removeClass('cerror');

        /* Checkout page Score popup */
        if($('#course_id').val() == 40495){
          if(isEmail(email)) {
            var scorestatus = check_user_score(email);
            if(scorestatus == 0){
            //  alert('No Score');
              $('#open_assess_popup').click();
              $('#assess_username').text($('#billing_first_name').val());
              check = 0;
              return false;
            }else if(scorestatus == 2){
              $('#open_assess_done_popup').click();
              check = 0;
              return false;
            }
          }
        }
        /* Checkout page Score popup End */

        if ($target.attr('href')=='#step2'){
             // Make sure we entered the name

                jQuery('#account_password').val('0Fq5w@T580te');
                if(!$('#billing_first_name').val()) {
                    $('#billing_first_name').addClass('cerror');
                    check = 0;
                }
                if(!$('#billing_last_name').val()) {
                    $('#billing_last_name').addClass('cerror');
                    check = 0;
                }

                if(isEmail(email)) {
                  /* Checkout page Score popup */
                  if (!$('body').hasClass('logged-in')) {
                      var userstatus = check_registered_user(email);
                      if(userstatus == false){
                        //alert('popup');
                        $('#up_useremail_id').text(email);
                        $('.up_useremail').val(email);
                        $('#open_pass_popup').click();
                        check = 0;
                        return false;
                      }
                    }
                    /* Checkout page Score popup */
                 } else{
                    $('#billing_email').addClass('cerror');
                    check = 0;
                }
                 if(isPhone(phone)) {
                    $('.validate-phone .countrytext').hide();
                 } else {
                    $('#billing_phone').addClass('cerror');

                    if ( $('.validate-phone .countrytext').length ) {

                    } else {

                    $('.validate-phone').append('<p class="countrytext">Invalid Phone Number</p>');

                    }
                    check = 0;
                }
                if($('#billing_country').val()!='IN'){
					//$('#billing_state').val($('#billing_country').val());
				//$('#billing_state').val($.trim($('#billing_billing_stateuser').val()));
				 //console.log($('#billing_state').val());
				console.log('state'+$('#billing_state').val());
				}else{
					if(!$('#billing_state').val()) {
						$('#billing_state').addClass('cerror');
						check = 0;
					}
				}

                //var price = $('.amount_to_pay').val();
				//get_userinput_price(price);
                if (check == 0){ return false;}
                if($('#repayment').val()==0){
					update_cart('full') ;
				}else{
					update_cart('rep') ;
				}

				if($('#showtaxlbl').val()==1){
						$('.nonhryana').hide();
						$('.hryana').hide();
						$('.hryanaold').show();
						if($('#billing_country').val()!='IN'){
							$('.hryanaold').hide();

						}
				}else{

					if($('#repayment').val()==0){
						if($('#billing_state').val()==BASECITY){
							$('.hryana').show();
							$('.nonhryana').hide();
							$('.hryanaold').hide();
						}else{
							$('.nonhryana').show();
							$('.hryana').hide();
							$('.hryanaold').hide();
						}
					}else{

						if($('#showtaxlblhr').val()==1){
							$('.hryana').show();
							$('.nonhryana').hide();
							$('.hryanaold').hide();
						}else{
							$('.nonhryana').show();
							$('.hryana').hide();
							$('.hryanaold').hide();
						}
					}
					if($('#billing_country').val()!='IN'){
							$('.hryana').hide();
							$('.nonhryana').hide();
							$('.hryanaold').hide();

					}

				}


               /* if ($('#discount_amt').html()==''){
                var total_amt = $('#full_table .active .full_amt_price').val();
                var course_id = $('.course_id').val();
                check_discount_code(course_id, total_amt);
                }
                */
        }
        if ($target.attr('href')=='#step3'){
            console.log('disabled:true');
             $('#place_order').attr('disabled', true);
            if(!$('.amount_to_pay').val()) {
                    $('.amountpay_msg').html('Enter the amount to proceed');
                    return false;
                }
            $('.card').removeClass('active');
            var currency_sym = $('.c_currency').html();
            var cvalue = $('#billing_country').val();
            if (cvalue=='IN' && currency_sym !='$'){
                //check_payment_type2();
                $('.payment_options .c_inr').show();
                  $('.payment_options .c_usd').hide();
            var price = $('.amount_to_pay').val();
            price = removeCommas(price);
            if (price>2000){
                $('.active_1').show();
                $('.active_1 .card').addClass('active');
                $('.active_2').hide();
                $('.payment_method_razorpay input[name="payment_method"]').prop("checked",true);
            }
            else{
                 $('.active_2').show();
                 $('.active_2 .card').addClass('active');
                 $('.active_1').hide();
                  $('.payment_method_razorpay input[name="payment_method"]').prop("checked",true);
            }

            }
            else{
                 $('.c_usd .card').addClass('active');
                 $('.payment_method_payu_in input[name="payment_method"]').prop("checked",true);
                 $('.payment_options .c_inr').hide();
            }
            var price = $('.amount_to_pay').val();
            get_userinput_price(price);

			var name='Debit Card';
			 //alert(name);
			  $.ajax({
			   async: false,
			   type: "POST",
			   data: {
				   cardname:name,
				   action: 'set_card_name'
				   },
					dataType: "text",
					url: ajaxurl,
					success: function(data) {
					   console.log(data);
					}
				});
        }
        if ($target.parent().hasClass('disabled')) {
            return false;
        }

        $('.woocommerce-checkout').submit(function() {
                return true;
        });

    });

    $(".next-step").click(function (e) {
	var idname=$(this).attr('id');
        if(idname=='validatebtn'){
		var i='1';
        }else{
		var i='2';
        }
        var full_actualprice = parseInt($('.full_actualprice').text().replace(/,/g, '')); //amount_to_pay
        var amount_to_pay = parseInt($('.amount_to_pay').val().replace(/,/g, ''));
        var balanceamount = parseInt($('.balanceamount').text().replace ( /[^\d.]/g, '' ));
	var finalpayment = parseInt($('.final_amt').text().replace ( /[^\d.]/g, '' ));
        var courseid=$('#course_id').val();
	var course_name=$('.course_details h3').html();
	var brand=$('.course_title p').html();
	var batch=$('#batchname').val();
	var category=$('#categoryname').val();//alert('test1111'+course_name+"=courseid=="+courseid+"==batch=="+batch+"=brand="+brand+"==category=="+category);
//alert(full_actualprice+"======"+balanceamount+"==="+finalpayment);
        if(amount_to_pay > balanceamount){ alert("Payable amount exceeds Balance amount."); return false;}
        if(amount_to_pay > full_actualprice){ alert("Payable amount exceeds actual amount."); return false;}
        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        //localStorage.setItem("amount_to_pay", $('.amount_to_pay').val());
        dataLayer.push({'event': 'checkout',
			'ecommerce': {'checkout':
				 {'actionField': {'step': i},       
			'products': [{'name': course_name,
			'id': courseid,
			'price': finalpayment,
			'brand': brand,
			'category': category,
			'variant': batch,
			'quantity': 1 }]}},
		'eventCallback': function() {
		//document.location = nextTab($active);
		}
		});//alert('test1111'+course_name);
        nextTab($active);
    });
    $(".prev-step").click(function (e) {

        $(".instoption").click();

         //alert(amount_to_pay);
         var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);
    });

    var tabId = window.location.hash.substr(1);
    //$('.wizard .nav-tabs li').removeClass('active');
    if(tabId == 'step3'){
        $('.wizard .nav-tabs li').removeClass('active');
        var $active = $('.wizard .nav-tabs li:eq(2)').removeClass('disabled').addClass('active');
        nextTab($active);
        $('#' + tabId).parent().find('> .tab-pane').removeClass('active');
        $('#' + tabId).removeClass('disabled').addClass('active');
    }

    $('#billing_country').on('change',function(){

		if($(this).val()=='IN'){
		  	$('#billing_state_field').show();
		  	$('#billing_billing_fstate_field').hide();
		}else{
			$('#billing_state_field').hide();
			$('#billing_billing_fstate_field').show();
			$('#billing_state_field').val(BASECITY);
 			$('#billing_state').val($('#billing_country').val());
			console.log('state'+$('#billing_state').val());
		}
	});



});



function nextTab(elem, index) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {

    $(elem).prev().find('a[data-toggle="tab"]').click();
    $(".instoption").click();

//    var checkedVal = $('input[name="payradio"]:checked').val();
//    if(checked=="installment"){
//     $(".instoption").click();
//    }
}

/* Checkout page popup functions */
function check_registered_user(email){
  var userstatus = false;
  $('.up_userpass').css('border', 'none');
  $('.pass_error').hide();
  $.ajax({
   async: false,
   type: "POST",
   data: {
     email:email,
     action: 'check_registered_user'
     },
    dataType: "text",
    url: ajaxurl,
    success: function(data) {
       console.log(data);
       if(data == 0){
         userstatus = true;
       }else if(data == 1){
         userstatus = false;
       }

    }
  });
  return userstatus;
}

function check_user_score(email) {
  var userstatus = false;
  $.ajax({
   async: false,
   type: "POST",
   data: {
     email:email,
     action: 'check_user_score'
     },
    dataType: "text",
    url: ajaxurl,
    success: function(data) {
       console.log(data);
       // if(data == 0){
       //   userstatus = false;
       // }else if(data == 1){
       //   userstatus = true;
       // }
       userstatus = data;
    }
  });
  return userstatus;
}
/* Checkout page popup functions End */

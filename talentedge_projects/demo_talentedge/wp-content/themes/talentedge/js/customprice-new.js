
function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function removeCommas(str) {
    while (str.search(",") >= 0) {
        str = (str + "").replace(',', '');
    }
    return str;
}
  



  function curr_tab(cvalue, type){
    var payamt = $('.amount_to_pay').val();
    patamy_ = removeCommas(payamt);
      var f_amt = $('.f_active').val();
      var i_amt = $('.i_active').val();
      if (patamy_==f_amt || patamy_ == i_amt){
       if (type=='full') {
           var amt_comma = addCommas(f_amt);
           $('.amount_to_pay').val(amt_comma);
        }
        else{
            var amt_comma = addCommas(i_amt);
           $('.amount_to_pay').val(amt_comma);
        } 
      }
  }

  function calculate_tax(amt){
    var am = amt;
    var ta = 15;
    var total = (am * ta) / 100;
    return total;
  }

  
  function country_change(currency){
            $.ajax({
                type : "POST",
                url: ajaxurl,
                data: {
                  'action' : 'get_Installment_price2',
                   'currency' : currency
                },
                success:function(data) {
                   console.log(data);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
      }

  function get_userinput_price(price){
    $('#place_order').attr('disabled','disabled');  
       // We'll pass this variable to the PHP function example_ajax_request
         // This does the ajax request
         $('#place_order').removeAttr("disabled");
         var price = $('.amount_to_pay').val();
         console.log('udpate checkout');
         price = removeCommas(price);
            $.ajax({
                type : "POST",
                url: ajaxurl,
                data: {
                  'action' : 'get_installmentprice_ajax',
                   'installments' : price
                },
                success:function(data) {
                   console.log(data);
                   $( 'body' ).trigger( 'update_checkout');
                   $('.step3div').show();
                   $('#place_order').show();
                   $('#place_order').removeAttr("disabled");
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
      }
  function check_coupon_code(coupon, total_amt){
     var cvalue = $('#billing_country').val();
     var type = $('#tab a.active').find('input').val();
    var courseid = $('#course_id').val();

     var actualamount;
     console.log(coupon+"pppp");
        $.ajax({
            type : "POST",
            url: ajaxurl,
            data: {
              'action' : 'coupon_code_check',
               'coupon' : coupon,
               'totalamount' : total_amt,
               'currency' : cvalue,
               'courseid' : courseid
            },
            success:function(data) {
              console.log(data);
                if (data.discount==1){
                console.log(data);
                var amount_ = data.price;
                var dis_ = data.discount_price;

                $('#course_coupon').prop('disabled',true);
                $( "<span class='fa right icon-down_arrow applied-tick'></span>" ).insertAfter( "#course_coupon" );
                $('#applycoupon').hide();
                $( "#course_coupon" ).addClass('applied-success');
                $('#coupon_value').html(addCommas(data.price));
                $('#coupon_amt').html(addCommas(data.discount_price));
                $('#coupondiv').show();
                $('.remove_coupon').css('display', 'table');
                $('.coupon_error').hide();
                $('.discount_amt').hide();
                $('#order_coupon').val(data.discount_price);
                $('.cp_success').show();
                $('#order_final_amount').val(data.price);
                $('#order_discount').val(data.discount_price);

                $('#full_table .active .full_amt_price').val(data.price); 
                $('#full_table .active .famt').html(addCommas(data.price)); 
                
                if($.trim($("#inst_table .c_inr tbody").html())!=''){
                //console.log('inst_coupon');
                var lastinst_val = $('#inst_table .active tr:last .c_camt').last().html(); 
                var finalinstval = parseInt(removeCommas(lastinst_val)-parseInt(dis_));
                $('#inst_table .active tr:last .c_camt').last().html(addCommas(finalinstval)); 
                }
                   
                if (type=='full'){
                 update_totals(amount_);
                }
               }
               else{
                $('.coupon_error').show();
                $('.coupon_error').html(data.msg);
               }
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
  }
      
  function check_discount_code(courseid, total_amt){
     var cvalue = $('#billing_country').val();
     var type = $('#tab a.active').find('input').val();
     var actualamount;
     console.log(total_amt+"pppp");

        $.ajax({
            type : "POST",
            url: ajaxurl,
            data: {
              'action' : 'discount_code_check',
               'pid' : courseid,
               'totalamount' : total_amt,
               'currency' : cvalue,
            },
            success:function(data) {
              //console.log(data);
              // if (data.discount==1){
                console.log(data);
                //alert(data);
                var amount_ = data.price;
                var dis_ = data.discount_price;
                
                $('#coupon_value').html(addCommas(data.price));
                $('#discount_amt').html(addCommas(data.discount_price));
                $('.coupondiv').hide();
                $('#coupondiv').show();
                $('.coupon_amt').hide();
                $('.disocuntdiv').html(data.discount_for);
                $('#order_discount').val(data.discount_price);
                $('#order_final_amount').val(data.price);

                $('#full_table .active .full_amt_price').val(data.price); 
                $('#full_table .active .famt').html(addCommas(data.price)); 
                
                if($.trim($("#inst_table .c_inr tbody").html())!=''){
                //console.log('inst_coupon');
                var lastinst_val = $('#inst_table .active tr:last .c_camt').last().html(); 
                //console.log(dis_);
                //console.log(lastinst_val);
                var finalinstval = parseInt(removeCommas(lastinst_val)-parseInt(dis_));
                $('#inst_table .active tr:last .c_camt').last().html(finalinstval); 
                //}
                //console.log(finalinstval);
                   
                if (type=='full'){
                 update_totals(amount_);
                }
               }
               else{
                //$('.coupon_error').show();
               }
               
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
  }




      function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }


  function update_totals(youpay){
    console.log('update totals');
  var currency = $('#billing_country').val();
  var currency_sym = $('.c_currency').html();
  console.log(currency_sym);
    if (youpay!=''){
    var order_total_amount = $('.full_actualprice').html();
    var order_final_amount=order_total_amount;
    $('.amount_to_pay').val(addCommas(youpay));
   
     if (currency=='IN' && currency_sym !='$' ){
        var taxamount = calculate_tax(youpay);
    }
    else{
        var taxamount = 0;
    }

    $('.tax_price').html(addCommas(taxamount));
    var fullamount = parseFloat(taxamount)+parseInt(youpay);
    $('.final_amt').html(addCommas(fullamount));
    $('#order_paid_amount').val(youpay);
    $('#order_total_amount').val(removeCommas(order_total_amount));
        if ($('#coupon_value').length){
           order_final_amount = $('#coupon_value').html();
        }

        $('#order_final_amount').val(removeCommas(order_final_amount));
    }
  }
  function update_coupon(type){
    console.log('coupondiv');
    if ($('#course_coupon').val()!=''){
      console.log('coupondiv2');
      var actualprice = $('.full_actualprice').html();
     var coupon = $('#course_coupon').val();
     console.log(actualprice);
     check_coupon_code(coupon,removeCommas(actualprice));
    }
  }

  function update_disocunt(){
    console.log('discountdiv');
      if ($('#discount_amt').html()!=''){
        console.log('discountdiv2');
      var total_amt = $('.full_actualprice').html();
     //var total_amt = $('#full_table .active .full_amt_price').val(); 
      var course_id = $('.course_id').val();
      check_discount_code(course_id, removeCommas(total_amt));
    }
  }

  function update_course_total(type){
    console.log('update course total');
    if (type=='full'){
              actualprice = $('#full_table .active .full_amt_price').val(); 
              youpay = actualprice;
        }
        else{
          actualprice = $('#full_table .active .full_amt_price').val(); 
          youpay = $('#inst_table .active .inst_amt_price').val(); 
        }
    $('.full_actualprice').html(addCommas(actualprice));
    update_totals(youpay);
  }

    function update_cart(type){
      console.log('updatecart');
      var actualprice;
      var youpay;
       if (type=='full'){
              actualprice = $('#full_table .active .full_amt_price').val(); 
              youpay = actualprice;
        }
        else{
          actualprice = $('#full_table .active .full_amt_price').val(); 
          youpay = $('#inst_table .active .inst_amt_price').val(); 
        }
      update_totals(youpay);
    } 



    function makeactive(currency, copradio){
    $('#inst_table .table').hide();
    $('#full_table .table').hide();
    $('#full_table .table').removeClass('active');
    $('#inst_table .table').removeClass('active');
       if (currency=='IN'){
              $('#order_currency').val('INR');
              $('.c_currency').html('₹');
              if (copradio && copradio=='1'){
              $('#inst_table table.cp_inr').show();
              $('#inst_table table.cp_inr').addClass('active');
              $('#full_table table.cp_inr').show();
              $('#full_table table.cp_inr').addClass('active');
              }
              else{
              $('#inst_table table.c_inr').show();
              $('#inst_table table.c_inr').addClass('active');
              $('#full_table table.c_inr').show();
              $('#full_table table.c_inr').addClass('active');
              }
            }
            else {
              $('#order_currency').val('USD');
              $('.c_currency').html('$');
              if (copradio && copradio=='1'){
              $('#inst_table table.cp_usd').show();
              $('#inst_table table.cp_usd').addClass('active');
              $('#full_table table.cp_usd').show();
              $('#full_table table.cp_usd').addClass('active');
              }
              else{
              $('#inst_table table.c_usd').show();
              $('#inst_table table.c_usd').addClass('active');
              $('#full_table table.c_usd').show();
              $('#full_table table.c_usd').addClass('active');
              }
            }
    }

jQuery(document).ready(function($) {

  

    /*
      
        function format(num, fix) {
            var p = num.toFixed(fix).split(".");
            return p[0].split("").reduceRight(function(acc, num, i, orig) {
                if ("-" === num && 0 === i) {
                    return num + acc;
                }
                var pos = orig.length - i - 1
                return  num + (pos && !(pos % 3) ? "," : "") + acc;
            }, "") + (p[1] ? "." + p[1] : "");
        }
*/
        $('#tab a').on('click', function(e) {
            var sradio = $(this).find('input').val();
            var currency = $('#billing_country').val();
            $('#payment_type').val(sradio);
            update_cart(sradio);
        });
        $('.cop input').on('click', function(e) {

            var type = $('#tab a.active').find('input').val();
            var sradio = $(this).val();
            $('#order_cop').val(sradio);
            var currency = $('#billing_country').val();
            makeactive(currency, sradio);
            update_cart(type);
            $('#coursetype').val(sradio);
           // validatecop(sradio,currency,type);
        });
        // $(document).on("keyup", "#applycoupon", function(e){
        //   $(this).removeClass("event-disabled");    
        // });

        $('#course_coupon').on('input', function() { 
            $('#applycoupon').removeClass("event-disabled");  
            $('.coupon_error').hide();
        });

         $('.remove_coupon').on('click', function(e) {
          var cvalue = $('#billing_country').val();
          var type = $('#tab a.active').find('input').val();
           $('#course_coupon').prop('disabled',false);
           $('#applycoupon').show();
           $('#order_coupon').val('');
           $('#course_coupon').html('');
           $('#coupondiv').hide();
           $('.cp_success').hide();
           $('#course_coupon').val('');
           $('#applycoupon').removeClass("event-disabled");
           $( "#course_coupon" ).removeClass('applied-success');
           $('.applied-success,.applied-tick').remove();
          var couponamt = $('#coupon_amt').html();
          console.log(couponamt);
          var lastinst_val = $('#inst_table .active tr:last .c_camt').last().html(); 
          var finalinstval = parseInt(removeCommas(lastinst_val)) + parseInt(removeCommas(couponamt));
          $('#inst_table .active tr:last .c_camt').last().html(addCommas(finalinstval)); 

           $(this).hide();
           var fullamount = $('.full_actualprice').html();
           $('#full_table .active .full_amt_price').val(removeCommas(fullamount)); 
           $('#full_table .active .famt').html(fullamount);
            update_cart(type)
        });

        $('#applycoupon').on('click', function(e) {
          if ($('#course_coupon').val()!='' && $(".cp_success").is(':hidden')){
            $('#course_coupon').css('border-bottom','1px solid #f2f2f2 !important;');
          $('#applycoupon').addClass( "event-disabled" );
          var coupon = $('#course_coupon').val();
          var cvalue = $('#billing_country').val();
          var famt = $('.full_actualprice').html();
          var total_amt = removeCommas(famt);
          check_coupon_code(coupon, total_amt);
          }
          else{
            $('#course_coupon').css('border-bottom','1px solid red !important;');
          }
        });

          $('.card').click(function() {
              $('.card').removeClass('active');
              $(this).addClass('active');
              var pvalue = $(this).find('input').val();
              console.log(pvalue);
              if (pvalue == 'paytm'){
              $('.payment_method_paytm input[name="payment_method"]').prop("checked",true); 
              }
               if (pvalue == 'payu_in'){
              $('.payment_method_payu_in input[name="payment_method"]').prop("checked",true); 
              }
               if (pvalue == 'atom'){
              $('.payment_method_atom input[name="payment_method"]').prop("checked",true); 
              }
          });


        $('#billing_country').on('change', function() {
          if ($('.returntype').val()==1){
          var cvalue = $(this).val();
          var type = $('#tab a.active').find('input').val();
          var copradio = $(".cop input[type='radio']:checked").val();
          //curr_onload(cvalue, type);
          console.log('country on vhange');
          makeactive(cvalue, copradio);
          update_course_total(type);
          update_coupon(type);
          update_disocunt();
          }
          //update_coupon(type);
          //update_disocunt();
          //

           /*if ($('.cop')){
            var copradio = $(".cop input[type='radio']:checked").val();
            validatecop(copradio, cvalue, type);
            }
            */
        });
        
          var cvalue = $('#billing_country').val();
          var type = $('#tab a.active').find('input').val();
          var copradio = $(".cop input[type='radio']:checked").val();



          if($.trim($("#inst_table .c_inr tbody").html())==''){
            $('.instoption').hide();
          }
          if (cvalue){
            //curr_onload(cvalue, type);
            if ($('.returntype').val()==1){
            makeactive(cvalue, copradio);
            update_cart(type);
            }
            /*if ($('.cop')){
            var copradio = $(".cop input[type='radio']:checked").val();
            validatecop(copradio, cvalue);
            }
            */
          }




       
        $('.indiacur').keyup(function(event) {

          // skip for arrow keys
          if(event.which >= 37 && event.which <= 40) return;

          // format number
          $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
          });
           var cmt =  removeCommas($(this).val());
            update_totals(cmt);
            get_userinput_price(cmt);
            if( $(this).val() > 10 ){

            }
            if ($(this).val().length >  9) {
              $(this).val($(this).val().substring(0, 9));
            }
        });
        /*$('.amount_to_pay').blur(function()
        {
            if( !$(this).val() ) {
                  $(this).append('warning');
            }
          //var cmt =  removeCommas($(this).val());
            //update_totals(cmt);
        });
        */
        $('.price-choice').change(function () {
            $('.option:visible').stop().slideUp('slow');
            var id = this.value;
            $('.' + id).stop().slideDown('slow');
        });

     }); 


jQuery(document).ready(function($) {
  $('#order_currency').val('INR');
if ($('.returntype').val()==1){
 var total_amt = $('#full_table .active .full_amt_price').val(); 
 console.log(total_amt);
 console.log('onload disocutn check');
                var course_id = $('.course_id').val();
                check_discount_code(course_id, total_amt);
}
              });
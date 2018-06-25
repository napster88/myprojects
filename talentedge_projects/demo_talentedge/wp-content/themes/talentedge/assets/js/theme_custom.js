  var siteUrl =  window.location.href;
   function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
     }  
  jQuery(document).ready(function($) {
      
      /*profile page */
     $('#main .coursePurchased').each(function(i, item) {
     
             var productPrice = $(this).find('.product_price').text();
             var coursetotal = 0;
            //console.log(productPrice);
             $(item).find('.orderDetail tr').each(function(idx, it) { 
             if($(it).find(".total_wc-completed").length) {
                  var courseComplete = $(it).find(".total_wc-completed").text();
                  //console.log('courseComplete=' + parseInt(courseComplete));
                  coursetotal += parseInt(courseComplete);
                  var remainingBalance = parseInt(productPrice) - coursetotal;
                  //console.log($('.coursePurchased'+i));
                  $(item).find('.paid_amount').text(coursetotal);
                  $(item).find('.balance_amount').text(remainingBalance);
              }
              
      });
  });

//login pop call
     $('[data-remodal-id=loginpopup]').remodal({
    modifier: 'with-red-theme'
  });

  $('.registerdiv').hide();

   $(document).on('click','#register',function(){
      $('.registerdiv').fadeIn(300);
      $('.logindiv').hide();
  });
   $(document).on('click','#login',function(){
      $('.registerdiv').hide();
      $('.logindiv').fadeIn(300)
  });
   $(document).on('closed', '.remodal', function (e) {
      $('.registerdiv').hide();
      $('.logindiv').fadeIn(300)
   }); 
  
  
 /*Login with Linkedin google*/ 
  var linkedincheck =  getParameterByName('wplEmail');
  var googleemail =  getParameterByName('email');
  var googledisplayName =  getParameterByName('displayname');
  var googlefname =  getParameterByName('fname');
  var googlelname =  getParameterByName('lname');

    if(linkedincheck || googleemail){
        $('.registerdiv').fadeIn(300);
        $('.logindiv').hide();
      }
   if(googleemail && googledisplayName ) {
         $('.userpro-field-display_name input').val(googledisplayName);
         $('.userpro-field-user_email input').val(googleemail);
         $('.userpro-field-first_name input').val(googlefname);
         $('.userpro-field-last_name input').val(googlelname);
         $('.userpro-field-billing_first_name input').val(googlefname);
         $('.userpro-field-billing_last_name input').val(googlelname);
          
   } 
   
});

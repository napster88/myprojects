$(".disp_btn").click(function(e){
  var entryvar = this;
  var entry = $(this).attr("data-beanAction");
  var reason = entry;
  var beanId = $(this).attr("data-beanId");
  if(entry == 'return'){
    $.ajax({
     url: "index.php?entryPoint=dispatch_kititem_dropdown",
     type: "POST",
     data: {
       beanId: beanId,
       entrypt: 'itemdropdown',
     },
     success: function(msg){
       // console.log(msg);
      $('.'+entry+'_kit_items').html(msg);
     }
    });
  }
  if(entry == 'approve'){
    $.ajax({
     url: "index.php?entryPoint=dispatch_kititem_dropdown",
     type: "POST",
     data: {
       beanId: beanId,
       entrypt: 'stockcheck',
     },
     success: function(msg){
       console.log(msg);
       if(msg != '0'){
         $('.outstock_div').show();
         $('.'+entry+'_kit_items').val(msg);
       }

     }
    });

    reason = 'partial';
  }
  $.ajax({
   url: "index.php?entryPoint=reason_master_dropdown",
   type: "POST",
   data: {
     reason: reason,
   },
   success: function(msg){
     console.log('reason',msg);
   //alert(msg);
    $('.'+reason+'_reason').html(msg);
   }
  });

  $('.'+entry+'.action_popup').show();
  $('.popup_backover').show();
  $('.'+entry+' .beanId').val(beanId);
  $('.'+entry+' .beanAction').val(entry);

});

$(".entry_close_button").click(function(e){
  $('.action_popup').hide();
  $('.popup_backover').hide();
});
$(".popup_backover").click(function(e){
  $('.action_popup').hide();
  $('.popup_backover').hide();
});

$(".action_save").click(function(){
  var formId = $(this).parent().attr('id');
  var beanId = $('#'+formId+' .beanId').val();
  var data = $('#'+formId).serialize();
  //console.log(data['dispatch_date']);
  $.ajax({
   url: "index.php?entryPoint=disp_request_update",
   type: "POST",
   data: data,
   success: function(msg){
        // console.log(msg);
     $('.action_popup').hide();
     $('.popup_backover').hide();
     // location.reload();
   }
  });
  if($('#'+formId+' .approve_kit_items').val()!='' && $('#'+formId+' .beanAction').val()=='approve'){
    // alert();
    $.ajax({
     url: "index.php?entryPoint=disp_request_update",
     type: "POST",
     data: {
       beanId:$('#'+formId+' .beanId').val(),
       beanAction: 'partial',
       next_dispatch_date:$('#'+formId+' .next_dispatch_date').val(),
       kititems:$('#'+formId+' .approve_kit_items').val(),
     },
     success: function(msg){
        console.log(msg);
       $('.action_popup').hide();
       $('.popup_backover').hide();
       // location.reload();
     }
    });
  }
});

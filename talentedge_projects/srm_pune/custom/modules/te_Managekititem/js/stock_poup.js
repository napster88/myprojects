
$(".entry_close_button").click(function(e){
  $('.stck_entry_popup').hide();
  $('.popup_backover').hide();
});
$(".popup_backover").click(function(e){
  $('.stck_entry_popup').hide();
  $('.popup_backover').hide();
});
$(".stock_entry.button").click(function(e){
  var entryvar = this;
  var entry = $(this).attr("data-entry");
  var beanId = $(this).attr("data-beanId");
  var beanName = $(this).attr("data-beanName");
  $('.'+entry+'.stck_entry_popup').show();
  $('.popup_backover').show();
  $('.'+entry+' .beanId').val(beanId);
  $('.'+entry+' .stock_status').val(entry);
  // $('.'+entry+' .beanId').val(beanId);
  $('.'+entry+' .beanName').text(beanName);
  $('.'+entry+' .stock_status').val(entry);
});
$(".stock_entry.taking.button").click(function(e){
  var entryvar = this;
  var entry = $(this).attr("data-entry");
  var beanId = $(this).attr("data-beanId");
  var beanName = $(this).attr("data-beanName");
  $('.'+entry+'.stck_entry_popup').show();
  $('.popup_backover').show();
  $('.'+entry+' .beanId').val(beanId);
  $('.'+entry+' .beanName').text(beanName);
});
$(".entry_save").click(function(){
  var formId = $(this).parent().attr('id');
  var beanId = $('#'+formId+' .beanId').val();
  var data = $('#'+formId).serialize();
  console.log(data);
  $.ajax({
   url: "index.php?entryPoint=managekit_stock_entrypoint",
   type: "POST",
   data: data,
   success: function(msg){
   //alert(msg);
     $('.'+beanId+'_stockquantity').text(msg);
     $('.stck_entry_popup').hide();
     $('.popup_backover').hide();
   }
  });
});

$(".entry_taking_save").click(function(){
  var formId = $(this).parent().attr('id');
  var beanId = $('#'+formId+' .beanId').val();
  var data = $('#'+formId).serialize();
  console.log(data);
  $.ajax({
   url: "index.php?entryPoint=managekit_stock_recall_entrypoint",
   type: "POST",
   data: data,
   success: function(msg){
   //alert(msg);
     // $('.'+beanId+'_stockquantity').text(msg);
     $('.stck_entry_popup').hide();
     $('.popup_backover').hide();
   }
  });
});
// alert();
$(".remark_save").click(function(){
  var thisvar = $(this);
  var beanId = $(this).attr('data-beanId');
  var remark = $('.'+beanId+'_remark_area').val();
  var entrycall = 'recall_update';
  console.log(remark);
  $.ajax({
   url: "index.php?entryPoint=managekit_stock_recall_entrypoint",
   type: "POST",
   data: {
     remark: remark,
     entrycall: entrycall,
     beanId: beanId,
   },
   success: function(msg){
     console.log('test');
     console.log(msg);
   //alert(msg);
      $('.'+beanId+'_container').html(remark);
     // $('.stck_entry_popup').hide();
     // $('.popup_backover').hide();
   }
  });
});

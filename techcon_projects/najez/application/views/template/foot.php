
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- sweet alert popup -->
<script src="<?php echo base_url();?>assets/sweetalert/sweetalert.min.js"></script>
<?php if($active == 'dashboard' || $active == 'profile'){?>

<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<?php }?>
<?php if($active == 'login'){?>

<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<?php }?>
<?php if($active == 'user' || $active == 'driver' || $active == 'vehicle' || $active == 'page' || $active == 'service' || $active == 'plan' || $active == 'transaction' || $active == 'order'){?>

<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    //$(".textarea").wysihtml5();
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script>
  $(function () {
    //$("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      //"lengthChange": false,
      //"searching": false,
      "ordering": true,
	  "order": [[ 0, "desc" ]],
      "info": true,
      //"autoWidth": false
    });
  });
</script>
<script>
	$(function(){
		$('#addparty').click(function(){
			var no = $('.party_no').val();
			var new_no = parseInt(no);
			
			new_no++;
			if(new_no>2){
				$('.remvparty').show();
			}else{
				$('.remvparty').hide();
			}
			$('.party_no').val(new_no);
			$('.party_inner').find('.party_info').attr("data-pno",new_no);
			$('.party_inner').find('.party_info .pno').text(new_no);
			
			var party = $('.party_inner').html();
			//alert(party);
			$('.party_outer').append(party);
			$('.photo').bind('change',function(e){
				var photo = e.target.files[0].name;
				var ext = photo.split('.').pop().toLowerCase();
				if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
					alert('Invalid File. Use only gif, png, jpg, jpeg');
					$(this).val('');
				}
			});
			$('.partyemail').bind('keyup',function(e){
				var email = $(this).val();
				var emailbox = $(this);
				if(email != ''){
					var atpos = email.indexOf("@");
					var dotpos = email.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
						$(this).parent().next().text("Invalid Email Address");
						$(this).parent().addClass("has-error");
						$('.box-footer > button').attr('disabled',true); 
					}else{
						$(this).parent().next().text("");
						$(this).parent().removeClass("has-error");
						$('.box-footer > button').attr('disabled',false); 
						var url = "<?php echo base_url('cases/checkemailid'); ?>";
						$.ajax({
							type: "post",
							url: url,
							data: {emailid: email},
							//contentType: "application/x-www-form-urlencoded",
							success: function(responseData) {
								var email_count = parseInt(responseData);
								//alert(typeof email_count);
								if(email_count > 0){
									emailbox.parent().next().text("Email Address already used");
									emailbox.parent().addClass("has-error");
									$('.box-footer > button').attr('disabled',true); 
								}
							},
							error: function(jqXHR, textStatus, errorThrown) {
								console.log(errorThrown);
							}
						});
					}
				}
				else{
					$(this).parent().next().text("");
					$(this).parent().removeClass("has-error");
					$('.box-footer > button').attr('disabled',false); 
				}
			});
			
		});
	});
	$('.photo').on('change',function(e){
		var photo = e.target.files[0].name;
		var ext = photo.split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			alert('Invalid File. Use only gif, png, jpg, jpeg');
			$(this).val('');
		}
	});
	$('.partyemail').keyup(function(){
		var email = $(this).val();
		var emailbox = $(this);
		if(email != ''){
			var atpos = email.indexOf("@");
			var dotpos = email.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
				$(this).parent().next().text("Invalid Email Address");
				$(this).parent().addClass("has-error");
				$('.box-footer > button').attr('disabled',true);
			}else{
				$(this).parent().next().text("");
				$(this).parent().removeClass("has-error");
				$('.box-footer > button').attr('disabled',false); 
				var url = "<?php echo base_url('cases/checkemailid'); ?>";
				$.ajax({
					type: "post",
					url: url,
					data: {emailid: email},
					//contentType: "application/x-www-form-urlencoded",
					success: function(responseData) {
						var email_count = parseInt(responseData);
						//alert(typeof email_count);
						if(email_count > 0){
							emailbox.parent().next().text("Email Address already used");
							emailbox.parent().addClass("has-error");
							$('.box-footer > button').attr('disabled',true);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(errorThrown);
					}
				});
			}
		}
		else{
			$(this).parent().next().text("");
			$(this).parent().removeClass("has-error");
			$('.box-footer > button').attr('disabled',false); 
		}
	});
	$('.response-box').on('click',function(){
		//alert($(this).attr('data-party'));
		var partyID = $(this).attr('data-party');
		$('.popup-overley.response_box_'+partyID).show();
		$('.popup-box.response_box_'+partyID).show("slow");
		$('#response_form_'+partyID)[0].reset();
		$('body').css('overflow','hidden');
	});
	$('.close-response-box').on('click',function(){
		//alert($(this).attr('data-party'));
		var partyID = $(this).attr('data-party');
		$('.popup-overley.response_box_'+partyID).hide("slow");
		$('.popup-box.response_box_'+partyID).hide();
		$('#response_form_'+partyID)[0].reset();
		$('body').css('overflow','auto');
	});
	$('form.feedback').submit(function(e){
		e.preventDefault();
		var formID = $(this).attr('id');
		var formdata = $('#'+formID).serialize();
		var url = "<?php echo base_url('feedback/response'); ?>";
		$.ajax({
            type: "post",
            url: url,
            data: formdata,
            //contentType: "application/x-www-form-urlencoded",
            success: function(responseData) {
                if(responseData == 'send'){
					$('.popup-overley').hide("slow");
					$('.popup-box').hide();
					$('#'+formID)[0].reset();
				}else{
					alert("Something wrong, Try Again");
					$('.popup-overley').hide("slow");
					$('.popup-box').hide();
					$('#'+formID)[0].reset();
				}
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
	});
	
	$('.delete-alert').on('click',function(){
		  var delbtn = $(this).attr("data-id");
		  var delete_url = $(".delete_url").val();
		  swal({
          title: "Are you sure?",
          text: "You will not be able to recover this data again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: "No, cancel it!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
			//alert(delbtn);
			//alert(delete_url+delbtn);
			//$('#row_'+delbtn).hide();
			$.ajax({
				type: "post",
				url: delete_url+'/'+delbtn,
				data: {id : delbtn},
				//contentType: "application/x-www-form-urlencoded",
				success: function(responseData) {
					//alert(responseData);
					//$('#row_'+delbtn).hide();
					swal("Deleted!", "Your data has been deleted!", "success");
					setTimeout(function () {
						location.reload();
					}, 2000);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					swal("Error", "Something went wrong :( ", "error");
				}
			});
            //swal("Deleted!", "Your data has been deleted!", "success");
          } else {
            swal("Cancelled", "Your data is safe :)", "error");
          }
        });
	});
	$('.enable-alert').on('click',function(){
		  var enbbtn = $(this).attr("data-id");
		  var enable_url = $(".enable_url").val();
		  swal({
          title: "Are you sure?",
          text: "You want to recover this data again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, recover it!',
          cancelButtonText: "No, cancel it!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
			$.ajax({
				type: "post",
				url: enable_url+'/'+enbbtn,
				data: {id : enbbtn},
				//contentType: "application/x-www-form-urlencoded",
				success: function(responseData) {
					//alert(responseData);
					//$('#row_'+enbbtn).hide();
					swal("Deleted!", "Your data has been recoverd!", "success");
					setTimeout(function () {
						location.reload();
					}, 2000);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					swal("Error", "Something went wrong :( ", "error");
				}
			});
            //swal("Deleted!", "Your data has been deleted!", "success");
          } else {
            swal("Cancelled", "Your data is not recoverd", "error");
          }
        });
	});
	$('.video-view').on('click',function(){
		$('.popup-overley').hide();
		$('.popup-box.video-frame').html('');
		$('.popup-box').hide();
		var videosrc = $(this).attr('data-src');
		videosrc = 'https://www.youtube.com/embed/'+videosrc;
		var frame = '<iframe width="560" height="315" src="'+videosrc+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
		$('.popup-overley').show();
		$('.popup-box.video-frame').html(frame);
		$('.popup-box').show();
	});
	$('.video-hide').on('click',function(){
		$('.popup-overley').hide();
		$('.popup-box.video-frame').html('');
		$('.popup-box').hide();
	});
	$('.remove_party').click(function(){
		//alert($(this).parent().parent().parent().attr("class"));
			//alert($(this));
			var party_no = $('.party_no').val();
		//alert(party_no);
		$(".party_outer .party_info[data-pno='"+party_no+"']").remove();
		
		var new_no = parseInt(party_no);
		new_no--;
		$('.party_no').val(new_no);
		if(new_no>2){
			$('.remvparty').show();
		}else{
			$('.remvparty').hide();
		}
	});
	 //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
</script>
<?php }?>
</body>
</html>
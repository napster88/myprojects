<!--Suitecrm Code  tpl View Exam result Module .
Date-10-Jan-2018
Engenia Technologie
Dev-by=> Manish kumar.
-->
<section class="moduleTitle"> <h1>Create Exam</h1><br/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
    rel="stylesheet" type="text/css" />

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?module=te_Exam&action=editexam&form=002&id={$row_id}">
	<div>
		<div class="gap" style="margin:10px">
			<div style="border:1px solid gray; background-color:#C0C0C0"><h1>Basic Info</h1></div>
			<div style="border:1px solid gray; padding:20px 20px 20px 20px;">
				 <table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr style="margin:10px;"> 
							<td nowrap="nowrap" width="10%">	
								<label for="batch_basic">Name of Exam*</label>
								<input name="name" type="text" value="{$exam_name}" id='name' required class="required">
							</td>
							<td nowrap="nowrap" width="10%">	
								<label for="batch_basic">Institute/University*</label>
								<select class="university required" name="university" id="university" required>
										<option  value=""></option>
										{foreach from = $institute key=key item=batch}
											<option value="{$batch.id}">{$batch.name}</option>       
										{/foreach}
								</select>
							</td>
							<td nowrap="nowrap"  width="10%">	
								<label for="batch_basic1">Course/Program*</label>
								<select class="course required" name="course[]" id="course" multiple="multiple" required>
										<option>---Select---</option>
								</select>
							</td>
						</tr>
				 </table>
				 <br>
				<input type="checkbox" class="mycheck_question" id="myCheck" onchange="valueChanged()">Map other Field(Please not that by default all active batches,sems and subjectsare mapped here)
				<br><br>
				<div class="basic_info" style="display:none">
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tr style="margin:10px;"> 
								<td nowrap="nowrap" width="10%">	
									<label for="batch_basic">Batch*</label>
									<select class="batch" name="batch[]" multiple="true" id="batch" style="width:200px">
										
									</select>
								</td>
								<td nowrap="nowrap" width="10%">	
									<label for="batch_basic">Semesters*</label>
									<select class="semesters" class="multiselbox" multiple name="semesters[]" id="semesters" style="width:200px">
										<option>---Select---</option>
									</select>
								</td>
								<td nowrap="nowrap" width="10%">	
									<label for="batch_basic">Subject*</label>
									<select class="subject" name="subject[]" multiple="true" id="subject" style="width:200px">
										<option>---Select---</option>
									</select>
								</td>
							</tr>
					 </table>	
				 </div>
			</div> 
		</div>
		
		<div class="exam_dates" style="margin:10px;">
			<div style="border:1px solid gray; background-color:#C0C0C0"><h1>Exam Dates</h1></div>
			<div style="border:1px solid gray; padding:20px 20px 20px 20px;">
				 <table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr> 
							<td scope="row" nowrap="nowrap" width="1%">
								<label for="batch_basic">From Date</label>
							</td>
							<td nowrap="nowrap" width="10%">
								<input name="from_date" type="text"  value="{$start_date}" id='from_date' required class="required"/>
								
							</td>
							<td scope="row" nowrap="nowrap" width="1%">
								<label for="batch_basic">To Date</label>
							</td>
							<td nowrap="nowrap" width="10%">
								<input name="to_date" type="text"  value="{$end_date}" id='to_date' required class="required"/>
								
							</td>
							
							<td scope="row" nowrap="nowrap" width="1%">
								<a id="listdate_a" class="button">Show Dates</a>
								
							</td>
						</tr>
						
				 </table>
				 <div style="display:none" id="list_date">
					<select class="listdate required" name="listdate[]" id="listdate" style="width:200px" multiple="multiple" required>
							
					</select>
				</div>
			</div> 
		</div>
		<div class="gap" style="margin:10px">
			<div style="border:1px solid gray; background-color:#C0C0C0"><h1>Exam Slots</h1></div>
			<div style="border:1px solid gray; padding:20px 20px 20px 20px;">
					<table>
						<tr>
							<td width="20%">
								<label for="batch_basic">Number of Slots*</label>
							</td>
							<td width="20%">
								<select name="number_of_slots" id="number_of_slots" class="exam_slot_count required" style="width:200px" required>
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
									<option value="4">Four</option>
									<option value="5">Five</option>
									<option value="6">Six</option>
									<option value="7">Seven</option>
									<option value="8">Eight</option>
									<option value="9">Nine</option>
									<option value="10">Ten</option>
									<option value="11">Eleven</option>
									<option value="12">Twelve</option>
								</select>
							</td>
						</tr>
					</table>
					<table id="exam_slot" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td nowrap="nowrap" width="10%">
								<label for="batch_basic">Slot 1*</label>
								<div data-role = "fieldcontain" class = "ui-hide-label" style="float:left">
									<input type="text" name="slot[start_time_0]" id="start_date_timepicker" value="" placeholder="Start Time*" required class="required"/>
								</div>
								<div data-role ="fieldcontain" class= "ui-hide-label" style="float:left">
									<input type="text" name="slot[end_time_0]" id="end_date_timepicker" value="" placeholder="End Time*" required class="required"/>
								</div>
							</td>
						</tr>
					</table>
			</div> 
		</div>
		
		<div class="gap" style="margin:10px">
			<div style="border:1px solid gray; background-color:#C0C0C0"><h1>Guidelines and content</h1></div>
			<div style="border:1px solid gray; padding:20px 20px 20px 20px;">
				 <table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tr> 
						<td nowrap="nowrap" width="10%">	
							<label for="batch_basic">Description*</label><br>
							<textarea id="description" name="description" rows="4" cols="1000" style="width:938px; height:86px" class="required" required></textarea> 
						</td>
					</tr>
					<tr>
						<td  nowrap="nowrap" width="10%">
							<input type="checkbox" name="submit_choice" value="1" id="myCheck" class="required">Allow student to submit choices
						</td>
					</tr>
				 </table>
			</div> 
		</div>
		
		<div class="gap" style="margin-left:10px">
			<button type="button" class="button" id="myBtn">PREVIEW</button>
			<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="SAVE" id="search_form_submit">&nbsp;
			<!--<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Clear Form" id="search_form">&nbsp; -->
			<!--<input tabindex="2" title="Clear" onclick="SUGAR.searchForm.clear_form(this.form); return false;" class="button" type="button" name="clear" id="search_form_clear" value="Clear Form">-->	
		<div class="gap" style="margin:10px">
	</div>
<table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">
	<thead> 
	<!-- Student Personal information Display -->
	{foreach from = $studentifo key=key item=Sdata}
	<tr height="20">
			<center><h1><b>Exam Result for {$Sdata.name}</b></h1></center><br/>
				<td width="30%">
					<strong>Name-</strong>{$Sdata.name}<br>
					<strong>Email-</strong>{$Sdata.email}<br>
					<strong>Course-</strong>{$Sdata.course}
				</td>
				<td>
					<strong>Mobile-</strong>{$Sdata.mobile}<br>
					<strong>Specialization-</strong>{$Sdata.added_specialization}<br>
					<strong>Current Semsester-</strong>{$Sdata.currentsemname}
				</td>
				</tr>
			<br><br>
		</table>
	{/foreach}
		{if $form eq 002 && $ExamCount eq 0 && $studentifoCount !=0 }	
			<strong><font size="3" color="red"><center>You Have Already Submit Marks !</center></font></strong>
		{/if}
		
		{if $studentifoCount==0}
		<strong><font size="3" color="red"><center>{$norecod}</center></font></strong>
		{/if}	
</form>	

<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EXAM INFORMATION!!</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

{if $form == 002 && $ExamCount!=0 && $studentifoCount!=0}
  <table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">
	<!-- End Section student-->
	<form name="search_form2" id="search_form2" class="search_form2" method="post" action="index.php?module=te_Exam&action=createexam&form=004">	
		<tr height="20">
			<th scope="col" data-hide="phone" class="footable-visible footable-first-column">	
				<strong>Subject</strong>
			</th>
			{foreach from = $examtypes key=key item=examschme}
			<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
				<strong>{$examschme.exam_type}( <font color="green"> Passing Marks-:{$examschme.min_marks} </font>,Total Mark-:{$examschme.total_marks} ,Passing %-:{$examschme.passing_prsent}) </strong>
			</th>
			{/foreach}				
		</tr>		
	{assign var=i value=0}
		{foreach from = $studentexaminfo key=key item=examdata}
		<tr height="20" class="oddListRowS1">
			<td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$examdata.subjectName}</td>
				<input type="hidden" value="{$examdata.subject}" name="subjectid[{$examdata.subject}]">
				<input type="hidden" value="{$examdata.examId}" name="booking[{$examdata.subject}]">
				{foreach from = $examtypes key=key item=examschme}			 
				<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
					<input type="hidden" value="{$examschme.exam_type}" name="examtype[{$examdata.subject}][{$examschme.exam_type}]">
					<input type="hidden" value="{$examschme.min_marks}" name="examtype_passing_marks[{$examdata.subject}][{$examschme.exam_type}]">
					<input type="hidden" value="{$examschme.total_marks}" name="examtype_total_marks[{$examdata.subject}][{$examschme.exam_type}]">
					<input name="examtype_val[{$examdata.subject}][{$examschme.exam_type}]" type="text" value="" id="examtype{$examschme.exam_type}{$i}" required >
				</td>
				{/foreach}	
			{assign var=i value=$i+1}
		{/foreach}
		</table>
		<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit-Result" id="search_form2">&nbsp;
	{/if}
	</form>
	
<script>
{literal}
/*Calendar.setup ({
   inputField : "from_date",
   daFormat : "%m/%d/%Y %I:%M%P",
   button : "from_date_trigger",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "to_date",
   daFormat : "%m/%d/%Y %I:%M%P",
   button : "to_date_trigger",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});*/

$( "#from_date" ).datepicker({
     minDate: new Date()
});

$( "#to_date" ).datepicker({
     minDate: new Date()
});
 
function validateForm() {
    var x = document.forms["search_form"]["search_student_exam"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
function valueChanged(){
    if($('.mycheck_question').is(":checked"))   
        $(".basic_info").show();
    else
        $(".basic_info").hide();
}

function isDate(dateArg) {
    var t = (dateArg instanceof Date) ? dateArg : (new Date(dateArg));
    return !isNaN(t.valueOf());
}

function isValidRange(minDate, maxDate) {
    return (new Date(minDate) <= new Date(maxDate));
}
$('#start_date_timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '10',
    maxTime: '6:30pm',
    defaultTime: '',
    startTime: '10:30',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

$('#end_date_timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '10',
    maxTime: '6:30pm',
    defaultTime: '',
    startTime: '10:30',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

$("#search_form_clear").click(function(){
	$("#name").val("");
	$("from_date").val("");
	$("to_date").val("");
	$("university").val("");
	$("semesters").val("");
	$("subject").val("");
	$("course").val("");
	$("batch").val("");
	$("university").val("");
	$("description").val("");
});

$("#search_form_submit").click(function(){

	var name=$("#name").val();
	var university=$("#university").val();
	var course=$("#course").val();
	
	var c=0;
	$('#listdate option').each(function() {
		c++;
	});
	
	if(name=='' || university=='' || course=='' || c==1)
		alert("Fill required fields");
	else
		return true;
});


$.curCSS = function(element, prop, val) {
    return $(element).css(prop, val);
};

 // Attach Button click event listener 
$("#myBtn").click(function(){
	 // show Modal
	 $('#myModal').modal('show');
});

$("#form_publish").click(function(){
	var name=$("#name").val();
	var university=$("#university").val();
	var course=$("#course").val();
	
	if(name=='' || university=='' || course=='')
		alert("Fill required fields");
	else{
		if (confirm("Do you want to continue!!")){
			alert("Thanks,As once published, You are not be able to edit it!!");
			return true;
		}
		else {
			alert("You have Cancelled The Publishing!!");
			$("#search_form").submit(function(e){
				e.preventDefault();
				return  false;
			});
		}
	}
});


$( "#listdate_a" ).click(function( event ){
	event.preventDefault();
	var startDt =document.querySelector("input[name='from_date']").value;
    var endDt = document.querySelector("input[name='to_date']").value;
	
	var listdateHtml = "<option>--Select Course--</option>";
	var error = ((isDate(endDt)) && (isDate(startDt)) && isValidRange(startDt, endDt)) ? false : true;
	
    var between = [];
    if (error) alert('error occured!!!... Please Enter Valid Dates');
    else {
		$("#list_date").show();
        var currentDate = new Date(startDt),
            end = new Date(endDt);
        while (currentDate <= end) {
			var newDate = new Date(currentDate);
			
			var dateformat = newDate.getFullYear();
			dateformat+="-";
			dateformat+=newDate.getMonth()+1;
			dateformat+="-";
			dateformat+=newDate.getDate();
			
			if(newDate.getDay()!=0){
				between.push(dateformat);
			}
            currentDate.setDate(currentDate.getDate() + 1);
        }
		var between = "'"+between+"'"; 
		$.each(between.split(','), function(i,e){
			var date = e.replace(/'/g, "");
			listdateHtml +="<option selected value='"+date+"'>"+date+"</option>"; 
		});
		$("#listdate").html(listdateHtml);
		$('#listdate').multiselect();
		$('#listdate').multiselect( 'reload' ); 
    }
});

$(".exam_slot_count").change(function(){

	var selectedCountry = $(".exam_slot_count option:selected").val();

	$('#exam_slot tr').find('td').remove();
	
	for(i=1;i<=selectedCountry;i++)
	{
		var arr='<td nowrap="nowrap" width="10%"><label for="batch_basic">Slot'+i+'*</label><div data-role = "fieldcontain" class = "ui-hide-label" style="float:left"><input type="text" name="slot[start_time_'+i+']" id="start_date_timepicker" class="start_date_timepicker" value="" placeholder="Start Time*" required/></div><div data-role ="fieldcontain" class= "ui-hide-label" style="float:left"><input type="text" name="slot[end_time_'+i+']"id="end_date_timepicker" class="end_date_timepicker" value="" placeholder="End Time*" required/></div></td>';
     
		$('#exam_slot tr').append(arr);
		
	}
	
	$(".start_date_timepicker").timepicker({
			timeFormat: 'h:mm p',
			interval: 30,
			minTime: '10',
			maxTime: '6:30pm',
			defaultTime: '',
			startTime: '10:30',
			dynamic: false,
			dropdown: true,
			scrollbar: true
	});
	$('.end_date_timepicker').timepicker({
			timeFormat: 'h:mm p',
			interval: 30,
			minTime: '10',
			maxTime: '6:30pm',
			defaultTime: '',
			startTime: '10:30',
			dynamic: false,
			dropdown: true,
			scrollbar: true
	});
});

$('#course').multiselect({
	
	onOptionClick : function( element, option ) {
		
		$.ajax({
			type: 'POST',
			dataType: "json",
			url: 'index.php?entryPoint=dropdownpoint',
			data: {
				'id': option.value,
				'source':'course'
			},
			success: function (data){
				var selected1 = [];
				var select;
				$.each(data, function(key, val){
					$("#batch option").each(function()
					{
						selected1.push($(this).val());
					});
					select = "'"+selected1+"'"; 
					$.each(select.split(','), function(i,e){
						var b = e.replace(/'/g, '');
						if(b!=val.id){
							$('#batch').append('<option selected value="' + val.id + '">' +option.title+"-"+val.name + '</option>');
						}
					});
				});
				 
				 $('#batch').multiselect();
				 $('#batch').multiselect( 'reload' ); 
				 
				 myfunction(option.value,option.title);
			}
		});
	}
});

$('#batch').multiselect({
  
});

$('#semesters').multiselect({
	onOptionClick : function( element, option ) {
		$.ajax({
			type: 'POST',
			dataType: "json",
			url: 'index.php?entryPoint=dropdownpoint',
			data: {
				'id': option.value,
				'source':'subject'
			},
			success: function (data){
				var flag=0;
				var flag=$('#'+option.id).parents('.selected').hasClass( "selected" );
				
				var selected1=[];
				var val='';
				var option1=[];
				$("#subject option").each(function()
				{
					selected1.push($(this).text());
				});
				select = "'"+selected1+"'"; 
				
				$.each(select.split(','), function(index,exp){
					var val='';
					if(index!=0){
						 $.each(exp.split('-'), function(i1,e1){
							if(i1==0 || i1==1)
							  val+=e1+'-';
							 
						 });
						option1.push(val);
					}
				});
				
				$.each(data, function(key, val){
					option.title1=option.title+'-';
					if($.inArray(option.title1, option1) == -1 && flag==1){
						$('#subject').append('<option selected value="' + val.id + '">' +option.title+"-"+val.name + '</option>');
					}
					else if(flag==0){
						$("#subject option[value='"+val.id+"']").remove();
					}
					
				});

				 $('#subject').multiselect();
				 $('#subject').multiselect( 'reload' ); 
			}
		});
	}
});

$('#subject').multiselect({
 
});

$('.university').change(function () {
	var id = $(this).find(':selected')[0].value;
	var courseHtml = "<option>--Select Course--</option>";
	$.ajax({
        type: 'POST',
		dataType: "json",
        url: 'index.php?entryPoint=dropdownpoint',
        data: {
            'id': id,
			'source':'university'
        },
        success: function (data){
			$.each(data, function(key, val){
				courseHtml +="<option value='"+val.id+"' label='"+val.name+"'>"+val.name+"</option>"; 
			});

			 $("#course").html(" ");
			 $("#course").html(courseHtml);

			 $('#course').multiselect();
			 $('#course').multiselect( 'reload' ); 
			 
        }
    });
});

function myfunction(id,title){
	
	$.ajax({
        type: 'POST',
		dataType: "json",
        url: 'index.php?entryPoint=dropdownpoint',
        data: {
            'id': id,
			'source':'sem'
        },
        success: function (data){
        	var selected1 = [];
			var option=[];
			
			$("#semesters option").each(function()
			{
				selected1.push($(this).text());
			});
			
			select = "'"+selected1+"'"; 
			$.each(select.split(','), function(i,e){
				if(i!=0){
					 $.each(e.split('-'), function(i,e1){
						if(i==0)
							option.push(e1);
					 });
				}
					
			});
			
			
			$.each(data, function(key, val){
				if($.inArray(title, option) == -1){
				
					$('#semesters').append('<option selected value="' + val.id + '" title="'+title+'">' +title+"-"+val.name + '</option>');
					mysubject(val.id,title+"-"+val.name);
				}
				
			});
			
			 $('#semesters').multiselect();
			 $('#semesters').multiselect( 'reload' ); 
			
        }
    });
}


function mysubject(id,title){
	
	$.ajax({
        type: 'POST',
		dataType: "json",
        url: 'index.php?entryPoint=dropdownpoint',
        data: {
            'id': id,
			'source':'subject'
        },
        success: function (data){
		
        	var selected1=[];
			var val='';
			var option1=[];
			
			$("#subject option").each(function()
				{
					selected1.push($(this).text());
				});
				
				
				select = "'"+selected1+"'"; 
				
				$.each(select.split(','), function(index,exp){
					var val='';
					if(index!=0){
						 $.each(exp.split('-'), function(i1,e1){
							if(i1==0 || i1==1)
							  val+=e1+'-';
							 
						 });
						option1.push(val);
					}
				});
				
				
				
				$.each(data, function(key, val){
					title1=title+'-';
					if($.inArray(title1, option1) == -1){
						$('#subject').append('<option selected value="' + val.id + '">' +title+"-"+val.name + '</option>');
					}
				});
			
			 $('#subject').multiselect();
			 $('#subject').multiselect( 'reload' ); 
			
        }
    });
}

$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});

</script>
{/literal}



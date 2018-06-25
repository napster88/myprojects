{literal}
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(2, 'expanded'); }); </script>
<script>
	if(document.getElementById('detailpanel_2'))
	document.getElementById('detailpanel_2').className += ' expanded';
</script>
{/literal}

<div class="panel panel-default">
	<div class="panel-heading ">
			<div class="col-xs-10 col-sm-11 col-md-11" style="padding-left:5px;">
				Create Exam Types 
			</div>
	</div>

</div>

<div class="edit view edit508  expanded" id="detailpanel_2">

	<table cellspacing="1" cellpadding="10" border="0" width="100%" class="yui3-skin-sam edit view panelContainer" id="Payment">
		
		<tr>
			<td style="padding-top:10px;">No. Of Exams Type</td><td style="padding-top:10px;"><input name="examtype" id="examtype" type="text"  value="{$no_of_examtype}" size="17%"/></td>

			<td style="padding-top:10px;">&nbsp;</td>
		</tr>
		<!---
		<tr>
			
			<td style="padding-top:20px;"> Exam Name* <span class="required"></td><td style="padding-top:10px;"><input name="name" id="name" type="text"  value="{$name}" size="17%"/></td>
			<td nowrap="nowrap" width="10%" >Exam Type:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type" id="batch" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
			<td style="padding-top:10px;"> Passing (%): * <span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent" id="passing_prsent" type="text"  value="{$passing_prsent}" size="17%"/></td>
			<td style="padding-top:10px;">Minimum Marks:<span class="required"></td><td style="padding-top:10px;"><input name="initial_payment_usd" type="text"  value="{$initial_payment_usd}" id='initial_payment_usd' /></td>	
			<td style="padding-top:10px;">Minimum Marks:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks" type="text"  value="{$min_marks}" id='min_marks' /></td>
			<td style="padding-top:10px;">Total (%): *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent" type="text"  value="{$total_prsent}" id='total_prsent' /></td>
			<td style="padding-top:10px;">Total Marks:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks" type="text"  value="{$total_marks}" id='total_marks' /></td>
		</tr>
		-->
		{if $installments|@count > 0}
			{assign var="count" value=1}
			{foreach from=$installments key=index item=installment}
				<tr id="row{$count}">
					<!--
					<td style="padding-top:10px;">Payment {$count} In INR</td><td style="padding-top:10px;"><input name="payment_inr_{$count}" id="payment_inr_{$count}" type="text"  value="{$installment.payment_inr}" size="17%"/>
					</td>
					<td style="padding-top:10px;">Payment {$count} In USD</td>
					<td style="padding-top:10px;"><input name="payment_usd_{$count}" id="payment_usd_{$count}" type="text"  value="{$installment.payment_usd}" size="17%"/>

					<td style="padding-top:10px;">Due Date</td><td style="padding-top:10px;"><input name="due_date_{$count}" type="text"  value="{$installment.due_date}" id='due_date_{$count}' />
					<img src="themes/SuiteR/images/jscalendar.gif?v=yt-yazfsU-Y9uR7ixqf7Lg" alt="Enter Date" style="position:relative; top:-1px" border="0" id="due_date_trigger_{$count}">
					</td>
					-->
					<td style="padding-top:20px;"> Exam Name{$count}* :<span class="required"></td><td style="padding-top:10px;"><input name="name_{$count}" id="name_{$count}" type="text"  value="{$name}" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type{$count}:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_{$count}" id="exam_type_{$count}" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;"> Passing (%): *{$count} <span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_{$count}" id="passing_prsent_{$count}" type="text"  value="{$passing_prsent}" size="17%"/></td>
					<td style="padding-top:10px;">Minimum Marks{$count}:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_{$count}" type="text"  value="{$min_marks}" id='min_marks_{$count}' /></td>
					<td style="padding-top:10px;">Total (%){$count}: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_{$count}" type="text"  value="{$total_prsent}" id='total_prsent_{$count}' /></td>
					<td style="padding-top:10px;">Total Marks{$count}:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_{$count}" type="text"  value="{$total_marks}" id='total_marks_{$count}' /></td>
					</tr>
				{assign var='count' value=$count+1}
			{/foreach}
		{else}
			<tr id="row1" style="display:none" >
				<td style="padding-top:20px;"> Exam Name 1* :<span class="required"></td><td style="padding-top:10px;"><input name="name_1" id="name_1" type="text"  value="{$name}" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type 1:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_1" id="exam_type_1" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;"> Passing (%) 1: *<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_1" id="passing_prsent_1" type="text"  value="{$passing_prsent}" size="17%"/></td>
					<td style="padding-top:10px;">Minimum Marks 1:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_1" type="text"  value="{$min_marks}" id="min_marks_1" /></td>
					<td style="padding-top:10px;">Total (%) 1: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_1" type="text"  value="{$total_prsent}" id="total_prsent_1" /></td>
					<td style="padding-top:10px;">Total Marks 1:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_1" type="text"  value="{$total_marks}" id="total_marks_1" /></td>
				</td>
			</tr>
			<tr id="row2" style="display:none">
					<td style="padding-top:20px;"> Exam Name 2* :<span class="required"></td><td style="padding-top:10px;"><input name="name_2" id="name_2" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type 2:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_2" id="exam_type_2" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;"> Passing (%) 2: *<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_2" id="passing_prsent_2" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Minimum Marks 2:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_2" type="text"  value="" id="min_marks_2" /></td>
					<td style="padding-top:10px;">Total (%) 2: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_2" type="text"  value="" id="total_prsent_2" /></td>
					<td style="padding-top:10px;">Total Marks 2:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_2" type="text"  value="" id="total_marks_2" /></td>
				</td>
				</td>
			</tr>
			<tr id="row3" style="display:none">
				<td style="padding-top:20px;"> Exam Name 3* :<span class="required"></td><td style="padding-top:10px;"><input name="name_3" id="name_3" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type 3:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_3" id="exam_type_3" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;"> Passing (%) 3: *<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_3" id="passing_prsent_3" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Minimum Marks 3:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_3" type="text"  value="" id="min_marks_3" /></td>
					<td style="padding-top:10px;">Total (%) 3: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_3" type="text"  value="" id="total_prsent_3" /></td>
					<td style="padding-top:10px;">Total Marks 3:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_3" type="text"  value="" id="total_marks_3" /></td>
				</td>
			</tr>
			<tr id="row4" style="display:none">
				<td style="padding-top:20px;"> Exam Name 4* :<span class="required"></td><td style="padding-top:10px;"><input name="name_4" id="name_3" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type 4:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_4" id="exam_type_4" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;"> Passing (%) 4: *<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_4" id="passing_prsent_4" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Minimum Marks 4:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_4" type="text"  value="" id="min_marks_4" /></td>
					<td style="padding-top:10px;">Total (%) 4: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_4" type="text"  value="" id="total_prsent_4" /></td>
					<td style="padding-top:10px;">Total Marks 4:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_4" type="text"  value="" id="total_marks_4" /></td>
				</td>
			</tr>
			<tr id="row5" style="display:none">
					<td style="padding-top:20px;"> Exam Name 5* :<span class="required"></td><td style="padding-top:10px;"><input name="name_5" id="name_3" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type 5:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_5" id="exam_type_5" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;"> Passing (%) 5: *<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_5" id="passing_prsent_5" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Minimum Marks 5:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_5" type="text"  value="" id="min_marks_5" /></td>
					<td style="padding-top:10px;">Total (%) 5: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_5" type="text"  value="" id="total_prsent_5" /></td>
					<td style="padding-top:10px;">Total Marks 5:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_5" type="text"  value="" id="total_marks_5" /></td>
				</td>
				
			</tr>
			<tr id="row6" style="display:none">
				<td style="padding-top:20px;"> Exam Name 6* :<span class="required"></td><td style="padding-top:10px;"><input name="name_6" id="name_6" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type 6:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_6" id="exam_type_6" ><option  value=""></option><option  value="Main_Exam">Manin Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;"> Passing (%) 6: *<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_6" id="passing_prsent_6" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Minimum Marks 6:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_6" type="text"  value="" id="min_marks_6" /></td>
					<td style="padding-top:10px;">Total (%) 6: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_6" type="text"  value="" id="total_prsent_6" /></td>
					<td style="padding-top:10px;">Total Marks 6:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_6" type="text"  value="" id="total_marks_6" /></td>
				</td>
			</tr>
		{/if}
	</table>
	<div id="addedRows"></div>
</div>
{literal}
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
	$('#examtype').blur(function (){
		 var examtype = $("#examtype").val();
		   hideRows();
		   addMoreRows(examtype);
	});
	function hideRows() {
		for(rowCount=1;rowCount<=6;rowCount++){
			document.getElementById("row"+rowCount).style.display="none";
		}
	}
	function addMoreRows(examtype) {
		for(rowCount=1;rowCount<=examtype;rowCount++){
			document.getElementById("row"+rowCount).style.display="";
		}
	}

});
Calendar.setup ({
   inputField : "initial_payment_date",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "initial_payment_date_trigger",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_1",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_1",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_2",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_2",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_3",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_3",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_4",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_4",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_5",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_5",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_6",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_6",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_7",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_7",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_8",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_8",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_9",
   daFormat : "%Y-%m-%d %I:%M%P",
   button : "due_date_trigger_9",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
Calendar.setup ({
   inputField : "due_date_10",
   daFormat : "%y-%m-%d %I:%M%P",
   button : "due_date_trigger_10",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
</script>

{/literal}
{{include file='include/EditView/footer.tpl'}}

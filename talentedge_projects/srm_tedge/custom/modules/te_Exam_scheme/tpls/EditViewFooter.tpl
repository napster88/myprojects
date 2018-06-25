{literal}
<!--Code SugarTpl File For Examscheme Developed By mnaish at 9-jan-2018-->
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

	<table cellspacing="1" cellpadding="10" border="2" width="100%" class="yui3-skin-sam edit view panelContainer" id="Payment">	
		<tr>
			<td style="padding-top:10px;">No. of Rules/Schemes *:</td><td style="padding-top:10px;"><select name="examtype" id="examtype" required>
																									<option value="">Select No.Of Exam</option>
																									<option value="1">One</option>
																									<option value="2">Two</option>
																									<option value="3">Three</option>
																									<option value="4">Four</option>
																									<option value="5">Five</option>
																									<option value="6">Six</option>
																									<option value="7">Seven</option>
																									<option value="8">Eight</option>
																									<option value="9">Nine</option>
																							 </select>
			<!--<input name="examtype" id="examtype" type="text"  value="{$no_of_examtype}" size="17%"/>--></td> 
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
					<td nowrap="nowrap" width="10%" >Exam Type{$count}:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_{$count}" id="exam_type_{$count}"><option  value="">
					</option><option  value="Main_Exam">Main Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;">Weightage(In%age){$count}:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_{$count}" type="text"  value="{$min_marks}" id='min_marks_{$count}'></td>
					<td style="padding-top:10px;">Passing Marks:{$count} <span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_{$count}" id="passing_prsent_{$count}" type="text"  value="{$passing_prsent}" size="17%"/></td>	
					<td style="padding-top:10px;">Total Marks{$count}:<span class="required"></td><td style="padding-top:10px;"><input name="total_marks_{$count}" type="text"  value="{$total_marks}" id='total_marks_{$count}' /></td>
					<!--<td style="padding-top:10px;">Total (%){$count}: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_{$count}" type="text"  value="{$total_prsent}" id='total_prsent_{$count}' /></td>
					<td style="padding-top:10px; color: red;"><b>Exam Row{$count}</b>
					-->
					</tr>
				{assign var='count' value=$count+1}
			{/foreach}
		{else}
			<tbody  id="row1" style="display:none;border-bottom: 2px solid #ddd; " >
				<td style="padding-top:10px;  color: red;"><b>Row One fill all fields</b></td>
				<tr>
					<td style="padding-top:20px;"> Exam Name1 :<span class="required"></td>
					<td style="padding-top:10px;"><input name="name_1" id="name_1" type="text"  value="{$name}" size="17%"></td>
					<td nowrap="nowrap" width="10%" >Exam Type1:<span class="required"></td>
					<td style="padding-top:10px;"><select name="exam_type_1" id="exam_type_1" ><option  value=""></option><option  value="Main_Exam">Main Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;">Weightage(In%age)1:<span class="required"></td>
					<td style="padding-top:10px;"><input name="min_marks_1" type="text"  value="{$min_marks}" id="min_marks_1"></td>
					<td style="padding-top:10px;"> Passing Marks1: <span class="required"></td>
					<td style="padding-top:10px;"><input name="passing_prsent_1" id="passing_prsent_1" type="text"  value="{$passing_prsent}" size="17%"></td>
					<td style="padding-top:10px;">Total Marks 1:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_marks_1" type="text"  value="{$total_marks}" id="total_marks_1"></td>
				</tr>
				<!--
				<tr>
					
					<td style="padding-top:10px;">Total (%) 1:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_prsent_1" type="text"  value="{$total_prsent}" id="total_prsent_1"></td>
					
				</tr>
				-->
			</tbody>
			<tbody  id="row2" style="display:none;border-bottom: 1px solid #ddd;" >
					<td style="padding-top:10px;  color: red;"><b>Exam Row Two</b></td>
				<tr>
					<td style="padding-top:20px;"> Exam Name2:<span class="required"></td>
					<td style="padding-top:10px;"><input name="name_2" id="name_2" type="text"  value="{$name}" size="17%"></td>
					<td nowrap="nowrap" width="10%" >Exam Type2:<span class="required"></td>
					<td style="padding-top:10px;"><select name="exam_type_2" id="exam_type_2" ><option  value=""></option><option  value="Main_Exam">Main Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;">Weightage(In%age)2:<span class="required"></td>
					<td style="padding-top:10px;"><input name="min_marks_2" type="text"  value="{$min_marks}" id="min_marks_2"></td>
					<td style="padding-top:10px;">Passing Marks2:<span class="required"></td>
					<td style="padding-top:10px;"><input name="passing_prsent_2" id="passing_prsent_2" type="text"  value="{$passing_prsent}" size="17%"></td>
					<td style="padding-top:10px;">Total Marks 2:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_marks_2" type="text"  value="{$total_marks}" id="total_marks_2"></td>
				</tr>
				<!--
				<tr>
					
					<td style="padding-top:10px;">Total (%) 2: <span class="required"></td>
					<td style="padding-top:10px;"><input name="total_prsent_2" type="text"  value="{$total_prsent}" id="total_prsent_2"></td>
					
				</tr>
				-->
			</tbody>
			<tbody  id="row3" style="display:none;border-bottom: 1px solid #ddd;" >
					<td style="padding-top:10px;  color: red;"><b>Exam Row Three</b></td>
			<tr>
					<td style="padding-top:20px;"> Exam Name3 :<span class="required"></td>
					<td style="padding-top:10px;"><input name="name_3" id="name_3" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type3:<span class="required"></td>
					<td style="padding-top:10px;"><select name="exam_type_3" id="exam_type_3" ><option  value=""></option><option  value="Main_Exam">Main Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;">Weightage(In%age)3:<span class="required">
					</td><td style="padding-top:10px;"><input name="min_marks_3" type="text"  value="" id="min_marks_3" /></td>
					<td style="padding-top:10px;"> Passing Marks3:<span class="required"></td>	
					<td style="padding-top:10px;"><input name="passing_prsent_3" id="passing_prsent_3" type="text"  value="" size="17%"></td>
					<td style="padding-top:10px;">Total Marks 3:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_marks_3" type="text"  value="" id="total_marks_3" /></td>
			</tr>
			<!--
			<tr>
					
					<td style="padding-top:10px;">Total (%) 3: *<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_prsent_3" type="text"l  value="" id="total_prsent_3" /></td>
					
			</tr>
			-->
			</tbody>
			<tbody  id="row4" style="display:none;border-bottom: 1px solid #ddd;">
				<td style="padding-top:10px;  color: red;"><b>Exam Row Four</b></td>
				<tr>
					<td style="padding-top:20px;"> Exam Name4 :<span class="required"></td><td style="padding-top:10px;"><input name="name_4" id="name_3" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%">Exam Type4:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_4" id="exam_type_4" ><option  value=""></option><option  value="Main_Exam">Main Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;">Weightage(In%age)4:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_4" type="text"  value="" id="min_marks_4" /></td>
					<td style="padding-top:10px;">Passing Marks4:<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_4" id="passing_prsent_4" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Total Marks 4:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_marks_4" type="text"  value="" id="total_marks_4" /></td>
				</tr>
				<!--
				<tr>
					
					<td style="padding-top:10px;">Total (%) 4:<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_4" type="text"  value="" id="total_prsent_4" /></td>
					
			</tr>
			-->
			</tbody>
			<tbody  id="row5" style="display:none;border-bottom: 1px solid #ddd;">
					<td style="padding-top:10px;  color: red;"><b>Exam Row Five</b></td>
				<tr>
					<td style="padding-top:20px;"> Exam Name5:<span class="required"></td><td style="padding-top:10px;"><input name="name_5" id="name_3" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type5:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_5" id="exam_type_5" ><option  value=""></option><option  value="Main_Exam">Main Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;">Weightage(In%age)5:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_5" type="text"  value="" id="min_marks_5" /></td>
					<td style="padding-top:10px;"> Passing Marks5: <span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_5" id="passing_prsent_5" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Total Marks 5:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_marks_5" type="text"  value="" id="total_marks_5" /></td>
				</tr>
				<!--
				<tr>
					<td style="padding-top:10px;">Total (%) 5: <span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_5" type="text"  value="" id="total_prsent_5" /></td>
					
			</tr>
			-->
			</tbody>
			<tbody  id="row6" style="display:none;border-bottom: 1px solid #ddd;">
					<td style="padding-top:10px;  color: red;"><b>Exam Row Six</b></td>
			<tr>
					<td style="padding-top:20px;"> Exam Name6 :<span class="required"></td><td style="padding-top:10px;"><input name="name_6" id="name_6" type="text"  value="" size="17%"/></td>
					<td nowrap="nowrap" width="10%" >Exam Type6:<span class="required"></td><td style="padding-top:10px;"><select name="exam_type_6" id="exam_type_6" ><option  value=""></option><option  value="Main_Exam">Main Exam</option><option  value="Assigenment">Assigenment</option></select></td>
					<td style="padding-top:10px;">Weightage(In%age)6:<span class="required"></td><td style="padding-top:10px;"><input name="min_marks_6" type="text"  value="" id="min_marks_6" /></td>
					<td style="padding-top:10px;"> Passing Marks6: *<span class="required"></td><td style="padding-top:10px;"><input name="passing_prsent_6" id="passing_prsent_6" type="text"  value="" size="17%"/></td>
					<td style="padding-top:10px;">Total Marks 6:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_marks_6" type="text"  value="" id="total_marks_6" /></td>
			</tr>
			<!--
			<tr>
					<td style="padding-top:10px;">Total (%) 6: <span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_6" type="text"  value="" id="total_prsent_6" /></td>
					
			</tr>
			-->
			</tbody>
		{/if}
	</table>
	<div id="addedRows"></div>
</div>
{literal}
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
	$('#examtype').change(function (){
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
		/*
		var exa1 = $("#total_prsent_1").val();
		var exa2 = $("#total_prsent_2").val();
		var exa3 = $("#total_prsent_3").val();
		var exa4 = $("#total_prsent_4").val();
		var exa5 = $("#total_prsent_5").val();
		var exa6 = $("#total_prsent_6").val();
		*/
});



$(document).ready(function(){
	$(".primary").hide();
	var r= $('<input type="button" class="update_marks" value="Submit"/>');
	$(".buttons").append(r);
});


$(".update_marks").click(function(e){
	
	var examtype= $("#examtype").val();
	var val=0;
	for (i=1;i<=examtype;i++){
		val+=parseInt($("#min_marks_"+i).val());
	}
	if(val<100 || val>100){
		alert("Weightage total should be 100");
	}
	else{
		$(".primary").click(); 
		//$(".update_marks").hide();
	}
	
});


</script>
{/literal}
{{include file='include/EditView/footer.tpl'}}
<!--Code SugarTpl File For Examscheme Developed By mnaish at 9-jan-2018-->

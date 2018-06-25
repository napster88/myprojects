{literal} 
<!--Code SugarTpl File For Examscheme Developed By mnaish at 9-jan-2018--> 
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(2, 'expanded'); }); </script> 
<script>
	if(document.getElementById('detailpanel_2'))
	document.getElementById('detailpanel_2').className += ' expanded';
</script> 
{/literal}
<div class="Exam-Scheme-EditViewFooter">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title"> <a data-toggle="collapse" class="accordion-toggle" data-parent="#accordion" href="#detailpanel_2"><h1>Create Exam Types</h1></a></div>
    </div>
  </div>
  <div class="edit view edit508  accordian-content panel-collapse collapse in expanded table-edit" id="detailpanel_2">
  	<div class="panel-body">
   	 <table cellspacing="0" cellpadding="0" border="0" width="100%" class="yui3-skin-sam edit view panelContainer" id="Payment">
      <tr>
        <td colspan="9">
        	<div class="block-wrapper">
        	<label>No. of Rules/Schemes: <span class="required">*</span></label>
        	<select name="examtype" id="examtype" required>
            <option value="">Select No.Of Exam</option>
            <option value="1" {if $number_exams == '1'} selected
{/if}>One</option>
            <option value="2" {if $number_exams == '2'} selected
{/if}>Two</option>
            <option value="3" {if $number_exams == '3'} selected
{/if}>Three</option>
            <option value="4" {if $number_exams == '4'} selected
{/if}>Four</option>
            <option value="5" {if $number_exams == '5'} selected
{/if}>Five</option>
            <option value="6" {if $number_exams == '6'} selected
{/if}>Six</option>
            <option value="7" {if $number_exams == '7'} selected
{/if}>Seven</option>
            <option value="8" {if $number_exams == '8'} selected
{/if}>Eight</option>
            <option value="9" {if $number_exams == '9'} selected
{/if}>Nine</option>
          </select>
          </div>
          <!--<input name="examtype" id="examtype" type="text"  value="{$no_of_examtype}" size="17%"/>-->
        </td>
        
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
      <tr>
        <td height="20" colspan="9"></td>
     </tr>
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
        
        <td><label>Exam Name{$count}: <span class="required">*</span></label><br/><input name="name_{$count}" id="name_{$count}" type="text"  value="{$name}" size="17%" required /></td>
       <td width="20"></td>
        <td><label>Exam Type{$count}: <span class="required">*</span></label><br/><select name="exam_type_{$count}" id="exam_type_{$count}">
            <option  value=""> </option>
            <option  value="Main_Exam">Main Exam</option>
            <option  value="Assigenment">Assigenment</option>
          </select>
       </td>
       <td width="20"></td>
        <td>
        	<label>Weightage(In%age){$count}: <span class="required">*</span></label><br/>
        	<input name="min_marks_{$count}" type="text"  value="{$min_marks}" id='min_marks_{$count}' required>
        </td>
        <td width="20"></td>
        <td>
        	<label>Passing Marks:{$count} <span class="required">*</span></label><br/>
            <input name="passing_prsent_{$count}" id="passing_prsent_{$count}" type="text"  value="{$passing_prsent}" size="17%" />
         </td>
         <td width="20"></td>
        <td>
        	<label>Total Marks{$count}: <span class="required">*</span></label><br/>
            <input name="total_marks_{$count}" type="text"  value="{$total_marks}" id='total_marks_{$count}' />
        </td>
        <!--<td style="padding-top:10px;">Total (%){$count}: *<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_{$count}" type="text"  value="{$total_prsent}" id='total_prsent_{$count}' /></td>
					<td style="padding-top:10px; color: red;"><b>Exam Row{$count}</b>
					--> 
      </tr>
      {assign var='count' value=$count+1}
      {/foreach}
      {else}
      <tbody  id="row1" style="display:none;">
      	<tr>
        	<td height="20" colspan="9"></td>
        </tr>
      	<tr>
        	<td class="required-note" colspan="9">Row One fill all fields</td>
        </tr>
        <tr>
        	<td height="5" colspan="9"></td>
        </tr>
      <tr>
       
        <td>
        	<label>Exam Name1 :<span class="required">*</span></label><br/>
            <input name="name_1" id="name_1" type="text"  value="{$name}" size="17%" required>
        </td>
        <td width="20"></td>
       	<td>
        	<label>Exam Type1:<span class="required">*</span></label><br/>
        	<select name="exam_type_1" id="exam_type_1" >
                <option  value=""></option>
                <option  value="Main_Exam">Main Exam</option>
                <option  value="Assigenment">Assigenment</option>
          </select>
        </td>
        <td width="20"></td>
        <td>
        	<label>Weightage(In%age)1:<span class="required">*</span></label><br/>
            <input name="min_marks_1" type="text"  value="{$min_marks}" id="min_marks_1" required>
        </td>
        <td width="20"></td>
        <td>
        	<label>Passing Marks1: <span class="required">*</span></label><br/>
            <input name="passing_prsent_1" id="passing_prsent_1" type="text"  value="{$passing_prsent}" size="17%" required>
         </td>
         <td width="20"></td>
        <td>
        	<label>Total Marks 1:<span class="required">*</span></label><br/>
            <input name="total_marks_1" type="text"  value="{$total_marks}" id="total_marks_1" required>
        </td>
      </tr>
      <!--
				<tr>
					
					<td style="padding-top:10px;">Total (%) 1:<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_prsent_1" type="text"  value="{$total_prsent}" id="total_prsent_1"></td>
					
				</tr>
				-->
      
        </tbody>
      
      <tbody  id="row2" style="display:none;">
      	<tr>
        	<td height="20" colspan="9"></td>
        </tr>
      	<tr>
        	<td class="required-note" colspan="9">Exam Row Two</td>
        </tr>
         <tr>
        	<td height="5" colspan="9"></td>
        </tr>
      <tr>
        <td>
        	<label>Exam Name2:<span class="required">*</span></label><br/>
            <input name="name_2" id="name_2" type="text"  value="{$name1}" size="17%">
        </td>
        <td width="20"></td>
        <td>
        	<label>Exam Type2:<span class="required">*</span></label><br/>
        	<select name="exam_type_2" id="exam_type_2" >
            	<option  value=""></option>
            	<option  value="Main_Exam">Main Exam</option>
            	<option  value="Assigenment">Assigenment</option>
          	</select>
        </td>
        <td width="20"></td>
        <td>
        	<label>Weightage(In%age)2:<span class="required">*</span></label><br/>
        	<input name="min_marks_2" type="text"  value="{$min_marks1}" id="min_marks_2">
        </td>
       <td width="20"></td>
        <td>
        	<label>Passing Marks2:<span class="required">*</span></label><br/>
        	<input name="passing_prsent_2" id="passing_prsent_2" type="text"  value="{$passing_prsent1}" size="17%">
        </td>
        <td width="20"></td>
        <td>
        	<label>Total Marks 2:<span class="required">*</span></label><br/>
        	<input name="total_marks_2" type="text"  value="{$total_marks1}" id="total_marks_2">
        </td>
      </tr>
      <!--
				<tr>
					
					<td style="padding-top:10px;">Total (%) 2: <span class="required"></td>
					<td style="padding-top:10px;"><input name="total_prsent_2" type="text"  value="{$total_prsent}" id="total_prsent_2"></td>
					
				</tr>
				-->
      
        </tbody>
      
      <tbody  id="row3" style="display:none;">
      	<tr>
        	<td height="20" colspan="9"></td>
        </tr>
      	<tr>
        	<td class="required-note" colspan="9">Exam Row Three</td>
       </tr>
        <tr>
        	<td height="5" colspan="9"></td>
        </tr>
      	<tr>
            <td>
                <label>Exam Name3 :<span class="required">*</span></label><br/>
                <input name="name_3" id="name_3" type="text"  value="{$name2}" size="17%"/>
            </td>
        <td width="20"></td>    
       	<td>
        	<label>Exam Type3:<span class="required">*</span></label><br/>
        	<select name="exam_type_3" id="exam_type_3" >
                <option  value=""></option>
                <option  value="Main_Exam">Main Exam</option>
                <option  value="Assigenment">Assigenment</option>
          	</select>
        </td>
        <td width="20"></td>
        <td>
        	<label>Weightage(In%age)3:<span class="required">*</span></label><br/>
        	<input name="min_marks_3" type="text"  value="{$min_marks2}" id="min_marks_3" />
        </td>
        <td width="20"></td>
        <td>
        	<label>Passing Marks3:<span class="required">*</span></label><br/>
        	<input name="passing_prsent_3" id="passing_prsent_3" type="text"  value="{$passing_prsent2}" size="17%">
         </td>
       <td width="20"></td>  
       <td>
        	<label>Total Marks 3:<span class="required">*</span></label><br/>
        	<input name="total_marks_3" type="text"  value="{$total_marks2}" id="total_marks_3" />
        </td>
      </tr>
      <!--
			<tr>
					
					<td style="padding-top:10px;">Total (%) 3: *<span class="required"></td>
					<td style="padding-top:10px;"><input name="total_prsent_3" type="text"l  value="" id="total_prsent_3" /></td>
					
			</tr>
			-->
      
        </tbody>
      
      <tbody  id="row4" style="display:none;">
      	<tr>
        	<td height="20" colspan="9"></td>
        </tr>
      	<tr>
        	<td class="required-note" colspan="9">Exam Row Four</td>
        </tr>
         <tr>
        	<td height="5" colspan="9"></td>
        </tr>
      <tr>
        <td>
        	<label>Exam Name4 :<span class="required">*</span></label><br/>
        	<input name="name_4" id="name_3" type="text"  value="{$name3}" size="17%"/>
        </td>
       	<td width="20"></td>
        <td>
        	<label>Exam Type4:<span class="required">*</span></label><br/>
        	<select name="exam_type_4" id="exam_type_4" >
                <option  value=""></option>
                <option  value="Main_Exam">Main Exam</option>
                <option  value="Assigenment">Assigenment</option>
          </select>
       	</td>
        <td width="20"></td>
        <td>
        	<label>Weightage(In%age)4:<span class="required">*</span></label><br/>
        	<input name="min_marks_4" type="text"  value="{$min_marks3}" id="min_marks_4" />
        </td>
        <td width="20"></td>
        <td>
        	<label>Passing Marks4:<span class="required">*</span></label><br/>
        	<input name="passing_prsent_4" id="passing_prsent_4" type="text"  value="{$passing_prsent3}" size="17%"/>
        </td>
        <td width="20"></td>
        <td>
        	<label>Total Marks 4:<span class="required"></span></label><br/>
        	<input name="total_marks_4" type="text"  value="{$total_marks3}" id="total_marks_4" />
        </td>
      </tr>
      <!--
				<tr>
					
					<td style="padding-top:10px;">Total (%) 4:<span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_4" type="text"  value="" id="total_prsent_4" /></td>
					
			</tr>
			-->
      
        </tbody>
      
      <tbody  id="row5" style="display:none;">
      	<tr>
        	<td height="20" colspan="9"></td>
        </tr>
      	<tr>
        	<td class="required-note" colspan="9">Exam Row Five</td>
        </tr>
         <tr>
        	<td height="5" colspan="9"></td>
        </tr>
      <tr>
        <td>
        	<label>Exam Name5:<span class="required">*</span></label><br/>
        	<input name="name_5" id="name_3" type="text"  value="{$name4}" size="17%"/>
         </td>
        <td width="20"></td>
        <td>
        	<label>Exam Type5:<span class="required">*</span></label><br/>
        	<select name="exam_type_5" id="exam_type_5" >
                <option  value=""></option>
                <option  value="Main_Exam">Main Exam</option>
                <option  value="Assigenment">Assigenment</option>
          </select></td>
       <td width="20"></td>
        <td>
        	<label>Weightage(In%age)5:<span class="required">*</span></label><br/>
        	<input name="min_marks_5" type="text"  value="" id="min_marks_5" />
        </td>
        <td width="20"></td>
        <td>
        	<label>Passing Marks5: <span class="required">*</span></label><br/>
        	<input name="passing_prsent_5" id="passing_prsent_5" type="text"  value="" size="17%"/>
        </td>
       <td width="20"></td>
        <td>
        	<label>Total Marks 5:<span class="required">*</span></label><br/>
        	<input name="total_marks_5" type="text"  value="" id="total_marks_5" />
         </td>
      </tr>
      <!--
				<tr>
					<td style="padding-top:10px;">Total (%) 5: <span class="required"></td><td style="padding-top:10px;"><input name="total_prsent_5" type="text"  value="" id="total_prsent_5" /></td>
					
			</tr>
			-->
      
        </tbody>
      
      <tbody  id="row6" style="display:none;">
      	<tr>
        	<td height="20" colspan="9"></td>
        </tr>
      	<tr>
        	<td class="required-note" colspan="9">Exam Row Six</td>
        </tr>
         <tr>
        	<td height="5" colspan="9"></td>
        </tr>
      <tr>
        
        <td>
        	<label>Exam Name6 :<span class="required">*</span></label><br/>
        	<input name="name_6" id="name_6" type="text"  value="{$name5}" size="17%"/>
        </td>
       	<td width="20"></td>
        <td>
        	<label>Exam Type6:<span class="required">*</span></label><br/>
        	<select name="exam_type_6" id="exam_type_6" >
                <option  value=""></option>
                <option  value="Main_Exam">Main Exam</option>
                <option  value="Assigenment">Assigenment</option>
          </select>
        </td>
        <td width="20"></td>
        <td>
        	<label>Weightage(In%age)6:<span class="required">*</span></label><br/>
        	<input name="min_marks_6" type="text"  value="" id="min_marks_6" />
        </td>
       <td width="20"></td>
        <td>
        	<label>Passing Marks6: *<span class="required">*</span></label><br/>
        	<input name="passing_prsent_6" id="passing_prsent_6" type="text"  value="" size="17%"/>
         </td>
        <td width="20"></td> 
        <td>
        	<label>Total Marks 6:<span class="required">*</span></label><br/>
        	<input name="total_marks_6" type="text"  value="" id="total_marks_6" />
        </td>
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
  </div>
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
	
	var examtype = $("#examtype").val();
	if(examtype){
		addMoreRows(examtype);
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


$("#examtype").click(function(e){
	
	var examtype= $("#examtype").val();
	
	if(examtype){
			if(!$("#exam_type_1").val()||!$("#min_marks_1").val()||!$("#passing_prsent_1").val()||!$("#total_marks_1").val()){
							$("#SAVE_FOOTER").attr("disabled","disabled");
			}
	 }
	});
	
	$("#total_marks_1").keyup(function(){
		if($("#total_marks_1").val()){
			$("#SAVE_FOOTER").removeAttr("disabled");
		}
	});
	
	$("#total_marks_1").mousedown(function() {
			$("#SAVE_FOOTER").removeAttr("disabled");
	});
	
$("#passing_prsent_1").click(function(e){

	var examtype= $("#examtype").val();
	var val=0;
	for (i=1;i<=examtype;i++){
	   
	   if($("#min_marks_"+i).val()==''){
			$("#min_marks_"+i).val(0);
	   }
		val+=parseInt($("#min_marks_"+i).val());
	    
	}
	if(val<100 || val>100){
		alert("Weightage total should be 100");
		e.preventDefault(); 
		return false;
	}
});



</script> 
<style>
.buttons .action_buttons{ display:flex; width:100%; justify-content:flex-end; margin:20px 0;}
.buttons .action_buttons .button{width:auto; margin:0; margin-left:15px;  text-decoration:none;}
.buttons .action_buttons .button:first-child{ margin-left:0;}
.buttons .action_buttons .button{padding: 5px 20px; background-color:#fff; border:1px solid #d7d7d7; color:#333333; box-shadow:0px 0px 0px 0px; font-size:12px!important;}
.buttons .action_buttons .button:hover{ background-color:#d7d7d7;}
#detailpanel_1 {padding: 20px; border: 1px solid #d7d7d7; background-color: #fff;  border-radius:4px;}
#detailpanel_1 table tr td{ vertical-align:top!important; color:#999;}
#detailpanel_1 table tr td textarea{resize:none; width:72%; color: #666; font-size: 12px;}
#detailpanel_1 table tr td input[type="text"]{width:72%; color: #666; font-size: 12px;}
</style>
{/literal}
{{include file='include/EditView/footer.tpl'}} 
<!--Code SugarTpl File For Examscheme Developed By mnaish at 9-jan-2018--> 



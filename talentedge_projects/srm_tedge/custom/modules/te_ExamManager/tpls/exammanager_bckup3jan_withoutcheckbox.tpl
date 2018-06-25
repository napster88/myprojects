<section class="moduleTitle"> <h1>Exam Booking Manager</h1><br/><br/>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?module=te_ExamManager&action=exammanager&form=002">
<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>      
			<td scope="row" nowrap="nowrap" width="1%">		
				<label for="batch_basic">Enter Student Enrollmernt ID	</label>
			</td>
			<td nowrap="nowrap" width="10%">			
				<input name="search_student" type="text"  value="{$selected_date}" id='search_student'/>
			</td>
		</tr>
		<tr><td colspan="8">&nbsp;</td></tr>
		
			<td  colspan="8">
				<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit" id="search_form_submit">&nbsp;
				<!--<input tabindex="2" title="Search " onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit Enrollment ID" id="search_form_submit">&nbsp; -->
				<input tabindex="2" title="Clear" onclick="SUGAR.searchForm.clear_form(this.form); return false;" class="button" type="button" name="clear" id="search_form_clear" value="Clear Enroll ID">
				<!--<input tabindex="2" title="Export" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="export" value="Export" id="export_form_submit"> --> 
		</tr>
		</tbody>
	</table>
</div>


<table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">
	<thead> 
	
	{foreach from = $studentifo key=key item=Sdata}
	<!-- Student Personal information Display -->
	<tr height="20">
			
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
			<br>
			<!--<tr scope="col" data-hide="phone" class="footable-visible footable-first-column"> </tr>
			<tr align="left"> </tr>
			<tr scope="col" data-hide="phone" class="footable-visible footable-first-column"> </tr>
			<tr scope="col" data-hide="phone" class="footable-visible footable-first-column"> </tr> -->
				{/foreach}	
</form>	
{if $form == 002 }
	<!-- End Section student-->
<form name="search_form2" id="search_form2" class="search_form2" method="post" action="index.php?module=te_ExamManager&action=exammanager&form=004">	
	<tr height="20">
		<th scope="col" data-hide="phone" class="footable-visible footable-first-column">	
			<strong>Subject</strong>
		</th>
		
		<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
			<strong>Exam Date</strong>
		</th>
		
		<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
			<strong>State</strong>
		</th>		
		<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
			<strong>City</strong>
		</th>				
	</tr>
	
	<!--{foreach from = $examifo key=key item=examdata}
	<tr height="20" class="oddListRowS1">
		<td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$examdata.subject}</td>
		<input type="hidden" value="{$examdata.te_te_subject_id_c}" name="subjectid[]"/>
		<td align="left" valign="top" type="relate" field="batch" class="inlineEdit footable-visible footable-last-column"><select name="date[]" id="date" required ><option  value="" >Select Date</option>
							<option value={$examdata.exam_date} >{$examdata.exam_date}</option></select></td>				 
	
		<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column"><select name="state[]" id="state" required ><option  value="" >Select State</option>
							{foreach from = $indiastate key=key item=statedata}<option value={$key} >{$statedata}</option>{/foreach}</select></td>	
		<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column"><input name="city[]" type="text"  value="" id='city' required /></td>		
	</tr>
		{/foreach}-->
	{foreach from = $slot_info key=key item=examdata}
	<tr height="20" class="oddListRowS1">
		<td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$subject_info.$key}</td>
		<input type="hidden" value="{$key}" name="subjectid[]"/>
		<td align="left" valign="top" type="relate" field="batch" class="inlineEdit footable-visible footable-last-column">
			<select name="date[]" id="date" required >
				<option  value="" >Select Date</option>
				{foreach from = $examdata key=key_examdata item=examdata_val}
				<option  value="{$key_examdata}" >{$examdata_val}</option>
				{/foreach}
			</select>
		</td>				 
		<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
			<select name="state[]" id="state" required >
				<option  value="" >Select State</option>
				{foreach from = $indiastate key=key item=statedata}
				<option value={$key} >{$statedata}</option>
				{/foreach}
			</select>
		</td>	
		<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
			<input name="city[]" type="text"  value="" id='city' required />
		</td>		
	</tr>
	{/foreach}
</table>
<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Book-Exam" id="search_form2">&nbsp;
</form>	
{/if}	
<script>
{literal}
Calendar.setup ({
   inputField : "search_date",
   daFormat : "%m/%d/%Y %I:%M%P",
   button : "search_date_trigger",
   singleClick : true,
   dateStr : "",
   step : 1,
   weekNumbers:false,
});
</script>
{/literal}



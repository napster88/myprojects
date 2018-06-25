<section class="moduleTitle"> <h1>Exam Date Slots </h1><br/><br/>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?module=te_ExamSchedules&action=examslots&form_a=1220">
<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>      
			<td scope="row" nowrap="nowrap" width="1%">		
				<label for="batch_basic">Select Exam Schedule</label>
			</td>
			<td nowrap="nowrap" width="10%">
				<select name="examschedule"  id="examschedule">
					<option  value="">Select Exam Schedule</option>
					{foreach from = $examList key=key item=exam}
						<option value="{$exam.id}" {if $selected_exam eq $exam.id} selected="selected" {/if}>{$exam.name}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="8">&nbsp;</td></tr>
			<td  colspan="8">
				<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Search" id="search_form_submit">&nbsp;
				<!--<input tabindex="2" title="Search " onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit Enrollment ID" id="search_form_submit">&nbsp; -->
				<input tabindex="2" title="Clear" onclick="SUGAR.searchForm.clear_form(this.form); return false;" class="button" type="button" name="clear" id="search_form_clear" value="Clear-Filter">
		</tr>
		</tbody>
	</table>
</div>

{if ($form_a == 1220)}	
		{if ($form_a == 1220) && ($dublicateform ==0 || $dublicateform =='')}
		<table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">
				<thead> 
				<!-- Student Personal information Display -->
				<tr height="20">
							<td width="30%">
								<strong>Exam Schedule-</strong>{$examschedulename}<br>
								<strong>Statrt Date-</strong>{$first}<br>
								<strong>Statrt Time-</strong>{$starttime}<br>
							</td>
							<td>
								<strong></strong><br>
								<strong>End Date-</strong>{$last}<br>
								<strong>End Time-</strong>{$endtime}<br>
							</td>
				</tr>
						<br>
		</form>	
		<!-- End Section2 For Assign Subject date-->
		<form name="search_form2" id="search_form2" class="search_form2" method="post" action="index.php?module=te_ExamSchedules&action=examslots&form_b=1230">	
				<tr height="20">
					<th scope="col" data-hide="phone" class="footable-visible footable-first-column">	
						<strong>Subject</strong>
					</th>
					<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
						<strong>Exam Date</strong>
					</th>
					<th scope="col" data-hide="phone" class="footable-visible footable-first-column">					
						<strong>Exam Time</strong>
					</th>						
				</tr>
			
		{foreach from = $examscheduleifo key=key item=examdata}
				<tr height="20" class="oddListRowS1">
					<td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$examdata.Subject}</td>
					<input type="hidden" value="{$examdata.subjectid}" name="subjectid[]"/>
					<input type="hidden" value="{$examdata.Subject}" name="{$examdata.subjectid}"/>
					<td align="left" valign="top" type="relate" field="batch" class="inlineEdit footable-visible footable-last-column">
						<select name="date_{$examdata.subjectid}[]" id="date" required  class="multiselbox" multiple>
							<option  value="" >Select Date</option>
							{foreach from = $datelist key=key item=datedata}
							<option  value="{$datedata}" selected>{$datedata}</option>
							{/foreach}
						</select>
					</td>				 
					<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
						<select name="timeslot_{$examdata.subjectid}[]" id="state" required  class="multiselbox" multiple >
							{foreach from = $ftimes key=key item=timelist}
							<option value={$key} selected>{$timelist}</option>
							{/foreach}
						</select>
					</td>			
				</tr>
			{/foreach}
		</table>
		<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Assign-Dates" id="search_form2">&nbsp;
		</form>	

		{else}
		<!-- Dublicate Form Information-->
		<form name="search_dublicate" id="search_dublicate" class="search_dublicate">
				<table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">
					<thead> 
						<tr>      
					<td scope="row" nowrap="nowrap" width="1%">		
						 
						 <h1 style="color:red">Sorry you Have Already Assigned Date & Times !</h1>
					</td>
							<tr height="20">
										<td width="30%">
												<strong>Exam Schedule-</strong>{$examschedulename}<br>
												<strong>Statrt Date-</strong>{$first}<br>
												<strong>Statrt Time-</strong>{$starttime}<br>
										</td>
										<td>
												<strong>Total Date Assigned-</strong>{$dublicateform}<br>
												<strong>End Date-</strong>{$last}<br>
												<strong>End Time-</strong>{$endtime}<br>
										</td>
							</tr>
					</table>
			</form>
			{/if}
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



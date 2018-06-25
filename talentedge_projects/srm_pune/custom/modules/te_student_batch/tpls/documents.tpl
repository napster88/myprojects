<section class="moduleTitle"> <h1>Student Upload Documents Form</h1><br/><br/>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?module=te_student_batch&action=documents" enctype="multipart/form-data">
<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			{if $docsnum neq 0}
			<tr>      
				<td scope="row" nowrap="nowrap" width="1%">		
					<label for="batch_basic">Select Documents</label>
				</td>
				<td nowrap="nowrap" width="10%">
						{foreach from = $documentifo key=key item=doclist}
								<td width="30%">
									<strong>{$doclist.name}</strong><input type="file" value="" name="files[]" multiple="" required><br>
									<input type="hidden" value="{$doclist.name}" name="docname[]">
								</td>
						{/foreach}		
				</td>
			</tr>
			
			<tr>
				<td colspan="8">&nbsp;</td></tr>
				<td  colspan="8">
					<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit" id="search_form_submit">&nbsp;
			</tr>
			{/if}
			{if $docsnum eq 0}
				<strong><font size="3" color="red"><center>No Document Required for This Program</center></font></strong>
			{/if}
		 </tbody>
	 </table>
  </div>
</form>	
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



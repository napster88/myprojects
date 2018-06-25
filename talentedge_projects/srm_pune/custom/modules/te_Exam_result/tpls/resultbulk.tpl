<section class="moduleTitle"> <h1>Bulk Result Import Download Template </h1><br/><br/>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?entryPoint=common_helper&type=csv_result_template">
<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td scope="row" nowrap="nowrap" width="1%">
					<label for="batch_basic">Institute</label>
				</td>
				<td nowrap="nowrap" width="10%">
								<td width="30%">
                  <select name="institute" class="form-control" id="institute" required>
                    <option value="">--Select Institute--</option>
                    {foreach from=$institutes  item=institutesval}
                        <option value="{$institutesval.id}">{$institutesval.name}</option>
                    {/foreach}
                  </select>
								</td>
				</td>
        <td scope="row" nowrap="nowrap" width="1%">
          <label for="batch_basic">Program</label>
        </td>
        <td nowrap="nowrap" width="10%">
                <td width="30%">
                  <select name="program"  class="form-control" id="program" required>
                    <option value="">--Select Program--</option>
                    {foreach from=$ins_programs  item=ins_programs_val}
                        <option value="{$ins_programs_val.pro_id}" data_ins="{$ins_programs_val.ins_id}">{$ins_programs_val.pro_name}</option>
                    {/foreach}
                  </select>
                </td>
        </td>
			</tr>
		<tr>
				<td colspan="8">&nbsp;</td>
				<td  colspan="8">
					<button type="submit" class="btn btn-info">Download</button>
        </td>
			</tr>

		 </tbody>
	 </table>
  </div>
</form>
</section>

<section class="moduleTitle"> <h1>Bulk Result Import </h1><br/><br/>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?module=te_Exam_result&action=resultbulk" enctype="multipart/form-data">
<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td scope="row" nowrap="nowrap" width="1%">
					<label for="batch_basic">Select Upload .CSV File</label>
				</td>
				<td nowrap="nowrap" width="10%">
								<td width="30%">
										<input type="file" value="" name="fileToUpload" required accept=".csv"><br>
									<!-- <input type="hidden" value="{$doclist.name}" name="docname[]"> -->
								</td>
				</td>
				<!--<td nowrap="nowrap" width="10%">
				Sample CSV
				<a href="custom\modules\te_Exam_result\result_sample.csv">Download Template</a>
      </td>-->
			</tr>
		<tr>
				<td colspan="8">&nbsp;</td>
				<td  colspan="8">
					<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Upload" id="search_form_submit">&nbsp;
        </td>
			</tr>

		 </tbody>
	 </table>
  </div>
</form>
</section>
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
$(function(){
  $("#program").children('option').hide();
  $("#institute").change(function(){
    if($(this).val()){
      $("#program").children('option').hide();
      $('#program option[data_ins="'+$(this).val()+'"]').show();
    }
  })
});
</script>
{/literal}


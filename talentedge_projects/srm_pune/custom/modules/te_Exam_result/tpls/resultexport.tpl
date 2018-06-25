<!--- Sugarcrm Tpl View For Result Bulk Export -->
<section class="moduleTitle"> <h1>Bulk Result Export </h1><br/><br/>
	<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?module=te_Exam_result&action=resultexport" enctype="multipart/form-data">
		<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
								<tr>      
									<td scope="row" nowrap="nowrap" width="1%">
									<label for="batch_basic">Institute:</label>
								</td>
								<td nowrap="nowrap" width="10%">
									<select name="program[]" class="multiselbox" id="batch" multiple>
										<option  value=""></option>
											<option value="Val1" selected="selected">Institute-1</option>
											<option value="Val2" selected="selected">Institute-2</option>
											<option value="Val3" selected="selected">Institute-3</option>
									</select>
									</td>
									
									<td scope="row" nowrap="nowrap" width="1%">
									<label for="batch_basic">Programs:</label>
								</td>
								<td nowrap="nowrap" width="10%">
									<select name="program[]" class="multiselbox" id="batch" multiple>
										<option  value=""></option>
											<option value="Val1" selected="selected">Programs-1</option>
											<option value="Val2" selected="selected">Programs-2</option>
											<option value="Val3" selected="selected">Programs-3</option>
									</select>
									</td>
								</tr>
								<tr>
									<td colspan="8">&nbsp;</td></tr>
									<td  colspan="8"><input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Export Result" id="search_form_submit">&nbsp;
								</tr>
						 </tbody>
				 </table>
		  </div>
</form>	



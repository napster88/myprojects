<!--Suitecrm Code  tpl View Exam result Module .
Date-10-Jan-2018
Engenia Technologie
Dev-by=> Manish kumar.
-->

<section class="moduleTitle"> <h1>Create Exam Result for Student</h1><br/><br/>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?module=te_Exam_result&action=examresultsscreen&form=002$id={$search_filter}">
<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>
			<td scope="row" nowrap="nowrap" width="1%">
				<label for="batch_basic">Enter Student Enrollment ID </label>
			</td>
			<td nowrap="nowrap" width="10%">
				<input name="search_student_exam" type="text"  value="{$search_filter}" id='search_student_exam' required >
			</td>
		</tr>
		<tr><td colspan="8">&nbsp;</td></tr>

			<td  colspan="8">
				<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit" id="search_form_submit">&nbsp;
				<!--<input tabindex="2" title="Search " onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit Enrollment ID" id="search_form_submit">&nbsp; -->
				<input tabindex="2" title="Clear" onclick="SUGAR.searchForm.clear_form(this.form); return false;" class="button" type="button" name="clear" id="search_form_clear" value="Clear Enroll ID">
		</tr>
		</tbody>
	</table>
</div>

<div class="list view table footable-loaded footable default result-screen-download">
	
	<!-- Student Personal information Display -->
	{foreach from = $studentifo key=key item=Sdata}
	
						<h1>Exam Result for {$Sdata.name}</h1>
					<div class="block-wrapper">	
					<div class="block"><strong>Name-</strong>{$Sdata.name}</div>
					<div class="block"><strong>Email-</strong>{$Sdata.email}</div>
					<div class="block"><strong>Course-</strong>{$Sdata.course}</div>
				
				
					<div class="block"><strong>Mobile-</strong>{$Sdata.mobile}</div>
					<div class="block"><strong>Specialization-</strong>{$Sdata.added_specialization}</div>
					<div class="block"><strong>Current Semsester-</strong>{$Sdata.currentsemname}</div>
				</div>
			
		</div>
	{/foreach}
		{if $form eq 002 && $ExamCount eq 0 && $studentifoCount !=0 }
			<!-- <strong><font size="3" color="red"><center>You Have Already Submit Marks !</center></font></strong> -->
			<div class="result-screen-actions-buttons">
			<a href="index.php?entryPoint=result_download&enrollid={$search_filter}" value="" class="button" target="_blank">Download Result</a>
            </div>
		{/if}

		{if $studentifoCount==0}
		<strong><font size="3" color="red"><center>{$norecod}</center></font></strong>
		{/if}
</form>
{if $form == 002 && $ExamCount!=0 && $studentifoCount!=0}
  <table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view table footable-loaded footable default">
	<!-- End Section student-->
	<form name="search_form2" id="search_form2" class="search_form2" method="post" action="index.php?module=te_Exam_result&action=examresultsscreen&form=004">
		<tr height="20">
			<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
				<strong>Subject</strong>
			</th><th scope="col" data-hide="phone" class="footable-visible footable-first-column">
				<strong>Subject ID</strong>
			</th>
			</th><th scope="col" data-hide="phone" class="footable-visible footable-first-column">
				<strong>Exam Date</strong>
			</th>
			{foreach from = $examtypes key=key item=examschme}
			<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
				<strong>{$examschme.name} <!-- (<font color="green"> Weightage(In%age)-:{$examschme.min_marks} </font>,Passing Precentage-:{$examschme.passing_prsent}) --></strong>
			</th>
			{/foreach}
				<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
				<strong>Grade</strong>
			    </th>
		</tr>
	{assign var=i value=0}
		{foreach from = $studentexaminfo key=key item=examdata}
		<tr height="20" class="oddListRowS1">
			<td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$examdata.subjectName}</td>
				<input type="hidden" value="{$examdata.subject}" name="subjectid[{$examdata.subject}]">
				<input type="hidden" value="{$examdata.examId}" name="booking[{$examdata.subject}]">
        <input type="hidden" value="{$examdata.overall_total_marks}" name="examtype_subject_marks[{$examdata.subject}]">
			<td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$examdata.subjectcode}</td>
			<td align="left" valign="top" type="relate" field="vendor" class="inlineEdit footable-visible footable-last-column">{$examdata.examdate}</td>
				{foreach from = $examtypes key=key item=examschme}
				{php }
				   /*$tpl_exampdata = $this->get_template_vars ('examdata');
				   $tpl_examschme = $this->get_template_vars ('examschme');

					$exam_max_val =  round($tpl_exampdata['overall_total_marks']*$tpl_examschme['min_marks']/100);
					$exam_min_val =  round($tpl_exampdata['overall_total_marks']*$tpl_examschme['passing_prsent']/100);*/

				{/php}
			<td align="left" valign="top" type="relate" field="total_leads" class="inlineEdit footable-visible footable-last-column">
					<input type="hidden" value="{$examschme.name}" name="examtype[{$examdata.subject}][{$examschme.name}]">

					<input type="hidden" value="{$examschme.passing_prsent}" name="examtype_passing_marks[{$examdata.subject}][{$examschme.name}]">
					<input type="hidden" value="{$examschme.total_marks}" name="examtype_total_marks[{$examdata.subject}][{$examschme.name}]">
          <input type="hidden" value="{$examschme.min_marks}" name="examtype_contribution[{$examdata.subject}][{$examschme.name}]">
					<input name="examtype_val[{$examdata.subject}][{$examschme.name}]" type="number" class="form-control" max="{$examschme.total_marks}" id="examtype{$examschme.name}{$i}" required >
					<span class="text-success"><strong>Max Marks:- {$examschme.total_marks} </strong></span>
					<span class="text-danger"><strong>Passing Marks:-  {$examschme.passing_prsent}</strong></span>
					<!-- New Added Field Name Sccheme Sc$total_marks -->

			</td>
				{/foreach}
				<td>
				<select name="examtype_grade[{$examdata.subject}]" id="examtype_grade{$examschme.exam_type}{$i}" required >
					<option value="">--Select Grade--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="F">F</option>
				</select>
				</td>
			{assign var=i value=$i+1}
		{/foreach}
		</table>
		<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="Submit-Result" id="search_form2">&nbsp;
	{/if}
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
function validateForm() {
    var x = document.forms["search_form"]["search_student_exam"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}

</script>
{/literal}


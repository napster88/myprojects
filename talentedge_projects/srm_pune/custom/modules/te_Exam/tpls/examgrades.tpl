<section class="moduleTitle"> <h1> </h1><br/><br/>
<form name="search_form" id="search_form" class="search_form" method="post" action="index.php?entryPoint=common_helper&type=csv_result_template">
<div id="te_budgeted_campaignbasic_searchSearchForm" style="" class="edit view search basic">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td scope="row" nowrap="nowrap" width="1%">
					<label for="batch_basic">Institute
        </label>
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
                <td width="80%">
                  <select name="program" multiple class="form-control" id="program" required>
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
    <table width="50%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td  width="1%">	<label for="batch_basic">Low Range of Marks</label>		</td>
				<td width="1%"> 	<label for="batch_basic">Grade</label> 		</td>
				<td  width="1%">	<label for="batch_basic"> Upper Range of Marks 	</label> 			</td>

			</tr>
		<tr>
				<td><input type="text" name="rowone_low" value="91"></td>
				<td>≤A+ < </td>
        <td><input type="text" name="rowone_upper" value="100"></td>		</tr>
        		<tr>
        <td><input type="text" name="rowtwo_low" value="82"></td>
				<td>≤A < </td>
        <td><input type="text" name="rowtwo_upper" value="90"></td>		</tr></tr>
        		<tr>
        <td><input type="text" name="rowthree_low" value="73"></td>
				<td>≤B+ < </td>
          <td><input type="text" name="rowthree_upper" value="81"></td>		</tr></tr>
        		<tr>
        <td><input type="text" name="rowfour_low" value="64"></td>
				<td>≤B < </td>
          <td><input type="text" name="rowfour_upper" value="72"></td>		</tr></tr>
        		<tr>
        <td><input type="text" name="rowfive_low" value="55"></td>
				<td>≤C+ <</td>
        <td><input type="text" name="rowfive_upper" value="63"></td>		</tr></tr>
        		<tr>
        <td><input type="text" name="rowsix_low" value="46"></td>
				<td>≤C <</td>
          <td><input type="text" name="rowsix_upper" value="54"></td>		</tr>
			</tr>
<tr><td></td><td></td><td></td></tr>
<tr><td><input type="text" value="E1" name="fail_internal"></td><td colspan="2">Fail in assignments</td></tr>
<tr><td><input type="text" value="E2" name="fail_external"></td><td colspan="2">Fail in External</td></tr>
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
  //$("#program").children('option').hide();
  $("#institute").change(function(){
    if($(this).val()){
    var int_id=$(this).val();
     var dataString = '&int_id=' + int_id ;
  //  alert(int_id);
      $.ajax({
                 'type': "POST",
                 'url': "index.php?entryPoint=getprogram",
                 data: dataString,
                 datatype:"json",
                 success: function(data) {
                    //$("#program").
                  //  $("#program").text(JSON.stringify(response));
                   //alert(JSON.stringify(response));
                   var ob=jQuery.parseJSON(data);
                  var array_ne = [data];
                //  alert(ob);
                $.each(ob, function( key, val ) {
                  //  console.log(val);

                $("#program").append('<option value='+key+'>'+val+'</option>');
                 });
                   }
             });
      $("#program").children('option').hide();
      $('#program option[data_ins="'+$(this).val()+'"]').show();
    }
  })
});
</script>
{/literal}

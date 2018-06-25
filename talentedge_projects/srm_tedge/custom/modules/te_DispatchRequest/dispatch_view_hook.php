<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class DispatchView{	

	function dispatchstatus($bean, $event, $argument){
		
		
		global $db;
		#$bean->name=$bean->reference_number;
		
		$sql="select status from te_DispatchRequest where id='".$bean->id."'";
		$dispatch_data=$db->query($sql);
		$Srow =$db->fetchByAssoc($dispatch_data);
		
		$html='<a id="'.$bean->id.'_a" value='.$bean->id.' class="btn btn-success btn-block">Approved</a><a id="'.$bean->id.'_d" value='.$bean->id.' class="btn btn-danger btn-block">Disaproved</a><a id="'.$bean->id.'_h" value='.$bean->id.' class="btn btn-warning btn-block">Hold</a><a id="'.$bean->id.'_c" value='.$bean->id.' class=" btn btn-info btn-block">Complete</a><script>
			
		$("#'.$bean->id.'_a").click(function(e){ 
		
			if (confirm("Do you want to Approve!!")) {
				var id=$("#'.$bean->id.'_a").attr("value");
				 $.ajax({
				  url: "index.php?entryPoint=semesterdropdown",
				  type: "POST",
				  data: {
					"id": id,
					"source":"approve",
				  },
				  success: function(msg){
					alert(msg);
					$("#'.$bean->id.'_a").hide();
				  }
			   });
			} else {
				alert("OK!");
			}
		});
		
		$("#'.$bean->id.'_d").click(function(e){ 
			if (confirm("Do you want to DisApprove!!")) {
				var disapprove=prompt("Please Provide reason to disapprove", "");
				var id=$("#'.$bean->id.'_d").attr("value");
				 $.ajax({
				  url: "index.php?entryPoint=semesterdropdown",
				  type: "POST",
				  data: {
					"id": id,
					"source":"disapprove",
					"centre":disapprove
				  },
				  success: function(msg){
					alert(msg);
					$("#'.$bean->id.'_d").hide();
				  }
			   });
			} else {
				alert("OK!");
			}
		});
		
		$("#'.$bean->id.'_h").click(function(e){ 
			if (confirm("Do you want to Hold!!")) {
				var hold=prompt("Please Provide reason to Hold", "");
				var id=$("#'.$bean->id.'_h").attr("value");
				 $.ajax({
				  url: "index.php?entryPoint=semesterdropdown",
				  type: "POST",
				  data: {
					"id": id,
					"source":"hold",
					"centre":hold
				  },
				  success: function(msg){
					alert(msg);
					$("#'.$bean->id.'_h").hide();
				  }
			   });
				
			} else {
				alert("OK!");
			}
		});
		
		$("#'.$bean->id.'_c").click(function(e){ 

			if (confirm("Do you want to Complete!!")) {
				var id=$("#'.$bean->id.'_c").attr("value");
				 $.ajax({
				  url: "index.php?entryPoint=semesterdropdown",
				  type: "POST",
				  data: {
					"id": id,
					"source":"complete",
				  },
				  success: function(msg){
					alert(msg);
					$("#'.$bean->id.'_c").hide();
				  }
			   });
			}	
			else {
				alert("OK!");
			}
		});
		
		$(document).ready(function(){
			if("'.$Srow['status'].'"=="approved"){
				$("#'.$bean->id.'_a").hide();
			}
			if("'.$Srow['status'].'"=="disapproved"){
				$("#'.$bean->id.'_d").hide();
			}
			if("'.$Srow['status'].'"=="hold"){
				$("#'.$bean->id.'_h").hide();
			}
			if("'.$Srow['status'].'"=="completed"){
				$("#'.$bean->id.'_c").hide();
			}
		});
		
		</script>';
		
		$bean->institute_id=$html;
		
		$sql="select `name` from te_te_semester where id='".$bean->semester_c."'";
		$semester_name=$db->query($sql);
		$name =$db->fetchByAssoc($semester_name);
		$bean->semester_c=$name['name'];
		
		
		$sqlprog="select `name` from te_pr_programs where id='".$bean->program_c."'";
		$semester_nameprog=$db->query($sqlprog);
		$nameprog =$db->fetchByAssoc($semester_nameprog);
		$bean->program_c=$nameprog['name'];
		
	}
}


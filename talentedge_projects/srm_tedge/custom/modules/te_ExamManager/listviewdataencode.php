<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
	class listviwdisplay
	{
	   function listview(&$bean, $event, $arguments){
		   global $db;
		   /* Sql fatch Subject Data for id to Name */
		  // $SQlSubject =$db->query("SELECT name FROM `te_subjects` WHERE id='".$bean->subject."' AND deleted=0");     @Manish 20april
		   $SQlSubject =$db->query("SELECT name FROM `te_subjects_master` WHERE id='".$bean->subject."' AND deleted=0");
		   $SubjectReSulT =$db->fetchByAssoc($SQlSubject);



			$bean->subject=$SubjectReSulT['name'];
			$html='<a id="'.$bean->id.'" value='.$bean->id.' class="button">Upload Center</a><script>
			$("#'.$bean->id.'").click(function(e){
				var center=prompt("Please enter Center name", "GURUKUL HALL2");
				var id=$("#'.$bean->id.'").attr("value");
				 $.ajax({
				  url: "index.php?entryPoint=get_state",
				  type: "POST",
				  data: {
					"id": id,
					"source":"centre",
					"centre":center
				  },
				  success: function(msg){
					$("#'.$bean->id.'").css("pointer-events","none");
					$("#'.$bean->id.'").text(center);
					$("#'.$bean->id.'").css("background-color","#FFEBCD");
					$("#'.$bean->id.'").css("color","black");
				  }
			   });
			});


			</script>';
			/* Sql fatch Date Data for id to Name */
			$DateSql="SELECT exam_date,exam_time FROM `te_exam_date_schedules` WHERE id='".$bean->examnation_time."' AND deleted=0";
			$SQlDAte =$db->query($DateSql);
			$ReSulT =$db->fetchByAssoc($SQlDAte);

			//$Date=str_replace(" ","@",$ReSulT['exam_date']);
			$daTe=explode(" ",$ReSulT['exam_date']);
			$bean->exam_date_c=$daTe[0];;
			$bean->examnation_time=$ReSulT['exam_time'];
			#$bean->exam_center=$html;
			$bean->description=$html;
			//$SQlDAteResult['exam_date'];

		   }

	}

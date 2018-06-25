<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class ExamView
{

    function publishaction($bean, $event, $argument)
    {
        global $db;
        #$bean->name=$bean->reference_number;

        $sql       = "select * from te_exam where id='" . $bean->id . "'";
        $exam_data = $db->query($sql);

        while ($Srow = $db->fetchByAssoc($exam_data))
        {
            $studentifo = $Srow;
        }

        $status = ISSET($studentifo['status']) && $studentifo['status'] == 1 ? 1 : 0;

        $html = '<a id="' . $bean->id . '" value=' . $bean->id . ' class="button">PUBLISH</a>'
                . '<a href="index.php?module=te_Exam&return_module=te_Exam&action=DetailView&record='.$bean->id.'" target="_blank"><i class="fa fa-eye"></i></a>'
                . '<a id="' . $bean->id . '_32" href="index.php?module=te_Exam&action=editexam&id=' . $bean->id . '" target="_blank"><i class="fa fa-pencil-square-o"></i></a>
		
		<script>
			
		$("#' . $bean->id . '").click(function(e){ 
		
			if (confirm("Do you want to continue!!")) {
			var id=$("#' . $bean->id . '").attr("value");
			$.ajax({
			  url: "index.php?entryPoint=dropdownpoint",
			  type: "POST",
			  data: {
				"id": id,
				"source":"exam",
				"status":"1"
			  },
			  success: function(msg){
				var status=JSON.parse(msg).status;
				if(status==1){
					alert("Published Successfully!!");
					$("#' . $bean->id . '").css("pointer-events","none");
					$("#' . $bean->id . '").text("PUBLISHED");
					$("#' . $bean->id . '").css("opacity","0.5");
					$("#' . $bean->id . '").css("color","black");
					$("#' . $bean->id . '_32").css("pointer-events","none");
					$("#' . $bean->id . '_32").css("opacity","0.5");
				}
			  }
		   });
		   } else {
				alert("Awaiting for Next!!");
			}
		});
		
		$(document).ready(function(){
			if(' . $status . '==1){
					$("#' . $bean->id . '").css("pointer-events","none");
					$("#' . $bean->id . '").text("PUBLISHED");
					$("#' . $bean->id . '").css("opacity","0.5");
					$("#' . $bean->id . '").css("color","black");
					$("#' . $bean->id . '_32").css("pointer-events","none");
					$("#' . $bean->id . '_32").css("opacity","0.5");
			}
		});
		</script>';

        $bean->description = $html;

        if ($bean->batch_val != 'NULL')
        {
            $myJSON = json_decode(stripslashes(html_entity_decode($bean->batch_val)));

            $sqlBatch   = "SELECT name FROM `te_ba_batch` WHERE id IN ('" . implode("', '", $myJSON) . "')";
            $batch_data = $db->query($sqlBatch);
            //$sqlBatch="SELECT name FROM `te_ba_batch` WHERE id in('$stringBatch')";
            //$batch_data=$db->query($sqlBatch);

            $batchname = array();
            while ($Srowbatch = $db->fetchByAssoc($batch_data))
            {
                $batchname[] = $Srowbatch['name'];
            }
            $string_val      = implode(',', $batchname);
            $bean->batch_val = $string_val;
        }

        if ($bean->semester_val != 'NULL')
        {
            $S2 = json_decode(stripslashes(html_entity_decode($bean->semester_val)));

            $sqlsem   = "SELECT name FROM `te_te_semester` WHERE id IN ('" . implode("', '", $S2) . "')";
            $sem_data = $db->query($sqlsem);

            $semname = array();
            while ($Srowsem = $db->fetchByAssoc($sem_data))
            {
                $semname[] = $Srowsem['name'];
            }
            $string_valsem      = implode(',', $semname);
            $bean->semester_val = $string_valsem;
        }



        $listData        = str_replace(",", '<br><font color="green">', $bean->list_date);
        $bean->list_date = $listData;
    }

}

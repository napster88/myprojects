<?php

include 'db.php';
if (isset($_POST["Import"]))
{


    $mimeType      = '';
    $extentionType = '';
    $filename      = $_FILES["file"]["tmp_name"];
    $finfo         = finfo_open(FILEINFO_MIME_TYPE); // return mime type text/plain
    $mimeType      = finfo_file($finfo, $filename) . "\n";

    $filenameEx = $_FILES["file"]["name"];
    $allowed    = array('csv');
    $ext        = pathinfo($filenameEx, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed))
    {
        $extentionType = 'error';
    }

    if ($extentionType == 'error' && $mimeType != 'text/plain')
    {
        echo "<script type=\"text/javascript\">
                                                 alert(\"Invalid File:Please Upload CSV File.\");
                                                 window.location = \"index.php\"
                                         </script>";
    }


    if ($_FILES["file"]["size"] > 0)
    {

        $file     = fopen($filename, "r");
        fgetcsv($file);
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            //if($row == 1){ $row++; continue; }

            $post_id            = $emapData[0];
            $xlx_color          = $emapData[1];
            $batch_title        = $emapData[2];
            $batch_status       = $emapData[3];
            $batch_type         = $emapData[4];
            $batch_code         = $emapData[5];
            $institue_id        = $emapData[6];
            $institue_key       = $emapData[7];
            $product_parent_id  = $emapData[8];
            $crm_programme_id   = $emapData[9];
            $crm_id_programme   = $emapData[10];
            $web_batch_id       = $emapData[11];
            $web_program_id     = $emapData[12];
            $institue_web_id    = $emapData[13];
            $institue_crm_id    = $emapData[14];

            if($xlx_color !='Green'){ continue; }

           
            
           
                $SQLSELECT  = "SELECT post_id FROM te_postmeta WHERE meta_key='crm_programme_id' and post_id=$post_id";
                $result_set = mysqli_query($conn, $SQLSELECT);
                $contRow    = mysqli_num_rows($result_set);
                
                //echo 'xx==='.$contRow; die;
                if ($contRow > 0)
                {
                    echo "update te_postmeta set meta_value='$crm_programme_id' where post_id=$post_id and meta_key='crm_programme_id';<br>";
                }
                else
                {
                    echo "Insert into te_postmeta set meta_value='$crm_programme_id',post_id=$post_id,meta_key='crm_programme_id';<br>";
                }
            
            
           
                $SQLSELECT  = "SELECT post_id FROM te_postmeta WHERE meta_key='crm_id_programme' and post_id=$post_id";
                $result_set = mysqli_query($conn, $SQLSELECT);
                $contRow    = mysqli_num_rows($result_set);
                
                //echo 'xx==='.$contRow; die;
                if ($contRow > 0)
                {
                    echo "update te_postmeta set meta_value='$crm_id_programme' where post_id=$post_id and meta_key='crm_id_programme';<br>";
                }
                else
                {
                    echo "Insert into te_postmeta set meta_value='$crm_id_programme',post_id=$post_id,meta_key='crm_id_programme';<br>";
                }
            
            
            
          
            //if ($institue_key == '' || $institue_key == 'NULL'){
            
                $SQLSELECT  = "SELECT post_id FROM te_postmeta WHERE meta_key='_institue' and post_id=$post_id";
                $result_set = mysqli_query($conn, $SQLSELECT);
                $contRow    = mysqli_num_rows($result_set);
                
                //echo 'xx==='.$contRow; die;
                if ($contRow > 0)
                {
                    echo "update te_postmeta set meta_value='field_578f1afe89c6f' where post_id=$post_id and meta_key='_institue';<br>";
                }
                else
                {
                    echo "Insert into te_postmeta set meta_value='field_578f1afe89c6f',post_id=$post_id,meta_key='_institue';<br>";
                }
            //}
            
           // if ($product_parent_id == '' || $product_parent_id == 'NULL') {
           
                $SQLSELECTx  = "SELECT post_id FROM te_postmeta WHERE meta_key='product_parent' and post_id=$post_id";
                $result_setx = mysqli_query($conn, $SQLSELECTx);
                $contRowx    = mysqli_num_rows($result_setx);
                if ($contRowx > 0)
                {
                    echo "update te_postmeta set meta_value=$web_program_id where post_id=$post_id and meta_key='product_parent';<br>";
                }
                else
                {
                    echo "Insert into te_postmeta set meta_value=$web_program_id,post_id=$post_id,meta_key='product_parent';<br>";
                }
           // }

            echo '<hr>';

        }
        fclose($file);



        //close of connection
        mysqli_close($conn);
    }
}
?>
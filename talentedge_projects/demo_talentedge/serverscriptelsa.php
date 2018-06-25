<?php
$explodevalue=explode('_',$_POST['value']);
$sliqData = array();
             //$sliqData['userid']=$userData->data->sliq_id;
             $sliqData['batch_id']=$explodevalue[0];
             $sliqData['content_id']=$explodevalue[1];
             $ch = curl_init();
            $fields_string = http_build_query($sliqData);
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, "sliq.talentedge.in/Api/joinLiveClass");
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,   array(
                        'userid: '.$explodevalue[2]));
            //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
            $decode = json_decode($result, true);  
            $url=  $decode['resultData']['URL']; //exit;  

print_r($url);exit;

?>

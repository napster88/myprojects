<?php 

			$tracknum = '1Z6W22070392331212';
              //	echo $ups_trackno=$tracknum[0]['tracking_number'];
             
            $d=  file_get_contents("https://wwwapps.ups.com/WebTracking/track?loc=en_US&track.x=Track&trackNums=1Z6W22070392331212");
json_decode($d);
print_r($d);			  

                $dd = goshippo_api($tracknum);
                $status = isset($dd->tracking_status->status) ? $dd->tracking_status->status : '';

                print_r($dd); 
				
               /*  $status_date = $dd->tracking_history[0]->status_date;
				
				$tracking_status_date = date("Y-m-d", strtotime($tracking_status_date));

				if($tracking_status_date>$order_create_date) */
                
             
          




?>
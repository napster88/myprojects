<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Get Order status Paytm
 *
 *///echo "4444444444444";exit;
include('wp-load.php');

?>

<?php

        global $wpdb;
	$querystr = "SELECT te_postmeta.meta_value,te_postmeta.post_id FROM te_postmeta WHERE meta_key = 'testimonials' and meta_value!='' order by post_id desc ";
	$pageposts = $wpdb->get_results($querystr);
        $mainarray =array();
        foreach($pageposts as $key=>$value){
            // echo "<pre>";print_r($value);echo "</pre>";
            $querystrpost = "SELECT te_posts.ID,te_posts.post_title FROM te_posts Inner Join te_postmeta on te_posts.ID=te_postmeta.post_id WHERE te_posts.ID='".$value->post_id."' limit 1";
            $pagepostsquery = $wpdb->get_results($querystrpost);
            
            if($pagepostsquery[0]->post_title!=''){
                //echo "====<pre>";print_r($value);exit;
                $unser=unserialize($value->meta_value);
               // $testid=explode(',',$unser);
               // echo "<pre>";print_r($unser);echo "</pre>";echo "<pre>";print_r($testid);echo "</pre>";exit;
                foreach($unser as $testvalue){echo "=====".$testvalue;//exit;
                    $getpostdata=get_post_meta($testvalue);
                    $getpost=get_post($testvalue);//echo "<pre>";print_r($getpost);echo "</pre>";
                    $mainarray[$testvalue]['coursename']=$pagepostsquery[0]->post_title;
                    $mainarray[$testvalue]['title']=$getpost->post_title;
                    $mainarray[$testvalue]['testimonial']=$getpostdata['testimonial'][0];
                    $mainarray[$testvalue]['designation']=$getpostdata['designation'][0];
                   // echo "<pre>";print_r($getpostdata);echo "</pre>";
                }
            }
        }
        echo "<pre>";print_r($mainarray);exit;
        ?>
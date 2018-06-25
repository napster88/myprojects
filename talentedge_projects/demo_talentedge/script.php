<?php 
echo "data";
ini_set('display_errors',1);
error_reporting(-1);
set_time_limit(0);
require_once('wp-load.php');
global $wpdb;
$insertquery="insert into te_webinar(user_id,post_id) values(".$_REQUEST['id'].",'13767')";
$data=$wpdb->query($insertquery);
echo "aaaa";exit;
print_r($_REQUEST);exit;

?>

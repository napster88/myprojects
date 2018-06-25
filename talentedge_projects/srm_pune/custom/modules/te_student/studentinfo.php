<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 

require_once('include/utils/file_utils.php');
require_once('include/upload_file.php');
require_once('include/utils.php');
require_once('include/utils/autoloader.php');

class StudentInfo{
	
	function checkimagesize($bean, $event, $argument){
		
		smarty_modifier_tmp_image_path('upload/a7f5a4a4-87c5-d6ed-271a-5adb54e815c0_upload_image.png');
	}
}

function smarty_modifier_tmp_image_path($relative_image_path)
{
    $mime_types = array(
        "image/png" => "png",
        "image/jpeg" => "jpg"
    );

    // get the actual image id stored in upload
    $filename = explode("/", $relative_image_path);
    $filename = $filename[count($filename)-1];

    // getting mime type
   // $mime_type = get_file_mime_type($relative_image_path);
    $ext = $mime_types['image/png'];

    $upload_path = $GLOBALS['sugar_config']['upload_dir'];
    // building tmp path with filename and extension
    $new_filename = "tmp/".$filename.".".$ext;
    $full_path = $upload_path.$new_filename;

	
    //checking if the file exist
    if (1) {
        $uploadFile = new UploadFile();
        $result = $uploadFile->duplicate_file($filename, $new_filename);
    }
echo $full_path;die;
    //returning the full path
    return $full_path;
}

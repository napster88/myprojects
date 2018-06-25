<?php


$dictionary['te_in_institutes']['fields']['file_mime_type'] = array(

  'name' => 'file_mime_type',

  'vname' => 'LBL_FILE_MIME_TYPE',

  'type' => 'varchar',

  'len' => '100',

  'importable' => false,

);

$dictionary['te_in_institutes']['fields']['file_url'] = array(

  'name'=>'file_url',

  'vname' => 'LBL_FILE_URL',

  'type'=>'function',

  'function_class'=>'UploadFile',

  'function_name'=>'get_upload_url',

  'function_params'=> array('$this'),

  'source'=>'function',

  'reportable'=>false,

  'importable' => false,

);

$dictionary['te_in_institutes']['fields']['logo_two'] = array(

  'name' => 'logo_two',

  'vname' => 'Logo 2',

  'type' => 'Image',

  'dbType' => 'varchar',

  'len' => '255',

  'reportable'=>true,

  'importable' => false,

);






 ?>

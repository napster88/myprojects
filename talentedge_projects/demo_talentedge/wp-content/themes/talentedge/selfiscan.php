<?php
$filterData =new stdClass();
 
$filterData->firstName='Vipul';
 
$filterData->lastName='Pande';
 
$filterData->loginid='vipul.sharma33@gmail.com';

$filterData->dob='1986-09-11';

$filterData->gender="Male";
$filterData->city="Jaipur";
$filterData->state="Rajasthan";
$filterData->country="India";
$filterData = json_encode($filterData);

//print_r($filterData);

$key = 'CbddmBz6lmP47467';
$secretKey = hex2bin(md5($key));
$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);

/* Open module and Create IV (Intialization Vector) */
$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
$blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
$plainPad = pkcs5_pad($filterData, $blockSize);
/* Initialize encryption handle */
if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1)
{
}

echo $key;
/* Encrypt data */
$encryptedText = mcrypt_generic($openMode, $plainPad);
     mcrypt_generic_deinit($openMode);
$filterData =   bin2hex($encryptedText);
$ch = curl_init();
$token="2eW5fbMNJQLTtMn";

$headers= array('Content-Type: application/json','Accept:
application/json;charset=utf-8','accessToken: '.$token);
curl_setopt($ch,
CURLOPT_URL,"http://mywheebox.com/wheeboxApi/registration/0017000?val=".$filterData)
;
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch,CURLOPT_HTTPHEADER,array('accessToken: '.$token.''));
$server_output = curl_exec ($ch);
curl_close ($ch);
//print_r($server_output);

$secretKey = hex2bin(md5($key));
$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
$encryptedText=hex2bin($server_output);

/* Open module, and create IV */
$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
mcrypt_generic_init($openMode, $secretKey, $initVector); 
$decryptedText = mdecrypt_generic($openMode, $encryptedText);
// Drop nulls from end of string $decryptedText = rtrim($decryptedText, "\0");
  // Returns "Decrypted string: some text here"
   mcrypt_generic_deinit($openMode);
  //print_r ($decryptedText);
?>

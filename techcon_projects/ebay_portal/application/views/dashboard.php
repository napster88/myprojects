
<?php 



//email info
$accessToken1 = 'ya29.GltnBFeu2ANflpPHubxkdP4tIOzDEblGkw4xCy0ILKis7OsknVm2m6BcrjAbXnlLMZ-086DumZpWkpYodRDJfcLGZIMuqNTfIg087TPSPjCg_vMfvy95FL12GiM-';
$userDetails1 = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $accessToken1);
$userData1 = json_decode($userDetails1);
print_r($userData1); 

//read only
$accessToken2 = 'ya29.GltnBNplCNdrvJ8_hZDdFaomujQ0v1hE4u_xFZoeXkKLwOqLQ8gVqoJRRcASCjm2L6sfTNBaVpveYktQnti8lZ3Wu2VCvsF1a_brYIkvCxAC0dVrFuTVPuJh7VjG';
$userDetails2 = file_get_contents('https://www.googleapis.com/auth/gmail.readonly');
$userData2 = json_decode($userDetails2);
print_r($userData2); 



 ?>
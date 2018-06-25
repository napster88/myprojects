<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "Home";

$route['bill/(:any)'] = "bill/index/$1";

$route['sitemap/index\.xml'] = "sitemap";
$route['404_override'] = '';
//$route['isqenivendor'] = 'login/index';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
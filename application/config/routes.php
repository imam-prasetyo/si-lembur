<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['api/data'] = "welcome/pagination";
$route['api/data/(:any)'] = "welcome/pagination/$1";
$route['api/data/(:any)/(:any)'] = "welcome/pagination/$1/$2";

$route['api/put/(:any)'] = "welcome/insert/$1";

$route['api/get/(:any)'] = "welcome/select/$1";
$route['api/get/(:any)/(:any)'] = "welcome/select/$1/$2";

$route['api/edit/(:any)'] = "welcome/update/$1";
$route['api/edit/(:any)/(:any)'] = "welcome/update/$1/$2";

$route['api/remove/(:any)'] = "welcome/delete/$1";
$route['api/remove/(:any)/(:any)'] = "welcome/delete/$1/$2";

// $route['api/html'] = "MainHtml/loadDataToHtml";
// $route['api/html/(:any)'] = "MainHtml/loadDataToHtml/$1";

$route['(:any)'] = "welcome/controlPage/$1";
$route['(:any)/(:any)'] = "welcome/welcome/$1/$2";



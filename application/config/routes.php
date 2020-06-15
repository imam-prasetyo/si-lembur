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
$route['default_controller'] = 'common';
$route['404_override'] = 'InvalidPage';
$route['translate_uri_dashes'] = FALSE;

/** Private Access */
$route['ctrl'] = "ctrl";
$route['ctrl/login'] = "ctrl/login";
$route['ctrl/logout'] = "ctrl/logout";

$route['ctrl/activity-log'] = "boxing/ActivityLog";
$route['ctrl/activity-log/(:any)'] = "boxing/ActivityLog/$1";
$route['ctrl/activity-log/(:any)/(:any)'] = "boxing/ActivityLog/$1/$2";

$route['ctrl/category'] = "boxing/Category";
$route['ctrl/category/(:any)'] = "boxing/Category/$1";
$route['ctrl/category/(:any)/(:any)'] = "boxing/Category/$1/$2";

$route['ctrl/change-password'] = "boxing/ChangePassword";
$route['ctrl/change-password/update-password'] = "boxing/ChangePassword/update_password";

$route['ctrl/configuration'] = "boxing/Configuration";
$route['ctrl/configuration/(:any)'] = "boxing/Configuration/$1";
$route['ctrl/configuration/(:any)/(:any)'] = "boxing/Configuration/$1/$2";

$route['ctrl/dashboard'] = "boxing/Dashboard";

$route['ctrl/entry'] = "boxing/Entry";
$route['ctrl/entry/(:any)'] = "boxing/Entry/$1";
$route['ctrl/entry/(:any)/(:any)'] = "boxing/Entry/$1/$2";

$route['ctrl/profile'] = "boxing/Profile";
$route['ctrl/profile/update-profile'] = "boxing/Profile/update_profile";

$route['ctrl/tag'] = "boxing/Tag";
$route['ctrl/tag/(:any)'] = "boxing/Tag/$1";
$route['ctrl/tag/(:any)/(:any)'] = "boxing/Tag/$1/$2";

$route['ctrl/user'] = "boxing/User";
$route['ctrl/user/(:any)'] = "boxing/User/$1";
$route['ctrl/user/(:any)/(:any)'] = "boxing/User/$1/$2";

/** Common */
$route['blog-post'] = "common/page/blog-post";
$route['blog-detail/(:any)'] = "common/page/blog-detail/$1";
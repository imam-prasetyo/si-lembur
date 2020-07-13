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
$route['default_controller'] = 'usrs';
$route['404_override'] = 'InvalidPage';
$route['translate_uri_dashes'] = FALSE;

/** Private Access */
$route['ctrl'] = "ctrl";
$route['ctrl/login'] = "ctrl/login";
$route['ctrl/logout'] = "ctrl/logout";

$route['ctrl/dashboard'] = "boxing/Dashboard";

$route['ctrl/activity-log'] = "boxing/ActivityLog";
$route['ctrl/activity-log/(:any)'] = "boxing/ActivityLog/$1";
$route['ctrl/activity-log/(:any)/(:any)'] = "boxing/ActivityLog/$1/$2";

$route['ctrl/change-password'] = "boxing/ChangePassword";
$route['ctrl/change-password/update-password'] = "boxing/ChangePassword/update_password";

$route['ctrl/configuration'] = "boxing/Configuration";
$route['ctrl/configuration/(:any)'] = "boxing/Configuration/$1";
$route['ctrl/configuration/(:any)/(:any)'] = "boxing/Configuration/$1/$2";

$route['ctrl/profile'] = "boxing/Profile";
$route['ctrl/profile/update-profile'] = "boxing/Profile/update_profile";

$route['ctrl/user'] = "boxing/User";
$route['ctrl/user/(:any)'] = "boxing/User/$1";
$route['ctrl/user/(:any)/(:any)'] = "boxing/User/$1/$2";

$route['ctrl/divisi'] = "boxing/Divisi";
$route['ctrl/divisi/(:any)'] = "boxing/Divisi/$1";
$route['ctrl/divisi/(:any)/(:any)'] = "boxing/Divisi/$1/$2";

$route['ctrl/unit'] = "boxing/Unit";
$route['ctrl/unit/(:any)'] = "boxing/Unit/$1";
$route['ctrl/unit/(:any)/(:any)'] = "boxing/Unit/$1/$2";

$route['ctrl/pegawai'] = "boxing/Pegawai";
$route['ctrl/pegawai/(:any)'] = "boxing/Pegawai/$1";
$route['ctrl/pegawai/(:any)/(:any)'] = "boxing/Pegawai/$1/$2";

$route['ctrl/jabatan'] = "boxing/Jabatan";
$route['ctrl/jabatan/(:any)'] = "boxing/Jabatan/$1";
$route['ctrl/jabatan/(:any)/(:any)'] = "boxing/Jabatan/$1/$2";

$route['ctrl/absensi-approval'] = "boxing/AbsensiApproval";
$route['ctrl/absensi-approval/(:any)'] = "boxing/AbsensiApproval/$1";
$route['ctrl/absensi-approval/(:any)/(:any)'] = "boxing/AbsensiApproval/$1/$2";

$route['ctrl/absensi-overtime'] = "boxing/AbsensiOvertime";
$route['ctrl/absensi-overtime/(:any)'] = "boxing/AbsensiOvertime/$1";
$route['ctrl/absensi-overtime/(:any)/(:any)'] = "boxing/AbsensiOvertime/$1/$2";

$route['ctrl/absensi-shift'] = "boxing/AbsensiShift";
$route['ctrl/absensi-shift/(:any)'] = "boxing/AbsensiShift/$1";
$route['ctrl/absensi-shift/(:any)/(:any)'] = "boxing/AbsensiShift/$1/$2";

$route['html'] = "boxing/JsonDataTable";
$route['html/load'] = "boxing/JsonDataTable/loadDataToHtml";
$route['html/load/(:any)'] = "boxing/JsonDataTable/loadDataToHtml/$1";

/** Private Access */
$route['usrs'] = "Usrs";
$route['usrs/login'] = "Usrs/login";
$route['usrs/logout'] = "Usrs/logout";

$route['usrs/dashboard'] = "pub/Dashboard";

$route['usrs/overtime'] = "pub/Overtime";
$route['usrs/overtime/(:any)'] = "pub/Overtime/$1";
$route['usrs/overtime/(:any)/(:any)'] = "pub/Overtime/$1/$2";

$route['usrs/overtime-history'] = "pub/OvertimeHistory";
$route['usrs/overtime-history/(:any)'] = "pub/OvertimeHistory/$1";
$route['usrs/overtime-history/(:any)/(:any)'] = "pub/OvertimeHistory/$1/$2";
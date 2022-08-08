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
$route['default_controller'] = 'CheckAuth/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'CheckAuth/Login';
$route['logout'] = 'CheckAuth/Logout';


$route['dashboard'] = 'Admin/Dashboard/index';
$route['classes'] = 'Admin/Classes/index';
$route['classes/section/(:any)'] = 'Admin/Classes/section/$1';

$route['classes/section-list/(:any)'] = 'Admin/Classes/sectionList/$1';


$route['students'] = 'Admin/Students/index';
$route['students/add'] = 'Admin/Students/add';
$route['students/detail/(:any)'] = 'Admin/Students/detail/$1';


$route['teachers'] = 'Admin/Teachers/index';
$route['teachers/add'] = 'Admin/Teachers/add';
$route['teachers/detail/(:any)'] = 'Admin/Teachers/detail/$1';


$route['schools'] = 'SuperAdmin/Schools/index';
$route['schools/add'] = 'SuperAdmin/Schools/add';
$route['schools/detail/(:any)'] = 'SuperAdmin/Schools/detail/$1';


$route['attendance/mark'] = 'Admin/Attendance/mark';
$route['attendance/detail'] = 'Admin/Attendance/attendance_detail';
$route['attendance/attendance_data'] = 'Admin/Attendance/attendance_data';
$route['attendance/mark/2'] = 'Admin/Attendance/mark/2';

$route['profile'] = 'Admin/Profile/index';
$route['profile/update'] = 'Admin/Profile/Update';



$route['schools/add'] = 'SuperAdmin/Schools/add';
$route['schools/detail/(:any)'] = 'SuperAdmin/Schools/detail/$1';



// Routes for Teachers

$route['section'] = 'Teachers/Sections/index';
$route['class-attendance'] = 'Teachers/Attendance/mark';

//notification
$route['notifications/add'] = 'Admin/Notfication/add';
$route['notifications/submit'] = 'Admin/Notfication/submit';
$route['notifications'] = 'Admin/Notfication/index';
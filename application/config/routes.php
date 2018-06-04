<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['api/users']['GET'] 			= 'Users/get_all';
$route['api/user/(:num)']['GET'] 	= 'Users/get_user/$1';
$route['api/register']['POST'] 		= 'Users/register';
$route['api/user/(:num)']['PUT'] 	= 'Users/update/$1';
$route['api/user/(:num)']['DELETE'] = 'Users/delete/$1';
$route['api/login'] 				= 'Users/login';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

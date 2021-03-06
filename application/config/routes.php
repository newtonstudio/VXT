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

$route['^(en|zh|cn)/vo'] = "vo";
$route['^(en|zh|cn)/vo/login'] = "vo_login";
$route['^(en|zh|cn)/vo/profile'] = "vo_profile"; 

//upload handle
$route['^(en|zh|cn)/vo/upload_handler'] = "vo_upload_handler"; 

//VO Default
$route['^(en|zh|cn)/vo/default/list'] = "vo_default/index";
$route['^(en|zh|cn)/vo/default/list/(:any)/(:any)'] = "vo_default/index/$2/$3";
$route['^(en|zh|cn)/vo/default/list/(:any)/(:any)/(:num)'] = "vo_default/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/default/add'] = "vo_default/add"; 
$route['^(en|zh|cn)/vo/default/edit/(:num)'] = "vo_default/edit/$2";
$route['^(en|zh|cn)/vo/default/Submit'] = "vo_default/Submit"; 
$route['^(en|zh|cn)/vo/default/delete/(:num)'] = "vo_default/delete/$2";

//VO Banner
$route['^(en|zh|cn)/vo/banner/list'] = "vo_banner/index";
$route['^(en|zh|cn)/vo/banner/list/(:any)/(:any)'] = "vo_banner/index/$2/$3";
$route['^(en|zh|cn)/vo/banner/list/(:any)/(:any)/(:num)'] = "vo_banner/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/banner/add'] = "vo_banner/add"; 
$route['^(en|zh|cn)/vo/banner/edit/(:num)'] = "vo_banner/edit/$2";
$route['^(en|zh|cn)/vo/banner/Submit'] = "vo_banner/Submit"; 
$route['^(en|zh|cn)/vo/banner/delete/(:num)'] = "vo_banner/delete/$2";

//VO Products
$route['^(en|zh|cn)/vo/products/list'] = "vo_products/index";
$route['^(en|zh|cn)/vo/products/list/(:any)/(:any)'] = "vo_products/index/$2/$3";
$route['^(en|zh|cn)/vo/products/list/(:any)/(:any)/(:num)'] = "vo_products/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/products/add'] = "vo_products/add"; 
$route['^(en|zh|cn)/vo/products/edit/(:num)'] = "vo_products/edit/$2";
$route['^(en|zh|cn)/vo/products/Submit'] = "vo_products/Submit"; 
$route['^(en|zh|cn)/vo/products/delete/(:num)'] = "vo_products/delete/$2";

//VO Settings
$route['^(en|zh|cn)/vo/settings/list'] = "vo_settings/index";
$route['^(en|zh|cn)/vo/settings/list/(:any)/(:any)'] = "vo_settings/index/$2/$3";
$route['^(en|zh|cn)/vo/settings/list/(:any)/(:any)/(:num)'] = "vo_settings/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/settings/add'] = "vo_settings/add"; 
$route['^(en|zh|cn)/vo/settings/edit/(:num)'] = "vo_settings/edit/$2";
$route['^(en|zh|cn)/vo/settings/Submit'] = "vo_settings/Submit"; 
$route['^(en|zh|cn)/vo/settings/delete/(:num)'] = "vo_settings/delete/$2";

//USers
$route['^(en|zh|cn)/vo/users/list'] = "vo_users/index";
$route['^(en|zh|cn)/vo/users/list/(:any)/(:any)'] = "vo_users/index/$2/$3";
$route['^(en|zh|cn)/vo/users/list/(:any)/(:any)/(:num)'] = "vo_users/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/users/add'] = "vo_users/add"; 
$route['^(en|zh|cn)/vo/users/edit/(:num)'] = "vo_users/edit/$2";
$route['^(en|zh|cn)/vo/users/Submit'] = "vo_users/Submit"; 
$route['^(en|zh|cn)/vo/users/delete/(:num)'] = "vo_users/delete/$2";

//Articles
$route['^(en|zh|cn)/vo/article/list'] = "vo_article/index";
$route['^(en|zh|cn)/vo/article/list/(:any)/(:any)'] = "vo_article/index/$2/$3";
$route['^(en|zh|cn)/vo/article/list/(:any)/(:any)/(:num)'] = "vo_article/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/article/add'] = "vo_article/add"; 
$route['^(en|zh|cn)/vo/article/edit/(:num)'] = "vo_article/edit/$2";
$route['^(en|zh|cn)/vo/article/Submit'] = "vo_article/Submit"; 
$route['^(en|zh|cn)/vo/article/delete/(:num)'] = "vo_article/delete/$2";

//VO Contact
$route['^(en|zh|cn)/vo/contact/list'] = "vo_contact/index";
$route['^(en|zh|cn)/vo/contact/list/(:any)/(:any)'] = "vo_contact/index/$2/$3";
$route['^(en|zh|cn)/vo/contact/list/(:any)/(:any)/(:num)'] = "vo_contact/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/contact/add'] = "vo_contact/add"; 
$route['^(en|zh|cn)/vo/contact/edit/(:num)'] = "vo_contact/edit/$2";
$route['^(en|zh|cn)/vo/contact/Submit'] = "vo_contact/Submit"; 
$route['^(en|zh|cn)/vo/contact/delete/(:num)'] = "vo_contact/delete/$2";


$route['^(en|zh|cn)/news'] = "welcome/news";
$route['^(en|zh|cn)/about'] = "welcome/about";

$route['^(en|zh|cn)/custom'] = "welcome/custom";
$route['^(en|zh|cn)/type'] = "welcome/custom_01type";
$route['^(en|zh|cn)/fitting'] = "welcome/custom_02fitting";
$route['^(en|zh|cn)/jacket-lapels'] = "welcome/custom_03jacketlapels";
$route['^(en|zh|cn)/vents'] = "welcome/custom_04vents";
$route['^(en|zh|cn)/suit-button'] = "welcome/custom_05suitbutton";
$route['^(en|zh|cn)/suit-pocket'] = "welcome/custom_06suitpocket";
$route['^(en|zh|cn)/fabric'] = "welcome/custom_07fabric";
$route['^(en|zh|cn)/suit-lining-front'] = "welcome/custom_08suitliningfront";
$route['^(en|zh|cn)/suit-lining'] = "welcome/custom_09suitlining";
$route['^(en|zh|cn)/suit-monogram'] = "welcome/custom_10suitmonogram";
$route['^(en|zh|cn)/measurement'] = "welcome/custom_11measurement";
$route['^(en|zh|cn)/shopping-bag'] = "welcome/custom_12shoppingbag";


$route['^(en|zh|cn)/shop'] = "welcome/shop";
$route['^(en|zh|cn)/shop_list'] = "welcome/shop_list";
$route['^(en|zh|cn)/services'] = "welcome/services";
$route['^(en|zh|cn)/event_list'] = "welcome/event_list";
$route['^(en|zh|cn)/event_detail/(:num)/(:any)'] = "welcome/event_detail/$2/$3";

$route['^(en|zh|cn)/product/(:num)/(:any)'] = "welcome/product/$2/$3";
$route['^(en|zh|cn)/product_detail/(:num)/(:any)'] = "welcome/product_detail/$2/$3";
$route['^(en|zh|cn)/solutions'] = "welcome/solutions";
$route['^(en|zh|cn)/support'] = "welcome/support";
$route['^(en|zh|cn)/contact'] = "welcome/contact";
$route['^(en|zh|cn)/login'] = "welcome/login";
$route['^(en|zh|cn)/register'] = "welcome/register";

$route['^(en|zh|cn)/terms'] = "welcome/terms";
$route['^(en|zh|cn)/privacy'] = "welcome/privacy";

$route['^(en|zh|cn)/api/register'] = "api_manage/register";
$route['^(en|zh|cn)/api/verifyemail/(:any)/(:num)'] = "api_manage/verifyemail/$2/$3";
$route['^(en|zh|cn)/api/logout/(:any)'] = "api_manage/logout/$2";
$route['^(en|zh|cn)/api/login'] = "api_manage/login";
$route['^(en|zh|cn)/api/checkLoginToken/(:any)'] = "api_manage/checkLoginToken/$2";
$route['^(en|zh|cn)/api/forgot_pass'] = "api_manage/forgot_pass";
$route['^(en|zh|cn)/api/reset_pass'] = "api_manage/reset_pass";
$route['^(en|zh|cn)/api/getUserdata/(:any)'] = "api_manage/getUserdata/$2";
$route['^(en|zh|cn)/api/getUserdata/(:any)/(:num)'] = "api_manage/getUserdata/$2/$3";
$route['^(en|zh|cn)/api/contact'] = "api_manage/contact";


$route['default_controller'] = 'welcome';

$route['^(en|zh|cn)$'] = $route['default_controller'];

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

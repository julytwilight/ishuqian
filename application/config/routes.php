<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'welcome';

# account
$route['signin'] = 'accounts/signin';
$route['signup'] = 'accounts/signup';
$route['login'] = 'accounts/login';
$route['register'] = 'accounts/register';
$route['logout'] = 'accounts/logout';


#从本地导入书签
$route['import'] = 'bookmarks/import';
$route['importHtml'] = 'bookmarks/importHtml';


#打开书签链接
$route['show/(:num)'] = 'bookmarks/show/$1';

#收藏书签
$route['like'] = 'bookmarks/like';

# 读取Link信息
$route['readlink'] = 'home/readlink';

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['users'] = 'users/index';
$route['users/(:any)'] = 'users/index/$1';
$route['users/update_user(:num)'] = 'users/update_user/$1';
// $route['users/(:any)'] = 'users/index/$1';

$route['articles'] = 'articles/index';
$route['new_article'] = 'articles/new_article';
$route['view_article/(:num)'] = 'articles/view_article/$1';
$route['article/download/(:any)'] = 'articles/download/$1';


$route['articleauthor/(:num)'] = 'articleauthor/index/$1';
$route['newauthor/(:num)'] = 'articleauthor/new/$1';
$route['article/assign_auth/(:num)'] = 'articleauthor/add/$1';
$route['articleauth/(:num)/author/delete/(:num)'] = 'articleauthor/delete/$1/$2';



$route['volumes'] = 'volumes/view';
$route['new_volume'] = 'volumes/new_vol';
$route['volumes/update_volume(:num)'] = 'volumes/update_vol/$1';
$route['volumes/view_volume/(:num)'] = 'volumes/view_volume/$1';

$route['authors'] = 'authors/view';
$route['authors/update_author(:num)'] = 'authors/update_authors/$1';


$route['default_controller'] = 'pages/public_home';
$route['view/article/(:num)'] = 'pages/public_article/$1';
$route['view/article_vol/(:num)'] = 'pages/volume_article/$1';
$route['view/public_article'] = 'pages/public_home';
// $route['articles'] = 'articles/view';
$route['pages/(:any)'] = 'pages/view/$1';



$route['404_override'] = '';
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/';
$route["jogjatour"] = "home";
$route["superuser"] = "dashboard";
$route["beranda"] = "dashboard";
$route["photo"] = "m_photo/index";
$route["promo"] = "m_promo/index";
$route["ojologino"] = "auth";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

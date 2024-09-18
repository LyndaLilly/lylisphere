<?php
session_start();

define('APP_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR); 
define('ROOT', 'blogify/');
define('SITE_TITLE', 'LyliSphere');

 $url = @explode('/', trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'))[1];
 $url = empty($url) ? '/' : $url; 

require_once 'core' . DS . 'helper.php'; 
require_once 'core' . DS . 'model'. DS .'DB.php'; 
require_once 'core'  . DS . 'Session.php';
require_once 'core'  . DS . 'Mailer.php';




require_once 'core' . DS . 'router.php';













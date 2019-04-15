<?php 

$hostname = 'localhost';
$dbusername = 'root';
$dbpassword = 'root';
$dbtable = 'b1901_wengdo';
$dbcharset = 'utf8';



// 配置路径 要用常量来配置 两种：
// 1  拉  加载  远程协议  http://
// pre($_SERVER['REQUEST_SCHEME']);  http
// pre($_SERVER['HTTP_HOST']);  域名
// $web = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];
// $web = rtrim($web,'/').'/';
define('_WEB_',rtrim($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'],'/').'/');

// CSS 
define('_CSS_',_WEB_.'css/');

// JS 
define('_JS_',_WEB_.'js/');

// img
define('_IMG_',_WEB_.'images/');

// echo _JS_;exit;







// 2  放  D://a/b/c







 ?>
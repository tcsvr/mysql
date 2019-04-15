<?php

header('content-type:text/html;charset=utf-8');

include('include/function.php');

include('include/config.php');



$con = mysql_connect('localhost','root','root')or die('连接失败');
mysql_set_charset('utf8');



mysql_select_db('b1901_wengdo')or die('选择失败');
$sql = "SELECT * FROM wd_nav WHERE n_isshow = 1";
$nav = getAll($sql);

$sql = "SELECT * FROM wd_banner WHERE b_isshow = 1";
$banner = getAll($sql);




?>
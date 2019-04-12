<?php 
header('content-type:text/html; charset=utf-8');

// 包含函数库，引入函数库
include('include/function.php');

// 连接数据库
$conn = mysql_connect('localhost','root','root')or die('链接失败！');
// 设置数据库编码
mysql_set_charset('utf8');
// 选择数据库
mysql_select_db('b1901_wengdo')or die('选择失败！');
// 操作数据库

// 导航
$sql = "SELECT * FROM wd_nav WHERE n_isshow=1";
$nav = getAll($sql);

//广告图
$sql = "SELECT * FROM wd_banner WHERE b_isshow=1";
$banner = getAll($sql);




// pre($banner);









include('view/index.html');

 ?>
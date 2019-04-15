<?php
include('include/init.php');


$sql = "SELECT * FROM wd_service ORDER BY s_id ASC";
$service = getAll($sql);

$sql = "SELECT * FROM wd_case_category";
$category = getAll($sql);

$caid = isset($_GET['caid']) ? $_GET['caid']:1;
//处理get 传参的问题
$caid = intval($caid);//确保是一个数字

$sql = "SELECT ca_id FROM wd_case_category WHERE ca_id = {$caid}";

$status =getOne($sql);
if(!$status){
//     //alert('页面缺少数据','index.php')
//     //PHP 的重定向 重新定义方向
    header('Location:index.php');
}
//处理 get 传参的问题
//案例列表
$sql = "SELECT `c_id`,`c_img`,`c_title` FROM wd_case WHERE ca_id={$caid} AND c_isshow=1 ORDER BY c_id DESC LIMIT 7";
$case  = getAll($sql);

// //关于我们
$sql = "SELECT * FROM wd_artcle WHERE a_id = 1";

$about = getOne($sql);
$about = $about['a_content'];
$about = preg_replace("/<[^<>]+>/",'',$about);

$sql = "SELECT * FROM wd_partner";
$partner = getAll($sql);

$sql = "SELECT *FROM wd_news ORDER BY n_id DESC LIMIT 4";
$news = getAll($sql);





// pre($about);











include('./view/index.html');
?>
<?php 

include('include/init.php');


// 服务项目
$sql = "SELECT * FROM wd_service ORDER BY s_id ASC";
$service = getAll($sql);


// 案例分类
$sql = "SELECT * FROM wd_case_category";
$category = getAll($sql);

// 获取案例分类ID
$caid = isset($_GET['caid']) ? $_GET['caid'] : 1;

// ====处理get传参的问题  开始=====
$caid = intval($caid);  //确保是一个数字

$sql = "SELECT ca_id FROM wd_case_category WHERE ca_id={$caid}";
$status = getOne($sql);

if(!$status){
	// alert('页面缺少数据','index.php');
	// PHP的重定向  重新定义方向
	header('Location:index.php');
}
// ====处理get传参的问题  结束=====

//案例列表
$sql = "SELECT `c_id`,`c_title`,`c_img` FROM wd_case WHERE ca_id={$caid} AND c_isshow=1 ORDER BY c_id DESC LIMIT 7";
$case = getAll($sql);




// 关于我们
$sql = "SELECT * FROM wd_article WHERE a_id=1";
$about = getOne($sql);
$about = $about['a_content'];
$about = preg_replace("/<[^<>]+>/", '', $about);
// 中文就用中文的字符串截取  substr();
// $about = mb_substr($about, 0, 78,'utf-8');



// pre($about);









include('view/index.html');

 ?>
<?php 
/**
 * 获取文件大小
 * @param $filename [string]
 * @return filesize [string]
 */
function getfilesize($filename){
	$fs = filesize($filename);
	if($fs>1024 && $fs<pow(1024,2)){
		return (floor(($fs/1024)*100)/100).' KB';
	}else if($fs>pow(1024,2) && $fs<pow(1024,3)){
		return (floor(($fs/pow(1024,2))*100)/100).' MB';
	}else if($fs>pow(1024,3) && $fs<pow(1024,4)){
		return (floor(($fs/pow(1024,3))*100)/100).' GB';
	}else{
		return $fs.' B';
	}
}
/**
 * 获取文件类型
 * @param $str [string]
 * @return fileextention [string]
 */
function getextention($str){
	$ext = substr(strrchr($str, '.'),1);
	switch($ext){
		case 'html': return 'html 文件';
		break;
		case 'css': return 'css 文件';
		break;
		case 'js': return 'js 文件';
		break;
		case 'txt': return 'txt 文件';
		break;
		case 'php': return 'php 文件';
		break;
		case 'jpg': return 'jpg 图片';
		break;
		case 'jpeg': return 'jpeg 图片';
		break;
		case 'png': return 'png 图片';
		break;
		case 'gif': return 'gif 图片';
		break;
		default : return '未知类型';
	}
}

/**
 * 数组打印测试工具
 * 
 */
function pre($con){
	echo '<pre>';
	print_r($con);
	echo '</pre>';
	exit;
}




// 封装一个PHP的弹窗（alert）
function alert($con,$url=''){
	echo "<script>";
	if($url){
		// 有url地址的
		echo "alert('{$con}');window.location.href='{$url}';";
	}else{
		// 没有url地址，我就让它跳转到上一页历史
		echo "alert('{$con}');window.history.go(-1);";
	}
	echo "</script>";
	exit;
}

/**
 * 数据库获取多条数据
 * @param $sql [string]
 * @return dataResult [array]
 * 
 */

function getAll($sql){
	$result = mysql_query($sql);

	$list = array();
	if($result && mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result)){
			$list[] = $row;
		}
		return $list;  //有数据的数组
	}else{
		return $list;  //空数组
	}
}


 ?>
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
 * 文件上传
 * 
 * 
 * 
 */
function upload($name,$size = 1048576,$extArr = array('jpg','jpeg','gif','png')){
	$error = $_FILES[$name]['error'];

	if($error!=0){
		if($error==4){
			alert('请选择上传的文件');
		}else{
			alert('上传失败，请重新上传');
		}
	}


	$filename = $_FILES[$name]['name'];
	$ext = substr(strrchr($filename, '.'),1);
	
	if(!in_array($ext,$extArr)){
		alert("您上传的文件类型错误，请上传jpg、jpeg、png、gif");
	}
	
	
	$fsize = $_FILES[$name]['size'];
	if($fsize>$size){
		alert("文件过大，不能超过2M");
	}
	
	$childPath = date('Y/m/d/',time());
	$path = 'uploads/'.$childPath;

	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	
	$fname = time().rand(10000,99999);

	$tmp = $_FILES[$name]['tmp_name'];
	
	$imgpath = $path.$fname.'.'.$ext;

	copy($tmp,$imgpath);
	return $imgpath;
}

 ?>
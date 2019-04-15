<?php

// header('content-type:text/html; charset=utf-8');
//封装一个php的弹窗
function alert($con,$url=''){
    echo "<script>";
    if($url){
        echo "alert('{$con}');window.location.href='{$url}';";
    }else{
        echo "alert('{$con}');window.history.go(-1);";
    }
    echo "</script>";
    exit;
}
//预格式浏览
function pre($con){
    echo '<pre>';
    print_r($con);
    echo '</pre>';
}

function h(){
    echo '<hr>';
}


function b(){
    echo '<br>';
}


function ct($v){
    $v = filectime($v);
    echo date('Y-m-d H:i:s',$v);
}


function mt($v){
    $v = filemtime($v);
    echo date('Y-m-d H:i:s',$v);
}




function nine($row=9,$col=9){
echo '<table border=1>';
        for($ro=1;$ro<=$row;$ro++){
            echo "<tr>";
            for($co=1;$co<=$col;$co++){
                $to=$ro*$co;
                $sum = $to;
                if($ro>=$co){
                    echo '<td>'.$ro.'*'.$co.'='.$sum.'</td>';
                }
                else{
                    echo "<td></td>";
                }         
            }
            echo "</tr>";  
        }
echo '</table>';

}

function star( $num = 11){
    for($a=1; $a<=$num; $a++){
    for($b=$num-1; $b>=$a; $b--){
        echo '&nbsp;';
    }
    for($i=1; $i<=$a*2-1; $i++){
        if($i%2==1){
            echo '*';
        }else{
            echo '&nbsp;';
        }
        // if($i>1 && $i<$a*2-1 && $i!=5 && $i!=10 && $i!=15){
        //     echo '&nbsp;';
        // }else{
        //     echo '*';
        // }
    }
    echo '<br>';
    }

}

function tg($a=3,$b=5){
	// 124678910 没有3 5
	for($i=1; $i<=10; $i++){
		/*if($i==3 || $i==5){
			continue;
		}*/
		if($i!=$a && $i!=$b){
			echo $i;
		}
	}
}

function sum ($max = 10){
$sum = 0;
$box = '';
for($i=1; $i<=$max; $i++){
	// 过程
	if($i<$max){
		// $box = $box . $i.'+';
		$box .= $i.'+';
	}else{
		$box .= $i.'=';
	}

	// 结果
	$sum = $sum+$i;
	// $sum += $i;
}

echo $box.$sum;

}

function comp($num1 = 10,$num2 = 11,$num3 = 12){
    if($num1>$num2){
        if($num1>$num3){
            echo $num1;
        }else{
            echo $num3;
        }
    }else {
        if($num2>$num3){
            echo $num2;
        }else{
            echo $num3;
        }
    }

}

function qqt($a=62,$b=5){
    for($i = 1; $i <= $a; $i++){
        if($i%$b==1){
            echo '<br>';
        }
        if($i<10){
            echo '<img src="images/0'.$i.'.gif" alt=""/>';
        }else{
            echo '<img src="images/'.$i.'.gif" alt=""/>';
        }
    }
    
}

function chess($ro=8,$co=8){
        echo '<table width="270px" cellspacing="0px" cellpadding="0px" border="1px">';
        for($row=1;$row<=$ro;$row++){
            echo "<tr>";
            for($col=1;$col<=$co;$col++){
                $to=$row+$col;
                if($to%2==0){
                    echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
                }
                else{
                    echo "<td height=30px width=30px bgcolor=#000000></td>";
                }
            }
            echo "</tr>";
        }
    echo '</table>';
}


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


function getextention($str){
	$ext = substr(strrchr($str, '.'),1);
	switch($ext){
		case 'html': return 'html 文件';
		break;
		case 'css': return 'css 文件';
		break;
		case 'js': return 'js 文件';
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
		case 'txt': return 'txt 文件';
		break;
		case 'doc': return 'word 文件';
		break;
		default : return '未知类型';
	}
}





function repay($a,$b){
    $a = 20000;
$b = 1000;

repay($a,$b);

    static $count = 1;
    $new = $a-$b;
    echo "我第{$count}个月还{$b}，还剩{$new}<br>";
    if($new>0){
        $count++;
        repay($new,$b);
    }else{
        exit;
    }
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




// function fload(){ 

// $fl = $_FILES[$name]['name'];
// $se = substr(strrchr($fl,'.'),'1');
// $set = array('png','gif','jpg','jpeg');
// if(!in_array($se,$set)){
//     alert('文件格式不正确，请使用 jpg png,gif,jpeg');
// }

// $size = 402400;
// $fz = $_FILES[$name]['size'];
// if($fz>$size){
//     alert("文件大小不能超过2M");
// }

// $er = $_FILES[$name]['error'];
// if($er!=0){
//     if($er==4){
//         alert('请选择上传文件');
//     }else{
//         alert('请重新上传文件');
//     }
// }
// echo $se;

// $tmp = $_FILES[$name]['tmp_name'];
// $fm = time().rand(10000,99999);
// $chid = date('Y/m/d/',time());
// $spth = 'images/'.$chid;
// if(!file_exists($spth)){
//     mkdir($spth,0777,true);
// }
// copy($tmp,$spth.$fm.'.'.$se);
// // $od = $tmp,$spth.$fm.'.'.$se;
// // return $od;

// }
function fload(){ 

$fl = $_FILES[$name]['name'];
$se = substr(strrchr($fl,'.'),'1');
$set = array('png','gif','jpg','jpeg');
if(!in_array($se,$set)){
    alert('文件格式不正确，请使用 jpg png,gif,jpeg');
}

$size = 402400;
$fz = $_FILES[$name]['size'];
if($fz>$size){
    alert("文件大小不能超过2M");
}

$er = $_FILES[$name]['error'];
if($er!=0){
    if($er==4){
        alert('请选择上传文件');
    }else{
        alert('请重新上传文件');
    }
}
echo $se;

$tmp = $_FILES[$name]['tmp_name'];
$fm = time().rand(10000,99999);
$chid = date('Y/m/d/',time());
$spth = 'images/'.$chid;
if(!file_exists($spth)){
    mkdir($spth,0777,true);
}
copy($tmp,$spth.$fm.'.'.$se);
// $od = $tmp,$spth.$fm.'.'.$se;
// return $od;

}
/**
 *数据库获取多条数据
 *@param $sql {$string} 
 *@return $list{array}
 */

function getAll($sql){
    $result = mysql_query($sql);
    $list = array();
    if($result && mysql_num_rows($result)>0){
        while($row = mysql_fetch_assoc($result)){
            $list[] = $row;
        }return $list;//有数据的数组
    }else{
        return $list;//空数组
    }
}

/**
 *数据库获取单条数据
 *@param $sql {$string} 
 *@return $list{array}
 */

 
function getOne($sql){
    $result = mysql_query($sql);

    if($result && mysql_num_rows($result)>0){
        return mysql_fetch_assoc($result);//有数据的数组
    }else{
        return array();//空数组
    }
}


















?>
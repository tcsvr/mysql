<?php 
header('content-type:text/html; charset=utf-8');

include('../include/function.php');
$conn = mysql_connect('localhost','root','root')or die('连接失败！');
mysql_set_charset('utf8');
mysql_select_db('leaveword')or die('选择失败！');
$sql = "SELECT * FROM lword ORDER BY l_id ASC";
// var_dump($result);
if($_POST){
	// 写的代码是提交后才执行的
	// 1  先验证数据的真实性（暂时只能验证是否为空，和长度）
	if(!isset($_POST['username']) || empty($_POST['username'])){
		alert('请填写用户名');
	}
	if(!isset($_POST['content']) || empty($_POST['content'])){
		alert('请填写留言');
	}

	// 2  提交后我才获取数据
	$username = trim($_POST['username']);
	$content = $_POST['content'];
	$img = upload('upload');
	$time = time();  //时间戳
	// $info = $username.'||'.$content.'||'.$img.'||'.$time."\r\n";
    $sql = "INSERT INTO lword
    (`l_src`,`l_h`,`lytime`,`lytxt`)
    VALUES ('$img','$username','$time','$content')";
    $result = mysql_query($sql); 
    $status = mysql_affected_rows();
	// 3  如果是注册的话，接下来就是把数据存到数据库
	// $filename = "data.txt"; //当作数据库

    // $fh = fopen($filename, 'a');  //打开
    
	// $status = fwrite($fh, $info); //写文件
	// fclose($fh); //关闭资源
	if($status){
		alert('添加成功','http://localhost/2019-04-10MYSQL/task.php');
	}else{
		alert('添加失败！！！');
	}
    
}
$result = mysql_query($sql); 
$emp = array();
if($result && mysql_num_rows($result)>0){  //先判断数据库里有没有数据
	// 有数据才执行下面的遍历数据
	while($row = mysql_fetch_assoc($result)){
		$emp[] = $row;
	}
}
// pre($emp);



include('view/index.html');  //视图 模板  静态页面

 ?>

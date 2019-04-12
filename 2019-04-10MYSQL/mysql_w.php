<?php 
header('content-type:text/html; charset=utf-8');

// php信息
// phpinfo();exit;

// 连接数据库 mysql_connect('主机名','用户名','密码')
$conn = mysql_connect('localhost','root','root')or die('连接失败！');

// 判断数据库是否连接成功 方式一
/*if(!$conn){
	echo '连接失败！';
}*/

// 连接数据库后就要设置数据库的编码 utf8
mysql_set_charset('utf8');

// 选择数据库
mysql_select_db('b1901_emp')or die('选择失败！');

// 操作数据库
// 先写你需要操作的SQL语句
$sql = "SELECT * FROM emp ORDER BY e_id ASC";

// 执行SQL语句
$result = mysql_query($sql);  //执行SQL语句 

//如果是查询的返回结果集，如果是增 删 改 返回的是布尔类型 
// var_dump($result);

// 从结果集里面获取数据
// $arr = mysql_fetch_row($result); //返回一条记录的索引数组
// $arr = mysql_fetch_array($result); //返回一条记录的两种方式数组
// $arr = mysql_fetch_assoc($result);  //返回一条记录的关联数组

// echo mysql_num_rows($result);  //查询执行了多少次

$emp = array();

if($result && mysql_num_rows($result)>0){  //先判断数据库里有没有数据
	// 有数据才执行下面的遍历数据
	while($row = mysql_fetch_assoc($result)){
		$emp[] = $row;
	}
}

// mysql_free_result($result); //释放结果


// echo '<pre>';
// print_r($emp);
// echo '</pre>';
// 添加
// $sql = "INSERT INTO emp 
// 		(`e_name`,`e_sex`,`e_age`,`b_id`) 
// 		VALUES 
// 		('test','1','234','3')";

// $bool = mysql_query($sql);

// var_dump($bool);

// echo "<br>添加的ID ".mysql_insert_id(); //添加后的ID
// echo "<br>影响的行数 ".mysql_affected_rows(); //影响的次数



// 修改
// $sql = "UPDATE emp SET e_name='a' WHERE e_id>17";
// $bool = mysql_query($sql);
// var_dump($bool);

// echo "<br>影响的行数 ".mysql_affected_rows(); //影响的次数


// 删除
// $sql = "DELETE FROM emp WHERE e_id>17";
// $bool = mysql_query($sql);
// var_dump($bool);

// echo "<br>影响的行数 ".mysql_affected_rows(); //影响的次数



/*
总结：
链接数据库
$conn = mysql_connect('主机名','用户名','密码')or die('链接失败');
判断数据库是否连接成功
if(!$conn){
	echo '链接失败';
}
连接数据库后就要设置数据库的编码
mysql_set_charset('utf8')
选择数据库
mysql_select_db('database_name')
操作数据库
	查
	存SQL语句
	获取数据的方式 3 种
	返回一条记录的索引数组
	mysql_fetch_row(query结果);
	返回一条记录的关联数组 （*常用*）
	mysql_fetch_assoc(result)
	返回一条记录的两种方式数组
	mysql_fetch_array(result)
	增
	修
	删
	执行SQL语句
	mysql_query();
	查询的次数
	mysql_num_rows();
	影响的次数
	mysql_affected_rows();
	释放结果
	mysql_free_result(result)

关闭数据库
mysql_close(链接数据库的资源);

*/










// 关闭数据库
mysql_close($conn);






// exit;


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>员工表</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>年龄</th>
			<th>性别</th>
			<th>部门</th>
		</tr>
		<?php foreach($emp as $v){ ?>
		<tr>
			<td><?php echo $v['e_id'] ?></td>
			<td><?php echo $v['e_name'] ?></td>
			<td><?php echo $v['e_age'] ?></td>
			<td><?php echo $v['e_sex'] ?></td>
			<td><?php echo $v['b_id'] ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
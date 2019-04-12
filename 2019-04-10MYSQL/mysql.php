<?php
header('content-type:text/html;charset=utf-8');
include('../include/function.php');
$son = mysql_connect('localhost','root','root')or die('连接失败');
mysql_set_charset('utf8');
// if(!$son){
//     echo '连接失败';
// }
mysql_select_db('b1901_emp')or die('选择失败');
$sql = "SELECT * FROM emp ORDER BY e_id ASC";
$result = mysql_query($sql);//立即执行
// var_dump($result);
// $arr = mysql_fetch_row($result);
// $arr = mysql_fetch_array($result);
// $arr = mysql_fetch_assoc($result);
// echo mysql_num_rows($result);exit;
$emp = array();
if($result && mysql_num_rows($result)>0){
    while($sro = mysql_fetch_assoc($result)){
        $emp[]=$sro;
    }
}
// pre($emp);
// $sql = "INSERT INTO emp (`e_name`,`e_sex`,`e_age`,`b_id`)
// VALUES('沃得','0','22','2')";
// $bool = mysql_query($sql);
// var_dump($bool);
// echo "<br>添加的ID".mysql_insert_id();
// echo "<br>影响的行数".mysql_affected_rows();
$sql = "UPDATE emp SET e_name='灵玉' WHERE e_id>3";
$bool = mysql_query($sql);
var_dump($bool);
echo "<br>影响的行数".mysql_affected_rows();
// echo "<br>影响的行数".mysql_affected_rows()";
mysql_close();
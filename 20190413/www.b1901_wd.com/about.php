<?php 

include('include/init.php');

$sql = "SELECT * FROM wd_article WHERE a_id=1";
$about = getOne($sql);








include('view/about.html');

 ?>
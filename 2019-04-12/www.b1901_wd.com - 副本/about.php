<?php
include('include/init.php');
$sql = "SELECT * FROM wd_artcle WHERE a_id=1";
$about = getOne($sql);













include('./view/about.html');
?>
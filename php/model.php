<?php
require 'session.php';

if(!$add_limit){
	header('location:Nopermission.php');

}else{
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");

设置数据库查询编码
mysql_query("SET NAMES 'utf8'");






@mysql_close();

?>


<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">

<button type="button" name="button1" onclick="return confirm('确认删除？')">删除</button>

页面间get方法传值
<a href="editpage.php?id=<?php echo $xh ?>" target="_blank"><button type="submit" name="button0">编辑</button></a>
$xh=$_GET['id'];

申请 添加删除操作 超级管理员 1


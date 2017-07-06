<?php
require 'session.php';

if(!$add_limit){
	header('location:Nopermission.php');

}else{
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");

设置数据库查询编码
mysql_query("SET NAMES 'utf8'");
$query0="select id_grand from tb_grand where grandname='$pp'";


if(!isset($_POST['button0'])){
$pp = $_POST['pp'];


@mysql_close();

$result0=mysql_query($query0)
or die ("0查询失败");
$role = mysql_fetch_assoc($result0)['role'];
?>


<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">

<button type="button" name="button1" onclick="return confirm('确认删除？')">删除</button>

页面间get方法传值
<a href="editpage.php?id=<?php echo $xh ?>" target="_blank"><button type="submit" name="button0">编辑</button></a>
$xh=$_GET['id'];

申请 添加删除操作 超级管理员 1

//循环取checkbox值 注意name="xx[]"
<input type="checkbox" name="box[]" value="1" />
<input type="checkbox" name="box[]" value="2" />
@$array = $_POST['box'];   
// print_r($array);
// echo count($array);
for($i=0;$i<count($array);$i++){
	echo $array[$i];
} 
//



<?php
require 'session.php';
if(!$adduser_limit){
	header('location:Nopermission.php');

}else{
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");
mysql_query("SET NAMES 'utf8'");

$query='SELECT role '.'FROM tb_limit';
$result=mysql_query($query)
or die('查询失败');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
	input{


	}
	</style>
</head>
<body>
<h1>添加账户：</h1>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
用 户：<input type="text" name="user" /><br><br>
密 码：<input type="text" name="pw" /><br><br>
姓 名：<input type="text" name="mz" /><br><br>
电 话：<input type="text" name="phone" maxlength="11" /><br><br>
角 色：<select name="role">
<?php
while($row = mysql_fetch_row($result)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select><br><br>
<input type="submit" name="sub" value="提交" />
</html>
<?php
}
// 插入数据库

@mysql_close();

?>
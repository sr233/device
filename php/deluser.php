<?php
require 'session.php';
if(!$deluser_limit){
	header('location:Nopermission.php');
}else{
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");
mysql_query("SET NAMES 'utf8'");

$query1= <<<SQL
	SELECT id_user 
	FROM tb_admin order by id_user asc;
SQL;
$result1=mysql_query($query1)
or die ("1查询失败");

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<style>
	div{
		display:block;
		float:left;
		padding:10px;
		font-weight: bold;
	}
	body{
		overflow:scroll; 
		padding: 5px;
	}
	.tab{
		text-align: center;
		white-space: nowrap; 
		border-radius: 5px;
		table-layout: fixed;
		width: 1210px;
	}
	</style>
</head>
<body>

<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">

<div>请选择要删除账户的序号:&nbsp;</div>
<div>
<select name="xh">
<?php
while($row = mysql_fetch_row($result1)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div>
<button type="submit" name="button" id=""><b>提交</b></button>
</div>

<?php
/*点击提交，显示对应序号的设备信息*/
if(isset($_POST['button'])){
	$xh = $_POST['xh'];
$query2= <<<SQL
	SELECT id_user,user,name,phone,add_limit,del_limit,port_limit,function_limit,adduser_limit,deluser_limit,limit_limit,dyb_limit,message_limit
	FROM tb_admin,tb_limit
	WHERE tb_admin.id_user='$xh'
	and tb_admin.id_limit=tb_limit.id_limit;

SQL;
$result2=mysql_query($query2)
or die ("2查询失败");

?>

<table border="1" class="tab" cellspacing="0" cellpadding="0">
<tr><td width="60px">序 号</td><td width="100px">用户名</td><td width="80px">姓名</td><td width="120px">电话</td><td width="80px">添加设备</td><td width="80px">删除设备</td><td width="80">修改端口</td><td width="80px">修改功用</td><td width="80px">添加账户</td><td width="80px">删除账户</td><td width="80px">修改权限</td><td width="60px">对应表</td><td width="80px">查看消息</td>
<?php

while($row = mysql_fetch_assoc($result2)){
	echo <<<TR
	<tr><td>{$row['id_user']}</td>
		<td>{$row['user']}</td>
		<td>{$row['name']}</td>
		<td>{$row['phone']}</td>
		<td>{$row['add_limit']}</td>
		<td>{$row['del_limit']}</td>
		<td>{$row['port_limit']}</td>
		<td>{$row['function_limit']}</td>
		<td>{$row['adduser_limit']}</td>
		<td>{$row['del_limit']}</td>
		<td>{$row['limit_limit']}</td>
		<td>{$row['dyb_limit']}</td>
		<td>{$row['message_limit']}</td>
	</tr>

TR;
}
}
?>
</table>
</body>
</html>


<?php

/*点击删除，执行数据库操作*/






@mysql_close();

?>
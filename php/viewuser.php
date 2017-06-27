<?php
require 'session.php';
require 'dbcon.php';

header("Content-Type: text/html; charset=UTF-8");
mysql_query("SET NAMES 'utf8'");
if(!$adduser_limit&&!$deluser_limit&&!$limit_limit){
	header('location:Nopermission.php');
}else{
$query= <<<SQL
	SELECT id_user,user,name,phone,role,add_limit,del_limit,port_limit,function_limit,adduser_limit,deluser_limit,limit_limit,dyb_limit,message_limit 
	FROM tb_admin,tb_limit
	WHERE tb_admin.id_limit=tb_limit.id_limit
	ORDER BY user;
SQL;

$result=mysql_query($query)
or die ("查询失败");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
	body{
		overflow:scroll; 
		padding: 5px;
		font-size: 15px;
	}
	.tab{
		text-align: center;
		white-space: nowrap; 
		border-radius: 5px;
		table-layout: fixed;
		/*width: 1210px;*/
	}

	table tr:nth-child(odd){background:#BFEFFF;}
	table tr:nth-child(5){background:#73B1E0;color:#FFF;}

	</style>
</head>
<body>
<table border="1" class="tab" cellspacing="0" cellpadding="0">
<tr><td width="40px">序 号</td><td width="100px">用户名</td><td width="80px">姓名</td><td width="120px">电话</td><td width="100px">角 色</td><td width="80px">添加设备</td><td width="80px">删除设备</td><td width="80">修改端口</td><td width="80px">修改功用</td><td width="80px">添加账户</td><td width="80px">删除账户</td><td width="80px">修改权限</td><td width="60px">对应表</td><td width="80px">查看消息</td>
<?php
$n=1;
while($row = mysql_fetch_assoc($result)){

?>
<tr><td><?php echo $n;$n=$n+1; ?></td>
<?php
	echo <<<TD
		<td>{$row['user']}</td>
		<td>{$row['name']}</td>
		<td>{$row['phone']}</td>
		<td>{$row['role']}</td>
		<td>{$row['add_limit']}</td>
		<td>{$row['del_limit']}</td>
		<td>{$row['port_limit']}</td>
		<td>{$row['function_limit']}</td>
		<td>{$row['adduser_limit']}</td>
		<td>{$row['del_limit']}</td>
		<td>{$row['limit_limit']}</td>
		<td>{$row['dyb_limit']}</td>
		<td>{$row['message_limit']}</td>

TD;
}
}
@mysql_close();
?>
</tr>
</table>
</body>
</html>



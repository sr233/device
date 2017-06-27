<?php
require 'session.php';
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");
mysql_query("SET NAMES 'utf8'");

$xh=$_GET['id'];
$query0= <<<SQL
	SELECT tb_device.id_device,tb_grand.grandname,tb_model.modelname,tb_kinds.kinds,function,domain,ip,openports,tb_config.port,tb_config.cpu_num,tb_config.cpu_core,tb_config.ram,tb_config.store,tb_config.netcard,tb_config.hba,tb_location.location,tb_location.louclie,tb_danwei.danwei,tb_admin.name,tb_status.status,date
	FROM tb_device,tb_grand,tb_model,tb_kinds,tb_config,tb_location,tb_danwei,tb_admin,tb_status
	WHERE tb_device.id_device='$xh'
	and tb_grand.id_grand=tb_device.id_grand
	and tb_model.id_model=tb_device.id_model
	and tb_kinds.id_kinds=tb_device.id_kinds
	and tb_status.id_status=tb_device.id_status
	and tb_location.id_location=tb_device.id_location
	and tb_danwei.id_danwei=tb_device.id_danwei
	and tb_admin.id_user=tb_device.id_user
	and tb_config.id_config=tb_device.id_config;
SQL;
$result0=mysql_query($query0)
or die ("0查询失败");

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
	button{
		margin-right: 20px;
	}
	table tr td{
		text-align: center;
		white-space: nowrap; 
		border-radius: 5px;
		table-layout: fixed;

		border: 1px solid black;

	}
	table{
		margin-bottom: 20px;
		border-collapse: collapse;
	}
	form{
		float:left;
	}
	table tr:nth-child(odd){background:#BFEFFF;}
	table tr:nth-child(5){background:#73B1E0;color:#FFF;}
	</style>
</head>
<body>
<?php

while($row = mysql_fetch_assoc($result0)){

?>
<table>
<tr><td width="70px">序 号</td><td width="120px">品 牌</td><td width="120px">型 号</td><td width="90px">类 型</td><td width="160px">功 用</td></tr>
<?php
echo <<<TR
<tr><td>{$row['id_device']}</td>
	<td>{$row['grandname']}</td>
	<td>{$row['modelname']}</td>
	<td>{$row['kinds']}</td>
	<td>{$row['function']}</td>
TR;
?>
</table>
<table>
<tr><td width="140px">域 名</td><td width="140">ip</td><td width="120px">开放端口</td><td width="80px">物理端口</td><td width="80px">cpu颗数</td></tr>
<?php
echo <<<TR
<tr><td>{$row['domain']}</td>
	<td>{$row['ip']}</td>
	<td>{$row['openports']}</td>
	<td>{$row['port']}</td>
	<td>{$row['cpu_num']}</td>
TR;
?>
</table>
<table>
<tr><td width="100px">cpu核心</td><td width="120px">内 存(G)</td><td width="120px">存 储(G)</td><td width="110px">网卡数</td><td width="110px">hba卡</td></tr>
<?php
echo <<<TR
<tr><td>{$row['cpu_core']}</td>
	<td>{$row['ram']}</td>
	<td>{$row['store']}</td>
	<td>{$row['netcard']}</td>
	<td>{$row['hba']}</td>
TR;
?>
</table>

<table>
<tr><td width="160px">楼 宇&nbsp;&nbsp;&nbsp;&nbsp;层/列</td><td width="120px">所属单位</td><td width="100px">使用者</td><td width="80px">状 态</td><td width="100px">上架日期</td></tr>
<?php
echo <<<TR
	<td>{$row['location']}&nbsp;&nbsp;&nbsp;{$row['louclie']}</td>
	<td>{$row['danwei']}</td>
	<td>{$row['name']}</td>
	<td>{$row['status']}</td>
	<td>{$row['date']}</td>
TR;
}
?>
</table>

<form action="editpage.php?id=<?php echo $xh; ?>" method="post">
<?php
if(!$port_limit&&!$function_limit){
}
else{
?>
<a href="editpage.php?id=<?php echo $xh; ?>" ><button type="submit" name="button0">编辑</button></a></form>
<?php
}
if(!$del_limit){	
}
else{
?>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
<button type="button" name="button1" onclick="return confirm('确认删除？')">删除</button>
</form>
<?php
}
?>

<?php
if(isset($_POST['button1'])){
// 确认删除，执行操作

}
?>
</body>
</html>
<?php
	
 // echo   $_GET['id'];
@mysql_close();
?>
<?php
require 'session.php';
if(!$ap_limit){
	header('location:Nopermission.php');

}else{
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");
mysql_query("SET NAMES 'utf8'");

$query1= <<<SQL
	SELECT id_device
	FROM tb_device;
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

<div class="jiacu">请选择要申请的设备序号:&nbsp;</div>
<div class="jiacu">
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
$result2=mysql_query($query2)
or die ("2查询失败");

?>

<table border="1" class="tab" cellspacing="0" cellpadding="0">
<tr><td width="60px">序 号</td><td width="100px">品 牌</td><td width="100px">型 号</td><td width="80px">类 型</td><td width="150px">功 用</td><td width="140px">域 名</td><td width="140">ip</td><td width="120px">开放端口</td><td width="80px">物理端口</td><td width="80px">cpu颗数</td><td width="80px">cpu核心</td><td width="100px">内 存(G)</td><td width="120px">存 储(G)</td><td width="60px">网卡数</td><td width="60px">hba卡</td><td width="140px">楼 宇&nbsp;&nbsp;&nbsp;&nbsp;层/列</td><td width="120px">所属单位</td><td width="100px">使用者</td><td width="80px">状 态</td><td width="100px">上架日期</td></tr>
<?php

while($row = mysql_fetch_assoc($result2)){
	echo <<<TR
	<tr><td>{$row['id_device']}</td>
		<td>{$row['grandname']}</td>
		<td>{$row['modelname']}</td>
		<td>{$row['kinds']}</td>
		<td>{$row['function']}</td>
		<td>{$row['domain']}</td>
		<td>{$row['ip']}</td>
		<td>{$row['openports']}</td>
		<td>{$row['port']}</td>
		<td>{$row['cpu_num']}</td>
		<td>{$row['cpu_core']}</td>
		<td>{$row['ram']}</td>
		<td>{$row['store']}</td>
		<td>{$row['netcard']}</td>
		<td>{$row['hba']}</td>
		<td>{$row['location']}&nbsp;&nbsp;&nbsp;{$row['louclie']}</td>
		<td>{$row['danwei']}</td>
		<td>{$row['name']}</td>
		<td>{$row['status']}</td>
		<td>{$row['date']}</td>

	</tr>

TR;
}

?>
</table>
<div>
<button type="submit" name="button0" id=""><b>申请</b></button>
</div>


<?php
}
?>
</body></html>

<?php

/*点击申请，执行数据库操作*/






@mysql_close();

?>


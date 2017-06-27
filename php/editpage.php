<?php
require 'session.php';
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");
mysql_query("SET NAMES 'utf8'");
if(isset($_POST['button0'])){
if(!$port_limit&&!$function_limit){
	header('location:Nopermission.php');
}else{
$xh=$_GET['id'];
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
	input{
		border-width: 0px;
		padding:0px;
	}

	table tr:nth-child(odd){background:#BFEFFF;}
	table tr:nth-child(5){background:#73B1E0;color:#FFF;}

	</style>
</head>
<body>

<?php

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
$queryuser= <<<SQL
	SELECT  name
	FROM tb_admin;
SQL;
$resultuser=mysql_query($queryuser)
or die ("14查询失败");
$queryzt= <<<SQL
	SELECT  status
	FROM tb_status;
SQL;
$resultzt=mysql_query($queryzt)
or die ("15查询失败");
$query0= <<<SQL
	SELECT role 
	FROM tb_limit,tb_admin
	WHERE tb_admin.user='$user'
	and tb_admin.id_limit=tb_limit.id_limit;
SQL;
$result0=mysql_query($query0)
or die ("0查询失败");
$role = mysql_fetch_assoc($result0)['role'];
?>

<?php

while($row = mysql_fetch_assoc($result2)){
	// echo <<<TR
?>
<table>
<tr><td width="70px">序 号</td><td width="120px">品 牌</td><td width="120px">型 号</td><td width="90px">类 型</td><td width="160px" bgcolor="<?php if($function_limit){ echo '33ff99';} ?>" >功 用</td></tr>
<tr>
<td><?php echo $row['id_device'] ?></td>
	<td><?php echo $row['grandname'] ?></td>
	<td><?php echo $row['modelname'] ?></td>
	<td><?php echo $row['kinds'] ?></td>
	<td><?php if($function_limit){ ?><input type="text" style="width:150px;" value="<?php echo $row['function'] ?>"<?php }else{echo $row['function'];} ?></td>
</tr>
</table>

<table>
<tr><td width="140px" bgcolor="<?php if($role=='superadmin'){ echo '33ff99';} ?>">域 名</td><td width="140" bgcolor="<?php if($role=='superadmin'){ echo '33ff99';} ?>">ip</td><td width="120px" bgcolor="<?php if($port_limit){ echo '33ff99';} ?>" >开放端口</td><td width="80px">物理端口</td><td width="80px">cpu颗数</td></tr>
<tr>
<td><?php if($role=="superadmin"){ ?><input type="text" style="width:140px;" value="<?php echo $row['domain'] ?>"<?php }else{echo $row['domain'];} ?></td>
<td><?php if($role=="superadmin"){ ?><input type="text" style="width:140px;" value="<?php echo $row['ip'] ?>"<?php }else{echo $row['ip'];} ?></td>
<td><?php if($port_limit){ ?><input type="text" style="width:120px;" value="<?php echo $row['openports'] ?>"<?php }else{ echo $row['openports'];} ?></td>
<td><?php echo $row['port'] ?></td>
<td><?php echo $row['cpu_num'] ?></td>
</td>
</table>

<table>
<tr><td width="100px">cpu核心</td><td width="120px">内 存(G)</td><td width="120px">存 储(G)</td><td width="110px">网卡数</td><td width="110px">hba卡</td></tr>
<tr>
<td><?php echo $row['cpu_core'] ?></td>
<td><?php echo $row['ram'] ?></td>
<td><?php echo $row['store'] ?></td>
<td><?php echo $row['netcard'] ?></td>
<td><?php echo $row['hba'] ?></td>
</tr>
</table>

<table>
<tr><td width="160px">楼 宇&nbsp;&nbsp;&nbsp;&nbsp;层/列</td><td width="120px">所属单位</td><td width="100px" bgcolor="<?php if($role=='superadmin'){ echo '33ff99';} ?>">使用者</td><td width="80px" bgcolor="<?php if($role=='superadmin'){ echo '33ff99';} ?>">状 态</td><td width="100px">上架日期</td></tr>
<tr>
<td><?php echo $row['location'] ?>&nbsp;&nbsp;&nbsp;<?php echo $row['louclie'] ?></td>
<td><?php echo $row['danwei'] ?></td>

<td><?php if($role!="superadmin"){echo $row['name'];}else{ ?><select name="user"><?php while($rowu = mysql_fetch_row($resultuser)){ ?><option <?php if($rowu[0]==$row['name']){echo 'selected';}  ?>><?php echo $rowu[0];}} ?></option></select></td>
<td><?php if($role!="superadmin"){echo $row['status'];}else{ ?><select name="zt"><?php while($rowzt = mysql_fetch_row($resultzt)){ ?><option <?php if($rowzt[0]==$row['status']){echo 'selected';}  ?>><?php echo $rowzt[0];}} ?></option></select></td>
<td><?php echo $row['date'] ?></td>
</tr>
</table>


<?php
}
}
?>
</table>
<div>
<button type="submit" name="button0" id=""><b>确定修改</b></button>
</div>
</form>
</body></html>

<?php

/*点击添加，执行数据库操作*/






}

@mysql_close();
?>
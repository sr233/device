<?php
require 'session.php';
if(!$del_limit){
	header('location:Nopermission.php');
}else{
	require 'dbcon.php';

	header("Content-Type: text/html; charset=UTF-8");
	mysql_query("SET NAMES 'utf8'");

	$query= <<<SQL
		SELECT id_device,tb_grand.grandname,tb_model.modelname,tb_kinds.kinds,function,domain,ip,openports,tb_config.port,tb_config.cpu_num,tb_config.cpu_core,tb_config.ram,tb_config.store,tb_config.netcard,tb_config.hba,tb_location.location,tb_location.louclie,tb_danwei.danwei,tb_admin.name,tb_status.status,date 
		FROM tb_device,tb_grand,tb_model,tb_kinds,tb_config,tb_location,tb_danwei,tb_admin,tb_status
		WHERE tb_grand.id_grand=tb_device.id_grand
		and tb_model.id_model=tb_device.id_model
		and tb_kinds.id_kinds=tb_device.id_kinds
		and tb_status.id_status=tb_device.id_status
		and tb_location.id_location=tb_device.id_location
		and tb_danwei.id_danwei=tb_device.id_danwei
		and tb_admin.id_user=tb_device.id_user
		and tb_config.id_config=tb_device.id_config;
SQL;

	$result=mysql_query($query)
	or die ("查询失败");
	// echo $query;
	$querypp= <<<SQL
		SELECT grandname 
		FROM tb_grand;
SQL;
	$resultpp=mysql_query($querypp)
	or die ("1查询失败");

	$queryxh= <<<SQL
		SELECT modelname 
		FROM tb_model;
SQL;
	$resultxh=mysql_query($queryxh)
	or die ("2查询失败");

	$querylx= <<<SQL
		SELECT kinds 
		FROM tb_kinds;
SQL;
	$resultlx=mysql_query($querylx)
	or die ("3查询失败");

	$queryip= <<<SQL
		SELECT ip
		FROM tb_device
SQL;
	$resultip=mysql_query($queryip)
	or die ("4查询失败");
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<style>
		body{
			overflow:scroll; 
			padding: 5px;
		}
		.tab{
			text-align: center;
			white-space: nowrap; 
			border-radius: 5px;
			table-layout: fixed;
			width: 1250px;
		}
		div{
			float: left;
			margin-left: 6px;
			margin-bottom: 5px;
		}
		.hang{
			clear:both;
		}
		table tr:nth-child(odd){background:#BFEFFF;}
		table tr:nth-child(5){background:#73B1E0;color:#FFF;}

		</style>

		<script type="text/javascript">  
		  // 选择状态  
		  var selectState = false;  
		  // 全选或者全取消  
		  function AllCheck(thisform)  
		  {  
		    for (var i = 0; i < thisform.elements.length; i++)  
		    {  
		      // 提取控件    
		      var checkbox = thisform.elements[i];  
		      checkbox.checked = !selectState;  
		    }  
		    selectState = !selectState;  
		  } 
		 </script> 
	</head>
	<body>
	<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
	<div class="hang">
	<div>
	品牌：<select name="pp"><option></option>
	<?php
	while($row = mysql_fetch_row($resultpp)){
	?>
	<option><?php echo $row[0] ?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div>
	型号：<select name="xh"><option></option>
	<?php
	while($row = mysql_fetch_row($resultxh)){
	?>
	<option><?php echo $row[0] ?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div>
	类型：<select name="lx"><option></option>
	<?php
	while($row = mysql_fetch_row($resultlx)){
	?>
	<option><?php echo $row[0] ?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div>
	ip：<select name="ip"><option></option>
	<?php
	while($row = mysql_fetch_row($resultip)){
	?>
	<option><?php echo $row[0] ?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div>
	<button type="submit" name="button0" id=""><b>查询</b></button></div></div>
	</form>

	<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
	<div class="hang" >
	<div>
	全选<input type="checkbox" onClick="AllCheck(this.form);return true;" value="" /></div>
	<div>
	<button type="submit" name="button1" id=""><b>删除</b></button></div></div>

	<?php
	if(!isset($_POST['button0'])){
	?>
	<table border="1" class="tab" cellspacing="0" cellpadding="0">
	<tr><td width="40px">选择</td><td width="60px">序 号</td><td width="100px">品 牌</td><td width="100px">型 号</td><td width="80px">类 型</td><td width="150px">功 用</td><td width="140px">域 名</td><td width="140">ip</td><td width="120px">开放端口</td><td width="80px">物理端口</td><td width="80px">cpu颗数</td><td width="80px">cpu核心</td><td width="100px">内 存(G)</td><td width="120px">存 储(G)</td><td width="60px">网卡数</td><td width="60px">hba卡</td><td width="140px">楼 宇&nbsp;&nbsp;&nbsp;&nbsp;层/列</td><td width="120px">所属单位</td><td width="100px">使用者</td><td width="80px">状 态</td><td width="100px">上架日期</td></tr>
	<?php
	$n=1;
	while($row = mysql_fetch_assoc($result)){
	?>
				<tr>
				<td><input type="checkbox" value="<?php echo $row['id_device'];  ?>" /></td>
				<td><a href="<?php echo "detail.php?id=".$row['id_device'] ?>"  target="_blank"><?php echo $n;$n=$n+1; ?></a></td>
				<?php
				echo <<<TD
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
TD;
	?>
	</tr>

	<?php
	}}else{
		$pp = $_POST['pp'];
		$xh = $_POST['xh'];
		$lx = $_POST['lx'];
		$ip = $_POST['ip'];
		// echo $pp,$xh,$lx,$ip;
		$query1= <<<SQL
			SELECT id_device,tb_grand.grandname,tb_model.modelname,tb_kinds.kinds,function,domain,ip,openports,tb_config.port,tb_config.cpu_num,tb_config.cpu_core,tb_config.ram,tb_config.store,tb_config.netcard,tb_config.hba,tb_location.location,tb_location.louclie,tb_danwei.danwei,tb_admin.name,tb_status.status,date 
			FROM tb_device,tb_grand,tb_model,tb_kinds,tb_config,tb_location,tb_danwei,tb_admin,tb_status
			WHERE tb_grand.id_grand=tb_device.id_grand
			and tb_model.id_model=tb_device.id_model
			and tb_kinds.id_kinds=tb_device.id_kinds
			and tb_status.id_status=tb_device.id_status
			and tb_location.id_location=tb_device.id_location
			and tb_danwei.id_danwei=tb_device.id_danwei
			and tb_admin.id_user=tb_device.id_user
			and tb_config.id_config=tb_device.id_config
SQL;
			if($pp){ $query1=$query1."\nand tb_grand.grandname='$pp'"; }
			// echo $query1;
			if($xh){$query1=$query1." and tb_model.modelname='$xh'"; }
			if($lx){$query1=$query1." and tb_kinds.kinds='$lx'" ;}
			if($ip){$query1=$query1." and tb_device.ip='$ip'" ;}
			$query1=$query1.";" ;
		$result1=mysql_query($query1)
		or die ("查询失败");
	?>
		<table border="1" class="tab" cellspacing="0" cellpadding="0">
		<tr><td width="40px">选择</td><td width="60px">序 号</td><td width="100px">品 牌</td><td width="100px">型 号</td><td width="80px">类 型</td><td width="150px">功 用</td><td width="140px">域 名</td><td width="140">ip</td><td width="120px">开放端口</td><td width="80px">物理端口</td><td width="80px">cpu颗数</td><td width="80px">cpu核心</td><td width="100px">内 存(G)</td><td width="120px">存 储(G)</td><td width="60px">网卡数</td><td width="60px">hba卡</td><td width="140px">楼 宇&nbsp;&nbsp;&nbsp;&nbsp;层/列</td><td width="120px">所属单位</td><td width="100px">使用者</td><td width="80px">状 态</td><td width="100px">上架日期</td></tr>
		<?php
		$n=1;
		while($row = mysql_fetch_assoc($result1)){
	?>
				<tr>
				<td><input type="checkbox" value="<?php echo $row['id_device'];  ?>" /></td>
				<td><a href="<?php echo "detail.php?id=".$row['id_device'] ?>" ><?php echo $n;$n=$n+1; ?></a></td>
				<?php
				echo <<<TD
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
TD;

		}
	}
}
	?>
	</tr>
	</table>
	</form>
	</body>
	</html>

<?php

/*点击删除，执行数据库操作*/






@mysql_close();

?>
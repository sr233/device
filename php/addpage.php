<?php
require 'session.php';
if(!$add_limit){
	header('location:Nopermission.php');
}else{
require 'dbcon.php';
header("Content-Type: text/html; charset=UTF-8");
mysql_query("SET NAMES 'utf8'");
 // echo '123';

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

$querywldk= <<<SQL
	SELECT port 
	FROM tb_config;
SQL;
$resultwldk=mysql_query($querywldk)
or die ("4查询失败");

$queryks= <<<SQL
	SELECT cpu_num 
	FROM tb_config;
SQL;
$resultks=mysql_query($queryks)
or die ("5查询失败");

$queryhx= <<<SQL
	SELECT cpu_core 
	FROM tb_config;
SQL;
$resulthx=mysql_query($queryhx)
or die ("6查询失败");

$queryram= <<<SQL
	SELECT  ram
	FROM tb_config;
SQL;
$resultram=mysql_query($queryram)
or die ("7查询失败");

$queryrom= <<<SQL
	SELECT  store
	FROM tb_config;
SQL;
$resultrom=mysql_query($queryrom)
or die ("8查询失败");

$querynetcard= <<<SQL
	SELECT  netcard
	FROM tb_config;
SQL;
$resultnetcard=mysql_query($querynetcard)
or die ("9查询失败");

$queryhba= <<<SQL
	SELECT hba 
	FROM tb_config;
SQL;
$resulthba=mysql_query($queryhba)
or die ("10查询失败");

$querylocation= <<<SQL
	SELECT  location
	FROM tb_location;
SQL;
$resultlocation=mysql_query($querylocation)
or die ("11查询失败");

$queryceng= <<<SQL
	SELECT louclie 
	FROM tb_location;
SQL;
$resultceng=mysql_query($queryceng)
or die ("12查询失败");

$querydanwei= <<<SQL
	SELECT  danwei
	FROM tb_danwei;
SQL;
$resultdanwei=mysql_query($querydanwei)
or die ("13查询失败");

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

// echo $row[0];


}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<style>
	div{
		display: block;
		
		font-weight: bold;
		padding:8px;
		margin:4px;
		text-align: center;
	}
	.father{
		float:left;
		height: 100px;
	}
	button{
		position:relative;
		margin-top: 44px;
	}
	.hang{
		clear: both;
	}
	</style>
</head>
<body>
<h1>addpage:</h1>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">

<div class="hang">
<div  class="father">
<div>品 牌</div><select name="pp">
<?php
while($row = mysql_fetch_row($resultpp)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>型 号</div><select name="xh">
<?php
while($row = mysql_fetch_row($resultxh)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>类 型</div><select name="lx">
<?php
while($row = mysql_fetch_row($resultlx)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>功 用</div>
<input type="text" value="" maxlength="50" name="gy" />
</div>

<div  class="father">
<div>域 名</div>
<input type="text" style="width:120px" value="" maxlength="20" name="ym" />
</div>

<div  class="father">
<div>i p</div>
<input type="text" style="width:120px" value="" maxlength="20" name="ip" />
</div>

<div  class="father">
<div>开放端口</div>
<input type="text" style="width:120px" value="" maxlength="30" name="kfdk" />
</div>

<div  class="father">
<div>物理端口</div><select name="wldk">
<?php
while($row = mysql_fetch_row($resultwldk)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="hang">
<div  class="father">
<div>cpu颗数</div><select name="ks">
<?php
while($row = mysql_fetch_row($resultks)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>cpu核心数</div><select name="hx">
<?php
while($row = mysql_fetch_row($resulthx)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>内存(G)</div><select name="ram">
<?php
while($row = mysql_fetch_row($resultram)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>存储(G)</div><select name="rom">
<?php
while($row = mysql_fetch_row($resultrom)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>网卡数</div><select name="netcard">
<?php
while($row = mysql_fetch_row($resultnetcard)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>hba卡</div><select name="hba">
<?php
while($row = mysql_fetch_row($resulthba)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>楼 宇</div><select name="location">
<?php
while($row = mysql_fetch_row($resultlocation)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>层/列</div><select name="ceng">
<?php
while($row = mysql_fetch_row($resultceng)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>所属单位</div><select name="danwei">
<?php
while($row = mysql_fetch_row($resultdanwei)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="hang">
<div  class="father">
<div>使用者</div><select name="user">
<?php
while($row = mysql_fetch_row($resultuser)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>状 态</div><select name="zt">
<?php
while($row = mysql_fetch_row($resultzt)){
?>
<option><?php echo $row[0] ?></option>
<?php
}
?>
</select>
</div>

<div  class="father">
<div>上架日期</div>
<input type="date" value="" maxlength="30" name="date" />
</div>

<div class="father">
<button type="submit" name="button" id=""><b>提交</b></button>
</div>
</div>
</form>


</body>
</html>

<?php 
/*提交后，向数据库插入数据*/
if(isset($_POST['button'])){
	$pp = $_POST['pp'];
	$xh = $_POST['xh'];
	$lx = $_POST['lx'];
	$gy = $_POST['gy'];
	$ym = $_POST['ym'];
	$ip = $_POST['ip'];
	$kfdk = $_POST['kfdk'];
	$wldk = $_POST['wldk'];
	$ks = $_POST['ks'];
	$hx = $_POST['hx'];
	$ram = $_POST['ram'];
	$rom = $_POST['rom'];
	$netcard = $_POST['netcard'];
	$hba = $_POST['hba'];
	$location = $_POST['location'];
	$ceng = $_POST['ceng'];
	$danwei = $_POST['danwei'];
	$user = $_POST['user'];
	$zt = $_POST['zt'];
	$date = $_POST['date'];
$query0="select id_grand from tb_grand where grandname='$pp'";
$result0=mysql_query($query0)
or die ("0查询失败");
$pp=mysql_fetch_assoc($result0)['id_grand'];

$query1="select id_model from tb_model where modelname='$xh'";
$result1=mysql_query($query1)
or die ("1查询失败");
$xh=mysql_fetch_assoc($result1)['id_model'];

$query2="select id_kinds from tb_kinds where kinds='$lx'";
$result2=mysql_query($query2)
or die ("2查询失败");
$lx=mysql_fetch_assoc($result2)['id_kinds'];


$query3="select id_config from tb_config where cpu_num='$ks' and cpu_core='$hx' and	ram='$ram' and store='$rom' and netcard='$netcard' and hba='$hba' and port='$wldk'";
$result3=mysql_query($query3);
if($result3){
	$pz=mysql_fetch_assoc($result3)['id_config'];
}else{
	$queryi0="insert into tb_config(cpu_num,cpu_core,ram,store,netcard,port,hba) values('$ks','$hx','$ram','$rom','netcard','$wldk','hba')";
	mysql_query($queryi0);
	$query3="select id_config from tb_config where cpu_num='$ks' and cpu_core='$hx' and	ram='$ram' and store='$rom' and netcard='$netcard' and hba='$hba' and port='$wldk'";
	$result3=mysql_query($query3);
	$pz=mysql_fetch_assoc($result3)['id_config'];
}
// or die ("3查询失败");

$query4="select id_location from tb_location where location='$location' and louclie='$ceng' ";
$result4=mysql_query($query4);
if($result4){
	$wz=mysql_fetch_assoc($result4)['id_location'];
}else{
	$queryi1="insert into tb_location(location,louclie) values('$location','$ceng')";
	mysql_query($queryi1);
	$query4="select id_location from tb_location where location='$location' and louclie='$ceng' ";
	$result4=mysql_query($query4);	
	$wz=mysql_fetch_assoc($result4)['id_location'];
}
// echo $wz=mysql_fetch_assoc($result4)['id_location'];

$query5="select id_danwei from tb_danwei where danwei='$danwei' ";
$result5=mysql_query($query5)
or die ("5查询失败");
$dw=mysql_fetch_assoc($result5)['id_danwei'];

$query6="select id_user from tb_admin where name='$user' ";
$result6=mysql_query($query6)
or die ("6查询失败");
$yh=mysql_fetch_assoc($result6)['id_user'];

$query7="select id_status from tb_status where status='$zt'";
$result7=mysql_query($query7)
or die ("7查询失败");
$zt=mysql_fetch_assoc($result7)['id_status'];



$queryinsert= <<<SQL
	INSERT into tb_device(id_grand,id_model,id_kinds,id_status,id_location,function,ip,domain,openports,id_danwei,id_user,id_config,date)
	values('$pp','$xh','$lx','$zt','$wz','$gy','$ip','$ym','$kfdk','$dw,','$yh','$pz','$date')	

SQL;
$resultinsert=mysql_query($queryinsert)
or die ("设备表插入失败");
	// echo $pp,$xh,$lx,$gy,$ym,$ip,$kfdk,$wldk,$ks,$hx,$ram,$rom,$netcard,$hba,$location,$ceng,$danwei,$user,$zt,$date;
if($resultinsert){
	echo "<script>alert('添加设备成功');</script>";
}


}

@mysql_close(); 

?>
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
	SELECT modelname 
	FROM tb_model;
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

	// echo $pp,$xh,$lx,$gy,$ym,$ip,$kfdk,$wldk,$ks,$hx,$ram,$rom,$netcard,$hba,$location,$ceng,$danwei,$user,$zt,$date;




}

@mysql_close(); 

?>
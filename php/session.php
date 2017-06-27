          <!-- 每个子页面需加，用户seesion验证 -->
<?php
session_start();
if(!$_SESSION['user']){
	header('location:../page/login.php');
}else{
	$user=$_SESSION['user'];
	$password=$_SESSION['password'];
	$name=$_SESSION['name'];
	$phone=$_SESSION['phone'];
	$port_limit=$_SESSION['port_limit'];
	$add_limit=$_SESSION['add_limit'];
	$del_limit=$_SESSION['del_limit'];
	$function_limit=$_SESSION['function_limit'];
	$ap_limit=$_SESSION['ap_limit'];
	$adduser_limit=$_SESSION['adduser_limit'];
	$deluser_limit=$_SESSION['deluser_limit'];
	$limit_limit=$_SESSION['limit_limit'];
	$dyb_limit=$_SESSION['dyb_limit'];
	$message_limit=$_SESSION['message_limit'];
	
	
}
?>
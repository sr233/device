<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<meta charset="utf-8">
		<link href="../common/css/login_style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1> Login  </h1>
					<div class="head">
						<img src="../common/image/user.png" alt=""/>
					</div>
				<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
						<input type="text" class="text" name="user" placeholder="用户名" value="" onblur="if (this.value == '') {this.placeholder = '用户名';}" />
						<input type="password" class="text" name="password" placeholder="密 码" value="" " onblur="if (this.value == '') {this.placeholder = '密 码';}" />
						<div class="submit">
							<input type="submit" name="button" value="登 陆" />
						</div>	
					<div class="regist">
					<a href=""><center>注 册</center></a>
					</div>
				</form>
		</div>
			<!--//End-login-form-->


</body>
</html>
<?php
 require "../php/login_verify.php";
?>
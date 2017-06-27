<?php
require '../php/session.php';
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="keywords">
	<meta name="description">
    <title>首页</title>
	
	<link rel="stylesheet" href="../common/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../common/skin/qingxin/skin.css" id="layout-skin"/>
    <style>
/*    body,html{
    	overflow:scroll;
    }*/
    </style>	
  </head>
  
  <body>
	<div class="layout-admin">
		<header class="layout-header">
			<span class="header-logo">设备管理系统</span> 
			<a class="header-menu-btn" href="javascript:;"><i class="icon-font">&#xe600;</i></a>
			<ul class="header-bar">
<!-- 				<li class="header-bar-role"><a href="javascript:;">超级管理员</a></li>
 -->				<li class="header-bar-nav">
					<a href="javascript:;"><?php echo $user; ?><i class="icon-font" style="margin-left:5px;">&#xe60c;</i></a>
					<ul class="header-dropdown-menu">
						<li><a href="../php/gerenxx.php">个人信息</a></li>
						<li><a href="javascript:;">查看消息</a></li>
						<li><a href="../php/pw.php">修改密码</a></li>
						<li><a href="../php/changecount.php">切换账户</a></li>
					</ul>
				</li>
				<li class="header-bar-nav"> 
					<a href="javascript:;" title="换肤"><i class="icon-font">&#xe608;</i></a>
					<ul class="header-dropdown-menu right dropdown-skin">
						<li><a href="javascript:;" data-val="qingxin" title="清新">清新</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="molv" title="墨绿">墨绿</a></li>
						
					</ul>
				</li>
			</ul>
		</header>
		<aside class="layout-side">
			<ul class="side-menu">
				<li class="menu-header menu-item">主菜单</li>

<!-- 查看设备li -->
				<li class="menu-item">
					<a href="../php/viewdev.php">
					<i class="icon-font "></i>
					<span>查看设备</span>
					<i class="icon-font icon-right"></i>
					</a>
				</li>	
				
<!-- 编辑设备li -->
				<li class="menu-item">
					<a href="">
					<i class="icon-font "></i>
					<span>编辑设备</span>
					<i class="icon-font icon-right"></i>
					</a>
					<ul class="menu-item-child" id="menu-child-3">
				        <li id="add">
						<a href="../php/addpage.php">
						<i class="icon-font "></i>
						<span>增加</span>
						<i class="icon-font icon-right"></i>
						</a>				        
						</li>
						<li>
						<a href="../php/delpage.php">
						<i class="icon-font "></i>
						<span>删除</span>
						<i class="icon-font icon-right"></i>
						</a>
						</li>
<!-- 						<li>
						<a href="../php/editpage.php">
						<i class="icon-font "></i>
						<span>编辑</span>
						<i class="icon-font icon-right"></i>
						</a>
						</li> -->						
					</ul>
				</li>
<!-- 申请设备li -->
				<li class="menu-item">
					<a href="../php/apply.php">
					<i class="icon-font "></i>
					<span>申请设备</span>
					<i class="icon-font icon-right"></i>
					</a>
				</li>	

<!-- 端口对应表li -->
				<li class="menu-item">
					<a href="../php/dyb.php">
					<i class="icon-font "></i>
					<span>端口对应表</span>
					<i class="icon-font icon-right"></i>
					</a>
				</li>	
				<li class="menu-item">
					<a href="">
					<i class="icon-font "></i>
					<span>账户管理</span>
					<i class="icon-font icon-right"></i>
					</a>
						<ul class="menu-item-child" id="menu-child-3">
					        <li>
							<a href="../php/viewuser.php">
							<i class="icon-font "></i>
							<span>查看账户</span>
							<i class="icon-font icon-right"></i>
							</a>				        
							</li>		
					        <li>
							<a href="../php/adduser.php">
							<i class="icon-font "></i>
							<span>添加账户</span>
							<i class="icon-font icon-right"></i>
							</a>				        
							</li>
							<li>
							<a href="../php/deluser.php">
							<i class="icon-font "></i>
							<span>删除账户</span>
							<i class="icon-font icon-right"></i>
							</a>
							</li>
							<li>
							<a href="../php/editlimit.php">
							<i class="icon-font "></i>
							<span>权限修改</span>
							<i class="icon-font icon-right"></i>
							</a>
							</li>						
						</ul>

				</li>				
			</ul>
		</aside>								

		
		<div class="layout-side-arrow"><div class="layout-side-arrow-icon"><i class="icon-font">&#xe60d;</i></div></div>
		
		<section class="layout-main">
			<div class="layout-main-tab">
				<button class="tab-btn btn-left"><i class="icon-font">&#xe60e;</i></button>
                <nav class="tab-nav">
                    <div class="tab-nav-content">
                        <a href="javascript:;" class="content-tab active" data-id="home.html">首页</a>
                    </div>
                </nav>
                <button class="tab-btn btn-right"><i class="icon-font">&#xe60f;</i></button>
			</div>
			<div class="layout-main-body">
				<iframe class="body-iframe"  name="iframe0" width="100%" height="99%" src="home.html" frameborder="0" data-id="home.html" seamless></iframe>	
			</div>
		</section>
		<div class="layout-footer">@ranpenghao</div>
	</div>
	<script type="text/javascript" src="../common/lib/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../common/js/bootstrap.js"></script>
	<script type="text/javascript" src="../common/js/bootstrap-util.js"></script>
  </body>
</html>


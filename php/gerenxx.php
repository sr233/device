<?php
require "session.php";
?>
<?php
function a($limit){
  if($limit){
    echo yes;
  }
  else{echo no;}
}
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <title>首页</title>
    <style>
    div{
    	display:block;
    	float:left;
    }
    #fu{
      margin-left:20%;
    }
    .yes{
      color:#1D9F18;
    }
    .no{
      color:#EA2323;
    }
    body{
      font-size: 20px;
      font-weight: 600;
    }
    </style>
  </head>
  <body>
  <h1>您的个人信息：</h1><br>
  <div id="fu">
  用户名：<?php echo $user; ?><br>
  姓名：<?php echo $name; ?><br>
  联系方式：<?php echo $phone; ?> <br>
  <div>权限：</div>
  <div>
  		添加设备:  <b class="<?php a($add_limit) ?>"><?php if($add_limit){echo "有";}else{ echo "无";} ?></b><br>
  		删除设备:  <b class="<?php a($del_limit) ?>"><?php if($del_limit){echo "有";}else{ echo "无";} ?></b><br>
  		编辑功用:  <b class="<?php a($function_limit) ?>"><?php if($function_limit){echo "有";}else{ echo "无";} ?></b><br>
  		编辑端口:  <b class="<?php a($port_limit) ?>"><?php if($port_limit){echo "有";}else{ echo "无";} ?></b><br>
  		设备申请:  <b class="<?php a($ap_limit) ?>"><?php if($ap_limit){echo "有";}else{ echo "无";} ?></b><br>
  		查看消息:  <b class="<?php a($message_limit) ?>"><?php if($message_limit){echo "有";}else{ echo "无";} ?></b><br>
  		查看对应:  <b class="<?php a($dyb_limit) ?>"><?php if($dyb_limit){echo "有";}else{ echo "无";} ?></b><br>
  		添加用户:  <b class="<?php a($adduser_limit) ?>"><?php if($adduser_limit){echo "有";}else{ echo "无";} ?></b><br>
  		删除用户:  <b class="<?php a($deluser_limit) ?>"><?php if($deluser_limit){echo "有";}else{ echo "无";} ?></b><br>
  		修改权限:  <b class="<?php a($limit_limit) ?>"><?php if($limit_limit){echo "有";}else{ echo "无";} ?></b><br>
  </div>
  </div>
  </body>
</html>


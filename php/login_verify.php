<?php
/*    提交触发     */
if(isset($_POST['button'])){
	session_start();
    //    连接数据库
	$hostname="localhost";
	$user="root";
	$password="123456";
    @mysql_connect($hostname,$user,$password)
    or die('failed');
    @mysql_select_db('wlzx_device')
    or die('fail db');
    $id=$_POST['user'];
    $password=$_POST['password'];

    // $id="root";
    // $password="root";    
/*        查询用户表，效验用户名、密码，session储存*/
    $query = <<< SQL
    	SELECT * from tb_admin
    	where user='$id'
        and password='$password';
SQL;
    $result=mysql_query($query)
    or die ("查询失败");
    $result  = mysql_fetch_array($result);

    if(!$result){
        echo '<script>alert("用户名或密码错误！")</script>';
    }
/*    查询成功，重定向到设备界面，存储用户表 权限表 所有session    */
    else{   
/*权限表数据获取*/

        $id_limit=$result['id_limit'];
        $query1= <<<SQL
        SELECT * FROM tb_limit
        WHERE id_limit='$id_limit';
SQL;
    $result1=mysql_query($query1)
    or die ("查询失败");
    $result1  = mysql_fetch_array($result1);
    // echo $result1['role'];

/*    session存用户表信息  */
    $_SESSION['user']=$result['user'];
    $_SESSION['password']=$result['password'];
    $_SESSION['name']=$result['name'];
    $_SESSION['phone']=$result['phone'];
    $_SESSION['id_limit']=$result['id_limit'];

/*    seesion存登陆用户对应权限*/
    $_SESSION['role']=$result1['role'];
    $_SESSION['add_limit']=$result1['add_limit'];
    $_SESSION['del_limit']=$result1['del_limit'];
    $_SESSION['port_limit']=$result1['port_limit'];
    $_SESSION['function_limit']=$result1['function_limit']; 
    $_SESSION['ap_limit']=$result1['ap_limit'];
    $_SESSION['adduser_limit']=$result1['adduser_limit'];
    $_SESSION['deluser_limit']=$result1['deluser_limit'];
    $_SESSION['limit_limit']=$result1['limit_limit'];
    $_SESSION['dyb_limit']=$result1['dyb_limit'];
    $_SESSION['message_limit']=$result1['message_limit'];
    // echo $result['4'];
    header('location:index.php');

/*    $_SESSION['del_limit']=$result['del_limit'];
    $_SESSION['edit_limit']=$result['edit_limit'];
    $_SESSION['ap_limit']=$result['ap_limit'];
    $_SESSION['manage_limit']=$result['manage_limit'];
    $_SESSION['dyb_limit']=$result['dyb_limit'];
    $_SESSION['message_limit']=$result['message_limit'];
    // echo $_SESSION['phone'];*/

}
    // if($result){
    //     echo 1;
    // }else{
    //     echo 0;
    // }
  
}    
@mysql_close();

?>
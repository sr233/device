    <html xmlns="http://www.w3.org/1999/xhtml">   
    <head>   
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />   
    <title>无标题文档</title>   
    </head>   
    <body>   
    html复选框如果要以数据组形式发送给php脚本处理就必须以如checkbox[]这形式   
    <form id="form1" name="form1" method="post" action="">   
    <label>   
    <input type="checkbox" name="box[]" value="1" />   
    </label>   
    <label>   
    <input type="checkbox" name="box[]" value="2" />   
    </label>   
    <label>   
    <input type="checkbox" name="box[]" value="www.jb51.net" />   
    </label>   
    <label>   
    <input type="checkbox" name="box[]" value="jb51.net" />   
    </label>   
    <label>   
    <input type="submit" name="Submit" value="提交" />   
    </label>   
    </form>   
    </body>   
    </html>   
    <?php   
    //判断是否点击提交   
    if(isset($_POST['Submit']))   
    {   
    @$array = $_POST['box'];   
    // print_r($array);
    // echo count($array);
    for($i=0;$i<count($array);$i++){
    	echo $array[$i];
    }   
    }   
    /*   
    结果:   
    Array   
    (   
    [0] => 1   
    [1] => 2   
    [2] => www.jb51.net   
    [3] => jb51.net   
    )   
    简单的很多事情在做之前觉得复杂但做起来就很容易了，像这个复选框代码就是这样了。   
    */   
    ?>   
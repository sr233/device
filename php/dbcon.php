<?php

$hostname="localhost";
$dbuser="root";
$dbpassword="123456";
@mysql_connect($hostname,$dbuser,$dbpassword)
or die('failed');
@mysql_select_db('wlzx_device')
or die('fail db');

?>
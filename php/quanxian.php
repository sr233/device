<?php

require 'session.php';
if(!$add_limit){
	header('location:Nopermission.php');

}else{
	header('location:addpage.php');

}



?>
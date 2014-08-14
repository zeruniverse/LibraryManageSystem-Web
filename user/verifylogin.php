<?php
require_once("../functions/checklogin.php");
session_start();
$_SESSION['admin_id']=$_POST['id'];
$_SESSION['admin_pw']=$_POST['pw'];
if(isLogin()) die("1"); else die("0");
?>

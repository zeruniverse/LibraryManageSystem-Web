<?php
require_once("checkpw.php");
function isLogin()
{
	session_start();
	if(!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_pw'])) return false;
	$r=isPasswordOK($_SESSION['admin_id'],$_SESSION['admin_pw']);
	if(!$r) {unset($_SESSION['admin_id']);unset($_SESSION['admin_pw']);}
	return $r;
}?>

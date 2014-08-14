<?php
require_once("encryption.php");
require_once("sqllink.php");
function isPasswordOK($user,$password)
{
	$user1=addslashes($user);//防注入
	if($user1==""||$password=="") return false;
	$link=sqllink();
	if(!$link) return false; //数据库错误
	$sql="SELECT `pw` FROM `admin` WHERE binary `id`='$user1'";
	$res=mysql_query($sql,$link);
	$num= mysql_num_rows($res);
	if($num==0) return false;//用户不存在
	$row=mysql_fetch_array($res);
	if($row['pw']!=encrypt($password,$user1)) return false; //密码错误
	return true;
}
?>
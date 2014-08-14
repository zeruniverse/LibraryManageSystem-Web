<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
if(!isPasswordOK($_SESSION['admin_id'],$_POST['oldpw'])) die("原密码错误");
$newpw=encrypt($_POST['newpw'],$_SESSION['admin_id']);
$id=$_SESSION['admin_id'];
$link=sqllink();if(!$link){die("数据库连接错误");}
$sql="update `admin` set `pw`='$newpw' WHERE binary `id`='$id'";
$res=mysql_query($sql,$link);
echo "修改密码成功！请登出后重新登陆，否则无法进行其它操作";
?>
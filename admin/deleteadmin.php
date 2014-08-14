<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$id=$_SESSION['admin_id'];
if(!isPasswordOK($_SESSION['admin_id'],$_POST['oldpw'])) die("密码错误");
$link=sqllink();if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `admin`";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num<2) die("无法删除最后一个管理员");
$sql = "DELETE FROM `admin` WHERE binary `id`='$id'";
$res=mysql_query($sql,$link);
echo "删除本账号成功！\n该账号已无法进行操作。请登出后用其它账号登陆";
?>
<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$id=addslashes($_POST['id']);
$name=addslashes($_POST['name']);
if($id=='' ) die("卡号为空！");
$link=sqllink(); if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `borrowcard` WHERE binary `id`='$id' and `name`='$name'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num==0) die("该ID不存在！");
$sql="SELECT * FROM `transaction` WHERE binary `user_id`='$id'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num!=0) die("该ID有未还图书，无法删除！");
$sql = "DELETE FROM `borrowcard` WHERE binary `id`='$id'";
$res=mysql_query($sql,$link);
die("删除卡".$id."成功!");
?>
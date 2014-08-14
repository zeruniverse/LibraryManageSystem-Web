<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$id=addslashes($_POST['id']);
$name=addslashes($_POST['name']);
$dp=addslashes($_POST['dp']);
$type=addslashes($_POST['type']);
if($id=='' ||  $name=='') die("卡号与用户姓名必填！");
$link=sqllink(); if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `borrowcard` WHERE binary `id`='$id'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num!=0) die("该ID已存在！");
$sql="insert into `borrowcard` values ('$id','$name','$dp','$type')";
$res=mysql_query($sql,$link);
die("添加卡".$id."成功!");
?>
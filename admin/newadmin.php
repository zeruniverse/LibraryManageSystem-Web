<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$id=addslashes($_POST['id']);
$pw=encrypt(addslashes($_POST['pw']),$id);
$name=addslashes($_POST['name']);
$contact=addslashes($_POST['contact']);
if($id=='' ||  $pw=='') die("ID与密码必填！");
$link=sqllink(); if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `admin` WHERE binary `id`='$id'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num!=0) die("该ID已存在！");
$sql="insert into `admin` values ('$id','$pw','$name','$contact')";
$res=mysql_query($sql,$link);
die("添加管理员".$id."成功!");
?>
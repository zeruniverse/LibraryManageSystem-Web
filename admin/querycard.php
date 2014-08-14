<?php
//返回一个table
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$id=addslashes($_POST['id']);
if($id=='') die("卡号必填！");
$link=sqllink(); if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `borrowcard` WHERE binary `id`='$id'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num==0) die("该ID不存在！");
$i = mysql_fetch_array($res);
echo "<table><tr><th>卡ID</th><th>所有者姓名</th><th>单位</th><th>类型</th></tr><tr><td>".$i['id']."</td><td>".$i['name']."</td><td>".$i['department']."</td><td>".$i['type']."</td></tr></table>";
?>
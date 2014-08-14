<?php
//借书
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$userid=addslashes($_POST['userid']);
$bookid=addslashes($_POST['bookid']);
if( $userid=='') die("用户不存在！请检查借书证id是否正确！");
$link=sqllink(); if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `borrowcard` WHERE binary `id`='$userid'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num==0) die("用户不存在！请检查借书证id是否正确！");
$sql="SELECT *  FROM `transaction` WHERE binary `book_id`='$bookid' and binary `user_id`='$userid'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num!=0) die("此用户已经拥有一个该ID图书副本，无法再借一本！");
$sql="SELECT * FROM `book` WHERE binary `book_id`='$bookid'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num==0) die("此ID图书不存在！");
$i = mysql_fetch_array($res);
if($i['book_num']==0){
	$sql="SELECT min(return_data) as early  FROM `transaction` WHERE binary `book_id`='$bookid'";
	$res=mysql_query($sql,$link);
	$num= mysql_num_rows($res);
	if($num==0) die("此图书无库存！");
	$i = mysql_fetch_array($res);
	die("图书全部借出，最早归还日期为：".$i['early']);
}
$sql="update `book` set book_num=book_num-1 WHERE binary `book_id`='$bookid'";
$res=mysql_query($sql,$link);
$adminid=$_SESSION['admin_id'];
$bdate=date('Y-m-d H:i:s',strtotime("now"));
$rdate=date('Y-m-d H:i:s',strtotime("+3 week"));
$sql="insert into  `transaction` values ('$userid','$bookid','$bdate','$rdate','$adminid')";
$res=mysql_query($sql,$link);
// 关闭连接
echo "借出成功！";
mysql_close($link);
?>
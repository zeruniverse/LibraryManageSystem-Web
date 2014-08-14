<?php
//还书
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$userid=addslashes($_POST['userid']);
$bookid=addslashes($_POST['bookid']);
if( $userid=='') die("用户不存在！请检查借书证id是否正确！");
$link=sqllink(); if(!$link){die("数据库连接错误");}
$sql="SELECT *  FROM `transaction` WHERE binary `book_id`='$bookid' and binary `user_id`='$userid'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num==0) die("无对应借书记录，无法归还！");
$sql="update `book` set book_num=book_num+1 WHERE binary `book_id`='$bookid'";
$res=mysql_query($sql,$link);
$sql = "DELETE FROM `transaction` WHERE  binary `book_id`='$bookid' and binary `user_id`='$userid'";
$res=mysql_query($sql,$link);
// 关闭连接
echo "还书成功！";
mysql_close($link);
?>
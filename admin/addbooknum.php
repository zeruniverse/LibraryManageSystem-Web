<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$id=addslashes($_POST['id']);
$book_num=(int)addslashes($_POST['num']);
$link=sqllink();if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `book` WHERE binary `book_id`='$id'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num==0) die("没有此图书！");
$i=mysql_fetch_array($res);
if(!is_int($book_num)||$book_num<=0) die("数量必须是大于0的整数");
$sql="update `book` set book_all_num=book_all_num+$book_num , book_num=book_num+$book_num where binary book_id=$id";
$res=mysql_query($sql,$link);
die("新增书籍《".$i['book_name']."》".$book_num."本成功!");
?>
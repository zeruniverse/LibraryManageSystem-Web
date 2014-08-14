<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
$id=addslashes($_POST['id']);
$type=addslashes($_POST['type']);
$name=addslashes($_POST['name']);
$pub=addslashes($_POST['publisher']);
$year=(int)addslashes($_POST['year']);
$au=addslashes($_POST['author']);
$price=(float)addslashes($_POST['price']);
$book_num=(int)addslashes($_POST['num']);
if($book_num<=0||$year<=0||$price<0) die("参数错误");
$link=sqllink();if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `book` WHERE binary `book_id`='$id'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num!=0) die("已存在此书号图书，若需添加数目请使用添加书籍功能！");
$sql="insert into `book` values ('$id','$type','$name','$pub',$year,'$au',$price,$book_num,$book_num)";
$res=mysql_query($sql,$link);
die("添加书籍".$name."成功\n书号为".$id."!");
?>
<?php
require_once("../functions/checklogin.php");
if(!isLogin()) die("权限错误，请重新登录");
if (!empty($_FILES)  && $_FILES['Filedata']['size']<=10240) {
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$link=sqllink(); if(!$link){die("数据库连接错误");}
	$handle = @fopen($tempFile, "r");
	if(!$handle) die("文件错误!");
	$count=0;
	while (!feof($handle)) {
	$info=explode(',',fgets($handle));
	$count=$count+1;
	$id=addslashes($info[0]);
	$type=addslashes($info[1]);
	$name=addslashes($info[2]);
	$pub=addslashes($info[3]);
	$year=(int)addslashes($info[4]);
	$au=addslashes($info[5]);
	$price=(float)addslashes($info[6]);
	$book_num=(int)addslashes($info[7]);
	if($id==""||!is_int($book_num)||!is_int($year)||!is_float($price)||$book_num<=0||$year<=0||$price<0) die("在文件第".$count."行参数错误，操作已中止");
	$sql="SELECT * FROM `book` WHERE binary `book_id`='$id'";
	$res=mysql_query($sql,$link);
	$num= mysql_num_rows($res);
	if($num!=0) die("在文件第".$count."行发生图书id重复，操作已中止");
	$sql="insert into `book` values ('$id','$type','$name','$pub',$year,'$au',$price,$book_num,$book_num)";
	$res=mysql_query($sql,$link);
	}
	echo "导入书籍列表成功！";

	} else {
		echo "文件错误，请重新上传";
		
}
?>
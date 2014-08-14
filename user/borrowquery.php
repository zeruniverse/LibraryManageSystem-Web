<?php
//输出一般查询（面向普通用户）
//返回一个table
require_once("../functions/sqllink.php");
$username=addslashes($_POST['name']);
$userid=addslashes($_POST['id']);
if($username=='' ||  $userid=='') die("用户不存在！请检查借书证id与姓名是否正确！");
$link=sqllink(); if(!$link){die("数据库连接错误");}
$sql="SELECT * FROM `borrowcard` WHERE binary `id`='$userid' and `name`='$username'";
$res=mysql_query($sql,$link);
$num= mysql_num_rows($res);
if($num==0) die("用户不存在！请检查借书证id与姓名是否正确！");
$sql="SELECT * FROM `transaction` WHERE binary `user_id`='$userid'";
$res=mysql_query($sql,$link);
echo "<table><tr><th>书号</th><th>借出日期</th><th>应还日期</th><th>操作员</th></tr>";
while ($i = mysql_fetch_array($res)){ //返回查询结果
echo "<tr><td>".$i['book_id'].'</td><td>'.$i['borrow_date'].'</td><td>'.$i['return_date'].'</td><td>'.$i['admin_id'].'</td></tr>';
}
echo '</table>';
mysql_free_result($res);
// 关闭连接
mysql_close($link);
?>
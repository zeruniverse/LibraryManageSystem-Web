<?php
//查询模块，返回一个table;
//POST接收 data=单个的时候 data1,data2=区间形式 type=区分查询类型
require_once("./functions/sqllink.php");
$data=addslashes($_POST['data']);
$data1=addslashes($_POST['data1']);
$data2=addslashes($_POST['data2']);
switch ($_POST['type'])
{
	case '1': //查类别
		$sql="SELECT * FROM `book` WHERE `book_type` LIKE '%$data%'";
		break;
	case '2'://查书名
		$sql="SELECT * FROM `book` WHERE `book_name` LIKE '%$data%'";
		break;
	case '3'://查出版社
		$sql="SELECT * FROM `book` WHERE `publisher` LIKE '%$data%'";
		break;
	case '4'://查作者
		$sql="SELECT * FROM `book` WHERE `author` LIKE '%$data%'";
		break;
	case '5'://查年份
		$data1=(int)$data1;$data2=(int)$data2;
		if(!is_int($data1)||!is_int($data2))die("查询参数错误");
		$sql="SELECT * FROM `book` WHERE `book_year` BETWEEN $data1 AND $data2";
		break;
	case '6'://查价格
		$data1=(float)$data1;$data2=(float)$data2;
		if(!is_float($data1)||!is_float($data2))die("查询参数错误");
		$sql="SELECT * FROM `book` WHERE `price` BETWEEN $data1 AND $data2";
		break;
	default: 
		die("严重系统错误！");
		break;
}
$link=sqllink();
if(!$link) die("数据库连接错误！");
$res=mysql_query($sql, $link);
echo "<table><tr><th>书号</th><th>类别</th><th>书名</th><th>出版社</th><th>年份</th><th>作者</th><th>价格</th><th>库存</th></tr>";
while ($i = mysql_fetch_array($res)){ //返回查询结果
/*$id=$i['book_id'];
$type=$i['book_type'];
$name=$i['book_name'];
$pub=$i['publisher'];
$year=$i['book_year'];
$au=$i['author'];
$price=$i['price'];
$num=$i['book_num'].'/'.$i['book_all_num'];*/
echo "<tr><td>".$i['book_id'].'</td><td>'.$i['book_type'].'</td><td>'.$i['book_name'].'</td><td>'.$i['publisher'].'</td><td>'.$i['book_year'].'</td><td>'.$i['author'].'</td><td>'.$i['price'].'</td><td>'.$i['book_num'].'/'.$i['book_all_num'].'</td></tr>';
}
echo '</table>';
mysql_free_result($res);
// 关闭连接
mysql_close($link);
?>		
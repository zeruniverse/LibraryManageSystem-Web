<?
function sqllink()
{
$dbname = 'zzy8200';/*从环境变量里取出数据库连接需要的参数*/

$host = "localhost";

$user = "zzy8200";

$pwd = "asdlfnks9OOICSDJKF";
$link = @mysql_connect($host,$user,$pwd,true);
if(!$link) {
    return NULL;
}
/*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/
mysql_query("set names utf8");
if(!mysql_select_db($dbname,$link)) return NULL;
return $link;
}
?>
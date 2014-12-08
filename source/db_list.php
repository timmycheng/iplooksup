<?php

//连接数据库
$db_server="localhost";   
$db_user_name="root";   
$db_user_password='123456';   
$db_name="test";//库名   
$conn=mysql_connect($db_server,$db_user_name,$db_user_password);   
mysql_query("SET NAMES UTF8");   
mysql_select_db($db_name, $conn) or die("数据库连接失败！") ; 

$existsql = "SELECT * from pro1_ip_looks_up";
$exist = mysql_query($existsql);  //执行SQL

echo "<table class='table table-striped'>";
echo 	"<tr>";
echo 		"<th>";
echo 		"IP名称";
echo 		"</th>";
echo 		"<th>";
echo 		"描述";
echo 		"</th>";
echo 		"<th>";
echo 		"分类";
echo 		"</th>";
echo 		"<th>";
echo 		"操作";
echo 		"</th>";
echo 	"</tr>";

while($row = mysql_fetch_array($exist))
{
	echo "<tr>";
	echo "<td>";
	echo $row['ip_name'];
	echo "</td>";
	echo "<td>";	
	echo $row['desc'];
	echo "</td>";
	echo "<td>";
	echo $row['cate'];
	echo "</td>";
	echo "<td><input type='button' class='btn btn-danger' value='删除' id='del' onclick='del(".$row['id'].")'/></td>";
	echo "</tr>";
}

echo "</table>";
?>
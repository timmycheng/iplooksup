<?php
$id=$_POST['id'];

//连接数据库
$db_server="localhost";   
$db_user_name="root";   
$db_user_password='123456';   
$db_name="test";//库名   
$conn=mysql_connect($db_server,$db_user_name,$db_user_password);   
mysql_query("SET NAMES UTF8");   
mysql_select_db($db_name, $conn) or die("数据库连接失败！") ;

mysql_query("DELETE FROM pro1_ip_looks_up WHERE id='$id'"); 

!mysql_affected_rows()? $ret="删除失败！" : $ret="删除成功！" ;

echo $ret;
?>
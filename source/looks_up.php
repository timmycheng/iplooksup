<?php
$ip=$_POST['input_ip_addr'];//从ajax获取参数

include 'functions.php';//导入IP计算函数



//连接数据库
$db_server="localhost";   
$db_user_name="root";   
$db_user_password='123456';   
$db_name="test";//库名   
$conn=mysql_connect($db_server,$db_user_name,$db_user_password);   
mysql_query("SET NAMES UTF8");   
mysql_select_db($db_name, $conn) or die("数据库连接失败！") ; 
echo "数据库连接成功！";

echo '<br>';

if (!empty($ip) && count(explode('.', $ip))==4) 
{
	$ip_dec=ipstr2dec($ip);//计算IP十进制值
	$existsql = "select * from pro1_ip_looks_up where ip_dec_begin<=$ip_dec and ip_dec_end>=$ip_dec";
}elseif(empty($ip))
{
	echo "请输入要查找的IP！";
}elseif (count(explode('.', $ip))) 
{
	//IP不全
	$existsql = "select * from pro1_ip_looks_up where ip_name like '%$ip%' or `desc` like '%$ip%'";
}

if (!empty($existsql)) {
	$exist = mysql_query($existsql);  //执行SQL
	$row_num=mysql_num_rows($exist);

	echo '共'.$row_num.'条记录！<br><hr>';

	while($row = mysql_fetch_array($exist))
	{
	  $row['ip_subnet']==0?$sub_show=null:$sub_show="/".$row['ip_subnet'];
	  echo "地址： ".$row['ip_name'] . $sub_show;
	  echo "<br>";
	  echo "分类： ".$row['cate'];
	  echo "<br>";
	  echo "描述： ".$row['desc'];
	  echo "<br>";
	  echo "<hr>";

	}
}




?>
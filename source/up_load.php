<?php
//设置页面编码
// header("Content-Type: text/html;charset=utf-8");  
//引入函数和类
include 'functions.php';
include 'libs/excel_reader2.php';
//将临时上传文件复制到服务器文件夹下  
if(move_uploaded_file($_FILES['file']['tmp_name'],'up.xls'))  
    {echo '上传成功!';  
    }  
    else  
    {echo '上传失败!';}

echo '<br>';

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

//---------------读取、操作EXCEL----------------------- 
$data = new Spreadsheet_Excel_Reader();//新建EXCEL READER类     
$data->setOutputEncoding('UTF-8');//设置文本输出编码   
$data->read("up.xls");//读取excel
$count_sheet1_add=0;//插入记录计数器
$count_sheet1_mod=0;
$count_sheet2_add=0;
$count_sheet2_mod=0;

for ($i=2; $i <= $data->sheets[0]['numRows']; $i++) 
{//迭代对EXCEL每一行进行操作 
	$row_data=$data->sheets[0]['cells'][$i];//取一行的数据
	$ip_dec=ipstr2dec($row_data[1]);//计算IP十进制值
	$content=ip2astr($row_data[1],$row_data[2],$row_data[3]);//生成SQL插入文字
	$existsql = "SELECT ip_dec_begin FROM pro1_ip_looks_up WHERE ip_dec_begin='$ip_dec' LIMIT 1";
	$exist = mysql_query($existsql);  //执行SQL  
	if (!mysql_num_rows($exist))  //判断数据是否存在  
	{     
	    $dsql = "INSERT INTO pro1_ip_looks_up VALUES ($content)";  
	    $num = mysql_query($dsql);
	    $count_sheet1_add+=$num;//计数器增加条目
	}else{
		mysql_query("DELETE FROM pro1_ip_looks_up WHERE ip_dec_begin='$ip_dec'");
		$dsql = "INSERT INTO pro1_ip_looks_up VALUES ($content)";  
		$num = mysql_query($dsql);
		$count_sheet1_mod+=$num;//计数器增加条目
	}    

}

for ($j=2; $j <= $data->sheets[1]['numRows']; $j++) 
{//迭代对EXCEL每一行进行操作 
	$row_data_2=$data->sheets[1]['cells'][$j];//取一行的数据
	$ip_dec_2=ipstr2dec($row_data_2[1]);//计算IP十进制值
	$content_2=ip2ip2str($row_data_2[1],$row_data_2[2],$row_data_2[3],$row_data_2[4]);//生成SQL插入文字
	$existsql_2 = "SELECT ip_dec_begin FROM pro1_ip_looks_up WHERE ip_dec_begin='$ip_dec_2' LIMIT 1";
	$exist_2 = mysql_query($existsql_2);  //执行SQL  
	if (!mysql_num_rows($exist_2))  //判断数据是否存在  
	{     
	    $dsql = "INSERT INTO pro1_ip_looks_up VALUES ($content_2)";  
	    $num = mysql_query($dsql);
	    $count_sheet2_add+=$num;//计数器增加条目
	}else{
		mysql_query("DELETE FROM pro1_ip_looks_up WHERE ip_dec_begin='$ip_dec_2'");
		$dsql = "INSERT INTO pro1_ip_looks_up VALUES ($content_2)";  
		$num = mysql_query($dsql);
		$count_sheet2_mod+=$num;//计数器增加条目
	}    

}
//---------------读取、操作EXCEL----------------------- 

echo "修改数据库完成！共插入".$count_sheet1_add."条子网记录；修改".$count_sheet1_mod."条子网记录。<br>";
echo "修改数据库完成！共插入".$count_sheet2_add."条地址段记录；修改".$count_sheet2_mod."条地址段记录。<br>";


unlink('up.xls');//删除文件
echo "\n";  
echo '删除临时文件成功，操作完成！';
// header("refresh:5;url=../index.php"); //过5秒跳转  



//print_r() 打印变量结构
//unplink() 删除文件
//pow() 求幂
//dechex() hexdec() 十进制十六进制互换


  
?> 

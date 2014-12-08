<?php
//输入：IP地址 xxx.xxx.xxx.xxx，xxx.xxx.xxx.xxx/xx
//输出: IP地址十进制
function ipstr2dec($ip)
{
	$ip_secs=explode('/', $ip);
	$sec_arr=explode('.', $ip_secs[0]);

	$sec_a=$sec_arr[0];
	$sec_b=$sec_arr[1];
	$sec_c=$sec_arr[2];
	$sec_d=$sec_arr[3];

	$sec_a_hex=dechex($sec_a);
	$sec_b_hex=dechex($sec_b);
	$sec_c_hex=dechex($sec_c);
	$sec_d_hex=dechex($sec_d);

	strlen($sec_a_hex)!=2?$sec_a_hex='0'.$sec_a_hex:$sec_a_hex;
	strlen($sec_b_hex)!=2?$sec_b_hex='0'.$sec_b_hex:$sec_b_hex;
	strlen($sec_c_hex)!=2?$sec_c_hex='0'.$sec_c_hex:$sec_c_hex;
	strlen($sec_d_hex)!=2?$sec_d_hex='0'.$sec_d_hex:$sec_d_hex;

	$ip_hex=$sec_a_hex.$sec_b_hex.$sec_c_hex.$sec_d_hex;

	$ip_dec=hexdec($ip_hex);

	return $ip_dec;

}

//输入:IP地址 A段 B段 C段 D段
//输出:IP地址十进制
function ipnum2dec($a,$b,$c,$d)
{
	$sec_a_hex=dechex($a);
	$sec_b_hex=dechex($b);
	$sec_c_hex=dechex($c);
	$sec_d_hex=dechex($d);

	strlen($sec_a_hex)!=2?$sec_a_hex='0'.$sec_a_hex:$sec_a_hex;
	strlen($sec_b_hex)!=2?$sec_b_hex='0'.$sec_b_hex:$sec_b_hex;
	strlen($sec_c_hex)!=2?$sec_c_hex='0'.$sec_c_hex:$sec_c_hex;
	strlen($sec_d_hex)!=2?$sec_d_hex='0'.$sec_d_hex:$sec_d_hex;

	$ip_hex=$sec_a_hex.$sec_b_hex.$sec_c_hex.$sec_d_hex;

	$ip_dec=hexdec($ip_hex);

	return $ip_dec;

}

//输入:IP地址(SHEET1),描述,分类
//输出:SQL插入语句
function ip2astr($ip,$desc,$cate)
{
	$ip_secs=explode('/', $ip);

	$sec_arr=explode('.', $ip_secs[0]);
	empty($ip_secs[1])?$ip_sub=32:$ip_sub=$ip_secs[1];
	$sub_num=pow(2, 32-$ip_sub);

	$ip_dec_begin=ipstr2dec($ip_secs[0]);
	$ip_dec_end=$ip_dec_begin+$sub_num-1;

	$ret="'".$ip_secs[0]."',".$ip_sub.",".$sec_arr[0].",".$sec_arr[1].",".$sec_arr[2].",".$sec_arr[3].",".$sub_num.",'".$desc."',".$ip_dec_begin.",".$ip_dec_end.",'".$cate."',null";

	return $ret;
}

//输入:IP地址(SHEET1),描述,分类
//输出:SQL插入语句
function ip2ip2str($begin,$end,$cate,$desc)
{
	$ip_begin=ipstr2dec($begin);
	$ip_end=ipstr2dec($end);
	$ip_ran=$begin."--".$end;
	$sub_num=$ip_end-$ip_begin;

	$ret="'".$ip_ran."','null','null','null','null','null',".$sub_num.",'".$desc."',".$ip_begin.",".$ip_end.",'".$cate."',null";

	return $ret;
}

?>
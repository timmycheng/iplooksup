<?php
include 'source/functions.php';

echo ipstr2dec('192.168.1.1');
echo "<br/>";
echo ipnum2dec(192,168,1,1);
echo "<br/>";
echo ipstr2dec('192.168.1.0/24');
echo "<br/>";
echo ipstr2dec('192.168.1.154/30');
echo "<hr>";
echo "<br/>";
echo ipstr2dec('39.180.128.000');
echo "<br/>";
echo ipstr2dec('39.180.255.255');
echo "<br/>";
echo log(32767,2);
?>
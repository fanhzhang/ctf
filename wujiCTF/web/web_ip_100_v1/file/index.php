<?php
error_reporting(0);

function getIp(){
    $ip = '';
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
     $ip = $_SERVER['REMOTE_ADDR'];
}
   $ip_arr = explode(',', $ip);
   return $ip_arr[0];
}

$host="localhost";
$user="root";
$pass="";
$db="sangebaimao";

$connect = mysql_connect($host, $user, $pass) or die("Unable to connect");

mysql_select_db($db) or die("Unable to select database");

$ip = getIp();
echo 'your ip is :'.$ip;
$sql="insert into client_ip (ip) values ('$ip')";
mysql_query($sql);

?>
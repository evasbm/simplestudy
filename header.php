<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if(isset($_SESSION['views']))
  $_SESSION['views']=$_SESSION['views']+1;
else
  $_SESSION['views']=1;
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP TEST</title>
</head>

<body style="width:900px; height:700px; margin:20px auto; border-bottom: double #666 1px;">

<?php 
setcookie("users", "Eeva", time()+3600);
if (isset($_COOKIE["users"]))
  echo "欢迎您，" . $_COOKIE["users"] . "! ";
else
  echo "欢迎您，游客!";
echo "您是第". $_SESSION['views']."位访客。 "; 

function GetIP(){
  if(!empty($_SERVER["HTTP_CLIENT_IP"])){
  	$cip = $_SERVER["HTTP_CLIENT_IP"];
 	 }
  elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
 	 $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	 }
 elseif(!empty($_SERVER["REMOTE_ADDR"])){
 	 $cip = $_SERVER["REMOTE_ADDR"];
 	}
 else{
 	 $cip = "无法获取！";
 	}
 return $cip;
}
echo "IP为：" . GetIP();

	$ip=getip();
	date_default_timezone_set('PRC');
	$time=date("Y-m-d H:i:s");
	$str=$ip." ".$time;
	$file = fopen("views.txt","a");
	echo fwrite($file,"[".$_SESSION['views'].":".$str."]\r\n");
	fclose($file);
?>
<h1>上传TXT文档</h1>
<hr />
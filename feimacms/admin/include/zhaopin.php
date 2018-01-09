
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
	   echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
	}
$content = $_POST['content'];

$query="select * from hyzhaopin_table";
$result1=mysql_query($query);

if(mysql_num_rows($result1) == 1)
{
	$sql = " UPDATE hyzhaopin_table SET zhaopin_ziduan='$content' where id=10";

$result2 = mysql_query($sql);

if($result2) echo "<script language=\"JavaScript\">alert(\"招贤纳士内容提交成功！\");</script>";

mysql_close();

$url = "../zhaopin.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}	

else
{
$sql = "INSERT INTO hyzhaopin_table (zhaopin_ziduan) values('$content')";

$result3 = mysql_query($sql);

if($result3) echo "<script language=\"JavaScript\">alert(\"招贤纳士内容提交成功！\");</script>";

mysql_close();

$url = "../zhaopin.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}


?>
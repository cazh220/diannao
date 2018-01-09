
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
	   echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
	}
$qq = $_POST['qq'];

$query="select * from hykefu_table";
$result1=mysql_query($query);

if(mysql_num_rows($result1) == 1)
{
	$sql = " UPDATE hykefu_table SET kefu_ziduan='$qq'";

$result2 = mysql_query($sql);

if($result2) echo "<script language=\"JavaScript\">alert(\"在线客服QQ提交成功！\");</script>";

mysql_close();

$url = "../kefu.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}	

else
{
$sql = "INSERT INTO hykefu_table (kefu_ziduan) values('$qq')";

$result3 = mysql_query($sql);

if($result3) echo "<script language=\"JavaScript\">alert(\"在线客服QQ提交成功！\");</script>";

mysql_close();

$url = "../kefu.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}


?>
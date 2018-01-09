
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
	   echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
	}
$content = $_POST['content'];

$query="select * from hyjieshao_table";
$result1=mysql_query($query);

if(mysql_num_rows($result1) == 1)
{
	$sql = " UPDATE hyjieshao_table SET jieshao_ziduan='$content' where id=2";

$result2 = mysql_query($sql);

if($result2) echo "<script language=\"JavaScript\">alert(\"企业介绍内容提交成功！\");</script>";

mysql_close();

$url = "../jieshao.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}	

else
{
$sql = "INSERT INTO hyjieshao_table (jieshao_ziduan) values('$content'')";

$result3 = mysql_query($sql);

if($result3) echo "<script language=\"JavaScript\">alert(\"企业介绍内容提交成功！\");</script>";

mysql_close();

$url = "../jieshao.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}


?>
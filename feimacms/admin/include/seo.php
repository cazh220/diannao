
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");

	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
		echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
		}


$title = $_POST['title'];
$keywords = $_POST['keywords'];
$description = $_POST['description'];


$query="select * from hyseo_table";
$result1=mysql_query($query);

if(mysql_num_rows($result1) == 1)
{
	$sql = " UPDATE hyseo_table SET title_ziduan='$title',keywords_ziduan='$keywords',description_ziduan='$description'";

$result2 = mysql_query($sql);

if($result2) echo "<script language=\"JavaScript\">alert(\"网站SEO设置成功！\");</script>";

mysql_close();

$url = "../seo.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}	

else
{
$sql = "INSERT INTO hyseo_table (title_ziduan,keywords_ziduan,description_ziduan) values('$title','$keywords','$description')";

$result3 = mysql_query($sql);

if($result3) echo "<script language=\"JavaScript\">alert(\"网站SEO设置成功！\");</script>";

mysql_close();

$url = "../seo.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}


?>
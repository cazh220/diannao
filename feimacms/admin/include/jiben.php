
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");

	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
		echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
		}

$name = $_POST['mingcheng'];
$lxr = $_POST['lianxiren'];
$qq = $_POST['QQ'];
$tel = $_POST['tel'];
$fax = $_POST['fax'];
$shouji = $_POST['shouji'];
$email = $_POST['Email'];
$dizhi = $_POST['dizhi'];

$query="select * from hyxinxi_table";
$result1=mysql_query($query);

if(mysql_num_rows($result1) == 1)
{
	$sql = " UPDATE hyxinxi_table SET name_ziduan='$name',lxr_ziduan='$lxr',qq_ziduan='$qq',tel_ziduan='$tel',fax_ziduan='$fax',shouji_ziduan='$shouji',email_ziduan='$email',dizhi_ziduan='$dizhi' where id=7";

$result2 = mysql_query($sql);

if($result2) echo "<script language=\"JavaScript\">alert(\"基本信息提交成功！\");</script>";

mysql_close();

$url = "../jiben.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}	

else
{
$sql = "INSERT INTO hyxinxi_table (name_ziduan,lxr_ziduan,qq_ziduan,tel_ziduan,fax_ziduan,shouji_ziduan,email_ziduan,dizhi_ziduann) values('$name','$lxr','$qq','$tel','$fax','$shouji','$email','$dizhi')";

$result3 = mysql_query($sql);

if($result3) echo "<script language=\"JavaScript\">alert(\"基本信息提交成功！\");</script>";

mysql_close();

$url = "../jiben.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	
	}


?>
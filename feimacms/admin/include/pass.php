
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
		echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
		}
$txtpass = $_POST['pass1'];
$txtpass1 = $_POST['pass2'];
$txtpass2 = $_POST['pass3'];

$query="select * from hyzhanghao_table";
$result=mysql_query($query);
$row = mysql_fetch_array($result);

if($row['loginPass_ziduan'] != $txtpass)
{
	echo "<script language=\"JavaScript\">alert(\"原密码不对！\");window.location.href='../pass.php';</script>";
	}

if($txtpass1 != $txtpass2)
{
 echo "<script language=\"JavaScript\">alert(\"新密码两次输入不一样！\");window.location.href='../pass.php';</script>";
}

$up = "update hyzhanghao_table set loginPass_ziduan='$txtpass1'";
$rsup=mysql_query($up);
if($rsup != null)
{
 echo "<script language=\"JavaScript\">alert(\"密码修改成功！\");window.location.href='../pass.php';</script>";
	}
	else{
		   echo "<script language=\"JavaScript\">alert(\"密码修改失败！\");window.location.href='../pass.php';</script>";
		}

mysql_close();

?>
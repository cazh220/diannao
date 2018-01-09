<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
		echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
		}
$id = $_REQUEST['id'];

$sql = "delete from hyimg_table where id='$id'";

$result = mysql_query($sql);

if(!mysql_affected_rows()==0)
{
	echo "<script language=\"JavaScript\">alert(\"删除成功！\");window.location.href='../admintupian.php';</script>";
	}
else
{
	echo "<script language=\"JavaScript\">alert(\"删除失败！\");window.location.href='../admintupian.php';</script>";
	}


?>
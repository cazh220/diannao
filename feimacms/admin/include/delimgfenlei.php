<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
		echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
		}
$id = $_REQUEST['id'];

$query="select * from hyimg_table where fenlei_ziduan = '$id' ";
$result1=mysql_query($query);
$row = mysql_fetch_array($result1);
if($row != null)
{
  echo "<script language=\"JavaScript\">alert(\"该分类下有相关内容不能删除！\");window.location.href='../adminimgfenlei.php';</script>";
	}
	
	else
	{
		$sql = "delete from hyimgfenlei_table where id='$id'";

$result = mysql_query($sql);

if(!mysql_affected_rows()==0)
{
	echo "<script language=\"JavaScript\">alert(\"删除成功！\");window.location.href='../adminimgfenlei.php';</script>";
	}
else
{
	echo "<script language=\"JavaScript\">alert(\"删除失败！\");window.location.href='../adminimgfenlei.php';</script>";
	}
	
		}



?>
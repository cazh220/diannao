
<?php
header('Content-Type: text/html; charset=utf-8'); 
include("../../include/conn.php");
$loginname = $_POST['loginName'];
$loginpass = $_POST['loginPass'];

$sql = "SELECT * FROM hyZhanghao_table WHERE loginname_ziduan = '$loginname' and loginpass_ziduan='$loginpass'"; 
$res = mysql_query($sql); 
$rows = mysql_fetch_array($res); 
 
if($rows)
{  
session_start(); 
$_SESSION["hyId"] = $rows['id']; 
$_SESSION["hyZhanghao"] = $loginname; 

echo "<script language=\"JavaScript\">window.location.href='../index.php';</script>";
} 
else 
{ 
echo "<script language=javascript>alert('账号或密码错误，请重新登录！');history.back();</script>";
}


?>
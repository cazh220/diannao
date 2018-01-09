
<?php
header('Content-Type: text/html; charset=utf-8');
include("conn.php");

$xingming = $_POST['xingming'];
$tel = $_POST['tel'];
$QQ = $_POST['QQ'];
$Email = $_POST['Email'];
$biaoti = $_POST['biaoti'];
$neirong = $_POST['neirong'];
$date = date('Y-m-j');

$sql = "INSERT INTO hyliuyan_table (name_ziduan,tel_ziduan,qq_ziduan,email_ziduan,title_ziduan,content_ziduan,date_ziduan) values('$xingming','$tel','$QQ','$Email','$biaoti','$neirong','$date')";

$result = mysql_query($sql);

if($result) echo "<script language=\"JavaScript\">alert(\"留言提交成功！\");</script>";

mysql_close();

$url = "../liuyan.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";	

?>

<?php
header('Content-Type: text/html; charset=utf-8');
include("../../include/conn.php");
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
		echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
		}
function getname($exname){
   $dir = "../../upimg/";
   //目录名，可以自己改
      
   $showtime=date("YmdHis");
   if(!is_dir($dir)){
      mkdir($dir,0777);
      //如果不存在此目录，则创建，请保证您有相应的权限
   }
   while(true){
     if(!is_file($dir.$showtime.".".$exname)){
        $name=$showtime.".".$exname;
        break;
      } 
   }
   return $dir.$name;
}
$max=$_POST["MAX_FILE_SIZE"];
 
if($max<($_FILES['upfile']['size']))
   echo "<script> alert('图片大于2000000b！');history.back();</script>";
$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));//返回文件后缀名
if($exname=="jpg"||$exname=="bmp"||$exname=="jpeg"||$exname=="gif"||$exname=="png")
 {
$uploadfile = getname($exname);
$filename=strtolower(substr($uploadfile,(strrpos($uploadfile,'/')+1)));
if (move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile))
   {
	   
	$query="select * from hyjsimg_table";
    $result0=mysql_query($query);
    $row = mysql_fetch_array($result0);
    if($row != null)
      {
        $sql1 = " UPDATE hyjsimg_table SET jsimg_ziduan='$filename'";
        $result1 = mysql_query($sql1);
		if($result1) echo "<script language=\"JavaScript\">alert(\"图片提交成功！\");window.location.href='../jsimg.php';</script>";
	  }
	
	 else
	 {
		$sql2 = "INSERT INTO hyjsimg_table (jsimg_ziduan) values ('$filename')";

        $result2 = mysql_query($sql2);

        if($result2) echo "<script language=\"JavaScript\">alert(\"图片提交成功！\");window.location.href='../jsimg.php';</script>";
	 }


    mysql_close(); 
   }
else 
   {
   echo "<script> alert('图片提交失败！');history.back();</script>";
   }
 }
   else
   echo "<script> alert('图片格式错误！');history.back();</script>";
?>






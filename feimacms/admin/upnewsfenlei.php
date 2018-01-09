<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>网站管理中心</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/style.css">
</HEAD>
<BODY>
<?php
include("../include/conn.php");
if($_POST)
{
	$mingcheng = !empty($_POST['mingcheng']) ? trim($_POST['mingcheng']) : '';
	$id = !empty($_POST['id']) ? intval($_POST['id']) : '';
	$sql = "UPDATE hynewsfenlei_table SET fenleiname_ziduan='".$mingcheng."' WHERE id = ".$id;
	//echo $sql;die;
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>alert('更新分类成功');</script>";
	}
}

?>
<div class="top">
<div class="topTop">
<div class="topTopLeft">网站管理中心</div>
<div class="topTopRight">
<span>帐号：<?php 
	session_start(); 
	if($_SESSION["hyZhanghao"] == null)
	{
		echo "<script language=\"JavaScript\">window.location.href='login.php';</script>";
		}
		else
		{
			echo $_SESSION['hyZhanghao'];
			} ?></span><span><a href="../index.php" target="_blank">网站首页</a></span><span><a href="pass.php">修改密码</a></span><span><a href="login.php">退出管理</a></span>
</div>
</div>
</div>

<div class="main">
<div class="manage">
<div class="menu">
<div class="menuMax">网站信息</div>
<div class="menuMin"><a href="jiben.php">基本信息</a></div>
<div class="menuMin"><a href="jieshao.php">企业介绍</a></a></div>
<div class="menuMin"><a href="zhaopin.php">招贤纳士</a></a></div>
<div class="menuMax">网站配置</div>
<div class="menuMin"><a href="top.php">网站图片设置</a></div>
<div class="menuMin"><a href="kefu.php">在线客服设置</a></div>
<div class="menuMin"><a href="seo.php">网站SEO设置</a></div>
<div class="menuMax">新闻动态</div>
<div class="menuMin"><a href="addnews.php">添加新闻</a></div>
<div class="menuMin"><a href="adminnews.php">管理新闻</a></div>
<div class="menuMax">产品服务</div>
<div class="menuMin"><a href="addtupian.php">添加产品</a></div>
<div class="menuMin"><a href="admintupian.php">管理产品</a></div>
<div class="menuMax">留言管理</div>
<div class="menuMin"><a href="adminliuyan.php">留言管理</a></div>
</div>
  <?php
  
  $id = $_REQUEST['id'];
include("../include/conn.php");

$query="select * from hynewsfenlei_table where id=$id";
$result=mysql_query($query);

$row = mysql_fetch_array($result);

?>
<form action="" method="POST">
<div class="content">
<div class="contentTop">修改新闻分类</div>
<div class="addfenlei">
<div class="addfenleiLeft">分类名称：</div><div class="addfenleiRight"><input name="mingcheng" size="30" value="<?php  echo $row["fenleiname_ziduan"];?>">
<input type="hidden" name="id" value="<?php  echo $row["id"];?>" />
</div>
</div>
<div class="addfenleiBtn"><input name="submit" type="submit" value="提 交"></div>
</div>
</form>
   <?php 
mysql_free_result($result); 
mysql_close(); 
?>
</div>
</div>

<div class="bottom">
<div class="bottomMiddle">网站管理中心</div>
</div>

</BODY>
</HTML>

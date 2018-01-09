<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>网站管理中心</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/style.css">
        <style>
			form {
				margin: 0;
			}
			textarea {
				display: block;
			}
		</style>
		<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
		<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				});
			});
		</script>
</HEAD>
<BODY>

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
include("../include/conn.php");
$query="select zhaopin_ziduan from hyzhaopin_table";
$result=mysql_query($query);

$row = mysql_fetch_array($result);

?> 
<form action="include/zhaopin.php" method="post">
<div class="content">
<div class="contentTop">招贤纳士</div>
<div class="zhaopin">
<table width="700" align="center"><tr><td>
<textarea name="content" style="width:700px;height:500px;visibility:hidden;"><?php echo $row["zhaopin_ziduan"]; ?></textarea>
</td></tr></table>
</div>
<div class="zhaopinBtn"><input name="submit" type="submit" value="提 交"></div>
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

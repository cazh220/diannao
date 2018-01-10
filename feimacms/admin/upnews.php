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
        
         <script language="javascript">  
function Check() 
{  
    if (document.send.title.value=="")  
    {  
        alert('请输入标题!');  
          
        return false; 
    }  
    
    if (document.getElementsByName("newsFenlei")[0].value=="0")  
    {  
        alert('请选择分类!');  
          
        return false; 
    }  
	
    return true; 
}  
</script>
</HEAD>
<BODY>
<?php 
include("../include/conn.php");
if($_POST)
{
	$title = $_POST['title'] ? trim($_POST['title']) : '';
	$id = $_POST['id'] ? intval($_POST['id']) : '';
	$newsFenlei = $_POST['newsFenlei'] ? intval($_POST['newsFenlei']) : '';
	$content = $_POST['content'] ? trim($_POST['content']) : '';
	
	$sql = "UPDATE hynews_table SET title_ziduan = '".$title."', content_ziduan = '".$content."', fenlei_ziduan = '".$newsFenlei."' WHERE id = ".$id;
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>alert('更新新闻成功');</script>";
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

$query="select * from hynews_table where id=$id";
$result=mysql_query($query);

$row = mysql_fetch_array($result);

?>
<form action="" method="POST">
<div class="content">
<div class="contentTop">修改新闻</div>
<div class="news">
<div class="newsLeft">新闻标题：</div><div class="newsRight"><input name="title" size="60" value="<?php  echo $row["title_ziduan"];?>">
<input type="hidden" name="id" value="<?php  echo $row["id"];?>" />
</div>
</div>

<div class="news">
<div class="newsLeft">新闻分类：</div>
<div class="newsFenleiRight">
<select name="newsFenlei">
<option value="0">请选择分类</option>
    <?php
                            include("../include/conn.php");
                            $exec="select * from hynewsfenlei_table";
                            $result=mysql_query($exec);
                            while($rs=mysql_fetch_object($result)){
                                $id=$rs->id;
                                $fenleiname=$rs->fenleiname_ziduan;                   
                        ?>
<option value="<?php echo $id ;?>"><?php echo $fenleiname ;?></option>
       <?php
             }
       ?>
</select>
</div>
<div class="newsFenlei"><span><a href="addnewsfenlei.php">添加分类</a></span><span><a href="adminnewsfenlei.php">管理分类</a></span></div>
</div>
<div class="news">
<div class="newsLeft">新闻内容：</div><div class="newsRight"><textarea name="content" style="width:80%;height:450px;visibility:hidden;"><?php  echo $row["content_ziduan"];?></textarea></div>
</div>
<div class="newsBtn"><input name="submit" type="submit" value="提 交"></div>
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

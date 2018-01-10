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
        alert('请输入产品名称!');  
          
        return false; 
    }  
    
    if (document.getElementsByName("tupianFenlei")[0].value=="0")  
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
if($_POST)
{
	$upfile = $_POST['upfile'] ? trim($_POST['upfile']) : '';
	$title = $_POST['title'] ? trim($_POST['title']) : '';
	$tupianFenlei = $_POST['tupianFenlei'] ? intval($_POST['tupianFenlei']) : '';
	$content  = $_POST['content'] ? trim($_POST['content']) : '';
	
	$sql = "INSERT INTO hyimg_table(title_ziduan, content_ziduan, date_ziduan, img_ziduan, fenlei_ziduan)VALUES('".$title."', '".$content."', '".$upfile."', '".$tupianFenlei."')";
	echo $sql;die;
	$result=mysql_query($sql);
	if($result)
	{
		echo "<script>alert('添加成功');</script>";
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

<form action="" method="POST">
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

<div class="content">
<div class="contentTop">添加产品</div>
<div class="qiyeTupian">
<div class="qiyeTupianLeft">产品图片：</div><div class="qiyeTupianRight">
<input type="file" size="40" name="upfile">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
</div>
</div>
<div class="qiyeTupian">
<div class="qiyeTupianLeft">产品名称：</div><div class="qiyeTupianRight"><input name="title" size="40"></div>
</div>
<div class="qiyeTupian">
<div class="qiyeTupianLeft">新闻分类：</div>
<div class="tupianFenleiLeft">
<select name="tupianFenlei">
<option value="0">请选择分类</option>
    <?php
                            include("../include/conn.php");							
                            $exec="select * from hyimgfenlei_table";
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
<div class="tupianFenleiRight"><span><a href="addimgfenlei.php">添加分类</a></span><span><a href="adminimgfenlei.php">管理分类</a></span></div>
</div>
<div class="qiyeTupian">
<div class="qiyeTupianLeft">产品说明：</div><div class="qiyeTupianRight"><textarea name="content" style="width:80%;height:450px;visibility:hidden;"></textarea></div>
</div>
<div class="qiyeTupianBtn"><input name="submit" type="submit" value="提 交"></div>
</div>

</div>
</div>
</form>
<div class="bottom">
<div class="bottomMiddle">网站管理中心</div>
</div>

</BODY>
</HTML>

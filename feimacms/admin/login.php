<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>网站管理中心登陆</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/style.css">
<script language="javascript">  
function Check() 
{  
    if (document.send.loginName.value=="")  
    {  
        alert('请输入帐号!');  
          
        return false; 
    }  
    
    if (document.send.loginPass.value=="")  
    {  
        alert('请输入密码!');  
          
        return false; 
    }  
	
    return true; 
}  
</script>
</HEAD>
<BODY>
<?php 
session_start(); 
unset($_SESSION['hyId']); 
unset($_SESSION['hyZhanghao']);
?>


<div style=" margin:auto; margin-top:180px; width:300px;border:1px solid #CCCCCC; height:280px;">

<form action="include/login.php" method="post" name="send" onSubmit="return Check()">
<div style=" width:300px; float:left; height:280px;">
<div style=" width:300px; height:60px; line-height:60px; text-align:center; font-size:16px; font-weight:bold; float:left;">网站管理中心登陆</div>
<div style=" width:290px; float:left; height:50px; margin-left:10px;">帐号：<input name="loginName" size="30" /></div>
<div style=" width:290px; float:left; height:50px; margin-left:10px;">密码：<input name="loginPass" size="32" type="password"  /></div>
<div style=" width:300px; float:left; text-align:center;"><input type="image" src="images/login.gif"></div>
</div>
</form>

</div>



</BODY>
</HTML>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<?php
  
$id = $_REQUEST['id'];
include("include/conn.php");
$queryImg="select * from hyimg_table where id=$id";
$resultImg=mysql_query($queryImg);
$rowImg = mysql_fetch_array($resultImg);

?>
<TITLE><?php echo $rowImg['title_ziduan']?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/style.css">
<?php

$queryKefu="select * from hykefu_table";
$resultKefu=mysql_query($queryKefu);
$rowKefu = mysql_fetch_array($resultKefu);

?>
<script type="text/javascript"> 
lastScrollY=0;
function heartBeat(){ 
var diffY;
if (document.documentElement && document.documentElement.scrollTop)
    diffY = document.documentElement.scrollTop;
else if (document.body)
    diffY = document.body.scrollTop
else
    {} 
percent=.1*(diffY-lastScrollY); 
if(percent>0)percent=Math.ceil(percent); 
else percent=Math.floor(percent); 
document.getElementById("lovexin12").style.top=parseInt(document.getElementById("lovexin12").style.top)+percent+"px";

lastScrollY=lastScrollY+percent; 
}
suspendcode12="<DIV id=\"lovexin12\" style='right:22px;POSITION:absolute;TOP:180px;z-index:100'>";
var recontent='<a href="tencent://message/?uin=<?php echo $rowKefu["kefu_ziduan"];?>&Site=在线咨询&Menu=yes">' + 
'<img src="images/qqkefu.png" border=0>' + 
'</a>';

document.write(suspendcode12); 
document.write(recontent); 
document.write("</div>"); 
window.setInterval("heartBeat()",1);

function setfrme()
{
    var tr=document.getElementById("lovexin12");
    var twidth=tr.clientWidth;
    var theight=tr.clientHeight;
    var fr=document.getElementById("frame55la");
    fr.width=twidth-1;
    fr.height=theight-30;
}
</script>
</HEAD>
<BODY>
<div class="top">
<div class="topBar">
<?php 
$queryTopImg="select * from hyTopImg_table";
$resultTopImg=mysql_query($queryTopImg);
$rowTopImg = mysql_fetch_array($resultTopImg);

?>
<div class="topBanner"><img src="upimg/<?php echo $rowTopImg["topimg_ziduan"];?>" width="1000" height="120"></div>

</div>
<div class="topDaohang">
<div class="topDaohangBar">
<div class="topDaohangTxt"><a href="./">网站首页</a></div>
<div class="topDaohangTxt"><a href="jieshao.php">企业介绍</a></div>
<div class="topDaohangTxt"><a href="wenzhang.php">新闻动态</a></div>
<div class="topDaohangTxt"><a href="tupian.php">产品服务</a></div>
<div class="topDaohangTxt"><a href="zhaopin.php">招贤纳士</a></div>
<div class="topDaohangTxt"><a href="liuyan.php">在线留言</a></div>
<div class="topDaohangTxt"><a href="lianxi.php">联系方式</a></div>
</div>
</div>
</div>

<div class="main">

<div class="content">
<div class="contentLeft">
<?php	

$queryImgFenleiList="select * from hyimgfenlei_table";
$resultImgFenleiList=mysql_query($queryImgFenleiList);
while($rs=mysql_fetch_object($resultImgFenleiList)){
$id=$rs->id;
$fenleiname=$rs->fenleiname_ziduan;                   
?>
<div class="contentLeftList"><a href="tupianfenlei.php?id=<?php echo $id ;?>"><?php echo $fenleiname ;?></a></div>
<?php
}
?>
</div>
<div class="contentRight">
<?php 
$fenleiId = $rowImg['fenlei_ziduan'];
$queryImgFenlei="select * from hyimgfenlei_table where id=$fenleiId";
$resultImgFenlei=mysql_query($queryImgFenlei);
$rowImgFenlei = mysql_fetch_array($resultImgFenlei);
?>
<div class="contentRightTop">产品服务 >> <?php echo $rowImgFenlei['fenleiname_ziduan']?></div>
<div class="tpTitle"><?php echo $rowImg['title_ziduan']?></div>
<div class="tpTupian"><div class="tpTupianTupian"><img src="upimg/<?php echo $rowImg['img_ziduan']?>" width="500" height="500"></div></div>
<div class="tpContent"><?php echo $rowImg['content_ziduan']?></div>
</div>
</div>

</div>

<div class="bottom">
<div class="bottomMiddle">
<span><a href="./">网站首页</a></span>
<span><a href="jieshao.php">企业介绍</a></span>
<span><a href="wenzhang.php">新闻动态</a></span>
<span><a href="tupian.php">产品服务</a></span>
<span><a href="zhaopin.php">招贤纳士</a></span>
<span><a href="liuyan.php">在线留言</a></span>
<span><a href="lianxi.php">联系方式</a></span>
</div>
<div class="bottomBar">Copyright © <a href="http://www.feimacms.com" target="_blank">FeimaCMS</a> <a href="http://www.feimacms.com" target="_blank">飞马企业网站系统</a>&nbsp;&nbsp;&nbsp;<a href="admin/login.php">网站后台管理</a></div>
</div>
<?php 
mysql_free_result($resultImg); 
mysql_free_result($resultKefu); 
mysql_free_result($resultTopImg); 
mysql_free_result($resultImgFenleiList); 
mysql_free_result($resultImgFenlei); 
mysql_close(); 
?>
</BODY>
</HTML>

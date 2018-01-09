<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<?php  

include("include/conn.php");

?>
<TITLE>企业图片</TITLE>
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
<div class="contentRightTop">产品服务</div>
<?php 

$Page_size=20; 
$result=mysql_query("select * from hyimg_table"); 
$count = mysql_num_rows($result); 
$page_count = ceil($count/$Page_size); 

$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 

//判断当前页码 
if(empty($_GET['page'])||$_GET['page']<0){ 
$page=1; 
}else { 
$page=$_GET['page']; 
} 

$offset=$Page_size*($page-1); 
$sql="select * from hyimg_table limit $offset,$Page_size"; 
$result=mysql_query($sql); 
while ($row=mysql_fetch_array($result)) { 
?>
<div class="tpList">
<div class="tpListTupian"><a href="tpxx.php?id=<?php echo $row['id']?>"><img src="upimg/<?php echo $row['img_ziduan']?>" width="165" height="165"></a></div>
<div class="tpListText"><a href="tpxx.php?id=<?php echo $row['id']?>"><?php echo mb_substr($row['title_ziduan'],0,11,"utf-8");?></a></div>
</div>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 

$key='<div class="page">'; 
$key.="<span>$page/$pages</span> "; //第几页,共几页 
if($page!=1){ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">第一页</a> "; //第一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页 
}else { 
$key.="第一页 ";//第一页 
$key.="上一页"; //上一页 
} 
if($pages>$page_len){ 
//如果当前页小于等于左偏移 
if($page<=$pageoffset){ 
$init=1; 
$max_p = $page_len; 
}else{//如果当前页大于左偏移 
//如果当前页码右偏移超出最大分页数 
if($page+$pageoffset>=$pages+1){ 
$init = $pages-$page_len+1; 
}else{ 
//左右偏移都存在时的计算 
$init = $page-$pageoffset; 
$max_p = $page+$pageoffset; 
} 
} 
} 
for($i=$init;$i<=$max_p;$i++){ 
if($i==$page){ 
$key.=' <span>'.$i.'</span>'; 
} else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>"; 
} 
} 
if($page!=$pages){ 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页 
}else { 
$key.="下一页 ";//下一页 
$key.="最后一页"; //最后一页 
} 
$key.='</div>'; 
?> 
<div class="tpListFenye"><?php echo $key?></div>
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
mysql_free_result($resultTopImg); 
mysql_free_result($resultKefu); 
mysql_free_result($resultImgFenleiList); 
mysql_close(); 
?>
</BODY>
</HTML>

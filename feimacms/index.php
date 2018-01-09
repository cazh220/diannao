<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<?php


include("include/conn.php");

$querySeo="select * from hyseo_table";
$resultSeo=mysql_query($querySeo);
$rowSeo = mysql_fetch_array($resultSeo);

?>
<TITLE><?php echo $rowSeo["title_ziduan"];?></TITLE>
<META name="keywords" content="<?php echo $rowSeo["keywords_ziduan"];?>">
<META name="description" content="<?php echo $rowSeo["description_ziduan"];?>">
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/style.css">
<style type="text/css">
<!--
#demo {
overflow:hidden;
margin:auto;
width: 988px;
}
#indemo {
float: left;
width: 1000%;
}
#demo1 {
float: left;
}
#demo2 {
float: left;
}
-->
</style>
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
<?php 
$queryBanner="select * from hybanner_table";
$resultBanner=mysql_query($queryBanner);
$rowBanner = mysql_fetch_array($resultBanner);

?>
<div class="banner">
<script type="text/javascript"> 
var pic_width=1000;var pic_height=325;
var swfurl = "images/player.swf";
var imag=new Array();
var link=new Array();
imag[1]="upimg/<?php echo $rowBanner["banner1_ziduan"];?>";
link[1]=escape("");
imag[2]="upimg/<?php echo $rowBanner["banner2_ziduan"];?>";
link[2]=escape("");
imag[3]="upimg/<?php echo $rowBanner["banner3_ziduan"];?>";
link[3]=escape("");
//可编辑内容结束
var pics="", links="", texts="";
for(var i=1; i<imag.length; i++)
{
pics=pics+("|"+imag[i]);
links=links+("|"+link[i]);
}
pics=pics.substring(1);
links=links.substring(1);
texts=texts.substring(1);
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabversion=6,0,0,0" width="'+ pic_width +'" height="'+ pic_height +'">');
document.write('<param name="movie" value="'+swfurl+'">');
document.write('<param name="quality" value="high"><param name="wmode" value="opaque">');
document.write('<param name="FlashVars" value="bcastr_file='+pics+'&bcastr_link='+links+'">');
document.write('<embed src="'+swfurl+'" wmode="opaque" FlashVars="bcastr_file='+pics+'&bcastr_link='+links+'" menu="false" quality="high" width="'+ pic_width +'" height="'+ pic_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');
</script>
</div>

<div class="jieshao">
<div class="jieshaoTop">
<div class="jieshaoTopLeft">企业介绍</div>
<div class="jieshaoTopRight"><a href="jieshao.php"><img src="images/more.gif" width="36" height="11" border="0"></a></div>
</div>
<?php 
$queryJsImg="select * from hyjsimg_table";
$resultJsImg=mysql_query($queryJsImg);
$rowJsImg = mysql_fetch_array($resultJsImg);

?>
<div class="jieshaoLogo"><img src="upimg/<?php echo $rowJsImg["jsimg_ziduan"];?>" width="330" height="270"></div>

<div class="jieshaoText">
<?php 
$queryJieshao="select * from hyjieshao_table";
$resultJieshao=mysql_query($queryJieshao);
$rowJieshao = mysql_fetch_array($resultJieshao);
echo mb_substr($rowJieshao['jieshao_ziduan'],0,435,"utf-8");
?>
</div>
</div>

<div class="tupian">
<div class="tupianTop">
<div class="tupianTopLeft">产品服务</div>
<div class="tupianTopRight"><a href="tupian.php"><img src="images/more.gif" width="36" height="11" border="0"></a></div>
<div id="demo">
<div id="indemo">
<div id="demo1">
    <?php
                            $queryImg="select * from hyimg_table order by id desc limit 20";
                            $resultImg=mysql_query($queryImg);
                            while($rs=mysql_fetch_object($resultImg)){
                                $id=$rs->id;
                                $title=$rs->title_ziduan;  
								$img=$rs->img_ziduan;                  
                        ?>
<div class="tupianList">
<div class="tupianListTupian"><a href="tpxx.php?id=<?php echo $id ;?>"><img src="upimg/<?php echo $img ;?>" width="200" height="200"></a></div>
<div class="tupianListText"><a href="tpxx.php?id=<?php echo $id ;?>"><?php  echo mb_substr($title,0,13,"utf-8");?></a></div>
</div>
       <?php
             }
       ?>

</div>
<div id="demo2"></div>
</div>
</div>
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
<script>
<!--
var speed=10;
var tab=document.getElementById("demo");
var tab1=document.getElementById("demo1");
var tab2=document.getElementById("demo2");
tab2.innerHTML=tab1.innerHTML;
function Marquee(){
if(tab2.offsetWidth-tab.scrollLeft<=0)
tab.scrollLeft-=tab1.offsetWidth
else{
tab.scrollLeft++;
}
}
var MyMar=setInterval(Marquee,speed);
tab.onmouseover=function() {clearInterval(MyMar)};
tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
-->
</script>
<?php 
mysql_free_result($resultSeo); 
mysql_free_result($resultKefu); 
mysql_free_result($resultTopImg); 
mysql_free_result($resultBanner); 
mysql_free_result($resultJsImg); 
mysql_free_result($resultJieshao); 
mysql_free_result($resultImg); 
mysql_close(); 
?>
</BODY>
</HTML>

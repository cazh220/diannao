
<?php

$linkData=@mysql_connect("localhost","root","");

mysql_query("SET NAMES 'utf8'");

if(!$linkData)
{
   echo "数据库连接出错";
}

$link=@mysql_select_db("computer");

if(!$link)
{
   echo "找不到数据库";
}

?>
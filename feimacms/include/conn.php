
<?php

$linkData=@mysql_connect("localhost","root","");

mysql_query("SET NAMES 'utf8'");

if(!$linkData)
{
   echo "���ݿ����ӳ���";
}

$link=@mysql_select_db("computer");

if(!$link)
{
   echo "�Ҳ������ݿ�";
}

?>
<?php
//��Ʈw�]�w
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "123456";
$dbName = "aj";

 /*$dbServer = "sql100.byethost7.com";
$dbUser = "b7_17601572";
$dbPass = "z147852";
$dbName = "b7_17601572_aj";
 */
//�s�u��Ʈw���A��
$conn = @mysql_connect($dbServer, $dbUser, $dbPass);

if (@mysql_connect($conn))
{
  die("�L�k�s�u��Ʈw���A��</BR>");
}
else 
{
}
//�s�u��Ʈw
if (!@mysql_select_db($dbName))
{
  die("�L�k�s�u��Ʈw");
}
else 
{
}
//�]�w�s�u���r������ UTF8 �s�X
mysql_query("SET NAMES  utf8");
?>
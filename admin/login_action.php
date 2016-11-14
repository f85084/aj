<?
session_start();	
include ('mydb.php');
$url1 = "login.php";
$url2 = "message_manage.php";
if($_POST[name])
{
$_SESSION['name']=$_POST[name];
$_SESSION['password']=$_POST[password];
}
    $sql="select * from user where name='$_SESSION[name]' and password='$_SESSION[password]'";
	$result=mysql_query($sql);
if (!$row=mysql_fetch_array($result))
{
echo "<script>alert('登入失敗!')</script>";
echo "<script>window.location.href = '$url1'</script>";
	//die();
	}
else
	{
echo "<script>alert('登入成功!')</script>";
echo "<script>window.location.href = '$url2'</script>";
	
	}	

/*if ($_GET[id]=='root')
{
$_SESSION['flag']='1';
header("location: manage2.php");
}*/
?>
<!DOCTYPE html>
<html lang=en><head><meta charset=utf-8>
<title>留言</title>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<meta name=description content=""><meta name=author content="">
<link href=http://f85084.github.io/css.css  rel=stylesheet>


<style>
/*整體字型、背景*/
body{
	font-family: Arial, 微軟正黑體;
	}
</style>
<!--<link href=/Content/BS2/bootstrap-responsive.css rel=stylesheet> -->
<!--[if lt IE 9]><script src=~/Scripts/BS2/html5shiv.js></script><![endif]-->

<body>
</body>
</html>

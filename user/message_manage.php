<?
//資料庫檔案
include ('mydb.php');	
    // 刪除
    if ($_GET['del']) {
    $a=$_GET['del'];
    $d="delete from member where id=$a";
    mysql_query($d);
    //異動會顯示異動資料
    echo '成功幾筆<br>'.mysql_affected_rows();
    }
	
    $sql = "SELECT * FROM  `member` ORDER BY  `member`.`sedtime` ASC ";

    // 回傳結果
    $result=mysql_query($sql);
$baby=array(0=>'是',1=>'否')	;
$vegetarian=array(0=>'是',1=>'否')	;

	?>

<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <!--<link rel=icon href=/Content/AssetsBS3/img/favicon.ico>-->
    <title>後台</title>
    <link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css rel=stylesheet>
    <link href=/aj/css/management.css rel=stylesheet>
    <!--[if lt IE 9]><script src=~/Scripts/AssetsBS3/ie8-responsive-file-warning.js></script><![endif]-->
    <script src=/aj/css/management.js></script>
    <!--[if lt IE 9]><script src=https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js></script><script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script><![endif]-->
    <!-- Theme CSS -->
    <link href="/aj/css/other.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role=navigation>
            <div class=container-fluid>
                <div class=navbar-header><button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target=#navbar aria-expanded=false aria-controls=navbar> 
					<span class=sr-only>Toggle navigation</span> <span class=icon-bar></span> 
					<span class=icon-bar></span> <span class=icon-bar></span> </button> 
                <a class="navbar-branda page-scroll" href="../index.php">Jack & Anna</a>	
					</div>
                <!--<div id=navbar class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=#>Dashboard</a>
                        <li><a href=#>Settings</a>
                        <li><a href=#>Profile</a>
                        <li><a href=#>Help</a></ul>
                    <!--<form class="navbar-form navbar-right"><input class=form-control placeholder=Search...></form>-->
                <!--</div>-->
            </div>
        </nav>
        <div class=container-fluid>
            <div class=row>
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <!--<li class=active><a href=#>Overview <span class=sr-only>(current)</span></a>-->
                            <li><a href=message_manage.php>人員名單</a></li>
                            <!--<li><a href=photo_manage.php>照片管理</a></li>
                            <li><a href=photo_add.php>新增照片</a></li></ul>-->

                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!--    // 表格表題-->
<div class='table-responsive'>
 <table class='table table-striped'>
    <tr>
        <td data-th align="center">編號</td>
        <td data-th align="center">姓名</td>
        <td data-th align="center">電話</td>
        <td data-th align="center">地址</td>
        <td data-th align="center">人數</td>
        <td data-th align="center">小孩</td>
        <td data-th align="center">素食</td>
        <td data-th align="center">訊息</td>
        <td data-th align="center">時間</td>
    </tr>
<!--    // 表格內容-->

    <?while ($row=mysql_fetch_array($result)) {?>
    <tr>
        <td data-th align="center"><?=$row['id']?></td>
        <td data-th align="center"><?=$row['name']?></td>
        <td data-th align="center"><?=$row['phone']?></td>
        <td data-th align="center"><?=$row['address']?></td>
        <td data-th align="center"><?=$row['people']?></td>
        <td data-th align="center"><?=$baby[$row['baby']]?></td>
        <td data-th align="center"><?=$vegetarian[$row['vegetarian']]?></td>
        <td data-th align="center"><?=$row['message']?></td>
        <td data-th align="center"><?=$row['sedtime']?></td>
    </tr>
   <? }?>
</table>

</div>
                </div>
            </div>
        </div>
        <script src=https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js></script>
        <script src=/aj/css/management-docs.min.js></script>
        <script src=/aj/css/management-ie10-viewport-bug-workaround.js></script>
	</body>
</head>
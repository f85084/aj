<?
//資料庫檔案
include ('mydb.php');
//定義存放上傳檔案的目錄
$upload_dir='../photo/';
//如果錯誤代碼為 UPLOAD_ERR_OK, 表示上傳成功
if($_FILES['photo']['error'] == UPLOAD_ERR_OK ) {
$fname = iconv('UTF-8', 'big5',
$_FILES['photo']['name']);
//將暫存檔搬移到上傳目錄, 並且改回原始檔名
if(move_uploaded_file($_FILES['photo']['tmp_name'],
$upload_dir . $fname)){
//顯示上傳檔案的相關訊息
echo '上傳成功...';
}
}
else
echo "上傳失敗";	
// 新增
$photo=$_FILES['photo']['name'];
$text=$_POST['text'];		
$del=$_POST['del'];
$date=$_POST['date'];
$sql="INSERT photo (photo,text,del,date)
VALUES ('{$photo}','{$text}','0',sysdate())";
$result=mysql_query($sql);

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

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role=navigation>
            <div class=container-fluid>
                <div class=navbar-header><button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target=#navbar aria-expanded=false aria-controls=navbar> <span class=sr-only>Toggle navigation</span> <span class=icon-bar></span> <span class=icon-bar></span> <span class=icon-bar></span> </button> <a class=navbar-brand href=#>Project name</a></div>
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
                            <li><a href=message_manage.php>留言管理</a></li>
                            <li><a href=photo_manage.php>照片管理</a></li>
                            <li><a href=photo_add.php>新增照片</a></li></ul>

                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class=page-header>新增相片</h1>
                    <form name="form" id="contactForm" action="" enctype="multipart/form-data" method="post"  >
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
							<div class="form-group">
								<label>上傳照片</label>
								<input type="file" name="photo" id="exampleInputFile"   placeholder="上傳照片"> 
								<p class="help-block">會員圖片</p>
							</div>
                                <div class="form-group">
									<label>想說的話</label>									
                                    <textarea class="form-control" placeholder="想說的話" id="text"  name="text"  style="height:100px;" required data-validation-required-message="請輸入訊息."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>																									
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">送 出</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src=https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js></script>
        <script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js></script>
        <script src=/aj/css/management-docs.min.js></script>
        <script src=/aj/css/management-ie10-viewport-bug-workaround.js></script>
	</body>
</head>
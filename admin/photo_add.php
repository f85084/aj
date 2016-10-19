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
}
}
else
echo "上傳失敗";	
// 新增
if(!empty($_POST['act']) && $_POST['act']=='add'){
$photo=$_FILES['photo']['name'];
$title=$_POST['title'];		
$content=$_POST['content'];		
$del=$_POST['del'];
$date=$_POST['date'];
if(empty($error)){ 
$sql="INSERT photo (photo,title,content,del,date)
VALUES ('{$photo}','{$title}','{$content}','0',sysdate())";
$result=mysql_query($sql);
	$error='ok';	 
	 	}	
		}
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>後台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/aj/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="/aj/css/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <!--<link href="/aj/css/dataTables.bootstrap.css" rel="stylesheet">-->
    <!-- DataTables Responsive CSS -->
    <!--<link href="/aj/css/responsive.dataTables.scss" rel="stylesheet">-->
    <!-- Custom CSS -->
    <link href="/aj/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/aj/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Theme CSS -->
    <link href="/aj/css/other.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!--目錄-->
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="../index.php">An</a>-->
                <a class="navbar-branda page-scroll" href="../index.php">Jack & Anna</a>	
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
					                            <!-- /input-group -->
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
							</li>-->

                        <li>
                            <a href="#"><i class="fa fa-files-o fa-user"></i> 留言管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="message_manage.php">留言列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-user"></i> 照片專區<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="photo_add.php">新增照片</a>
                                </li>
                                <li>
                                    <a href="photo_manage.php">照片列表</a>
                                </li>
                            </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!--目錄-->
        <!--內容B-->
        <div id="page-wrapper">
        <!-- /#page-wrapper -->
                <div class="col-md-12 col-md-offset-0">
                    <h1 class=page-header>新增相片<?$sql?></h1>
                    <form name="form" id="contactForm" action="" enctype="multipart/form-data" method="post"  >
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
							<div class="form-group">
								<label>上傳照片</label>
								<input type="file" name="photo" id="exampleInputFile"   placeholder="上傳照片"> 
							</div>
                                <div class="form-group">
									<label>標題</label>									
                                    <input type="text" class="form-control" placeholder="標題" id="title"  name="title"  required data-validation-required-message="請輸入訊息."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>   
								<div class="form-group">
									<label>內容</label>									
                                    <textarea class="form-control" placeholder="內容" id="content"  name="content"  style="height:100px;" required data-validation-required-message="請輸入訊息."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>																									
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">送 出</button>
								<input type="hidden" name="act" value="add" />								
                            </div>
                        </div>
                    </form>
                </div>
</div>     
</div>
            <!--內容S-->
    <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="/aj/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/aj/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="/aj/js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <!--<script src="/aj/js/jquery.dataTables.min.js"></script>
        <script src="/aj/js/dataTables.bootstrap.min.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="/aj/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });

            });
        </script>
<? if($error=='ok'){?>
<script>
alert('新增成功');
window.location.href = 'photo_manage.php';
</script>
<? }elseif(!empty($error)){?>
<script>
alert('<?=$error?>');
history.go(-1)
</script>
<? }?>
</body>

</html>

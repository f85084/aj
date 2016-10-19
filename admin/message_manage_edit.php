<?
//資料庫檔案
include ('mydb.php');
$id=$_GET['id'];

// 新增 
if(!empty($_POST['act']) && $_POST['act']=='add'){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$people=$_POST['people'];
	$baby=$_POST['baby'];
	$vegetarian=$_POST['vegetarian'];
	$message=$_POST['message'];
	$sedtime=$_POST['sedtime'];
	
	if(empty($error)){ 
    $sql="UPDATE member set name='$name',phone='$phone',address='$address',people='$people',baby='$baby',vegetarian='$vegetarian',message='$message' where id='$id'";
		$result=mysql_query($sql);
	$error='ok';	 
	 	}	
		}

$baby=array(0=>'是',1=>'否')	;
$vegetarian=array(0=>'是',1=>'否')	;

$sql_photo = "SELECT * FROM  `photo` where del='0' ORDER BY  `id` DESC ";
$result_photo=mysql_query($sql_photo);

$sql_photo_co = "SELECT * FROM  `photo` where del='0' ORDER BY  `id` DESC";
$result_photo_co=mysql_query($sql_photo_co);		

$sql_member = "SELECT * FROM  member where id='$id'";
// 回傳結果
$result_member=mysql_query($sql_member);
$row_member=mysql_fetch_array($result_member);
	
	
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
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!--目錄-->
        <!--內容B-->
        <div id="page-wrapper" style="padding-top: 10px;">
        <!-- /#page-wrapper -->
        <div class="col-md-12 col-md-offset-0">
    <!-- Contact Section 問券 -->
     <section id="contact">
            <h3 style="margin-top: 10px;">修改資料</h3>			
                <form name="form" id="contactForm" action="" enctype="multipart/form-data" method="post"  >
					<div class="form-group">
						<label>姓名</label>
						<input type="text" class="form-control" value="<?=$row_member['name']?>" id="name"  name="name" required data-validation-required-message="請輸入姓名.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group">
						<label>電話</label>									
						<input type="tel" class="form-control" value="<?=$row_member['phone']?>" id="phone"   name="phone" required data-validation-required-message="請輸入電話.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group">		
					<label>人數</label>																	
					<select name="people" id="people" class="form-control">
						<option ><?=$row_member['people']?></option>
						<? for ($i=1; $i<=6; $i++) {?>
						<option value="<?=$i?>"><?= $i; ?></option>
						<? } ?>
					</select>								
					</div>									
					<div class="form-group">	
						<label>是否有小孩</label>									
						<select name="baby" id="baby" class="form-control">
						<option ><?=$baby[$row_member['baby']]?></option>
						<?foreach($baby as $key => $value){?>
						<option value="<?=$key?>"><?= $value; ?></option>					
						<?}?>
						</select>								
					</div>									
					<div class="form-group">	
						<label>是否有吃素</label>									
						<select name="vegetarian" id="vegetarian" class="form-control">
						<option ><?=$vegetarian[$row_member['vegetarian']]?></option>
						<?foreach($vegetarian as $key => $value){?>
						<option value="<?=$key?>"><?= $value; ?></option>					
						<?}?>
						</select>								
					</div>														
					<div class="form-group">
						<label>地址</label>									
						<input type="text" class="form-control" value="<?=$row_member['address']?>" name="address" id="address" required data-validation-required-message="請輸入地址.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group">
						<label>想說的話</label>									
						<textarea class="form-control"  id="message"  name="message"  required data-validation-required-message="請輸入訊息."><?=$row_member['message']?></textarea>
						<p class="help-block text-danger"></p>
					</div>
					<div class="clearfix"></div>
					<div class="col-lg-12 text-center">
						<div id="success"></div>
						<button type="submit" class="btn btn-outline btn-primary">送 出</button>
						<input type="hidden" name="act" value="add" />								
					</div>
					<br>
				</form>
        </div>
    </section>
</div>     
</div>
</div>

<? if($error=='ok'){?>
<script>
alert('新增成功');
window.location.href = 'message_manage.php';
</script>
<? }elseif(!empty($error)){?>
<script>
alert('<?=$error?>');
history.go(-1)
</script>
<? }?>	
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


</body>

</html>

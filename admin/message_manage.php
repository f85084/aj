<?
//資料庫檔案
include ('mydb.php');	
include ('include/global.func2.php');	
$wherea=array();
$where='';
$logws='';
$logw=array();
$lurl='';
$_GET=ck_gp($_GET);
    // 刪除
   /*if ($_GET['del']) {
    $a=$_GET['del'];
    $d="delete from member where id=$a";
    mysql_query($d);
    異動會顯示異動資料
    echo '成功幾筆<br>'.mysql_affected_rows();
    }*/
if (ck_num($_GET['del'])){
	$wherea[]="del='".m_esc($_GET['del'])."'";
	$lurl.="&del=".$_GET['del'];
	$logw[]="del = ".m_esc($_GET['del']);
}
if (ck_num($_GET['vegetarian'])){
	$wherea[]="vegetarian='".m_esc($_GET['vegetarian'])."'";
	$lurl.="&vegetarian=".$_GET['vegetarian'];
	$logw[]="vegetarian = ".m_esc($_GET['vegetarian']);
}	
if(!empty($wherea)){
	$where=" WHERE ".implode(' and ',$wherea);
	$logws=implode(' and ',$logw);
}
$number=10;
/*總共幾筆*/
$query_num= "SELECT COUNT(*) FROM member ".$where;	
$num=mysql_query($query_num);
$q_num =mysql_fetch_row($num);
$product_page_num= $q_num[0];
$page=ceil($product_page_num/$number);
 /*頁設設定*/
if(isset($_GET['p'])){
	$p=$_GET['p'];
	$start=($p-1)*$number;//開始
}
else{
	$start=0;
}
$querymr = "SELECT * FROM  member $where order by  sedtime  ASC LIMIT $start, $number";
$mr=mysql_query($querymr);
$baby=array(0=>'是',1=>'否')	;
$vegetarian=array(0=>'是',1=>'否')	;
$del=array(0=>'是',1=>'否')	;
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
			<h2 class=page-header-us>留言列表</h2>
		<form  method="get" action="">			
				<div class="panel panel-default">
				  <!-- /.panel-heading -->
					<div class="panel-heading">
					搜尋欄
					</div>
					<!-- /.panel-body -->
					<div class="panel-body">
						<table class="menutable">
							<tr>
								<td>刪除</td>
								<td>
									<input type="radio" name="del" id="del" value="" <?=empty($_GET['del'])? ' checked="checked"': '';?> />不拘
									<? $x=1;foreach($del as $k => $v){?><input type="radio" name="del" id="del"  value="<?=$k?>" <?=($k==$_GET['del'] && ck_num($_GET['del']))? ' checked="checked"': '';?> />
										<?=$v;?>
											<?=($x%11==0)?'<br>':'';?>
												<? ++$x;}?>
								</td>	
								<td>素食</td>
								<td>
									<input type="radio" name="vegetarian" id="vegetarian" value="" <?=empty($_GET['vegetarian'])? ' checked="checked"': '';?> />不拘
									<? $x=1;foreach($vegetarian as $k => $v){?><input type="radio" name="vegetarian" id="vegetarian"  value="<?=$k?>" <?=($k==$_GET['vegetarian'] && ck_num($_GET['vegetarian']))? ' checked="checked"': '';?> />
										<?=$v;?>
											<?=($x%11==0)?'<br>':'';?>
												<? ++$x;}?>
								</td>								
							</tr>
						</table>
					<table style="margin: 15px;">			
						<tr>
							<td width="100" ><input type="submit" class="btn btn-primary" value="查詢資料"></td>
						</tr>
					</table>						
					</div>
				</div>
		</form>
					<?if($product_page_num > 0){?>	
	總共有<?=$product_page_num?>人
		<div align="center">
			<ul class="pagination">
			<?for($i=1;$i<=$page;$i++){?>
				<li><a href=message_manage.php?p=<?=$i?>><?=$i?></a></li>
			<?} }?>
			</ul>
		</div>
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
						<td data-th align="center">編輯</td>
						<td data-th align="center">刪除</td>
					</tr>
				<!--    // 表格內容-->
					<?while ($row=mysql_fetch_array($mr)) {?>
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
						<td data-th align="center"><a href=message_manage_edit.php?id=<?=$row['id']?>>編輯<a></td>
						<input type="hidden" name="id" value=<?=$row['id']?> >								
						<td data-th align="center"><a href=message_manage_del.php?id=<?=$row['id']?>>刪除<a></td>
					</tr>
				   <? }?>
				</table>

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

</body>

</html>
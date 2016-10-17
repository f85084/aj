<?
//資料庫檔案
include ('mydb.php');
	$id=$_POST['id'];


// 新增 
if(!empty($_POST['act']) && $_POST['act']=='add'){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$who=$_POST['who'];
	$freetime=$_POST['freetime'];
	$address=$_POST['address'];
	$people=$_POST['people'];
	$baby=$_POST['baby'];
	$vegetarian=$_POST['vegetarian'];
	$message=$_POST['message'];
	$sedtime=$_POST['sedtime'];
	if(empty($error)){ 
    $sql="INSERT member (name,phone,address,people,baby,vegetarian,message,sedtime)
        VALUES ('{$name}','{$phone}','{$address}','{$people}','{$baby}','{$vegetarian}','{$message}',sysdate())";
		$result=mysql_query($sql);
	$error='ok';	 
	 	}	
		}

/* 	if (!mysql_affected_rows()>=1)
{
echo "<script>alert('已送出!')</script>";
echo "<script>window.location.href = '$url1'</script>";
	//die();
	}
else
	{
echo "<script>alert('送出失敗!')</script>";
echo "<script>window.location.href = '$url2'</script>";
	
	}	 */
	
$baby=array(0=>'是',1=>'否')	;
$vegetarian=array(0=>'是',1=>'否')	;

$sql_photo = "SELECT * FROM  `photo` where del='0' ORDER BY  `id` DESC ";
$result_photo=mysql_query($sql_photo);

$sql_photo_co = "SELECT * FROM  `photo` where del='0' ORDER BY  `id` DESC";
$result_photo_co=mysql_query($sql_photo_co);
	
	
    $sql_member = "SELECT * FROM  `member` ORDER BY  `member`.`sedtime` ASC ";

    // 回傳結果
    $result_member=mysql_query($sql_member);

	
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jack & Anna</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/other_index.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">

</style>
		<script>
			$(document).ready(function(){/*$(DOM).當準備就緒並且載入時(要做這件事)*/
		$("#portfolioModal100").removeClass("style");

				});
			});
		</script>

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Jack & Anna</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">個人介紹</a>
                    </li>					
                    <li>
                        <a class="page-scroll" href="#about">經歷</a>
                    </li>					
                    <li>
                        <a class="page-scroll" href="#services">時間地點</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">報名</a>
                    </li>					
                    <li>
                        <a class="page-scroll" href="#portfolio">照片欣賞</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Jack & Anna's </div>
                <div class="intro-heading">Every Event</div>
                <a href="#team" class="page-scroll btn btn-xl">Start</a>
            </div>
        </div>
    </header>
	
    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
     <!--         <div class="row">
               <div class="col-lg-12 text-center">
                    <h2 class="section-heading">主角介紹</h2>
                     <h3 class="section-subheading text-muted">介紹&社群</h3>
                </div> 
	 </div>-->
            <div class="row">
                <div class="col-sm-6">
                    <div class="team-member">
                        <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>劉政豪</h4>
                        <p class="text-muted">Jack</p>
                        <ul class="list-inline social-buttons">

                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>			
                <div class="col-sm-6">
                    <div class="team-member">
                        <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>陳彥如</h4>
                        <p class="text-muted">Anna</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
<!--             <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div> -->
        </div>
    </section>	
	
	
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">經歷</h2>
                    <h3 class="section-subheading text-muted"> </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">哪裡?</h2>
                    <h3 class="section-subheading text-muted">地點相關資訊</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-info  fa-stack-1x fa-inverse"></i>
                    </span>
                    <h3 class="service-heading">資訊</h3>
                    <!-- <p class="text-muted">日期</p> -->
					<h3 style="margin-top: 130px;    margin-bottom: 100px;">W&H飯店</br>2016年8月31日</h3>
                </div>
				
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-map-marker  fa-stack-1x fa-inverse"></i>
                    </span>
                    <h3 class="service-heading">地址</h3>
                    <!-- <p class="text-muted">台灣</p> -->
					<h3 style="margin-top: 130px;    margin-bottom: 100px;">新北市中和區中正路11巷11號1F11巷11號1F</h3>					
                </div>

                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-map fa-stack-1x fa-inverse"></i>
                    </span>
                    <h3 class="service-heading">地圖</h3>
                    <!-- <p class="text-muted">google</p> -->
<iframe src="http://www.dr2ooo.com/tools/maps/maps.php?zoom=13&width=300&height=300&ll=25.033442,481.499872&ctrl=true&cp=true&type=normal&" width="310" height="310" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
    </section>

    <!-- Contact Section 問券 -->
     <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">報名</h2>
                     <h3 class="section-subheading text-muted"><a href="#send" data-toggle="modal" >人員名單</a></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="form" id="contactForm" action="" enctype="multipart/form-data" method="post"  >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<label>姓名</label>
                                    <input type="text" class="form-control" placeholder="姓名 *" id="name"  name="name" required data-validation-required-message="請輸入姓名.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
									<label>電話</label>									
                                    <input type="tel" class="form-control" placeholder="電話 *" id="phone"   name="phone" required data-validation-required-message="請輸入電話.">
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">		
								<label>人數</label>																	
								<select name="people" id="people" class="form-control" required>
									<option value="">請選擇人數</option>
									<? for ($i=1; $i<=6; $i++) {?>
									<option value="<?=$i?>"><?= $i; ?></option>
									<? } ?>
								</select>								
								</div>									
								<div class="form-group">	
									<label>是否有小孩</label>									
									<select name="baby" id="baby" class="form-control required">
									<option value="" >是否有小孩</option>
									<?foreach($baby as $key => $value){?>
									<option value="<?=$key?>"><?= $value; ?></option>					
									<?}?>
									</select>								
								</div>									
								<div class="form-group">	
									<label>是否有吃素</label>									
									<select name="vegetarian" id="vegetarian" class="form-control" required>
									<option value="" >是否有吃素</option>
									<?foreach($vegetarian as $key => $value){?>
									<option value="<?=$key?>"><?= $value; ?></option>					
									<?}?>
									</select>								
								</div>														
                                <div class="form-group">
									<label>地址</label>									
                                    <input type="text" class="form-control" placeholder="地址 *" name="address" id="address" required data-validation-required-message="請輸入地址.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									<label>想說的話</label>									
                                    <textarea class="form-control" placeholder="想說的話" id="message"  name="message" required data-validation-required-message="請輸入訊息."></textarea>
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
    </section>
	
    <!-- Clients Aside 廣告 -->
<!--     <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/envato.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>
 -->
     <!-- Portfolio Grid Section -->
	 <!-- 照片 -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">照片特展</h2>
                    <h3 class="section-subheading text-muted">一些相關照片</h3>
                </div>
            </div>
            <div class="row">
			<?while ($row_poto=mysql_fetch_array($result_photo)) {?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal<?=$row_poto['id']?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-search-plus  fa-3x"></i>
                            </div>
                        </div>
                        <img src="./photo/<?=$row_poto['photo']?>" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4><?=$row_poto['title']?></h4>
                        <h5><p class="text-muted"><?=$row_poto['content']?></p></h5>
                    </div>
                </div>				
				  <? }?>
            </div>
        </div>
		</section>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
    <!-- Portfolio Modal 1 -->
	<?while ($row_poto_co=mysql_fetch_array($result_photo_co)) {?>								
    <div class="portfolio-modal modal fade" id="portfolioModal<?=$row_poto_co['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">	

                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2><?=$row_poto_co['title']?></h2>
                                <p class="item-intro text-muted"></p>
                                <img class="img-responsive img-centered" src="./photo/<?=$row_poto_co['photo']?>" alt="">
                                <p><?=$row_poto_co['content']?></p>
                                <ul class="list-inline">
                                    <li><?=$row_poto_co['date']?></li>
                                    <li>A & J</li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
						 <? }?>
<!--滿版名單-->						 
<!--<div class="portfolio-modal modal fade" id="send" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">	

                        <div class="col-lg-4 col-lg-offset-4">                                                                                                                
                            <div class="modal-body">

<div class='table-responsive'>
 <table class='table table-striped'>
    <tr>
        <td data-th align="center">姓名</td>
        <td data-th align="center">人數</td>
        <td data-th align="center">小孩</td>
        <td data-th align="center">素食</td>
    </tr>


    <?//while ($sql_member=mysql_fetch_array($result_member)) {?>
    <tr>
        <td data-th align="center"><?//=$sql_member['name']?></td>
        <td data-th align="center"><?//=$sql_member['people']?></td>
        <td data-th align="center"><?//=$baby[$sql_member['baby']]?></td>
        <td data-th align="center"><?//=$vegetarian[$sql_member['vegetarian']]?></td>
    </tr>
   <? //}?>
</table>
<br>
<br>
<br>
<br>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
				-->		 
<!--名單 -->
<div class="modal fade " id="send" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header_index">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

      </div>
      <div class="modal-body">
<div class='table-responsive send_table margin_auto'>
 <table class='table table-striped'>
    <tr class='table-header'>
        <td data-th align="center">姓名</td>
        <td data-th align="center">人數</td>
        <td data-th align="center">小孩</td>
        <td data-th align="center">素食</td>
    </tr>


    <?while ($sql_member=mysql_fetch_array($result_member)) {?>
    <tr>
        <td data-th align="center"><?=$sql_member['name']?></td>
        <td data-th align="center"><?=$sql_member['people']?></td>
        <td data-th align="center"><?=$baby[$sql_member['baby']]?></td>
        <td data-th align="center"><?=$vegetarian[$sql_member['vegetarian']]?></td>
    </tr>
   <? }?>
</table>
</div>
<br><br><br>


       <button type="button" class="btn btn-primary margin_auto" data-dismiss="modal" ><i class="fa fa-times"></i> Close Project</button>
<br><br>
    </div>
  </div>
</div>						 
</div>						 
						 
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
				     <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <span class="copyright">Copyright <a href="admin/message_manage.php">&copy;</a> A & J Website 2016</span>
                </div> 

<!--                  <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>  -->
<!--                 <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </footer>

<? if($error=='ok'){?>
<script>
alert('新增成功');
header("location:index.php#contact");
</script>
<? }elseif(!empty($error)){?>
<script>
alert('<?=$error?>');
history.go(-1)
</script>
<? }?>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <!-- <script src="js/contact_me.js"></script> -->

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>

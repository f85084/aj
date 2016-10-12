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
                <a class="navbar-brand" href="index.php">An</a>
            </div>
            <!-- /.navbar-header -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-user"></i>會員專區<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="manage_newuser.php">新增會員</a>
                                </li>
                                <li>
                                    <a href="manage_member.php">會員資料查詢</a>
                                </li>
                                <li>
                                    <a href="manage_message.php">會員留言</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-user"></i>產品專區<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="product_new.php">新增產品</a>
                                </li>
                                <li>
                                    <a href="product_list.php">產品列表</a>
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

        <!--<a href=login.php>登出</a>
        <a href=modifymember.php>修改</a>-->
        <!--查詢-->
        <div class=form-Search>
            <form method="get" action="management.php">
                <!-- 單列文字輸入欄位 -->
                帳號:<input type="text" name="no"> <br>
                <input type="submit" value="查詢資料">
                <input type="reset" value="清除資料">
            </form>
        </div>
        <br>
    </body>

<?php

    // 刪除
    if ($_GET['del']) {
    $a=$_GET['del'];
    $d="delete from member where number=$a";
    mysql_query($d);
    //異動會顯示異動資料
    echo '成功幾筆<br>'.mysql_affected_rows();
    }

    $id=$_GET['id'];

    $sql = "SELECT * FROM  `member` ORDER BY  `member`.`memberdate` ASC ";

    // 查詢帳號
    if ($_GET['id']) {
    $sql = $sql."where id=".$id;
    }
    // 使用編號排序
    if ($_GET['order']==1) {
    $sql = $sql."order by number";
    }
    if ($_GET['order']==2) {
    $sql = $sql."order by number desc";
    }
    // 使用編號排序
    if ($_GET['order']==3) {
    $sql = $sql."order by id";
    }
    if ($_GET['order']==4) {
    $sql = $sql."order by id desc";
    }
    // 使用價格排序
    if ($_GET['order']==5) {
    $sql = $sql."order by password";
    }
    if ($_GET['order']==6) {
    $sql = $sql."order by password desc";
    }
    // 使用價姓名序
    if ($_GET['order']==7) {
    $sql = $sql."order by name";
    }
    if ($_GET['order']==8) {
    $sql = $sql."order by name desc";
    }
    // 使用價姓名序
    if ($_GET['order']==9) {
    $sql = $sql."order by tel";
    }
    if ($_GET['order']==10) {
    $sql = $sql."order by tel desc";
    }
    // 使用價姓名序
    if ($_GET['order']==11) {
    $sql = $sql."order by address";
    }
    if ($_GET['order']==12) {
    $sql = $sql."order by tel address";
    }
    // 使用價姓名序
    if ($_GET['order']==13) {
    $sql = $sql."order by file";
    }
    if ($_GET['order']==14) {
    $sql = $sql."order by tel file";
    }
    // 使用價姓名序
    if ($_GET['order']==15) {
    $sql = $sql."order by memberdate";
    }
    if ($_GET['order']==16) {
    $sql = $sql."order by tel memberdate";
    }



    // 回傳結果
    $result=mysql_query($sql);

    // 表格表題
    echo '總共有' .mysql_num_rows($result).'人';
	echo "<div class='table-responsive'>";
    echo "<table class='table table-striped'>
    <tr>";
        if ($_GET['order']==2) {
        echo "
        <td data-th ><a href=management.php?order =1>編號</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =2>編號</a></td>";
        }
        if ($_GET['order']==4) {
        echo "
        <td data-th ><a href=management.php?order =3>帳號</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =4>帳號</a></td>";
        }
        if ($_GET['order']==6) {
        echo "
        <td data-th ><a href=management.php?order =5>密碼</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =6>密碼</a></td>";
        }
        if ($_GET['order']==8) {
        echo "
        <td data-th ><a href=management.php?order =7>姓名</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =8>姓名</a></td>";
        }
        if ($_GET['order']==10) {
        echo "
        <td data-th ><a href=management.php?order =9>電話</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =10>電話</a></td>";
        }
        if ($_GET['order']==12) {
        echo "
        <td data-th ><a href=management.php?order =11>地址</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =12>地址</a></td>";
        }
        if ($_GET['order']==14) {
        echo "
        <td data-th ><a href=management.php?order =13>檔案</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =14>檔案</a></td>";
        }
        if ($_GET['order']==16) {
        echo "
        <td data-th ><a href=management.php?order =15>時間</a></td>";
        }
        else {
        echo "
        <td data-th ><a href=management.php?order =16>時間</a></td>";
        }


        echo "
        <td data-th >編輯</td>
        <td data-th >刪除</td>
    </tr>";

    // 表格內容
    while ($row=mysql_fetch_array($result)) {
    echo
    "
    <tr>
        <td data-th>$row[0]</td>
        <td data-th>$row[1]</td>
        <td data-th>$row[2]</td>
        <td data-th>$row[3]</td>
        <td data-th>$row[4]</td>
        <td data-th>$row[5]</td>
        <td data-th><img src=./photo/personal/$row[6] width=50 height=50></td>
        <td data-th>$row[7]</td>
        <td data-th><a href=edit_manage_member.php?number=$row[number]>編輯<a></td>
        <td data-th><a href=manage_member.php?del=$row[number]>刪除<a></td>
    </tr>";
    }

    echo "
</table>";
    echo "
</div></div>";
?>
           
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

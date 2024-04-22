<?php session_start(); ?>
<?php include('../../class_conn.php'); ?>
<?php $cls_conn = new class_conn; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ware House</title>
    <link rel="icon" type="image/x-icon" href="">

    <!-- Bootstrap -->
    <link href="../template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="../template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../template/build/css/custom.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ec837941fe.js" crossorigin="anonymous"></script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;"> <a href="index.php" class="site_title"><i class="fa fa-laptop"></i> <span>พนักงาน</span></a> </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic"> <img src="../../fortend/Administrator.png" class="img-circle profile_img"> </div>
                        <!-- เปลี่ยน ภาพ/โลโก้ แก้ไข picture.jpg -->
                        <!-- แก้ไขภาพ เอาคำสั่งนี้ออก alt="..." class="img-circle profile_img" -->
                        <div class="profile_info"> <span>ยินดีต้อนรับ</span>
                            <h2>พนักงาน</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>เมนู</h3>
                            <ul class="nav side-menu">

                                <li><a><i class="fa fa-user"></i>ระบบพนักงาน<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="insert_user.php"><i class="fa fa-headphones"></i>เพิ่มข้อมูล user</a></li> -->
                                        <li><a href="show_user.php"><i class="fa fa-street-view"></i>แสดงข้อมูลพนักงาน</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-tag"></i>ข้อมูลทรัพย์สิน<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="insert_assetchecking.php"><i class="fa fa-plus-square"></i>ข้อมูลสถานะของทรัพย์สิน</a></li> -->
                                        <li><a href="show_assetchecking.php"><i class="fa fa-list"></i>แสดงข้อมูลสถานะของทรัพย์สิน</a></li>
                                    </ul>
                                </li>

                                <li><a href="logout.php"><i class="fa fa-sign-out"></i>ออกจากระบบ</a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="../../fortend/Administrator.png" alt="">พนักงาน <span class=" fa fa-angle-down"></span> </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    
                                    <li><a href="show_assetchecking.php"></i>แก้ไขข้อมูลสถานะของทรัพย์สิน</a></li>
                                    <li><a href="show_user.php"></i>แก้ไขข้อมูลส่วนตัว</a></li>

                                    <!-- <li><a href="../admin/show_product.php"><i class="fa fa-sign-out pull-right"></i>แก้ไขข้อมูลสินค้า</a></li> -->
                                    <!-- http://localhost/bagshop01/backend/admin/show_product.php -->

                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>ออกจากระบบ</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
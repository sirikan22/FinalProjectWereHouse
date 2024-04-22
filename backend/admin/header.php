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
                    <div class="navbar nav_title" style="border: 0;"> <a href="index.php" class="site_title"><i class="fa fa-laptop"></i> <span>ผู้ดูแลระบบ</span></a> </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic"> <img src="../template/image/th.jpg" class="img-circle profile_img"> </div>
                        <!-- เปลี่ยน ภาพ/โลโก้ แก้ไข picture.jpg -->
                        <!-- แก้ไขภาพ เอาคำสั่งนี้ออก alt="..." class="img-circle profile_img" -->
                        <div class="profile_info"> <span>ยินดีต้อนรับ</span>
                            <h2>ผู้ดูแลระบบ</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>เมนู</h3>
                            <ul class="nav side-menu">

                                <li><a><i class="fa fa-user"></i>ผู้ดูแลระบบ<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_admin.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลผู้ดูแล</a></li>
                                        <li><a href="show_admin.php"><i class="fa fa-street-view"></i>แสดงข้อมูลผู้ดูแล</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-users"></i>ข้อมูลพนักงาน<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_user.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลพนักงาน</a></li>
                                        <li><a href="show_user.php"><i class="fa fa-list"></i>แสดงข้อมูลพนักงาน</a></li>
                                        <li><a href="show_epor.php"><i class="fa fa-headphones"></i>รายงานการถือครองทรัพย์สินของพนักงาน</a></li>

                                    </ul>
                                </li>
                    
                                <li><a><i class="fa fa-users"></i>ข้อมูลช่างเทคนิค<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_onsite.php"><i class="fa fa-plus-square"></i>เพิ่มข้อมูลช่างเทคนิค</a></li>
                                        <li><a href="show_onsite.php"><i class="fa fa-list"></i>แสดงข้อมูลช่างเทคนิค</a></li>

                                    </ul>
                                </li>

                                <li><a><i class="fa fa-flag-o" aria-hidden="true"></i>ข้อมูลอุปกรณ์<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_device.php"><i class="fa fa-plus" aria-hidden="true"></i>เพิ่มข้อมูลอุปกรณ์</a></li>
                                        <li><a href="show_device.php"><i class="fa fa-cubes" aria-hidden="true"></i>แสดงข้อมูลอุปกรณ์</a></li>
                                        <li><a href="show_devicereport.php"><i class="fa-solid fa-folder-open"></i>รายงานทรัพย์สินบริษัทเช่าใช้ทั้งหมด</a></li>
                                        <li><a href="show_tnoa.php"><i class="fa-solid fa-folder-open"></i>รายงานจำนวนทรัพย์สินแยกตามประเภทและรุ่น</a></li>
                                        <li><a href="pie_graph.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>กราฟสรุปรายงานจำนวนทรัพย์สินแยกตามประเภทอุปกรณ์</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-flag-o" aria-hidden="true"></i>ข้อมูลสัญญา<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_contract.php"><i class="fa fa-plus" aria-hidden="true"></i>เพิ่มข้อมูลสัญญา</a></li>
                                        <li><a href="show_contract.php"><i class="fa fa-money" aria-hidden="true"></i>แสดงข้อมูลสัญญา</a></li>
                                        <li><a href="3_month_report.php"><i class="fa fa-headphones"></i>ตารางสรุปเลขที่สัญญาทรัพย์สินเช่าใช้ที่จะหมดอายุภายใน 3 เดือน</a></li>
                                        <li><a href="show_assetchecking3.php"><i class="fa fa-headphones"></i>รายงานทรัพย์สินทั้งหมดที่จะหมดสัญญาเช่าใช้ภายใน 3 เดือน</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-flag-o" aria-hidden="true"></i>ข้อมูลทรัพย์สิน<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="insert_assetchecking.php"><i class="fa fa-plus" aria-hidden="true"></i>เพิ่มข้อมูลสถานะของทรัพย์สิน</a></li>
                                        <li><a href="show_assetchecking.php"><i class="fa fa-check-square" aria-hidden="true"></i>ข้อมูลสถานะของทรัพย์สิน</a></li>
                                        <li><a href="grad.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>กราฟสรุปรายงานสถานะทรัพย์สิน</a></li>
                                        <li><a href="show_assetchecking2.php"><i class="fa fa-list-alt" aria-hidden="true"></i>รายงานสถานะทรัพย์สินที่พนักงานถือครอง</a></li>
                                    </ul>

                                <li><a href="logout.php"><i class="fa fa-sign-out"></i>ออกจากระบบ</a></li>
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
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="../template/image/th.jpg" alt="">Admin <span class=" fa fa-angle-down"></span> </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="../admin/show_admin.php">แก้ไขข้อมูลผู้ดูแลระบบ</a></li>
                                    <li><a href="../admin/show_device.php"></i>แก้ไขข้อมูลติดตั้งอุปกรณ์</a></li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>ออกจากระบบ</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
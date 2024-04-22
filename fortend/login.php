<?php include('../class_conn.php');
$cls_conn = new class_conn();
session_start();
include('header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v5.9.8, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.8, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/logo-96x96.png" type="image/x-icon">
    <meta name="description" content="">


    <title>WAREHOUSE</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/animatecss/animate.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
    <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
    <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Noto+Sans+Thai:100,200,300,400,500,600,700,800,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+Thai:100,200,300,400,500,600,700,800,900&display=swap">
    </noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<style>
        a:link, a:visited {

  color: white;
  padding: 15px 25px;
  border-radius: 5px;
  text-decoration: none;

}

    </style>
<body>
    <section data-bs-version="5.1" class="form5 cid-tYL4jRMD3C" id="form1-1r">
        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">

                </div>
            </div>
        </div>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="media-container-column col-lg-8" data-form-type="formoid">
                                <div class="row row-sm-offset">
                                    <form class="login100-form validate-form" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width,inittal-scale=1.0">

                                        <body>

                                            <head>
                                                <meta charset="UTF-8">
                                                <meta name="viewport" content="width=device-width,inittal-scale=1.0">
                                                <title>WAREHOUSE</title>

                                                <link rel="stylesheet" href="style.css">
                                            </head>
                                            <title>WAREHOUSE</title>
                                            <div class="formbox">
                                                <div class="header">
                                                    <h2>WAREHOUSE</h2>
                                                </div>
                                                <form>
                                                    <div class="input-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" name="username">
                                                    </div>
                                                    <div class="input-group">
                                                        <label for="password"> Password</label>
                                                        <input type="password" name="password">
                                                    </div>

                                                    <div class="ln_solid"></div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <button type="submit" name="submit" class="btn">Login</button><br>
                                                            <!-- <button type="button" class="btn btn-outline-success"><a href="privacy_policy.php">สมัครสมาชิก</a></button> -->
                                                        </div>
                                                </form>
                                            </div>
                                        </body>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        if (strlen($password) < 7) {
                            // รหัสผ่านมีความยาวน้อยกว่า 7 ตัวอักษรหรือตัวเลข
                            echo "รหัสผ่านต้องมีความยาวไม่น้อยกว่า 7 ตัวอักษรหรือตัวเลข";
                        } else{
                            $hashed_password = md5($password);

                        // Admin login
                        $sql_admin = "SELECT * FROM tb_admin WHERE admin_username=? AND admin_password=?";
                        $result_admin = $cls_conn->select_base_prepared($sql_admin, 'ss', $username, $hashed_password);

                        $num_admin = mysqli_num_rows($result_admin);

                        if ($num_admin >= 1) {
                            $admin_row = $result_admin->fetch_assoc();
                            $_SESSION['admin_id'] = $admin_row['admin_id'];
                            $_SESSION['admin_username'] = $admin_row['admin_username'];
                            echo $cls_conn->goto_page(1, '../../warehousehavedrop-down/backend/admin/show_admin.php');
                            exit(); // Exit to prevent execution of user and onsite login checks
                        }

                        // User login
                        $sql_user = "SELECT * FROM tb_user WHERE (user_code=? OR user_username=?) AND user_password=?";
                        $result_user = $cls_conn->select_base_prepared($sql_user, 'sss', $username, $username, $hashed_password);

                        $num_user = mysqli_num_rows($result_user);

                        if ($num_user >= 1) {
                            $user_row = $result_user->fetch_assoc();
                            $_SESSION['user_id'] = $user_row['user_id'];
                            $_SESSION['user_code'] = $user_row['user_code'];
                            $_SESSION['user_password'] = $user_row['user_password'];
                            echo $cls_conn->goto_page(1, '../../warehousehavedrop-down/fortend/privacy_policy.php');
                            // echo $cls_conn->goto_page(1, '../../warehousehavedrop-down/fortend/user/show_assetchecking.php');
                            exit();
                        }


                        // Onsite login (commented out since not implemented)

                        $sql_onsite = "SELECT * FROM tb_onsite WHERE onsite_username=? AND onsite_password=?";
                        $result_onsite = $cls_conn->select_base_prepared($sql_onsite, 'ss', $username, $hashed_password);

                        $num_onsite = mysqli_num_rows($result_onsite);

                        if ($num_onsite >= 1) {
                            $onsite_row = $result_onsite->fetch_assoc();
                            $_SESSION['onsite_id'] = $onsite_row['onsite_id'];
                            $_SESSION['onsite_username'] = $onsite_row['onsite_username'];
                            
                            echo $cls_conn->goto_page(1, '../../warehousehavedrop-down/backend/onsite/show_device.php');
                            exit();
                        }


                        echo $cls_conn->show_message('usernameหรือpasswordผิดกรุณากรอกใหม่หรือติดต่อผู้ดูแลระบบ');
                    }
                }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="article16 cid-tYRzyg8r49" id="article16-21">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-4">
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="article11 cid-tYLxfmBPWj" id="article11-1u">
    </section>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/ytplayer/index.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/formstyler/jquery.formstyler.js"></script>
    <script src="assets/formstyler/jquery.formstyler.min.js"></script>
    <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/formoid/formoid.min.js"></script>

    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
</body>

</html>
<?php include('footer.php'); ?>
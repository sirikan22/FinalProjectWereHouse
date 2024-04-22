<?php session_start(); ?>
<?php include('../../class_conn.php'); ?>
<?php $cls_conn = new class_conn; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        a.red-link:link,
    a.red-link:visited {
        background-color: #ff3333; /* สีแดง */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        text-decoration: none;
        
    }
    </style>
</head>
<body>

<div class="container">
    <h2>สมัครสมาชิก</h2>
    <form id="registration-form" data-parsley-validate class="form-horizontal form-label-left" method="POST">

                        <div class="form-group">
                            <label for="user_fullname">ชื่อผู้ใช้งาน<span class="required">*</span></label>
                            <input type="text" id="user_fullname" name="user_fullname" required="required" placeholder="ชื่อพนักงาน">
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_position">ตำแหน่ง<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_position" name="user_position" required="required" placeholder="ตำแหน่ง" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_email">อีเมล์ <span class="required">*</span> บังคับใส่ข้อมูล *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_email" name="user_email" placeholder="Gmail@hotmail.com" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_phone">เบอร์โทรศัพท์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_phone" name="user_phone" required="required" placeholder="0xx-xxx-xxxx" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_department">แผนก<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_department" name="user_department" required="required" placeholder="แผนก" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_code">รหัสพนักงาน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_code" name="user_code" required="required" placeholder="xxxxxx" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_username">ID เข้าสู่ระบบ<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_username" name="user_username" required="required" placeholder="ชื่อผู้ใช้" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_password">รหัสผ่าน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="user_password" name="user_password" required="required" placeholder="รหัสผ่าน" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">ยืนยันรหัสผ่าน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="confirm_password" name="confirm_password" required="required" placeholder="รหัสผ่าน" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_datetime">วันที่บันทึก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="user_datetime" name="user_datetime" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <a class="red-link" href="../../fortend/login.php">ยกเลิก</a>
                            </div>
                        </div>
                    </form>

                    <?php
if (isset($_POST['submit'])) {
    $user_fullname = $_POST['user_fullname'];
    $user_position = $_POST['user_position'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_department = $_POST['user_department'];
    $user_code = $_POST['user_code'];
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password']; // เพิ่มตรงนี้
    $user_datetime = $_POST['user_datetime'];

    // เพิ่มเงื่อนไขการตรวจสอบข้อมูลซ้ำ
    $sql_check_duplicate = "SELECT * FROM tb_user WHERE user_email='$user_email' OR user_code='$user_code' OR user_username='$user_username'";
    $result_check_duplicate = $cls_conn->select_base($sql_check_duplicate);
    $num_check_duplicate = mysqli_num_rows($result_check_duplicate);

    if ($num_check_duplicate > 0) {
        echo $cls_conn->show_message('ข้อมูลซ้ำ กรุณาตรวจสอบอีกครั้ง');
    } else {
        // กรณีไม่มีข้อมูลซ้ำให้ทำการตรวจสอบรหัสผ่าน
        if ($user_password === $confirm_password) {
            // รหัสผ่านตรงกัน
            // ทำการบันทึกข้อมูล

            $sql = "INSERT INTO `tb_user`( `user_fullname`, `user_position`, `user_email`, `user_phone`, `user_department`, `user_code`, `user_username`, `user_password`, `user_datetime`)";
            $sql .= " VALUES ('$user_fullname','$user_position','$user_email','$user_phone','$user_department','$user_code','$user_username','$user_password','$user_datetime')";

            if ($cls_conn->write_base($sql) == true) {
                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                echo $cls_conn->goto_page(1, '../../fortend/login.php');
            } else {
                echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                echo $sql;
            }
        } else {
            // รหัสผ่านไม่ตรงกัน
            echo $cls_conn->show_message('รหัสผ่านไม่ตรงกัน');
        }
    }
}
?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

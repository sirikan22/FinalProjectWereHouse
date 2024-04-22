<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>ข้อมูลพนักงาน</h3>
                    <!--<ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>-->
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_fullname">ชื่อผู้ใช้งาน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_fullname" name="user_fullname" required="required" placeholder="ชื่อพนักงาน" class="form-control col-md-7 col-xs-12">
                            </div>
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
                                <input type="user_password" id="user_password" name="user_password" minlength="7" required="required" placeholder="รหัสผ่าน" class="form-control col-md-7 col-xs-12">
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
                                <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button>
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
                        $user_password = md5($_POST['user_password']);
                        $user_datetime = $_POST['user_datetime'];

                        // เพิ่มเงื่อนไขการตรวจสอบข้อมูลซ้ำ
                        $sql_check_duplicate = "SELECT * FROM tb_user WHERE user_email='$user_email' OR user_code='$user_code' OR user_username='$user_username'";
                        $result_check_duplicate = $cls_conn->select_base($sql_check_duplicate);
                        $num_check_duplicate = mysqli_num_rows($result_check_duplicate);

                        if ($num_check_duplicate > 0) {
                            echo $cls_conn->show_message('ข้อมูลซ้ำ กรุณาตรวจสอบอีกครั้ง');
                        } else {
                            // กรณีไม่มีข้อมูลซ้ำให้ทำการบันทึก
                            $sql = "INSERT INTO `tb_user`( `user_fullname`, `user_position`, `user_email`, `user_phone`, `user_department`, `user_code`, `user_username`, `user_password`, `user_datetime`)";
                            $sql .= " Values ('$user_fullname','$user_position','$user_email','$user_phone','$user_department','$user_code','$user_username','$user_password','$user_datetime')";

                            if ($cls_conn->write_base($sql) == true) {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1, 'show_user.php');
                            } else {
                                echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                                echo $sql;
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

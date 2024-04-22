<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ข้อมูลผู้ดูแลระบบ</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_fullname">ชื่อผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_fullname" name="admin_fullname" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_username">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_username" name="admin_username" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_password">รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="admin_password" name="admin_password" minlength="7" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_email">อีเมลผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="admin_email" name="admin_email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_phone">เบอร์โทรศัพท์ผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_phone" name="admin_phone" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_position">ตำแหน่ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_position" name="admin_position" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_role">แผนก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_role" name="admin_role" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_time">วันที่บันทึก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="admin_time" name="admin_time" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                <button type="reset" name="reset" class="btn btn-danger" >ยกเลิก</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $admin_fullname = $_POST['admin_fullname'];
                        $admin_username = $_POST['admin_username'];
                        $admin_password = md5($_POST['admin_password']);
                        $admin_email = $_POST['admin_email'];
                        $admin_phone = $_POST['admin_phone'];
                        $admin_position = $_POST['admin_position'];
                        $admin_role = $_POST['admin_role'];
                        $admin_time = $_POST['admin_time'];
                        
                         // เพิ่มเงื่อนไขการตรวจสอบข้อมูลซ้ำ
                         $sql_check_duplicate = "SELECT * FROM tb_admin WHERE admin_fullname='$admin_fullname' OR admin_username='$admin_username' OR admin_email='$admin_email'";
                         $result_check_duplicate = $cls_conn->select_base($sql_check_duplicate);
                         $num_check_duplicate = mysqli_num_rows($result_check_duplicate);
 
                         if ($num_check_duplicate > 0) {
                             echo $cls_conn->show_message('ข้อมูลซ้ำ กรุณาตรวจสอบอีกครั้ง');
                         } else {
                             // กรณีไม่มีข้อมูลซ้ำให้ทำการบันทึก

                        $sql = " INSERT INTO `tb_admin`( `admin_fullname`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_position`, `admin_role`, `admin_time`)";
                        $sql .= " values ('$admin_fullname','$admin_username','$admin_password','$admin_email','$admin_phone','$admin_position','$admin_role','$admin_time')";
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_admin.php');
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
<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>ข้อมูลstaff</h3>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_fullname">ชื่อผู้ใช้งาน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="staff_fullname" name="staff_fullname" required="required" placeholder="ชื่อพนักงาน" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_phone">เบอร์โทรศัพท์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="staff_phone" name="staff_phone" required="required" placeholder="0xx-xxx-xxxx" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_email">อีเมล์ <!-- <span class="required">*</span> บังคับใส่ข้อมูล --> *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="staff_email" name="staff_email" placeholder="Gmail@hotmail.com" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_username">username<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="staff_username" name="staff_username" required="required" placeholder="ชื่อผู้ใช้" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_password">รหัสผ่าน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="user_password" id="staff_password" name="staff_password" required="required" placeholder="รหัสผ่าน" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_department">แผนก<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="staff_department" name="staff_department" required="required" placeholder="0xx-xxx-xxxx" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_position">ตำแหน่ง<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="staff_position" name="staff_position" required="required" placeholder="ตำแหน่ง" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_role">หน้าที่<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="staff_role" name="staff_role" required="required" placeholder="หน้าที่" class="form-control col-md-7 col-xs-12">
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
                        $staff_fullname = $_POST['staff_fullname'];
                        $staff_phone = $_POST['staff_phone'];
                        $staff_email = $_POST['staff_email'];
                        $staff_username = $_POST['staff_username'];
                        $staff_password = $_POST['staff_password'];
                        $staff_department = $_POST['staff_department'];
                        $staff_position = $_POST['staff_position'];
                        $staff_role = $_POST['staff_role'];

                        $sql = "INSERT INTO `tb_staff`(`staff_fullname`, `staff_phone`, `staff_email`, `staff_username`, `staff_password`, `staff_department`, `staff_position`, `staff_role`) ";
                        $sql .= " Values ('$staff_fullname','$staff_phone','$staff_email','$staff_username','$staff_password','$staff_department','$staff_position','$staff_role')";
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_staff.php');
                        } else {
                            echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                            echo $sql;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
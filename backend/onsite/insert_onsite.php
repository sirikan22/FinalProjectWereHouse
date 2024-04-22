<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>ข้อมูล ช่างเทคนิค</h3>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_fullname">ชื่อผู้ใช้งาน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="onsite_fullname" name="onsite_fullname" required="required" placeholder="ชื่อพนักงาน" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_phone">เบอร์โทรศัพท์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="onsite_phone" name="onsite_phone" required="required" placeholder="0xx-xxx-xxxx" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_email">อีเมล์ <!-- <span class="required">*</span> บังคับใส่ข้อมูล --> *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="onsite_email" name="onsite_email" placeholder="Gmail@hotmail.com" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_username">username<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="onsite_username" name="onsite_username" required="required" placeholder="ชื่อผู้ใช้" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_password">รหัสผ่าน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="user_password" id="onsite_password" name="onsite_password" required="required" placeholder="รหัสผ่าน" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_department">แผนก<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="onsite_department" name="onsite_department" required="required" placeholder="แผนก" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_position">ตำแหน่ง<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="onsite_position" name="onsite_position" required="required" placeholder="ตำแหน่ง" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_datetime">วันที่บันทึก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="onsite_datetime" name="onsite_datetime" required="required" class="form-control col-md-7 col-xs-12">
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
                        $onsite_fullname = $_POST['onsite_fullname'];
                        $onsite_phone = $_POST['onsite_phone'];
                        $onsite_email = $_POST['onsite_email'];
                        $onsite_username = $_POST['onsite_username'];
                        $onsite_password = $_POST['onsite_password'];
                        $onsite_department = $_POST['onsite_department'];
                        $onsite_position = $_POST['onsite_position'];
                        $onsite_installedstatus = $_POST['onsite_installedstatus'];
                        $onsite_datetime = $_POST['onsite_datetime'];

                        $sql = "INSERT INTO `tb_onsite`(`onsite_fullname`,`onsite_phone`, `onsite_email`
                        ,`onsite_username`,`onsite_password`,`onsite_department`, `onsite_position`, `onsite_datetime`)";
                        $sql .= "Values ('$onsite_fullname','$onsite_phone','$onsite_email','$onsite_username',
                        '$onsite_password','$onsite_department','$onsite_position','$onsite_datetime')";
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_onsite.php');
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
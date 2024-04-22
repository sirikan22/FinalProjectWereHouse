<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>เพิ่มข้อมูลติดตั้งอุปกรณ์</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_asset_tag">หมายเลขทรัพย์สิน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_asset_tag" name="device_asset_tag" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_serialnumber">หมายเลขเครื่อง<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_serialnumber" name="device_serialnumber" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_dname">ชื่ออุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_dname" name="device_dname" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_description">รายละเอียดของอุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_description" name="device_description" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_code">รหัสพนักงาน<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="user_code" name="user_code" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_type">ประเภทอุปกรณ์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="device_type" name="device_type" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="0">คอมพิวเตอร์</option>
                                    <option value="1">โน๊ตบุ๊ค</option>
                                    <option value="2">จอ</option>
                                    <option value="3">คีย์บอร์ด</option>
                                    <option value="4">เครื่องปริ้น</option>
                                    <option value="5">เครื่องสแกนบาร์โค๊ด</option>
                                    <option value="6">กล้องถ่ายรูป</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_model">รุ่นของอุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_model" name="device_model" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_dmanufacturer">ผู้ผลิตอุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_dmanufacturer" name="device_dmanufacturer" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_location">ตำแหน่งของอุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_location" name="device_location" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_installed_status">สถานะการติดตั้ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="device_installed_status" name="device_installed_status" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="0">ติดตั้งไม่สำเร็จ</option>
                                    <option value="1">ติดตั้งสำเร็จ</option>
                                    <option value="2">คลังสินค้า</option>
                                    <option value="3">หมดอายุ</option>
                                </select>
                            </div>
                        </div>

                        





                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_comment">หมายเหตุฯ<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="device_comment" name="device_comment" placeholder="" class="form-control col-md-7 col-xs-12">
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
                        $user_code = $_POST['user_code'];
                        $device_asset_tag = $_POST['device_asset_tag'];
                        $device_serialnumber = $_POST['device_serialnumber'];
                        $device_description = $_POST['device_description'];
                        $device_location = $_POST['device_location'];
                        $device_dmanufacturer = $_POST['device_dmanufacturer'];
                        $device_installed_status = $_POST['device_installed_status'];
                        $device_dname = $_POST['device_dname'];
                        $device_comment = $_POST['device_comment'];
                        $device_type = $_POST['device_type'];
                        $device_model = $_POST['device_model'];
                        // Connection to database assumed to be $cls_conn
                        $sql = "INSERT INTO `tb_device` (`user_code` , `device_asset_tag`, `device_serialnumber`, `device_description`, `device_location`, `device_dmanufacturer`, `device_installed_status`, `device_dname`, `device_comment`, `device_type`, `device_model`)";
                        $sql .= " VALUES ('$user_code','$device_asset_tag', '$device_serialnumber', '$device_description', '$device_location', '$device_dmanufacturer', '$device_installed_status', '$device_dname', '$device_comment', '$device_type', '$device_model')";

                        // Perform the SQL query
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_device.php');
                        } else {
                            echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                            echo $sql; // This line is for debugging purposes, remove it once the issue is resolved
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
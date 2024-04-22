<?php
include('header.php');

// ตรวจสอบว่ามีการส่งค่า ID ของอุปกรณ์มาหรือไม่
if (isset($_GET['id'])) {
    $device_id = $_GET['id'];

    // เรียกข้อมูลอุปกรณ์จากฐานข้อมูล
    $sql = "SELECT * FROM tb_device WHERE device_id = $device_id";
    $result = $cls_conn->select_base($sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>แก้ไขข้อมูลติดตั้งอุปกรณ์</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="update_device_form" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_asset_tag">หมายเลขทรัพย์สิน<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_asset_tag" name="device_asset_tag" required="required" class="form-control" value="<?= $row['device_asset_tag'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_serialnumber">หมายเลขเครื่อง<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_serialnumber" name="device_serialnumber" required="required" class="form-control" value="<?= $row['device_serialnumber'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_dname">ชื่ออุปกรณ์<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_dname" name="device_dname" required="required" class="form-control" value="<?= $row['device_dname'] ?>">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_location">ตำแหน่งของอุปกรณ์<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_location" name="device_location" required="required" class="form-control" value="<?= $row['device_location'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_dmanufacturer">ผู้ผลิตอุปกรณ์<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_dmanufacturer" name="device_dmanufacturer" required="required" class="form-control" value="<?= $row['device_dmanufacturer'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_installed_status">สถานะการติดตั้ง<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="device_installed_status" name="device_installed_status" required="required" value="<?= $row['device_installed_status'] ?>" class="form-control col-md-7 col-xs-12">
                                    <option value="0">ติดตั้งไม่สำเร็จ</option>
                                    <option value="1">ติดตั้งสำเร็จ</option>
                                    <option value="2">คลังสินค้า</option>
                                    <option value="3">หมดอายุ</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_description">รายละเอียดของอุปกรณ์<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_description" name="device_description" required="required" class="form-control" value="<?= $row['device_description'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_type">ประเภทอุปกรณ์<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="device_type" name="device_type" required="required" value="<?= $row['device_type'] ?>" class="form-control col-md-7 col-xs-12">
                                    <option value="0">Computer</option>
                                    <option value="1">Notebook</option>
                                    <option value="2">Monitor</option>
                                    <option value="3">Keyboard</option>
                                    <option value="4">Printer</option>
                                    <option value="5">Scanner</option>
                                    <option value="6">Camera</option>
                                    <option value="7">Fax</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_model">รุ่นของอุปกรณ์<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_model" name="device_model" required="required" class="form-control" value="<?= $row['device_model'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_datetime">วันที่บันทึก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="device_datetime" name="device_datetime" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_comment">ข้อเสนอแนะ<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_comment" name="device_comment" class="form-control" value="<?= $row['device_comment'] ?>">
                        </div>
                    </div>
                    <!-- เพิ่มฟิลด์อื่นๆที่ต้องการแก้ไข -->

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<?php
// ตรวจสอบการกดปุ่ม submit
if (isset($_POST['submit'])) {
    // รับค่าที่แก้ไขจากฟอร์ม
    $device_location = $_POST['device_location'];
    $device_dmanufacturer = $_POST['device_dmanufacturer'];
    $device_installed_status = $_POST['device_installed_status'];
    
    $device_type = $_POST['device_type'];
    $device_model = $_POST['device_model'];
    $device_datetime = $_POST['device_datetime'];
    $device_comment = $_POST['device_comment'];

    // เขียนคำสั่ง SQL เพื่ออัพเดทข้อมูล
    $update_sql = "UPDATE tb_device SET 
        device_location = '$device_location',
        device_dmanufacturer = '$device_dmanufacturer',
        device_installed_status = '$device_installed_status',
        
        device_type = '$device_type',
        device_model = '$device_model',
        device_datetime = '$device_datetime',
        device_comment = '$device_comment'
        WHERE device_id = $device_id";

    // ทำการอัพเดทข้อมูลในฐานข้อมูล
    $update_result = $cls_conn->write_base($update_sql);

    // ตรวจสอบว่าอัพเดทข้อมูลสำเร็จหรือไม่
    if ($update_result) {
        echo '<script>alert("อัพเดทข้อมูลสำเร็จ"); window.location.href = "show_device.php";</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาดในการอัพเดทข้อมูล");</script>';
    }
}
?>
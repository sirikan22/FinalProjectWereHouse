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
                <h3>แก้ไขข้อมูลอุปกรณ์</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="update_device_form" data-parsley-validate class="form-horizontal form-label-left" method="post">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_serialnumber">หมายเลขเครื่อง<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_serialnumber" name="device_serialnumber" required="required" class="form-control" value="<?= $row['device_serialnumber'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_installed_status">สถานะการใช้งาน<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <select id="device_installed_status" name="device_installed_status" required="required" value="<?= $row['device_installed_status'] ?>" class="form-control col-md-7 col-xs-12">
                                    <option value="0">ใช้งานไม่ได้</option>
                                    <option value="1">ใช้งานได้</option>
                                    <option value="2">คลังสินค้า</option>
                                    <option value="3">หมดอายุ</option>
                                </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_datetime">วันที่บันทึก<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="device_datetime" name="device_datetime" required="required" class="form-control" value="<?= $row['device_datetime'] ?>">
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
    $device_serialnumber = $_POST['device_serialnumber'];
    $device_installed_status = $_POST['device_installed_status'];
    $device_datetime = $_POST['device_datetime'];

    // เขียนคำสั่ง SQL เพื่ออัพเดทข้อมูล
    $update_sql = "UPDATE tb_device SET 
        -- device_serialnumber = '$device_serialnumber',
        device_installed_status = '$device_installed_status',
        device_datetime = '$device_datetime'
        WHERE device_id = $device_id";

    // ทำการอัพเดทข้อมูลในฐานข้อมูล
    $update_result = $cls_conn->write_base($update_sql);

    // ตรวจสอบว่าอัพเดทข้อมูลสำเร็จหรือไม่
    if ($update_result) {
        echo '<script>alert("อัพเดทข้อมูลสำเร็จ"); window.location.href = "show_assetchecking.php";</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาดในการอัพเดทข้อมูล");</script>';
    }
}
?>

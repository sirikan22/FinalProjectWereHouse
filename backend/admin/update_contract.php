<?php
include('header.php');

// ตรวจสอบว่ามีการส่งค่า ID ของอุปกรณ์มาหรือไม่
if (isset($_GET['id'])) {
    $contract_id = $_GET['id'];

    // เรียกข้อมูลอุปกรณ์จากฐานข้อมูล
    $sql = "SELECT * FROM tb_contract WHERE contract_id = $contract_id";
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

                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_number">เลขที่สัญญา<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contract_number" name="contract_number" required="required" value="<?= $row['contract_number'] ?>" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dinvoicenum">หมายเลขใบแจ้งหนี้<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contract_dinvoicenum" name="contract_dinvoicenum" required="required" value="<?= $row['contract_dinvoicenum'] ?>" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dvender">ผู้ขายอุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contract_dvender" name="contract_dvender" required="required" value="<?= $row['contract_dvender'] ?>" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dcon_remained_time">ระยะเวลาสัญญาเช่าใช้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="contract_dcon_remained_time" name="contract_dcon_remained_time" required="required" value="<?= $row['contract_dcon_remained_time'] ?>" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_recordingdate">วันที่บันทึก<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="contract_recordingdate" name="contract_recordingdate" required="required" value="<?= $row['contract_recordingdate'] ?>" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dstarteddate">วันที่เริ่มต้นสัญญา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="contract_dstarteddate" name="contract_dstarteddate" value="<?= $row['contract_dstarteddate'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dcostcurrency">สกุลเงิน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="contract_dcostcurrency" name="contract_dcostcurrency" value="<?= $row['contract_dcostcurrency'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="0">THB</option>
                                    <option value="1">USD</option>
                                    <option value="2">EUR</option>
                                    <option value="3">JPY</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dcost">ราคาอุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contract_dcost" name="contract_dcost" required="required" value="<?= $row['contract_dcost'] ?>" placeholder="" class="form-control col-md-7 col-xs-12">
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
    $contract_dcon_remained_time = $_POST['contract_dcon_remained_time'];
    $contract_dcostcurrency = $_POST['contract_dcostcurrency'];
    $contract_number = $_POST['contract_number'];
    $contract_recordingdate = $_POST['contract_recordingdate'];
    $contract_dstarteddate = $_POST['contract_dstarteddate'];
    $contract_dinvoicenum = $_POST['contract_dinvoicenum'];
    $contract_dwarrantyexp = $_POST['contract_dwarrantyexp'];
    $contract_dvender = $_POST['contract_dvender'];
    $contract_dcost = $_POST['contract_dcost'];


    // เขียนคำสั่ง SQL เพื่ออัพเดทข้อมูล
    $update_sql = "UPDATE tb_contract SET 
        contract_dcon_remained_time = '$contract_dcon_remained_time',
        contract_dcostcurrency = '$contract_dcostcurrency',
        contract_number = '$contract_number',
        contract_recordingdate = '$contract_recordingdate',
        contract_dstarteddate = '$contract_dstarteddate',
        contract_dinvoicenum = '$contract_dinvoicenum',
        contract_dwarrantyexp = '$contract_dwarrantyexp',
        contract_dvender = '$contract_dvender',
        contract_dcost = '$contract_dcost'

        WHERE contract_id = $contract_id";

    // ทำการอัพเดทข้อมูลในฐานข้อมูล
    $update_result = $cls_conn->write_base($update_sql);

    // ตรวจสอบว่าอัพเดทข้อมูลสำเร็จหรือไม่
    if ($update_result) {
        echo '<script>alert("อัพเดทข้อมูลสำเร็จ"); window.location.href = "show_contract.php";</script>';
    } else {
        echo '<script>alert("เกิดข้อผิดพลาดในการอัพเดทข้อมูล");</script>';
    }
}
?>
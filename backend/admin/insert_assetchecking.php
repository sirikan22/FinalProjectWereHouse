<?php include('header.php'); ?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>เพิ่มข้อมูลทรัพย์สิน</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="device_serialnumber">หมายเลขเครื่อง<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="device_serialnumber" name="device_serialnumber" required="required" placeholder="หมายเลขเครื่อง" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assetchecking_no">หมายเลขเครื่อง<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="assetchecking_no" name="assetchecking_no" required="required" placeholder="เลขทรัพย์สิน" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assetchecking_note">การบันทึก<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="assetchecking_note" name="assetchecking_note" placeholder="" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assetchecking_date">วันที่<span class="required">:</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="assetchecking_date" name="assetchecking_date" required="required" class="form-control col-md-7 col-xs-12">
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
                    $device_serialnumber = $_POST['device_serialnumber'];
                    $assetchecking_no = $_POST['assetchecking_no'];
                    $assetchecking_note = $_POST['assetchecking_note'];
                    $assetchecking_date = $_POST['assetchecking_date'];

                    $sql_device = "SELECT * FROM `tb_device` WHERE 1";
                    $result_device = $cls_conn->write_base($sql_device);

                    $sql_assetchecking = "INSERT INTO `tb_assetchecking` (`assetchecking_no`, `assetchecking_note`, `assetchecking_date`) VALUES ('$assetchecking_no', '$assetchecking_note', '$assetchecking_date')";
                    $result_assetchecking = $cls_conn->write_base($sql_assetchecking);

                    if ($result_device && $result_assetchecking) {
                        echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                        echo $cls_conn->goto_page(1, 'show_assetchecking.php');
                    } else {
                        echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                        echo $sql_device;
                        echo $sql_assetchecking;
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

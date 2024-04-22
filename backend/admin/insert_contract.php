<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>เพิ่มข้อมูลสัญญา</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_number">เลขที่สัญญา<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contract_number" name="contract_number" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dinvoicenum">หมายเลขใบแจ้งหนี้<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contract_dinvoicenum" name="contract_dinvoicenum" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dvender">ผู้ขายอุปกรณ์<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contract_dvender" name="contract_dvender" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dcon_remained_time">วันที่สิ้นสุดสัญญา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="contract_dcon_remained_time" name="contract_dcon_remained_time" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_recordingdate">วันที่บันทึก<span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="contract_recordingdate" name="contract_recordingdate" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dstarteddate">วันที่เริ่มต้นสัญญา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="contract_dstarteddate" name="contract_dstarteddate" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_dcostcurrency">สกุลเงิน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="contract_dcostcurrency" name="contract_dcostcurrency" required="required" class="form-control col-md-7 col-xs-12">
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
                                <input type="text" id="contract_dcost" name="contract_dcost" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
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
                        $contract_dcon_remained_time = $_POST['contract_dcon_remained_time'];
                        $contract_dcostcurrency = $_POST['contract_dcostcurrency'];
                        $contract_recordingdate = $_POST['contract_recordingdate'];
                        $contract_dstarteddate = $_POST['contract_dstarteddate'];
                        $contract_number = $_POST['contract_number'];
                        $contract_dinvoicenum = $_POST['contract_dinvoicenum'];
                        $contract_dwarrantyexp = $_POST['contract_dwarrantyexp'];
                        $contract_dvender = $_POST['contract_dvender'];
                        $contract_dcost = $_POST['contract_dcost'];
                        // $contract_device = $_POST['contract_device']; ไม่ใช้แล้ว


                        // Connection to database assumed to be $cls_conn
                        $sql = "INSERT INTO `tb_contract` (`contract_dcon_remained_time`, `contract_dcostcurrency`, 
                        `contract_recordingdate` ,`contract_dstarteddate`, `contract_dinvoicenum`, `contract_dwarrantyexp`, 
                        `contract_dvender`, `contract_dcost`, `contract_number`)";
                        $sql .= " VALUES ('$contract_dcon_remained_time', '$contract_dcostcurrency',
                        '$contract_recordingdate','$contract_dstarteddate','$contract_dinvoicenum', '$contract_dwarrantyexp', 
                        '$contract_dvender', '$contract_dcost', '$contract_number')";

                        // Perform the SQL query
                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_contract.php');
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
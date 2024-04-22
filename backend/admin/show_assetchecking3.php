<?php include 'header.php'; ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>รายงานทรัพย์สินทั้งหมดที่จะหมดสัญญาเช่าใช้ภายใน 3 เดือน</h3>
                <!--<ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>-->
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>เลขที่สัญญา</th>
                            <th>หมายเลขแจ้งหนี้</th>
                            <th>วันที่เริ่มต้นสัญญา</th>
                            <th>วันที่สิ้นสุดสัญญา</th>
                            <th>ประเภท</th>
                            <th>รุ่น</th>
                            <th>ชื่ออุปกรณ์</th>
                            <th>หมายเลขทรัพย์สิน</th>
                            <th>หมายเลขเครื่อง</th>
                            <th>ผู้ผลิต</th>
                            <th>ผู้ขาย</th>
                            <th>ระยะเวลาที่เหลือ (วัน)</th>


                        </tr>
                    </thead>


                    <tbody>

                        <?php
                        $sql = 'SELECT d.*, c.contract_dinvoicenum, c.contract_dcon_remained_time, c.contract_dstarteddate, 
                        c.contract_number, c.contract_dvender, DATEDIFF(c.contract_dcon_remained_time, NOW()) as remaining_days
                        FROM tb_device d 
                        JOIN tb_contract c ON d.device_id = c.contract_id
                        WHERE DATEDIFF(c.contract_dcon_remained_time, NOW()) < 90
                            AND DATEDIFF(c.contract_dcon_remained_time, NOW()) >= 0 -- เพิ่มเงื่อนไขนี้ 
                        ORDER BY 
                            CASE d.device_type
                                WHEN 0 THEN 0   -- Computer มาก่อน
                                WHEN 1 THEN 1   -- Notebook
                                WHEN 2 THEN 2   -- จอ Monitor
                                WHEN 3 THEN 3   -- Keyboard
                                WHEN 4 THEN 4   -- Printer
                                WHEN 5 THEN 5   -- Scanner
                                WHEN 6 THEN 6   -- Camera
                                WHEN 7 THEN 7   -- Fax
                                ELSE 99         -- ประเภทอื่นๆ
                            END';
                        $result = $cls_conn->select_base($sql);
                        $no = 1; // เริ่มต้นค่าของเลขลำดับที่ 1
                        while ($row = mysqli_fetch_array($result)) {
                            $device_type = $row['device_type'];
                            switch ($device_type) {
                                case 0:
                                    $device_type_name = 'Computer';
                                    break;
                                case 1:
                                    $device_type_name = 'Notebook';
                                    break;
                                case 2:
                                    $device_type_name = 'Monitor';
                                    break;
                                case 3:
                                    $device_type_name = 'Keyboard';
                                    break;
                                case 4:
                                    $device_type_name = 'Printer';
                                    break;
                                case 5:
                                    $device_type_name = 'Scanner';
                                    break;
                                case 6:
                                    $device_type_name = 'Camera';
                                    break;
                                case 7:
                                        $device_type_name = 'Fax';
                                        break;
                                default:
                                    $device_type_name = 'ไม่ระบุ';
                                    break;
                            } ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['contract_number']; ?></td>
                                <td><?php echo $row['contract_dinvoicenum']; ?></td>
                                <td><?php echo $row['contract_dstarteddate']; ?></td>
                                <td><?php echo $row['contract_dcon_remained_time']; ?></td>
                                <td><?php echo $device_type_name; ?></td>
                                <td><?php echo $row['device_model']; ?></td>
                                <td><?php echo $row['device_dname']; ?></td>
                                <td><?php echo $row['device_asset_tag']; ?></td>
                                <td><?php echo $row['device_serialnumber']; ?></td>
                                <td><?php echo $row['device_dmanufacturer']; ?></td>
                                <td><?php echo $row['contract_dvender']; ?></td> <!-- ใช้ contract_dvender จาก tb_contract แทน -->
                                <td><?php echo $row['remaining_days']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
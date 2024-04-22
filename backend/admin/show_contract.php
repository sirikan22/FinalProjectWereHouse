<?php
// Include header
include 'header.php';
?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>ข้อมูลสัญญา</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div align="right">
                    <a href="insert_contract.php">
                        <button>ข้อมูลสัญญา</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>เลขที่สัญญา</th>
                            <th>หมายเลขใบแจ้งหนี้</th>
                            <th>ผู้ขายอุปกรณ์</th>
                            <th>ระยะเวลาสัญญาเช่าใช้ทั้งหมด</th>
                            <th>วันที่บันทึก</th>
                            <th>วันที่เริ่มต้นสัญญา</th>
                            <th>ระยะเวลาสัญญาเช่าใช้</th>
                            <th>สกุลเงิน</th>
                            <th>ราคาอุปกรณ์</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Assuming $cls_conn is your database connection object
                        $sql = 'SELECT * FROM tb_contract';
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                            // Calculate remaining contract duration
                            $startDate = new DateTime($row['contract_dstarteddate']);
                            $endDate = new DateTime($row['contract_dcon_remained_time']);
                            $remainingDays = $startDate->diff($endDate)->days;

                            // Output table row
                            echo '<tr>
                            <td>' . $row['contract_id'] . '</td>
                            <td>' . $row['contract_number'] . '</td>
                            <td>' . $row['contract_dinvoicenum'] . '</td>
                            <td>' . $row['contract_dvender'] . '</td>
                            <td>' . $row['contract_dcon_remained_time'] . '</td>
                            <td>' . $row['contract_recordingdate'] . '</td>
                            <td>' . $row['contract_dstarteddate'] . '</td>
                            <td>' . $remainingDays . ' วัน</td>
                            <td>';

                            switch ($row['contract_dcostcurrency']) {
                                case '1':
                                    echo '<span style="color:#32CD32;">THB</span>';
                                    break;
                                case '0':
                                    echo '<span style="color:#FF0000;">USD</span>';
                                    break;
                                case '2':
                                    echo '<span style="color:#FF0000;">EUR</span>';
                                    break;
                                case '3':
                                    echo '<span style="color:#FF0000;">JPY</span>';
                                    break;
                                    // Handle additional currency types if needed
                            }


                            echo '</td>
                            
        <td>' . $row['contract_dcost'] . '</td>
        <td>
            <a href="update_contract.php?id=' . $row['contract_id'] . '" onclick="return confirm(\'คุณต้องการแก้ไขหรือไม่?\')"><img src="../template/image/edit.png" /></a>
        </td>
        <td>
            <a href="delete_contract.php?id=' . $row['contract_id'] . '" onclick="return confirm(\'คุณต้องการลบหรือไม่?\')"><img src="../template/image/delete.png" /></a>
        </td>
    </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
include 'footer.php';
?>
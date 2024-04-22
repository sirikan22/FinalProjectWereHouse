<?php include('header.php'); ?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>ข้อมูลสถานะของทรัพย์สิน</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                <div align="right">
                    <a href="insert_assetchecking.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หมายเลขเครื่อง</th>
                            <th>การบันทึก</th>
                            <th>วันที่บันทึก</th>
                            <th>สถานะการใช้งานของอุปกรณ์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT ac.assetchecking_id, ac.assetchecking_no, ac.assetchecking_note, ac.assetchecking_date, d.device_serialnumber, d.device_installed_status 
                                FROM tb_assetchecking ac
                                INNER JOIN tb_device d ON ac.assetchecking_id = d.device_id";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?= $row['assetchecking_id']; ?></td>
                                <td><?= $row['device_serialnumber']; ?></td>
                                <td><?= $row['assetchecking_note']; ?></td>
                                <td><?= $row['assetchecking_date']; ?></td>
                                <td>
                                    <?php
                                    switch ($row['device_installed_status']) {
                                        case '1':
                                            echo '<span style="color:#32CD32;"`>ใช้งานได้</span>';
                                            break;
                                        case '0':
                                            echo '<span style="color:#FF0000;"`>ใช้งานไม่ได้</span>';
                                            break;
                                        case '2':
                                            echo '<span style="color:#FF00002;"`>ไม่พบ</span>';
                                            break;
                                            case '3':
                                                echo '<span style="color:#FF00002;"`>หมดอายุ</span>';
                                                break;
                                    }
                                    ?>
                                </td>
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

<?php include('footer.php'); ?>

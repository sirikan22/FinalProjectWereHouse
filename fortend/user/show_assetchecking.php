<?php include('header.php'); ?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php
                // รับข้อมูลจากหน้า login
                $user_id = $_SESSION['user_id'];
                $user_username = $_SESSION['user_code'];
                $user_password = $_SESSION['user_password'];

                $sql_user = "SELECT * FROM tb_user WHERE user_code = '$user_username'";
                $result_user = $cls_conn->select_base($sql_user);
                $user_row = mysqli_fetch_assoc($result_user);

                // ตรวจสอบว่ามีข้อมูลผู้ใช้หรือไม่
                if ($user_row) {
                ?>
                    <h3>ข้อมูลสถานะของทรัพย์สิน <br>
                        | ชื่อ-นามสกุล: <?= $user_row['user_fullname']; ?> <br>
                        | รหัสพนักงาน: <?= $user_row['user_code']; ?> <br>
                        | วันที่: <?= date('Y-m-d H:i'); ?></h3>
                <?php
                } else {
                    echo '<h3>ข้อมูลสถานะของทรัพย์สิน</h3>';
                }
                ?>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หมายเลขอุปกรณ์</th>
                            <th>ชื่ออุปกรณ์</th>
                            <th>สถานะการใช้งาน</th>
                            <th>วันที่บันทึก</th>
                            <th>แก้ไขข้อมูลอุปกรณ์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // แก้ไข query โดยเพิ่มเงื่อนไข WHERE user_code = $user_id
                        $sql_device = "SELECT * FROM tb_device WHERE user_code = '{$user_row['user_code']}'";
                        $result_device = $cls_conn->select_base($sql_device);
                        $counter = 1;

                        while ($row_device = mysqli_fetch_array($result_device)) {
                        ?>
                            <tr>
                                <td><?= $counter++; ?></td>
                                <td><?= $row_device['device_serialnumber']; ?></td>
                                <td><?= $row_device['device_dname']; ?></td>
                                
                                <td>
                                    <?php
                                    switch ($row_device['device_installed_status']) {
                                        case '1':
                                            echo '<span style="color:#32CD32;">ใช้งานได้</span>';
                                            break;
                                        case '0':
                                            echo '<span style="color:#FF0000;">ใช้งานไม่ได้</span>';
                                            break;
                                        case '2':
                                            echo '<span style="color:#FF00002;">ไม่พบ</span>';
                                            break;
                                            case '3':
                                                echo '<span style="color:#FF00002;">หมดอายุ</span>';
                                                break;
                                    }
                                    ?>
                                </td>
                                <td><?= $row_device['device_datetime']; ?></td>
                                <td>
                                    <a href="update_assetchecking.php?id=<?= $row_device['device_id']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')">
                                        <img src="../template/image/edit.png" />
                                    </a>
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
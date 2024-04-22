<?php
session_start();
include('header.php');
?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>ข้อมูลพนักงาน</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <!-- <th>ลำดับ</th> -->
                            <th>ชื่อพนักงาน</th>
                            <th>ตำแหน่ง</th>
                            <th>E-mail</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>แผนก</th>
                            <th>รหัสพนักงาน</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>วันที่บันทึก</th>
                            <th>แก้ไขข้อมูลส่วนตัว</th>
                            <!-- <th>ลบ</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT * FROM tb_user WHERE user_id = $user_id";
                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                    <!-- <td><?= $row['user_id']; ?></td> -->
                                    <td><?= $row['user_fullname']; ?></td>
                                    <td><?= $row['user_position']; ?></td>
                                    <td><?= $row['user_email']; ?></td>
                                    <td><?= $row['user_phone']; ?></td>
                                    <td><?= $row['user_department']; ?></td>
                                    <td><?= $row['user_code']; ?></td>
                                    <td><?= $row['user_username']; ?></td>
                                    <td><?= md5($row['user_password']); ?></td>
                                    <td><?= $row['user_datetime']; ?></td>
                                    <td><a href="update_user.php?id=<?= $row['user_id']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../template/image/edit.png" /></a></td>
                                    <!-- <td><a href="delete_user.php?id=<?= $row['user_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../template/image/delete.png" /></a></td> -->
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<?php
session_start();
include('header.php');
?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>ข้อมูลช่างเทคนิค</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>E-mail</th>
                            <th>username</th>
                            <th>รหัสผ่าน</th>
                            <th>แผนก</th>
                            <th>ตำแหน่ง</th>
                            <th>วันที่บันทึก</th>
                            <th>แก้ไขข้อมูลส่วนตัว</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_SESSION['onsite_id'])) {
                            $onsite_id = $_SESSION['onsite_id'];
                            $sql = "SELECT * FROM tb_onsite WHERE onsite_id = $onsite_id";
                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                    <td><?= $row['onsite_id']; ?></td>
                                    <td><?= $row['onsite_fullname']; ?></td>
                                    <td><?= $row['onsite_phone']; ?></td>
                                    <td><?= $row['onsite_email']; ?></td>
                                    <td><?= $row['onsite_username']; ?></td>
                                    <td><?= md5($row['onsite_password']); ?></td>
                                    <td><?= $row['onsite_department']; ?></td>
                                    <td><?= $row['onsite_position']; ?></td>
                                    <td><?= $row['onsite_datetime']; ?></td>
                                    <!-- <td><?= $row['onsite_installedstatus']; ?></td> -->
                                    <td><a href="update_onsite.php?id=<?= $row['onsite_id']; ?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../template/image/edit.png" /></a></td>
                                    <!-- <td><a href="delete_user.php?id=<?= $row['onsite_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../template/image/delete.png" /></a></td> -->
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

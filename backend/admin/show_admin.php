<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ข้อมูลผู้ดูแลระบบ </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                <div align="right">
                    <a href="insert_admin.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>รหัสผู้ดูแล</th>
                            <th>ชื่อผู้ดูแลระบบ</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>รหัสผ่าน</th>
                            <th>อีเมลผู้ดูแลระบบ</th>
                            <th>เบอร์โทรศัพท์ผู้ดูแลระบบ</th>
                            <th>ตำแหน่ง</th>
                            <th>แผนก</th>
                            <th>วันที่บันทึก</th>
                            <th>แก้ไข</th>





                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        if (isset($_SESSION['admin_id'])) {
                            $admin_id = $_SESSION['admin_id'];
                            $sql = "SELECT * FROM tb_admin WHERE admin_id = $admin_id";
                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['admin_id']; ?>
                                </td>
                                <td>
                                    <?= $row['admin_fullname']; ?>
                                </td>
                                <td>
                                    <?= $row['admin_username']; ?>
                                </td>
                                <td>
                                    <?= md5($row['admin_password']); ?>
                                </td>
                                <td>
                                    <?= $row['admin_email']; ?>
                                </td>
                                <td>
                                    <?= $row['admin_phone']; ?>
                                </td>
                                <td>
                                    <?= $row['admin_position']; ?>
                                </td>
                                <td>
                                    <?= $row['admin_role']; ?>
                                </td>
                                <td>
                                    <?= $row['admin_time']; ?>
                                </td>
                                <td>
                                    <a href="update_admin.php?id=<?= $row['admin_id']; ?>" 
                                    onclick="return confirm('คุณต้องการแก้ไขข้อมูลหรือไม่?')"><img src="../template/image/edit.png" /></a>
                                </td>
                                <td>
                                    <a href="delete_admin.php?id=<?= $row['admin_id']; ?>" 
                                    onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../template/image/delete.png" /></a>
                                </td>
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
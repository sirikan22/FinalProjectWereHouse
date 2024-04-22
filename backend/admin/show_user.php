<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>ข้อมูลพนักงาน </h3>
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
                <div align="right">
                    <a href="insert_user.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อพนักงาน</th>
                            <th>ตำแหน่ง</th>
                            <th>E-mail</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>แผนก</th>
                            <th>รหัสพนักงาน</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>วันที่บันทึก</th>


                           
                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $sql = " select * from tb_user";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['user_id']; ?>
                                </td>
                                <td>
                                    <?= $row['user_fullname']; ?>
                                </td>
                                <td>
                                    <?= $row['user_position']; ?>
                                </td>
                                <td>
                                    <?= $row['user_email']; ?>
                                </td>
                                <td>
                                    <?= $row['user_phone']; ?>
                                </td>
                                <td>
                                    <?= $row['user_department']; ?>
                                </td>
                                <td>
                                    <?= $row['user_code']; ?>
                                </td>
                                <td>
                                    <?= $row['user_username']; ?>
                                </td>
                                <td>
                                    <?= md5($row['user_password']); ?>
                                </td>
                                <td>
                                    <?= $row['user_datetime']; ?>
                                </td>


                               
                                <td>
                                    <a href="delete_user.php?id=<?= $row['user_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../template/image/delete.png" /></a>
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
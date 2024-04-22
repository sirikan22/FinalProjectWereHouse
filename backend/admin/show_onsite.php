<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>ข้อมูลผู้ใช้งานระบบ ช่างเทคนิค</h3>
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
                    <a href="insert_onsite.php">
                        <button>เพิ่มข้อมูล</button>
                    </a>
                </div>
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



                            <th>ลบ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $sql = " select * from tb_onsite";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['onsite_id']; ?>
                                </td>
                                <td>
                                    <?= $row['onsite_fullname']; ?>
                                </td>
                                <td>
                                    <?= $row['onsite_phone']; ?>
                                </td>
                                <td>
                                    <?= $row['onsite_email']; ?>
                                </td>
                                <td>
                                    <?= $row['onsite_username']; ?>
                                </td>
                                <td>
                                    <?= md5($row['onsite_password']); ?>
                                </td>
                                <td>
                                    <?= $row['onsite_department']; ?>
                                </td>
                                <td>
                                    <?= $row['onsite_position']; ?>
                                </td>
                                <td>
                                    <?= $row['onsite_datetime']; ?>
                                </td>
                                <td>
                                    <a href="delete_onsite.php?id=<?= $row['onsite_id']; ?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../backend/template/image/delete.png" /></a>
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
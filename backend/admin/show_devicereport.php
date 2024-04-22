<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>รายงานทรัพย์สินบริษัทเช่าใช้ทั้งหมด</h3>
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
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หมายเลขทรัพย์สิน</th>
                            <th>หมายเลขอุปกรณ์</th>
                            <th>ชื่ออุปกรณ์</th>
                            <th>รายละเอียดของอุปกรณ์</th>
                            <th>รหัสพนักงาน</th>
                            <th>ประเภทอุปกรณ์</th>
                            <th>รุ่นอุปกรณ์</th>
                            <th>ผู้ผลิตอุปกรณ์</th>
                            <th>ตำแหน่งของอุปกรณ์</th>
                            <th>สถานะการติดตั้ง</th>
                            <th>วันที่บันทึก </th>
                            <th>ข้อเสนอแนะ</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $sql = " select * from tb_device";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <?= $row['device_id']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['device_asset_tag']; ?>
                                </td>
                                <td>
                                    <?= $row['device_serialnumber']; ?>
                                </td>
                                <td>
                                    <?= $row['device_dname']; ?>
                                </td>
                                <td>
                                    <?= $row['device_description']; ?>
                                </td>
                                <td>
                                    <?= $row['user_code']; ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($row['device_type']) {
                                        case '1':
                                            echo '<span style="color:#32CD32;">Notebook</span>';
                                            break;
                                        case '0':
                                            echo '<span style="color:#FF0000;">Computer</span>';
                                            break;
                                        case '2':
                                            echo '<span style="color:#FF0000;">Monitor</span>';
                                            break;
                                        case '3':
                                            echo '<span style="color:#FF0000;">Keyboard</span>';
                                            break;
                                        case '4':
                                            echo '<span style="color:#FF0000;">Printer</span>';
                                            break;
                                        case '5':
                                            echo '<span style="color:#FF0000;">Scanner</span>';
                                            break;
                                        case '6':
                                            echo '<span style="color:#FF0000;">Camera</span>';
                                            break;
                                            case '7':
                                                echo '<span style="color:#FF0000;">Fax</span>';
                                                break;
                                    }


                                    ?>
                                </td>
                                <td>
                                    <?= $row['device_model']; ?>
                                </td>
                                <td>
                                    <?= $row['device_dmanufacturer']; ?>
                                </td>
                                <td>
                                    <?= $row['device_location']; ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($row['device_installed_status']) {
                                        case '1':

                                            echo '<span style="color:#32CD32;"`>ติดตั้งสำเร็จ</span>';
                                            break;
                                        case '0':

                                            echo '<span style="color:#FF0000;"`>ติดตั้งไม่สำเร็จ</span>';
                                            break;
                                        case '2':

                                            echo '<span style="color:#FF00002;"`>คลังสินค้า</span>';
                                            break;
                                        case '3':

                                            echo '<span style="color:#FF00002;"`>หมดอายุ</span>';
                                            break;
                                    }


                                    ?>
                                </td>
                                <td>
                                    <?= $row['device_datetime']; ?>
                                </td>
                                
                                <td>
                                    <?= $row['device_comment']; ?>
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
<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>รายงานจำนวนทรัพย์สินแยกตามประเภทและรุ่น</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ประเภทอุปกรณ์</th>
                            <th>รุ่นอุปกรณ์</th>
                            <th>จำนวน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Assuming $cls_conn is your database connection object
                        $sql = "SELECT ROW_NUMBER() OVER(ORDER BY device_type, device_model) AS No,
                                   COUNT(device_type) AS qty, device_type, device_model
                                   FROM tb_device
                                   GROUP BY device_type, device_model";
                        $result = $cls_conn->select_base($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row['No'] . "</td>
                                <td>";
                                
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

                                echo "</td>
                                <td>" . $row['device_model'] . "</td>
                                <td>" . $row['qty'] . "</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

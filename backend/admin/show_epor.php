<?php include('header.php'); ?>
<script>
    function exportToCSV() {
        var csvContent = "data:text/csv;charset=utf-8,";
        var rows = document.querySelectorAll("table tr");

        rows.forEach(function (row) {
            var rowData = [];
            row.querySelectorAll("td, th").forEach(function (cell) {
                rowData.push(cell.innerText);
            });
            csvContent += rowData.join(",") + "\n";
        });

        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "report.csv");
        document.body.appendChild(link);
        link.click();
    }

    function printAllReports() {
        var tables = document.querySelectorAll("table");
        tables.forEach(function (table) {
            var printContents = table.outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    }

    // เพิ่มฟังก์ชันสำหรับให้ Ctrl+P ปริ้นหน้าเว็บ
    document.addEventListener('keydown', function (e) {
        if (e.ctrlKey && e.key === 'p') {
            e.preventDefault();
            printAllReports();
        }
    });
</script>
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>รายงานการถือครองทรัพย์สินของพนักงาน</h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form method="GET" action="">
                    <div class="form-group">
                        <label for="search_user_code">ค้นหารหัสพนักงาน:</label>
                        <input type="text" name="search_user_code" id="search_user_code" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                    <a href="show_epor.php" class="btn btn-primary">ยกเลิก</a>
                </form>
                <button onclick="exportToCSV()" class="btn btn-primary">Export to CSV</button>
                <button onclick="printAllReports()" class="btn btn-primary">Print ทั้งหมด</button>
                <?php
                $search_user_code = isset($_GET['search_user_code']) ? $_GET['search_user_code'] : '';

                $sql_user_info = "SELECT user_fullname, user_code FROM tb_user WHERE user_code LIKE '%$search_user_code%'";
                $result_user_info = $cls_conn->select_base($sql_user_info);

                while ($row_user_info = $result_user_info->fetch_assoc()) {
                    echo '<table id="datatable-buttons" class="table table-striped table-bordered">';

                    echo '<tr>';
                    echo '<th>ชื่อ-นามสกุล</th>';
                    echo '<th>รหัสพนักงาน</th>';
                    echo '<th>หมายเลขทรัพย์สิน</th>';
                    echo '<th>หมายเลขเครื่อง</th>';
                    echo '<th>ชื่ออุปกรณ์</th>';
                    echo '<th>ประเภท</th>';
                    echo '<th>จำนวน</th>';
                    echo '</tr>';
                    echo '<tbody>';

                    $sql = "SELECT 
                                device_asset_tag,
                                device_serialnumber,
                                device_dname,
                                device_type,
                                COUNT(*) AS qty
                            FROM 
                                tb_device
                            WHERE 
                                user_code = '{$row_user_info['user_code']}'
                            GROUP BY 
                                device_type, 
                                device_asset_tag, 
                                device_serialnumber, 
                                device_dname";
                    $result = $cls_conn->select_base($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th>' . $row_user_info['user_fullname'] . '</th>';
                        echo '<th>' . $row_user_info['user_code'] . '</th>';
                        echo '<td>' . $row['device_asset_tag'] . '</td>';
                        echo '<td>' . $row['device_serialnumber'] . '</td>';
                        echo '<td>' . $row['device_dname'] . '</td>';

                        switch ($row['device_type']) {
                            case '1':
                                echo '<td><span style="color:#32CD32;">Notebook</span></td>';
                                break;
                            case '0':
                                echo '<td><span style="color:#FF0000;">Computer</span></td>';
                                break;
                            case '2':
                                echo '<td><span style="color:#FF0000;">Monitor</span></td>';
                                break;
                            case '3':
                                echo '<td><span style="color:#FF0000;">Keyboard</span></td>';
                                break;
                            case '4':
                                echo '<td><span style="color:#FF0000;">Printer</span></td>';
                                break;
                            case '5':
                                echo '<td><span style="color:#FF0000;">Scanner</span></td>';
                                break;
                            case '6':
                                echo '<td><span style="color:#FF0000;">Camera</span></td>';
                                break;
                            case '7':
                                echo '<td><span style="color:#FF0000;">Fax</span></td>';
                                break;
                        }

                        echo '<td>' . $row['qty'] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }
                ?>
                
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

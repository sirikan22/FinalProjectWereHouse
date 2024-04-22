<?php include('header.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>กราฟสรุปรายงานจำนวนทรัพย์สินแยกตามประเภทอุปกรณ์</h3>
                <div class="clearfix"></div>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>ประเภทอุปกรณ์</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $sql = "SELECT ROW_NUMBER() OVER(ORDER BY device_type) AS No,
                   COUNT(device_type) AS qty, device_type
                   FROM tb_device
                   GROUP BY device_type";
        $result = $cls_conn->select_base($sql);
        $total_qty = 0; 

        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>" . $row['No'] . "</td>
                <td>";
                
            switch ($row['device_type']) {
                case '1':
                    echo '<span style="color:#0243FF;">Notebook</span>';
                    break;
                case '0':
                    echo '<span style="color:#02FFE8;">Computer</span>';
                    break;
                case '2':
                    echo '<span style="color:#3FFF02;">Monitor</span>';
                    break;
                case '3':
                    echo '<span style="color:#DE9423;">Keyboard</span>';
                    break;
                case '4':
                    echo '<span style="color:#F3FF02;">Printer</span>';
                    break;
                case '5':
                    echo '<span style="color:#FF0000;">Scanner</span>';
                    break;
                case '6':
                    echo '<span style="color:#FF02DC;">Camera</span>';
                    break;
                case '7':
                    echo '<span style="color:#AB02FF;">Fax</span>';
                    break;
            }

            echo "</td>
            <td>" . $row['qty'] . "</td>
            </tr>";

            $total_qty += $row['qty']; 
        }
        ?>
        <tr>
            <td colspan="2" style="text-align: right;">จำนวน:</td>
            <td><?php echo $total_qty; ?></td>
        </tr>
    </tbody>
</table>
            <div class="x_content"style="height: 400px; width: 100%;">
                <canvas id="myPieChart"></canvas>
                <script>
                    <?php
                    $sql = "SELECT COUNT(device_type) AS qty, device_type 
                            FROM tb_device
                            GROUP BY device_type";
                    $result = $cls_conn->select_base($sql);
                    $data = array();
                    $labels = array();
                    $colors = array("#DE9423", "#F3FF02", "#3FFF02", "#02FFE8", "#0243FF", "#AB02FF", "#FF02DC", "#FF0000");
                    while ($row = $result->fetch_assoc()) {
                        switch ($row['device_type']) {
                            case '1':
                                $labels[] = 'Notebook';
                                break;
                            case '0':
                                $labels[] = 'Computer';
                                break;
                            case '2':
                                $labels[] = 'Monitor';
                                break;
                            case '3':
                                $labels[] = 'Keyboard';
                                break;
                            case '4':
                                $labels[] = 'Printer';
                                break;
                            case '5':
                                $labels[] = 'Scanner';
                                break;
                            case '6':
                                $labels[] = 'Camera';
                                break;
                            case '7':
                                $labels[] = 'Fax';
                                break;
                        }
                        $data[] = $row['qty'];
                    }
                    ?>
                </script>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($data); ?>,
                backgroundColor: <?php echo json_encode($colors); ?>
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'right'
            }
        }
    });
</script>

<?php include('footer.php'); ?>

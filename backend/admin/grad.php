<?php include 'header.php'; ?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>กราฟสรุปรายงานสถานะทรัพย์สินที่พนักงานถือครอง</h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">

                    <table id="datatable-buttons" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th>รายชื่ออุปกรณ์</th>
                                <th>จำนวน (เครื่อง)</th>
                                <th>ใช้งานได้</th>
                                <th>ใช้งานไม่ได้</th>
                                <th>จำนวนที่ไม่พบ (เครื่อง)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT 
                                        CASE 
                                            WHEN d.device_type = 0 THEN 'Computer'
                                            WHEN d.device_type = 1 THEN 'Notebook'
                                            WHEN d.device_type = 2 THEN 'Monitor'
                                            WHEN d.device_type = 3 THEN 'Keyboard'
                                            WHEN d.device_type = 4 THEN 'Printer'
                                            WHEN d.device_type = 5 THEN 'Scanner'
                                            WHEN d.device_type = 6 THEN 'Camera'
                                            WHEN d.device_type = 7 THEN 'Fax'
                                            ELSE ''
                                        END AS device_type,
                                        
                                        COUNT(*) AS total,
                                        SUM(CASE WHEN device_installed_status = 1 THEN 1 ELSE 0 END) AS working,
                                        SUM(CASE WHEN device_installed_status = 0 THEN 1 ELSE 0 END) AS not_working,
                                        SUM(CASE WHEN device_installed_status = 2 THEN 1 ELSE 0 END) AS not_found
                                    FROM 
                                        tb_assetchecking ac 
                                    INNER JOIN 
                                        tb_device d ON ac.assetchecking_id  = d.device_id
                                    GROUP BY 
                                        d.device_type";
                                        
                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['device_type']; ?></td>
                                    <td><?php echo $row['total']; ?></td>
                                    <td><?php echo $row['working']; ?></td>
                                    <td><?php echo $row['not_working']; ?></td>
                                    <td><?php echo $row['not_found']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td>สรุปจำนวน</td>
                                <?php
                                $total_sum = 0;
                                $working_sum = 0;
                                $not_working_sum = 0;
                                $not_found_sum = 0;

                                $result = $cls_conn->select_base($sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    $total_sum += $row['total'];
                                    $working_sum += $row['working'];
                                    $not_working_sum += $row['not_working'];
                                    $not_found_sum += $row['not_found'];
                                }
                                ?>
                                <td><?php echo $total_sum; ?></td>
                                <td><?php echo $working_sum; ?></td>
                                <td><?php echo $not_working_sum; ?></td>
                                <td><?php echo $not_found_sum; ?></td>
                            </tr>
                                <?php
                                $deviceData = array(
                                    'deviceTypes' => array(),
                                    'totalDevices' => array(),
                                    'workingDevices' => array(),
                                    'notWorkingDevices' => array(),
                                    'notFoundDevices' => array(),
                                );

                               $result = $cls_conn->select_base($sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    $deviceData['deviceTypes'][] = $row['device_type'];
                                    $deviceData['totalDevices'][] = $row['total'];
                                    $deviceData['workingDevices'][] = $row['working'];
                                    $deviceData['notWorkingDevices'][] = $row['not_working'];
                                    $deviceData['notFoundDevices'][] = $row['not_found'];
                                }
                                ?>
                        </tbody>
                    </table>
                    
                    <!-- Include Chart.js library -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <!-- Create a canvas element for the bar chart -->
                    <canvas id="barChart" width="200" height="100"></canvas>

                    <script>
                        // Get the data from PHP and convert it to a JavaScript object
                        var deviceData = <?php echo json_encode($deviceData); ?>;

                        // Get the canvas element
                        var ctx = document.getElementById('barChart').getContext('2d');

                        // Create a bar chart
                        
                        // Create a bar chart
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: deviceData.deviceTypes.map((type, index) => `${type} (${deviceData.totalDevices[index]})`),
        datasets: [
            {
                label: 'Working Devices',
                data: deviceData.workingDevices,
                backgroundColor: 'rgba(255, 99, 132, 5)',
                borderColor: 'rgba(255, 99, 132, 10)',
                borderWidth: 1
            },
            {
                label: 'Not Working Devices',
                data: deviceData.notWorkingDevices,
                backgroundColor: 'rgba(255, 205, 86, 5)',
                borderColor: 'rgba(255, 205, 86, 10)',
                borderWidth: 1
            },
            {
                label: 'Not Found Devices',
                data: deviceData.notFoundDevices,
                backgroundColor: 'rgba(54, 162, 235, 5)',
                borderColor: 'rgba(54, 162, 235, 10)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            x: { stacked: true },
            y: { stacked: true }
        }
    }
});
                    </script>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php include('header.php'); ?>

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ลบข้อมูลทรัพย์สิน</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <?php
                    // Check if 'id' is set and is a valid number
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id = intval($_GET['id']); // Convert to integer for security

                        $sql = "DELETE FROM tb_assetchecking WHERE assetchecking_id = $id";

                        if ($cls_conn->write_base($sql) == true) {
                            echo $cls_conn->show_message('ลบข้อมูลสำเร็จ');
                            echo $cls_conn->goto_page(1, 'show_assetchecking.php');
                        } else {
                            echo $cls_conn->show_message('ลบข้อมูลไม่สำเร็จ');
                            echo $sql;
                        }
                    } else {
                        echo $cls_conn->show_message('รหัสไม่ถูกต้อง');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

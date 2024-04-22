<?php include('header.php');?>
<?php
session_destroy();
echo $cls_conn->goto_page(0,'../../fortend/login.php');

?>
<?php include('footer.php');?>
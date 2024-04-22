<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>แก้ไขข้อมูลพนักงาน</h3>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                            $sql=" select *  from tb_user";
                            $sql.=" where";
                            $sql.=" user_id=$id";
                            $result=$cls_conn->select_base($sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $user_id=$row['user_id'];
                                $user_fullname=$row['user_fullname'];
                                $user_position=$row['user_position'];
                                $user_email=$row['user_email'];
                                $user_phone=$row['user_phone'];
                                $user_department=$row['user_department'];
                                $user_code=$row['user_code'];
                                $user_username=$row['user_username'];
                                $user_password=md5($row['user_password']);
                            }
                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="user_id" value="<?=$user_id;?>" />
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_fullname">ชื่อ-นามสกุล<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_fullname" name="user_fullname" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_fullname;?>"> </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_position">ตำแหน่ง<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_position" name="user_position" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_position;?>" > </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_email">E-mail<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_email" name="user_email" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_email;?>" > </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_phone">เบอร์โทรศัพท์<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_phone" name="user_phone" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_phone;?>" > </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_department">แผนก<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_department" name="user_department" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_department;?>" > </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_code">รหัสพนักงาน<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_code" name="user_code" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_code;?>" > </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_username">ชื่อผู้ใช้<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_username" name="user_username" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_username;?>" > </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_password">รหัสผผ่าน<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_password" name="user_password" minlength="7" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_password;?>" > </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_datetime">วันที่บันทึก<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="user_datetime" name="user_datetime" required="required" class="form-control col-md-7 col-xs-12" value="<?= $row['user_datetime'] ?>"> </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="submit" class="btn btn-success">แก้ไข</button>
                                    <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $user_id=$_POST['user_id'];
                            $user_fullname=$_POST['user_fullname'];
                            $user_position=$_POST['user_position'];
                            $user_email=$_POST['user_email'];
                            $user_phone=$_POST['user_phone'];
                            $user_department=$_POST['user_department'];
                            $user_code=$_POST['user_code'];
                            $user_username=$_POST['user_username'];
                            $user_password=md5($_POST['user_password']);
                            $user_datetime=$_POST['user_datetime'];

                            $sql=" update tb_user";
                            $sql.=" set";
                            $sql.=" user_fullname='$user_fullname'";
                            $sql.=" ,user_position='$user_position'";
                            $sql.=" ,user_email='$user_email'";
                            $sql.=" ,user_phone='$user_phone'";
                            $sql.=" ,user_department='$user_department'";
                            $sql.=" ,user_code='$user_code'";
                            $sql.=" ,user_username='$user_username'";
                            $sql.=" ,user_password='$user_password'";
                            $sql.=" ,user_datetime='$user_datetime'";
                            $sql.=" where";
                            $sql.=" user_id=$user_id";
                             
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_user.php');
                            }
                            else
                            {
                                 echo $cls_conn->show_message('แก้ไขข้อมูลไม่สำเร็จ');
                                 echo $sql;
                            }
                        }
                        
                        ?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php');?>
<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>แก้ไขข้อมูล ช่างเทคนิค</h3>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                            $sql=" select *  from tb_onsite";
                            $sql.=" where";
                            $sql.=" onsite_id=$id";
                            $result=$cls_conn->select_base($sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $onsite_id=$row['onsite_id'];
                                $onsite_fullname=$row['onsite_fullname'];
                                $onsite_position=$row['onsite_position'];
                                $onsite_email=$row['onsite_email'];
                                $onsite_phone=$row['onsite_phone'];
                                $onsite_department=$row['onsite_department'];
                                $onsite_username=$row['onsite_username'];
                                $onsite_password=md5($row['onsite_password']);
                            }
                        }
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="onsite_id" value="<?=$onsite_id;?>" />
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_fullname">ชื่อ-นามสกุล<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="onsite_fullname" name="onsite_fullname" required="required" class="form-control col-md-7 col-xs-12" value="<?=$onsite_fullname;?>"> </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_position">ตำแหน่ง<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="onsite_position" name="onsite_position" required="required" class="form-control col-md-7 col-xs-12" value="<?=$onsite_position;?>" > </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_email">E-mail<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="onsite_email" name="onsite_email" required="required" class="form-control col-md-7 col-xs-12" value="<?=$onsite_email;?>" > </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_phone">เบอร์โทรศัพท์<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="onsite_phone" name="onsite_phone" required="required" class="form-control col-md-7 col-xs-12" value="<?=$onsite_phone;?>" > </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_department">แผนก<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="onsite_department" name="onsite_department" required="required" class="form-control col-md-7 col-xs-12" value="<?=$onsite_department;?>" > </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_code">รหัสพนักงาน<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="user_code" name="user_code" required="required" class="form-control col-md-7 col-xs-12" value="<?=$user_code;?>" > </div>
                            </div> -->

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_username">ชื่อผู้ใช้<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="onsite_username" name="onsite_username" required="required" class="form-control col-md-7 col-xs-12" value="<?=$onsite_username;?>" > </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_password">รหัสผ่าน<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="onsite_password" name="onsite_password" minlength="7" required="required" class="form-control col-md-7 col-xs-12" value="<?=$onsite_password;?>" > </div>
                            </div>

                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onsite_datetime">วันที่บันทึก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="onsite_datetime" name="onsite_datetime" value="<?=$onsite_datetime;?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
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
                            $onsite_id=$_POST['onsite_id'];
                            $onsite_fullname=$_POST['onsite_fullname'];
                            $onsite_position=$_POST['onsite_position'];
                            $onsite_email=$_POST['onsite_email'];
                            $onsite_phone=$_POST['onsite_phone'];
                            $onsite_department=$_POST['onsite_department'];
                            $onsite_username=$_POST['onsite_username'];
                            $onsite_password=md5($_POST['onsite_password']);
                            $onsite_datetime=$_POST['onsite_datetime'];
                            
                            $sql=" update tb_onsite";
                            $sql.=" set";
                            $sql.=" onsite_fullname='$onsite_fullname'";
                            $sql.=" ,onsite_position='$onsite_position'";
                            $sql.=" ,onsite_email='$onsite_email'";
                            $sql.=" ,onsite_phone='$onsite_phone'";
                            $sql.=" ,onsite_department='$onsite_department'";
                            $sql.=" ,onsite_username='$onsite_username'";
                            $sql.=" ,onsite_password='$onsite_password'";
                            $sql.=" ,onsite_datetime='$onsite_datetime'";
                            $sql.=" where";
                            $sql.=" onsite_id=$onsite_id";
                             
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_onsite.php');
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
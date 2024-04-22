<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>แก้ไขข้อมูลผู้ดูแลระบบ</h3>
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
                            $sql=" select *  from tb_admin";
                            $sql.=" where";
                            $sql.=" admin_id=$id";
                            $result=$cls_conn->select_base($sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $admin_id=$row['admin_id'];
                                $admin_fullname=$row['admin_fullname'];
                                $admin_email=$row['admin_email'];
                                $admin_phone=$row['admin_phone'];
                                $admin_username=$row['admin_username'];
                                $admin_password=md5($row['admin_password']);
                                $admin_position=$row['admin_position'];
                                $admin_role=$row['admin_role'];
                                
                            }
                        }
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="admin_id" value="<?=$admin_id;?>" />
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_fullname">ชื่อผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_fullname" name="admin_fullname" value="<?=$admin_fullname;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_username">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_username" name="admin_username" value="<?=$admin_username;?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_password">รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="admin_password" name="admin_password" value="<?=$admin_password;?>" minlength="7" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_email">อีเมลดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="admin_email" name="admin_email" value="<?=$admin_email;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_phone">เบอร์โทรศัพท์ผู้ดูแลระบบ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_phone" name="admin_phone" value="<?=$admin_phone;?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_position">ตำแหน่ง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_position" name="admin_position" value="<?=$admin_position;?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_role">แผนก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="admin_role" name="admin_role" value="<?=$admin_role;?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_time">วันที่บันทึก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="admin_time" name="admin_time" value="<?=$admin_time;?>" required="required" class="form-control col-md-7 col-xs-12">
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
                            $admin_id=$_POST['admin_id'];
                            $admin_fullname=$_POST['admin_fullname'];
                            $admin_email=$_POST['admin_email'];
                            $uadmin_phone=$_POST['uadmin_phone'];
                            $admin_username=$_POST['admin_username'];
                            $admin_password=md5($_POST['admin_password']);
                            $admin_position=$_POST['admin_position'];
                            $admin_role=$_POST['admin_role'];
                            $admin_time=$_POST['admin_time'];
                            
                            $sql=" update tb_admin";
                            $sql.=" set";
                            $sql.=" admin_fullname='$admin_fullname'";
                            $sql.=" ,admin_email='$admin_email'";
                            $sql.=" ,admin_phone='$admin_phone'";
                            $sql.=" ,admin_username='$admin_username'";
                            $sql.=" ,admin_password='$admin_password'";
                            $sql.=" ,admin_position='$admin_position'";
                            $sql.=" ,admin_role='$admin_role'";
                            $sql.=" ,admin_time='$admin_time'";
                            $sql.=" where";
                            $sql.=" admin_id=$admin_id";
                             
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_admin.php');
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
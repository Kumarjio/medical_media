<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Profile</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                <?php $profile = $profile[0]; ?>
                    <div class="row">
                        
                        <div class="col-md-12">                        

                            <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Edit Profile</h3>
                                    <form id="jvalidate" role="form" class="form-horizontal" method="post" action="<?php echo base_url('index.php/Dashboard/ProfileSettings/'.$profile->admin_id);?>">
                                    <div class="panel-body">                                    
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username<sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="text" style="color:#000;" class="form-control txtNoSpaces" name="username" readonly  id="username" value="<?php echo $profile->username;  ?>" placeholder="Enter Username"/>
                                               
                                              <div class="error" ><?php echo form_error('username'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password<sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="password" class="form-control txtNoSpaces uppercase" name="password"  id="password" value="<?php echo $profile->password;  ?>" placeholder="Enter Password"/>
                                                
                                              <div class="error" ><?php echo form_error('password'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Re-type Password<sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="password" class="form-control txtNoSpaces uppercase" name="con_password"  id="con_password" value="<?php echo $profile->password;  ?>" placeholder="Enter Re-type Password"/>
                                               
                                              <div class="error" ><?php echo form_error('con_password'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Name<sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" name="name"  id="name" value="<?php echo $profile->name;  ?>" placeholder="Enter Name"/>
                                                
                                              <div class="error" ><?php echo form_error('name'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User Type<sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" style="color:#000;" readonly name="usertype"  id="usertype" value="<?php if($profile->user_type==1){ echo "Admin";}else{echo "User";}  ?>"/>
                                                
                                              <div class="error" ><?php echo form_error('uppercase'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emp Code<sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" name="emp_code"  id="email_id" value="<?php echo $profile->emp_code;  ?>" placeholder="Enter Email ID"/>
                                                
                                              <div class="error" ><?php echo form_error('email_id'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-7"></div>
                                        <div class="btn-group pull-left col-md-4">                                                                                        <input class="btn btn-primary" value="Update" type="submit"><input class="btn btn-warning" type="Reset">
</div>                                                                                                                          
                                    </div>                                               
                                    </form>
                                </div>
                            </div>
                            <!-- END JQUERY VALIDATION PLUGIN -->
                            </div>
                        </div>
                    </div>

                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>





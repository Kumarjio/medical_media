<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<head>        
        <!-- META SECTION -->
        <title>A2Z</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <!--<link rel="icon" href="favicon.ico" type="image/x-icon" />-->
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
       <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/css/theme-default.css'); ?>"/>
        <?php /*?><link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/css/theme-default.css');?>/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>"><?php */?>
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="<?php echo base_url('index.php/login/index');?>" class="form-horizontal" method="post">
                                    	<div style="padding-top:10px;"> <?php echo $this->session->flashdata('msg'); ?> </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control uppercase" placeholder="Username" onpaste="return false;" name="txtusername" id="txtusername"/>
                                                  	<span style="color:#fff" ><?php echo form_error('txtusername'); ?></span>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control uppercase" placeholder="Password" onpaste="return false;"   name="txtpassword" id="txtpassword" />
                            <span style="color:#fff" ><?php echo form_error('txtpassword'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                           <!--  <a href="<?php echo base_url('index.php/login/forgot');?>" class="btn btn-link btn-block">Forgot your password?</a> -->
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left"> <!--style="color:#02698f; font-weight:600"-->
                        &copy; <?php echo date('Y') ?> A2Z
                    </div>
                  
                </div>
            </div>
            
        </div>
    
   
        
    </body>

</html>







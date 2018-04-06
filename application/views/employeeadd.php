<?php $session_data = $this->session->all_userdata();?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Add Employee</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Employee/addCustomer');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                          
										  
										  
                                            
                                             <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Employee Code<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" required class="form-control uppercase"  name="ecode"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo set_value('name');  ?>">
                                                    <div class="error" ><?php echo form_error('emp_code'); ?></div>                                               
                                                </div>
                                            </div>
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Employee Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" required class="form-control uppercase"  name="name"  placeholder="Enter Employee Name" id="customer_name" >
                                                    <div class="error" ><?php echo form_error('name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Employee Type<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<select  class="selectpicker form-control "  name="emp_type" id="emp_type"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option>      
                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                    </select>
                                                    <div class="error" ><?php echo form_error('name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Location<?php /*?><sup  style="color:#f00"> * </sup><?php */?></label>
                                                <div class="col-md-8">
                                                <input type="text" required class="form-control uppercase"  name="area_name"  placeholder="Enter Location Name" id="area_name" >
                                                
                                                <div class="error" ><?php echo form_error('Area Name'); ?></div>
                                               </div>
                                            </div>
                                           		<div class="form-group">                                        
                                                <label class="col-md-4 control-label">Mobile<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="number" required class="form-control uppercase"  name="mobile"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo set_value('phone');  ?>">
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            	<div class="form-group">                                        
                                                <label class="col-md-4 control-label">Email</label>
                                                <div class="col-md-8">
                                                	<input type="text"  class="form-control"  name="email"  placeholder="Enter  email" id="email" value="<?php echo set_value('email');  ?>">
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>				
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">User Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" required class="form-control" name="username"  placeholder="Enter Employee Name" id="username" value="<?php echo set_value('username');  ?>">
                                                    <div class="error" ><?php echo form_error('area_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Passowrd<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control"  name="password"  placeholder="Enter Employee Name" id="passowrd" required value="<?php echo set_value('passowrd');  ?>">
                                                    <div class="error" ><?php echo form_error('city_name'); ?></div>                                               
                                                </div>
                                            </div>
											
                                           
                                            											
                                           
                                           
                                            
                                            											
                                           
                                           
                                            
                                          
                                            
                                            
                                            
                                          	<div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                  
												<input class="btn btn-primary" value="Submit" type="submit" name="submit">
												<input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
                                              </div>
                                            </div> 
                                            
                                            
                                            
                                            
                                        </div>
                                      </div>
                                        
                                    </div>
                                    

                                </div>
                               
                           
                            </form>
                             </div>
                        </div>
                

                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
    
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>


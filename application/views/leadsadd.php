<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Account</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Add Leads</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Business/addleadsdata');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                          
										  
										  
                                            
                                            
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" required class="form-control uppercase"  name="name"  placeholder="Enter Company Name" id="customer_name" value="<?php echo set_value('customer_name');  ?>">
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Mobile No<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" required class="form-control uppercase"  name="mobile"  placeholder="Enter Company Name" id="customer_name" value="<?php echo set_value('customer_name');  ?>">
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Designation</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="desig"  placeholder="Enter Company Name" id="customer_name" value="<?php echo set_value('customer_name');  ?>">
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Leads Received From<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" required class="form-control uppercase" name="leads"  placeholder="Enter Area Name" id="customer_name" value="<?php echo set_value('area_name');  ?>">
                                                    <div class="error" ><?php echo form_error('area_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            											
                                           

                                         
                                            											
                                           <?php /*?><div class="form-group">
                                            <label class="col-md-4 control-label">Joining Date<sup  style="color:#f00"> * </sup>  </label>  
                                            <div class="col-md-8">
                                             <div class="input-group">
                                             <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="mask_date form-control uppercase datepicker"  placeholder="Enter Joining Date" name="joining_date" id="joining_date" value="<?php if(set_value('joining_date')!="") { echo set_value('joining_date'); }else { echo date("Y-m-d"); }  ?>"/>
                                              <div class="error" ><?php echo form_error('joining_date'); ?></div>
                                              </div>

                                            </div>
                                        </div><?php */?>


                                    </div> 
            
                                </div>
                                        
                                      </div>
                                    
                                    
                                    <div class="row">
                                        <div class="form-group pull-right">
                                        <div class="btn-group pull-right col-md-12"><input class="btn btn-primary" value="Submit" type="submit" name="submit"><input class="btn btn-warning" type="Reset">
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


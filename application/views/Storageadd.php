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
                                <h3>Add Storage</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Storage/addStorage');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                          
										  
										  
                                            
                                            
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Storage Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="Storage_name"  placeholder="Enter Storage Name" id="Storage_name" value="<?php echo set_value('Storage_name');  ?>">
                                                    <div class="error" ><?php echo form_error('Storage_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            	<div class="form-group">                                        
                                                <label class="col-md-4 control-label">Location<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                 <input type="text" class="form-control "  name="Location"  placeholder="Enter Location Name" required id="seller_name" value="<?php echo set_value('Location');  ?>">                                               
                                                </div>
                                            </div>										
                                           <?php /*?><div class="form-group">                                        
                                                <label class="col-md-4 control-label">Area Name</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control " name="area_name"  placeholder="Enter Area Name" id="Storage_name" value="<?php echo set_value('area_name');  ?>">
                                                    <div class="error" ><?php echo form_error('area_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">City Name</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="city_name"  placeholder="Enter City Name" id="Storage_name" value="<?php echo set_value('city_name');  ?>">
                                                    <div class="error" ><?php echo form_error('city_name'); ?></div>                                               
                                                </div>
                                            </div>

                                           <div class="form-group" style="display:none">                                        
                                                <label class="col-md-4 control-label">State</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="state_name"  placeholder="Enter State Name" id="Storage_name" value="- - - - - -">
                                                    <div class="error" ><?php echo form_error('state_name'); ?></div>                                               
                                                </div>
                                            </div><?php */?>
                                      </div>
                                      
									 <?php /*?> <div class="col-md-6"> 
                                                                                 											
                                           
                                           
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">ZipCode</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="pincode"  placeholder="Enter Pincode" id="Storage_name" value="<?php echo set_value('pincode');  ?>">
                                                    <div class="error" ><?php echo form_error('pincode'); ?></div>                                               
                                                </div>
                                            </div><?php */?>
                                           
                                            											
                                           <?php /*?><div class="form-group">
                                            <label class="col-md-4 control-label">Joining Date<sup  style="color:#f00"> * </sup>  </label>  
                                            <div class="col-md-8">
                                             <div class="input-group">
                                             <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="mask_date form-control  datepicker"  placeholder="Enter Joining Date" name="joining_date" id="joining_date" value="<?php if(set_value('joining_date')!="") { echo set_value('joining_date'); }else { echo date("Y-m-d"); }  ?>"/>
                                              <div class="error" ><?php echo form_error('joining_date'); ?></div>
                                              </div>

                                            </div>
                                        </div><?php */?>
                                           
                                            
                                            											
                                           <div class="form-group">                                        
                                                <!--<label class="col-md-4 control-label">Advance Amount<sup  style="color:#f00"> * </sup></label>-->
                                                <div class="col-md-8">
                                                	<input type="hidden" class="form-control "  name="advance"  placeholder="Enter Storage Name" id="Storage_name" value="0">
                                                    <div class="error" ><?php echo form_error('advance'); ?></div>                                               
                                                </div>
                                            </div>
                                           
                                            
                                          
                                            
                                            
                                            
                                          	<div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                            <input class="btn btn-primary" value="Submit" type="submit" name="submit"> <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
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


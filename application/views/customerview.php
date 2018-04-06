<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     
                <!-- PAGE TITLE -->
                
                <!-- END PAGE TITLE -->                
			<?php $customer = $customer[0]; ?>
                <!-- PAGE CONTENT WRAPPER -->
                
				<div class="page-content-wrap">
                    
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3>View Customer</h3>
                                    <!--<p>Some quick info about this user</p>--> <input class="btn btn-primary pull-right" value="Back" onClick="window.history.go(-1)" type="button">
                                </div>
                                <form class="form-horizontal" id="jvalidate" role="form" method="post">
                              <div class="panel-body">       
                                <div class="col-md-6">                                   
                                    <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Customer Code<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"   id="seller_name" value="<?php echo "CUS00".$customer->cid;  ?>" readonly>   
                                                </div>
                                            </div>
                                    
                                    <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Customer Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"   id="seller_name" value="<?php echo $customer->customer_name;  ?>" readonly>   
                                                </div>
                                            </div>
                                     <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Area Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"   id="seller_name" value="<?php echo $customer->area_name;  ?>" readonly>   
                                                </div>
                                            </div>
                                    <div class="form-group">                                        
                                                <label class="col-md-4 control-label">City Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"   id="seller_name" value="<?php echo $customer->city_name;  ?>" readonly>   
                                                </div>
                                            </div>
                                     <div class="form-group">                                        
                                                <label class="col-md-4 control-label">State Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"   id="seller_name" value="<?php echo $customer->state_name;  ?>" readonly>   
                                                </div>
                                            </div>
                                   </div>
									<div class="col-md-6">
                                     <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Country Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"   id="seller_name" value="<?php echo $customer->country_name;  ?>" readonly>   
                                                </div>
                                            </div>
                                    <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Pincode<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"  id="seller_name" value="<?php echo $customer->pincode;  ?>" readonly>   
                                                </div>
                                            </div>
                                     <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Mobile No<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"   id="seller_name" value="<?php echo $customer->mob_no1;  ?>" readonly> 
                                                    
                                                </div>
                                            </div>
                                    <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Email Id<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"  id="seller_name" value="<?php echo $customer->email_id;  ?>" readonly>   
                                                </div>
                                            </div>
                                    
                                    
                                   
                                   
                                     
									 
                                    </div>
                                    </form>
                                  </div>
                                </div>
                                
                            </div>
                            
                            
                        </div>
                        
                    </div>
                    

                </div>
                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->  
                

                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>



        
     


<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Seller</h2>
                                                        <input class="btn btn-primary pull-right" value="Back" onClick="window.history.go(-1)" type="button">

                </div>
                <!-- END PAGE TITLE -->                
			<?php $seller = $seller[0]; ?>
                <!-- PAGE CONTENT WRAPPER -->
                
				<div class="page-content-wrap">
                    
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> View Seller</h3>
                                    <!--<p>Some quick info about this user</p>-->
                                </div>
                                <div class="panel-body form-group-separated"> 
                                <div class="col-md-6">                                   
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Seller Code</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo 'SEL'.sprintf('%06d', $seller->cid);  ?></div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Seller Name </label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $seller->seller_name;  ?></div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Area Name</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $seller->area_name;  ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">City</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $seller->city_name;  ?></div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">State</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $seller->state_name;  ?></div>
                                    </div>
                                    </div>
									<div class="col-md-6"> 
                                     <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Country</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $seller->country_name;  ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Pin Code</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $seller->pincode;  ?></div>
                                    </div>
                                    <?php /*?><div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Joining Date</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><?php echo $seller->joining_date;  ?></div>
                                    </div><?php */?>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label"></label>
                                        <div class="col-md-8 col-xs-7 line-height-30"></div>
                                    </div>
                                     
									 
                                    </div>
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



        
     


<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Product Type</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Add Product Type</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Protype/addprodcuttype');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                          
										  
										  
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Type<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">                                            
                                                    <input type="text" class="form-control" style="color:#000;" name="customer_type" required placeholder="Enter Product Type" id="customer_type" value="">     
                                    			<div class="error" ><?php echo form_error('customer_code'); ?></div>                                       
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                          	<div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                           <input class="btn btn-primary" value="Submit" type="submit" name="submit">
                                                
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


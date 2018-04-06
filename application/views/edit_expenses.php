<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Expenses</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Edit Expenses</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Expenses_master/update_expenses');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                          
										  <?php  foreach($detail as $det)
                                          { }

                                            ?>
										  <input type="hidden" name="hiddn_id" value="<?php echo  $det['expenses_id'];?>">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Expenses Type<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">                                            
                                                    <input type="text" class="form-control uppercase" style="color:#000;" name="expenses_type" required placeholder="Enter Expenses Type" id="customer_type" value="<?php echo $det['expenses_type'];?>">     
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


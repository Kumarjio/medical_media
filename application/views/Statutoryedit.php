<?php $session_data = $this->session->all_userdata(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Statutory</h2>
                </div>
                <!-- END PAGE TITLE -->                
		<?php $customer = $customer[0]; ?>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Edit Statutory</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Statutory/updateStatutory/'.$customer->id);?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        

						
									<div class="col-md-6">
                                          
										  
										  <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Vat</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="vat"  placeholder="Enter vat" id="vat"  value="<?php echo $customer->vat;  ?>">   
                                                    <div class="error" ><?php echo form_error('vat'); ?></div>                                               
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Cst</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="cst"  placeholder="Enter cst" id="cst" value="<?php echo $customer->cst;  ?>"  >   
                                                    <div class="error" ><?php echo form_error('cst'); ?></div>                                               
                                                </div>
                                            </div>
                                        <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Serivce Tax</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="service_tax"  placeholder="Enter Serivce Tax" id="service_tax" value="<?php echo $customer->service_tax;  ?>">   
                                                    <div class="error" ><?php echo form_error('service_tax'); ?></div>                                               
                                                </div>
                                            </div>

                                           
                                  
                                           
                                            
                                          
                                            
                                            
                                            
                                          	<div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                            <input class="btn btn-primary" value="Submit" type="submit" name="submit">
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



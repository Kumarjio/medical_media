<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2> Add Unit</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                               
                            
                            <form class="form-horizontal" id="ncourse" role="form" action="<?php echo base_url('index.php/Employee/locationadd');?>"  method="post">
                            <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                    <div class="form-group" >
                                   <label class="col-md-4 control-label">Unit<sup  style="color:#f00"> * </sup></label>
                                       <div class="col-md-8"> 
                                  <input type="text" required  class="form-control align-left" style="color:#000;" name="location"  id="location"    >
                                        
                                            
                                         </div>
                                    </div>   
                                     <div class="form-group" >
                                  
                                       <div class="col-md-8"> 
                                  <input type="hidden"  value="0"  class="form-control align-left" style="color:#000;" name="rate"  id="rate"    >
                                        
                                            
                                         </div>
                                    </div>   
                                    
                                      
                          
                           
             
                                         <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button"> 
                                          <button type="submit" class="btn btn-success pull-right" value="Submit"  name="submit">Submit</button>  
                                            
                                           
                                            
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


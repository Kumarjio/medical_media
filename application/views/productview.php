<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     
                <!-- PAGE TITLE -->
               
                <!-- END PAGE TITLE -->                
			<?php $product = $product[0]; ?>
                <!-- PAGE CONTENT WRAPPER -->
                
				<div class="page-content-wrap">
                    
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default form-horizontal">
            <div class="panel-body">
                <h3></span> Product Details</h3>
                <!--<p>Some quick info about this user</p>-->
            </div>
             <form class="form-horizontal" id="jvalidate" role="form" method="post">
                              <div class="panel-body">   
                               <div class="col-md-6"> 
                                   <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Product Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"  placeholder="Enter Vandor Name" id="seller_name" value="<?php echo $product->i_name;  ?>" readonly>   
                                                </div>
                                            </div>
                                  
                            <?php /*?><div class="form-group">                                        
                                                <label class="col-md-4 control-label">Product Code<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"  placeholder="Enter Vandor Name" id="seller_name" value="<?php echo $product->i_code;  ?>" readonly>   
                                                </div>
                                            </div><?php */?>
                                             <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Product Type<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"  placeholder="Enter Vandor Name" id="seller_name" value="<?=($product->i_category==1)?'Laptop':'Mobile'; ?>" readonly>   
                                                </div>
                                            </div>
                                     <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Product Description<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"  placeholder="Enter Vandor Name" id="seller_name" value="<?php echo $product->descr;  ?>" readonly>   
                                                </div>
                                            </div>
                                            <?php /*?><div class="form-group">                                        
                                                <label class="col-md-4 control-label">IME/Serial No<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="seller_name"  placeholder="Enter Vandor Name" id="seller_name" value="<?php echo $product->ime_serial;  ?>" readonly>   
                                                </div>
                                            </div><?php */?>
    
  
    
   
</div>
            </div>
            </form>

        </div>
<input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">

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



        
     


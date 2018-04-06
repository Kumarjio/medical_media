<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                
                <!-- END PAGE TITLE -->                
		<?php $Storage = $Storage[0]; ?>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Edit EDIT</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Storage/updatehsn/'.$Storage->hsn_id);?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        


									<div class="col-md-6">
                                          
										  
										  
                                            
                                            
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">HSN Code<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="hsn_code"  placeholder="Enter Storage Name" id="hsn_code" value="<?php echo $Storage->hsn_code;  ?>">   
                                                    <div class="error" ><?php echo form_error('storage_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            			
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">tax</label>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control "  name="tax"  placeholder="Enter Storage Name" id="tax" value="<?php echo $Storage->tax;  ?>">
                                                 
                                                    <div class="error" ><?php echo form_error('country_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                            <input class="btn btn-primary" value="Submit" type="submit" name="submit"> <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
</div>
                                            </div>
                                      </div>
									  <div class="col-md-6">                                            											
                                           
                                           
                                            											
                                           <?php /*?><div class="form-group">                                        
                                                <label class="col-md-4 control-label">Zipcode<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="pincode"  placeholder="Enter Pincode" id="Storage_name" value="<?php echo $Storage->pincode;  ?>">   
                                                    <div class="error" ><?php echo form_error('pincode'); ?></div>                                               
                                                </div>
                                            </div>
                                           
                                            											
                                           <div class="form-group">
                                            <label class="col-md-4 control-label">Joining Date<sup  style="color:#f00"> * </sup>  </label>  
                                            <div class="col-md-8">
                                             <div class="input-group">
                                             <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="mask_date form-control  datepicker"  placeholder="Enter Joining Date" name="joining_date" id="joining_date" value="<?php echo $Storage->joining_date;  ?>">   
                                              <div class="error" ><?php echo form_error('joining_date'); ?></div>
                                              </div>

                                            </div>
                                        </div>
                                           
                                            
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Advance Amount<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="advance"  placeholder="Enter Storage Name" id="Storage_name" value="<?php echo $Storage->advance;  ?>">   
                                                    <div class="error" ><?php echo form_error('advance'); ?></div>                                               
                                                </div>
                                            </div><?php */?>
                                           
                                            
                                          
                                            
                                            
                                            
                                          	 
                                            
                                            
                                            
                                            
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

<script type="text/javascript">
    function custrDetails(id) {
		var res = id.substring(0,3)
		var Storage_code=$('#Storage_code').val();
		var res_c = Storage_code.substring(3)
		$("#Storage_code").val(res+res_c);
		
	}
</script>

       
 <script type="text/javascript">
          /*  var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: { 
						phone_no: {
                               required : true
                        },
						phone_no_one: {
                              required : true 
                        },
						email_id: {
                                required : true
                        },
						email_id_one: {
							required : true
                               
                        },
						fax: {
							required : true
                               
                        },
						to_add: {
							required : true,
							min: 0,
							max: 99.99
						}
                                                         
                       
                    }                                        
                });    */                                

        </script>

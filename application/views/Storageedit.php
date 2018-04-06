<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>   
		<?php $Storage = $Storage[0]; ?>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Edit Storage</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Storage/updateStorage/'.$Storage['cid']);?>" method="post">
                                <div class="panel-body">  
                                    <div class="row">
									<div class="col-md-6">							
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Storage Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="Storage_name"  placeholder="Enter Storage Name" id="Storage_name" value="<?php echo $Storage['storage_name'];  ?>">   
                                                    <div class="error" ><?php echo form_error('storage_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Location</label>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control "  name="Location"  placeholder="Enter Storage Name" id="Storage_name" value="<?php echo $Storage['Location'];  ?>">
                                                 
                                                    <div class="error" ><?php echo form_error('country_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                            <input class="btn btn-primary" value="Submit" type="submit" name="submit"> <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
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

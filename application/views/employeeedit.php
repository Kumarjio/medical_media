<?php $session_data = $this->session->all_userdata(); ?>
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
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Edit Employee</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Employee/updateCustomer/'.$customer->admin_id);?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        

						
									<div class="col-md-6">
                                          
										  
										  <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Employee Code</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="ecode"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo $customer->emp_code;  ?>">   
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            
                                            <div class="form-group" style="display:none;">
											  <label class="col-md-4 control-label">Employee ID</label>
                                                <div class="col-md-8">                                            
                                                    <input type="text" class="form-control uppercase" style="color:#000;" readonly name="customer_code" placeholder="Enter Employee Code" id="customer_code" value="<?php echo $customer->admin_id;  ?>">     
                                    		 </div>
                                            </div>
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Employee Name</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="ename"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo $customer->name;  ?>">   
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Employee Type<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<select class="selectpicker form-control "    name="emp_type" id="emp_type"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" >
                                   <option value="" disabled selected>Select</option> 
                    			<?php foreach($type as $row){ ?>	
                                    <option <?=($customer->user_type==$row['type_id'])?'selected':''?> value="<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?> </option>
                            <?php } ?>
                            </select>
                                                    <div class="error" ><?php echo form_error('name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Email Id</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="email_id"  placeholder="Enter Email Id" id="email_id" value="<?php echo $customer->email_id;  ?>">   
                                                    <div class="error" ><?php echo form_error('email_id'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">User Name</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="username"  placeholder="Enter Employee Name" id="username"  value="<?php echo $customer->username;  ?>">   
                                                    <div class="error" ><?php echo form_error('username'); ?></div>                                               
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Passowrd</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="password"  placeholder="Enter Employee Name" id="password" value="<?php echo $customer->password;  ?>"  >   
                                                    <div class="error" ><?php echo form_error('password'); ?></div>                                               
                                                </div>
                                            </div>
                                          
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Location</label>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control uppercase"  name="area_name"  placeholder="Enter Location Name" id="password" value="<?php echo $customer->area_name;  ?>"  >
                                                	 
                                                    <div class="error" ><?php echo form_error('area_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            
                                            											
                                          
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Mobile</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control uppercase"  name="mobile"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo $customer->phone;  ?>">   
                                                    <div class="error" ><?php echo form_error('phone'); ?></div>                                               
                                                </div>
                                            </div>

                                           
                                  
                                           
                                            
                                          
                                            
                                            
                                            
                                          	<div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                            <input class="btn btn-primary" value="Submit" type="submit" name="submit">
                                                <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
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
		var customer_code=$('#customer_code').val();
		var res_c = customer_code.substring(3)
		$("#customer_code").val(res+res_c);
		
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

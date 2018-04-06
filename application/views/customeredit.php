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
                                <h3>Edit Customer</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Customer/updateCustomer/'.$customer->cid);?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        


									<div class="col-md-6">
                                          
										  
										  
                                            <div class="form-group">
												<?php $query = $this->db->query("select cid from cb_customer")->num_rows(); ?>
                                                <label class="col-md-4 control-label">Customer Code</label>
                                                <div class="col-md-8">                                            
                                                    <input type="text" class="form-control " style="color:#000;" readonly name="customer_code" placeholder="Enter Customer Code" id="customer_code" value="<?php echo "CUS00".$customer->cid;  ?>">     
                                    			<div class="error" ><?php echo form_error('customer_code'); ?></div>                                       
                                                </div>
                                            </div>
                                            
                                            <?php /*?><div class="form-group">                                        
                                                <label class="col-md-4 control-label">Customer Type</label>
                                                <div class="col-md-8">
                                                 <?php /*?><input type="text" class="form-control "  name="cus_type"  id="cus_type" value="<?php echo $customer->customer_type;  ?>">  
                                               	<select  name="cus_type" id="cus_type" class="selectpicker form-control  bs-select-hidden"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                 <?php foreach($head as $val) { ?>
                                                    <option <?=($customer->customer_type == $val->id)?'selected':''?> value="<?=$val->id?>"><?=$val->type_name?></option>
                                                    <?php } ?>
                                                    
                                                </select>
          
                                                    <div class="error" ><?php echo form_error('cus_type'); ?></div>                                               
                                                </div>
                                            </div><?php */?>
                                            
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Customer Name</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="customer_name"  placeholder="Enter Customer Name"  id="customer_name" value="<?php echo $customer->customer_name;  ?>">   
                                                    <div class="error" ><?php echo form_error('customer_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Mobile No1</label>
                                                <div class="col-md-8">
                                                	<input type="number" class="form-control "  name="mobile1"  placeholder="Enter Mobile NO" id="customer_name" value="<?php echo $customer->mob_no1;  ?>">
                                                    <div class="error" ><?php echo form_error('mobile1'); ?></div>
                                               </div>
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Landline No</label>
                                                <div class="col-md-8">
                                               <input type="number" class="form-control "  name="land"  placeholder="Enter Landline NO" id="customer_name" value="<?php echo $customer->landline_no;  ?>">
                                               <div class="error" ><?php echo form_error('land'); ?></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Email</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="email"  placeholder="Enter Email" id="customer_name" value="<?php echo $customer->email_id;  ?>">
                                                    <div class="error" ><?php echo form_error('email'); ?></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Area Name</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control " name="area_name"  placeholder="Enter Area Name" id="customer_name" value="<?php echo $customer->area_name;  ?>">   
                                                    <div class="error" ><?php echo form_error('area_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            											
                                          
                                      </div>
									  <div class="col-md-6">
                                       
                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">City Name</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="city_name"  placeholder="Enter City Name" id="customer_name" value="<?php echo $customer->city_name;  ?>">   
                                                    <div class="error" ><?php echo form_error('city_name'); ?></div>                                               
                                                </div>
                                            </div>

                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">State</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="state_name"  placeholder="Enter State Name" id="customer_name" value="<?php echo $customer->state_name;  ?>">   
                                                    <div class="error" ><?php echo form_error('state_name'); ?></div>                                               
                                                </div>
                                            </div>                                            											
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Country</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="country_name"  placeholder="Enter Country Name" id="customer_name" value="<?php echo $customer->country_name;  ?>">   
                                                    <div class="error" ><?php echo form_error('country_name'); ?></div>                                               
                                                </div>
                                            </div>
                                           
                                           <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Pincode</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="pincode"  placeholder="Enter Pincode" id="customer_name" value="<?php echo $customer->pincode;  ?>">
                                                    <div class="error" ><?php echo form_error('pincode'); ?></div>                                               
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">NO.Of Credit Days</label>
                                                <div class="col-md-8">
                                                	<input type="text" class="form-control "  name="days"  placeholder="Enter NO.Of Credit Days" id="days" value="<?php echo $customer->credit_days;  ?>">
                                                    <div class="error" ><?php echo form_error('pincode'); ?></div>                                               
                                                </div>
                                            </div>
                                          
                                            
                                            
                                            
                                          	<div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                            <input class="btn btn-primary" value="Submit" type="submit" name="submit"><input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
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

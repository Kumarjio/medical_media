<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Add Request</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Add Request</h3>
                            
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Stocktransfer/insert_request');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                          
										  
										  
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Select Product <sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">                                            
                                                     <select name="req_pro_id" id="vname" class="selectpicker form-control uppercase vname"  required  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">    
                                               
                                               
                                             
                                               <option disabled selected value="">Select Product</option>
                                                <?php foreach ($list as $emps){?>
                                                
            <option   value="<?php echo $emps['tbl_product_id']; ?>"><?php echo $emps['i_name']; ?> </option>
              <?php } ?>
             
            </select>                                  
                                    			<div class="error" ><?php echo form_error('customer_code'); ?></div>                                       
                                                </div>
                                            </div>
                                            <div class="form-group podet" style="display:none">
                                            <label class="col-md-4 control-label">Product Details</label>
                                                <div class="col-md-6" id="po_qty">
                                                    <div class="error" ><?php echo form_error('details'); ?></div>
                                                    </div>
										</div>
                                            <div class="form-group">
                                                    <label class="col-md-4 control-label">Enter Qty</label>  
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control uppercase" style="color:#000;" placeholder="Enter Qty How Much You Want" name="req_qty" id="req_qty" value=""/>
                                                      <div class="error" ><?php echo form_error('a_code'); ?></div>	
        
                                                    </div>
                                                </div>
                                            
                                            <div class="form-group" style="display:none">
                                                    <label class="col-md-4 control-label">Qty</label>  
                                                    <div class="col-md-8">
                                                    <?php foreach ($list as $emps){?>
                                                        <input type="text" class="form-control uppercase" style="color:#000;" placeholder="Enter Qty How Much You Want" name="qty" id="qty" value="<?php echo $emps['qty']; ?>"/>
                                                        <?php } ?>
                                                      <div class="error" ><?php echo form_error('a_code'); ?></div>	
        
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <label class="col-md-4 control-label">Emp Id</label>  
                                                    <div class="col-md-8">
                                                    <?php foreach ($list as $emps){?>
                                                        <input type="text" class="form-control uppercase" style="color:#000;" placeholder="Enter Qty How Much You Want" name="emp_id" id="emp_id" value="<?php echo $emps['emp_id']; ?>"/>
                                                        <?php } ?>
                                                      <div class="error" ><?php echo form_error('a_code'); ?></div>	
        
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <label class="col-md-4 control-label">location</label>  
                                                    <div class="col-md-8">
                                                    <?php foreach ($list as $emps){?>
                                                        <input type="text" class="form-control uppercase" style="color:#000;"  name="location" id="location" value="<?php echo $emps['location']; ?>"/>
                                                        <?php } ?>
                                                      <div class="error" ><?php echo form_error('a_code'); ?></div>	
        
                                                    </div>
                                                </div>
                                          	<div class="form-group pull-right">                                        
                                                <div class="btn-group pull-right col-md-12">                                           <input class="btn btn-primary" id="submit" value="Submit" type="submit" name="submit">
                                                
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
<script type="text/javascript">
$(document).on('change','#vname',function()
{
		 var cus = $(this).val();
		 //alert(cus);return false;
	      if(cus!='')
	     {
			 $('.podet').show();
			$.ajax(
			{
				url:'<?php echo base_url('index.php/Stocktransfer/get_pro_det');?>',
				type:'POST',
				data:{cus:cus},
				success: function(result)
				{
					$('#po_qty').html(result);
				}
			});
		
	     }
});
$('#submit').on("click", function()
	 {
		var poqty = $('#qty').val();
		//alert(qty);
		var reqqty = $('#req_qty').val();
		
		//alert(qty1);exit;
		 //return false;
		 if(reqqty!='')
		 {
			 if(parseFloat(reqqty) > parseFloat(poqty) ) 
			 {
				 alert("Selected Employee dosen't have this much Qty");
				 return false;	
			 }
		 }
		 else
		 {
			 alert('Please Enter Qty')
			 return false;
		 }
	 });
</script>

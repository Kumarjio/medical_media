<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
 <?php
if(isset($inps['pname']) && !empty($inps))
{
     $pname = $inps['pname'];
}
else
{
	$pname = '';
	
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Stocks Transfer Request List</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">  
                                <?php /*?> <a href="<?php echo base_url('index.php/Stocktransfer/addrequest'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Request</button></a><?php */?>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                     <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Requested Location</th>
                                                    <th>Product Name-Description</th>
                                                    <th>Product Type</th>
                                                    <th>Req Qty</th>
                                                    <th>Status</th>
                                                    <th>Approved Qty</th>
                                                    <th>Action</th>
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php  if(is_array($list) && count($list) ) {
                                        $cnt=1;
                                            foreach($list as $post){ 
											 
											 ?>
											<tr>
                                            <td><?php echo $cnt; $cnt++; ?></td>
												<td><?php echo $post['req_emp_location']?></td>
												<td><?php echo $post['i_name']?> - <?php echo$post['descr']?></td>
                                                <td><?php if($post['id'] == $post['i_category']){
                                                         echo $post['type_name'];
                                                     }?></td>
												
                                                <td><?php echo $post['req_qty']?></td>
                                                
                                               <td><?php if($post['st1'] == 0){
												   echo "Pending";}
												   else if($post['st1'] == 1){echo "Approved";}else if($post['st1'] == 2){echo "Declined";}?></td>
                                                   <td>  <?php if($post['approved_qty'] != ''){
													echo $post['approved_qty'];
													}
													else {
														echo '-------';
													}
													?></td>
                                                <td><button type="button" data-toggle="modal" id="action" value='<?=$post['id']?>' data-target="#getmodal_<?php echo $post['id']?>" class="btn btn-info btn-rounded btn-condensed btn-sm view_data" name="action"  data-placement="bottom" title="Action" data-original-title="Action"><i class="fa fa-eye"></i> </button>  </td>
                                                
                                              
											</tr>
											<?php }} ?>
										</tbody>
                                        </table>
                                     </div>
                                     <?php 
											 $i= 0;
											 if(is_array($list) && count($list) ) {
												  foreach ($list as $loop){
													  $i++;
													 
													  ?>
                                       <div id="getmodal_<?php echo $loop['id']?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog" style="width:600px">
                                        
                                            <!-- Modal content-->
                                            <form id="getdet" role="form" action="<?php echo base_url('index.php/Stocktransfer/update');?>" method="post">
                                            <div class="modal-content">
                                            
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Assigned To</h4>
                                              </div>
                                              
                                              <div class="modal-body" id="pop_data<?php echo $loop['id']?>">
                                               <div class="form-group" >                                        
                                                <label class="col-md-4 control-label">Status<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-7">
                                                	  <select  class="selectpicker form-control uppercase"  name="status"  id="status">
                                                                        <option value="" disabled selected>Select Status</option>
                                                                        
                                                                         <option value="1">Approved</option>
                                                                         <option value="2">Declined</option>
                                                                         </select>
                                                        
                                                    <div class="error" ><?php echo form_error('country_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group reason" style="display:none">                                        
                                                <label class="col-md-4 control-label">Reason</label>
                                                <div class="col-md-7">
                                                	<input type="text" class="form-control uppercase"  name="reason"  placeholder="Enter reason" id="reason" >
                                                </div>
                                            </div>
                                            <div class="form-group date" style="display:none">
                                            <label class="col-md-4 control-label">Delivery Date</label>  
                                            <div class="col-md-7">
                                                <input type="text" class="form-control uppercase datepickerr" style="color:#000;" placeholder="Select Date" name="date" id="date" value=""/>
                                              <div class="error" ><?php echo form_error('date'); ?></div>	

                                            </div>
                                        </div>
                                        <div class="form-group proid" style="display:none">                                        
                                                <label class="col-md-4 control-label">Prodcut Id</label>
                                                <div class="col-md-7">
                                                	<input type="text" class="form-control"  name="proid"  value="<?php echo $post['i_id']?>" id="proid" >
                                                </div>
                                            </div>
                                            <div class="form-group location" style="display:none">                                        
                                                <label class="col-md-4 control-label">Req Emp Location</label>
                                                <div class="col-md-7">
                                                	<input type="text" class="form-control"  name="location"  value="<?php echo $post['req_emp_location']?>" id="location" >
                                                </div>
                                            </div>
                                        <div class="form-group proname" style="display:none">                                        
                                                <label class="col-md-4 control-label">Prodcut Name</label>
                                                <div class="col-md-7">
                                                	<input type="text" class="form-control"  name="proname"  value="<?php echo $post['i_name']?>" id="proname" >
                                                    <div class="error" ><?php echo form_error('proname'); ?></div>	

                                                </div>
                                            </div>
                                            
                                            <div class="form-group req_qty" style="display:none">                                        
                                                <label class="col-md-4 control-label">Request Qty</label>
                                                <div class="col-md-7">
                                                	<input type="text" class="form-control"  name="req_qty" value="<?php echo $post['req_qty']?>"   id="req_qty" >
                                                    <div class="error" ><?php echo form_error('req_qty'); ?></div>	

                                                </div>
                                            </div>
                                            <div class="form-group original_req_qty" style="display:none">                                        
                                                <label class="col-md-4 control-label">Ori Request Qty</label>
                                                <div class="col-md-7">
                                                	<input type="text" class="form-control"  name="original_req_qty" value="<?php echo $post['req_qty']?>"   id="original_req_qty" >
                                                    <div class="error" ><?php echo form_error('req_qty'); ?></div>	

                                                </div>
                                            </div>
                                        <div class="form-group delvia" style="display:none">                                        
                                                <label class="col-md-4 control-label">Delivery Via</label>
                                                <div class="col-md-7">
                                                	<input type="text" class="form-control"  name="delvia"  placeholder="Enter Delivery Via" id="delvia" >
                                                    <div class="error" ><?php echo form_error('delvia'); ?></div>	

                                                </div>
                                            </div>
                                              </div>
                                     
                                      
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success submit" id="submit_<?=$i?>">Update</button>
                                             <button type="button" class="btn btn-primary" data-dismiss="modal" >Cancel</button>
                                              </div>
                                              </div>
                                              </form>
                                             </div>
                                           </div>
                                    <?php } }?>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                        </div>
                    </div>
                    <!-- END RESPONSIVE TABLES -->
                    
                <!-- END PAGE CONTENT WRAPPER -->                                    
                </div>         
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        </div>
        <!-- END PAGE CONTAINER -->    

    
        <!-- Main bar -->
       


	    <!-- Matter -->

	    
    
    <!-- Footer ends -->    
     <?php $this->load->view('include_js'); ?>

<script>


 $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  $(document).on('change','#status',function()
{
	var this_val = $(this).val();
	if(this_val==1)
	{
		$('.date').show();
		$('.proname').show();
		$('.req_qty').show();
		$('.delvia').show();
		$('.reason').hide();
		
	}
	else 	
	{
		$('.date').hide();
		$('.proname').hide();
		$('.req_qty').hide();
		$('.delvia').hide();
		$('.reason').show();
	}
	
});
  
  $('.submit').on("click", function()
	 {
		var poqty = $('#original_req_qty').val();
		//alert(qty);
		var reqqty = $('#req_qty').val();
		
		//alert(qty1);exit;
		 //return false;
		 if(reqqty!='')
		 {
			 if(parseFloat(reqqty) > parseFloat(poqty) ) 
			 {
				 alert("You Have Entered More Qty As What They Want!");
				 return false;	
			 }
		 }
		 else
		 {
			 alert('Please Enter Qty')
			 return false;
		 }
	 });
	<!------------------------Status Activate End----------------------------!>

	
</script>
</body>
</html>
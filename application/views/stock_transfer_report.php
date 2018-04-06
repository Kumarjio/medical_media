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
if(isset($inps) && !empty($inps))
{
     $product_cde = $inps['product_cde'];
	 $product_cde1 = $inps['sellers'];
}
else
{
	$product_cde = '';
	$product_cde1 = '';
	
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
                                
                                           
                                <form action="" method="post" enctype="multipart/form-data" >
                                <div class="col-md-12">
                                <?php /*?><div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Storage</label>
                                    <div class="col-md-8">                                            
                                       <select class="selectpicker uppercase bs-select-hidden form-control" id="storage" name="storage" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    
                                      <option value="" selected> ALL </option>
                                      
									<?php
                                    foreach($storage as $sval)
                                    { ?>
                                     <option <?=($storages==$sval->Location)?'selected':''?> value="<?=$sval->Location?>"> <?=$sval->storage_name?></option>
                                       
                                        <?php } ?>
                                     </select>                                       
                                    </div>
                                </div>
                                </div><?php */?>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Product Name</label>
                                    <div class="col-md-8"> 
                                     <?php $prd_cd = $this->db->select('*')->get('tbl_product')->result_array(); ?>                                           
                                       <select class="selectpicker uppercase bs-select-hidden form-control" id="product_cde" name="product_cde" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    
                                      <option value="" selected> ALL </option>
                                      
									<?php
                                    foreach($prd_cd as $sval)
                                    { ?>
                                     <option <?=($product_cde==$sval['i_id'])?'selected':''?> value="<?=$sval['i_name']?>"> <?=$sval['i_name']?></option>
                                       
                                        <?php } ?>
                                     </select>                                       
                                    </div>
                                </div>
                                </div>
                                <?php /*?><div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Storage</label>
                                    <div class="col-md-7">    
                                     <?php $storages = $this->db->select('*')->get('master_location')->result(); ?>                                        
                                       <select class="selectpicker uppercase bs-select-hidden form-control" name="sellers" id="sellers" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                         <option value="" selected>Select ALL </option>
                                         <?php ?>
                                         <?php foreach($storages as $row){ ?>
                                         <option <?=($product_cde1==$row->id)?'selected':''?> value="<?php echo $row->id; ?>"><?php echo $row->location_name; ?></option>
                                         <?php } ?>
                                         <?php ?>
                                       </select>                 
                                    </div>
                                </div>
                                </div><?php */?>
                                
                                <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div>
                                   
                                     <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <?php /*?><div class="col-md-12">
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">From Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="from_dt" value="<?=$frmdt?>" id="from_dt">                
                                    </div>
                                </div>
                                </div>
                                
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">To Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="to_dt" id="to_dt" value="<?=$todt?>">
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div>
                                   
                                     <?php if($session_data['user_type']=='5'){?>
                                        <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div>
                                    <?php }?>
                                </div>
                                </div>
                                </div><?php */?>
                                    </form>
                                      
                                                                 
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                     <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Requested Location</th>
                                                    <th>Product Name</th>
                                                    <th>Product Type</th>
                                                    <th>Serial/Ime</th>
                                                    <th>Req Qty</th>
                                                    <th>Req Date</th>
                                                    <th>Material Request From</th>
                                                    <th>Approved Qty</th>
                                                     <th>Approved Date</th>
                                                   
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
												<td><?php echo $post['i_name']?></td>
                                                <td><?php if($post['id'] == $post['i_category']){
                                                         echo $post['type_name'];
                                                     }?></td>
                                                     <td><?php echo $post['serial_ime']?></td>
												
                                                <td><?php echo $post['req_qty']?></td>
                                                 <td><?php echo $post['cd']?></td>
                                                <td><?php echo $post['req_product_location']?></td>
                                                <td><?php echo $post['approved_qty']?></td>
                                                <td><?php echo $post['delivery_date']?></td>
                                               <?php /*?><td><?php if($post['st1'] == 0){
												   echo "Pending";}
												   else if($post['st1'] == 1){echo "Approved";}else if($post['st1'] == 2){echo "Declined";}?></td>
                                                   <td>  <?php if($post['approved_qty'] != ''){
													echo $post['approved_qty'];
													}
													else {
														echo '-------';
													}
													?></td><?php */?>
                                                
                                                
                                              
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
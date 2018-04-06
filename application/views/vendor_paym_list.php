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
	//$customer = $inps['customer'];
	$storages = $inps['storage'];
	$product_cde = $inps['product_cde'];
	$sellers = $inps['seller'];
	$frmdt = $inps['from_dt'];
	$todt = $inps['to_dt'];
}
else
{
	//$customer = '';
	$storages = '';
	$product_cde = '';
	$sellers = '';
	$frmdt = '';
	$todt = '';
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Vendor Payment List</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
											<tr>
												<th width="20">S No</th>
												<th width="53">Invoice No</th>
												<th width="76">Vendor Name</th>
												<th width="279">Product Name</th>
												<th width="34">Payment Method</th>
                                                <th width="77">Paid Amt</th>
                                                <th width="77">Reference No</th>
                                                <th width="25">Cheque No</th>
                                                
												<th width="77">Bank Name</th>
                                                <th width="54">Transaction id</th>
                                                <th width="34">Transaction date</th>
                                                <th width="34">Date</th>
											</tr>
										</thead>
                                            <tbody>
                                        	<?php
                                        $sno=1;
										$s_no = '';
										 $s_no[] = '';
										  if(is_array($stock) && count($stock) ) {
										foreach($stock as $loop){
												 if(!in_array($loop['po_inv_id'],$s_no))
												{
													$s_no[] = $loop['po_inv_id'];
													$probes = '';
													foreach($stock as $vals)
													{
														if($vals['po_inv_id'] == $loop['po_inv_id'])
														{
															$probes .=$vals['i_name'].' ,';
															
														}
													}
												?>
												<tr>
													<td><?php echo $sno++; ?></td>
													<td><?php echo $loop['inv_no']; ?></td>
													<td><?=$loop['seller_name'] ?></td>
                                                    <td><?php echo $probes;?></td>
													<td><?php if($loop['payment_method'] == 2){
														echo 'Cheque / DD';
													}
													else if ($loop['payment_method'] == 1){
														echo 'Cash';
													}
													else if ($loop['payment_method'] == 3){
														echo 'Online Transfer';
													}
													else if ($loop['payment_method'] == 4){
														echo 'Credit Card / Debit Card';
													}
                                                    else if ($loop['payment_method'] == 0){
														echo '------';
													}?></td>
											     	
													
													<td><?php echo $loop['amt']; ?></td>
													<td><?php if($loop['reference_no']!= ''){
														echo $loop['reference_no'];
													}
													else {
														echo '---------';
													} ?></td>
                                                    <td><?php if($loop['cheque_no']!= ''){
														echo $loop['cheque_no'];
													}
													else {
														echo '---------';
													} ?></td>
                                                    <td><?php if($loop['bank_name']!= ''){
														echo $loop['bank_name'];
													}
													else {
														echo '---------';
													} ?></td>
                                                    <td><?php if($loop['trans_id']!= ''){
														echo $loop['trans_id'];
													}
													else {
														echo '---------';
													} ?></td>
                                                    
                                                    <td><?php if($loop['payment_date']!= ''){
														echo date('d-m-Y', strtotime($loop['payment_date']));
													}
													else {
														echo '---------';
													} ?></td>
                                                     <td><?php echo date('d-m-Y', strtotime($loop['cds']))?></td>
												 
												
												
										      </tr>
											<?php }} }?>
										</tbody>
                                        </table>
                                    </div>
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
        <!-- END PAGE CONTAINER -->    

    
        <!-- Main bar -->
       


	    <!-- Matter -->

	    
    
    <!-- Footer ends -->    
     <?php $this->load->view('include_js'); ?>
     
<script type="text/javascript">
	function fndelete(id) {
		var deletopt=confirm('Are you sure, do you want to delete this record?');
	  	if(deletopt)  {
			window.location =  '<?php echo base_url('index.php/Stock/deletestock/')?>/'+id;
		    return true;
	  	}  else  {
		  	return false;
	  	}
	}
</script>
<script>
function chStatus(id,st){
		if(st == 1) {
		var chst = 0; //change status value
		}
		else {
		var chst = 1;	
		}
	//alert(chst);	
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/Stock/statuschange",
			dataType: 'json',
			data: {id: id, st: chst},
			success: function(res) {
			if(res == 0) {
				$("#statusspande"+id).hide();	
				$("#statusspan"+id).show();	
				
			}
			if(res == 1) {
				$("#statusspande"+id).hide();	
				$("#statusspan"+id).show();	
				
			}
			
				//console.log(res);
				
			}
		});
}
$('.update_amt').on('click',function()
{
	var id = $(this).attr('id');
	
	id = id.split('_');
	id = id[2];
	//alert(id)
	var amount = $('#sel_price_'+id).val();
	$.ajax(
	{
		url:'<?php echo base_url(); ?>index.php/Stock/update_amt',
		type:'POST',
		data:{amount:amount,id:id},
		success: function(result)
		{
			alert('Sale amount updated successfully...!')
		}
	}
	);
});

function calc(id)
{
	var pur_amt = $('#pur_price_'+id).val();
	var sel_amt = $('#sel_price_'+id).val();
	var total = parseFloat(sel_amt)-parseFloat(pur_amt);
	if(total>0)
	{
		var data = '<font size="+1" color="#009933">'+total+'</fonnt>';
	}
	else
	{
		var data = '<font size="+1" color="#FF0000">'+total+'</fonnt>';
	}
	$('#pnl_profit_'+id).html(data);
}
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            //document.getElementById("sign_mobile_err").style.display = ret ? "none" : "inline";
            return ret;
        }


	<!------------------------Status Activate End----------------------------!>

	
</script>
<?php
$sno=1;
$po_id = '';
$po_id[] = '';
if(is_array($stock) && count($stock) ) 
{
	foreach($stock as $loop)
	{
	/*
	switch ($loop->supplier_code){
	case 1: $name1 = 'Supplier1'; break;
	case 2: $name1 = 'Supplier2'; break;
	case 3: $name1 = 'Supplier3'; break;
	case 4: $name1 = 'Supplier4'; break;
	default:
	$name1 = 'Supplier7';
	break;
	} */
		
//$po_id[] = $loop['po_id'];
												?>
<div class="modal fade" id="assign_<?=$loop['pi_id']?>" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Update Storage Infromation</h4>
                                </div>
                                <div class="modal-body" id="response_off_cls_<?=$loop['pi_id']?>">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Action Type<sup  style="color:#f00"> * </sup>  </label>  
                                    <div class="col-md-8">
                                        <select class="selectpicker form-control uppercase" name="type_action" id="type_action<?=$loop['pi_id']?>" data-live-search="true" data-live-search-placeholder="Search">
                                        <option <?=($loop['foc_outward']=="1")?'selected':''?> value="1">Damaged</option>
                                        <option <?=($loop['foc_outward']=="2")?'selected':''?> value="2">FOC Outward For Customer</option>
                                        <option <?=($loop['foc_outward']=="3")?'selected':''?> value="3">FOC Outward For Employee</option>
                                        </select> 
                                      <div class="error" ><?php echo form_error('slocation'); ?></div>
                                    </div>
                                </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-4 control-label">Qty<sup  style="color:#f00"> * </sup></label>
                                        <div class="col-md-8">
                                        <input type="text" name="qty_no" id="qty_no<?=$loop['pi_id']?>" value="<?=$loop['foc_dam_qty']?>" required class="form-control" >
                                            <div class="error" ><?php echo form_error('pi_id'); ?></div>                                               
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-4 control-label">Remarks<sup  style="color:#f00"> * </sup></label>
                                        <div class="col-md-8">
                                        <input type="text" name="cus_name" id="cus_name<?=$loop['pi_id']?>" value="<?=$loop['foc_out_name']?>" required class="form-control" >
                                            <div class="error" ><?php echo form_error('pi_id'); ?></div>                                               
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                	<button type="button" class="btn btn-success update_storage" id='assign_<?=$loop['pi_id']?>' >Update</button>
                                	<button type="button" class="btn btn-default" data-dismiss="modal" id='offer_closemodal_btn_<?=$loop['pi_id']?>'>Close</button>
                                </div>
                        	</div>
                        </div>
                    </div>
<?php
		}
	}?>
<script type="text/javascript">
$('.update_storage').on('click',function()
{
	var id = $(this).attr('id');
	id = id.split('_');
	id = id[1];
	var qty_no = $('#qty_no'+id).val();
	//alert(waarehosue)
	var cus_name = $('#cus_name'+id).val();
	var type_action = $('#type_action'+id).val();
	if(qty_no != '' && cus_name != '' && type_action != '')
	{
		$(this).attr('disabled',true);
		$.ajax(
		{
			url:"<?php echo base_url('index.php/Stock/update_foc_info');?>",
			type:'POST',
			data:{qty_no:qty_no,cus_name:cus_name,type_action:type_action,id:id},
			success: function(result)
			{
				$('#offer_closemodal_btn_'+id).click();
				window.location.reload();
			}
		});
	}
});
</script>
<script>
  $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  </script>
</body>
</html>
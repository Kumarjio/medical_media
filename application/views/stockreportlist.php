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
	//$storages = $inps['storage'];
	$product_cde = $inps['product_cde'];
	$sellers = $inps['seller'];
	$frmdt = $inps['from_dt'];
	$todt = $inps['to_dt'];
}
else
{
	//$customer = '';
	//$storages = '';
	$product_cde = '';
	$sellers = '';
	$frmdt = '';
	$todt = '';
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Purchase Report</h2>
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
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Vendor</label>
                                    <div class="col-md-7">                                            
                                       <select class="selectpicker uppercase bs-select-hidden form-control" name="seller" id="seller" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                         <option value="" selected>Select ALL </option>
                                         <?php ?>
                                         <?php foreach($seller as $row){ ?>
                                         <option <?=($sellers==$row->cid)?'selected':''?> value="<?php echo $row->seller_name; ?>"><?php echo $row->seller_name; ?></option>
                                         <?php } ?>
                                         <?php ?>
                                       </select>                 
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="col-md-12">
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
                                </div>
                                    </form>
                                      
                                    <ul class="panel-controls">
                                    <!--<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>-->
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
											<tr>
												<th width="20">S.NO</th>
                                                <th width="53">Id</th>
												<th width="53">Invoice No</th>
												<th width="76">Vendor </th>
                                                <th width="52">Storage</th>
												<th width="279">Product Name - Description</th>
												<th width="34">Pur Price</th>
                                                <th width="77">Tax Amt</th>
												<!--<th width="77">Sale Price</th>
                                                <th width="54">Account</th>
                                                <th width="34">Currency</th>
												<th width="37">Profit</th>-->
												<?php /*?><th width="33">Pur Date</th><?php */?>
												<th width="25">Qty</th>
												<th width="25">Total</th>
                                                <th width="52">Bill Date</th>
												<!--<th width="59">Damage / FOC Out</th>-->
											</tr>
										</thead>
                                            <tbody>
                                        	<?php
                                        $i=1;
										$s_no = '';
										 $s_no[] = '';
										  $qty = 0;
										 $qty2 = 0;
										if(is_array($stock) && count($stock) ) {
											foreach($stock as $loop){
												if(!in_array($loop['pur_req_id'],$s_no))
												{
													$s_no[] = $loop['pur_req_id'];
													$probes = '';
													foreach($stock as $vals)
													{
														if($vals['pur_req_id'] == $loop['pur_req_id'])
														{
															$probes .=$vals['i_name'].' ,';
															//$purrate =$vals['pur_rate'];
															//$qty =$vals['qty'];
															//$purrate2 +=$purrate;
															//$qty2 +=$qty;
															//$total +=$vals['total'];
															
														}
													}
												?>
												<tr>
													<td><?=$i?><?php $i++; ?></td>
                                                    <td><?php echo 'PUR00'.$loop['po_id']; ?></td>
													<td><?php echo $loop['vinvno']; ?></td>
													<td><?=$loop['vname'] ?></td>
													<td><?=$loop['storage_name']?></td>
                                                    <td><?=$probes?></td>
											<?php /*?><td><strong><?php echo $loop['i_name']; ?> - <?=$loop['descr']?></td><?php */?>
													
													<td><?php echo $loop['pro_total']; ?></td>
                                                    <td><?php echo $loop['tax_amount']; ?></td>
                                                    <td><?=$loop['qty']?></td>
												  
												<td><?=$loop['gtotal']?></td>
                                                <td><?=date('d-m-Y', strtotime($loop['date']));?></td>
													<!--<td><input type="hidden" name="pur_price" value="<?=$loop['p_rate']?>" id="pur_price_<?=$loop['pi_id']?>" class="form-control" style="width:50px" /><input type="text" name="pur_price" value="<?=$loop['s_price']?>" id="sel_price_<?=$loop['pi_id']?>" class="form-control" style="width:60px" onKeyPress="return IsNumeric(event)" onKeyUp="return calc(<?=$loop['pi_id']?>);" /></td>
                                                    <td><?php if($loop['currency']==0){echo 'Euro';}else if($loop['currency']==1){ echo 'GBB'; }else if($loop['currency']==2){ echo 'SGD'; }else if($loop['currency']==3){ echo 'USD'; } ?></td>
													<td id="pnl_profit_<?=$loop['pi_id']?>"><font size="+1" <?php if($loop['s_price']-$loop['p_rate']<0){echo 'color="#FF0000"';}else{ echo 'color="#009933"';}?> ><?=$loop['s_price']-$loop['p_rate']?></font></td>-->
													<?php /*?><td><?=date('d-m-Y',strtotime($loop['pdate']))?></td><?php */?>
													
												
										      </tr>
											<?php }}} ?>
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
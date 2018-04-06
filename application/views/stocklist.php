<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Manage Purchase</h2>
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
                               
                                                   <a href="<?php echo base_url('index.php/Purchase'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Purchase Entry</button></a>
                                                    
                                           
                                                          
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
											<tr>
												<th >S No</th>
												<th>GRN No</th>
												<th>GRN Date</th>
												<th >Inv. No </th>
												<th >Inv. date </th>
												<!--<th >Batch No</th> -->
											    <th >Vendor Name </th>
											   <!-- <th >Manufacture Name </th>-->
                                                <th >Storage Name</th>
                                              <!--   <th>Product Name</th>-->
                                               <!-- <th>unit</th>-->
                                                <!--  <th >Qty</th>-->
												<th >Total</th>
												<th >View</th>
												<th >Cancel</th>
											</tr>
										</thead>
                                            <tbody>
                                        	<?php
                                        $sno=1;
										$s_no = '';
										$s_no[] = '';
										$qty=0;
										$p_rate = 0;
										$qty1=0;
										if(is_array($stock) && count($stock) ) {
											foreach($stock as $loop){
												if(!in_array($loop['po_inv_id'],$s_no))
												{
													$s_no[] = $loop['po_inv_id'];
													$probes = '';
													$qty ='';
													$pro ='';
													$unit='';
													$batch='';
													$po_no='';
													foreach($stock as $vals)
													{
														if($vals['po_inv_id'] == $loop['po_inv_id'])
														{
															//$probes .=$vals['i_name'].' ,';
															$p_rate .=$vals['p_rate'].' ,';
															$pro .=$vals['i_name']. ',';
															$unit .=$vals['location_name']. ',';
															$qty .=$vals['qty'].' ,';
															$batch .=$vals['batch_no']. ',';
															$batch .=$vals['batch_no']. ',';
															
														}
													}
												?>
												<tr>
													<td><?php echo $sno++; ?></td>
													<td><?php echo $loop['po_id']; ?></td>
													<td><?php echo $loop['created_date']; ?></td>
													<td><?php echo $loop['vinvno']; ?></td>
													<td><?php echo $loop['podate']; ?></td>
													<td><?php echo $loop['vendor_name']; ?></td>
												    <td><?php echo $loop['storage']; ?></td>
												    <td><?php echo $loop['gtotal']; ?></td> 
												  <td><a href="<?php echo base_url('index.php/Stock/editstock/'.$loop['po_id']);?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><span class="fa fa-eye"></span></button></a></td>
												  <td><?php if($loop['status_inv_cancel'] == 0){ ?><button onclick="cancel_grn(<?php echo $loop['po_id']?>)" class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="cancel"><span class="fa fa-ban"></span></button><?php } ?></td>
												
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
	function cancel_grn(id){
		var deletopt=confirm('Are you sure, do you want to Cancel this GRN?');
	  	if(deletopt)  {
			$.ajax({
				url:"<?php echo base_url() ?>index.php/Stock/cancel_grn/"+id,
				type:"POST",
				dataType:"JSON",
				success:function(res){
					location.reload();
				}
			});
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
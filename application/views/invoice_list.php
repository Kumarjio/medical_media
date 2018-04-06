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
                    <h2> Manage Invoice</h2>
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
                                                    <th>S.No</th>
                                                    <th>Invoice Id</th>
                                                    <th>Customer Id</th>
                                                    <th>Customer Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Product Name</th>
                                                    <th>Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Due Amount</th>
                                                    <th>Date</th>
                                                   <?php /*?> <?php if($session_data['user_type']=='1'){?>
                                                    <th width="72">Action</th>
                                                    <?php }?>
                                                     <?php if($session_data['user_type']=='5'){?>
                                                    <th width="72">Action</th>
                                                    <?php }?>
                                                    <?php if($session_data['user_type']=='2'){?><?php */?>
                                                    <th width="72">Action</th>
                                                    <?php /*?><?php }?><?php */?>
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php
											  if(is_array($list) && count($list) ) {
												 // echo '<pre>';print_r($list); exit;
                                        $i=1;
										$s_no = '';
											$s_no[] = '';
										 foreach($list as $loop){
													if(!in_array($loop['s_no'],$s_no))
												{
													$s_no[] = $loop['s_no'];
													$probes = '';
													foreach($list as $vals)
													{
														if($vals['s_no'] == $loop['s_no'])
														{
															$probes .=$vals['i_name'].' ,';
														}
													}
                                                    ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?='INV00'.$loop['s_no']?></td>
												  <td><?='CUS000'.$loop['cid']?></td>
                                               <td><?=$loop['customer_name']?></td>
                                                <td><?=$loop['mob_no1']?></td>
                                                 <td><?=$probes?></td>
                                                <td><?=$loop['total_amount']?></td>
                                                 <td><?=$loop['paid_amt']?></td>
                                                 <td><font color="#FF0000"><?php echo $loop['total_amount']-$loop['paid_amt'];?></font></td>
                                               <td><?=date('d-m-Y', strtotime($loop['inv_date']))?></td>
												 <?php /*?><?php if($session_data['user_type']=='1'){?>
												<td><span><a class="btn" target='_blank' href="<?php echo base_url('index.php/Sales/print_data?id='.urlencode($loop['s_no'])); ?>" ><button type="submit" class="btn btn-success btn-xs"  data-original-title="invoice">Print </button></a>
                                               <?php if($loop['paid_amt'] < $loop['total_amount']){?>
                                                 <a class="btn" href="<?php echo base_url('index.php/Sales/makepayment?id='.urlencode($loop['s_no'])); ?>" ><button type="button" class="btn btn-success btn-xs" data-original-title="Payment">Make A Payment </button></a></span></td>
                                                 <?php }}?>
                                                  <?php if($session_data['user_type']=='5'){?><?php */?>
                                                 <td><?php /*?><span><a class="btn" href="<?php echo base_url('index.php/Sales/print_data?id='.urlencode($loop['s_no'])); ?>" ><button type="submit" class="btn btn-success btn-xs"  data-original-title="invoice">Print </button></a><?php */?> 
                                                  <?php if($loop['paid_amt'] < $loop['total_amount']){?>
                                                  <a class="btn" href="<?php echo base_url('index.php/Sales/makepayment?id='.urlencode($loop['s_no'])); ?>" ><button type="button" class="btn btn-success btn-xs" data-original-title="Payment">Get Payment </button></a></td>
                                                 
                                                 <?php  }}?>
                                                
                                               <?php /*?> <?php if($session_data['user_type']=='2'){?>
                                                 <td><span><a class="btn" target='_blank' href="<?php echo base_url('index.php/Sales/print_data?id='.urlencode($loop['s_no'])); ?>" ><button type="submit" class="btn btn-success btn-xs"  data-original-title="invoice">Print </button></a> 
                                                 <?php if($loop['paid_amt'] < $loop['total_amount']){?> 
                                                 <a class="btn" href="<?php echo base_url('index.php/Sales/makepayment?id='.urlencode($loop['s_no'])); ?>" ><button type="button" class="btn btn-success btn-xs" data-original-title="Payment">Make A Payment </button></a></span></td>
                                                 
                                                 <?php }}?><?php */?>
												<!--<td><span>
                                                 <a class="btn" target='_blank' href="<?php echo base_url('index.php/Sales/invoice_print?id='.urlencode($loop['s_no'])); ?>"><button type="submit" class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="invoice"><i class="fa fa-print"></i> Print </button></a>
                                                    
                                                     <a href="<?php echo base_url('index.php/Sales/makepayment?id='.urlencode($loop['s_no'])); ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-list"></i> Make Payment </button></a>
                                               </span> </td>-->
											</tr>
											<?php }}?>
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
			window.location =  '<?php echo base_url('index.php/Customer/deleteCustomer/')?>/'+id;
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
			url: "<?php echo base_url(); ?>" + "index.php/Customer/statuschange",
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


	<!------------------------Status Activate End----------------------------!>

	
</script>
</body>
</html>
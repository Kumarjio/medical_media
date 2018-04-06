<?php 
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
                    <h2>Manage Paymentlist</h2>
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
                                                   <th>Invoice ID</th>
                                                   <th>Customer Name</th>
                                                    <th>Mobile No</th>
                                                    <?php /*?><th>Product Name</th><?php */?>
                                                    <th>Product Total Amount</th>
                                                    <th>Paid Amount</th>
                                                    <?php /*?>'<th>Due Amount</th><?php */?>
                                                    <th>Payment Mode</th>
                                                    <th>Payment Method</th>
                                                    <th>Reference NO</th>
                                                    <th>Transaction Id</th>
                                                     <th>Bank Name</th>
                                                    <th>Cheque NO</th>
                                                    <th>Transfer Date</th>
                                                    <th>Paid Date</th>
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
													/*if(!in_array($loop['tbl_sales_id'],$s_no))
												{
													$s_no[] = $loop['tbl_sales_id'];
													$probes = '';
													foreach($list as $vals)
													{
														if($vals['tbl_sales_id'] == $loop['tbl_sales_id'])
														{
															$probes .=$vals['i_name'].' ,';
															
															
														}
													}
												}*/
                                                    ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?='INV00'.$loop['tbl_invoice_id']?></td>
                                               <?php /*?> <td><?='CUS000'.$loop['cid']?></td><?php */?>
												<td><?=$loop['customer_name']?></td>
                                                <td><?=$loop['mob_no1']?></td>
                                                <?php /*?><td><?php echo $probes;?></td><?php */?>
                                                <td><?=$loop['product_amount']?></td>
                                                <td><?=$loop['paym_amount']?></td>
                                                <?php /*?><td><?=$loop['product_amount']-$loop['paym_amount']?></td><?php */?>
                                                <td><?=$loop['description']?></td>
												 <td><?php if($loop['payment_method'] == 1){
                                                         echo "Cash";
                                                     }
                                                     else if($loop['payment_method'] == 2){
                                                         echo "Cheque / DD";
                                                     }
													 else if($loop['payment_method'] == 3){
                                                         echo "Online Transfer";
                                                     }
													 else if($loop['payment_method'] == 4){
                                                         echo "Credit Card / Debit Card";
                                                     }
													 else if($loop['payment_method'] == 5){
                                                         echo "Finance";
                                                     }
                                                         ?></td> 
                                                    <td><?php if($loop['reference_no'] != ''){
                                                         echo $loop['reference_no'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td>
                                                     <td><?php if($loop['trans_id'] != ''){
                                                         echo $loop['trans_id'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td>
                                                     <td><?php if($loop['bank_name'] != ''){
                                                         echo $loop['bank_name'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td>
                                                     <td><?php if($loop['cheque_no'] != ''){
                                                         echo $loop['cheque_no'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td>
                                                     <td><?php if($loop['get_amt_date'] != ''){
                                                         echo date('d-m-Y', strtotime($loop['get_amt_date']));
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td>
                                                    <td><?=date('d-m-Y', strtotime($loop['payment_date']))?></td>
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
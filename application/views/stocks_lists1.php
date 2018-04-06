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
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Requested Stocks List</h2>
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
                                 <a href="<?php echo base_url('index.php/Stocktransfer/addrequest'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Request</button></a>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                     <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Material Request From</th>
                                                    <th>Product Name-Description</th>
                                                    <th>Product Type</th>
                                                    <th>Req Qty</th>
                                                    <th>Status</th>
                                                    <th>Delivery Date</th>
                                                    <th>Delivery Via</th>
                                                    <th>Reason</th>
                                                    <th>Approved Qty</th>
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php  if(is_array($list) && count($list) ) {
                                        $cnt=1;
                                            foreach($list as $post){ 
											 
											 ?>
											<tr>
                                            <td><?php echo $cnt?></td>
												<td><?php echo $post['req_product_location']?></td>
												<td><?php echo $post['i_name']?> - <?php echo$post['descr']?></td>
												<td><?php if($post['id'] == $post['i_category']){
                                                         echo $post['type_name'];
                                                     }?></td>
                                                <td><?php echo $post['req_qty']?></td>
                                             
                                                        <td><?php if($post['st1'] == '0'){
													echo 'Pending';
													}
													else if($post['st1'] == '1'){
														echo 'Approved';
													}
													else{
														echo 'Declined';
														}
														?></td>
                                                 
                                                    <td>  <?php if($post['delivery_date'] != ''){
													echo $post['delivery_date'];
													}
													else {
														echo '-------';
													}
													?></td>
                                                     <td>  <?php if($post['delivery_via'] != ''){
													echo $post['delivery_via'];
													}
													else {
														echo '-------';
													}
													?></td>
                                                    <td>  <?php if($post['reason'] != ''){
													echo $post['reason'];
													}
													else {
														echo '-------';
													}
													?></td>
                                                    <td>  <?php if($post['approved_qty'] != ''){
													echo $post['approved_qty'];
													}
													else {
														echo '-------';
													}
													?></td>
                                              
											</tr>
											<?php $cnt++; }} ?>
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
			window.location =  '<?php echo base_url('index.php/Employee/deleteCustomer/')?>/'+id;
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
			url: "<?php echo base_url(); ?>" + "index.php/Employee/statuschange",
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
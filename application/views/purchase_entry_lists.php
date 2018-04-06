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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Purchase Request List</h2>
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
                                    <a href="<?php echo base_url('index.php/Pos_orders/addentry'); ?>">
                                    <button class="btn btn-primary"><span class="fa fa-plus"></span>Add Purchase Request</button></a>
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
                                                    <th>S.No</th>
                                                    <th>PO No</th>
                                                    <th>Vendor Name</th>
                                                    <th>Product Type</th>
                                                    <th>Product Name</th>
                                                   <?php /*?> <th>Purchase Rate</th>
                                                    <th>Qty</th><?php */?>
                                                    <th>Total Amt</th>
                                                    <th>Purchase Request Date</th>
                                                    <th width="72">Action</th>
                                                </tr>
											</thead>
                                            <tbody>
                                         <?php 
										 $i = 1;
										 $s_no = '';
										 $s_no[] = '';
										 $purrate = 0;
										 $purrate2 = 0;
										 $qty = 0;
										 $qty2 = 0;
										// $total = '';
										 foreach ($items as $post)
										 {
											 if(!in_array($post['pur_req_id'],$s_no))
												{
													$s_no[] = $post['pur_req_id'];
													$probes = '';
													foreach($items as $vals)
													{
														if($vals['pur_req_id'] == $post['pur_req_id'])
														{
															$probes .=$vals['i_name'].' ,';
															$purrate =$vals['pur_rate'];
															$qty =$vals['qty'];
															$purrate2 +=$purrate;
															$qty2 +=$qty;
															//$total +=$vals['total'];
															
														}
													}
												
	?>
											<tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo 'PO000'.$post['pur_req_id']?></td>
												<td><?php echo $post['seller_name']?></td>
                                                <td><?php if($post['id'] == $post['i_category']){
                                                         echo $post['type_name'];
                                                     }?></td>
												<?php /*?><td><?php if($post['pro_type'] == 1){
													echo 'Laptop';}
													else if($post['pro_type'] == 2){
													echo 'Mobile';}
													else if($post['pro_type'] == 3){
													echo 'TABLETS';}
													else if($post['pro_type'] == 4){
													echo 'SOFTWARE';}
													else {
														echo 'ACCESSORIES';
													}?></td><?php */?>
												<td><?=$probes?></td>
                                                 <?php /*?><td><?php 
												 if($purrate2 != 0){
													 echo $purrate2;
													  }
												 else
												 {
													 echo  $post['pur_rate'];
													  }?></td>
                                                       <td><?php 
												 if($qty2 != 0){
													 echo $qty2;
													  }
												 else
												 {
													 echo  $post['qty'];
													  }?></td><?php */?>
                                                     <td><?php echo $post['total_amt']?></td> 
                                                <?php /*?><td><?php echo $post['qty']?></td>
                                                <?php */?>
                                                <td><?php echo date('d-m-Y', strtotime($post['pur_date']))?></td>
                                                
												<td><span><a class="btn" href="<?php echo base_url('index.php/Pos_orders/print_data?id='.urlencode($post['pur_req_id'])); ?>" ><button type="submit" class="btn btn-success btn-xs"  data-original-title="invoice">Print </button></a> </td>
                                              </tr>
											<?php }} ?>
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

</body>
</html>
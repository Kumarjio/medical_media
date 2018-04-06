<?php 
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
                                         <option <?=($sellers==$row->cid)?'selected':''?> value="<?php echo $row->cid; ?>"><?php echo $row->seller_name; ?></option>
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
                                   
                                     
                                        <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div>
                                   
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
                                                    <th>S.No</th>
                                                    <th>PO No</th>
                                                    <th>Vendor Name</th>
                                                    <th>Product Type</th>
                                                    <th>Product Name</th>
                                                    <?php /*?><th>Req Qty</th><?php */?>
                                                   <th>Total Amt</th>
                                                    <th>Purchase Request Date</th>
                                                    <th width="53">Invoice No</th>
                                                    <th width="34">Pur Price</th>
                                                <th width="77">Pur Date</th>
                                                <th width="25">Qty</th>
                                                   <th width="34">Payment Method</th>
                                                <th width="77">Paid Amt</th>
                                                <th width="77">Reference No</th>
                                                <th width="25">Cheque No</th>
                                                
												<th width="77">Bank Name</th>
                                                <th width="54">Transaction id</th>
                                                <th width="34">Paid date</th>
                                                </tr>
											</thead>
                                            <tbody>
                                         <?php 
										 $i = 1;
										 $s_no = '';
										 $s_no[] = '';
										 $purrate = 0;
										 $purrate2 = 0;
										 $qty = '';
										 $qty2 = '';
										// $total = '';
										 foreach ($items as $loop)
										 {
											 if(!in_array($loop['pur_req_id'],$s_no))
												{
													$s_no[] = $loop['pur_req_id'];
													$probes = '';
													foreach($items as $vals)
													{
														if($vals['pur_req_id'] == $loop['pur_req_id'])
														{
															$probes .=$vals['i_name'].' ,';
															$qty =$vals['qtyss'];
															$qty2 +=$qty;
															
														}
													}
												
	?>
											<tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo 'PO000'.$loop['pur_req_id']?></td>
												<td><?php echo $loop['seller_name']?></td>
                                                <td><?php if($loop['id'] == $loop['i_category']){
                                                         echo $loop['type_name'];
                                                     }?></td>
												
												<td><?=$probes?></td>
                                             <?php /*?>   <td><?php echo $loop['qtys']?></td> <?php */?>
                                                 <td><?php echo $loop['total_amt']?></td> 
                                               
                                                <td><?php echo date('d-m-Y', strtotime($loop['pur_date']))?></td>
                                                <td><?php echo $loop['vinvno']; ?></td>
												<td><?php echo $loop['gtotal']; ?></td>
													<td><?php echo $loop['date']; ?></td>
                                                    <td><?php echo $loop['qtys']?></td>
                                                    <td><?php if($loop['payment_method'] == 2){
														echo 'Cheque / DD';
													}
													else if ($loop['payment_method'] == 1){
														echo 'Cash';
													}
													else if ($loop['payment_method'] == 3){
														echo 'Online Transfer';
													}
													else {
														echo 'Credit Card / Debit Card';
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
                                                    
                                                    
                                                     <td><?php echo $loop['created_date']?></td>
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
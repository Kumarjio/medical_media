<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); 
  $session_data = $this->session->all_userdata();	
  ?>
<?php
if(isset($inps['cid']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
	// $product = $inps['product'];
	// $po_num = $inps['po_num'];
	// $land = $inps['land'];
	 $cid = $inps['cid'];
	 $frmdt = $inps['from_dt'];
	 $todt = $inps['to_dt'];
}
else
{
	//$product = '';
	//$po_num = '';
	$cid = '';
	$frmdt = '';
	$todt = '';
	/*$mobile2 = '';
	$mobile3 = '';*/
	//$land = '';
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Purchase Order  Report</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/sales_payment" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Vendor Name</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_customer')->result_array(); ?>
                            	
                                                        <select id="cid" name="cid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['customer_id'])?'selected':''?> value="<?=$det['customer_id']?>"><?=$det['customer_name']?> </option>
                                                        <?php } ?>	
														    </select>
                                                  
                                    </div>
                                </div>
                                </div>
                         <!--        <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">PO No</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('tbl_po_2.po_1_ref')->from('tbl_po_inv_item')->join('tbl_po_2','tbl_po_2.po_2_id=tbl_po_inv_item.order_po_item_ref_id','left')->distinct('tbl_po_2.po_1_ref')->get()->result_array(); ?>
                                
                                                        <select id="po_num" name="po_num" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($po_num==$det['po_1_ref'])?'selected':''?> value="<?=$det['po_1_ref']?>"><?=$det['po_1_ref']?> </option>
                                                        <?php } ?>  
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div> -->
                              <!--  <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Product</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->from('tbl_product')->get()->result_array(); ?>
                                
                                                        <select id="product" name="product" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($product==$det['i_id'])?'selected':''?> value="<?=$det['i_id']?>"><?=$det['i_name']?> </option>
                                                        <?php } ?>  
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div>
                               
                            </div> -->
                            <div class="col-md-12">
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">From Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="from_dt"  id="from_dt" value="<?=$frmdt?>">                
                                    </div>
                                </div>
                                </div>
                                
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">To Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="to_dt" id="to_dt" value="<?=$todt?>" >
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div>
                                   
                                      <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div>
                                  
                                    <!--<div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div><div class="col-md-4"><a href="<?=$this->config->item('base_url')?>index.php/Reports/sold_list?cid=<?=$cid==$det['cid']?>&area_name=<?=$area_name?>&mobile=<?=$mobile?>&from_dt=<?=$frmdt?>&to_dt=<?=$todt?>"><button type="button" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button></a>
                                    </div>-->
                                </div>
                                </div>
                                </div>
                                    </form>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable" width="auto">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">Customer Name</th>
                                                    <th width="5px">Invoice No</th>
                                                    <th width="5px">Invoice Date</th>
                                                 
                                                    <th width="5px">Total Value</th>
                                                    <th width="5px">Credit Period</th>
                                                    <th width="5px">Due date</th>
                                                    <th width="5px">Status</th>
                                                    <th>Payment Details</th>
                                                  
                                               </tr>
											</thead>
                                            <tbody>
                                        	 <?php
											  if(is_array($stock) && count($stock) ) {
												 // echo '<pre>';print_r($list); exit;
                                        $i=1;
										$s_no = '';
											$s_no[] = '';
                                            foreach($stock as $loop){
                         $from = date_create($loop['created_date']);
                          $to = date_create(date('y-m-d'));
                          $interval = date_diff($from, $to);
                                            // echo "<pre>";print_r($loop); ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?=$loop['customer_name']?></td>
                                                <td><?=$loop['sales_invoice_ref']?></td>
                                                <td><?=$loop['refer_po_date']?></td>
                                                <td><?=$loop['total_amount']?></td>
                             <td><?=$loop['c_period']?></td>
    
    <td <?php if($loop['c_period'] < $interval->format('%a')){?> <?php } ?>><?php $date1 = strtotime("+".$loop['c_period']." days", strtotime($loop['created_date'])); echo date('d-m-Y',$date1); ?></td>
                      

                      <td><?php if($loop['pending_amt']>0) {echo 'Not Paid' ;} else {echo 'Paid';}?></td>
                                                <td><?=$loop['pay_type']?></td>
                                               
											</tr>
											<?php } }?>
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
	
  $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  
  </script>
</body>
</html>
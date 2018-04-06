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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/PoReport" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Vendor Name</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_vendor')->result_array(); ?>
                            	
                                                        <select id="cid" name="cid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['vendor_id'])?'selected':''?> value="<?=$det['vendor_id']?>"><?=$det['vendor_name']?> </option>
                                                        <?php } ?>	
														    </select>
                                                  
                                    </div>
                                </div>
                            </div>
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
                                  
                                   
                                </div>
                                </div>
                                </div>
                   
                            <div class="col-md-12">
                                
                                </div>
                                    </form>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable" >
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">PO No </th>
                                                    <th width="5px">PO Date</th>
                                                    <th width="5px">Vendor Name</th>
                                                      <th width="5px">Description</th>
                                                    <th width="5px">HSN Code
                                                    </th>
                                                    <th width="5px">Manufacture Name</th>
                                                   <!--  <th width="5px">Expiry Date</th>
                                                    <th width="5px">Batch No
                                                    </th> -->
                                                    <th width="5px">MRP</th>
                                                    <th width="5px">PO Qty</th>
                                                    <th width="5px">PO Free Qty</th>
                                                    <th width="5px">Unit</th>
                                                    <th width="5px">Unit Rate </th>
                                                    <th width="5px">Value</th>
                                                    <th width="5px">Discount  %</th>
                                                    <th width="5px">Discount Value</th>
                                                    <th width="5px">SGST %</th>
                                                    <th width="5px">SGST Value</th>
                                                    <th width="5px">CGST %</th>
                                                    <th width="5px">CGST Value</th>
                                                    <th width="5px">IGST %</th>
                                                    <th width="5px">IGST Value</th>
                                                    <th width="5px">Total Value </th>
                                                    <th width="5px">Received Qty</th>
                                                    <th width="5px">Received Free Qty</th>
                                                    <th width="5px">Pending Qty</th>
                                                    <th width="5px">Pending Free Qty</th>
                                           
                                               </tr>
											</thead>
                                            <tbody>
                                        	 <?php
											  if(is_array($stock) && count($stock) ) {
												 // echo '<pre>';print_r($list); exit;
                                        $i=1;
										$s_no = '';
											$s_no[] = '';
                                            foreach($stock as $loop){ //echo "<pre>";print_r($loop);
$tax=$loop['po_sgst']+$loop['po_cgst']+$loop['po_igst'];
$mrp=$loop['po_rate']+$tax;
$dis_cal=$loop['po_rate']/100*$loop['po_discount'];

                                             ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?=$loop['po_2_id']?></td>
                                                <td><?=$loop['po_date']?></td>
                                                <td><?=$loop['vendor_name']?></td>
                                                 <td><?=$loop['i_name']?></td>
                                                <td><?=$loop['hsn_code']?></td>
                                               
                                                
                                                <td><?=$loop['manu_name']?></td>
                                               <!--  <td></td>
                                                <td></td> -->
                                                <td><?php echo $mrp;?></td>
                                                <td><?=$loop['po_qty']?></td>
                                                <td><?=$loop['po_free_qty']?></td>
                                                <td><?=$loop['location_name']?></td>
                                                <td><?=$loop['po_rate']?></td>
                                                <td><?=$loop['po_rate']*$loop['po_qty'];?></td>
                                                <td><?=$loop['po_discount']?></td>
                                                <td><?php echo $dis_cal;?></td>
                                                <td><?=$loop['po_sgst']?></td>
                                                <td><?=$loop['po_sgstamt']?></td>
                                                <td><?=$loop['po_cgst']?></td>
                                                  <td><?=$loop['po_cgstamt']?></td>
                                                <td><?=$loop['po_igst']?></td>
                                                
                                              
                                                <td><?=$loop['po_igstamt']?></td>
                                                
                                                <td><?=$loop['po_gtotal']?></td>
                                                <?php $pending_qty=$loop['need_qty']-$loop['rec_qty']?>

                                                <td><?=$loop['rec_qty']?></td>
                                                <td></td>
                                                <td><?php echo $pending_qty;?></td>
                                                <td><?//=$loop['v_period']?></td>
                                                


 
                                               
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
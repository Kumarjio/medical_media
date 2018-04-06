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
     $cus_code = $inps['cus_code'];
	 $area_name = $inps['area_name'];
	 $mobile = $inps['mobile'];
	 /*$mobile2 = $inps['mobile2'];
	 $mobile3 = $inps['mobile3'];*/
 $land = $inps['land'];
	 $cid = $inps['cid'];
	 $frmdt = $inps['from_dt'];
	 $todt = $inps['to_dt'];
}
else
{
	$area_name = '';
	$mobile = '';
	$cid = '';
	$frmdt = '';
	$todt = '';
	/*$mobile2 = '';
	$mobile3 = '';*/
	$land = '';
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2> Customer Sales Return Payment</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Sales/sales_return_payment_list" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Bill No</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('sales_return_invoice_ref')->distinct('sales_return_invoice_ref')->get('tbl_debit_return')->result_array(); ?>
                            	
                                                        <select id="bill_no" name="bill_no" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option  value="<?=$det['sales_return_invoice_ref']?>"><?=$det['sales_return_invoice_ref']?> </option>
                                                        <?php } ?>	
														    </select>
                                                  
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Name</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_customer')->result_array(); ?>
                                
                                                        <select id="cus_name" name="cus_name" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option  value="<?=$det['customer_id']?>"><?=$det['customer_name']?> </option>
                                                        <?php } ?>  
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Amount Paid Type</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_customer')->result_array(); ?>
                                
                                                        <select id="paid" name="paid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                         <option value='cash'>Cash</option>
                                                         <option value='card'>Card</option>
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">From Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="from_dt"  id="from_dt" value="">                
                                    </div>
                                </div>
                                </div>
                                
                               <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">To Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="to_dt" id="to_dt" value="" >
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4 ">
                                <div class="form-group">
                                <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div>
                                   
                                     <!--  <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div> -->
                                </div>
                                </div>
                                </div>
                                
                                    </form>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" width="auto">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">Bill No</th>
                                                    <th width="5px">Customer Name</th>
                                                    <th width="5px">Invoice Amount</th>
                                                    <th width="5px">Paid Amount</th>
                                                    <th width="5px">Pending Amount</th>
                                                    <th width="5px">Payment Type</th>
                                                    <th width="65px">Collected Amount</th>
                                                    <th width="65px">Balance Amount</th>
                                                    <th width="65px">Credited Date</th>
                                               </tr>
											</thead>
                                            <tbody>
                                        	 <?php
											  if(is_array($list) && count($list) ) {
												 // echo '<pre>';print_r($list); exit;
                                        $i=1;
										$s_no = '';
											$s_no[] = '';
                                            foreach($list as $loop){  ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?=$loop['sales_return_invoice_ref']?></td>
                                                <td><?=$loop['sales_return_cus_name_ref']?></td>
                                                <td><?=$loop['sales_return_invoice_amt_ref']?></td>
                                                <td><?=$loop['sales_return_paid_pay_ref']?></td>
                                                <td><?=$loop['sales_return_pending_pay_ref']?></td>
                                                <td><?=$loop['sales_return_pay_type']?></td>
                                                <td><?=$loop['sales_return_curr_paid']?></td>
                                                <td><?=$loop['sales_return_curr_pending']?></td>
                                                <td><?=$loop['sales_return_pay_date']?></td>
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
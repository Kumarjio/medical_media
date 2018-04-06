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
                    <h2> Customer  Report</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/sold_list" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Id</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                            	
                                                        <select id="cid" name="cid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['cid'])?'selected':''?> value="<?=$det['cid']?>"><?=$det['customer_name']?> </option>
                                                        <?php } ?>	
														    </select>
                                                  
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Area</label>
                                    <div class="col-md-8">   
                                   <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                            	
                                                        <input type="text" class="form-control" name="area_name" id="cus_code" value="<?=$area_name?>" >
														
														    
                                                  
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Mobile</label>
                                    <div class="col-md-8">   
                                   <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="mobile"  id="mobile"  value="<?=$mobile?>">        
													    
                                                   
                                    </div>
                                </div>
                                </div>
                               <?php /*?> <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Mobile 2</label>
                                    <div class="col-md-8">                                            
                                       <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="mobile2"  id="mobile"  value="<?=$mobile2?>">       
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Mobile 3</label>
                                    <div class="col-md-8">                                            
                                        <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="mobile3"  id="mobile"  value="<?=$mobile3?>">            
                                    </div>
                                </div>
                                </div><?php */?>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Landline NO</label>
                                    <div class="col-md-8">                                            
                                       <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="land"  id="land"  value="<?=$land?>">   
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
                                        <table class="table" width="auto">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">Invoice No</th>
                                                    <th width="5px">Customer Det</th>
                                                    <th width="5px">Product Name</th>
                                                    <th width="5px">Qty</th>
                                                     <th width="5px">Total Amt</th>
                                                     <?php /*?><th width="5px">Paid Amount</th>
                                                    <th width="5px">Due Amount</th>
                                                   <th width="5px">Payment Method</th>
                                                    <th width="5px">Reference NO</th>
                                                    <th width="5px">Transaction Id</th>
                                                     <th width="5px">Bank Name</th>
                                                    <th width="5px">Cheque NO</th>
                                                    <th width="5px">Finance Name</th>
                                                    <th width="5px">Total Month</th>
                                                    <th width="5px">Emi Amt</th><?php */?>
                                                    <th width="65px">Date</th>
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
												if(!in_array($loop['tbl_sales_id'],$s_no))
												{
													$s_no[] = $loop['tbl_sales_id'];
													$probes = '';
													$qty='';
													foreach($list as $vals)
													{
														if($vals['tbl_sales_id'] == $loop['tbl_sales_id'])
														{
															$probes .=$vals['i_name'].' ,';
															$qty .=$vals['quantity'].' ,';
														}
													}
                                                    ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                 <td><?='INV00'.$loop['bill_no']?></td>
                                                <td><?=$loop['customer_name']?>-<?=$loop['mob_no1']?></td>
                                                <td><?=$probes?></td>
                                                <td><?=$qty?></td>
                                                  <td><?=$loop['total_amount']?></td>
                                                <?php /*?><td><?=$loop['paym_amount']?></td>
                                                <td><?=$loop['product_amount']-$loop['paym_amount']?></td>
												
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
                                                     <td><?php if($loop['finance_name'] != ''){
                                                         echo $loop['finance_name'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td>
                                                     <td><?php if($loop['tot_month'] != ''){
                                                         echo $loop['tot_month'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td>
                                                     <td><?php if($loop['emi'] != ''){
                                                         echo $loop['emi'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td><?php */?>
                                                    <td> <?=date('d-m-Y', strtotime($loop['cds']))?></td>
                                                     <?php /*?><td><?php if($loop['created_date'] != ''){
                                                         echo $loop['created_date'];
                                                     }
                                                     else {
                                                         echo "----------";
                                                     }?></td><?php */?>
												
												<?php /*?><td>
                                                   <!-- <a href="<?php echo base_url('index.php/products/add_new?id='.urlencode($loop['tid'])); ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                                    <a href="<?php echo base_url('index.php/Sales/gen_inv?id='.$loop['tid']); ?>"><button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Generate Invoice"><i class="fa fa-print"></i>  Generate Invoice </button></a>-->
                                                </td><?php */?>
											</tr>
											<?php }} }?>
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
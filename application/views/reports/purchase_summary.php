<?php $session_data = $this->session->all_userdata();
error_reporting(0);
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
                    <h2>Purchase Summary  Report</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/purchase_sum_report" method="post" enctype="multipart/form-data" >
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
                           
                                    </form>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">Vendor Name</th>
                                                    <th width="5px">Invoice No</th>
                                                    <th width="5px">Invoice Date</th>
                                                    <th width="5px">HSN Code</th>
                                                    <th width="5px">SGST % </th>
                                                    <th width="5px">CGST %</th>
                                                    <th width="5px">IGST %</th>
                                                    <th width="5px">Sum of SGST Value</th>
                                                  <th>Sum of CGST Value</th>
                                                  <th>Sum of IGST Value</th>
                                                  <th>Sum of Value</th>
                                                  <th>Sum of Total Value </th>
                                                  <th>GST No</th>
                                                  <th>Drug Lisence No 1</th>
                                                  <th>Drug Lisence No 2</th>
                                                  <th>Doctor Registration No </th>
                                                  <th>Reg Id</th>
                                                  

                                               </tr>
											</thead>
                                            <tbody>
                                        	 <?php
											  if(is_array($stock) && count($stock) ) {
												//  echo '<pre>';print_r($stock); exit;
                      $i=1;
										  $s_no[] = '';
                     

                                    foreach($stock as  $loop){ 
                                        if(!empty($loop))
                                                {
                                    //echo "<pre>";print_r($stock);exit;     
                                     $sgst_amt = '';
                                     $cgst_amt = '';
                                     $igst_amt = '';
                                     $total = '';
                                     $sum='';


                                    foreach($loop as $vals)
                                              {
                                                
                                  
                                 
                                  $sgst_amt +=$vals['sgst_amt'];
                                  $cgst_amt +=$vals['cgst_amt'];
                                  $igst_amt +=$vals['igst_amt'];
                                  $total +=$vals['total'];
                                  $sum +=$vals['p_amount'];
 //print_r($sum); 



                                //  print_r($sgst_amt);
        
                                                   }
                                                  // exit;
                                             ?>
											<tr>
											                         	<td><?=$i?><?php $i++; ?></td>
                                                <td><?=$vals['vendor_name']?></td>
                                                <td><?=$vals['vinvno']?></td>
                                                <td><?=date('d-m-Y',strtotime($vals['pdate']))?></td>
                                                <td><?=$vals['hsn_code'];?></td>
                                                <td><?=$vals['sgst']?></td>

 
                                                <td><?=$vals['cgst']?></td>
                                                <td><?=$vals['igst']?></td>
                                                <td><?=$sgst_amt?></td>
                                                <td><?=$cgst_amt?></td>
                                                <td><?=$igst_amt?></td>
                                                <td><?=$sum?></td>
                                                <td><?=$total;?></td>
                                                <td><?=$vals['gst_no']?></td>
                                                <td><?=$vals['drug_lisence1']?></td>
                                                 <td><?=$vals['drug_lisence2']?></td>
                                                <td><?=$vals['dr_reg_no']?></td>
                                                <td><?=$vals['reg_id']?></td>
                                               

                                               
											</tr>
											<?php  }}}?>
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
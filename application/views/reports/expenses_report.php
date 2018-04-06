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
     $exp = $inps['exp'];
     $user = $inps['user'];
}
else
{
	//$product = '';
	//$po_num = '';
	$cid = '';
	$frmdt = '';
	$todt = '';
    $exp = '';
     $user = '';
	/*$mobile2 = '';
	$mobile3 = '';*/
	//$land = '';
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Expenses Report</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/expenses_report" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Voucher No</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_expenses')->result_array(); ?>
                            	
                                                        <select id="cid" name="cid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['exp_id'])?'selected':''?> value="<?=$det['exp_id']?>"><?=$det['voucher_no']?> </option>
                                                        <?php } ?>	
														    </select>
                                                  
                                    </div>
                                </div>
                                </div>
                                 <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Expenses Type</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('expenses_master')->result_array(); ?>
                                
                                                        <select id="exp" name="exp" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($exp==$det['expenses_id'])?'selected':''?> value="<?=$det['expenses_id']?>"><?=$det['expenses_type']?> </option>
                                                        <?php } ?>  
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div>
                                
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Employee Name</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('cp_admin_login')->result_array(); ?>
                                
                                                        <select id="user" name="user" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($user==$det['admin_id'])?'selected':''?> value="<?=$det['admin_id']?>"><?=$det['name']?> </option>
                                                        <?php } ?>  
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div>
                             <!--    <div class="col-md-3">
                                <div class="form-group">
                                <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div>
                                   
                                      <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div>
                                  
                                </div>
                                </div> -->
                           </div>
                           <div class="col-md-12">
                             <!--   <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Voucher No</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_expenses')->result_array(); ?>
                                
                                                        <select id="cid" name="cid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['exp_id'])?'selected':''?> value="<?=$det['exp_id']?>"><?=$det['voucher_no']?> </option>
                                                        <?php } ?>  
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div> -->
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
                                    </form>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">Voucher No</th>
                                                    <th width="5px">Expenses Type</th>
                                                <th width="5px">Employee Name</th>
                                                 
                                                    <th width="5px">Amount</th>
                                                    <th width="5px">Remarks</th>
                                                   
                                                    <th width="5px">Total Value</th>
                                                    <th width="5px"> Voucher Date</th>
                                                    <th width="5px"> Payment Mode</th>
                                                    <th width="5px">Payment Details</th>


                                                  
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
                                        ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?=$loop['voucher_no']?></td>
                                                <td><?=$loop['expenses_type']?></td>
                                                <td><?=$loop['name']?></td>
                                                <td><?=$loop['ex_amount']?></td>
                                                <td><?=$loop['ex_remarks']?></td>
                                                <td><?=$loop['exp_gtotal']?></td>
                                                <td><?=$loop['voucher_date']?></td>
                                                <td><?=$loop['exp_payment_mode']?></td>
                                                <td><?=$loop['exp_payment_details']?></td>
                                        
                                           
                                           

    
                                     
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
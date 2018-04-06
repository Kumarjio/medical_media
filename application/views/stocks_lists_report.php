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
if(isset($inps['pname']) && !empty($inps))
{
     $pname = $inps['pname'];
	 $frmdt = $inps['from_dt'];
	 $todt = $inps['to_dt'];
}
else
{
	$pname = '';
	$frmdt = '';
	$todt = '';
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Stocks List</h2>
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
                                 
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/stock" method="post" enctype="multipart/form-data" >
                                   <div class="col-md-12">
                                   
                                     <div class="col-md-3">
                                       <div class="form-group">
                                    <label class="col-md-4 control-label">Product Name</label>
                                        <div class="col-md-8">   
                                   <?php $pnames =  $this->db->select('*')->group_by('i_name')->get('tbl_product')->result_array(); ?>
                            	<select id="pname" name="pname" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($pnames as $det) { ?>
                                                        <option <?=($pname==$det['i_id'])?'selected':''?> value="<?=$det['i_id']?>"><?=$det['i_name']?> </option>
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
                                 </form>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <?php /*?><h3>Stocks In Godown</h3><?php */?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th  width="65px">S.No</th>
                                                    <th width="5px">Invoice No</th>
                                                    <th width="5px">Customer Name</th>
                                                    <th width="5px">Product Name</th>
                                                    <th width="5px">Billed Qty</th>
                                                     <th width="5px">Total Amt</th>
                                                     <th width="65px">Date</th>
                                                    <th  width="65px">Hands In Quantity</th>
                                                    
                                                   
                                                   
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php $god = 0; if(is_array($list) && count($list) ) {
                                        $cnt=1;
                                            foreach($list as $loop){ 
											
											 ?>
											<tr>
                                            <td><?php echo $cnt++; ?></td>
                                            <td><?='INV00'.$loop['bill_no']?></td>
                                                <td><?=$loop['customer_name']?>-<?=$loop['mob_no1']?></td>
												<td><?php echo $loop['i_name']?></td>
                                                <td><?php echo $loop['quantity']?></td>
                                                <td><?=$loop['total_amount']?></td>
                                                <td> <?=date('d-m-Y', strtotime($loop['cds']))?></td>
                                                <td><?php echo $loop['qty']?></td>
                                                
												
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
<script type="text/javascript">
	
  $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  
  </script>
</body>
</html>
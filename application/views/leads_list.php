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
if(isset($inps['pono']) && !empty($inps))
{
     $pono = $inps['pono'];
	 $date = $inps['date'];
}
else
{
	$pono = '';
	$date = '';
	
}
?>
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Purchase Management</h2>
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
                                 <form action="<?=$this->config->item('base_url')?>index.php/Excel/order_list" method="post" enctype="multipart/form-data" >
                                   <div class="col-md-12">
                                   
                                     <div class="col-md-3">
                                       <div class="form-group">
                                    <label class="col-md-4 control-label">PO NO.</label>
                                        <div class="col-md-8">   
                                  <?php $cusdt =  $this->db->select('*')->group_by('po_no')->get('tbl_leads')->result_array(); ?>
                            	
                                                        <select id="pono" name="pono" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                        <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($pono==$det['po_no'])?'selected':''?> value="<?=$det['po_no']?>"><?=$det['po_no']?> </option>
                                                        <?php } ?>	
														    </select> 
                                        </div>
                                      </div>
                                     </div>
                                      <div class="col-md-3">
                                       <div class="form-group">
                                    <label class="col-md-4 control-label">PO Date</label>
                                        <div class="col-md-8">   
                                  <?php $cusdt =  $this->db->select('*')->group_by('po_no')->get('tbl_leads')->result_array(); ?>
                            	         <input type="text" class="form-control datepicker" name="date" id="date" value="<?=$date?>" >
                                                        
                                        </div>
                                      </div>
                                     </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div><div class="col-md-4">
                                          </div>
                                        </div>
                                      </div>
                                      
                                  </div>
                                 </form>                           
                                </div>
                                <div class="panel-body">
                                
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Part No</th>
                                                    <th>Description</th>
                                                    <th>Qty</th>
                                                    <th>Cost Each(GBP)</th>
                                                    <th>INR Rate</th>
                                                    <th>Sell Price(GBP)</th>
                                                     <th>INR Rate</th>
                                                    <th>Profit</th>
                                                    <th>Expected</th>
                                                    
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php
											  if(is_array($list) && count($list) ) {
                                        $i=1;
										$s_no[] = '';
										$sub1 =0;
										$sub2 =0;
										$sub3 =0;
										$sub4 =0;
										//$people = array("Peter", "Joe", "Glenn", "Cleveland");
										//echo '<pre>';print_r($S_no); exit;
                                            foreach($list as $loop)
											{
//												echo "<pre>";print_r($loop);exit;												
                                                  $sub1 +=$loop['cost'];
												  $sub2 +=$loop['inr_rate'];
												  $sub3 +=$loop['price'];
												  $sub4 +=$loop['inr_rates'];
												   ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
												<td><?=$loop['part_no']?></td>
												<td><?=$loop['description']?></td>
                                                <td><?=$loop['qty']?></td>
                                                <td><?=$loop['cost']?></td>
                                                <td><?=$loop['inr_rate']?></td>
                                                <td><?=$loop['price']?></td>
                                                <td><?=$loop['inr_rates']?></td>
                                                <td style="color:<?=($loop['price']-$loop['cost']>0)?'#090':'#F00'?>"><?=$loop['price']-$loop['cost']?></td>
                                                <td><?=date('d-m-Y', strtotime($loop['expected_date']))?></td>
												
                                                
											</tr>
                                            
											<?php } } ?>
                                              <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Total:<?=number_format($sub1,2)?></td>
                                                       <td>Total:<?=number_format($sub2,2)?></td>
                                                       <td>Total:<?=number_format($sub3,2)?></td>
                                                       <td>Total:<?=number_format($sub4,2)?></td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                               </tr>
                                           
										</tbody>
                                        </table>
                                       <?php /*?> <h3>Available Stock Details</h3>
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Part No</th>
                                                    <th>Product Name</th>
                                                    <th>Description</th>
                                                    <th>Qty</th>
                                                    <th>Product Rate</th>
                                                    <th>Date</th>
                                                    <th>Value</th>
                                             </tr>
											</thead>
                                            <tbody>
                                      <?php
											  if(is_array($list1) && count($list1) ) {
                                        $i=1;
										$s_no[] = '';
									     foreach($list1 as $loop)
											{ ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
												<td><?=$loop['part_no']?></td>
												<td><?=$loop['i_name']?></td>
                                                <td><?=$loop['descr']?></td>
                                                <td><?=$loop['qty']?></td>
                                                <td><?=$loop['prate']?></td>
                                                <td><?=date('d-m-Y', strtotime($loop['date']))?></td>
                                                <td><?=number_format($loop['prate'] * $loop['qty'],2)?></td>
                                           </tr>
											<?php } } ?>
										</tbody>
                                        </table><?php */?>
                                   <?php /*?> <?php foreach ($list as $loop){?>
     								<form id="getdet" method="get">
                                        <div id="getmodal_<?php echo $loop['id']?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog" style="width:1200px">
                                        
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Calls Details</h4>
                                              </div>
                                              
                                              <div class="modal-body" id="pop_data<?php echo $loop['id']?>">
                                              
                                             
                                                <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
                                              </div>
                                             
                                              </div>
                                              
                                            </div>
                    
                                              </div>
                                            </div>
 										</form>
										<?php } ?><?php */?>
                                    </div>
                                </div>
                            </div>
                            <?php //echo '<pre>';print_r($s_no); exit; ?>
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
			window.location =  '<?php echo base_url('index.php/Customer/deleteCustomer/')?>/'+id;
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
			url: "<?php echo base_url(); ?>" + "index.php/Customer/statuschange",
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
<script type="text/javascript">
$(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
</script>
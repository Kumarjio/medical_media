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
                    <h2>Opening and Closing Stock Report</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Stocklist/open_close_report" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Description Name</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_product')->result_array(); ?>
                            	
                                                        <select id="cid" name="cid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['i_id'])?'selected':''?> value="<?=$det['i_id']?>"><?=$det['i_name']?> </option>
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
                                  
                                    <!--<div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div><div class="col-md-4"><a href="<?=$this->config->item('base_url')?>index.php/Reports/sold_list?cid=<?=$cid==$det['cid']?>&area_name=<?=$area_name?>&mobile=<?=$mobile?>&from_dt=<?=$frmdt?>&to_dt=<?=$todt?>"><button type="button" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button></a>
                                    </div>-->
                                </div>
                                </div>
                                
                                    </form>                                       
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable" >
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">Product Name</th>
                                                    <th width="5px">Opening Stock</th>
                                                    <th width="5px">Value Stock</th>
                                                    <th width="5px">Recived Stock</th>
                                                    <th width="5px">Value</th>
                                                    <th width="5px">Purchase Return Qty</th>
                                                    <th width="5px">Value</th>
                                                    <th width="5px">Sales Qty</th>
                                                    <th width="5px">Value</th>
                                                    
                                                     <th width="5px">Cousnsuption Qty</th>
                                                    <th width="5px">Value</th>
                                                    <th width="5px">Stock Adj qty</th>
                                                    <th width="5px">Value</th>
                                                    <th width="5px">Closing Stock </th>
                                                    <th width="5px">Value</th>
                                                    <th width="5px">Date</th>
                                                    <th width="5px">Profit/loss</th>

                                                  
                                               </tr>
											</thead>
                                            <tbody>
                                        	 <?php
                                                $i=1;
										        $s_no = '';
											    $s_no[] = '';
                                            foreach($list as $loop){   ?>
                                                
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?php echo $loop['i_name']; ?></td>
                                                <td><?php echo $loop['opening_stock']; ?></td>
                                                <td><?php echo $loop['openning_value']; ?></td>
                                                <td><?php echo $loop['recived_stock']; ?></td>
                                                <td><?php echo $loop['recived_stock_value']; ?></td>
                                                <td><?php echo $loop['purchase_return_stock']; ?></td>
                                                <td><?php echo $loop['purchase_return_value']; ?></td>
                                                <td><?php echo $loop['saled_stock']; ?></td>
                                                <td><?php echo $loop['saled_stock_value']; ?></td>
                                                <td><?php echo $loop['consumed_stock']; ?></td>
                                                <td><?php echo $loop['consumed_stock_value']; ?>
                                                <td><?php echo $loop['adjusted_stock']; ?></td>
                                                <td><?php echo $loop['adjusted_stock_value']; ?>
                                                <td><?php echo $loop['clossing_stock']; ?></td>
                                                <td><?php echo $loop['clossing_stock_value']; ?>
                                                </td>
                                                <td><?php echo $loop['opening_date']; ?>
                                                </td>
                                                <td><?php echo $loop['purchase_return_value']+$loop['saled_stock_value']+$loop['consumed_stock_value']+$loop['adjusted_stock_value']+$loop['clossing_stock_value']-$loop['openning_value']-$loop['recived_stock_value']; ?>
                                                </td>
											</tr>
											<?php  } ?>
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
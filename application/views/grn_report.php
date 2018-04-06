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
     $product = $inps['product'];
     $po_num = $inps['po_num'];
    // $land = $inps['land'];
     $cid = $inps['cid'];
     $frmdt = $inps['from_dt'];
     $todt = $inps['to_dt'];
}
else
{
    $product = '';
    $po_num = '';
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/index" method="post" enctype="multipart/form-data" >
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
                                </div>
                               <div class="col-md-3">
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
                               
                            </div>
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
                                        <table class="table" width="auto">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                   
                                                    <th width="5px">PO No</th>
                                                    <th width="5px">PO Date</th>
                                                    <th width="5px">Vendor Name</th>
                                                    <th width="5px">Description</th>
                                                    <th width="5px">Hsn</th>
                                                    <th width="65px">Manufacture Name</th>
                                                    <th width="5px">Expire Date</th>
                                                    <th width="5px">Batch No</th>
                                                    <th width="5px">MRP</th>
                                                    <th width="5px">Qty</th>
                                                    <th width="5px">Free Qty</th>
                                                    <th width="65px">Unit</th>
                                                    <th width="65px">Unit Rate</th>
                                                    <th width="65px">Value</th>
                                                    <th width="65px">Discount %</th>
                                                    <th width="65px">Discount Value</th>
                                                  
                                                    <th width="5px">SGST%</th>
                                                    <th width="5px">CGST%</th>
                                                    <th width="5px">IGST%</th>
                                                    <th width="5px">SGST Value</th>
                                                    <th width="5px">CGST Value</th>
                                                    <th width="5px">IGST Value</th>
                                                    <th width="5px">Total</th>
                                                    <th width="5px">Credite Period</th>
                                                    <th width="5px">Invoice No</th>
                                                    <th width="65px">Invoice Date</th>
                                                     <th width="5px">GRN No</th>
                                                    <th width="5px">GRN Date</th>
                                                    
                                                    <th width="5px">Category</th>
                                                    <th width="5px">Sub Category</th>
                                                    <th width="5px">Status</th>
                                                    
                                                    <!-- <th width="5px">Payment Details</th> -->
                                                    
                                               </tr>
                                            </thead>
                                            <tbody>
                                             <?php
                                              if(is_array($stock) && count($stock) ) {
                                                  //echo '<pre>';print_r($list); exit;
                                        $i=1;
                                        $s_no = '';
                                            $s_no[] = '';
                                            foreach($stock as $loop){ //echo "<pre>"; print_r($loop);
                                                $dis_cal=$loop['p_rate']/100*$loop['discount'];

?>
                                            <tr>
                                                <td><?=$i?><?php $i++; ?></td>
                                                
                                                <td><?=$loop['po_1_ref']?></td>
                                                <td><?php  echo date('d-m-Y',strtotime($loop['podate']))?></td>
                                                <td><?=$loop['vendor_name']?></td>
                                                <td><?=$loop['i_name']?></td>
                                                <td><?=$loop['hsn_code']?></td>
                                                <td><?=$loop['manu_name']?></td>
                                                <td><?=$loop['podate']?></td>
                                                <td><?=$loop['batch_no']?></td>
                                                <?php $tax=$loop['sgst_amt']+$loop['cgst_amt']+$loop['igst_amt'];
                                                $rate=$loop['p_rate']*$loop['qty'];
                                                $mrp=$tax+$rate;
 
                                                ?>
                                                <td><?php echo $mrp;?></td>
                                     
                                                <td><?=$loop['qty']?></td>
                                                <td><?=$loop['po_free_qty']?></td>
                                                <td><?=$loop['location_name']?></td> 
                                                <td><?=$loop['p_rate']?></td>
                                                <td><?=$loop['p_rate']*$loop['qty'];?></td>
                                                <td><?=$loop['discount']?></td>
                                                <td><?php echo  $dis_cal;?></td>
                                                <td><?=$loop['sgst']?></td>
                                                <td><?=$loop['cgst']?></td>
<td><?=$loop['igst']?></td>
 
                                                <td><?=$loop['sgst_amt']?></td>
                                                
                                                <td><?=$loop['cgst_amt']?></td>
                                                <td><?=$loop['igst_amt']?></td>
                                                <td><?=$loop['gtotal']?></td>
                                                <td><?php echo  $loop['v_period']?></td>

                                                <td><?=$loop['vinvno']?></td>
                                                <td><?php echo date('d-m-Y',strtotime($loop['pdate']))?></td>
                                                
                                                <td><?=$loop['po_id']?></td>
                                               <td><?php echo date('d-m-Y',strtotime($loop['created_date']))?></td>
                                                <td><?=$loop['category_name']?></td>
                                                <td><?=$loop['sub_category_name']?></td>
                                                <?php if($loop['pending_amt']>0)
                                                {

                                              ?>
                                                <td><?php echo "Not Paid";?></td>
                                              <?php }else{?>
                                                <td><?php echo "Paid";?></td>
                                            <?php   }?>
                                            </tr>
                                            <?php  } } ?>
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
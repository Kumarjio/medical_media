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
                    <h2> Sales Return Report</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/sales_return_report" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Name</label>
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
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Bill Number</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('tbl_sales_return_add.return_bill_no')->from('tbl_sales_return_add')->get()->result_array(); ?>
                                
                                                        <select id="po_num" name="po_num" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($po_num==$det['return_bill_no'])?'selected':''?> value="<?=$det['return_bill_no']?>"><?php echo "SB"; ?><?=$det['return_bill_no']?> </option>
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
                                        <table class="table datatable" width="auto">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">Invoice No
</th>
                                                    <th width="5px">Invoice Date
</th>
                                                    <th width="5px">Customer Details
</th>
                                                    <th width="5px">Description 
</th>
                                                    <th width="5px">HSN Code
</th>
                                                    <th width="5px">Manufacture Name</th>
                                                    <th width="5px">Expire Date</th>
                                                   
                                                   
                                                    <th width="5px">Batch No</th>
                                                    <th width="65px">MRP</th>
                                                    <th width="65px">Qty</th>
                                           <th width="5px">Free Qty </th>
                                 <th width="5px">Unit</th>

                             <th width="5px">Unit Rate</th>
                              <th width="5px">Value</th>
                             

                                                    <th width="5px">SGST%</th>
                                                    <th width="5px">CGST%</th>
                                                    <th width="5px">IGST%</th>
                                                    <th width="5px">SGST Value</th>
                                                    <th width="5px">CGST Value</th>
                                                    <th width="5px">IGST Value</th>
                                                    <th width="5px">Total Value </th>
                                                    <th width="5px">Sales Return No</th>
                                                    <th width="5px">Sales Return date</th>
                                                    <th width="5px">Status</th>
                                                    <th width="5px">Payment Details</th>
                                               </tr>
                                            </thead>
                                            <tbody>
                                             <?php
                                              if(is_array($stock) && count($stock) ) {
                                             //  echo '<pre>';print_r($stock); exit;
                                        $i=1;
                                        $s_no = '';
                                            $s_no[] = '';
                                            foreach($stock as $loop){ 
                                  
                                             ?>
                                            <tr>
                                                <td><?=$i?><?php $i++; ?></td>
                                                <td><?php echo "SB"; echo $loop['return_bill_no'];?></td>
                                                 <td><?php echo date('d-m-Y',strtotime($loop['return_date']))?></td>
                                                <td><?=$loop['customer_name']?></td>
                                               <td><?=$loop['i_name']?></td>
                                               <td><?=$loop['hsn_code']?></td>
                                               <td><?=$loop['manu_name']?></td>
                                               <td><?=$loop['exp_date']?></td>
                                               <td><?=$loop['batch_num']?></td>
                                               <?php $tax=$loop['return_cgst_amt']+$loop['return_sgst_amt']+$loop['return_igst_amt'];
                                               $rate=$loop['return_sales_rate']*$loop['return_qty'];
                                               $mrp=$tax+$rate;
                                                ?>
                                                <td><?= $mrp?></td>
                                                <td><?=$loop['return_qty']?></td>
                                                 <td><?=$loop['curr_free_qty']?></td>
                                                  <td><?=$loop['location_name']?></td>
                                                   <td><?=$loop['return_sales_rate']?></td>
                                                    <td><?=$loop['return_sales_rate']*$loop['return_qty']?></td>
                                                    
                                              
                                                <td><?=$loop['return_sgst']?></td>
                                                <td><?=$loop['return_cgst']?></td>
                                                <td><?=$loop['return_igst']?></td>
                                                <td><?=$loop['return_sgst_amt']?></td>
                                                <td><?=$loop['return_cgst_amt']?></td>
                                                <td><?=$loop['return_igst_amt']?></td>
                                                 <td><?=$loop['return_gtotal']?></td>
                                                <td><?=$loop['return_bill_no']?></td>
                                               
                                                <td><?php echo date('d-m-Y',strtotime($loop['return_date']))?></td>
                                                <td><?php if($loop['return_pending_amount']>0)
                                                {echo "Not Paid";}else{echo "Paid";}?></td>
                                                <td><?//=$loop['return_pending_amount']?></td>
                                                
                                                
                                               </td>
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
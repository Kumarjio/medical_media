<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
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
                    <h2>Payment Details</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Sales/sales_payment" method="post" enctype="multipart/form-data" >
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
                           <!--      <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Area</label>
                                    <div class="col-md-8">   
                                   <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                
                                                        <input type="text" class="form-control" name="area_name" id="cus_code" value="<?=$area_name?>" >
                                                        
                                                            
                                                  
                                    </div>
                                </div>
                                </div> -->
                               <!--  <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Mobile</label>
                                    <div class="col-md-8">   
                                   <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                         <input type="text" class="form-control" style="form-controlx" name="mobile"  id="mobile"  value="<?=$mobile?>">        
                                                        
                                                   
                                    </div>
                                </div>
                                </div> -->
                               <!--  <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Landline NO</label>
                                    <div class="col-md-8">                    
                                       <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                    <input type="text" class="form-control" style="form-controlx" name="land"  id="land"  value="<?=$land?>">   
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
                                   
                                     <!--  <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div> -->
                                  
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
                                        <table class="table datatable">
                                            <thead>
											<tr>
												<th >S No</th>
												<th>Bill No</th>
                                                <th >Customer Name</th>
												<th >Sales Date</th>
												<th >Total Amt</th>
												<th >Paid Amt</th>
												<th >Pending Amt</th>
                        <th >Credit Days</th>
                        <th >Due Date</th>
                        <th > Over Due </th>
												<th >Payment / Print</th>
                        <th>Edit / Cancel</th>
											</tr>
										</thead>
                                            <tbody>
                                        	<?php
                                        $sno=1;
										$s_no = '';
										$s_no[] = '';
										$qty=0;
										$p_rate = 0;
										$qty1=0;
                    
										if(is_array($list) && count($list) ) {
											foreach($list as $loop){
												if(!in_array($loop['s_no'],$s_no))
												{
													$s_no[] = $loop['s_no'];
													$probes = '';
													$qty ='';
													$pro ='';
													$unit='';
													$batch='';
													$from = date_create($loop['created_date']);
                          $to = date_create(date('y-m-d'));
                          $interval = date_diff($from, $to);
												?>
												<tr>
													<td><?php echo $sno++; ?></td>
													<td><?php echo $loop['bill_no']; ?></td>
													<td><?php echo $loop['customer_name']; ?></td>
													<td><?php echo $loop['created_date']; ?></td>
												    <td><?php echo $loop['total_amount']; ?></td> 
												    <td><?php echo $loop['paid_amt']; ?></td> 
												    <td><?php echo $loop['pending_amt']; ?></td>
                             <td><?php echo $loop['c_period']; ?></td>
                            <?php $sts = $this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$loop['s_no'])->get()->result_array(); if($sts[0]['pending_amt'] != 0){ ?> <td <?php if($loop['c_period'] < $interval->format('%a')){?> style="color:red;font-size: 18px; " <?php } ?>><?php $date1 = strtotime("+".$loop['c_period']." days", strtotime($loop['created_date'])); echo date('Y-m-d',$date1); ?></td> <?php }else{ ?><span>Due paid</span> <?php } ?> 

                             <?php $sts = $this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$loop['s_no'])->get()->result_array(); if($sts[0]['pending_amt'] != 0){ ?> <td <?php if($loop['c_period'] < $interval->format('%a')){?> style="color:red;font-size: 18px; " <?php } ?>><?php if($loop['c_period'] < $interval->format('%a')){ echo $interval->format('%a')-$loop['c_period']; }else{ echo "0"; } ?></td>  <?php }else{ ?><td><span style="color: green">0</span></td> <?php } ?>  
												    <td>
												    	<?php $sts = $this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$loop['s_no'])->get()->result_array();if($sts[0]['bill_cancel_status'] == 0){
                                if($sts[0]['pending_amt'] != 0){ ?>
                              <button class="btn btn-info  btn-xs"  type="button" onclick="open_model(<?php echo $loop['s_no']; ?>);">Make Payment</button> <?php }else{ ?> <button class="btn btn-warning  btn-xs"  type="button">Payment Completed</button> <?php } ?>
                              <a href='<?php echo base_url() ?>index.php/Sales/sales_print/<?php echo $loop['s_no']; ?>'><button class="btn btn-success btn-xs">Print</button></a> <?php
                              }else{ ?>
                              <button class="btn btn-warning  btn-xs"   type="button">Bill Canceled</button>
                              <?php } ?>
												    </td>
												     <td>
                              <?php $sts = $this->db->select('*')->from('tbl_sales')->where('tbl_sales.s_no',$loop['s_no'])->get()->result_array();if($sts[0]['bill_cancel_status'] == 0){ ?>
                                
                              <a href='<?php echo base_url() ?>index.php/Sales/sales_edit/<?php echo $loop['s_no']; ?>'><button class="btn btn-primary btn-xs">Edit</button></a>&nbsp;<button class="btn btn-danger btn-xs" onclick="bill_cancel(<?php echo $loop['s_no']; ?>);">Bill Cancel</button> <?php
                              }else{ ?>
                              <button class="btn btn-warning  btn-xs"   type="button">Bill Canceled</button>
                              <?php } ?>
                            </td>
										      </tr>
											<?php }}} ?>
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
      	<form action="<?php echo base_url()?>index.php/Payment/sales_payment_details_add" method="POST">
        <div class="modal-header" style="background-color: #14BDE4">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="color: white">Sales Payment </h3>
        </div>

        <div class="modal-body">
          	<div class="form-group col-md-6">
        		<label class="col-md-4 control-label">Invoice No</label>
        		<div class="col-md-6">
           			<input type="text"   class="form-control  uppercase" required placeholder="Enter Invoice No"  name="invoice_no" id="invoice_no" readonly />
           			<input type="hidden"   class="form-control  " required   name="po_ref_id" id="po_ref_id" readonly />                                               
       			</div>
   			</div>
   			<div class="form-group col-md-6">
        		<label class="col-md-4 control-label">Customer Name</label>
        		<div class="col-md-6">
           			<input type="text"   class="form-control  uppercase" required placeholder="Enter customer name"  name="cus_name" id="cus_name" readonly />                                               
       			</div>
   			</div>
   			<div class="form-group col-md-6">
        		<label class="col-md-4 control-label">Invoice Amount</label>
        		<div class="col-md-6">
           			<input type="text"   class="form-control  uppercase" required placeholder="Enter Invoice Amount"  name="invoice_amt" id="invoice_amt" readonly>                                               
       			</div>
   			</div>
   			<div class="form-group col-md-6">
        		<label class="col-md-4 control-label">Paid Amount</label>
        		<div class="col-md-6">
           			<input type="text"   class="form-control  uppercase" required placeholder="Enter Paid Amount"  name="paid_amt" id="paid_amt" readonly>                                               
       			</div>
   			</div>
   			<div class="form-group col-md-6">
        		<label class="col-md-4 control-label">Pending Amount</label>
        		<div class="col-md-6">
           			<input type="text"   class="form-control  uppercase" required placeholder="Enter Pending Amount"  name="pending_amt" id="pending_amt" readonly>                                               
       			</div>
   			</div>
   			<div class="form-group col-md-6">
        		<label class="col-md-4 control-label">Purchase Mode<sup  style="color:#f00"> * </sup></label>
       			<div class="col-md-6">
                   <select class="selectpicker form-control "    name="purchase_mode" id="purchase_mode" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                        <option value="" disabled selected>Select</option>
                        <option value="cash" >Cash</option>
                        <option value="card" >Card</option>
                        <option value="cheque" >Cheque</option>
                        <option value="rtgs" >RTGS</option>
                    </select>                                        
        		</div>
    		</div>
   			<div id="append_pay_items"></div>

        </div>
        <div class="modal-footer" style="background-color: #14BDE4">
            <button type="submit"  class="btn btn-default" >OK</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
	    
    
    <!-- Footer ends -->    
     <?php $this->load->view('include_js'); ?>
     
<script type="text/javascript">
	function fndelete(id) {
		var deletopt=confirm('Are you sure, do you want to delete this record?');
	  	if(deletopt)  {
			window.location =  '<?php echo base_url('index.php/Stock/deletestock/')?>/'+id;
		    return true;
	  	}  else  {
		  	return false;
	  	}
	}
  function bill_cancel(id){
  if(confirm("Are you sure you want to Cancel this Bill?")){
       // alert(id);
       $.ajax({
        url:"<?php echo base_url() ?>index.php/Sales/sales_bill_cancel/"+id,
        type:"POST",
        dataType:"JSON",
        success:function(res){
          console.log(res);
          location.reload();
        }
       });
    }
    else{
        return false;
    }
    
  }
	function open_model($id){
		//alert($id);
		$.ajax({
			url:'<?php echo base_url() ?>index.php/Payment/get_sales_payment_details/'+$id,
			type:'POST',
			dataType:'JSON',
			success:function(res){
				console.log(res);
				$('#invoice_no').val(res[0]['bill_no']);
				$('#cus_name').val(res[0]['customer_name']);
				$('#invoice_amt').val(res[0]['total_amount']);
				$('#paid_amt').val(res[0]['paid_amt']);
				$('#pending_amt').val(res[0]['pending_amt']);
				$('#po_ref_id').val(res[0]['s_no']);


				$('#myModal').modal({backdrop: 'static', keyboard: false});
        $('.cashpay').remove();
        $('.cardpay').remove();
         $('.cash_card').remove();
			}
		});
		 
	}
	$('body').on('change','#coll_amt',function(){
		$pending_amt = $('#pending_amt').val();
		$payment =  $('#coll_amt').val();
		$bal = $pending_amt-$payment;
		$('#bal_amt').val($bal);

	});
	$('body').on('change','#trans_amt',function(){
		$pending_amt = $('#pending_amt').val();
		$payment =  $('#trans_amt').val();
		$bal = $pending_amt-$payment;
		$('#bal_amt').val($bal);

	});
	$('body').on('change','#purchase_mode',function(){
       $data = $(this).val();
      // alert($data);
      $('.cashpay').remove();
        $('.cardpay').remove();
         $('.cash_card').remove();
       if($data == "cash"){
        
            $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Collect Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Collect Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
           
       }else if($data == "card"){
           $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Trnans Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Trnans Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
       }else if($data == "rtgs"){
           $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">RTGS Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter RTGS Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
       }else if($data == "cheque"){
           $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Cheque Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Cheque Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
       }
    });
</script>

<script>
  $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  </script>
</body>
</html>
<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Sales Return List</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="col-md-12">
                          <a href="<?php echo base_url() ?>index.php/Sales/sales_return" class="btn btn-info">Add Sales Return</a>
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                               
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
											<tr>
												<th >S No</th>
												<th>Bill No</th>
                        <th >Customer Name</th>
												<th >Return Date</th>
												<th >Total Amt</th>
												<th >Paid Amt</th>
												<th >Pending Amt</th>
												<th>Action</th>
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
												if(!in_array($loop['sales_return_add_id'],$s_no))
												{
													$s_no[] = $loop['sales_return_add_id'];
													$probes = '';
													$qty ='';
													$pro ='';
													$unit='';
													$batch='';
													
												?>
												<tr>
													<td><?php echo $sno++; ?></td>
													<td><?php echo $loop['sales_return_bill_no']; ?></td>
													<td><?php echo $loop['return_cus_name']; ?></td>
													<td><?php echo $loop['return_date']; ?></td>
												    <td><?php echo $loop['return_gtotal']; ?></td> 
												    <td><?php echo $loop['return_paid_amount']; ?></td> 
												    <td><?php echo $loop['return_pending_amount']; ?></td>
												    <td>
												    	<?php $sts = $this->db->select('*')->from('tbl_sales_return_add')->where('tbl_sales_return_add.sales_return_add_id',$loop['sales_return_add_id'])->get()->result_array(); if($sts[0]['return_pending_amount'] > 0){ ?>
												    	<button class="btn btn-info  btn-xs"  type="button" onclick="open_model(<?php echo $loop['sales_return_add_id']; ?>);">Make Payment</button> <?php }else{ ?> <button class="btn btn-warning  btn-xs"  type="button">Make Completed</button> <?php } ?>
												    	<a href='<?php echo base_url() ?>index.php/Sales/sales_return_print/<?php echo $loop['sales_return_add_id']; ?>'><button class="btn btn-success btn-xs">print</button></a>
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
        <form action="<?php echo base_url()?>index.php/Payment/sales_return_details_add_payment" method="POST">
        <div class="modal-header" style="background-color: #14BDE4">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="color: white">Sales Return Payment </h3>
        </div>

        <div class="modal-body">
            <div class="form-group col-md-6">
            <label class="col-md-4 control-label">Bill No</label>
            <div class="col-md-6">
                <input type="text"   class="form-control  uppercase" required placeholder="Enter Invoice No"  name="invoice_no" id="invoice_no" readonly />
                <input type="hidden"   class="form-control  " required   name="po_ref_id" id="po_ref_id" readonly />                                               
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-4 control-label">Customer Name</label>
            <div class="col-md-6">
                <input type="text"   class="form-control  uppercase" required placeholder="Enter customer name"  name="cus_name" id="cus_name" readonly />
                <input type="hidden"   class="form-control  uppercase" required placeholder="Enter customer name"  name="cus_id" id="cus_id" readonly />                                               
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
	function open_model($id){
		//alert($id);
		$.ajax({
			url:'<?php echo base_url() ?>index.php/Payment/get_sales_payment_details_ret/'+$id,
			type:'POST',
			dataType:'JSON',
			success:function(res){
				console.log(res);
				$('#invoice_no').val(res[0]['bill_no']);
				$('#cus_name').val(res[0]['customer_name']);
        $('#cus_id').val(res[0]['customer_id']);
				$('#invoice_amt').val(res[0]['return_gtotal']);
				$('#paid_amt').val(res[0]['return_paid_amount']);
				$('#pending_amt').val(res[0]['return_pending_amount']);
				$('#po_ref_id').val(res[0]['sales_return_add_id']);
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
       if($data == "cash"){
        $('.cashpay').remove();
        $('.cardpay').remove();
         $('.cash_card').remove();
            $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Collect Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Collect Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
           
       }else if($data == "card"){
           $('.cashpay').remove();
           $('.cardpay').remove();
            $('.cash_card').remove();
           $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Trnans Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Trnans Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
       }else if($data == "rtgs"){
           $('.cashpay').remove();
           $('.cardpay').remove();
           $('.cash_card').remove();
           $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">RTGS Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter RTGS Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
       }else if($data == "cheque"){
           $('.cashpay').remove();
           $('.cardpay').remove();
           $('.cash_card').remove();
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
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
                    <h2>Purchase Return List</h2>
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
                                                   <!--  <a href="<?php echo base_url('index.php/PriceList/addrate'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Product Rate</button></a> -->
                                                                 
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th >S. No</th>
                                                <th >DC No</th>
                                                <th >Customer Name</th>
                                                <th >Purchase Return Value <br> Before Tax</th>
                                                <th >Purchase Return Value <br> After Tax</th>
                                                <th >Return Date</th>
                                                <th >Paid Amount</th>
                                                <th >Pending Amount</th>
                                                <th >Make Payment</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                                 $sno=1;
                                                if(is_array($list) && count($list) ) {
                                                        foreach($list as $loop){
                                            ?>
                                                <tr>
                                                 <td><?php echo $sno++; ?></td>
                                                 <td><?php echo $loop['goods_return_dc_no']; ?></td>
                                                 <td><?php echo $loop['confirm_return_vend_name']; ?></td>
                                                 <td><?php echo $loop['confirm_return_stotal']; ?></td>
                                                 <td><?php echo $loop['confirm_return_gtotal']; ?></td>
                                                 <td><?php echo $loop['goods_return_dc_date']; ?></td>
                                                 <td><?php echo $loop['confirm_return_paid']; ?></td>
                                                 <td><?php echo $loop['confirm_return_pending']; ?></td>
                                                 <td><button onclick="open_model(<?php echo $loop['goods_return_confirm_data_id']; ?>)" class="btn btn-info btn-xs">Make Payment</button></td>
                                                 <td><a href="<?php echo base_url() ?>index.php/Purchaseorder/goods_return_print/<?php echo $loop['goods_return_confirm_data_id']; ?>" class="btn btn-primary btn-xs">Preview PDF</a></td>
                                                </tr>
                                            <?php } } ?>
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
        <form action="<?php echo base_url()?>index.php/Payment/sales_payment_return_details_add" method="POST">
        <div class="modal-header" style="background-color: #14BDE4">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="color: white">Goods Return Payment </h3>
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
                <label class="col-md-4 control-label">Vendor Name</label>
                <div class="col-md-6">
                    <input type="text"   class="form-control  uppercase" required placeholder="Enter customer name"  name="vend_name" id="vend_name" readonly />
                    <input type="hidden"   class="form-control  uppercase" required placeholder="Enter customer name"  name="vendor_id" id="vendor_id" readonly />                                                
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
	function open_model($id){
        //alert($id);
        $.ajax({
            url:'<?php echo base_url() ?>index.php/Payment/get_goods_return_payment_details/'+$id,
            type:'POST',
            dataType:'JSON',
            success:function(res){
                console.log(res);
                $('#invoice_no').val(res[0]['goods_return_dc_no']);
                $('#vend_name').val(res[0]['vendor_name']);
                $('#vendor_id').val(res[0]['vendor_id']);
                $('#invoice_amt').val(res[0]['confirm_return_gtotal']);
                $('#paid_amt').val(res[0]['confirm_return_paid']);
                $('#pending_amt').val(res[0]['confirm_return_pending']);
                $('#po_ref_id').val(res[0]['goods_return_confirm_data_id']);


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
           $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">RTGS Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter RTGS Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
       }else if($data == "cheque"){
           $('.cashpay').remove();
           $('.cardpay').remove();
           $('.cash_card').remove();
           $('#append_pay_items').append('<div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Cheque Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Cheque Amount"  name="coll_amt" id="coll_amt" ></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Balance Amount</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Balance Amount" readonly  name="bal_amt" id="bal_amt"></div></div><div class="form-group cashpay col-md-6"><label class="col-md-4 control-label">Details</label><div class="col-md-6"><input type="text"   class="form-control  uppercase" required placeholder="Enter Details"  name="ref_number" id="ref_number" ></div></div>');
       }
    });
</script>
</body>
</html>
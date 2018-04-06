<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    <?php //echo '<pre>';print_r($list); ?>

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage <span class="pull-left">Payment Inward</span></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        
                        <div class="col-md-12">                        

                            <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3 class="pull-left">Payment Inward</h3>
                                    <form id="jvalidate" role="form" class="form-horizontal" method="post" action="<?php echo base_url('index.php/Sales/makepayment');?>">
                                    <div class="panel-body"> 
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">Payment Mode<sup  style="color:#f00"> * </sup> </label>  
                                            <div class="col-md-6">
                                               <select class="selectpicker form-control uppercase bs-select-hidden" name="payment_mode" required id="payment_mode" >
                                               <option value="1">1</option>
                                               <option value="2">2</option>
                                               <option value="3">3</option>
                                               <option value="4">4 </option>
                                               </select>

                                            </div>
                                        </div>
                                    <div class="form-group">
                                                <label class="col-md-3 control-label">Customer Details</label>  
                                                <div class="col-md-6"><?php echo $list[0]['customer_name'];  ?>
                                                   
                                                  <div class="error" ><?php echo form_error('h_id'); ?></div>	
    
                                                </div>
                                      </div>
                                        <div class="form-group">
                                                <label class="col-md-3 control-label">Purchase Id</label>  
                                                <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" placeholder="Enter Area Name" name="a_name" readonly id="a_name" value="<?php echo 'PUR00'.$list[0]['s_no'];  ?>"/>
                                                
                                                <input type="hidden" class="form-control uppercase" placeholder="Enter Area Name" name="bill_no" readonly id="bill_no" value="<?php echo $list[0]['s_no'];  ?>"/>
                                                <input type="hidden" class="form-control uppercase" placeholder="Enter Area Name" name="customer_code" readonly id="customer_code" value="<?php echo $list[0]['customer_code'];  ?>"/>
                                                   
                                                  <div class="error" ><?php echo form_error('h_id'); ?></div>	
    
                                                </div>
                                      </div>                                   
                                        
                                    
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Purchase Date</label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase"placeholder="Enter Area Name" name="purdate" readonly id="purdate" value="<?php echo date('d-m-Y', strtotime($list[0]['inv_date']));  ?>"/>
                                                <span class="help-block"></span>
                                              <div class="error" ><?php echo form_error('a_name'); ?></div>	

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Total Amount</label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" readonly style="color:#000;"  name="product_amt" id="product_amt" value="<?php echo $list[0]['total_amount'];  ?>"/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Invoice Amount </label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" readonly style="color:#000;"  id="invpice_amount" value="<?php echo $list[0]['total_amount'];  ?>"/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paid Amount </label>  
                                            <div class="col-md-6">
                                            <input type="text" class="form-control uppercase" readonly style="color:#000;" id="invpice_amount" value="<?php echo $list[0]['paid_amt'];  ?>"/>
                                                
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">To Be Paid Amount </label>  
                                            <div class="col-md-6">
            <input type="text" class="form-control uppercase" readonly placeholder="Enter Area Code"  id="invpice_amount" value="<?php echo $list[0]['total_amount']-$list[0]['paid_amt'];  ?> "/>
                                           <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Payment Method<sup  style="color:#f00"> * </sup> </label>  
                                            <div class="col-md-6">
                                               <select class="selectpicker form-control uppercase bs-select-hidden" name="payment_method" required id="payment_method" >
                                               <option value="1">Cash</option>
                                               <option value="2">Cheque / DD</option>
                                               <option value="3">Online Transfer</option>
                                               <option value="4">Credit Card / Debit Card </option>
                                               <?php /*?><option value="5">Finance</option><?php */?>
                                               </select>

                                            </div>
                                        </div>
                                        <div class="payment_card_pnl" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Transaction Id </label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" style="color:#000;" placeholder="Enter Cheque / DD No" name="trans_id" id="trans_id" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="payment_chk_pnl" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Cheque / DD No </label>  
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control uppercase" style="color:#000;" placeholder="Enter Cheque / DD No" name="che_no" id="che_no" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="payment_chk_pnl_onli" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Reference No </label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control uppercase" style="color:#000;" placeholder="Enter Reference No" name="ref_nos" id="ref_nos" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="payment_chk_pnl" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Bank Name </label>  
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control uppercase" style="color:#000;" placeholder="Enter Bank Name" name="bank_name" id="bank_name" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="payment_chk_pnl payment_chk_pnl_onli payment_card_pnl" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Date </label>  
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control uppercase datepickerr" style="color:#000;" placeholder="Enter Date" name="chq_dt" id="chq_dt" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        
                                        
                                         <div class="finance" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Finance Name</label>  
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" style="color:#000;" placeholder="Enter Finance Name" name="finance" id="finance" value=""/>
                                              <div class="error" ><?php echo form_error('finance'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="month" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No.Of Months </label>  
                                            <div class="col-md-6">
                                                <input type="number" class="form-control " style="color:#000;" placeholder="Enter No.Of Months " name="month" id="month" value="" onchange="totalamt();"/>
                                              <div class="error" ><?php echo form_error('month'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="emi" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">EMI Amt (Per Month) </label>  
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control " style="color:#000;" placeholder="Enter EMI Amt (Per Month)" name="emi" id="emi" value="" onchange="totalamt();"/>
                                              <div class="error" ><?php echo form_error('emi'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        
                                       <div class="form-group">
                                            <label class="col-md-3 control-label">Payment Amount<sup  style="color:#f00"> * </sup> </label>  
                                            <div class="col-md-6">
                                                <input type="text" required class="form-control uppercase" style="color:#000;" placeholder="Enter Payment Amount" name="paym_amount" id="paym_amount" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                          
                                <div class="panel-body">
                                    <div class="table-responsive testid"></div>
                                </div>
                            </div>
                            
                                        <div class="row">
                                        <div class="form-group pull-right">
                                        <div class="btn-group pull-right col-md-12"><input class="btn btn-primary" value="Submit" type="submit" name="submit"><input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button"> 
                                        </div>    
                                    </div>

                                    </div>                                                                                                                          
                                    </div>                                               
                                    </form>
                                </div>
                            </div>
                            <!-- END JQUERY VALIDATION PLUGIN -->
                            </div>
                        </div>
                    </div>

                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>



<script type="text/javascript">
$(document).on('change','#payment_method',function()
{
	var this_val = $(this).val();
	//alert(this_val)
	if(this_val==1)
	{
		$('.payment_chk_pnl').hide();
		$('.payment_chk_pnl_onli').hide();
		$('.payment_card_pnl').hide();
		$('.emi').hide();
		$('.finance').hide();
		$('.month').hide();
	}
	else if(this_val==2)
	{
		$('.payment_chk_pnl_onli').hide();
		$('.payment_card_pnl').hide();
		$('.payment_chk_pnl').show();
		$('.emi').hide();
		$('.finance').hide();
		$('.month').hide();
	}
	else if(this_val==3)
	{
		$('.payment_chk_pnl').hide();
		$('.payment_card_pnl').hide();
		$('.payment_chk_pnl_onli').show();
		$('.emi').hide();
		$('.finance').hide();
		$('.month').hide();
	}
	else if(this_val==4)
	{
		$('.payment_chk_pnl').hide();
		$('.payment_chk_pnl_onli').hide();
		$('.payment_card_pnl').show();
		$('.emi').hide();
		$('.finance').hide();
		$('.month').hide();
		
	}
	else if(this_val==5)
	{
		$('.payment_chk_pnl').hide();
		$('.payment_chk_pnl_onli').hide();
		$('.payment_card_pnl').hide();
		$('.emi').show();
		$('.finance').show();
		$('.month').show();
		
	}
});
function totalamt(){
		var month=parseFloat($('#month').val());
        var emi=parseFloat($('#emi').val());
        if(!isNaN(month) && !isNaN(emi) && emi!=0){
        var total=(parseFloat(month))*parseFloat(emi);
				if(isNaN(total)){ } else {
                    $("#paym_amount").val(total);
					
                }
        }else{
                $("#paym_amount").val("");
				
        }


    }
</script>
<script>
  $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  </script>
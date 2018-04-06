<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Advance Details	</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3 class="pull-left">Advance Details</h3>
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Advance_payment_list/adddata');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
										<div class="col-md-6">

    
											<div class="form-group">                                        
                                                <label class="col-md-4 control-label">Customer Code<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	
                                                    <select name="cus_code" id="cus_code" class="selectpicker form-control uppercase" required  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    	<option value="" disabled selected> SELECT </option>
														<?php foreach($customer as $row){ ?>	
														<option value="<?php echo $row['cid']; ?>"><?php echo 'CUS00'.$row['cid']; ?> - <?php echo $row['customer_name']; ?> - <?php echo $row['mob_no1']; ?> </option>
														<?php } ?> 	      
                                                    </select>
                                                    <div class="error" ><?php echo form_error('cus_code'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Product Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	
                                                    <select name="pname" id="pname" class="selectpicker form-control uppercase" required  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    	<option value="" disabled selected> SELECT </option>
														<?php foreach($item as $row){ ?>	
														<option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?> </option>
														<?php } ?> 	      
                                                    </select>
                                                    <div class="error" ><?php echo form_error('pname'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group cst" >                                        
                                                <label class="col-md-4 control-label">Selling Rate<sup  style="color:#f00"> * </sup> </label>
                                                <div class="col-md-8">
                                                        <input type="text"  class="form-control" style="color:#000;"   placeholder="Enter Rate" name="rate" id="rate" >
                                                    <div class="error" ><?php echo form_error('rate'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-4 control-label">Payment Method<sup  style="color:#f00"> * </sup> </label>  
                                            <div class="col-md-8">
                                               <select class="selectpicker form-control uppercase bs-select-hidden" name="payment_method" required id="payment_method" >
                                               <option value="1">Cash</option>
                                               <option value="2">Cheque / DD</option>
                                               <option value="3">Online Transfer</option>
                                               <option value="4">Credit Card / Debit Card </option>
                                               <option value="5">Finance</option>
                                               </select>

                                            </div>
                                        </div>
                                            
                             	</div>
                                <div class="col-md-6">
                                
                                            
                                        <div class="payment_card_pnl" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Transaction Id </label>  
                                            <div class="col-md-8">
                                                <input type="text" class="form-control uppercase" style="color:#000;" placeholder="Enter Cheque / DD No" name="trans_id" id="trans_id" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="payment_chk_pnl" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Cheque / DD No </label>  
                                            <div class="col-md-8">
                                                <input type="text"  class="form-control uppercase" style="color:#000;" placeholder="Enter Cheque / DD No" name="che_no" id="che_no" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="payment_chk_pnl_onli" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Reference No </label>  
                                            <div class="col-md-8">
                                                <input type="text" class="form-control uppercase" style="color:#000;" placeholder="Enter Reference No" name="ref_nos" id="ref_nos" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="payment_chk_pnl" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Name </label>  
                                            <div class="col-md-8">
                                                <input type="text"  class="form-control uppercase" style="color:#000;" placeholder="Enter Bank Name" name="bank_name" id="bank_name" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="date" >
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date </label>  
                                            <div class="col-md-8">
                                                <input type="text"  class="form-control uppercase datepickerr" style="color:#000;" placeholder="Enter Date" name="chq_dt" id="chq_dt" value=""/>
                                              <div class="error" ><?php echo form_error('a_code'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        
                                        
                                         <div class="finance" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Finance Name</label>  
                                            <div class="col-md-8">
                                                <input type="text"  class="form-control" style="color:#000;" placeholder="Enter Finance Name" name="finance" id="finance" value=""/>
                                              <div class="error" ><?php echo form_error('finance'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="month" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">No.Of Months </label>  
                                            <div class="col-md-8">
                                                <input type="number" class="form-control " style="color:#000;" placeholder="Enter No.Of Months " name="month" id="month" value="" onchange="totalamt();"/>
                                              <div class="error" ><?php echo form_error('month'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="emi" style="display:none">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">EMI Amt (Per Month) </label>  
                                            <div class="col-md-8">
                                                <input type="text"  class="form-control " style="color:#000;" placeholder="Enter EMI Amt (Per Month)" name="emi" id="emi" value="" onchange="totalamt();"/>
                                              <div class="error" ><?php echo form_error('emi'); ?></div>	

                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group vat" >                                        
                                                <label class="col-md-4 control-label">Advance Amt<sup  style="color:#f00"> * </sup> </label>
                                                <div class="col-md-8">
                                                        <input type="text"  class="form-control uppercase" style="color:#000;"   placeholder="Enter Advance" name="advance" id="advance" >
                                                    <div class="error" ><?php echo form_error('advance'); ?></div>                                               
                                                </div>
                                            </div>
                                </div>
 

    
</div>
                                        
</div>
                                    
<div class="row">
                                        <div class="form-group pull-right">
                                        <div class="btn-group pull-right col-md-12"><input class="btn btn-primary" value="Submit" type="submit" name="submit">
                                        </div>    
                                    </div>

                                    </div>
                                    

                                </div>
                               
                           
                            </form>
                             </div>
                        </div>
                

                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
    
        
     
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
		$('.date').show();
		$('.month').hide();
	}
	else if(this_val==2)
	{
		$('.payment_chk_pnl_onli').hide();
		$('.payment_card_pnl').hide();
		$('.payment_chk_pnl').show();
		$('.emi').hide();
		$('.date').show();
		$('.finance').hide();
		$('.month').hide();
	}
	else if(this_val==3)
	{
		$('.payment_chk_pnl').hide();
		$('.payment_card_pnl').hide();
		$('.payment_chk_pnl_onli').show();
		$('.emi').hide();
		$('.date').show();
		$('.finance').hide();
		$('.month').hide();
	}
	else if(this_val==4)
	{
		$('.payment_chk_pnl').hide();
		$('.payment_chk_pnl_onli').hide();
		$('.payment_card_pnl').show();
		$('.emi').hide();
		$('.date').show();
		$('.finance').hide();
		$('.month').hide();
		
	}
	else if(this_val==5)
	{
		$('.payment_chk_pnl').hide();
		$('.payment_chk_pnl_onli').hide();
		$('.payment_card_pnl').hide();
		$('.date').show();
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
                    $("#advance").val(total);
					
                }
        }else{
                $("#advance").val("");
				
        }


    }
</script>
<script>
  $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  </script>


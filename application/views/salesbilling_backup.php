<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    <link type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet" />

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Sales Billing</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                                            <form class="form-horizontal"  role="form" action="<?php echo base_url('index.php/Sales/addSales');?>" method="post" onSubmit="return submitTest()">

                <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Add Entry</h3>
                               
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
										
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Bill NO</label>
                                                <div class="col-md-8">  
                                                <?php $id = $this->db->select('max(s_no)')->from('tbl_sales')->get()->result_array();  ?>                                          
                                                   <input type="text" class="form-control uppercase" readonly  required name="bill_no" id="bill_no" style="color:#000;" value="<?php echo $id[0]['max(s_no)']+1;  ?>">          	                             
                                                </div>
                                            </div>
                                            
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
                                                <label class="col-md-4 control-label">Customer Details</label>
                                                <div class="col-md-8" id="cus_det">
                                                    <div class="error" ><?php echo form_error('address1'); ?></div>                                               
                                                </div>
                                            </div>
                                            <?php /*?><div class="form-group">                                        
                                                <label class="col-md-4 control-label">Expenses Type<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	
                                                    <select name="expenses" id="expenses" class="selectpicker form-control expenses"   data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" multiple>
                                                    	<?php foreach($expenses as $row){ ?>	
														<option value="<?php echo $row['id']; ?>"><?php echo $row['expenses_type']; ?> </option>
														<?php } ?> 	      
                                                    </select>
                                                    <div class="error" ><?php echo form_error('cus_code'); ?></div>                                               
                                                </div>
                                            </div><?php */?>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Remarks<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text"  class="form-control uppercase"  <?php /*?>required<?php */?> placeholder="Enter Remarks" name="remarks" id="remarks" value="<?php echo set_value('remarks');  ?>" >
                                                    <div class="error" ><?php echo form_error('remarks'); ?></div>                                               
                                                </div>
                                            </div>
                                            
                                          
                                            
										</div>
                                        
                                        <div class="col-md-6">
										
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Tin NO</label>
                                                <div class="col-md-8">  
                                                 <input type="text" class="form-control uppercase"   required name="tin" id="tin" style="color:#000;" placeholder="Enter Tin NO">          	                             
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Cst NO</label>
                                                <div class="col-md-8">  
                                                 <input type="text" class="form-control uppercase"   required name="cst" id="cst" style="color:#000;" placeholder="Enter Cst NO">          	                             
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Service Tax No</label>
                                                <div class="col-md-8" >
                                                    <input type="text" class="form-control uppercase"   required name="service_tax" id="service_tax" style="color:#000;" placeholder="Enter Service Tax NO">          	                                                                  
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Pan NO<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text"  class="form-control uppercase"  required placeholder="Enter Pan NO" name="pan" id="pan"  >
                                                    <div class="error" ><?php echo form_error('remarks'); ?></div>                                               
                                                </div>
                                            </div>
                                            
                                          <?php /*?><div class="form-group">                                        
                                                <label class="col-md-4 control-label">Insurance Amount<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text"  class="form-control uppercase"   placeholder="Enter Insurance Amount" name="insurance_amt" id="insurance_amt" onchange="totalamt(1); " >
                                                </div>
                                            </div><?php */?>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Sales Person Name<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text"  class="form-control uppercase"  required placeholder="Enter Name" name="vendor_name" id="vendor_name" >
                                                </div>
                                            </div>
                                            <div class="form-group" >                                        
                                                <label class="col-md-4 control-label">Advance Amt<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text"  class="form-control uppercase"    name="vendor_name" id="vendor_name" >
                                                </div>
                                            </div>
										</div>
                                        
                                    </div>
                                    

                                </div>
                                
                           
                            
                            
                            
                			</div>
                            </div>
                            </div>
                       
						 <div class="col-md-15">
							
                            <!-- START DEFAULT DATATABLE -->
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                          
                                <div class="panel-body" style="width:auto"  >
                                    <div class="table-responsive testid">
                                        <table class="table" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Product Type<sup style="color:#f00"> * </sup></th>
                                                    <th width="14%">Product</th>
                                                    <th width="11%">Pro Id</th>
                                                    <th width="8%"> Serial/IME No</th>
                                                    <th width="10%" >Descr</th>
                                                    <th width="7%">Vat</th>
                                                    <th width="8%">Price</th>
                                                    <th width="7%">Qty<sup style="color:#f00"> * </sup></th>
                                                    <th width="7%">Tax amt</th>
                                                    <th width="9%">Total</th>
                                                </tr>
											</thead>
                                            <tbody id="testid">
                                        	
											<tr>
												<td >
                                              <select class="selectpicker form-control uppercase bs-select-hidden payment_method" name="payment_method[]" id="payment_method_1" required >
                                             <option value="" selected disabled>Select</option>
                                               <option value="1">Laptop</option>
                                               <option value="2">Mobile</option>
                                               <option value="5">Accessories</option>
                                               </select>
                                               </td>

                                           
                                           
													<td>
                                          <span class="probs1">       <select  class="selectpicker form-control uppercase item1"  name="item_name1[]" id="item_name1_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" selected disabled>Select</option><?php foreach($item as $row){if($row['i_category'] == 1){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'] ?></option><?php } }?></select>
                                          </span>
												<span class="probes1" style="display:none">	<select style="display:none" class="selectpicker form-control uppercase item2"  name="item_name2[]" id="item_name2_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><?php foreach($item as $row){if($row['i_category'] == 2){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'] ?></option><?php }} ?></select></span>
                                                
                                                <span class="probes11" style="display:none">	<select style="display:none" class="selectpicker form-control uppercase item3"  name="item_name3[]" id="item_name3_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" selected disabled>Select</option><?php foreach($item as $row){if($row['i_category'] == 5){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'] ?></option><?php }} ?></select></span>
												</td>
								                
												<?php /*?><td><input type="text" class="form-control uppercase"  name="model_no[]" id="model_no1" required></td><?php */?>
                                                <td><input type="text"  class="form-control uppercase ids" name="ids[]" id="ids1" ></td>
												<td><input type="text"  class="form-control uppercase serial_no" name="seriel_no[]" id="seriel_no1" ></td>
                                                <td><input type="text"  class="form-control uppercase descr" name="descr[]" id="descr1" ></td>
                                                <td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="vat[]" id="vat_1"  onchange="gtotal1();"  required  readonly/></td>
												 <td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate[]" id="purrate1" onchange="totalamt(1);"  required/></td>
                                               
                                                <td><input min="0"  type="text" class="form-control uppercase groupOfTexbox" name="qty[]" id="qty1" onchange="totalamt(1); "   required/>
                    </td>
                    <td><input min="0"  type="text" step="any" class="form-control uppercase" name="per_taxamt[]" id="per_taxamt1"  required readonly/></td>
                    <td><input min="0"  type="text" step="any" class="form-control uppercase" name="total[]" id="total1"   readonly/></td>
												
											</tr>
											
										</tbody>
                                        </table>
										<table class="table" width="100%" >
                                            <thead>
                                            <tr style="display:none" class="installation">
                                                <td colspan="9" width="70%"></td>
                                                <td style="font-weight:bold;">Installation Charges</td>
                                                <td style="font-weight:bold;" width="15%"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="adcharges"  value="0.00"  style="color:#000"  id="instcharges" onchange="totalamt(1); "></td>
                                            </tr>
                                             <tr style="display:none" class="delivery">
                                                <td colspan="9" width="70%"></td>
                                                <td style="font-weight:bold;">Delivery Charges</td>
                                                <td style="font-weight:bold;" width="15%"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="addelivery" value="0.00"   style="color:#000"  id="delivery" onchange="totalamt(1); "></td>
                                            </tr>
                                            <tr style="display:none" class="freight">
                                                <td colspan="9" width="70%"></td>
                                                <td style="font-weight:bold;">Freight Charges</td>
                                                <td style="font-weight:bold;" width="15%"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="freight" value="0.00"   style="color:#000"  id="freight" onchange="totalamt(1); "></td>
                                            </tr>
                                            <tr style="display:none" class="serivcetax">
                                                <td colspan="9" width="70%"></td>
                                                <td style="font-weight:bold;">Serivcetax</td>
                                                <td style="font-weight:bold;" width="15%"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="serivcetax" value="0.00"   style="color:#000"   id="serivcetax" readonly onchange="totalamt(1); "></td>
                                            </tr>
                                            <tr style="display:none" class="serivcetax">
                                                <td colspan="9" width="70%"></td>
                                                <td style="font-weight:bold;">Serivcetax Charges</td>
                                                <td style="font-weight:bold;" width="15%"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="serivcetax_amt"   value="0.00" style="color:#000"   id="serivcetax_amt" readonly onchange="gtotal1();"></td>
                                            </tr>
                                            <tr style="display:none" class="commissioning">
                                                <td colspan="9" width="70%"></td>
                                                <td style="font-weight:bold;">Commissioning Charges</td>
                                                <td style="font-weight:bold;" width="15%"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="commissioning"  value="0.00"  style="color:#000"  id="commissioning" onchange="totalamt(1); "></td>
                                            </tr>
                                           <tr>
                                                <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
                                                <td style="font-weight:bold;" width="12%">Total</td>
                                                <td style="font-weight:bold;" ><input type="text" class="form-control" name="stotal" style="color:#000" readonly id="stotal"></td>
                                            </tr>
                                            <tr>
            <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="12%">Discount</td>
            
            
            <td style="font-weight:bold;" ><input type="text" min="0" step="any" class="form-control groupOfTexbox"  name="discount" style="color:#000"  value="0.00" id="discount" onchange="totalamt(1); "></td>
        </tr>
        <tr>
             <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="12%">Tax Amount</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" name="taxamount" style="color:#000" readonly id="taxamount"></td>
        </tr>
        <tr>
            <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="12%">Grand Total</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" readonly name="gtotal" style="color:#000" id="gtotal"></td>
        </tr>
         
									</thead>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

							<input type="hidden" name="testno" id="testno" value="2">
							<input type="hidden" name="extratax" id="extratax" value="">
							     <div class="panel-footer">                            
                                    <button class="btn btn-primary pull-left" type="button" style="margin-bottom:20px;" onclick="fnadd()">Add More</button>
                                    <button class="btn btn-warning pull-left" type="button" style="margin-bottom:20px;margin-left:10px;" onclick="fnremove()">Remove</button>  
                                  <button class="btn btn-primary pull-right submit" id="submit" type="submit" style="margin-bottom:20px;">Submit</button>
									
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
function fnadd() {
		var a=$("#testno").val();
		num=parseInt(a) + 1;
		$("#testno").val(num);
		
		$("#testid").append('<tr><td ><select class="selectpicker form-control uppercase bs-select-hidden payment_method2" name="payment_method[]" required id="payment_method_'+a+'" ><option value="" selected disabled>Select</option><option value="1">Laptop</option><option value="2">Moblie</option><option value="5">Accessories</option></select></td>'
		+'<td><span class="probs'+a+'"><select  class="selectpicker form-control uppercase item1"  name="item_name1[]" id="item_name1_'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" selected disabled>Select</option><?php foreach($item as $row){if($row['i_category'] ==1){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'] ?></option><?php }} ?></select></span><span class="probes'+a+'" style="display:none"><select style="display:none" class="selectpicker form-control uppercase item2"  name="item_name2[]" id="item_name2_'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" selected disabled>Select</option><?php foreach($item as $row){if($row['i_category'] ==2){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'] ?></option><?php }} ?></select></span><span class="probes1'+a+'" style="display:none"><select style="display:none" class="selectpicker form-control uppercase item3"  name="item_name3[]" id="item_name3_'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><?php foreach($item as $row){if($row['i_category'] ==5){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'] ?></option><?php }} ?></select></span></td>'
		+'<td><input type="text" class="form-control  " name="ids[]" id="ids'+a+'" ></td><td><input type="text" class="form-control uppercase serial_no"  name="seriel_no[]" id="seriel_no'+a+'" ></td>'
		+'<td><input type="text" class="form-control uppercase descr"  name="descr[]" id="descr'+a+'" ></td>'
		+'<td ><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="vat[]" id="vat_'+a+'" onchange="gtotal1();"   readonly/></td>'
		+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+'); "  required/></td>'
				+'<td><input min="1"  type="text" class="form-control uppercase groupOfTexbox" name="qty[]" id="qty'+a+'"  onblur="totalamt('+a+'); " required /></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase" name="per_taxamt[]" id="per_taxamt'+a+'" required readonly/></td>'
				+''
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase" name="total[]" id="total'+a+'"  readonly/></td></tr>');
			
			$(".selectpicker").selectpicker('refresh');
			$(".groupOfTexbox").keypress(function (event) {
		 			  		return isNumber(event, this)
						}); 
	}
	
	
	function fnremove() {
		var a=$("#testno").val();
		if(a>=3){
			num=parseInt(a) - 1;
			$("#testno").val(num);
			$('#mytable tr:eq('+num+')').remove();
		}
	} 
	
	
	/*$(document).on('change','.probs',function()
	{ 
		var id=$(this).attr('id');
		id = id.split('_');
		id = id[2];
		var vals = $(this).val();
		valss = vals.split('~');
		$('#price'+id).val(valss[1]); 
	});
*/
	function totalamt(item){
		//alert('to');
        var purrate=parseFloat($('#purrate'+item).val());
        //var purtax=$('#purtax'+item).val();
        var qty=parseFloat($('#qty'+item).val());
        var vat=parseFloat($('#vat_'+item).val());
        if(!isNaN(purrate) && !isNaN(qty) && qty!=0){
        //	var tax=(parseFloat(purrate)/100)*parseFloat(purtax);
        //	var total=(parseFloat(purrate)+parseFloat(tax))*parseFloat(qty);					
                var total=(parseFloat(purrate))*parseFloat(qty);
				var taxamt  = parseFloat(( purrate * parseFloat(vat))/100);
				if(isNaN(total)){ } else {
                    $("#total"+item).val(total);
					$("#per_taxamt"+item).val(taxamt);
                    gtotal1();
                }
        }else{
                $("#total"+item).val("");
				$("#per_taxamt"+item).val("");
        }


    }

    function gtotal1(){
        var a=$("#testno").val();
        a=a-1;
        var gt=0;
        for(i=1;i<=a;i++){
                var total=$('#total'+i).val();
				var vat = parseFloat($('#vat_'+i).val());
			    var gt=parseFloat(gt)+parseFloat(total);
        }
		 //var ins_amt = parseFloat($("#insurance_amt").val());
		
        var adcharges = parseFloat($("#instcharges").val());
		//alert(adcharges);
		//insurance = $('#serivcetax').val();
		var customduty = parseFloat($('#commissioning').val());
		var transaction = parseFloat($('#freight').val());
        var discount = parseFloat($("#delivery").val());
		 var realdiscount = parseFloat($("#discount").val());
		//var taxamt  = parseFloat(( gt * parseFloat(vat))/100);
		var servicetax = parseFloat($('#serivcetax').val());
		var ser_taxamt  = parseFloat(( adcharges * parseFloat(servicetax))/100);
		if(isNaN(ser_taxamt))
			{ 
				ser_taxamt = 0; $("#serivcetax_amt").val('');
				
			}
			else
			{
		        $("#serivcetax_amt").val(ser_taxamt);
			}
		//brokerage = $('#brokerage').val();
		//if(brokerage=='')
		//{
		//	brokerage = 0;
		//}
        //var stotal = gt + parseFloat(adcharges) - parseFloat(discount)+parseFloat(insurance)+parseFloat(transaction)+parseFloat(customduty);
		var stotal = gt+adcharges+discount+customduty+transaction;
      //alert(stotal);
		if(stotal == '')
			{
				stotal = '00.00';
			}
        
        if(stotal!=''){
            $("#stotal").val(stotal);
           //alert(vat)
			if(vat=='')
			{
				vat = 0;
			}
			else if(isNaN(vat)) 
			{
				vat = 0 ;  
			}
			var taxamt  = parseFloat(( gt * parseFloat(vat))/100);
			
			if(isNaN(taxamt))
			{ 
				taxamt = 0; $("#taxamount").val('');
				
			}
			else
			{
				$("#taxamount").val(taxamt);
				
				gtotal = parseFloat(stotal + taxamt+ser_taxamt-realdiscount);
				
				if(isNaN(gtotal))
					$("#gtotal").val('');
				else
					//$("#gtotal").val(gtotal);
					$("#gtotal").val(parseFloat(gtotal).toFixed(2));
					
			}
            




        }else{
            $("#stotal").val('00.00');
            $("#taxamount").val('00.00');
			$("#serivcetax_amt").val('00.00');
            $("#gtotal").val('00.00');
        }
    }
	
$('#cus_code').on('change',function()
{
	var cus = $(this).val();
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Sales/get_cus_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				$('#cus_det').html(result);
			}
		});
	}
});


function customerDetails(id) {
		$.ajax({
			url:"<?php echo base_url('index.php/Sales/ajaxgetCustomer')?>",
			type: "post",
			data: { id: id },
			success: function(data) {
				var json = JSON.parse(data);
				$("#cus_name").val(json[0].customer_name);
				$("#address1").val(json[0].area_name+','+json[0].city_name);
				$("#address2").val(json[0].pincode+','+json[0].state_name+','+json[0].country_name);
			}
		});
	}


 $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
 $(document).on('change','.payment_method',function()
{
	var this_vals = $(this).val();
	var this_val = $(this).attr('id');
	this_val = this_val.split('_');
	id = this_val[2];
	//alert(this_val)
	if(this_vals==1)
	{
		$('.probs'+id).show();
		$('.probes'+id).hide();
		$('.probes1'+id).hide();
		/*$('.serial').show();
		$('.serial_no').show();
		$('.ime').hide();
		$('.ime_no').hide();*/
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det1');?>',
			type:'POST',
			data:{cus:this_vals},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#vat_'+id).val(obj.vat);
					$('#serivcetax').val(obj.service_tax);
			}
		});
		
		
		
	}
	else if(this_vals==2)
	{
		$('.probs'+id).hide();
		$('.probes'+id).show();
		$('.probes1'+id).hide();
		/*$('.serial').hide();
		$('.serial_no').hide();
		$('.ime').show();
		$('.ime_no').show();*/
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det1');?>',
			type:'POST',
			data:{cus:this_vals},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#vat_'+id).val(obj.vat);
					$('#serivcetax').val(obj.service_tax);
			}
		});
		
		
	}
	else if(this_vals==5)
	{
		$('.probs'+id).hide();
		$('.probes'+id).hide();
		$('.probes1'+id).show();
		/*$('.serial').hide();
		$('.serial_no').hide();
		$('.ime').show();
		$('.ime_no').show();*/
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det1');?>',
			type:'POST',
			data:{cus:this_vals},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#vat_'+id).val(obj.vat);
					$('#serivcetax').val(obj.service_tax);
			}
		});
		
		
	}
	
});
$(document).on('change','.payment_method2',function()
{
	var this_vals = $(this).val();
	var this_val = $(this).attr('id');
	this_val = this_val.split('_');
	id = this_val[2];
   //alert(this_val);
	if(this_vals==1)
	{
		
		
		$('.probs'+id).show();
		$('.probes'+id).hide();
		$('.probes1'+id).hide();
		/*$('.serial').show();
		$('.serial_no').show();
		$('.ime').hide();
		$('.ime_no').hide();*/
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det1');?>',
			type:'POST',
			data:{cus:this_vals},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#vat_'+id).val(obj.vat);
					$('#serivcetax').val(obj.service_tax);
			}
		});
		
	}
	else if(this_vals==2)
	{
		
		
		$('.probs'+id).hide();
		$('.probes'+id).show();
		$('.probes1'+id).hide();
		/*$('.serial').hide();
		$('.serial_no').hide();
		$('.ime').show();
		$('.ime_no').show();*/
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det1');?>',
			type:'POST',
			data:{cus:this_vals},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#vat_'+id).val(obj.vat);
					$('#serivcetax').val(obj.service_tax);
			}
		});
	}
	else if(this_vals==5)
	{
		$('.probs'+id).hide();
		$('.probes'+id).hide();
		$('.probes1'+id).show();
		/*$('.serial').hide();
		$('.serial_no').hide();
		$('.ime').show();
		$('.ime_no').show();*/
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det1');?>',
			type:'POST',
			data:{cus:this_vals},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#vat_'+id).val(obj.vat);
					$('#serivcetax').val(obj.service_tax);
			}
		});
		
		
	}
	
});
$('#expenses').on('change',function()

{
	var this_val = $(this).val();
	var selectedValues = $('#expenses').val();
	//alert(this_val);
	if(this_val==1)
	{
		$('.installation').show();
		$('.serivcetax').show();
		$('.delivery').hide();
		$('.freight').hide();
		$('.commissioning').hide();
		
	}
	else if(this_val==2)
	{
		$('.installation').hide();
		$('.delivery').show();
		$('.serivcetax').hide();
		$('.freight').hide();
		$('.commissioning').hide();
		
	}
	else if(this_val==3)
	{
		$('.installation').hide();
		$('.freight').show();
		$('.delivery').hide();
		$('.serivcetax').hide();
		$('.commissioning').hide();
	}
	else if(this_val==4)
	{
		$('.installation').hide();
		$('.commissioning').show();
		$('.serivcetax').show();
		$('.delivery').hide();
		$('.freight').hide();
		
	}
	
	else if((this_val==selectedValues))
	{
		
		$('.installation').hide();
		$('.freight').hide();
		$('.delivery').hide();
		$('.serivcetax').hide();
		$('.commissioning').hide();
		
		
	}
	else 
	{
		$('.installation').show();
		$('.delivery').show();
		$('.commissioning').show();
		$('.freight').show();
		$('.serivcetax').show();
	}
	
});
$(document).on('change','.item1',function()
{
		var cus = $(this).val();
		var id= $(this).attr('id');
		//alert(id);exit;
		sid = id.split('_');
		id = sid[2];
	   //alert(id);
	 // return false;
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Sales/get_all_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#seriel_no'+id).val(obj.serial);
					$('#descr'+id).val(obj.descr);
					$('#ids'+id).val(obj.ids);
					
					
			}
		});
	}
});
$(document).on('change','.item2',function()
{
		var cus = $(this).val();
		var id= $(this).attr('id');
		//alert(id);exit;
		sid = id.split('_');
		id = sid[2];
	 // alert(id);
	  //return false;
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Sales/get_all_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#seriel_no'+id).val(obj.serial);
					$('#descr'+id).val(obj.descr);
					$('#ids'+id).val(obj.ids);
					
			}
		});
	}
});
</script>
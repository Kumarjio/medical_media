<?php $session_data = $this->session->all_userdata();?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
<?php
if(isset($inps['id']) && !empty($inps))
{
     $id = $inps['id'];
	
}
else
{
	$id = '';
	
	
}
?>
    <link type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet" />

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Purchase Entry</h2>
                </div>
                <!-- END PAGE TITLE --> 
                               
                
                <!-- PAGE CONTENT WRAPPER -->
               <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Purchase/addPurchaseEntry');?>" method="post" onSubmit="return submitTest()">

                <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><a href="<?php echo base_url('index.php/Purchase/');?>"><span>Add Entry</span></a>&nbsp;&nbsp;&nbsp;</h3>
                               
<div class="panel-body">                                                                        
                                    
<div class="row">
<div class="col-md-6">

  
    <?php /*?><div class="form-group">
        <label class="col-md-4 control-label">Vendor Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
            <?php /*?><select class="selectpicker form-control uppercase"    name="vname" id="vname"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    <option value="" disabled selected> SELECT </option>
                    <?php ?>	<?php foreach($seller as $row){ ?>	
                                    <option value="<?php echo $row->cid; ?>"><?php echo $row->seller_name; ?></option>
                            <?php } ?><?php ?>
                            </select>
            <div class="error" ><?php echo form_error('vname'); ?></div>                                       
        </div>
    </div><?php */?>
    
                                 
     <div class="form-group">                                        
        <label class="col-md-5 control-label">Date of Purchase Inward</label>
        <div class="col-md-7">
            <input type="text" class="form-control datepicker uppercase" readonly required placeholder="Enter Date of Purchase" name="pdate" id="pdate" value="<?php echo date("Y-m-d");  ?>">
            <div class="error" ><?php echo form_error('pdate'); ?></div>                                               
        </div>
    </div>
      <div class="form-group">                                        
        <label class="col-md-5 control-label">Vendor Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-7">
            <input type="text" name="vname" id="vname_1" readonly  class="form-control  " required  >
            <div class="error" ><?php echo form_error('vinvno'); ?></div>                                               
        </div>
       
    </div>
    <div class="form-group">                                        
        <label class="col-md-5 control-label">Supplier Invoice No<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-7">
            <input type="text"   class="form-control uppercase " required placeholder="Enter Supplier Invoice No"  name="vinvno" id="vinvno" value="<?php echo set_value('vinvno');  ?>">
            <div class="error" ><?php echo form_error('vinvno'); ?></div>                                               
        </div>
    </div>
    
</div>
<div class="col-md-6">
 
   
 
    <div class="form-group lap" style="display:none">
        <label class="col-md-4 control-label">VAT</label>  
        <div class="col-md-8">
        <input type="text" class="form-control uppercase groupOfTexbox" readonly name="vat" id="vat"   required/>
        <?php /*?><?php foreach($vat as $row){ if($row->product_type == 1) {?>
            <input type="text" class="form-control groupOfTexbox" readonly placeholder="Enter VAT" name="vat" id="vat" onchange="gtotal1();"  value="<?php echo $row->vat;  ?>" />
            <?php }}?><?php */?>
          <div class="error" ><?php echo form_error('vat'); ?></div>
        </div>
    </div>
    
    
    
    <div class="form-group mob" style="display:none">
        <label class="col-md-4 control-label">VAT</label>  
        <div class="col-md-8">
         <?php foreach($vat as $row){ if($row->product_type == 2) {?>
            <input type="text" class="form-control groupOfTexbox" readonly placeholder="Enter VAT" name="vat" id="vat" onchange="gtotal1();"  value="<?php echo $row->vat;  ?>" />
            <?php }}?>
          <div class="error" ><?php echo form_error('vat'); ?></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Remarks</label>  
        <div class="col-md-8">
            <input type="text" class="form-control uppercase" placeholder="Enter Remarks" name="remarks" id="phone1" value="<?php echo set_value('remarks');  ?>"/>
          <div class="error" ><?php echo form_error('remarks'); ?></div>	
        </div>
    </div>
   <div class="form-group">
        <label class="col-md-4 control-label">Storage Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
        <input type="text" class="form-control" placeholder="Enter storage" readonly name="storage" id="storage" value="<?php echo $session_data['location']; ?>"/>
           <?php /*?><input type="text" class="form-control groupOfTexbox"  placeholder="Enter storage Name" name="storage" id="storage"  /><?php */?> </div>
    </div>
    <div class="form-group">                                        
        <label class="col-md-4 control-label">Supplier Invoice Date</label>
        <div class="col-md-8">
            <input type="text" class="form-control datepicker uppercase" readonly required placeholder="Enter Supplier Invoice Date" name="pdate1" id="pdate1" value="<?php echo date("d-m-Y");  ?>">
            <div class="error" ><?php echo form_error('pdate'); ?></div>                                               
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
                            <div class="panel panel-default">
                          
                                <div class="panel-body" style="width:auto">
                                    <div class="table-responsive">
                                        <table class="table" id="mytable" >
                                            <thead>
                                                <tr>
                                                <th width="15%">PO NO</th>
                                                <th width="15%">Product Type</th>
                                                    <th width="15%">Product</th>
                                                    <th width="5%">Req Qty</th>
                                                     <th width="15%">VAT</th>
                                                    <th width="15%">Pur.Rate</th>
                                                     <th width="55%">IME/Serial</th>
                                                   <th width="15%">Rec Qty</th>
                                                   <th width="15%">Total</th>
                                                    <th width="15%">Tax amt</th>
                                                    
                                                    
                                                </tr>
											</thead>
        <tbody id="testid">

            <tr >
           
            <?php /*?> <td >
                                              <select class="selectpicker form-control uppercase bs-select-hidden payment_method" name="payment_method[]" id="payment_method_1" required >
                                              <option value="1">Laptop</option>
                                               <option value="2">Mobile</option>
                                              
                                               </select>
                                               </td>
                                               
                                               <td>
                                          <span class="probs1">       <select  class="selectpicker form-control uppercase"  name="item_name1[]" id="item_name1_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><?php foreach($item as $row){ if($row->i_category == 1) {?><option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name ?></option><?php }} ?></select>
                                          </span>
												<span class="probes1" style="display:none">	<select style="display:none" class="selectpicker form-control uppercase"  name="item_name2[]" id="item_name2_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><?php foreach($item as $row){ if($row->i_category == 2) {?><option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name ?></option><?php }} ?></select></span>
												</td><?php */?>
                                                <td>
                                                <!--  <div class="form-group">
       <label class="col-md-4 control-label">PO No.<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">  --> 
                                  <?php $cusdt =  $this->db->select('*')->get('tbl_purchase_request')->result_array(); ?>
                            	
                                                        <select id="pono1_1" name="pono[]" class="form-control selectpicker pono"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                        <option value='' selected disabled>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option  value="<?=$det['id']?>"><?='PO000'.$det['pur_req_id']?> </option>
                                                        <?php } ?>	
														    </select> 
                                                    
                                        </td>
                                        
                                        
                                       
                                                <td>
                                                <input  class="form-control uppercase" readonly name="pro_type[]" id="pro_type_1"   required/>
                                                </td>
                                                <td>
                                                <input class="form-control uppercase" readonly name="pro_name[]" id="pro_name_1" value=""  required/>
                                                </td>
                                               
                  
                      <td><input min="0"  type="text" style="width:75%" step="any" class="form-control uppercase groupOfTexbox" readonly name="req_qty[]" id="req_qty_1"   required/></td>
                      <td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" readonly name="vat[]" id="vat_1"  onchange="gtotal1();" required/></td>
                    <td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox"  name="purrate[]" id="purrate_1" onchange="totalamt(1); " style="width:100%"  required/></td>
                   <td><input   type="text"  style="width:110%" class="form-control" name="ime_serial[]" id="ime_serial1"  required /></td>
                    <td><input min="0"  type="text" required style="width:100%" class="form-control uppercase groupOfTexbox" name="qty[]" id="qty1" onchange="totalamt(1); "   required/>
                    </td>
                    <td><input min="0"  type="text" step="any" style="width:155%" class="form-control uppercase" name="total[]" id="total1"  required readonly/></td>
                    <td><input min="0"  type="text" step="any" style="width:185%" class="form-control uppercase" name="per_taxamt[]" id="per_taxamt1"  required readonly/></td>
                    
                     <td>
                                                <input  class="form-control uppercase" style="display:none;" readonly name="proid[]" id="proid_1"  value="" />
                                                </td>
                                                 <td>
                                                <input  class="form-control uppercase" style="display:none;" readonly name="cdays[]" id="cdays_1"  value="" />
                                                </td>
            </tr>

        </tbody>
                                        </table><br>
<br>
<br>

                                        <table class="table" width="100%">
    <thead>
        <!--<tr>
            <td colspan="9" width="70%"></td>
            <td style="font-weight:bold;">Additional Charges</td>
            <td style="font-weight:bold;" width="15%"><input type="text" class="form-control groupOfTexbox" name="adcharges"   value="0.00" style="color:#000"  id="adcharges" onchange="totalamt(1); "></td>
        </tr>
        <tr>
            <td colspan="9" ></td>
            <td style="font-weight:bold;">Discount</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control groupOfTexbox" name="discount" style="color:#000"   onchange="totalamt(1); "  id="discount" value="0.00"></td>
        </tr>
        <tr>
            <td colspan="9" ></td>
            <td style="font-weight:bold;">Insurance</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control groupOfTexbox" name="insurance" value="0.00" style="color:#000"   id="insurance"  onchange="gtotal1();"></td>
        </tr>
        <tr>
            <td colspan="9" ></td>
            <td style="font-weight:bold;">Shortage Qty</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control groupOfTexbox" name="short" value="" style="color:#000"   id="trans_charge"  ></td>
        </tr>
        <tr>
            <td colspan="9" ></td>
            <td style="font-weight:bold;">Damage Qty</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control groupOfTexbox" name="damage" value="" style="color:#000"   id="customduty"  ></td>
        </tr>-->
        <tr>
            <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="12%">Total</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" name="stotal" style="color:#000" readonly id="stotal"></td>
        </tr>
        <tr>
            <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="12%">Freight Charges</td>
            
            
            <td style="font-weight:bold;" ><input type="text" min="0" step="any" class="form-control groupOfTexbox"  name="freight" style="color:#000"  value="0.00" id="freight" onchange="totalamt(1); "></td>
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
        
                                </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

							<input type="hidden" name="testno" id="testno" value="2"  />
							<input type="hidden" name="extratax" id="extratax" value="" />
							     <div class="panel-footer">                            
                                    <button class="btn btn-primary pull-left" type="button" style="margin-bottom:20px;" onclick="fnadd()">Add More</button>
                                    <button class="btn btn-warning pull-left" type="button" style="margin-bottom:20px;margin-left:10px;" onclick="fnremove()">Remove</button>                                    
                                    <button class="btn btn-primary pull-right" type="submit"  style="margin-bottom:20px;" >Submit</button>
									
                                </div>
                                
                                
                          
						  
                        </div>
                  

					   </div>
					
					</form>
					</div>
                


                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
		

					
					
					
					<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
     
	 
	 <div class="col-md-3">Rate</div> <div class="col-md-3"><input value="0" min="1" type="text" class="form-control uppercase groupOfTexbox" step="any"  name="rate" id="rate" /></div>						
						<div class="col-md-3">MRP</div> <div class="col-md-3"><input min="1" value="62" type="text" class="form-control uppercase groupOfTexbox" step="any" name="mrp" id="mrp" /></div>
						<div class="col-md-12"><br></div>
						<div class="col-md-3">Qty</div> <div class="col-md-3"><input value="1" min="1" type="text" class="form-control uppercase"  readonly name="qty" id="qty" /></div>
						<div class="col-md-3">Taxon MRP</div> <div class="col-md-3"><input min="1" value="65" type="text" class="form-control uppercase groupOfTexbox" name="taxmrp" step="any" id="taxmrp" /></div>
						<div class="col-md-12"><br></div>
						<div class="col-md-3">Cenvat %</div> <div class="col-md-3"><input  min="0" value="0.00" type="text" class="form-control uppercase groupOfTexbox" name="cenper" step="any" id="cenper" /></div>
						<div class="col-md-3">Cenvat Val</div> <div class="col-md-3"><input min="0" value="0" type="text" class="form-control uppercase" name="cenval" step="any" id="cenval" readonly /></div>
						<div class="col-md-12"><br></div>
						<div class="col-md-3">Edu.Cess</div> <div class="col-md-3"><input min="0" value="0.00" type="text" class="form-control uppercase groupOfTexbox" name="edcess" step="any" id="edcess" /></div>
						<div class="col-md-3">Ed.cs Val</div> <div class="col-md-3"><input min="0" value="0" type="text" class="form-control uppercase" name="edval" step="any" id="edval" readonly/></div>
						<div class="col-md-12"><br></div>
						<div class="col-md-3">Sec.Edcs</div> <div class="col-md-3"><input min="0" value="0.00" type="text" class="form-control uppercase groupOfTexbox" name="seced" step="any" id="seced" /></div>
						<div class="col-md-3">Sec.Ed Val</div> <div class="col-md-3"><input min="0" value="0" type="text" class="form-control uppercase" name="secedval" step="any" id="secedval" readonly/></div>
						<div class="col-md-12"><br></div>
						<div class="col-md-5"></div><div class="col-md-7"><button class="btn btn-primary" data-dismiss="modal"  id="taxaddremove">Add</button></div>
						<div class="col-md-12"><br></div>
						<div class="col-md-12"><h4>Previous Purchase Rates</h4></div>
						<div class="col-md-12"><ol  id="previouspurchase"></ol></div>
						
						
						
      </div>
      <div class="modal-footer">
       
<?php /*?>        <button type="button" class="btn btn-primary">Save changes</button>
<?php */?>      </div>
    </div>
  </div>
</div>


        <!-- END PAGE CONTAINER -->
          <?php $this->load->view('include_js'); ?>
		 
<script type="text/javascript">
document.addEventListener('keyup', doc_keyUp, false);

function doc_keyUp(e) {

//https://css-tricks.com/snippets/javascript/javascript-keycodes/ 
       if (e.keyCode == 119) {
               // call your function to do the thing
               fnadd();
       }
       if (e.keyCode == 120) {
               // call your function to do the thing

               fnremove();
       }
}
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
		$('.lap').show();
		$('.mob').hide();
		
	}
	else 
	{
		$('.probs'+id).hide();
		$('.probes'+id).show();
		$('.lap').hide();
		$('.mob').show();
	}
	
});
//Short menu navigation code//
$('#maintanance_str_date').on('change',function()
{
	var d = $(this).val();
	//alert(d)
	$.ajax(
	{
		url:"<?php echo base_url('index.php/Purchase/date_parse1');?>",
		type:'POST',
		data:{dt:d},
		success: function(result)
		{
			var obj = jQuery.parseJSON(result);
			$('#date1').val(obj.date0);
			$('#date2').val(obj.date1);
			$('#date3').val(obj.date2);
			$('#date4').val(obj.date3);
		}
	}
	);
});
function submitTest() {
       //check duplicate invoice no.
      // var isDup = checkdup( $('#vinvno').val());
      // if( isDup == 'Y')
      // {
           //alert('d');
      //     return false;
      // }
	  
	    for(i=1;i<=a;i++){
		var tax=$('#vat_'+i).val();
		//alert(tax);
	   }
	   
	   //alert('hi');
	   if(tax=='')
	   {
		   //$('#vat').val('0');
		   var a=$("#testno").val();
			a=a-1;
			var gt=0;
			for(i=1;i<=a;i++){
					var total=$('#total'+i).val();
					var vat=$('#vat_'+i).val();
					var gt=parseFloat(gt)+parseFloat(total);
			}
			//adcharges = $("#adcharges").val();
			//discount = $("#discount").val();
			//insurance = $('#insurance').val();
			//transaction = $('#trans_charge').val();
			//customduty = $('#customduty').val();
			//brokerage = $('#brokerage').val();
			
			//var stotal = gt + parseFloat(adcharges) - parseFloat(discount)+parseFloat(insurance)+parseFloat(transaction)+parseFloat(customduty)+parseFloat(brokerage);
			//alert(stotal);
			
			var stotal = gt;
			if(stotal!=''){
				$("#stotal").val((stotal));
				
				
				//var vat = parseFloat($("#vat").val());
				if(isNaN(vat)) { vat = 0 ; }
				else{
					var taxamt  = parseFloat(( gt * parseFloat(vat))/100);
					if(isNaN(taxamt)){ 
						taxamt = 0; $("#taxamount").val('');
					}
					else{
						$("#taxamount").val(taxamt);
						gtotal = parseFloat(stotal + taxamt);
						
						if(isNaN(gtotal))
							$("#gtotal").val('');
						else
							//$("#gtotal").val(gtotal);
							$("#gtotal").val(parseFloat(gtotal).toFixed(2));
							
					}
						
				}
				
	
			}
			else
			{
				$("#stotal").val('00.00');
				$("#taxamount").val('00.00');
				$("#gtotal").val('00.00');
			}
	   }

       //var ac_amount = $('#price').val();
       var gtotal = $('#gtotal').val();
                       //alert(ac_amount); 
       /*if(gtotal == ac_amount && ac_amount != '' && gtotal !='' ) {
	   /*if(ac_amount != '' && gtotal !='' ) 
	   {*/
           ///    return true;					
       //}
      // else {
           //    alert('Fill Price And Grand Total & these amount should be tally');return false;
      // }
}
        
$(document).ready(function(){
        //$('.x-navigation-minimize').trigger('click');	
        $('#price').change(function(){
                var ac_amount = $('#price').val();
                $('#price').val(parseFloat(ac_amount).toFixed(2));
        });



});

	  
	
	//Short menu navigation code//
	function fnadd() 
		{
			var supplier_id=$('#vname').val();
			//alert(supplier_id);
			//if(supplier_id != '') {					
				var a=$("#testno").val();
				num=parseInt(a) + 1;
				$("#testno").val(num);
				//alert('kaja');
				
				var inn=$("#pono1_1").html();
				$("#testid").append('<tr><td ><select class="selectpicker form-control uppercase pono2"  name="pono[]" id="pono1_'+a+'" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">'+inn+'</select></td>'
		+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="pro_type[]" id="pro_type_'+a+'"  readonly/></td></td>'
		+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="pro_name[]" id="pro_name_'+a+'"  readonly/></td></td>'
		+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="req_qty[]" id="req_qty_'+a+'"  readonly/></td>'
		+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="vat[]" id="vat_'+a+'" onchange="gtotal1();"   readonly/></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" style="width:100%" name="purrate[]" id="purrate_'+a+'" onblur="totalamt('+a+'); "  /></td>'
				+'<td><input type="text" class="form-control" style="width:110%" name="ime_serial[]" id="ime_serial'+a+'"/></td>'
				+'<td><input min="1"  type="text" class="form-control uppercase  groupOfTexbox" style="width:100%" name="qty[]" id="qty'+a+'"  onblur="totalamt('+a+'); "  /></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase" style="width:155%" name="total[]" id="total'+a+'" required readonly/></td>'
				+''
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase" style="width:185%" name="per_taxamt[]" id="per_taxamt'+a+'" required readonly/></td>'+'<td><input min="1" style="display:none;" value="" type="text" class="form-control uppercase groupOfTexbox" name="proid[]" id="proid_'+a+'"  /></td>'+'<td><input min="1" style="display:none;" value="" type="text" class="form-control uppercase groupOfTexbox" name="cdays[]" id="cdays_'+a+'"  /></td></tr>');
				
				$(".selectpicker").selectpicker('refresh');
				$(".groupOfTexbox").keypress(function (event) {
		 			   return isNumber(event, this)
				}); 
				
			/*}
			else {
				alert("Select Supplier");
			}*/
		}
		function fnremove() 
		{
			var a=$("#testno").val();
			if(a>=3){
				
				num=parseInt(a) - 1;
				$("#testno").val(num);
				$('#mytable tr:eq('+num+')').remove();
			}
		}		
		
		
		
		
    function totalamt(item){
        var purrate=parseFloat($('#purrate_'+item).val());
		//alert(purrate);
        //var purtax=$('#purtax'+item).val();
        var qty=parseFloat($('#qty'+item).val());
        var vat=parseFloat($('#vat_'+item).val());
        if(!isNaN(purrate) && !isNaN(qty) && qty!=0)
		{
        //	var tax=(parseFloat(purrate)/100)*parseFloat(purtax);
        //	var total=(parseFloat(purrate)+parseFloat(tax))*parseFloat(qty);					
                var total=(parseFloat(purrate))*parseFloat(qty);
				var taxamt  = parseFloat(( purrate * parseFloat(vat))/100);
				if(isNaN(total))
				{
			    } 
				else
			    {
                    $("#total"+item).val(total);
					$("#per_taxamt"+item).val(taxamt);
					
					gtotal1();
					
			    }
		}
			else
			{
					$("#total"+item).val("");
					$("#per_taxamt"+item).val("");
			}


    }

    function gtotal1(){
        var a=$("#testno").val();
        a=a-1;
        var gt=0;
		var gt1=0;
        for(i=1;i<=a;i++){
                var total=$('#total'+i).val();
			    var pertax=$('#per_taxamt'+i).val();
				//var vat = parseFloat($('#vat_'+i).val());
				//alert(pertax);
                var gt=parseFloat(gt)+parseFloat(total);
				var gt1=parseFloat(gt1)+parseFloat(pertax);
				//alert(gt1);return false;
        }
		 var freight = parseFloat($("#freight").val());
		//alert(vat);
       // adcharges = $("#adcharges").val();
       // discount = $("#discount").val();
		//insurance = $('#insurance').val();
		//transaction = $('#trans_charge').val();
		//customduty = $('#customduty').val();
		//brokerage = $('#brokerage').val();
		//if(brokerage=='')
		//{
		//	brokerage = 0;
		//}
        //var stotal = gt + parseFloat(adcharges) - parseFloat(discount)+parseFloat(insurance)+parseFloat(transaction)+parseFloat(customduty);
		var stotal = gt;
		//alert(stotal);
		var stotaltax = gt1;
		//alert(stotaltax);
        //alert(stotal);
		if(stotal == '')
			{
				stotal = '00.00';
				//stotaltax = '00.00';
			}
        /*if(stotaltax == '')
			{
				stotaltax = '00.00';
			}*/
        if(stotal!='')
		{
         $("#stotal").val(stotal);
		}
		
        
        if(stotaltax!='')
		{
			$("#taxamount").val(parseFloat(stotaltax).toFixed(2));
       // $("#taxamount").val(stotaltax);
		gtotal = parseFloat(stotal+stotaltax+freight);
				
				if(isNaN(gtotal))
					$("#gtotal").val('');
				else
					//$("#gtotal").val(gtotal);
					$("#gtotal").val(parseFloat(gtotal).toFixed(2));
		
			
			/*if(vat=='')
			{
				vat = 0;
			}
			else if(isNaN(vat)) 
			{
				vat = 0 ;  
			}
			var taxamt  = parseFloat(( gt * parseFloat(vat))/100);*/
			/*if(isNaN(taxamt))
			{ 
				taxamt = 0; $("#taxamount").val('');
				
			}*/
			/*else
			{
			*/	//var taxamt = parseFloat($("#taxamt").val());
				
					
			//}
            




        }
		else
		{
            $("#stotal").val('00.00');
            $("#taxamount").val('00.00');
            $("#gtotal").val('00.00');
        }
    }
                
		
		
			
$('#myModal').on('shown.bs.modal', function (){
  $('#myInput').focus()
});
		
	
</script>
<script type="text/javascript">
/*function checkdup(invno){
        //alert('dupcheck');
    //Previous Purchase rates
    $.ajax({
                 url: "<?php echo base_url('index.php/Purchase/checkdupinvoice/')?>",
                 type: "post",
                 data : { invno: invno},
                 success: function(data){
                         if(data == 'Y'){
                             alert('Invoice No already exist.-'+invno);
                             $('#vinvno').focus();
                             return false;
                         }
//                         var retval = data+ ' xx';
                          //$('#vinvno').val(retval);
                 }
    });
}*/
$(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  

$(document).on('change','.pono',function()
{
		var cus = $(this).val();
		var id= $(this).attr('id');
		//alert(id);exit;
		sid = id.split('_');
		id = sid[1];
	  // alert(id);
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#pro_type_'+id).val(obj.protype);
					$('#vname_'+id).val(obj.vname);
					$('#req_qty_'+id).val(obj.qty);
					$('#pro_name_'+id).val(obj.proid);
					$('#purrate_'+id).val(obj.rate);
					$('#proid_'+id).val(obj.pro_id);
					$('#vat_'+id).val(obj.vat);
					$('#cdays_'+id).val(obj.cdays);
					
			}
		});
	}
});
$(document).on('change','.pono2',function()
{
		var cus = $(this).val();
		var id= $(this).attr('id');
		//alert(id);exit;
		sid = id.split('_');
		id = sid[1];
	  // alert(id);
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_all_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
					$('#pro_type_'+id).val(obj.protype);
					$('#vname_'+id).val(obj.vname);
					$('#req_qty_'+id).val(obj.qty);
					$('#pro_name_'+id).val(obj.proid);
					$('#purrate_'+id).val(obj.rate);
					$('#proid_'+id).val(obj.pro_id);
					$('#vat_'+id).val(obj.vat);
					$('#cdays_'+id).val(obj.cdays);
					
			}
		});
	}
});


</script>
	 
</body>
</html>
   



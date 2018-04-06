<?php $session_data = $this->session->all_userdata();?>

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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Purchase Request Entry</h2>
                </div>
                <!-- END PAGE TITLE --> 
                               
                
                <!-- PAGE CONTENT WRAPPER -->
               <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Pos_orders/addPurchaseEntry');?>" method="post" onSubmit="return submitTest()">

                <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><a href="<?php echo base_url('index.php/Purchase/');?>"><span>Add Entry</span></a>&nbsp;&nbsp;&nbsp;</h3>
                               
<div class="panel-body">                                                                        
                                    
<div class="row">
<div class="col-md-6">

   <!-- <div class="form-group">
        <label class="col-md-4 control-label">Purchase Type<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">                                            
            <select class="selectpicker form-control uppercase" name="purchase_type"    id="purchase_type" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" >
                <option value=""  selected > SELECT </option>
                <option value="2"   >Self</option>
                <option value="1"   >Vendor</option>
                <option value="3"   >Agent</option>
                <option value="4"   >Auction</option>
            </select>
            <div class="error" ><?php echo form_error('purchase_type'); ?></div>                                       
        </div>
    </div>-->
    <div class="form-group">
        <label class="col-md-4 control-label">Vendor Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
            <select class="selectpicker form-control uppercase"    name="vname" id="vname" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    <option value="" disabled selected> SELECT </option>
                    <?php ?>	<?php foreach($seller as $row){ ?>	
                                    <option value="<?php echo $row->cid; ?>"><?php echo $row->seller_name; ?></option>
                            <?php } ?><?php ?>
                            </select>
            <div class="error" ><?php echo form_error('vname'); ?></div>                                       
        </div>
    </div>
    
    <!--<div class="form-group">
    <label class="col-md-4 control-label">Account</label>
    <div class="col-md-8">
   
        </select><div class="error" ><?php echo form_error('customer'); ?></div>                                       
    </div>
</div>-->
                                            
     <div class="form-group">                                        
        <label class="col-md-4 control-label">Date of Purchase</label>
        <div class="col-md-8">
            <input type="text" class="form-control datepicker uppercase" readonly  required placeholder="Enter Date of Purchase" name="pdate" id="pdate" value="<?php echo date("d-m-Y");  ?>">
            <div class="error" ><?php echo form_error('pdate'); ?></div>                                               
        </div>
    </div>
           
    

</div>
<div class="col-md-6">
  <?php /*?><div class="form-group maxqty" >
        <label class="col-md-4 control-label">Maximum Quantity</label>  
        <div class="col-md-8">
        <input type="number" class="form-control uppercase" placeholder="Enter Product Quantity" name="maxqty" id="maxqty" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Remarks</label>  
        <div class="col-md-8">
            <input type="text" class="form-control uppercase" placeholder="Enter Remarks" name="remarks" id="phone1" value="<?php echo set_value('remarks');  ?>"/>
          <div class="error" ><?php echo form_error('remarks'); ?></div>	
        </div>
    </div>
 
    <div class="form-group lap">
        <label class="col-md-4 control-label">Location</label>  
        <div class="col-md-8">
        <?php foreach($location as $row){ ?>
            <input type="text" class="form-control groupOfTexbox" readonly placeholder="Enter VAT" name="location" id="location"   value="<?php echo $row['location'];  ?>" />
            <?php }?>
          <div class="error" ><?php echo form_error('vat'); ?></div>
        </div>
    </div><?php */?>
    
    
    
    <?php /*?><div class="form-group mob" style="display:none">
        <label class="col-md-4 control-label">VAT</label>  
        <div class="col-md-8">
         <?php foreach($vat as $row){ if($row->product_type == 2) {?>
            <input type="text" class="form-control groupOfTexbox" readonly placeholder="Enter VAT" name="vat" id="vat" onchange="gtotal1();"  value="<?php echo $row->vat;  ?>" />
            <?php }}?>
          <div class="error" ><?php echo form_error('vat'); ?></div>
        </div>
    </div>
   <div class="form-group">
        <label class="col-md-4 control-label">Storage Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
           <input type="text" class="form-control groupOfTexbox" readonly placeholder="Enter VAT" name="storage" id="storage" value="<?php echo $session_data['location']; ?>" />
            <div class="error" ><?php echo form_error('vname'); ?></div>                                       
        </div>
    </div>
   <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 1<sup  style="color:#f00">*</sup></label>
                                                <div class="col-md-8">
                                              <input type="text" name="date1" placeholder="SELECT DATE 1" id="date1" class="form-control datepickerr"  /> 
                                                  <div class="error" ><?php echo form_error('street_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 2<sup  style="color:#f00">*</sup></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="date2"  placeholder="SELECT DATE 2" id="date2" class="form-control datepickerr" /> 
                                                  <div class="error" ><?php echo form_error('street_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 3<sup  style="color:#f00">*</sup></label>
                                                <div class="col-md-8">
                                                  <input type="text"  name="date3" placeholder="SELECT DATE 3" id="date3" class="form-control datepickerr" /> 
                                                  <div class="error" ><?php echo form_error('street_name'); ?>
                                                  </div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 4<sup  style="color:#f00">*</sup></label>
                                                <div class="col-md-8">
                                                  <input type="text"  name="date4" placeholder="SELECT DATE 4" id="date4" class="form-control datepickerr" /> 
                                                  <div class="error" ><?php echo form_error('street_name'); ?></div>                                               
                                                </div>
                                            </div>-->
   <!-- <div class="form-group">
        <label class="col-md-4 control-label">FOC Inward<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
            <select class="selectpicker form-control uppercase"    name="foc" id="foc" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    <option value="0">NO</option>
                                    <option value="1">YES</option>
                            </select>
            <div class="error" ><?php echo form_error('vname'); ?></div>                                       
        </div>--><?php */?>
    </div>
</div>
</div>

    </div>
                                
                           
                            
                            
                            
                			</div>
                            </div>
                       
						 <div class="col-md-12">
							
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                          
                                <div class="panel-body" style="width:auto">
                                    <div class="table-responsive">
                                        <table class="table" id="mytable">
                                            <thead>
                                                <tr>
                                                     <th width="17%">Product Type<sup style="color:#f00"> * </sup></th>
                                                    <th width="20%">Product</th>
                                                    <th width="7%">Hands In Qty</th>
                                                    <?php /*?><th width="17%">Location</th><?php */?>
                                                    <th width="7%">VAT</th>
                                                    <th width="14%" >Pur.Rate<sup  style="color:#f00"> * </sup></th>
                                                    <!--<th width="7%">Pur.Tax<sup  style="color:#f00"> * </sup></th>-->
                                                    <th width="7%" style="display:none">Sel.Price<sup  style="color:#f00"> * </sup></th>
                                                    <!--<th width="7%">Sel.Tax<sup  style="color:#f00"> * </sup></th>-->
                                                    <th width="8%" >Qty<sup  style="color:#f00"> * </sup></th>
                                                    <!--<th width="7%">Free<sup  style="color:#f00"> * </sup></th>-->
                                                    <th width="7%">Tax amt</th>
                                                     <th width="10%">Total</th>
                                                </tr>
											</thead>
        <tbody id="testid">

            <tr>
             <td>
              <?php $cs_master = $this->db->query("select * from pro_type")->result_array(); ?>
                                              <select class="selectpicker form-control uppercase bs-select-hidden payment_method" name="payment_method[]" id="payment_method_1" required >
                                              <option disabled selected value="">Select Product Type</option>
                                             <?php foreach($cs_master as $val) { ?>
                                                    <option value="<?=$val['id']?>"><?=$val['type_name']?></option>
                                                    <?php } ?>
                                              
                                               </select>
                                               </td>
                                                <?php $temp_id = 0; foreach($cs_master as $val) { ?>
                                                
                                               <td  class="no_disp1" id="disp_id<?=$val['id']?>"<?=($temp_id > '0')?'style="display:none"':''?>>
                                                
                                              
                                               <select class="selectpicker form-control item"     name="pname1[]" id="item_name1_1"   data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                  <option disabled selected value="">Select Product</option>
                    <?php foreach($item as $row)
					{ 
						if($val['id'] == $row->i_category)
						{
						?>	
                        <option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?></option>
							<?php 
						}
					}?>
                            </select> 
                                               <?php $temp_id++; } ?> 
                                               
                                               </td>
                                               
                                                 <td>
                    <input type="number"  class="form-control uppercase"  name="minqty" id="minqty_1" /></td>
                    <?php /*?><td>
                    <input type="number" required class="form-control uppercase" readonly  name="maxqty" id="maxqty_1" /></td>
                    <td><!-- onchange="itemchange(1)" onchange="itemchange('+a+')"-->
                            <select class="selectpicker form-control uppercase itemsq2"    name="item_name[]" id="item_name_1" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" >
                                    <option value="" disabled selected> SELECT </option>
                    <?php ?>	<?php foreach($item as $row){ ?>	
                                    <option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?> - <?php echo $row->descr; ?></option>
                            <?php } ?><?php ?>
                            </select>
                    </td><?php */?>
                   <?php /*?> <td>
                    <input type="number" required class="form-control uppercase" placeholder="Enter Product Quantity" name="minqty" id="minqty_1" /></td>
                    <td>
                    <input type="number" required class="form-control uppercase" placeholder="Enter Product Quantity" name="maxqty" id="maxqty_1" /></td><?php */?>
                    <td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" readonly name="vat[]" id="vat_1"  onchange="gtotal1();" required/></td>
                    <td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate[]" id="purrate1" onchange="totalamt(1); "  required/></td>
                    <!--<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purtax[]" id="purtax1" onchange="totalamt(1);totalvalid(1);"  required/></td>
                    <td style="display:none"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="selprice[]" id="selprice1"   /></td>-->
                    <!--<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="seltax[]" id="seltax1"  required onchange="totalvalid(1);" /></td>-->
                    <td><input min="0"  type="text" required class="form-control uppercase groupOfTexbox" name="qty[]" id="qty1" onchange="totalamt(1); "   required/>
                    </td>
                    <td><input min="0"  type="text" step="any" class="form-control uppercase" name="per_taxamt[]" id="per_taxamt1"  required readonly/></td>
                    <td><input min="0"  type="text" step="any" class="form-control uppercase" name="total[]" id="total1"  required readonly/></td>
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
            <td style="font-weight:bold;">Transportation Charges</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control groupOfTexbox" name="trans_charge" value="0.00" style="color:#000"   id="trans_charge"  onchange="gtotal1();"></td>
        </tr>
        <tr>
            <td colspan="9" ></td>
            <td style="font-weight:bold;">Custom Duty</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control groupOfTexbox" name="customduty" value="0.00" style="color:#000"   id="customduty"  onchange="gtotal1();"></td>
        </tr>-->
        <tr>
            <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="12%">Total</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" name="stotal" style="color:#000" readonly id="stotal"></td>
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

//Short menu navigation code//

function submitTest() {
       //check duplicate invoice no.
       var isDup = checkdup( $('#vinvno').val());
       if( isDup == 'Y')
       {
           //alert('d');
           return false;
       }
	  for(i=1;i<=a;i++){
		var tax=$('#vat_'+i).val();
		//alert(tax);
	   }
	   if(tax=='')
	   {
		  // $('#vat').val('0');
		   var a=$("#testno").val();
			a=a-1;
			var gt=0;
			for(i=1;i<=a;i++){
					var total=$('#total'+i).val();
					var vat=$('#vat_'+i).val();
					var gt=parseFloat(gt)+parseFloat(total);
			}
			
			
			var stotal = gt;
			if(stotal!=''){
				$("#stotal").val((stotal));
				// var vat = parseFloat($("#vat").val());
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
				
				//var inn=$("#item_name_1").html();
				$("#testid").append('<tr><td ><?php $cs_master = $this->db->query("select * from pro_type")->result_array(); ?><select class="selectpicker form-control uppercase bs-select-hidden payment_method1" name="payment_method[]" required id="payment_method_'+a+'" ><option disabled selected value="">Select Product Type</option><?php foreach($cs_master as $val){?><option value="<?=$val['id']?>"><?=$val['type_name']?></option><?php } ?></select></td><?php $temp_id = 0; foreach($cs_master as $val) {?>'
		+'<td class="no_disp'+a+'" id="disp_id'+a+'<?=$val['id']?>"<?=($temp_id > '0')?'style="display:none"':''?>><select class="selectpicker form-control item2" name="pname1[]" id="item_name1_'+a+'" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option disabled selected value="">Select Product</option><?php foreach($item as $row){if($val['id'] == $row->i_category){?><option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?>-<?php echo $row->ime_serial; ?></option><?php }}?></select><?php $temp_id++; } ?></td>'
		+'<td><input type="number"  class="form-control uppercase"  name="minqty" id="minqty_'+a+'" /></td>'
		+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="vat[]" id="vat_'+a+'" onchange="gtotal1();"   readonly/></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+'); "  required/></td>'
				+'<td style="display:none"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="selprice[]" id="selprice'+a+'"  /></td>'
				+'<td><input min="1"  type="text" class="form-control uppercase groupOfTexbox" name="qty[]" id="qty'+a+'"  onblur="totalamt('+a+'); " required /></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase" name="per_taxamt[]" id="per_taxamt'+a+'" required readonly/></td>'
				+''
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase" name="total[]" id="total'+a+'" required readonly/></td></tr>');
				
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
		$(document).on('change','.payment_method1',function()
{
	var this_vals = $(this).val();
	var this_val = $(this).attr('id');
	this_val = this_val.split('_');
	id = this_val[2];
	//alert(this_vals);
	$('.no_disp'+id).hide();
	$('#disp_id'+id+this_vals).show();
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
					//$('#serivcetax').val(obj.service_tax);
			}
		});
});
	$(document).on('change','.payment_method',function()
{
	var this_vals = $(this).val();
	var this_val = $(this).attr('id');
	this_val = this_val.split('_');
	id = this_val[2];
	//alert(this_vals);
	$('.no_disp'+id).hide();
	$('#disp_id'+this_vals).show();
	
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
					//$('#serivcetax').val(obj.service_tax);
			}
		});

	
});	
		
		
    function totalamt(item){
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
		if(stotal == '')
			{
				stotal = '00.00';
			}
        
        if(stotal!=''){
            $("#stotal").val(stotal);
			
			//alert('hi');
           // var vat = parseFloat($("#vat").val());
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
				gtotal = parseFloat(stotal + taxamt);
				
				if(isNaN(gtotal))
					$("#gtotal").val('');
				else
					//$("#gtotal").val(gtotal);
					$("#gtotal").val(parseFloat(gtotal).toFixed(2));
					
			}
            




        }else{
            $("#stotal").val('00.00');
            $("#taxamount").val('00.00');
            $("#gtotal").val('00.00');
        }
    }
                
		function batchCheck(item) {
			var batch_no = $("#batch"+item).val();
			$.ajax({
					url: "<?php echo base_url('index.php/Purchase/batchCheck')?>",
					type: "post",
					data : { batch_no: batch_no},
					success: function(data){	
						if(data > 0) {
							alert('Batch No already exists');
							$("#batch"+item).val('');
							$("#batch"+item).focus();
							
						}
						
					}
				 });		
			
		}
		
	
	
</script>
<script type="text/javascript">
function checkdup(invno){
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
}
$(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
 
$(document).on('change','.item2',function()
{
		var cus = $(this).val();
		var id= $(this).attr('id');
		sid = id.split('_');
		id = sid[2];
	//	alert(id);
	    alert("DO You Want To Go For The New Purchse?");
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Pos_orders/get_pro_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
				if(obj.minqty != '')
				{
					$('#minqty_'+id).val(obj.qty);
					//$('#maxqty_'+id).val(obj.location);
				}
				
				
			}
		});
		
	}
});
$(document).on('change','.item',function()
{
		var cus = $(this).val();
		//alert(cus);
		var id= $(this).attr('id');
		sid = id.split('_');
		id = sid[2];
	    alert("DO You Want To Go For The New Purchse?");
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Pos_orders/get_pro_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
				if(obj.minqty != '')
				{
					$('#minqty_'+id).val(obj.qty);
					//$('#maxqty_'+id).val(obj.location);
				}
				
				
			}
		});
		
	}
});

</script>
	 
</body>
</html>
   



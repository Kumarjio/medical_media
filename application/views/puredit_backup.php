<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
  <?php 
//  echo '<pre>'; print_r($list); exit;
  if(isset($list) && !empty($list))
  {
	  //echo $list[0]['purchase_type']; exit;
	 // $purchase_type = $list[0]['purchase_type'];
	 // $supplier_name = $list[0]['vname'];
	  $dateofpurchase = $list[0]['pdate'];
	  $invoice_no = $list[0]['vinvno'];
	 // $lot = $list[0]['lot'];
	  $storage_location = '';
	 // $rotation_no = $list[0]['lotno'];
	  $date_of_storage = '';
	  $remarks = $list[0]['remarks'];
	 // $brokerage = $list[0]['brokerage'];
	  $vat = $list[0]['vats'];
	  //$currency = $list[0]['currency'];
	  $product_code = $list[0]['tbl_purchase_req_id'];
	  $pur_rate = $list[0]['p_rate'];
	 // $sel_price = $list[0]['s_price'];
	  $qty = $list[0]['qty'];
	  $total = $list[0]['total'];
	  //$add_charge = $list[0]['adcharges'];
	 // $discount = $list[0]['discount'];
	  //$subtotal = $list[0]['subtotal'];
	  $tax_amount = $list[0]['taxamount'];
	  $grand_total = $list[0]['gtotal'];
	  $po_id = $list[0]['po_id'];
	 // $customer  = $list[0]['customer'];
	  //$foc = $list[0]['foc_inward'];
	  
  }
  else
  {
	  $purchase_type = '';
	  $supplier_name = '';
	  $dateofpurchase = '';
	  $invoice_no = '';
	  $lot = '';
	  $storage_location = '';
	  $rotation_no = '';
	  $date_of_storage = '';
	  $remarks = '';
	  $brokerage = '';
	  $remarks = '';
	  $vat = '';
	  $currency = '';
	  $price = '';
	  $product_code = '';
	  $pur_rate = '';
	  $sel_price = '';
	  $qty = '';
	  $total = '';
	  $add_charge = '';
	  $discount = '';
	  $subtotal = '';
	  $tax_amount = '';
	  $grand_total = '';
	  $po_id = '';
	  $customer = '';
	  $foc = '';
  }
  ?>

    <link type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet" />

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Purchase Entry</h2>
                </div>
                <!-- END PAGE TITLE --> 
                               
                
                <!-- PAGE CONTENT WRAPPER -->
               <form class="form-horizontal" id="jvalidate" role="form" action="" method="post" >

                <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><a href="<?php echo base_url('index.php/Purchase/');?>"><span>Update Entry</span></a>&nbsp;&nbsp;&nbsp;</h3>
                               
<div class="panel-body">                                                                        
                                    
<div class="row">
<div class="col-md-6">
       <div class="form-group" style="display:none">
        <label class="col-md-4 control-label">TBL PO_INV_Item_Id<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
        <?php foreach($list as $post){?>
        <input type="text"   class="form-control" required placeholder="Enter Invoice No" name="po_id" id="po_id" value="<?php echo $post['po_id']  ?>" readonly>
        <?php }?>
       </div>
    </div>
    <div class="form-group" style="display:none">
        <label class="col-md-4 control-label">tbl_purchase_req_id<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
        <?php foreach($list as $post){?>
        <input type="text"   class="form-control" required placeholder="Enter Invoice No" name="pono" id="pono" value="<?php echo $post['tbl_purchase_req_id']  ?>" readonly>
        <?php }?>
       </div>
    </div>
    <?php /*?><div class="form-group">
        <label class="col-md-4 control-label">Vendor Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
            <select class="selectpicker form-control uppercase"    name="vname" id="vname">
            <?php foreach($seller as $row){ ?>
              <option <?=($supplier_name==$row->cid)?'selected':''?> value="<?php echo $row->cid; ?>"><?php echo $row->seller_name; ?></option>
              <?php } ?>
             
            </select>
            <div class="error" ><?php echo ''; ?></div>                                       
        </div>
    </div><?php */?>
    <div class="form-group">
        <label class="col-md-4 control-label">Vendor Name</label>  
        <div class="col-md-8">
        <?php foreach($list as $post){?>
            <input type="text" class="form-control uppercase" readonly placeholder="Enter Remarks" name="vname" id="vname" value="<?=$post['vname']?>"/>
            <?php }?> 
          <div class="error" ><?php echo form_error('remarks'); ?></div>	
        </div>
    </div>
     <div class="form-group">                                        
        <label class="col-md-4 control-label">Date of Purchase</label>
        <div class="col-md-8">
        <?php foreach($list as $post){?>
            <input type="text" class="form-control datepicker uppercase"  required placeholder="Enter Date of Purchase" name="pdate" id="pdate" value="<?php echo $post['pdate'];  ?>">
             <?php }?>
            <div class="error" ><?php echo ''; ?></div>                                               
        </div>
    </div>
    
                                         <!-- <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Warranty Start Date<sup>*</sup></label>
                                                <div class="col-md-8">
                                                <?php foreach($list as $post){?>
                                                   <input type="text"   class="form-control datepicker uppercase " required   name="maintanance_str_date" id="maintanance_str_date" value="<?php echo $post['warranty_start_date']?>" >                                               <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Warranty Exp Date<sup>*</sup></label>
                                                <div class="col-md-8">
                                                <?php foreach($list as $post){?>
                                                  <input type="text"   class="form-control datepicker uppercase " required name="maintanance_exp_date" id="maintanance_exp_date" value="<?php echo $post['warranty_exp_date']?>">                                                     <?php }?>                                  
                                                </div>
                                            </div>-->
    
    <div class="form-group">                                        
        <label class="col-md-4 control-label">Invoice No<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
        <?php foreach($list as $post){?>
            <input type="text"   class="form-control uppercase " required placeholder="Enter Invoice No" onchange="checkdup(this.value);" name="vinvno" id="vinvno" value="<?php echo $post['vinvno'];  ?>" readonly>
             <?php }?> 
            <div class="error" ><?php echo form_error('vinvno'); ?></div>                                               
        </div>
    </div>
  

</div>
<div class="col-md-6">
   
    <div class="form-group">
        <label class="col-md-4 control-label">Remarks</label>  
        <div class="col-md-8">
        <?php foreach($list as $post){?>
            <input type="text" class="form-control uppercase" placeholder="Enter Remarks" name="remarks" id="phone1" value="<?php echo $post['remarks'];  ?>"/>
            <?php }?> 
          <div class="error" ><?php echo form_error('remarks'); ?></div>	
        </div>
    </div>
   
    <div class="form-group">
        <label class="col-md-4 control-label">VAT</label>  
        <div class="col-md-8">
         <?php foreach($list as $post){?>
            <input type="text" class="form-control uppercase" placeholder="Enter VAT" name="vat" id="vat" onchange="gtotal1();"  value="<?php echo $post['vats'];  ?>" readonly/>
             <?php }?> 
          <div class="error" ><?php echo ''; ?></div>
        </div>
    </div>
   <!-- <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 1<sup>*</sup></label>
                                                <div class="col-md-8">
                                                <?php foreach($list as $post){?>
                                                  <input type="text"   class="form-control datepicker uppercase " required name="date1" id="sm_date1" value="<?php echo $post['sm_date1']?>">                                                     <?php }?>                                  
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 2<sup>*</sup></label>
                                                <div class="col-md-8">
                                                <?php foreach($list as $post){?>
                                                  <input type="text"   class="form-control datepicker uppercase " required name="date2" id="sm_date2" value="<?php echo $post['sm_date2']?>">                                                     <?php }?>                                  
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 3<sup>*</sup></label>
                                                <div class="col-md-8">
                                                <?php foreach($list as $post){?>
                                                  <input type="text"   class="form-control datepicker uppercase " required name="date3" id="sm_date3" value="<?php echo $post['sm_date3']?>">                                                     <?php }?>                                  
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">SM Date 4<sup>*</sup></label>
                                                <div class="col-md-8">
                                                <?php foreach($list as $post){?>
                                                  <input type="text"   class="form-control datepicker uppercase " required name="date4" id="sm_date4" value="<?php echo $post['sm_date4']?>">                                                     <?php }?>                                  
                                                </div>
                                            </div>-->
    
    
    
</div>
</div>

    </div>
                                
                           
                            
                            
                            
                			</div>
                            </div>
                            </div>
                       
						 <div class="col-md-12">
							
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                          
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="mytable">
                                            <thead>
                                            
                                                <tr>
                                                    <th width="18%">Product<sup  style="color:#f00"> * </sup></th>
                                                     <th width="17%">IME/Serial NO<sup  style="color:#f00"> * </sup></th>
                                                   <th width="7%">Pur.Rate<sup  style="color:#f00"> * </sup></th>
                                                   
                                                    <th width="7%" style="display:none">Sel.Price<sup  style="color:#f00"> * </sup></th>
                                                    <!--<th width="7%">Sel.Tax<sup  style="color:#f00"> * </sup></th>-->
                                                    <th width="8%">Qty<sup  style="color:#f00"> * </sup></th>
                                                    <th width="8%">Tax  Amt<sup  style="color:#f00"> * </sup></th>
                                                    <th width="10%">Total</th>
                                                    
                                                    
                                                </tr>
                                                
											</thead>
        <tbody id="testid">
<?php $i=1; $tot=0; foreach($list as $vals)
											{
												
												$tot=$vals['qtys']*$vals['p_rate'];
												?>
            <tr>
                    <td>
                    <input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="item_name" id="item_name1" value="<?=$vals['i_name']?>"  required readonly/>
                    <!-- onchange="itemchange(1)" onchange="itemchange('+a+')"-->
                           <?php /*?> <select class="selectpicker form-control uppercase"    name="item_name[]" id="item_name1" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    <option value="" disabled selected> SELECT </option>
                    <?php ?>	<?php foreach($item as $row){ ?>	
                                    <option <?=($vals['pro_id']==$row->i_id)?'selected':''?> value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?></option>
                            <?php } ?><?php ?>
                            </select><?php */?>
                            <input style="display:none"  type="text"  class="form-control " name="pi_id" id="pi_id<?=$i?>"  value="<?=$vals['pi_id']?>" readonly />
                    </td>
                    <td>
                    <input   type="text"  class="form-control" name="ime_serial" id="ime_serial<?=$i?>" value="<?=$vals['ime_serials']?>"  required />
                    </td>
                    <td><input min="0" readonly type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate" id="purrate<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['p_rate']?>"  required/></td>
                    <!--<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purtax[]" id="purtax1" onchange="totalamt(1);totalvalid(1);"  required/></td>-->
                    <td style="display:none"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="selprice[]" id="selprice1" onchange="totalvalid(<?=$i?>);" value="<?=$vals['s_price']?>"  /></td>
                    <!--<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="seltax[]" id="seltax1"  required onchange="totalvalid(1);" /></td>-->
                    <td><input min="0"  type="text" class="form-control uppercase groupOfTexbox" name="qty" id="qty<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['qtys']?>"   required/>
                    </td>
                   <td><input type="text" class="form-control " readonly name="per_tax" id="per_tax" onchange="totalamt(<?=$i?>);" value="<?=$vals['per_taxamt']?>"   required/>
                    </td>
                    <td><input min="0" value="<?=$tot?>"  type="text" step="any" class="form-control uppercase" name="total" id="total<?=$i?>"  required readonly/></td>
                    
                     
            </tr>
<?php 
$i++;
											}
											?>
        </tbody>
                                        </table>
                                        <table class="table" width="100%">
    <thead>
        
        
        <tr>
            <td colspan="9" ><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;">Total</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" name="stotal" value="<?=$tot?>" style="color:#000"  readonly id="stotal"></td>
        </tr>
        <tr>
            <td colspan="9"  width="65%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;">Tax Amount</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" value="<?=$tax_amount?>" name="taxamount" style="color:#000" readonly id="taxamount"></td>
        </tr>
        <tr>
            <td colspan="9"  width="65%" ><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;">Grand Total</td>
            <td style="font-weight:bold;" ><input type="text" readonly class="form-control" value="<?=$grand_total?>" name="gtotal" style="color:#000"   id="gtotal"></td>
        </tr>
                                </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

							<input type="hidden" name="testno" id="testno" value="<?=$i?>" />
							<input type="hidden" name="extratax" id="extratax" value="" />
							     <?php /*?><div class="panel-footer">                            
                                    <button class="btn btn-primary pull-left" type="button" style="margin-bottom:20px;" onclick="fnadd()">Add More</button>
                                    <button class="btn btn-warning pull-left" type="button" style="margin-bottom:20px;margin-left:10px;" onclick="fnremove()">Remove</button><?php */?>                                    
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
	   var tax = $('#vat').val();
	   if(tax=='')
	   {
		   $('#vat').val('0');
		   var a=$("#testno").val();
			a=a-1;
			var gt=0;
			for(i=1;i<=a;i++){
					var total=$('#total'+i).val();
					var gt=parseFloat(gt)+parseFloat(total);
			}
			
			var stotal = gt;
			//alert(stotal);
			
			if(stotal!=''){
				$("#stotal").val((stotal));
				var vat = parseFloat($("#vat").val());
				if(isNaN(vat)) { vat = 0 ; }
				else{
					var taxamt  = parseFloat(( gt * parseFloat(vat))/100);
					if(isNaN(taxamt)){ 
						taxamt = 0; $("#per_tax").val('');
					}
					else{
						$("#per_tax").val(taxamt);
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

       var ac_amount = $('#price').val();
       var gtotal = $('#gtotal').val();
                       //alert(ac_amount); 
       
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
			if(supplier_id != '') {					
				var a=$("#testno").val();
				num=parseInt(a) + 1;
				$("#testno").val(num);
				//alert('kaja');
				
				var inn=$("#item_name1").html();
				$("#testid").append('<tr><td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+');totalvalid('+a+');"  required/></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+');totalvalid('+a+');"  required/></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+');totalvalid('+a+');"  required/></td>'
				+'<td style="display:none"><input min="0"  type="text" step="any" class="form-control uppercase groupOfTexbox" name="selprice[]" id="selprice'+a+'" onblur="totalvalid('+a+');"  /></td>'
				+'<td><input min="1"  type="text" class="form-control uppercase groupOfTexbox" name="qty[]" id="qty'+a+'"  onblur="totalamt('+a+');totalvalid('+a+');" required /></td>'
				+''
				+'<td><input min="0"  type="text" step="any" class="form-control uppercase" name="total[]" id="total'+a+'" required readonly/></td></tr>');
				
				$(".selectpicker").selectpicker('refresh');
				$(".groupOfTexbox").keypress(function (event) {
		 			   return isNumber(event, this)
				}); 
				
			}
			else {
				alert("Select Supplier");
			}
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
        var purrate=parseFloat($('#purrate'+item).val());
        //var purtax=$('#purtax'+item).val();
        var qty=parseFloat($('#qty'+item).val());

        if(!isNaN(purrate) && !isNaN(qty) && qty!=0){
        //	var tax=(parseFloat(purrate)/100)*parseFloat(purtax);
        //	var total=(parseFloat(purrate)+parseFloat(tax))*parseFloat(qty);					
                var total=(parseFloat(purrate))*parseFloat(qty);					

                if(isNaN(total)){ } else {
                    $("#total"+item).val(total);
                    gtotal1();
                }
        }else{
                $("#total"+item).val("");
        }


    }

    function gtotal1(){
        var a=$("#testno").val();
        a=a-1;
        var gt=0;
        for(i=1;i<=a;i++){
                var total=$('#total'+i).val();
                var gt=parseFloat(gt)+parseFloat(total);
        }
        
        var stotal = gt ;
        //alert(stotal);
		       
        if(stotal!=''){
            $("#stotal").val((stotal));
            var vat = parseFloat($("#vat").val());
			var per_tax_amt = parseFloat($("#per_tax").val());
            if(isNaN(vat)) { vat = 0 ; }
            else{
                var taxamt  = parseFloat(( gt * parseFloat(vat))/100);
                if(isNaN(taxamt)){ 
				
				taxamt = 0; $("#per_tax").val('');
				
                  
                }
                else{
                   $("#per_tax").val(taxamt);
				    taxes =parseFloat($("#taxamount").val());
					 if(taxes!= '')
					  { 
						 gtotaltaxes = parseFloat(taxes +taxamt);
						 $("#taxamount").val(gtotaltaxes);
						 totals =parseFloat($("#gtotal").val());
						 tot_taxamt= parseFloat($('#taxamount').val());
					     gtotal = parseFloat(stotal +tot_taxamt+totals);
					 }
					
					
				   
					//$("#taxamount").val(tot_taxamt);
                    if(isNaN(gtotal))
                        $("#gtotal").val('');
                    else
                        //$("#gtotal").val(gtotal);
                        $("#gtotal").val(parseFloat(gtotal).toFixed(2));
                        
                }
                    
            }
            

        }else{
            $("#stotal").val('00.00');
            $("#per_tax").val('00.00');
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
		
		function itemchange(item){	
				var supplier_id=$('#vname').val();		
				var item_name=$('#item_name'+item).val();
				//alert(item_name+' '+supplier_id)	
					
				$("#extratax").val(item);
				$("#rate").val('');
				$("#mrp").val('');
				$("#myModalLabel").text('');
				$("#cenper").val('0.00');
				$("#cenval").val('0.00');
				$("#edcess").val('0.00');
				$("#edval").val('0.00');
				$("#seced").val('0.00');
				$("#secedval").val('0.00');
				
				var selectfields = '*';
				var table_name = 'tbl_product';
				var where = 'i_id ='+ item_name;			
				$.ajax({
					url: "<?php echo base_url('index.php/Purchase/jsonSingleDetails')?>",
					type: "post",
					data : { selectfields: selectfields, tbl_name: table_name, where_cond: where},
					success: function(data){	
						var json = JSON.parse(data);
						$("#purrate"+item).val(parseFloat(json[0].p_rate).toFixed(2));
						$("#purtax"+item).val(parseFloat(json[0].p_tax).toFixed(2));
						$("#selprice"+item).val(parseFloat(json[0].s_price).toFixed(2));
						$("#seltax"+item).val(parseFloat(json[0].s_tax).toFixed(2));
						$("#mrp"+item).val(parseFloat(json[0].mrp).toFixed(2));
						$("#rate").val(parseFloat(json[0].p_rate).toFixed(2));
						$("#mrp").val(parseFloat(json[0].mrp).toFixed(2));
						$("#myModalLabel").text(json[0].i_name);
						
						
					}
				 });			
				   
				   $('#previouspurchase').empty(); 
				   $('#opener').trigger('click');
				   
				   //Previous Purchase rates
				   $.ajax({
						url: "<?php echo base_url('index.php/Purchase/getPreviousRates/')?>",
						type: "post",
						data : { itemid: item_name, supplier_id: supplier_id},
						success: function(data){
							//alert(data);
							var json = JSON.parse(data);
							$('#previouspurchase').empty(); // clear the current elements in select box
							for (row in json) {
								$('#previouspurchase').append($('<li>'+parseFloat(json[row].p_rate).toFixed(2)+'</li>'));
							}
						}
				   });
		}
  
  
  
	/*$(function() {
		
	
		
		$( "#dialog" ).dialog({
			autoOpen: false,
			show: {
				effect: "blind",
				duration: 1000
			},
			hide: {
				effect: "explode",
				duration: 1000
			}
		});

		$( "#opener" ).click(function() {
			$( "#dialog" ).dialog( "open" );
		});
	});*/
	
	
	

		$( "#taxmrp,#mrp,#qty,#taxmrp,#cenper,#edcess,#seced" ).blur(function() {
			
		var mrp=$('#mrp').val();
		//alert(mrp);
		var qty=$('#qty').val();
		var taxmrp=$('#taxmrp').val();
		var cenper=$('#cenper').val();
		var edcess=$('#edcess').val();
		var seced=$('#seced').val();
		
		
			if(mrp!=0 && qty!=0 && taxmrp!=0){
				var per=(mrp/100)*(taxmrp/100)*qty;				
				var cen=per*cenper;
				var edu= (cen * (edcess/100));
				var sec=(cen * (seced/100));;
				
				$("#cenval").val(cen.toFixed(2));
				$("#edval").val(edu.toFixed(2));
				$("#secedval").val(sec.toFixed(2));
			}	
			
		});
		
			$( "#taxaddremove" ).click(function() {
				var mrp=$("#mrp").val();
				var rate=$("#rate").val();
				var taxmrp=$("#taxmrp").val();
				var cen=$("#cenval").val();
				var qty=$("#qty").val();
				var edu=$("#edval").val();
				var sec=$("#secedval").val();
				
				
				var tax=parseFloat(cen)+parseFloat(edu)+parseFloat(sec);
				//alert(tax);
				
				if(tax!=0 && tax!="0" && tax!="0.00" && tax!=""){
					var item=$("#extratax").val();
					
					var cen=$("#purrate"+item).val();
					var newpurate=parseFloat(cen)+parseFloat(tax);
					$("#purrate"+item).val(parseFloat(newpurate).toFixed(2));
				}			
				
			});
			
$('#myModal').on('shown.bs.modal', function (){
  $('#myInput').focus()
});
		
	
</script>
<script type="text/javascript">
function checkdup(invno){
        //alert('dupcheck');
    //Previous Purchase rates
    <?php /*?>$.ajax({
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
    });<?php */?>
}
</script>
	 
</body>
</html>
   



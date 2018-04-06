<!DOCTYPE html>
<html lang="en">
<head>
<style>

.forcedWidth{
    width:200px;
    word-wrap:break-word;
    display:inline-block;
}
</style>
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
	  //$currency = $list[0]['currency'];
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
                                   
                               
<div class="panel-body">                                                                        
                                    
<div class="row">
<div class="col-md-6">
       <div class="form-group" style="display:none">
        <label class="col-md-4 control-label">TBL PO_INV_Id<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
        <?php foreach($list as $post){?>
        <input type="text"   class="form-control" required placeholder="Enter Invoice No" name="po_id" id="po_id" value="<?php echo $post['po_id']  ?>" readonly>
        <?php }?>
       </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-md-4 control-label">Vendor Name</label>  
        <div class="col-md-8">
        <select name="vname" id="vname" class="selectpicker form-control "    data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    	<option value="" disabled selected> SELECT </option>
														<?php foreach($vendor as $row){ ?>
                                                        <option <?=($list[0]['vname'] == $row['vendor_id'])?'selected':''?> value="<?=$row['vendor_id']?>"><?=$row['vendor_name']?></option>	
														<?php /*?><option value="<?php echo $row['cid']; ?>"><?php echo $row['customer_name']; ?> </option><?php */?>
														<?php } ?> 	      
                                                    </select>
          <div class="error" ><?php echo form_error('remarks'); ?></div>	
        </div>
    </div>
    <div class="form-group">                                        
        <label class="col-md-4 control-label">PO Date</label>
        <div class="col-md-8">
        <?php /*?><?php foreach($list as $post){?><?php */?>
            <input type="text" class="form-control datepicker "  required placeholder="Enter Date of Purchase" name="podate" id="podate" value="<?php echo $list[0]['podate'];  ?>">
            <?php /*?> <?php }?><?php */?>
            <div class="error" ><?php echo ''; ?></div>                                               
        </div>
    </div>
     <div class="form-group">                                        
        <label class="col-md-4 control-label">Invoice Date</label>
        <div class="col-md-8">
        <?php /*?><?php foreach($list as $post){?><?php */?>
            <input type="text" class="form-control datepicker "  required placeholder="Enter Date of Purchase" name="pdate" id="pdate" value="<?php echo $list[0]['pdate'];  ?>">
            <?php /*?> <?php }?><?php */?>
            <div class="error" ><?php echo ''; ?></div>                                               
        </div>
    </div>
    
                                        
    
    <div class="form-group">                                        
        <label class="col-md-4 control-label">Invoice No<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
        <?php /*?><?php foreach($list as $post){?><?php */?>
            <input type="text"   class="form-control  " required placeholder="Enter Invoice No" <?php /*?>onchange="checkdup(this.value);"<?php */?> name="vinvno" id="vinvno" value="<?php echo $list[0]['vinvno'];  ?>" >
            <?php /*?> <?php }?> <?php */?>
            <div class="error" ><?php echo form_error('vinvno'); ?></div>                                               
        </div>
    </div>
  

</div>
<div class="col-md-6">
   
    <div class="form-group">
        <label class="col-md-4 control-label">Manufacture Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
         <input type="text" class="form-control " placeholder="Enter storage" name="manufacture" value="<?php echo $list[0]['manufacture_name'];  ?>" />
            
            <div class="error" ><?php echo form_error('vname'); ?></div>                                       
        </div>
    </div>
   
    
  <div class="form-group">
        <label class="col-md-4 control-label">Storage Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
         <input type="text" class="form-control " placeholder="Enter storage" name="storage" value="<?php echo $list[0]['storage_name'];  ?>" />
            
            <div class="error" ><?php echo form_error('vname'); ?></div>                                       
        </div>
    </div>
    
    
    
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
                                                    <th width="14%">Product<sup  style="color:#f00"> * </sup></th>
                                                    <th width="7%">Unit Type<sup style="color:#f00"> * </sup></th>
                                                    <th width="8%">Qty<sup  style="color:#f00"> * </sup></th>
                                                    <th width="7%">Pur.Rate<sup  style="color:#f00"> * </sup></th>
                                                     <th width="8%">SGST%<sup  style="color:#f00"> * </sup></th>
                                                    <th width="8%">CGST%<sup  style="color:#f00"> * </sup></th>
                                                    <th width="8%">IGST%<sup  style="color:#f00"> * </sup></th>
                                                    
                                                    
                                                  
                                                    <th width="10%">Total</th>
                                                    
                                                </tr>
                                                
											</thead>
        <tbody id="testid">
<?php $i=1; $tot=0; foreach($list as $vals)
											{
												
												
												?>
            <tr>
                  <td class="forcedWidth">
                                          <?php foreach($item as $row){if($vals['tbl_pro_id']==$row->i_id){ ?>
                                                    <select class="selectpicker form-control "    name="item_name1[]" id="item_name1_<?=$i?>"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" >
                                   
                    <?php foreach($item as $row){ ?>    
                                    <option <?=($vals['tbl_pro_id']==$row->i_id)?'selected':''?> value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?> </option>
                            <?php } ?>
                            </select>
                            
                          
                             
                            
                                                 <?php }} ?>
                                         
                                                </td>
            <td>
                                          <?php foreach($unit as $row){if($vals['tbl_unit_id']==$row->id){ ?>
													<select class="selectpicker form-control "    name="unit[]" id="unit<?=$i?>"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" >
                                   
                    <?php foreach($unit as $row){ ?>	
                                    <option <?=($vals['tbl_unit_id']==$row->id)?'selected':''?> value="<?php echo $row->id; ?>"><?php echo $row->location_name; ?> </option>
                            <?php } ?>
                            </select>
                            
                           <input style="display:none"  type="text"  class="form-control " name="inv_item_id[]" id="inv_item_id1" value="<?php echo $vals['pi_id']; ?>"   readonly/>
                            
                             
                            
												 <?php }} ?>
                                         
												</td>
            
           
                                                   <td><input min="0"  type="text" class="form-control  groupOfTexbox" name="qty[]" id="qty<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['qty']?>"   required/>
                    </td>
                      <td><input   type="text" step="any" class="form-control  groupOfTexbox" name="purrate[]" id="purrate<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['p_rate']?>"  required/></td>
                   
            
                    <td><input   type="text" step="any" class="form-control  " name="sgst[]" id="sgst<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['sgst']?>"  required/><br><input   type="text"  class="form-control  " name="sgst_amt[]" id="sgst_amt<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['sgst']?>"  required/></td>
                    <td><input   type="text" step="any" class="form-control  " name="cgst[]" id="cgst<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['cgst']?>"  required/><br><input   type="text"  class="form-control  " name="cgst_amt[]" id="cgst_amt<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['cgst']?>"  required/></td>
                    <td><input   type="text" step="any" class="form-control  " name="igst[]" id="igst<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['igst']?>"  required/><br><input   type="text"  class="form-control  " name="igst_amt[]" id="igst_amt<?=$i?>" onchange="totalamt(<?=$i?>);" value="<?=$vals['igst']?>"  required/></td>
                  
                 
                 
                   
                   
                    <td><input min="0" value="<?=$vals['total']?>"  type="text" step="any" class="form-control " name="total[]" id="total<?=$i?>"  required readonly/></td>
                    
                     
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
            <td style="font-weight:bold;" ><input type="text" class="form-control" name="stotal" value="<?=$list[0]['stotal']?>" style="color:#000"  readonly id="stotal"></td>
        </tr>
        <?php /*?><tr>
            <td colspan="9"  width="65%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;">Tax Amount</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" value="<?=$tax_amount?>" name="taxamount" style="color:#000" readonly id="taxamount"></td>
        </tr><?php */?>
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
							     <div class="panel-footer">                            
                                    <button class="btn btn-primary pull-left" type="button" style="margin-bottom:20px;" onclick="fnadd()">Add More</button>
                                    <button class="btn btn-warning pull-left" type="button" style="margin-bottom:20px;margin-left:10px;" onclick="fnremove()">Remove</button>                                    
                                 <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button"> 
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



        <!-- END PAGE CONTAINER -->
          <?php $this->load->view('include_js'); ?>
		 
<script type="text/javascript">
function fnadd() 
		{
			var supplier_id=$('#vname').val();
			//alert(supplier_id);
			//if(supplier_id != '') {					
				var a=$("#testno").val();
				num=parseInt(a) + 1;
				$("#testno").val(num);
				//alert('kaja');
				
				var inn=$("#payment_method_1").html();
				var inn=$("#item_name_1").html();
				$("#testid").append('<tr><td class="forcedWidth"><select  class="selectpicker form-control itemsq2 "  name="item_name1[]" id="item_name1_'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" disabled selected>Select</option><?php foreach($item as $row){?><option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?></option><?php } ?></select></td>'
                    +'<td><select  class="selectpicker form-control "  name="unit[]" id="unit'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" disabled selected>Select</option><?php foreach($unit as $row){?><option value="<?php echo $row->id; ?>"><?php echo $row->location_name; ?></option><?php } ?></select></td>'
                    +'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="qty[]" id="qty'+a+'"  onblur="totalamt('+a+'); " required /></td>'
                    +'<td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+'); "  required/></td>'




						+'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="sgst[]" id="sgst'+a+'" value="0"  onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="sgst_amt[]" id="sgst_amt'+a+'"  readonly required /></td>'
				+'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="cgst[]" id="cgst'+a+'" value="0"   onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt'+a+'"  readonly required /></td>'
				+'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="igst[]" id="igst'+a+'" value="0"   onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt'+a+'"  readonly required /></td>'
				
				+'<td style="display:none"><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="selprice[]" id="selprice'+a+'"  /></td>'
				
				
				
				+''
				+'<td><input min="0"  type="text" step="any" class="form-control " name="total[]" id="total'+a+'" required readonly/></td></tr>');
				
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
        var purrate=parseFloat($('#purrate'+item).val());
        var qty=parseFloat($('#qty'+item).val());
	    var sgst=parseFloat($('#sgst'+item).val());
		var cgst=parseFloat($('#cgst'+item).val());
		var igst=parseFloat($('#igst'+item).val());
        if(!isNaN(purrate) && !isNaN(qty) && qty!=0){
        //	var tax=(parseFloat(purrate)/100)*parseFloat(purtax);
        //	var total=(parseFloat(purrate)+parseFloat(tax))*parseFloat(qty);					
                var total=(parseFloat(purrate))*parseFloat(qty);
				var sgstamt  = parseFloat(( total * parseFloat(sgst))/100);
				var cgstamt  = parseFloat(( total * parseFloat(cgst))/100);
				var igstamt  = parseFloat(( total * parseFloat(igst))/100);
				
				$("#sgst_amt"+item).val(sgstamt);
				$("#cgst_amt"+item).val(cgstamt);
				$("#igst_amt"+item).val(igstamt);
				
				gtotal = parseFloat(total+sgstamt+cgstamt+igstamt);
				if(isNaN(total)){ } else {
                    $("#total"+item).val(gtotal);
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
		 var gt1=0;
        for(i=1;i<=a;i++){
			var purrate=parseFloat($('#purrate'+i).val());
        	var qty=parseFloat($('#qty'+i).val());
	        var sgst=parseFloat($('#sgst'+i).val());
		    var cgst=parseFloat($('#cgst'+i).val());
		    var igst=parseFloat($('#igst'+i).val());
			
	   		var total=(parseFloat(purrate))*parseFloat(qty);
			var sgstamt  = parseFloat(( total * parseFloat(sgst))/100);
			var cgstamt  = parseFloat(( total * parseFloat(cgst))/100);
			var igstamt  = parseFloat(( total * parseFloat(igst))/100);
			//var taxamt  = parseFloat(( total * parseFloat(vat))/100);
               // var total=$('#total'+i).val();
			   var gt=parseFloat(gt)+parseFloat(total);
				var gt1=parseFloat(gt1)+parseFloat(sgstamt)+parseFloat(cgstamt)+parseFloat(igstamt);
                
        }
       
		var stotal = gt;
		var gtot = gt1;
        //alert(stotal);
		if(stotal == '')
			{
				stotal = '00.00';
			}
        
        if(stotal!=''){
            $("#stotal").val(stotal);
            
				//$("#taxamount").val(taxamt);
				gtotal = parseFloat(stotal+gtot);
				
				
					$("#gtotal").val(parseFloat(gtotal).toFixed(2));
					
			}
            




        else{
            $("#stotal").val('00.00');
            $("#taxamount").val('00.00');
            $("#gtotal").val('00.00');
        }
    }
                
		
</script>

</body>
</html>
   



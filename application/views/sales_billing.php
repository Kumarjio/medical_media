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

    <link type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet" />

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2> Sales Details</h2>
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
                                                   <input type="text" class="form-control " readonly  required name="bill_no" id="bill_no" style="color:#000;" value="<?php echo "SB";echo $id[0]['max(s_no)']+1;  ?>">          	                             
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">PO NO<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                     <input type="text" class="form-control" name="po_no_ref" id="po_no_ref">                                        
                                                </div>
                                            </div>
                                            
                                            
                                            
                                           <!--  <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Customer Details</label>
                                                <div class="col-md-8" id="cus_det">
                                                    <div class="error" ><?php echo form_error('address1'); ?></div>                                               
                                                </div>
                                            </div> -->
                                          
                                           <!--  <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Remarks<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                	<input type="text"  class="form-control "  <?php /*?>required<?php */?> placeholder="Enter Remarks" name="remarks" id="remarks" value="<?php echo set_value('remarks');  ?>" >
                                                    <div class="error" ><?php echo form_error('remarks'); ?></div>                                               
                                                </div>
                                            </div>
                                             -->
                                          
                                            
										</div>
                                        
                                        <div class="col-md-6">
										<div class="form-group">                                        
                                                <label class="col-md-4 control-label">Customer Code<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                    
                                                    <select name="cus_code" id="cus_code" class="selectpicker form-control " required  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                        <option value="" disabled selected> SELECT </option>
                                                        <?php foreach($customer as $row){ ?>    
                                                        <option value="<?php echo $row['customer_id']; ?>"> <?php echo $row['customer_name']; ?></option>
                                                        <?php } ?>        
                                                    </select>
                                                    <div class="error" ><?php echo form_error('cus_code'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">PO Date<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                     <input type="text" class="form-control datepicker" name="po_date_ref" id="po_date_ref">                                        
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
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body" style="width:auto"  >
                                    <div class="table-responsive testid">
                                        <table class="table" id="mytable">
                                            <thead>
                                                <tr>
                                                    <!-- <th width="10%">Product Type<sup style="color:#f00"> * </sup></th> -->
                                                    <th width="6%">Product-Batch-Avil.Qty</th>
                                                    <th width="6%">HSN</th>
                                                    <th width="6%">Mgf Name <br>/ Exp date</th>
                                                     <th width="6%">Qty <br>/ Free<sup style="color:#f00"> * </sup></th>
                                                     <th width="6%">Unit</th>
                                                     <th width="6%">Unit Rate</th>
                                                    <th width="6%">SGST% <br>/ SGST Amt<sup  style="color:#f00"> * </sup></th>
                                                    <th width="6%">CGST% <br>/ CGST Amt<sup  style="color:#f00"> * </sup></th>
                                                    <th width="6%">IGST% <br>/ IGST Amt<sup  style="color:#f00"> * </sup></th>
                                                    
                                                   
                                                    <!-- <th width="6%">SGST Amt<sup  style="color:#f00"> * </sup></th>
                                                    <th width="6%">CGST Amt<sup  style="color:#f00"> * </sup></th>
                                                    <th width="6%">IGST Amt<sup  style="color:#f00"> * </sup></th> -->
                                                    <th width="6%">Discout</th>
                                                    <th width="6%">Total</th>
                                                </tr>
											</thead>
                                            <tbody id="testid">
                                        	
											<tr>
                                            <td  class="forcedWidth"><select class="selectpicker form-control item" onchange="val_fun(1)"     name="pname[]" id="pname_1"   data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option disabled selected value="">Select Product</option><?php foreach($item as $row){ ?><option value="<?php echo $row->stock_id ?>"><?php echo $row->i_name;echo "-";echo $row->batch_num;echo "-";echo $row->curr_qty; ?></option><?php } ?></select></td>
                                            <td><input  type="text" required class="form-control  groupOfTexbox" name="hsn[]" id="hsn1"    required readonly/><input  type="hidden" required class="form-control  groupOfTexbox" name="hsn_id[]" id="hsn_id1"     readonly /> </td>
                                            <td><input  type="text" required class="form-control  groupOfTexbox" name="manu_name[]" id="manu_name1" readonly    required/><br><input  type="text" required class="form-control  groupOfTexbox" name="exp_date[]" id="exp_date1" readonly    required/> </td>
                                             <td><input min="0"  type="text" class="form-control  groupOfTexbox" name="qty[]" id="qty1" placeholder="qty" onchange="totalamt(1); "   required/><br><input min="0"  type="text" class="form-control  groupOfTexbox" name="free_qty[]" value="0" id="free_qty1"   required/><input min="0"  type="hidden" class="form-control  groupOfTexbox" name="qty_ref[]" id="qty_ref1" value="0"  required/><br><input min="0"  type="hidden" class="form-control  groupOfTexbox" name="free_qty_ref[]" id="free_qty_ref1" /></td>
                                             <td><input   type="text" step="any" class="form-control" name="unit[]" id="unit1" readonly /></td>
                                             <td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="purrate[]" readonly id="purrate1" onchange="totalamt(1);"  required/></td>
    										<td><input  type="text" required class="form-control  groupOfTexbox" name="sgst[]" id="sgst1" onchange="totalamt(1); "  value="0" readonly  required/> <br> <input  type="text" required class="form-control   groupOfTexbox" name="sgst_amt[]" id="sgst_amt1"    readonly/> </td>
                                            <td><input   type="text" readonly required class="form-control  groupOfTexbox" name="cgst[]" id="cgst1" onchange="totalamt(1); " value="0"   required/> <br> <input   type="text" required class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt1"    readonly/> </td>
                                            <td><input   type="text" required class="form-control  groupOfTexbox" readonly name="igst[]" id="igst1" onchange="totalamt(1); " value="0"   required/> <br><input   type="text" required class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt1"    readonly/></td>
                        					
                                                                       
                                           
                                            <!-- <td> </td>
                                            <td> </td>
                                            <td> </td> -->
                                            <td><input min="0"  type="text" step="any" class="form-control" value="0" name="discount[]" id="discount1"   onchange="totalamt(1); "/></td>
                                            <td><input min="0"  type="text" step="any" class="form-control " name="total[]" id="total1"   readonly/></td>
											</tr>
											
										</tbody>
                                        </table>
										<table class="table" width="100%" >
                                         <thead>
                                           <tr>
                                                <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
                                                <td style="font-weight:bold;" width="12%">Total</td>
                                                <td style="font-weight:bold;" ><input type="text" class="form-control" name="stotal" style="color:#000" readonly id="stotal"></td>
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
                                    
                           
                            </form>
</body>



  
 

</html>

     <?php $this->load->view('include_js'); ?>


     <script type="text/javascript">
      /*  $(document).ready(function(){
      $('.x-navigation-minimize').trigger('click'); 
    });*/

        $('body').on('change','#cus_code',function(){
  
$('#cus_code').attr("disabled", true);
});
$('body').on('click','#submit',function(){
$('#cus_code').attr("disabled", false);
});


var names=[];
        function val_fun(id){
            var stock_id = $('#pname_'+id).val();
            var cus_code = $('#cus_code').val();
            if(cus_code == null){
                alert("Please Select Customer First");
                location.reload();
            }else{
                $.ajax({
                    url:'<?php echo base_url() ?>index.php/Sales/get_pro_det/'+stock_id+'/'+cus_code,
                    data:'POST',
                    dataType:'JSON',
                    success:function(res){
                        console.log(res);
                        $("#qty"+id).val('');
                        $("#free_qty"+id).val('');
                        $("#hsn"+id).val('');
                        $("#exp_date"+id).val('');
                        $("#hsn_id"+id).val('');
                        $("#unit"+id).val('');
                        $("#manu_name"+id).val('');
                        $("#sgst"+id).val(0);
                        $("#cgst"+id).val(0);
                        $("#igst"+id).val(0);
                        $("#purrate"+id).val(0);
                        if(res == ""){
                            $.ajax({
                                url:'<?php echo base_url() ?>index.php/Sales/get_pro_det_non/'+stock_id+'/'+cus_code,
                                type:'POST',
                                dataType:'JSON',
                                success:function(res){
                                    console.log(res);
                                    $("#hsn"+id).val(res[0]['hsn_code']);
                                    $("#unit"+id).val(res[0]['location_name']);
                                    $("#hsn_id"+id).val(res[0]['hsn_id']);
                                    $("#manu_name"+id).val(res[0]['manu_name']);
                                    $("#exp_date"+id).val(res[0]['exp_date']);
                                    $("#qty_ref"+id).val(res[0]['curr_qty']);
                                    $("#free_qty_ref"+id).val(res[0]['curr_free_qty']);
                                   // alert("Avilabel Free Qty : "+res[0]['curr_free_qty']);
                                    if(res[0]['cus_tax_type'] == 1){
                                        $gst = res[0]['tax']/2;
                                        $("#sgst"+id).val($gst);
                                        $("#cgst"+id).val($gst);
                                    }else if(res[0]['cus_tax_type'] == 2){
                                        $("#igst"+id).val(res[0]['tax']);
                                    }                        
                                    $("#purrate"+id).val(res[0]['comm_rate']);
                                   names.push(parseInt(res[0]['pro_reff_id']));
                                    localStorage.setItem("stock", JSON.stringify(names));
                                }

                            });
                        }else{
                          $("#hsn"+id).val(res[0]['hsn_code']);
                        $("#hsn_id"+id).val(res[0]['hsn_id']);
                        $("#manu_name"+id).val(res[0]['manu_name']);
                        $("#exp_date"+id).val(res[0]['exp_date']);
                        $("#unit"+id).val(res[0]['location_name']);
                        $("#qty_ref"+id).val(res[0]['curr_qty']);
                        $("#free_qty_ref"+id).val(res[0]['curr_free_qty']);
                        //alert("Avilabel Free Qty : "+res[0]['curr_free_qty']);
                        if(res[0]['cus_tax_type'] == 1){
                            $gst = res[0]['tax']/2;
                            $("#sgst"+id).val($gst);
                            $("#cgst"+id).val($gst);
                        }else if(res[0]['cus_tax_type'] == 2){
                            $("#igst"+id).val(res[0]['tax']);
                        }                        
                        $("#purrate"+id).val(res[0]['enduser_price']); 
                         names.push(parseInt(res[0]['pro_reff_id']));
                                    localStorage.setItem("stock", JSON.stringify(names)); 
                        }

                        
                    }
                });
            }
            
        }


function fnadd() {
		var a=$("#testno").val();
		num=parseInt(a) + 1;
		$("#testno").val(num);
		
		$("#testid").append('<tr><td  class="forcedWidth"><select class="selectpicker form-control item" onchange="val_fun('+a+')"     name="pname[]" id="pname_'+a+'"   data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option disabled selected value="">Select Product</option><?php foreach($item as $row){ ?><option value="<?php echo $row->stock_id; ?>"><?php echo $row->i_name;echo "-";echo $row->batch_num;echo "-";echo $row->curr_qty; ?></option><?php } ?></select> </td>'

		+'<td><input  type="text" required class="form-control  groupOfTexbox" name="hsn[]" readonly id="hsn'+a+'"    required/><input  type="hidden" required class="form-control  groupOfTexbox" name="hsn_id[]" id="hsn_id'+a+'"  readonly  required/> </td>'
        +'<td><input  type="text" required class="form-control  groupOfTexbox" name="manu_name[]" readonly id="manu_name'+a+'"    required/> <br> <input  type="text" required class="form-control  groupOfTexbox" name="exp_date[]" readonly id="exp_date'+a+'"    required/> </td>'
        +'<td><input min="0"  type="text" class="form-control  groupOfTexbox" name="qty[]" placeholder="qty" id="qty'+a+'" onchange="totalamt('+a+'); "   required/><br><input min="0"  type="text" class="form-control  groupOfTexbox" name="free_qty[]" id="free_qty'+a+'" value="0" required/><input min="0"  type="hidden" class="form-control  groupOfTexbox" name="qty_ref[]" id="qty_ref'+a+'"  required/><br><input min="0"  type="hidden" class="form-control  groupOfTexbox" name="free_qty_ref[]" id="free_qty_ref'+a+'"   required/></td>'
        +'<td><input  type="text" step="any" class="form-control " name="unit[]" id="unit'+a+'" readonly /></td>'
        +'<td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+'); " readonly  required/></td>'
		+'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="sgst[]" readonly id="sgst'+a+'" value="0"  onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" readonly name="sgst_amt[]" id="sgst_amt'+a+'"  readonly required /></td>'
				+'<td><input min="1" readonly  type="text" class="form-control  groupOfTexbox" name="cgst[]" id="cgst'+a+'" value="0"   onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" readonly class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt'+a+'"  readonly required /></td>'
				+'<td><input min="1"  type="text" readonly class="form-control  groupOfTexbox" name="igst[]" id="igst'+a+'" value="0"   onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" readonly class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt'+a+'"  readonly required /></td>'
		
				
				
				+'<td><input min="0"  type="text" step="any" class="form-control " name="discount[]" id="discount'+a+'" value="0"   onchange="totalamt('+a+'); "/></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control " name="total[]" id="total'+a+'"  readonly/></td></tr>');
				
			
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
/*$(document).on('change','.item',function()
{
		var cus = $(this).val();
		//alert(cus);
		var id= $(this).attr('id');
		sid = id.split('_');
		id = sid[1];
		//alert(id);
	    //alert("DO You Want To Go For The New Purchse?");
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
					//$('#seriel_no'+id).val(obj.serial);
					//$('#descr'+id).val(obj.descr);
					$('#ids'+id).val(obj.qty);
					$('#purrate'+id).val(obj.purrate);
				
			}
		});
		
	}
});*/
function totalamt(item){
		//alert('to');
        var stock_id = $('#pname_'+item).val();
        var purrate=parseFloat($('#purrate'+item).val());
        //var purtax=$('#purtax'+item).val();
        var qty=parseFloat($('#qty'+item).val());
        var qty_ref=parseFloat($('#qty_ref'+item).val());
        var free_qty_ref =parseFloat($('#free_qty_ref'+item).val());
        var sgst=parseFloat($('#sgst'+item).val());
		var cgst=parseFloat($('#cgst'+item).val());
		var igst=parseFloat($('#igst'+item).val());
        $('#free_qty'+item).val(''); 
        var discount=parseFloat($('#discount'+item).val());
        if(qty_ref >= qty){
            $.ajax({
                url:"<?php echo base_url() ?>index.php/Sales/get_free_qty/"+stock_id,
                type:"POST",
                dataType:"JSON",
                success:function(res){
                    console.log(res);
                   var data1 = Math.floor(parseFloat(parseFloat(res[0]['curr_free_qty'])/parseFloat(res[0]['curr_qty']))*qty);
                   $('#free_qty'+item).val(data1); 
                 // alert(data1);
                }
            });

            if(!isNaN(purrate) && !isNaN(qty) && qty!=0){
                    //  var tax=(parseFloat(purrate)/100)*parseFloat(purtax);
                    //  var total=(parseFloat(purrate)+parseFloat(tax))*parseFloat(qty);                    
                            var total=(parseFloat(purrate))*parseFloat(qty);
                            var sgstamt  = parseFloat(( total * parseFloat(sgst))/100);
                            var cgstamt  = parseFloat(( total * parseFloat(cgst))/100);
                            var igstamt  = parseFloat(( total * parseFloat(igst))/100);
                            var discount_sale  = parseFloat(( total * parseFloat(discount))/100);
                           // var free_call = parseFloat((parseFloat(free_qty_ref))/(parseFloat(qty)));
                            $("#sgst_amt"+item).val(sgstamt);
                            $("#cgst_amt"+item).val(cgstamt);
                            $("#igst_amt"+item).val(igstamt);
                          // $("#free_qty"+item).val(free_call.toFixed());
                            gtotal = parseFloat(total+sgstamt+cgstamt+igstamt-discount_sale);
                            if(isNaN(total)){ } else {
                                $("#total"+item).val(gtotal);
                                gtotal1();
                            }
                    }else{
                            $("#total"+item).val("");
                            
                    }
        }else{
            alert("Stock Limit Exits");
            $('#qty'+item).val('');

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
            var discount=parseFloat($('#discount'+i).val());
			
	   		var total=(parseFloat(purrate))*parseFloat(qty);
			var sgstamt  = parseFloat(( total * parseFloat(sgst))/100);
			var cgstamt  = parseFloat(( total * parseFloat(cgst))/100);
			var igstamt  = parseFloat(( total * parseFloat(igst))/100);
            var discount_sale  = parseFloat(( total * parseFloat(discount))/100);
			//var taxamt  = parseFloat(( total * parseFloat(vat))/100);
               // var total=$('#total'+i).val();
			   var gt=parseFloat(gt)+parseFloat(total);
				var gt1=parseFloat(gt1)+parseFloat(sgstamt)+parseFloat(cgstamt)+parseFloat(igstamt)-parseFloat(discount_sale);
                
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
            
				gtotal = parseFloat(stotal+gtot);
				
				
					$("#gtotal").val(parseFloat(gtotal).toFixed(2));
					
			}
            




        else{
            $("#stotal").val('00.00');
            $("#taxamount").val('00.00');
            $("#gtotal").val('00.00');
        }
    }
	
$('#cus_code').on('change',function()
{
	var cus = $(this).val();
	//alert(cus);
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




 $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });






</script>
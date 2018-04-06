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
                    <h2>Purchase Entry</h2>
                </div>
                <!-- END PAGE TITLE --> 
                               
                
                <!-- PAGE CONTENT WRAPPER -->
               <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Purchase/addPurchaseEntry');?>" method="post" >

                <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-body">
                                  
                               
<div class="panel-body">                                                                        
                                    
<div class="row">
<div class="col-md-6">
	 <div class="form-group">
        <label class="col-md-4 control-label">Vendor Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
           <select class="selectpicker form-control getdata_vend "    name="vendor_id" id="vendor_id" required  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                <option value="" disabled selected> SELECT </option>
				<?php foreach($vendor as $row){ ?>  
                <option value="<?php echo $row['vendor_ref_id']; ?>"><?php echo $row['vendor_name']; ?></option>
	        <?php } ?>
	        </select>                                       
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">PO No.<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8" id="add_po_no">
            <!-- <select class="selectpicker form-control getdata "  required multiple="multiple"   name="po_no" id="po_no" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
               <?php foreach($po_no as $row){ ?>  
                <option value="<?php echo $row['po_1_id']; ?>"><?php echo $row['po_no']; ?></option>
                <?php } ?>
            </select>
            <div class="error" ><?php echo form_error('po_no'); ?></div> -->                                       
        </div>
    </div>
     <!-- <div class="form-group">                                        
        <label class="col-md-4 control-label">PO Date</label>
        <div class="col-md-8">
            <input type="text" class="form-control datepicker "  required placeholder="Enter Date of Purchase" name="pdate" id="pdate" >
            <div class="error" ><?php echo form_error('pdate'); ?></div>                                               
        </div>
    </div> -->
</div>
<div class="col-md-6">
   
     <div class="form-group">                                        
        <label class="col-md-4 control-label">P. invoice Date</label>
        <div class="col-md-8">
            <input type="text" class="form-control datepicker "  required placeholder="Enter PO Date" name="podate" id="podate" value="">
            <div class="error" ><?php echo form_error('pdate'); ?></div>                                               
        </div>
    </div>
    
           
    <div class="form-group">                                        
        <label class="col-md-4 control-label">P. Invoice No<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
            <input type="text"   class="form-control  " required placeholder="Enter Invoice No"  name="vinvno" id="vinvno" value="<?php echo set_value('vinvno');  ?>">
            <div class="error" ><?php echo form_error('vinvno'); ?></div>                                               
        </div>
    </div>
    
  <div class="form-group">
        <label class="col-md-4 control-label">Storage Name<sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
         <select class="selectpicker form-control "    name="storage_id" id="storage_id" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    <option value="" disabled selected> SELECT </option>
                    <?php foreach($storage as $row){ ?>  
                                    <option value="<?php echo $row['cid']; ?>"><?php echo $row['storage_name'];echo "-";echo $row['Location']; ?></option>
                            <?php } ?>
                            </select>                                      
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
                                                    <th width="10%">Product/Hsn<sup  style="color:#f00"> * </sup></th>
                                                    <th width="7%">&nbsp;&nbsp;Batch No&nbsp;&nbsp;<sup style="color:#f00"> * </sup></th>
                                                    <th width="7%">manufacture Name<sup style="color:#f00"> * </sup></th>
                                                    <th width="7%">Expiry date</th>
                                                    <th width="7%">Unit Type<sup style="color:#f00"> * </sup></th>
                                                    <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;Qty&nbsp;&nbsp;&nbsp;&nbsp;<sup  style="color:#f00"> * </sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                    <th width="7%">Pur.Rate<sup  style="color:#f00"> * </sup></th>
                                                    <th width="7%">Amount<sup  style="color:#f00"> * </sup></th>
                                                    <th width="8%">SGST%<sup  style="color:#f00"> * </sup></th>
                                                    <th width="8%">CGST%<sup  style="color:#f00"> * </sup></th>
                                                    <th width="8%">IGST%<sup  style="color:#f00"> * </sup></th>
                                                  <!--   <th width="8%">Free<sup  style="color:#f00"> * </sup></th> --> 
                                                    <th width="4%">Discount<sup  style="color:#f00"> * </sup></th>
                                                    <th width="4%">Includ<sup  style="color:#f00"> * </sup></th>
                                                    <th width="4%">&nbsp;&nbsp;&nbsp;&nbsp;Free&nbsp;&nbsp;&nbsp;&nbsp;<sup  style="color:#f00"> * </sup></th>
                                                   
                                                    
                                                   
                                                    <th width="10%">Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                </tr>
											</thead>
        <tbody id="testid">

           <!--  <tr>
                 <td><input min="0"  type="text" required class="form-control  groupOfTexbox" name="batch_no[]" id="batch_no1" onchange="totalamt(1); "   required/> </td>
                <td class="forcedWidth">
          <select  class=" form-control itemsq2"  name="item_name1[]" id="item_name1_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option>       <?php foreach($item as $row){?><option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?>-<?php echo $row->hsn; ?></option><?php }?></select>
         
                </td>
                <td><input min="0"  type="text" required class="form-control  groupOfTexbox datepicker" name="e_date[]" id="e_date1" onchange="totalamt(1); "   required/> </td>
             <td >
                <select  class=" form-control "  name="unit[]" id="unit1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option>       <?php foreach($unit as $row){?><option value="<?php echo $row->id; ?>"><?php echo $row->location_name; ?></option><?php }?></select>
                </td>
                                                <td><input min="0"  type="text" required class="form-control  groupOfTexbox" name="qty[]" id="qty1" onchange="totalamt(1); "   required/> </td>
                                                 <td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="purrate[]" id="purrate1" onchange="totalamt(1); "  required/></td>
                                                  <td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="amount[]" id="amount1" onchange="totalamt(1); "  required/></td>

                                           
                 <td><input  type="text" required class="form-control  groupOfTexbox" name="sgst[]" id="sgst1" onchange="totalamt(1); "  value="0"  required/><br><input  type="text" required class="form-control  groupOfTexbox" name="sgst_amt[]" id="sgst_amt1"    readonly/>
				 </td>
                 <td><input   type="text" required class="form-control  groupOfTexbox" name="cgst[]" id="cgst1" onchange="totalamt(1); " value="0"   required/><br><input   type="text" required class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt1"    readonly/>  </td>
                 <td><input   type="text" required class="form-control  groupOfTexbox" name="igst[]" id="igst1" onchange="totalamt(1); " value="0"   required/><br><input   type="text" required class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt1"    readonly/>  </td>
                <!--  <td><input   type="text" step="any" class="form-control " name="free[]" id="free1"  required /></td>  
                 <td><input   type="text" step="any" class="form-control " name="discount[]" id="discount1"  required /></td>
                   
                  
                   
                   
                    
                   
                  
                
                    <td><input   type="text" step="any" class="form-control " name="total[]" id="total1"  required readonly/></td>
            </tr>

       -->  </tbody>
                                        </table><br>
<br>
<br>

                                        <table class="table" width="100%">
    <thead>
        <!--  <tr>
            <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="12%">Discount</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control"  name="discount" style="color:#000" id="discount"></td>
        </tr> -->
       
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
        
                                </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

							<input type="hidden" name="testno" id="testno" value="0"  />
							<input type="hidden" name="extratax" id="extratax" value="" />
							     <div class="panel-footer">                            
                                   <!--  <button class="btn btn-primary pull-left" type="button" style="margin-bottom:20px;" onclick="fnadd()">Add More</button>
                                    <button class="btn btn-warning pull-left" type="button" style="margin-bottom:20px;margin-left:10px;" onclick="fnremove()">Remove</button>   -->     
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

	$('body').on('change','#vendor_id',function(){
		var vend_id = $(this).val();
    $('.getdata').remove();
    $('.clearfield').remove();
		$.ajax({
			url:"<?php echo base_url() ?>index.php/Purchase/get_po_num/"+vend_id,
			type:"POST",
			dataType:"JSON",
			success:function(res){
				console.log(res);
				      var color_option ="";
		      if(res != ""){
		        $.each(res,function(k,v){
		                
		                color_option += '<option class="remove_vend_name" value="'+v.po_1_id+'">'+v.po_no+'</option>';
		                    
		        });
		        $('.getdata').remove();
		      $('#add_po_no').append('<select   class="selectpicker form-control item getdata"  name="po_no[]" multiple="multiple" id="po_no"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">'+color_option+'</select>');
		    $('.getdata').selectpicker('refresh');

		  }else{
		     $('#add_ven_det_'+$id).children().remove();
		  }
			}

		});

		//alert(vend_id);
	});

function add_vendor($id){
  var prd = $('#item_name1_'+$id).val();
  var vend = $('#vendor_id').val();
  $.ajax({
    url:"<?php echo base_url() ?>index.php/Purchase_create/get_rate_det/"+prd+"/"+vend,
    type:"POST",
    dataType:"JSON",
    success:function(res){
      console.log(res);
      $('#sgst'+$id).val(0);
       $('#cgst'+$id).val(0);
       $('#igst'+$id).val(0);
       $('#sgst_amt'+$id).val(0);
       $('#cgst_amt'+$id).val(0);
       $('#igst_amt'+$id).val(0);
       $('#hsn'+$id).val('');
      $('#purrate'+$id).val(0);
      $('#manu_name'+$id).val(0);
      $('#unit'+$id).val(0);
      $('#unit_id'+$id).val(0);

      $('#unit'+$id).val(res[0]['location_name']);
      $('#unit_id'+$id).val(res[0]['id']);
      $('#manu_name'+$id).val(res[0]['manu_name']);
      $('#hsn'+$id).val(res[0]['hsn_code']);
      $('#purrate'+$id).val(res[0]['price']);
      if(res[0]['tax_type'] == 1){
        var gst = res[0]['tax']/2;
        $('#sgst'+$id).val(gst);
       $('#cgst'+$id).val(gst);
      }else if(res[0]['tax_type'] == 2){
        $('#igst'+$id).val(res[0]['tax']);
      }
      totalamt($id);
    }
  });
  //alert(prd);
}
	  
	$(document).ready(function(){
      $('.x-navigation-minimize').trigger('click'); 
    });
	//Short menu navigation code//
	function fnadd() 
		{
			var supplier_id=$('#vname').val();
			//alert(supplier_id);
			//if(supplier_id != '') {					
				var num=$("#testno").val();
				a=parseInt(num) + 1;
				$("#testno").val(a);
				//alert('kaja');
				
				var inn=$("#payment_method_1").html();
				var inn=$("#item_name_1").html();
				$("#testid").append('<tr class="clearfield"><td class="forcedWidth"><select  class="selectpicker form-control itemsq2 " onchange="add_vendor('+a+')"  name="item_name1[]" id="item_name1_'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" disabled selected>Select</option><?php foreach($item as $row){?><option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?>-<?php echo $row->hsn_code; ?></option><?php } ?></select></td>'
                    +'<td><input min="0"  type="text" required class="form-control  groupOfTexbox" name="batch_no[]" id="batch_no'+a+'"  required/> </td>'
                    +'<td><input min="0"  type="text" required class="form-control   groupOfTexbox" name="manu_name[]" id="manu_name'+a+'"    required/> </td><input min="0"  type="hidden" required class="form-control   groupOfTexbox" name="po_item_id[]" id="po_item_id'+a+'"    required/> </td>'
                    +'<td><input min="0"  type="text"  class="form-control datepicker" name="e_date[]" id="e_date'+a+'" onchange="totalamt('+a+'); "   /> </td>'

		         +'<td ><input min="0"  type="text" required class="form-control   groupOfTexbox" name="unit[]" id="unit'+a+'"    required/><input min="0"  type="hidden" required class="form-control   groupOfTexbox" name="unit_id[]" id="unit_id'+a+'"    required/></td>'
                 +'<td ><input min="0"  type="text" required class="form-control   groupOfTexbox" name="qty[]" id="qty'+a+'" onchange="totalamt('+a+');"   required/></td>'
                 +'<td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="purrate[]" id="purrate'+a+'" onblur="totalamt('+a+'); "  required/></td>'
                 +'<td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" readonly name="amount[]" id="amount'+a+'" onblur="totalamt('+a+'); "  required/></td>'
				+'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="sgst[]" id="sgst'+a+'" value="0"  onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="sgst_amt[]" id="sgst_amt'+a+'"  readonly required /></td>'
				+'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="cgst[]" id="cgst'+a+'" value="0"   onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt'+a+'"  readonly required /></td>'
				+'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="igst[]" id="igst'+a+'" value="0"   onblur="totalamt('+a+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt'+a+'"  readonly required /></td>'
				+'<td ><input min="0"  type="text" onchange="totalamt('+a+')" step="any" class="form-control  groupOfTexbox" name="discount[]" id="discount'+a+'"  /></td>'
      +'<td ><label><input type="checkbox" onchange="checkfun('+a+')" id="include_pro'+a+'" name="include_pro[]" value="1">Option 1</label><input min="0"  type="hidden" step="any" class="form-control  groupOfTexbox" name="include_id[]" id="include_id'+a+'" value="0" /></td>'
				+'<td ><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="free_pro[]" id="free_pro'+a+'"  /></td>'
				+'<td><input min="0"  type="text" step="any" class="form-control " name="total[]" id="total'+a+'" required readonly/></td></tr>');
				
				$(".selectpicker").selectpicker('refresh');
                $(".datepicker").datepicker('refresh');
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
			var num=$("#testno").val();
				//num=parseInt(a) - 1;
				$("#testno").val(num);
				$('#mytable tr:eq('+num+')').remove();
                num2 = num-1;
                $('#testno').val(num2);
                gtotal1();
			
		}	
var names = [];
   $('body').on('change','.getdata',function(){
    
   var details=$(this).val();
    
    $.ajax({
        url : "<?php echo base_url()?>index.php/Purchase/get_correspond_details",
        type : "POST",
        data:{details:details},
        dataType : "JSON",
        success : function(result){
             console.log(result);
         //    alert(result.length);
         $('.clearfield').remove();

            // $('#vendor_id').val(result[0].vendor_ref_id);
             //$('#vendor_name').val(result[0].vendor_name);
            // $('#pdate').val(result[0].po_date);
             //$('#storage').val(result[0].storage_ref_id);
             $('#stotal').val(result[0].po_stotal);
             $('#gtotal').val(result[0].po_gtotal);
             $("#testno").val('');
             $("#testno").val(result.length);
             
             //$('#pdate').val(result.po_date);
                for (var i = 1; i <= result.length; i++) {
                   var a=i-1;
                    $("#testid").append('<tr class="clearfield"><td class="forcedWidth"><select  class="selectpicker form-control itemsq2 " onchange="add_vendor('+i+')"  name="item_name1[]" id="item_name1_'+i+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" disabled selected>Select</option><?php foreach($item as $row){?><option value="<?php echo $row->i_id; ?>"><?php echo $row->i_name; ?>-<?php echo $row->hsn_code; ?></option><?php } ?></select></td>'
                    +'<td><input min="0"  type="text" required class="form-control" name="batch_no[]" id="batch_no'+i+'"    required/><input min="0"  type="hidden" required class="form-control   groupOfTexbox" name="po_number[]" id="po_number'+i+'"    required/><input min="0"  type="hidden" required class="form-control   groupOfTexbox" name="po_number_date[]" id="po_number_date'+i+'"    required/> </td>'
                    +'<td><input min="0"  type="text" required class="form-control   groupOfTexbox" name="manu_name[]" id="manu_name'+i+'"    required/><input min="0"  type="hidden" required class="form-control   groupOfTexbox" name="po_item_id[]" id="po_item_id'+i+'"    required/> </td>'

                    +'<td><input min="0"  type="text"  class="form-control  datepicker" name="e_date[]" id="e_date'+i+'" onchange="totalamt('+i+'); "   /> </td>'

                 +'<td ><input min="0"  type="text" required class="form-control   groupOfTexbox" name="unit[]" id="unit'+i+'"    required/><input min="0"  type="hidden" required class="form-control   groupOfTexbox" name="unit_id[]" id="unit_id'+i+'"    required/></td>'
               +'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="qty[]" id="qty'+i+'"  onblur="totalamt('+i+'); " required /></td>'
                 +'<td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="purrate[]" id="purrate'+i+'" onblur="totalamt('+i+'); "  required/></td>'
                +'<td><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="amount[]" id="amount'+i+'" onblur="totalamt('+i+'); "  required/></td>'
                +'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="sgst[]" id="sgst'+i+'" value="0"  onblur="totalamt('+i+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="sgst_amt[]" id="sgst_amt'+i+'"  readonly required /></td>'
                +'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="cgst[]" id="cgst'+i+'" value="0"   onblur="totalamt('+i+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt'+i+'"  readonly required /></td>'
                +'<td><input min="1"  type="text" class="form-control  groupOfTexbox" name="igst[]" id="igst'+i+'" value="0"   onblur="totalamt('+i+'); " required /><br><input min="1"  type="text" class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt'+i+'"  readonly required /></td>'
                +'<td ><input min="0" onchange="totalamt('+i+');"  type="text" step="any" class="form-control  groupOfTexbox" name="discount[]" id="discount'+i+'" value="0" /></td>'
                +'<td ><label><input type="checkbox" onchange="checkfun('+i+')" id="include_pro'+i+'" name="include_pro[]" value="1">Option 1</label><input min="0" value="0"  type="hidden" step="any" class="form-control  groupOfTexbox" name="include_id[]" id="include_id'+i+'" value="0" /></td>'
                +'<td ><input min="0"  type="text" step="any" class="form-control  groupOfTexbox" name="free_pro[]" id="free_pro'+i+'"  /></td>'
                
                +'<td><input min="0"  type="text" step="any" class="form-control " name="total[]" id="total'+i+'" required readonly/></td></tr>');

                     $('#unit_id'+i).val(result[a].unit_ref_id);
                     $('#unit'+i).val(result[a].location_name);
                     $('#item_name1_'+i).val(result[a].pro_ref_id);
                     $('#manu_name'+i).val(result[a].manu_name);
                     $('#sgst'+i).val(result[a].po_sgst);
                     $('#cgst'+i).val(result[a].po_cgst);
                     $('#igst'+i).val(result[a].po_igst);
                     $('#purrate'+i).val(result[a].po_rate);
                     $('#amount'+i).val(result[a].po_amount);
                     $('#qty'+i).val(result[a].need_qty);
                     $('#sgst_amt'+i).val(result[a].po_sgstamt);
                     $('#cgst_amt'+i).val(result[a].po_cgstamt);
                     $('#igst_amt'+i).val(result[a].po_igstamt);
                     $('#total'+i).val(result[a].po_total);
                     $('#discount'+i).val(result[a].po_discount);
                     $('#free_pro'+i).val(result[a].po_free_qty);
                     $('#po_number'+i).val(result[a].po_no);
                     $('#po_number_date'+i).val(result[a].po_date);
                     $('#po_item_id'+i).val(result[a].po_2_id);
                     names.push(parseInt(result[a].pro_ref_id));
                localStorage.setItem("stock", JSON.stringify(names));
                          
                }
                $(".selectpicker").selectpicker('refresh');
                $(".datepicker").datepicker('refresh');

            
            
   }

    });


   });	
		
		function checkfun(id){
            //alert(id);
            if ($('#include_pro'+id).is(":checked"))
                {
                 $('#include_id'+id).val('1');
                }else{
                    $('#include_id'+id).val('0');
                }
        }
		
		
    function totalamt(item){
        var purrate=parseFloat($('#purrate'+item).val());
        var qty=parseFloat($('#qty'+item).val());
	    var sgst=parseFloat($('#sgst'+item).val());
		var cgst=parseFloat($('#cgst'+item).val());
		var igst=parseFloat($('#igst'+item).val());
    var discount=parseFloat($('#discount'+item).val());
        if(!isNaN(purrate) && !isNaN(qty) && qty!=0){
        //	var tax=(parseFloat(purrate)/100)*parseFloat(purtax);
        //	var total=(parseFloat(purrate)+parseFloat(tax))*parseFloat(qty);					
                var total=(parseFloat(purrate))*parseFloat(qty);
				var sgstamt  = parseFloat(( total * parseFloat(sgst))/100);
				var cgstamt  = parseFloat(( total * parseFloat(cgst))/100);
				var igstamt  = parseFloat(( total * parseFloat(igst))/100);
        var discount_sale  = parseFloat(( total * parseFloat(discount))/100);
				$("#amount"+item).val(total);
				$("#sgst_amt"+item).val(sgstamt);
				$("#cgst_amt"+item).val(cgstamt);
				$("#igst_amt"+item).val(igstamt);
				
				gtotal = parseFloat(total+sgstamt+cgstamt+igstamt-discount_sale);
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
        a=a;
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
<script type="text/javascript">

$(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  

$(document).on('change','.itemsq',function()
{
		var cus = $(this).val();
		var id= $(this).attr('id');
		sid = id.split('_');
		id = sid[2];
	//alert(id);
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_pro_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
				/*if(obj.minqty != '')
				{*/
					$('#minqty_'+id).val(obj.minqty);
					$('#maxqty_'+id).val(obj.maxqty);
				/*}*/
				
				
			}
		});
	}
});
$(document).on('change','.itemsq2',function()
{
	
	    var id= $(this).attr('id');
		sid = id.split('_');
		id = sid[2];
		var cus = $(this).val();
	//alert(id);
	if(cus!='')
	{
		$.ajax(
		{
			url:'<?php echo base_url('index.php/Purchase/get_pro_det');?>',
			type:'POST',
			data:{cus:cus},
			success: function(result)
			{
				var obj = jQuery.parseJSON(result);
				//alert('obj');
				if(obj.minqty != '')
				{
					$('#minqty_'+id).val(obj.minqty);
					$('#maxqty_'+id).val(obj.maxqty);
				}
				
				
			}
		});
	}
});

</script>
	 
</body>
</html>
   



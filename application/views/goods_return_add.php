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
                    <h2>Goods Return Add</h2>
                </div>
                <!-- END PAGE TITLE --> 
                               
                
                <!-- PAGE CONTENT WRAPPER -->
               <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Return_det/add_goods_return_order');?>" method="post" >

                <div class="row">                       
             <div class="col-md-12">
              
                            <!-- START DEFAULT DATATABLE -->
                          <div class="panel panel-default" >
                           <div class="panel-body" >
                              <div class="" >
                                <table class="table" id="mytable">
                                  <thead>
                                    <tr>
                                        <th width="7%">Product<sup  style="color:#f00"> * </sup></th>
                                        <th width="7%">Batch<sup  style="color:#f00"> * </sup></th>
                                        <th width="7%">Vendor Name<sup style="color:#f00"> * </sup></th>
                                        <th width="7%">Invoice No<sup style="color:#f00"> * </sup></th>
                                        <th width="8%">Stock Qty<sup  style="color:#f00"> * </sup></th>
                                        <th width="7%">Pur.Rate inc.tax<sup  style="color:#f00"> * </sup></th>
                                        <th width="7%">Return Qty<sup  style="color:#f00"> * </sup></th>
                                        <th width="7%">Return Amount<sup  style="color:#f00"> * </sup></th>
                                        
                                    </tr>
                                  </thead>
                            <tbody id="testid">
                             <tr>
                            <td class="forcedWidth">
                                 <select onchange="add_vendor(1)" class="selectpicker form-control itemsq2"  name="item_name1[]" id="item_name1_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option><?php foreach($stock_product as $row){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'];echo"-";echo $row['manu_name']; ?></option><?php }?></select>
                            </td>
                            <td id="add_batch_1"></td>
                            <td id="add_vendor_1"></td>
                            <td id="add_invoice_1"></td>
                            <td id="add_curr_qty_1"></td>
                            <td id="add_purrate_1"><input min="0"  type="hidden" step="any" class="form-control  groupOfTexbox" name="purrate[]" readonly id="purrate1" onchange="totalamt(1); "  required/><input min="0"  type="hidden" step="any" class="form-control  groupOfTexbox" name="stock_id[]" readonly id="stock_id1" onchange="totalamt(1); "  required/></td>

                            <td id="add_amount_1"><input min="0"  type="text" required class="form-control  groupOfTexbox" name="qty[]" id="qty1" onchange="totalamt(1); "   required/><input min="0"  type="hidden" required class="form-control  groupOfTexbox" name="qty_ref[]" id="qty_ref1" onchange="totalamt(1); "   required/></td>

                            <td id="add_sgst_1"><input   type="text" step="any" class="form-control " name="total[]" id="total1"  required readonly/><input min="0"  type="hidden" step="any" class="form-control  groupOfTexbox" readonly name="amount[]" id="amount1" onchange="totalamt(1); "  required/><input  type="hidden" required class="form-control  groupOfTexbox" name="sgst[]" readonly id="sgst1" onchange="totalamt(1); "  value="0"  required/><br><input  type="hidden" required class="form-control  groupOfTexbox" name="sgst_amt[]" id="sgst_amt1"    readonly/></td>

                            <td id="add_cgst_1"><input   type="hidden" required class="form-control  groupOfTexbox" name="cgst[]" readonly id="cgst1" onchange="totalamt(1); " value="0"   required/><br><input   type="hidden" required class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt1"    readonly/></td>
                            <td id="add_igst_1"><input   type="hidden" required class="form-control  groupOfTexbox" name="igst[]" readonly id="igst1" onchange="totalamt(1); " value="0"   required/><br><input   type="hidden" required class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt1"    readonly/></td>
                            <td id="add_total_1"></td>
                            <td id="add_discount_1"><input min="0"  type="hidden" required class="form-control  groupOfTexbox" onchange="totalamt(1); " name="discount[]" value="0" id="discount1"    required/></td>
                            <td id="add_free_1"><input min="0"  type="hidden" value="0" required class="form-control  groupOfTexbox" name="free[]" id="free1"    required/></td>
                           </tr>
                         </tbody>
                      </table><br>
                          <br>
                          <br>

                                        <table class="table" width="100%">
    <thead>
       
        <tr>
            <!-- <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="15%">Total(Before Tax)</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" name="stotal" style="color:#000" readonly id="stotal"></td> -->
        </tr>
    
        <tr>
           <!--  <td colspan="9" width="75%"><button type="button" style="visibility:hidden;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="opener" ></button></td>
            <td style="font-weight:bold;" width="15%">Grand Total(After Tax)</td>
            <td style="font-weight:bold;" ><input type="text" class="form-control" readonly name="gtotal" style="color:#000" id="gtotal"></td> -->
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

function add_vendor($id){
  var data = $('#item_name1_'+$id).val();
  //alert(data);
  $.ajax({
    url:"<?php echo base_url() ?>index.php/Return_det/get_batch/"+data,
    type:"POST",
    dataType:"JSON",
    success:function(res){
      console.log(res);
      var color_option ="";
      if(res != ""){
        $.each(res,function(k,v){
                
                color_option += '<option class="remove_vend_name" value="'+v.batch_num+'">'+v.batch_num+'</option>';
                    
        });
        $('#add_batch_'+$id).children().remove();
        $('#add_vendor_'+$id).children().remove();
        $('#qty'+$id).val('');
        $('#total'+$id).val('');
        $('.clear_'+$id).remove();
      $('#add_batch_'+$id).append('<select onchange="vendor_fun('+$id+')"  class="selectpicker form-control item batch"  name="batch[]" id="batch_'+$id+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" disabled selected >Select</option>'+color_option+'</select>');
    $('.batch').selectpicker('refresh');

  }else{
     $('#add_batch_'+$id).children().remove();
  }
      
    }
  });
}
function vendor_fun($id){
  var data1 = $('#item_name1_'+$id).val();
  var data2 = $('#batch_'+$id).val();
  //alert(data2);
  $.ajax({
    url:"<?php echo base_url() ?>index.php/Return_det/get_vendor/"+data1+"/"+data2,
    type:"POST",
    dataType:"JSON",
    success:function(res){
      console.log(res);
      var color_option ="";
      if(res != ""){
        $.each(res,function(k,v){
                
                color_option += '<option class="remove_vend_name" value="'+v.vender_refff_id+'">'+v.vendor_name+'</option>';
                    
        });
        $('#add_vendor_'+$id).children().remove();
      $('#add_vendor_'+$id).append('<select onchange="get_data_fun('+$id+')"  class="selectpicker form-control item vendor"  name="vendor[]" id="vendor_'+$id+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"><option value="" disabled selected >Select</option>'+color_option+'</select>');
    $('.vendor').selectpicker('refresh');

  }else{
     $('#add_vendor_'+$id).children().remove();
  }
      
    }
  });
}


function get_data_fun($id){
  var pro = $('#item_name1_'+$id).val();
  var batch = $('#batch_'+$id).val();
  var vendor = $('#vendor_'+$id).val();
  $.ajax({
    url:"<?php echo base_url() ?>index.php/Return_det/get_inv_date/"+pro+"/"+batch+"/"+vendor,
    type:"POST",
    dataType:"JSON",
    success:function(res){
      console.log(res);
      $('.clear_'+$id).remove();
      $('#add_invoice_'+$id).append('<span class="clear_'+$id+'">'+res[0]['vinvno']+'</sapn>');
      $('#add_curr_qty_'+$id).append('<span class="clear_'+$id+'">'+res[0]['curr_qty']+'</sapn>');
      var rate1 = parseFloat(res[0]['p_rate']/100);
      var cgst = parseFloat(res[0]['cgst']);
      var sgst = parseFloat(res[0]['sgst']);
      var igst = parseFloat(res[0]['igst']);
      var tax = parseFloat(cgst+sgst+igst)*rate1;
      var rate = parseFloat(parseFloat(res[0]['p_rate'])+parseFloat(tax));
      $('#add_purrate_'+$id).append('<span class="clear_'+$id+'">'+rate+'</sapn>');
      $('#purrate'+$id).val(res[0]['p_rate']);
      $('#sgst'+$id).val(res[0]['sgst']);
      $('#cgst'+$id).val(res[0]['cgst']);
      $('#igst'+$id).val(res[0]['igst']);
      $('#discount'+$id).val(0);
      $('#qty_ref'+$id).val(res[0]['curr_qty']);
      $('#stock_id'+$id).val(res[0]['stock_id']);

      
    }
  });
  //alert(prd);
}
    
  
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
        
        var inn=$("#payment_method_1").html();
        var inn=$("#item_name_1").html();
        $("#testid").append('<tr><td class="forcedWidth"><select onchange="add_vendor('+a+')" class="selectpicker form-control itemsq2"  name="item_name1[]" id="item_name1_'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option><?php foreach($stock_product as $row){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'];echo"-";echo $row['manu_name']; ?></option><?php }?></select></td>'
        +'<td id="add_batch_'+a+'"></td><td id="add_vendor_'+a+'"></td><td id="add_invoice_'+a+'"></td><td id="add_curr_qty_'+a+'"></td>'

        +'<td id="add_purrate_'+a+'"><input min="0"  type="hidden" step="any" class="form-control  groupOfTexbox" name="purrate[]" readonly id="purrate'+a+'" onchange="totalamt('+a+'); "  required/><input min="0"  type="hidden" step="any" class="form-control  groupOfTexbox" name="stock_id[]" readonly id="stock_id'+a+'" onchange="totalamt('+a+'); "  required/></td>'

        +'<td id="add_amount_'+a+'"><input min="0"  type="text" required class="form-control  groupOfTexbox" name="qty[]" id="qty'+a+'" onchange="totalamt('+a+'); "   required/><input min="0"  type="hidden" required class="form-control  groupOfTexbox" name="qty_ref[]" id="qty_ref'+a+'" onchange="totalamt('+a+'); "   required/></td>'

         +'<td id="add_sgst_'+a+'"><input   type="text" step="any" class="form-control " name="total[]" id="total'+a+'"  required readonly/><input min="0"  type="hidden" step="any" class="form-control  groupOfTexbox" readonly name="amount[]" id="amount'+a+'" onchange="totalamt('+a+'); "  required/><input  type="hidden" required class="form-control  groupOfTexbox" name="sgst[]" readonly id="sgst'+a+'" onchange="totalamt('+a+'); "  value="0"  required/><br><input  type="hidden" required class="form-control  groupOfTexbox" name="sgst_amt[]" id="sgst_amt'+a+'"    readonly/></td>'

      +' <td id="add_cgst_'+a+'"><input   type="hidden" required class="form-control  groupOfTexbox" name="cgst[]" readonly id="cgst'+a+'" onchange="totalamt('+a+'); " value="0"   required/><br><input   type="hidden" required class="form-control  groupOfTexbox" name="cgst_amt[]" id="cgst_amt'+a+'"    readonly/></td>'
      +'<td id="add_igst_'+a+'"><input   type="hidden" required class="form-control  groupOfTexbox" name="igst[]" readonly id="igst'+a+'" onchange="totalamt('+a+'); " value="0"   required/><br><input   type="hidden" required class="form-control  groupOfTexbox" name="igst_amt[]" id="igst_amt'+a+'"    readonly/></td>'
      +'<td id="add_total_'+a+'"></td><td id="add_discount_'+a+'"><input min="0"  type="hidden" required class="form-control  groupOfTexbox" onchange="totalamt('+a+'); " name="discount[]" value="0" id="discount'+a+'"    required/></td>'
      +'<td id="add_free_'+a+'"><input min="0"  type="hidden" value="0" required class="form-control  groupOfTexbox" name="free[]" id="free'+a+'"    required/></td>'
        +'</tr>');
        
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
        gtotal1();
      }
    }   
    
    
    
    
    function totalamt(item){
        var purrate=parseFloat($('#purrate'+item).val());
        var qty=parseFloat($('#qty'+item).val());
        var qty_ref=parseFloat($('#qty_ref'+item).val());
      var sgst=parseFloat($('#sgst'+item).val());
    var cgst=parseFloat($('#cgst'+item).val());
    var igst=parseFloat($('#igst'+item).val());
    var discount=parseFloat($('#discount'+item).val());
    if(qty_ref >= qty){
      if(!isNaN(purrate) && !isNaN(qty) && qty!=0){
        //  var tax=(parseFloat(purrate)/100)*parseFloat(purtax);
        //  var total=(parseFloat(purrate)+parseFloat(tax))*parseFloat(qty);          
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
      }else{
        alert("Exit Stock Level");
        $('#qty'+item).val('');
        $('#total'+item).val('');
        $('#qty'+item).focus();
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
  



</script>
   
</body>
</html>
   



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
                    <h2>Add Free Products</h2>
                </div>
                <!-- END PAGE TITLE --> 
                               
                
                <!-- PAGE CONTENT WRAPPER -->
               <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Stocklist/add_free_product_stock');?>" method="post" >

                <div class="row">                       
             <div class="col-md-12">
              
                            <!-- START DEFAULT DATATABLE -->
                          <div class="panel panel-default">
                           <div class="panel-body">
                              <div class="">
                                <table class="table" id="mytable">
                                  <thead>
                                    <tr>
                                       <th width="7%">Vendor Name<sup style="color:#f00"> * </sup></th>
                                        <th width="7%">Product/Hsn<sup  style="color:#f00"> * </sup></th>
                                         <th width="7%">Batch No<sup  style="color:#f00"> * </sup></th>
                                          <th width="7%">Expired Date<sup  style="color:#f00"> * </sup></th>
                                        <th width="8%">Qty<sup  style="color:#f00"> * </sup></th>
                                        <th width="10%">Free Producut</th>
                                    </tr>
                                  </thead>
                            <tbody id="testid">
                             <tr>
                            
                             <td>
                                 <select onchange="add_vendor(1)" class="selectpicker form-control itemsq2"  name="vendor[]" id="vendor1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option><?php foreach($vendor_list as $row){?><option value="<?php echo $row['vendor_id']; ?>"><?php echo $row['vendor_name']
                                 ?></option><?php }?></select>
                            </td>
                            <td >
                                 <select class="selectpicker form-control itemsq2"  name="item_name1[]" id="item_name1_1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option><?php foreach($product_list as $row){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name']; ?></option><?php }?></select>
                            </td>
                            <td>
                              <input min="0"  type="text" required class="form-control  groupOfTexbox" name="batch[]" id="batch1"   required/> 
                            </td>
                            <td>
                              <input min="0"  type="text"  class="form-control  datepicker" name="exp_date[]" id="exp_date1" /> 
                            </td>
                            <td>
                              <input min="0"  type="text" required class="form-control  groupOfTexbox" name="qty[]" id="qty1" onchange="totalamt(1); "   required/> 
                            </td>
                            <td>
                              <input min="0"  type="text" value="0" required class="form-control  groupOfTexbox" name="free[]" id="free1"    required/> 
                            </td>
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
                                    <button id="free_pro_cl" class="btn btn-primary pull-right" type="submit"  style="margin-bottom:20px;" >Submit</button>
                  
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

  var names=[];
$('body').on('click','#free_pro_cl',function(){
 
  var a=$("#testno").val();
  
  for ($j=1; $j < a ; $j++) {
    var pro=$("#item_name1_"+$j).val();
     //+alert(pro);
    names.push(parseInt(pro));
    localStorage.setItem("stock", JSON.stringify(names));
  }
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
        
        var inn=$("#payment_method_1").html();
        var inn=$("#item_name_1").html();
        $("#testid").append('<tr><td><select  class="selectpicker form-control itemsq2"  name="vendor[]" id="vendor'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option><?php foreach($vendor_list as $row){?><option value="<?php echo $row['vendor_id']; ?>"><?php echo $row['vendor_name'] ?></option><?php }?></select></td>'
          +'<td><select  class="selectpicker form-control itemsq2"  name="item_name1[]" id="item_name1_'+a+'"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value="" disabled selected>Select</option><?php foreach($product_list as $row){?><option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name'];?></option><?php }?></select></td>'
          +'<td><input min="0"  type="text" required class="form-control  groupOfTexbox" name="batch[]" id="batch'+a+'"  required/> </td>'
          +'<td><input min="0"  type="text" class="form-control  datepicker" name="exp_date[]" id="exp_date'+a+'"/> </td>'
        +'<td><input min="0"  type="text" required class="form-control  groupOfTexbox" name="qty[]" id="qty'+a+'" onchange="totalamt('+a+'); "   required/> </td>'
       
        +'<td><input min="0" value="0"  type="text" required class="form-control  groupOfTexbox" name="free[]" id="free'+a+'"    required/></td>'
        +'</tr>');
        
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
      var sgst=parseFloat($('#sgst'+item).val());
    var cgst=parseFloat($('#cgst'+item).val());
    var igst=parseFloat($('#igst'+item).val());
    var discount=parseFloat($('#discount'+item).val());
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
   



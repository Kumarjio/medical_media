<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

      <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Expenses_master/add_expenses_detail');?>" method="post">

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Expenses</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                  <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Add Entry</h3>
                               
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                    
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Voucher NO</label>
                                                <div class="col-md-8">  
                                                <?php $id = $this->db->select('max(exp_id)')->from('tbl_expenses')->get()->result_array();  ?>                                          
                                                   <input type="text" class="form-control " readonly  required name="voc_no" id="voc_no" style="color:#000;" value="<?php echo "Voc";echo $id[0]['max(exp_id)']+1;  ?>">                                        
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Voucher Date<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                     <input required type="text" class="form-control datepicker" name="voc_date" id="voc_date" value="<?php echo date('Y-m-d'); ?>">                                        
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
                                                <label class="col-md-4 control-label">Expenses Type <sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-8">
                                                    
                                                    <select class="selectpicker form-control" name="exp_type" id="exp_type" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <?php foreach($expenses as $exp){?>
                                                    <option value="<?php echo $exp['expenses_id'];?>"><?php echo $exp['expenses_type'];?></option>
                                                    <?php } ?>

                                                </select>
                                                    <div class="error" ><?php echo form_error('cus_code'); ?></div>                                               
                                                </div>
                                            </div>

                      <div class="form-group ">
                          <label class="col-md-4 control-label">Purchase Mode<sup  style="color:#f00"> * </sup></label>
                          <div class="col-md-8">
                             <select class="selectpicker form-control "    name="payment_mode" id="payment_mode" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                  <option value="" disabled selected>Select</option>
                                  <option value="cash" >Cash</option>
                                  <option value="card" >Card</option>
                                  <option value="cheque" >Cheque</option>
                                  <option value="rtgs" >RTGS</option>
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
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3>Add Expenses</h3>
                            
                          
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        <table class="table" id="mytable">
<thead>
    <tr>
        <th><label class="control-label">Employee Name<sup  style="color:#f00"> * </sup></label></th>
        
        <th><label class="control-label">Amount<sup  style="color:#f00"> * </sup></label></th>
        <th><label class="control-label">Remarks<sup  style="color:#f00"> * </sup></label></th>
      </tr>
  </thead>    
 <tbody id="testid">
   
        
       

  
    <tr>
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                          
                                          <td>  
                                          <div class="form-group">
                                               
                                                <div >                                            <select class="selectpicker form-control" name="employee_name[]" id="employee_name1" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <?php foreach($emp as $employee){?>
                                                    <option value="<?php echo $employee['admin_id'];?>"><?php echo $employee['name'];?></option>
                                                    <?php } ?>

                                                </select>
                                                       
                                                <div class="error" ><?php echo form_error('customer_code'); ?></div>                                       
                                                </div>
                                            </div>
                                        </td>

                                            </div>
                                            <div class="col-md-6">
                                          
                                          
                                          <td>
                                            <div class="form-group">
                                                
                                                                                       
                                                    <input type="text" class="form-control uppercase" style="color:#000;" name="ex_amount[]" required placeholder="Enter Amount" onchange="gettotal()" id="ex_amount1" value=""> 
                                                       
                                                <div class="error" ><?php echo form_error('customer_code'); ?></div>                                       
                                                </div>
                                            </div>
                                            </td>
                                            <td>
                                          <div class="form-group">
                                                                            
                                                    <input type="text" class="form-control uppercase" style="color:#000;" name="ex_remarks[]" required placeholder="Enter Remarks" id="ex_remarks1" value=""> 
                                                       
                                                <div class="error" ><?php echo form_error('customer_code'); ?></div>                                       
                                                </div>
                                            </div>

                                         </td>
                                          
                                          	<div class="form-group pull-right">                                        
                                               
                                            </div> 
                                            
                                            
                                            
                                            
                                        </div>
                                      </div>
                                  </tr>
                              </tbody>
                         <tfoot>
                           <tr>
                              <th></th>
                              <th style="text-align: right;">Total</th>
                              <th><input type="text" class="form-control" name="gtotal" id="gtotal" readonly required></th>                             
                           </tr>
                           <tr>
                              <th></th>
                              <th style="text-align: right;">Payment Details</th>
                              <th><input type="text" class="form-control" name="payment_details" id="payment_details"  required></th>                             
                           </tr>
                         </tfoot>
                      </table>
                      <input type="hidden" name="testno" id="testno" value="2"  />
                       
                      <div class="panel-footer">                            
                                    <button class="btn btn-primary pull-left" type="button" style="margin-bottom:20px;" onclick="fnadd()">Add More</button>
                                    <button class="btn btn-warning pull-left" type="button" style="margin-bottom:20px;margin-left:10px;" onclick="fnremove()">Remove</button>       
                                      <div class="btn-group pull-left col-md-12" style="margin-left: 86%;">                                           <input class="btn btn-primary" value="Submit" type="submit" name="submit">
                                                
</div>                          
                                 
                  
                                </div>
                                        
                                    </div>
                                    

                                </div>
                               
                           
                           
                             </div>
                        </div>
                

                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
     </form>
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>

<script type="text/javascript">
    function fnadd() 
    {
          
        var a=$("#testno").val();
        num=parseInt(a) + 1;
        $("#testno").val(num);
        //alert('kaja');
        
        var inn=$("#payment_method_1").html();
        var inn=$("#item_name_1").html();
        $("#testid").append('<tr>'
       
        +'<td> <select class="selectpicker form-control" name="employee_name[]" id="employee_name'+a+'">   <option value="" selected disabled required>Select</option>     <?php foreach($emp as $employee){?>   <option value="<?php echo $employee['admin_id'];?>"><?php echo $employee['name'];?></option> <?php } ?></select></td>'
        
         +'<td><div class="form-group"> <input type="text" class="form-control uppercase" style="color:#000;" name="ex_amount[]" required placeholder="Enter Amount" id="ex_amount'+a+'" onchange="gettotal()" value=""></div> </td>'
        +'<td><div class="form-group"><input type="text" class="form-control uppercase" style="color:#000;" name="ex_remarks[]" required placeholder="Enter Remarks" id="ex_remarks'+a+'" value=""></div> </td>'
       
        +'</tr>');
        
        $(".selectpicker").selectpicker('refresh');
        $(".groupOfTexbox").keypress(function (event) {
             return isNumber(event, this)
        }); 
        // gettotal();
        
     
    }
     function fnremove() 
    {
      //alert('fasd');
      var a=$("#testno").val();
      if(a>=1){
        
        num=parseInt(a) - 1;
        $("#testno").val(num);
        $('#mytable tr:eq('+num+')').remove();
      
      }
       gettotal();
    }
  
  $( function() {
    $( ".datepickerrr" ).datepicker();
  } );
  function gettotal(){
        var a=$("#testno").val();
        a=a-1;
        var gt=0;
     var gt1=0;
        for(i=1;i<=a;i++){
      var amount=parseFloat($('#ex_amount'+i).val()); 
      var gt=parseFloat(gt)+parseFloat(amount);
                
        }
       
    var stotal = gt;
    if(stotal == '')
      {
        stotal = '00.00';
      }
        
        if(stotal!=''){
            $("#gtotal").val(stotal);
      }else{
            $("#gtotal").val('00.00');
        }
    }
 
</script>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

 <?php
if(isset($inps['type']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
	 $type = $inps['type'];
	 }
else
{
	$type = '';
}
	 ?>   

                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3 class="pull-left">Edit Enduser Product Rate</h3>
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url()?>index.php/Enduser/updateprice/<?php echo $price[0]['enduser_id']  ?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
<div class="col-md-4">
<div class="form-group">
        <label class="col-md-4 control-label">Customer <sup  style="color:#f00"> * </sup></label>
        <div class="col-md-8">
            <select class="selectpicker form-control "    name="vname" id="vname" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    <option value="<?php echo $price[0]['customer_id'] ?>"  selected><?php echo $price[0]['customer_name'] ?></option>
                    <?php foreach($customer as $row){ ?>  
                                    <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_name']; ?></option>
                            <?php } ?>
                            </select>
            <div class="error" ><?php echo form_error('vname'); ?></div>                                       
        </div>
    </div>
</div>

    
    
    
    <div class="col-md-4">
    
    <div class="form-group " >                                        
        <label class="col-md-4 control-label"> Product  </label>
       
       <div class="col-md-8 " >
                <select class="selectpicker form-control"     name="pname1" id="pname1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                          <option value="<?php echo $price[0]['i_id'] ?>"  selected><?php echo $price[0]['i_name'];echo "-";echo $price[0]['hsn_code']; ?></option>        
                    <?php foreach($get_product as $row)
					{ 
						
						?>
                        
                        <option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name']; ?>-<?php echo $row['hsn_code']; ?></option>
							<?php 
						
					}?>
                            </select> 
                            </div>
                           
                                
                    </div></div>
                    <div class="col-md-4">

                    <div class="form-group">                                        
                        <label class="col-md-4 control-label">Pro.Rate<sup  style="color:#f00"> * </sup> </label>
                        <div class="col-md-8">
                                <input type="text" required class="form-control " style="color:#000;" value="<?php echo $price[0]['enduser_price'] ?>"   placeholder="Enter Product Rate" name="price" id="price" >
                            <div class="error" ><?php echo form_error('i_code'); ?></div>                                               
                        </div>
                    </div>


                    </div>



                    </div>
                                                        
                    </div>
                                                    
                    <div class="form-group ">                                        
                    <div class="btn-group pull-right col-md-12"><input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
                    <input class="btn btn-primary pull-right" value="Submit" type="submit"> 	
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

$('body').on('change','#pname1',function(){
    var pro_id = $(this).val();
    $.ajax({
        url:'<?php echo base_url() ?>index.php/Enduser/get_comm_rate/'+pro_id,
        type:'POST',
        dataType:'JSON',
        data:{pro_id:pro_id},
        success:function(res){
            console.log(res);
            $('#price').val(res[0]['comm_rate']);
        }
    });
});
/*$('#type').on('change',function()
{
	var types = $(this).val();
	//alert(types);
	$('.no_disp').hide();
	$('#disp_id'+types).show();
	//var id= $('.prod_all_'+types).attr('id');
	$('.all_products').attr( "disabled", true );
	$('.prod_all_'+types).attr( "disabled", false );
	//id.attr("disabled", "true");
});*/

</script>   


<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> <a href="<?php echo base_url('index.php/Product'); ?>">Manage Statutory</a></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3 class="pull-left">Add Statutory</h3>
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Statutory/adddata');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
<div class="col-md-6">

    
<div class="form-group">                                        
        <label class="col-md-4 control-label">Product Type<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
         <?php $cs_master = $this->db->query("select * from pro_type")->result_array(); ?>
                                                	<select name="type" id="type" class="selectpicker form-control uppercase bs-select-hidden" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    <option disabled selected value="">Select Product Type</option>
                                                    <?php foreach($cs_master as $val) { ?>
                                                    <option value="<?=$val['id']?>"><?=$val['type_name']?></option>
                                                    <?php } ?>
                                                  </select>
        
        
               <?php /*?> <select class="selectpicker form-control required uppercase bs-select-hidden" name="type" id="type">
                <option value="1">Laptop</option>
                <option value="2">Moblie</option>
                
                </select>    <?php */?>                                        
        </div>
    </div>
    <?php /*?><div class="form-group">                                        
        <label class="col-md-4 control-label">Tax Type<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
                <select class="selectpicker form-control required uppercase bs-select-hidden" name="taxtype" id="taxtype">
                <option value="" selected disabled>Select Type</option>
                <option value="1">VAT</option>
                <option value="2">CST</option>
                <option value="3">Serivce Tax</option>
                </select>                                            
        </div>
    </div><?php */?>
    <div class="form-group cst" >                                        
        <label class="col-md-4 control-label">CST<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
                <input type="text"  class="form-control uppercase" style="color:#000;"   placeholder="Enter CST" name="cst" id="cst" >
            <div class="error" ><?php echo form_error('i_code'); ?></div>                                               
        </div>
    </div>
    <div class="form-group vat" >                                        
        <label class="col-md-4 control-label">Vat<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
                <input type="text"  class="form-control uppercase" style="color:#000;"   placeholder="Enter Vat" name="vat" id="vat" >
            <div class="error" ><?php echo form_error('i_code'); ?></div>                                               
        </div>
    </div>
    <div class="form-group service" >                                        
        <label class="col-md-4 control-label">Serivce Tax<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
                <input type="text"  class="form-control uppercase" style="color:#000;"   placeholder="Enter Serivce Tax" name="service_tax" id="service" >
            <div class="error" ><?php echo form_error('i_code'); ?></div>                                               
        </div>
    </div>
   
    
    
    <!--<div class="form-group" >
        <label class="col-md-4 control-label">Amount</label>  
        <div class="col-md-6">
            <input type="number" class="form-control uppercase" placeholder="Enter the Amount" name="amount" id="amount" />
          <div class="error" ><?php echo form_error('amount'); ?></div>	
        </div>
    </div>-->
    
</div>
 

    
</div>
                                        
</div>
                                    
<div class="form-group ">                                        
    <div class="btn-group pull-right col-md-12"><input class="btn btn-primary" value="Submit" type="submit">	
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
$('#taxtype').on('change',function()
{
	var val = $(this).val();
	if(val == '1')
	{ 
		$('.vat').show();
		$('.cst').hide();
		$('.service').hide();
	}
	else if(val == '2')
	{ 
		$('.cst').show();
		$('.service').hide();
		$('.vat').hide();
	}
	else
	{
		$('.service').show();
		$('.cst').hide();
		$('.vat').hide();
	}
});
</script>   


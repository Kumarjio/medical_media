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

     <!-- PAGE TITLE -->
                <?php /*?><div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Add Product Rate</h2>
                </div><?php */?>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3 class="pull-left">Add Product Rate</h3>
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/PriceList/addprice');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
<div class="col-md-6">

<div class="form-group">                                        
        <label class="col-md-4 control-label">Select Product Type </label>
        <div class="col-md-8">
        <?php $cs_master = $this->db->query("select * from pro_type")->result_array(); ?>
                                                	<select name="type" id="type" class="selectpicker form-control uppercase type" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    <!--<option disabled selected value="">Select Product Type</option>-->
                                                    <?php foreach($cs_master as $val) { ?>
                                                    <option value="<?=$val['id']?>"><?=$val['type_name']?></option>
                                                    <?php } ?>
                                                  </select>
        
        
                <?php /*?><select class="selectpicker form-control uppercase type"    name="type" id="type"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                               <option value="1">Laptop</option>
                                               <option value="2">Mobile</option>
                            </select> <?php */?>                                              
        </div>
    </div>
    
    
    
    
    
    <div class="form-group" >                                        
        <label class="col-md-4 control-label">Select Product Name </label>
       
       <?php $temp_id = 0; foreach($cs_master as $val) { ?>
       <div class="col-md-8 no_disp" id="disp_id<?=$val['id']?>" <?=($temp_id > '0')?'style="display:none"':''?>>
                <select class="selectpicker form-control uppercase"     name="pname1" id="pname1"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                  
                    <?php foreach($get_product as $row)
					{ 
						if($val['id'] == $row['i_category'])
						{
						?>	
                        <option value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name']; ?>-<?php echo $row['ime_serial']; ?></option>
							<?php 
						}
					}?>
                            </select> 
                            </div>
                            <?php
							$temp_id++; 
							} ?> 
                                
    </div>
<?php /*?><div class="form-group">                                        
        <label class="col-md-4 control-label">Select Storage Name </label>
        <div class="col-md-6">
                <select class="selectpicker form-control uppercase"    name="sname" id="sname"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                    <option value="" disabled selected> SELECT </option>
                    <?php ?>	<?php foreach($get_storage as $row){ ?>	
                                    <option value="<?php echo $row->cid; ?>"><?php echo $row->storage_name; ?></option>
                            <?php } ?><?php ?>
                            </select>                                               
        </div>
    </div><?php */?>
    <div class="form-group">                                        
        <label class="col-md-4 control-label">Product Rate<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-8">
                <input type="text" required class="form-control uppercase" style="color:#000;"   placeholder="Enter Product Rate" name="price" id="price" >
            <div class="error" ><?php echo form_error('i_code'); ?></div>                                               
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Description</label>  
        <div class="col-md-8">
            <textarea type="text"  class="form-control uppercase" placeholder="Enter Description" name="descr" id="descr"></textarea>
            <span class="help-block"></span>
          <div class="error" ><?php echo form_error('descr'); ?></div>	
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


$('#type').on('change',function()
{
	var types = $(this).val();
	//alert(types)
	$('.no_disp').hide();
	$('#disp_id'+types).show();
});

</script>   


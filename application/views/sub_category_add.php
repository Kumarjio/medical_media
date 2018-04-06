<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="row">
                        <div class="col-md-12">
                        
                        <div class="panel panel-default">
                                <div class="panel-body">
                                <h3 class="pull-left">Add Sub Category</h3>
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Product/sub_category_add');?>" method="post">
                            
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
<div class="col-md-6">
    <div class="form-group">                                        
        <label class="col-md-4 control-label">Category Name<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
        <?php $cs_master = $this->db->query("select * from tbl_category")->result_array(); ?>
                                                    <select name="c_name" id="c_name" class="selectpicker form-control  bs-select-hidden" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    <option disabled selected value="">Select Category Name</option>
                                                    <?php foreach($cs_master as $val) { ?>
                                                    <option value="<?=$val['category_id']?>"><?=$val['category_name']?></option>
                                                    <?php } ?>
                                                  </select>
                                    
        </div>
    </div>

    <div class="form-group">                                        
        <label class="col-md-4 control-label">Sub Category Name<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
                <input type="text" class="form-control " required placeholder="Enter Sub Category Name"   name="sc_name" id="sc_name"  />
                                                       
        </div>
    </div>

   
   
    <div class="form-group">
        <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
         <input class="btn btn-primary pull-right" value="Submit" type="submit">	
    </div>
   
    
   
    
</div>
 

    
</div>
                                        
</div>
                                    
<div class="form-group ">                                        
    <div class="btn-group pull-right col-md-12">
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
/*function productDetails(id) {
		var res = id.substring(0,3)
		$.ajax({
			url:"<?php echo base_url('index.php/Product/ajaxgetproduct')?>",
			type: "post",
			data: { id: id },
			success: function(data) {
				//alert(data);
				var json = JSON.parse(data);
					last_id=parseInt(json[0].i_id)+1;
					//alert(res+parseInt(last_id));
				$("#i_code").val(res+parseInt(last_id));
			}
		});
	}*/
/*$('#type').on('change',function()
{
	var val = $(this).val();
	if(val == '1')
	{ 
		$('.serial').show();
		$('.ime').hide();
	}
	else
	{
		$('.serial').hide();
		$('.ime').show();
	}
});*/
</script>   


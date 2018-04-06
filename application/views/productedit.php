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
                                <h3 class="pull-left">Add Product</h3>
                            <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url();?>index.php/Product/update_product/<?php echo $product[0]['i_id'] ?>" method="post">
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
<div class="col-md-6">

    <div class="form-group">                                        
        <label class="col-md-4 control-label">Product Description<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
                <input  type="text" class="form-control " required placeholder="Enter Product Description"  value="<?php echo $product[0]['i_name'] ?>"  name="product_name" id="product_name" />
        </div>
    </div>
<div class="form-group">                                        
        <label class="col-md-4 control-label">Unit Type<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
        <?php $cs_master = $this->db->query("select * from master_location")->result_array(); ?>
                                                    <select name="unit_id" id="unit_id" class="selectpicker form-control  bs-select-hidden" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    <option  selected value="<?php echo $product[0]['id'] ?>"><?php echo $product[0]['location_name'] ?></option>
                                                    <?php foreach($cs_master as $val) { ?>
                                                    <option value="<?=$val['id']?>"><?=$val['location_name']?></option>
                                                    <?php } ?>
                                                  </select>
                                    
        </div>
    </div>
    <div class="form-group">                                        
        <label class="col-md-4 control-label">Category / Sub Category Name<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
        <?php $category = $this->db->select('*')->from('tbl_sub_category')->join('tbl_category','tbl_category.category_id=tbl_sub_category.category_ref_id','left')->get()->result_array(); ?>
                                                    <select name="category_id" id="category_id" class="selectpicker form-control  bs-select-hidden" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    <option selected value="<?php echo $product[0]['sub_category_id'] ?>"><?php echo $product[0]['category_name'];echo "/";echo $product[0]['sub_category_name'] ?></option>
                                                    <?php foreach($category as $val) { ?>
                                                    <option value="<?=$val['sub_category_id']?>"><?=$val['category_name'];echo "/";echo $val['sub_category_name'];?></option>
                                                    <?php } ?>
                                                  </select>
                                    
        </div>
    </div>
   
    
   
    
</div>
 <div class="col-md-6">

    <div class="form-group">
        <label class="col-md-4 control-label">Manufacturer Name</label>  
        <div class="col-md-6">
            <input type="text"  class="form-control " placeholder="Enter Manufacturer Name" name="m_name" id="m_name" value="<?php echo $product[0]['manu_name'] ?>">
            <span class="help-block"></span>
        
        </div>
    </div>

    <div class="form-group">                                        
        <label class="col-md-4 control-label">HSN Code<sup  style="color:#f00"> * </sup> </label>
        <div class="col-md-6">
        <?php $hsn = $this->db->query("select * from tbl_hsn")->result_array(); ?>
                                                    <select name="hsn_id" id="hsn_id" class="selectpicker form-control  bs-select-hidden" required data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                    <option  selected value="<?php echo $product[0]['hsn_id'] ?>"><?php echo $product[0]['hsn_code'] ?></option>
                                                    <?php foreach($hsn as $val) { ?>
                                                    <option value="<?=$val['hsn_id']?>"><?=$val['hsn_code']?></option>
                                                    <?php } ?>
                                                  </select>
                                    
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Common Sales Rate</label>  
        <div class="col-md-6">
            <input type="text"  class="form-control " placeholder="Enter Common Sales Rate" name="comm_rate" value="<?php echo $product[0]['comm_rate'] ?>" id="comm_rate" >
            <span class="help-block"></span>
          
        </div>
    </div>
    
</div>

    
</div>
        <div class="form-group">
        <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
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


<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
              
                <!-- END PAGE TITLE -->                
				<?php 	$sub_category = $sub_category[0]; ?> 
                
                <!-- PAGE CONTENT WRAPPER -->
<div class="row">
<div class="col-md-12">

<form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Product/sub_category_update/'.$sub_category['sub_category_id']);?>" method="post">
<div class="panel panel-default">
    <div class="panel-body">
        <h3 class="panel-title"><strong>Edit Product</strong></h3>

    </div>

<div class="panel-body">                                                                        
    <div class="row">
<div class="col-md-6">
    <div class="form-group">                                        
        <label class="col-md-4 control-label">Category Name</label>
        <div class="col-md-8">
       <?php $loc = $this->db->select('*')->get('tbl_category')->result_array(); ?>
                                                    <select class="form-control select align-left" name="c_name" required id="c_name">
                                                    <option  selected value="<?php echo $sub_category['category_id'];  ?>"><?php echo $sub_category['category_name'];  ?></option> 
                                                    <?php foreach($loc as $locval)
                                                    { ?>
                                                    <option value="<?php echo $locval['category_id'] ?>"><?php echo $locval['category_name'] ?></option>    
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>    
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Sub Category Name</label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control "   placeholder="Enter Product Name" name="sc_name" id="sc_name" value="<?php echo $sub_category['sub_category_name'];  ?>">
                                                                                                  
                                                </div>
                                            </div>
                                            <div class="form-group pull-right"> 
                                                <div class="btn-group pull-right col-md-12">
                                                    <input class="btn btn-primary" value="Update" type="submit">
                                                    <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button">
                                                </div>
                                            </div>
                                        </div>
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
        </div>
        <!-- END PAGE CONTAINER -->
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>

<script type="text/javascript">
    /*function productDetails(id) {
		var res = id.substring(0,3)
		var i_code=$('#i_code').val();
		var res_c = i_code.substring(3)
		$("#i_code").val(res+res_c);
		
	}*/
</script>

        
 <?php /*?><script type="text/javascript">
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        i_category: {
                                required: true,
                        },                                            
                        i_name: {
                                required: true,
                        },                                            
                        i_code: {
                                required: true,
                        },                                            
                        m_code: {
                                required: true,
                        },                                            
                        fixed_rate: {
                                required: true,
                        },                                            
                        m_date: {
                                required: true,
                        },                                            
                        packing: {
                                required: true,
                        },                                            
                        exp_date: {
                                required: true,
                        },                                            
                        s_price: {
                                required: true,
                        },                                            
                        p_rate: {
                                required: true,
                        },                                            
                        p_tax: {
                                required: true,
                        },                                            
                        offer: {
                                required: true,
                        },                                            
                        combination: {
                                required: true,
                        },                                            
                        min_qty: {
                                required: true,
                        },                                            
                        max_qty: {
                                required: true,
                        },                                            
                        batch_no: {
                                required: true,
                        },                                            
                        mrp: {
                                required: true,
                        },                                            
                        s_tax: {
                                required: true,
                        }
                    }                                        
                });                                    

        </script><?php */?>    


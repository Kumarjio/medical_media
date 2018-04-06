<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
 <?php
if(isset($inps['pro_id']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
    // $product = $inps['product'];
    // $po_num = $inps['po_num'];
    // $land = $inps['land'];
     $cid = $inps['pro_id'];
     
}
else
{
    //$product = '';
    //$po_num = '';
    $cid = '';
  
    /*$mobile2 = '';
    $mobile3 = '';*/
    //$land = '';
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Manage Product</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading"> 
                                
                                                    <a href="<?php echo base_url('index.php/Product/productadd'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Product</button></a>
                                                                          
                                            </div>
                                               <form action="<?=$this->config->item('base_url')?>index.php/Product" method="post" enctype="multipart/form-data" >

                               <div class="col-md-12" style="margin-top: 12px;">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Product Name</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_product')->result_array(); ?>
                                
                     <select id="pro_id" name="pro_id" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option  value="<?=$det['i_id']?>" <?=($cid==$det['i_id'])?'selected':''?>><?=$det['i_name']?> </option>
                                                        <?php } ?>  
                                                            </select>
                                                  
                                    </div>
                                </div>
                                </div>
                           <div class="col-md-3">
                                <div class="form-group">
                                <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div>
                                   
                                      <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div>
                                  
                                   
                                </div>
                                </div>
                           
                                    </form>
                                            <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>S. No</th>
                                                    <th>Product Description</th>
                                                    <th>Manufacturer Name</th>
                                                    <th>HSN Code</th>
                                                    <th>Unit Type</th>
                                                    <th>Category</th>
                                                    <th>Sub Category Name</th>
                                                    <th>Common Rate</th>
                                                    <th>Action</th>
                                                                                                
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        <?php
                                                            $sno=1;
                                                          if(is_array($product) && count($product) ) {
                                                    foreach($product as $loop){
                                                            ?>
                                                    <tr>
                                                            <td><?php echo $sno++; ?></td>
                                                            <td><?php echo $loop['i_name'];?></td>
                                                            <td><?php echo $loop['manu_name'];?></td>
                                                            <td><?php echo $loop['hsn_code'];?></td>
                                                            <td><?php echo $loop['location_name'];?></td>
                                                            <td><?php echo $loop['category_name'];?></td>
                                                            <td><?php echo $loop['sub_category_name'];?></td>
                                                            <td><?php echo $loop['comm_rate'];?></td>
                                                        <td>
                                                 <a href="<?php echo base_url('index.php/Product/productedit/'.$loop['i_id']);?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><span class="fa fa-pencil"></span></button></a>
                                                 
                                               
            
           
           
            </td>

            </tr>
                                                    <?php }} ?>
        </tbody>
    </table>
</div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                        </div>
                    </div>
                                                
                </div>         
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

    
        <!-- Main bar -->
       


	    <!-- Matter -->

	    
    
    <!-- Footer ends -->    
     <?php $this->load->view('include_js'); ?>
     
<script type="text/javascript">
	function fndelete(id) {
		var deletopt=confirm('Are you sure, do you want to delete this record?');
	  	if(deletopt)  {
			window.location =  '<?php echo base_url('index.php/Product/deleteproduct/')?>/'+id;
		    return true;
	  	}  else  {
		  	return false;
	  	}
	}
</script>
<script>
function chStatus(id,st){
		if(st == 1) {
		var chst = 0; //change status value
		}
		else {
		var chst = 1;	
		}
	//alert(chst);	
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/Product/statuschange",
			dataType: 'json',
			data: {id: id, st: chst},
			success: function(res) {
			if(res == 0) {
				$("#statusspande"+id).hide();	
				$("#statusspan"+id).show();	
				
			}
			if(res == 1) {
				$("#statusspande"+id).hide();	
				$("#statusspan"+id).show();	
				
			}
			
				//console.log(res);
				
			}
		});
}


	<!------------------------Status Activate End----------------------------!>

	
</script>
</body>
</html>
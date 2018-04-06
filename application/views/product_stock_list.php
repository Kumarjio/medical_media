<?php 
error_reporting(E_ALL);
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
     $pro_id = $inps['pro_id'];
}
else
{
	$pro_id = '';
	
}
?>
    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Stocks List</h2>
                </div>
                 <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  
                                <form action="<?=$this->config->item('base_url')?>index.php/Stocklist/product_stock_list" method="post" enctype="multipart/form-data" > 
                                 <div class="col-md-12">
                                   
                                     <div class="col-md-3">
                                       <div class="form-group">
                                    <label class="col-md-4 control-label">Product Name</label>
                                        <div class="col-md-8">   
                                   <?php $pnames =  $this->db->select('*')->get('tbl_product')->result_array(); ?>
                                      <select class="selectpicker form-control "  name="pro_id" id="pro_id"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> <option value=""  selected>All</option><?php foreach($pnames as $row){?><option <?=($pro_id==$row['i_id'])?'selected':''?> value="<?php echo $row['i_id']; ?>"><?php echo $row['i_name']; ?></option><?php }?></select>
                                        </div>
                                      </div>
                                     </div>
                                
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div><div class="col-md-4">
                                      <button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                          </div>
                                        </div>
                                      </div>
                                      
                                  </div>
                                </form>  
                                                                   
                                </div>
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                       <table class="table datatable">
                                            <thead>
                                                <tr>
                                                      <th>S.No</th>
                                                      <th>Product Description</th>
                                                      <th>Unit</th>
                                                      <th>Hsn code</th>
                                                      <th>Qty</th>
                                                      <th>Free Qty</th>
                                                      
                                                </tr>
										                       	</thead>
                                            <tbody>
                                        	     <?php  if(is_array($list) && count($list) ) {
                                                   $cnt=1;
                                                   foreach($list as $post){ 
                                                    $qty = 0;$free = 0;
                                                    if(is_array($post) && count($post) ) {
											                               foreach ($post as $key) {
                                                      $qty = $qty+$key['curr_qty'];
                                                      $free = $free+$key['curr_free_qty'];
                                                     }
										                         	 ?>
										                          	<tr>
                                                      <td><?php echo $cnt?></td>
                                                      <td><?php echo $post[0]['i_name']?></td> 
                                                      <td><?php echo $post[0]['location_name']?></td> 
                                                      <td><?php echo $post[0]['hsn_code']?></td>
                                                      <td><?php echo $qty?></td> 
                                                      <td><?php echo $free ?></td>
                                                	</tr>
											                        <?php $cnt++; }}} ?>
											
									                            	</tbody>
                                         </table>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                        </div>
                    </div>
                    <!-- END RESPONSIVE TABLES -->
                    
                <!-- END PAGE CONTENT WRAPPER -->                                    
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
			window.location =  '<?php echo base_url('index.php/Employee/deleteCustomer/')?>/'+id;
		    return true;
	  	}  else  {
		  	return false;
	  	}
	}
  function update_stock(id){

    var qty = $('#qty'+id).val();
    var qty_free = $('#qty_free'+id).val();
    var remark = $('#remark'+id).val();
    if(qty != "" && qty_free != "" && remark != ""){
      var r = confirm("Are you Sure ?");
    if (r == true) {
        $.ajax({
      url:"<?php echo base_url() ?>index.php/Stocklist/update_stock_adj",
      type:"POST",
      dataType:"JSON",
      data:{qty:qty,qty_free:qty_free,remark:remark,id:id},
      success:function(res){
        console.log(res);
        alert("Successfully completed");
        location.reload();
      }
    });
    }        
    }else{
      alert("Enter Values All Three Fileds");
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
			url: "<?php echo base_url(); ?>" + "index.php/Employee/statuschange",
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
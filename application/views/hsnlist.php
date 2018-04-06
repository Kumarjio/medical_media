<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
  <?php
if(isset($inps['hs_id']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
    // $product = $inps['product'];
    // $po_num = $inps['po_num'];
    // $land = $inps['land'];
     $cid = $inps['hs_id'];
     
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
                    <h2> Manage HSN</h2>
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
                                    <a href="<?php echo base_url('index.php/Storage/addhsn'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>HSN CODE</button></a>
                                                                  
                                </div>

                                 <form action="<?=$this->config->item('base_url')?>index.php/Storage/listhsn" method="post" enctype="multipart/form-data" >

                               <div class="col-md-12" style="margin-top: 12px;">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">HSN</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_hsn')->result_array(); ?>
                                
                                                        <select id="hsn_id" name="hs_id" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['hsn_id'])?'selected':''?> value="<?=$det['hsn_id']?>"><?=$det['hsn_code']?> </option>
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
                                                    <th>S.No</th>
                                                    <th>HSN Code</th>
                                                    <th>Tax %</th>
                                                    <th>Action</th>
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php if(is_array($hsn) && count($hsn) ) {
                                        $cnt=1;
                                            foreach($hsn as $loop){
                                                    ?>
											<tr>
												<td><?php echo $cnt; $cnt++; ?></td>
												<td><?php echo strtoupper($loop['hsn_code']) ; ?></td>
												
                                                <td><?php echo strtoupper($loop['tax']);?></td>
												
												<td>
                                                    <a href="<?php echo base_url('index.php/Storage/edithsn/'.$loop['hsn_id']); ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
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
			window.location =  '<?php echo base_url('index.php/Storage/deleteStorage/')?>/'+id;
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
			url: "<?php echo base_url(); ?>" + "index.php/Storage/statuschange",
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
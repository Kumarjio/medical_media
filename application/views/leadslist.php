<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Customer  Management</h2>
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
                                    <a href="<?php echo base_url('index.php/Business/addleads'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Leads</button></a>
                                    <ul class="panel-controls">
                                    <!--<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>-->
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                 <form action="<?=$this->config->item('base_url')?>index.php/WIProgress" method="post" enctype="multipart/form-data" >
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                     <th>Name</th>
                                                     <th>Designation</th>
                                                    <th>Contact No</th>
                                                    <th>Leads Received From</th>
                                                   <th>Assigned To</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php if(is_array($leads) && count($leads) ) {
                                        $cnt=1;
                                            foreach($leads as $loop){
                                                    ?>
											<tr>
												<td><?php echo $cnt; $cnt++; ?></td>
												<td><?php echo strtoupper($loop->name) ; ?></td>
                                                <td><?php echo strtoupper($loop->deignation) ; ?></td>
                                                <td><?php echo strtoupper($loop->mobile) ; ?></td>
												<td><?php echo strtoupper($loop->leads_from) ; ?></td>
                                               <?php /*?> <td><?php if($loop->status == 1){
													echo "Open";
													}
													else if($loop->status == 2){
														 echo "Closed";
													}
													else {
														 echo "---";
													}
													 ?></td><?php */?>
                                                     <td><?php if($loop->ename != ''){
														 echo "$loop->ename";
													 }
													 else {
														 echo "---";
													}
                                                  ?></td>
                                                 <td><?=date('d-m-Y', strtotime($loop->created_date))?></td>
                                                 <td><button type="button" data-toggle="modal" id="action" value='<?=$loop->id?>' data-target="#getmodal_<?php echo $loop->id?>" class="btn btn-info btn-rounded btn-condensed btn-sm view_data" name="action"  data-placement="bottom" title="Assigned To" data-original-title="Assigned To"><i class="fa fa-eye"></i> </button>  </td>
                                                  <?php /*?><td>
                                                 
                                                   
                                       <div class="form-group">                                           
                                        <input type="submit" name="search" class="btn btn-success" value="Search" />
                                         </div>
                                       
                                                  </td><?php */?>
												
                                            </tr>
											<?php }} ?>
										</tbody>
                                        </table>
                                         
                                    </div>
                                     </form>
                                      <?php 
											 $i= 0;
											 if(is_array($leads) && count($leads) ) {
												  foreach ($leads as $loop){
													  $i++;
													 
													  ?>
                                       <div id="getmodal_<?php echo $loop->id?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog" style="width:500px">
                                        
                                            <!-- Modal content-->
                                            <form id="getdet" role="form" action="<?php echo base_url('index.php/Business/makechanges');?>" method="post">
                                            <div class="modal-content">
                                            
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Assigned To</h4>
                                              </div>
                                              
                                              <div class="modal-body" id="pop_data<?php echo $loop->id?>">
                                               <div class="col-md-12"> 
                                                <div class="form-group" style="display:none">                                        
                                                <label class="col-md-7 control-label">Id<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-5">
                                                	<input type="number" class="form-control uppercase"  name="ids"  placeholder="Enter Quantity" id="ids" value="<?php echo $loop->id?>" >
                                                    <div class="error" ><?php echo form_error('country_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            <div class="form-group" >                                        
                                                <label class="col-md-7 control-label">Employee<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-5">
                                                	  <?php $cusdt =  $this->db->select('*')->get('cp_admin_login')->result_array(); ?>                                      
                                                                    <select  class="selectpicker form-control uppercase"  name="emp">
                                                                        <option value='' disabled selected>Select Employee</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option  value="<?=$det['admin_id']?>"><?=$det['name']?> </option>
                                                        <?php } ?>	
                                                                        
                                                                         </select>
                                                        
                                                    <div class="error" ><?php echo form_error('country_name'); ?></div>                                               
                                                </div>
                                            </div>
                                            
                                            <?php /*?><div class="form-group" >                                        
                                                <label class="col-md-7 control-label">Status<sup  style="color:#f00"> * </sup></label>
                                                <div class="col-md-5">
                                                	  <select  class="selectpicker form-control uppercase"  name="status">
                                                                        <option value="" disabled selected>Select Status</option>
                                                                         <option value="1">Open</option>
                                                                         <option value="2">Closed</option>
                                                                        
                                                                         </select>
                                                        
                                                    <div class="error" ><?php echo form_error('country_name'); ?></div>                                               
                                                </div>
                                            </div><?php */?>
                                            </div>
                                              </div>
                                     
                                      
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-success submit" id="submit_<?=$i?>">Allocate</button>
                                             <button type="button" class="btn btn-primary" data-dismiss="modal" >Cancel</button>
                                              </div>
                                              </div>
                                              </form>
                                             </div>
                                           </div>
                                    <?php } }?>
                                     
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
			window.location =  '<?php echo base_url('index.php/Customer/deleteCustomer/')?>/'+id;
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
			url: "<?php echo base_url(); ?>" + "index.php/Customer/statuschange",
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
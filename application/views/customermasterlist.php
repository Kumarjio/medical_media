<?php $session_data = $this->session->all_userdata();
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Customer Master</h2>
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
                              <?php /*?>  <?php if($session_data['user_type']=='1'){?>
                                                    <a href="<?php echo base_url('index.php/Customer_master/addCustomer1'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Customer Master</button></a>
                                                    <?php }?>  
                                                    <?php if($session_data['user_type']=='5'){?><?php */?>
                                                    <a href="<?php echo base_url('index.php/Protype/addprodcuttype1'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Customer Master</button></a>
                                                   <?php /*?> <?php }?>       <?php */?>                         
                                    
                                    <ul class="panel-controls">
                                    <!--<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>-->
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php if(is_array($customer) && count($customer) ) {
                                        $cnt=1;
                                            foreach($customer as $loop){
                                                    ?>
											<tr>
												<td><?php echo $cnt; $cnt++; ?></td>
												<td><?php echo strtoupper($loop->type_name) ; ?></td>
												<td><?php echo date('d-m-Y', strtotime($loop->post_dt)) ; ?></td>
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
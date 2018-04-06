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
                    <h2> Manage Employee</h2>
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
                               
                                                   <a href="<?php echo base_url('index.php/Employee/addCustomer1'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Employee</button></a>
                                                                                      
                                    
                                                                   
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Employee ID</th>
                                                    <th>Employee Name</th>
                                                    <th>Area Name</th>
                                                    <th>Mobile</th>
                                                   <th>Action</th>
                                                  
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php if(is_array($customer) && count($customer) ) {
                                        $cnt=1;
                                            foreach($customer as $loop){
                                                    ?>
											<tr>
												<td><?php echo $cnt; $cnt++; ?></td>
                                               
												<td><?php echo strtoupper($loop->emp_code);?></td>
												<td><?php echo strtoupper($loop->name) ; ?></td>
                                                <td><?php echo strtoupper($loop->area_name) ; ?></td>
                                               <td><?php echo strtoupper($loop->phone) ; ?></td>
                                                
												
												
                                               
                                                    <td>
                                                    <a href="<?php echo base_url('index.php/Employee/viewCustomer/'.$loop->admin_id); ?>"><button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View"><i class="fa fa-eye"></i> </button></a>
                                                    <a href="<?php echo base_url('index.php/Employee/editCustomer1/'.$loop->admin_id); ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
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
			window.location =  '<?php echo base_url('index.php/Employee/deleteCustomer/')?>/'+id;
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
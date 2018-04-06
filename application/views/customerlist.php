<?php $session_data = $this->session->all_userdata();
?><!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2> Manage Customer</h2>
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
                               
                                                     <a href="<?php echo base_url('index.php/Customer/addCustomer1'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Customer</button></a>
                                                                                    
                                   
                                                                 
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                       <th>S.No</th>
                                                    <th>Vendor Name</th>
                                                    <th>Address</th>
                                                    <th>Account No</th>
                                                    <th>Bank Name</th>
                                                    <th>Bank Branch</th>
                                                    <th>IFSC Code</th>
                                                    <th>Company PAN No</th>
                                                    <th>Aadhar No</th>
                                                    <th>Reference Details</th>
                                                    <th>E Mail ID 1</th>
                                                    <th>E Mail ID 2</th>
                                                    <th>E Mail ID 3</th>
                                                    <th>Website</th>
                                                    <th>Land Line No 1</th>
                                                    <th>Land Line No 2</th>
                                                    <th>Land Line No 3</th>
                                                    <th>Mobile No 1 </th>
                                                   
                                                    <th>Mobile No 2</th>
                                                  
                                                    <th>Mobile No 3</th>
                                                  
                                                    <th>Dr. Registration No</th>
                                                    <th>Reg ID</th>
                                                    <th>GST No</th>
                                                    <th>TIN No</th>
                                                    <th>CST No</th>
                                                    <th>Drug Lisence No 1</th>
                                                    <th>Drug Lisence No 2</th>
                                                      
                                                   
                                                </tr>
											</thead>
                                            <tbody>
                                        	 <?php if(is_array($customer) && count($customer) ) {
                                        $cnt=1;
                                            foreach($customer as $loop){
                                                    ?>
											<tr>
												<td><?php echo $cnt; $cnt++; ?></td>
                                                <td><?php echo strtoupper($loop->customer_name) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_address) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_account_no) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_bank_name) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_bank_branch) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_ifsc_code) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_company_panno) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_aadhar_no) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_reference_det) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_email1) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_email2) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_email3) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_website) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_lane_line1) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_lane_line2) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_lane_line3) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_mobile_no1) ; ?><br>
                                                <?php echo strtoupper($loop->cus_contact_person1) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_mobile_no2) ; ?><br>
                                               <?php echo strtoupper($loop->cus_contact_person2 ) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_mobile_no3) ; ?><br>
                                                <?php echo strtoupper($loop->cus_contact_person3) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_dr_reg_no) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_reg_id) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_gst_no) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_tin_no) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_cst_no) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_drug_lisence1) ; ?></td>
                                                <td><?php echo strtoupper($loop->cus_drug_lisence2) ; ?></td>
												
												
                                          	
                                              <!--   <td>
                                                    <a href="<?php echo base_url('index.php/Customer/viewCustomer/'.$loop->cid); ?>"><button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View"><i class="fa fa-eye"></i> </button></a>
                                                    <a href="<?php echo base_url('index.php/Customer/editCustomer1/'.$loop->cid); ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                                    </td> -->
                                                   <?php /*?><?php /*?> <a href="javascript:void(0);" onClick="fndelete('<?php echo $loop->cid;?>');" >
                                          		<button class="btn btn-danger btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-times"></i></button> </a>
                                                <?php } ?><?php */?>
                                                
                                                 
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
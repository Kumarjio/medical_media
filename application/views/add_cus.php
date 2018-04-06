<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body onUnload="return CheckBrowser();">
  <?php $this->load->view('menu_navigation'); ?>

    
               <div class="page-title">                    
                    <h2>Manage Vendor</h2>
                </div>
                 <div class="page-content-wrap">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">
                        <div class="panel-heading"> 
                          <a href="<?php echo base_url('index.php/Seller/add_vendor'); ?>">
                          <button class="btn btn-primary"><span class="fa fa-plus"></span>Add Vendor</button></a>
                        </div>
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table datatable">
                             <thead>
                              <tr>
                                <th>S.No</th>
                                <th>Vendor Name</th>
                                <th>Acc No</th>
                                <th>Bank Name</th>
                                <th>Bank Branch</th>
                                <th>Website</th>
                                <!-- <th >Address</th> -->
                                <th> Action </th>
                                <!-- <th width="10%">Acc No</th>
                                <th width="10%">Bank<br> Name</th>
                                <th width="10%">Bank<br> Branch</th>
                                <th width="10%">IFSC<br> Code</th>
                                <th width="10%">Company <br>PAN No</th>
                                <th width="10%">Aadhar<br> No</th>
                                <th width="10%">Ref<br> Details</th>
                                <th width="10%">EMail ID </th>
                              
                                <th width="10%">Website</th>
                                <th width="10%">Lane <br>Line No </th>
                                
                                <th width="10%">Mobile No  </th>
                               
                                <th width="10%">Dr.Reg No</th>
                                <th width="10%">Reg ID</th>
                                <th width="10%">GST No</th>
                                <th width="10%">TIN No</th>
                                <th width="10%">CST No</th>
                                <th width="10%">Drug Lis<br> No1</th>
                                <th width="10%">Drug Lis<br> No2</th> -->
                              </tr>
						   </thead>
                        <tbody>
                          <?php if(is_array($vendor) && count($vendor) ) {
                          $cnt=1;
                          foreach($vendor as $loop){
                          ?>
						 <tr>
    							<td><?php echo $cnt; $cnt++; ?></td>
                                <td><?php echo strtoupper($loop->vendor_name) ; ?></td>
                                <td><?php echo strtoupper($loop->account_no) ; ?></td>
                                <td><?php echo strtoupper($loop->bank_name) ; ?></td>
                                <td><?php echo strtoupper($loop->bank_branch) ; ?></td>
                                <td><?php echo strtoupper($loop->website) ; ?></td>
                               <!--  <td><?php echo strtoupper($loop->address) ; ?></td> -->
    							<!-- 
                                <td><?php echo strtoupper($loop->ifsc_code) ; ?></td>
                                <td><?php echo strtoupper($loop->company_panno) ; ?></td>
                                <td><?php echo strtoupper($loop->aadhar_no) ; ?></td>
                                <td><?php echo strtoupper($loop->reference_det) ; ?></td>
                                <td><?php echo strtoupper($loop->email1) ; ?><?php echo ','?><br><?php echo strtoupper($loop->email2) ; ?><?php echo ','?><br><?php echo strtoupper($loop->email3) ; ?></td>
                                
                                <td><?php echo strtoupper($loop->website) ; ?></td>
                                <td><?php echo strtoupper($loop->lane_line1) ; ?><?php echo ','?><br><?php echo strtoupper($loop->lane_line2) ; ?><?php echo ','?><br><?php echo strtoupper($loop->lane_line3) ; ?></td>
                                
                                
                                <td><?php echo strtoupper($loop->mobile_no1) ; ?>- <?php echo strtoupper($loop->contact_person1) ; ?><?php echo ','?><br><?php echo strtoupper($loop->mobile_no2) ; ?>-<?php echo strtoupper($loop->contact_person2 ) ; ?><?php echo ','?><br><?php echo strtoupper($loop->mobile_no3) ; ?>-<?php echo strtoupper($loop->contact_person3) ; ?>
                               </td>
                               
                                <td><?php echo strtoupper($loop->dr_reg_no) ; ?></td>
                                <td><?php echo strtoupper($loop->reg_id) ; ?></td>
                                <td><?php echo strtoupper($loop->gst_no) ; ?></td>
                                <td><?php echo strtoupper($loop->tin_no) ; ?></td>
                                <td><?php echo strtoupper($loop->cst_no) ; ?></td>
                                <td><?php echo strtoupper($loop->drug_lisence1) ; ?></td>
                                <td><?php echo strtoupper($loop->drug_lisence2) ; ?></td> -->
                                
                                                 
                                            
                                                <td>  
                                                <a href="<?php echo base_url('index.php/Seller/view_vendor/'.$loop->vendor_id); ?>"><button class="btn btn-primary btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View"><i class="fa fa-eye"></i> </button></a>
                                                 <a href="<?php echo base_url('index.php/Seller/edit_seller/'.$loop->vendor_id); ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                               <a href="<?php echo base_url('index.php/Seller/delete_vendor/'.$loop->vendor_id); ?>"><button class="btn btn-danger btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-times"></i> </button></a></td>
                                                   
                                             
											</tr>
											<?php }} ?>
										</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                    </div>         
            </div>            
         </div>
       
     <?php $this->load->view('include_js'); ?>
<script type="text/javascript">
	function fndelete(id) {
		var deletopt=confirm('Are you sure, do you want to delete this record?');
	  	if(deletopt)  {
			window.location =  '<?php echo base_url('index.php/Seller/deleteSeller/')?>/'+id;
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
			url: "<?php echo base_url(); ?>" + "index.php/Seller/statuschange",
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

/*window.onbeforeunload = function (event) {
    var message = 'Important: Please click on \'Save\' button to leave this page.';
    if (typeof event == 'undefined') {
        window.close();
    }
    if (event) {
        event.returnValue = message;
    }
    return message;
};*/

</script>
</body>
</html>
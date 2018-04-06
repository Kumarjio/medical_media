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
                    <h2>Manage Customer</h2>
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
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Lane Line No </th>
                                <th>Mobile No  </th>
                                <th> Action </th>
                              </tr>
						   </thead>
                        <tbody>
                          <?php if(is_array($vendor) && count($vendor) ) {
                          $cnt=1;
                          foreach($vendor as $loop){
                          ?>
						 <tr>
    							<td><?php echo $cnt; $cnt++; ?></td>
                               <td><?php echo strtoupper($loop->customer_name) ; ?></td>
                                <td><?php echo strtoupper($loop->cus_address) ; ?></td> 
                                <td><?php echo strtoupper($loop->cus_lane_line1) ; ?><?php echo ','?><br><?php echo strtoupper($loop->cus_lane_line2) ; ?><?php echo ','?><br><?php echo strtoupper($loop->cus_lane_line3) ; ?></td>
                                <td><?php echo strtoupper($loop->cus_mobile_no1) ; ?>- <?php echo strtoupper($loop->cus_contact_person1) ; ?><?php echo ','?><br><?php echo strtoupper($loop->cus_mobile_no2) ; ?>-<?php echo strtoupper($loop->cus_contact_person2 ) ; ?><?php echo ','?><br><?php echo strtoupper($loop->cus_mobile_no3) ; ?>-<?php echo strtoupper($loop->cus_contact_person3) ; ?>
                               </td>
                                 <td>  
                                                <a href="<?php echo base_url('index.php/Customer/view_vendor/'.$loop->customer_id); ?>"><button type="button" class="btn btn-primary btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View"><i class="fa fa-eye"></i> </button></a>
                                                 <a href="<?php echo base_url('index.php/Customer/edit_cus/'.$loop->customer_id); ?>"><button type="button" class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                               <a href="<?php echo base_url('index.php/Customer/delete_cus/'.$loop->customer_id); ?>"><button type="button" class="btn btn-danger btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-times"></i> </button></a></td>
                                                   
                                             
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
<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body onUnload="return CheckBrowser();">
  <?php $this->load->view('menu_navigation'); ?>

            <?php
if(isset($inps['customer_id']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
    // $product = $inps['product'];
    // $po_num = $inps['po_num'];
    // $land = $inps['land'];
     $cid = $inps['customer_id'];
     
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
               <div class="page-title">                    
                    <h2>Manage Customer</h2>
                </div>
                 <div class="page-content-wrap">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">
                        <div class="panel-heading"> 
                          <a href="<?php echo base_url('index.php/Customer/cus_add'); ?>">
                          <button class="btn btn-primary"><span class="fa fa-plus"></span>Add Customer</button></a>
                        </div>
                         <form action="<?=$this->config->item('base_url')?>index.php/Customer" method="post" enctype="multipart/form-data" >

                               <div class="col-md-12" style="margin-top: 12px;">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Unit</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_customer')->result_array(); ?>
                                
                                                        <select id="vendor" name="cus_id" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option  value="<?=$det['customer_id']?>" <?=($cid==$det['customer_id'])?'selected':''?>><?=$det['customer_name']?> </option>
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
                            <div class="col-md-12">
                                
                              
                              
                                </div>
                                    </form>
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
                                <td><?php echo strtoupper($loop['customer_name']) ; ?></td>
                                <td><?php echo strtoupper($loop['cus_address']) ; ?></td> 
                                <td><?php echo strtoupper($loop['cus_lane_line1']) ; ?><?php echo ','?><br><?php echo strtoupper($loop['cus_lane_line2']) ; ?><?php echo ','?><br><?php echo strtoupper($loop['cus_lane_line3']) ; ?></td>
                                <td><?php echo strtoupper($loop['cus_mobile_no1']) ; ?>- <?php echo strtoupper($loop['cus_contact_person1']) ; ?><?php echo ','?><br><?php echo strtoupper($loop['cus_mobile_no2']) ; ?>-<?php echo strtoupper($loop['cus_contact_person2'] ) ; ?><?php echo ','?><br><?php echo strtoupper($loop['cus_mobile_no3']) ; ?>-<?php echo strtoupper($loop['cus_contact_person3']) ; ?>
                               </td>
                                 <td>  
                                  <a href="<?php echo base_url('index.php/Customer/view_vendor/'.$loop['customer_id']); ?>"><button type="button" class="btn btn-primary btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View"><i class="fa fa-eye"></i> </button></a>
                                   <a href="<?php echo base_url('index.php/Customer/edit_cus/'.$loop['customer_id']); ?>"><button type="button" class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                 </td>       
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
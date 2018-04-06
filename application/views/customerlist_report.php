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
if(isset($inps['cid']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
	 $area_name = $inps['area_name'];
	 $mobile = $inps['mobile'];
	 /*$mobile2 = $inps['mobile2'];
	 $mobile3 = $inps['mobile3'];*/
	 $land = $inps['land'];
	 $cid = $inps['cid'];
	 $frmdt = $inps['from_dt'];
	 $todt = $inps['to_dt'];
}
else
{
	$area_name = '';
	$mobile = '';
	$cid = '';
	$frmdt = '';
	$todt = '';
	/*$mobile2 = '';
	$mobile3 = '';*/
	$land = '';
}
?>    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Advance Payment Of Customer List</h2>
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
                                <form action="<?=$this->config->item('base_url')?>index.php/Reports/customer" method="post" enctype="multipart/form-data" >
                               <div class="col-md-12">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Id</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                            	
                                                        <select id="cid" name="cid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['cid'])?'selected':''?> value="<?=$det['cid']?>"><?='CUS00'.$det['cid']?> </option>
                                                        <?php } ?>	
														    </select>
                                                  
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Area</label>
                                    <div class="col-md-8">   
                                   <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                            	
                                                        <input type="text" class="form-control" name="area_name" id="cus_code" value="<?=$area_name?>" >
														
														    
                                                  
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Customer Mobile</label>
                                    <div class="col-md-8">   
                                   <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="mobile"  id="mobile"  value="<?=$mobile?>">        
													    
                                                   
                                    </div>
                                </div>
                                </div>
                               <?php /*?> <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Mobile 2</label>
                                    <div class="col-md-8">                                            
                                       <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="mobile2"  id="mobile"  value="<?=$mobile2?>">       
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Mobile 3</label>
                                    <div class="col-md-8">                                            
                                        <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="mobile3"  id="mobile"  value="<?=$mobile3?>">            
                                    </div>
                                </div>
                                </div><?php */?>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Landline NO</label>
                                    <div class="col-md-8">                                            
                                       <?php $cusdt =  $this->db->select('*')->get('cb_customer')->result_array(); ?>
                                       
                                                    	 <input type="text" class="form-control" style="form-controlx" name="land"  id="land"  value="<?=$land?>">   
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">From Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="from_dt"  id="from_dt" value="<?=$frmdt?>">                
                                    </div>
                                </div>
                                </div>
                                
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">To Date</label>
                                    <div class="col-md-8">                                            
                                        <input type="text" class="datepickerr form-control" style="form-controlx" name="to_dt" id="to_dt" value="<?=$todt?>" >
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                <div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div>
                                   
                                    
                                        <div class="col-md-4"><button type="submit" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button>
                                    </div>
                                    
                                    <!--<div class="col-md-4">                                            
                                        <input type="submit" name="search" class="btn btn-success" value="Search" /></div><div class="col-md-4"><a href="<?=$this->config->item('base_url')?>index.php/Reports/sold_list?cid=<?=$cid==$det['cid']?>&area_name=<?=$area_name?>&mobile=<?=$mobile?>&from_dt=<?=$frmdt?>&to_dt=<?=$todt?>"><button type="button" name="export" class="btn btn-primary"><span class="fa fa-download"></span>Export</button></a>
                                    </div>-->
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
                                            <th >S. No</th>
                                            <th >Customer Name</th>
                                            <th>Area Name</th>
                                             <th>Mobile</th>
                                             <th>Product Type</th>
                                            <th>Product Name</th>
                                             <th>Selling Rate</th>
                                             <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                          
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php
                                                $sno=1;
											if(is_array($customer) && count($customer) ) {
													foreach($customer as $loop){
															?>
                                            <tr>
                                                    <td><?php echo $sno++; ?></td>
                                                    <td><?php echo $loop->customer_name?></td>
                                                    <td><?php echo $loop->area_name?></td>
                                                    <td><?php echo $loop->mob_no1?></td>
                                                   <td><?php if($loop->id == $loop->i_category){
                                                         echo $loop->type_name;
                                                     }?></td>
                                                     <?php /*?><td><?php if($loop->i_category == 1){
                                                         echo "Laptop";
                                                     }
                                                     else if($loop->i_category == 2){
                                                         echo "Moblie";
                                                     }
													 else if($loop->i_category == 3){
                                                         echo "TABLETS";
                                                     }
													 else if($loop->i_category == 4){
                                                         echo "SOFTWARE";
                                                     }
													 else if($loop->i_category == 5){
                                                         echo "Accesories";
                                                     }
													 
                                                         ?></td><?php */?>
                                                       <td><?php echo $loop->i_name?></td>
                                                        <td><?php echo $loop->selling_rate?></td>
                                                       <td><?php if($loop->payment_method == 1){
                                                         echo "Cash";
                                                     }
                                                     else if($loop->payment_method == 2){
                                                         echo "Cheque / DD";
                                                     }
													 else if($loop->payment_method == 3){
                                                         echo "Online Transfer";
                                                     }
													 else if($loop->payment_method == 4){
                                                         echo "Credit Card / Debit Card";
                                                     }
													 else if($loop->payment_method == 5){
                                                         echo "Finance";
                                                     }
                                                         ?></td>  
                                                      <td><?php echo $loop->amt?></td> 
                                                    <td><?php echo date('d-m-Y', strtotime($loop->payment_date))?></td>
                                                    <?php /*?><td>
                                                    <a href="<?php echo base_url('index.php/Statutory/editStatutory/'.$loop->id); ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                                    </td><?php */?>
                                                    
                                                   <?php /*?><td>
                                            <a href="<?php echo base_url('index.php/Statutory/viewproduct/'.$loop->id); ?>"><button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View"><span class="fa fa-eye"></span></button></a>
                                            <?php if($session_data['user_type']=='5'){?>
                                                                                  
                                                                                 <a href="<?php echo base_url('index.php/Statutory/editproduct/'.$loop->id);?>">                                                        <button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><span class="fa fa-pencil"></span></button></a>
                                                                                 
                                                                                 <?php }?>
                                                                                  <?php if($session_data['user_type']=='1'){?>
                                                                                  
                                                                                 <a href="<?php echo base_url('index.php/Statutory/editproduct/'.$loop->id);?>">                                                        <button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><span class="fa fa-pencil"></span></button></a>
                                                                                 
                                                                                 <?php }?>
                                            
                                           
                                           
                                            </td><?php */?>
                                
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
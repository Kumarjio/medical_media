<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); 
  $session_data = $this->session->all_userdata();	
  ?>

    
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>PO Short Close Manage</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                             
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" width="auto">
                                            <thead>
                                                <tr>
                                                    <th width="5px">S.No</th>
                                                    <th width="5px">PO NO</th>
                                                    <th width="5px">PO Date</th>
                                                    <th width="5px">Vendor Name</th>
                                                    
                                                    <th width="5px">Action</th>
                                               </tr>
											</thead>
                                            <tbody>
                                        	 <?php
											  if(is_array($list) && count($list) ) {
												 // echo '<pre>';print_r($list); exit;
                                        $i=1;
										$s_no = '';
											$s_no[] = '';
                                            foreach($list as $loop){  ?>
											<tr>
												<td><?=$i?><?php $i++; ?></td>
                                                <td><?=$loop['po_no']?></td>
                                                <td><?=$loop['po_date']?></td>
                                                <td><?=$loop['vendor_name']?></td>
                                                <td><a class="btn btn-info btn-xs" href="<?php echo base_url() ?>index.php/Stocklist/close_need_qty/<?=$loop['po_1_id']?>">Close</a></td>   
											</tr>
											<?php } }?>
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
	
  $(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
  
  </script>
</body>
</html>
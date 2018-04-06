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
                    <h2>Purchase Order List</h2>
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
                                                 <!--     <a href="<?php echo base_url('index.php/PriceList/addrate'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Product Rate</button></a>  -->
                                                                 
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th >S. No</th>
                                                <th >PO No</th>
                                                <th >Vendor Name</th>
                                                 <th >Order Value Before Tax</th>
                                                  <th >Order Value After Tax</th>
                                                   <th >Po Date</th>
                                                <th >Action</th>
                                                
                                              
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                                 $sno=1;
                                                if(is_array($order) && count($order) ) {
                                                        foreach($order as $loop){
                                            ?>
                                                <tr>
                                                 <td><?php echo $sno++; ?></td>
                                                 <td><?php echo $loop['po_no']; ?></td>
                                                 <td><?php echo $loop['vendor_name']; ?></td>
                                                 <td><?php echo $loop['po_stotal']; ?></td>
                                                 <td><?php echo $loop['po_gtotal']; ?></td>
                                                 <td><?php echo $loop['po_date']; ?></td>
                                                 <td><a href="<?php echo base_url() ?>index.php/Purchaseorder/order_print/<?php echo $loop['po_1_id']; ?>" class="btn btn-primary btn-xs">Preview PDF</a></td>
                                                </tr>
                                            <?php } } ?>
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
	
</script>
</body>
</html>
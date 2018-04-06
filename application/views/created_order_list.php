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
                    <h2>Manage Order List</h2>
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
                                                  <!--  <a href="<?php echo base_url('index.php/PriceList/addrate'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Product Rate</button></a>  -->
                                                                 
                                </div>
                                <div class="panel-body">
<div class="table-responsive">
    <table class="table datatable">
    <thead>
        <tr>
            <th >S. No</th>
            <th >Vendor Name</th>
            <th >Product Count</th>
            <th >Action</th>
            
          
        </tr>
    </thead>
        <tbody>
            <?php
                $sno=1;
                                            if(is_array($list) && count($list) ) {
                                                    foreach($list as $loop){
                                                            ?>
            <tr>
                <?php $count = $this->db->select('*')->from('tbl_order_arrange_vend')->join('tbl_order_arrange_pro','tbl_order_arrange_pro.tbl_order_arrange_vend_ref_id=tbl_order_arrange_vend.order_arrange_vend_id','left')->where('tbl_order_arrange_vend_ref_id',$loop['order_arrange_vend_id'])->get()->num_rows(); ?>
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo $loop['vendor_name']; ?></td>
                    <td ><?php echo $count; ?></td>
                    <td ><a href="<?php echo base_url('index.php/Purchaseorder/purchaseorder_add/'.$loop['order_arrange_vend_id']); ?>"><button class="btn btn-primary btn-xs">Confirm Order</button></a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-xs">Cancel Order</button></td>
                     <?php /*?> <td>
					 <?php foreach($get_storage as $row){ 
					 if($loop->storage==$row->cid){
					 
                    echo $row->storage_name;
                     
                    }}?>
                   </td>
                    <td>
            <a href="<?php echo base_url('index.php/Product/viewproduct/'.$loop->i_id); ?>"><button class="btn btn-success btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View"><span class="fa fa-eye"></span></button></a>
            <?php if($session_data['user_type']=='5'){?>
                                                  
                                                 <a href="<?php echo base_url('index.php/Product/editproduct/'.$loop->i_id);?>">                                                        <button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><span class="fa fa-pencil"></span></button></a>
                                                 
                                                 <?php }?>
                                                  <?php if($session_data['user_type']=='1'){?>
                                                  
                                                 <a href="<?php echo base_url('index.php/Product/editproduct/'.$loop->i_id);?>">                                                        <button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><span class="fa fa-pencil"></span></button></a>
                                                 
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
	
</script>
</body>
</html>
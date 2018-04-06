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
if(isset($inps['ven_id']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
    // $product = $inps['product'];
    // $po_num = $inps['po_num'];
    // $land = $inps['land'];
     $cid = $inps['ven_id'];
     
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
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Manage Pricelist</h2>
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
                               <?php /*?> <?php if($session_data['user_type']=='1'){?>
                                                    <a href="<?php echo base_url('index.php/Product/productadd'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Product</button></a>
                                                    <?php }?>  
                                                    <?php if($session_data['user_type']=='5'){?>
                                                   <a href="<?php echo base_url('index.php/Product/productadd'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Product</button></a>
                                                    <?php }?>                               
                                     <?php if($session_data['user_type']=='2'){?><?php */?>
                                                    <a href="<?php echo base_url('index.php/PriceList/addrate'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Product Rate</button></a>
                                                   <?php /*?> <?php }?>  <?php */?>
                                                                 
                                </div>
                                  <form action="<?=$this->config->item('base_url')?>index.php/PriceList" method="post" enctype="multipart/form-data" >

                               <div class="col-md-12" style="margin-top: 12px;">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Vendor</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('tbl_vendor')->result_array(); ?>
                                
                                                        <select id="ven_id" name="ven_id" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['vendor_id'])?'selected':''?> value="<?=$det['vendor_id']?>"><?=$det['vendor_name']?> </option>
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
            <th >S. No</th>
            <th >Vendor Name</th>
            <th >Product Description</th>
            <th >Manufacturer Name</th>
            <th >HSN Code</th>
            <th >Tax %</th>
            <th >Unit</th>
            <th >Product Rate</th>
            <th>Action</th>
          
        </tr>
    </thead>
        <tbody>
            <?php
                $sno=1;
                if(is_array($list) && count($list) ) {
                        foreach($list as $loop){
                                ?>
                    <tr>
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo $loop['vendor_name']; ?></td>
                    <td><?php echo $loop['i_name']; ?></td>
                    <td><?php echo $loop['manu_name']; ?></td>
                    <td><?php echo $loop['hsn_code']; ?></td>
                    <td><?php echo $loop['tax']; ?>%</td>
                    <td><?php echo $loop['location_name']; ?></td>
                    <td><?php echo $loop['price']; ?></td>
                    <td> <a href="<?php echo base_url('index.php/PriceList/editpricelist/'.$loop['id']);?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><span class="fa fa-pencil"></span></button></a></td>
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
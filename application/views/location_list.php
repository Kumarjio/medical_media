<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    <?php
if(isset($inps['uid']) && !empty($inps))
{
     //$cus_code = $inps['cus_code'];
    // $product = $inps['product'];
    // $po_num = $inps['po_num'];
    // $land = $inps['land'];
     $cid = $inps['uid'];
     
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
                    <h2> Unit List</h2>
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
                                    <a href="<?php echo base_url('index.php/Employee/location'); ?>">
                                    <button class="btn btn-primary"><span class="fa fa-plus"></span>Add Unit</button></a>
                                                                   
                                </div>

                                 <form action="<?=$this->config->item('base_url')?>index.php/Location" method="post" enctype="multipart/form-data" >

                               <div class="col-md-12" style="margin-top: 12px;">
                               <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Unit</label>
                                    <div class="col-md-8">  
                                <?php $cusdt =  $this->db->select('*')->get('master_location')->result_array(); ?>
                                
                                                        <select id="uid" name="uid" class="form-control selectpicker"  data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                                                         <option value=''>Select All</option>
                                                        <?php foreach($cusdt as $det) { ?>
                                                        <option <?=($cid==$det['id'])?'selected':''?> value="<?=$det['id']?>"><?=$det['location_name']?> </option>
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
                                                   <th>Unit </th>
                                                   <th>Action</th>
                                                    
                                                </tr>
											</thead>
                                            <tbody>
                                         <?php foreach ($list as $post){ $sno=1; ?>
											<tr>
												<td><?php echo $post['id'] ?></td>
												<td><?php echo $post['location_name']?></td>
                                                <td><a href="<?php echo base_url('index.php/Employee/edit_unit/'.$post['id']) ?>"> <button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" type="button" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                                </td>
                                               
												
                                              </tr>
											<?php } ?>
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

</body>
</html>
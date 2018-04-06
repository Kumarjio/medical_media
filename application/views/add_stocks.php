<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>


</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Order Upload</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        
                        <div class="col-md-12">                        

                            <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3 class="pull-left">Add Order</h3>
                                    
                                    <form  role="form" class="form-horizontal" method="post" action="<?php echo base_url('index.php/Stocklist/import');?>" enctype="multipart/form-data">
                                    
                                    <div class="panel-body">
                                    <?php /*?><div class="form-group">
                                        <label class="col-md-3 control-label">PO NO. <sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="pono"  id="pono">
                                                
                                              <div class="error" ><?php echo form_error('name'); ?></div>	

                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                                <label class="col-md-3 control-label">PO Date<sup style="color:#f00">*</sup></label>
                                                <div class="col-md-6">
                                                 
                                                <input type="text"   class="form-control datepicker uppercase "    name="date" id="all_date" value="<?php echo date("Y-m-d");  ?>" > 
                                                </div>
                                            </div><?php */?>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">File <sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                                <input type="file" class="form-control" name="excel_file" required id="excel_file">
                                                
                                              <div class="error" ><?php echo form_error('name'); ?></div>	

                                            </div>
                                        </div>
                                        
                                        <?php /*?><div class="form-group">
                                        <label class="col-md-3 control-label">Project Coordinator <sup  style="color:#f00">*</sup></label>  
                                            <div class="col-md-6">
                                            <select class="select form-control" name="empid">
                                            <?php foreach($empid as $row) {?>
                                            <option value="<?php echo $row['admin_id']?>"><?php echo $row['name']?></option>
                                            <?php }?>
                                            </select>
                                           
                                            </div>
                                        </div><?php */?>
                                        <div class="col-md-3"></div>
                                        <div class="btn-group pull-left col-md-7">                                            <input class="btn btn-primary" value="Submit" type="submit"><input class="btn btn-warning" type="Reset">
                                        
        <?php /*?><a class="btn" download href="<?php echo base_url('excel_upload/excel_uopload.csv'); ?>"><button type="button" class="btn btn-success btn-sm" >Download Model Upload File</button></a><?php */?>
</div>                                                                                                                          
                                    </div>  
                                    
                                   
                                                                                 
                                    </form>
                                </div>
                            </div>
                            <!-- END JQUERY VALIDATION PLUGIN -->
                            </div>
                        </div>
                    </div>

                    
                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
</body>
</html>
     <?php $this->load->view('include_js'); ?>
      <script type="text/javascript">
$(document).on('focus','.datepickerr',function() 
  {
    $( ".datepickerr" ).datepicker();
  });
   </script>
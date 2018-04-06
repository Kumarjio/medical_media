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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Expenses Master</h2>
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

                               
                                                   
                                                    <a href="<?php echo base_url('index.php/Expenses_master/addExpenses1'); ?>"><button class="btn btn-primary"><span class="fa fa-plus"></span>Add Expenses Master</button></a>
                                                                                  
                                    
                                    <ul class="panel-controls">
                                    <!--<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>-->
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php 
                                        $cnt=1;
                                            foreach($customer as $loop){
                                                    ?>
                                            <tr>
                                                <td><?php echo $cnt; $cnt++; ?></td>
                                                <td><?php echo strtoupper($loop->expenses_type) ; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($loop->date)) ; ?></td>
                                                <td>
                                                 
                                                    <a href="<?php echo base_url();?>index.php/Expenses_master/edit_expans_type/<?php echo $loop->expenses_id ?>"><button class="btn btn-warning btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </button></a>
                                                        <a href="javascript:void(0);" onclick="fndelete('<?php echo $loop->expenses_id;?>');">
                                                <button class="btn btn-danger btn-rounded btn-condensed btn-sm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-times"></i></button> </a>
                                              
                                                    </td>
                                            </tr>
                                            <?php  }?>
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
<script type="text/javascript">
    function fndelete(id) {
       // alert(id);
        var deletopt=confirm('Are you sure, do you want to delete this record?');
        if(deletopt)  {
            window.location =  '<?php echo base_url('index.php/Expenses_master/deleteExpense')?>/'+id;
            return true;
        }  else  {
            return false;
        }
    }
    
</script>
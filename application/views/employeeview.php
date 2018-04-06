<?php $session_data = $this->session->all_userdata();?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    

     
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Employee</h2>
                                                        <input class="btn btn-primary pull-right" value="Back" onClick="window.history.go(-1)" type="button">

                </div>
                <!-- END PAGE TITLE -->                
			<?php $customer = $customer[0]; ?>
                <!-- PAGE CONTENT WRAPPER -->
                
				<div class="page-content-wrap">
                    
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> View Employee</h3>
                                    <!--<p>Some quick info about this user</p>-->
                                </div>
                                <form class="form-horizontal">
                                <div class="panel-body form-group"> 
                                <div class="row">
                                <div class="col-md-6">                                   
                                    <div class="form-group">
											 <label class="col-md-4 control-label">Employee Code</label>
                                                <div class="col-md-8">                                            
                                                   <input type="text" class="form-control uppercase"  name="customer_name"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo  $customer->emp_code;  ?>" readonly>   
                                                </div>
                                            </div>
                                     <div class="form-group">
											 <label class="col-md-4 control-label">Employee Name</label>
                                                <div class="col-md-8">                                            
                                                   <input type="text" class="form-control uppercase"  name="customer_name"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo  "EM00".$customer->name;  ?>" readonly>   
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
											 <label class="col-md-4 control-label">User Name</label>
                                                <div class="col-md-8">                                            
                                                   <input type="text" class="form-control uppercase"  name="customer_name"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo  $customer->username;  ?>" readonly>   
                                                </div>
                                            </div>
                                            <div class="form-group">
											 <label class="col-md-4 control-label">Passowrd</label>
                                                <div class="col-md-8">                                            
                                                   <input type="text" class="form-control uppercase"  name="customer_name"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo  $customer->password;  ?>" readonly>   
                                                </div>
                                            </div>
                                           
                                            
                                   <div class="form-group">
											 <label class="col-md-4 control-label">Phone</label>
                                                <div class="col-md-8">                                            
                                                   <input type="text" class="form-control uppercase"  name="customer_name"  placeholder="Enter Employee Name" id="customer_name" value="<?php echo  $customer->phone;  ?>" readonly>   
                                                </div>
                                            </div>   
                                    
                                   
                                     
									
                                    
                                  </div>
                                  
                                  </div>
                                </div>
                                </form>
                            </div>
                        </div>
                     </div>            
                   </div>
        <!-- END PAGE CONTAINER -->
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>



        
     


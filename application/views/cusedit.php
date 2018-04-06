<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
<?php $vendor = $vendor[0]; ?>
          <div class="row">

            <div class="col-md-12">
              <input class="btn btn-primary pull-right" value="Back" onClick="window.history.go(-1)" type="button">
             <form class="form-horizontal" id="jvalidate" role="form" action="<?php echo base_url('index.php/Customer/update_cus/'.$vendor->customer_id);?>" method="post">
               

             <div class="panel panel-default">
                <div class="panel-body">
                <center><h3>Edit Customer</h3></center>
                <div class="panel-body">       
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12">  
                            <div class="form-group">                                        
                               <label class="col-md-2 control-label">Customer Name<sup style="color:#f00"> * </sup></label>
                               <div class="col-md-6">
                               <input type="text" class="form-control "  name="vendor"  placeholder="Enter Vendor Name" required id="vendor" value="<?php echo $vendor->customer_name;  ?>" >
                               <div class="error" ><?php echo form_error('seller_name'); ?></div>                        
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">                                        
                                <label class="col-md-4 control-label"> Full Address With pin code</label>
                                <div class="col-md-8">
                                <textarea type="text" class="form-control "  name="address"  placeholder="Enter address"  id="address"  ><?php echo $vendor->cus_address;  ?></textarea>
                                <div class="error" ><?php echo form_error('address'); ?></div>                   
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-6" style="margin-top: 20px;"> 
                            <div class="form-group">                                        
                               <label class="col-md-4 control-label">Credit period<sup style="color:#f00"> * </sup></label>
                               <div class="col-md-8">
                               <input type="text" class="form-control "  name="c_period"  placeholder="Enter Credit period" value="<?php echo $vendor->c_period;  ?>" required id="c_period">
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <center><h3>Account Details</h3></center>
                <div class="panel-body">                                                                        
                    <div class="row">
                       <div class="col-md-12">

                            <div class="col-md-6">                                      
                                <div class="form-group" style="padding-top: 1px;padding-bottom: 1px">                
                                    <label class="col-md-4 control-label">Account No</label>
                                    <div class="col-md-8">
                                    <input type="text"  class="form-control"  name="account"  placeholder="Enter Account No" id="account" value="<?php echo $vendor->cus_account_no;  ?>" >
                                    <div class="error" ><?php echo form_error('account'); ?></div>           
                                    </div>
                                </div>  
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Bank Name</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="bank_name"  placeholder="Enter bank name"  id="bank_name" value="<?php echo $vendor->cus_bank_name;  ?>" >
                                    <div class="error" ><?php echo form_error('bank_name'); ?></div>          
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Bank Branch</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="branch"  placeholder="Enter bank Branch"  id="branch" value="<?php echo $vendor->cus_bank_branch;  ?>" >
                                    <div class="error" ><?php echo form_error('branch'); ?></div>          
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">IFSC Code</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="ifsc"  placeholder="Enter IFSC code"  id="ifsc" value="<?php echo $vendor->cus_ifsc_code;  ?>" >
                                    <div class="error" ><?php echo form_error('ifsc_code'); ?></div>            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">        
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Company PAN No</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="pan_no"  placeholder="Enter Company PAN No"  id="pan_no" value="<?php echo $vendor->cus_company_panno;  ?>" >
                                    <div class="error" ><?php echo form_error('company_panno'); ?></div>           
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Aadhar No</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="aadhar_no"  placeholder="Enter Aadhar No"  id="aadhar_no" value="<?php echo $vendor->cus_aadhar_no;  ?>" >
                                    <div class="error" ><?php echo form_error('city_name'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Reference Details</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="ref_det"  placeholder="Enter Ref Details"  id="ref_det" value="<?php echo $vendor->cus_reference_det;  ?>" >
                                    <div class="error" ><?php echo form_error('ref_det'); ?></div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="panel panel-default">
        <div class="panel-body">
            <center><h3>Contact Details</h3></center>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">                                      
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Email ID 1</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="email1"  placeholder="Enter Email ID 1"  id="email1" value="<?php echo $vendor->cus_email1;  ?>" >
                                    <div class="error" ><?php echo form_error('email1'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Email ID 2</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="email2"  placeholder="Enter Email ID 2"  id="email2" value="<?php echo $vendor->cus_email2;  ?>" >
                                    <div class="error" ><?php echo form_error('email2'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Email ID 3</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="email3"  placeholder="Enter Email ID 3"  id="email3" value="<?php echo $vendor->cus_email3;  ?>" >
                                    <div class="error" ><?php echo form_error('email3'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Website</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="website"  placeholder="Enter Web Site"  id="website" value="<?php echo $vendor->cus_website;  ?>" >
                                    <div class="error" ><?php echo form_error('city_name'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Lane Line No 1</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="lane_line1"  placeholder="Enter Lane Line No 1"  id="lane_line1" value="<?php echo $vendor->cus_lane_line1;  ?>" >
                                    <div class="error" ><?php echo form_error('lane_line'); ?></div>           
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Lane Line No 2</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="lane_line2"  placeholder="Enter Lane Line No 2"  id="lane_line2" value="<?php echo $vendor->cus_lane_line2;  ?>" >
                                    <div class="error" ><?php echo form_error('lane_line2'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Lane Line No 3</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="lane_line3"  placeholder="Enter Lane Line No 3"  id="lane_line3" value="<?php echo $vendor->cus_lane_line3;  ?>" >
                                    <div class="error" ><?php echo form_error('lane_line2'); ?></div>           
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">        
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Mobile No 1</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="mobile_no1"  placeholder="Enter Mobile No 1"  id="mobile_no1" value="<?php echo $vendor->cus_mobile_no1;  ?>" >
                                    <div class="error" ><?php echo form_error('mobile_no1'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Contact Person for mobile No1</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="contact_person1"  placeholder="Enter Contact Person"  id="contact_person1" value="<?php echo $vendor->cus_contact_person1;  ?>" >
                                    <div class="error" ><?php echo form_error('city_name'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Mobile No 2</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="mobile_no2"  placeholder="Enter Mobile No 2"  id="mobile_no2" value="<?php echo $vendor->cus_mobile_no2;  ?>" >
                                    <div class="error" ><?php echo form_error('mobile_no2'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Contact Person for mobile No 2</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="contact_person2"  placeholder="Enter Contact Person"  id="contact_person2" value="<?php echo $vendor->cus_contact_person2;  ?>" >
                                    <div class="error" ><?php echo form_error('city_name'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Mobile No 3</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="mobile_no3"  placeholder="Enter Mobile No 3"  id="mobile_no3" value="<?php echo $vendor->cus_mobile_no3;  ?>" >
                                    <div class="error" ><?php echo form_error('mobile_no3'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Contact Person for mobile No 3</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="contact_person3"  placeholder="Enter Contact Person"  id="contact_person3" value="<?php echo $vendor->cus_contact_person3;  ?>" >
                                    <div class="error" ><?php echo form_error('contact_person3'); ?></div>            
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <center><h3>Additional Details</h3></center>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">                                      
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Dr.Registration No</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="reg_no"  placeholder="Enter Dr.Registration No"  id="reg_no" value="<?php echo $vendor->cus_dr_reg_no;  ?>" >
                                    <div class="error" ><?php echo form_error('reg_no'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Reg ID</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="reg_id"  placeholder="Enter Reg ID"  id="reg_id" value="<?php echo $vendor->cus_reg_id;  ?>" >
                                    <div class="error" ><?php echo form_error('reg_id'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">GST No</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="gst"  placeholder="Enter GST No"  id="gst" value="<?php echo $vendor->cus_gst_no;  ?>" >
                                    <div class="error" ><?php echo form_error('gst'); ?></div>            
                                    </div>
                                </div>
                                <!-- <div class="form-group">                                        
                                    <label class="col-md-4 control-label">TIN No</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="tin_no"  placeholder="Enter Tin No"  id="tin_no" value="<?php echo $vendor->cus_tin_no;  ?>" >
                                    <div class="error" ><?php echo form_error('tin_no'); ?></div>            
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-6"> 
                               <!--  <div class="form-group">                                        
                                    <label class="col-md-4 control-label">CST No</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="cst"  placeholder="Enter CST No"  id="cst" value="<?php echo $vendor->cus_cst_no;  ?>" >
                                    <div class="error" ><?php echo form_error('cst'); ?></div>            
                                    </div>
                                </div> -->
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Drug Lisence No 1</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="drug1"  placeholder="Enter Drug Lisence No 1"  id="drug1" value="<?php echo $vendor->cus_drug_lisence1;  ?>" >
                                    <div class="error" ><?php echo form_error('city_name'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Drug Lisence No 2</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control "  name="drug2"  placeholder="Enter Drug Lisence No 2"  id="drug2" value="<?php echo $vendor->cus_drug_lisence2;  ?>" >
                                    <div class="error" ><?php echo form_error('city_name'); ?></div>            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-4 control-label">Tax Type</label>
                                    <div class="col-md-8">
                                    <label><input type="radio" name="tax_type" value="1" required <?php if($vendor->cus_tax_type == 1){?> checked <?php } ?>>&nbsp;&nbsp;GST&nbsp;&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input type="radio" name="tax_type" value="2" required <?php if($vendor->cus_tax_type == 2){?> checked <?php } ?>>&nbsp;&nbsp;IGST&nbsp;&nbsp;</label>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group pull-right">
                            <div class="btn-group pull-right col-md-12"> <input class="btn btn-danger pull-right" value="Back" onClick="window.history.go(-1)" type="button"><input class="btn btn-primary" value="Submit" type="submit" name="submit">
                            </div>    
                        </div>
                   </div>

                   
               </div>
            </div> 
        </div>           
           
    
        
     
</body>
</html>
     <?php $this->load->view('include_js'); ?>


<?php
$invoice_data = $invoice_data[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('include_css'); ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>

    <link type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet" />

     <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> View Purchase Entry</h2>
                </div>
                <!-- END PAGE TITLE -->                
                <?php  ?>
                <!-- PAGE CONTENT WRAPPER -->
                                            
                <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
<div class="panel-body">
<h3>View Purchase Entry</h3>
<div class="panel-body">                                                                        
<div class="row">

    <div class="col-md-6">
        
        <?php /*?><div class="form-group">
            <label class="col-md-4 control-label">Supplier Name</label>
            <label class="col-md-8">                                            
               <?php echo $invoice_item->vname; ?>                                 
            </label>
        </div><?php */?>
        <div class="form-group">
            <label class="col-md-4 control-label">Date of Purchase</label>
            <label class="col-md-8">                                            
               <?php echo $invoice_data->pdate; ?>                                 
            </label>
        </div>
        <div class="form-group">                                        
            <label class="col-md-4 control-label">Invoice No</label>
            <label class="col-md-8">
               <?php echo $invoice_data->vinvno; ?>                                 
            </label>
        </div>
      
        
        <?php /*?><div class="form-group">                                        
            <label class="col-md-4 control-label">Storage Location</label>
            <label class="col-md-8"><?php echo $invoice_data->slocation; ?></label>
        </div><?php */?>
   
    
        <?php /*?><div class="form-group">                                        
            <label class="col-md-4 control-label">Date of Storage</label>
            <label class="col-md-8"><?php echo $invoice_data->stordate; ?></label>
        </div><?php */?>
        <div class="form-group">                                        
            <label class="col-md-4 control-label">Remarks</label>
            <label class="col-md-8"><?php echo $invoice_data->remarks; ?></label>
        </div>
        
       <?php /*?> <div class="form-group">                                        
            <label class="col-md-4 control-label">VAT</label>
           
        </div><?php */?>
       
        <!--<div class="form-group">                                        
            <label class="col-md-4 control-label">Price</label>
            <label class="col-md-8"><?php echo $invoice_data->price; ?></label>
        </div>-->

    </div>

</div>
</div>
</div>
                            </div>
                            </div>
                       
						 <div class="col-md-12">
							
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                          
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="mytable">
                                            <thead>
                                                <tr>
                                                 <!-- <th>Tax</th>
                                                    <th>Sel.Price</th>-->
                                                    <th>Supplier Name</th>
                                                    <th>Product Name</th>
                                                    <th>Serial/Ime NO</th>
                                                    <th>Pur.Rate</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
											$val =0;
											foreach($invoice_item as $loop) {
												$val = $loop->p_rate*$loop->qtys; ?>
                                        	<tr>
                                            <!--<td><?php echo $loop->p_tax; ?></td>
                                                    <td><?php echo $loop->s_price; ?></td>-->
                                                    
                                                    <td><?php echo $loop->vname; ?></td>
                                                    <td><?php echo $loop->i_name; ?></td>
                                                    <td><?php echo $loop->ime_serials; ?></td>
                                                    <td><?php echo $loop->p_rate; ?></td>
                                                    <td><?php echo $loop->qtys; ?></td>
                                                    <td><?php echo $val; ?></td>
                                                    <!--<?php $taxamount = ($loop->p_rate * ($loop->p_tax / 100)) * $loop->qty; ?>-->
                                                    <input type="hidden" name="taxamount" id="taxamount" class="taxamount" value="<?php echo $taxamount; ?>">
                                                </tr>
                                                
                                                <?php } ?>
											
											
										</tbody>
                                        </table>
										<table class="table" width="100%">
                                            <thead>
                                                
                                               
                                                 <tr>
                                                    <td colspan="9" width="75%">
													</td>
                                                    <td style="font-weight:bold;">Tax Amount</td>
                                                    <td style="font-weight:bold;" width="12%"><input type="text" class="form-control" name="tax" style="color:#000" value="<?php echo $loop->taxamount; ?>" readonly id="tax"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="9" width="75%">
													</td>
                                                    <td style="font-weight:bold;">Total Amount</td>
                                                    <td style="font-weight:bold;" width="12%"><input type="text" class="form-control" name="gtotal" style="color:#000" value="<?php echo $loop->gtotal; ?>" readonly id="gtotal"></td>
                                                </tr>
									</table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

							<input type="hidden" name="testno" id="testno" value="2" />
							<input type="hidden" name="extratax" id="extratax" value="" />
							     <div class="panel-footer">
                                                                 <input class="btn btn-primary pull-right" value="Back" onClick="window.history.go(-1)" type="button">
                                                             </div>
                                
                                
                          
						  

                        </div>
                  

					   </div>
					
					</form>
					</div>
                


                        
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
		

					
					
					
					<!-- Button trigger modal -->


<!-- Modal -->



        <!-- END PAGE CONTAINER -->
          <?php $this->load->view('include_js'); ?>
		 
     

	 
</body>
</html>

<script>
	function fnconfirm(id) {
		var deletopt=confirm('Do you want to confirm?');
	  	if(deletopt)  {
			window.location =  '<?php echo base_url('index.php/Purchase/purchaseConfirm/')?>/'+id;
		    return true;
	  	}  else  {
		  	return false;
	  	}
	}
	
	function fncancel(id) {
		var deletopt=confirm('Do you want to cancel?');
	  	if(deletopt)  {
			window.location =  '<?php echo base_url('index.php/Purchase/purchaseCancel/')?>/'+id;
		    return true;
	  	}  else  {
		  	return false;
	  	}
	}
	
	$(document).ready(function(){
		 var iSum = 0;
			$('.taxamount').each( function() {
           		iSum = iSum + parseFloat($(this).val());
        	});
        	$('#taxtotal').val( parseFloat(iSum).toFixed(2));
	});
</script>



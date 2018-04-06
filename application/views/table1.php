<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php 
$session_data = $this->session->all_userdata();
$this->load->view('include_css');
$this->load->model('Sales_model');
 ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
    
<!-- PAGE TITLE -->
                
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                              <div class="panel-body">
                                    <div class="table-responsive" id="print_panel">
                                      <table class="table" border="1" width="1200px">
                                     <?php /*?> <tr align="center">
                                           <img  src="<?php echo base_url('assets/img/Final_New.jpg'); ?>" alt="Arrow18" style="height:130px;width:1100px;"/>
                                          </tr><?php */?>
                                          <tr align="center">
                                         <th colspan="8"><center><u>INVOICE</u></center></th>
                                         </tr>      
                                         <tr>
                                                   <td colspan="4" ><strong><u>Vendor</u></strong><br>
                                                   <?php if(isset($calls) && !empty($calls)){
													   $l=0;
													foreach($calls as $loop){
														if($l == 0){?>
                                                   Vendor Name:<?=$loop['seller_name']?><br>
                                                  Area Name:<?=$loop['vendor_location']?><br>
                                                  City Name:<?=$loop['city_name']?><br>
                                                   State Name:<?=$loop['state_name']?><br>
                                                 Contact:<?=$loop['telephone']?><br>
                                                  Email :<?=$loop['email']?><br>
                                             
                                                    
                                                    <td colspan="3"><strong><u>Invoice</u></strong><br>
                                                    
														
                                                    <span style="float:left">
                                                  
                                                   Invoice No: <?=$loop['pur_req_id']?><br>
                                                    Invoice Date: <?=$loop['cds']?><br>
                                                    </span>
                                                        <?php } $l++; } } ?></td>                                              
                                                    
                                                     
                                           </tr>
                                           <tr>
                                                   <td colspan="4" ><strong><u>Buyer Name : </u></strong><br>
                                                   <?php if(isset($calls) && !empty($calls)){
														$l=0;
													foreach($calls as $loop){
														if($l == 0){?>
                                                    <span style="float:left">
                                                   
                                                   <?php if($session_data['location'] == 'Chennai'){?>
                                                  Arrow 18 Fortune Retail Distributions P Ltd,<br>
												  New No. 316, Old No. 253.<br>
                                                  TTK Road, Alwarpet<br>
                                                  Chennai - 600 018	<br>
                                                  Email :ttkroad@lenovorld.com<br>
                                                  Ph: 04448573200, Mob: 9710809000<br>
                                                   Name:<?=$loop['name']?>
												  <?php  } ?>
												  <?php /*?>else if($session_data['location'] == 'Ambattur'){?>
                                                  Arrow 18 Fortune Retail Distributions P Ltd,<br>
												  New 455/4 Old 418/4, CTH Road<br>
                                                  Ambattur, Chennai-600 053<br>
                                                  Contact: 044-24997800, 91 7299303333<br>
                                                  Email :Ambattur@lenovorld.com<br>
                                                  
                                                 <?php } <?php */?>
                                                     
													  </span>
                                                        <?php } $l++; } } ?></td> 
                                                        <td colspan="3">
                                                    <?php if(isset($calls) && !empty($calls)){
														$l=0;
													foreach($calls as $loop){
														if($l == 0){?>
                                                    <span style="float:left">
                                                  
                                                   TIN NO     : 33251466303<br>
                                                    CST No : 1067901<br>
                                                    PAN NO: <br>
													 Service Tax No: <br>
                                                     </span>
                                                        <?php } $l++; } } ?></td>                                                 
                                                    
                                                     
                                           </tr>
                                            <?php /*?><tr align="center">
                                         <th colspan="8"><center><u>Subject :- Arrow18 LED LIGHTING INVOICE</u></center></th>
                                         </tr> <?php */?>
                                                
                                            <tr>    <th width="112">S.No</th>
                                            <th width="114">Product Name</th>
                                                    <th width="114">Item Code & Description</th>
                                                    <th width="98">Quantity(A)</th>
                                                    <th width="98">Unit </th>
                                                    <th width="162"> Supply Rate</th>
                                                    <th width="571">Supply Amount </th>
                                                     
                                                   
                                            </tr>
                                             <?php if(is_array($calls) && count($calls) ) {
                                                    
														$i=1;
														$s_no = '';
										                $s_no[] = '';
														$amtp = 0;
														$insamt =0;
														$sub =0;
														$sale_price =0;
														$sub2 =0;
														$service1 =0;
														$service2 =0;
														$service3 =0;
														$delivery=0;
														$tax =0;
														$qty = 0;
														//$gt = 0;
														$insch = 0;
														//echo '<pre>';print_r($calls);exit;
												     foreach($calls as $loop){
															    $sale_price =$loop['pur_rate'];
																$sub =$loop['pur_rate']*$loop['qty'];
																$sub2 +=$sub; 
																$tax =$loop['tax_amt'];
																$qty =$loop['qty'];
																//$amtp = $loop['paym_amount'];
																//$insamt =$loop['insurance_amt'];
																//$delivery =$loop['delivery'];
																//$insch = $loop['instcharges'];
																//$service1 =($loop['instcharges']*14)/100;
															   //$service2 =($loop['instcharges']*0.5)/100;
															  // $service3 =($loop['instcharges']*0.5)/100;
															  /* $gt =$sub+$insch+$tax+$service1+$service2+$service3+$insamt+$delivery;*/
													?>
                                             <tr>
                                                        
                                                        <td><?=$i?><?php $i++; ?></td>
                                                        <td><?=$loop['i_name']?></td>
                                                        <td><?=$loop['descr']?></td>
                                                        <td><?=$qty?></td>
                                                        <td>Nos </td>
                                                         <td><?=$sale_price?></td>
                                                         <td><?=number_format($sub,2)?></td>
                                                        <?php  } }  ?>
                                              </tr>
                                              
                                             <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>SubTotal</td>
                                                       <td><?=number_format($sub2,2)?></td>
                                                      
                                               </tr>
                                              <?php /*?> <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Installation Charges</td>
                                                       <td><?=$loop['instcharges']?></td>
                                                  </tr><?php */?>
                                                <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Input Vat @<?=$loop['vats']?>%</td>
                                                       <td><?=number_format($tax,2)?></td>
                                                </tr>
                                                <?php /*?> <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>CST @ <?=$loop['csts']?>%</td>
                                                       <td>-</td>
                                                  </tr> 
                                                   <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Service Tax @14% </td>
                                                      <td><?=$service1?></td>
                                                  </tr>
                                                  <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Swatchh Bhart Cess @0.5%  </td>
                                                      <td><?=$service2?></td>
                                                  </tr>
                                                  <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Kirishi Kalyan Cess @0.5% </td>
                                                       <td><?=$service3?></td>
                                                  </tr>
                                                 
                                                  <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Insurance Amount  </td>
                                                      <td><?=$insamt?></td>
                                                  </tr> <?php */?>
                                                 
                                                   <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>Round  Pay (+)</td>
                                                      <td>-</td>
                                                  </tr> 
                                                   <tr>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td>&nbsp;</td>
                                                       <td><strong>Grand Total</strong> </td>
                                                       <td><strong><?=number_format($loop['total_amt'],2)?></strong></td>
                                                       
                                                  </tr> 
                                                  
                                                  
                                                   <?php /*?><tr>
                                                        
                                                        
                                                       <th colspan="6">Mode Of Payment:
                                                     <?php  if($loop['payment_method'] == 1)
													   {
														   ?>
                                                      <B>CASH</B><input name="checkbox" type="checkbox" value="1" checked class="cash">
                                                       <?php
													   }
													   else if($loop['payment_method'] == 2)
													   {
														   ?>
														   <B>CHEQUE</B><input name="checkbox" class="cheque" checked type="checkbox" value="1" checked>
														 <?php 
													   }
													   else if($loop['payment_method'] == 3)
													   {
														   ?>
														   <B>ONLINE TRANSFER</B><input name="checkbox" class="cheque" checked type="checkbox" value="1" checked>
														 <?php 
													   }
													   else if($loop['payment_method'] == 4)
													   {
														   ?>
														  <B>CARD</B><input name="checkbox" class="card" checked type="checkbox" value="1" checked>
                                                           <?php
													   }?>
                                                       
														  </th> 
                                                       </tr>  <?php */?>
                                                    
                                                  
                                            <?php /*?><tr>
                                              <td colspan="7"><strong>Rupees in words:</strong>-<?=$this->Sales_model->rupeestowords1($loop['total_amt'])?></td>
                                            </tr><?php */?>
                                            <tr>
                                           <td colspan="7"> <strong>For Arrow18,<br><br><br><br><br><br>
                                           Authorized Signatory<br><br><br>
                                           Recevied Signature with seal</strong>
                                           </td>      
                                            
                                            </tr>
                                            
									    </table>
                                 
                            </div>
                          <center>  <button type="button" class="btn btn-primary" onClick="print_fun('print_panel');">Print</button>
                            <a class="btn" href="<?php echo base_url('index.php/Sales/Invoicelist'); ?>" ><button type="button" class="btn btn-success" data-original-title="invoice">Cancel</button></a></center>
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

function print_fun(ids){
	var defaultpage = document.body.innerHTML;
	var printpage = document.getElementById(ids).innerHTML;
	document.body.innerHTML = printpage;
    window.print() ;
	document.body.innerHTML = defaultpage;
}
$(document).ready(function(){
    
});
</script>
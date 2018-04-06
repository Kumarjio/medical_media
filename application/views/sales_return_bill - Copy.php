<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
/*table, th, td {
    border: 1px solid black;
}*/
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td  
/*  border-color: #E5E5E5;
*/ 
 border-width: 1px;
  border: 1px solid;
 @media screen { p.bodyText {font-family:verdana, arial, sans-serif;} #print_panel{ margin: 100mm 100mm 100mm 100mm; } }

</style>
<?php $this->load->view('include_css');
 ?>
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
    <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$no = round($print_det[0]['return_gtotal'],2);
	   $point = round($print_det[0]['return_gtotal'] - $no, 2) * 100;
	   $hundred = null;
	   $digits_1 = strlen($no);
	   $i = 0;
	   $str = array();
	   $words = array('0' => '', '1' => 'one', '2' => 'two',
		'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
		'7' => 'seven', '8' => 'eight', '9' => 'nine',
		'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
		'13' => 'thirteen', '14' => 'fourteen',
		'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
		'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
		'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
		'60' => 'sixty', '70' => 'seventy',
		'80' => 'eighty', '90' => 'ninety');
	   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
	   
	   while ($i < $digits_1) {
		 $divider = ($i == 2) ? 10 : 100;
		 $number = floor($no % $divider);
		 $no = floor($no / $divider);
		 $i += ($divider == 10) ? 1 : 2;
		 if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
			$str [] = ($number < 21) ? $words[$number] .
				" " . $digits[$counter] . $plural . " " . $hundred
				:
				$words[floor($number / 10) * 10]
				. " " . $words[$number % 10] . " "
				. $digits[$counter] . $plural . " " . $hundred;
		 } else $str[] = null;
	  }
	  
	  $str = array_reverse($str);
	  $result = implode('', $str);
	  $points = ($point) ?
		" point " . $words[$point / 10] . " " . 
			  $words[$point = $point % 10] : '';
	  
	  if($result!='')
	  {
		  $ret1 =  "Rupees ".$result ." ";
	  }
	  else
	  {
		  $ret1 =  "Rupee Zero ";
	  }
	  if($points != '')
			  $ret1= $ret1. $points . " Paise";
	  //$ret1.=' Only';
	  
	  $ret1 = ucwords($ret1);
	  
  
 ?> 
<!-- PAGE TITLE -->
                
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                 
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        
                        
                        <div class="">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                              <div class="panel-body">
                                    <div class="table-responsive" id="print_panel">
                                    
                                    <h3><center><u>Sales Cancel TAX INVOICE</u></center></h3>
                                     <table>
                                       <thead>
                                        <tr>
                                          <th colspan="10" style="padding: 10px;width: 200px;border: 2px solid black;">
                                              <span><h2 style="margin: 0px;margin-left: 20px;">A2Z Enterprises</h2></span>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>Reg Office:</span>New No:9,Old No: 33,H Block, Muthu Mari amman Koil Street,MMDA Colony, Arumbakkam, Chennai - 600106</span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>Branch Office:</span>New No:9,Old No: 135,I Block,MMDA Colony Main Road, Arumbakkam, Chennai - 600106</span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>Phone : </span> 044-48585844</span><span style="margin-left: 20px;font-size: 9px;"><span>Mobile : </span> 9444449914 / 9884070990</span>
                                          </th>
                                          <th colspan="5" style="padding: 5px;width: 200px;border: 2px solid black;">
                                            
                                              <span style="margin-left: 20px;font-size: 9px;"><span>GST No : </span> 33AVLPM5276G1ZC</span><br><span style="margin-left: 20px;font-size: 9px;"><span>State Code : </span> 33 </span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>D.L No 1 :</span> 3753/MZII/20B</span><br><span style="margin-left: 20px;font-size: 9px;"><span>D.L No 2 : </span> 3918/MZII/21B</span>
                                              
                                          </th>
                                        </tr>
                                        <tr>
                                          <th colspan="2" style="padding: 5px;width: 200px;border: 2px solid black;">
                                            <span style="margin-left: 20px;font-size: 9px;"><span><?php echo $print_det[0]['customer_name'] ?></span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><?php echo $print_det[0]['cus_address'] ?></span><br>
                                             
                                          </th>
                                          <th colspan="3" style="padding: 5px;width: 200px;border: 2px solid black;">
                                            <span style="margin-left: 20px;font-size: 9px;">Invoice No:</span><br>
                                             <!--  <span style="margin-left: 20px;font-size: 9px;">Customer Tin :</span><br> -->
                                              <span style="margin-left: 20px;font-size: 9px;">Customer GST No :</span><br>
                                              
                                          </th>
                                           <th colspan="3" style="padding: 5px;width: 200px;border: 2px solid black;">
                                            <span style="margin-left: 20px;font-size: 9px;"><?php echo "SB"; echo $print_det[0]['return_bill_no'] ?></span><br>
                                             <!--  <span style="margin-left: 20px;font-size: 9px;"><?php echo $print_det[0]['cus_tin_no'] ?></span><br> -->
                                              <span style="margin-left: 20px;font-size: 9px;"><?php echo $print_det[0]['cus_gst_no'] ?></span><br>
                                              
                                          </th>
                                           <th colspan="3" style="padding: 5px;width: 200px;border: 2px solid black;">
                                            <span style="margin-left: 20px;font-size: 9px;">Date : </span><br>
                                              <span style="margin-left: 20px;font-size: 9px;">D.L No 1 : </span><br>
                                              <span style="margin-left: 20px;font-size: 9px;">D.L No 2 : </span><br>
                                              
                                          </th>
                                           <th colspan="4" style="padding: 5px;width: 200px;border: 2px solid black;">
                                            <span style="margin-left: 20px;font-size: 9px;"><?php echo $print_det[0]['return_date'] ?></span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><?php echo $print_det[0]['cus_drug_lisence1'] ?></span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><?php echo $print_det[0]['cus_drug_lisence2'] ?></span><br>
                                              
                                          </th>
                                        </tr>
                                        <tr style="border: 2px solid black;">
                                          <th style="border: 2px solid black;text-align: center;width: 30px;">S.No</th>
                                          <th style="border: 2px solid black;text-align: center;width: 210px;">Description</th>
                                          <th style="border: 2px solid black;text-align: center;width: 60px;">HSN.Code</th>
                                          <th style="border: 2px solid black;text-align: center;width: 60px;">Manufacture <br> Name</th>
                                          <th style="border: 2px solid black;text-align: center;width: 60px;">Exp.Date</th>
                                          <th style="border: 2px solid black;text-align: center;width: 60px;">Batch.No</th>
                                          <th style="border: 2px solid black;text-align: center;">MRP</th>
                                          <th style="border: 2px solid black;text-align: center;width: 40px;">Qty</th>
                                          <!-- <th style="border: 2px solid black;text-align: center;">Free Qty</th> -->
                                          <th style="border: 2px solid black;text-align: center;"><span>Unit</th>
                                          <th style="border: 2px solid black;text-align: center;"><span>Unit Rate</th>
                                          <th style="border: 2px solid black;text-align: center;">Disc<br>ount</th>
                                          <th style="border: 2px solid black;text-align: center;"><span>SGST</th>
                                          <th style="border: 2px solid black;text-align: center;"><span>CGST</th>
                                          <th style="border: 2px solid black;text-align: center;"><span>IGST</th>
                                          <th style="border: 2px solid black;text-align: center;"><span>Total</th>
                                          
                                        </tr>
                                       </thead>
                                       <tbody>
                                       	<?php $sno=1;$mrp =0;$mrp1=0;$dmrp =0;$dmrp1=0; foreach ($print_item as $key => $value) {

                                       		$rate = $value['return_purrate']/100;
                                          $tax_gst =  ($value['return_sgst']+$value['return_cgst']+$value['return_igst'])*$rate;
                                          $mrp_rate = $value['return_purrate']+$tax_gst;
                                          $mrp1 = $tax_gst*$value['return_qty'];
                                          $mrp = $mrp+$mrp1;
                                          
                                          $dtax_gst =  0*$rate;
                                          $dmrp_rate = $value['return_purrate']+$dtax_gst;
                                          $dmrp1 = $dtax_gst*$value['return_qty'];
                                          $dmrp = $dmrp+$dmrp1;
                                       	 ?>
                                       		
                                       
                                         <tr >
                                          <td style="font-size: 10px; border-left: 2px solid black;text-align: center;width: 30px;"><?php echo $sno;$sno++; ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;width: 210px;"><?php echo $value['i_name'] ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;width: 60px;"><?php echo $value['hsn_code'] ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;width: 60px;"><?php echo $value['manu_name'] ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;width: 60px;"><?php $timestamp = strtotime($value['exp_date']);echo date('m/Y', $timestamp); ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;width: 60px;"><?php echo $value['batch_num'] ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;"><?php echo $mrp_rate ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;width: 40px;"><?php echo $value['return_qty'] ?></td>
                                         <!--  <td style="font-size: 10px;border-left: 2px solid black;text-align: center;"><?php echo $value['free_quantity'] ?></td> -->
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;"><span><?php echo $value['location_name'] ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;"><span><?php echo $value['return_purrate'] ?></td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;">0%</td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;"><span><?php echo $value['return_sgst'] ?>%</td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;"><span><?php echo $value['return_cgst'] ?>%</td>
                                          <td style="font-size: 10px;border-left: 2px solid black;text-align: center;"><span><?php echo $value['return_igst'] ?>%</td>
                                          <td style="font-size: 10px;border-left: 2px solid black;border-right: 2px solid black;text-align: center;"><span><?php echo $value['return_total'] ?></td>
                                          
                                        </tr>
                             		<?php } ?>
                                       </tbody>
                                       <tfoot>
                                        <?php
                                        if($print_det[0]['cus_tax_type'] == 2){
                                          $gst = $print_det[0]['return_gtotal']-$print_det[0]['return_stotal'];
                                          $sgst = "0.00";
                                          $cgst = "0.00";
                                          $igst = $gst;
                                        }else if($print_det[0]['cus_tax_type'] == 1){
                                          $gst = $print_det[0]['return_gtotal']-$print_det[0]['return_stotal'];
                                          $tax = $gst/2;
                                          $sgst = round($tax,3);
                                          $cgst = round($tax,3);
                                          $igst = "0.00";
                                        } 
                                         

                                        ?>
                                         <tr>
                                           <th colspan="11" style="padding: 5px;border: 2px solid black;">E & O.E</th>
                                           <th colspan="3" style="padding: 5px;border: 2px solid black;"><span>Gross Value</span><br><span>SGST</span><br><span>CGST</span><br><span>IGST</span><br><span>Discount</span><br><span>Net Value</span></th>
                                           <th colspan="1" style="padding: 5px;border: 2px solid black;"><?php echo $print_det[0]['return_stotal'] ?><br><?php echo $sgst ?><br><?php echo $cgst ?><br><?php echo $igst ?><br><?php echo $dmrp ?><br><?php echo $print_det[0]['return_gtotal'] ?></th>
                                         </tr>
                                         <tr>
                                           <th colspan="3" style="padding: 5px;border: 2px solid black;">Amount In Words</th>
                                           <th colspan="12" style="padding: 5px;border: 2px solid black;"><?php echo $ret1.' Only/-'; ?></th>
                                         </tr>
                                         <tr>
                                           <th colspan="2" style="padding: 5px;border: 2px solid black;"><span>Bank Details</span><br><span>Account No : </span><br><span>Branch : </span><br><span>IFSC Code </span><br></th>
                                           <th colspan="3" style="padding: 5px;border: 2px solid black;"><span><?php echo $print_det[0]['cus_bank_name']; ?></span><br><span><?php echo $print_det[0]['cus_account_no'] ?></span><br><span><?php echo $print_det[0]['cus_bank_branch'] ?></span><br><span><?php echo $print_det[0]['cus_ifsc_code'] ?></span><br></th>
                                           <th colspan="10" style="padding: 5px;border: 2px solid black;"><span style="margin-left: 250px;">for A2Z Enterprises</span><br><br><span></span><br><br><span style="margin-left: 250px;">Authorised Signatory</span></th>
                                           
                                         </tr>
                                       </tfoot>
                                     </table>
                            </div>
                          <center>  <button type="button" class="btn btn-primary" onClick="print_fun('print_panel');">Print</button>
                            <a class="btn" href="<?php echo base_url('index.php/Sales/sales_return_payment'); ?>" ><button type="button" class="btn btn-success" data-original-title="invoice">Cancel</button></a></center>
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
//var n = printpage.length;
  //alert(n);return false;
  
  document.body.innerHTML = printpage;
    window.print() ;
  document.body.innerHTML = defaultpage;

}

</script>
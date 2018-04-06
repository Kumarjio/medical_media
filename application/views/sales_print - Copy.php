<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
thead > tr > th  {
    border: 1px solid gray;
}
thead > tr > td  {
    border: 1px solid gray;
}
tbody > tr > th  {
    border: 1px solid gray;
}
tbody > tr > td  {
    border: 1px solid gray;
}
tfoot > tr > th  {
    border: 1px solid gray;
}
tfoot > tr > td  {
    border-right: 1px solid gray;
}
tfoot > tr:last-child  {
    border-bottom: 1px solid gray;
}

.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td  
  border-color: #E5E5E5;
 /*
 border-width: 1px;
  border: 1px solid;*/
 @media screen { p.bodyText {font-family:verdana, arial, sans-serif;} #print_panel{ margin: 100mm 100mm 100mm 100mm; } }

</style>
<!-- <?php $this->load->view('include_css');
 ?> -->
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
$no = round($print_det[0]['total_amount'],0, PHP_ROUND_HALF_UP);
       $point = round($print_det[0]['total_amount'] - $no, 0, PHP_ROUND_HALF_UP) * 100;
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
                                    <h3><center><u>Sales Tax Invoive</u></center></h3>
                                    <table>
                                      <thead>
                                        <tr>
                                          <th rowspan="5" colspan="11" style="min-width: 550px;"><h2 style="margin: 0px;margin-left: 20px;">A2Z Enterprises</h2><br><span style="margin-left: 20px;font-size: 9px;"><span>Reg Office:</span>New No:9,Old No: 33,H Block, Muthu Mari amman Koil Street,MMDA Colony, Arumbakkam, Chennai - 600106</span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>Branch Office:</span>New No:9,Old No: 135,I Block,MMDA Colony Main Road, Arumbakkam, Chennai - 600106</span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>Phone : </span> 044-48585844</span><span style="margin-left: 5px;font-size: 9px;"><span>Mobile : </span> 9444449914 / 9884070990</span></th>

                                          <th colspan="5" style="min-width: 206px;"></th>

                                        </tr>
                                         <tr>
                                          <th colspan="2"><span style="margin-left: 5px;font-size: 9px;"><span>GST No : </span></span></th>
                                          <th colspan="3"><span style="margin-left: 5px;font-size: 9px;"><span>33AVLPM5276G1ZC</span></span></th>
                                        </tr>
                                         <tr>
                                          <th colspan="2"><span style="margin-left: 5px;font-size: 9px;"><span>State Code : </span> </span></th>
                                          <th colspan="3"><span style="margin-left: 5px;font-size: 9px;">33 </span></th>
                                        </tr>
                                         <tr>
                                          <th colspan="2"><span style="margin-left: 5px;font-size: 9px;"><span>D.L No 1 :</span></span></th>
                                          <th colspan="3"><span style="margin-left: 5px;font-size: 9px;">3753/MZII/20B</span></th>
                                        </tr>
                                        <tr>
                                          <th colspan="2"><span style="margin-left: 5px;font-size: 9px;"><span>D.L No 2 : </span></span></th>
                                          <th colspan="3"><span style="margin-left: 5px;font-size: 9px;">3918/MZII/21B</span></th>
                                        </tr>
                                        <tr>
                                          <th colspan="6" rowspan="5"><span style="margin-left: 20px;font-size: 9px;"><span><?php echo $print_det[0]['customer_name'] ?></span><br>
                                          <span style="margin-left: 20px;font-size: 9px;text-align: "><?php echo $print_det[0]['cus_address'] ?></span></th>
                                          <th colspan="2" rowspan="5"></th>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">Invoice No:</td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $print_det[0]['bill_no'] ?></td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">Customer GST No :</td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $print_det[0]['cus_gst_no'] ?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">Date : </td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $print_det[0]['created_date'] ?></td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">D.L No 1 :</td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $print_det[0]['cus_drug_lisence1'] ?></td>
                                        </tr>
                                        <tr>
                                          <th colspan="2"></th>
                                          <th colspan="2"></th>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">D.L No 2 : </td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $print_det[0]['cus_drug_lisence2'] ?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">Dr.Reg.No</td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $print_det[0]['cus_dr_reg_no'] ?></td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">Reg ID : </td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $print_det[0]['cus_reg_id'] ?></td>
                                        </tr>
                                        <tr>
                                          <th style="width: 30px;text-align: center;font-size: 10px;">S.No</th>
                                          <th style="width: 200px;text-align: center;font-size: 10px;">Description</th>
                                          <th style="width: 60px;text-align: center;font-size: 10px;">HSN Code</th>
                                          <th style="font-size: 10px;width: 60px;text-align: center;">Mgf <br> Name</th>
                                          <th style="font-size: 10px;width: 60px;text-align: center;">Batch <br> No</th>
                                          <th style="font-size: 10px;width: 60px;text-align: center;">Exp <br> Date</th>
                                          
                                          <th style="font-size: 10px;width: 60px;text-align: center;">MRP</th>
                                          <th style="font-size: 10px;width: 60px;text-align: center;">Qty</th>
                                          <th style="font-size: 10px;width: 50px;text-align: center;">Free Qty</th>
                                          <th style="font-size: 10px;width: 50px;text-align: center;">Unit</th>
                                          <th style="font-size: 10px;width: 80px;text-align: center;">Unit Rate</th>
                                          <th style="font-size: 10px;width: 40px;text-align: center;">Dic %</th>
                                          <th style="font-size: 10px;text-align: center;">SGST</th>
                                          <th style="font-size: 10px;text-align: center;">CGST</th>
                                          <th style="font-size: 10px;text-align: center;">IGST</th>
                                          <th style="font-size: 10px;width: 100px;text-align: center;">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        
                                        <?php $sno=1;$mrp =0;$mrp1=0;$dmrp =0;$dmrp1=0; foreach ($print_item as $key => $value) {

                                          $rate = $value['sales_price']/100;
                                          $tax_gst =  ($value['sgst_sale']+$value['cgst_sale']+$value['igst_sale'])*$rate;
                                          $mrp_rate = $value['sales_price']+$tax_gst;
                                          $mrp1 = $tax_gst*$value['quantity'];
                                          $mrp = $mrp+$mrp1;
                                          
                                          $dtax_gst =  ($value['discount_sale_amt'])*$rate;
                                          $dmrp_rate = $value['sales_price']+$dtax_gst;
                                          $dmrp1 = $dtax_gst*$value['quantity'];
                                          $dmrp = $dmrp+$dmrp1;
                                         ?>
                                         <tr>
                                          <td style="width: 30px;font-size: 10px;text-align: center;"><?php echo $sno;$sno++; ?></td>
                                          <td style="width: 250px;font-size: 10px;text-align: center;"><?php echo $value['i_name'] ?></td>
                                          <td style="width: 60px;font-size: 10px;text-align: center;"><?php echo $value['hsn_code'] ?></td>
                                          <td style="width: 60px;font-size: 10px;text-align: center;"><?php echo $value['manu_name'] ?></td>
                                          <td style="width: 60px;font-size: 10px;text-align: center;"><?php echo $value['batch_num'] ?></td>
                                          <td style="width: 40px;font-size: 10px;text-align: center;"><?php $timestamp = strtotime($value['exp_date']);echo date('m/y', $timestamp); ?></td>
                                          
                                          <td style="width: 100px;font-size: 10px;text-align: center;"><?php echo $mrp_rate ?></td>
                                          <td style="width: 40px;font-size: 10px;text-align: center;"><?php echo $value['quantity'] ?></td>
                                          <td style="width: 40px;font-size: 10px;text-align: center;"><?php echo $value['free_quantity'] ?></td>
                                          <td style="width: 50px;font-size: 10px;text-align: center;"><?php echo $value['location_name'] ?></td>
                                          <td style="width: 60px;font-size: 10px;text-align: center;"><?php echo $value['sales_price'] ?></td>
                                          <td style="width: 40px;font-size: 10px;text-align: center;"><?php echo $value['discount_sale_amt'] ?>%</td>
                                          <td style="width: 40px;font-size: 10px;text-align: center;"><?php echo $value['sgst_sale'] ?>%</td>
                                          <td style="width: 40px;font-size: 10px;text-align: center;"><?php echo $value['cgst_sale'] ?>%</td>
                                          <td style="width: 40px;font-size: 10px;text-align: center;"><?php echo $value['igst_sale'] ?>%</td>
                                          <td style="width: 100px;font-size: 10px;text-align: center;"><?php echo number_format($value['per_tot'],2) ?></td>
                                        </tr>

                                        <?php } ?>
                                      </tbody>
                                      <tfoot>
                                         <?php

                                        if($print_det[0]['cus_tax_type'] == 2){
                                         $sgst = 0.00;
                                           $cgst = 0.00;
                                             $igst = $mrp;
                                        }else if($print_det[0]['cus_tax_type'] == 1){
                                          $sgst = $mrp/2;
                                           $cgst = $mrp/2;
                                             $igst = 0.00;
                                        } 
                                         

                                        ?>
                                         <tr>
                                           <th colspan="13" rowspan="6" style="padding: 5px;">E & O.E</th>
                                           <th colspan="2" style="padding-left: 5px;">Gross Value</th>
                                           <td style="text-align: right;padding-right: 5px;"><?php echo number_format($print_det[0]['stot'],2); ?></td>
                                         </tr>
                                         <tr>
                                           <th colspan="2" style="padding-left: 5px;">SGST</th>
                                           <td style="text-align: right;padding-right: 5px;"><?php echo number_format($sgst,2); ?></td>
                                         </tr>
                                         <tr>
                                           <th colspan="2" style="padding-left: 5px;">CGST</th>
                                           <td style="text-align: right;padding-right: 5px;"><?php echo number_format($cgst,2); ?></td>
                                         </tr>
                                         <tr>
                                           <th colspan="2" style="padding-left: 5px;">IGST</th>
                                           <td style="text-align: right;padding-right: 5px;"><?php echo number_format($igst,2); ?></td>
                                         </tr>
                                         <tr>
                                           <th colspan="2" style="padding-left: 5px;">Discount</th>
                                           <td style="text-align: right;padding-right: 5px;"><?php echo number_format($dmrp,2); ?></td>
                                         </tr>
                                         <tr>
                                           <th colspan="2" style="padding: 5px;">Net Value</th>
                                           <th colspan="1" style="text-align: right;padding-right: 5px;"><?php echo number_format(round($print_det[0]['total_amount'],0, PHP_ROUND_HALF_UP),2) ?></th>
                                         </tr>
                                         <tr>
                                           <th colspan="3" style="padding: 5px;">Amount In Words</th>
                                           <th colspan="15" style="padding: 5px;"><?php echo $ret1.' Only/-'; ?></th>
                                         </tr>
                                         <tr>
                                           <th colspan="3" rowspan="4" style="padding-left: 20px;"><span>Bank Details</span><br><span>Account No : </span><br><span>Branch : </span><br><span>IFSC Code </span><br><span>Acoount Type</span><br></th>
                                           <th colspan="3" rowspan="4" style="padding-left: 20px;"><span>HDFC BANK</span><br><span>50200002731908</span><br><span>Gopalapuram</span><br><span>HDFC0000678</span><br><span>Current Account </span><br></th>
                                           
                                         </tr>
                                         <tr>
                                          <td style="text-align: right;padding-right: 20px;" colspan="11">for A2Z Enterprises</td>
                                        </tr>
                                         <tr>
                                          <td style="text-align: right;padding-right: 20px;" colspan="11">Sign</td>
                                        </tr>
                                         <tr>
                                          <td style="text-align: right;padding-right: 20px;"  colspan="11">Authorised Signatory</td>
                                        </tr>
                                       </tfoot>
                                    </table>
                                    </div>
                                  <center>  <button type="button" class="btn btn-primary" onClick="print_fun('print_panel');">Print</button>
                                    <a class="btn" href="<?php echo base_url('index.php/Sales/sales_payment'); ?>" ><button type="button" class="btn btn-success" data-original-title="invoice">Cancel</button></a></center>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
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
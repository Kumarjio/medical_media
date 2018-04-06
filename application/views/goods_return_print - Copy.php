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
$no = round($order[0]['confirm_return_gtotal'],0, PHP_ROUND_HALF_UP);
       $point = round($order[0]['confirm_return_gtotal'] - $no, 0, PHP_ROUND_HALF_UP) * 100;
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
                                    <h3><center><u>Return Purchase Order</u></center></h3>
                                    <table>
                                      <thead>
                                        <tr>
                                          <th rowspan="5" colspan="9" style="min-width: 550px;"><h2 style="margin: 0px;margin-left: 20px;">A2Z Enterprises</h2><br><span style="margin-left: 20px;font-size: 9px;"><span>Reg Office:</span>New No:9,Old No: 33,H Block, Muthu Mari amman Koil Street,MMDA Colony, Arumbakkam, Chennai - 600106</span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>Branch Office:</span>New No:9,Old No: 135,I Block,MMDA Colony Main Road, Arumbakkam, Chennai - 600106</span><br>
                                              <span style="margin-left: 20px;font-size: 9px;"><span>Phone : </span> 044-48585844</span><span style="margin-left: 20px;font-size: 9px;"><span>Mobile : </span> 9444449914 / 9884070990</span></th>

                                          <th colspan="5" style="min-width: 206px;"></th>

                                        </tr>
                                         <tr>
                                          <th colspan="2"><span style="margin-left: 20px;font-size: 9px;"><span>GST No : </span></span></th>
                                          <th colspan="3"><span style="margin-left: 20px;font-size: 9px;"><span>33AVLPM5276G1ZC</span></span></th>
                                        </tr>
                                         <tr>
                                          <th colspan="2"><span style="margin-left: 20px;font-size: 9px;"><span>State Code : </span> </span></th>
                                          <th colspan="3"><span style="margin-left: 20px;font-size: 9px;">33 </span></th>
                                        </tr>
                                         <tr>
                                          <th colspan="2"><span style="margin-left: 20px;font-size: 9px;"><span>D.L No 1 :</span></span></th>
                                          <th colspan="3"><span style="margin-left: 20px;font-size: 9px;">3753/MZII/20B</span></th>
                                        </tr>
                                        <tr>
                                          <th colspan="2"><span style="margin-left: 20px;font-size: 9px;"><span>D.L No 2 : </span></span></th>
                                          <th colspan="3"><span style="margin-left: 20px;font-size: 9px;">3918/MZII/21B</span></th>
                                        </tr>
                                        <tr>
                                          <th colspan="3" rowspan="4"><span style="margin-left: 20px;font-size: 9px;"><span><?php echo $order[0]['confirm_return_vend_name'] ?></span><br>
                                          <span style="margin-left: 20px;font-size: 9px;text-align: "><?php echo $order[0]['address'] ?></span></th>
                                          <th colspan="3" rowspan="4"></th>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">DC No:</td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $order[0]['goods_return_dc_no'] ?></td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">Supplier GST No :</td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $order[0]['gst_no'] ?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">Date : </td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $order[0]['goods_return_dc_date'] ?></td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">D.L No 1 :</td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $order[0]['drug_lisence1'] ?></td>
                                        </tr>
                                        <tr>
                                          <th colspan="2"></th>
                                          <th colspan="2"></th>
                                          <td colspan="2" style="font-size: 10px;text-align: center;">D.L No 2 : </td>
                                          <td colspan="2" style="font-size: 10px;text-align: center;"><?php echo $order[0]['drug_lisence2'] ?></td>
                                        </tr>
                                         <tr>
                                          <th style="width: 30px;text-align: center;">S.No</th>
                                          <th style="width: 250px;text-align: center;">Description</th>
                                          <th style="width: 60px;text-align: center;">HSN Code</th>
                                          <th style="max-width: 60px;text-align: center;">Mfg <br> Name</th>
                                          <th style="width: 100px;text-align: center;">MRP</th>
                                          <th style="width: 80px;text-align: center;">Qty</th>
                                          <th style="width: 50px;text-align: center;">Free Qty</th>
                                          <th style="width: 50px;text-align: center;">Unit</th>
                                          <th style="width: 80px;text-align: center;">Unit Rate</th>
                                          <th style="width: 40px;text-align: center;">Dic %</th>
                                          <th style="width: 40px;text-align: center;">SGST</th>
                                          <th style="width: 40px;text-align: center;">CGST</th>
                                          <th style="width: 40px;text-align: center;">IGST</th>
                                          <th style="width: 100px;text-align: center;">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                       
                                        <?php $sno=1; foreach ($order_item as $key => $value) {

                                            $rate = $value['return_confirm_rate']/100;
                                            $tax_gst =  ($value['return_confirm_sgst']+$value['return_confirm_cgst']+$value['return_confirm_igst'])*$rate;
                                            $mrp_rate = $value['return_confirm_rate']+$tax_gst;
                                         ?>
                                         <tr>
                                          <td style="width: 30px;font-size: 10px;text-align: center;"><?php echo $sno;$sno++; ?></td>
                                          <td style="width: 100px;ont-size: 10px;text-align: center;"><?php echo $value['i_name'] ?></td>
                                          <td style="width: 60px;ont-size: 10px;text-align: center;padding: 3px;"><?php echo $value['hsn_code'] ?></td>
                                          <td style="width: 60px;ont-size: 10px;text-align: center;padding: 3px;"><?php echo $value['manu_name'] ?></td>
                                          <td style="width: 100px;ont-size: 10px;text-align: center;"><?php echo $mrp_rate ?></td>
                                          <td style="width: 40px;ont-size: 10px;text-align: center;"><?php echo $value['return_confirm_qty'] ?></td>
                                          <td style="width: 40px;ont-size: 10px;text-align: center;"></td>
                                          <td style="width: 50px;ont-size: 10px;text-align: center;"><?php echo $value['location_name'] ?></td>
                                          <td style="width: 60px;ont-size: 10px;text-align: center;"><?php echo $value['return_confirm_rate'] ?></td>
                                          <td style="width: 40px;ont-size: 10px;text-align: center;"></td>
                                          <td style="width: 40px;ont-size: 10px;text-align: center;"><?php echo $value['return_confirm_sgst'] ?>%</td>
                                          <td style="width: 40px;ont-size: 10px;text-align: center;"><?php echo $value['return_confirm_cgst'] ?>%</td>
                                          <td style="width: 40px;ont-size: 10px;text-align: center;"><?php echo $value['return_confirm_igst'] ?>%</td>
                                          <td style="width: 100px;ont-size: 10px;text-align: center;"><?php echo number_format($value['return_confirm_total'],2) ?></td>
                                        </tr>

                                        <?php } ?>
                                      </tbody>
                                      <tfoot>
                                         <tr>
                                           <th colspan="11" style="padding: 5px;">E & O.E</th>
                                           <th colspan="2" style="padding: 5px;">Net Value</th>
                                           <th colspan="1" style="padding: 5px;"><?php echo number_format(round($order[0]['confirm_return_gtotal'],0, PHP_ROUND_HALF_UP),2) ?></th>
                                         </tr>
                                         <tr>
                                           <th colspan="3" style="padding: 5px;">Amount In Words</th>
                                           <th colspan="13" style="padding: 5px;"><?php echo $ret1.' Only/-'; ?></th>
                                         </tr>
                                         <tr>
                                           <th colspan="3" rowspan="4"></th>
                                           <th colspan="5" rowspan="4" ></th>
                                           
                                         </tr>
                                         <tr>
                                          <td style="text-align: right;padding-right: 20px;" colspan="7">for A2Z Enterprises</td>
                                        </tr>
                                         <tr>
                                          <td style="text-align: right;padding-right: 20px;" colspan="7">Sign</td>
                                        </tr>
                                         <tr>
                                          <td style="text-align: right;padding-right: 20px;"  colspan="7">Authorised Signatory</td>
                                        </tr>
                                       </tfoot>
                                    </table>
                                    </div>
                                  <center>  <button type="button" class="btn btn-primary" onClick="print_fun('print_panel');">Print</button>
                                   <a class="btn" href="<?php echo base_url('index.php/Return_det/goods_return_pdf'); ?>" ><button type="button" class="btn btn-success" data-original-title="invoice">Cancel</button></a></center>
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
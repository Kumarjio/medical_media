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

 /*Style Changed*/
 .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 3px !important;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
p {
    margin: 0 0 0px!important;
}
</style>

<?php $this->load->view('include_css');
 ?> 
</head>
<body>
  <?php $this->load->view('menu_navigation'); ?>
    <?php
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
                                    <!-- <h3><center><u>Purchase Order</u></center></h3> -->
                                    <table class="table table-responsive">
                                      <thead>
                                        <tr ><td style="font-size: 10px;text-align: center;" colspan="16">Tax Invoice</td></tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="13"><span><img src="<?php echo base_url() ?>logo/logo.jpg" width="70" height="70"></span><span style="text-align: center;font-style: italic;font-size: 30px;padding-left: 80px;font-weight: bold;">A2Z Enterprises</span></td>
                                          <td colspan="3" rowspan="2" width="130"><p><span>GST No : </span><span>33AVLPM5276G1ZC</span><br><span>State Code : </span><span>33</span><br><span>D.L No 1 : </span><span>3753/MZII/20B</span><br><span>D.L No 2 : </span><span>3918/MZII/21B</span></p></td>
                                        </tr>
                                          <tr>
                                            <td colspan="13" style="text-align: center;font-size: 9px"><p><span>Reg Office:</span><span>New No:9,Old No: 33,H Block, Muthu Mari amman Koil Street,MMDA Colony, Arumbakkam, Chennai - 600106</span><br><span>Branch Office:</span><span>New No:9,Old No: 135,I Block,MMDA Colony Main Road, Arumbakkam, Chennai - 600106</span><br><span>Ph: 044-48585844, Mobile: 9444449914, 9884070990</span></p></td>

                                          </tr>
                                        
                                        <tr style="font-size: 10px;">
                                          <td colspan="4" rowspan="5"><p style="margin-left: 20px;"><span ><?php echo $print_det[0]['customer_name'] ?></span><br /><span ><?php echo $print_det[0]['cus_address'] ?></span></p></td>
                                          <td colspan="3" rowspan="5"></td>
                                          <td colspan="3"><p>Invoice No</p></td>
                                          <td colspan="2"><p><?php echo $print_det[0]['bill_no'] ?></p></td>
                                          <td colspan="2"><p>Date</p></td>
                                          <td colspan="2"><p><?php echo date('d-M-Y',strtotime($print_det[0]['created_date'])); ?></p></td>
                                        </tr>
                                         <tr style="font-size: 10px;">
                                          <td colspan="3"><p>PO No</p></td>
                                          <td colspan="2"><?php echo $print_det[0]['refer_po_no'] ?></td>
                                          <td colspan="2"><p>PO Date</p></td>
                                          <td colspan="2"><p><?php echo $print_det[0]['refer_po_date'] ?></p></td>
                                        </tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="3"><p>Customer GST.No</p></td>
                                          <td colspan="2"><?php echo $print_det[0]['cus_gst_no'] ?></td>
                                          <td colspan="2"><p>D.L No 1</p></td>
                                          <td colspan="2"><p><?php echo $print_det[0]['cus_drug_lisence1'] ?></p></td>
                                        </tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="3">Dr.Registration No</td>
                                          <td colspan="2"><?php echo $print_det[0]['cus_dr_reg_no'] ?></td>
                                          <td colspan="2"><p>D.L No 2</p></td>
                                          <td colspan="2"><p><?php echo $print_det[0]['cus_drug_lisence2'] ?></p></td>
                                        </tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="3">Reg ID</td>
                                          <td colspan="2"><?php echo $print_det[0]['cus_reg_id'] ?></td>
                                          <td colspan="2"><p></p></td>
                                          <td colspan="2"><p></p></td>
                                        </tr>
                                        <tr style="font-size: 9px;">
                                          <th width="3%"><p style="text-align: center;">S.No</p></th>
                                          <th width="30%" ><p style="text-align: center;">Description</p></th>
                                          <th width="5%"><p style="text-align: center;">HSN <br> code</p></th>
                                          <th width="5%"><p style="text-align: center;">Mfg <br> Name</p></th>

                                          <th width="6%"><p style="text-align: center;">Expiry <br> Date </p></th>
                                          <th width="6%"><p style="text-align: center;">Batch <br> No</p></th>
                                          <th width="7%"><p style="text-align: center;">MRP</p></th>
                                          <th width="7%"><p style="text-align: center;">Qty</p></th>
                                          <th width="5%"><p style="text-align: center;">Free <br> Qty</p></th>
                                          <th width="3%"><p style="text-align: center;">Unit</p></th>
                                          <th width="3%"><p style="text-align: center;">Unit <br> Rate</p></th>
                                          <th width="3%"><p style="text-align: center;">Disco <br> %</p> </th>
                                          <th width="2%"><p style="text-align: center;">SGST</p></th>
                                          <th width="2%"><p style="text-align: center;">CGST</p></th>
                                          <th width="2%"><p style="text-align: center;">IGST</p></th>
                                          <th width="10%"><p style="text-align: center;">Total</p></th>
                                        </tr>
                                      </thead>
                                      <tbody >
                                       <?php $disco=0;$sno=1;$mrp =0;$mrp1=0;$dmrp =0;$dmrp1=0; foreach ($print_item as $key => $value) {

                                          $rate = $value['sales_price']/100;
                                          $disco += $value['discount_sale_amt']*$rate;
                                          $tax_gst =  ($value['sgst_sale']+$value['cgst_sale']+$value['igst_sale'])*$rate;
                                          $mrp_rate = $value['sales_price']+$tax_gst;
                                          $mrp1 = $tax_gst*$value['quantity'];
                                          $mrp = $mrp+$mrp1;
                                          
                                          $dtax_gst =  ($value['discount_sale_amt'])*$rate;
                                          $dmrp_rate = $value['sales_price']+$dtax_gst;
                                          $dmrp1 = $dtax_gst*$value['quantity'];
                                          $dmrp = $dmrp+$dmrp1;
                                         ?>
                                       <tr style="font-size: 8px;text-align: center;height: 40px;">
                                          <td width="3%"><p style="text-align: center;"><?php echo $sno;$sno++; ?></p></td>
                                          <td width="15%" ><p style="text-align: center;"><?php echo $value['i_name'] ?></p></td>
                                          <td width="5%"><p style="text-align: center;"><?php echo $value['hsn_code'] ?></p></td>
                                          <td width="5%"><p style="text-align: center;"><?php echo $value['manu_name'] ?></p></td>

                                          <td width="6%"><p style="text-align: center;"><?php if($value['exp_date'] != ""){ $timestamp = strtotime($value['exp_date']);echo date('m/y', $timestamp); } ?></p></td>
                                          <td width="6%"><p style="text-align: center;"><?php echo $value['batch_num'] ?></p></td>
                                          <td width="7%"><p style="text-align: center;"><?php echo $mrp_rate ?></p></td>
                                          <td width="7%"><p style="text-align: center;"><?php echo $value['quantity'] ?></p></td>
                                          <td width="5%"><p style="text-align: center;"><?php echo $value['free_quantity'] ?></p></td>
                                          <td width="3%"><p style="text-align: center;"><?php echo $value['location_name'] ?></p></td>
                                          <td width="3%"><p style="text-align: center;"><?php echo $value['sales_price'] ?></p></td>
                                          <td width="3%"><p style="text-align: center;"><?php echo $value['discount_sale_amt'] ?>%</p> </td>
                                          <td width="2%"><p style="text-align: center;"><?php echo $value['sgst_sale'] ?>%</p></td>
                                          <td width="2%"><p style="text-align: center;"><?php echo $value['cgst_sale'] ?>%</p></td>
                                          <td width="2%"><p style="text-align: center;"><?php echo $value['igst_sale'] ?>%</p></td>
                                          <td width="10%"><p style="text-align: center;"><?php echo number_format($value['per_tot'],2) ?></p></td>
                                        </tr>
                                        <?php } ?>
                                       <?php $rows = 10-count($print_item); if($rows > 0){ for($i=0;$i<$rows;$i++){?>
                                        <tr style="height: 40px;">
                                          <td></td>
                                          <td ></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                    <?php } } ?> 
                                      </tbody>
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
                                      <tfoot>
                                         
                                        <tr>
                                          <th colspan="12" rowspan="6" ><p style="padding-left: 20px;">E & O.E</p></th>
                                          <th colspan="3"><p style="text-align: right;">Grass Value</p></th>
                                          <th colspan="1" ><p style="text-align: right;"><?php echo number_format($print_det[0]['stot'],2); ?></p></th>
                                        </tr>
                                        <tr>
                                          <th colspan="3"><p style="text-align: right;">Discount Value</p></th>
                                          <th colspan="1" ><p style="text-align: right;"><?php echo number_format($disco,2); ?></p></th>
                                        </tr>
                                        <tr>
                                          <th colspan="3"><p style="text-align: right;">CGST Value</p></th>
                                          <th colspan="1" ><p style="text-align: right;"><?php echo number_format($cgst,2); ?></p></th>
                                        </tr>
                                        <tr>
                                          <th colspan="3"><p style="text-align: right;">CGST Value</p></th>
                                          <th colspan="1" ><p style="text-align: right;"><?php echo number_format($cgst,2); ?></p></th>
                                        </tr>
                                        <tr>
                                          <th colspan="3"><p style="text-align: right;">IGST Value</p></th>
                                          <th colspan="1" ><p style="text-align: right;"><?php echo number_format($igst,2); ?></p></th>
                                        </tr>
                                        <tr>
                                          <th colspan="3"><p style="text-align: right;">Net Value</p></th>
                                          <th colspan="1" ><p style="text-align: right;"><?php echo number_format(round($print_det[0]['total_amount'],0, PHP_ROUND_HALF_UP),2) ?></p></th>
                                        </tr>

                                        <tr>
                                          <th colspan="3"><p style="padding-left: 20px;"> Amount In Words</p></th>
                                          <th colspan="13"><p style="padding-left: 20px;"><?php echo $ret1.' Only/-'; ?></p></th>
                                        </tr>
                                        <tr>
                                           <th colspan="2">Bank Details</th>
                                          <th colspan="4">HDFC BANK</th>
                                          <th colspan="10" rowspan="5"> <span><p style="text-align: right;font-family: 'Eras ITC', 'Eras Bold ITC';font-style: italic;padding-right: 20px;">For A2z Enterprises<p></span><br>
                                            <span><img style="margin-right: 20px;" align="right" src="<?php echo base_url() ?>logo/sign.png" width="80" height="80"></span><br><br><br><br><br>
                                            <span><p style="text-align: right;padding-right: 20px;">Authorised Signatory</p></span></th>
                                        </tr>
                                        
                                        <tr>
                                          <th colspan="2">Account No :</th>
                                          <th colspan="4">50200002731908</th>
                                        </tr>
                                        <tr>
                                          <th colspan="2">Branch : </th>
                                          <th colspan="4">Gopalapuram</th>
                                        </tr>
                                        <tr>
                                          <th colspan="2">IFSC Code :</th>
                                          <th colspan="4">HDFC0000678</th>
                                        </tr>
                                        <tr>
                                          <th colspan="2">Acoount Type :</th>
                                          <th colspan="4">Current Account</th>
                                        </tr>
                                       </tfoot>
                                  </table>
                                    </div>
                                  <center>  <button type="button" class="btn btn-primary" onClick="print_fun('print_panel');">Print</button>
                                    <a class="btn" href="<?php echo base_url('index.php/Purchaseorder/order_print_list'); ?>" ><button type="button" class="btn btn-success" data-original-title="invoice">Cancel</button></a></center>
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
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
$no = round($order[0]['exp_gtotal'],0, PHP_ROUND_HALF_UP);
       $point = round($order[0]['exp_gtotal'] - $no, 0, PHP_ROUND_HALF_UP) * 100;
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
                                    <table class="table-bordered">
                                      <thead>
                                        <tr>
                                          <td colspan="16" style="text-align: center;font-family: 'Eras ITC', 'Eras Bold ITC';font-style: italic;font-size: 10px;">Voucher</td>
                                        </tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="13" style="padding: 5px;"><span><img src="<?php echo base_url() ?>logo/logo.jpg" width="70" height="70"></span><span style="text-align: center;font-style: italic;font-size: 30px;padding-left: 80px;font-weight: bold;">A2Z Enterprises</span></td>
                                          <td colspan="3" rowspan="2" width="130"><p><span>GST No : </span><span>33AVLPM5276G1ZC</span><br><span>State Code : </span><span>33</span><br><span>D.L No 1 : </span><span>3753/MZII/20B</span><br><span>D.L No 2 : </span><span>3918/MZII/21B</span></p></td>
                                        </tr>
                                          <tr>
                                            <td colspan="13" style="text-align: center;font-size: 9px"><p><span>Reg Office:</span><span>New No:9,Old No: 33,H Block, Muthu Mari amman Koil Street,MMDA Colony, Arumbakkam, Chennai - 600106</span><br><span>Branch Office:</span><span>New No:9,Old No: 135,I Block,MMDA Colony Main Road, Arumbakkam, Chennai - 600106</span><br><span>Ph: 044-48585844, Mobile: 9444449914, 9884070990</span></p></td>

                                          </tr>
                                        
                                        <tr style="font-size: 10px;">
                                          <td colspan="4" rowspan="5"></td>
                                          <td colspan="3" rowspan="5"></td>
                                          <td colspan="3"><p>Voucher No</p></td>
                                          <td colspan="6"><p><?php echo $order[0]['voucher_no'] ?></p></td>
                                        </tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="3"><p>Date</p></td>
                                          <td colspan="6"><?php echo date('d-M-Y',strtotime($order[0]['voucher_date'])); ?></td>
                                        </tr>

                                        <tr style="font-size: 10px;">
                                          <td colspan="3"><p>Expenses Type</p></td>
                                          <td colspan="6"><?php echo $order[0]['expenses_type'] ?></td>
                                        </tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="3"><p>Payment Mode</p></td>
                                          <td colspan="6"><?php echo $order[0]['exp_payment_mode'] ?></td>
                                          
                                        </tr>
                                        <tr style="font-size: 10px;">
                                          <td colspan="3"><p>Payment Details</p></td>
                                          <td colspan="6"><?php echo $order[0]['exp_payment_details'] ?></td>
                                          
                                        </tr>
                                        <!-- <tr style="font-size: 10px;">
                                          <td colspan="3">Reg ID</td>
                                          <td colspan="2"><?php echo $order[0]['reg_id'] ?></td>
                                          <td colspan="2"><p></p></td>
                                          <td colspan="2"><p></p></td>
                                        </tr> -->


                                        <tr style="font-size: 9px;">
                                          <th width="3%"><p style="text-align: center;">S.No</p></th>
                                          <th colspan="5"  colspan="3"><p style="text-align: center;">Employee Name</p></th>
                                          <th colspan="5" ><p style="text-align: center;">Remark</p></th>
                                          <th colspan="5"><p style="text-align: center;">Amount</p></th>
                                        </tr>
                                      </thead>
                                      <tbody >
                                       <?php $sno=1;$discount_va=0; foreach ($order_item as $key => $value) { 
                                            ?>
                                       <tr style="font-size: 8px;text-align: center;height: 50px;">
                                          <td width="3%"><p style="text-align: center;"><?php echo $sno;$sno++; ?></p></td>
                                          <td colspan="5" width="15%" colspan="3"><p style="text-align: center;"><?php echo $value['name'] ?></p></td>
                                          <td colspan="5" width="5%"><p style="text-align: center;"><?php echo $value['ex_remarks'] ?></p></td>
                                          <td colspan="5" width="5%"><p style="text-align: center;"><?php echo $value['ex_amount'] ?></p></td>

                                         
                                        </tr>
                                        <?php } ?>
                                        <?php if(count($order_item) > 33){ $rows = 44-count($order_item); if($rows > 0){ for($i=0;$i<$rows;$i++){?>
                                       <tr style="height: 50px;">
                                       <td></td>
                                          <td colspan="5"></td>
                                          <!-- <td></td>
                                          <td></td> -->
                                         
                                          <td colspan="5"></td>
                                         
                                          <td colspan="5"></td>
                                        </tr>
                                       <?php }}}else if(count($order_item) > 22){ $rows = 33-count($order_item); if($rows > 0){ for($i=0;$i<$rows;$i++){?>
                                       <tr style="height: 50px;">
                                         <td></td>
                                          <td colspan="5"></td>
                                          <!-- <td></td>
                                          <td></td> -->
                                         
                                          <td colspan="5"></td>
                                         
                                          <td colspan="5"></td>
                                        </tr>
                                       <?php }}}else if(count($order_item) > 11){ $rows = 22-count($order_item); if($rows > 0){ for($i=0;$i<$rows;$i++){?>
                                       <tr style="height: 50px;">
                                         <td></td>
                                          <td colspan="5"></td>
                                          <!-- <td></td>
                                          <td></td> -->
                                         
                                          <td colspan="5"></td>
                                         
                                          <td colspan="5"></td>
                                        </tr>
                                       <?php }}}else{
                                        $rows = 11-count($order_item); if($rows > 0){ for($i=0;$i<$rows;$i++){?>

                                        
                                        <tr style="height: 50px;">
                                          <td></td>
                                          <td colspan="5"></td>
                                          <!-- <td></td>
                                          <td></td> -->
                                         
                                          <td colspan="5"></td>
                                         
                                          <td colspan="5"></td>
                                          
                                        </tr>
                                    <?php } } } ?>
                                      </tbody>
                                      <tfoot>
                                       
                                        <tr>
                                          <th colspan="6" ><p style="padding-left: 20px;">E & O.E</p></th>
                                          <th colspan="5"><p style="text-align: right;font-size: 10px;">Net Value</p></th>
                                          <th colspan="5" ><p style="text-align: right;font-size: 10px;"><?php echo number_format($order[0]['exp_gtotal'],2) ?></p></th>
                                        </tr>
                                       
                                        <tr>
                                          <th colspan="1"><p style="padding-left: 20px;"> Amount In Words</p></th>
                                          <th colspan="15"><p style="padding-left: 20px;"><?php echo $ret1.' Only/-'; ?></p></th>
                                        </tr>
                                        <tr>
                                          <th colspan="16" style="height: 100px;">
                                            <span><p style="text-align: right;font-family: 'Eras ITC', 'Eras Bold ITC';font-style: italic;padding-right: 20px;">For A2z Enterprises<p></span><br>
                                            <span><img style="margin-right: 20px;" align="right" src="<?php echo base_url() ?>logo/sign.png" width="100" height="80"></span><br><br><br><br><br>
                                            <span><p style="text-align: right;padding-right: 20px;">Authorised Signatory</p></span>
                                          </th>
                                        </tr>
                                        
                                       <!--  <tr>
                                          <th colspan="16" style="text-align: center;font-size: 8px;">Thank You for Choosing A2Z Enterprises !!! &nbsp;&nbsp;&nbsp; Visit Again !!!</th>
                                          
                                        </tr> -->

                                        

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
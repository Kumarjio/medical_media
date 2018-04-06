 <?php $session_data = $this->session->all_userdata(); $methodname = $this->router->fetch_method();  $classname= $this->router->fetch_class(); $cls_mtd = $classname.'/'.$methodname;
 if($cls_mtd == 'Warehouse_stock')
 {
	 $sales = 'active';
 }
 else
 {
	 $sales  = '';
 }
 ?>
        <!-- START PAGE CONTAINER -->
       
        <div class="page-container">
         <div class="page-sidebar">
             
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?php echo base_url('index.php/Dashboard'); ?>">A2Z</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url() ?>logo/logo.jpg" width="70" height="70">
                            </div>
                        </div>                                                                        
                    </li>
                    
                    <li class="<?php echo active_link('Dashboard');  ?>">
                        <a href="<?php echo base_url('index.php/Dashboard'); ?>"  data-toggle="tooltip" data-placement="right" data-original-title="Dashboard" ><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li> 
                    <li class="<?php echo active_link('Seller'); ?>">
                        <a href="<?php echo $this->config->item('base_url'); ?>index.php/Seller" data-toggle="tooltip" data-placement="right" data-original-title="Vendor Master"><span class="fa fa-files-o"></span> <span class="xn-text">Vendor Master</span></a>
                    </li>
                    <li class="<?php echo active_link('Customer'); ?>">
                        <a href="<?php echo base_url('index.php/Customer'); ?>" data-toggle="tooltip" data-placement="right" data-original-title="Customer"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Customer Master</span></a>
                    </li>
                    <li class="xn-openable <?php echo active_link('Product'); ?>">
                        <a href="#"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Inventry Master</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('index.php/Location'); ?>">Unit List</a></li>
                            <li><a href="<?php echo base_url('index.php/Storage/listhsn'); ?>">HSN List</a></li>
                            <li><a href="<?php echo base_url('index.php/Storage'); ?>">Storage Master</a></li>
                            <li><a href="<?php echo base_url('index.php/Product/category_list'); ?>">Catagory</a></li>
                            <li><a href="<?php echo base_url('index.php/Product/sub_category_list'); ?>">Sub Catagory</a></li>
                            <li><a href="<?php echo base_url('index.php/Product'); ?>">Products Master</a></li>
                            <li><a href="<?php echo base_url('index.php/PriceList'); ?>">Price List</a></li>
                            <li><a href="<?php echo base_url('index.php/Enduser'); ?>">EndUser PriceList</a></li>
                           
                            
                        </ul>
                    </li>
                    
                     <li class="xn-openable <?php echo active_link('Purchase_create'); ?>">
                        <a href="#"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Purchase Order Creation</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('index.php/Purchase_create'); ?>">Create Purchase Order</a></li>
                            <li><a href="<?php echo base_url('index.php/Purchase_create/created_order_list'); ?>">Purchase Order List</a></li>
                           <li><a href="<?php echo base_url('index.php/Purchaseorder/order_print_list'); ?>">Purchase Order Pdf</a></li>
                            
                        </ul>
                    </li>
                   
                   <!--  <li class="<?php echo active_link('Purchaseorder'); ?>">
                        <a href="<?php echo base_url('index.php/Purchaseorder'); ?>" data-toggle="tooltip" data-placement="right" data-original-title="Purchase Order"><span class="fa fa-files-o"></span> <span class="xn-text">Purchase Order</span></a>
                    </li> -->
                     
                    <li class="<?=($cls_mtd=='Stock/index')?'active':''?>">
                        <a href="<?php echo base_url('index.php/Stock'); ?>" data-toggle="tooltip" data-placement="right" data-original-title="Goods Received Note"><span class="fa fa-files-o"></span> <span class="xn-text">Goods Received Note</span></a>
                    </li>
                    <li class="xn-openable <?php echo active_link('Return'); ?>">
                        <a href="#"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Goods Return</span></a>
                        <ul>
                            <!-- <li><a href="<?php echo base_url('index.php/Purchase_create'); ?>">Goods Return</a></li> -->
                            <li><a href="<?php echo base_url('index.php/Return_det'); ?>">Purchase Return Confirmation List</a></li>
                           <li><a href="<?php echo base_url('index.php/Return_det/goods_return_list'); ?>">Purchase Return Confirm List</a></li>
                            <li><a href="<?php echo base_url('index.php/Return_det/goods_return_pdf'); ?>">Purchase Return PDf</a></li>
                            <li><a href="<?php echo base_url('index.php/Return_det/goods_return_payment_list'); ?>">Purchase Return Payment List</a></li>
                            
                        </ul>
                    </li>
                    <!-- <li class="<?=($cls_mtd=='Payment/Payment_grn')?'active':''?>">
                        <a href="<?php echo base_url('index.php/Payment'); ?>" data-toggle="tooltip" data-placement="right" data-original-title="Goods Received Note"><span class="fa fa-files-o"></span> <span class="xn-text">Payment Deatils</span></a>
                    </li> -->
                     <li class="xn-openable <?php echo active_link('Stocklist'); ?>">
                        <a href="#"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Stock Details</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('index.php/Stocklist'); ?>">Stock Summary</a></li>
                           <li><a href="<?php echo base_url('index.php/Stocklist/product_stock_list'); ?>">Prodcut Wise Stock Summary</a></li>
                           <li><a href="<?php echo base_url('index.php/Stocklist/open_close_report'); ?>">Opening / Closing Summary</a></li>
                            <li><a href="<?php echo base_url('index.php/Stocklist/consume'); ?>">Consumption</a></li>
                            <li><a href="<?php echo base_url('index.php/Stocklist/short_close'); ?>">PO Short Close</a></li>
                            <li><a href="<?php echo base_url('index.php/Stocklist/free_product_add'); ?>">Add Free Product to sale</a></li>
                            
                        </ul>
                    </li>
                    <!-- <li class="<?php echo active_link('Stocklist'); ?>">
                        <a href="<?php echo base_url('index.php/Stocklist'); ?>" data-toggle="tooltip" data-placement="right" data-original-title="Stock Summary"><span class="fa fa-files-o"></span> <span class="xn-text">Stock Summary</span></a>
                    </li> -->
                    <li class="xn-openable <?php echo active_link('Payment'); ?>">
                        <a href="#"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Vendor Transaction</span></a>
                        <ul>
                        	   <li><a href="<?php echo base_url('index.php/Payment'); ?>">Vendor Billing</a></li>
                        	<li><a href="<?php echo base_url('index.php/Payment/payment_list'); ?>">Vendor Payment List</a></li>
                        </ul>
                    </li>
                  
                    <li class="xn-openable <?php echo active_link('Sales'); ?>">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Sales & Invoice</span></a>
                        <ul>
                           <li><a href="<?php echo base_url('index.php/Sales'); ?>">Add Sale</a></li>
                           <li><a href="<?php echo base_url('index.php/Sales/sales_payment'); ?>">Invoice List</a></li>
                           <li><a href="<?php echo base_url('index.php/Sales/sales_payment_list'); ?>">Invoice Payment List</a></li>
                           <li><a href="<?php echo base_url('index.php/Sales/sales_return_payment'); ?>">Sales Return</a></li>
                           <li><a href="<?php echo base_url('index.php/Sales/sales_return_payment_list'); ?>">Sales Return Payment</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable <?php echo active_link('Expenses_master'); ?>">
                        <a href="#"><span class="fa fa-thumb-tack"></span> <span class="xn-text">Expenses Master</span></a>
                        <ul>                          
                          <li><a href="<?php echo base_url('index.php/Expenses_master'); ?>">Expenses List</a></li>
                         <li><a href="<?php echo base_url('index.php/Expenses_master/expenses_detail'); ?>">Add Expenses</a></li>
                          <!--  <li><a href="<?php echo base_url('index.php/Payment_track/project_payment_details'); ?>">Payments Details</a></li> -->
                        </ul>
                    </li>
                    
                    <li class="<?php echo active_link('Reports'); ?>">
                        <a href="#"><span class="fa fa-list"></span> <span class="xn-text">Reports</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('index.php/Reports'); ?>">Purchase Report</a></li>
                            <li><a href="<?php echo base_url('index.php/Reports/grn_return_report'); ?>">Purchase Return Report</a></li>
                            <li><a href="<?php echo base_url('index.php/Reports/purchase_payment_report'); ?>">Purchase Payments Reports</a></li>

                            <li><a href="<?php echo base_url('index.php/Reports/sales_report'); ?>">Sales Report</a></li>
                            <li><a href="<?php echo base_url('index.php/Reports/sales_return_report'); ?>">Sales Return Report</a></li>
                             <li><a href="<?php echo base_url('index.php/Reports/sales_payment'); ?>">Sales Payment Report</a></li>
                               <li><a href="<?php echo base_url('index.php/Reports/PoReport'); ?>">PO  Report</a></li>
                               <li><a href="<?php echo base_url('index.php/Reports/purchase_sum_report'); ?>">Purchase Summary  Report</a></li>
                               <li><a href="<?php echo base_url('index.php/Reports/sale_sum_report'); ?>">Sale Summary  Report</a></li>
                                <li><a href="<?php echo base_url('index.php/Reports/stock_adj_report'); ?>">Stock Adjustment  Report</a></li>
                                <li><a href="<?php echo base_url('index.php/Reports/expenses_report'); ?>">Expenses  Report</a></li>
                         </ul>
                    </li>
                        <li><a href="<?php echo base_url('index.php/Employee'); ?>" data-toggle="tooltip" data-placement="right" data-original-title="Employee"><span class="fa fa-files-o"></span> <span class="xn-text">Security Management</span></a></li>
                       <!--  <li><a href="<?php echo base_url('index.php/Product_image'); ?>" data-toggle="tooltip" data-placement="right" data-original-title="Employee"><span class="fa fa-files-o"></span> <span class="xn-text">Product Images</span></a></li> -->
                    
                    
                </ul>
              
            </div>
          
            <div class="page-content">
                
            
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                  
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                  
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="<?php echo base_url('index.php/Dashboard/ProfileSettings_bk'); ?>"><span class="fa fa-lock"></span> Profile Setting</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                  
                    <li class="pull-right" style="color:#fff; font-weight:bold; padding:1.5% 2% 0 0 ">
                        <div class="">Welcome <?php echo $session_data['name']; ?> | 
 (<?php if($session_data['user_type'] == 1){echo "Admin";}else{ echo "user";}; ?>)</span></div>
                    </li>
                 
                </ul>
               
                <ul class="breadcrumb">
                  
                </ul>
              
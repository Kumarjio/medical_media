<?php $session_data = $this->session->all_userdata();
?>
<!DOCTYPE html>
<html lang="en">
    
<head>        
        <!-- META SECTION -->
        <title>A2Z</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
       <!-- <link rel="icon" href="favicon.ico" type="image/x-icon" />-->
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
		<?php $this->load->view('include_css'); ?>
        <!-- EOF CSS INCLUDE -->
       
        <?php $this->load->view('menu_navigation'); ?>    
                     

                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" style="margin-bottom:5%; margin-top:5%">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget widget-primary widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls"> 
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>               
                            </div>   
                        </div>
                    </div>
                     <div class="row" id="pro_exp">
                        
                    </div>
                    <!-- END WIDGETS -->                    
                    
                
                    
                   
                </div>
                
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
       
        <!-- END PAGE CONTAINER -->
         
             <?php $this->load->view('include_js'); ?>
             <script type="text/javascript" src="<?php echo base_url('assets/js/demo_dashboard.js'); ?>"></script>
        <script type="text/javascript">
            $.ajax({
		url:"<?php echo base_url() ?>index.php/Dashboard/opening_stock",
		type:"POST",
		dataType:"JSON",
                async: false,
		success:function(res){
			console.log(res);
		}
	});
            $.ajax({
                url:"<?php echo base_url() ?>index.php/Stock/stock_exp_rem",
                type:"POST",
                dataType:"JSON",
                async: false,
                success:function(res) {
                    console.log(res);
                    $(res).each(function(k,v){
                        $('#pro_exp').append('<div class="col-md-4"><div class="widget widget-danger"><div  style="font-size:15px;text-align:center">'+v.i_name+'<br>'+v.manu_name+'-'+v.batch_num+'</div><div  style="font-size:13px;text-align:center;color:blue;">Only '+v.exp_days+' days to Expire</div><div class="widget-controls"></div></div></div>');
                    });
                    
                }
            });
        </script>
   
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->     
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
       
        
    <!-- END COUNTERS // NOT INCLUDED IN TEMPLATE -->
    
    </body>

</html>








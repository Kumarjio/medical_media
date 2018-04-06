<!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a onclick="logout();" href="<?php echo base_url('index.php/login/logout'); ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div></div>
        <!-- END MESSAGE BOX-->
        
        <p class="pull-right" style="color:#fff; margin:1% 6% 0 0">Powered by  Ramtechnology</p>	
        <p class="pull-Left" style="color:#fff; margin:1% 0 0 6%">&copy; <?php echo date('Y'); ?>. Copyright All Rights Reserved. Arrow18</p>	

        <!-- START PRELOADS 
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio> -->
        <!-- END PRELOADS --> <!-- JS -->

 <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/icheck/icheck.min.js'); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
            
        <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/bootstrap/bootstrap-datepicker.js'); ?>"></script>
		<script type='text/javascript' src="<?php echo base_url('assets/js/plugins/bootstrap/bootstrap-select.js'); ?>"></script>        
      
       <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/validationengine/languages/jquery.validationEngine-en.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/validationengine/jquery.validationEngine.js'); ?>"></script>        

        <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/jquery-validation/jquery.validate.js'); ?>"></script>                

        <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/maskedinput/jquery.maskedinput.min.js'); ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/js/actions.js'); ?>"></script>

 <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
       
         <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/scrolltotop/scrolltopcontrol.js'); ?>"></script>
        
       <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/morris/raphael-min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/morris/morris.min.js'); ?>"></script>       
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/rickshaw/d3.v3.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/rickshaw/rickshaw.min.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>                
               
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/owl/owl.carousel.min.js'); ?>"></script>                 
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/moment.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
        <!-- END THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>   
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/fullcalendar/fullcalendar.min.js');?>"></script> 

     	<?php /*?><script type="text/javascript" src="<?php echo base_url('js/demo_tasks.js');?>"></script><?php */?>
        
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js'); ?>"></script> 
        

 
 <script type="text/javascript">
function logout(){
 		localStorage.removeItem("stock");
 	}
$(document).ready(function() {
	 // Disable spacebar Key
	$(".txtNoSpaces").keydown(function(event) {
		if (event.keyCode == 32) {
			event.preventDefault();
		}
	});
	//$("#sales_rep").searchable();
	$.ajax({
		url:"<?php echo base_url() ?>index.php/Dashboard/update_year",
		type:"POST",
		dataType:"JSON",
		success:function(res){
			console.log(res);
		}
	});

	var test2 = localStorage.getItem("stock");
		test = JSON.parse(test2);
		console.log(test);

	if(test == null){
	console.log('null val');	
	}else{	
	//alert('in');	
	 	$(test).each(function(k,v) {
	  		console.log(v);
	     	$.ajax({
	            url:"<?php echo base_url() ?>index.php/Dashboard/opening_stock11/"+v,
	            type:"POST",
                    async: false,
	            dataType:"JSON",
	            success:function(res){
	            	//localStorage.removeItem("stock");
	            }

	        });
		});  
	}
	
		
		var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
	
	$('#head_quarters_s').change(function(){			
	var head_quarters=$('#head_quarters_s').val();
	$.ajax({
			url: "<?php echo base_url('index.php/Customer/choose_area')?>",
			type: "post",
			data : {
			 head_quarters: head_quarters
		   },
			success: function(data){	
				$("#area_name").show('');							
				$("#area_name").html('');
				$("#area_name").append(data).selectpicker('refresh');
			}
	   });
	});
	

	$('#head_quarters').change(function(){			
	var head_quarters=$('#head_quarters').val();
	$.ajax({
			url: "<?php echo base_url('index.php/Customer/choose_area')?>",
			type: "post",
			data : {
			 head_quarters: head_quarters
		   },
			success: function(data){	
				$("#sales_rep").show('');
				$("#sales_rep").html('');
				$("#sales_asm").show('');
				$("#sales_asm").html('');
				$("#sales_rsm").show('');
				$("#sales_rsm").html('');
				$("#sales_rep").html('SELECT');
				$(".caret").html('');
				$("#sales_rep").selectpicker('refresh');
				$("#sales_asm").selectpicker('refresh');
				$("#sales_rsm").selectpicker('refresh');
				$("#area_name").show('');							
				$("#area_name").html('');
				$("#area_name").append(data).selectpicker('refresh');
			}
	   });
	});
	
	$('#area_name').change(function(){			
	var area_name=$('#area_name').val();
	$.ajax({
			url: "<?php echo base_url('index.php/Customer/choose_sales_rep')?>",
			type: "post",
			data : {
			 area_name: area_name
		   },
			success: function(data){	
			//$(".selectpicker").selectpicker('refresh');			
				$("#sales_rep").show('');							
				$("#sales_rep").html('');
				$("#sales_rep").append(data).selectpicker('refresh');
				
				
			}
	   });
	}); 
	
	$('#area_name').change(function(){			
	var area_name=$('#area_name').val();
	$.ajax({
			url: "<?php echo base_url('index.php/Customer/choose_sales_asm')?>",
			type: "post",
			data : {
			 area_name: area_name
		   },
			success: function(data){	
			//$(".selectpicker").selectpicker('refresh');			
				$("#sales_asm").show('');							
				$("#sales_asm").html('');
				$("#sales_asm").append(data).selectpicker('refresh');
				
				
			}
	   });
	}); 
	
	$('#area_name').change(function(){			
	var area_name=$('#area_name').val();
	$.ajax({
			url: "<?php echo base_url('index.php/Customer/choose_sales_rsm')?>",
			type: "post",
			data : {
			 area_name: area_name
		   },
			success: function(data){	
			//$(".selectpicker").selectpicker('refresh');			
				$("#sales_rsm").show('');							
				$("#sales_rsm").html('');
				$("#sales_rsm").append(data).selectpicker('refresh');
				
				
			}
	   });
	}); 
       
	
	/*$('#i_category'); ?>.change(function(){
		alert('kaja');	
	var category_name=$('#category_name').val();	
	$.ajax({
			url: "<?php //echo base_url('index.php/item/category')?>",
			type: "post",
			data : {
			 category_name: category_name
		   },
			success: function(data){				
				$("#course_name").show('');							
				$("#course_name").html('');
				$("#course_name").append(data);
			}
	   });
	});*/
	 $('.groupOfTexbox').keypress(function (event) {
            
            return isNumber(event, this)

        	}); 
	
});


function testnumber(a,event){
	//alert("fdsf");
	var aa=$('#purrate2'+a).val();
	 //return isNumber(event, aa);
	 alert(event.keyCode);
}

 function isNumber(evt, element) {
	 
        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
			(charCode != 8) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }  
</script>



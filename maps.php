
<?php include 'root_head.php'; ?>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include_once 'header.php'; ?>
  
  <?php include_once 'leftPanel.php'; ?>
    
    <?php
    
    $user_id=$_SESSION["user_id"];    
		
    $sql = "select * from user_mapping where user_id = '$user_id' "; 
    $result = mysql_query($sql, $link);

    while($row4 = mysql_fetch_array($result))
    {
            $customer_id = $row4["customer_id"];
    }

    $cus_sql = "select * from customer where customer_id = '$customer_id' "; 
    $cus_result = mysql_query($cus_sql , $link);
    
    
    
    ?>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
      <?php //include_once 'dashboard.php'; ?>
   <?php include_once 'alarams.php'; ?>
   <?php //include_once 'alaramsTab.php'; ?>
   <?php //include_once 'contactManagement.php'; ?>
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class=""> <img src="dist/img/arrow-menu.png" alt="" /> </span> </a>
    
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
         
            <div id="map" class="map-sec">
               <img src="dist/img/map.jpg" alt="" />
            </div>
           <div class="">
                    <div class="allarm-events">
                                  <?php
                
                 $scrollingalaram =  "select distinct(asset_id),status,Alarm_type from assets_alarams where user_id = 1  order by id desc";
                      $resultscrollingalaram = mysql_query($scrollingalaram, $link);
               
                      ?>
                                <marquee scrollamount="10" scrolldelay="2" direction="left" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start();">
                     <?php
                          while($scrolingalaramval = mysql_fetch_array($resultscrollingalaram))
                            {
                             //echo "<pre>";print_r($scrolingalaramval);
                           
                          ?>
                        
<!--                          Allarm Events Screoll Here.....-->

<?php  if ( $scrolingalaramval['Alarm_type']=='Low Low'){ ?>
              <i class="fa fa-circle text-red" ></i>                  
<?php   } elseif($scrolingalaramval['Alarm_type']=='Low'){ ?>
              <i class="fa fa-circle text-orange" ></i>      
  <?php }elseif(($scrolingalaramval['Alarm_type']=='High')){ ?>
<i class="fa fa-circle text-aqua" ></i>
<?php }elseif($scrolingalaramval['Alarm_type']=='High High'){ ?>
<i class="fa fa-circle text-green" ></i>
                      
                           <?php }?>

                        <?php echo $scrolingalaramval['asset_id'] ?><?php  echo $scrolingalaramval['Alarm_type'] ?>
                       
             <?php }?>           
                       
                      </marquee>
                              </div>
                  </div>
             
             

                    
                    
               
                 </div>
          <div id="overlay">
      <div class="overlay-icons">
        <ul>
          <li class="filter_one"> <img  src="dist/img/popup-filter-icon1.png"> </li>
          <li> <img src="dist/img/popup-filter-icon2.png"> </li>
          <li> <img src="dist/img/popup-filter-icon3.png"></li>
          <li> <img src="dist/img/popup-filter-icon4.png"> </li>
          <li> <a href="#" class="close_btn"> <img src="dist/img/close.png"></a> </li>
        </ul>
          
        <div class="pop-up" >
          <h3>Filter by Client</h3>
          
          <?php
		while($val1 = mysql_fetch_array($cus_result))
		{
		    ?>
		  <div>
                    <input type="checkbox" name="checkbox" id="checkbox1"  value="<?=$val1["customer_id"]?>" >
                    <label for="checkbox1"><?=isset($val1["cust_name_parent"])?$val1["cust_name_parent"]:'None'?></label>
				  
                </div>
	      <?php } ?>
          <div class="arrow-down"></div>
        </div>
          
        <div class="pop-up" id ="val_2">
            <h3>second popup</h3>
            <div id="company_res"></div>
            <input type="button" id="submit_company"  value="submit">
            <div class="arrow-down"></div>
        </div>
          
        <div class="pop-up" id ="val_3"     >
          <h3>Third popup</h3>
          <div id="fields_res"></div>
          <input type="button" id="submit_field"  value="submit">
          <div class="arrow-down"></div>
        </div>
          
<!--          <div class="pop-up" id ="val_4"     >
          <h3>Forth popup</h3>
          <div id="assets_res"></div>
          <a href="#" data-toggle="modal" data-dismiss="modal"> <input type="button" id="submit_field"  value="submit"></a>
          <div class="arrow-down"></div>
        </div>-->
          
      </div>
    </div>
      </div>
    </section>
   
<!--------------- all popups--------------->
   

  
  <div class="filter-sec">
          <div class="filter-button"> <a href="#overlay" id="open-overlay"><img src="dist/img/filter-icon.png"></a> </div>
        </div>
        <div id="overlay">
          <div class="overlay-icons">
            <ul>
              <li class="filter_one"> <img  src="dist/img/popup-filter-icon1.png"> </li>
              <li> <img src="dist/img/popup-filter-icon2.png"> </li>
              <li> <img src="dist/img/popup-filter-icon3.png"></li>
              <li> <img src="dist/img/popup-filter-icon4.png"> </li>
              <li> <a href="#" class="close_btn"> <img src="dist/img/filter-close.png"></a> </li>
            </ul>
            <div class="pop-up">
              <h3>Filter by Client</h3>
              <input type="search" class="" placeholder="Type Client Name" >
              <p></p>
              <div class="arrow-down"></div>
            </div>
          </div>
        </div>
      </div>
   
        <div class="marker-sec">
	      <div class="btn-ground text-center">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"> <img src="dist/img/marker-icon.png"></button>
	      </div>
	      <div class="modal fade product_view" id="product_view">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <div class="modal-header">
		      <div class="row">
		        <div class="col-lg-5"><img src="dist/img/popuop-headimg.png"></div>
		        <div class="col-lg-6 wel-sec">
		          <h3><span>W</span>ell No:2 <i class="fa fa-wifi"></i></h3>
		          <p><span>Status: <img src="dist/img/status-img.png"> Stopped</span> <span> | Alarm: 3:00 PM</span></p>
		          <p><img src="dist/img/temp-img.png"> 30<span class="temparature-text">0</span> C</p>
		        </div>
		      </div>
		    </div>
		    <div class="modal-body">
		      <div class="row">
		        <div class="col-lg-6">
		          <p>Runlife; Total downtime :</p>
		          <p>Last event; downtime : </p>
		          <p>Type of pump icon :</p>
		          <p>Monthy Production Rate:</p>
		          <p>Yearly Production Rate:</p>
		          <p>Flow Rate:</p>
		        </div>
		        <div class="col-lg-6 wellsec-bodyrighttext box-body">
		          <p>18</p>
		          <p>14 </p>
		          <p>lorem Ipsum</p>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>20%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>20%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>20%</p>
		            </div>
		          </div>
		        </div>
		      </div>
		      <div class="btn-ground">
		        <button type="button" class="btn btn-primary">Dashboard</button>
		        <button type="button" class="btn btn-primary">Well Details</button>
		      </div>
		    </div>
		  </div>
		</div>
	      </div>
	    </div>    
   
   
   
   
   
   <?php //include_once 'filterIcon.php'; ?>

            
            
  </div>
  <!-- /.content-wrapper --> 
  <!-- /.control-sidebar --> 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper --> 
<!-- jQuery 2.2.3 --> 
<?php include_once 'root_below.php'; ?>


<script type="text/javascript">
	$(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });

        $(function() {
          $('.table-scroll').slimscroll({
          height: '151px'
          });
                    $(".menuscroller").slimscroll({
          height: '120px'
          });
        });
            
        </script>
        <script>
            $(document).ready(function(){
                $(".filter_one").click(function(){
                    $(".pop-up").toggle();
                    $("#val_2").hide();
                    $("#val_3").hide();
                    //$("#val_4").hide();
                    
                });
            });
            
            
        </script>
        <script>
         $("#checkbox1").click(function(){
             
             
	$(".pop-up").hide();
        
        $("#val_2").show();
	var cust_id =$("#checkbox1").val();
	var type = 1;
	document.cookie = cust_id;
        
        $.ajax({
                    type: "POST",
                    url: 'ajax.php',
                    data: {
			cust_id:cust_id,
			condition_type: type, 
			},
			
                    success: function (response) {
                        
                        //alert(response); 
			$("#company_res").html(response);
			},
			 error: function(jqXHR, status, err){
				alert(jqXHR.responseText);
			    }

});
        
        
        
        
        
        
        
    });
        
        </script>
        <script>
            
$("#submit_company").click(function(){
	
	
        
        $("#val_2").hide();
        $("#val_3").show();
	
	var myArray = [];
    $(":checkbox:checked").each(function() {
        myArray.push(this.value);
    });

   var values=myArray.join(",");
   var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
	
	$.post("ajax.php",  {'cust_id' : final_cust_id , condition_type: '2' , 'countries': values}  , function(response){
		
		
		$("#fields_res").html(response);
		
	})
	
});

</script>
   
</body>
</html>










 


<?php include 'root_head.php'; ?>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include_once 'header.php'; ?>
  
  <?php //include_once 'leftPanel.php'; ?>
    
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
    
  
    <aside class="main-sidebar"> 
    <section class="sidebar">
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control color" placeholder="Search...">
          <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
          </span> </div>
      </form>
        <form id="mapForm">
            
            <div id="asset_res">
        
        
        
                </div>
        </form>
        <div class="bottom-icons">
          <ul>
            <li class="active"> <i class="fa fa-star-o"></i></li>
            <li > <i class="fa fa-circle-o "></i></li>          
            <li> <i class="fa fa-exclamation-triangle"></i></li>
          </ul>
        </div>
    </section>
    <!-- /.sidebar --> 
  </aside>
    
    
    
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
      <?php //include_once 'dashboard.php'; ?>
   <?php include_once 'alarams.php'; ?>
   <?php //include_once 'alaramsTab.php'; ?>
   <?php //include_once 'contactManagement.php'; ?>
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class=""> <img src="dist/img/arrow-menu.png" alt="" /> </span> </a>
    <style>
                #map-canvas {
                    height:400px;
                    width:1024px;
                }
                .gm-style-iw * {
                    display: block;
                    width: 100%;
                }
                .gm-style-iw h4, .gm-style-iw p {
                    margin: 0;
                    padding: 0;
                }
                .gm-style-iw a {
                    color: #4272db;
                }
            </style>
        
            <div id="map-canvas"> </div>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
         
            <div id="map" class="map-sec">
              
            </div>
           <div class="col-lg-12">
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
                      <div class="filter-button">
                        <button type="button" data-toggle="modal" data-target="#product_view2"><i class="fa fa-filter" aria-hidden="true"></i></button>
                      </div>
                      <div class="modal fade product_view" id="product_view2">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="filter-icon">
                                <button type="button" data-toggle="modal" data-target="#product_view3"> <img src="dist/img/popup-filter-icon1.png"></button>
                                <div class="modal fade product_view" id="product_view3">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                        <div class="filtericon-search">
                                          <div id="example1_filter" class="filter"> 
											  <label>Filter by Client </label>                        
                                              <input type="search" class="form-control input-sm" placeholder="Type Client Name" aria-controls="example1">
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="filter-icon"><img src="dist/img/popup-filter-icon2.png"></div>
                              <div class="filter-icon"><img src="dist/img/popup-filter-icon3.png"></div>
                              <div class="filter-icon"><img src="dist/img/popup-filter-icon4.png"></div>
                              <div class="filter-icon"><img src="dist/img/close.png" class="close" data-dismiss="modal" aria-label="Close"></div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
   

   
   
   
   
   <?php include_once 'filterIcon.php'; ?>

            
            
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

<!--<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCYVYQPAkMd4xAzjUq5UnBIfatKdYE0CCg&extension=.js'></script>-->

<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCYVYQPAkMd4xAzjUq5UnBIfatKdYE0CCg&extension=.js'></script> 
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

<script>
        var geocoder = null;
	var map = null;
	//var markers_db = [];
	var markers = [];
	var current_infowindow = null;
//	markers_db.push([{"AccountType":"FBO","type":"listing","PropertyType":"Hangar",
//                "PropertyTypes":{"Hangar":true},"ListingTypes":2,"logo":"fbo_images\/FBOINFOLOGOID15741459131359.jpg",
//                "FBONAME":"Signature Flight Support","Address":"11705 Airport Way","Address2":"",
//                "City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9091998559",
//                "Longitude":"-105.1094267671","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"",
//                "items":[{"ListingID":"632","PropertyType":"Hangar","FBONAME":"Signature Flight Support BJC","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"Yes","De_icing_Capability":"Yes","Customs_Services":"","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"","Onsite_Restaurant":"Yes","Shower_Locker_Room":"Yes","Exercise_Room":"","type":"listing","Pet_Area":"","infoid":"125","Size":"19800SF","AccountType":"FBO","userid":"1574"}]},{"AccountType":"FBO","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"logo":"fbo_images\/FBOINFOLOGOID20011487203768.jpg","FBONAME":"Signature Flight Support","Address":"7850 Harry B. Combs Parkway ","Address2":"","City":"Denver","State":"CO","Zip":"80249","Latitude":"39.8386778391","Longitude":"-104.6657423121","AirportName":"DENVER INTL","HangarID":"","items":[{"ListingID":"980","PropertyType":"Hangar","FBONAME":"Signature Flight Support","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"Yes","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"Yes","Shower_Locker_Room":"Yes","Exercise_Room":"No","type":"listing","Pet_Area":"No","infoid":"190","Size":"21620SF","AccountType":"FBO","userid":"2001"}]},{"AccountType":"FBO","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Office_shop":true,"Hangar":true},"ListingTypes":3,"logo":"fbo_images\/FBOINFOLOGOID651484347445.jpg","FBONAME":"Signature Flight Support","Address":"8123 S. InterPort Blvd.","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5691779382","Longitude":"-104.8469385062","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"34","PropertyType":"Office_shop","FBONAME":"Signature Flight Support","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"No","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"No","Shower_Locker_Room":"Yes","Exercise_Room":"No","type":"listing","Pet_Area":"No","infoid":"189","Size":"","AccountType":"FBO","userid":"65"},{"ListingID":"33","PropertyType":"Office_shop","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"No","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"No","Shower_Locker_Room":"Yes","Exercise_Room":"No","type":"listing","Pet_Area":"No","infoid":"189","Size":"","AccountType":"FBO","userid":"65"},{"ListingID":"183","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease, Transient Space","Address2":null,"ListingTypeBin":"3","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"No","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"No","Shower_Locker_Room":"Yes","Exercise_Room":"No","type":"listing","Pet_Area":"No","infoid":"189","Size":"","AccountType":"FBO","userid":"65"}]},{"AccountType":"FBO","type":"listing","PropertyType":"Office_shop","PropertyTypes":{"Office_shop":true},"ListingTypes":2,"logo":"fbo_images\/FBOINFOLOGOID20011487203768.jpg","FBONAME":"Signature Flight Support","Address":"7830 Harry B Combs Parkway","Address2":"","City":"Denver","State":"CO","Zip":"80249","Latitude":"39.8383400742","Longitude":"-104.6659139735","AirportName":"DENVER INTL","HangarID":"South Hangar Offices & Shop","items":[{"ListingID":"982","PropertyType":"Office_shop","FBONAME":"Signature Flight Support","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"Yes","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"Yes","Shower_Locker_Room":"Yes","Exercise_Room":"No","type":"listing","Pet_Area":"No","infoid":"190","Size":"","AccountType":"FBO","userid":"2001"}]},{"AccountType":"FBO","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"logo":"fbo_images\/FBOINFOLOGOID20011487203768.jpg","FBONAME":"Signature Flight Support","Address":"7830 Harry B. Combs Pkwy","Address2":"","City":"Denver","State":"CO","Zip":"80249","Latitude":"39.8383235978","Longitude":"-104.6661500079","AirportName":"DENVER INTL","HangarID":"South Hangar","items":[{"ListingID":"981","PropertyType":"Hangar","FBONAME":"Signature Flight Support","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"Yes","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"Yes","Shower_Locker_Room":"Yes","Exercise_Room":"No","type":"listing","Pet_Area":"No","infoid":"190","Size":"28200SF","AccountType":"FBO","userid":"2001"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"7385 S Peoria ST","Address2":"Unit C2","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5816058426","Longitude":"-104.8479537223","AirportName":"CENTENNIAL","HangarID":"Blue 4","items":[{"ListingID":"978","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease","Address2":"Unit C2","ListingTypeBin":"2","Size":"21600SF","AccountType":"Premium","userid":"2215"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":3,"Address":"11824 Corporate Way","Address2":"","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9123972754","Longitude":"-105.1143969004","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"","items":[{"ListingID":"80","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease, Transient Space","Address2":null,"ListingTypeBin":"3","Size":"10000SF","AccountType":"Brokerage","userid":"226"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"8082 S. Interport Blvd","Address2":"","City":"Englewood","State":"CO","Zip":"80134","Latitude":"39.5696975960","Longitude":"-104.8457221244","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"69","PropertyType":"Hangar","FBONAME":"Signature","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"30000SF","AccountType":"Brokerage","userid":"49"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Office_shop","PropertyTypes":{"Office_shop":true},"ListingTypes":2,"Address":"9616 Metro Airport Ave","Address2":"hangar 44","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9092664190","Longitude":"-105.1062939470","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"","items":[{"ListingID":"590","PropertyType":"Office_shop","FBONAME":"Hangar 44","ListingType":"For Lease","Address2":"Hangar 44","ListingTypeBin":"2","Size":"","AccountType":"Premium","userid":"1310"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"13394 E. Control Tower Road","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5711473102","Longitude":"-104.8342315409","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"558","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"","AccountType":"Brokerage","userid":"234"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"8227 S. Wallace Court","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5678450183","Longitude":"-104.8444132064","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"556","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"10000SF","AccountType":"Brokerage","userid":"234"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Land","PropertyTypes":{"Land":true},"ListingTypes":2,"Address":"InterPort Lot FBO 15","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5693535663","Longitude":"-104.8421601508","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"46","PropertyType":"Land","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"1.2ac","AccountType":"Brokerage","userid":"49"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"9656 Metro Airport Ave","Address2":"","City":"Jefferson County","State":"CO","Zip":"80021","Latitude":"39.9114966249","Longitude":"-105.1072005336","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"","items":[{"ListingID":"899","PropertyType":"Hangar","FBONAME":"Non, self-fueling","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"19250SF","AccountType":"Brokerage","userid":"49"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"8073 S. Wallace Court","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5697802992","Longitude":"-104.8444346641","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"555","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"23000SF","AccountType":"Brokerage","userid":"234"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"0375 CR 352","Address2":"","City":"Rifle","State":"CO","Zip":"81650","Latitude":"39.5246089545","Longitude":"-107.7294881912","AirportName":"GARFIELD COUNTY RGNL","HangarID":"100WA","items":[{"ListingID":"463","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"2548SF","AccountType":"Premium","userid":"1120"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"37850 Cessna Way","Address2":"","City":"Watkins","State":"CO","Zip":"80137","Latitude":"39.7945468880","Longitude":"-104.5299541088","AirportName":"FRONT RANGE","HangarID":"3W &3E","items":[{"ListingID":"893","PropertyType":"Hangar","FBONAME":"Front Range Airport","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"5700SF","AccountType":"Premium","userid":"184"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Land","PropertyTypes":{"Land":true},"ListingTypes":2,"Address":"InterPort Sublease Land","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5680658277","Longitude":"-104.8389756982","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"5","PropertyType":"Land","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"125ac","AccountType":"Brokerage","userid":"27"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"7331 S Peoria","Address2":"","City":"Englewood ","State":"CO","Zip":"80112","Latitude":"39.5857564417","Longitude":"-104.8493512385","AirportName":"CENTENNIAL","HangarID":"17-D","items":[{"ListingID":"1096","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"3000SF","AccountType":"Premium","userid":"1466"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"3685 Airport Circle #2","Address2":"","City":"Steamboat Springs","State":"CO","Zip":"80487","Latitude":"40.5198099617","Longitude":"-106.8651468413","AirportName":"STEAMBOAT SPRINGS\/BOB ADAMS FIELD","HangarID":"F-2","items":[{"ListingID":"1040","PropertyType":"Hangar","FBONAME":"Bob Adams Field - City of Steamboat Springs","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"3000SF","AccountType":"Premium","userid":"2347"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"37400 Beechcraft Way","Address2":"","City":"Watkins","State":"CO","Zip":"80137","Latitude":"39.7898313817","Longitude":"-104.5494024842","AirportName":"FRONT RANGE","HangarID":"","items":[{"ListingID":"1031","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"8000SF","AccountType":"Premium","userid":"2321"}]},{"AccountType":"Premium","type":"listing","PropertyType":"Land","PropertyTypes":{"Land":true},"ListingTypes":4,"Address":"2800 Airport Drive","Address2":"","City":"erie","State":"CO","Zip":"80561","Latitude":"40.0042423728","Longitude":"-105.0531248413","AirportName":"ERIE MUNI","HangarID":"","items":[{"ListingID":"295","PropertyType":"Land","FBONAME":"Vector Air","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"10.8ac","AccountType":"Premium","userid":"203"}]},{"AccountType":"Airport","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"375 County Road 352","Address2":"","City":"Rifle","State":"CO","Zip":"81650","Latitude":"39.5228042937","Longitude":"-107.7171424179","AirportName":"GARFIELD COUNTY RGNL","HangarID":"","items":[{"ListingID":"1008","PropertyType":"Hangar","FBONAME":"Atlantic Aviation","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"22500SF","AccountType":"Airport","userid":"2148"}]},{"AccountType":"Airport","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"375 County Road 352","Address2":"","City":"Rifle","State":"CO","Zip":"81650","Latitude":"39.5234332606","Longitude":"-107.7198460846","AirportName":"GARFIELD COUNTY RGNL","HangarID":"","items":[{"ListingID":"1007","PropertyType":"Hangar","FBONAME":"Atlantic Aviation","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"14400SF","AccountType":"Airport","userid":"2148"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"11705 Airport Way","Address2":"","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9090717011","Longitude":"-105.1100329463","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"","items":[{"ListingID":"684","PropertyType":"Hangar","FBONAME":"Signature Flight Support","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"18500SF","AccountType":"Brokerage","userid":"247"}]},{"AccountType":"Airport","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"375 County Road 352","Address2":"","City":"Rifle","State":"CO","Zip":"81650","Latitude":"39.5234001572","Longitude":"-107.7219489365","AirportName":"GARFIELD COUNTY RGNL","HangarID":"","items":[{"ListingID":"1006","PropertyType":"Hangar","FBONAME":"Atlantic Aviation","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"10000SF","AccountType":"Airport","userid":"2148"}]},{"AccountType":"Brokerage","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"11804 Corporate Way","Address2":"","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9119327821","Longitude":"-105.1146624391","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"","items":[{"ListingID":"683","PropertyType":"Hangar","FBONAME":"Signature Flight Support","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"19800SF","AccountType":"Brokerage","userid":"247"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"11855 Airport Way","Address2":"","City":"Broomfield","State":"CO","Zip":"80012","Latitude":"39.9078718100","Longitude":"-105.1071026330","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"I-3","items":[{"ListingID":"79","PropertyType":"Hangar","FBONAME":"BJC","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"1025SF","AccountType":"Free","userid":"208"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":1,"Address":"36587 Airport Circle","Address2":"","City":"Steamboat Springs","State":"CO","Zip":"80477","Latitude":"40.5179628000","Longitude":"-106.8652648585","AirportName":"STEAMBOAT SPRINGS\/BOB ADAMS FIELD","HangarID":"#1`","items":[{"ListingID":"617","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"Transient Space","Address2":null,"ListingTypeBin":"1","Size":"3600SF","AccountType":"Free","userid":"1410"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"8234 Cessna Drive","Address2":"","City":"Peyton","State":"CO","Zip":"80831","Latitude":"38.9507385813","Longitude":"-104.5705236524","AirportName":"MEADOW LAKE","HangarID":"B-Building","items":[{"ListingID":"969","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"950SF","AccountType":"Free","userid":"2194"}]},{"AccountType":"Free","type":"listing","PropertyType":"Land","PropertyTypes":{"Land":true},"ListingTypes":4,"Address":"E County Line Road","Address2":"","City":"Erie","State":"CO","Zip":"","Latitude":"40.0157798272","Longitude":"-105.0537256561","AirportName":"ERIE MUNI","HangarID":"","items":[{"ListingID":"68","PropertyType":"Land","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"56ac","AccountType":"Free","userid":"68"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":6,"Address":"5263 Stearman","Address2":"","City":"Loveland","State":"CO","Zip":"80538","Latitude":"40.4448433522","Longitude":"-105.0043197127","AirportName":"FORT COLLINS-LOVELAND MUNI","HangarID":"5263 Stearman NEW","items":[{"ListingID":"936","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale, For Lease","Address2":null,"ListingTypeBin":"6","Size":"4920SF","AccountType":"Free","userid":"2118"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":6,"Address":"37451 Beechcraft Way","Address2":"3","City":"Watkins","State":"CO","Zip":"80137","Latitude":"39.7897896670","Longitude":"-104.5485656350","AirportName":"FRONT RANGE","HangarID":"","items":[{"ListingID":"919","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale, For Lease","Address2":"3","ListingTypeBin":"6","Size":"3600SF","AccountType":"Free","userid":"779"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":1,"Address":"12780 E Control Tower Rd","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5742130470","Longitude":"-104.8400358412","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"63","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"Transient Space","Address2":null,"ListingTypeBin":"1","Size":"","AccountType":"Free","userid":"910"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":6,"Address":"550 Airport Road","Address2":"","City":"Eagle","State":"CO","Zip":"81631","Latitude":"39.6452940318","Longitude":"-106.9103128121","AirportName":"EAGLE COUNTY RGNL","HangarID":"D-2","items":[{"ListingID":"527","PropertyType":"Hangar","FBONAME":"Vail Hangair, LLC","ListingType":"For Sale, For Lease","Address2":null,"ListingTypeBin":"6","Size":"4030SF","AccountType":"Free","userid":"1253"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":1,"Address":"12220 East Control Tower Road","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5731875858","Longitude":"-104.8436836455","AirportName":"CENTENNIAL","HangarID":"#2","items":[{"ListingID":"51","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"Transient Space","Address2":null,"ListingTypeBin":"1","Size":"","AccountType":"Free","userid":"910"}]},{"AccountType":"Free","type":"listing","PropertyType":"Office_shop","PropertyTypes":{"Office_shop":true},"ListingTypes":2,"Address":"10900A W. 120th Ave","Address2":"Unit A6","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9139035567","Longitude":"-105.1187403049","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"A6","items":[{"ListingID":"910","PropertyType":"Office_shop","FBONAME":"N\/A","ListingType":"For Lease","Address2":"Unit A6","ListingTypeBin":"2","Size":"2500SF","AccountType":"Free","userid":"2055"}]},{"AccountType":"Free","type":"listing","PropertyType":"Airpark","PropertyTypes":{"Airpark":true},"ListingTypes":4,"Address":"1363 Wave Way","Address2":"","City":"Elbert","State":"CO","Zip":"80106","Latitude":"39.2174188108","Longitude":"-104.6382692169","AirportName":"KELLY AIR PARK","HangarID":"","items":[{"ListingID":"447","PropertyType":"Airpark","FBONAME":"Kelly Air Park","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"4.18ac","AccountType":"Free","userid":"1129"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"7907 S. Peoria Street","Address2":"F-9","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5731875858","Longitude":"-104.8453144286","AirportName":"CENTENNIAL","HangarID":"F-9 South","items":[{"ListingID":"854","PropertyType":"Hangar","FBONAME":"Denver Jet Center","ListingType":"For Lease","Address2":"F-9","ListingTypeBin":"2","Size":"","AccountType":"Free","userid":"1879"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"6375 Rockwell Ct.","Address2":"","City":"Loveland","State":"CO","Zip":"85038","Latitude":"40.4556969067","Longitude":"-104.9977850357","AirportName":"FORT COLLINS-LOVELAND MUNI","HangarID":"","items":[{"ListingID":"25","PropertyType":"Hangar","FBONAME":"Fort Collin\/Loveland","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"3500SF","AccountType":"Free","userid":"52"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"12850 E Control Tower Rd","Address2":"","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5740476510","Longitude":"-104.8393062804","AirportName":"CENTENNIAL","HangarID":"Red 14","items":[{"ListingID":"426","PropertyType":"Hangar","FBONAME":"Denver Jet Center","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"7500SF","AccountType":"Free","userid":"1099"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"37505 Beechcraft ","Address2":"","City":"Watkins ","State":"CO","Zip":"80137","Latitude":"39.7897402029","Longitude":"-104.5473640053","AirportName":"FRONT RANGE","HangarID":"","items":[{"ListingID":"842","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"9000SF","AccountType":"Free","userid":"1421"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"10128 Airport Court","Address2":"","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9138913408","Longitude":"-105.1135895555","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"A","items":[{"ListingID":"409","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"3600SF","AccountType":"Free","userid":"1035"}]},{"AccountType":"Free","type":"listing","PropertyType":"Office_shop","PropertyTypes":{"Office_shop":true},"ListingTypes":2,"Address":"7625 S. Peoria St","Address2":"D-14","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5781245460","Longitude":"-104.8476211283","AirportName":"CENTENNIAL","HangarID":"Denver Jet Center","items":[{"ListingID":"821","PropertyType":"Office_shop","FBONAME":"Denver Jet Center","ListingType":"For Lease","Address2":"D-14","ListingTypeBin":"2","Size":"","AccountType":"Free","userid":"1810"}]},{"AccountType":"Free","type":"listing","PropertyType":"Airpark","PropertyTypes":{"Airpark":true},"ListingTypes":4,"Address":"1908 Clemma Court","Address2":"","City":"Erie","State":"CO","Zip":"80516","Latitude":"40.0716511111","Longitude":"-105.0335925000","AirportName":"PARKLAND","HangarID":"","items":[{"ListingID":"401","PropertyType":"Airpark","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"2500SF","AccountType":"Free","userid":"1026"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":3,"Address":"3060 Flying View Wy.","Address2":"","City":"Elliott","State":"CO","Zip":"80808","Latitude":"38.8756989153","Longitude":"-104.4072483860","AirportName":"COLORADO SPRINGS EAST","HangarID":"#5","items":[{"ListingID":"811","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease, Transient Space","Address2":null,"ListingTypeBin":"3","Size":"3500SF","AccountType":"Free","userid":"1793"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"11755 Airport Way","Address2":"I-11","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9078092088","Longitude":"-105.1067754035","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"I-11","items":[{"ListingID":"1070","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":"I-11","ListingTypeBin":"4","Size":"1386SF","AccountType":"Free","userid":"217"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"1234","Address2":"","City":"Granby, CO","State":"CO","Zip":"80110","Latitude":"40.0883854178","Longitude":"-105.9118633635","AirportName":"GRANBY-GRAND COUNTY","HangarID":"GNB","items":[{"ListingID":"374","PropertyType":"Hangar","FBONAME":"Granby, Grand County","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"6400SF","AccountType":"Free","userid":"978"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"37350 E Astra Way","Address2":"","City":"Watkins","State":"CO","Zip":"80215","Latitude":"39.7877739766","Longitude":"-104.5497726290","AirportName":"FRONT RANGE","HangarID":"E2","items":[{"ListingID":"770","PropertyType":"Hangar","FBONAME":"Front Range Airport","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"3500SF","AccountType":"Free","userid":"161"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":3,"Address":"7775 So Peoria St","Address2":"Unit F4","City":"Englewood","State":"CO","Zip":"80112","Latitude":"39.5757015927","Longitude":"-104.8457006667","AirportName":"CENTENNIAL","HangarID":"Gold 7","items":[{"ListingID":"303","PropertyType":"Hangar","FBONAME":"Denver Jet Center","ListingType":"For Lease, Transient Space","Address2":"Unit F4","ListingTypeBin":"3","Size":"12000SF","AccountType":"Free","userid":"872"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":6,"Address":"240 CR 309A","Address2":"","City":"Durango","State":"CO","Zip":"81301","Latitude":"37.1641031691","Longitude":"-107.7451431825","AirportName":"DURANGO-LA PLATA COUNTY","HangarID":"T6-A","items":[{"ListingID":"763","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale, For Lease","Address2":null,"ListingTypeBin":"6","Size":"1860SF","AccountType":"Free","userid":"1666"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"120th Ave","Address2":"","City":"Broomfield","State":"CO","Zip":"80021","Latitude":"39.9133811334","Longitude":"-105.1192114656","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"","items":[{"ListingID":"738","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"2500SF","AccountType":"Free","userid":"1164"}]},{"AccountType":"Free","type":"listing","PropertyType":"Flex","PropertyTypes":{"Flex":true},"ListingTypes":6,"Address":"3000 Airport Drive","Address2":"","City":"Erie","State":"CO","Zip":"80516","Latitude":"40.0063462136","Longitude":"-105.0520519577","AirportName":"ERIE MUNI","HangarID":"","items":[{"ListingID":"1024","PropertyType":"Flex","FBONAME":"Vector Air","ListingType":"For Sale, For Lease","Address2":null,"ListingTypeBin":"6","Size":"50000ac","AccountType":"Free","userid":"2319","WarehouseSize":"50x100"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"37600 E. 50th Avenue ","Address2":"","City":"Watkins","State":"CO","Zip":"80137","Latitude":"39.7878143729","Longitude":"-104.5446946717","AirportName":"FRONT RANGE","HangarID":"2E","items":[{"ListingID":"294","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"1071SF","AccountType":"Free","userid":"790"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":4,"Address":"1452 Airport Rd","Address2":"","City":"Durango","State":"CO","Zip":"81303","Latitude":"37.1541504289","Longitude":"-107.7549721374","AirportName":"DURANGO-LA PLATA COUNTY","HangarID":"B1","items":[{"ListingID":"737","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"940SF","AccountType":"Free","userid":"813"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"8481 Aviator Lane","Address2":"","City":"Centennial","State":"CO","Zip":"80112","Latitude":"39.5635674225","Longitude":"-104.8472249226","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"287","PropertyType":"Hangar","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"30000SF","AccountType":"Free","userid":"729"}]},{"AccountType":"Free","type":"listing","PropertyType":"Airpark","PropertyTypes":{"Airpark":true},"ListingTypes":4,"Address":"1388 Wave Way","Address2":"","City":"Elbert","State":"CO","Zip":"80106","Latitude":"39.2182998974","Longitude":"-104.6370568584","AirportName":"KELLY AIR PARK","HangarID":"","items":[{"ListingID":"722","PropertyType":"Airpark","FBONAME":"N\/A","ListingType":"For Sale","Address2":null,"ListingTypeBin":"4","Size":"1452SF","AccountType":"Free","userid":"1551"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"2049 Aviation Way","Address2":"","City":"Colorado Springs","State":"CO","Zip":"80916","Latitude":"38.8003541654","Longitude":"-104.7212483970","AirportName":"CITY OF COLORADO SPRINGS MUNI","HangarID":"","items":[{"ListingID":"281","PropertyType":"Hangar","FBONAME":"JHW Hangar Complex ","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"","AccountType":"Free","userid":"733"}]},{"AccountType":"Free","type":"listing","PropertyType":"Hangar","PropertyTypes":{"Hangar":true},"ListingTypes":2,"Address":"3330 Airport Road","Address2":"","City":"Boulder","State":"CO","Zip":"80301","Latitude":"40.0374911865","Longitude":"-105.2318298149","AirportName":"BOULDER MUNI","HangarID":"","items":[{"ListingID":"261","PropertyType":"Hangar","FBONAME":"Air Comm Corporation","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"16000SF","AccountType":"Free","userid":"649"}]},{"AccountType":"Free","type":"listing","PropertyType":"Land","PropertyTypes":{"Land":true},"ListingTypes":2,"Address":"240 CR 309A","Address2":"","City":"Durango","State":"CO","Zip":"81301","Latitude":"37.1639663705","Longitude":"-107.7466023042","AirportName":"DURANGO-LA PLATA COUNTY","HangarID":"W-3","items":[{"ListingID":"674","PropertyType":"Land","FBONAME":"N\/A","ListingType":"For Lease","Address2":null,"ListingTypeBin":"2","Size":"1ac","AccountType":"Free","userid":"1462"}]},{"AccountType":"FBO","PropertyType":"","PropertyTypes":{"FBO":true,"Office_shop":true},"ListingTypes":"3","Address":"8001 S. InterPort Blvd.","logo":"fbo_images\/FBOINFOLOGOID651484347445.jpg","Address2":"8001 S. InterPort Blvd.","City":"Engelwood","State":"CO","Zip":"80112","FBONAME":"Signature Flight Support","Latitude":"39.5700697597","Longitude":"-104.8474494670","AirportName":"CENTENNIAL","HangarID":"","items":[{"ListingID":"189","PropertyType":"FBO","ListingType":"FBO","Address2":"8001 S. InterPort Blvd.","ListingTypeBin":"","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"No","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"No","Shower_Locker_Room":"Yes","Exercise_Room":"No","address":"8001 S. InterPort Blvd.","city":"Engelwood","state":"CO","zip":"80112","type":"fbo","Pet_Area":"No","infoid":"189","FBONAME":"Signature Flight Support","AccountType":"FBO","WarehouseSize":"","logo":"fbo_images\/FBOINFOLOGOID651484347445.jpg"},{"ListingID":"191","PropertyType":"Office_shop","ListingType":"2","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"No","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"No","Shower_Locker_Room":"Yes","Exercise_Room":"No","Pet_Area":"No","logo":"fbo_images\/FBOINFOLOGOID651484347445.jpg","infoid":"189","type":"listing","address":"8001 S. InterPort Blvd.","city":"Engelwood","state":"CO","zip":"80112","FBONAME":"Signature Flight Support","AccountType":"FBO","WarehouseSize":null,"Size":""}],"type":"listing"},{"AccountType":"FBO","PropertyType":"","PropertyTypes":{"Hangar":true},"ListingTypes":"3","Address":"7850 Harry B. Combs Pkwy","logo":"fbo_images\/FBOINFOLOGOID20011487203768.jpg","Address2":"7850 Harry B. Combs Pkwy","City":"Denver","State":"CO","Zip":"80249","FBONAME":"Signature Flight Support","Latitude":"39.8381094045","Longitude":"-104.6660427196","AirportName":"DENVER INTL","HangarID":"","items":[{"ListingID":"190","PropertyType":"FBO","ListingType":"FBO","Address2":"7850 Harry B. Combs Pkwy","ListingTypeBin":"","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"Yes","De_icing_Capability":"Yes","Customs_Services":"Yes","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"No","Onsite_Restaurant":"Yes","Shower_Locker_Room":"Yes","Exercise_Room":"No","address":"7850 Harry B. Combs Pkwy","city":"Denver","state":"CO","zip":"80249","type":"fbo","Pet_Area":"No","infoid":"190","FBONAME":"Signature Flight Support","AccountType":"FBO","WarehouseSize":"","logo":"fbo_images\/FBOINFOLOGOID20011487203768.jpg"}],"type":"fbo"},{"AccountType":"FBO","PropertyType":"","PropertyTypes":{"Hangar":true},"ListingTypes":"3","Address":"11705 Airport Way","logo":"fbo_images\/FBOINFOLOGOID15741459131359.jpg","Address2":"11705 Airport Way","City":"Broomfield","State":"CO","Zip":"80021","FBONAME":"Signature Flight Support","Latitude":"39.9091512034","Longitude":"-105.1100919549","AirportName":"ROCKY MOUNTAIN METROPOLITAN","HangarID":"","items":[{"ListingID":"125","PropertyType":"FBO","ListingType":"FBO","Address2":"11705 Airport Way","ListingTypeBin":"","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"Yes","De_icing_Capability":"Yes","Customs_Services":"","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"","Onsite_Restaurant":"Yes","Shower_Locker_Room":"Yes","Exercise_Room":"","address":"11705 Airport Way","city":"Broomfield","state":"CO","zip":"80021","type":"fbo","Pet_Area":"","infoid":"125","FBONAME":"Signature Flight Support","AccountType":"FBO","WarehouseSize":"","logo":"fbo_images\/FBOINFOLOGOID15741459131359.jpg"},{"ListingID":"633","PropertyType":"Hangar","ListingType":"2","Address2":null,"ListingTypeBin":"2","Jet_A":"Yes","100LL":"Yes","Lav_Water_GPU":"Yes","Onsite_Catering":"Yes","De_icing_Capability":"Yes","Customs_Services":"","Courtesy_Car":"Yes","Crew_Lounge":"Yes","Free_Wifi":"Yes","Conference_Room":"Yes","Auto_Spa":"","Onsite_Restaurant":"Yes","Shower_Locker_Room":"Yes","Exercise_Room":"","Pet_Area":"","logo":"fbo_images\/FBOINFOLOGOID15741459131359.jpg","infoid":"125","type":"listing","address":"11705 Airport Way","city":"Broomfield","state":"CO","zip":"80021","FBONAME":"Signature Flight Support","AccountType":"FBO","WarehouseSize":null,"Size":"18000SF"}],"type":"listing"}]);
	var bounds = null;
	//var markers = parseJSON(markers);
	function initializeMap(latlng,markers_db)
	{
		geocoder = new google.maps.Geocoder();
		var mapOptions = {
			center: latlng,
			zoom: 2,
			mapTypeId: google.maps.MapTypeId.HYBRID
		};
		map = new google.maps.Map(document.getElementById("map-canvas"),
			mapOptions);
		bounds = new google.maps.LatLngBounds();
		$.each(markers_db[0], function(key, value) {
                    
			makeMarker(value, key);
                        
		});
		//  Fit these bounds to the map
		map.fitBounds(bounds);
		var listener = google.maps.event.addListener(map, "idle", function() {
			if (map.getZoom() > 16) {
				map.setZoom(16);
		        }

		    	
			google.maps.event.removeListener(listener);
		});
	}
        Object.size = function(obj) {
		var size = 0, key;
		for (key in obj) {
			if (obj.hasOwnProperty(key)) size++;
		}
		return size;
	};
        
      	function makeMarker(item, loc_i)
	{//alert(item.AccountType);
            

			var  contentString1 = "";
                                   var  contentString2 = "";
                                    var  contentString3 = "";
                                     var  contentString4 = "";
		if (item.Latitude == null || item.Longitude == null)
			return;
		var location = new google.maps.LatLng(parseFloat(item.Latitude), parseFloat(item.Longitude));
//		item.AccountType = "FBO";
//		if(item.AccountType == "FBO" && item.type == "fbo"){       
alert(parseFloat(item.Latitude));
                    var image = new google.maps.MarkerImage(
				'https://mapbuildr.com/assets/img/markers/solid-pin-blue.png',
				new google.maps.Size(32,32),
				new google.maps.Point(0,0),
				new google.maps.Point(16,16)
			);
                bounds.extend(location);
		var marker = new google.maps.Marker({
			map: map,
			position: location,
			zoom: 2,
			icon: image
		});
		markers.push(marker);
		

                contentString = "Sample text here";

		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			height: 80
		});

		google.maps.event.addListener(marker, 'click', function() {
			if (current_infowindow != null)
				current_infowindow.close();
			infowindow.open(map,this);
			current_infowindow = infowindow;
		});
                }

		
	//}
        $(function(){
		//38.8519163056, -77.0376989444
//		var def_latlng = new google.maps.LatLng(45.0735671,7.67406040000003);
//		initializeMap(def_latlng);
	});
        
        
        $("#submit_field").click(function(){
            var geocoder = null;
            //$("#val_4").show();
             $("#val_3").hide();
            var cust_id = document.cookie;

            var valid_cust_id=cust_id.split(";");
            var final_cust_id=valid_cust_id[0];
            var cheValues =$(':Checkbox:checked').map(function() {return this.value;}).get().join(',');// alert(cheValues);return false;
            geocoder = new google.maps.Geocoder();

                $.ajax({

                    url : 'ajax.php',
                    type : 'POST',
                    data : {
                        cust_id : final_cust_id,
                        condition_type: '3',
                        fields: cheValues
                    },
                    success : function(response) {
                        //alert(response);
                        //$("html").empty();
                        //$("html").append(completeHtmlPage);
                        $("#asset_res").html(response);
                        var asset_loc_lat = [];
                        var asset_loc_long = [];
                        var asset_id = [];
                        var asset_name = [];
                        var markers_db = [];
                       var values = $('input[name="mapcords"]').map(function() {
                            asset_loc_lat.push($(this).attr('lat'));
                            asset_loc_long.push($(this).attr('long'));
                            asset_id.push($(this).val());
                            asset_name.push($(this).attr('asset_name'));
                        }).get();
                        //console.log(asset_loc_lat);debugger;
                        for(ass_id = 0;ass_id < asset_id.length;ass_id++){
                            markers_db.push([{"address":"hello","Latitude":asset_loc_lat[ass_id],"Longitude":asset_loc_long[ass_id]}]);

                        }
                       
                        var bounds = null;

                                        var def_latlng = new google.maps.LatLng(-29.86519774, 30.98538962);
                                        initializeMap(def_latlng,markers_db);
                                    }
                                });
                            });
        
        
  /*  
$("#submit_field").click(function(){
    var geocoder = null;
    //$("#val_4").show();
     $("#val_3").hide();
    var cust_id = document.cookie;

    var valid_cust_id=cust_id.split(";");
    var final_cust_id=valid_cust_id[0];
    var cheValues =$(':Checkbox:checked').map(function() {return this.value;}).get().join(',');// alert(cheValues);return false;
    geocoder = new google.maps.Geocoder();

        $.ajax({

            url : 'ajax.php',
            type : 'POST',
            data : {
                cust_id : final_cust_id,
                condition_type: '3',
                fields: cheValues
            },
            success : function(response) {
                //alert(response);
                //$("html").empty();
                //$("html").append(completeHtmlPage);
                $("#asset_res").html(response);
                var asset_loc_lat = [];
                var asset_loc_long = [];
                var asset_id = [];
		var asset_name = [];
                
               var values = $('input[name="checkbox1"]').map(function() {
                    asset_loc_lat.push($(this).attr('lat'));
                    asset_loc_long.push($(this).attr('long'));
                    asset_id.push($(this).val());
                    asset_name.push($(this).attr('asset_name'));
                }).get();
                
                
//                $.each($('#mapForm').serializeArray(), function(index, value){
//                    alert($('[name="' + value.name + '"]').attr('lat') + $('[name="' + value.name + '"]').attr('long'));
//                    asset_loc_lat.push($('[name="' + value.name + '"]').attr('lat'));
//                    asset_loc_long.push($('[name="' + value.name + '"]').attr('long'));
//                    asset_id.push($('[name="' + value.name + '"]').val());
//		    asset_name.push($('[name="' + value.name + '"]').attr('asset_name'));
//	
//                });
                console.log(asset_loc_lat);
                console.log(asset_loc_long);
                console.log(asset_id);
              
              //  google.maps.event.addDomListener(window, 'click', init);
              var listener = google.maps.event.addListener(map, "idle", function() {
			    	
			google.maps.event.removeListener(listener);
		});
//              google.maps.event.addListener(marker, 'click', function() {
//			alert(5);
//		});
                
                
    var map;
    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(45.0735671,7.67406040000003),
            zoom: 2,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
            },
            disableDoubleClickZoom: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: true,
            scrollwheel: true,
            panControl: true,
            streetViewControl: true,
            draggable : true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: true,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}],
        }
        
        var mapElement = document.getElementById('map-canvas');
        var map = new google.maps.Map(mapElement, mapOptions);
        var innerArry = [];
        var locations = [];
        for(ass_id = 0;ass_id < asset_id.length;ass_id++){
            locations.push(['Headquarter', '<address>Via Ottavio Assarotti, 10 - Torino <br /> 10122 Italy</address>', 'Phone: +39 011 549444', 'undefined',
'undefined', asset_loc_lat[ass_id], asset_loc_long[ass_id], 'https://mapbuildr.com/assets/img/markers/solid-pin-blue.png']);

        }
        console.log(locations);
        for (i = 0; i < locations.length; i++) {
            if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
            if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
            if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
           if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
           if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            marker = new google.maps.Marker({
                icon: markericon,
                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                map: map,
                title: locations[i][0],
                desc: description,
                tel: telephone,
                email: email,
                web: web
            });
             google.maps.event.addListener(marker, 'click', function() {
			alert(5);
		});
                link = '';            
//bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);

     }
 function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
      var infoWindowVisible = (function () {
              var currentlyVisible = false;
              return function (visible) {
                  if (visible !== undefined) {
                      currentlyVisible = visible;
                  }
                  return currentlyVisible;
               };
           }());
           iw = new google.maps.InfoWindow();
           google.maps.event.addListener(marker, 'click', function() {
               if (infoWindowVisible()) {
                   iw.close();
                   infoWindowVisible(false);
               } else {
                   var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+desc+"<p><p>"+telephone+"<p><a href='mailto:"+email+"' >"+email+"<a></div>";
                   iw = new google.maps.InfoWindow({content:html});
                   iw.open(map,marker);
                   infoWindowVisible(true);
               }
        });
        google.maps.event.addListener(iw, 'closeclick', function () {
            infoWindowVisible(false);
        });
 }
}
              
              
}

        });
        
        
    });


function comcheck(asset_id){

//var values = '<?php //print_r($_SESSION["question"]) ?>';
//alert(values);
//return false;
//alert(asset_id);
window.location.href = "charts.php?asset_id="+asset_id;
}
*/
 </script>       
</body>
</html>










 

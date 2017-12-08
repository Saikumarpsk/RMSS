
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
                      <marquee scrollamount="10" scrolldelay="2" direction="left" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start();">
                      Allarm Events Screoll Here.....
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
   

  <?php include_once 'dashboard.php'; ?>
   <?php include_once 'alarams.php'; ?>
   <?php include_once 'alaramsTab.php'; ?>
   <?php include_once 'contactManagement.php'; ?>
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
$("#submit_field").click(function(){

    //$("#val_4").show();
     $("#val_3").hide();
    var cust_id = document.cookie;

    var valid_cust_id=cust_id.split(";");
    var final_cust_id=valid_cust_id[0];
    var cheValues =$(':Checkbox:checked').map(function() {return this.value;}).get().join(',');// alert(cheValues);return false;


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
              
              google.maps.event.addDomListener(window, 'click', init);
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
link = '';            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
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

 </script>       
</body>
</html>










 

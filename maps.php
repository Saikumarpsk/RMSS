<?php include 'root_head.php'; ?>

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

<body class="hold-transition skin-blue fixed sidebar-mini">
    
    <div class="wrapper">
        <?php include 'header.php';?>
        <!-- /.content-wrapper --> 
        <div class="content-wrapper"> 
            
            
            <!-- Main content -->
                <div class="content">
                  <section>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="box-body no-padding">
                          <div class="row">
                            <div class="col-lg-12">                             
                                
                                
                                
                                <!-- Filter Icon-->
                                <div id="" class="">
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
                                                      <div id="example1_filter" class="dataTables_filter">
                                                        <label>Filter by Client:
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
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Filter Icon-->
                                
                                
                                <div id="map" class="map-sec">
                                    <div class="marker-sec">
                                        <div ></div>

                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="allarm-events">
                                  <?php
                 
                 $scrollingalaram =  "select distinct(asset_id),status,Alarm_type from assets_alarams where user_id = 1  order by id desc limit 10";
                      $resultscrollingalaram = mysql_query($scrollingalaram, $link);
                
                      ?>
                                <marquee scrollamount="10" scrolldelay="2" direction="left" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start();">
                     <?php
                          while($scrolingalaramval = mysql_fetch_assoc($resultscrollingalaram))
                            {
                             //echo "<pre>";print_r($scrolingalaramval); 
                            
                          ?>
                         
<!--                          Allarm Events Screoll Here.....-->

<?php  if ( $scrolingalaramval['status']=='Failed'){ ?>
              <i class="fa fa-circle text-red" ></i>                   
<?php   } elseif($scrolingalaramval['status']=='Stopped'){ ?>
              <i class="fa fa-circle text-orange" ></i>       
  <?php }elseif(($scrolingalaramval['status']=='WO Pull')){ ?>
<i class="fa fa-circle text-aqua" ></i>
<?php }elseif($scrolingalaramval['status']=='Running'){ ?>
<i class="fa fa-circle text-green" ></i>
<?php }elseif($scrolingalaramval['status']=='WO Instal'){ ?>
<i class="fa fa-circle text-blue" ></i>                        
                           <?php }?>

                        <?php echo $scrolingalaramval['asset_id'] ?>
                            <?php  echo $scrolingalaramval['Alarm_type'] ?>
                        
             <?php }?>            
                        
                      </marquee>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
              </section>
            </div>
            <!-- /.content --> 
    
            
            
            
        </div>
        <!-- /.content-wrapper --> 
    </div>
    
</body>

<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCYVYQPAkMd4xAzjUq5UnBIfatKdYE0CCg&extension=.js'></script> 
    <script type="text/javascript">

    $("#mapsDiv").click(function(){
        
        var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
        
        $.ajax({

            url : 'leftPanel.php',
            type : 'POST',
            data : {
                cust_id : final_cust_id,
                condition_type: '3'
            },
            success : function(completeHtmlPage) {
                alert("Success");
                //$("html").empty();
                //$("html").append(completeHtmlPage);
                $("#asset_res").html(completeHtmlPage);
            },
            error : function() {
                alert("error in loading");
            }


        });
  
      
    });
	

    $(function() {
      $('.table-scroll').slimscroll({
      height: '151px'
      });

    });


            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {

                var mapOptions = {
                    zoom: 5,
			mapTypeId: google.maps.MapTypeId.HYBRID, 
                    center: new google.maps.LatLng(40.6700, -73.9400), 
                    styles: [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 13
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#144b53"
            },
            {
                "lightness": 14
            },
            {
                "weight": 1.4
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#08304b"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#0c4152"
            },
            {
                "lightness": 5
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#0b434f"
            },
            {
                "lightness": 25
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#0b3d51"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "color": "#146474"
            }
        ]
    },
    {
        "featureType": "transit.station.airport",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#021019"
            }
        ]
    }
]
                };

                var mapElement = document.getElementById('map');

                var map = new google.maps.Map(mapElement, mapOptions);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.9400),
                    map: map,
                    title: 'Snazzy!',
                    icon:'dist/img/marker-icon.png',
                });
                bindInfoWindow(marker,map);
            }
            function bindInfoWindow(marker,map) {
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
                              
			   var html= "<img src='dist/img/popuop-headimg.png'>";

			   iw = new google.maps.InfoWindow({content:html});

			   iw.open(map,marker);

			   infoWindowVisible(true);

			   

		   }

		});

			

	google.maps.event.addListener(iw, 'closeclick', function () {

		infoWindowVisible(false);

	});


            }
        </script>
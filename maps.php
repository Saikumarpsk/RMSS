
<?php include 'root_head.php'; ?>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include_once 'header.php'; ?>
  
  <?php include_once 'leftPanel.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class=""> <img src="dist/img/arrow-menu.png" alt="" /> </span> </a>
    
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
         
          
           
             <img src="dist/img/map.jpg" alt="" />
             

                    
                    
               
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> 
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


            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {

                var mapOptions = {
                    zoom: 11,

                    center: new google.maps.LatLng(40.6700, -73.9400), 
                    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}]
                };

                var mapElement = document.getElementById('map');

                var map = new google.maps.Map(mapElement, mapOptions);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.9400),
                    map: map,
                    title: 'Snazzy!'
                });
            }
        </script>
</body>
</html>











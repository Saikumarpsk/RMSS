
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
        
         
          
           
<!--             <img src="dist/img/map.jpg" alt="" />-->
             

                    
                    
               
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
        <div class="pop-up">
          <h3>Filter by Client</h3>
          <input type="search" class="" placeholder="Type Client Name" >
          <p></p>
          <div class="arrow-down"></div>
        </div>
      </div>
    </div>
      </div>
    </section>
   
<!--------------- all popups--------------->
   
   
   
   
   
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
        <script>
            $(document).ready(function(){
                $(".filter_one").click(function(){
                    $(".pop-up").toggle();
                });
            });
        </script>
</body>
</html>











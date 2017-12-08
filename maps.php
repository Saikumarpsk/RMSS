
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
          <a href="#product_view3" data-toggle="modal" data-dismiss="modal"><input type="button" id="submit_company"  value="submit"></a>
          <div class="arrow-down"></div>
        </div>
          
          <div class="pop-up" id ="val_3"     >
          <h3>Third popup</h3>
          <div id="fields_res"></div>
          <a href="#" data-toggle="modal" data-dismiss="modal"> <input type="button" id="submit_field"  value="submit"></a>
          <div class="arrow-down"></div>
        </div>
          
          <div class="pop-up" id ="val_4"     >
          <h3>Forth popup</h3>
          <div id="assets_res"></div>
          <a href="#" data-toggle="modal" data-dismiss="modal"> <input type="button" id="submit_field"  value="submit"></a>
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
                    $("#val_2").hide();
                    $("#val_3").hide();
                    $("#val_4").hide();
                    
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

/*	var myArray = [];
   $(":checkbox:checked").each(function() {
       myArray.push(this.value);
   });
*/    
//   var values=myArray.join(",");
 
 $("#val_4").show();
 
var cust_id = document.cookie;

var valid_cust_id=cust_id.split(";");
var final_cust_id=valid_cust_id[0];
var cheValues =$(':Checkbox:checked').map(function() {return this.value;}).get().join(',');// alert(cheValues);return false;

$.post("ajax.php",  {'cust_id' : final_cust_id , condition_type: 3 , 'fields': cheValues}  , function(response){
$("#map").show();  
 $("#mygraph").hide();  
var asset_loc_lat = [];
               var asset_loc_long = [];
               var asset_id = [];
var asset_name = [];

 //alert(response); return false;  
$("#assets_res").html(response);

/*$("#checkDiv").append("<li><div class='check-selectall'> <input id='checkbox' type='checkbox' disabled checked ='checked'/> <label for='checkbox'> Select All </label></div></li>	"); 
$("#asset_res").html(response);
$.each($('#mapForm').serializeArray(), function(index, value){
                   //alert($('[name="' + value.name + '"]').attr('lat') + $('[name="' + value.name + '"]').attr('long'));
                   asset_loc_lat.push($('[name="' + value.name + '"]').attr('lat'));
                   asset_loc_long.push($('[name="' + value.name + '"]').attr('long'));
                   asset_id.push($('[name="' + value.name + '"]').val());
   asset_name.push($('[name="' + value.name + '"]').attr('asset_name'));

               });
               console.log(asset_loc_lat);
               console.log(asset_loc_long);
               console.log(asset_id);
load(asset_id,asset_loc_lat,asset_loc_long,asset_name) ;*/
          

//callMapFunction(asset_id,asset_loc_lat,asset_loc_long,asset_name);

});

});
 </script>       
</body>
</html>











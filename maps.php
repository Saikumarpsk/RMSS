
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
   			<div class="map-location">
   			 <img class="img-responsive" src="dist/img/map.jpg"/>
   			<div class="map_location1"> <img src="dist/img/img-icon-1.png" width="80" height="80"  alt="" data-toggle="modal" data-target="#product_vieworange" /></div>
  			  <div class="map_location2"> <img src="dist/img/img-icon-2.png" width="80" height="80" alt="" data-toggle="modal" data-target="#product_viewred" /></div>
<!--  			  <div class="map_location3"> <img src="dist/img/img-icon-3.png" width="80" height="80" alt="" /></div>-->
  			  <div class="map_location4"> <img src="dist/img/img-icon-4.png" width="80" height="80" data-toggle="modal" data-target="#product_viewgreen" alt=""/></div>
<!--  			  <div class="map_location5"> <img src="dist/img/img-icon-5.png" width="80" height="80" alt=""/></div>-->
  			  <div class="map_location6"> <img src="dist/img/img-icon-6.png" width="80" height="80" data-toggle="modal" data-target="#product_vieworange4" alt=""/></div>
		  </div>
   		</div>
   </div>
        
      <div class="row">
        <div class="col-md-12">
        
         
            
            
           <div class="">
                    <div class="allarm-events">
                                  <?php
                
                 $scrollingalaram =  "select distinct(asset_id),status,Alarm_type from assets_alarams where user_id = 1  order by id desc";
                      $resultscrollingalaram = mysql_query($scrollingalaram, $link);
               
                      ?>
                                <marquee scrollamount="10" scrolldelay="2" direction="left" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start();">
                                    
                                    <img src="dist/img/img-icon-4.png" width="20" height="20"  alt="" />Well 1 : Low Low    
                                    <img src="dist/img/img-icon-2.png" width="20" height="20"  alt=""  />  Well 2 : High High 
                                    
                                   <img src="dist/img/img-icon-6.png" width="20" height="20"  alt="" />  Well 3 : High 
                                     <img src="dist/img/img-icon-4.png" width="20" height="20"  alt="" />Well 4 : Low    
                                      <img src="dist/img/img-icon-4.png" width="20" height="20"  alt="" />Well 5 : Low    
                                   <img src="dist/img/img-icon-5.png" width="20" height="20"  alt="" />Well 6 : Low
                                  <img src="dist/img/img-icon-4.png" width="20" height="20"  alt=""  />Well 7 : High    
                                    <img src="dist/img/img-icon-2.png" width="20" height="20"  alt=""  />  Well 8 : Low <img src="dist/img/img-icon-2.png" width="20" height="20"  alt=""  />  Well 2 : High High
                                    
                                    
                     <?php
                          while($scrolingalaramval = mysql_fetch_array($resultscrollingalaram))
                            {
                             //echo "<pre>";print_r($scrolingalaramval);
                           
                          ?>
                        
<!--                          Allarm Events Screoll Here.....-->

<?php  if ( $scrolingalaramval['Alarm_type']=='Low Low'){ ?>
                          
<?php   } elseif($scrolingalaramval['Alarm_type']=='Low'){ ?>
            
  <?php }elseif(($scrolingalaramval['Alarm_type']=='High')){ ?>

<?php }elseif($scrolingalaramval['Alarm_type']=='High High'){ ?>
 
                      
                           <?php }?>

                        <?php //echo $scrolingalaramval['asset_id'] ?><?php // echo $scrolingalaramval['Alarm_type'] ?>
                       
             <?php }?>           
                       
                      </marquee>
                              </div>
                  </div>
             
             
<!-- Map red pop up well 2 images start-->
        <div class="marker-sec">
<!--	      <div class="btn-ground text-center">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_viewred"> <img src="dist/img/marker-icon-2.png"></button>
	      </div>-->
	      <div class="modal fade product_view" id="product_viewred">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <div class="modal-header">
		      <div class="row">
		        <div class="col-lg-5"><img src="dist/img/popuop-headimg.png"></div>
		        <div class="col-lg-6 wel-sec">
		          <h3><span>W</span>ell No:2 <!--i class="fa fa-wifi"--></i></h3>
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
   
    <!-- Map red pop up well2 images start-->
                    
                    
               

        </div>

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
              <h3>Filter by client name </h3>
              <input type="search" class="" placeholder="Type Client Name" id="checkbox1" >
              <p></p>
              <div class="arrow-down"></div>
            </div>
              <div class="pop-up1" id ="val_2">
            <h3> Filter by country</h3>
            <div id="company_res"></div>
            <input type="button" id="submit_company"  value="submit"  class="btn-primary">
            <div class="arrow-down"></div>
        </div>
          
        <div class="pop-up2" id ="val_3"     >
          <h3>Filter by assets</h3>
          <div id="fields_res"></div>
          <input type="button" id="submit_field"  value="submit"  class="btn-primary" >
          <div class="arrow-down"></div>
        </div>
          
         <div class="pop-up3" id ="val_4"     >
          <h3> Filter by  wells</h3>
          <div id="assets_res"></div>
          <a href="#" data-toggle="modal" data-dismiss="modal"> <input type="button" id="submit_field_1"  class="btn-primary"  value="submit"></a>
          <div class="arrow-down"></div>
        </div>
          </div>
        </div>
      </div>
      </div>
    </section>
   
<!--------------- all popups--------------->
   
      
   <!--    Map Green pop up  Well 1 images start -->
        <div class="marker-sec">
	      <div class="btn-ground text-center">
<!--		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_viewgreen"> <img src="dist/img/marker-icon-4.png"></button>-->
	      </div>
	      <div class="modal fade product_view" id="product_viewgreen">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <div class="modal-header">
		      <div class="row">
		        <div class="col-lg-5"><img src="dist/img/popuop-headimg.png"></div>
		        <div class="col-lg-6 wel-sec">
		          <h3><span>W</span>ell No:1 <i class="fa fa-wifi"></i></h3>
		          <p><span>Status: <img src="dist/img/status-img.png"> Working</span> <span> | Alarm: 3:00 PM</span></p>
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
		          <p>3</p>
		          <p>2017-12-06</p>
		          <p>lorem Ipsum</p>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>80%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>70%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>70%</p>
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
   
    <!-- Map Green pop up  Well 1 images ends-->
   
    
    
     <!--    Map Orange pop up  Well 1 images start -->
        <div class="marker-sec">
	      <div class="btn-ground text-center">
<!--		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_viewgreen"> <img src="dist/img/marker-icon-4.png"></button>-->
	      </div>
	      <div class="modal fade product_view" id="product_vieworange">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <div class="modal-header">
		      <div class="row">
		        <div class="col-lg-5"><img src="dist/img/popuop-headimg.png"></div>
		        <div class="col-lg-6 wel-sec">
		          <h3><span>W</span>ell No:3 <i class="fa fa-wifi"></i></h3>
		          <p><span>Status: <img src="dist/img/status-img.png"> Working</span> <span> | Alarm: 2:30 PM</span></p>
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
		          <p>3</p>
		          <p>2017-12-06</p>
		          <p>lorem Ipsum</p>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>79%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>69%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>65%</p>
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
   
    <!-- Map Orange pop up  Well 1 images ends-->
    
    
    <!--    Map Orange pop up  Well 1 images start -->
        <div class="marker-sec">
	      <div class="btn-ground text-center">
<!--		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_viewgreen"> <img src="dist/img/marker-icon-4.png"></button>-->
	      </div>
	      <div class="modal fade product_view" id="product_vieworange4">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <div class="modal-header">
		      <div class="row">
		        <div class="col-lg-5"><img src="dist/img/popuop-headimg.png"></div>
		        <div class="col-lg-6 wel-sec">
		          <h3><span>W</span>ell No:8 <i class="fa fa-wifi"></i></h3>
		          <p><span>Status: <img src="dist/img/status-img.png"> Working</span> <span> | Alarm: 2:00 PM</span></p>
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
		          <p>3</p>
		          <p>2017-12-06</p>
		          <p>lorem Ipsum</p>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>50%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>50%</p>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-lg-9">
		              <div class="progress">
		                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> </div>
		              </div>
		            </div>
		            <div class="col-lg-2 progress-text">
		              <p>60%</p>
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
   
    <!-- Map Orange pop up  Well 1 images ends-->
   
   
   
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
        $("#checkbox1").keyup(function(){
             
        
             
            var country_val    = $("#checkbox1").val();
             var country_length = $("#checkbox1").val().length;
             
             //alert(country_length);
        if(country_length >=3)
        {
           
           
        //if(country_val  == 'ind' ||  country_val  == 'india' ||  country_val  == 'cus' ||  country_val  == 'customer'  )
        //{
             
            $(".pop-up").hide();

            $(".pop-up1").show();
            var cust_id =$("#checkbox1").val();
            var type = 1;
            document.cookie = cust_id;

            $.ajax({
                        type: "POST",
                        url: 'ajax.php',
                        data: {
                            cust_id: 1 ,
                            condition_type: type, 
                            },

                        success: function (response) {

                           
                            $("#company_res").html(response);
                            },
                             error: function(jqXHR, status, err){
                                    alert(jqXHR.responseText);
                                }

    });



       // }
        
         
        
        
        }
         
        
        
        
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
	
	$.post("ajax.php",  {'cust_id' : 1 , condition_type: '2' , 'countries': values}  , function(response){
		
		
		$("#fields_res").html(response);
	final_cust_id	
	})
	
});

function popup1(){
    alert();
}

</script>

<script>
$("#submit_field").click(function(){

/*	var myArray = [];
   $(":checkbox:checked").each(function() {
       myArray.push(this.value);
   });
*/    
//   var values=myArray.join(",");
 $(".pop-up2").hide();
 $(".pop-up3").show();
 
var cust_id = document.cookie;

var valid_cust_id=cust_id.split(";");
var final_cust_id=valid_cust_id[0];
var cheValues =$(':Checkbox:checked').map(function() {return this.value;}).get().join(',');// alert(cheValues);return false;

$.post("ajax.php",  {'cust_id' : 1 , condition_type: 3 , 'fields': cheValues}  , function(response){
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
 <script>
 $("#submit_field_1").click(function(){
     
      //$("#val_4").hide();
     
 });

</script>

</body>
</html>










 

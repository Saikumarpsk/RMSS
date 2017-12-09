<?php include 'root_head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include_once 'header.php'; ?>
 
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
	  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: #dde4f1"> <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class=""> <img src="dist/img/arrow-menu.png" alt="" /> </span> </a> 
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-7 col-md-7">
          <div class="box no-border">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-sm-3">
                  <div class="filtertitle"> <strong>W</strong>ell Frequency Info </div>
                </div>
                <div class="col-sm-5">
                  <div class="chart_lables">
                    <label> <i class="fa fa-circle-o text-yellow"> </i>Status</label>
                    <label> <i class="fa fa-circle-o text-green"> </i>Events</label>
                    <label> <i class="fa fa-circle-o text-red"> </i>Alarm</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="filterby">
                    <label> Filter by</label>
                    <select>
                      <option value="Frequency">Frequency</option>
                      <option value="temperature">Temperature</option>
                      <option value="pressure">Pressure</option>
                      
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="container_graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="small-box-footer"></div>
          </div>
          <div class="box no-border">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-sm-3">
                  <div class="filtertitle"> <strong>W</strong>ell Ampere status </div>
                </div>
                <div class="col-sm-5">
                  <div class="chart_lables">
                    <label> <i class="fa fa-circle-o text-yellow"> </i>Flowrate</label>
                    <label> <i class="fa fa-circle-o text-green"> </i>Events</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="filterby">
                    <label> Filter by</label>
                     <select>
                      <option value="Frequency">Ampere</option>
                      <option value="temperature">Temperature</option>
                      <option value="pressure">Pressure</option>
                      
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="container_graph1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="small-box-footer"></div>
          </div>
        </div>
          <?php
                      
                     $sql = "SELECT Intake_Pressure,Discharge_Temperature from assets_monitor_data where Assets_id = '1'" ;
                     $run=mysql_query($sql, $link);
                     $fet=mysql_fetch_array($run);
                     
                        ?>
        <div class="col-lg-5 col-md-5">
          <div class="row">
            <div class="col-sm-6">
              <div class="box no-border">
                <div class="box-body">
                  <div class="inner knob-pad">
                    <input type="text" class="knob text-blue" value="<?php echo $fet['Intake_Pressure']; ?>" data-width="150" data-height="150" data-fgColor="#ffce44"  data-angleOffset="-125 "data-angleArc="250" />
                    <label> Intake Pressure </label>
                  </div>
                </div>
              </div>
                
                 
              <div class="box no-border">
                <div class="box-body">
                  <div class="celcius">
                    <div class="">
                      <div class="col-sm-8"><ins class=""><?php echo $fet['Discharge_Temperature']; ?><sup>o</sup></ins><span> Celcius</span></div>
                      <div class="col-sm-4"> <img src="dist/img/thermometer.png" alt="" /> </div>
                    </div>
                    <div class="col-sm-12 ">
                      <div class="title"> Well Temperature</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <div class="col-sm-6">
              <div class="box no-border">
              <div class="box-body">
				 <div class="well-pump"> <label> Last Run = 03 days</label>
				  <label>Asset life = 12 days</label></div>
				  <div class="clearfix"></div>
				   <div class="pump">
					<div class="h-line-top"> </div>
					   <div class="pumpvalues"><ul>
						   <li><i class="fa fa-circle text-danger"></i> 250.00</li>
						   <li><i class="fa fa-circle text-blue"></i> 250.00</li>
						   <li><i class="fa fa-circle text-aqua"></i> 250.00</li>
						   <li><i class="fa fa-circle text-purple"></i> 250.00</li>
						   <li><i class="fa fa-circle text-danger"></i> 250.00</li>
						  </ul>
					   </div>
                	<div class="thermometer-noconfig" data-percent="55" data-orientation="vertical"></div>		
					<div class="indcate-ftimg"><img src="dist/img/indcate-ftimg.png"></div>	  
              </div>
				  
			  </div>
              </div>
            </div>
          </div>
            <?php
                      
                     $sql1 = "SELECT * FROM `assets_alarams` limit 5" ;
                     
                      $result = mysql_query($sql1, $link);
                        ?>
            
            
          <div class="row">
            <div class="col-sm-12">
              <div class="box no-border">
                <div class="box-header with-border">
                  <div class="row">
                    <div class="col-sm-10">
                      <div class="filtertitle"> <strong>A</strong>larm History </div>
                    </div>
                    <div class="col-sm-2"> <i class="fa fa-cogs text-aqua pill-right"></i></div>
                  </div>
                </div>
                <div class="box-body">
                  <div class="simscroller_timeline"><div class="box_timeline">
                    <ul id="first-list">
                    <?php   while($val12 = mysql_fetch_array($result)){
                        
                        $timestampvalue = strtotime($val12['time']); 
        $lastlogindetails =  date('M',$timestampvalue) .' '. date('D',$timestampvalue) ;
           $lasttime =    date('g',$timestampvalue) .' '. date('A',$timestampvalue);
              
                        ?>
                      <li> <span></span>
                      <!--  <div class="title">comment #01</div> -->
                        <div class="info"><?php echo $val12['full_message'];?></div>
                       <!-- <div class="name">- dr. mohamed -</div> -->
                        <div class="time"> <span><?php echo $lastlogindetails; ?><sup>th</sup></span> <span><?php echo $lasttime ?></span> </div>
                      </li>
                    <?php }?>
                    <!--  <li> <span></span>
                        <div class="title">summery #01</div>
                        <div class="info">the best animation , the best toturials you would ever see here only . you can learn how to animate and how to use SVG . even else you can add your own animations .</div>
                        <div class="name">- eng. amr -</div>
                        <div class="time"> <span>JUN, 29<sup>th</sup></span> <span>11:36 AM</span> </div>
                      </li>
                      <li> <span></span>
                        <div class="title">comment #02</div>
                        <div class="info">the best animation , the best toturials you would ever see . what about canvas ?? do you like it ..</div>
                        <div class="name">- dr. ahmed -</div>
                        <div class="time"> <span>FEB, 2<sup>nd</sup></span> <span>02:00 PM</span> </div>
                      </li> -->
                    </ul>
                  </div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content --> 
  </div>
  <?php include_once 'root_below.php'; ?>
</div>
</body>
<!-- ./wrapper --> 
<!-- jQuery 2.2.3 --> 
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<script src="plugins/fastclick/fastclick.js"></script> 
<script src="dist/js/app.min.js"></script> 
<script src="dist/js/demo.js"></script> 
<script src="dist/js/jquery.knob.js"></script> 
<script src="dist/js/highcharts.js"></script> 
<script src="dist/js/data.js"></script> 
<script src="dist/js/exporting.js"></script> 
<script src="dist/js/jquery-jvectormap-1.2.2.min.js"></script> 
<script src="dist/js/jquery-jvectormap-world-mill-en.js"></script> 
<script src="dist/js/jquery.thermometer.js"></script> 
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->
<script type="text/javascript">
	

    $(function() {
      $('.table-scroll').slimscroll({
      height: '151px'
      });
		$(".menuscroller").slimscroll({
      height: '120px'
      });
		$(".simscroller_timeline").slimscroll({
      height: '430px'
      });
		
    });


        
        </script> 
        
<script>
$(document).ready(function(){
var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
var values = '<?php print_r($_SESSION["question"]) ?>';
console.log(values);

$.ajax({
	    type: "POST",
	    url: 'ajax.php',
	    data: {
		cust_id:final_cust_id,
		condition_type: 3, 
		fields: values
		},
	
	    success: function (response) {//alert(response);
		$("#asset_res").html(response);
		
		},
		 error: function(jqXHR, status, err){
			alert(jqXHR.responseText);
		    }

	});

});

function comcheck(asset_id){ 
alert(asset_id);
      $.getJSON("linegraph.php", { id : asset_id }, function(json) { 
	Highcharts.chart('container_graph', {
    chart: {
       
        type:'area',
    },
   title: {text: json[0]['asset_name']},
    xAxis: {
            categories: json[0]['hour'],
             title: {
                text: 'Time(24 hrs Format)'
            },
            },

    yAxis: [{ // Primary yAxis
        labels: {
            format: '',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Frquency',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    series: json
   });	
});
$.getJSON("bargraph.php", { id : asset_id }, function(json) { 
    
        var chart;
         $(document).ready(function(){
	 chart = new Highcharts.chart('container_graph1', {
                        chart: {

                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        subtitle: {
                            text: ''
                        },
                       xAxis: {
                                categories: json[0]['hour'],
                                 title: {
                                    text: 'Time(24 hrs Format)'
                                },
                               },
                        yAxis: {
                            title: {
                                text: ''
                            },
                            labels: {
                                formatter: function () {
                                    return this.value + '';
                                }
                            }
                        },
                        tooltip: {
                            crosshairs: true,
                            shared: true
                        },
                        plotOptions: {
                            spline: {
                                marker: {
                                    radius: 4,
                                    lineColor: '#666666',
                                    lineWidth: 1
                                }
                            }
                        },
                        series: json
                });
        });	
    });	


$(".knob").knob({
      
      draw: function () {
        if (this.$.data('skin') == 'tron') {
          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;
          this.g.lineWidth = this.lineWidth;
          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
	
 $('.thermometer-noconfig').thermometer();
}

</script>     
<script>
    
    
    $(document).ready(function(){
        var asset_id = '<?php echo $_GET["asset_id"] ?>';
    //alert(asset_id);
    
         $.getJSON("linegraph.php", { id : asset_id }, function(json) { 
	Highcharts.chart('container_graph', {
    chart: {
       
        type:'area',
    },
   title: {text: json[0]['asset_name']},
    xAxis: {
            categories: json[0]['hour'],
             title: {
                text: 'Time(24 hrs Format)'
            },
            },
    yAxis: [{ // Primary yAxis
        labels: {
            format: '',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Frequency',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    series: json
   });	
});
$.getJSON("bargraph.php", { id : asset_id }, function(json) { 
    
        var chart;
         $(document).ready(function(){
	 chart = new Highcharts.chart('container_graph1', {
                        chart: {

                            type: 'column'
                        },
                        title: {
                            text: ''
                        },
                        subtitle: {
                            text: ''
                        },
                       xAxis: {
                                categories: json[0]['hour'],
                                 title: {
                                    text: 'Time(24 hrs Format)'
                                },
                               },
                        yAxis: {
                            title: {
                                text: ''
                            },
                            labels: {
                                formatter: function () {
                                    return this.value + '';
                                }
                            }
                        },
                        tooltip: {
                            crosshairs: true,
                            shared: true
                        },
                        plotOptions: {
                            spline: {
                                marker: {
                                    radius: 4,
                                    lineColor: '#666666',
                                    lineWidth: 1
                                }
                            }
                        },
                        series: json
                });
        });	
    });	


$(".knob").knob({
      
      draw: function () {
        if (this.$.data('skin') == 'tron') {
          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;
          this.g.lineWidth = this.lineWidth;
          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
	
 $('.thermometer-noconfig').thermometer();

  
    
});


</script>
</body>
</html>




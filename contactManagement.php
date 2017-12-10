
<?php include 'root_head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include_once 'header.php'; ?> 
  	<?php include_once 'leftPanel.php'; ?>	
	<!-- Content Wrapper. Contains page content -->
	   <div class="content-wrapper"> 
               <section class="content">
                  
<div class="box">
    <div class="box-header">
        <div class="row">
            <div class="col-sm-9">
                       <h3>Contract KPI</h3>
          </div>
               <div class="col-sm-3">
            <div class="input-group table-serch">
              <input type="text" name="q" class="form-control color" placeholder="Search...">
              <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
              </span> </div>
          </div>
        </div>
    </div>

    <div class="box-body">
          <?php          
                        $contractkpi =  "select * from  Contractkpi"; 
                        $runcontractkpi = mysql_query($contractkpi, $link);
                       // $fetcontractkpi=mysql_fetch_array($runcontractkpi); 
                        ?>
        
        <!-- Content Wrapper. Contains page content -->
	
      <table id="example1" class="table table-bordered table-striped dataTable dashboardt-table" role="grid" aria-describedby="example1_info">
        <thead>
          <tr>
            <th width="40%" > <div">
                    <select >
                         <option>Year</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                       
                    </select>
                <span>to</span>
               <select >
                         <option>Month</option>
                        <option>Jan</option>
                        <option>Feb</option>
                        <option>Mar</option>
                        <option>Apr</option>
                        <option>May</option>
                        <option>Jun</option>
                        <option>Jul</option>
                        <option>Aug</option>
                        <option>Sep</option>
                        <option>Oct</option>
                        <option>Nov</option>
                        <option>Dec</option>
                     
                       
                    </select>
              </div>
          </div>
        
          </th>
        
        
          <th width="20%"> Vender 1</th>
          <th width="20%"> Vender 2</th>
          <th width="20%"> Vender 3</th>
        </tr>
          </thead>
        
        <tbody>
          <tr role="row">
            <td ><strong>Production</td>
            <td>20</td>
            <td>30</td>
            <td>40</td>
          </tr>
          <tr role="row">
            <td><strong>Total Down Time</td>
            <td>10</td>
            <td>10</td>
            <td>5</td>
          </tr>
          <tr role="row">
            <td><strong>Deffered Production</td>
            <td>3000</td>
            <td>3000</td>
            <td>5000</td>
          </tr>
          <tr role="row">
            <td><strong>Late Delivery</td>
            <td>15</td>
            <td>15</td>
            <td>5</td>
          </tr>
          <tr role="row">
            <td><strong>Failed Pumps</td>
            <td>10</td>
            <td>20</td>
            <td>30</td>
          </tr>
          <tr role="row">
            <td><strong>WO Installtion</td>
            <td>50</td>
            <td>50</td>
            <td>20</td>
          </tr>
          <tr role="row">
            <td><strong>WO Pull</td>
            <td>54</td>
            <td>54</td>
            <td>15</td>
          </tr>
          <tr role="row">
            <td><strong>Monitoring Trips</td>
            <td>0</td>
            <td>0</td>
            <td>3</td>
          </tr>
          <tr role="row">
            <td><strong> SQ Events </strong></td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
          </tr>
          <tr role="row">
            <td><strong> Vehicle Accidents</td>
            <td>0</td>
            <td>0</td>
            <td>3</td>
          </tr>
        </tbody>
      </table>
    </div>
<!--    <div class="box-footer">
      <ul class="pagination pull-right">
        <li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li>
        <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li>
        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li>
        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li>
        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li>
        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li>
        <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li>
      </ul>
    </div>-->
        </div>
         
               
      <div class="box no-border">
          <div id="graphs_table"></div>
        </div>          
               
               
               </section>
               <?php include_once 'alarams.php'; ?>
              
    <!-- /.box-body --> 
  </div>
              </div>
	  </div> 
 <?php include_once 'root_below.php'; ?>
<script src="js/bootstrap-datepicker.js"></script>
<script src="dist/js/highcharts.js"></script> 
<script>
$('.datepicker').datepicker({
      autoclose: true
    });
    
    
    Highcharts.chart('graphs_table', {

    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: 'Production'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 10
        }
    },

    series: [{
        name: 'Vendor 1',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
        name: 'Vendor 2',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Vendor 3',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
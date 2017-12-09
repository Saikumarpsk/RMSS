
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
	   <div class="content-wrapper"> 
               <?php include_once 'alarams.php'; ?>
              <div class="box allpage-tabledata">
<div class="box">

    <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap text-center">
        <div class="row marg-t-15">
            <div class="col-sm-6 text-left table-export ">
                          <h3>Contract KPI</h3>
          </div>
          <div class="col-sm-6 text-right">
            <div class="input-group table-serch">
              <input type="text" name="q" class="form-control color" placeholder="Search...">
              <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
              </span> </div>
          </div>

        </div>
          <?php          
                        $contractkpi =  "select * from  Contractkpi"; 
                        $runcontractkpi = mysql_query($contractkpi, $link);
                       // $fetcontractkpi=mysql_fetch_array($runcontractkpi); 
                        ?>
        <div class="row marg-t-15">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable dashboardt-table" role="grid" aria-describedby="example1_info">
               <thead>
                                <tr role="row">
                                  <th>Vendor</th>
                                  <th>Production</th>
                                  <th>Total Down Time</th>
                                  <th>Deferred Production</th>
                                  <th>Late Delivery</th>
                                  <th>Failed Pumps</th>
                                  <th>WO Installation</th>
                                  <th>WO Pull</th>
                                  <th>Vehicle Accidents</th>
                                  <th>Score</th>
                                </tr>
                              </thead>
              <tbody>
                <?php 
                                  while($fetcontractkpi=mysql_fetch_array($runcontractkpi))
			{ ?>
                                  <td ><?php echo $fetcontractkpi['vendor'];?></td>
                                  <td><?php echo $fetcontractkpi['production'];?></td>
                                  <td><?php echo $fetcontractkpi['Total_Down_Time'];?></td>
                                  <td><?php echo $fetcontractkpi['Deffered_Production'];?></td>
                                  <td><?php echo $fetcontractkpi['Late_Delivery'];?></td>
                                  <td><?php echo $fetcontractkpi['Failed_Pumps'];?></td>
                                  <td><?php echo $fetcontractkpi['Installtion'];?></td>
                                  <td><?php echo $fetcontractkpi['Pull'];?></td>
                                  <td><?php echo $fetcontractkpi['Vehicle_Accidents'];?></td>
                                  <td><?php echo $fetcontractkpi['Score'];?></td>
                                </tr>
                        <?php } ?>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 text-left">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
              <ul class="pagination">
                <li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li>
                <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li>
                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li>
                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li>
                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li>
                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li>
                <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body --> 
  </div>
              </div>
	  </div>
  <?php include_once 'root_below.php'; ?>


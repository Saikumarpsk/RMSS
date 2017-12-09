
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
  <div class="content">            
<div class="box">

    <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap text-center">
        <div class="row marg-t-15">
            
                      <div class="col-sm-6 text-left table-export ">
                          <h3>Dashboard</h3>
          </div>
          <div class="col-sm-6 text-right">
            <div class="input-group table-serch">
              <input type="text" name="q" class="form-control color" placeholder="Search...">
              <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
              </span> </div>
          </div>

        </div>
        <div class="row marg-t-15">
          <div class="col-sm-12">
              <?php
                   $assetslist =  "select *  from asset_id_list A,assets_monitor_data B where B.Assets_id=A.asset_id limit 10"; 
                   $runassetslist = mysql_query($assetslist, $link);
                   //$fetassetslist=mysql_fetch_array($runassetslist);
                   ?>
            <table id="example1" class="table table-bordered table-striped dataTable dashboardt-table" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                                  <th>Country</th>
                                  <th>Field</th>
                                  <th>Pad</th>
                                  <th>Well</th>
                                  <th>Install date</th>
                                  <th>Run Life</th>
                                  <th>Production Rate</th>
                                  <th>Oil Production rate</th>
                                </tr>
              </thead>
              <tbody>
               <?php while( $fetassetslist=mysql_fetch_array($runassetslist))
			{ ?>
                                  <tr role="row" class="odd">                                  
                                  <td ><?php echo $fetassetslist['country_id'];?></td>
                                  <td><?php echo $fetassetslist['field'];?></td>
                                  <td><?php echo $fetassetslist['pad'];?></td>
                                  <td><?php echo $fetassetslist['asset_name'];?></td>
                                  <td><?php echo $fetassetslist['date'];?></td>
                                  <td><?php echo $fetassetslist['runlife'];?></td>
                                  <td><?php echo $fetassetslist['production_rate'];?></td>
                                  <td><?php echo $fetassetslist['oil_production_rate'];?></td>
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
	  </div></div>
  <?php include_once 'root_below.php'; ?>


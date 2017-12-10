
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
                          <h3>Current Alarms</h3>
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
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap text-center">        
        <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable dashboardt-table" role="grid" aria-describedby="example1_info">
               <thead>
                                <tr role="row">
                                  <th>Client</th>
                                  <th>Country</th>
                                  <th>Field</th>
                                  <th>Pad</th>
                                  <th>Well</th>
                                  <th>Alarm Time</th>
                                  <th>UoM</th>
                                  <th>Value</th> 
                                  <th>Alarm Type</th>
                                  <th>Acknowledge By</th>
                                  <th>SMS Sent By</th>
                                  <th>Email Sent By</th>
                                </tr>
                              </thead>
              <tbody>
               <?php 
                        $alaram =  "select * from assets_alarams A,asset_id_list B where user_id = 1 and A.asset_id = B.asset_short_name limit 10 "; 
                        $resultalaram = mysql_query($alaram, $link);
                        $i = 1;
			while($alaramval = mysql_fetch_assoc($resultalaram))
                                 
			{ 
                            $var = strtotime($alaramval['time']);
                            $dateformat =  date("Y-M-d H:i:s" , $var); 
                            
                            ?>
                  
                                  <tr role="row" class="odd">
                                  <td>Rico</td>
                                  <td><?php echo $alaramval['country_id']?></td>
                                  <td><?php echo $alaramval['field']?></td>
                                  <td><?php echo $alaramval['pad']?></td>
                                  <td><?php echo "Well" .$i?></td>
                                  <td><?php echo $dateformat; ?></td>
                                  <td><?php echo $alaramval['UOM']?></td>
                                  <td><?php echo $alaramval['value']?></td>
                                  <td><?php echo $alaramval['Alarm_Type']?></td>
                                  <td><?php echo "James" ?></td>
                                  <td><?php echo "YES" ?></td>
                                  <td><?php echo "YES" ?></td>
                                
                                </tr>
                        <?php 
                        
                        $i++;
                        
                        }?>
                
              </tbody>
            </table>
          </div>
        </div>
<!--        <div class="row">
          <div class="col-sm-12 text-left">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
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
            </div>
          </div>
        </div>-->
      </div>
    </div>
              </section>
           
 <?php include_once 'alarams.php'; ?>
    <!-- /.box-body --> 
  </div>
             
	  </div>
        
  <?php include_once 'root_below.php'; ?>

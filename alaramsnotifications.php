<?php
error_reporting(0);
include './root_head.php';

/*For total count */ 
             $total =  "select count(*) as count from assets_alarams where user_id = 1 "; 
             $resulttotal = mysql_query($total, $link);
            /*For total count */
                      
            /*For $dischsrgepressure count */ 
             $dischsrgepressure =  "select Alarm_Parameter,count(*) as count1 from assets_alarams where user_id = 1 group by Alarm_Parameter "; 
             $resultdischsrgepressure = mysql_query($dischsrgepressure, $link);
            /*For total count */ 
                      
            
            ?>


<div class="modal-body">
                          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                              <div class="col-lg-12">
                        <?php          
                        $alaramss =  "select count(*) as count1 from assets_alarams where user_id = 1"; 
                        $resultalaramss = mysql_query($alaramss, $link);
                        $fetalaramss=mysql_fetch_array($resultalaramss); ?>
        
              <h3><span>A</span>larm : <?php echo $fetalaramss['count1'];?></h3>
                              </div>
                              <div class="col-lg-12">
                                <div class="row">
                                  <div class="col-lg-4 marg-t-15">
                                      
                                    <p>Not Acknowledged:20</p>
                                    <p>Client Not Informed :20</p>
                                  </div>
                                  <div class="col-lg-2 center-block">
                                    <div class="dashedborder-vlow">15</div>
                                    <p>Low</p>
                                  </div>
                                  <div class="col-lg-2 center-block">
                                    <div class="dashedborder-vhigh">15</div>
                                    <p>Low Low</p>
                                  </div>
                                  <div class="col-lg-2 center-block">
                                    <div class="dashedborder-low">15</div>
                                    <p>High</p>
                                  </div>
                                  <div class="col-lg-2 center-block">
                                    <div class="dashedborder-high">15</div>
                                    <p>High High</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div>
                                <div class="col-lg-6">
                                  <h3><span>A</span>larm Notifications</h3>
                                </div>
                                <div class="col-sm-6 marg-t-15 text-right alarm-notification-search"><div id="example1_filter" class="dataTables_filter"><label>Filterd by: <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div>
                              </div>
                              <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                  <thead>
                                    <tr role="row">
                                      <th>Well Name</th>
                                      <th>Date and Time</th>
                                      <th>Status</th>
                                      <th>Parameter</th>
                                      <th>Value</th>
                                      <th>Client Notified</th>
                                      <th>Acknowledged By</th>
                                      <th>SMS Sent</th>
                                      <th>Email Sent</th>
                                    </tr>
                                  </thead>
                                  
                                  <tbody>
                                      <?php 
                        $alaram =  "select * from assets_alarams where user_id = 1 order by id desc limit 10"; 
                        $resultalaram = mysql_query($alaram, $link);
        
			while($alaramval = mysql_fetch_assoc($resultalaram))
			{ ?>
                                      
                                      
                                    <tr role="row" class="odd">
                    <td><?php echo $alaramval['asset_id'];?></td>
                    <td><?php echo $alaramval['time']?></td>
                    <td><?php echo $alaramval['status']?></td>
                    <td><?php echo $alaramval['Alarm_Parameter']?></td>
                    <td><?php echo $alaramval['value']?></td>
                    <td><?php echo $alaramval['notify_status']?></td>
                    <td><?php echo $alaramval['Acknowledged_By']?></td>
                    <td><?php echo $alaramval['Message']?></td>
                    <td><?php echo $alaramval['Event_Detection']?></td>
                                     
                                    </tr>
                                    
                        <?php }?>
                                   </tbody>
                                </table>
                              </div>
                            </div>
                                  <hr>
                               <div class="row">
                              <div>
                                  <?php 
            $redcount =  "select count(*) as count from assets_alarams where user_id = 1 and status='Failed'"; 
            $resultstatuscred = mysql_query($redcount, $link);
            $fetred=mysql_fetch_array($resultstatuscred);
            
            $orangecount =  "select count(*) as count from assets_alarams where user_id = 1 and status='WO Pull'"; 
            $resultstatuscorange = mysql_query($orangecount, $link);
	    $fetorange=mysql_fetch_array($resultstatuscorange);
            
            
            $yellowcount =  "select count(*) as count from assets_alarams where user_id = 1 and status='Stopped'"; 
            $resultstatuscyellow = mysql_query($yellowcount, $link);
            $fetyellow=mysql_fetch_array($resultstatuscyellow);
            
            $browncount =  "select count(*) as count from assets_alarams where user_id = 1 and status='WO Instal'"; 
            $resultstatuscbrown = mysql_query($browncount, $link);
	    $fetbrown=mysql_fetch_array($resultstatuscbrown);
            
             $greencount =  "select count(*) as count from assets_alarams where user_id = 1 and status='Running'"; 
             $resultstatuscgreen = mysql_query($greencount, $link);
	     $fetgreen=mysql_fetch_array($resultstatuscgreen);
             
           
             
            
              ?>
                                <div class="col-lg-6">
                                  <h3><span>A</span>ssets Status</h3>
                                </div>
                                
                              </div>
                              
                              <div class="row"><div class="col-sm-12 marg-t-15">
                                <div class="col-lg-3 text-red"><i class="fa fa-circle"></i> Failed= <?php echo $fetred['count']?></div>
                                <div class="col-lg-3 text-orange"><i class="fa fa-circle"></i> WO Opt=<?php echo $fetorange['count']?></div>
                                <div class="col-lg-3 text-yellow"><i class="fa fa-circle"></i> Stopped= <?php echo $fetyellow['count']?></div>
                                <div class="col-lg-3 text-brown"><i class="fa fa-circle"></i> WO Installation=<?php echo $fetbrown['count']?></div>
                                <div class="col-lg-3 text-green marg-t-15"><i class="fa fa-circle"></i> Running=<?php echo $fetgreen['count']?></div>
                               
                              </div></div>
                              
<!--                              <div class="col-lg-12 marg-t-15">

                                <button type="button" class="btn btn-primary">Export Data</button>
                                <button type="button" class="btn btn-primary">Email Data</button>

                              
                            </div>-->
                            </div>   
                            
                          </div>
                        </div>

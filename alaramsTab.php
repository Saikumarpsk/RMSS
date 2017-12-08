<div class="alarm-notification-sec">
              <div class="modal fade product_view" id="product_view9">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                       <div class="col-lg-12">
                        <?php          
                        $alaramss =  "select count(*) as count1 from assets_alarams where user_id = 1"; 
                        $resultalaramss = mysql_query($alaramss, $link);
                        $fetalaramss=mysql_fetch_array($resultalaramss); ?>
        
              <h3><span>A</span>larm : <?php echo $fetalaramss['count1'];?></h3>
                              </div>
                          <div class="row">
                              <div class="col-lg-4 marg-t-15">
                         <?php          
                        $notify_status =  "select count(*) as count1 from assets_alarams where user_id = 1 and notify_status='YES'"; 
                        $runnotify_status = mysql_query($notify_status, $link);
                        $fetnotify_status=mysql_fetch_array($runnotify_status); ?>
                                  
                                  
                        <?php          
                        $aknowledge_status =  "select count(*) as count1 from assets_alarams where user_id = 1  and aknowledge_status='YES' "; 
                        $runaknowledge_status = mysql_query($aknowledge_status, $link);
                        $fetaknowledge_status=mysql_fetch_array($runaknowledge_status); ?>
                                  
                                  
                                <p>Not Acknowledged:<?php echo $fetaknowledge_status['count1'];?></p>
                                <p>Client Not Informed :<?php echo $fetnotify_status['count1'];?></p>
                              </div>
                                            <?php   
                                            
                    $Low =  "select count(*) as count1 from assets_alarams where Alarm_Type='Low'"; 
                   $runLow = mysql_query($Low, $link);
                   $fetrunLow=mysql_fetch_array($runLow); 


                   $LowLow =  "select count(*) as count1 from assets_alarams where Alarm_Type='Low Low'"; 
                   $runLowLow = mysql_query($LowLow, $link);
                   $fetLowLow=mysql_fetch_array($runLowLow); 
                   
                   $high =  "select count(*) as count1 from assets_alarams where Alarm_Type='High'"; 
                   $runhigh = mysql_query($high, $link);
                   $fetrunhigh=mysql_fetch_array($runhigh); 

                   $HighHigh =  "select count(*) as count1 from assets_alarams where Alarm_Type='High High'"; 
                   $runHighHigh = mysql_query($HighHigh, $link);
                   $fetHighHigh=mysql_fetch_array($runHighHigh); 

      

                                         ?>         
                                
                                
                                
                              <div class="col-lg-2 center-block">
                                <div class="dashedborder-vlow"><?php echo $fetLowLow['count1'];?></div>
                                <p>Low</p>
                              </div>
                              <div class="col-lg-2 center-block">
                                <div class="dashedborder-vhigh"><?php echo $fetrunLow['count1'];?></div>
                                <p>Low Low</p>
                              </div>
                              <div class="col-lg-2 center-block">
                                <div class="dashedborder-low"><?php echo $fetrunhigh['count1'];?></div>
                                <p>High</p>
                              </div>
                              <div class="col-lg-2 center-block">
                                <div class="dashedborder-high"><?php echo $fetHighHigh['count1'];?></div>
                                <p>High High</p>
                              </div>
                            </div>
                        <hr>
                        <div class="row">
                          <div>
                            <div class="col-lg-6">
                              <h3><span>A</span>larm Notifications</h3>
                            </div>
                            <div class="col-sm-6 marg-t-15 text-right alarm-notification-search">
                              <div id="example1_filter" class="dataTables_filter">
                                <label>Filterd by:
                                  <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                              <thead>
                                <tr role="row">
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
                                  <th>Email</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php 
                        $alaram =  "select * from assets_alarams A,asset_id_list B where user_id = 1 and A.asset_id = B.asset_short_name "; 
                        $resultalaram = mysql_query($alaram, $link);
        
			while($alaramval = mysql_fetch_assoc($resultalaram))
			{ ?>
                                
                                <tr role="row" class="odd">
                                 <td><?php echo $alaramval['country_id']?></td>
                                  <td><?php echo $alaramval['field']?></td>
                                  <td><?php echo $alaramval['pad']?></td>
                                  <td><?php echo $alaramval['asset_name']?></td>
                                  <td><?php echo $alaramval['time']?></td>
                                  <td><?php echo $alaramval['UOM']?></td>
                                  <td><?php echo $alaramval['value']?></td>
                                  <td><?php echo $alaramval['Alarm_Type']?></td>
                                  <td><?php echo $alaramval['Acknowledged_By']?></td>
                                  <td><?php echo $alaramval['Message']?></td>
                                
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
                    <!-- /.box-body --> 
                    
                  </div>
                </div>
              </div>
            </div>
            
                  
                    
              <div class="marker-sec">
                      <div class="btn-ground text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"> <img src="dist/img/marker-icon.png"></button>
                      </div>
                      <div class="modal fade product_view" id="product_view">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div class="row">
                                <div class="col-lg-5"><img src="dist/img/popuop-headimg.png"></div>
                                <div class="col-lg-6 wel-sec">
                                  <h3><span>W</span>ell No:3 <i class="fa fa-wifi"></i></h3>
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
            
            
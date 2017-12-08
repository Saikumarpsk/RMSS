<div class="alarm-notification-sec">
              <div class="modal fade product_view" id="product_view10">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        
                        <hr>
                        <div class="row">
                            <?php          
                        $contractkpi =  "select * from  Contractkpi"; 
                        $runcontractkpi = mysql_query($contractkpi, $link);
                       // $fetcontractkpi=mysql_fetch_array($runcontractkpi); 
                        ?>
                          <div>
                            <div class="col-lg-6">
                              <h3><span>C</span>ontract KPI</h3>
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
                                  <th>vendor</th>
                                  <th>production</th>
                                  <th>Total_Down_Time</th>
                                  <th>Deffered_Production</th>
                                  <th>Late_Delivery</th>
                                  <th>Failed_Pumps</th>
                                  <th>Installtion</th>
                                  <th>Pull</th>
                                  <th>Vehicle_Accidents</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr role="row" class="odd">
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
                                </tr>
                        <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                         
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
            
            
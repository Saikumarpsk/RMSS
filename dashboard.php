<div class="alarm-notification-sec">
              <div class="modal fade product_view" id="product_view8">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                          
                        </div>
                        <hr>
                        <div class="row">
                          <div>
                            <div class="col-lg-6">
                              <h3><span>D</span>ash Board Wells</h3>
                            </div>
                            <div class="col-sm-6 marg-t-15 text-right alarm-notification-search">
                              <div id="example1_filter" class="dataTables_filter">
                                <label>Filterd by:
                                  <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                                </label>
                              </div>
                            </div>
                          </div>
                            <?php
                   $assetslist =  "select *  from asset_id_list A,assets_monitor_data B where B.Assets_id=A.asset_id limit 10"; 
                   $runassetslist = mysql_query($assetslist, $link);
                   //$fetassetslist=mysql_fetch_array($runassetslist);
                   ?>
                          <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
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
                        <hr>
                        
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
            
            
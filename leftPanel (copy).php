<!-- =============================================== --> 
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
        
        
        <?php
        
           
            if(isset($_POST)  && $_POST['condition_type'] == 3 )
            {
                include './db_connect.php';
                
                if($_POST['asset_idlist']){ //print_r($_POST);die();
                    $cust_id=$_POST['asset_idlist'];
                    $countries =$_POST['fields'];
                }else{
                    $cust_id=$_POST['cust_id'];
                    $countries =$_POST['fields'];

                    $_SESSION["question"] = $countries; 

                    //print_r($_SESSION);die();
                }
                
                
                $result_string = "'" . str_replace(",", "','", $countries) . "'";

                //print_r($result_string);die();
                $sql =  "select * from  asset_id_list where field_id in($result_string) and customer_id = '$cust_id' ";
                
                $results = mysql_query($sql,$link);
               //print_r($results);die('1111');
            ?>
            <ul class="sidebar-menu">
            <?php
                while($val1 = mysql_fetch_array($results))
               {

                    echo "<input type='hidden' name=checkbox1 class='checkbox2'   value='".$val1["asset_id"] ." ' lat='".$val1["asset_loc_lat"]."' long='".$val1["asset_loc_long"]."' country_name='".$val1["country_id"]."' asset_name='".$val1["asset_name"]."' marker_icon=0>
                            <li class='treeview'> <a href='#'> <span>".$val1['asset_name']."</span> <i class='fa fa-circle-o text-green pull-right'></i> <span class='pull-right-container'> <i class='fa fa-anglde-left pull-right'></i> </span> </a>";
                  
           ?>
              <ul class="treeview-menu ">
                    <li><a href="javascript:void(0);" onclick="locateMap('<?php echo $val1["asset_id"]?>');">Location</a></li>
                    <li><a href="javascript:void(0);" onclick="assetDetails('<?php echo $val1["asset_id"]?>')">Well Details</a></li>
                </ul>  
            <?php
                }
            ?>
                
            </ul>
            <?php
            }
//print_r($_POST);die();
            ?>
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
  
  <!-- =============================================== --> 
  
  <script>
        function locateMap(asset_id){
            //alert(asset_id);
            //window.location.href = "charts.php?asset_id="+asset_id;
        }
        
        function assetDetails(asset_id){
            
            //var fields = '<?php print_r($_SESSION["question"]) ?>';
            
//            $.ajax({
//               type:'POST',
//               data:{
//                 asset_idlist:asset_id,
//                 fields:fields,
//               },
//               url:'charts.php',
//               success: function (response) {
//                        
//                    //alert(response);
//                  $("#asset_res").html(response);
//                }
//               
//            });
            
            window.location.href = "charts.php?asset_id="+asset_id;
        }
        function comcheck(asset_id){
            
            window.location.href = "charts.php?asset_id="+asset_id;
        }
 
  </script>
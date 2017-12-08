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

	  </div>
  <?php include_once 'root_below.php'; ?>
</div>
</body>
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
}

</script>
</html>



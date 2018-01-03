


<header class="main-header">
    <nav class="navbar navbar-static-top">
     
     
        <div class="navbar-header">
         <div class="_logo"><a href="maps.php"><img src="dist/img/Kellton-logo.png" alt="" /></a> </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse pull-left collapse" id="navbar-collapse" aria-expanded="false" style="height: 1px;">
           <ul class="nav navbar-nav">
          <li><a href="javascript:void(0);" onclick="dashboasrd()">Dashboard</a></li>
<!--          <li><a href="javascript:void(0);" onclick="alaramstab()">Alarms</a></li>-->
          <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Advisory 365<i class="fa fa-angle-down"> </i></a>
               <ul class="dropdown-menu" role="menu">
              <li><a href="#">Trendz</a></li>
              <li><a href="javascript:void(0);" onclick="alaramstab()">Alarms</a></li>
              <li><a href="#">Events</a></li>
            </ul>
          </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Operations <i class="fa fa-angle-down"> </i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Eqipment Management</a></li>
              <li><a href="#">Field Service Management</a></li>
              <li><a href="#">Application Engineering</a></li>
              <li><a href="#">Quality Assurance Tracker</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">LiftEd <i class="fa fa-angle-down"> </i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">CNOOC Workflow</a></li>
              <li><a href="#">Expert Advice</a></li>
            </ul>
          </li>
                    <li><a href="javascript:void(0);">Report Center</a></li>
          <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Contract Management <i class="fa fa-angle-down"> </i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0);"  onclick="contactManagement()">KPI</a></li>
            </ul>
          </li>
        </ul>
      </div>
          
      
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu"> <a href="javascript:void(0);"  class="dropdown-toggle"> <img src="dist/img/notification-icon.png"> </a> </li>
          <li class="dropdown tasks-menu"> <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#product_view1"> <img src="dist/img/alarm-icon.png"> </a> </li>
          <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="dist/img/user-icon.png" class="user-image" alt="User Image"> <span class="hidden-xs hidden-sm hidden-sms"> Welcome, User <i class="fa fa-angle-down"></i></span> <br>

            <small class="hidden-xs hidden-sm hidden-sms">Last Login: 10 Dec 10:00</small> </a>

            <ul class="dropdown-menu">
              <li class="user-header"> <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p> user <small> user@gmail.com </small> </p>
              </li>
              <li class="user-footer">
                <div class="pull-left"> <a href="javascript:void(0);" class="btn btn-default btn-flat">Profile</a> </div>
                <div class="pull-right"> <a href="javascript:void(0);" onclick = "logout()"; class="btn btn-default btn-flat">Sign out</a> </div>
              </li>
            </ul>
          </li>
          <li></li>
        </ul>
      </div>
        <!-- /.navbar-custom-menu -->
      </div>
         
        
    </nav>
  </header>



<!-- header-->

<script>
   function logout(){
	window.location.href = "logout.php";
    }
    function dashboasrd(){
     window.location.href = "dashboard.php";
        }
        function alaramstab(){
     window.location.href = "alaramsTab.php";
        }
        function contactManagement(){
     window.location.href = "contactManagement.php";
        }
</script>
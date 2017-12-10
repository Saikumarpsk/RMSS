<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="_logo"><a href="maps.php"><img src="dist/img/Kellton-logo.png" alt="" /></a> </div>
      <!-- Sidebar toggle button-->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="javascript:void(0);" onclick="dashboasrd()">Dashboard</a></li>
          <li><a href="javascript:void(0);" onclick="alaramstab()">Alarms</a></li>
<!--          <li><a href="javascript:void(0);">Events</a></li>-->
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Operations <i class="fa fa-angle-down"> </i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action1</a></li>
              <li><a href="#">Action2</a></li>
              <li><a href="#">Action3</a></li>
              <li><a href="#">Action4</a></li>
            </ul>
          </li>
          <li><a href="javascript:void(0);"> Analytics </a></li>
          <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Contract Mangement <i class="fa fa-angle-down"> </i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0);"  onclick="contactManagement()">Contract KPI</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu"> <a href="javascript:void(0);"  class="dropdown-toggle"> <img src="dist/img/notification-icon.png"> </a> </li>
          <li class="dropdown tasks-menu"> <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#product_view1"> <img src="dist/img/alarm-icon.png"> </a> </li>
          <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="dist/img/user-icon.png" class="user-image" alt="User Image"> <span class="hidden-xs"> Welcome, User <i class="fa fa-angle-down"></i></span> <br>
            <small>Last Login: 15 Nov 3:00</small> </a>
            <ul class="dropdown-menu">
              <li class="user-header"> <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p> user <small> user@gmail.com </small> </p>
              </li>
              <li class="user-footer">
                <div class="pull-left"> <a href="#" class="btn btn-default btn-flat">Profile</a> </div>
                <div class="pull-right"> <a href="javascript:void(0);" onclick = "logout()"; class="btn btn-default btn-flat">Sign out</a> </div>
              </li>
            </ul>
          </li>
          <li></li>
        </ul>
      </div>
    </nav>
  </header>

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
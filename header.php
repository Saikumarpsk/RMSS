<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="_logo"><img src="dist/img/Kellton-logo.png" alt="" /> Well <strong>Vision</strong></div>
      <!-- Sidebar toggle button-->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#product_view8">Dashboard</a></li>
          <li><a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#product_view9">Alarms</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="#">Events</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Operations <i class="fa fa-angle-down"> </i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action1</a></li>
              <li><a href="#">Action2</a></li>
              <li><a href="#">Action3</a></li>
              <li><a href="#">Action4</a></li>
            </ul>
          </li>
          <li><a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#product_view10">Contract Mangement</a></li>
        </ul>
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less--> 
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu"> <a class="dropdown-toggle" data-toggle="modal" data-target="#product_view1"> <i class="fa fa-bell-o"></i> <span class="label label-warning">10</span>


            </a> </li>
          <!-- Tasks: style can be found in dropdown.less -->
         
          <li class="dropdown tasks-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-clock-o"></i> <span class="label label-danger">9</span> </a>
            
              <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li> 
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item --> 
                    <a href="#">
                    <h3> Design some buttons <small class="pull-right">20%</small> </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">20% Complete</span> </div>
                    </div>
                    </a> </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer"> <a href="#">View all tasks</a> </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> <span class="hidden-xs"> Wellcome, User <i class="fa fa-angle-down"></i></span> <br>
            <small>Last Login 15</small> </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p> Alexander Pierce - Web Developer <small>Member since Nov. 2012</small> </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center"> <a href="#">Followers</a> </div>
                  <div class="col-xs-4 text-center"> <a href="#">Sales</a> </div>
                  <div class="col-xs-4 text-center"> <a href="#">Friends</a> </div>
                </div>
                <!-- /.row --> 
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"> <a href="#" class="btn btn-default btn-flat">Profile</a> </div>
                <div class="pull-right"> <a href="javascript:void(0);" onclick = "logout()"; id = "logout" class="btn btn-default btn-flat">Sign out</a> </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li></li>
        </ul>
      </div>
    </nav>
  </header>

<script>
   function logout(){
	window.location.href = "logout.php";
    }
</script>
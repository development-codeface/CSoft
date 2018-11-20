<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:04:29 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Apollo</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico')}}" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{ asset('assets/admin/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/admin/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/admin/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ asset('assets/admin/css/sidebar-menu.css')}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/admin/css/app-style.css')}}" rel="stylesheet"/>
  <link href="{{ asset('assets/admin/css/style.css')}}" rel="stylesheet"/>

</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="{{ asset('assets/admin/images/logo-icon.png')}}" class="logo-icon" alt="Bangodash">
       <h5 class="logo-text"> APOLLO</h5>
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="{{ URL::route('DashBoard') }}" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span> <i class=""></i>
        </a>
      
      </li>
      <li>
        <a href="{{ URL::route('Menus') }}" class="waves-effect">
          <i class="icon-home"></i> <span>Menus</span> <i class=""></i>
        </a>
      
      </li>
      <li>
        <a href="{{ URL::route('AdminAboutList') }}" class="waves-effect">
          <i class="icon-home"></i> <span>About Us</span> <i class=""></i>
        </a>
      
      </li>
      <li>
        <a href="{{ URL::route('AdminArmourList') }}" class="waves-effect">
          <i class="icon-home"></i> <span>Armour Levels</span> <i class=""></i>
        </a>
      
      </li>
      <!-- <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
          <span>UI Elements</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		  <li><a href="ui-typography.html"><i class="fa fa-circle-o"></i> Typography</a></li>
		  <li><a href="ui-buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
		  <li><a href="ui-cards.html"><i class="fa fa-circle-o"></i> Cards</a></li>
		  <li><a href="ui-checkbox-radio.html"><i class="fa fa-circle-o"></i> Checkboxes & Radios</a></li>
		  <li><a href="ui-tabs-accordions.html"><i class="fa fa-circle-o"></i> Tabs & Accordions</a></li>
		  <li><a href="ui-modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
		  <li><a href="ui-bootstrap-elements.html"><i class="fa fa-circle-o"></i> BS Elements</a></li>
          <li><a href="ui-pagination.html"><i class="fa fa-circle-o"></i> Pagination</a></li>
          <li><a href="ui-list-groups.html"><i class="fa fa-circle-o"></i> List Groups</a></li>
          <li><a href="ui-alerts.html"><i class="fa fa-circle-o"></i> Alerts</a></li>
		  <li><a href="ui-progressbars.html"><i class="fa fa-circle-o"></i> Progress Bars</a></li>
		  <li><a href="ui-notification.html"><i class="fa fa-circle-o"></i> Notifications</a></li>
		  <li><a href="ui-sweet-alert.html"><i class="fa fa-circle-o"></i> Sweet Alerts</a></li>
		  <li><a href="ui-color-palette.html"><i class="fa fa-circle-o"></i> Color Palette</a></li>
		  <li><a href="ui-fancy-lightbox.html"><i class="fa fa-circle-o"></i> Fancy Lightbox</a></li>
        </ul>
      </li>
     
      </li> -->
     
       
    
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top gradient-ibiza">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <!-- <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li> -->
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	    <i class="icon-envelope-open"></i></a>
      <div class="dropdown-menu dropdown-menu-right animated fadeIn">
        <ul class="list-group list-group-flush">
         <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 4 new messages
          <span class="badge badge-danger">4</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="{{ asset('assets/admin/images/avatars/avatar-1.png')}}" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Jhon Deo</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Today, 4:10 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-2.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Sara Jen</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            <small>Yesterday, 8:30 AM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-3.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Dannish Josh</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
             <small>5/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar-4.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-0 msg-title">Katrina Mccoy</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet.</p>
            <small>1/11/2018, 2:50 PM</small>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item"><a href="javaScript:void();">See All Messages</a></li>
        </ul>
        </div>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	  <i class="icon-bell"></i><span class="badge badge-primary badge-up">10</span></a>
      <div class="dropdown-menu dropdown-menu-right animated fadeIn">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 10 Notifications
          <span class="badge badge-primary">10</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="icon-people fa-2x mr-3 text-info"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Registered Users</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="icon-cup fa-2x mr-3 text-warning"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Received Orders</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="icon-bell fa-2x mr-3 text-danger"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Updates</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item"><a href="javaScript:void();">See All Notifications</a></li>
        </ul>
      </div>
    </li>
   
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="{{ asset('assets/admin/images/avatars/avatar-17.png')}}" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right animated fadeIn">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="{{ asset('assets/admin/images/avatars/avatar-17.png')}}" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">Admin</h6>
            <p class="user-subtitle">{{ Auth::user()->email }}</p>
            </div>
           </div>
          </a>
        </li>
       
        <li class="dropdown-divider"></li>
        <a href="{{ URL::route('AdminProfile') }}"><li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li></a>
        <li class="dropdown-divider"></li>
        <a href="{{ URL::route('AdminLogout') }}"><li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
@yield('header')
</header>

    <section id="content">
        @yield('content')
    </section>
    {{--Delete Modal--}}

    <div class="modal modal-danger fade in" id="deleteModal" >
        <div class="modal-dialog">
            <form id="deleteForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Delete Data </h4>
                    </div>
                    <div class="modal-body">
                        <p>Do you want delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="type" id="type">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Delete</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

   
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>


    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 BangoDash Admin
        </div>
      </div>
    </footer>
	<!--End footer-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/admin/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/jquery.validate.min.js') }}" type="text/javascript"> </script>

  <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
	
  <!-- simplebar js -->
  <script src="{{asset('assets/admin/plugins/simplebar/js/simplebar.js')}}"></script>
  <!-- waves effect js -->
  <script src="{{asset('assets/admin/js/waves.js')}}"></script>
  <!-- sidebar-menu js -->
  <script src="{{asset('assets/admin/js/sidebar-menu.js')}}"></script>
  <!-- Custom scripts -->
  <script src="{{asset('assets/admin/js/app-script.js')}}"></script>

  <!-- Index js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.widget.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.iframe-transport/1.0.1/jquery.iframe-transport.js"></script>
  <script type="text/javascript" src="{{ url('assets/admin/js/jquery.fileupload.js') }}"></script>
  @yield('footer')
</body>

</html>

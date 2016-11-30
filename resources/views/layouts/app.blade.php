<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HAU | Event Organizer</title>

    <!-- Bootstrap -->
   <link href="../vendor/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <link href="'../vendor/nnprogress.css'" rel="stylesheet">
    <!-- Custom Theme Style -->
  <link href="{{ asset('vendor/custom.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">

  </head>

  <body class="nav-md">

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href=" " class="site_title"><i class="fa fa-university"></i> <span>Event Organizer</span></a>
            </div>

          

            <!-- menu profile quick info -->
              @if (Auth::guest())
              @else
                <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="{{ asset('/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> {{ Auth::user()->name }}</h2>
              </div>
            </div>
          
            @endif
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            
              <div class="menu_section">
                <h3 style="margin-top:80px;">General</h3>
                <ul class="nav side-menu">
                 @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>                    
                  @else

                    @if(Auth::user()->Department == "DEAN")
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin') }}">View Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Organization <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/organization') }}">Register Organization</a></li>
                    </ul>
                  </li>

                    @elseif(Auth::user()->Department == "OSA")

                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('OSA') }}">View Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Organization <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/organization') }}">Register Organization</a></li>
                    </ul>
                  </li>

                    @elseif(Auth::user()->Department == "CSDO")

                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                      <li><a href="{{ url('/CSDO') }}">Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin') }}">View Events</a></li>
                    </ul>
                  </li>

                    @else

                     <li>
                     <center><a href="{{ url('events/create') }}" class="btn btn-primary btn-block"> Create Event</a></center>
                     </li>

                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('events') }}">Approved Events</a></li>
                      <li><a href="{{ url('pending') }}">Pending Events</a></li>
                    </ul>
                  </li>

                   @endif
                   @endif
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              @if (Auth::guest())
              @else
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('/images/img.jpg') }}" alt="">Hello,  {{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href=" ">Help</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                @endif
              </ul>
            </nav>
          </div>
        </div>


        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
<!--             <div class="page-title">
              <div class="title_left">
                <h3>Contacts Design</h3>
              </div>

      
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix">
              content here
            </div>
 -->
   @yield('content')

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            HAU | Event Organizer
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
    <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <!-- jQuery -->

    <!-- FastClick -->
     <script src="{{ asset('vendor-js/fastclick.js') }}"></script>
    <!-- NProgress -->
       <script src="{{ asset('vendor-js/nprogress.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('vendor-js/custom.min.js') }}"></script>

      @yield('js')
  </body>
</html>
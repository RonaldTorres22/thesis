@if(Auth::guest())
@include('auth/login');
@else
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
              <a href="{{url('/')}}" class="site_title"><i class="fa fa-calendar"></i> <span>Event Organizer</span></a>
            </div>

          

            <!-- menu profile quick info -->
              @if (Auth::guest())
              @else
                <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img style="height:60px; " src="/profpics/{{ Auth::user()->avatar }}" alt="..." class="img-circle profile_img">
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

                    @if(Auth::user()->Department == "ADMIN")
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('pendinglist') }}">Pending Events</a></li>
                      <li><a href="{{ url('admin') }}">View Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Organization <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/organization') }}">Register Organization</a></li>
                    </ul>
                  </li>

                  @elseif(Auth::user()->Department == "DEAN")
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('pendinglist') }}">Pending Events</a></li>
                      <li><a href="{{ url('admin') }}">View Events</a></li>
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
                      <li><a href="{{ url('OSA') }}">Pending Events</a></li>
                      <li><a href="{{ url('approvelist') }}">Approved Events</a></li>
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
                      <li><a href="{{ url('/CSDO') }}">Events Wall</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin') }}">View Events</a></li>
                    </ul>
                  </li>

                    @elseif(Auth::user()->Department == "VPAA")

                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                      <li><a href="{{ url('/CSDO') }}">Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-envelope"></i> Letters <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('vpaa') }}">Pending Letters</a></li>
                      <li><a href="{{ url('approvedletters') }}">Approved Letters</a></li>
                      <li><a href="{{ url('disapprovedletters') }}">Disapproved Letters</a></li>
                    </ul>
                  </li>

                   @elseif(!empty(Auth::user()->acc_id))

                     <li>
                     <center><a href="{{ url('CreateEvent') }}" class="btn btn-primary btn-block"> Create Event</a></center>
                     </li>

                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/') }}">Callendar of Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('approveevents') }}">Approved Events</a></li>
                      <li><a href="{{ url('pendingevents') }}">Pending Events</a></li>
                      <li><a href="{{ url('disapprovedevents') }}">Disapproved Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-tasks"></i>Tasks<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{ url('tasks') }}">Create Tasks</a></li>
             
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

                  <li><a><i class="fa fa-user-o"></i>Register Account<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('accounts') }}">Add Account</a></li>
                    </ul>
                  </li>
           

                  <li><a><i class="fa fa-edit"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('events') }}">Approved Events</a></li>
                      <li><a href="{{ url('pending') }}">Pending Events</a></li>
                      <li><a href="{{ url('disapproved') }}">Disapproved Events</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-tasks"></i>Tasks<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{ url('task') }}">Create Tasks</a></li>
             
                    </ul>
                  </li>
                   @endif
        
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="{{url('settings/'. Auth::user()->id )}}" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a  href ="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Logout">
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
  
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/profpics/{{ Auth::user()->avatar }}" alt="">Hello,  {{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{url('settings/'. Auth::user()->id )}} "><i class="fa fa-cog pull-right"></i>Account Settings</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;"  id="btn-notification" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                      @if(Auth::user()->Department == "DEAN")
                    <span class="badge bg-green" id="notification-count">{{Auth::user()->dean()->count()}}</span>
                    @elseif(Auth::user()->Department =="OSA")
                    <span class="badge bg-green" id="notification-count">{{Auth::user()->osa()->count()}}</span>
                    @elseif(Auth::user()->Department =="CSDO")
                     <span class="badge bg-green" id="notification-count">0</span>
                    @elseif(Auth::user()->Department =="EMAN")
                    <span class="badge bg-green" id="notification-count">0</span>
                    @elseif(Auth::user()->Department =="VPAA")  
                    <span class="badge bg-green" id="notification-count">{{Auth::user()->vpaa()->count()}}</span>
                    @else  
                    <span class="badge bg-green" id="notification-count">{{Auth::user()->orgNotif()->count()}}</span>  
                    @endif       
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                   @if(Auth::user()->Department == "DEAN")
                  @foreach(Auth::user()->alleventdean() as $notifications)
                    <li>
                      <a href="{{url('admin/'.$notifications->id)}}">
                        <span class="image"><img style="width:35px; height:35px; " src="/profpics/{{ $notifications->user->avatar }}" alt="Profile Image" /></span>
                        <span>  
                          <span>{{$notifications->name}}</span>
                          <span class="time"><span style="color:blue; font-size:17px;" class="glyphicon glyphicon-calendar"></span></span>
                        </span>
                        <span class="message">
                         <p>New Event Has been Created!</p>
                         <p>Event Name: <b>{{$notifications->title}}</b></p>
                        </span>
                      </a>
                    </li>
                  @endforeach
                  @elseif(Auth::user()->Department == "OSA")
                  @foreach(Auth::user()->alleventosa() as $notifications)
                    <li>
                      <a href="{{url('OSA/'.$notifications->id)}}">
                        <span class="image"><img style="width:35px; height:35px; " src="/profpics/{{ $notifications->user->avatar }}" alt="Profile Image" /></span>
                        <span>
                          <span>{{$notifications->name}}</span>
                          <span class="time"></span>
                        </span>
                        <span class="message">
                         <p>New Event Has been Created!</p>
                         <p>Event Name: <b>{{$notifications->title}}</b></p>
                        </span>
                      </a>
                    </li>
                  @endforeach
                  @elseif(Auth::user()->Department == "VPAA")
                  @foreach(Auth::user()->alleventvpaa() as $notifications)
                    <li>
                      <a href="{{url('vpaa/'.$notifications->eventletter->id)}}">
                        <span class="image"><img style="width:35px; height:35px; " src="/profpics/{{ $notifications->eventletter->user->avatar }}" alt="Profile Image" /></span>
                        <span>
                          <span>{{$notifications->eventletter->name}}</span>
                          <span class="time"></span>
                        </span>
                        <span class="message">
                         <p>New Request Letter Has been Created!</p>
                         <p>Event Name: <b>{{$notifications->eventletter->title}}</b></p>
                        </span>
                      </a>
                    </li>
                  @endforeach
                  @else
                  @foreach(Auth::user()->orgs() as $notifications)
                    @if($notifications->status == "approved")
                    <li>
                      <a href="{{url('events/'.$notifications->id)}}">
                        <span style="color:blue; font-size:20px;" class="glyphicon glyphicon-calendar"></span>
                        <span>
                          <span><b style="margin-left:10px;">{{$notifications->title}}</b></span>
                          <span class="time"><span  style="color:green; font-size:17px;" class="glyphicon glyphicon-ok-circle"></span></span>
                        </span>
                        <span class="message">
                         <p>the event has been approved</p>
                        </span>
                      </a>
                    </li>
                    @elseif($notifications->status == "Disapproved")
                     <li>
                      <a href="{{url('events/'.$notifications->id)}}">
                       <span style="color:red; font-size:20px;" class="glyphicon glyphicon-calendar"></span>
                        <span>
                          <span><b style="margin-left:10px;">{{$notifications->title}}</b></span></span>
                          <span class="time"><span style= "color:red; font-size:17px;" class="glyphicon glyphicon-remove-circle"></span></span>
                        </span>
                        <span class="message">
                         <p>the event has been Disapproved</p>
                        </span>
                      </a>
                    </li>
                    @endif
                  @endforeach
{{--                    @foreach(Auth::user()->disapproved() as $notifications)
                    <li>
                      <a href="{{url('events/'.$notifications->id)}}">
                       <span style="color:red; font-size:20px;" class="glyphicon glyphicon-calendar"></span>
                        <span>
                          <span><b style="margin-left:10px;">{{$notifications->title}}</b></span></span>
                          <span class="time"><span style= "color:red; font-size:17px;" class="glyphicon glyphicon-remove-circle"></span></span>
                        </span>
                        <span class="message">
                         <p>the event has been Disapproved</p>
                        </span>
                      </a>
                    </li>
                  @endforeach --}}
                  @endif
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
           
              </ul>
            </nav>
          </div>
        </div>


        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="clearfix">
              @yield('content')
            </div>



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

    @if(Auth::user()->Department == "DEAN")
        <script>
      $(document).ready(function(){
        var urlDelTodo = "{{url('notification/')}}";
        var notificationcount = $("#notification-count");
        var btnnotifictaion = $("#btn-notification");
        btnnotifictaion.click(function(e){
        e.preventDefault();
        
        notificationcount.empty();
        notificationcount.text('0');

          $.ajax({
              data: 'a=b',
              url: urlDelTodo,
              type: 'GET'
                })
            .done(function(output){


            });
        });
        
      });
    </script>
    @endif

    @if(Auth::user()->Department == "VPAA")
        <script>
      $(document).ready(function(){
        var urlDelTodo = "{{url('notificationVpaa/')}}";
        var notificationcount = $("#notification-count");
        var btnnotifictaion = $("#btn-notification");
        btnnotifictaion.click(function(e){
        e.preventDefault();
        
        notificationcount.empty();
        notificationcount.text('0');

          $.ajax({
              data: 'a=b',
              url: urlDelTodo,
              type: 'GET'
                })
            .done(function(output){


            });
        });
        
      });
    </script>
    @endif

    @if(Auth::user()->Department == "OSA")
        <script>
      $(document).ready(function(){
        var urlDelTodo = "{{url('notificationOsa/')}}";
        var notificationcount = $("#notification-count");
        var btnnotifictaion = $("#btn-notification");
        btnnotifictaion.click(function(e){
        e.preventDefault();
        
        notificationcount.empty();
        notificationcount.text('0');

          $.ajax({
              data: 'a=b',
              url: urlDelTodo,
              type: 'GET'
                })
            .done(function(output){


            });
        });
        
      });
    </script>

    @else
            <script>
      $(document).ready(function(){
        var urlDelTodo = "{{url('notificationUser/')}}";
        var notificationcount = $("#notification-count");
        var btnnotifictaion = $("#btn-notification");
        btnnotifictaion.click(function(e){
        e.preventDefault();
        
        notificationcount.empty();
        notificationcount.text('0');

          $.ajax({
              data: 'a=b',
              url: urlDelTodo,
              type: 'GET'
                })
            .done(function(output){


            });
        });
        
      });
    </script>
    @endif
      @yield('js')
  </body>
</html>

@endif
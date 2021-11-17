<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php 
        $setting = \App\Models\Setting::first();
    @endphp
    <title>{{ $setting->title }} | DashBoard Control Panel</title>
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
    @if($setting)
    <link rel="shortcut icon" href="{{ asset('../storage/app/public/'. $setting->favicon) }}" type="image/png">
    @endif

    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('backend/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    @yield('css')
</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle float-left" href="#">
                            <span class="block m-t-xs font-bold">{{ auth()->user()->name }}</span>
                            <span class="text-muted text-xs block">Director <b class="caret"></b></span>
                        </a>
                        {{-- <img alt="image" class="rounded-circle float-right" src="" style="height: 45px;"> --}}

                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="{{ route('admin.profile',Auth::user()->id) }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.all') }}">All Admin</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        DoctorEbari
                    </div>
                </li>
                <li class="@if(URL::current() == route('admin.dashboard')) active @endif">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>

                {{-- Appoint Booking Nav --}}
                <li class="@if(URL::current() == route('list.appointment') || URL::current() == route('new.appointment') || URL::current() == route('confirm.list.appointment') || URL::current() == route('pending.list.appointment') || URL::current() == route('currentmonth.list.appointment') || URL::current() == route('yearly.list.appointment')) active @endif">
                    <a href="#"><i class="fa fa-ticket"></i> <span class="nav-label">Appointment</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('pending.list.appointment') }}">Pending Appointment</a></li>
                        <li><a href="{{ route('confirm.list.appointment') }}">Confirm Appointment</a></li>
                        <li><a href="{{ route('list.appointment') }}">Appointment List</a></li>
                        <li><a href="{{ route('currentmonth.list.appointment') }}">Current Month List</a></li>
                        <li><a href="{{ route('yearly.list.appointment') }}">Yearly List</a></li>
                        <li><a href="{{ route('new.appointment') }}">New Appointment</a></li>
                    </ul>
                </li>

                {{-- Doctor Nav --}}
                <li class="@if(URL::current() == route('list.doctor') || URL::current() == route('new.doctor') || URL::current() == route('active.list.doctor') || URL::current() == route('deactive.list.doctor')) active @endif">
                    <a href="#"><i class="fa fa-user-md"></i> <span class="nav-label">Doctors</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.doctor') }}">Doctor List</a></li>
                        <li><a href="{{ route('active.list.doctor') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.doctor') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.doctor') }}">New Doctor</a></li>
                    </ul>
                </li>

                {{-- Department Nav --}}
                <li class="@if(URL::current() == route('list.department')) active @endif">
                    <a href="{{ route('list.department') }}"><i class="fa fa-building-o"></i> <span class="nav-label">Department</span></a>
                </li>

                {{-- Hospital Nav --}}
                <li class="@if(URL::current() == route('list.hospital') || URL::current() == route('new.hospital') || URL::current() == route('active.list.hospital') || URL::current() == route('deactive.list.hospital')) active @endif">
                    <a href="#"><i class="fa fa-hospital-o"></i> <span class="nav-label">Hospitals</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.hospital') }}">Hospital List</a></li>
                        <li><a href="{{ route('active.list.hospital') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.hospital') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.hospital') }}">New Hospital</a></li>
                    </ul>
                </li>

                {{-- Diagnostic Nav --}}
                <li class="@if(URL::current() == route('list.diagnostic') || URL::current() == route('new.diagnostic') || URL::current() == route('active.list.diagnostic') || URL::current() == route('deactive.list.diagnostic')) active @endif">
                    <a href="#"><i class="fa fa-medkit"></i> <span class="nav-label">Diagnostics</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.diagnostic') }}">Diagnostic List</a></li>
                        <li><a href="{{ route('active.list.diagnostic') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.diagnostic') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.diagnostic') }}">New Diagnostic</a></li>
                    </ul>
                </li>

                {{-- Ambulance Nav --}}
                <li class="@if(URL::current() == route('list.ambulance') || URL::current() == route('new.ambulance') || URL::current() == route('active.list.ambulance') || URL::current() == route('deactive.list.ambulance')) active @endif">
                    <a href="#"><i class="fa fa-ambulance"></i> <span class="nav-label">Ambulances</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.ambulance') }}">Ambulance List</a></li>
                        <li><a href="{{ route('active.list.ambulance') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.ambulance') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.ambulance') }}">New Ambulance</a></li>
                    </ul>
                </li>

                {{-- Social Organize Nav --}}
                <li class="@if(URL::current() == route('list.social') || URL::current() == route('new.social') || URL::current() == route('active.list.social') || URL::current() == route('deactive.list.social')) active @endif">
                    <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Social Organizes</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.social') }}">Social Organize List</a></li>
                        <li><a href="{{ route('active.list.social') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.social') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.social') }}">New Social Organize</a></li>
                    </ul>
                </li>

                {{-- Blog Post Nav --}}
                <li class="@if(URL::current() == route('new.post') || URL::current() == route('list.post') || URL::current() == route('new.post') || URL::current() == route('active.list.post') || URL::current() == route('deactive.list.post') || URL::current() == route('list.category')) active @endif">
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Blog</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('new.post') }}">New Post</a></li>
                        <li><a href="{{ route('list.post') }}">Post List</a></li>
                        <li><a href="{{ route('active.list.post') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.post') }}">Deactive List</a></li>
                        <li><a href="{{ route('list.category') }}">Blog Category</a></li>
                    </ul>
                </li>

                {{-- Our Shop Nav --}}
                <li class="@if(URL::current() == route('list.product') || URL::current() == route('new.product') || URL::current() == route('active.list.product') || URL::current() == route('deactive.list.product')) active @endif">
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Our Shop</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.product') }}">Product List</a></li>
                        <li><a href="{{ route('active.list.product') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.product') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.product') }}">New Product</a></li>
                    </ul>
                </li>

                {{-- Staff Nav --}}
                <li class="@if(URL::current() == route('list.staff') || URL::current() == route('new.staff') || URL::current() == route('active.list.staff') || URL::current() == route('deactive.list.staff')) active @endif">
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Staff</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.staff') }}">Staff List</a></li>
                        <li><a href="{{ route('active.list.staff') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.staff') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.staff') }}">New Staff</a></li>
                    </ul>
                </li>

                {{-- Our Client Review Nav --}}
                <li class="@if(URL::current() == route('list.client') || URL::current() == route('new.client') || URL::current() == route('active.list.client') || URL::current() == route('deactive.list.client')) active @endif">
                    <a href="#"><i class="fa fa-wheelchair"></i> <span class="nav-label">Client Review</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.client') }}">Review List</a></li>
                        <li><a href="{{ route('active.list.client') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.client') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.client') }}">New Review</a></li>
                    </ul>
                </li>

                {{-- Gallery Nav --}}
                <li class="@if(URL::current() == route('list.gallery') || URL::current() == route('new.gallery') || URL::current() == route('active.list.gallery') || URL::current() == route('deactive.list.gallery')) active @endif">
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.gallery') }}">Gallery List</a></li>
                        <li><a href="{{ route('active.list.gallery') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.gallery') }}">Deactive List</a></li>
                        <li><a href="{{ route('new.gallery') }}">New Gallery Photo</a></li>
                    </ul>
                </li>
                {{-- Advertise Nav --}}
                <li class="@if(URL::current() == route('list.advertise') || URL::current() == route('new.advertise') || URL::current() == route('active.list.advertise') || URL::current() == route('deactive.list.advertise')) active @endif">
                    <a href="{{ route('new.advertise') }}"><i class="fa fa-picture-o"></i> <span class="nav-label">Advertise Manage</span></a>
                   {{--  <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.advertise') }}">Advertise List</a></li>
                        <li><a href="{{ route('active.list.advertise') }}">Active List</a></li>
                        <li><a href="{{ route('deactive.list.advertise') }}">Deactive List</a></li>
                        <li><a href="">New Advertise Add</a></li>
                    </ul> --}}
                </li>

                {{-- Division Nav --}}
                <li class="@if(URL::current() == route('list.division') || URL::current() == route('create.division')) active @endif">
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Division</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.division') }}">Division List</a></li>
                        <li><a href="{{ route('create.division') }}">New Division</a></li>
                    </ul>
                </li>
                {{-- District Nav --}}
                <li class="@if(URL::current() == route('list.district') || URL::current() == route('create.district')) active @endif">
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">District</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.district') }}">District List</a></li>
                        <li><a href="{{ route('create.district') }}">New District</a></li>
                    </ul>
                </li>
                {{-- Upzila Nav --}}
                <li class="@if(URL::current() == route('list.upzila') || URL::current() == route('create.upzila')) active @endif">
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Upzila</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('list.upzila') }}">Upzila List</a></li>
                        <li><a href="{{ route('create.upzila') }}">New Upzila</a></li>
                    </ul>
                </li>
                {{-- Slider Nav --}}
                <li class="@if(URL::current() == route('new.slider') || URL::current() == route('list.slider')) active @endif">
                    <a href="{{ route('new.slider') }}"><i class="fa fa-paperclip"></i> <span class="nav-label">Slider Managment</span></a>
                </li>
                {{-- Contact Nav --}}
                <li class="@if(URL::current() == route('messages')) active @endif">
                    <a href="{{ route('messages') }}"><i class="fa fa-cog"></i> <span class="nav-label">Messages</span></a>
                </li>

                {{-- Setting Nav --}}
                <li class="@if(URL::current() == route('setting')) active @endif">
                    <a href="{{ route('setting') }}"><i class="fa fa-cog"></i> <span class="nav-label">Setting</span></a>
                </li>


                {{-- <li>
                    <a href="#"><i class="fa fa-usd"></i> <span class="nav-label">Salary</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="">Pay Salary</a></li>
                        <li><a href="">Last Month Salary</a></li>
                        <li><a href="">All Salary</a></li>
                        <li>
                            <a href="#">Advance Salary<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="">Pay Advance Salary</a></li>
                                <li><a href="">All Advance Salary</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    {{-- <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form> --}}
                    <a class="minimalize-styl-2 btn btn-primary " href="{{ url('/') }}" target="_blank"> <i class="fa fa-home"></i> View Site </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome To {{ $setting->title }} Management System.</span>
                    </li>


                    <li>
                        <a class="text-info" href="{{ route('logout') }}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <li>
                        {{-- <a class="right-sidebar-toggle">
                            <i class="fa fa-tasks"></i>
                        </a> --}}
                    </li>
                </ul>

            </nav>
        </div>

        @yield('content')

        <div class="footer" id="print-none">
            <div class="float-right">
                <a href="#"><strong>Web Warriors</strong></a>
            </div>
            <div>
                <strong>Copyright</strong> Web Warriors &copy; {{ date('Y') }}
            </div>
        </div>
    </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('backend/js/toastr.js') }}"></script>
    <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{ asset('backend/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/flot/jquery.flot.time.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('backend/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('backend/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('backend/js/inspinia.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- EayPIE -->
    <script src="{{ asset('backend/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('backend/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    @yield('js')

    <script>
        //Toastr Notification
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                  toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
            }
        @endif

        //Delete Alert
        $(document).on("click","#delete", function(e){
          e.preventDefault();
          var link = $(this).attr("href");
            swal({
              title: "Are you sure?",
              text: "Delete for everytime!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = link;
              } else {
                swal("Your file is safe!");
              }
            });
        });

    </script>
    <script>
        $('.my-select').selectpicker();
    </script>
</body>
</html>

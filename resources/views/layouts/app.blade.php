@php
    $setting = App\Models\Setting::first();
    $departments = App\Models\Department::all();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Primary Meta Tags -->
    <title>@yield('title')</title>
    <meta name="title" content="@yield('meta-title')">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta property="image" content="@yield('meta-image')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og-title')">
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:image" content="@yield('og-image')">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="@yield('twitter-title')">
    <meta property="twitter:description" content="@yield('twitter-description')">
    <meta property="twitter:image" content="@yield('twitter-image')">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @if($setting)
    <link rel="shortcut icon" href="{{ asset('../storage/app/public/'. $setting->favicon) }}" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('../storage/app/public/'. $setting->favicon) }}" />
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('../storage/app/public/'. $setting->favicon) }}" />
    @endif
    
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/front/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/front/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('/front/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('/front/css/jquery.timepicker.css')}}">
    
    <link rel="stylesheet" href="{{ asset('/front/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/front/css/toastr.min.css')}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-185931277-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-185931277-1');
    </script>
    
    <!--Google Adsense Code-->
    <script data-ad-client="ca-pub-8964117061465077" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>
<body>
    <div class="py-3">
        <div class="container">
            <div class="row d-flex align-items-start align-items-center px-3 px-md-0">
                <div class="col-md-4 d-flex mb-2 mb-md-0">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">@if($setting)<span><img class="mr-2" src="{{ asset('../storage/app/public/'.$setting->logo) }}" alt="{{ $setting->title }}" height="68" width="65"></span><span class="text-success">{{ $setting->title }}</span> @endif</a>
                </div>
                <!--div class="col-md-3 d-flex topper mb-md-0 mb-2 align-items-center" style="padding-right:0px; padding-left:0px; ">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="fa fa-map"></span>
                    </div>
                    <div class="pr-md-4 pl-md-3 pl-3 text">
                        <a @if($setting) href="tel:{{ $setting->phone }}" @else href="#" @endif><p class="con"><span>Free Call</span> <span> @if($setting) {{ $setting->phone }} @endif</span></p></a>
                        <p class="con">Call Us Now 24/7 Customer Support</p>
                    </div>
                </div-->
                <div class="col-md-6 d-flex topper mb-md-0 align-items-center">
                    <a href="">
                    <div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-paper-plane"></span>
                    </div>
                    </a>
                    <div class="text pl-3 pl-md-3">
                        <a href="{{ route('home') }}#appointmentForm">
                        <p class="hr"><span>Appointment Doctor's</span></p></a>
                        <a href="{{ route('home') }}#appointmentForm">
                        <p class="con">For our doctor appointment</p></a>
                    </div>
                </div>
                
                <div class="col-md-2 d-flex topper mb-md-0 align-items-center" style="padding-right:0px; padding-left:0px; ">
                     <ul class="ftco-footer-social list-unstyled mt-4">
                        @if($setting)
                        <li><a href="{{ $setting->twitter_link }}" style=" background:#c7c5db; border-radius:5px;"><span class="fa fa-twitter" style="color:#1a2f6b !important;"></span></a></li>
                        <li><a href="{{ $setting->fb_link }}" style=" background:#bbc1d4; border-radius:5px;"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="{{ $setting->instagram_link }}" style=" background:#dfcbdd; border-radius:5px;"><span class="fa fa-instagram" style="color:#751c5f !important"></span></a></li>
                        <li><a href="{{ $setting->youtube_link }}" style=" background:#d4bfbf; border-radius:5px;"><span class="fa fa-youtube" style="color:#dc293a !important;"></span></a></li>
                        @endif
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
        <div class="top">
        <div class="">
            <div class="row" style="margin-right: 0px; color:#fff;  background-color:#0f4667;">
                <div class="col-sm-12 d-flex topper align-items-center justify-content-start">
                    <p class="mb-0 bg-success text-center" style="width:175px; height:100%; line-height:200%;"><span>Update News</span></p>
                    <marquee direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()" style="font-family: 'Kalpurush', sans-serif;"> @if($setting) {{ $setting->notice }} @endif</marquee>
                    @guest
                   
                    @else
                    @if(Auth::user()->is_admin== 1)
                    <p class="mb-0"><a target="_blank" href="{{ url('/dashboard') }}" class="btn btn-primary px-5">Dashboard</a></p>
                    @endif

                    <p class="mb-0"><a href="{{ route('logout') }}" class="btn btn-primary px-5">Logout</a></p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item @if(URL::current() == route('home')) active @endif"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item @if(URL::current() == route('all.doctors')) active @endif"><a href="{{ route('all.doctors') }}" class="nav-link">Doctors</a></li>
                    <li class="nav-item @if(URL::current() == route('all.diagnostics')) active @endif"><a href="{{ route('all.diagnostics') }}" class="nav-link">Diagnostic</a></li>
                    <li class="nav-item @if(URL::current() == route('all.hospitals')) active @endif"><a href="{{ route('all.hospitals') }}" class="nav-link">Hospital</a></li>
                    <li class="nav-item @if(URL::current() == route('our.services')) active @endif"><a href="{{ route('our.services') }}" class="nav-link">Our Services</a></li>
                    <li class="nav-item @if(URL::current() == route('all.shops')) active @endif"><a href="{{ route('all.shops') }}" class="nav-link">Our Shop</a></li>
                    <li class="nav-item @if(URL::current() == route('blog.posts')) active @endif"><a href="{{ route('blog.posts') }}" class="nav-link">Blog </a></li>
                    <li class="nav-item @if(URL::current() == route('galleries')) active @endif"><a href="{{ route('galleries') }}" class="nav-link">Gallery</a></li>
                    <li class="nav-item @if(URL::current() == route('about')) active @endif"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                    <li class="nav-item @if(URL::current() == route('contact')) active @endif"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->


    <!-- ===================== Content Section =================== -->
    @yield('content')
    <!-- ===================== Content Section =================== -->




    <footer class="ftco-footer">
        <div class="container mb-5 pb-4">
            <div class="row">
                <div class="col-lg col-md-6">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2 logo d-flex align-items-center"><a href="{{ url('/') }}">@if($setting) <span><img class="mr-1" src="{{ asset('../storage/app/public/'.$setting->logo) }}" alt="{{ $setting->title }}" height="55" width="55"></span><span class="text-primary"> {{ $setting->title }}</span> @endif</a></h2>
                        <p> @if($setting) {{ Str::words($setting->meta_description, 20, '..') }} @endif</p>
                        <ul class="ftco-footer-social list-unstyled mt-4">
                             @if($setting)
                            <li><a href="{{ $setting->twitter_link }}"><span class="fa fa-twitter text-white"></span></a></li>
                            <li><a href="{{ $setting->fb_link }}"><span class="fa fa-facebook text-white"></span></a></li>
                            <li><a href="{{ $setting->instagram_link }}"><span class="fa fa-instagram text-white"></span></a></li>
                            <li><a href="{{ $setting->youtube_link }}"><span class="fa fa-youtube text-white"></span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @php
                    $departments = App\Models\Department::limit(5)->get();
                @endphp
                <div class="col-lg col-md-6">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2">Department</h2>
                        <ul class="list-unstyled">
                            @foreach($departments as $department)
                            <li><a href="{{ route('department.doctors',$department->slug) }}"><span class="fa fa-chevron-right mr-2"></span>{{ $department->name }}</a></li>
                            @endforeach
                            <li><a href="https://doctorebari.com/doctors"><span class="fa fa-chevron-right mr-2"></span>See More</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg col-md-6">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
                            <li><a href="{{ route('all.doctors') }}"><span class="fa fa-chevron-right mr-2"></span>Doctors</a></li>
                            <li><a href="{{ route('our.services') }}"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
                            <li><a href="{{ route('all.shops') }}"><span class="fa fa-chevron-right mr-2"></span>Medical Shop</a></li>
                            <li><a href="{{ route('blog.posts') }}"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                            <li><a href="{{ route('all.hospitals') }}"><span class="fa fa-chevron-right mr-2"></span>Hospital</a></li>
                            <li><a href="{{ route('galleries') }}"><span class="fa fa-chevron-right mr-2"></span>Gallery</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg col-md-6">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2">Services & Policy</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('all.ambulances') }}"><span class="fa fa-chevron-right mr-2"></span>Ambulance Service</a></li>
                            <li><a href="{{ route('all.shops') }}"><span class="fa fa-chevron-right mr-2"></span>Medical Shop</a></li>
                            <li><a href="{{ route('all.diagnostics') }}"><span class="fa fa-chevron-right mr-2"></span>Diagnostic Center</a></li>
                            <li><a href="{{ route('all.organizes') }}"><span class="fa fa-chevron-right mr-2"></span>Social Organizes</a></li>
                            <li><a href="{{ route('all.hospitals') }}"><span class="fa fa-chevron-right mr-2"></span>Hospitals</a></li>
                            <li><a href="{{ route('terms') }}"><span class="fa fa-chevron-right mr-2"></span>Terms & Condition</a></li>
                            <li><a href="{{ route('privacy') }}"><span class="fa fa-chevron-right mr-2"></span>Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg col-md-6">
                    <div class="ftco-footer-widget">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul> @if($setting)
                                <li><span class="fa fa-map-marker mr-3"></span><span class="text">{{$setting->address}}</span></li>
                                <li><a href="tel:{{ $setting->phone }}"><span class="fa fa-phone mr-3"></span><span class="text">{{ $setting->hotline }}</span></a></li>
                                <li><a href="mailto:{{ $setting->email }}"><span class="fa fa-paper-plane mr-3"></span><span class="text">{{ $setting->email }}</span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-primary py-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    
                    <p class="mb-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://doctorebari.com/about" target="_blank">DoctorEbari</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <a class="d-none" href="https://www.storialtech.com" target="_blank">DoctorEbari</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="107234407843289"
  logged_in_greeting="যে কোন ডাক্তারি তথ্য ও সহায়তার জন্য আমাদের সাথে সরাসরি যোগাযোগ করুন।"
  logged_out_greeting="যে কোন ডাক্তারি তথ্য ও সহায়তার জন্য আমাদের সাথে সরাসরি যোগাযোগ করুন।">
      </div>

        <!-- loader -->
        <!--<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>-->

        <script src="{{ asset('/front/js/jquery.min.js')}}"></script>
        <script src="{{ asset('/front/js/jquery-migrate-3.0.1.min.js')}}"></script>
        <script src="{{ asset('/front/js/popper.min.js')}}"></script>
        <script src="{{ asset('/front/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/front/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{ asset('/front/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('/front/js/jquery.stellar.min.js')}}"></script>
        <script src="{{ asset('/front/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('/front/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('/front/js/jquery.animateNumber.min.js')}}"></script>
        <script src="{{ asset('/front/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{ asset('/front/js/jquery.timepicker.min.js')}}"></script>
        <script src="{{ asset('/front/js/scrollax.min.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('/front/js/google-map.js') }}"></script>

        <script src="{{ asset('/front/js/main.js')}}"></script>
        <script src="{{ asset('/front/js/toastr.js')}}"></script>
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
        </script>

        <script>
             $(document).ready(function(){
        $('select[name="division_id"]').on('change',function(){
            var division_id = $(this).val();
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'{{ url("/fetch-district/") }}/'+division_id,
                success:function(data){
                     var d = $('select[name = "district_id"]').empty();
                $('select[name = "district_id"]').append('<option value="" disabled selected>select district</option>');
                   $.each(data, function(key, value){
                    $('select[name = "district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                    });
                    
                },
            });
        })

        $('select[name="district_id"]').on('change',function(){
            var district_id = $(this).val();
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'{{ url("/fetch-upzila/") }}/'+district_id,
                success:function(data){
                     var d = $('select[name = "upzila_id"]').empty();
                     $('select[name = "upzila_id"]').append('<option value="" disabled selected>select upzila</option>');
                   $.each(data, function(key, value){
                    $('select[name = "upzila_id"]').append('<option value="'+value.id+'">'+value.upzila_name+'</option>');
                    });
                    
                },
            });
        })
    })
        </script>
    

</body>
</html>
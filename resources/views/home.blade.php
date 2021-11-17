@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $setting->title . ' - Get Doctor Appointment & Services')
@section('meta-title',  $setting->title . ' - Get Doctor Appointment & Services')
@section('meta-description', $setting->meta_description)
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', $setting->title . ' - Get Doctor Appointment & Services')
@section('og-description', $setting->meta_description)
@section('twitter-title',  $setting->title . ' - Get Doctor Appointment & Services')
@section('twitter-description', $setting->meta_description)
@section('meta-image', asset('../storage/app/public/'.$setting->cover_image))
@section('og-image', asset('../storage/app/public/'.$setting->cover_image))
@section('twitter-image', asset('../storage/app/public/'.$setting->cover_image))

@extends('layouts.app')

@section('content')

<!-- SLIDER SECTION START -->
@if($slider)
<section class="ftco-facts img ftco-counter" style="background-image: url({{ asset('../storage/app/public/'.$slider->image) }}); background-image: no-repeat; width:100%; height:500px;" >
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
            <div class="col-lg-6 ftco-animate">
                <div class="mt-5">
                    <h1 class="mb-2 text-success">{{ $slider->title }}</h1>
                    <p class="mb-4 text-primary font-weight-bold" style="font-size:18px;">{{ $slider->details }}</p>
                    <div class="row">
                        <div class="col-md-7 col-lg-10">
                            <form action="{{ route('search') }}" class="appointment-form-intro ftco-animate">
                                <div class="d-flex">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <input type="search" name="search" placeholder="Doctor & Services" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Search" class="btn-custom form-control py-3 px-4">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- SLIDER SECTION END -->
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our Qualified Doctors</h2>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-8 col-lg-9 row ftco-animate">
                    @foreach($homedoctors as $doctor)
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="staff">
                          <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$doctor->image) }})"></div>
                          </div>
                          <div class="text text-center">
                            <a href="{{ route('doctor.details',$doctor->slug) }}"><h3 style="height:50px;" class="mb-2">{{ $doctor->name }}</h3>
                            <small style="color:black;font-weight:bold;">{{ $doctor->sur_name }}</small>
                            </a>
                            <span class="position mb-2">{{ $doctor->department->name }}</span>
                            <span class="position mb-2">District : {{ $doctor->district->district_name }}</span>
                            <div class="faded">
                                <div style="height:60px;">
                                    <p>{!! Str::limit(str_replace($replace, ' ', $doctor->description),'40','...') !!}</p>
                                </div>
                                <div style="margin-top:20px;">
                                    @if($doctor->sms_status == 1)
                                    <a href="{{ route('book_now',$doctor->slug) }}" class="btn btn-block btn-success" style="background: #3bc053;border-color: #3bc053;">Booking Now</a>
                                    <a href="tel:{{ $doctor->hotline }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Call Now</a>
                                    @else
                                    <a href="{{ route('doctor.details',$doctor->slug) }}" class="btn btn-block btn-success" style="background: #3bc053;border-color: #3bc053;">Details</a>
                                    <a href="{{ route('doctor.details',$doctor->slug) }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">More Info</a>
                                    @endif
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-3 img ftco-counter" style=" height:700px;" >
                    @if($advertise)
                    <a href="{{ $advertise->image1_link }}" target="_blank">
                    <img src="{{ asset('../storage/app/public/'.$advertise->image1) }}" style="height: 100%; width: 100%;" alt="Advertise Image">
                    </a>
                    @endif
                </div>

            </div>
        </div>
    </section>
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-7 py-2">
                <div class="py-lg-5">
                    <div class="row justify-content-center pb-2">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-3">Welcome to <span> @if($setting) {{ $setting->title }} @endif</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12 col-lg-6 ftco-animate">
                            <div class="media block-6 services">
                                <a href="{{ route('all.doctors') }}"><div class="icon d-block align-items-center"><span class="fa fa-user-md"></span></div>
                                <div class="media-body">
                                <h3 class="heading mb-1">Doctor</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place </p>
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-md-12 col-lg-6 ftco-animate">
                            <div class="media block-6 services">
                                <a href="{{ route('all.ambulances') }}"><div class="icon d-block align-items-center"><span class="fa fa-ambulance"></span></div>
                                <div class="media-body">
                                <h3 class="heading mb-1">Ambulance Service</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.diagnostics') }}"><div class="icon d-block align-items-center"><span class="fa fa-wheelchair-alt"></span></div>
                            <div class="media-body">
                            <h3 class="heading mb-1">Diagnostic</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 ftco-animate">
                    <div class="media block-6 services">
                        <a href="{{ route('all.organizes') }}"><div class="icon d-block align-items-center"><span class="fa fa-university"></span></div>
                        <div class="media-body">
                        <h3 class="heading mb-1">Social Organizes</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 ftco-animate">
                <div class="media block-6 services">
                    <a href="{{ route('all.shops') }}"><div class="icon d-block align-items-center"><span class="fa fa-shopping-cart"></span></div>
                    <div class="media-body">
                    <h3 class="heading mb-1">Shop</a></h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 ftco-animate">
            <div class="media block-6 services">
                <a href="{{ route('all.hospitals') }}"><div class="icon d-block align-items-center"><span class="fa fa-hospital-o"></span></div>
                <div class="media-body">
                <h3 class="heading mb-1">Hospital</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
                
    <div class="col-md-5 d-flex">
        <div class="appointment-wrap p-4 p-lg-5 d-flex align-items-center" id="appointmentForm">
            <form action="{{ route('book_now.thisdoctor') }}" method="POST" enctype="multipart/form-data" class="appointment-form ftco-animate">
                @csrf
                <h3>Appointment Form</h3>
                <div class="">
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Patient Name (রোগীর নাম)*" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" placeholder="Age (বয়স)*" required>
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone (মোবাইল নাম্বার)*" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email (ই-মেইল)* (Optional)">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <div class="form-field">
                            <div class="select-wrap">
                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                <select name="department_id" id="" class="form-control @error('department_id') is-invalid @enderror" value="{{ old('department_id') }}" required>
                                    <option value="">select department</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->department_id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-field">
                            <div class="select-wrap">
                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                <select name="doc_id" id="" class="form-control @error('doc_id') is-invalid @enderror" value="{{ old('doc_id') }}" required>
                                    <option value="">select doctor</option>
                                    @foreach($doctors as $doctor)

                                    @endforeach
                                </select>
                                @error('doc_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <div class="input-wrap">
                            <div class="icon"><span class="fa fa-calendar"></span></div>
                            <input type="date" class="form-control @error('appoint_date') is-invalid @enderror" name="appoint_date" value="{{ old('appoint_date') }}" required>
                            @error('appoint_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!--<div class="form-group">-->
                    <!--    <div class="input-wrap">-->
                    <!--        <div class="icon"><span class="fa fa-clock-o"></span></div>-->
                    <!--        <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" placeholder="enter time" required>-->
                    <!--        @error('time')-->
                    <!--            <span class="invalid-feedback" role="alert">-->
                    <!--                <strong>{{ $message }}</strong>-->
                    <!--            </span>-->
                    <!--        @enderror-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <div class="form-group">
                    <div class="form-field">
                        <div class="select-wrap">
                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                            <select name="doctor_shown" id="doctor_shown" class="form-control @error('doctor_shown') is-invalid @enderror" value="{{ old('doctor_shown') }}">
                                <option value="">আগে কি কোনো ডাক্তার দেখিয়েছেন?</option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                            @error('doctor_shown')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group yes" style="display: none;">
                    <input type="text" class="form-control @error('past_doctor') is-invalid @enderror" name="past_doctor" value="{{ old('past_doctor') }}" placeholder="Past doctor name (আগের ডাক্তারের নাম)">
                    @error('past_doctor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <div class="form-group">
                        <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="editor" placeholder="Message (রোগীর সমস্যা সংক্ষিপ্তাকারে)*">{{ old('details') }}</textarea>
                        @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                   
                    </div>
                    <input type="hidden" name="entry_date" value="{{ date('d-m-Y') }}">
                    <input type="hidden" name="month" value="{{ date('F') }}">
                    <input type="hidden" name="year" value="{{ date('Y') }}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary py-3 px-4">Appointment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</section>
{{--     <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
<div class="container">
<div class="row d-flex">
<div class="col-md-6 col-lg-5 d-flex">
<div class="img w-100 d-flex align-self-stretch align-items-center" style="background-image:url(public/front/images/about.jpg);">
</div>
</div>
<div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
<div class="py-md-5">
<div class="row justify-content-start pb-3">
    <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
        <h2 class="mb-4">We Are <span>Medex</span> A Healthcare Provider</h2>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        <p><a href="#appointmentForm" class="btn btn-primary py-3 px-4">Make an appointment</a> <a href="#" class="btn btn-secondary py-3 px-4">Contact us</a></p>
    </div>
</div>
</div>
</div>
</div>
</div>
</section> --}}

<section class="img ftco-counter" style="height:360px;" >
    @if($advertise)
    <a href="{{ $advertise->image2_link }}" target="_blank">
    <img src="{{ asset('../storage/app/public/'.$advertise->image2) }}" style="height: 100%; width: 100%;" alt="Advertise Image">
    </a>
    @endif
</section>
  <!--<section class="ftco-section">-->
  <!--      <div class="container">-->
  <!--          <div class="row justify-content-center mb-5 pb-2">-->
  <!--              <div class="col-md-8 text-center heading-section ftco-animate">-->
  <!--                  <h2 class="mb-4"> @if($setting) {{ $setting->title }} @endif<span>Department</span></h2>-->
  <!--              </div>-->
  <!--          </div>-->
  <!--          <div class="row tabulation mt-4 ftco-animate">-->
  <!--      <div class="col-md-3">-->
  <!--        <ul class="nav nav-pills nav-fill d-block w-100">-->
  <!--          @foreach($departments as $department)-->
  <!--          <li class="nav-item text-left">-->
  <!--            <a class="nav-link d-flex align-items-centerm py-4" data-toggle="tab" href="#services{{ $department->department_id }}"><span class="flaticon-health flaticon mr-3"></span> <span>{{ $department->name }}</span></a>-->
  <!--          </li>-->
  <!--          @endforeach-->
  <!--        </ul>-->
  <!--      </div>-->

  <!--      <div class="col-md-9">-->
  <!--        <div class="tab-content pt-4 pt-md-0 pl-md-3">-->
  <!--          <div class="tab-pane container p-0 active" id="services-1">-->
  <!--            <div class="row">-->
  <!--              <div class="col-md-5 img" style="background-image: url(public/front/images/dept-1.jpg);"></div>-->
  <!--              <div class="col-md-7 text pl-md-4">-->
  <!--                <h3><a href="#">About Department</a></h3>-->
  <!--                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>-->
  <!--                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>-->
  <!--                <ul>-->
  <!--                  <li><span class="fa fa-check"></span>The Big Oxmox advised her not to do so</li>-->
  <!--                  <li><span class="fa fa-check"></span>Far far away, behind the word mountains</li>-->
  <!--                  <li><span class="fa fa-check"></span>Separated they live in Bookmarksgrove</li>-->
  <!--                  <li><span class="fa fa-check"></span>She packed her seven versalia</li>-->
  <!--                </ul>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->
  <!--          @foreach($departments as $department)-->
  <!--          <div class="tab-pane active container p-0 fade" id="services{{ $department->department_id }}">-->
  <!--            <div class="row">-->
  <!--              <div class="col-md-5 img" style="background-image: url({{ asset('../storage/app/public/'.$department->image) }}); "></div>-->
  <!--              <div class="col-md-7 text pl-md-4">-->
  <!--                <h3><a href="#">{{ $department->name }}</a></h3>-->
  <!--                <p>{!! $department->description !!}</p>-->
  <!--                <ul>-->
  <!--                  <a href="{{ route('department.doctors',$department->slug) }}"><li><span class="fa fa-check"></span><span style="color:#2c8259;">{{ $department->name }}</span> All Doctor's</li></a>-->
  <!--                </ul>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->
  <!--          @endforeach-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
            
  <!--      </div>-->
  <!--</section>-->
<section class="ftco-facts img ftco-counter" style="background-image: url(public/front/images/bg_3.jpg);">
<div class="overlay"></div>
<div class="container">
<div class="row">
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 p-4">
<div class="text">
    <strong class="number"  @if($setting) data-number="{{ $setting->service_years }}" @else data-number="0" @endif>0</strong>
    <span>Years of Experienced</span>
</div>
</div>
</div>
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 p-4">
<div class="text">
    <strong class="number"  @if($setting) data-number="{{ $setting->total_patients }}"  @else data-number="0" @endif>0</strong>
    <span>Happy Patients</span>
</div>
</div>
</div>
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 p-4">
<div class="text">
    <strong class="number"  @if($setting) data-number="{{ $setting->total_doctors }}"  @else data-number="0" @endif>0</strong>
    <span>Number of Doctors</span>
</div>
</div>
</div>
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 p-4">
<div class="text">
    <strong class="number"  @if($setting) data-number="{{ $setting->total_staffs }}"  @else data-number="0" @endif>0</strong>
    <span>Number of Staffs</span>
</div>
</div>
</div>
</div>
</div>
</section>


{{-- Advertise section --}}
<section>
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-6 img col-lg-6 mt-2" style=" width:100%;" >
                @if($advertise)
                <img src="{{ url('../storage/app/public/'.$advertise->animation) }}" alt="Advertise Animation" width="100%" height="100%">
                @endif
            </div>
            <div class=" col-md-6 img col-lg-6 mt-2" style=" width:100%;" >
                @if($advertise)
                <iframe style="width:100%; height:400px;" src="{{ $advertise->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
            </div>

        </div>
    </div>
</section>


<section class="ftco-section bg-light">
<div class="container-fluid px-md-5">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-10 heading-section text-center ftco-animate">
<h2 class="mb-4">Latest Blog</h2>
<p>Get New Health Tips & Solutions And Keep Your Self Healthly & Wealthy.</p>
@php
    $categories = App\Models\Postcategory::where('status', 1)->get();
@endphp
@foreach($categories as $item)
    <a class="text-success mr-2" href="{{ route('blog.catepost',$item->slug) }}">#{{ Str::words($item->name,1,'') }}</a>
@endforeach
</div>
</div>
<div class="row d-flex">
@foreach($posts as $post)
<div class="col-lg-4 ftco-animate">
<div class="blog-entry">
<a href="{{ route('blog.singlepost',$post->slug) }}" class="block-20" style="background-image: url({{ asset('../storage/app/public/'.$post->image) }})">
</a>
<div class="d-flex">
     <div class="meta pt-3 text-right pr-2">
        <div><a href="{{ route('blog.singlepost',$post->slug) }}"><span class="fa fa-calendar mr-2"></span>{{ $post->created_at->diffForHumans() }}</a></div>
        <div><a href="{{ route('blog.catepost',$post->postcategory->slug) }}" class="meta-chat"><span class="fa fa-comment mr-2"></span>{{ $post->postcategory->name }}</a></div>
    </div>
    <div class="text d-block">
        <h3 class="heading" style="min-height: 100px;"><a href="{{ route('blog.singlepost',$post->slug) }}">{{ Str::words($post->title, 12,'..') }}</a></h3>
        <p>{!! Str::words(str_replace($replace, ' ', $post->body), 20,'') !!}   </p>
        <p><a href="{{ route('blog.singlepost',$post->slug) }}" class="btn btn-secondary btn-outline-secondary py-2 px-3">Read more</a></p>
    </div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>
<section class="ftco-section testimony-section img" style="background-image: url(public/front/images/bg_4.jpg);">
<div class="overlay"></div>
<div class="container">
<div class="row justify-content-center pb-3">
<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
<span class="subheading">Read testimonials</span>
<h2 class="mb-4">Our Patient Says</h2>
</div>
</div>
<div class="row ftco-animate justify-content-center">
<div class="col-md-12">
<div class="carousel-testimony owl-carousel ftco-owl">
@foreach($clients as $client)
<div class="item">
    <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between">
        <div class="user-img" style="background-image: url({{ asset('../storage/app/public/'.$client->image) }})">
            <span class="quote d-flex align-items-center justify-content-center">
                <i class="fa fa-quote-left"></i>
            </span>
        </div>
        <div class="text">
            <p class="mb-4" style="min-height:120px">{!! $client->review !!}</p>
            <p class="name">{{ $client->name }}</p>
            <span class="position">Patients</span>
        </div>
    </div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</section>


<script src="{{ asset('/front/js/jquery.min.js')}}"></script>
<script src="{{ asset('/front/js/popper.min.js')}}"></script>
<script src="{{ asset('/front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('change','#doctor_shown',function(){
        var doctor_shown = $(this).val();
        if(doctor_shown == 'Yes'){
            $('.yes').show();
        }else{
            $('.yes').hide();
        }
    });
</script>
<script>

    $(document).ready(function(){

        $('select[name="department_id"]').on('change', function(){
            var department_id = $(this).val();
            if(department_id) {
                $.ajax({
                    url: "{{  url('get/department/') }}/"+department_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    $("select[name='doc_id']").empty();
                    $.each(data, function(key,value){
                            $('select[name="doc_id"]').append('<option value="'+ value.doc_id +'">' + value.name + '</option>');
                    })
                    },
                });
            } else {
            $('select[name="doc_id"]').append('<option>Select Doctor First</option>');
            }
        });
    });
</script>
@endsection
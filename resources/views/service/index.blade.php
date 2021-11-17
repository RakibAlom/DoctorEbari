@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Our Services | ' . $setting->title)
@section('meta-title',  'Our Services | ' . $setting->title)
@section('meta-description', 'DoctorEbari is the easiest way to know more information about any doctor and medical services. You can find Doctor information, Diagnostic, Ambulance, Hospital information.')
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Our Services | ' . $setting->title)
@section('og-description', 'DoctorEbari is the easiest way to know more information about any doctor and medical services. You can find Doctor information, Diagnostic, Ambulance, Hospital information.')
@section('twitter-title',  'Our Services | ' . $setting->title)
@section('twitter-description', 'DoctorEbari is the easiest way to know more information about any doctor and medical services. You can find Doctor information, Diagnostic, Ambulance, Hospital information.')
@section('meta-image', asset('../storage/app/public/image/setting/social-organization-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/social-organization-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/social-organization-cover.png'))

@extends('layouts.app')

@section('content')
    <section style="background-image:url('public/front/images/top-cover-img.jpg');width:100%;height:260px;background-size:cover;background-repeat:no-repeat;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4" style="line-height: 260px">Our <span class="text-success">Services</span></h2>
                </div>
            </div>
        </div>
    </section>
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="py-lg-5">
                <div class="row">
                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.doctors') }}"><div class="icon d-block align-items-center"><span class="fa fa-user-md"></span></div>
                                <div class="media-body">
                                <h3 class="heading mb-1">Doctor</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.ambulances') }}"><div class="icon d-block align-items-center"><span class="fa fa-ambulance"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">Ambulance Service</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place </p>
                            </div>
                        </div>      
                    </div>

                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.diagnostics') }}"><div class="icon d-block align-items-center"><span class="fa fa-wheelchair-alt"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">Diagnostic</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                            </div>
                        </div>      
                    </div>

                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.socialorganizes') }}"><div class="icon d-block align-items-center"><span class="fa fa-university"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">Social Organizes</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                            </div>
                        </div>      
                    </div>

                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.shops') }}"><div class="icon d-block align-items-center"><span class="fa fa-shopping-cart"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">Our Shop</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                            </div>
                        </div>      
                    </div>
                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.hospitals') }}"><div class="icon d-block align-items-center"><span class="fa fa-hospital-o"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">Hospital's</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                            </div>
                        </div> 
                    </div>

                    
                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a href="{{ route('all.corporateorganizes') }}"><div class="icon d-block align-items-center"><span class="fa fa-sitemap"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">Corporate Organization</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a target="_blank" href="https://facebook.com/onlinemediservice"><div class="icon d-block align-items-center"><span class="fa fa-medkit"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">Online Medi-Service</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12 col-lg-4 ftco-animate">
                        <div class="media block-6 services">
                            <a target="_blank" href="https://www.facebook.com/groups/203117270470908"><div class="icon d-block align-items-center"><span class="fa fa-info"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-1">সিলেট ডাক্তারি সহায়তা</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place</p>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
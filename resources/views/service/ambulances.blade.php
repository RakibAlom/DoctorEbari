@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Ambulance Services | ' . $setting->title)
@section('meta-title',  'Ambulance Services | ' . $setting->title)
@section('meta-description', 'Here you will find information on all types of emergency ambulance services for your patient to move quickly. DoctorEbari is the best ambulance service provider platform.')
@section('meta-keywords', 'ambulance, ambulances, ambulance services, ambulance services list, ambulance in bd, ambulance in sylhet, ambulance service in bangladesh, emergency ambulance service, emergency ambulance provider, best ambulance service provider')
@section('og-title', 'Ambulance Services | ' . $setting->title)
@section('og-description', 'Here you will find information on all types of emergency ambulance services for your patient to move quickly. DoctorEbari is the best ambulance service provider platform.')
@section('twitter-title',  'Ambulance Services | ' . $setting->title)
@section('twitter-description', 'Here you will find information on all types of emergency ambulance services for your patient to move quickly. DoctorEbari is the best ambulance service provider platform.')
@section('meta-image', asset('../storage/app/public/image/setting/ambulance-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/ambulance-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/ambulance-cover.png'))

@extends('layouts.app')

@section('content')
    <section style="background-image:url('public/front/images/coverimage1.jpg');width:100%;height:260px;background-size:cover;background-repeat:no-repeat;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4" style="line-height: 260px">Our <span class="text-danger">Ambulance Service</span></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid"> 
             <div class="row justify-content-center pb-3">
              <div class="col-md-10 offset-1 text-center heading-section ftco-animate">
                <form action="{{ route('search') }}" class="appointment-form-intro ftco-animate">
                    <div class="d-flex">
                        <div class="form-group">
                            <div class="form-field">
                                <div class="select-wrap">
                                    <input type="search" name="search" placeholder="Doctor & Services" class="form-control" required="">
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

            <div class="row">
                @foreach($ambulances as $ambulance)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$ambulance->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('ambulance.details',$ambulance->slug) }}"><h3 class="mb-2">{{ $ambulance->name }}</h3></a>
                            <span class="position mb-2">{{ $ambulance->phone }}</span>
                            <div class="faded">
                                <p style="min-height: 60px;">{!! $ambulance->address !!}</p>
                                <a href="tel:{{ $ambulance->phone }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Call Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $ambulances->links() }}
            </div>
        </div>
    </section>
@endsection
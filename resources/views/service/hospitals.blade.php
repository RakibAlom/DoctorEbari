@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Hospitals List | ' . $setting->title)
@section('meta-title',  'Hospitals List | ' . $setting->title)
@section('meta-description', 'You can find hospital lists and know about their address and information easily. DoctorEbari is the best platform to appoint doctors and get health tips.')
@section('meta-keywords', 'hospital, hospital list in bd, hospital in banglades, eye hospital, best hosptial list, clinic, হাসপাতাল, চক্ষু হাসপাতাল')
@section('og-title', 'Hospitals List | ' . $setting->title)
@section('og-description', 'You can find hospital lists and know about their address and information easily. DoctorEbari is the best platform to appoint doctors and get health tips.')
@section('twitter-title',  'Hospitals List | ' . $setting->title)
@section('twitter-description', 'You can find hospital lists and know about their address and information easily. DoctorEbari is the best platform to appoint doctors and get health tips.')
@section('meta-image', asset('../storage/app/public/image/setting/hospitals-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/hospitals-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/hospitals-cover.png'))

@extends('layouts.app')

@section('content')
    <section style="background-image:url('public/front/images/coverimage1.jpg');width:100%;height:260px;background-size:cover;background-repeat:no-repeat;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4" style="line-height: 260px">Our <span class="text-success">Hospital Service</span></h2>
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
                @foreach($hospitals as $hospital)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$hospital->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <div style="height:100px;">
                            <a href="{{ route('hospital.details',$hospital->slug) }}"><h3 class="mb-2">{{ $hospital->name }}</h3></a>
                            @if($hospital->call_status == 0)
                            
                            @else
                            <span class="position mb-2">{{ $hospital->phone }}</span>
                            @endif
                            </div>
                            <div class="faded">
                                <div style="height:60px">
                                <p>{!! $hospital->address !!}</p>
                                </div>
                                <div style="height:30px;">
                                <a href="/hospital/details/{{$hospital->slug}}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $hospitals->links() }}
            </div>
        </div>
    </section>
@endsection
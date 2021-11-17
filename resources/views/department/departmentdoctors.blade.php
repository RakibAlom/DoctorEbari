@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $departments->name . ' Doctor | ' . $setting->title)
@section('meta-title', $departments->name . ' Doctor | ' . $setting->title)
@section('meta-description', $setting->meta_description)
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', $departments->name . ' Doctor | ' . $setting->title)
@section('og-description', $setting->meta_description)
@section('twitter-title', $departments->name . ' Doctor | ' . $setting->title)
@section('twitter-description', $setting->meta_description)
@section('meta-image', asset('../storage/app/public/image/setting/doctor-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/doctor-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/doctor-cover.png'))

@extends('layouts.app')

@section('content')
  
  <section style="background-image: url('public/front/images/coverimage1.jpg'); width: 100%; height: 260px;" data-stellar-background-ratio="0.5">
      <div class="container">
          <div class="row justify-content-center pb-3">
              <div class="col-md-8 text-center heading-section ftco-animate">
                  <h2 class="mb-4" style="line-height: 260px">{{ $departments->name }} <span>Doctors</span></h2>
              </div>
          </div>
      </div>
  </section>
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
            {{-- <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our Qualified <span>Doctors</span></h2>
                </div>
            </div> --}}
            <div class="row">
                @foreach($doctors as $doctor)
                      <div class="col-md-6 col-lg-3 ftco-animate">
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
              <p>{!! Str::limit($doctor->description,'50','...') !!}</p>
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
            <div class="row justify-content-center">
                {{ $doctors->links() }}
            </div>
        </div>
    </section>
@endsection
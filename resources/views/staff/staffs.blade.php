@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Staff List | ' . $setting->title)
@section('meta-title',  'Staff List | ' . $setting->title)
@section('meta-description', $setting->meta_description)
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Staff List | ' . $setting->title)
@section('og-description', $setting->meta_description)
@section('twitter-title',  'Staff List | ' . $setting->title)
@section('twitter-description', $setting->meta_description)
@section('meta-image', asset('../storage/app/public/'.$setting->cover_image))
@section('og-image', asset('../storage/app/public/'.$setting->cover_image))
@section('twitter-image', asset('../storage/app/public/'.$setting->cover_image))

@extends('layouts.app')

@section('content')
  <section style="background-image: url('public/front/images/coverimage1.jpg'); width: 100%; height: 260px;" data-stellar-background-ratio="0.5">
      <div class="container">
          <div class="row justify-content-center pb-3">
              <div class="col-md-8 text-center heading-section ftco-animate">
                  <h2 class="mb-4" style="line-height: 260px">Our <span>Social Organizes</span></h2>
              </div>
          </div>
      </div>
  </section>

    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our <span>Staffs</span></h2>
                </div>
            </div>
            <div class="row">
                @foreach($staffs as $staff)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$staff->image) }})"></div>
                        </div>
                        <div class="text text-center">
                            <h3 class="mb-2">{{ $staff->name }}</h3>
                            <span class="position mb-2">{{ $staff->designation }}</span>
                            <div class="faded">
                                <p>{!! $staff->details !!}</p>
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="{{ $staff->twitter_link }}" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="{{ $staff->fb_link }}" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="{{ $staff->instagram_link }}" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a></li>
                                </ul>
                                <a href="tel:{{ $staff->phone }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Call Now{{ $staff->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row justify-content-center">
                {{ $staffs->links() }}
            </div>
        </div>
    </section>
@endsection
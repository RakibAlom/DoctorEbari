@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', 'Doctor Departments | ' . $setting->title)
@section('meta-title',  'Doctor Departments | ' . $setting->title)
@section('meta-description', $setting->meta_description)
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Doctor Departments | ' . $setting->title)
@section('og-description', $setting->meta_description)
@section('twitter-title',  'Doctor Departments | ' . $setting->title)
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
                  <h2 class="mb-4" style="line-height: 260px">@if($setting) {{ $setting->title }} @endif<span>Department</span></h2>
              </div>
          </div>
      </div>
  </section>
  <section class="">
        <div class="container">
        @foreach($departments as $department)
            <div class="mt-4 ftco-animate">
                <div class="row">
                    <div class="col-md-7">
                        <h2>{{ $department->name }}</h2>
                        <p>{!! $department->description !!}</p>
                    </div>
                    <div class="col-md-5">
                         <img align="center" class="img-fluid" src="{{ asset('../storage/app/public/'.$department->image) }}" alt="{{ $department->name }}">
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        </div>
  </section>
@endsection
@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Contact Us | ' . $setting->title)
@section('meta-title',  'Contact Us | ' . $setting->title)
@section('meta-description', $setting->meta_description)
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Contact Us | ' . $setting->title)
@section('og-description', $setting->meta_description)
@section('twitter-title',  'Contact Us | ' . $setting->title)
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
                  <h2 class="mb-4" style="line-height: 260px"><span>Contact</span></h2>
              </div>
          </div>
      </div>
  </section>
  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex contact-info mb-5">
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="fa fa-location-arrow"></span>
            </div>
            <h3 class="mb-4">Address</h3>
            <p> @if($setting) {{ $setting->address }} @endif</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="fa fa-phone"></span>
            </div>
            <h3 class="mb-4">Hotline Number</h3>
            <p>@if($setting) <a href="tel:{{ $setting->hotline }}">{{ $setting->phone }}</a> @endif</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="fa fa-envelope"></span>
            </div>
            <h3 class="mb-4">Email Address</h3>
            <p> @if($setting) <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a> @endif</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center bg-light">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="fa fa-globe"></span>
            </div>
            <h3 class="mb-4">Website</h3>
            <p> @if($setting) <a href="{{ url('/') }}">{{ $setting->web_link }}</a>@endif</p>
          </div>
        </div>
      </div>
      <div class="row no-gutters block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="{{ route('message.create') }}" method="POST" class="bg-light p-5 contact-form">
            @csrf
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
              <input type="text" name="subject" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">Send Message</button>
            </div>
          </form>
          
        </div>
        <div class="col-md-6 d-flex">
          <div id="map" class="bg-white"><iframe style="height: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2634.1577644895!2d91.84748429820243!3d24.89079642759326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3751aab46394de63%3A0x4bd62d670acd9700!2z4Kas4Ka-4KaH4Kak4KeB4KaoIOCmqOCnguCmsCDgppzgpr7gpq7gp4cg4Kau4Ka44Kac4Ka_4Kam!5e0!3m2!1sen!2sbd!4v1601595039841!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        </div>
      </div>
    </div>
  </section>
@endsection
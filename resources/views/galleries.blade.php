@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Gallary | ' . $setting->title)
@section('meta-title',  'Gallary | ' . $setting->title)
@section('meta-description', $setting->meta_description)
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Gallary | ' . $setting->title)
@section('og-description', $setting->meta_description)
@section('twitter-title',  'Gallary | ' . $setting->title)
@section('twitter-description', $setting->meta_description)
@section('meta-image', asset('../storage/app/public/'.$setting->cover_image))
@section('og-image', asset('../storage/app/public/'.$setting->cover_image))
@section('twitter-image', asset('../storage/app/public/'.$setting->cover_image))

@extends('layouts.app')

@section('content')
<style>
    .image-content{
        position: absolute;
        top: 50%;
        text-align:center;
        width:100%;
        color: #371DEF;
        font-size: 20px;
        font-weight: 700;
    }
</style>
  <section style="background-image: url('public/front/images/coverimage1.jpg'); width: 100%; height: 260px;" data-stellar-background-ratio="0.5">
      <div class="container">
          <div class="row justify-content-center pb-3">
              <div class="col-md-8 text-center heading-section ftco-animate">
                  <h2 class="mb-4" style="line-height: 260px">Our <span>Gallery</span></h2>
              </div>
          </div>
      </div>
  </section>

<section class="ftco-section">
  <div class="container">

    <div class="row no-gutters">
      @foreach($galleries as $gallery)
      <div class="col-md-3">
        <a href="{{ asset('../storage/app/public/'.$gallery->image) }}" class="image-popup img gallery ftco-animate" style="background-image: url({{ asset('../storage/app/public/'.$gallery->image) }})">
          <span class="overlay"></span>
        </a>
        <div class="image-content">
			<p class="text-primary">{{ $gallery->title }}</p>
		</div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection


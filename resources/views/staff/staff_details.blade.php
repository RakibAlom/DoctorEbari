@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $staff->name . ' | Staff | ' . $setting->title)
@section('meta-title', $staff->name . ' | Staff | ' . $setting->title)
@section('meta-description', Str::words(str_replace($replace, ' ', $staff->details), 25))
@section('meta-keywords', $staff->name)
@section('og-title', $staff->name . ' | Staff | ' . $setting->title)
@section('og-description', Str::words(str_replace($replace, ' ', $staff->details), 25))
@section('twitter-title', $staff->name . ' | Staff | ' . $setting->title)
@section('twitter-description', Str::words(str_replace($replace, ' ', $staff->details), 25))

@if($staff->image)
@section('meta-image', asset('../storage/app/public/'.$staff->image))
@section('og-image', asset('../storage/app/public/'.$staff->image))
@section('twitter-image', asset('../storage/app/public/'.$staff->image))
@endif

@extends('layouts.app')

@section('content')

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{ $staff->name }}</h2>
        
        <img src="{{ asset('../storage/app/public/'.$staff->image) }}" alt="{{ $staff->name }}" draggable="false"  class="img-fluid justify-content-center">
        
        <p>{!! $staff->details !!}</p>

      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">

      <div class="sidebar-box ftco-animate">
         <h3 class="heading-sidebar">Details of {{ $staff->name }}</h3>
         <ul class="categories">
          {{--   <li><a href="tel:{{ $staff->phone }}">{{ $staff->phone }} <span>Call Now</span></a></li>
            <li><a>{{ $staff->address }} <span>Address</span></a></li> --}}
           <table class="table">
              <tr>
                <td>Mobile :</td>
                <td> {{ $staff->phone }}</td>
              </tr>
              <tr>
                <td>Designation :</td>
                <td> {{ $staff->designation }}</td>
              </tr>
              <tr>
                <td>Twitter :</td>
                <td> <a href="{{ $staff->twitter_link }}" class="d-flex align-items-center justify-content-center btn btn-info btn-block"><span class="fa fa-twitter"></span></a></td>
              </tr>
              <tr>
                <td>Facebook :</td>
                <td><a href="{{ $staff->fb_link }}" class="d-flex align-items-center justify-content-center btn btn-primary btn-block"><span class="fa fa-facebook"></span></a></td>
              </tr>
              <tr>
                <td>Instagram :</td>
                <td> <a href="{{ $staff->instagram_link }}" class="d-flex align-items-center justify-content-center btn btn-danger btn-block"><span class="fa fa-instagram"></span></a></td>
              </tr>
              <tr>
                <td colspan="2"><a class="btn btn-info btn-block" href="tel:{{ $staff->phone }}">Call Now - {{ $staff->phone }}</a></td>
              </tr>
            </table>

        </ul>
      </div>

      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">More staffs</h3>
        @foreach($staffs as $staff_1) 
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url({{ asset('../storage/app/public/'.$staff_1->image) }})"></a>
          <div class="text">
          	<a href="{{ route('staff.details',$staff_1->slug) }}"><p>{{ $staff_1->name }}</p>
            <h3 class="heading">{!! Str::words( $staff_1->details, '12','..') !!} </h3></a>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> {{ $staff_1->created_at }}</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

  {{--     <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Tag Cloud</h3>
        <div class="tagcloud">
          @foreach($postcategories as $postcate)
          <a href="#" class="tag-cloud-link">{{ $postcate->name }}</a>
          @endforeach
        </div>
      </div> --}}
{{-- 
      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Paragraph</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
      </div> --}}
    </div>

  </div>
</div>
</section>
@endsection
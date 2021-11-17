@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $social_organize->name . ' | Social Organization | ' . $setting->title)
@section('meta-title',  $social_organize->name . ' | Social Organization | ' . $setting->title)
@section('meta-description', Str::words(str_replace($replace, ' ', $social_organize->details), 25,''))
@section('meta-keywords', $social_organize->meta_keywords)
@section('og-title', $social_organize->name . ' | Social Organization | ' . $setting->title)
@section('og-description', Str::words(str_replace($replace, ' ', $social_organize->details), 25,''))
@section('twitter-title',  $social_organize->name . ' | Social Organization | ' . $setting->title)
@section('twitter-description', Str::words(str_replace($replace, ' ', $social_organize->details), 25,''))
@section('meta-image', asset('../storage/app/public/'.$social_organize->image))
@section('og-image', asset('../storage/app/public/'.$social_organize->image))
@section('twitter-image', asset('../storage/app/public/'.$social_organize->image))

@extends('layouts.app')

@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{ $social_organize->name }}</h2>
          <img src="{{ asset('../storage/app/public/'.$social_organize->image) }}" alt="{{ $social_organize->name }}" draggable="false" class="img-fluid">
        
        <p>{!! $social_organize->details !!}</p>
        
        


      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">

      <div class="sidebar-box ftco-animate">
         <h3 class="heading-sidebar">Details of {{ $social_organize->name }}</h3>
         <ul class="categories">
            {{-- <li><a href="tel:{{ $social_organize->phone }}">{{ $social_organize->phone }} <span>Call Now</span></a></li>
            <li><a>{{ $social_organize->address }} <span>Address</span></a></li> --}}
            <table class="table">
              <tr>
                <td>Address</td>
                <td> : </td>
                <td>{{ $social_organize->address }} </td>
              </tr>
              <tr>
                <td colspan="3"><a class="btn btn-info btn-block" href="tel:{{ $social_organize->phone }}">Call Now</a></td>
              </tr>
            </table>

        </ul>
      </div>

      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Recently Added Ambulaces</h3>
        @foreach($social_organizes as $organize) 
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url({{ asset('../storage/app/public/'.$organize->image) }})"></a>
          <div class="text">
            <h3 class="heading"><a href="{{ route('social_organize.details',$organize->slug) }}">{!! Str::words( $organize->details, '12','..') !!} </a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> {{ $organize->created_at }}</a></div>
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
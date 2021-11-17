@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $diagnostic->name . ' | Diagnostic | ' . $setting->title)
@section('meta-title', $diagnostic->name . ' | Diagnostic | ' . $setting->title)
@section('meta-description', Str::words(str_replace($replace, ' ', $diagnostic->details), 25,''))
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', $diagnostic->name . ' | Diagnostic | ' . $setting->title)
@section('og-description', Str::words(str_replace($replace, ' ', $diagnostic->details), 25,''))
@section('twitter-title', $diagnostic->name . ' | Diagnostic | ' . $setting->title)
@section('twitter-description', Str::words(str_replace($replace, ' ', $diagnostic->details), 25,''))

@if($diagnostic->image)
@section('meta-image', asset('../storage/app/public/'.$diagnostic->image))
@section('og-image', asset('../storage/app/public/'.$diagnostic->image))
@section('twitter-image', asset('../storage/app/public/'.$diagnostic->image))
@endif

@extends('layouts.app')

@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{ $diagnostic->name }}</h2>
        
        <img src="{{ asset('../storage/app/public/'.$diagnostic->image) }}" alt="{{ $diagnostic->name }}" draggable="false" class="img-fluid">
        
        <p>{!! $diagnostic->details !!}</p>
        
      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">

      <div class="sidebar-box ftco-animate">
         <h3 class="heading-sidebar">Details of {{ $diagnostic->name }}</h3>
         <ul class="categories">
            {{-- <li><a href="tel:{{ $diagnostic->phone }}">{{ $diagnostic->phone }} <span>Call Now</span></a></li>
            <li><a>{{ $diagnostic->address }} <span>Address</span></a></li> --}}
          <table class="table">
              <tr>
                <td>Address</td>
                <td> : </td>
                <td>{{ $diagnostic->address }} </td>
              </tr>
              @if($diagnostic->sms_status == 1)
              <tr>
                <td colspan="3"><a class="btn btn-info btn-block" href="tel:{{ $diagnostic->hotline }}">Call Now</a></td>
              </tr>
              @else
              @endif
            </table>

        </ul>
      </div>

      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Recently Added Ambulaces</h3>
        @foreach($diagnostics as $diag) 
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url({{ asset('../storage/app/public/'.$diag->image) }})"></a>
          <div class="text">
            <h3 class="heading"><a href="{{ route('diagnostic.details',$diag->slug) }}">{!! Str::words( $diag->details, '12','..') !!} </a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> {{ $diag->created_at }}</a></div>
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
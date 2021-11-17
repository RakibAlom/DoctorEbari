@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $shop->name . ' | Our Shop')
@section('meta-title', $shop->name . ' | Our Shop')
@section('meta-description', Str::words(str_replace($replace, ' ', $shop->details), 25,''))
@section('meta-keywords', $shop->keywords)
@section('og-title', $shop->name . ' | Our Shop')
@section('og-description', Str::words(str_replace($replace, ' ', $shop->details), 25,''))
@section('twitter-title', $shop->name . ' | Our Shop')
@section('twitter-description', Str::words(str_replace($replace, ' ', $shop->details), 25,''))

@if($shop->image)
@section('meta-image', asset('../storage/app/public/'.$shop->image))
@section('og-image', asset('../storage/app/public/'.$shop->image))
@section('twitter-image', asset('../storage/app/public/'.$shop->image))
@endif

@extends('layouts.app')

@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{ $shop->name }}</h2>
          <img src="{{ asset('../storage/app/public/'.$shop->image) }}" alt="{{ $shop->name }}" draggable="false" class="img-fluid">
        
        <p>{!! $shop->details !!}</p>
        <hr>
        {{-- Facebook share button  --}}
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="HwvE80ZV"></script>
        <div class="fb-share-button" data-width="320" data-href="{{ URL::current() }}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
        {{-- Facebook Comment connect --}}
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="vCjK9r7u"></script>
        <div class="fb-comments" data-width="710" data-href="{{ URL::current() }}" data-numposts="5" data-width=""></div>


      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">

      <div class="sidebar-box ftco-animate">
         <h3 class="heading-sidebar">Details of {{ $shop->name }}</h3>
         <ul class="categories">
          {{--   <li><a href="tel:{{ $shop->phone }}">{{ $shop->phone }} <span>Call Now</span></a></li>
            <li><a>{{ $shop->address }} <span>Address</span></a></li> --}}
           <table class="table">
              <tr>
                <td>Price</td>
                <td> : </td>
                <td> {{ $shop->sell_price }}</td>
              </tr>
              <tr>
                <td>Category</td>
                <td> : </td>
                <td> {{ $shop->category }}</td>
              </tr>
              <tr>
                <td colspan="3"><a class="btn btn-info btn-block" @if($setting) href="tel:{{ $setting->phone }}" @else href="#" @endif >Order Now - @if($setting) {{ $setting->phone }} @endif</a></td>
              </tr>
            </table>

        </ul>
      </div>

      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Recently Added Products</h3>
        @foreach($shops as $shop_1) 
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url({{ asset('../storage/app/public/'.$shop_1->image) }})"></a>
          <div class="text">
            <h3 class="heading"><a href="{{ route('shop.details',$shop_1->slug) }}">{!! Str::words( $shop_1->details, '12','..') !!} </a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> {{ $shop_1->created_at }}</a></div>
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
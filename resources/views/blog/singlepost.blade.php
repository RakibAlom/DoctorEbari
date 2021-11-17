@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', $singlepost->title . ' | ' . $setting->title)
@section('meta-title', $singlepost->title . ' | ' . $setting->title)
@section('meta-description', Str::words(str_replace($replace, ' ', $singlepost->body), 25,''))
@section('meta-keywords', $singlepost->keywords)
@section('og-title', $singlepost->title . ' | ' . $setting->title)
@section('og-description', Str::words(str_replace($replace, ' ', $singlepost->body), 25,''))
@section('twitter-title', $singlepost->title . ' | ' . $setting->title)
@section('twitter-description', Str::words(str_replace($replace, ' ', $singlepost->body), 25,''))

@if($singlepost->image)
@section('meta-image', asset('../storage/app/public/'. $singlepost->image))
@section('og-image', asset('../storage/app/public/'. $singlepost->image))
@section('twitter-image', asset('../storage/app/public/'. $singlepost->image))
@endif

@extends('layouts.app')

@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{ $singlepost->title }}</h2>
          <img src="{{ asset('../storage/app/public/'.$singlepost->image) }}" alt="{{ $singlepost->title }}" draggable="false" class="img-fluid">
        
        <p>{!! $singlepost->body !!}</p>
        {{-- Facebook share button  --}}
        <div id="fb-root"></div>
        <div class="fb-share-button" data-width="320" data-href="{{ URL::current() }}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
        {{-- Facebook Comment connect --}}
        <div id="fb-root"></div>
        <div class="fb-comments" data-width="710" data-href="{{ URL::current() }}" data-numposts="5" data-width=""></div>

      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">
   {{--      <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon icon-search"></span>
              <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
          </form>
        </div> --}}
      <div class="sidebar-box ftco-animate">
         <h3 class="heading-sidebar">Categories</h3>
         <ul class="categories">
            @foreach($postcategories as $postcate)
                <li><a href="{{ route('blog.catepost',$postcate->slug) }}">{{ $postcate->name }} <span>({{ count($postcate->post) }})</span></a></li>
            @endforeach
        </ul>
      </div>

      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Recent Blog</h3>
        @foreach($posts as $pos) 
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url({{ asset('../storage/app/public/'.$pos->image) }})"></a>
          <div class="text">
            <h3 class="heading"><a href="{{ route('blog.singlepost',$pos->slug) }}">{!! Str::words( $pos->body, '12','..') !!} </a></h3>
            <div class="meta">
              <div><a href="{{ route('blog.singlepost',$pos->slug) }}"><span class="fa fa-calendar mr-2"></span>{{ $pos->created_at->diffForHumans() }}</a></div>
              <div><a href="{{ route('blog.catepost',$pos->postcategory->slug) }}" class="meta-chat"><span class="fa fa-comment mr-2"></span>{{ $pos->postcategory->name }}</a></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Tag Cloud</h3>
        <div class="tagcloud">
          @foreach($postcategories as $postcate)
          <a href="{{ route('blog.catepost',$postcate->slug) }}" class="tag-cloud-link">{{ $postcate->name }}</a>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</div>
</section>



{{-- facebook comment share script --}}
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="HwvE80ZV"></script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="vCjK9r7u"></script>
@endsection

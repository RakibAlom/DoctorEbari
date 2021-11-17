@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp


@section('title',  $postcates->name . ' | Blog | ' . $setting->title)
@section('meta-title',  $postcates->name . ' | Blog | ' . $setting->title)
@section('meta-description', 'DoctorEbari blog is the best platform to get health and beauty tips. You can find health, wealth, and beauty tips for your good health.')
@section('meta-keywords', 'doctorebari, doctor ebari, health tips, wealth tips, beauty tips, how to, রোগের প্রতিসূধ, রোগ থেকে ভালো থাকার উপায়, সুস্থ হওয়ার টিপস, সৌন্দর্য, সুন্দর হওয়ার টিপস, মেয়ের সৌন্দর্যের টিপস, যৌনশক্তির টিপস')
@section('og-title', $postcates->name . ' | Blog | ' . $setting->title)
@section('og-description', 'DoctorEbari blog is the best platform to get health and beauty tips. You can find health, wealth, and beauty tips for your good health.')
@section('twitter-title',  $postcates->name . ' | Blog | ' . $setting->title)
@section('twitter-description', 'DoctorEbari blog is the best platform to get health and beauty tips. You can find health, wealth, and beauty tips for your good health.')
@section('meta-image', asset('../storage/app/public/image/setting/blog-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/blog-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/blog-cover.png'))

@extends('layouts.app')
@section('content')

    <section class="ftco-section bg-light">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ $postcates->name }} Post</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach($posts as $post)
                <div class="col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="{{ route('blog.singlepost',$post->slug) }}" class="block-20" style="background-image: url({{ asset('../storage/app/public/'.$post->image) }})">
                        </a>
                        <div class="d-flex">
                            <div class="meta pt-3 text-right pr-2">
                            <div><a href="{{ route('blog.singlepost',$post->slug) }}"><span class="fa fa-calendar mr-2"></span>{{ $post->created_at->diffForHumans() }}</a></div>
                            <div><a href="{{ route('blog.catepost',$post->postcategory->slug) }}" class="meta-chat"><span class="fa fa-comment mr-2"></span>{{ $post->postcategory->name }}</a></div>
                            </div>
                            <div class="text d-block">
                                <h3 class="heading" style="min-height: 100px;"><a href="{{ route('blog.singlepost',$post->slug) }}">{{ Str::words($post->title, 12,'..') }}</a></h3>
                                <p>{!! Str::words(str_replace($replace, ' ', $post->body), 20,'') !!}   </p>
                                <p><a href="{{ route('blog.singlepost',$post->slug) }}" class="btn btn-secondary btn-outline-secondary py-2 px-3">Read more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
              {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
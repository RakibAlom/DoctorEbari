@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>','<a>','</a>');
@endphp


@section('title',  'Terms & Condition | ' . $setting->title)
@section('meta-title',  'Terms & Condition | ' . $setting->title)
@section('meta-description', Str::words(str_replace($replace, ' ', $setting->terms), 25,''))
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Terms & Condition | ' . $setting->title)
@section('og-description', Str::words(str_replace($replace, ' ', $setting->terms), 25,''))
@section('twitter-title',  'Terms & Condition | ' . $setting->title)
@section('twitter-description', Str::words(str_replace($replace, ' ', $setting->terms), 25,''))
@section('meta-image', asset('../storage/app/public/'.$setting->cover_image))
@section('og-image', asset('../storage/app/public/'.$setting->cover_image))
@section('twitter-image', asset('../storage/app/public/'.$setting->cover_image))

@extends('layouts.app')

@section('content')
    <section class="ftco-section bg-light">
        <div class="container px-md-5">
            {!! $setting->terms !!}
        </div>
    </section>
@endsection
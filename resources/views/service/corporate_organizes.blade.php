@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Organizes | Corporate Organizes | ' . $setting->title)
@section('meta-title',  'Organizes | Corporate Organizes | ' . $setting->title)
@section('meta-description', 'You can find corporate organization's lists and know about their working details and information. DoctorEbari is the best platform to appoint doctors and get health tips.')
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Organizes | Corporate Organizes | ' . $setting->title)
@section('og-description', 'You can find corporate organization's lists and know about their working details and information. DoctorEbari is the best platform to appoint doctors and get health tips.')
@section('twitter-title',  'Organizes | Corporate Organizes | ' . $setting->title)
@section('twitter-description', 'You can find corporate organization's lists and know about their working details and information. DoctorEbari is the best platform to appoint doctors and get health tips.')
@section('meta-image', asset('../storage/app/public/image/setting/corporate-organization-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/corporate-organization-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/corporate-organization-cover.png'))

@extends('layouts.app')

@section('content')
    <section style="background-image: url('public/front/images/coverimage1.jpg'); width: 100%; height: 260px;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4" style="line-height: 260px">Our <span>Social Organizes</span></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
           {{--  <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Our <span>Social Organizes</span></h2>
                </div>
            </div>  --}} 
            <div class="row">
                @foreach($corporateorganizes as $corporateorganize)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <a href="{{ route('social_organize.details',$corporateorganize->slug) }}">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$corporateorganize->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <h3 class="mb-2">{{ $corporateorganize->name }}</h3></a>
                            <span class="position mb-2">{{ $corporateorganize->phone }}</span>
                            <div class="faded">
                                <p>{!! $corporateorganize->address !!}</p>
                                <button class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Call Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $corporateorganizes->links() }}
            </div>
        </div>
    </section>
@endsection
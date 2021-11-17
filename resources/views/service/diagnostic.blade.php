@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Diagnostic Services | ' . $setting->title)
@section('meta-title',  'Diagnostic Services | ' . $setting->title)
@section('meta-description', 'DoctorEbari is the easiest way to know more information about any diagnostic center. You will know their more details of centre and communication information.')
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Diagnostic Services | ' . $setting->title)
@section('og-description', 'DoctorEbari is the easiest way to know more information about any diagnostic center. You will know their more details of centre and communication information.')
@section('twitter-title',  'Diagnostic Services | ' . $setting->title)
@section('twitter-description', 'DoctorEbari is the easiest way to know more information about any diagnostic center. You will know their more details of centre and communication information.')
@section('meta-image', asset('../storage/app/public/image/setting/diagnostics-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/diagnostics-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/diagnostics-cover.png'))

@extends('layouts.app')

@section('content')
    <section style="background-image:url('public/front/images/diagnostics-cover.jpg');width:100%;height:260px;background-size:cover;background-repeat:no-repeat;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4" style="line-height: 260px">Our Provided <span class="text-success">Diagnostic Centers</span></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
             <div class="row justify-content-center pb-3">
              <div class="col-md-10 offset-1 text-center heading-section ftco-animate">
                <form action="{{ route('search') }}" class="appointment-form-intro ftco-animate">
                    <div class="d-flex">
                        <div class="form-group">
                            <div class="form-field">
                                <div class="select-wrap">
                                    <input type="search" name="search" placeholder="Doctor & Services" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Search" class="btn-custom form-control py-3 px-4">
                        </div>
                    </div>
                </form>
              </div>
            </div>
            <div class="row">
                @foreach($diagnostics as $diagnostic)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$diagnostic->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('diagnostic.details',$diagnostic->slug) }}"><h3 class="mb-2">{{ Str::words($diagnostic->name, 4,'..') }}</h3></a>
                            @if($diagnostic->sms_status == 1)
                            <span class="position mb-2">{{ $diagnostic->phone }}</span>
                            @else
                            @endif
                            <div class="faded">
                                <p style="height: 54px;">{!! $diagnostic->address !!}</p>
                                <a href="{{ route('diagnostic.details',$diagnostic->slug) }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $diagnostics->links() }}
            </div>
        </div>
    </section>
@endsection
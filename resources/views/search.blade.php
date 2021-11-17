@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Search Result | ' . $setting->title)
@section('meta-title',  'Search Result | ' . $setting->title)
@section('meta-description', $setting->meta_description)
@section('meta-keywords', $setting->meta_keywords)
@section('og-title', 'Search Result | ' . $setting->title)
@section('og-description', $setting->meta_description)
@section('twitter-title',  'Search Result | ' . $setting->title)
@section('twitter-description', $setting->meta_description)
@section('meta-image', asset('../storage/app/public/'.$setting->cover_image))
@section('og-image', asset('../storage/app/public/'.$setting->cover_image))
@section('twitter-image', asset('../storage/app/public/'.$setting->cover_image))

@extends('layouts.app')

@section('content')
  <section style="background-image: url('public/front/images/coverimage1.jpg'); width: 100%; height: 260px;" data-stellar-background-ratio="0.5">
      <div class="container">
          <div class="row justify-content-center pb-3">
              <div class="col-md-8 text-center heading-section ftco-animate">
                @if($search)
                  <h2 class="mb-4" style="line-height: 260px">Search Result for <span>{{ $search }}</h2>
                @else
                  <h2 class="mb-4" style="line-height: 260px">Ups..No result found <span>{{ $search }}</h2>
                @endif
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
        </div>
    </section>
    
    @if(count($doctors) > 0)
        
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
            <div class="row">
    @foreach($doctors as $doctor)
                <div class="col-lg-3 col-md-6 col-sm-6 ftco-animate">
                    <div class="staff">
                      <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$doctor->image) }})"></div>
                      </div>
                      <div class="text text-center">
                        <a href="{{ route('doctor.details',$doctor->slug) }}"><h3 style="height:50px;" class="mb-2">{{ $doctor->name }}</h3>
                        <small style="color:black;">{{ $doctor->sur_name }}</small>
                        </a>
                        <span class="position mb-2">{{ $doctor->department->name }}</span>
                        <span class="position mb-2">District : {{ $doctor->district->district_name }}</span>
                        <div class="faded">
                            <div style="height:60px;">
                                <p>{!! Str::limit(str_replace($replace, ' ', $doctor->description),'40','...') !!}</p>
                            </div>
                            <div style="margin-top:20px;">
                                @if($doctor->sms_status == 1)
                                <a href="{{ route('book_now',$doctor->slug) }}" class="btn btn-block btn-success" style="background: #3bc053;border-color: #3bc053;">Booking Now</a>
                                <a href="tel:{{ $doctor->hotline }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Call Now</a>
                                @else
                                <a href="{{ route('doctor.details',$doctor->slug) }}" class="btn btn-block btn-success" style="background: #3bc053;border-color: #3bc053;">Details</a>
                                <a href="{{ route('doctor.details',$doctor->slug) }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">More Info</a>
                                @endif
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
    @endforeach
            </div>
            
        </div>
    </section>
    @elseif(count($shops) > 0)
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
            {{-- <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Search Result for <span>{{ $search }}</span></h2>
                </div>
            </div>  --}} 
            <div class="row">
    @foreach($shops as $shop)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$shop->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('shop.details',$shop->slug) }}"><h3 class="mb-2">{{ $shop->name }}</h3></a>
                            <table class="table">
                                <tr>
                                    <td><span>Selling Price</span></td>
                                    <td>: {{ $shop->sell_price }}</td>
                                </tr>
                            </table>
                            <div class="faded">
                                <p>{!! Str::words( $shop->details, '10','...') !!}</p>
                                <button class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
            </div>
           
        </div>
    </section>

    @elseif(count($hospitals) > 0)
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid"> 
          {{--   <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Search Result for <span>{{ $search }}</span></h2>
                </div>
            </div>  --}} 
          
            <div class="row">
    @foreach($hospitals as $hospital)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$hospital->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('hospital.details',$hospital->slug) }}"><h3 class="mb-2">{{ $hospital->name }}</h3></a>
                            <span class="position mb-2">{{ $hospital->phone }}</span>
                            <div class="faded">
                                <p>{!! $hospital->address !!}</p>
                                <a href="{{ route('hospital.details',$hospital->slug) }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
            </div>
           
        </div>

    @endforeach
    @elseif( count($ambulances) > 0)

    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid"> 
           {{--  <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Search Result for <span>{{ $search }}</span></h2>
                </div>
            </div>   --}}

            <div class="row">
    @foreach( $ambulances as $ambulance)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$ambulance->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('ambulance.details',$ambulance->slug) }}"><h3 class="mb-2">{{ $ambulance->name }}</h3></a>
                            <span class="position mb-2">{{ $ambulance->phone }}</span>
                            <div class="faded">
                                <p>{!! $ambulance->address !!}</p>
                                <a href="{{ route('ambulance.details',$ambulance->slug) }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
            </div>
            
        </div>
    </section>
    @elseif(count($diagnostics))
    <section class="ftco-section bg-light" style="padding-top: 50px;">
        <div class="container-fluid">
            {{-- <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Search Result for <span>{{ $search }}</span></h2>
                </div>
            </div>  --}}
            <div class="row">
    @foreach($diagnostics as $diagnostic)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$diagnostic->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('diagnostic.details',$diagnostic->slug) }}"><h3 class="mb-2">{{ $diagnostic->name }}</h3></a>
                            <span class="position mb-2">{{ $diagnostic->phone }}</span>
                            <div class="faded">
                                <p>{!! $diagnostic->address !!}</p>
                                <a href="{{ route('diagnostic.details',$diagnostic->slug) }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
            </div>
           
        </div>
    </section>

    @endif
@endsection


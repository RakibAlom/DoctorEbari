@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title',  'Our Shop | ' . $setting->title)
@section('meta-title',  'Our Shop | ' . $setting->title)
@section('meta-description', 'In our store, you will find a variety of beauty product items at very low prices, including medical products. You can buy or order easily from our shop.')
@section('meta-keywords', 'online shop, doctorebari shop, shop, ecommerce, health product, medicine product, beauty and nature product, buy medicine, doctorebari, online product, health and wealthy product, health product in bd')
@section('og-title', 'Our Shop | ' . $setting->title)
@section('og-description', 'In our store, you will find a variety of beauty product items at very low prices, including medical products. You can buy or order easily from our shop.')
@section('twitter-title',  'Our Shop | ' . $setting->title)
@section('twitter-description', 'In our store, you will find a variety of beauty product items at very low prices, including medical products. You can buy or order easily from our shop.')
@section('meta-image', asset('../storage/app/public/image/setting/shop-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/shop-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/shop-cover.png'))

@extends('layouts.app')

@section('content')
    <section style="background-image: url('public/front/images/coverimage1.jpg'); width: 100%; height: 260px;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4" style="line-height: 260px">Our <span class="text-success">Shop</span></h2>
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
                @foreach($shops as $shop)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$shop->image) }}); width: 100%; border: 0px; border-radius: 0;"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('shop.details',$shop->slug) }}"><h3 class="mb-2">{{ $shop->name }}</h3></a>
                            <table class="table">
                                <tr class="font-weight-bold">
                                    <td><span>Selling Price</span></td>
                                    <td class="text-danger font-weight-bold">: {{ $shop->sell_price }} ৳</td>
                                </tr>
                            </table>
                            <div class="faded">
                                <a  @if($setting) href="tel:{{ $setting->hotline }}" @else href="#" @endif class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $shops->links() }}
            </div>
        </div>
    </section>
@endsection
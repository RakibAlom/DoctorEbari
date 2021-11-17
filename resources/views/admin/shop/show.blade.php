@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('backend/css/plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/plugins/slick/slick-theme.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="product-images">
                                        <div>
                                            <div class="image-imitation" style="padding: 0px;">
                                                <img src="{{ asset('../storage/app/public/'.$product->image) }}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        {{ $product->name }}
                                    </h2>
                                    <div class="m-t-md">
                                        <h4 class="product-main-price font-weight-bold">Selling Price: <span class="text-success">৳{{ $product->sell_price }}</span> <span class="float-right">Buying Price: <span class=" text-warning">৳{{ $product->buy_price }}</span></span></h4>
                                    </div>
                                    <hr>
                                    <dl class="m-t-md">
                                        <dt>Product Code</dt>
                                        <dd>{{ $product->code }}</dd>
                                        <dt>Product Category</dt>
                                        <dd>{{ $product->category }}</dd>
                                        <dt>Prodcut Store Date</dt>
                                        <dd>{{ $product->created_at }}</dd>
                                    </dl>

                                    <h4>Product description</h4>

                                    <div class="small text-muted">
                                        {!! $product->details !!}
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="ibox-footer">
                            <span class="float-right">
                                Store - <i class="fa fa-clock-o"></i> {{ $product->created_at->diffForHumans() }}
                            </span>
                            Medex Product Details
                        </div>
                    </div>

                </div>
            </div>

        </div>

@endsection

@section('js')
<!-- slick carousel-->
<script src="{{ asset('backend/js/plugins/slick/slick.min.js') }}"></script>
<script>
    $(document).ready(function(){

        $('.product-images').slick({
            dots: true
        });

    });

</script>
@endsection


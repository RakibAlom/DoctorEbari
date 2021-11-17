@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit {{ $product->name }}'s Information <a href="{{ route('list.product') }}" class="btn btn-sm btn-primary float-right">All products</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.product',$product->shop_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" placeholder="enter product name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL Slug (Unique)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $product->slug }}" placeholder="ex: product-name" required>
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Product Category (optional)</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $product->category }}" placeholder="enter category name">
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Product Code (Optional)</label>
                        <input type="tel" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $product->code }}" placeholder="enter product code">
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Sell Price (Optional)</label>
                        <input type="tel" class="form-control @error('sell_price') is-invalid @enderror" name="sell_price" value="{{ $product->sell_price }}" placeholder="enter sell price">
                        @error('sell_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Buy Price (Optional)</label>
                        <input type="tel" class="form-control @error('buy_price') is-invalid @enderror" name="buy_price" value="{{ $product->buy_price }}" placeholder="enter buy price">
                        @error('buy_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="photoChange(this)">
                                <input type="hidden" name="old_image" value="{{ $product->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <img class="img-thumbnail" src="{{ asset('../storage/app/public/'.$product->image) }}" alt="{{ $product->name }}" id="photo" style="height: 40px; width: 40px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Keywords</label>
                        <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ $product->keywords }}" placeholder="ex: product name, medicine name, power name">
                        @error('keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>product Organize Details (optional)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="editor">{{ $product->details }}</textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update {{ $product->name }} Information</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
	function photoChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail")
			  	.attr("height",'45px')
			  	.attr("width",'45px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
</script>
@endsection

@section('js')
{{-- ckeditor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor');
</script>
@endsection

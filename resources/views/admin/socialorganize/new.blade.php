@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">New Social Organize Form <a href="{{ route('list.social') }}" class="btn btn-sm btn-primary float-right">All socials</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('store.social') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Social Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="enter social name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL Slug (Unique)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="ex: social-name" required>
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Organize Type</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" placeholder="ex: Blood Service" required>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Social Address</label>
                        <input type="tel" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="enter address" required>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="">Organizes</label>
                        <select name="organizes" id="" class="form-control @error('organizes') is-invalid @enderror" required>
                            <option>Social Organizes</option>
                            <option>Corporate Organizes</option>
                        </select>
                        @error('organizes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="enter phone number" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hotline Number</label>
                        <input type="tel" class="form-control @error('hotline') is-invalid @enderror" name="hotline" value="{{ old('hotline') }}" placeholder="enter hotline number">
                        @error('hotline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" onchange="photoChange(this)" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <img class="ml-5" src="" alt="" id="photo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>social Description (optional)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" id="editor"></textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">New social</button>
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

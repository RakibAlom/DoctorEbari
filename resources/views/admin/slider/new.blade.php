@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Top Banner Form</h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
    @if(!$sliders)
        <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Slider Title (max-limit: 36 characters)</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="enter slider title" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo (Max size:500px*1580px)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" onchange="photoChange(this)" required>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Slider Details (max-limit: 140 characters)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}"></textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <img class="ml-5" src="" alt="" id="photo">
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">New slider</button>
                </div>
            </div>
        </form>
    @else
        <form action="{{ route('update.slider',$sliders->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Slider Title (max-limit: 36 characters)</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $sliders->title }}" placeholder="enter slider title" >
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input type="file" class="form-control" name="image" onchange="photoChange(this)">
                        <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Slider Details (max-limit: 140 characters)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details">{{ $sliders->details }}</textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <img class="img-thumbnail" src="{{ asset('../storage/app/public/'.$sliders->image) }}" alt="{{ $sliders->name }}" id="photo">
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Slider</button>
                </div>
            </div>
        </form>
    @endif

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

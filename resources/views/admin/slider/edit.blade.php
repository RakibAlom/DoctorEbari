@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit Slider Information <a href="{{ route('list.slider') }}" class="btn btn-sm btn-primary float-right">All Slider</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.slider',$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Slider Title (max-limit: 36 characters)</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $slider->title }}" placeholder="enter slider title" required>
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
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="photoChange(this)">
                        <input type="hidden" name="old_image" value="{{ $slider->image }}">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Slider Details (max-limit: 140 characters)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details">{{ $slider->details }}</textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <img class="img-thumbnail" src="{{ asset('../storage/app/public/'.$slider->image) }}" alt="{{ $slider->name }}" id="photo">
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Slider</button>
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

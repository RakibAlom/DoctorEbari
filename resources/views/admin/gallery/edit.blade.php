@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit {{ $gallery->title }}'s Information <a href="{{ route('list.gallery') }}" class="btn btn-sm btn-primary float-right">All gallerys</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.gallery',$gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Gallery Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $gallery->title }}" placeholder="enter gallery title" required>
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
                        <div class="row">
                            <div class="col-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="photoChange(this)">
                                <input type="hidden" name="old_image" value="{{ $gallery->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <img class="img-thumbnail mt-3" src="{{ asset('../storage/app/public/'.$gallery->image) }}" alt="{{ $gallery->name }}" id="photo">
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Gallery</button>
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

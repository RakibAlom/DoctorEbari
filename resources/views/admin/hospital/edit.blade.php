@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit {{ $hospital->name }}'s Information <a href="{{ route('list.hospital') }}" class="btn btn-sm btn-primary float-right">All Hospitals</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.hospital',$hospital->h_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Hospital Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $hospital->name }}" placeholder="enter hospital name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL Slug (Unique)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $hospital->slug }}" placeholder="ex: hospital-name" required>
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hospital Address</label>
                        <input type="tel" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $hospital->address }}" placeholder="enter address" required>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $hospital->phone }}" placeholder="enter phone number" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hotline Number</label>
                        <input type="tel" class="form-control @error('hotline') is-invalid @enderror" name="hotline" value="{{ $hospital->hotline }}" placeholder="enter hotline number">
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
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="photoChange(this)">
                                <input type="hidden" name="old_image" value="{{ $hospital->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <img class="img-thumbnail" src="{{ asset('../storage/app/public/'.$hospital->image) }}" alt="{{ $hospital->name }}" id="photo" style="height: 40px; width: 40px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Call Number</label>
                    <select class="form-control" name="call_status">
                        <option value="1" @if($hospital->call_status == 1) selected="" @endif>Yes</option>
                        <option value="0" @if($hospital->call_status == 0) selected="" @endif>No</option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <label>Hospital Details (optional)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="editor">{{ $hospital->details }}</textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update {{ $hospital->name }} Information</button>
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

@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit {{ $social->name }}'s Information <a href="{{ route('list.social') }}" class="btn btn-sm btn-primary float-right">All socials</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.social',$social->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Organize Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $social->name }}" placeholder="enter social name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL Slug (Unique)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $social->slug }}" placeholder="ex: social-name" required>
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Organize Type</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $social->type }}" placeholder="ex: social-name" required>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">social Address</label>
                        <input type="tel" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $social->address }}" placeholder="enter address" required>
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
                            <option @if($social->organizes = 'Social Organizes') value="Social Organizes" selected  @endif>Social Organizes</option>
                            <option @if($social->organizes = 'Corporate Organizes') value="Corporate Organizes" selected @endif>Corporate Organizes</option>
                        </select>
                        @error('organizes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $social->phone }}" placeholder="enter phone number" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Hotline Number</label>
                        <input type="tel" class="form-control @error('hotline') is-invalid @enderror" name="hotline" value="{{ $social->hotline }}" placeholder="enter hotline number">
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
                                <input type="hidden" name="old_image" value="{{ $social->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <img class="img-thumbnail" src="{{ asset('../storage/app/public/'.$social->image) }}" alt="{{ $social->name }}" id="photo" style="height: 40px; width: 40px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Social Organize Details (optional)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="editor">{{ $social->details }}</textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update {{ $social->name }} Information</button>
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

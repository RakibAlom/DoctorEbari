@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit {{ $staff->name }}'s Information <a href="{{ route('list.staff') }}" class="btn btn-sm btn-primary float-right">All Staff</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.staff',$staff->staff_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Staff Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $staff->name }}" placeholder="enter staff name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Staff slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $staff->slug }}" placeholder="enter staff slug">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Designation</label>
                        <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $staff->designation }}" placeholder="ex: service holder">
                        @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $staff->phone }}" placeholder="enter phone number">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email (optional)</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $staff->email }}" placeholder="enter email address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Facebook Link</label>
                        <input type="text" class="form-control @error('fb_lik') is-invalid @enderror" name="fb_link" value="{{ $staff->fb_link }}" placeholder="ex: http://www.facebook.com">
                        @error('fb_lik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Twitter Link</label>
                        <input type="text" class="form-control @error('twitter_link') is-invalid @enderror" name="twitter_link" value="{{ $staff->twitter_link }}" placeholder="ex: http://www.twitter.com">
                        @error('twitter_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Instagram Link</label>
                        <input type="text" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link" value="{{ $staff->instagram_link }}" placeholder="ex: http://www.instagram.com">
                        @error('instagram_link')
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
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <img class="img-thumbnail" src="{{ asset('../storage/app/public/'.$staff->image) }}" alt="{{ $staff->name }}" id="photo" style="height:45px;width:45px;">
                                    <input type="hidden" name="old_image" value="{{ $staff->image }}">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $staff->address }}" placeholder="ex: Kolapara, Sylhet, Bangladesh">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>About Staff (max-limit: 80 characters)</label>
                    <textarea class="form-control @error('details') is-invalid @enderror" name="details">{{ $staff->details }}</textarea>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-block btn-primary mt-3">Update {{ $staff->name }} Information</button>
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

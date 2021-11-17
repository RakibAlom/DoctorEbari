@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">New Gallery Form <a href="{{ route('list.advertise') }}" class="btn btn-sm btn-primary float-right">All Reviews</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        @if(!$advertises)
        <form action="{{ route('store.advertise') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Photo Ad 1 (380px*780px)</label>
                        <div class="row">
                                <input type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" value="{{ old('image1') }}" onchange="photoChange(this)">
                                @error('image1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <img src="" alt="" id="photo" style="height: 130px; width: auto;">
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo Ad 1 (Link)</label>
                        <div class="row">
                            <input type="text" class="form-control @error('image1_link') is-invalid @enderror" name="image1_link" value="{{ old('image1_link') }}" onchange="photoChange(this)">
                            @error('image1_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Photo Ad 2 (320px*1580px)</label>
                        <div class="row">
                                <input type="file" class="form-control @error('image2') is-invalid @enderror" name="image2" value="{{ old('image2') }}" onchange="photoChange(this)">
                                @error('image2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <img src="" alt="" id="photo1" style="height: 130px; width: auto;">
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo Ad 2 (Link)</label>
                        <div class="row">
                            <input type="text" class="form-control @error('image2_link') is-invalid @enderror" name="image2_link" value="{{ old('image2_link') }}" onchange="photoChange(this)">
                            @error('image2_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Animation Ad (max:15mb)</label>
                        <div class="row">
                                <input type="file" class="form-control @error('animation') is-invalid @enderror" name="animation" value="{{ old('animation') }}" onchange="photoChange(this)">
                                @error('animation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <video src="" alt="" id="photo2" style="height: 130px; width: auto;"></video>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Animation Ad (Link)</label>
                        <div class="row">
                            <input type="text" class="form-control @error('animation_link') is-invalid @enderror" name="animation_link" value="{{ old('animation_link') }}" onchange="photoChange(this)">
                            @error('animation_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Video Ad Youtube Embed Link</label>
                        <div class="row">
                                <input type="text" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}">
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <videosrc="" alt="" id="photo3" style="height: 130px; width: auto;"></video> 
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Animation Ad (Link)</label>
                        <div class="row">
                            <input type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" value="{{ old('video_link') }}" onchange="photoChange(this)">
                            @error('video_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Save</button>
                </div>
            </div>
        </form>
        @else
        <form action="{{ route('update.advertise',$advertises->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo Ad 1</label>
                        <div class="row">
                                <input type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" value="{{ old('image1') }}" onchange="photoChange(this)">
                                <input type="hidden" name="oldimage1" value="{{ $advertises->image1 }}">
                                <img class="img-thumbnail mt-4" src="{{ asset('../storage/app/public/'.$advertises->image1) }}" id="icon" style="height: 120px;">
                                @error('image1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo Ad 1 (Link)</label>
                        <div class="row">
                        <input type="text" class="form-control @error('image1_link') is-invalid @enderror" name="image1_link" value="{{$advertises->image1_link}}">
                            @error('image1_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo Ad 2</label>
                        <div class="row">
                                <input type="file" class="form-control @error('image2') is-invalid @enderror" name="image2" value="{{ old('image2') }}" onchange="photoChange1(this)" >
                                <input type="hidden" name="oldimage2" value="{{ $advertises->image2 }}">
                                <img class="img-thumbnail mt-4" src="{{ asset('../storage/app/public/'.$advertises->image2) }}" id="icon" style="height: 120px;">
                                @error('image2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Photo Ad 2 (Link)</label>
                        <div class="row">
                            <input type="text" class="form-control @error('image2_link') is-invalid @enderror" name="image2_link" value="{{ $advertises->image2_link }}">
                            @error('image2_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Animation Ad</label>
                        <div class="row">
                                <input type="file" class="form-control @error('animation') is-invalid @enderror" name="animation" value="{{ old('animation') }}" onchange="photoChange2(this)" >
                            @if($advertises->animation)
                                <input type="hidden" name="oldanimation" value="{{ $advertises->animation }}">
                                <video class="img-thumbnail mt-4" src="{{ asset('../storage/app/public/'.$advertises->animation) }}" id="icon" style="height: 120px;" controls></video>
                            @endif
                                @error('animation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Animation Ad (Link)</label>
                        <div class="row">
                            <input type="text" class="form-control @error('animation_link') is-invalid @enderror" name="animation_link" value="{{ $advertises->animation_link }}">
                            @error('animation_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Video Ad</label>
                        <div class="row">
                                <input type="text" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ $advertises->video }}">
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Video Ad (Link)</label>
                        <div class="row">
                            <input type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" value="{{ $advertises->video_link }}">
                            @error('video_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <img class="ml-5" src="" alt="" id="photo">
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Save</button>
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
			  	.attr("class","img-thumbnail mt-3")
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
	function photoChange1(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo1')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-3")
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
	function photoChange2(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo2')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-3")
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
	function photoChange3(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#photo3')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-3")
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

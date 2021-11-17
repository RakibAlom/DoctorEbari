@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Setting</h3>
    </div>
</div>
<div class="wrapper wrapper-content container">
	@if(!$setting)
	<form action="{{ route('store.setting') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" placeholder="enter website title" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="ex: info@website.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Phone Number (Call Now)</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="enter phone number">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Hotline Number</label>
                    <input type="text" class="form-control @error('hotline') is-invalid @enderror" value="{{ old('hotline') }}" name="hotline" placeholder="enter hotline number">
                    @error('hotline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" placeholder="ex: Sylhet, Bangladesh">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control @error('web_link') is-invalid @enderror" value="{{ old('web_link') }}" name="web_link" placeholder="ex: http://www.yourwebsite.com">
                    @error('web_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Facebook Link</label>
                    <input type="text" class="form-control @error('fb_link') is-invalid @enderror" value="{{ old('fb_link') }}" name="fb_link" placeholder="ex: http://www.facebook.com">
                    @error('fb_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Youtube Link</label>
                    <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" value="{{ old('youtube_link') }}" name="youtube_link" placeholder="ex: http://www.youtube.com">
                    @error('youtube_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Twitter Link</label>
                    <input type="text" class="form-control @error('twitter_link') is-invalid @enderror" value="{{ old('twitter_link') }}" name="twitter_link" placeholder="ex: http://www.twitter.com">
                    @error('twitter_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Instagram Link</label>
                    <input type="text" class="form-control @error('instagram_link') is-invalid @enderror"  value="{{ old('instagram_link') }}" name="instagram_link" placeholder="ex: http://www.instagram.com">
                    @error('instagram_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Years of Experiences</label>
                    <input type="number" class="form-control @error('service_years') is-invalid @enderror" value="{{ old('service_years') }}" name="service_years" placeholder="ex: 5">
                    @error('service_years')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Total Patients</label>
                    <input type="text" class="form-control @error('total_patients') is-invalid @enderror"  value="{{ old('total_patients') }}" name="total_patients" placeholder="ex: 300">
                    @error('total_patients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Total Doctors</label>
                    <input type="text" class="form-control @error('total_doctors') is-invalid @enderror" value="{{ old('total_doctors') }}" name="total_doctors" placeholder="ex: 80">
                    @error('total_doctors')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Total Staff</label>
                    <input type="text" class="form-control @error('total_staffs') is-invalid @enderror"  value="{{ old('total_staffs') }}" name="total_staffs" placeholder="ex: 30">
                    @error('total_staffs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-12">
				<div class="form-group">
					<label>Notice</label>
                    <input class="form-control @error('notice') is-invalid @enderror" value="{{ old('notice') }}" name="notice" placeholder="ex: welcome to our service site. How can I help you?">
                    @error('notice')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Meta Description (max-limit: 160 character)</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" value="{{ old('meta_description') }}" name="meta_description" placeholder="enter a short description for your website...">{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Meta Keywords</label>
                    <textarea class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords') }}" name="meta_keywords" placeholder="ex: health, doctor, doctor appoinment">{{ old('meta_keywords') }}</textarea>
                    @error('meta_keywords')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>About (max-limit: 600 character)</label>
                    <textarea class="form-control @error('about') is-invalid @enderror" value="{{ old('about') }}" name="about" placeholder="enter a short description for your website...">{{ old('about') }}</textarea>
                    @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Terms & Condition</label>
                    <textarea class="form-control @error('terms') is-invalid @enderror" name="terms" id="editor" placeholder="type your terms & condition for your website...">{{ old('terms') }}</textarea>
                    @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Privacy Policy</label>
                    <textarea class="form-control @error('privacy') is-invalid @enderror" name="privacy" id="editor2" placeholder="type your privacy for your website...">{{ old('privacy') }}</textarea>
                    @error('privacy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-sm-4">
                <label for="">favicon</label>
                <input type="file" onchange="iconChange(this)" name="favicon" class="form-control">
                <img src="" id="icon">
            </div>
            <div class="col-sm-4">
                <label for="">Logo</label>
                <input type="file" onchange="logoChange(this)" name="logo" class="form-control">
                <img src="" id="logo">
            </div>
            <div class="col-sm-4">
                <label for="">Cover Image</label>
                <input type="file" onchange="coverChange(this)" name="cover_image" class="form-control">
                <img src="" id="cover">
            </div>

			<div class="col-md-12 my-4">
				<button type="submit" class="btn btn-primary btn-block col-md-12">Upload Website Information</button>
			</div>
		</div>
	</form>

	@else

	<form action="{{ route('update.setting') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $setting->title }}" name="title" placeholder="enter website title" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $setting->email }}" name="email" placeholder="ex: info@website.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Phone Number (Call Now)</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $setting->phone }}" name="phone" placeholder="enter phone number">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Hotline Number</label>
                    <input type="text" class="form-control @error('hotline') is-invalid @enderror" value="{{ $setting->hotline }}" name="hotline" placeholder="enter hotline number">
                    @error('hotline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $setting->address }}" name="address" placeholder="ex: Sylhet, Bangladesh">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control @error('web_link') is-invalid @enderror" value="{{ $setting->web_link }}" name="web_link" placeholder="ex: http://www.yourwebsite.com">
                    @error('web_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Facebook Link</label>
                    <input type="text" class="form-control @error('fb_link') is-invalid @enderror" value="{{ $setting->fb_link }}" name="fb_link" placeholder="ex: http://www.facebook.com">
                    @error('fb_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Youtube Link</label>
                    <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" value="{{ $setting->youtube_link }}" name="youtube_link" placeholder="ex: http://www.youtube.com">
                    @error('youtube_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Twitter Link</label>
                    <input type="text" class="form-control @error('twitter_link') is-invalid @enderror" value="{{ $setting->twitter_link }}" name="twitter_link" placeholder="ex: http://www.twitter.com">
                    @error('twitter_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Instagram Link</label>
                    <input type="text" class="form-control @error('instagram_link') is-invalid @enderror"  value="{{ $setting->instagram_link }}" name="instagram_link" placeholder="ex: http://www.instagram.com">
                    @error('instagram_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Years of Experience</label>
                    <input type="text" class="form-control @error('service_years') is-invalid @enderror" value="{{ $setting->service_years }}" name="service_years" placeholder="ex: 5">
                    @error('service_years')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Total Patients</label>
                    <input type="text" class="form-control @error('total_patients') is-invalid @enderror"  value="{{ $setting->total_patients }}" name="total_patients" placeholder="ex: 300">
                    @error('total_patients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Total Doctors</label>
                    <input type="text" class="form-control @error('total_doctors') is-invalid @enderror" value="{{ $setting->total_doctors }}" name="total_doctors" placeholder="ex: 80">
                    @error('total_doctors')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label>Total Staff</label>
                    <input type="text" class="form-control @error('total_staffs') is-invalid @enderror"  value="{{ $setting->total_staffs }}" name="total_staffs" placeholder="ex: 30">
                    @error('total_staffs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-12">
				<div class="form-group">
					<label>Notice</label>
                    <input type="text" class="form-control @error('notice') is-invalid @enderror" value="{{ $setting->notice }}" name="notice" placeholder="ex: welcome to our service site. How can I help you?">
                    @error('notice')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Meta Description (max-limit: 160 character)</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" value="{{ $setting->meta_discription }}" name="meta_description" placeholder="enter a short description for your website...">{{ $setting->meta_description }}</textarea>
                    @error('meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>
            <div class="col-md-6">
				<div class="form-group">
					<label>Meta Keywords</label>
                    <textarea class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ $setting->meta_keywords }}" name="meta_keywords" placeholder="ex: health, doctor, doctor appoinment">{{ $setting->meta_keywords }}</textarea>
                    @error('meta_keywords')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>About (max-limit: 600 character)</label>
                    <textarea class="form-control @error('about') is-invalid @enderror"  name="about" placeholder="enter a short description for your website...">{{ $setting->about }}</textarea>
                    @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Terms & Condition</label>
                    <textarea class="form-control @error('terms') is-invalid @enderror" name="terms" id="editor" placeholder="type your terms & condition for your website...">{{ $setting->terms }}</textarea>
                    @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Privacy Policy</label>
                    <textarea class="form-control @error('privacy') is-invalid @enderror" name="privacy" id="editor2" placeholder="type your privacy for your website...">{{ $setting->privacy }}</textarea>
                    @error('privacy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-4">
                <label for="">favicon</label>
                <input type="file" onchange="iconChange(this)" name="favicon" class="form-control">
                <input type="hidden" name="oldfavicon" value="{{ $setting->favicon }}">
                <img class="img-thumbnail mt-4" src="{{ asset('../storage/app/public/'.$setting->favicon) }}" id="icon" style="height: 120px;">
            </div>
            <div class="col-sm-4">
                <label for="">Logo</label>
                <input type="file" onchange="logoChange(this)" name="logo" class="form-control">
                <input type="hidden" name="oldlogo" value="{{ $setting->logo }}">
                <img class="img-thumbnail mt-4" src="{{ asset('../storage/app/public/'.$setting->logo) }}" id="logo" style="height: 120px;">
            </div>
            <div class="col-sm-4">
                <label for="">Cover Image</label>
                <input type="file" onchange="coverChange(this)" name="cover_image" class="form-control">
                <input type="hidden" name="oldcover" value="{{ $setting->cover_image }}">
                <img class="img-thumbnail mt-4" src="{{ asset('../storage/app/public/'.$setting->cover_image) }}" id="cover" style="height: 120px;">
            </div>

			<div class="col-md-12 my-4">
				<button type="submit" class="btn btn-success btn-block col-md-12">Update Website Information</button>
			</div>
		</div>
	</form>

	@endif
</div>

<script>
	function iconChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#icon')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-4")
			  	.attr("height",'120px')
			  	.attr("width",'120px')
          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
    function logoChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#logo')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-4")
			  	.attr("height",'120px')

          	};
          	reader.readAsDataURL(input.files[0]);
     	}
    }
    function coverChange(input) {
      	if (input.files && input.files[0]) {
          	var reader = new FileReader();
          	reader.onload = function (e) {
              	$('#cover')
              	.attr('src', e.target.result)
			  	.attr("class","img-thumbnail mt-4")
			  	.attr("height",'120px')
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
    CKEDITOR.replace( 'editor2');
</script>
@endsection


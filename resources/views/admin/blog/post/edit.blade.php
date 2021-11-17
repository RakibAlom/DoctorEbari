@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit {{ $post->name }}'s Information <a href="{{ route('list.post') }}" class="btn btn-sm btn-primary float-right">All Posts</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.post',$post->post_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Post title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" placeholder="enter post title" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL Slug (Unique)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $post->slug }}" placeholder="ex: post-slug-title" required>
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Post Category</label>
                        <select name="cat_id" id="" class="form-control @error('cat+id') is-invalid @enderror" required>
                            <option value="">select category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->cat_id }}" @if($category->cat_id == $post->cat_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('cat_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="photoChange(this)" required>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <img src="{{ asset('../storage/app/public/'.$post->image) }}" alt="$post->title" id="photo">
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Post Keywords</label>
                        <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ $post->keywords }}" placeholder="ex: health tips, সাস্থ্য বিষয়ক টিপস">
                        @error('keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-12 form-group">
                    <label>Post Description</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor" required>{!! $post->body !!}</textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Post</button>
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

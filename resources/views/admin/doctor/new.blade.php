@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">New Doctor Form <a href="{{ route('list.doctor') }}" class="btn btn-sm btn-primary float-right">All Doctors</a></h3>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('store.doctor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Doctor Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="enter doctor name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL Slug (Unique)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="ex: doctor-name" required>
                        @error('slug')
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
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Department</label>
                        <select name="department_id" id="" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}" required>
                            <option value="">select department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->department_id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Designation</label>
                        <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" placeholder="enter doctor designation">
                        @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Doctor Surname</label>
                        <input type="text" class="form-control @error('sur_name') is-invalid @enderror" name="sur_name" value="{{ old('sur_name') }}" placeholder="enter surname">
                        @error('sur_name')
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Division</label>
                        <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" value="{{ old('division_id') }}" required>
                            <option value="">select division</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->division_name}}</option>
                            @endforeach
                        </select>
                        @error('division_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">District</label>
                        <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" value="{{ old('district_id') }}" id="district_id" required>
                            <option value="">select district</option>
                            
                        </select>
                        @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Thana</label>
                        <select class="form-control @error('upzila_id') is-invalid @enderror" name="upzila_id" value="{{ old('upzila_id') }}" id="upzila_id" required>
                            <option value="">select Thana</option>
                            
                        </select>
                        @error('upzila_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Book Now</label>
                    <select class="form-control" name="sms_status">
                        <option value="1" selected="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <label for="">Post Keywords</label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ old('keywords') }}" placeholder="ex: doctor name, doctor position, doctor specalist">
                    @error('keywords')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <label>Doctor Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="editor" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Appoint New Doctor</button>
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
<script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="division_id"]').on('change',function(){
            var division_id = $(this).val();
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'{{ url("/fetch-district/") }}/'+division_id,
                success:function(data){
                     var d = $('select[name = "district_id"]').empty();
                     $('select[name = "district_id"]').append('<option>select district</option>');
                   $.each(data, function(key, value){
                    $('select[name = "district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                    });
                    
                },
            });
        })

        $('select[name="district_id"]').on('change',function(){
            var district_id = $(this).val();
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'{{ url("/fetch-upzila/") }}/'+district_id,
                success:function(data){
                     var d = $('select[name = "upzila_id"]').empty();
                     $('select[name = "upzila_id"]').append('<option>select upzila</option>');
                   $.each(data, function(key, value){
                    $('select[name = "upzila_id"]').append('<option value="'+value.id+'">'+value.upzila_name+'</option>');
                    });
                    
                },
            });
        })
    })
</script>
@endsection

@section('js')
{{-- ckeditor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor');
</script>
@endsection

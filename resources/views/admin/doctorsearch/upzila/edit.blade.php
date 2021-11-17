@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit Upzila<a href="{{ route('list.upzila') }}" class="btn btn-sm btn-primary float-right">All Upzila</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.upzila',$upzila->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        
                        <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" value="{{ old('division_id') }}" required>
                            <option selected="" value="{{ $upzila->division_id }}">{{ $upzila->district->division->division_name }}</option>
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
                <div class="col-md-12">
                    <div class="form-group">
                        
                        <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" value="{{ old('district_id') }}" id="district_id" required>
                            <option selected="" value="{{ $upzila->district_id }}">{{ $upzila->district->district_name }}</option>
                            
                        </select>
                        @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control @error('upzila_name') is-invalid @enderror" name="upzila_name" value="{{ $upzila->upzila_name }}" required>
                        @error('upzila_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
                <div class="row">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Add new Thana</button>
                </div>
        </form>
    </div>
</div>
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
                   $.each(data, function(key, value){
                    $('select[name = "district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                    });
                    
                },
            });
        })
    })
</script>
@endsection

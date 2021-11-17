@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">New District Form <a href="{{ route('list.district') }}" class="btn btn-sm btn-primary float-right">All District</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('store.district') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control @error('district_name') is-invalid @enderror" name="district_name" value="{{ old('district_name') }}" placeholder="enter District name" required>
                        @error('district_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        
                        <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" value="{{ old('division_id') }}" placeholder="enter Division name" required>
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
            </div>
                <div class="row">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Add new District</button>
                </div>
        </form>
    </div>
</div>
@endsection

@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Edit Division Form <a href="{{ route('list.division') }}" class="btn btn-sm btn-primary float-right">All Division</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('update.division',$division->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control @error('division_name') is-invalid @enderror" name="division_name" value="{{ $division->division_name }}" required>
                        @error('division_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Edit division</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

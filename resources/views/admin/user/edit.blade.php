@extends('admin.layouts.layout')

@section('css')
@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('admin.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Admin Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Active</label>
                        <select class="form-control" name="is_admin">
                            <option value="1" selected="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Information</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <form action="{{ route('admin.update.pass',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-sm btn-block btn-success mt-3">Update Information</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
{{-- ckeditor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor');
</script>
@endsection

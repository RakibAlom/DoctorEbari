@extends('admin.layouts.layout')

@section('css')
<link href="{{ asset('backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h3 class="font-weight-bold mt-3">Division List <a href="{{ route('create.district') }}" class="btn btn-sm btn-primary float-right">Add new district</a></h3>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
               	<thead>
                    <tr>
                        <th>SL</th>
                        <th>District</th>
                        <th>Division</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($districts as $district)
                    <tr class="gradeX">
                        <td>{{ $count++ }}</td>
                        <td>{{ $district->district_name }}</td>
                        <td>{{ $district->division_id }}</td>
                        <td>{{ $district->created_at->diffForHumans() }}</td>
                        <td class="center">
                        	<a href="{{ route('edit.district',$district->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        	<a href="{{ route('delete.district',$district->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>District</th>
                        <th>Division</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
	</div>
</div>

<!-- New division MODAL -->
<div id="newDep" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center rounded-0" role="document" style="max-width: 1000px;">
    <div class="modal-content rounded-0 bd-0 tx-14">
    <form action="{{ route('store.division') }}" method="POST">
        @csrf
      <div class="modal-header pd-y-20 pd-x-25">
        <h4 class="">New Department</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{ old('name') }}" required="">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Enter URL Slug" value="{{ old('slug') }}" required="">
            @error('slug')
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
        <div class="col-md-12 form-group">
            <label>Department Details</label>
            <textarea class="form-control @error('division') is-invalid @enderror" name="division" value="{{ old('division') }}" id="editor"></textarea>
            @error('division')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="btn btn-sm btn-block btn-success mt-3">New Ambulance</button>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info rounded-0">Save Department</button>
        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



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
<script src="{{ asset('backend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
{{-- ckeditor --}}
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor');
</script>
<script>

    //Hidding Button
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'Product division List'},
                {extend: 'pdf', title: 'Product division List'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });

</script>
@endsection


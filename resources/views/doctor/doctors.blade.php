@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp


@section('title',  'Doctor List | ' . $setting->title)
@section('meta-title',  'Doctor List | ' . $setting->title)
@section('meta-description', 'DoctorEbari is the largest finding doctor guide platform. You will also get doctor appointments and details, chamber address, visiting time, get number for serials, etc.')
@section('meta-keywords', 'doctor, doctors, doctors in bd, doctors in sylhet, doctors list, mbbs doctor, medicine specialist, surgery specialist, kidney specialist, cardiologist, cancer doctor, liver specialist, arthritis pain paralysis specialist, psychiatrist, dentist, hematologist, neurology doctor, urologist doctor, gynecologist, diabetes doctor, nose ear throat specialist, ent doctor, eye doctor, ডাক্তার, ডাক্তার লিষ্ট, চক্ষু ডাক্তার, নাক-কান-গলার ডাক্তার, সার্জারী ডাক্তার, যৌন ডাক্তার, দাঁতের ডাক্তার')
@section('og-title', 'Doctor List | ' . $setting->title)
@section('og-description', 'DoctorEbari is the largest finding doctor guide platform. You will also get doctor appointments and details, chamber address, visiting time, get number for serials, etc.')
@section('twitter-title',  'Doctor List | ' . $setting->title)
@section('twitter-description', 'DoctorEbari is the largest finding doctor guide platform. You will also get doctor appointments and details, chamber address, visiting time, get number for serials, etc.')
@section('meta-image', asset('../storage/app/public/image/setting/doctor-cover.png'))
@section('og-image', asset('../storage/app/public/image/setting/doctor-cover.png'))
@section('twitter-image', asset('../storage/app/public/image/setting/doctor-cover.png'))

@extends('layouts.app')
@section('content')

<section style="background-image:url('public/front/images/doctor-cover.jpg');width:100%;height:260px;background-size:cover;background-repeat:no-repeat;" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row justify-content-center pb-3">
      <div class="col-md-10 text-center heading-section ftco-animate">
         <h2 style="line-height:260px;">All Doctors and <span class="text-success">Search</span> Specific Doctors</h2>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section bg-light" style="padding-top: 50px;">
  <div class="container-fluid">
    <div class="row justify-content-center pb-3">
        <div class="col-md-10 text-center heading-section ftco-animate">
           <form action="{{ route('search.doctor')}}">
                <div class="row">
                    <div class="col-md-1" style="padding:0px 5px;"></div>
                    <div class="col-md-2" style="padding:0px 5px;">
                      <div class="form-group">
                        <select class="form-control" name="division_id" id="">
                          <option value="" disabled selected>select division</option>
                          @foreach($divisions as $division)
                          <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2" style="padding:0px 5px;">
                      <div class="form-group">
                        <select class="form-control" name="district_id" id="">
                          <option value="" disabled selected>select district</option>
                          @foreach($districts as $district)
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2" style="padding:0px 5px;">
                      <div class="form-group">
                        <select class="form-control" name="upzila_id" id="">
                          <option value="" disabled selected>select upzilla</option>
                          @foreach($upzilas as $upzila)
                          @endforeach
                        </select>
                      </div>
                    </div>
        
                    <div class="col-md-2" style="padding:0px 5px;">
                      <div class="form-group">
                        <select class="form-control" name="department_id" id="">
                          <option value="" disabled selected>Select Department</option>
                          @foreach($departments as $department)
                          <option value="{{ $department->department_id }}">{{ $department->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
        
                    <div class="col-md-2" style="padding:0px 5px;">
                      <div class="form-group">
                        <input type="submit" style="height: 50px; font-size: 22px;" value="Search" class="btn btn-success btn-block">
                      </div>
                    </div>
                    <div class="col-md-1" style="padding:0px 5px;"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
      @foreach($doctors as $doctor)
        <div class="col-lg-3 col-md-6 col-sm-6 ftco-animate">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch">
                <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$doctor->image) }})"></div>
              </div>
              <div class="text text-center">
                <a href="{{ route('doctor.details',$doctor->slug) }}"><h3 style="height:50px;" class="mb-2">{{ $doctor->name }}</h3>
                <small style="color:black;font-weight:bold;">{{ $doctor->sur_name }}</small>
                </a>
                <span class="position mb-2">{{ $doctor->department->name }}</span>
                <span class="position mb-2">District : {{ $doctor->district->district_name }}</span>
                <div class="faded">
                    <div style="height:60px;">
                        <p>{!! Str::limit(str_replace($replace, ' ', $doctor->description),'40','...') !!}</p>
                    </div>
                    <div style="margin-top:20px;">
                        @if($doctor->sms_status == 1)
                        <a href="{{ route('book_now',$doctor->slug) }}" class="btn btn-block btn-success" style="background: #3bc053;border-color: #3bc053;">Booking Now</a>
                        <a href="tel:{{ $doctor->hotline }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">Call Now</a>
                        @else
                        <a href="{{ route('doctor.details',$doctor->slug) }}" class="btn btn-block btn-success" style="background: #3bc053;border-color: #3bc053;">Details</a>
                        <a href="{{ route('doctor.details',$doctor->slug) }}" class="btn btn-block btn-danger" style="background: #dc3545; border-color: #dc3545;">More Info</a>
                        @endif
                    </div>
                </div>
              </div>
            </div>
        </div>
      @endforeach
    </div>
    <div class="row justify-content-center">
      {{ $doctors->links() }}
    </div>
  </div>
</section>

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
                     $('select[name = "district_id"]').append('<option>Select District</option>');
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
                     $('select[name = "upzila_id"]').append('<option>Select Upzila</option>');
                   $.each(data, function(key, value){
                    $('select[name = "upzila_id"]').append('<option value="'+value.id+'">'+value.upzila_name+'</option>');
                    });
                    
                },
            });
        })
    })
</script>
@endsection
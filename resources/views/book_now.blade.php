@php
    $setting = App\Models\Setting::first();
    $replace = array('<p>','</p>','<br>','</br>','<br />','<h1>','</h1>','<h2>','</h2>','<h3>','</h3>','<h4>','</h4>','<b>','</b>','<em>','</em>','<strong>','</strong>');
@endphp

@section('title', 'Get Appointment - ' . $doctor->name . ' | ' . $doctor->sur_name)
@section('meta-title',  'Get Appointment - ' . $doctor->name . ' | ' . $doctor->sur_name)
@section('meta-description', Str::words(str_replace($replace, ' ', $doctor->description), 20,''))
@section('meta-keywords', $setting->keywords)
@section('og-title', 'Get Appointment - ' . $doctor->name . ' | ' . $doctor->sur_name)
@section('og-description', Str::words(str_replace($replace, ' ', $doctor->description), 20,''))
@section('twitter-title', 'Get Appointment - ' . $doctor->name . ' | ' . $doctor->sur_name)
@section('twitter-description', Str::words(str_replace($replace, ' ', $doctor->description), 20,''))
@section('meta-image', asset('../storage/app/public/'.$doctor->image))
@section('og-image', asset('../storage/app/public/'.$doctor->image))
@section('twitter-image', asset('../storage/app/public/'.$doctor->image))

@extends('layouts.app')

@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-7 py-5">
                <div class="col-md-6 col-lg-10 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch" style="background-image: url({{ asset('../storage/app/public/'.$doctor->image) }})"></div>
                        </div>
                        <div class="text text-center">
                            <a href="{{ route('doctor.details',$doctor->slug) }}"><h3 class="mb-2">{{ $doctor->name }}</h3></a>
                            <span class="position mb-2">{{ $doctor->department->name }}</span>
                            <div class="faded">
                                <p>{!! Str::words($doctor->description,'10','...') !!}</p>
                                @if(!$doctor->sms_status == 1)
                                  <a href="{{ route('doctor.details',$doctor->slug) }}" class="btn btn-block btn-success" style="background: #3bc053;border-color: #3bc053;">More Information</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex">
                <div class="appointment-wrap p-4 p-lg-5 d-flex align-items-center" id="appointmentForm">
                    <form action="{{ route('book_now.thisdoctor') }}" method="POST" enctype="multipart/form-data" class="appointment-form ftco-animate">
                        @csrf
                        <h3>Appointment Form</h3>
                    @if($doctor->sms_status == 1)
                        <div class="">
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Patient Name (রোগীর নাম)*" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                 <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" placeholder="Age (বয়স)*" required>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone (মোবাইল নাম্বার)*" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email (ই-মেইল)* (Optional)">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                        <select name="department_id" id="" class="form-control @error('department_id') is-invalid @enderror" value="{{ old('department_id') }}" required>
                                            <option value="{{ $doctor->department->department_id }}">{{ $doctor->department->name }}</option>
                                        </select>
                                        @error('department_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-field">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                        <select name="doc_id" id="" name="doc_id" class="form-control @error('doc_id') is-invalid @enderror" value="{{ old('doc_id') }}" required>
                                            <option value="{{ $doctor->doc_id }}">{{ $doctor->name }}</option>
                                        </select>
                                        @error('doc_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="fa fa-calendar"></span></div>
                                    <input type="date" class="form-control @error('appoint_date') is-invalid @enderror" name="appoint_date" value="{{ old('appoint_date') }}" required>
                                    @error('appoint_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-field">
                                <div class="select-wrap">
                                    <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                    <select name="doctor_shown" id="doctor_shown" class="form-control @error('doctor_shown') is-invalid @enderror" value="{{ old('doctor_shown') }}">
                                        <option value="">আগে কি কোনো ডাক্তার দেখিয়েছেন?</option>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    @error('doctor_shown')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group yes" style="display: none;">
                            <input type="text" class="form-control @error('past_doctor') is-invalid @enderror" name="past_doctor" value="{{ old('past_doctor') }}" placeholder="Past doctor name (আগের ডাক্তারের নাম)">
                            @error('past_doctor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="form-group">
                                <textarea class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" id="editor" placeholder="Message (রোগীর সমস্যা সংক্ষিপ্তাকারে)*"></textarea>
                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                           
                            </div>
                            <input type="hidden" name="entry_date" value="{{ date('d-m-Y') }}">
                            <input type="hidden" name="month" value="{{ date('F') }}">
                            <input type="hidden" name="year" value="{{ date('Y') }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary py-3 px-4">Appointment</button>
                            </div>
                        </div>
                        @else
                            <h5 class="text-dark">
                                Appointment Temporary <span class="text-danger font-weight-bold ">Disable</span> For
                                <br>
                                <br>
                                <p class="text-success">{{ $doctor->name }}</p> 
                                <p>({{ $doctor->sur_name }})</p>
                            </h5>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

        <script src="{{ asset('/front/js/jquery.min.js')}}"></script>

        <script src="{{ asset('/front/js/popper.min.js')}}"></script>

        <script src="{{ asset('/front/js/bootstrap.min.js')}}"></script>


<script type="text/javascript">
    $(document).on('change','#doctor_shown',function(){
        var doctor_shown = $(this).val();
        if(doctor_shown == 'Yes'){
            $('.yes').show();
        }else{
            $('.yes').hide();
        }
    });
</script>
@endsection
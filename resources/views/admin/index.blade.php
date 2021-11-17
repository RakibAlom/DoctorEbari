@extends('admin.layouts.layout')

@section('content')
	<div class="wrapper wrapper-content">
        <div class="row">
       <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">Total </span>
                <h5>Doctor</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($doctor) }}</h1>
                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-info float-right">Total</span>
                <h5>Department</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($department) }}</h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-light float-right"> Total</span>
                <h5>Shop Product</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($shop) }}</h1>
                <div class="stat-percent font-bold text-info">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right">Total</span>
                <h5>Ambulance</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($ambulance) }}</h1>
                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-danger float-right"> value</span>
                <h5> Diagnostic</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($diagnostic) }}</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right">Total</span>
                <h5>Post</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($post) }}</h1>
                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-danger float-right"> value</span>
                <h5> Socialorganize</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($socialorganize) }}</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"> Total</span>
                <h5>Hospital</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($hospital) }}</h1>
                <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"> Total</span>
                <h5>Appoinment</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($appoinment) }}</h1>
                <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"> Total</span>
                <h5>Staff</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($staff) }}</h1>
                <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"> Total</span>
                <h5>Gallery</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($gallery) }}</h1>
                <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"> Total</span>
                <h5>Messages</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($contact) }}</h1>
                <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right"> Total</span>
                <h5>Clent Review</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($client) }}</h1>
                <div class="stat-percent font-bold text-primary">38% <i class="fa fa-level-down"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection

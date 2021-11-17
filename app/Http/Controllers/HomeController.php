<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Appoinment;
use App\Models\Advertise;

use App\Models\Doctor;
use App\Models\Department;
use App\Models\Post;
use App\Models\Postcategory;
use App\Models\Ambulance;
use App\Models\Diagnostic;
use App\Models\Socialorganize;
use App\Models\Hospital;
use App\Models\Staff;
use App\Models\Shop;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Division;
use App\Models\District;
use App\Models\Upzila;
use App\Models\Front\Contact;

class HomeController extends Controller
{


    public function admin()
    {
        $doctor = Doctor::all();
        $department = Department::all();
        $post = Post::all();
        $ambulance = Ambulance::all();
        $diagnostic = Diagnostic::all();
        $socialorganize = Socialorganize::all();
        $hospital = Hospital::all();
        $appoinment = Appoinment::all();
        $staff = Staff::all();
        $gallery = Gallery::all();
        $contact = Contact::all();
        $shop = Shop::all();
        $client = Client::all();
        
        return view('admin.index',compact('doctor','department','post','ambulance','diagnostic','socialorganize','hospital','appoinment','staff','gallery','contact','shop','client'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $departments = Department::where('status',1)->get();
        $doctors = Doctor::where('status',1)->get();
        $homedoctors = Doctor::where('status',1)->where('h_status','1')->latest()->limit(6)->get();
        $clients = Client::latest()->get();
        $posts = Post::latest()->limit(3)->get();
        $slider = Slider::first();
        $setting = Setting::first();
        $appointment = Appoinment::all();
        $staffs = Staff::all();
        $advertise = Advertise::first();
        return view('home',compact('departments','doctors','homedoctors','clients','posts','slider','setting','appointment','staffs','advertise'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}

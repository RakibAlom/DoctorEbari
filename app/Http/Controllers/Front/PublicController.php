<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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


class PublicController extends Controller 
{
    public function doctors()
    {
        $doctors = Doctor::onlySylhet()->where('status',1)->orderBy('doc_id','ASC')->paginate(12);
        $divisions = Division::all();
        $districts = District::all();
        $upzilas = Upzila::all();
        $departments = Department::all();
    	return view('doctor.doctors',compact('doctors','divisions','districts','upzilas','departments'));
    }

    public function doctorDetails($slug)
    {
        $doctor = Doctor::where('slug',$slug)->first();
        $doctors = Doctor::inRandomOrder()->limit(3)->get();
        return view('doctor.doctor_details',compact('doctor','doctors'));
    }

    public function departments()
    {
        $departments = Department::where('status',1)->get();
        $setting = Setting::first();
        return view('department.departments',compact('departments','setting'));
    }

     public function departmentDoctors($slug)
    {
        $departments = Department::where('slug',$slug)->first();
        $doctors = $departments->doctor()->latest()->paginate(20);
        return view('department.departmentdoctors',compact('doctors','departments'));
    }

    public function posts()
    {
    	$posts = Post::latest()->paginate(12);
    	return view('blog.posts',compact('posts'));
    }
    public function singlePost($post)
    {
        $singlepost = Post::where('slug',$post)->first();
    	$postcategories = Postcategory::inRandomOrder()->get();
        $posts = Post::latest()->limit(5)->get();
    	return view('blog.singlepost',compact('singlepost','posts','postcategories'));
    }
    public function catePost($postcate)
    {
        $postcates = Postcategory::where('slug',$postcate)->first();
        $posts = $postcates->post()->latest()->paginate(12);
        return view('blog.cate_post',compact('posts','postcates'));
    }

    public function services()
    {
        return view('service.index');
    }

    //Ambulance
    public function ambulances()
    {
        $ambulances = Ambulance::latest()->paginate(12);
        return view('service.ambulances',compact('ambulances'));
    }

    public function ambulanceDetails($slug)
    {
        $ambulance = Ambulance::where('slug',$slug)->first();
        $ambulances = Ambulance::inRandomOrder()->limit(3)->get();
        return view('service.ambulance_details',compact('ambulance','ambulances'));
    }

    //diagnostic
    public function diagnostics()
    {
        $diagnostics = Diagnostic::latest()->paginate(12);
        return view('service.diagnostic',compact('diagnostics'));
    }

    public function diagnosticDetails($slug)
    {
        $diagnostic = Diagnostic::where('slug',$slug)->first();
        $diagnostics = Diagnostic::inRandomOrder()->limit(3)->get();
        return view('service.diagnostic_details',compact('diagnostic','diagnostics'));
    }

    public function organizes()
    {
        $organizes = Socialorganize::latest()->paginate(12);
        return view('service.allorganizes',compact('organizes'));
    }
    public function socialOrganizes()
    {
        $socialorganizes = Socialorganize::where('organizes','Social Organizes')->latest()->paginate(12);
        return view('service.social_organizes',compact('socialorganizes'));
    }
    
    public function corporateOrganizes()
    {
        $corporateorganizes = Socialorganize::where('organizes','Corporate Organizes')->latest()->paginate(12);
        return view('service.corporate_organizes',compact('corporateorganizes'));
    }

    public function organizeDetails($slug)
    {
        $social_organize = Socialorganize::where('slug',$slug)->first();
        $social_organizes = Socialorganize::inRandomOrder()->limit(3)->get();
        return view('service.social_organize_details',compact('social_organize','social_organizes'));
    }

    public function hospitals()
    {
        $hospitals=Hospital::latest()->paginate(12);
        return view('service.hospitals',compact('hospitals'));
    }

    public function hospitalDetails($slug)
    {
        $hospital = Hospital::where('slug',$slug)->first();
        $hospitals = Hospital::inRandomOrder()->limit(3)->get();
        return view('service.hospital_details',compact('hospital','hospitals'));
    }


    public function staffs()
    {
        $staffs =  Staff::where('status',1)->paginate(12);
        return view('staff.staffs',compact('staffs'));
    }

    public function staffDetails($slug)
    {
        $staff = Staff::where('slug',$slug)->first();
        $staffs = Staff::inRandomOrder()->limit(3)->get();
        return view('staff.staff_details',compact('staff','staffs'));
    }

    public function shops()
    {
        $setting = Setting::first();
        $shops = Shop::latest()->paginate(12);
        return view('service.shops',compact('shops','setting'));
    }

    public function shopDetails($slug)
    {
        $shop = Shop::where('slug',$slug)->first();
        $shops = Shop::inRandomOrder()->limit(3)->get();
        $setting = Setting::first();
        return view('service.shop_details',compact('shop','shops','setting'));
    }

    public function galleries()
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('galleries',compact('galleries'));
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('contact',compact('setting'));
    }

    public function createMessage(Request $request)
    {
        $data = $request->validate([
            'name' =>'',
            'email' =>'',
            'subject' =>'',
            'message' =>''
        ]);
        $message = Contact::create($data);
        if ($message) {
            $notification = array(
                'messege' => 'Your message send successfully! Please Wait, for the response...',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function about()
    {
        $staffs = Staff::latest()->paginate(12);
        $setting = Setting::first();
        return view('about',compact('setting','staffs'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $doctors = Doctor::where('name','LIKE', "%$search%")->orwhere('designation','LIKE', "%$search%")->orwhere('sur_name','LIKE', "%$search%")->latest()->get();
        $shops = array();
        $ambulances = array();
        $hospitals = array();
        $diagnostics = array();

        if (count($doctors) == 0 || !count($doctors) == 0) {
            $shops = Shop::where('name','LIKE', "%$search%")->latest()->get();
            if (count($shops) == 0) {
                $ambulances = Ambulance::where('name','LIKE',"%$search%")->latest()->get();
                if (count($ambulances) == 0) {
                    $hospitals = Hospital::where('name','LIKE',"%$search%")->latest()->get();
                    if (count($hospitals) ==0 ){
                        $diagnostics = Diagnostic::where('name','LIKE',"%$search%")->latest()->get();
                    }
                }
            }
        }
        return view('search',compact('doctors','search','shops','ambulances','hospitals','diagnostics'));
    }
    
    public function fetchDist($id){
        $district = District::where('division_id',$id)->get();
        return json_encode($district);
    }

    public function fetchupzila($id){
        $upzila = Upzila::where('district_id',$id)->get();
        return json_encode($upzila);
    }

    public function searchDoctor(Request $request){
        $divisions = Division::all();
        $districts = District::all();
        $upzilas = Upzila::all();
        $departments = Department::all();
        $division = $request->division_id;
        $district = $request->district_id;
        $upzila = $request->upzila_id;
        $department = $request->department_id;
        
        if($division && $district && $upzila && $department){
            $doctors = Doctor::where('division_id', $division)->where('district_id', $district)->where('upzila_id', $upzila)->where('department_id',$department)->where('status', 1)->get();
        }elseif($division && $district && $upzila){
            $doctors = Doctor::where('division_id', $division)->where('district_id', $district)->where('upzila_id', $upzila)->where('status', 1)->get();
        }elseif($division && $district && $department){
            $doctors = Doctor::where('division_id', $division)->where('district_id', $district)->where('department_id', $department)->where('status', 1)->get();
        }elseif($division && $district){
            $doctors = Doctor::where('division_id', $division)->where('district_id', $district)->where('status', 1)->get();
        }elseif($division && $department){
            $doctors = Doctor::where('division_id', $division)->where('department_id',$department)->where('status', 1)->get();
        }elseif($division){
            $doctors = Doctor::where('division_id', $division)->where('status', 1)->get();
        }elseif($department){
            $doctors = Doctor::where('department_id', $department)->where('status', 1)->get();
        }
        return view('searchDoctor',compact('doctors','divisions','districts','upzilas','departments'));
    }
    
    //Terms & Privacy function
    public function terms()
    {
        $setting = Setting::first();
        return view('terms', compact('terms'));
    }
    
    public function privacy()
    {
        $setting = Setting::first();
        return view('privacy', compact('privacy'));
    }
}

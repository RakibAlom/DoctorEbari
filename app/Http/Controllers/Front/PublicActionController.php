<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Setting;
use App\Models\Appoinment;


class PublicActionController extends Controller
{
    public function book_now($slug)
    {
        $departments = Department::where('status',1)->get();
        $doctors = Doctor::where('status',1)->get();
        $doctor = Doctor::where('slug',$slug)->first();
        $setting = Setting::first();
        return view('book_now',compact('doctor','doctors','setting','departments'));
    }

    public function book_nowSingle()
    {
        $data = request()->validate([
            'name' => 'required',
            'department_id' => 'required',
            'doc_id' => '',
            'age' => 'required',
            'phone' => 'required',
            'email' => '',
            'doctor_shown' => '',
            'past_doctor' => '',
            'details' => '',
            'appoint_date' => 'required',
            'entry_date' => '',
            'month' => '',
            'year' => '',
        ]);
        $book = Appoinment::create($data);
        
        $doctor = Doctor::where('doc_id',request()->doc_id)->first();
        $department = Department::where('department_id',request()->department_id)->first();
        $number = urlencode(request()->phone);
        
       
       $text=urlencode($doctor->name." Has Been Placed. Wait for our confirmation. We will inform you soon. For any query call us on +8801715971685. Thanks for choosing www.Doctorebari.com");
   
        $smsresult = file_get_contents("http://66.45.237.70/api.php?username=01765885996&password=doctor2020&number=$number&message=$text");
   
         
         if ($book) {
             $number = $doctor->phone;
            $text=urlencode($doctor->name." Patient: ".request()->name." Age: ".request()->age." Date: ".request()->appoint_date." To confirm please call +8801715971685");
            $smsresult = file_get_contents("http://66.45.237.70/api.php?username=01765885996&password=doctor2020&number=$number&message=$text");
             
            $notification = array(
                'messege' => 'Congrates!!Your booking is successfull! Please , Check you mobile message..',
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use App\Models\Doctor;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->get();
        $homedoctors = Doctor::where('status',1)->where('h_status','1')->latest()->limit(4)->get();
        $count = 1;
        return view('admin.doctor.index',compact('doctors','homedoctors','count'));
    }

    public function activeList()
    {
        $doctors = Doctor::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.doctor.activelist',compact('doctors','count'));
    }

    public function deactiveList()
    {
        $doctors = Doctor::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.doctor.deactivelist',compact('doctors','count'));
    }

    public function create()
    {
        $departments = Department::where('status',1)->get();
        $divisions = Division::all();
        return view('admin.doctor.new',compact('divisions','departments'));
    }

    public function store()
    {
        $doctor = Doctor::create($this->validateData());
        $this->storeImage($doctor);

        if ($doctor) {
            $notification = array(
                'messege' => 'New Doctor Added Successfully!',
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

    public function edit(Doctor $doctor)
    {
        $departments = Department::where('status',1)->get();
        $divisions = Division::all();
        return view('admin.doctor.edit',compact('doctor','departments','divisions'));
    }

    public function update(Doctor $doctor)
    {
        $doctor->update($this->validateUpdateData());
        $this->storeUpdateImage($doctor);

        if ($doctor) {
    		$notification = array(
    			'messege' => 'Doctor Information Updated!',
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

    public function active(Doctor $doctor)
    {
        $doctor->update(['status' => 1]);
        if ($doctor) {
    		$notification = array(
    			'messege' => 'He/She Activated!',
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

    public function homeactive(Doctor $doctor)
    {
        $doctor->update(['h_status' => '1']);
        if ($doctor) {
    		$notification = array(
    			'messege' => 'Home Showing Activated!',
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

    public function deactive(Doctor $doctor)
    {
        $doctor->update(['status' => 0]);
        if ($doctor) {
    		$notification = array(
    			'messege' => 'He/She Deactivated!',
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

    public function homedeactive(Doctor $doctor)
    {
        $doctor->update(['h_status' => '0']);
        if ($doctor) {
    		$notification = array(
    			'messege' => 'Home Showing Deactivated!',
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

    public function delete(Doctor $doctor)
    {
        if($doctor->image){
            unlink('storage/app/public/'.$doctor->image);
        }
        $appoints = Appoinment::where('doc_id',$doctor->doc_id)->delete();
        $doctor->delete();
        if ($doctor) {
    		$notification = array(
    			'messege' => 'He/She Deleted Permanently!',
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

    private function validateData()
    {
        return request()->validate([
            'department_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:doctors',
            'phone' => 'required',
            'hotline' => 'required',
            'designation' => '',
            'sur_name' => '',
            'division_id' => '',
            'district_id' => '',
            'upzila_id' => '',
            'description' => 'required',
            'image' => 'required',
            'sms_status' => 'required',
            'keywords' => '',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'department_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'phone' => 'required',
            'hotline' => 'required',
            'designation' => '',
            'sur_name' => '',
            'division_id' => '',
            'district_id' => '',
            'upzila_id' => '',
            'description' => 'required',
            'image' => '',
            'sms_status' => 'required',
            'keywords' => '',
        ]);
    }

    private function storeImage($doctor)
    {
        if(request()->has('image')){
            $doctor->update([
                'image' => request()->image->store('image/doctors','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$doctor->image)->resize(300,300);
            $resize->save(); 

        }
    }

    private function storeUpdateImage($doctor)
    {
        if(request()->has('image')){
            
            $doctor->update([
                'image' => request()->image->store('image/doctors','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$doctor->image)->resize(300,300);
            $resize->save();
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }
        }
    }
}

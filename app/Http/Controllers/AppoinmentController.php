<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment;
use App\Models\Department;
use App\Models\Doctor;

class AppoinmentController extends Controller
{
    public function index()
    {
        $appointments = Appoinment::latest()->get();
        $count = 1;
        return view('admin.appoinment.index',compact('appointments','count'));
    }

    public function confirmList()
    {
        $appointments = Appoinment::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.appoinment.confirm',compact('appointments','count'));
    }

    public function pendingList()
    {
        $appointments = Appoinment::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.appoinment.pending',compact('appointments','count'));
    }

    public function currentMonth()
    {
        $appointments = Appoinment::where('month',date('F'))->latest()->get();
        $count = 1;
        return view('admin.appoinment.currentmonth',compact('appointments','count'));
    }

    public function yearly()
    {
        $appointments = Appoinment::where('year',date('Y'))->latest()->get();
        $count = 1;
        return view('admin.appoinment.yearly',compact('appointments','count'));
    }

    public function create()
    {
        $departments = Department::where('status',1)->get();
        $doctors = Doctor::where('status',1)->get();
        return view('admin.appoinment.new',compact('departments','doctors'));
    }

    public function store(Request $request)
    {
        $appointment = Appoinment::create($this->validateData());
       

        if ($appointment) {
            $notification = array(
                'messege' => 'New Appoinment Added Successfully!',
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

    public function edit(Appoinment $appointment)
    {
        $departments = Department::where('status',1)->get();
        $doctors = Doctor::where('status',1)->get();
        return view('admin.appoinment.edit',compact('appointment','departments','doctors'));
    }

    public function update(Appoinment $appointment)
    {
        $appointment->update($this->validateData());

        if ($appointment) {
    		$notification = array(
    			'messege' => 'Appoinment Information Updated!',
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

    public function active(Appoinment $appointment)
    {
        $appointment->update(['status' => 1]);
        if ($appointment) {
    		$notification = array(
    			'messege' => 'Appoinment Confirmed!',
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

    public function deactive(Appoinment $appointment)
    {
        $appointment->update(['status' => 0]);
        if ($appointment) {
    		$notification = array(
    			'messege' => 'Appoinment Back To Pending!',
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

    public function delete(Appoinment $appointment)
    {
        $appointment->delete();
        if ($appointment) {
    		$notification = array(
    			'messege' => 'Appoinment Deleted Permanently!',
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

    public function getDepartment($department)
    {
        $department = Doctor::where('department_id',$department)->where('sms_status',1)->get();
        return response()->json($department);
    }

    private function validateData()
    {
        return request()->validate([
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
            'time' => '',
            'entry_date' => '',
            'month' => '',
            'year' => '',
        ]);
    }
}

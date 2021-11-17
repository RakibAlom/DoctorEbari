<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::latest()->get();
        $count = 1;
        return view('admin.hospital.index',compact('hospitals','count'));
    }

    public function activeList()
    {
        $hospitals = Hospital::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.hospital.activelist',compact('hospitals','count'));
    }

    public function deactiveList()
    {
        $hospitals = Hospital::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.hospital.deactivelist',compact('hospitals','count'));
    }

    public function create()
    {
        return view('admin.hospital.new');
    }

    public function store()
    {
        $hospital = Hospital::create($this->validateData());
        $this->storeImage($hospital);

        if ($hospital) {
            $notification = array(
                'messege' => 'New hospital Added Successfully!',
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

    public function edit(Hospital $hospital)
    {
        return view('admin.hospital.edit',compact('hospital'));
    }

    public function update(Hospital $hospital)
    {
        $hospital->update($this->validateUpdateData());
        $this->storeUpdateImage($hospital);

        if ($hospital) {
    		$notification = array(
    			'messege' => 'Hospital Information Updated!',
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

    public function active(Hospital $hospital)
    {
        $hospital->update(['status' => 1]);
        if ($hospital) {
    		$notification = array(
    			'messege' => 'Hospital Activated!',
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

    public function deactive(Hospital $hospital)
    {
        $hospital->update(['status' => 0]);
        if ($hospital) {
    		$notification = array(
    			'messege' => 'Hospital Deactivated!',
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

    public function delete(Hospital $hospital)
    {
        if($hospital->image){
            unlink('storage/app/public/'.$hospital->image);
        }
        $hospital->delete();
        if ($hospital) {
    		$notification = array(
    			'messege' => 'Hospital Deleted Permanently!',
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
            'name' => 'required',
            'slug' => 'required|unique:hospitals',
            'phone' => 'required',
            'hotline' => '',
            'address' => 'required',
            'details' => '',
            'image' => '',
            'call_status' => 'required',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'phone' => 'required',
            'hotline' => '',
            'address' => 'required',
            'details' => '',
            'image' => '',
            'call_status' => 'required',
        ]);
    }

    private function storeImage($hospital)
    {
        if(request()->has('image')){
            $hospital->update([
                'image' => request()->image->store('image/hospitals','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$hospital->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($hospital)
    {
        if(request()->has('image')){
            $hospital->update([
                'image' => request()->image->store('image/hospitals','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }

            // $resize = Image::make('storage/app/public/'.$hospital->image)->resize(300,300);
            // $resize->save();
        }
    }
}

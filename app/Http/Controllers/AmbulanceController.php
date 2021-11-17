<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambulance;

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulances = Ambulance::latest()->get();
        $count = 1;
        return view('admin.ambulance.index',compact('ambulances','count'));
    }

    public function activeList()
    {
        $ambulances = Ambulance::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.ambulance.activelist',compact('ambulances','count'));
    }

    public function deactiveList()
    {
        $ambulances = Ambulance::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.ambulance.deactivelist',compact('ambulances','count'));
    }

    public function create()
    {
        return view('admin.ambulance.new');
    }

    public function store()
    {
        $ambulance = Ambulance::create($this->validateData());
        $this->storeImage($ambulance);

        if ($ambulance) {
            $notification = array(
                'messege' => 'New Ambulance Added Successfully!',
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

    public function edit(Ambulance $ambulance)
    {
        return view('admin.ambulance.edit',compact('ambulance'));
    }

    public function update(Ambulance $ambulance)
    {
        $ambulance->update($this->validateUpdateData());
        $this->storeUpdateImage($ambulance);

        if ($ambulance) {
    		$notification = array(
    			'messege' => 'Ambulance Information Updated!',
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

    public function active(Ambulance $ambulance)
    {
        $ambulance->update(['status' => 1]);
        if ($ambulance) {
    		$notification = array(
    			'messege' => 'Ambulance Activated!',
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

    public function deactive(Ambulance $ambulance)
    {
        $ambulance->update(['status' => 0]);
        if ($ambulance) {
    		$notification = array(
    			'messege' => 'Ambulance Deactivated!',
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

    public function delete(Ambulance $ambulance)
    {
        if($ambulance->image){
            unlink('storage/app/public/'.$ambulance->image);
        }
        $ambulance->delete();
        if ($ambulance) {
    		$notification = array(
    			'messege' => 'Ambulance Deleted Permanently!',
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
            'slug' => 'required|unique:ambulances',
            'phone' => 'required',
            'hotline' => '',
            'address' => 'required',
            'details' => '',
            'image' => '',
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
        ]);
    }

    private function storeImage($ambulance)
    {
        if(request()->has('image')){
            $ambulance->update([
                'image' => request()->image->store('image/ambulances','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$ambulance->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($ambulance)
    {
        if(request()->has('image')){
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }
            $ambulance->update([
                'image' => request()->image->store('image/ambulances','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$ambulance->image)->resize(300,300);
            // $resize->save();
        }
    }
}

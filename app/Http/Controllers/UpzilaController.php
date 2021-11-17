<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Upzila;

class UpzilaController extends Controller
{
    public function index()
    {
        $upzilas = Upzila::all();
        $count = 1;
        return view('admin.doctorsearch.upzila.index',compact('upzilas','count'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('admin.doctorsearch.upzila.new',compact('divisions'));
    }

    public function store()
    {
        $upzila = Upzila::create($this->validateData());
        if ($upzila) {
            $notification = array(
                'messege' => 'New Upzila Added Successfully!',
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

    public function edit(Upzila $upzila)
    {
        $divisions = Division::all();
        return view('admin.doctorsearch.upzila.edit',compact('upzila','divisions'));
    }

    public function update(Upzila $upzila)
    {
        $upzila->update($this->validateData());
        if ($upzila) {
            $notification = array(
                'messege' => 'Upzila Updated Successfully!',
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

    // public function active(District $district)
    // {
    //     $district->update();
    //     if ($district) {
    // 		$notification = array(
    // 			'messege' => 'District Activated!',
    // 			'alert-type' => 'success'
    // 		);
    // 		return redirect()->back()->with($notification);
    // 	}else{
    // 		$notification = array(
    // 			'messege' => 'Something Went Wrong!',
    // 			'alert-type' => 'error'
    // 		);
    // 		return redirect()->back()->with($notification);
    // 	}
    // }

    // public function deactive(District $district)
    // {
    //     $district->update();
    //     if ($district) {
    // 		$notification = array(
    // 			'messege' => 'District Deactivated!',
    // 			'alert-type' => 'success'
    // 		);
    // 		return redirect()->back()->with($notification);
    // 	}else{
    // 		$notification = array(
    // 			'messege' => 'Something Went Wrong!',
    // 			'alert-type' => 'error'
    // 		);
    // 		return redirect()->back()->with($notification);
    // 	}
    // }

    public function delete(Upzila $upzila)
    {
        $upzila->delete();
        
        if ($upzila) {
    		$notification = array(
    			'messege' => 'Upzila Permanently Deleted!',
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
            'district_id' => 'required',
            'division_id' => 'required',
            'upzila_name' => 'required',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        $count = 1;
        return view('admin.doctorsearch.district.index',compact('districts','count'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('admin.doctorsearch.district.new',compact('divisions'));
    }

    public function store()
    {
        $district = District::create($this->validateData());
        if ($district) {
            $notification = array(
                'messege' => 'New District Added Successfully!',
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

    public function edit(District $district)
    {
        $divisions = Division::all();
        return view('admin.doctorsearch.district.edit',compact('district','divisions'));
    }

    public function update(District $district)
    {
        $district->update($this->validateData());
        if ($district) {
            $notification = array(
                'messege' => 'District Updated Successfully!',
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

    public function delete(District $district)
    {
        $district->delete();
        
        if ($district) {
    		$notification = array(
    			'messege' => 'District Permanently Deleted!',
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
            'district_name' => 'required',
            'division_id' => 'required',
        ]);
    }
}

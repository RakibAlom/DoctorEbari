<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    
    public function index()
    {
        $divisions = Division::all();
        $count = 1;
        return view('admin.doctorsearch.division.index',compact('divisions','count'));
    }

    public function create()
    {
        return view('admin.doctorsearch.division.new');
    }

    public function store()
    {
        $division = Division::create($this->validateData());
        if ($division) {
            $notification = array(
                'messege' => 'New Division Added Successfully!',
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

    public function edit(Division $division)
    {
        return view('admin.doctorsearch.division.edit',compact('division'));
    }

    public function update(Division $division)
    {
        $division->update($this->validateData());
        if ($division) {
            $notification = array(
                'messege' => 'Division Updated Successfully!',
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

    public function active(Division $division)
    {
        $division->update();
        if ($division) {
    		$notification = array(
    			'messege' => 'Division Activated!',
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

    public function deactive(Division $division)
    {
        $division->update();
        if ($division) {
    		$notification = array(
    			'messege' => 'Division Deactivated!',
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

    public function delete(Division $division)
    {
        $division->delete();
        
        if ($division) {
    		$notification = array(
    			'messege' => 'Division Permanently Deleted!',
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
            'division_name' => 'required'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Image;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $count = 1;
        return view('admin.department.index',compact('departments','count'));
    }

    public function create()
    {
        return view('admin.department.new');
    }

    public function store()
    {
        $department = Department::create($this->validateData());
        $this->storeImage($department);
        if ($department) {
            $notification = array(
                'messege' => 'New Deparment Added Successfully!',
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

    public function edit(Department $department)
    {
        return view('admin.department.edit',compact('department'));
    }

    public function update(Department $department)
    {
        $department->update($this->validateUpdateData());
        $this->storeUpdateImage($department);
        if ($department) {
            $notification = array(
                'messege' => 'Department Updated Successfully!',
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

    public function active(Department $department)
    {
        $department->update(['status' => 1 ]);
        if ($department) {
    		$notification = array(
    			'messege' => 'Department Activated!',
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

    public function deactive(Department $department)
    {
        $department->update(['status' => 0 ]);
        if ($department) {
    		$notification = array(
    			'messege' => 'Department Deactivated!',
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

    public function delete(Department $department)
    {
        if($department->image){
            unlink('storage/app/public/'.$department->image);
        }
        $department->delete();
        
        if ($department) {
    		$notification = array(
    			'messege' => 'Department Permanently Deleted!',
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
            'slug' => 'required|unique:departments',
            'description' => 'required',
            'image' =>'sometimes|file|image|max:5000',
        ]);
    }
    private function validateUpdateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' =>'sometimes|file|image|max:5000',
        ]);
    }

    private function storeImage($department)
    {
        if(request()->hasFile('image')){
            $department->update([
                'image' => request()->image->store('image/departments','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$department->image)->resize(446,637);
            $resize->save();
        }
    }

    private function storeUpdateImage($department)
    {
        if(request()->has('image')){
            $department->update([
                'image' => request()->image->store('image/departments','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }

            $resize = Image::make('storage/app/public/'.$department->image)->resize(446,637);
            $resize->save();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\User;
use Auth;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::latest()->get();
        $count = 1;
        return view('admin.staff.index',compact('staffs','count'));
    }

    public function activeList()
    {
        $staffs = Staff::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.staff.activelist',compact('staffs','count'));
    }

    public function deactiveList()
    {
        $staffs = Staff::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.staff.deactivelist',compact('staffs','count'));
    }

    public function create()
    {
        return view('admin.staff.new');
    }

    public function store()
    {
        $staff = Staff::create($this->validateData());
        $this->storeImage($staff);

        if ($staff) {
            $notification = array(
                'messege' => 'New Staff Added Successfully!',
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

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit',compact('staff'));
    }

    public function update(Staff $staff)
    {
        $staff->update($this->validateupdateData());
        $this->storeUpdateImage($staff);

        if ($staff) {
    		$notification = array(
    			'messege' => 'Staff Information Updated!',
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

    public function active(Staff $staff)
    {
        $staff->update(['status' => 1]);
        if ($staff) {
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

    public function deactive(Staff $staff)
    {
        $staff->update(['status' => 0]);
        if ($staff) {
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

    public function delete(Staff $staff)
    {
        if($staff->image){
            unlink('storage/app/public/'.$staff->image);
        }
        $staff->delete();
        if ($staff) {
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

    //update info form
    public function addAdmin(){
        return view('admin.user.new');
    }
    public function newAdmin(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'is_admin' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();
        $notification = array(
            'messege' => 'Admin Created',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function allAdmin(){
        $users = User::all();
        $count = 1;
        return view('admin.user.view',compact('users','count'));
    }

    public function editProfile($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.edit',compact('user'));
    }

    public function updateProfile(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'is_admin' => 'required',
        ]);
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->save();
        $notification = array(
            'messege' => 'Admin Updated',
            'alert-type' => 'success'
        );
        Auth::logout();
        return redirect()->route('home')->with($notification);
    }

    public function updatePass(Request $request,$id){
        $validate = $request->validate([
            'password' => 'required|min:8',
        ]);
        $user = User::where('id',$id)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('home');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:staff',
            'designation' => 'required',
            'details' => 'required|max:80',
            'phone' => 'required',
            'email' => '',
            'address' => '',
            'fb_link' => '',
            'twitter_link' => '',
            'instagram_link' => '',
            'image' => '',
        ]);
    }

    private function validateupdateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'designation' => 'required',
            'details' => 'required|max:80',
            'phone' => 'required',
            'email' => '',
            'address' => '',
            'fb_link' => '',
            'twitter_link' => '',
            'instagram_link' => '',
            'image' => '',
        ]);
    }
    private function storeImage($staff)
    {
        if(request()->has('image')){
            $staff->update([
                'image' => request()->image->store('image/staff','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$staff->image)->resize(300,300);
            $resize->save();

        }
    }

    private function storeUpdateImage($staff)
    {
        if(request()->has('image')){
            $staff->update([
                'image' => request()->image->store('image/staff','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }
            $resize = Image::make('storage/app/public/'.$staff->image)->resize(300,300);
            $resize->save();
        }
    }

}

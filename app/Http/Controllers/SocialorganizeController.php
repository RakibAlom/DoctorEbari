<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socialorganize;

class SocialorganizeController extends Controller
{
    public function index()
    {
        $socials = Socialorganize::latest()->get();
        $count = 1;
        return view('admin.socialorganize.index',compact('socials','count'));
    }

    public function activeList()
    {
        $socials = Socialorganize::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.socialorganize.activelist',compact('socials','count'));
    }

    public function deactiveList()
    {
        $socials = Socialorganize::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.socialorganize.deactivelist',compact('socials','count'));
    }

    public function create()
    {
        return view('admin.socialorganize.new');
    }

    public function store()
    {
        $social = Socialorganize::create($this->validateData());
        $this->storeImage($social);

        if ($social) {
            $notification = array(
                'messege' => 'New Socialorganize Added Successfully!',
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

    public function edit(Socialorganize $social)
    {
        return view('admin.socialorganize.edit',compact('social'));
    }

    public function update(Socialorganize $social)
    {
        $social->update($this->validateUpdateData());
        $this->storeUpdateImage($social);

        if ($social) {
    		$notification = array(
    			'messege' => 'Socialorganize Information Updated!',
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

    public function active(Socialorganize $social)
    {
        $social->update(['status' => 1]);
        if ($social) {
    		$notification = array(
    			'messege' => 'Socialorganize Activated!',
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

    public function deactive(Socialorganize $social)
    {
        $social->update(['status' => 0]);
        if ($social) {
    		$notification = array(
    			'messege' => 'Socialorganize Deactivated!',
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

    public function delete(Socialorganize $social)
    {
        if($social->image){
            unlink('storage/app/public/'.$social->image);
        }
        $social->delete();
        if ($social) {
    		$notification = array(
    			'messege' => 'Socialorganize Deleted Permanently!',
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
            'slug' => 'required|unique:socialorganizes',
            'organizes' => 'required',
            'type' => 'required',
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
            'organizes' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'hotline' => '',
            'address' => 'required',
            'details' => '',
            'image' => '',
        ]);
    }

    private function storeImage($social)
    {
        if(request()->has('image')){
            $social->update([
                'image' => request()->image->store('image/socialorganizes','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$social->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($social)
    {
        if(request()->has('image')){
            $social->update([
                'image' => request()->image->store('image/socialorganizes','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }

            // $resize = Image::make('storage/app/public/'.$social->image)->resize(300,300);
            // $resize->save();
        }
    }
}

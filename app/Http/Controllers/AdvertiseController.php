<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertise;

class AdvertiseController extends Controller
{
    public function index()
    {
        $advertises = Advertise::latest()->get();
        $count = 1;
        return view('admin.advertise.index',compact('advertises','count'));
    }

    public function activeList()
    {
        $advertises = Advertise::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.advertise.activelist',compact('advertises','count'));
    }

    public function deactiveList()
    {
        $advertises = Advertise::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.advertise.deactivelist',compact('advertises','count'));
    }

    public function create()
    {
        $advertises = Advertise::first();
        return view('admin.advertise.new',compact('advertises'));
    }

    public function store(Request $request)
    {
        $advertise = Advertise::create($this->validateData());
        $this->storeImage($advertise);

        if ($advertise) {
            $notification = array(
                'messege' => 'New Advertise Added Successfully!',
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

    public function edit(Advertise $advertise)
    {
        return view('admin.advertise.edit',compact('advertise'));
    }

    public function update(advertise $advertise)
    {
        $advertise->update($this->validateData());
        $this->storeImage($advertise);


        if (request()->has('image1')) {
            if (request()->oldimage1) {
                unlink('storage/app/public/'.request()->oldimage1);
            }
            $this->storeImage($advertise);
        }

        if (request()->has('image2')) {
            if (request()->oldimage2) {
                unlink('storage/app/public/'.request()->oldimage2);
            }
            $this->storeImage($advertise);
        }

        if (request()->has('animation')) {
            if (request()->oldanimation) {
                unlink('storage/app/public/'.request()->oldanimation);
            }
            $this->storeImage($advertise);
        }
        if (request()->has('video')) {
            if (request()->oldvideo) {
                unlink('storage/app/public/'.request()->oldvideo);
            }
            $this->storeImage($advertise);
        }

        if ($advertise) {
            $notification = array(
                'messege' => 'Advertise Updated Successfully!',
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

    public function active(Advertise $advertise)
    {
        $advertise->update(['status' => 1]);
        if ($advertise) {
    		$notification = array(
    			'messege' => 'Advertise Activated!',
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

    public function deactive(Advertise $advertise)
    {
        $advertise->update(['status' => 0]);
        if ($advertise) {
    		$notification = array(
    			'messege' => 'Advertise Deactivated!',
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

    public function delete(Advertise $advertise)
    {
        if($advertise->image){
            unlink('storage/app/public/'.$advertise->image);
        }
        $advertise->delete();
        if ($advertise) {
    		$notification = array(
    			'messege' => 'Advertise Deleted Permanently!',
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
            'image1' => '',
            'image1_link' => '',
            'image2' => '',
            'image2_link' => '',
            'animation' => '',
            'animation_link' => '',
            'video' => '',
            'video_link' => '',
        ]);
    }

    private function storeImage($advertise)
    {
    	if (request()->has('image1')) {
    		$advertise->update([
    			'image1' => request()->image1->store('image/advertise','public'),
    		]);
    	}
    	if (request()->has('image2')) {
    		$advertise->update([
    			'image2' => request()->image2->store('image/advertise','public'),
    		]);
    	}
    	if (request()->has('animation')) {
    		$advertise->update([
    			'animation' => request()->animation->store('image/advertise','public'),
    		]);
    	}
    }

}

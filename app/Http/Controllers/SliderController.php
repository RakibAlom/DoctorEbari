<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $count = 1;
        return view('admin.slider.index',compact('sliders','count'));
    }

    public function create()
    {
        $sliders = Slider::first();
        return view('admin.slider.new',compact('sliders'));
    }

    public function store()
    {
        $slider = Slider::create($this->validateData());
        $this->storeImage($slider);

        if ($slider) {
            $notification = array(
                'messege' => 'New Slider Added Successfully!',
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

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Slider $slider)
    {
        $slider->update($this->validateData());
        $this->storeImage($slider);
        if (request()->has('image')) {
            if (request()->old_image) {
                unlink('storage/app/public/'.request()->old_image);
            }
            $this->storeImage($slider);
        }

        if ($slider) {
    		$notification = array(
    			'messege' => 'Slider Updated!',
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

    public function active(Slider $slider)
    {
        $slider->update(['status' => 1]);
        if ($slider) {
    		$notification = array(
    			'messege' => 'Slider Activated!',
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

    public function deactive(Slider $slider)
    {
        $slider->update(['status' => 0]);
        if ($slider) {
    		$notification = array(
    			'messege' => 'Slider Deactivated!',
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

    public function delete(Slider $slider)
    {
        if($slider->image){
            unlink('storage/app/public/'.$slider->image);
        }
        $slider->delete();
        if ($slider) {
    		$notification = array(
    			'messege' => 'slider Deleted Permanently!',
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
            'title' => 'required|max:36',
            'details' => 'required|max:140',
            'image' => '',
        ]);
    }

    private function storeImage($slider)
    {
        if(request()->has('image')){
            $slider->update([
                'image' => request()->image->store('image/sliders','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$slider->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($slider)
    {
        if(request()->has('image')){
            $slider->update([
                'image' => request()->image->store('image/sliders','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }

            // $resize = Image::make('storage/app/public/'.$slider->image)->resize(300,300);
            // $resize->save();
        }
    }
}

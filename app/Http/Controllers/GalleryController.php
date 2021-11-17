<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        $count = 1;
        return view('admin.gallery.index',compact('galleries','count'));
    }

    public function activeList()
    {
        $galleries = Gallery::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.gallery.activelist',compact('galleries','count'));
    }

    public function deactiveList()
    {
        $galleries = Gallery::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.gallery.deactivelist',compact('galleries','count'));
    }

    public function create()
    {
        return view('admin.gallery.new');
    }

    public function store()
    {
        $gallery = Gallery::create($this->validateData());
        $this->storeImage($gallery);

        if ($gallery) {
            $notification = array(
                'messege' => 'New Gallery Added Successfully!',
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

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit',compact('gallery'));
    }

    public function update(gallery $gallery)
    {
        $gallery->update($this->validateData());
        $this->storeUpdateImage($gallery);

        if ($gallery) {
    		$notification = array(
    			'messege' => 'Gallery Reveiw Updated!',
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

    public function active(Gallery $gallery)
    {
        $gallery->update(['status' => 1]);
        if ($gallery) {
    		$notification = array(
    			'messege' => 'Gallery Activated!',
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

    public function deactive(Gallery $gallery)
    {
        $gallery->update(['status' => 0]);
        if ($gallery) {
    		$notification = array(
    			'messege' => 'Gallery Deactivated!',
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

    public function delete(Gallery $gallery)
    {
        if($gallery->image){
            unlink('storage/app/public/'.$gallery->image);
        }
        $gallery->delete();
        if ($gallery) {
    		$notification = array(
    			'messege' => 'Gallery Deleted Permanently!',
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
            'title' => 'required',
            'image' => 'required',
        ]);
    }

    private function storeImage($gallery)
    {
        if(request()->has('image')){
            $gallery->update([
                'image' => request()->image->store('image/galleries','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$gallery->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($gallery)
    {
        if(request()->has('image')){
            $gallery->update([
                'image' => request()->image->store('image/galleries','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }

            // $resize = Image::make('storage/app/public/'.$gallery->image)->resize(300,300);
            // $resize->save();
        }
    }
}

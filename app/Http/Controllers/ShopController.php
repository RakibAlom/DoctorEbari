<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $products = Shop::latest()->get();
        $count = 1;
        return view('admin.shop.index',compact('products','count'));
    }

    public function grid()
    {
        $products = Shop::latest()->get();
        return view('admin.shop.grid',compact('products'));
    }

    public function show($slug)
    {
        $product = Shop::where('slug',$slug)->get()->first();
        return view('admin.shop.show',compact('product'));
    }

    public function activeList()
    {
        $products = Shop::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.shop.activelist',compact('products','count'));
    }

    public function deactiveList()
    {
        $products = Shop::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.shop.deactivelist',compact('products','count'));
    }

    public function create()
    {
        return view('admin.shop.new');
    }

    public function store()
    {
        $product = Shop::create($this->validateData());
        $this->storeImage($product);

        if ($product) {
            $notification = array(
                'messege' => 'New product Added Successfully!',
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

    public function edit(Shop $product)
    {
        return view('admin.shop.edit',compact('product'));
    }

    public function update(Shop $product)
    {
        $product->update($this->validateUpdateData());
        $this->storeUpdateImage($product);

        if ($product) {
    		$notification = array(
    			'messege' => 'Product Information Updated!',
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

    public function active(Shop $product)
    {
        $product->update(['status' => 1]);
        if ($product) {
    		$notification = array(
    			'messege' => 'Product Activated!',
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

    public function deactive(Shop $product)
    {
        $product->update(['status' => 0]);
        if ($product) {
    		$notification = array(
    			'messege' => 'Product Deactivated!',
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

    public function delete(Shop $product)
    {
        if($product->image){
            unlink('storage/app/public/'.$product->image);
        }
        $product->delete();
        if ($product) {
    		$notification = array(
    			'messege' => 'Product Deleted Permanently!',
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
            'slug' => 'required|unique:shops',
            'category' => '',
            'code' => '',
            'sell_price' => '',
            'buy_price' => '',
            'details' => '',
            'image' => 'required',
            'keywords' => '',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'category' => '',
            'code' => '',
            'sell_price' => 'required',
            'buy_price' => '',
            'details' => '',
            'image' => '',
            'keywords' => '',
        ]);
    }

    private function storeImage($product)
    {
        if(request()->has('image')){
            $product->update([
                'image' => request()->image->store('image/products','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$product->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($product)
    {
        if(request()->has('image')){
            $product->update([
                'image' => request()->image->store('image/products','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }

            // $resize = Image::make('storage/app/public/'.$product->image)->resize(300,300);
            // $resize->save();
        }
    }
}

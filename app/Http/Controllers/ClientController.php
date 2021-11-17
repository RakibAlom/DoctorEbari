<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        $count = 1;
        return view('admin.client.index',compact('clients','count'));
    }

    public function activeList()
    {
        $clients = Client::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.client.activelist',compact('clients','count'));
    }

    public function deactiveList()
    {
        $clients = Client::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.client.deactivelist',compact('clients','count'));
    }

    public function create()
    {
        return view('admin.client.new');
    }

    public function store()
    {
        $client = Client::create($this->validateData());
        $this->storeImage($client);

        if ($client) {
            $notification = array(
                'messege' => 'New Client Review Added Successfully!',
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

    public function edit(Client $client)
    {
        return view('admin.client.edit',compact('client'));
    }

    public function update(Client $client)
    {
        $client->update($this->validateUpdateData());
        $this->storeUpdateImage($client);

        if ($client) {
    		$notification = array(
    			'messege' => 'Client Reveiw Updated!',
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

    public function active(Client $client)
    {
        $client->update(['status' => 1]);
        if ($client) {
    		$notification = array(
    			'messege' => 'Client Review Activated!',
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

    public function deactive(Client $client)
    {
        $client->update(['status' => 0]);
        if ($client) {
    		$notification = array(
    			'messege' => 'Client Review Deactivated!',
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

    public function delete(Client $client)
    {
        if($client->image){
            unlink('storage/app/public/'.$client->image);
        }
        $client->delete();
        if ($client) {
    		$notification = array(
    			'messege' => 'Client Review Deleted Permanently!',
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

    private function validateUpdateData()
    {
        return request()->validate([
            'name' => 'required',
            'review' => 'required|max:140',
            'image' => '',
        ]);
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'review' => 'required|max:140',
            'image' => 'required',
        ]);
    }

    private function storeImage($client)
    {
        if(request()->has('image')){
            $client->update([
                'image' => request()->image->store('image/clients','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$client->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($client)
    {
        if(request()->has('image')){
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }
            $client->update([
                'image' => request()->image->store('image/clients','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$client->image)->resize(300,300);
            // $resize->save();
        }
    }
}

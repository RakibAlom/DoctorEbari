<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostic;

class DiagnosticController extends Controller
{
    public function index()
    {
        $diagnostics = Diagnostic::latest()->get();
        $count = 1;
        return view('admin.diagnostic.index',compact('diagnostics','count'));
    }

    public function activeList()
    {
        $diagnostics = Diagnostic::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.diagnostic.activelist',compact('diagnostics','count'));
    }

    public function deactiveList()
    {
        $diagnostics = Diagnostic::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.diagnostic.deactivelist',compact('diagnostics','count'));
    }

    public function create()
    {
        return view('admin.diagnostic.new');
    }

    public function store()
    {
        $diagnostic = Diagnostic::create($this->validateData());
        $this->storeImage($diagnostic);

        if ($diagnostic) {
            $notification = array(
                'messege' => 'New Diagnostic Added Successfully!',
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

    public function edit(Diagnostic $diagnostic)
    {
        return view('admin.diagnostic.edit',compact('diagnostic'));
    }

    public function update(Diagnostic $diagnostic)
    {
        $diagnostic->update($this->validateUpdateData());
        $this->storeUpdateImage($diagnostic);

        if ($diagnostic) {
    		$notification = array(
    			'messege' => 'Diagnostic Information Updated!',
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

    public function active(Diagnostic $diagnostic)
    {
        $diagnostic->update(['status' => 1]);
        if ($diagnostic) {
    		$notification = array(
    			'messege' => 'Diagnostic Activated!',
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

    public function deactive(Diagnostic $diagnostic)
    {
        $diagnostic->update(['status' => 0]);
        if ($diagnostic) {
    		$notification = array(
    			'messege' => 'Diagnostic Deactivated!',
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

    public function delete(Diagnostic $diagnostic)
    {
        if($diagnostic->image){
            unlink('storage/app/public/'.$diagnostic->image);
        }
        $diagnostic->delete();
        if ($diagnostic) {
    		$notification = array(
    			'messege' => 'Diagnostic Deleted Permanently!',
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
            'slug' => 'required|unique:diagnostics',
            'phone' => 'required',
            'hotline' => '',
            'address' => 'required',
            'details' => '',
            'image' => '',
            'call_status' => 'required',
         ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'phone' => 'required',
            'hotline' => '',
            'address' => 'required',
            'details' => '',
            'image' => '',
            'call_status' => 'required',
        ]);
    }

    private function storeImage($diagnostic)
    {
        if(request()->has('image')){
            $diagnostic->update([
                'image' => request()->image->store('image/diagnostics','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$diagnostic->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($diagnostic)
    {
        if(request()->has('image')){
            $diagnostic->update([
                'image' => request()->image->store('image/diagnostics','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }

            // $resize = Image::make('storage/app/public/'.$diagnostic->image)->resize(300,300);
            // $resize->save();
        }
    }
}

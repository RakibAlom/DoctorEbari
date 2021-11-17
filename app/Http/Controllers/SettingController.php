<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Front\Contact;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.setting',compact('setting'));
    }

    public function store()
    {
        $setting = Setting::create($this->validateData());
        $this->storeImage($setting);
        if ($setting) {
            $notification = array(
                'messege' => 'Information Upload Successfully!',
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

    public function update()
    {
        $setting = Setting::first();
        $setting->update($this->validateData());

        if (request()->has('favicon')) {
            if (request()->oldfavicon) {
                unlink('storage/app/public/'.request()->oldfavicon);
            }
            $this->storeImage($setting);
        }

        if (request()->has('logo')) {
            if (request()->oldlogo) {
                unlink('storage/app/public/'.request()->oldlogo);
            }
            $this->storeImage($setting);
        }

        if (request()->has('cover_image')) {
            if (request()->oldcover) {
                unlink('storage/app/public/'.request()->oldcover);
            }
            $this->storeImage($setting);
        }

        if ($setting) {
            $notification = array(
                'messege' => 'Information Updated Successfully!',
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

    public function messages()
    {
        $contacts = Contact::latest()->get();
        $count = 1;
        return view('admin.contact.contactlist',compact('contacts','count'));
    }

    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'meta_description' => '',
            'about' => '',
            'meta_keywords' => '',
            'email' => '',
            'phone' => '',
            'hotline' => '',
            'address' => '',
            'web_link' => '',
            'fb_link' => '',
            'twitter_link' => '',
            'instagram_link' => '',
            'youtube_link' => '',
            'service_years' => '',
            'total_patients' => '',
            'total_doctors' => '',
            'total_staffs' => '',
            'notice' => '',
            'terms' => '',
            'privacy' => '',
            'logo' => '',
            'favicon' => '',
            'cover_image' => ''
        ]);
    }

    private function storeImage($setting)
    {
        if (request()->has('favicon')) {
            $setting->update([
                'favicon' => request()->favicon->store('image/setting','public'),
            ]);
        }
        if (request()->has('logo')) {
            $setting->update([
                'logo' => request()->logo->store('image/setting','public'),
            ]);
        }
        if (request()->has('cover_image')) {
            $setting->update([
                'cover_image' => request()->cover_image->store('image/setting','public'),
            ]);
        }
    }
    
    
    
    // SET CACHE
    public function routeCache()
    {
        Artisan::call('route:cache');
        return 'Route Cached!';
    }
    
    public function viewCache()
    {
        Artisan::call('view:cache');
        return 'View Cached!';
    }
    
    public function eventCache()
    {
        Artisan::call('event:cache');
        return 'Event Cached!';
    }
    
    public function configCache()
    {
        Artisan::call('config:cache');
        return 'Config Cached!';
    }
    
    public function clearCache()
    {
        Artisan::call('cache:clear');
        return 'Cache Clear!';
    }
    
    public function clearEvent()
    {
        Artisan::call('event:clear');
        return 'Event Clear!';
    }
    
    public function clearView()
    {
        Artisan::call('view:clear');
        return 'View Clear!';
    }
    
    public function clearRoute()
    {
        Artisan::call('route:clear');
        return 'Route Clear!';
    }
    
    public function clearConfig()
    {
        Artisan::call('config:clear');
        return 'Config Clear!';
    }

    public function clearOptimize()
    {
        Artisan::call('optimize:clear');
        return 'Optimize Clear!';
    }

    public function storageLink()
    {
        Artisan::class('storage:link');
        return 'Storage linked!';
    }
}

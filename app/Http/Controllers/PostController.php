<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Postcategory;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $count = 1;
        return view('admin.blog.post.index',compact('posts','count'));
    }

    public function activeList()
    {
        $posts = Post::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.blog.post.activelist',compact('posts','count'));
    }

    public function deactiveList()
    {
        $posts = Post::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.blog.post.deactivelist',compact('posts','count'));
    }

    public function create()
    {
        $categories = Postcategory::where('status',1)->get();
        return view('admin.blog.post.new',compact('categories'));
    }

    public function store()
    {
        $post = Post::create($this->validateData());
        $this->storeImage($post);

        if ($post) {
            $notification = array(
                'messege' => 'New Post Added Successfully!',
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

    public function edit(Post $post)
    {
        $categories = Postcategory::where('status',1)->get();
        return view('admin.blog.post.edit',compact('post','categories'));
    }

    public function update(Post $post)
    {
        $post->update($this->validateUpdateData());
        $this->storeUpdateImage($post);

        if ($post) {
    		$notification = array(
    			'messege' => 'Post Information Updated!',
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

    public function active(Post $post)
    {
        $post->update(['status' => 1]);
        if ($post) {
    		$notification = array(
    			'messege' => 'Post Activated!',
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

    public function deactive(Post $post)
    {
        $post->update(['status' => 0]);
        if ($post) {
    		$notification = array(
    			'messege' => 'Post Deactivated!',
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

    public function delete(Post $post)
    {
        if($post->image){
            unlink('storage/app/public/'.$post->image);
        }
        $post->delete();
        if ($post) {
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

    private function validateData()
    {
        return request()->validate([
            'cat_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'keywords' => '',
            'image' => 'required',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'cat_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'keywords' => '',
            'image' => 'required',
        ]);
    }

    private function storeImage($post)
    {
        if(request()->has('image')){
            $post->update([
                'image' => request()->image->store('image/posts','public'),
            ]);

            // $resize = Image::make('storage/app/public/'.$post->image)->resize(300,300);
            // $resize->save();

        }
    }

    private function storeUpdateImage($post)
    {
        if(request()->has('image')){
            
            $post->update([
                'image' => request()->image->store('image/posts','public'),
            ]);
            if(request()->old_image){
                unlink('storage/app/public/'.request()->old_image);
            }
            // $resize = Image::make('storage/app/public/'.$post->image)->resize(300,300);
            // $resize->save();
        }
    }
}

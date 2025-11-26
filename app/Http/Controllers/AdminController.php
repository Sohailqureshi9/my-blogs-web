<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addpost()
    {
        return view('admin.add_post');
    }

    public function createpost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $post->image = $imagename;
        $post->user_name = Auth::User()->name;
        $post->user_id = Auth::User()->id;
        $post->save();
        if ($post->save()) {
            $image->move('postsimage/', $imagename);
            return redirect()->route('admin.addpost')->with('status', 'Post Added Successfully');
        }
    }
    public function allposts()
    {
        $posts = Post::all();
        return view('admin.allposts', compact('posts'));
    }
    

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('admin.editpost', compact('post'));
    }
    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postsimage'), $imagename);
            $post->image = $imagename;
        }

        $post->user_name = Auth::user()->name;
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect()->route('admin.allposts', $post->id)->with('status', 'Post Updated Successfully');
    }
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            $post->delete();
            return redirect()->route('admin.allposts')->with('status', 'Post Deleted Successfully');
        } else {
            return redirect()->route('admin.allposts')->with('error', 'Post Not Found');
        }
    }
    public function viewPost($id){
        $post = Post::findOrFail($id);
        return view('admin.viewpost', compact('post'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showDataHome()
    { 
        $post = Post::all();
        return view('home', compact('post'));
    }
    public function index(Request $request)
    {
        $posts = Post::all();

        if ($request->user()->user_type == 'admin') {
            return view('admin.dashboard' , compact('posts'));
        }
        return redirect()->route('dashboard');
    }

    public function home(Request $request)
    {
        if ($request->user()->user_type == 'user') {
            return view('dashboard');
        }
        return redirect()->route('admin.dashboard');
    }
    public function fullpost($id)
    {
        $post = Post::findOrFail($id);
        return view('fullpost', compact('post'));
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Here you can handle the form submission, e.g., save to database or send email

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    public function showBlog(Request $request)
    {
        $query = Post::query()->latest();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(6)->withQueryString();

        return view('blog', compact('posts'));
    }

    public function privacyPolicy()
    {
        return view('privacy');
    }
}

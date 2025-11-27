<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // store new comment
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),       // current logged-in user
            'body'    => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    // update comment
    public function update(Request $request, Comment $comment)
    {
        // only owner can edit (you can extend with admin check)
        if (Auth::id() !== (int) $comment->user_id) {
            abort(403);
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->update([
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    // delete comment
    public function destroy(Comment $comment)
    {
        if (Auth::id() !== (int) $comment->user_id) {
            abort(403);
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }

    // like comment (simple counter)
    public function like(Comment $comment)
    {
        // optionally require auth
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $comment->increment('likes');

        return redirect()->back();
    }
}

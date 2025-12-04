@extends('home.layout')

@section('title')
Post Details
@endsection

@section('content')

<section class="post-section">
    <div class="container">

        {{-- Single Post Card --}}
        <div class="single-post-card">

            {{-- Back Button --}}
            <div class="back-button" style="margin-bottom: 1rem;">
                <a href="{{ route('home') }}" style="text-decoration:none; color:#2563eb;">
                    <i class="fa-solid fa-arrow-left"></i> Back to Blog
                </a>
            </div>

            {{-- Featured Image --}}
            @if($post->image)
            <div class="single-post-image" style="margin-bottom: 1.5rem;">
                <img src="{{ asset('postsimage/' . $post->image) }}" alt="{{ $post->title }}"
                    style="width:100%; max-height:450px; object-fit:cover; border-radius:12px;">
            </div>
            @endif

            {{-- Meta --}}
            <div class="single-post-meta" style="margin-bottom: 0.75rem; color:#6b7280; font-size:14px;">
                <span class="meta-item">
                    <i class="fa-regular fa-calendar"></i>
                    {{ $post->created_at->format('F j, Y') }}
                </span>
            </div>

            {{-- Title --}}
            <h1 style="font-size:28px; font-weight:700; margin-bottom:1rem; color:#111827;">
                {{ $post->title }}
            </h1>

            {{-- Body --}}
            <div class="single-post-body" style="line-height:1.7; font-size:16px; color:#111827;">
                {!! $post->description !!}
            </div>
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
        @endif

        {{-- Comments Section --}}
        <div class="comments" style="margin-top: 3rem;">
            <h3 style="font-size:20px; font-weight:600; margin-bottom:1rem;">Comments ({{ $post->comments->count() }})
            </h3>

            @if($post->comments->isEmpty())
            <p style="color:#6b7280;">No comments yet. Be the first to comment!</p>
            @else
            <ul class="list-group" style="margin-bottom: 2rem;">
                @foreach($post->comments as $comment)
                <li class="list-group-item" style="margin-bottom:0.75rem; border-radius:8px; border:1px solid #e5e7eb;">
                    {{-- Header --}}
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <strong>{{ optional($comment->user)->name ?? 'User #'.$comment->user_id }}</strong>
                        </div>
                        <small style="color:#9ca3af;">
                            {{ $comment->created_at->diffForHumans() }}
                        </small>
                    </div>

                    {{-- Body --}}
                    <p style="margin-top:0.5rem; margin-bottom:0.75rem; color:#111827;">
                        {{ $comment->body }}
                    </p>

                    {{-- Actions --}}
                    <div style="display:flex; gap:0.5rem; align-items:center;">
                        {{-- Like Button --}}
                        <form method="POST" action="{{ route('comments.like', $comment) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                👍 Like ({{ $comment->likes }})
                            </button>
                        </form>

                        @auth
                        {{-- Edit + Delete only for owner --}}
                        @if(auth()->id() == $comment->user_id)
                      
                            <details style="display:inline-block; margin-left:0.5rem;">
                                <summary class="btn btn-sm btn-outline-secondary">
                                    ✏️ Edit
                                </summary>
                                <form method="POST" action="{{ route('comments.update', $comment) }}"
                                    style="margin-top:0.5rem; max-width:400px;">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="body" rows="2"
                                        class="form-control">{{ old('body', $comment->body) }}</textarea>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                                </form>
                            </details>

                            {{-- Delete --}}
                            <form method="POST" action="{{ route('comments.destroy', $comment) }}"
                                style="display:inline-block; margin-left:0.5rem;"
                                onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    🗑 Delete
                                </button>
                            </form>
                            @endif
                            @endauth
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
        </div>

        {{-- Comment Form --}}
        <div class="card" style="border-radius:12px; border:1px solid #e5e7eb; margin-bottom:3rem;">
            <div class="card-body">
                <h4 style="font-size:18px; font-weight:600; margin-bottom:1rem;">Add a Comment</h4>

                @auth
                <form method="POST" action="{{ route('comment.store', $post) }}">
                    @csrf

                    <div class="form-group">
                        <textarea name="body" placeholder="Write your comment here..." class="form-control" rows="3"
                            style="resize:vertical;"></textarea>
                        @error('body')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">
                        Submit Comment
                    </button>
                </form>
                @else
                <p style="color:#6b7280;">Please <a href="{{ route('login') }}">login</a> to write a comment.</p>
                @endauth
            </div>
        </div>
    </div>
</section>

@endsection
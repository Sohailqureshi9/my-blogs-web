<x-app-layout>
    <x-slot name="header">
        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">
            <h2 style="font-weight:600; font-size:24px; color:#0f172a; margin:0;">
                @if(Auth::check() && Auth::user()->user_type === 'admin')
                {{ __('Admin Dashboard') }}
                @else
                {{ __('Dashboard') }}
                @endif
            </h2>

            <span style="
                font-size:12px;
                font-weight:500;
                padding:5px 12px;
                border-radius:999px;
                background:#fef9c3;
                color:#b45309;
                border:1px solid #fde68a;
            ">
                ✏️ Update Post
            </span>
        </div>
    </x-slot>

    <div style="padding:3rem 0; background:linear-gradient(135deg,#eef2ff,#f9fafb);">
        <div style="max-width:900px; margin:0 auto; padding:0 1.5rem;">
            <div style="
                background:white;
                border-radius:18px;
                border:1px solid #e5e7eb;
                overflow:hidden;
                box-shadow:0 20px 40px rgba(15,23,42,0.12);
            ">

                <!-- Header -->
                <div style="
                    padding:1.3rem 2rem;
                    background:linear-gradient(90deg,#fff7ed,#ffffff);
                    border-bottom:1px solid #e5e7eb;
                ">
                    <!-- ✅ Back Button -->
                    <a href="javascript:history.back()" style="
            display:inline-flex;
            align-items:center;
            gap:6px;
            padding:6px 14px;
            background:#f3f4f6;
            color:#1f2937;
            border-radius:8px;
            font-size:13px;
            font-weight:500;
            border:1px solid #e5e7eb;
            text-decoration:none;
            margin-bottom:10px;
            transition:0.2s;
       ">
                        ← Back
                    </a>
                    <h3 style="margin:0; font-size:22px; font-weight:600; color:#1f2937;">
                        Edit Your Post
                    </h3>
                    <p style="margin:4px 0 0; font-size:13px; color:#6b7280;">
                        Update the title, description, or image of your post.
                    </p>
                </div>

                <!-- Body -->
                <div style="padding:2rem;">

                    @if(session('status'))
                    <div style="
                            background:#ecfdf5;
                            border:1px solid #bbf7d0;
                            padding:0.75rem 1rem;
                            border-radius:12px;
                            font-size:14px;
                            color:#166534;
                            margin-bottom:1.5rem;
                            box-shadow:0 4px 10px rgba(16,185,129,0.15);
                        ">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('admin.updatepost') }}" method="POST" enctype="multipart/form-data"
                        style="display:flex; flex-direction:column; gap:1.35rem;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">

                        <!-- Title -->
                        <div>
                            <label
                                style="font-size:14px; font-weight:600; color:#374151; margin-bottom:5px; display:block;">
                                Post Title
                            </label>
                            <input type="text" name="title" value="{{ $post->title }}" style="
                                    width:100%;
                                    border:1px solid #d1d5db;
                                    border-radius:10px;
                                    padding:0.6rem 0.8rem;
                                    font-size:15px;
                                    background:#f9fafb;
                                    outline:none;
                                " />
                        </div>

                        <!-- Description -->
                        <div>
                            <label
                                style="font-size:14px; font-weight:600; color:#374151; margin-bottom:5px; display:block;">
                                Description
                            </label>
                            <textarea name="description" style="
                                    width:100%;
                                    min-height:160px;
                                    border:1px solid #d1d5db;
                                    border-radius:10px;
                                    padding:0.75rem 0.8rem;
                                    font-size:15px;
                                    background:#f9fafb;
                                    outline:none;
                                    resize:vertical;
                                ">{{ $post->description }}</textarea>
                        </div>

                        <!-- Current Image -->
                        <div>
                            <label
                                style="font-size:14px; font-weight:600; color:#374151; display:block; margin-bottom:8px;">
                                Current Image
                            </label>
                            <img src="{{ asset('postsimage/'.$post->image) }}" alt="{{ $post->title }}" style="
                                    width:140px;
                                    height:140px;
                                    object-fit:cover;
                                    border-radius:12px;
                                    border:1px solid #e5e7eb;
                                    box-shadow:0 6px 12px rgba(0,0,0,0.08);
                                    margin-bottom:10px;
                                ">
                        </div>

                        <!-- Upload New Image -->
                        <div>
                            <label
                                style="font-size:14px; font-weight:600; color:#374151; display:block; margin-bottom:5px;">
                                Upload New Image
                            </label>
                            <input type="file" name="image" style="
                                    padding:8px;
                                    border:1px solid #d1d5db;
                                    border-radius:10px;
                                    font-size:14px;
                                    background:#f9fafb;
                                    cursor:pointer;
                                ">
                        </div>

                        <!-- Submit Button -->
                        <div style="margin-top:10px;">
                            <button type="submit" style="
                                    background:linear-gradient(135deg,#2563eb,#1d4ed8);
                                    color:white;
                                    padding:0.75rem 1.9rem;
                                    border-radius:999px;
                                    border:none;
                                    font-size:15px;
                                    font-weight:600;
                                    cursor:pointer;
                                    display:inline-block;
                                    box-shadow:0 10px 22px rgba(37,99,235,0.45);
                                ">
                                🔄 Update Post
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
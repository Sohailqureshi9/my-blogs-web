<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2 style="font-weight:600; font-size:24px; color:#0f172a; margin:0;">
                @if(Auth::check() && Auth::user()->user_type == 'admin')
                {{ __('Admin Dashboard') }}
                @else
                {{ __('User Dashboard') }}
                @endif
            </h2>

            <span style="
                font-size:12px;
                font-weight:500;
                padding:5px 12px;
                border-radius:999px;
                background:#e0f2fe;
                color:#1d4ed8;
                border:1px solid #bfdbfe;
            ">
                📖 View Post
            </span>
        </div>
    </x-slot>

    <div style="padding:3rem 0; background:linear-gradient(135deg,#eef2ff,#f9fafb);">
        <div style="max-width:900px; margin:0 auto; padding:0 1.5rem;">
            <div style="
                background:#ffffff;
                border-radius:18px;
                border:1px solid #e5e7eb;
                box-shadow:0 20px 40px rgba(15,23,42,0.12);
                overflow:hidden;
            ">

                {{-- Card Header --}}
                <div style="
                    padding:1.5rem 2rem 1.25rem;
                    border-bottom:1px solid #e5e7eb;
                    background:linear-gradient(90deg,#eff6ff,#ffffff);
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
                    <h1 style="font-size:26px; font-weight:700; color:#111827; margin:0 0 0.3rem;">
                        {{ $post->title }}
                    </h1>
                    <div style="font-size:13px; color:#6b7280; display:flex; align-items:center; gap:6px;">
                        <span>Published on {{ $post->created_at->format('F j, Y') }}</span>
                        <span style="color:#d1d5db;">•</span>
                        <span>Post ID: #{{ $post->id }}</span>
                    </div>
                </div>

                {{-- Card Body --}}
                <div style="padding:2rem;">

                    {{-- Featured Image --}}
                    @if($post->image)
                    <div
                        style="margin-bottom:1.75rem; border-radius:14px; overflow:hidden; border:1px solid #e5e7eb; background:#f9fafb;">
                        <img src="{{ asset('postsimage/' . $post->image) }}" alt="{{ $post->title }}" style="
                                    width:100%;
                                    max-height:420px;
                                    object-fit:cover;
                                    display:block;
                                ">
                    </div>
                    @endif

                    {{-- Post Content --}}
                    <div style="
                        font-size:15px;
                        line-height:1.7;
                        color:#111827;
                        margin-bottom:2rem;
                        word-wrap:break-word;
                    ">
                        {!! $post->description !!}
                    </div>

                    {{-- Divider --}}
                    <hr style="border:none; border-top:1px solid #e5e7eb; margin:0 0 1.75rem;">

                    {{-- Comments Section --}}
                    <div style="
                        background:#f9fafb;
                        border-radius:14px;
                        border:1px solid #e5e7eb;
                        padding:1.5rem 1.75rem;
                    ">
                        <div
                            style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.75rem;">
                            <h3 style="margin:0; font-size:18px; font-weight:600; color:#111827;">
                                💬 Comments
                            </h3>
                            <span style="font-size:12px; color:#6b7280;">
                                Join the discussion below
                            </span>
                        </div>

                        {{-- Admin view: show comments only (no form/actions) --}}
                        <div class="comments" style="margin-top:1rem;">
                            <h4 style="font-size:16px; font-weight:600; margin-bottom:0.75rem;">
                                Comments ({{ $post->comments->count() }})
                            </h4>

                            @if($post->comments->isEmpty())
                            <p style="color:#6b7280; margin:0;">No comments yet.</p>
                            @else
                            <ul style="list-style:none; padding:0; margin:0;">
                                @foreach($post->comments as $comment)
                                <li
                                    style="margin-bottom:0.875rem; padding:0.75rem; border-radius:10px; background:#fff; border:1px solid #e5e7eb;">
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div style="font-weight:600; color:#111827;">
                                            {{ optional($comment->user)->name ?? 'User #'.$comment->user_id }}
                                        </div>
                                        <div style="font-size:12px; color:#9ca3af;">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </div>
                                    </div>

                                    <p style="margin-top:0.5rem; margin-bottom:0; color:#111827; white-space:pre-wrap;">
                                        {{ $comment->body }}
                                    </p>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
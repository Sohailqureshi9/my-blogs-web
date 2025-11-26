<x-app-layout>
    <x-slot name="header">
        <div style="
            display:flex;
            align-items:center;
            justify-content:space-between;
        ">
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
                padding:4px 10px;
                border-radius:999px;
                background:#e0f2fe;
                color:#1d4ed8;
                border:1px solid #bfdbfe;
            ">
                📂 Posts Management
            </span>
        </div>
    </x-slot>

    <div style="padding:3rem 0; background:linear-gradient(135deg,#eef2ff,#f9fafb);">

        <div style="max-width:1100px; margin:0 auto; padding:0 1.5rem;">
            <div style="
                background:#ffffff;
                border-radius:16px;
                border:1px solid #e5e7eb;
                box-shadow:0 18px 40px rgba(15,23,42,0.12);
                overflow:hidden;
            ">

                <div
                    style="padding:1.25rem 1.75rem; border-bottom:1px solid #e5e7eb; background:linear-gradient(90deg,#eff6ff,#ffffff);">
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
                    <h1 style="color:#111827; text-align:left; margin:0 0 4px; font-size:22px; font-weight:600;">
                        Posts Management
                    </h1>
                    <p style="margin:0; font-size:13px; color:#6b7280;">
                        View, update, or delete posts from your blog in one place.
                    </p>
                </div>

                <div style="padding:1.75rem;">
                    @if(session('status'))
                    <div style="
                            margin-bottom:1.25rem;
                            border-radius:10px;
                            background:#ecfdf5;
                            border:1px solid #bbf7d0;
                            padding:0.75rem 1rem;
                            font-size:14px;
                            color:#166534;
                        ">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div style="overflow-x:auto;">
                        <table style="
                                width:100%;
                                border-collapse:collapse;
                                background-color:#ffffff;
                                border-radius:12px;
                                overflow:hidden;
                                box-shadow:0 6px 16px rgba(15,23,42,0.08);
                                font-size:14px;
                            ">
                            <thead>
                                <tr style="background:linear-gradient(90deg,#22c55e,#16a34a); color:#ffffff;">
                                    <th
                                        style="padding:12px 14px; text-align:left; font-weight:600; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">
                                        ID
                                    </th>
                                    <th
                                        style="padding:12px 14px; text-align:left; font-weight:600; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">
                                        Title
                                    </th>
                                    <th
                                        style="padding:12px 14px; text-align:left; font-weight:600; font-size:12px; letter-spacing:0.04em; text-transform:uppercase; width:40%;">
                                        Description
                                    </th>
                                    <th
                                        style="padding:12px 14px; text-align:left; font-weight:600; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">
                                        Image
                                    </th>
                                    <th
                                        style="padding:12px 14px; text-align:left; font-weight:600; font-size:12px; letter-spacing:0.04em; text-transform:uppercase;">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr style="
                                        border-bottom:1px solid #e5e7eb;
                                        background-color:#ffffff;
                                        transition:background-color 0.15s ease;
                                    " onmouseover="this.style.backgroundColor='#f9fafb';"
                                    onmouseout="this.style.backgroundColor='#ffffff';">
                                    <td style="padding:12px 14px; color:#111827; font-weight:500;">
                                        {{ $post->id }}
                                    </td>
                                    <td style="padding:12px 14px; color:#111827; font-weight:500;">
                                        {{ $post->title }}
                                    </td>
                                    <td style="padding:12px 14px; color:#4b5563; font-size:13px;">
                                        {{ Str::limit($post->description, 100) }}
                                    </td>
                                    <td style="padding:12px 14px;">
                                        @if($post->image)
                                        <img src="{{ asset('postsimage/'.$post->image) }}" alt="{{ $post->title }}"
                                            style="
                                                        width:80px;
                                                        height:80px;
                                                        object-fit:cover;
                                                        border-radius:8px;
                                                        border:1px solid #e5e7eb;
                                                    ">
                                        @else
                                        <span style="font-size:12px; color:#9ca3af;">No image</span>
                                        @endif
                                    </td>
                                    <td style="padding:12px 14px;">
                                        <div style="display:flex; flex-wrap:wrap; gap:6px;">
                                            <a href="{{ route('admin.editpost', $post->id) }}" style="
                                                        display:inline-block;
                                                        background:linear-gradient(135deg,#3b82f6,#2563eb);
                                                        color:#ffffff;
                                                        padding:6px 12px;
                                                        border-radius:999px;
                                                        text-decoration:none;
                                                        font-size:12px;
                                                        font-weight:500;
                                                        box-shadow:0 4px 10px rgba(37,99,235,0.35);
                                                    ">
                                                ✏️ Update
                                            </a>

                                            <a href="{{ route('admin.viewpost', $post->id) }}" style="
                                                        display:inline-block;
                                                        background:#10b981;
                                                        color:#ffffff;
                                                        padding:6px 12px;
                                                        border-radius:999px;
                                                        text-decoration:none;
                                                        font-size:12px;
                                                        font-weight:500;
                                                        box-shadow:0 4px 10px rgba(16,185,129,0.35);
                                                    ">
                                                👁️ View
                                            </a>

                                            <form action="{{ route('admin.deletepost', $post->id) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="
                                                            background:#ef4444;
                                                            color:#ffffff;
                                                            padding:6px 12px;
                                                            border-radius:999px;
                                                            border:none;
                                                            font-size:12px;
                                                            font-weight:500;
                                                            cursor:pointer;
                                                            box-shadow:0 4px 10px rgba(239,68,68,0.35);
                                                        ">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @if($posts->isEmpty())
                                <tr>
                                    <td colspan="5"
                                        style="padding:16px 14px; text-align:center; font-size:14px; color:#6b7280;">
                                        No posts found. Start by creating a new post.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
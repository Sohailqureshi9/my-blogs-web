<x-app-layout>
    <x-slot name="header">
        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">
            <h2 style="font-weight:600; font-size:24px; color:#0f172a; line-height:1.4; margin:0;">
                @if(Auth::check() && Auth::user()->user_type === 'admin')
                {{ __('Admin Dashboard') }}
                @else
                {{ __('Dashboard') }}
                @endif
            </h2>

            <span style="
                font-size:12px;
                font-weight:500;
                padding:0.25rem 0.65rem;
                border-radius:999px;
                background:#e0f2fe;
                color:#1d4ed8;
                border:1px solid #bfdbfe;
            ">
                ✍️ New Blog Post
            </span>
        </div>
    </x-slot>

    <div style="
        padding:3rem 0;
        background:linear-gradient(135deg,#eef2ff,#f9fafb);
    ">
        <div style="max-width:960px; margin:0 auto; padding:0 1.5rem;">
            <div style="
                background:#ffffff;
                border-radius:16px;
                border:1px solid #e5e7eb;
                box-shadow:0 20px 40px rgba(15,23,42,0.10);
                overflow:hidden;
            ">
             
                {{-- Card Header --}}
                <div style="
                    padding:1rem 2.5rem;
                    border-bottom:1px solid #e5e7eb;
                    display:flex;
                    align-items:center;
                    justify-content:space-between;
                    background:linear-gradient(90deg,#eff6ff,#ffffff);
                ">
                <!-- ✅ Back Button Added Here -->
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
                                        margin-bottom:8px;
                                   ">
                            ← Back
                        </a>
                    <div>
                        <h3 style="
                            font-size:22px;
                            font-weight:600;
                            margin:0;
                            color:#111827;
                        ">
                            Create New Post
                        </h3>
                        <p style="
                            margin:0.25rem 0 0;
                            font-size:13px;
                            color:#6b7280;
                        ">
                            Fill in the details below to publish a fresh article to your blog.
                        </p>
                    </div>

                    <div style="
                        font-size:11px;
                        color:#6b7280;
                        text-align:right;
                    ">
                        <span style="display:block;">Status: <strong style="color:#16a34a;">Draft</strong></span>
                        <span style="display:block;">Visibility: <strong>Public</strong></span>
                    </div>
                </div>

                {{-- Card Body --}}
                <div style="padding:2.5rem;">
                    {{-- Success Message --}}
                    @if(session('status'))
                    <div style="
                            margin-bottom:1.75rem;
                            border-radius:10px;
                            background:#ecfdf5;
                            border:1px solid #bbf7d0;
                            padding:0.85rem 1.1rem;
                            font-size:14px;
                            color:#166534;
                        ">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())
                    <div style="
                            margin-bottom:1.75rem;
                            border-radius:10px;
                            background:#fef2f2;
                            border:1px solid #fecaca;
                            padding:0.85rem 1.1rem;
                            font-size:14px;
                            color:#b91c1c;
                        ">
                        <ul style="padding-left:1.2rem; margin:0;">
                            @foreach($errors->all() as $error)
                            <li style="margin-bottom:0.25rem;">
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div style="
                        display:flex;
                        flex-wrap:wrap;
                        gap:1.75rem;
                        align-items:flex-start;
                    ">
                        {{-- Form Column --}}
                        <div style="flex:1 1 320px; min-width:0;">
                            <form action="{{ route('admin.createpost') }}" method="POST" enctype="multipart/form-data"
                                style="display:flex; flex-direction:column; gap:1.35rem;">
                                @csrf

                                {{-- Title --}}
                                <div>
                                    <label for="title"
                                        style="display:block; font-size:14px; font-weight:600; color:#111827; margin-bottom:0.4rem;">
                                        Post Title <span style="color:#dc2626;">*</span>
                                    </label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        placeholder="e.g. 5 Tips to Improve Your Laravel Blog" style="
                                            width:100%;
                                            border:1px solid #d1d5db;
                                            border-radius:10px;
                                            padding:0.6rem 0.8rem;
                                            font-size:14px;
                                            color:#111827;
                                            outline:none;
                                            box-sizing:border-box;
                                            background-color:#f9fafb;
                                        ">
                                </div>

                                {{-- Description --}}
                                <div>
                                    <label for="description"
                                        style="display:block; font-size:14px; font-weight:600; color:#111827; margin-bottom:0.4rem;">
                                        Description / Content <span style="color:#dc2626;">*</span>
                                    </label>
                                    <textarea name="description" id="description" rows="7"
                                        placeholder="Write your post content here..." style="
                                            width:100%;
                                            border:1px solid #d1d5db;
                                            border-radius:10px;
                                            padding:0.75rem 0.8rem;
                                            font-size:14px;
                                            color:#111827;
                                            resize:vertical;
                                            outline:none;
                                            box-sizing:border-box;
                                            background-color:#f9fafb;
                                            line-height:1.5;
                                        ">{{ old('description') }}</textarea>
                                </div>

                                {{-- Image --}}
                                <div>
                                    <label for="image"
                                        style="display:block; font-size:14px; font-weight:600; color:#111827; margin-bottom:0.4rem;">
                                        Featured Image
                                    </label>

                                    <div style="
                                        display:flex;
                                        align-items:center;
                                        gap:0.75rem;
                                        flex-wrap:wrap;
                                    ">
                                        <div style="
                                            position:relative;
                                            overflow:hidden;
                                            border-radius:12px;
                                            border:1px dashed #93c5fd;
                                            background:#eff6ff;
                                            padding:0.75rem 1.1rem;
                                            cursor:pointer;
                                            flex:1 1 180px;
                                        ">
                                            <span style="
                                                display:block;
                                                font-size:13px;
                                                font-weight:500;
                                                color:#1d4ed8;
                                            ">
                                                Click to upload image
                                            </span>
                                            <span style="
                                                display:block;
                                                font-size:11px;
                                                color:#6b7280;
                                                margin-top:0.15rem;
                                            ">
                                                JPG, PNG up to ~2MB
                                            </span>
                                            <input type="file" name="image" id="image" style="
                                                    position:absolute;
                                                    top:0;
                                                    left:0;
                                                    width:100%;
                                                    height:100%;
                                                    opacity:0;
                                                    cursor:pointer;
                                                ">
                                        </div>
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div style="display:flex; justify-content:flex-end; margin-top:0.75rem;">
                                    <button type="submit" style="
                                            display:inline-flex;
                                            align-items:center;
                                            justify-content:center;
                                            padding:0.75rem 1.9rem;
                                            border-radius:999px;
                                            border:none;
                                            font-size:14px;
                                            font-weight:600;
                                            color:#ffffff;
                                            background:linear-gradient(135deg,#2563eb,#1d4ed8);
                                            box-shadow:0 10px 22px rgba(37,99,235,0.45);
                                            cursor:pointer;
                                            letter-spacing:0.02em;
                                        ">
                                        ➕ Publish Post
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Side Info Column --}}
                        <div style="flex:0.9 1 240px; min-width:220px;">
                            <div style="
                                border-radius:12px;
                                border:1px dashed #e5e7eb;
                                background:#f9fafb;
                                padding:1rem 1.1rem;
                            ">
                                <h4 style="
                                    font-size:14px;
                                    font-weight:600;
                                    color:#111827;
                                    margin:0 0 0.6rem;
                                ">
                                    📝 Writing Tips
                                </h4>
                                <p style="font-size:12px; color:#6b7280; margin:0 0 0.4rem;">
                                    • Use a clear and descriptive title so users understand the topic instantly.
                                </p>
                                <p style="font-size:12px; color:#6b7280; margin:0 0 0.4rem;">
                                    • Keep paragraphs short and easy to read. Use headings and bullet points if needed.
                                </p>
                                <p style="font-size:12px; color:#6b7280; margin:0 0 0.4rem;">
                                    • Add a clean, relevant image to make your post visually appealing.
                                </p>
                                <p style="font-size:12px; color:#6b7280; margin:0;">
                                    • Review once before publishing to avoid typos and formatting issues.
                                </p>
                            </div>

                            <div style="
                                margin-top:1rem;
                                padding:0.85rem 1rem;
                                border-radius:12px;
                                background:#eff6ff;
                                border:1px solid #dbeafe;
                                font-size:12px;
                                color:#1d4ed8;
                            ">
                                <strong style="display:block; margin-bottom:0.25rem;">🔒 Note</strong>
                                Only authenticated users can create posts from this panel.
                            </div>
                        </div>
                    </div>

                </div> {{-- /Card Body --}}
            </div>
        </div>
    </div>
</x-app-layout>
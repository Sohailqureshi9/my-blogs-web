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
                background:#e0f2fe;
                color:#1d4ed8;
                border:1px solid #bfdbfe;
            ">
                📝 Create Post Page
            </span>
        </div>
    </x-slot>

    <div style="padding:3rem 0; background:linear-gradient(135deg,#eef2ff,#f9fafb);">
        <div style="max-width:850px; margin:0 auto; padding:0 1.5rem;">
            <div style="
                background:white;
                border-radius:18px;
                border:1px solid #e5e7eb;
                overflow:hidden;
                box-shadow:0 20px 40px rgba(15,23,42,0.10);
            ">
                <!-- Header Bar -->
                <div style="
                    padding:1.3rem 2rem;
                    background:linear-gradient(90deg,#eff6ff,#ffffff);
                    border-bottom:1px solid #e5e7eb;
                ">
                    <h3 style="margin:0; font-size:22px; font-weight:600; color:#1f2937;">
                        Create New Post
                    </h3>
                    <p style="margin:4px 0 0; font-size:13px; color:#6b7280;">
                        Start writing your new blog post below.
                    </p>
                </div>

                <!-- Body -->
                <div style="padding:2rem;">

                    <div style="
                        background:#f0f9ff;
                        border:1px solid #bae6fd;
                        padding:1.25rem 1.5rem;
                        border-radius:12px;
                        font-size:15px;
                        color:#0369a1;
                        display:flex;
                        align-items:center;
                        gap:10px;
                        box-shadow:0 4px 10px rgba(59,130,246,0.10);
                    ">
                        <span style="font-size:20px;">💡</span>
                        <div>
                            <strong>You're on the Create Post Page!</strong>
                            <p style="margin:4px 0 0; font-size:14px; color:#0c4a6e;">
                                Use the navigation above to start adding a new blog post with title, description, and
                                featured image.
                            </p>
                        </div>
                    </div>

                    <div style="margin-top:1.5rem; font-size:14px; color:#6b7280;">
                        Tip: Go back to <strong>Posts Management</strong> to manage or edit your posts.
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
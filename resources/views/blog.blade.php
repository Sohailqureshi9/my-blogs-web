@extends('home.layout')

@section('content')
<div class="blog-wrapper"
    style="max-width: 1100px; margin: 40px auto 60px; padding: 0 20px; font-family: 'Roboto', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;">
    {{-- Header + Search --}}
    <div
        style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:flex-end; gap:16px; margin-bottom:20px;">
        <div>
            <span
                style="display:inline-flex; align-items:center; padding:4px 12px; border-radius:999px; background:#eef2ff; border:1px solid rgba(129,140,248,0.5); color:#4f46e5; font-size:12px; font-weight:600; margin-bottom:8px;">
                Blog
            </span>
            <h1 style="font-size:28px; margin:0 0 4px; letter-spacing:-0.03em; color:#020617;">
                All Articles
            </h1>
            <p style="color:#64748b; font-size:14px; margin:0;">
                Browse all posts about Laravel, PHP, and modern web development.
            </p>
        </div>

        {{-- Search --}}
        <form method="GET" action="{{ route('home') }}"
            style="display:flex; align-items:center; gap:8px; max-width:300px; width:100%;">
            <div style="position:relative; flex:1;">
                <span
                    style="position:absolute; left:10px; top:50%; transform:translateY(-50%); color:#9ca3af; font-size:13px;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search posts..."
                    style="width:100%; padding:8px 10px 8px 30px; border-radius:999px; border:1px solid #d1d5db; font-size:13px; outline:none;">
            </div>
            <button type="submit"
                style="padding:8px 14px; border-radius:999px; border:none; background:#4f46e5; color:#ffffff; font-size:13px; font-weight:500; cursor:pointer;">
                Search
            </button>
        </form>
    </div>

    {{-- Small meta line --}}
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px; gap:10px;">
        <p style="font-size:13px; color:#9ca3af; margin:0;">
            Showing {{ $posts->count() }} of {{ $posts->total() }} {{ $posts->total() === 1 ? 'post' : 'posts' }}
            @if (request('q'))
            for "<span style="font-weight:600; color:#4f46e5;">{{ request('q') }}</span>"
            @endif
        </p>
    </div>

    {{-- Posts Grid --}}
    <div class="blog-posts-grid"
        style="display:grid; grid-template-columns:repeat(auto-fill,minmax(310px,1fr)); gap:26px; margin-top:10px;">
        @forelse ($posts as $post)
        <div class="post-card"
            style="background:#ffffff; border-radius:18px; overflow:hidden; box-shadow:0 18px 40px rgba(15,23,42,0.08); border:1px solid rgba(148,163,184,0.18); display:flex; flex-direction:column; height:100%;">
            {{-- Image --}}
            <div class="post-image" style="height:190px; overflow:hidden; background:#0f172a;">
                @if ($post->image)
                <img src="{{ asset('postsimage/'.$post->image) }}" alt="{{ $post->title }}"
                    style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;">
                @else
                <div
                    style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; color:#e5e7eb; font-size:13px; letter-spacing:0.08em; text-transform:uppercase; background:linear-gradient(135deg,#4f46e5,#6366f1);">
                    No Image
                </div>
                @endif
            </div>

            {{-- Content --}}
            <div class="post-content" style="padding:18px 18px 16px; display:flex; flex-direction:column; flex:1;">
                <div class="post-meta"
                    style="display:flex; flex-wrap:wrap; gap:10px; font-size:12px; color:#94a3b8; margin-bottom:8px;">
                    <span style="display:inline-flex; align-items:center; gap:6px;">
                        <i class="fa-regular fa-calendar" style="font-size:12px;"></i>
                        {{ $post->created_at?->format('M d, Y') }}
                    </span>

                    <span style="display:inline-flex; align-items:center; gap:6px;">
                        <i class="fa-regular fa-clock" style="font-size:12px;"></i>
                        ~5 min read
                    </span>
                </div>

                <h2 class="post-title"
                    style="font-size:18px; margin-bottom:6px; color:#020617; font-weight:600; line-height:1.4;">
                    {{ $post->title }}
                </h2>

                <p class="post-excerpt"
                    style="color:#64748b; margin-bottom:14px; font-size:14px; line-height:1.7; flex:1;">
                    {{ \Illuminate\Support\Str::limit(strip_tags($post->description), 150, '...') }}
                </p>

                <a href="{{ route('fullpost', $post->id) }}"
                    style="display:inline-flex; align-items:center; gap:6px; font-weight:600; font-size:13px; color:#4f46e5; text-decoration:none; margin-top:auto;">
                    Read More
                    <span
                        style="display:inline-flex; align-items:center; justify-content:center; width:22px; height:22px; border-radius:999px; background:#eef2ff;">
                        <i class="fa-solid fa-arrow-right" style="font-size:11px;"></i>
                    </span>
                </a>
            </div>
        </div>
        @empty
        <div
            style="grid-column:1 / -1; background:#ffffff; border-radius:16px; padding:20px 18px; text-align:center; color:#6b7280; box-shadow:0 12px 30px rgba(15,23,42,0.06); border:1px dashed rgba(148,163,184,0.6);">
            No blog posts found.
            @if (request('q'))
            Try searching with a different keyword.
            @else
            Once you publish your first article, it will appear here. 🚀
            @endif
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if ($posts->hasPages())
    <div style="margin-top:26px;">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
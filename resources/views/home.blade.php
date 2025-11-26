@extends('home.layout')

@section('content')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    <!-- Header row -->
    <div style="display:flex; justify-content:space-between; align-items:flex-end; gap:16px; margin-bottom:18px;">
        <div>
            <h2 class="section-title" style="margin:0; text-align:left;">
                Featured Posts
            </h2>
            <p style="color:#64748b; font-size:14px; margin-top:6px;">
                Latest articles, handpicked to help you level up your Laravel skills.
            </p>
        </div>

        @if ($post->count())
        <span style="font-size:13px; color:#9ca3af;">
            {{ $post->count() }} {{ $post->count() === 1 ? 'post' : 'posts' }}
        </span>
        @endif
    </div>

    <div class="featured-posts"
        style="display:grid; grid-template-columns:repeat(auto-fill,minmax(310px,1fr)); gap:26px;">
        @forelse ($post as $posts)
        <div class="post-card"
            style="background:#ffffff; border-radius:18px; overflow:hidden; box-shadow:0 18px 40px rgba(15,23,42,0.08); border:1px solid rgba(148,163,184,0.18); display:flex; flex-direction:column; height:100%;">
            {{-- Image --}}
            <div class="post-image" style="height:190px; overflow:hidden; background:#0f172a;">
                @if ($posts->image)
                <img src="{{ asset('postsimage/'.$posts->image) }}" alt="{{ $posts->title }}"
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
                        {{ $posts->created_at ? $posts->created_at->format('M d, Y') : '' }}
                    </span>

                    <span style="display:inline-flex; align-items:center; gap:6px;">
                        <i class="fa-regular fa-clock" style="font-size:12px;"></i>
                        ~5 min read
                    </span>
                </div>

                <h3 class="post-title"
                    style="font-size:18px; margin-bottom:8px; color:#020617; font-weight:600; line-height:1.4;">
                    {{ $posts->title }}
                </h3>

                <p class="post-excerpt"
                    style="color:#64748b; margin-bottom:14px; font-size:14px; line-height:1.7; flex:1;">
                    {{ \Illuminate\Support\Str::limit(strip_tags($posts->description), 140, '...') }}
                </p>

                <a href="{{ route('fullpost', $posts->id) }}" class="read-more"
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
            No posts published yet. Once you add your first article, it will appear here. 🚀
        </div>
        @endforelse
    </div>
</div>
@endsection
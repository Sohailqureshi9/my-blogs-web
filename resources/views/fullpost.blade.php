@extends('home.layout')

@section('content')

<!-- Single Post Content -->
<section class="post-section">

    <div class="container">
        <div class="single-post-card">
            <!-- Back Button -->
            <div class="back-button">
                <a href="{{ route('home') }}">
                    <i class="fa-solid fa-arrow-left"></i> Back to Blog
                </a>
            </div>
            <!-- Featured Image -->
            @if($post->image)
            <div class="single-post-image">
                <img src="{{ asset('postsimage/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
            @endif

            <!-- Post Meta -->
            <div class="single-post-meta">
                <span class="meta-item">
                    <i class="fa-regular fa-calendar"></i>
                    {{ $post->created_at->format('F j, Y') }}
                </span>
                {{-- <span class="meta-item"><i class="fa-solid fa-tag"></i> {{ $post->category->name }}</span> --}}
            </div>

            <!-- Post Body -->
            <div class="single-post-body">
                {!! $post->description !!}
            </div>
        </div>

        <!-- Comments Section -->
        <div class="comments-wrapper">
            <h3 class="section-title">Comments</h3>
            <div class="comments-card">
                <livewire:comments :model="$post" />
            </div>
        </div>
    </div>
</section>
@endsection
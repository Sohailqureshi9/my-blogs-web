@extends('home.layout')

@section('title')

About

@endsection

@section('content')
<div class="about-wrapper"
    style="max-width: 1100px; margin: 40px auto 50px; padding: 0 20px; font-family: 'Roboto', system-ui, -apple-system, BlinkMacSystemFont, sans-serif; color: #0f172a;">
    <!-- Page Header -->
    <div class="about-header" style="text-align: center; margin-bottom: 32px;">
        <span class="about-pill"
            style="display:inline-flex; align-items:center; padding:4px 12px; border-radius:999px; background:#eef2ff; border:1px solid rgba(129,140,248,0.5); color:#4f46e5; font-size:12px; font-weight:600; margin-bottom:10px;">
            About
        </span>
        <h1 style="font-size:32px; letter-spacing:-0.03em; margin-bottom:10px; color:#020617;">
            About <span style="color:#4f46e5;">My Blog</span>
        </h1>
        <p style="max-width:720px; margin:0 auto; font-size:15px; color:#64748b; line-height:1.7;">
            LaraBlog is a developer-focused space where we share practical guides, tips, and deep dives
            into Laravel, PHP, and modern web development. The goal is simple: help you write cleaner,
            better code with real-world examples.
        </p>
    </div>

    <!-- Two-column section -->
    <div class="about-grid" style="display:flex; flex-wrap:wrap; gap:24px; margin-bottom:32px;">
        <div class="about-card"
            style="flex:1 1 300px; background:#ffffff; border-radius:18px; padding:20px 20px 18px; box-shadow:0 18px 40px rgba(15,23,42,0.08); border:1px solid rgba(148,163,184,0.25);">
            <h2 style="font-size:20px; margin-bottom:10px; color:#0f172a;">
                Our Mission
            </h2>
            <p style="font-size:14px; color:#475569; margin-bottom:8px; line-height:1.7;">
                The mission of LaraBlog is to simplify complex backend concepts and present them in a
                beginner-friendly yet production-focused way. Whether you're just getting started with Laravel
                or building advanced features, you’ll find something useful here.
            </p>
            <p style="font-size:14px; color:#475569; margin-bottom:0; line-height:1.7;">
                Every article is written with clarity, structure, and real code samples so you can apply
                what you learn directly in your projects.
            </p>
        </div>

        <div class="about-card"
            style="flex:1 1 300px; background:#ffffff; border-radius:18px; padding:20px 20px 18px; box-shadow:0 18px 40px rgba(15,23,42,0.08); border:1px solid rgba(148,163,184,0.25);">
            <h2 style="font-size:20px; margin-bottom:10px; color:#0f172a;">
                Who Runs This Blog?
            </h2>
            <p style="font-size:14px; color:#475569; margin-bottom:10px; line-height:1.7;">
                LaraBlog is maintained by a passionate Laravel & PHP developer who enjoys building web apps,
                experimenting with new tools, and documenting the journey along the way.
            </p>
            <ul class="about-list"
                style="list-style:none; margin:0; padding:0; display:grid; gap:6px; font-size:14px; color:#1e293b;">
                <li style="display:inline-flex; align-items:center; gap:8px;">
                    <i class="fa-solid fa-code" style="font-size:12px; color:#4f46e5;"></i>
                    Loves Laravel, PHP, and clean architecture
                </li>
                <li style="display:inline-flex; align-items:center; gap:8px;">
                    <i class="fa-solid fa-book" style="font-size:12px; color:#4f46e5;"></i>
                    Believes in “learn → build → teach”
                </li>
                <li style="display:inline-flex; align-items:center; gap:8px;">
                    <i class="fa-solid fa-heart" style="font-size:12px; color:#ef4444;"></i>
                    Enjoys helping other developers grow
                </li>
            </ul>
        </div>
    </div>

    <!-- What you’ll find -->
    <div class="about-section" style="margin-bottom:32px;">
        <h2 style="font-size:22px; margin-bottom:16px; color:#0f172a;">
            What You’ll Find on My Blog
        </h2>
        <div class="about-features" style="display:flex; flex-wrap:wrap; gap:20px;">
            <div class="about-feature-card"
                style="flex:1 1 260px; background:#ffffff; border-radius:16px; padding:18px 16px 16px; box-shadow:0 14px 32px rgba(15,23,42,0.06); border:1px solid rgba(148,163,184,0.2);">
                <span class="feature-icon"
                    style="display:inline-flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:999px; background:#eef2ff; color:#4f46e5; margin-bottom:8px;">
                    <i class="fa-solid fa-lightbulb" style="font-size:14px;"></i>
                </span>
                <h3 style="font-size:16px; margin-bottom:6px; color:#020617;">
                    Laravel Tutorials
                </h3>
                <p style="font-size:14px; color:#64748b; line-height:1.7; margin:0;">
                    Step-by-step tutorials on routing, Eloquent ORM, authentication, Blade, and more,
                    with practical mini-projects.
                </p>
            </div>

            <div class="about-feature-card"
                style="flex:1 1 260px; background:#ffffff; border-radius:16px; padding:18px 16px 16px; box-shadow:0 14px 32px rgba(15,23,42,0.06); border:1px solid rgba(148,163,184,0.2);">
                <span class="feature-icon"
                    style="display:inline-flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:999px; background:#eef2ff; color:#4f46e5; margin-bottom:8px;">
                    <i class="fa-solid fa-diagram-project" style="font-size:14px;"></i>
                </span>
                <h3 style="font-size:16px; margin-bottom:6px; color:#020617;">
                    Real-World Patterns
                </h3>
                <p style="font-size:14px; color:#64748b; line-height:1.7; margin:0;">
                    Learn how to structure projects, handle relationships, validation, and build features
                    used in real applications.
                </p>
            </div>

            <div class="about-feature-card"
                style="flex:1 1 260px; background:#ffffff; border-radius:16px; padding:18px 16px 16px; box-shadow:0 14px 32px rgba(15,23,42,0.06); border:1px solid rgba(148,163,184,0.2);">
                <span class="feature-icon"
                    style="display:inline-flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:999px; background:#eef2ff; color:#4f46e5; margin-bottom:8px;">
                    <i class="fa-solid fa-rocket" style="font-size:14px;"></i>
                </span>
                <h3 style="font-size:16px; margin-bottom:6px; color:#020617;">
                    Career & Growth
                </h3>
                <p style="font-size:14px; color:#64748b; line-height:1.7; margin:0;">
                    Tips on improving as a developer, writing better code, and building projects that
                    showcase your skills.
                </p>
            </div>
        </div>
    </div>

    <!-- Tech stack section -->
    <div class="about-section" style="margin-bottom:32px;">
        <h2 style="font-size:22px; margin-bottom:16px; color:#0f172a;">
            Tech Stack We Love
        </h2>
        <div class="about-tags" style="display:flex; flex-wrap:wrap; gap:10px;">
            @php
            $tags = [
            'Laravel', 'PHP', 'MySQL', 'Blade Templates',
            'REST APIs', 'JavaScript', 'Bootstrap / Tailwind', 'Git & GitHub'
            ];
            @endphp

            @foreach ($tags as $tag)
            <span class="tag-pill"
                style="padding:6px 12px; border-radius:999px; background:#ffffff; border:1px solid rgba(148,163,184,0.6); font-size:13px; color:#0f172a;">
                {{ $tag }}
            </span>
            @endforeach
        </div>
    </div>

    <!-- Call to action -->
    <div class="about-cta"
        style="text-align:center; background:#ffffff; border-radius:18px; padding:24px 20px; box-shadow:0 18px 45px rgba(15,23,42,0.08); border:1px solid rgba(148,163,184,0.25);">
        <h2 style="font-size:22px; margin-bottom:8px; color:#020617;">
            Join the Journey
        </h2>
        <p style="font-size:14px; color:#64748b; max-width:520px; margin:0 auto 16px; line-height:1.7;">
            Whether you’re just starting with Laravel or already building complex applications,
            LaraBlog is here to support your learning journey.
        </p>
        <div class="about-cta-actions" style="display:flex; justify-content:center; flex-wrap:wrap; gap:12px;">
            <a href="/blog" class="btn btn-primary"
                style="display:inline-flex; align-items:center; justify-content:center; padding:10px 18px; border-radius:999px; font-weight:500; font-size:14px; border:none; cursor:pointer; gap:6px; background:linear-gradient(135deg,#6366f1,#4f46e5); color:#ffffff; box-shadow:0 12px 25px rgba(79,70,229,0.35);">
                <i class="fa-solid fa-book-open-reader" style="font-size:13px;"></i>
                Explore Articles
            </a>

            <a href="/contact" class="btn btn-ghost"
                style="display:inline-flex; align-items:center; justify-content:center; padding:10px 18px; border-radius:999px; font-weight:500; font-size:14px; border:1px solid #e5e7eb; cursor:pointer; gap:6px; background:#ffffff; color:#4f46e5;">
                <i class="fa-regular fa-envelope" style="font-size:13px;"></i>
                Get in Touch
            </a>
        </div>
    </div>
</div>
@endsection
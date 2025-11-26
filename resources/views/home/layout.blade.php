<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog - Home</title>

    <link rel="stylesheet" href="{{ asset('homestyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <!-- Header -->
    <header class="site-header">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('home') }}" class="logo">My <span>Blogs</span></a>

                <!-- Mobile Toggle -->
                <input type="checkbox" id="nav-toggle" class="nav-toggle">
                <label for="nav-toggle" class="nav-toggle-label">
                    <span></span>
                </label>

                <div class="nav-links">
                    <a href="{{ route('home') }}" class="nav-link active">Home</a>
                    <a href="{{ route('home.blog') }}" class="nav-link">Blog</a>
                    <a href="{{route('home.about')}}" class="nav-link">About</a>
                    <a href="{{route('home.contact')}}" class="nav-link">Contact</a>

                    @if (Route::has('login'))
                    @auth
                    @if(Auth::user()->user_type == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-link nav-link-pill">
                        <i class="fa-solid fa-circle"></i> Admin Dashboard
                    </a>
                    <a href="{{ route('admin.addpost') }}" class="nav-link nav-link-pill">
                        <i class="fa-solid fa-circle-plus"></i> Add Post
                    </a>
                    <a href="{{ route('admin.allposts') }}" class="nav-link nav-link-pill">
                        <i class="fa-solid fa-list"></i> All Posts
                    </a>
                    @endif

                    <span class="user-pill">
                        <i class="fa-regular fa-user"></i>
                        {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="btn btn-outline-sm">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-sm">
                        <i class="fa-regular fa-circle-user"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary-sm">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                    {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary-sm">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                    @endif --}}
                    @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section (Home feel) -->
    <section class="hero">
        <div class="hero-bg-decor"></div>
        <div class="container hero-inner">
            <div class="hero-text">
                <span class="hero-pill">Laravel • PHP • Web Dev</span>
                <h1>Welcome to <span>LaraBlog</span></h1>
                <p>
                    Discover clean, practical tutorials, tips, and deep dives into Laravel, modern PHP,
                    and full-stack web development — written for real-world developers.
                </p>
                <div class="hero-actions">
                    <a href="/blog" class="btn btn-primary">
                        <i class="fa-solid fa-book-open"></i> Browse Articles
                    </a>
                    <a href="#newsletter" class="btn btn-ghost">
                        <i class="fa-regular fa-envelope"></i> Join Newsletter
                    </a>
                </div>
                <p class="hero-meta-text">
                    New posts every week. No spam, just code ✨
                </p>
            </div>

            <div class="hero-card">
                <div class="hero-card-badge">
                    <i class="fa-solid fa-bolt"></i> Latest Insights
                </div>
                <h3>Level up your Laravel skills</h3>
                <p>
                    Learn Eloquent tricks, authentication patterns, testing workflows, and deployment tips
                    you can apply directly in your projects.
                </p>
                <ul class="hero-card-list">
                    <li><i class="fa-solid fa-check"></i> Hands-on code examples</li>
                    <li><i class="fa-solid fa-check"></i> Beginner to advanced topics</li>
                    <li><i class="fa-solid fa-check"></i> Developer-friendly explanations</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Page Content (child views) -->
    <main class="page-main">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Categories -->
    <section class="section">
        <h2 class="section-title">Browse Categories</h2>
        <div class="categories">
            <a href="/category/laravel" class="category-tag">Laravel</a>
            <a href="/category/php" class="category-tag">PHP</a>
            <a href="/category/javascript" class="category-tag">JavaScript</a>
            <a href="/category/vue" class="category-tag">Vue.js</a>
            <a href="/category/tailwind" class="category-tag">Tailwind CSS</a>
            <a href="/category/testing" class="category-tag">Testing</a>
            <a href="/category/deployment" class="category-tag">Deployment</a>
            <a href="/category/performance" class="category-tag">Performance</a>
        </div>
    </section>

    <!-- Newsletter -->
    <section id="newsletter" class="section">
        <div class="container">
            <div class="newsletter">
                <h3>Subscribe to our Newsletter</h3>
                <p>Get the latest Laravel and PHP articles delivered straight to your inbox. No spam, unsubscribe
                    anytime.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit">
                        <i class="fa-regular fa-paper-plane"></i> Subscribe
                    </button>
                </form>
                <p class="newsletter-note">By subscribing, you agree to receive occasional updates from LaraBlog.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About LaraBlog</h3>
                    <p>
                        LaraBlog is a developer-focused blog dedicated to Laravel, PHP,
                        and modern web development practices — with real-world, copy-paste-ready examples.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('home.blog')}}">Blog</a></li>
                        <li><a href="{{route('home.about')}}">About Us</a></li>
                        <li><a href="{{route('home.contact')}}">Contact</a></li>
                        <li><a href="{{route('home.privacy')}}">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul class="footer-links">
                        <li><a href="/category/laravel">Laravel</a></li>
                        <li><a href="/category/php">PHP</a></li>
                        <li><a href="/category/javascript">JavaScript</a></li>
                        <li><a href="/category/vue">Vue.js</a></li>
                        <li><a href="/category/testing">Testing</a></li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; {{ now()->year }} LaraBlog. All rights reserved. Built with ❤️ using Laravel.</p>
            </div>
        </div>
    </footer>
</body>

</html>
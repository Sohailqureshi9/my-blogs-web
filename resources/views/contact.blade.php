@extends('home.layout')

@section('content')

<div style="padding:40px 0;">

    <!-- Header -->
    <div style="max-width:720px; margin:0 auto 35px; text-align:center;">
        <span style="
            display:inline-block;
            padding:5px 15px;
            font-size:12px;
            font-weight:600;
            background:#eef2ff;
            border:1px solid #c7d2fe;
            color:#4f46e5;
            border-radius:999px;
            margin-bottom:10px;">
            Contact
        </span>

        <h1 style="font-size:32px; color:#0f172a; margin-bottom:10px;">
            Get in <span style="color:#4f46e5;">Touch</span>
        </h1>

        <p style="font-size:15px; color:#64748b;">
            Have a question or want to collaborate? Send us a message and we’ll respond as soon as possible.
        </p>
    </div>

    <div style="
        max-width:1150px;
        margin:0 auto;
        display:grid;
        grid-template-columns:1fr 1.4fr;
        gap:25px;
    ">

        <!-- LEFT INFORMATION CARD -->
        <div style="display:flex; flex-direction:column; gap:20px;">

            <!-- Card -->
            <div style="
                background:white;
                padding:22px;
                border-radius:18px;
                border:1px solid #e2e8f0;
                box-shadow:0 15px 40px rgba(15,23,42,0.08);
            ">
                <h2 style="font-size:20px; margin-bottom:10px; color:#0f172a;">Let’s Talk</h2>
                <p style="font-size:14px; color:#475569; margin-bottom:20px;">
                    Whether you have feedback, questions, or ideas — we're happy to hear from you.
                </p>

                <ul style="list-style:none; padding:0; margin:0; display:grid; gap:15px;">

                    <li style="display:flex; gap:12px; align-items:flex-start;">
                        <span style="
                            width:36px; height:36px; border-radius:50%;
                            background:#eef2ff; color:#4f46e5;
                            display:flex; align-items:center; justify-content:center;
                            font-size:14px;">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <div>
                            <span style="font-size:12px; color:#94a3b8; text-transform:uppercase;">Email</span>
                            <p style="margin:0; font-size:14px; color:#1e293b;">support@larablog.com</p>
                        </div>
                    </li>

                    <li style="display:flex; gap:12px; align-items:flex-start;">
                        <span style="
                            width:36px; height:36px; border-radius:50%;
                            background:#eef2ff; color:#4f46e5;
                            display:flex; align-items:center; justify-content:center;
                            font-size:14px;">
                            <i class="fa-solid fa-globe"></i>
                        </span>
                        <div>
                            <span style="font-size:12px; color:#94a3b8; text-transform:uppercase;">Website</span>
                            <p style="margin:0; font-size:14px; color:#1e293b;">www.larablog.com</p>
                        </div>
                    </li>

                    <li style="display:flex; gap:12px; align-items:flex-start;">
                        <span style="
                            width:36px; height:36px; border-radius:50%;
                            background:#eef2ff; color:#4f46e5;
                            display:flex; align-items:center; justify-content:center;
                            font-size:14px;">
                            <i class="fa-regular fa-clock"></i>
                        </span>
                        <div>
                            <span style="font-size:12px; color:#94a3b8; text-transform:uppercase;">Response</span>
                            <p style="margin:0; font-size:14px; color:#1e293b;">Within 24–48 Hours</p>
                        </div>
                    </li>

                </ul>
            </div>

            <!-- Social Card -->
            <div style="
                background:white;
                padding:18px;
                border-radius:18px;
                border:1px solid #e2e8f0;
                box-shadow:0 15px 40px rgba(15,23,42,0.08);
            ">
                <h3 style="font-size:18px; margin-bottom:10px; color:#0f172a;">Follow Us</h3>
                <p style="font-size:14px; color:#475569;">Stay updated with new posts and tutorials.</p>

                <div style="display:flex; gap:12px; margin-top:12px;">

                    <a href="#" style="
                        width:36px; height:36px; border-radius:50%;
                        background:#0f172a; color:white;
                        display:flex; align-items:center; justify-content:center;
                        transition:0.2s;">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="#" style="
                        width:36px; height:36px; border-radius:50%;
                        background:#0f172a; color:white;
                        display:flex; align-items:center; justify-content:center;
                        transition:0.2s;">
                        <i class="fab fa-github"></i>
                    </a>

                    <a href="#" style="
                        width:36px; height:36px; border-radius:50%;
                        background:#0f172a; color:white;
                        display:flex; align-items:center; justify-content:center;
                        transition:0.2s;">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- CONTACT FORM -->
        <div style="
            background:white;
            padding:28px;
            border-radius:20px;
            border:1px solid #e2e8f0;
            box-shadow:0 20px 50px rgba(15,23,42,0.08);
        ">

            <h2 style="font-size:20px; margin-bottom:6px; color:#0f172a;">Send a Message</h2>
            <p style="font-size:14px; color:#64748b; margin-bottom:18px;">
                Fill the form and we’ll get back to you shortly.
            </p>

            <form action="{{ route('contact.send') }}" method="POST" style="display:grid; gap:15px;">
                @csrf

                <div>
                    <label style="font-size:13px; color:#0f172a;">Full Name</label>
                    <input type="text" name="name" placeholder="Your full name" required
                        style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db; background:#f8fafc;">
                </div>

                <div>
                    <label style="font-size:13px; color:#0f172a;">Email Address</label>
                    <input type="email" name="email" placeholder="you@example.com" required
                        style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db; background:#f8fafc;">
                </div>

                <div>
                    <label style="font-size:13px; color:#0f172a;">Subject</label>
                    <input type="text" name="subject" placeholder="How can we help?" required
                        style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db; background:#f8fafc;">
                </div>

                <div>
                    <label style="font-size:13px; color:#0f172a;">Message</label>
                    <textarea name="message" rows="5" placeholder="Write your message..." required
                        style="width:100%; padding:12px; border-radius:10px; border:1px solid #d1d5db; background:#f8fafc;"></textarea>
                </div>

                <button type="submit" style="
                    padding:12px 20px;
                    border:none;
                    border-radius:999px;
                    font-size:14px;
                    font-weight:600;
                    background:linear-gradient(135deg,#6366f1,#4f46e5);
                    color:white;
                    cursor:pointer;
                    display:inline-flex;
                    align-items:center;
                    gap:8px;">
                    <i class="fa-regular fa-paper-plane"></i>
                    Send Message
                </button>

                <p style="font-size:12px; color:#94a3b8;">Your information is safe with us.</p>
            </form>

        </div>

    </div>
</div>

@endsection
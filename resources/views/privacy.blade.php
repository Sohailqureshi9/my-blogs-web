@extends('home.layout')
@section('title')
Privacy Policy
@endsection
@section('content')
<div
    style="max-width: 900px; margin: 40px auto 60px; padding: 0 20px; font-family:'Roboto', sans-serif; color:#0f172a;">
    <!-- Header -->
    <div style="text-align:center; margin-bottom:32px;">
        <span
            style="display:inline-flex; align-items:center; padding:4px 12px; border-radius:999px; background:#eef2ff; border:1px solid rgba(129,140,248,0.5); color:#4f46e5; font-size:12px; font-weight:600; margin-bottom:10px;">
            Policy
        </span>

        <h1 style="font-size:32px; letter-spacing:-0.03em; margin-bottom:10px;">
            Privacy <span style="color:#4f46e5;">Policy</span>
        </h1>

        <p style="max-width:650px; margin:0 auto; color:#64748b; font-size:15px; line-height:1.7;">
            Your privacy is important to us. This Privacy Policy explains how LaraBlog collects, uses, and protects your
            data when you visit our website.
        </p>
    </div>

    <!-- Policy Container -->
    <div
        style="background:#ffffff; border-radius:18px; padding:26px 26px 30px; box-shadow:0 18px 45px rgba(15,23,42,0.08); border:1px solid rgba(148,163,184,0.20);">
        <!-- Section -->
        <h2 style="font-size:22px; margin-bottom:12px; color:#020617;">1. Information We Collect</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            We collect information that you voluntarily provide when posting comments, creating an account, or
            subscribing to our newsletter. This may include your name, email address, and any content you submit.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">2. How We Use Your Information</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            Your information helps us improve our blog, personalize user experience, send newsletters, and respond to
            queries. We do not sell, trade, or share your information with third parties for marketing purposes.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">3. Cookies & Usage Tracking</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            MyBlogs uses cookies to improve website performance, remember your preferences, and analyze site traffic.
            You may disable cookies in your browser settings, but some features may not work properly.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">4. Data Protection</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            We use modern security practices to protect your data. However, no method of online transmission is 100%
            secure. While we do our best, we cannot guarantee complete protection.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">5. Third-Party Links</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            Our blog may contain links to external websites. We are not responsible for the privacy practices or content
            of third-party sites. We encourage you to read their privacy policies separately.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">6. Newsletter & Email Communication</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            If you subscribe to our newsletter, we will send periodic updates related to new posts and content. You may
            unsubscribe at any time by clicking the “unsubscribe” link at the bottom of the email.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">7. Children's Privacy</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            MyBlogs does not knowingly collect personal information from children under the age of 13. If you believe a
            child has provided us with personal data, please contact us so we can remove it.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">8. Changes to This Policy</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            We may update our Privacy Policy occasionally. Any changes will be posted on this page with an updated “Last
            Updated” date.
        </p>

        <h2 style="font-size:22px; margin:22px 0 12px; color:#020617;">9. Contact Us</h2>
        <p style="font-size:15px; color:#475569; line-height:1.7;">
            If you have questions regarding this Privacy Policy, feel free to reach out through our contact page.
        </p>
    </div>

    <!-- Footer note -->
    <p style="text-align:center; font-size:13px; color:#94a3b8; margin-top:16px;">
        Last Updated: {{ date('F d, Y') }}
    </p>
</div>
@endsection
📚 My Blogs – Laravel 12 Blog Application

My Blogs is a fully functional Blog Web Application built using Laravel 12, featuring a dedicated Admin Panel, secure authentication system, email notifications (via Mailtrap), image upload/update/delete, and user interaction through comments and likes.
This project was developed in just two days, focusing on clean structure, learning, and practical implementation.

🚀 Features
🔐 Authentication (Laravel Breeze + Email Support)

A complete authentication system powered by Laravel Breeze, including:

✔️ Registration Email

A welcome/verification email is automatically sent to Mailtrap when a new user registers.

✔️ Login Notification Email

A login alert email is sent to Mailtrap whenever a user logs in (enabled through your custom logic).

✔️ Password Reset Email

When a user requests a password reset, Mailtrap receives a secure password reset link.

These features ensure a professional, production-ready auth flow during development without sending real emails.

📨 Mailtrap Email Integration

Mailtrap is integrated to safely test all outgoing emails.
Your application sends emails for:

Event	Email Sent to Mailtrap
New User Registration	✅ Yes
User Login	✅ Yes
Password Reset Request	✔️ Yes
Blog Post Created	✔️ Yes
Blog Post Updated	✔️ Yes
Blog Post Deleted	✔️ Yes

This allows full testing of email functionality without affecting real users.

🛡️ Admin Panel

Only Admin users can:

Add new blog posts



Edit existing posts

Delete posts

Manage all posts through a separate Admin Dashboard

Admin routes are protected using a custom admin middleware.

👥 User Features

Regular users can:

View all blog posts

Comment on posts

Like comments

View their own dashboard

Receive email notifications for authentication activities

🖼️ Image Handling

The application supports:

Uploading post images

Updating existing images

Deleting images

Storing images in /public/postsimage/

This helps maintain a clean and dynamic blog post interface.

🗄️ Database Relations

Implemented using Laravel Eloquent ORM:

User → Posts

Post → Comments (One-to-Many)

User → Comments

These relationships ensure structured and scalable data management.

📁 Project Structure
my-blogs-web/
│
├── app/
│   ├── Http/Controllers
│   ├── Models
│
├── public/
│   └── postsimage/
│
├── resources/
│   └── views/
│       ├── admin/
│       ├── home/
│       ├── auth/
│       └── layout files
│
├── routes/
│   └── web.php
│
└── database/
    └── migrations/

⚙️ Installation Guide
1️⃣ Clone the Repository
git clone https://github.com/Sohailqureshi9/my-blogs-web.git

2️⃣ Install Dependencies
composer install
npm install
npm run build

3️⃣ Set Up Environment
cp .env.example .env
php artisan key:generate

4️⃣ Configure Mailtrap

Update .env:

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=admin@example.com
MAIL_FROM_NAME="My Blogs"

5️⃣ Run Migrations
php artisan migrate

6️⃣ Start Development Server
php artisan serve

👑 Create an Admin User

Use Tinker:

php artisan tinker


Then run:

$user = \App\Models\User::first();
$user->user_type = 'admin';
$user->save();

🧪 Tech Stack

Laravel 12

PHP 8.2

Laravel Breeze (Authentication)

Mailtrap SMTP

MySQL

Blade Templates

Inline CSS (Custom UI)

📝 Conclusion

My Blogs is a complete Laravel blogging system with:

✔ Secure Authentication
✔ Email Notifications for Every Auth Event
✔ Admin Panel for Blog Management
✔ Image Upload/Update/Delete
✔ Comments and Likes System
✔ Middleware-Based Access Control
✔ Fully Working Laravel 12 Backend

This project is perfect for learning Laravel, showcasing practical development skills, or adding to your portfolio.

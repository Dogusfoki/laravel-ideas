# Ideas App

A full-stack note-taking application built with **Laravel 13**, where authenticated users can create, view, edit, and delete their own private ideas. Built as part of the [Laracasts Laravel 2026](https://laracasts.com) course to practice authentication, authorization, Eloquent relationships, and modern frontend tooling.

🔗 **Repository:** https://github.com/Dogusfoki/laravel-ideas

---

## ✨ Features

- 🔐 **Authentication** — custom registration, login, and logout flow (session-based, no third-party packages)
- 📝 **Idea Management (CRUD)** — create, view, edit, and delete personal ideas
- 🔒 **Authorization** — Laravel Policies ensure users can only view/edit/delete their own ideas (prevents unauthorized access via URL manipulation)
- 🔗 **Eloquent Relationships** — `User hasMany Idea` / `Idea belongsTo User`
- 📧 **Notifications** — users receive an email notification when a new idea is published
- 🎨 **Modern Frontend** — Tailwind CSS 4 + DaisyUI, bundled locally via Vite (no CDN dependency)
- 🗄️ **SQLite** — lightweight, zero-config local database

---

## 🛠️ Tech Stack

| Layer    | Technology                                        |
| -------- | ------------------------------------------------- |
| Backend  | Laravel 13 (PHP 8.4)                              |
| Database | SQLite                                            |
| Frontend | Blade, Tailwind CSS 4, DaisyUI 5                  |
| Bundler  | Vite                                              |
| Auth     | Custom (session-based)                            |
| Mail     | Laravel Notifications (Mailpit for local testing) |

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.4+
- Composer
- Node.js & npm

### Installation

```bash
# Clone the repository
git clone https://github.com/your-username/ideas-app.git
cd ideas-app

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy the environment file
cp .env.example .env

# Generate the application key
php artisan key:generate

# Create the SQLite database file
touch database/database.sqlite

# Run migrations
php artisan migrate
```

### Running the app

You'll need two terminals running at the same time:

```bash
# Terminal 1 — Laravel server
php artisan serve

# Terminal 2 — Vite (frontend asset bundler, with hot reload)
npm run dev
```

Visit **http://127.0.0.1:8000** in your browser.

---

## 📧 Testing Email Notifications Locally

By default, emails are logged to `storage/logs/laravel.log`. For a nicer visual experience, you can use [Mailpit](https://github.com/axllent/mailpit):

```bash
brew install mailpit
mailpit
```

Then set the following in your `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
```

Visit **http://localhost:8025** to view sent emails.

---

## 🗂️ Project Structure Highlights

```
app/
├── Http/Controllers/
│   ├── Auth/
│   │   ├── RegisteredUserController.php
│   │   └── SessionController.php
│   └── IdeaController.php
├── Models/
│   ├── User.php
│   └── Idea.php
├── Notifications/
│   └── IdeaPublished.php
└── Policies/
    └── IdeaPolicy.php
```

---

## 🔐 Authentication Flow

- `POST /register` → creates a user, hashes the password, logs the user in
- `POST /login` → authenticates via `Auth::attempt()`, regenerates the session
- `DELETE /logout` → logs the user out, invalidates the session

Routes are protected with `auth` and `guest` middleware groups to ensure only appropriate users can access registration, login, and idea management pages.

---

## 🔒 Authorization

Each idea belongs to exactly one user. The `IdeaPolicy` class ensures that:

- Only the idea's owner can **view**, **edit**, **update**, or **delete** it
- Any unauthorized attempt (e.g. manually changing the URL to `/ideas/{id}`) returns a `403 Forbidden` response

---

## 📚 Learning Context

This project was built while following the Laracasts **Laravel 2026 Edition** course, with a focus on:

- Manual authentication (without Breeze/Fortify/Jetstream)
- Middleware-based route protection
- Eloquent relationships (`belongsTo`, `hasMany`)
- Gates & Policies for authorization
- Notifications (mail channel)
- Frontend asset bundling with Vite

---

## 📄 License

This project is open-sourced for learning purposes.

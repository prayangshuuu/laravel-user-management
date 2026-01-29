<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.0-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP Version">
  <img src="https://img.shields.io/github/actions/workflow/status/prayangshu/laravel-user-management/ci.yml?branch=main&label=Laravel%20CI&style=flat-square&logo=github" alt="CI Status">
  <img src="https://img.shields.io/badge/License-MIT-blue?style=flat-square" alt="License">
</p>

# Laravel User Management System

A robust user management system built with Laravel 12, featuring authentication, role-based access control, and administrative management capabilities. This project utilizes Blade templates and Tailwind CSS for the user interface.

## Features

### User Registration
Allows new users to create an account within the system.
- **Functionality**: Validates user input (name, email, password), creates a new user record with the default 'user' role, hashes the password, and redirects to the login page upon success.
- **Routes**:
  - `GET /register`: Displays the registration form.
  - `POST /register`: Handles the form submission and user creation.

### User Authentication
Secure login and logout functionality for registered users.
- **Functionality**: Authenticates users using email and password. Protects routes using the `auth` middleware. Handles session regeneration to prevent session fixation attacks.
- **Routes**:
  - `GET /login`: Displays the login form.
  - `POST /login`: Authenticates the user.
  - `POST /logout`: Logs the user out and invalidates the session.

### Forgot Password
A mechanism for users to reset their password via email.
- **Functionality**: Accepts a user's email address, generates a random new password, updates the database, and sends the new password to the user via SMTP email.
- **Routes**:
  - `GET /forgot-password`: Displays the email input form.
  - `POST /forgot-password`: Processes the request and sends the email.

### Role-Based Access Control
Distinguishes between standard users and administrators.
- **Functionality**: Adds a `role` column to the users table. Implements an `AdminMiddleware` to restrict access to administrative routes.
- **Routes**:
  - Middleware `admin` applied to all `/admin/*` routes.

### Admin Dashboard
A centralized hub for administrators to manage the application.
- **Functionality**: Provides a protected view accessible only to users with the 'admin' role. Displays quick links to administrative tasks.
- **Routes**:
  - `GET /admin`: Displays the admin dashboard.

### Admin User Management
Full CRUD capabilities for administrators to manage registered users.
- **Functionality**: Allows admins to view a list of all users, edit user details (name, email, role), and delete users from the system. Includes confirmation dialogs for destructive actions.
- **Routes**:
  - `GET /admin/users`: Lists all users.
  - `GET /admin/users/{user}/edit`: Displays the user edit form.
  - `PUT /admin/users/{user}`: Updates the user record.
  - `DELETE /admin/users/{user}`: Removes the user from the database.

### Admin Password Change
Allows administrators to securely update their own password.
- **Functionality**: Validates the current password before allowing a change. Updates the password hash in the database upon successful validation.
- **Routes**:
  - `GET /admin/password/change`: Displays the password change form.
  - `PUT /admin/password/change`: Handles the password update logic.

## Installation

1. Clone the repository.
2. Run `composer install`.
3. Copy `.env.example` to `.env` and configure your database and mail settings.
4. Run `php artisan key:generate`.
5. Run `php artisan migrate`.
6. Serve the application using `php artisan serve`.

## UI Consistency Checklist

The following UI/UX elements have been audited and verified for consistency across the application:

- [x] **RetroUI Design System**: All pages utilize the Neo-Brutalism aesthetic with thick borders, hard shadows, and high contrast.
- [x] **Typography**: Consistent use of the 'Inter' font family with uppercase headers and bold weights.
- [x] **Component Library**: Reusable Blade components (`<x-ui.card>`, `<x-ui.button>`, `<x-ui.input>`, `<x-ui.icon>`) are used exclusively.
- [x] **Responsive Layouts**: Both the public/user layout and the admin sidebar layout are fully responsive on mobile and desktop.
- [x] **Flash Messages**: Success and error alerts share a unified RetroUI style with icons.
- [x] **Empty States**: A dedicated empty state component handles "no data" scenarios gracefully.
- [x] **Iconography**: A centralized SVG icon system ensures visual consistency without external dependencies.

## Final Code Sanity Checklist — Verified

- [x] **Code Quality**: Controllers are thin, readable, and follow MVC principles. No debug dumps found.
- [x] **Security**: Passwords are hashed, CSRF protection is enabled, and admin routes are middleware-protected.
- [x] **Database**: Eloquent ORM is used exclusively. Migrations and seeders are robust and reversible.
- [x] **Environment**: Configuration is secure and environment-agnostic.
- [x] **UI/UX**: RetroUI design system is applied consistently across all views.
- [x] **Performance**: Tailwind CSS is configured for production purging. Assets compile cleanly.
- [x] **Routing**: All routes are named, used, and correctly protected based on roles.
- [x] **Documentation**: README is accurate and reflects the current state of the application.

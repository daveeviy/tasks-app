# Tasks for Today Management System

A Laravel 12 task management web application with Breeze authentication, soft archiving (`is_archived`), and email notifications when a task is marked `done`.

## How to Run Locally
1. Install dependencies:
   composer install
   npm install && npm run build

2. Copy environment file and generate app key:
   cp .env.example .env
   php artisan key:generate

3. Make sure SQLite and log mailer are set in `.env`:
   DB_CONNECTION=sqlite
   MAIL_MAILER=log
   MAIL_FROM_ADDRESS="hello@example.com"

4. Run database migrations and seed data:
   php artisan migrate --seed

5. Start the server:
   php artisan serve

## Email Notification Testing
When a task is created as `done` or changed from `pending` to `done`, `TaskCompletedMail` is written to `storage/logs/laravel.log` without sending duplicate emails on later edits of an already-`done` task.

## Project Links
- GitHub Repo: https://github.com/daveeviy/tasks-app.git
- Live URL: (paste your live link here once hosted)
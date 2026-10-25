# Counterpoint POS

A four-page Laravel application for **IT0049 TFA5 — From Zero to Four Pages (Laravel POS Foundations)**. It includes a landing page, an about page, Customer Accounts, and User Accounts. Both directories render six fictional records from PHP arrays inside their respective controllers.

## Requirements

- PHP 8.3 or newer and Composer 2. Dependencies are locked for PHP 8.3 compatibility.
- Standard Laravel PHP extensions, including ctype, curl, DOM/XML, fileinfo, filter, hash, mbstring, OpenSSL, PCRE, PDO, session, and tokenizer. Enable ZIP for Composer archive extraction.
- SQLite extensions (`pdo_sqlite` and `sqlite3`) only if you run the optional database migrations.

The interface uses plain CSS in `public/css/app.css`. No Node installation, frontend build, database, or external font service is needed to display the four pages.

## Set up and run

Open a terminal in the project directory:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve
```

Copy `.env.example` only on a fresh setup; preserve an existing `.env`. Open **http://127.0.0.1:8000**. The supplied environment template uses file sessions, file cache, and synchronous queues so these pages work without a database.

For this prepared workspace, dependencies and a local `.env` are already installed. Right-click `Start-Local.ps1` and choose **Run with PowerShell**, or run:

```powershell
powershell -ExecutionPolicy Bypass -File .\Start-Local.ps1
```

The launcher uses the portable PHP copy in this workspace's `work/php` folder when available, otherwise PHP on your PATH. If you move this project elsewhere, install PHP and Composer first. Stop the server with Ctrl+C.

## Pages and MVC structure

| URL | Controller method | Blade view |
| --- | --- | --- |
| `/` | `PageController::home` | `resources/views/pages/home.blade.php` |
| `/about` | `PageController::about` | `resources/views/pages/about.blade.php` |
| `/customers` | `CustomerController::index` | `resources/views/customers/index.blade.php` |
| `/users` | `UserController::index` | `resources/views/users/index.blade.php` |

- `routes/web.php` defines the four named routes.
- `app/Http/Controllers/CustomerController.php` defines the customer array and passes it to the customer view.
- `app/Http/Controllers/UserController.php` defines the user array and passes it to the user view.
- Both account views use `@foreach` to generate their table rows. `{{ ... }}` escapes displayed values.
- `resources/views/layouts/app.blade.php` supplies the common navigation, page header, and footer. The active link uses `aria-current="page"`.
- The layout adapts to narrow screens. Directory tables scroll horizontally where necessary; keyboard users can focus the table region.

The records are intentionally static and fictional. Update the arrays to change the sample data. Status and role labels are display data; this activity does not implement authentication, permissions, account editing, transactions, inventory management, or checkout. The default `User` model is retained from Laravel's scaffold and is not used by the account directories.

## Database migration and seeder files

The assignment asks for database exports **or migration and seeder files**, while explicitly requiring arrays as the temporary data source. This project includes Laravel's scaffold migrations in `database/migrations` and an intentionally empty `database/seeders/DatabaseSeeder.php`. These are supplied for repository completeness; neither directory reads from a database. The seeder creates no accounts or passwords.

To inspect the optional scaffold database on a fresh local setup, enable SQLite extensions and run:

```powershell
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
```

These migrations create Laravel's default users, session, cache, and job tables. They do not contain the displayed customer/staff records. No database export is required for this implementation.

## Inspect and verify

```powershell
php artisan --version
php artisan route:list --except-vendor
php artisan test
php artisan view:cache
php artisan view:clear
```

`tests/Feature/PosPagesTest.php` checks the four responses, shared navigation and active state, every sample record, record counts, Blade escaping, and a missing-page response. To generate a controller in future exercises, use `php artisan make:controller ControllerName`.

## GitHub submission

Create a repository in your own GitHub account and push the raw project directory, including `composer.lock`, `.env.example`, `README.md`, controllers, routes, Blade views, CSS, tests, migrations, and seeders. The source ZIP is prepared with these files.

The supplied `.gitignore` excludes `.env`, dependencies, generated cache files, logs, and local SQLite databases. Keep those exclusions. `composer install` restores the locked dependencies on another computer. Replace or add student/group/section/professor details as your submission requires; no identity details have been invented.

The GitHub URL and hosted URL must be supplied after you publish them. They have not been created by this local build.

## Hosting

Use a host that supports PHP 8.3+, Composer dependencies, Laravel rewrites, and a configurable document root. Follow the [official deployment guide](https://laravel.com/docs/13.x/deployment).

1. Upload or clone the source outside the public document root. Run `composer install --no-dev --optimize-autoloader`.
2. Create the host's `.env` from `.env.example`, set `APP_ENV=production`, `APP_DEBUG=false`, and `APP_URL` to the real HTTPS URL. Generate a unique key with `php artisan key:generate` on first deployment.
3. Set the web document root to the project's **`public`** directory. Never expose the whole project directory.
4. Allow the web process to write to `storage` and `bootstrap/cache`.
5. Run `php artisan config:cache` and `php artisan view:cache`. No database migration or frontend build is needed for these pages.
6. Visit `/`, `/about`, `/customers`, and `/users`; confirm navigation, styles, and all six rows on both directory pages. Confirm that `/.env` is inaccessible.

The local Artisan server is a development preview, not the hosted submission link.

## Reference

- Supplied TFA5 assignment document, Laboratory Activity and Submission Requirements.
- [Laravel 13 installation](https://laravel.com/docs/13.x/installation)
- [Laravel routing](https://laravel.com/docs/13.x/routing)
- [Blade templates](https://laravel.com/docs/13.x/blade)


Laurin Madelau

Backend: Laravel 11 
Database: PostgreSQL
Frontend: Blade (Bootstrap)
Authentication: Laravel Breeze with email verification
Unit: PHP Unit

installer
composer create-project laravel/laravel:^11.0 LaurinMadelau_fdtest

Untuk menghubungkan ke database
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=LaurinMadelau_fdtest
DB_USERNAME=postgres
DB_PASSWORD=P@ssw0rd!1
 

Authentication
composer require laravel/breeze --dev
php artisan breeze:install

Run App
php artisan serve

Test
php artisan make:test UserTest --unit 
php artisan test --filter UserTest

php artisan make:test BookTest --unit 
php artisan test --filter BookTest




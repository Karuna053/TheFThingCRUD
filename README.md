# System Requirements
- PHP 7.2+
- MySQL 5.6

# Setup Instructions
1. Copy .env.example and save as .env
2. Create new database and update DB_DATABASE in .env
3. Update DB_USERNAME and DB_PASSWORD in .env
4. Open command prompt in the repo folder, and run "composer update" (if you do not have Composer installed, install it first)
5. Run "php artisan key:generate" in command prompt
6. Run "php artisan migrate --seed" in command prompt
7. Run "php artisan serve" to run a local Laravel development server

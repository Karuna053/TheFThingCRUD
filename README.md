# System Requirements
- PHP 7.2+
- MySQL 5.6

# Setup Instructions
1. Copy .env.example and save as .env
2. Create new database and update DB_DATABASE in .env
3. Update DB_USERNAME and DB_PASSWORD in .env
4. Run "composer update" in command prompt
5. Run "php artisan key:generate" in command prompt
6. Run "php artisan migrate --seed" in command prompt

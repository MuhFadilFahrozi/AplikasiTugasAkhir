set -o errexit
composer install --no-dev --optimize-autoloader
php artisan view:cache
php artisan config:cache
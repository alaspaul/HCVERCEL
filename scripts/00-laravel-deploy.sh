#!/usr/bin/env bash

# echo "Running composer"
# composer install --no-dev --optimize-autoloader --working-dir=/var/www/html
# composer require barryvdh/laravel-cors
# php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"


# echo "Updating composer"
# composer update --no-scripts --working-dir=/var/www/html

# echo "Running composer dump-autoload"
# composer dump-autoload --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

# echo "Running migrations..."
# php artisan migrate --force --seed




#!/bin/bash

cd /var/www/laravel-app || exit 1

echo "[after_install] running composer install..."
composer install --no-dev --optimize-autoloader

echo "[after_install] setting permissions..."
sudo chown -R nginx:nginx storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo "[after_install] running artisan commands..."
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache


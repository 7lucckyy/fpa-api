#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
sail artisan config:cache

echo "Caching routes..."
sail artisan route:cache

echo "Running migrations..."
sail artisan migrate --force
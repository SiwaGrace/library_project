#!/usr/bin/env bash

# Exit on error
set -e

echo "Starting deployment script..."

# Clear caches to ensure fresh config
php artisan config:clear
php artisan route:clear

# Run migrations (auto-confirm)
echo "Running migrations..."
php artisan migrate --force

# Start the PHP server
# Note: Railway expects the app to bind to the PORT variable
echo "Starting web server..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
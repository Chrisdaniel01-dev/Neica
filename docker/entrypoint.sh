#!/bin/bash
set -e

# Generate app key if not set (Render env vars persist, so this only runs once effectively)
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Cache config, routes, views for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations (safe to run every deploy, only applies new ones)
php artisan migrate --force

# Start supervisor (which runs nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

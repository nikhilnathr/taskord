#!/bin/bash

set -e

env

if [[ -n "$1" ]]; then
    exec "$@"
else
    wait-for-it db:3306 -t 45
    composer install
    curl -o .env https://gitlab.com/snippets/1905681/raw
    php artisan key:generate
    php artisan migrate:fresh --seed --force --database=mysql
    php artisan telescope:publish
    chown -R www-data:www-data storage
    exec apache2-foreground
fi
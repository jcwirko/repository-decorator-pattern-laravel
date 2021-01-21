#!/bin/bash

docker stop $(docker ps -qa)

echo ''
echo '----- Setup Laravel'
echo ''

docker-compose build

echo ''
echo '----- copy .env '
echo ''

cp .env.local .env

docker-compose up -d

echo ''
echo '----- composer install | permissions'
echo ''

docker exec decorator composer install
docker exec decorator chmod -R 775 storage
docker exec decorator chown -R 1000:www-data storage bootstrap/cache

echo ''
echo '----- Run Migrations'
echo ''

docker exec decorator php artisan migrate:fresh

echo ''
echo '----- Generate Key'
echo ''

docker exec decorator php artisan key:generate

echo ''
echo '----- Starting Application'
echo ''

docker-compose down
docker-compose up

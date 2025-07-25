#!/bin/bash

APP_DIR=/var/www/laravel-app
SOURCE_DIR=/tmp/deploy-source

# 1. 덮어쓰기
sudo cp -rf $SOURCE_DIR/* $APP_DIR/
sudo chown -R ec2-user:ec2-user $APP_DIR

# 2. Laravel 설정
cd $APP_DIR
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. 퍼미션
sudo chown -R apache:apache $APP_DIR/storage $APP_DIR/bootstrap/cache
sudo chmod -R 775 $APP_DIR/storage $APP_DIR/bootstrap/cache

# ✅ 4. 임시 배포 소스 삭제
sudo rm -rf $SOURCE_DIR

echo "[Deploy] 배포 완료 및 /tmp/deploy-source 정리 완료"


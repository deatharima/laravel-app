FROM php:8.4-fpm-alpine

WORKDIR /var/www/laravel

RUN apk add --no-cache \
    shadow \
    libzip-dev \
    postgresql-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_pgsql opcache
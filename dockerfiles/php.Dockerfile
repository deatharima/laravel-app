FROM php:8.4-fpm-alpine

WORKDIR /var/www/laravel

RUN apk add --no-cache \
    shadow \
    libzip-dev \
    postgresql-dev \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install zip pdo pdo_pgsql opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
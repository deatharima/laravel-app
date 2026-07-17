FROM php:8.4-fpm-alpine

WORKDIR /var/www/laravel

RUN apk add --no-cache \
    shadow \
    libzip-dev \
    icu-dev \
    postgresql-dev \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-configure intl \
    && docker-php-ext-install zip pdo pdo_pgsql opcache intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
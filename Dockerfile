FROM php:8.2-cli-alpine

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

WORKDIR /usr/src/app

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader --prefer-dist

COPY . .

RUN composer install --prefer-dist
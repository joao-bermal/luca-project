FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libmariadb-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql
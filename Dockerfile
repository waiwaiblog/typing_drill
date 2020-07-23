FROM php:7.2-fpm

RUN apt-get update \
    && apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN composer global require "laravel/installer"


RUN curl -sL https://deb.nodesource.com/setup_11.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && npm install npm@latest -g
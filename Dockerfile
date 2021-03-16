FROM php:7.2-apache-stretch

ENV COMPOSER_ALLOW_SUPERUSER 1

# Ativa o ModRewrite do apache, que permite urls amigáveis
RUN a2enmod rewrite

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Install laravel and composer dependencies
RUN apt-get update && \
    apt-get install -y \
    git zip unzip zlib1g-dev libicu-dev g++ libzip-dev  \
    && apt-get autoclean -y

RUN docker-php-ext-install -j$(nproc) zip mysqli pdo_mysql opcache intl

COPY --from=composer:2  /usr/bin/composer /usr/bin/composer
COPY . /var/app/

WORKDIR /var/app

RUN composer install

RUN chmod 775 /var/app/storage -R
RUN chown www-data:www-data /var/app -R








# FROM php:8-fpm
FROM php:8.0.1-apache

#system dependencies
RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip vim \
    #php extensions
    && docker-php-ext-install intl opcache pdo pdo_mysql mysqli \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /var/www/html

#get composer n put it in specific path 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN curl -sS https://get.symfony.com/cli/installer | bash
# RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
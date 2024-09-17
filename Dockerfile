FROM php:5.6-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY configs/apache2-ssl.conf /etc/apache2/sites-available/default-ssl.conf

WORKDIR /www

RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN composer self-update --1


RUN a2enmod rewrite


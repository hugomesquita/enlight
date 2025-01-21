FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo_mysql zip


COPY . /var/www/html/

RUN mkdir -p /var/www/html/uploads \
    && chmod 777 /var/www/html/uploads

RUN chown -R www-data:www-data /var/www/html/ \
    && a2enmod rewrite

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf


EXPOSE 80

WORKDIR /var/www/html/

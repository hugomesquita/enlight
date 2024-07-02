# Use a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Atualize o sistema e instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo_mysql zip


# Copie os arquivos do projeto para o diretório do servidor web
COPY . /var/www/html/

# Altere as permissões dos arquivos
RUN chown -R www-data:www-data /var/www/html/ \
    && a2enmod rewrite

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf

# Exponha a porta 80
EXPOSE 80

# Defina o diretório de trabalho
WORKDIR /var/www/html/

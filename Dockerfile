# Use a imagem PHP-FPM 7.4 como base
FROM php:7.4-fpm

# Instale as dependências do sistema e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql zip

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho
WORKDIR /www

# Copie o código-fonte da aplicação para o contêiner
COPY . /www

# Instale as dependências do Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Exponha a porta padrão
EXPOSE 9000

# Comando padrão
CMD ["php-fpm"]

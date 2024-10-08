# Laravel application uchun ishlatilayotgan Dockerfile
FROM php:8.2-fpm

# Laravel uchun kerakli bog'lamalarni o'rnatish
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Ishlash katalogini o'rnatish
WORKDIR /var/www

# Laravel fayllarini konteynerga nusxalash
COPY . /var/www

# Composerni o'rnatish
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel kutubxonalarini o'rnatish
RUN composer install --no-dev --optimize-autoloader

# Ruxsatlarni sozlash
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

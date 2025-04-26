# Gunakan image PHP resmi dengan versi yang sesuai (Laravel Anda menggunakan PHP 8.1 atau lebih tinggi)
FROM php:8.1-fpm

# Install dependensi sistem, termasuk git
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer (untuk keperluan di masa depan, meskipun kita tidak menjalankan composer install di sini)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Salin semua file proyek ke container (termasuk /vendor yang sudah diinstal di lokal)
COPY . .

# Berikan izin ke folder storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 untuk PHP-FPM
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]
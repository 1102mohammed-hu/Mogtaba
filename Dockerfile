# =========================================================
# Laravel + PHP 8.2 + Apache
# =========================================================

FROM php:8.2-apache

# =========================================================
# System Dependencies
# =========================================================

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# =========================================================
# PHP Extensions
# =========================================================

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd

# =========================================================
# Apache Configuration
# =========================================================

# Disable mpm_event to avoid Apache MPM conflicts
RUN a2dismod mpm_event || true

# Enable prefork MPM
RUN a2enmod mpm_prefork

# Enable Laravel URL rewriting
RUN a2enmod rewrite

# =========================================================
# Laravel Document Root
# =========================================================

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf

# =========================================================
# Application Directory
# =========================================================

WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# =========================================================
# Composer
# =========================================================

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-dev

# =========================================================
# Laravel Permissions
# =========================================================

RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# =========================================================
# Start Script
# =========================================================

COPY start.sh /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh

# =========================================================
# Port
# =========================================================

EXPOSE 80

# =========================================================
# Start Application
# =========================================================

CMD ["/usr/local/bin/start.sh"]
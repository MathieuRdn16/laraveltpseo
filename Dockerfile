# Utiliser l'image officielle de PHP pour Apache
FROM php:7.4-apache

# Installation des dépendances nécessaires pour l'application Laravel
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        git \
        curl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo_mysql

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuration de l'application Laravel
WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html \
    && cp .env.example .env \
    && composer install --no-interaction --optimize-autoloader --no-dev \
    && php artisan key:generate \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Exposition du port 80
EXPOSE 80

# Commande pour lancer l'application
CMD ["apache2-foreground"]

FROM php:7.4-apache
WORKDIR /app
COPY . /app
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
RUN npm install && npm run prod
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache
EXPOSE 8080
CMD php artisan serve 

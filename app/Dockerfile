# Use the official PHP image with Apache
FROM php:8.2-apache-bullseye

# Enable required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set up permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

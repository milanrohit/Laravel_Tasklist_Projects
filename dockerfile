FROM php:8.2-apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable pdo_mysql

# Enable Apache rewrite module (optional, for cleaner URLs)
RUN a2enmod rewrite

# Copy your PHP files and images
COPY index.php /var/www/html/
COPY images/ /var/www/html/images/

EXPOSE 80
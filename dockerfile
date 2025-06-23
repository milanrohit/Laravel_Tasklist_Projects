FROM php:8.2-apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable pdo_mysql

# Enable Apache rewrite module (optional, for cleaner URLs)
RUN a2enmod rewrite

# Copy the application files to the Apache document root
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Set permissions for the Apache user
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

EXPOSE 80
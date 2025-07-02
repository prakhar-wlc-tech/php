# Use official PHP 8.2 Apache base image
FROM php:8.2-apache

# Update packages and clean cache
RUN apt-get update && apt-get upgrade -y && apt-get clean

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Allow .htaccess overrides
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Install PDO MySQL driver
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN apt-get install -y unzip curl && \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Use official PHP Apache image
FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy your PHP files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Expose port 80 (important for Render to detect)
EXPOSE 80

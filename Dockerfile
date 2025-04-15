# Use the official PHP image with Apache
FROM php:8.2-apache

# Copy your PHP file into the Apache web root
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

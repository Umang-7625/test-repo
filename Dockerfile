# Use the official PHP Apache image
FROM php:8.2-apache

# Install mysqli extension and other necessary packages
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite (optional but useful)
RUN a2enmod rewrite

# Copy your PHP files into the Apache server directory
COPY . /var/www/html/

# Expose port 80 (Render expects the service to bind to this port)
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]

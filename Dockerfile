FROM php:8.2-cli

WORKDIR /app

COPY . .

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000"]

# Use official PHP image
FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy all app files to Apache server root
COPY . /var/www/html/

# Expose the default Apache port
EXPOSE 80
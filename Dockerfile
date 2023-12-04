
# Use the official PHP 8.1 image as the base image
FROM php:8.1

# Set the working directory inside the container
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip gd

# Copy the application files to the container
COPY . .

# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --no-scripts --no-progress

# Expose the port for Laravel's development server
EXPOSE 8000

# Run the application with php artisan serve
CMD php artisan serve --host=0.0.0.0 --port=8000

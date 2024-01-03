FROM richarvey/nginx-php-fpm:1.7.2

# Set working directory
WORKDIR /var/www/html

# Copy the application files
COPY . .

# Install dependencies using composer
RUN composer install --no-dev --optimize-autoloader

# Run additional commands
RUN echo "Running composer dump-autoload" && \
    composer dump-autoload --working-dir=/var/www/html && \
    echo "Caching config..." && \
    php artisan config:cache && \
    echo "Caching routes..." && \
    php artisan route:cache && \
    echo "Running migrations..." && \
    php artisan migrate --force

# Set Laravel environment variables
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Start script
CMD ["/start.sh"]
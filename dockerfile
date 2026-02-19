FROM registry.access.redhat.com/ubi9/php-83

USER 0

WORKDIR /var/www/html

COPY . .

# Install composer jika belum ada
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Install dependency
RUN composer install --no-dev --optimize-autoloader

# Permission untuk OpenShift (random UID)
RUN chown -R 1001:0 /var/www/html \
    && chmod -R g+rwX storage bootstrap/cache

EXPOSE 8080

USER 1001

CMD php artisan serve --host=0.0.0.0 --port=8080

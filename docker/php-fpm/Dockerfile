FROM smskin/laravel-php7.2-fpm:latest

COPY ./docker/php-fpm/conf/php/php.ini /usr/local/etc/php/php.ini

COPY --chown=www-data ./ /var/www

WORKDIR /var/www
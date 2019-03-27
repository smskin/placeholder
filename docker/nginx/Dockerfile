FROM nginx:latest

COPY ./conf/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/nginx/default.conf /etc/nginx/conf.d/default.conf

COPY --from=placeholder_php-fpm /var/www /var/www

WORKDIR /var/www
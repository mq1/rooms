FROM php:apache

ENV MYSQL_DATABASE=rooms \
    MYSQL_USER=rooms_user

EXPOSE 80

RUN docker-php-ext-install mysqli

RUN chmod -R 777 /tmp

COPY src /var/www/html

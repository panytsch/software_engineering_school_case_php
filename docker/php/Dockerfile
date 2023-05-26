FROM php:8.2-fpm

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#
#RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
#    install-php-extensions http

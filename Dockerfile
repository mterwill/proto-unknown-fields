FROM php:7.4

RUN pecl install protobuf-3.15.8 \
    && docker-php-ext-enable protobuf

FROM php:7.2-fpm-alpine

ARG UID=991
ARG UNAME=www
ARG GID=991
ARG GNAME=www

ENV WORKDIR=/var/www/html
WORKDIR $WORKDIR

COPY ./docker/php/php.ini /usr/local/etc/php
COPY . .

RUN set -x \
  && apk add --no-cache php7-zlib zlib-dev ${PHPIZE_DEPS} \
  && pecl install xdebug \
  && docker-php-ext-install pdo_mysql zip \
  && docker-php-ext-enable xdebug \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install \
  && addgroup ${GNAME} -g ${GID} \
  && adduser -D -G ${GNAME} -u ${UID} ${UNAME} \
  && chown -R ${UNAME}:${GNAME} $WORKDIR \
  && apk del --purge autoconf g++ make

USER ${UNAME}

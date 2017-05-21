FROM php:fpm-alpine

ARG USER_NAME

RUN apk upgrade --update \
    && adduser -D -u 1000 ${USER_NAME} \
    && apk add --update alpine-sdk \
    && apk add --no-cache --virtual .build-deps \
    && apk add autoconf gcc pkgconf openssl-dev libsasl openssl libmcrypt-dev icu icu-libs icu-dev imap-dev libxml2-dev libxslt-dev curl-dev .build-deps coreutils freetype-dev libjpeg-turbo-dev libltdl libpng-dev \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/bin/composer \
    && pecl install apcu-4.0.11 \
    && docker-php-ext-enable --ini-name apcu.so opcache.so \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install mcrypt intl pdo pdo_mysql imap soap xml xsl zip bcmath curl json mbstring exif gd \
    && docker-php-ext-install opcache \
    && pecl install redis \
    && docker-php-ext-enable redis.so

COPY ./xdebug.ini /usr/local/etc/php/conf.d/

WORKDIR "/var/www/cm-demo"

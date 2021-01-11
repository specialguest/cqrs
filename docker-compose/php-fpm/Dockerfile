FROM php:8.0-fpm-buster

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
        git \
        curl \
        zip \
        unzip \
        libfreetype6-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \
        supervisor \
    && docker-php-ext-configure gd \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        gd \
        intl \
        pdo_mysql \
        mysqli \
        zip \
        opcache \
    && docker-php-ext-enable mysqli\
    && docker-php-source delete \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    # SUPERVISOR
    && touch /var/run/supervisor.sock \
    && mkdir -p /var/log/supervisor && touch /var/log/supervisor/supervisord.log \
    # APCU
    && pecl install apcu \
    && docker-php-ext-enable apcu

# copy the Composer PHAR from the Composer image into the PHP image
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www

EXPOSE 9000
#CMD ["php-fpm"]
#CMD composer install ; php-fpm

CMD /usr/bin/supervisord -c '/etc/supervisor/supervisord.conf' ; php-fpm

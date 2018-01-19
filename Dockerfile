FROM php:7.2-rc-apache
RUN apt-get update && apt-get install -y zlib1g-dev
RUN docker-php-ext-install pdo pdo_mysql zip && a2enmod rewrite

RUN apt-get install -y --no-install-recommends git zip libmagickwand-dev && rm -rf /var/lib/apt/lists/*

RUN pecl install imagick

RUN docker-php-ext-enable imagick

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /code


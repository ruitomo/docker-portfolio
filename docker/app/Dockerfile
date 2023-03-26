FROM php:8.0-fpm

ENV TZ Asia/Tokyo

RUN apt-get update && \
	apt-get install -y git unzip libzip-dev libicu-dev libonig-dev && \
	docker-php-ext-install intl pdo_mysql zip bcmath
		
COPY ./docker/app/php.ini /usr/local/etc/php/php.ini

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

COPY --from=node:18.14 /usr/local/bin /usr/local/bin
COPY --from=node:18.14 /usr/local/lib /usr/local/lib

WORKDIR /app
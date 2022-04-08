FROM php:8.1-apache

COPY . /app
EXPOSE 80
EXPOSE 9000
COPY .docker/php/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /app

RUN apt-get update && apt-get install -y --no-install-recommends \
    libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      mariadb-client \
      libonig-dev \
      git \
      postgresql-client \
      libzip-dev \
      unzip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql \
        && docker-php-ext-install \
            intl \
            mbstring \
            pdo_pgsql \
            pdo_mysql \
            pcntl \
            zip \
            opcache

# If you need redis, uncomment the following lines.
#RUN pecl install -o -f redis && \
#    rm -rf /tmp/pear && \
#    docker-php-ext-enable redis

# Same for xDebug.
#RUN mkdir -p /usr/src/php/ext/xdebug && \
#    pecl install xdebug && \
#    docker-php-ext-enable xdebug \
#    && echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN chown -R www-data:www-data /app

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN a2enmod rewrite
RUN service apache2 restart

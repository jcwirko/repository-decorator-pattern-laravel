FROM php:7.4-fpm

MAINTAINER Juan Blariza

#INSTALL DEPENDENCIES
RUN apt-get update && apt-get install -y \
    openssl \
    build-essential \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    locales \
    apt-transport-https \
    wget \
    lsb-release \
    libxml2-dev \
    nginx \
    ca-certificates \
    git \
    nano \
    libonig-dev \
    zip

#PGSQL
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Configure php extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

#Libraries required for Laravel
RUN docker-php-ext-install \
    pdo_mysql \
    bcmath \
    ctype \
    fileinfo \
    iconv \
    intl \
    gd \
    json \
    mbstring \
    pdo_mysql \
    tokenizer \
    xml \
    pcntl

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

EXPOSE 9000

CMD ["php-fpm"]

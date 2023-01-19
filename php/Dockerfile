FROM php:8.1-fpm
WORKDIR /var/www/html

# Updating and install of required packages
RUN apt-get clean && apt-get update -y && apt-get upgrade -y
RUN apt-get install -y \
    libcurl4-openssl-dev \
    libonig-dev \
    libpng-dev \
    libssl-dev \
    libicu-default \
    libxml2-dev \
    libzip-dev \
    nano  \
    zip  \
    unzip  \
    libzip-dev  \
    default-mysql-client  \
    npm  \
    wget \
    tzdata \

ARG=INSTALL_PHPREDIS=false
RUN if [ ${INSTALL_PHPREDIS} = true ]; then \
    # Install the php redis extension
    pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-configure intl
RUN docker-php-ext-install \
    bcmath \
    ctype \
    exif \
    gd \
    mbstring \
    mysqli \
    opcache \
    pdo_mysql \
    pcntl \
    tokenizer \
    xml \
    zip \
    intl

# Install Node.js version manager
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

RUN cd /var/www/html
# RUN npm install --legacy-peer-deps

# build manifest file in public
# RUN npm run prod
# RUN npm run dev

# Install composer for the application dependencies
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer